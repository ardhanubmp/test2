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
        <!-- SIDE NAV -->
        <!--===============================================================-->
        <?php $this->load->view('front/template/menu_member'); ?>
        <!-- END SIDE NAV -->

        <!-- CONTENT COLUMN -->
        <!--===============================================================-->
          
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-v2">Isi Keranjang dari pemesanan anda</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

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
          <div class="row">
            <div class="col-md-12">
              <a href="keranjang.html" class="btn btn-red margin-b-10"><i class="fa fa-arrow-left"></i>kembali</a>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Informasi Merchandise</h3>
                </div>
                <div class="panel-body">
                  <?php if (!empty($arr_keranjang)): ?>
                    <?php foreach ($arr_keranjang as $keranjang): ?>
                      <div class="row">
                        <div class="col-md-6">
                          <!-- <img src="https://placehold.it/400x500" class="img-responsive"> -->
<div class="popuptube pull-left" id="content">
  <div class="base">
    <div class="pop_atas">
      <img src="<?php echo base_url(); ?>assets/ornamen/atas/atas.jpg" draggable="false" class="img_pop">
    </div>
    <div class="pop_ornamen1">
      <img src="<?php echo base_url(); ?>assets/ornamen/konten/1.jpg" class="img_pop">
    </div>
    <div class="pop_ornamen4">
      <img src="<?php echo base_url(); ?>assets/ornamen/konten/4.jpg" class="img_pop">
    </div>
    <div class="pop_ornamen2">
      <img src="<?php echo base_url(); ?>assets/ornamen/konten/2.jpg" class="img_pop">
    </div>
    <div class="pop_ornamen5">
      <img src="<?php echo base_url(); ?>assets/ornamen/konten/5.jpg" class="img_pop">
    </div>
    <div class="pop_ornamen3">
      <img src="<?php echo base_url(); ?>assets/ornamen/konten/3.jpg" class="img_pop">
    </div>
    <div class="pop_ornamen6">
      <img src="<?php echo base_url(); ?>assets/ornamen/konten/6.jpg" class="img_pop">      
    </div>
    <div class="pop_bawah">
      <img src="<?php echo base_url(); ?>assets/ornamen/bawah/bawah.jpg" class="img_pop">      
    </div>
    <div class="pop_gambar">
      <img src="<?php echo base_url(); ?>assets/uploads/orders/<?php echo $keranjang->gambar ?>" class="img_pop">
    </div>
  </div>
</div>                          
                        </div>
                        <div class="col-md-6">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td>Ucapan atas</td>
                                <td>Ucapan Bawah</td>
                                <td>Foto</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $keranjang->ucapan_atas ?></td>
                                <td><?php echo $keranjang->ucapan_bawah ?></td>
                                <td>
                                <a href="<?php echo base_url('assets/uploads/orders')."/".$keranjang->gambar; ?>" target="_blank">
                                  <img src="<?php echo base_url('assets/uploads/orders')."/".$keranjang->gambar; ?>" class="img-thumbnail thumb_keranjang"></td>
                                </a>
                              </tr>
                            </tbody> 
                          </table>
                        </div>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
                      
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-divider-ghost">
        </div>


      </div>
    </div>
<!-- END SECTION KONTEN -->

<script type="text/javascript">
window.pilih_alamat = function() {
  if(document.getElementById("alamat_baru1").checked) {
    document.getElementById("input_alamat").readOnly = false;
    document.getElementById("input_alamat").value = '';
  } else {
    document.getElementById("input_alamat").readOnly = true;
    document.getElementById("input_alamat").value = '<?php echo $alamat_user; ?>';
  }
}  
window.onload = pilih_alamat();
</script>


<!-- modal konfirmasi hapus -->
<div class="modal fade" id="deleteKeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h4>
      </div>
      <div class="modal-body">
        Apa Anda yakin akan menghapus Pesanan ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a class="btn btn-primary">Hapus</a>
        
      </div>
    </div>
  </div>
</div>  