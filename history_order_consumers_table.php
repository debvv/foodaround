<?php
      session_start();
      include_once "assets/php/config.php";
 
    //   if(!isset($_SESSION['unique_id'])){
    //     // header("location: index.php");
    //   }
    
    //   $conn = mysqli_connect("localhost", "root", "", "chatapp");
      $sql = mysqli_query($conn, "SELECT * FROM `orders` WHERE from_id={$_SESSION['unique_id']}  "); // заказы клиента

      ?>

      <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">история заказов потребителя</h2>
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
            <th>чат</th>
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
            <!-- <php echo $row['accepted']; ?></td>  -->
            <?php
            if(!$row['accepted'] == 0)
            {?>
              <td>
                <a class='btn btn-primary btn-sm' href="chat.php?unique_id=<?php echo $row['accepted']; ?>"> Связаться </a>
              </td><?php
            }
            else{?>
              <td>Not Accepted</td><?php
            }?>
                
          </tr>
          <?php endforeach; ?>   
          
          
        </tbody>
      </table>