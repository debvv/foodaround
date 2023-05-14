<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <?php include_once "includes/head.html"; ?>
  
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include_once "includes/nav.php"; ?>
      <div class="main">
        <section class="module bg-dark-60 about-page-header" data-background="./assets/images/index/about.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">FOOD AROUND</h2>
                <div class="module-subtitle font-serif">наш сервис предлагает блюда непревзойденного качества и продукты, которые будут приготовлены лучшими шеф-поварами!</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h5 class="font-alt">мы - лучшее веб приложение</h5><br/>
                <p>Наши шеф-повара не оставят вас равнодушными к качеству наших услуг. Попробуйте и убедитесь сами</p>
                <p>Все специалисты проходят строгий отбор. Безопасность для нас на первом месте</p>
              </div>
              <div class="col-sm-6">
                <h6 class="font-alt"><span class="icon-tools-2"></span> скорость доставки
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> цены на услуги
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> качество
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="65" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> безопасность
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="90" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
        <?php include_once "includes/footer.html"; ?>

      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
     <?php include_once "includes/scripts.html"; ?>
  </body>
</html>