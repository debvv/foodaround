<?php
session_start();
include "includes/internal-languages.php";
// Подключаем PDO-конфигурацию
require_once __DIR__ . '/assets/php/config.php';  // в этом файле: $pdo = new PDO(...);

function call_api(string $url, array $payload): array {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload),
    ]);
    $res = curl_exec($ch);
    if (curl_errno($ch)) {
        $err = curl_error($ch);
        curl_close($ch);
        return ['error' => $err];
    }
    curl_close($ch);
    $json = json_decode($res, true);
    return $json ?: ['error' => 'invalid_json'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1) Собираем данные из формы
    $user_id      = $_SESSION['unique_id'] ?? null;
    $name         = trim($_POST['name'] ?? '');
    $date         = $_POST['date'] ?? '';
    $time         = $_POST['time'] ?? '';
    $product      = trim($_POST['product'] ?? '');
    $description  = trim($_POST['description'] ?? '');
    $count        = (int)($_POST['people'] ?? 0);
    $email        = trim($_POST['email'] ?? '');
    $address      = trim($_POST['address'] ?? '');
    $restaurant_id= (int)($_POST['restaurant_id'] ?? 0);

    if (!$user_id || !$date || !$time || !$name || !$product || $count<1) {
        die("Пожалуйста, заполните все обязательные поля и войдите в систему.");
    }

    // 2) Сохраняем заказ в БД
    $dt = "$date $time";
    $stmt = $pdo->prepare(<<<SQL
        INSERT INTO orders
          (time_date, name, from_id, product, description, count, email, address, accepted)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NULL)
    SQL);
    $stmt->execute([
        $dt, $name, $user_id, $product,
        $description, $count, $email, $address
    ]);

    // 3) Подготовка фичей для ML
    $dtime = new DateTime($dt);
    $hour = (int)$dtime->format('H');
    // PHP: Sunday=0…Saturday=6; Python-модель ждёт Monday=0…Sunday=6
    $php_w = (int)$dtime->format('w');
    $day_of_week = $php_w === 0 ? 6 : $php_w - 1;
    $is_weekend = in_array($day_of_week, [5,6]) ? 1 : 0;

    // 4) Прогноз спроса
    $demand = call_api(
        'http://localhost:5000/predict_demand',
        [
            'restaurant_id' => $restaurant_id,
            'hour'          => $hour,
            'day_of_week'   => $day_of_week,
            'is_weekend'    => $is_weekend
        ]
    );
    $predicted = $demand['prediction'] ?? 'N/A';

    // 5) Рекомендации
    $recs = call_api(
        'http://localhost:5000/recommend',
        ['user_id' => (string)$user_id]
    );
    $cf = $recs['cf_recommendations'] ?? [];
    $cb = $recs['cb_recommendations'] ?? [];

    // 6) Выводим страницу подтверждения
    ?>
    <!DOCTYPE html>
    <html lang="ru">
      <?php include_once "includes/head.php"; ?>
      <body>
        <?php include_once "includes/nav.php"; ?>
        <section class="module-small">
          <div class="container">
            <h2 class="font-alt">Спасибо, <?=htmlspecialchars($name)?>!</h2>
            <p>Ваш заказ сохранён. По нашим прогнозам, в это время будет примерно <strong><?=htmlspecialchars($predicted)?></strong> заказов.</p>

            <h3>Рекомендации на основе вкусов других пользователей</h3>
            <ul>
              <?php foreach($cf as $r): ?>
                <li><?=htmlspecialchars($r)?></li>
              <?php endforeach; ?>
            </ul>

            <h3>Рекомендации по похожим блюдам/ресторанам</h3>
            <ul>
              <?php foreach($cb as $r): ?>
                <li><?=htmlspecialchars($r)?></li>
              <?php endforeach; ?>
            </ul>

            <p><a href="index.php" class="btn btn-round btn-border">Вернуться на главную</a></p>
          </div>
        </section>
        <?php include_once "includes/footer.php"; ?>
        <?php include_once "includes/scripts.html"; ?>
      </body>
    </html>
    <?php
    exit;
}

// Если GET — показываем оригинальную форму:
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <?php include_once "includes/head.php"; ?>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <?php include_once "includes/nav.php"; ?>

    <section class="module pt-0 pb-0">
      <div class="container">
        <h2 class="module-title font-alt"><?=$lang['makeorder']?></h2>
        <p><?=$lang['makeorder_intro']??''?></p>
        <form class="reservation-form" id="reservationForm" action="make_order.php" method="post">
          <input type="hidden" name="restaurant_id" value="<?=intval($_GET['rid'] ?? 1)?>" />
          <!-- Далее все ваши поля: name, date, time, product, description, people, email, address -->
          <!-- ... -->
          <div class="form-group">
            <button class="btn btn-g btn-round btn-block btn-lg" id="rfsubmit" type="submit">
              <i class="fa fa-paper-plane-o"></i> <?=$lang['makeorder_button']?>
            </button>
          </div>
        </form>
      </div>
    </section>

    <?php include_once "includes/footer.php"; ?>
    <?php include_once "includes/scripts.html"; ?>
  </body>
</html>
