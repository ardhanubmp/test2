        <!-- SIDE NAV -->
        <!--===============================================================-->
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">

              <div class="panel-group accordion nav-side" id="accor">
                <div class="panel accordion-group">

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="<?php echo base_url(); ?>member/dashboard">
                      <i class="fa fa-dashboard"></i>Dashboard
                    </a>
                  </div>
                  <div class="accordion-heading bg-primary">
                    <a class=" accordion-toggle" href="<?php echo base_url(); ?>member/merchandise">
                      <i class="fa fa-cube"></i>Buat Merchandise
                    </a>
                  </div>
                  <div class="accordion-heading ">
                    <a class=" accordion-toggle icon-toggle" data-toggle="collapse" data-parent="#accor" href="#accor-2">
                      <i class="fa fa-shopping-cart"></i>Transaksi
                    </a>
                  </div>
                  <div id="accor-2" class="accordion-body collapse ">
                    <div class="accordion-inner">
                      <ul class="list-unstyled">
                        <li>
                          <a class="" href="<?php echo base_url(); ?>member/history">History</a>
                          <a class="" href="<?php echo base_url(); ?>member/keranjang">Keranjang</a>
                          <a class="" href="<?php echo base_url(); ?>member/konfirmasi">Konfirmasi</a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="<?php echo base_url(); ?>member/pengaturan">
                      <i class="fa fa-gear"></i>Pengaturan
                    </a>
                  </div>

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="<?php echo base_url(); ?>member/testimoni">
                      <i class="fa fa-lightbulb-o"></i>Testimoni
                    </a>
                  </div>

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="<?php echo base_url(); ?>member/ubah_password">
                      <i class="fa fa-lock"></i>Ubah Password
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>