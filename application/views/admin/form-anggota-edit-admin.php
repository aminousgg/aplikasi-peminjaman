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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Detail Anggota
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <!--<small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        --></blockquote>
                    </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Masukan Data Anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart('admin/tambah_anggota', array('role' => 'form'))?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip" class="form-control" value="<?php echo $angg['nip'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $angg['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" value="<?php echo $angg['jabatan'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Golongan</label>
                                <input type="text" name="pangkat_golongan" class="form-control" value="<?php echo $angg['pangkat_golongan'] ?>">
                            </div> 
                            <div class="form-group">
                                <label>Seksi Bagian</label>
                                <input type="text" name="seksi" class="form-control" value="<?php echo $angg['seksi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control"value="<?php echo $angg['tgl_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Level User</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">User</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                        </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
