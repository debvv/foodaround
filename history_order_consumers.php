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
      <div id="table"></div>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
      <script src="assets/javascript/history-order-consumers.js"></script>
        <!-- // $(document).ready(function() {
        //     setInterval(function() {
        //         $.ajax({
        //             url: "history_order_consumers_table.php",
        //             type: "GET",                    
        //             dataType: "html",
        //             success: function(data) { //если запрос успешен
        //                 // Получаем ответ с сервера с помощью ajax
        //                 // console.log(data);
        //                 // console.log(data.responseText);
        //                 console.log("The table was updated!");
        //                 $("#table").html(data);
        //             },
        //             error: function(jqXhr, textStatus, errorThrown) {
        //                 console.log("Ошибка '" + jqXhr.status + "' (textStatus: '" + textStatus + "', errorThrown: '" + errorThrown + "')");
        //             },
        //             complete: function() {
        //             }
        //         });
        //     }, 1000);
        // }); -->
     
         
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br>
     
    <?php include_once "includes/footer.php"; ?> 
    </main>
      <?php include_once "includes/scripts.html"; ?>   
      <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script> 
  </body>
</html>