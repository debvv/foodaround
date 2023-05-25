<?php
include "includes/internal-languages.php";
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr"> 
  <?php include_once "includes/head.php"; ?>
  <head>
  <link rel="stylesheet" href="./assets/css/spoiler.css"> 
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include_once "includes/nav.php"; ?>      
      <section class="home-section home-parallax home-fade home-full-height bg-dark-60 agency-page-header" id="home" data-background="./assets/images/index/general-info.jpg">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1"><?=$lang['generalinfo1'] ?></div>
            <div class="font-alt mb-40 titan-title-size-3"><?=$lang['generalinfo2'] ?> <span class="rotate"><?=$lang['generalinfo3'] ?>  </span>
            </div><a class="section-scroll btn btn-border-w btn-circle" href="#about"><?=$lang['generalinfo4'] ?></a>
          </div>
        </div>
      </section>
      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row multi-columns-row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-lightbulb"></span></div>
                  <h3 class="features-title font-alt"><?=$lang['generalinfo5'] ?></h3><?=$lang['generalinfo7'] ?>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-tools"></span></div>
                  <h3 class="features-title font-alt"><?=$lang['generalinfo6'] ?></h3><?=$lang['generalinfo8'] ?>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-tools-2"></span></div>
                  <h3 class="features-title font-alt"><?=$lang['generalinfo9'] ?></h3><?=$lang['generalinfo10'] ?>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-lifesaver"></span></div>
                  <h3 class="features-title font-alt"><?=$lang['generalinfo11'] ?></h3><?=$lang['generalinfo12'] ?>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- <section class="module pt-0 pb-0" id="about">
          <div class="row position-relative m-0">
            <div class="col-xs-12 col-md-6 side-image"></div>           
        </section>     -->
        <!-- <section> -->
          <!-- <details>
            <summary>
              vopros
            </summary>
            p
          </details> --><h2 class="module-title font-alt"><?=$lang['ps'] ?> </h2>
          <!-- <h1 class="text-center" color=black>пользоват</h1> -->
          <div id="target"><h1><?=$lang['1'] ?></h1>
            <p> <?=$lang['11'] ?> </p>
            <p> <?=$lang['12'] ?> </p> 
            <p> <?=$lang['13'] ?> </p>
            <h1> <?=$lang['2'] ?></h1>
            <p> <?=$lang['21'] ?></p>
            <p><?=$lang['22'] ?> </p>
            <p><?=$lang['23'] ?></p>
            <h1> <?=$lang['3'] ?></h1>
            <p><?=$lang['31'] ?> </p>
            <p><?=$lang['32'] ?> </p>
            <p><?=$lang['33'] ?> </p>
          </div>
          
          <div class="triggers">
            <button id="triggerUp" title="<?=$lang['slideup'] ?>"><?=$lang['slideup2'] ?></button>
            <button id="triggerDown" title="<?=$lang['slidedown'] ?>"><?=$lang['slidedown2'] ?></button>
            <button id="triggerToggle" title="<?=$lang['slidetoggle'] ?>"><?=$lang['slidetoggletwo'] ?></button>
          </div>
        <!-- </section> -->
       <?php include_once "includes/footer.php"; ?>




     
    </main>
       <?php include_once "includes/scripts.html"; ?>
       <script src="assets/javascript/spoiler.js"></script>
  </body>
</html>