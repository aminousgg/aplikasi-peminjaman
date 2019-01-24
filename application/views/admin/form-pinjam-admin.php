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
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Masukan Data peminjaman</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" placeholder="NIP">
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="jabatan">
                  </div>
                  <div class="form-group">
                    <label>Seksi Bagian</label>
                    <input type="text" class="form-control" placeholder="Seksi">
                  </div>
                  <fieldset disabled>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?php echo $pilih ?>">
                  </div>
                  </fieldset>
                  <div class="form-group">
                    <label>Tgl Pinjam</label>
                    <input type="Date" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tgl Kembali</label>
                    <input type="Date" class="form-control">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
        <div class="col-md-2"></div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>