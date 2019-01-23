  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Data <?php //echo $judul; ?></h1> -->
            <div>
              <button class="btn btn-info" type="button">
                <i class="ion ion-android-add"></i>
              </button>
              Tambah Barang
            </div>
          </div>
          
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data </li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode barang</th>
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Jumlah</th>
                  <th>Tersedia</th>
                  <th>Terpinjam</th>
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
                  <th>Kode barang</th>
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Jumlah</th>
                  <th>Tersedia</th>
                  <th>Terpinjam</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>