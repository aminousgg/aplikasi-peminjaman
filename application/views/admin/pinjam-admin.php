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
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Peminjam</h3>
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Pinjam Barang</button>
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body" style="padding-left:4px;">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="font-size:13px;">NIP</th>
                  <th style="font-size:13px;">Nama</th>
                  <th style="font-size:13px;">Nama Barang</th>
                  <th style="font-size:13px;">Unit</th>
                  <th style="font-size:13px;">Estimasi Kembali</th>
                  <th style="font-size:13px;">Stattus</th>
                  <th style="font-size:13px;">Aksi</th>
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
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="font-size:13px;">NIP</th>
                  <th style="font-size:13px;">Nama</th>
                  <th style="font-size:13px;">Nama Barang</th>
                  <th style="font-size:13px;">Unit</th>
                  <th style="font-size:13px;">Estimasi Kembali</th>
                  <th style="font-size:13px;">Stattus</th>
                  <th style="font-size:13px;">Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
        
    </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
</div>