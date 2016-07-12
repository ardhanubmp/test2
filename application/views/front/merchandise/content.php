    <!-- SECTION Judul-->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="heading-page text-center-xs">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<!-- SECTION KONTEN -->
    <div class="container">
      <div class="row">


        <!-- CONTENT COLUMN -->
        <!--===============================================================-->
          
        <div class="col-md-12">

          <div class="row">
            <div class="col-md-12">
              <h3 class="title-v2">Pilih Ornamen sesuka kamu</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="<?php echo base_url(); ?>member/dashboard" class="btn btn-red"><i class="fa fa-arrow-circle-left"></i>Kembali</a>    
              <hr class="hr-divider-ghost">

              <?php if (!empty($this->session->flashdata('msg_success'))): ?>
                <!-- alert jika sukses simpan -->
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('msg_success'); ?>
                </div>
              <?php endif ?>

              <?php if (!empty($this->session->flashdata('msg_error_upload'))): ?>
                <!-- alert jika ada error ketika upload -->
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('msg_error_upload'); ?>
                </div>
              <?php endif ?>

              <!-- alert jika ada form error -->
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>

              <?php echo form_open_multipart('member/merchandise/keranjang',array('class'=>'form-horizontal')); ?>
              <!-- <form class="form-horizontal"> -->
                  
                  <div class="form-group">
                    <label class="control-label col-sm-2">Ucapan Atas</label>
                    <div class="col-sm-10">
                      <input name="ucapan_atas" type="text" class="form-control" placeholder="Selamat Ulang tahun"  value="<?php echo set_value('ucapan_atas') ?>"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Ucapan Bawah</label>
                    <div class="col-sm-10">
                      <input name="ucapan_bawah" type="text" class="form-control" placeholder="Sukses selalu" value="<?php echo set_value('ucapan_bawah') ?>"></input>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail" class="control-label col-sm-2">Foto</label>
                      <div class="col-sm-10">
                        <input name="gambar" type="file" class="form-control"></input>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-send-o"></i>Pesan</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
          <hr class="hr-divider-ghost">
        </div>
      </div>
    </div>
<!-- END SECTION KONTEN -->