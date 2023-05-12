<?php
    session_start();
    include_once "./assets/php/config.php";
    if(!isset($_SESSION['unique_id'])) {
//              header("location: chatapp/login.php");
    }
    else{
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
        }else{
            header("location: users.php");
        }
    }
?>

      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"> Food Around </a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">ГЛАВНАЯ</a></li>
              <li><a href="about.php">О НАС</a></li>

                <?php
                    if (!isset($_SESSION['unique_id']))
                    {}
                    else{
                        ?>
                        <!-- <li><a href="users.php">chat</a></li> -->
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">поддержка</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="contact-leave-feedback.php">оставить обратную связь</a></li>
                                <!-- <li><a href="index.php">contact online support</a></li> -->
                                <!--  <li><a href="index.php">login as technical support</a></li>               -->
                            </ul>
                        </li>
                <?php
                    }
                ?>
                <?php
                    if (!isset($_SESSION['unique_id']))
                    {}
                    else if ($row['role'] == 'Admin')
                    {
                       ?>
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Администрирование</a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Админ комната</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="assets/php-crud/messages-index.php">crud таблицы сообщений</a></li>
                                        <li><a href="assets/php-crud/users-index.php">crud таблицы пользователей</a></li>
                                        <li><a href="assets/php-crud/order-index.php">crud таблицы заказов</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                <?php
                    }
                ?>

              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">информация</a> <!--добавить ссылку на каку либо инфрмацию-->
                <ul class="dropdown-menu" role="menu">
                    <li><a href="general_information.php"><i class="fa fa-bolt"></i> общая информация</a></li>
                    <?php
                    if (!isset($_SESSION['unique_id']))
                    {}
                    else if ($row['role'] == 'Consumer')
                    {
                        ?>
                        <li><a href="history_order_consumers.php"><i class="fa fa-bolt"></i> история заказов потребителя</a></li>
                        <li><a href="make_order.php"><i class="fa fa-tasks"></i> оформление заказа</a></li>
                        <?php
                    }
                    else if ($row['role'] == 'Culinary Specialist')
                    {
                        ?>
                        <li><a href="history_order_culinary.php"><i class="fa fa-link fa-sm"></i> история заказов кулинарного специалиста</a></li>
                        <li><a href="order_table.php"><i class="fa fa-list-alt"></i> активные заказы потребителей</a></li>
                        <?php
                    }
                    else if ($row['role'] == 'Admin')
                    {
                        ?>
                        <li><a href="history_order_consumers.php"><i class="fa fa-bolt"></i> история заказов потребителя</a></li>
                        <li><a href="make_order.php"><i class="fa fa-tasks"></i> оформление заказа</a></li>
                        <li><a href="history_order_culinary.php"><i class="fa fa-link fa-sm"></i> история заказов кулинарного специалиста</a></li>
                        <li><a href="order_table.php"><i class="fa fa-list-alt"></i> активные заказы потребителей</a></li>
                        <?php
                    }
                    ?>
                 </ul>
              </li>
                  <li class="dropdown">
                        <?php
                        if(!isset($_SESSION['unique_id'])) {
                            ?>
                            <a href="login.php" >Login</a>
                        <?php
                        }
                        else {
                            ?>
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php echo $row['fname']. " " . $row['lname'];
                            ?>
                            </a>

                        <ul class="dropdown-menu">
                            <li><a href="assets/php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">выход</a></li>
                        </ul>
                            </a>
                        <?php
                        }
                        ?>
                  </li>
            </ul>
          </div>
        </div>
      </nav>