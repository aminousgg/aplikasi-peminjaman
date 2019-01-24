 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Data <?php //echo $judul; ?></h1> -->
            
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Peminjaman Barang</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-8">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Peminjam</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="padding-left:4px;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Nama Barang</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl kembali</th>
                  <th>Stattus</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->kode_barang ?></td>
                    <td><?php echo $row->nama_barang ?></td>
                    <td><?php echo $row->merk ?></td>
                    <td><?php echo $row->jml_barang ?></td>
                    <td><?php echo $row->jml_tersedia ?></td>
                    <td><?php echo $row->jml_terpinjam ?></td>
                    <td>
                      <div class="button-group">
                        <button type="button" class="btn btn-info"> <i class="ion ion-ios-more"></i> </button>
                        <button type="button" class="btn btn-warning"> <i class="ion ion-edit"></i> </button>
                        <button type="button" class="btn btn-danger"> <i class="ion ion-android-delete"></i> </button>
                      </div>
                    </td>
                    <?php $i++; ?>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Nama Barang</th>
                  <th>Tgl Pinjam</th>
                  <th>Tgl kembali</th>
                  <th>Stattus</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-4">
          <div class="info-box mb-3 bg-success" style="cursor: pointer;" onclick="link()" >
              <span class="info-box-icon"><i class="ion ion-android-add"></i></span>

              <div class="info-box-content">
                <span style="margin-top:13px;" class="info-box-number">Pinjam Barang</span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
            }
          </script>
          <div class="card bg-light-gradient">
            <div class="card-header no-border">
              <h3 class="card-title">
                <i class="fa fa-calendar"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <div class="dropdown-menu float-right" role="menu">
                    <a href="#" class="dropdown-item">Add new event</a>
                    <a href="#" class="dropdown-item">Clear events</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">View calendar</a>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                  <i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
              <!-- /.card-body -->
          </div>

        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>