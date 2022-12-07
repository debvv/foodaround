<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <?php include_once "includes/head.html"; ?>

  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include_once "includes/nav.php"; ?>

      <br> <br> <br> <br> <br> 
      <?php
      $dbh = new PDO('mysql:dbname=chatapp; host=localhost', 'root', '');
      $sth = $dbh->prepare("SELECT * FROM `orders` WHERE accepted=1233085864 "); //def: select * from orders
      $sth->execute();
      $list = $sth->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">history Order consumers</h2>
                <div class="module-subtitle font-serif"></div>
          </div>
      </div>
      
      <table class="table table-bordered" , class="table table-striped">
        <thead>
          <tr>
            <th>#заказа</th>
            <th>выполнить к времени</th>
            <th>клиент</th>
            <th>#клиента</th>
            <th>название блюда</th>
            <th>описание</th>
            <th>кол-во порций</th>
            <th>email пользователя</th>
            <th>адресс</th>
            <th>статус</th>
            <!-- <th>Id повара</th> -->
            <th>взаимодействие</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $row): ?>
          <tr>
            <td><?php echo $row['id_order']; ?></td>
            <td><?php echo $row['time_date']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['from_id']; ?></td>
            <td><?php echo $row['product']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['count']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['name_cul']; ?></td>
            <!-- <td><php echo $row['accepted']; ?></td> -->
            <td>
              <a class='btn btn-success btn-sm' href='../php-crud/messages-edit.php?msg_id=$row[msg_id]'> accept</a>
							<a class='btn btn-primary btn-sm' href='../php-crud/messages-delete.php?msg_id=$row[msg_id]'> text </a>
            </td>
          </tr>
          <?php endforeach; ?>    
        </tbody>
      </table>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br>

     
    <?php include_once "includes/footer.html"; ?> 
 
    </main>
    
      <?php include_once "includes/scripts.html"; ?>   
      <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script> 
  </body>
</html>