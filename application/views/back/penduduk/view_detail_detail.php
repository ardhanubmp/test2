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
                  <div class="form-horizontal">
                      <?php foreach ($arr_penduduk as $penduduk): ?>

                        <div class="form-group">
                          <label class="col-md-2 control-label">nama</label>
                          <div class="col-md-10">
                              <label class="control-label"><?php echo $penduduk->nama_penduduk; ?><br></label>
                         </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">nama</label>
                          <div class="col-md-10">
                              <label class="control-label"><?php echo $penduduk->nomerkk; ?><br></label>
                         </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-2 control-label">nama</label>
                          <div class="col-md-10">
                              <label class="control-label"><?php echo $penduduk->nama_penduduk; ?><br></label>
                         </div>
                        </div>
                      <?php endforeach ?>
                  </div>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->
            </section><!-- /.Left col -->


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->