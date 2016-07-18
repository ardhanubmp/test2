<?php foreach ($arr_transaksi as $transaksi): ?>
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pemesanan
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">
              <?php if (!empty($this->session->flashdata('msg_success'))): ?>
                <!-- alert jika sukses simpan -->
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('msg_success'); ?>
                </div>
              <?php endif ?>

              <?php if (!empty($this->session->flashdata('msg_error'))): ?>
                <!-- alert jika ada error ketika upload -->
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('msg_error'); ?>
                </div>
              <?php endif ?>

              <!-- alert jika ada form error -->
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>              
            </div>
          </div>
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-6">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">informasi</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h3>Tanggal Pesan</h3>
                      <?php echo $transaksi->tgl_pesan; ?>
                      <h3>Kode Voucher</h3>
                      <?php if (!empty($transaksi->id_voucher)): ?>
                        <?php echo $transaksi->kode; ?> (<?php echo $transaksi->persen; ?>%)
                      <?php else: ?>
                        -
                      <?php endif ?>
                    </div>
                    <div class="col-md-6">
                      <h3>Kota Pengiriman</h3>
                      <?php echo $transaksi->nama_kota; ?> <span class="badge bg-green">Rp <?php echo $transaksi->tarif; ?></span>
                      <H3>Alamat</H3>
                      <?php echo $transaksi->alamat; ?>
                    </div>
                  </div>
                </div><!-- /.chat -->
              </div>
              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Status dan Pengiriman</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td>Status</td>
                            <td>
                              <?php if ($transaksi->status=='pending'): ?>
                              <h3 class="title-sm bg-orange text-center big-label">Pending</h3>
                              <?php elseif($transaksi->status=='terkonfirmasi'): ?>
                              <h3 class="title-sm bg-aqua text-center big-label">Terkonfirmasi</h3>
                              <?php elseif($transaksi->status=='proses'): ?>
                              <h3 class="title-sm bg-blue text-center big-label">Proses</h3>
                              <?php elseif($transaksi->status=='kirim'): ?>
                              <h3 class="title-sm bg-green text-center big-label">Dikirim</h3>
                              <?php endif ?>
                            </td>

                          </tr>
                          <tr>
                            <td>No Resi</td>
                            <td><?php echo $transaksi->no_resi; ?></td>
                          </tr>
                          <?php foreach ($arr_konfirmasi as $konfirmasi): ?>
                          <tr>
                            <td>Bukti Pembayaran</td>
                            <td>
                              <a href="<?php echo base_url('assets/uploads/konfirmasi/'.$konfirmasi->bukti); ?>" target="_blank"><img src="<?php echo base_url('assets/uploads/konfirmasi/'.$konfirmasi->bukti); ?>" class="img-thumbnail thumb_foto"></a></td>
                          </tr>
                          <tr>
                            <td class="bg-navy">Catatan</td>
                            <td class="bg-navy"><?php echo $konfirmasi->catatan; ?></td>
                          </tr>
                          <?php endforeach ?>

                        </tbody>
                      </table>
                      <?php echo form_open('admin/pemesanan/ubah_status',array('class'=>'form')); ?>
                      <!-- <form class="form"> -->
                        <div class="form-group">
                          <label class="control-label">Ubah Status</label>
                          <select name="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="terkonfirmasi">terkonfirmasi</option>
                            <option value="proses">proses</option>
                            <option value="kirim">kirim</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <input name="id_transaksi" type="hidden" value="<?php echo $transaksi->id_transaksi; ?>"></input>
                          <input type="submit" class="btn btn-default form-control btn-flat" value="Ubah Status"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <?php echo form_open('admin/pemesanan/ubah_resi',array('class'=>'form')); ?>
                      <!-- <form class="form"> -->
                        <div class="form-group">
                          <label class="control-label">No Resi</label>
                          <input name="no_resi" type="text" class="form-control"></input>
                        </div>
                        <div class="form-group">
                          <input name="id_transaksi" type="hidden" value="<?php echo $transaksi->id_transaksi; ?>"></input>
                          <input type="submit" class="btn btn-default form-control btn-flat" value="Ubah No Resi"></input>
                        </div>
                      </form>
                    </div>
                  </div>
                </div><!-- /.chat -->
              </div>
              
              
              <!-- /.box (chat box) -->
            </section><!-- /.Left col -->

            <!-- Right col -->
            <section class="col-lg-6">

              <!-- box merchandise -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Merchandise</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Ucapan</th>
                        <th>Tema</th>
                        <th>Tambahan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_transaksi_detail as $transaksi_detail): ?>  
                      <tr>
                        <td><?php echo $transaksi_detail->ucapan; ?></td>
                        <td><?php echo $transaksi_detail->tema; ?></td>
                        <td><?php echo $transaksi_detail->tambahan; ?></td>
                        <td><img src="<?php echo base_url('assets/uploads/orders/'.$transaksi_detail->gambar); ?>" class="img-thumbnail thumb_foto"></td>
                        <td>
                          <button class="btn btn-default" data-target="#viewMerchandise" data-toggle="modal"
                          data-ornamenatas="<?php echo $transaksi_detail->ornamen_atas; ?>"
                          data-ornamenkonten1="<?php echo $transaksi_detail->ornamen1; ?>"
                          data-ornamenkonten2="<?php echo $transaksi_detail->ornamen2; ?>"
                          data-ornamenkonten3="<?php echo $transaksi_detail->ornamen3; ?>"
                          data-ornamenkonten4="<?php echo $transaksi_detail->ornamen4; ?>"
                          data-ornamenkonten5="<?php echo $transaksi_detail->ornamen5; ?>"
                          data-ornamenkonten6="<?php echo $transaksi_detail->ornamen6; ?>"
                          data-ornamenbawah="<?php echo $transaksi_detail->ornamen_bawah; ?>"
                          data-gambar="<?php echo $transaksi_detail->gambar; ?>"
                          ><i class="fa fa-search-plus"></i></button>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div><!-- /.chat -->
              </div>
              <!-- box merchandise -->
              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Biaya</h3>
                </div>
                <div class="table-responsive no-padding">               
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Total</td>
                        <td><h3 class="pull-right title-md">RP <?php echo $total['sub_total']; ?></h3></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Potongan Voucher</td>
                        <td><h3 class="pull-right title-md">
                          <?php if (empty($transaksi->id_voucher)): ?>
                            (-)
                          <?php else: ?>
                            (-)Rp <?php echo $total['potongan']; ?></h3></td>
                          <?php endif ?>
                      </tr>
                      <tr>
                        <td colspan="2" class="bg-light-blue">Sub Total</td>
                        <td class="bg-blue"><h3 class="pull-right title-md">
                          <?php if (empty($transaksi->id_voucher)): ?>
                            Rp <?php echo $total['sub_total']; ?>
                          <?php else: ?>
                            Rp <?php echo $total['sub_total_after']; ?>
                          <?php endif ?>
                        </h3></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td >Ongkir</td>
                        <td><h3 class="pull-right title-md">(+)Rp <?php echo $transaksi->tarif; ?></h3></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="bg-light-blue">Total Bayar</td>
                        <td class="bg-blue"><h3 class="pull-right title-md">Rp <?php echo $transaksi->total_bayar; ?></h3></td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
              <!-- Chat box -->
            </section><!-- /.Right col -->


            <!-- Modal -->
            <div class="modal fade" id="viewMerchandise" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detail Merchandise</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                              <div class="popuptube center-block" id="content">
                                <div class="base">
                                  <div class="pop_atas">
                                    <img id="linkornamenatas" draggable="false" class="img_pop img-responsive">
                                  </div>
                                  <div class="pop_ornamen1">
                                    <img id="linkornamen1" class="img_pop pull-right">
                                  </div>
                                  <div class="pop_ornamen2">
                                    <img id="linkornamen2" class="img_pop pull-left">
                                  </div>
                                  <div class="pop_ornamen3">
                                    <img id="linkornamen3" class="img_pop pull-right">
                                  </div>
                                  <div class="pop_ornamen4">
                                    <img id="linkornamen4" class="img_pop pull-left">
                                  </div>
                                  <div class="pop_ornamen5">
                                    <img id="linkornamen5" class="img_pop pull-right">
                                  </div>
                                  <div class="pop_ornamen6">
                                    <img id="linkornamen6" class="img_pop pull-left">      
                                  </div>
                                  <div class="pop_bawah">
                                    <img id="linkornamenbawah" class="img_pop img-responsive">      
                                  </div>
                                  <div class="pop_gambar">
                                    <img id="linkgambar" class="img_pop img-responsive">
                                  </div>
                                </div>
                              </div>
                      </div>
                      <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Ornamen</th>
                                    <th>Kode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Atas</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Konten 1</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Konten 1</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Konten 1</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Konten 1</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Konten 1</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Konten 1</td>
                                    <td>A1234</td>
                                </tr>
                                <tr>
                                    <td>Bawah</td>
                                    <td>A1234</td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                    </div>
                              
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php endforeach ?>
