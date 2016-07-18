      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i id="dashboard" class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li id="halaman_depan" class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Halaman Depan</span>
                <span class="label label-primary pull-right">8</span>
              </a>
              <ul class="treeview-menu"><?php echo base_url(); ?>
                <li id="galeri"><a href="<?php echo base_url(); ?>admin/galeri"><i class="fa fa-circle-o"></i>Galeri</a></li>
                <li id="about"><a href="<?php echo base_url(); ?>admin/about"><i class="fa fa-circle-o"></i>About</a></li>
                <li id="faq"><a href="<?php echo base_url(); ?>admin/faq"><i class="fa fa-circle-o"></i>FAQ</a></li>
                <li id="testimoni"><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Testimoni</a></li>
                <li id="termncondition"><a href="<?php echo base_url(); ?>admin/termncondition"><i class="fa fa-circle-o"></i>Term N Condition</a></li>
                <li id="termncondition"><a href="<?php echo base_url(); ?>admin/howtoorder"><i class="fa fa-circle-o"></i>How To Order</a></li>
                <li id="bannerpromo"><a href="<?php echo base_url(); ?>admin/banner_promo"><i class="fa fa-circle-o"></i>Banner Promo</a></li>
                <li id="harga"><a href="<?php echo base_url(); ?>admin/harga"><i class="fa fa-circle-o"></i>Harga</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>admin/voucher"><i class="fa fa-book"></i> <span>Voucher</span></a></li>
            <!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->

            <!-- <li class="header">SISTEM</li> -->
            <li id="ornamen"><a href="<?php echo base_url(); ?>admin/ornamen"><i class="fa fa-paint-brush"></i><span>ornamen</span></a></li>
            <li id="pemesanan"><a href="<?php echo base_url(); ?>admin/pemesanan"><i class="fa fa-shopping-cart"></i><span>Pemesanan</span></a></li>
            <li id="pelanggan"><a href="<?php echo base_url(); ?>admin/pelanggan"><i class="fa fa-users"></i><span>Pelanggan</span></a></li>
            <li id="pengiriman"><a href="<?php echo base_url(); ?>admin/pengiriman"><i class="fa fa-truck"></i><span>pengiriman</span></a></li>
            <li id="pengaturan"><a href="<?php echo base_url(); ?>admin/pengaturan"><i class="fa fa-gear"></i><span>pengaturan</span></a></li>
            <li id="laporan"><a href="<?php echo base_url(); ?>admin/laporan"><i class="fa fa-book"></i><span>laporan</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>  

