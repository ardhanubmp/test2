      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pelanggan
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
                         

            <!-- Left col -->
            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Kota</h3>
                </div>
                <div class="box-body">
                  <table id="tablependuduk" class="table table-bordered table-hover" >
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>no kk</th>
                      <th>status</th>
                      <th>nomor Induk</th>
                      <th>aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($arr_penduduk as $penduduk): ?>
                        <tr>
                            <td><?php echo $penduduk->id; ?></td>
                            <td><?php echo $penduduk->nama_penduduk; ?></td>
                            <td><?php echo $penduduk->nomerkk; ?></td>
                            <td><?php echo $penduduk->status; ?></td>
                            <td><?php echo $penduduk->nik; ?></td>
                            <td>
                              <a href="<?php echo base_url('/admin/penduduk/tampil_anggota/'.$penduduk->nomerkk); ?>">Lihat Anggota Keluarga</a>
                              <button class="btn btn-danger" data-target="#deleteModal" data-toggle="modal" data-link="<?php echo base_url('admin/penduduk/hapus_kk/'.$penduduk->nomerkk); ?>"><i class="fa fa-trash" ></i>Hapus</button>
                            </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                      
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->



<!-- tambah data  -->
                      <section class="col-lg-12">

                        <!-- Chat box -->
                        <div class="box box-info">
                          <div class="box-header">
                            <i class="fa fa-comments-o"></i>
                            <h3 class="box-title">Tambah Kota</h3>
                          </div>
                          <div class="box-body">
                              <?php echo form_open('admin/penduduk/tambah',array('class'=>'form-horizontal')) ?>
                            <!-- <form class="form-horizontal"> -->
                              <div class="form-group">
                                <label class="control-label col-md-3">nama penduduk</label>
                                <div class="col-md-9">
                                  <input name="nama_penduduk" type="text" class="form-control" placeholder="nama"></input>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3">Nomer KK</label>
                                <div class="col-md-9">
                                  <input name="nomerkk" type="text" class="form-control" placeholder="01726371823691"></input>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3">Umur</label>
                                <div class="col-md-9">
                                  <input name="umur" type="text" class="form-control" placeholder="12"></input>
                                </div>
                              </div> 
                              <div class="form-group">
                                <label class="control-label col-md-3">Nomor Induk Kependudukan</label>
                                <div class="col-md-9">
                                  <input name="nik" type="text" class="form-control" placeholder="12"></input>
                                </div>
                              </div> 
                              <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-9">
                                  <input name="status" type="text" class="form-control" placeholder="1 = kepala keluarga"></input>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i>Simpan</button>
                                </div>
                              </div>
                            </form>
                          </div><!-- /.chat -->
                        </div><!-- /.box (chat box) -->
                      </section><!-- /.Left col -->
                                 

                                  <!-- modal -->
                                  <div class="modal fade modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Hapus Transaksi</h4>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda ingin menghapus <strong>SEMUA</strong> Data Penduduk dengan Kepala Keluarga ini ?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a id="linkDelete" class="btn btn-danger">Hapus</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
      </div>


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->