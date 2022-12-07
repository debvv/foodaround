<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<!-- <php include_once "includes/header.php"; ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FoodAround Chat Application</title>
  <link rel="stylesheet" href="./assets/css/register-login.css"> 
  <!-- css form -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

<!-- end include header php -->
<!-- start include head html -->
   
    
    <meta name="viewport" content="width=device-width, initial-scale=1">     
    <link rel="shortcut icon" href="assets/images/favicons/icon.png" type="image/x-icon">      
    <meta name="msapplication-TileColor" content="#ffffff">   
    <meta name="theme-color" content="#ffffff">  

    <!-- esli che ya komentil eto if apare problems -->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">   

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- <link href="assets/css/styleIncluded.css" rel="stylesheet"> -->
  <!-- css nav -->


<!-- end include head html -->
</head>
<!-- + -->
<body>
 
  <!-- </script> -->
<!-- nav second include -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"> Food Around </a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">home</a></li>
              <li><a href="about.php">about</a></li>
              <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">information</a> 
                <ul class="dropdown-menu" role="menu"> -->
                    <li><a href="general_information.php">general information</a></li>
                <!-- </ul> -->
              </li>
                <li class="dropdown">
                    <a href="login.php" >Login</a>               
                </li>                       
            </ul>
          </div>
        </div>
      </nav>
  <!-- nav second include closed-->
  <div class="wrapper">
    <section class="form signup">
      <header>FoodAround Chat Application</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>

        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>

        <div class="field selector" >
          <label>Select your role</label>
          <select id="selectrole" name="role">
            <option value="Consumer">Consumer</option>
            <option value="Culinary Specialist">Culinary Specialist</option>
          </select>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="./assets/javascript/pass-show-hide.js"></script>
  <script src="./assets/javascript/signup.js"></script>
  


 
</body>
</html>

