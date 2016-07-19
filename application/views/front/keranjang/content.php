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

              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Ucapan</th>
                          <th>Tema</th>
                          <th>Tambahan</th>
                          <th>Total</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($arr_keranjang as $keranjang): ?>
                      <tr>
                          <td><?php echo $keranjang->id_keranjang; ?></td>
                          <td><?php echo $keranjang->ucapan; ?></td>
                          <td><?php echo $keranjang->tema; ?></td>
                          <td><?php echo $keranjang->tambahan; ?></td>
                          <td><?php echo $harga; ?></td>
                          <td>
                            <a href="<?php echo base_url(); ?>assets/uploads/orders/<?php echo $keranjang->gambar; ?>" target="_blank">
                              <img src="<?php echo base_url(); ?>assets/uploads/orders/<?php echo $keranjang->gambar; ?>" class="img-responsive img-thumbnail thumb_keranjang">
                            </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-rounded btn-red" data-toggle="modal" data-target="#deleteKeranjang" data-link="<?php echo base_url(); ?>member/keranjang/hapus/<?php echo $keranjang->id_keranjang; ?>">
                              <i class="fa fa-trash "></i>Hapus
                            </button>
                            <a href="<?php echo base_url('member/keranjang/detail/'.$keranjang->id_keranjang); ?>" class="btn btn-rounded btn-green" title="Hapus"><i class="fa fa-eye"></i>Lihat</a>
                          </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
              </table>
            </div>
          </div>
          <?php if (!empty($arr_keranjang)): ?>
          <div class="row">
            <div class="col-md-6 col-md-offset-6 col-sm-12">
            <?php echo form_open('member/keranjang/proses_pesan',array('class'=>'form-horizontal')); ?>
              <!-- <form method="post" action="" class="form-horizontal"> -->
                <div class="form-group">
                  <label class="control-label col-sm-3" for="inputEmail">Voucher</label>
                  <div class="col-sm-9">
                    <input name="kode_voucher" class="form-control " id="inputEmail2" placeholder="Kode Voucher Jika ada" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="inputEmail">Kota</label>
                  <div class="col-sm-9">
                    <!-- <input name="nama_kota" class="form-control " id="inputEmail2" placeholder="Kode Voucher Jika ada" type="text">
                    <input name="id_kota" class="form-control " id="inputEmail2" placeholder="Kode Voucher Jika ada" type="hidden"> -->
                    <select name="id_kota" class="form-control" style="width: 100%;">
                      <?php foreach ($arr_kota as $kota): ?>
                      <option value="<?php echo $kota->id_kota ?>"><?php echo $kota->nama_kota ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                 
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="inputEmail">Alamat Pengiriman</label>
                  <div class="col-sm-9">
                    <input name="pil_alamat" type="radio" value="alamat_lama" id="alamat_lama" onclick="pilih_alamat()">Alamat Anda</input>
                    <input name="pil_alamat" type="radio" value="alamat_baru" id="alamat_baru1" onclick="pilih_alamat()">Alamat baru</input>
                    <textarea name="alamat" class="form-control" id="input_alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="inputEmail">Tranfer ke</label>
                  <div class="col-sm-9">
                    <select name="tranfer_ke" class="form-control ">
                      <option value="bni">BNI</option>
                      <option value="mandiri">Mandiri</option>
                    </select>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                    <input name="proses_pesan" class="form-control btn-red" id="inputEmail2" type="submit" value="Proses Pesan">
                  </div>
                </div>
              <!-- <a href="proses-pesan.html" class="btn btn-red pull-right"><i class="fa fa-pencil-square-o"></i>Proses Pesan</a>               -->
              </form>
            </div>
            <div class="col-md-4 col-md-offset-4">
            </div>
          </div>
          <?php endif ?>
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