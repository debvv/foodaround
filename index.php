<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1); // error_reoirting
?>
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

        <section class="bg-dark-30 showcase-page-header module parallax-bg" data-background="./assets/images/index/Front.jpg">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1"> <?=$lang['automatic'] ?> </div>
            <?php
            if(!isset($_SESSION['unique_id']))
            {
            ?>
            <div class="font-alt mb-40 titan-title-size-4"><?=$lang['zakazivaite'] ?> </div><a class="section-scroll btn btn-border-w btn-round" href="#"> <?=$lang['gotomakeorder'] ?> </a>
            <?php
            }
            else
            {
            ?>
            <div class="font-alt mb-40 titan-title-size-4"><?=$lang['zakazivaite'] ?> </div><a class="section-scroll btn btn-border-w btn-round" href="make_order.php"> <?=$lang['gotomakeorder'] ?> </a>
            <?php
            }
            ?>            
            <br><br><!-- <a class="section-scroll btn btn-border-w btn-round" href="make_order.php"> <?=$lang['makeorder'] ?> </a>  --> 
            <!-- ссылку на заполнение формы потребителями далее вставить -->
          </div>
        </div>
      </section>

      

      <div class="main showcase-page">
        <section class="module-extra-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-9">
                <div class="callout-text font-alt">
                  <h4 style="margin-top: 0px; font-;"><?=$lang['startwork'] ?></h4>
                  <p style="margin-bottom: 0px;"><?=$lang['ororderfood'] ?></p>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="callout-btn-box"><a class="btn btn-border-w btn-circle" href="register.php"> <?=$lang['join'] ?> </a></div>
              </div>
            </div>
          </div>
        </section>
        <section class="module-medium" id="demos">
          <div class="container">
            <div class="row multi-columns-row">

              <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" href="#">
                  <div class="content-box-image"><img src="./assets/images/index/Pancakes.jpg" alt="Pancakes"></div>
                  <h3 class="content-box-title font-serif"><?=$lang['Pancakes'] ?></h3></a></div>

              <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" href="#">
                  <div class="content-box-image"><img src="./assets/images/index/Sweets.jpg" alt="Sweets"></div>
                  <h3 class="content-box-title font-serif"><?=$lang['Sweets'] ?></h3></a></div>

              <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" href="#">
                  <div class="content-box-image"><img src="./assets/images/index/Porridge.jpg" alt="Porridge"></div>
                  <h3 class="content-box-title font-serif"><?=$lang['Porridge'] ?></h3></a></div>

              <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" href="#">
                  <div class="content-box-image"><img src="./assets/images/index/Burgers.jpg" alt="Burgers"></div>
                  <h3 class="content-box-title font-serif"><?=$lang['Burgers'] ?></h3></a></div>

              <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" href="#">
                  <div class="content-box-image"><img src="./assets/images/index/Meat.jpg" alt="Meat"></div>
                  <h3 class="content-box-title font-serif"><?=$lang['Meat'] ?></h3></a></div>

              <div class="col-md-4 col-sm-6 col-xs-12"><a class="content-box" href="#">
                  <div class="content-box-image"><img src="./assets/images/index/Rice.jpg" alt="Rice"></div>
                  <h3 class="content-box-title font-serif"><?=$lang['Rice'] ?></h3></a></div>
              
            </div>
          </div>
        </section>
        
            <?php include_once "includes/footer.php"; ?>

      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <?php include_once "includes/scripts.html"; ?>
  </body>
</html>