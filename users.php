<?php 
  session_start();
  include_once "assets/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
 // else{
 //    header("location: ../index.php");
 // }
?>
<?php include_once "includes/header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}"); //Запрос данных
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="assets/images/chat_images/<?php echo $row['img']; ?>" alt="logotipul">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span> 
        <!-- выводит имя фамилию -->
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="assets/php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>      
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="./assets/javascript/users.js"></script>

</body>
</html>
