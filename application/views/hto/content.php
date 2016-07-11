      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
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
            <!-- Left col -->
            <section class="col-lg-12">

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Data About</h3>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                    <?php foreach ($data as $row) { ?>
                      <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo substr($row->deskripsi, 0,100)."..."; ?></td>
                        <td><?php echo $row->gambar; ?></td>
                        <td>
                          <a class="btn btn-flat btn-primary" href="<?php echo base_url(); ?>admin/howtoorder/editHto">Ubah</a>
                        </td>
                      </tr>
                    <?php } ?>
                    
                  </table>
                </div><!-- /.chat -->
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->

          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->