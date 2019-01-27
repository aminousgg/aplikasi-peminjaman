<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <button class="btn btn-info" type="button">
          <i class="ion ion-android-add"></i>
          </button> -->
          <button class="btn btn-info" type="button">
            <i class="ion ion-ios-printer-outline"></i>
          </button>
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pengembalian Barang</li>
          </ol> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Barang Kembali</h3>
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Pinjam Barang</button>
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Peminjam</th>
                  <th>Nama barang</th>
                  <th>Nama</th>
                  <th>Tgl pinjam</th>
                  <th>Tgl Pengembalian</th>
                  <th>Status</th>
                    
                </tr>
              </thead>
              <tbody>
                  
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                    <th>ID Peminjam</th>
                    <th>Nama barang</th>
                    <th>Nama</th>
                    <th>Tgl pinjam</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status</th>
                    
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

