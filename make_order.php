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

      <section class="home-section home-full-height" id="home">
        <div class="hero-slider">
          <ul class="slides">
            <li class="bg-dark-30 restaurant-page-header bg-dark">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1">  Приветствуем & добро пожаловать</div>
                  <div class="font-alt mb-40 titan-title-size-4">Это приложение FoodAround</div><a class="section-scroll btn btn-border-w btn-round" href="#menu">Ознакомьтесь с нашим меню</a>
                </div>
              </div>
            </li>
            <li class="bg-dark-30 restaurant-page-header bg-dark">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-2">FoodAround - это проект<br>который нацелен на людей и для людей</div><a class="btn btn-border-w btn-round" href="about.php">Познай фуд-индустрию</a>
                </div>
              </div>
            </li>
            <li class="bg-dark-30 restaurant-page-header bg-dark">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1"> Взгляните </div>
                  <div class="font-alt mb-40 titan-title-size-3">на наш функционал</div><a class="section-scroll btn btn-border-w btn-round" href="#specialities">Узнать больше</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <div class="main">
 
        <hr class="divider-w">
      

        <section class="module module-video bg-dark-30" data-background="assets/images/index/most-popular-food.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt mb-0">Приятного аппетита</h2>
              </div>
            </div>
          </div>
          <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=i_XV7YCRzKo', containment:'.module-video', startAt:3, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
        </section>
        

        <section class="module pt-0 pb-0">
          <div class="row position-relative m-0">
            <div class="col-xs-12 col-md-6 side-image-text">
              <div class="row">
                <div class="col-sm-12">
                  <h2 class="module-title font-alt align-left"><?=$lang['makeorder'] ?></h2>
                  <p class="module-subtitle font-serif align-left">Мы рады приветствовать вас на странице оформления заказа. Как только все поля будут заполнены правильно, заявка будет отправлена нашим кулинарам, которые смогут ее принять и обсудить все нюансы с вами лично в личном чате.</p>
                </div>
              </div>
              
              
              <form class="reservation-form" id="reservationForm" action="assets/php/make-order-reservation.php" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-envelope"></i></div>
                    <input class="form-control input-lg" type="text" id="name" name="name" placeholder="Ваше имя" required="required" data-validation-required-message="Пожалуйста введите своё имя."/>
                  </div>
                </div>  
              
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-calendar"></i></div>
                    <input class="form-control input-lg" id="date" type="date" name="date" placeholder="dd/mm/yyyy" required="" min="2020-01-20" max="2037-01-28"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-clock"></i></div>
                    <select class="form-control input-lg" id="time" name="time" type="text" required="required">
                      <option value="time" disabled="" selected="">Выберите время доставки</option>
                      <input class="form-control input-lg" type="time" id="time" name="time" min="09:00" max="18:00" required>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-envelope"></i></div>
                    <input class="form-control input-lg" type="text" id="product" name="product" placeholder="Название продукта/товара/изделия" required="required" data-validation-required-message="Введите название желаемого продукта/товара/изделия."/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-envelope"></i></div>
                    <input class="form-control input-lg" type="text" id="description" name="description" placeholder="Описание вашего заказа" required="required" data-validation-required-message="Введите описание вашего заказа."/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-envelope"></i></div>
                    <!-- <i class="icon-profile-male"></i></div> -->
                    <input class="form-control input-lg" id="people" type="number" name="people" min="1" max="50" step="1" placeholder="Количество порций/единиц" required=""/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-envelope"></i></div>
                    <input class="form-control input-lg" type="email" id="email" name="email" placeholder="<?=$lang['fb6'] ?>" required="required" data-validation-required-message="<?=$lang['fb7'] ?>"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-envelope"></i></div>
                    <input class="form-control input-lg" type="text" id="address" name="address" placeholder="Ваш домашний адрес" required="required" data-validation-required-message="Пожалуйста введите свой домашний адрес."/>
                  </div>
                </div>

                <div class="form-group">
                  <button class="btn btn-g btn-round btn-block btn-lg mt-20" id="rfsubmit" type="submit"><i class="fa fa-paper-plane-o"></i> Зарезервировать</button>
                </div>          
                <div id="reservationFormResponse"></div>
              </form>
            </div>
            <div class="col-xs-12 col-md-6 col-md-offset-6 side-image restaurant-image-overlay"></div>
          </div>
        </section>


     <!--    <section id="map-section">
          <div id="map"></div>
        </section> -->
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2717.9306443295363!2d28.86097301547899!3d47.061210833486314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97d1fa98a70d9:0x820421c55fbd8790!2zU3RyYWRhIFN0dWRlbsibaWxvciAzLzEsIENoaciZaW7Eg3UsIE1vbGRvdmE!5e0!3m2!1sro!2s!4v1655477617350!5m2!1sro!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->


        <hr class="divider-d">
           <?php include_once "includes/footer.php"; ?>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
 
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU">
    </script>
    <?php include_once "includes/scripts.html"; ?>
    
  </body>
</html>