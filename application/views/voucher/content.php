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
                  <a class="btn btn-success btn-flat pull-right" href="<?php echo base_url(); ?>voucher/addvoucher">Tambah Voucher</a>
                </div>
                <div class="box-body">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Kode Voucher</th>
                      <th>Status</th>
                      <th>Persentase</th>
                      <th>Aksi</th>
                    </tr>
                    <?php foreach ($data as $row) { ?>
                      <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->kode_voucher; ?></td>
                        <td>
                          <?php 
                          if ($row->status=='aktif') {
                            echo '<a href="'.base_url().'voucher/ubahstatus/'.$row->id.'/nonaktif" class="btn btn-success btn-flat">'.$row->status.'</a>';
                          }else{
                            echo '<a href="'.base_url().'voucher/ubahstatus/'.$row->id.'/aktif" class="btn btn-danger btn-flat">'.$row->status.'</a>';
                          }
                          ?>
                        </td>
                        <td><?php echo $row->persentase; ?></td>
                        <td>
                          <a class="btn btn-flat btn-warning" href="<?php echo base_url().'voucher/deletevoucher/'.$row->id; ?>"><i class="fa fa-trash"></i> Hapus</a>
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