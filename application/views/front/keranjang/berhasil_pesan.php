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

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="text-theme">
                Berikut adalah Ringkasan Pemesanan anda
              </p>
              <?php if (!empty($arr_transaksi)): ?>
                <?php foreach ($arr_transaksi as $transaksi): ?>
                  <p class="text-theme">
                    <h3 class="text-theme title-xs hr-before">Kode Pemesanan</h3>
                    <p class="text-theme">#<?php echo $transaksi->id_transaksi; ?></p>
                    <h3 class="text-theme title-xs hr-before">Alamat Pengiriman</h3>
                    <p class="text-theme"><?php echo $transaksi->alamat_kirim; ?></p>
                    <h3 class="text-theme title-xs hr-before">Kota Pengiriman</h3>
                    <p class="text-theme"><?php echo $transaksi->nama_kota." ( Rp ".$transaksi->tarif.",- ) "; ?></p>
                    <h3 class="text-theme title-xs hr-before">Total bayar</h3>
                    <p class="text-theme"><a href="#grand_total">Rp <?php echo $total['grand_total']; ?></a></p>
                    <h3 class="text-theme title-xs hr-before">Tranfer ke</h3>
                    <p class="text-theme">
                      <strong style="text-transform: uppercase;"><?php echo $transaksi->tranfer_ke; ?></strong>
                    </p>
                    <h3 class="text-theme title-xs hr-before">Status</h3>
                    <p class="tex-theme"><b class="label label-warning"><?php echo $transaksi->status; ?></b></p>
                  </p>
                  <?php 
                    $voucher = $transaksi->id_voucher; 
                    $ongkir = $transaksi->tarif; 
                  ?>
                <?php endforeach ?>
              <?php endif ?>
            </div>
            <div class="col-md-6">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Info Pembayaran</h3>
                </div>
                <div class="panel-body">Segera lakukan Tranfer ke salah satu rekening berikut sesuai dengan <strong>Total bayar</strong> dibawah:
                  <ol>
                    <li>BNI (2214522) a.n Navyan Anggit Widyatmoko</li>
                    <li>Mandiri (1000000541275) a.n Navyan Anggit Widyatmoko</li>
                  </ol>
                  Lalu segera lakukan <a href="" target="_blank">konfirmasi</a> agar pemesanan cepat diproses. Terimakasih
                </div>
              </div>              
            </div>
          </div>
          <div class="row">
            <?php if (!empty($arr_transaksi_detail)): ?>
                <div class="col-md-12">
                  <h3 class="title-sm text-theme hr-before">Daftar Merchandise</h3>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Ucapan</th>
                              <th>Tema</th>
                              <th>Tambahan</th>
                              <th>Foto</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($arr_transaksi_detail as $transaksi_detail): ?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $transaksi_detail->ucapan; ?></td>
                              <td><?php echo $transaksi_detail->tema; ?></td>
                              <td><?php echo $transaksi_detail->tambahan; ?></td>
                              <td>
                                <a href="<?php echo base_url(); ?>assets/uploads/orders/<?php echo $transaksi_detail->gambar; ?>" target="_blank">
                                  <img src="<?php echo base_url(); ?>assets/uploads/orders/<?php echo $transaksi_detail->gambar; ?>" class="img-responsive img-thumbnail thumb_keranjang">
                                </a>
                              </td>
                              <td class="text-right"><h3 class="text-theme title-md"><strong>Rp <?php echo $transaksi_detail->sub_total; ?></strong></h3></td>
                          </tr>
                        <?php endforeach ?>

                          <tr id="grand_total">
                            <td colspan="3"></td>
                            <td>Total</td>
                            <td class="text-right"><h3 class="text-theme title-md"><strong>Rp <?php echo $total['sub_total']; ?></strong></h3></td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td>Pot Voucher</td>
                            <td class="text-right">
                              <h3 class="text-theme title-md">
                                <?php if (is_null($voucher)): ?>
                                  <strong>(-)</strong>
                                <?php else: ?>
                                  <strong>(-) Rp <?php echo $total['potongan']; ?></strong>
                                <?php endif ?>
                              </h3>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td class="btn-sea">Sub Total</td>
                            <td class="btn-sea text-right"><h3 class=" text-theme title-md">
                              <?php if (is_null($voucher)): ?>
                                <strong>Rp <?php echo $total['sub_total']; ?></strong></h3>
                              <?php else: ?>
                                <strong>Rp <?php echo $total['sub_total_after']; ?></strong></h3>
                              <?php endif ?>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td>Ongkir</td>
                            <td class="text-right"><h3 class="text-theme title-md"><strong>(+) Rp <?php echo $ongkir; ?></strong></h3></td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td class="btn-green">Total Bayar</td>
                            <td class="btn-green text-right" ><h3 class="text-theme title-md">
                                <strong>Rp <?php echo $total['grand_total'] ?></strong>
                            </h3></td>
                          </tr>
                      </tbody>
                  </table>
                </div>
            <?php endif ?>
                
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

 