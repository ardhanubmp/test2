    <!-- SECTION INTRO SLIDER -->
    <!--===============================================================-->
    <div class="section-intro-index section-slider">
      <div class="layer-intro layer-intro-index">
        <!-- SLIDER -->
        <div class="wrapper-slider" id="intro-slider-wrapper">
          <div class="carousel slide carousel-intro" id="carousel-intro" data-ride="carousel" data-interval="7500">
            <div class="wrapper-preloader">
              <div id="preloader"></div>
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-intro" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-intro" data-slide-to="1"></li>
              <li data-target="#carousel-intro" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <!-- first slide -->
              <div class="item item-theme-first active">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-7">
                      <h1 class="text-theme title-xl mt-40 animation an-delay-05 an-duration-04 fadeInLeftSlider">Multipurpose, Unlimited Options In One Theme</h1>
                      <p class="text-theme lead animation an-delay-09 an-duration-04 fadeInUpSlider">Build your website fast, unlimited possibilities, shortcodes, 20 color options. Lorem ipsum dolor sit amet.</p>
                      <a class="text-theme btn btn-primary btn-lg animation an-delay-13 an-duration-04 fadeInRightSlider">Get Started</a>
                    </div>
                    <div class="col-sm-5 hidden-xs">
                      <img class="pull-right animation an-delay-19 an-duration-04 fadeInUpSlider" src="<?php echo base_url(); ?>assets/front/assets/images/general/12.png" alt="theme-img">
                    </div>
                  </div>
                </div>
              </div>
              <!-- second slide -->
              <div class="item item-theme">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <h1 class="text-theme title-xl mt-40 animation an-delay-05 an-duration-04 fadeInUpSlider">Everything you need in one theme</h1>
                      <p class="text-theme lead animation an-delay-07 an-duration-04 fadeInRightSlider">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                      <ul class="list-unstyled list-md text-theme">
                        <li class="animation an-delay-09 an-duration-04 fadeInLeftSlider"><i class="fa fa-check fa-round"></i>Responsive</li>
                        <li class="animation an-delay-11 an-duration-04 fadeInLeftSlider"><i class="fa fa-code fa-round"></i>Ui Elements</li>
                        <li class="animation an-delay-13 an-duration-04 fadeInLeftSlider"><i class="fa fa-cloud-download fa-round"></i>Slider Options</li>
                      </ul>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1 hidden-xs">
                      <img class="img-responsive img-slide-2 pull-right mt-20 animation an-delay-18 an-duration-04 fadeInUpSlider" src="<?php echo base_url(); ?>assets/front/assets/images/general/imacs.png" alt="theme-img">
                    </div>
                  </div>
                </div>
              </div>
              <!-- third slide -->
              <div class="item item-theme">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-5 hidden-xs">
                      <img class="img-responsive img-slide-3 pull-right mt-30 animation an-delay-05 an-duration-04 fadeInLeftSlider" src="<?php echo base_url(); ?>assets/front/assets/images/macbook-slider/macbook-mockup.png" alt="theme-img">
                    </div>
                    <div class="col-sm-6 col-sm-offset-1">
                      <h1 class="text-theme title-xl mt-40 animation an-delay-08 an-duration-04 fadeInRightSlider">Everything you need in one theme</h1>
                      <p class="text-theme lead animation an-delay-11 an-duration-04 fadeInUpSlider">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                      <ul class="list-unstyled list-md text-theme">
                        <li class="animation an-delay-14 an-duration-04 fadeInRightSlider"><i class="fa fa-check fa-round"></i>Responsive</li>
                        <li class="animation an-delay-16 an-duration-04 fadeInRightSlider"><i class="fa fa-code fa-round"></i>Ui Elements</li>
                        <li class="animation an-delay-18 an-duration-04 fadeInRightSlider"><i class="fa fa-cloud-download fa-round"></i>Slider Options</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SLIDER END-->
      </div>
      <!-- Controls -->
      <a href="#carousel-intro" role="button" data-slide="prev">
        <i class="fa fa-angle-left fa-2x btn-prev-intro"></i>
      </a>
      <a href="#carousel-intro" role="button" data-slide="next">
        <i class="fa fa-angle-right fa-2x btn-next-intro"></i>
      </a>
    </div>

    <!-- SECTION Banner -->
    <!--===============================================================-->
    <div class="section section-xs section-both  section-banner-iklan">
      <div class="container no-padding">
        <div class="row text-center-xs no-padding">
          <div class="col-sm-12 no-padding">
          <!-- <img src="http://placehold.it/1200x200" class="img-responsive banner-iklan"> -->
          <?php 
            foreach ($arr_banner as $banner) {
              $banner_image=$banner->gambar;
              $alt_image=$banner->alt_image;
            }
           ?>
          <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $banner_image; ?>" class="center-block img-responsive banner-iklan" alt="<?php echo $alt_image; ?>">
          </div>
        </div>
      </div>
    </div>

    <!-- SEECTION FEATURES -->
    <!--===============================================================-->
    <div class="section section-sm section-both">
      <div class="container">
        <div class="row">
          <!-- FEATURES -->
          <div class="col-sm-3">
            <div class="icon-box">
              <i class="fa fa-star fa-round fa-4x text-theme"></i>
              <h3 class="title-sm text-theme-sm text-theme">Unik</h3>
              <p class="text-theme-sm">Ciptakan Kado Unik yang berbeda dari yang lain
                <!-- <br>sed diam</p> -->
            </div>
          </div>
          <!-- FEATURES -->
          <div class="col-sm-3">
            <div class="icon-box">
              <i class="fa fa-paint-brush fa-round fa-4x text-theme"></i>
              <h3 class="title-sm text-theme-sm text-theme">CUSTOMIZABLE</h3>
              <p class="text-theme-sm">Sesuaikan model merchandise sesuai keinginan kamu
                <!-- <br>sed diam</p> -->
            </div>
          </div>
          <!-- FEATURES -->
          <div class="col-sm-3">
            <div class="icon-box">
              <i class="fa fa-money fa-round fa-4x text-theme"></i>
              <h3 class="title-sm text-theme-sm text-theme">Terjangkau</h3>
              <p class="text-theme-sm">Harga Hadiah ini Tentu sangat terjangkau bagi kamu
                <!-- <br>sed diam</p> -->
            </div>
          </div>
          <!-- FEATURES -->
          <div class="col-sm-3">
            <div class="icon-box">
              <i class="fa fa-thumbs-up fa-round fa-4x text-theme"></i>
              <h3 class="title-sm text-theme-sm text-theme">Berkualitas</h3>
              <p class="text-theme-sm">Menggunakan bahan kertas yang berkualitas tebal dan awet
                <!-- <br>sed diam</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SECTION DESKRIPSI SINGKAT DAN HARGA-->
    <!--===============================================================-->
    <div class="section section-sm section-both section-dark">
      <div class="container">
        <div class="row">
          <div class="col-sm-7">
            <h3 class="text-theme title-md hr-left">Apa itu Super Pop Up</h3>
            <p class="text-theme">Super Pop Up adalah merchandise berupa PopUp tube yang dapat di custom sesuai keinginanmu.</p>
            <a href="#" target="_blank" class="text-theme btn btn-sm btn-primary"><i class="fa fa-user"></i>Lihat Selengkapnya</a>
            <h3 class="text-theme title-md hr-left">Harganya ?</h3>
            <p class="text-theme">untuk memesan merchandise ini, kamu cukup membayar sejumlah</p>

            <h2 class="title-2-xl"><i class="fa fa-shopping-cart margin-r-10"></i>Rp 
            <?php 
            foreach ($arr_harga as $harga) {
              echo $harga->harga;
            } 
            ?>
             ,-</h2>
          </div>
          <div class="col-sm-5">
            <img class="img-responsive pull-right" src="http://placehold.it/450x300" alt="theme-img">
          </div>
        </div>
      </div>
    </div>

    <!-- SECTION TESTIMONIAL-->
    <!--===============================================================-->
    <div id="section-testimonial" class="section-bg">
      <div class="opacity-layer section section-sm section-both">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <!-- SLIDER -->
              <div class="wrapper-slider text-center">
                <div id="carousel-22" class="carousel slide" data-ride="carousel" data-interval="false">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    <div class="item active">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <img class="img-circle text-theme" src="<?php echo base_url(); ?>assets/front/assets/images/general/testimonial-3.jpg" alt="img-theme">
                            <h3 class="title-xs text-theme">John Doe</h3>
                            <p class="lead text-theme">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque arcu mauris, molestie vel euismod at, condimentum non nisl. Proin vel congue ex."</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <img class="img-circle text-theme" src="<?php echo base_url(); ?>assets/front/assets/images/general/testimonial-2.jpg" alt="img-theme">
                            <h3 class="title-xs text-theme">Steven Doe</h3>
                            <p class="lead text-theme">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque arcu mauris, molestie vel euismod at, condimentum non nisl. Proin vel congue ex."</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <img class="img-circle text-theme" src="<?php echo base_url(); ?>assets/front/assets/images/general/testimonial-1.jpg" alt="img-theme">
                            <h3 class="title-xs text-theme">Lauren Doe</h3>
                            <p class="lead text-theme">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque arcu mauris, molestie vel euismod at, condimentum non nisl. Proin vel congue ex."</p>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- Indicators -->
                  <ol class="carousel-indicators carousel-indicators-testimonial">
                    <li data-target="#carousel-22" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-22" data-slide-to="1"></li>
                    <li data-target="#carousel-22" data-slide-to="2"></li>
                  </ol>
                  <!-- SLIDER END-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SECTION CALL-TO -->
    <!--===============================================================-->
    <div class="section section-xs section-both section-primary section-call-to">
      <div class="container">
        <div class="row text-center-xs">
          <div class="col-sm-8">
            <h3 class="title-md">Buruan Order merchandise kamu di Sini</h3>
          </div>
          <div class="col-sm-4 text-right text-center-xs">
            <a class="btn btn-ghost-white btn-lg"><i class="fa fa-users"></i>Daftar</a>
          </div>
        </div>
      </div>
    </div>