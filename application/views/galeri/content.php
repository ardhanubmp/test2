      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Galeri
            <small>Control Panel</small>
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
            <!-- Left col -->

            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Daftar Galeri</h3>
                  <a href="<?php echo base_url(); ?>galeri/addgaleri" class="btn btn-primary btn-flat pull-right">tambah</a>
                </div>
                <div class="box-body">
                  <?php if (isset($status)): ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $status; ?>
                    </div>            
                  <?php endif ?>
                  <div class="row">
                    <?php if (isset($data)): ?>
                    <?php foreach ($data as $row) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect img-thumbnail">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/uploads/galeri/<?php echo $row->gambar; ?>" alt="">
                                <div class="overlay">
                                    <h2>Perbesar</h2>
                                    <p class="icon-links">
                                        <a href="#" alt="edit foto">
                                            <span class="fa fa-edit" ></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </p>
                                </div>
                        </div>  
                    </div>
                    <?php } ?>
                    <?php endif ?>
                  </div>
                    
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->