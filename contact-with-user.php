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




      
      <div class="main">
        <section class="module" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt"><?=$lang['feedback-sv'] ?></h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                
              
              <form  role="form"  action="http://localhost/foodaround/chat.php?" method="GET">
        <input type="text" class="form-control" name="unique_id" placeholder="unique_user_id">
        <input type="submit" class="form-control" value="<?=$lang['fb0'] ?>">
    </form>
              
              <form id="contactForm" role="form" method="post" action="assets/php/contact.php">
                  <!-- <div class="form-group">
                    <label class="sr-only" for="name"><?=$lang['fb4'] ?></label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="<?=$lang['fb1'] ?>" required="required" data-validation-required-message="<?=$lang['fb2'] ?>"/>
                    <p class="help-block text-danger"></p>
                  </div> -->
                  <!-- <div class="form-group">
                    <label class="sr-only" for="email"><?=$lang['fb5'] ?></label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="<?=$lang['fb6'] ?>" required="required" data-validation-required-message="<?=$lang['fb7'] ?>"/>
                    <p class="help-block text-danger"></p>
                  </div> -->
                  <!-- <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="<?=$lang['fb8'] ?>" required="required" data-validation-required-message="<?=$lang['fb9'] ?>"></textarea>
                    <p class="help-block text-danger"></p>
                  </div> -->
                  <!-- <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit"><?=$lang['fb0'] ?></button>
                  </div> -->
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>

        
     <?php include_once "includes/footer.php"; ?>

      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
      <?php include_once "includes/scripts.html"; ?>   
      
  </body>
</html>