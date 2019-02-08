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
    <?php echo form_open_multipart('admin/tambah_barang_aksi', array('role' => 'form', 'id'=>'uploadForm'))?>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <label>Nama Barang</label>
                                    <input name="nama_barang" placeholder="Nama Barang" type="text" class="form-control">
                                  </div>
                                  <div class="col">
                                    <label>Merk</label>
                                    <input name="merk" placeholder="Merk" type="text" class="form-control">
                                  </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <label>Kategori</label>
                                  <input name="kategori" placeholder="Kategori" type="text" class="form-control">
                                </div>
                                <div class="col">
                                  <label>Tgl Masuk</label>
                                  <input name="tgl_masuk" type="date" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Unit</label>
                                <input type="text" name="jml_barang" class="form-control" placeholder="Angka">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <input type="text" name="spesifikasi" class="form-control" placeholder="Spesifikasi">
                            </div>
                            
                        </div>
                    <!-- /.card-body -->
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Sertakan Foto</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Upload Foto</label>
                      </div>
                      <input type="file" name="file" id="file" require>
                      <div class="kotakUp" id="gambar">
                      
                      </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /.row -->
    <?php echo form_close(); ?>
    </section>
    <!-- /.content -->
</div>