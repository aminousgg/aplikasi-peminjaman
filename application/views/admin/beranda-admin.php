<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- baris icon beranda -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-inbox"></i></span>
              <div class="info-box-content">
                <a href="<?php echo base_url()?>admin/barang">Barang</a>
                <!--<span class="info-box-text">Barang</span>-->
                <span class="info-box-number"><?php echo $brg ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url()?>admin/anggota">Anggota</a>
                <!--<span class="info-box-text">Anggota</span>-->
                <span class="info-box-number"><?php echo $agt ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url()?>admin/pinjam">Peminjaman</a>
                <!--<span class="info-box-text">Peminjam</span>-->
                <span class="info-box-number"><?php echo $pinjam ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-files-o"></i></span>
              <div class="info-box-content">
              <a href="<?php echo base_url()?>admin/pinjam_barang">Pengembalian</a>
                <!--<span class="info-box-text">Transaksi</span>-->
                <span class="info-box-number"><?php echo $kembali ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
        <div class="row">
          <div class="col-md-4">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Anggota terdaftar</h3>
                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user1-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user8-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Norman</a>
                    <span class="users-list-date">Yesterday</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user7-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Jane</a>
                    <span class="users-list-date">12 Jan</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user6-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">John</a>
                    <span class="users-list-date">12 Jan</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user2-160x160.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander</a>
                    <span class="users-list-date">13 Jan</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user5-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Sarah</a>
                    <span class="users-list-date">14 Jan</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user4-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nora</a>
                    <span class="users-list-date">15 Jan</span>
                  </li>
                  <li>
                    <img src="<?php echo base_url()?>admin-lte-master/dist/img/user3-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nadia</a>
                    <span class="users-list-date">15 Jan</span>
                  </li>
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript::">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>

          </div>
        </div>
          



      </div><!-- /.container-fluid -->
      
      
    </section>
    <!-- /.content -->
    

</div>
