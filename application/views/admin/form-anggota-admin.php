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
   
    <?php echo form_open_multipart('admin/tambah_agt_aksi', array('role' => 'form', 'id'=>'uploadForm'))?>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Daftarkan Anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <label>NIP</label>
                                    <input name="nip" placeholder="NIP" type="text" class="form-control" required>
                                  </div>
                                  <div class="col">
                                    <label>Nama</label>
                                    <input name="nama" placeholder="Nama" type="text" class="form-control" required>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <label>Jabatan</label>
                                  <input name="jabatan" placeholder="Jabatan" type="text" class="form-control" required>
                                </div>
                                <div class="col">
                                  <label>Golongan</label>
                                  <input name="pangkat_golongan" placeholder="Golongan" type="text" class="form-control" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" name="seksi" class="form-control" placeholder="Bidang" required>
                            </div>
                            <div class="form-group">
                                <label>Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" required>
                            </div>
                            <!-- <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <label>Tgl Lahir</label>
                                  <input type="date" name="tgl_lahir" class="form-control">
                                </div>
                                <div class="col">
                                  <label>Level User</label>
                                  <select name="level_user" class="form-control select2" style="width: 100%;">
                                      <option selected="selected" value="user">User</option>
                                      <option value="admin">Admin</option>
                                  </select>
                                </div>
                              </div>
                            </div> -->
                        </div>
                    <!-- /.card-body -->

                    <!-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div> -->
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Daftarkan Anggota</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Upload Foto</label>
                      </div>
                      <input type="file" name="file" id="file" required>
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
