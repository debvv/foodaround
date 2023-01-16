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
              <li><a href="index.php">home</a></li>
              <li><a href="about.php">about</a></li>

                <?php
                    if (!isset($_SESSION['unique_id']))
                    {}
                    else{
                        ?>
                        <!-- <li><a href="users.php">chat</a></li> -->
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">support</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="contact-leave-feedback.php">leave feedback</a></li>
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
                        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">admin</a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">admin room</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="assets/php-crud/messages-index.php">crud Messages</a></li>
                                        <li><a href="assets/php-crud/users-index.php">crud Users</a></li>
                                        <li><a href="assets/php-crud/order-index.php">crud Orders</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                <?php
                    }
                ?>

              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">information</a> <!--добавить ссылку на каку либо инфрмацию-->
                <ul class="dropdown-menu" role="menu">
                    <li><a href="general_information.php"><i class="fa fa-bolt"></i> general information</a></li>
                    <?php
                    if (!isset($_SESSION['unique_id']))
                    {}
                    else if ($row['role'] == 'Consumer')
                    {
                        ?>
                        <li><a href="history_order_consumers.php"><i class="fa fa-bolt"></i> history order consumers</a></li>
                        <li><a href="make_order.php"><i class="fa fa-tasks"></i> make an order</a></li>
                        <?php
                    }
                    else if ($row['role'] == 'Culinary Specialist')
                    {
                        ?>
                        <li><a href="history_order_culinary.php"><i class="fa fa-link fa-sm"></i> history order culinary</a></li>
                        <li><a href="order_table.php"><i class="fa fa-list-alt"></i> check active orders</a></li>
                        <?php
                    }
                    else if ($row['role'] == 'Admin')
                    {
                        ?>
                        <li><a href="history_order_consumers.php"><i class="fa fa-bolt"></i> history order consumers</a></li>
                        <li><a href="make_order.php"><i class="fa fa-tasks"></i> make an order</a></li>
                        <li><a href="history_order_culinary.php"><i class="fa fa-link fa-sm"></i> history order culinary</a></li>
                        <li><a href="order_table.php"><i class="fa fa-list-alt"></i> check active orders</a></li>
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
                            <li><a href="assets/php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a></li>
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