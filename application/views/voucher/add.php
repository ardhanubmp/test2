      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            About
            <small>Menu About</small>
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
                  <h3 class="box-title">Data About</h3>
                </div>
                <div class="box-body">
                  <?php if (isset($status)): ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $status; ?>
                    </div>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <?php echo $status_query; ?>
                    </div>  
                  <?php endif ?>
                  
                  <form class="form-horizontal" action="<?php echo base_url() ?>voucher/addvoucherproses" method="post"
                  enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-md-2 control-label">Kode Voucher</label>
                      <div class="col-md-10">
                        <input name="kodevoucher" type="text" class="form-control"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Status</label>
                      <div class="col-md-10">
                        <input type="radio" name="status"  value="aktif">Aktif</input>
                        <input type="radio" name="status"  value="nonaktif">Nonaktif</input>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Persentase</label>
                      <div class="col-md-10">
                        <input class="form-control" type="text" name="persentase" placeholder="ketikkan persentase"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="Simpan" class="btn btn-primary "></input>                      
                      </div>
                    </div>
                  </form>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->