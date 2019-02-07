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
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Masukan Data Anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart('admin/tambah_agt_aksi', array('role' => 'form'))?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control" placeholder="NIP">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                                <label>Golongan</label>
                                <input type="text" name="pangkat_golongan" class="form-control" placeholder="Golongan">
                            </div> 
                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" name="seksi" class="form-control" placeholder="Seksi Bagian">
                            </div>
                            <div class="form-group">
                                <label>Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Level User</label>
                                <select name="level_user" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
