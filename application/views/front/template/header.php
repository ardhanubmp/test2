    <!-- NAVBAR -->
    <!--===============================================================-->
    <div id="header">
      <nav id="nav" class="navbar navbar-default navbar-fixed-top">
        <div class="menu-top menu-top-inverse">
          <div class="container">
            <div class="row">
              
              <div class="col-sm-12 col-xs-12">
                <div class="pull-right">
                  <div class="pull-left">
                  <?php if ($this->session->userdata('level') == 'member'): ?>
                    <a class="btn-menu-top" href="<?php echo base_url(); ?>member/dashboard"><i class="fa fa-dashboard margin-r-10"></i>Dashboard</a>
                    <a class="btn-menu-top" href="pengaturan.html"><i class="fa fa-gear margin-r-10"></i>Pengaturan</a>
                    <a class="btn-menu-top" href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-sign-out margin-r-10"></i>Keluar</a>
                  <?php else: ?>
                    <a class="btn-menu-top" href="<?php echo base_url(); ?>daftar"><i class="fa fa-users margin-r-10"></i>Daftar</a>
                    <a class="btn-menu-top" href="<?php echo base_url(); ?>auth"><i class="fa fa-sign-in margin-r-10"></i>Masuk</a>
                  <?php endif ?>
                  </div>
                  <!-- <div class="dropdown dropdown-login pull-left">
                    <button class="btn-menu-top" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Masuk</button>
                    <div class="dropdown-menu dropdown-menu-right stop-prop" role="menu" aria-labelledby="dLabel">
                      <div class="wrapper-form-box">
                        <h3>Masuk</h3>
                        <form>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control" placeholder="Username">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                              <input type="password" class="form-control" placeholder="Password">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary text-theme-xs mr-8">Masuk</button>
                          <a href="#" class="text-theme-xs pull-right a-black">Lupa Password ?</a>
                        </form>
                      </div>
                    </div>
                  </div> -->
                  
                </div>
                <div class="list-inline social-icons-menu-top pull-right">
                  <a href="https://www.facebook.com/Super-Pop-Up-ID-1041115759264109/" target="_blank" class="social-hover-v1 a-facebook"></a>
                  <a href="https://www.instagram.com/superpopup.id/" target="_blank" class="social-hover-v1 a-instagram"></a>
                  <!-- <a href="#" class="social-hover-v1 a-google"></a>
                  <a href="#" class="social-hover-v1 a-twitter"></a>
                  <a href="#" class="social-hover-v1 a-linkedin"></a>
                  <a href="#" class="social-hover-v1 a-pinterest"></a>
                  <a href="#" class="social-hover-v1 a-behance"></a>
                  <a href="#" class="social-hover-v1 a-youtube"></a> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index-2.html">
              <img class="img-responsive logo-top" src="<?php echo base_url(); ?>assets/front/assets/images/logo/logo-superpopup.png" alt="theme-img">
              <h3 class="text-theme title-xl font-logo">SUPER POP UP</h3>
            </a>
          </div>

          <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="index.html">Home</a>
              </li>
              <li>
                <a href="tentang.html">Tentang</a>
              </li>
              <li>
                <a href="galeri.html">Galeri</a>
              </li>
              <li>
                <a href="cara-pesan.html">Cara Pesan</a>
              </li>
              <li>
                <a href="faq.html">FAQ</a>
              </li>
              <li>
                <a href="syarat.html">Syarat dan Ketentuan</a>
              </li>


              <li class="li-search">
                <form class="nav-search">
                  <label for="focus-input"><i class="fa fa-search"></i></label>
                  <input id="focus-input" class="container" type="search" name="s" placeholder="To Search, Type and Hit Enter">
                </form>
              </li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </div>
    <!-- NAVBAR END -->