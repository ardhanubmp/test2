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

               
            </div>
          </div>

          <hr class="hr-divider-ghost">
        </div>
      </div>
      <div class="row">

        <!-- CONTENT COLUMN -->
        <!--===============================================================-->
        <div class="col-md-12">

          <div class="row">
            <div class="col-md-12">
              <!-- <a href="dashboard.html" class="btn btn-red"><i class="fa fa-arrow-circle-left"></i>Kembali</a>     -->
              <!-- <a href="keranjang.html" class="btn btn-red pull-right"><i class="fa fa-arrow-circle-right"></i>Pesan</a>     -->
              <!-- <hr class="hr-divider-ghost">           -->
              <!-- <img src="assets/images/general/canvas.png" class="img-responsive"> -->
              <div class="row">
                <div class="col-sm-6 col-xs-12  col-md-6">
                  <?php echo form_open_multipart('member/merchandise/keranjang',array('class'=>'form-horizontal')); ?>
                  <!-- <form class="form-horizontal"> -->
                      
                      <div class="form-group">
                        <label class="control-label col-sm-2">Ucapan</label>
                        <div class="col-sm-10">
                          <input name="ucapan" type="text" class="form-control" placeholder="cth : Selamat Ulang tahun"  value="<?php echo set_value('ucapan') ?>"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2">Tema</label>
                        <div class="col-sm-10">
                          <input name="tema" type="text" class="form-control" placeholder="cth : Ulang tahun" value="<?php echo set_value('tema') ?>"></input>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2">Tambahan</label>
                        <div class="col-sm-10">

                          <textarea name="tambahan" class="form-control" placeholder="cth : tolong dikasih backkground bunga bunga dong kayak yang di galeri itu"><?php echo set_value('tambahan') ?></textarea>
                          <small><i>*jika anda ingin menambahkan ornamen, atau custom konten silahkan isi diatas ini</i></small> 
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail" class="control-label col-sm-2">Foto</label>
                          <div class="col-sm-10">
                            <input name="gambar" type="file" id="fileselect" class="form-control"></input>
                            <small><i>Ukuran Max <b>900 kb</b> , jenis file = <b>jpg dan png</b></i></small><br>
                            <small><i>Foto nanti kita edit , jadi tidak perlu di crop sendiri :D</i></small>
                            <div id="progress"></div>
                                <!-- <div id="messages">
                                
                                </div> -->
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="ornamen_atas" id="form_atas"></input>
                            <input type="hidden" name="ornamen1" id="form_pop_konten1"></input>
                            <input type="hidden" name="ornamen2" id="form_pop_konten2"></input>
                            <input type="hidden" name="ornamen3" id="form_pop_konten3"></input>
                            <input type="hidden" name="ornamen4" id="form_pop_konten4"></input>
                            <input type="hidden" name="ornamen5" id="form_pop_konten5"></input>
                            <input type="hidden" name="ornamen6" id="form_pop_konten6"></input>
                            <input type="hidden" name="ornamen_bawah" id="form_bawah"></input>    
                            <input name="device" type="hidden" value="mobile"></input>                  
                              <button type="submit" class="btn btn-primary"><i class="fa fa-send-o"></i>Pesan</button>
                          </div>
                      </div>
                  </form>        
                </div>
                <div class="col-sm-6 col-xs-12  col-md-6 ">
                  <!-- content pop up tube -->
                    <div class="popuptube center-block" id="content">
                      <div class="base">
                        <div class="pop_atas" >
                          <img id="pop_atas" src="<?php echo base_url('assets/ornamen/atas/default.jpg') ?>" draggable="false" class="img_pop img-responsive">
                        </div>
                        <div class="pop_ornamen1">
                          <img id="pop_konten1" src="<?php echo base_url('assets/ornamen/konten/default1.jpg') ?>" class="img_pop pull-right">
                        </div>
                        <div class="pop_ornamen2">
                          <img id="pop_konten2" src="<?php echo base_url('assets/ornamen/konten/default2.jpg') ?>" class="img_pop pull-left">
                        </div>
                        <div class="pop_ornamen3">
                          <img id="pop_konten3" src="<?php echo base_url('assets/ornamen/konten/default3.jpg') ?>" class="img_pop pull-right">
                        </div>
                        <div class="pop_ornamen4">
                          <img id="pop_konten4" src="<?php echo base_url('assets/ornamen/konten/default4.jpg') ?>" class="img_pop pull-left">
                        </div>
                        <div class="pop_ornamen5">
                          <img id="pop_konten5" src="<?php echo base_url('assets/ornamen/konten/default5.jpg') ?>" class="img_pop pull-right">
                        </div>
                        <div class="pop_ornamen6">
                          <img id="pop_konten6" src="<?php echo base_url('assets/ornamen/konten/default6.jpg') ?>" class="img_pop pull-left">      
                        </div>
                        <div class="pop_bawah">
                          <img id="pop_bawah" src="<?php echo base_url('assets/ornamen/bawah/default.jpg') ?>" class="img_pop img-responsive">      
                        </div>
                        <div class="pop_gambar">
                          <!-- <img src="ornamen/foto2.jpg" class="img_pop img-responsive"> -->
                          <!-- <img src="ornamen/foto2.jpg" class="img_pop img-responsive"> -->
                          <div id="messages"></div>
                        </div>
                      </div>
                    </div>                  
                  <!-- end content pop up tube -->
                
                </div>
                
              </div>
              <hr class="hr-divider-ghost">
                <!-- konten interactive -->        
                <h3 class="title-v2">Ornamen Atas</h3>      
                <div id="ornamen-atas" class="owl-carousel head_part">
                  <?php foreach ($arr_ornamen_atas as $ornamen_atas): ?>
                    <div class="item ornamen_alt_atasbawah">
                      <a class=""><img class="img_alt_merch img-responsive" onclick="pop_atas(this)" src="<?php echo base_url("assets/ornamen/atas/".$ornamen_atas->gambar); ?>" alt="portfolio">
                      </a>    
                    </div>  
                  <?php endforeach ?>
                </div>
                <hr class="hr-divider-ghost">
                <h3 class="title-v2">Ornamen Konten 
                  <div id="tombol1" data-konten="pop_konten1" onclick="type_konten(this)" class="btn btn-primary">1</div>
                  <div id="tombol2" data-konten="pop_konten2" onclick="type_konten(this)" class="btn btn-primary">2</div>
                  <div id="tombol3" data-konten="pop_konten3" onclick="type_konten(this)" class="btn btn-primary">3</div>
                  <div id="tombol4" data-konten="pop_konten4" onclick="type_konten(this)" class="btn btn-primary">4</div>
                  <div id="tombol5" data-konten="pop_konten5" onclick="type_konten(this)" class="btn btn-primary">5</div>
                  <div id="tombol6" data-konten="pop_konten6" onclick="type_konten(this)" class="btn btn-primary">6</div>
                </h3>      
                <div id="ornamen-konten" class="owl-carousel">
                  <?php foreach ($arr_ornamen_konten as $ornamen_konten): ?>
                    <div class="item ornamen_alt_konten">
                      <a class=""><img class="img_alt_merch  img-responsive" src="<?php echo base_url("assets/ornamen/konten/".$ornamen_konten->gambar); ?>" onclick="pop_konten(this)" alt="portfolio">
                      </a>
                    </div>
                  <?php endforeach ?>
                </div>

                <h3 class="title-v2">Ornamen Bawah</h3>      
                <div id="ornamen-bawah" class="owl-carousel">
                  <?php foreach ($arr_ornamen_bawah as $ornamen_bawah): ?>
                    <div class="item ornamen_alt_atasbawah">
                      <a class=""><img class="img_alt_merch img-responsive" src="<?php echo base_url("assets/ornamen/Bawah/".$ornamen_bawah->gambar); ?>" onclick="pop_bawah(this)" alt="portfolio">
                      </a>
                    </div>
                  <?php endforeach ?>
                </div>
                <!-- end konten interactive -->              

        
              <hr class="hr-divider-ghost">          
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- END SECTION KONTEN -->
<script src="<?php echo base_url(); ?>assets/customs/js/filedrag_merchandise.js"></script>
