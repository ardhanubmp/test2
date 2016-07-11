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
                  <a href="<?php echo base_url(); ?>admin/galeri/addgaleri" class="btn btn-primary btn-flat pull-right">tambah</a>
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
                                        <button class="btn btn-flat btn-success" type="button" data-toggle="modal" data-target="#editGaleri" data-gambar="<?php echo $row->gambar; ?>" data-idgambar="<?php echo $row->id; ?>" data-deskripsi="<?php echo $row->deskripsi; ?>" data-judul="<?php echo $row->judul; ?>"> 
                                            <span class="fa fa-edit" ></span>
                                        </button>
                                        <button type="button" class="btn btn-flat btn-success" data-toggle="modal" data-target="#deleteGaleri" data-idgambar="<?php echo $row->id; ?>" data-link="<?php echo base_url(); ?>admin/galeri/deletegaleri/<?php echo $row->id; ?>">
                                            <span class="fa fa-trash"></span>
                                        </button>
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

<div class="modal fade" id="editGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/galeri/editGaleriProses">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Id:</label>
            <input name="idgambar" type="text" readonly="" class="form-control" id="idgambar">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Judul:</label>
            <input name="judulgambar" type="text" class="form-control" id="judulgambar">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Deskripsi:</label>
            <input name="deskripsigambar" type="text" class="form-control" id="deskripsigambar">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Gambar</label><br>
            <img src="" class="img-thumbnail" style="max-height: 100px" id="gambar">
            <input type="text" name="gambar_temp" id="gambar_temp"></input>
            <input name="gambar" type="file" class="form-control"></input>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
          </form>
      </div>
    </div>
  </div>
</div> 


<div class="modal fade" id="deleteGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        Apa Anda yakin akan menghapus gambar ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-primary">Delete Gambar</a>
        
      </div>
    </div>
  </div>
</div>  

