<?php
include "includes/internal-languages.php";
?>
<?php
      session_start();
      include_once "assets/php/config.php";

      $sql = mysqli_query($conn, "SELECT * FROM orders WHERE accepted=0");// непринятые заказы
?>
    <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt"> <?=$lang['aktivnie_zakazi'] ?></h2>
                <div class="module-subtitle font-serif"></div>
          </div>
      </div>
      
      <table class="table table-bordered" , class="table table-striped">
        <thead>
          <tr>
            <th><?=$lang['histordcons2'] ?></th>
            <th><?=$lang['histordcons3'] ?></th>
            <th><?=$lang['histordcons4'] ?></th>
            <th><?=$lang['histordcons5'] ?></th>
            <th><?=$lang['histordcons6'] ?></th>
            <th><?=$lang['histordcons7'] ?></th>
            <th><?=$lang['histordcons8'] ?></th>
            <th><?=$lang['histordcons9'] ?></th>
            <th><?=$lang['histordcons10'] ?></th>
            <th><?=$lang['histordcons12'] ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sql as $row): ?>
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
            <td>
              <a class='btn btn-success btn-sm accept' href="assets/php/accept_order.php?id_order=<?php echo $row['id_order']; ?>"> Принять заказ</a>
            </td>
          </tr>
          <?php endforeach; ?>    
        </tbody>
      </table>