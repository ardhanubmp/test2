        <!-- SIDE NAV -->
        <!--===============================================================-->
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">
              <button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-cube fa-2x"></i>Buat Merchandise
              </button>
              <hr class="hr_divider_ghost">

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
                    <a class=" accordion-toggle" href="<?php echo base_url(); ?>member/password">
                      <i class="fa fa-lock"></i>Ubah Password
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <hr class="hr-divider-ghost">
        </div>

<!-- Modal -->
<div class="modal fade modal-dark" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content-transparant">
      <div class="modal-header-transparant btn-blue">
        <button type="button" class="close close-device" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-theme title-lg text-center" id="myModalLabel">PILIH PERANGKAT</h4>
      </div>
      <div class="modal-body text-center">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('member/merchandise/mobile') ?>" class="btn-primary">
              <i class="fa fa-mobile fa-box fa-box-custom btn-sea fa-4x text-theme"></i>
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="<?php echo base_url('member/merchandise') ?>" class="btn-primary">
              <i class="fa fa-desktop fa-box fa-box-custom btn-sea fa-4x text-theme"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>