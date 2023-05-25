<?php
include "includes/internal-languages.php";
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <?php include_once "includes/head.php"; ?>

  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include_once "includes/nav.php"; ?>

      <br> <br> <br> <br> <br> 
      <!-- <php
      
      if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
      }
      // $sql = mysqli_query($conn, "SELECT * FROM orders WHERE accepted=0");// непринятые заказы

      ?> -->
      <div id="order"></div>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
      <script src="assets/javascript/order-table.js"></script>
      
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br>

     
    <?php include_once "includes/footer.php"; ?> 
 
    </main>
    
      <?php include_once "includes/scripts.html"; ?>   
      <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script> 
  </body>
</html>