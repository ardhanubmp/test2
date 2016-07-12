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
        <div class="col-md-3">
          <div class="row">
            <div class="col-md-12">

              <div class="panel-group accordion nav-side" id="accor">
                <div class="panel accordion-group">

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="dashboard.html">
                      <i class="fa fa-dashboard"></i>Dashboard
                    </a>
                  </div>
                  <div class="accordion-heading bg-primary">
                    <a class=" accordion-toggle" href="merchandise.html">
                      <i class="fa fa-cube"></i>Buat Merchandise
                    </a>
                  </div>
                  <div class="accordion-heading ">
                    <a class=" accordion-toggle icon-toggle" data-toggle="collapse" data-parent="#accor" href="#accor-2">
                      <i class="fa fa-shopping-cart"></i>Transaksi
                    </a>
                  </div>
                  <div id="accor-2" class="accordion-body collapse ">
                    <div class="accordion-inner">
                      <ul class="list-unstyled">
                        <li>
                          <a class="" href="history.html">History</a>
                          <a class="" href="keranjang.html">Keranjang</a>
                          <a class="" href="konfirmasi.html">Konfirmasi</a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="pengaturan.html">
                      <i class="fa fa-gear"></i>Pengaturan
                    </a>
                  </div>

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="testimoni.html">
                      <i class="fa fa-lightbulb-o"></i>Testimoni
                    </a>
                  </div>

                  <div class="accordion-heading">
                    <a class=" accordion-toggle" href="ubah-password.html">
                      <i class="fa fa-lock"></i>Ubah Password
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- CONTENT COLUMN -->
        <!--===============================================================-->
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title-v2">Ringkasan Pemesanan</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="text-theme">
                Berikut adalah Ringkasan Pemesanan anda
              </p>
              <p class="text-theme">
                <h3 class="text-theme title-xs hr-before">Kode Pemesanan</h3>
                <p class="text-theme">#332</p>
                <h3 class="text-theme title-xs hr-before">Alamat Pengiriman</h3>
                <p class="text-theme">Nitikan Uh 7 / 317 yogyakarta</p>
                <h3 class="text-theme title-xs hr-before">Kota Pengiriman</h3>
                <p class="text-theme">Yogyakarta</p>
                <h3 class="text-theme title-xs hr-before">Total bayar</h3>
                <p class="text-theme"><a href="#grand_total">Rp 115000</a></p>
                <h3 class="text-theme title-xs hr-before">Status</h3>
                <span class="label label-warning">Ditunda</span>
              </p>
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
            <div class="col-md-12">
              <h3 class="title-sm text-theme hr-before">Daftar Merchandise</h3>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Ucapan atas</th>
                          <th>Ucapan bawah</th>
                          <th>Foto</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Selamat menikah</td>
                          <td>Samawa</td>
                          <td>
                            <img src="http://placehold.it/100x100" class="img-responsive img-thumbnail">
                          </td>
                          <td class="text-right"><h3 class="text-theme title-md"><strong>Rp 60000</strong></h3></td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td>Selamat menikah</td>
                          <td>Samawa</td>
                          <td>
                            <img src="http://placehold.it/100x100" class="img-responsive img-thumbnail">
                          </td>
                          <td class="text-right"><h3 class="text-theme title-md"><strong>Rp 60000</strong></h3></td>
                      </tr>
                      <tr id="grand_total">
                        <td colspan="3"></td>
                        <td>Total</td>
                        <td class="text-right"><h3 class="text-theme title-md"><strong>Rp 120000</strong></h3></td>
                      </tr>
                      <tr>
                        <td colspan="3"></td>
                        <td>Pot Voucher</td>
                        <td class="text-right"><h3 class="text-theme title-md"><strong>(-) Rp 20000</strong></h3></td>
                      </tr>
                      <tr>
                        <td colspan="3"></td>
                        <td class="btn-sea">Sub Total</td>
                        <td class="btn-sea text-right"><h3 class=" text-theme title-md"><strong>Rp 100000</strong></h3></td>
                      </tr>
                      <tr>
                        <td colspan="3"></td>
                        <td>Ongkir</td>
                        <td class="text-right"><h3 class="text-theme title-md"><strong>Rp 15000</strong></h3></td>
                      </tr>
                      <tr>
                        <td colspan="3"></td>
                        <td class="btn-green">Total Bayar</td>
                        <td class="btn-green text-right" ><h3 class="text-theme title-md"><strong>Rp 115000</strong></h3></td>
                      </tr>
                  </tbody>
              </table>
            </div>
          </div>
          <hr class="hr-divider-ghost">


        </div>
      </div>
    </div>
<!-- END SECTION KONTEN -->
 