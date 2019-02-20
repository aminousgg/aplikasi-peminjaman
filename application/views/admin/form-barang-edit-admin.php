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
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/edit_brg', array('role' => 'form', 'id'=>'uploadForm'))?>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" value="<?php echo $brg['nama_barang']?>">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <label>Kategori</label>
                                    <!-- <input name="kategori" value="<?php echo $brg['kategori']?>" type="text" class="form-control"> -->
                                    <select name="kategori" class="form-control">
                                        <!-- <option hidden value="">Pilih Ketgori</option> -->
                                        <?php if($brg['kategori']=="kendaraan") { ?>
                                            <option value="kendaraan">Kendaraan</option>
                                            <option value="teknis">Peralatan Teknis</option>
                                            <option value="elektronik">Elektronik</option>
                                            <option value="perpus">Perpustakaan</option>
                                            <option value="lain-lain">Lain-lain</option>
                                        <?php }elseif($brg['kategori']=="teknis"){ ?>
                                            <option value="teknis">Peralatan Teknis</option>
                                            <option value="kendaraan">Kendaraan</option>
                                            <option value="elektronik">Elektronik</option>
                                            <option value="perpus">Perpustakaan</option>
                                            <option value="lain-lain">Lain-lain</option>
                                        <?php }elseif($brg['kategori']=="elektronik"){ ?>
                                            <option value="elektronik">Elektronik</option>
                                            <option value="teknis">Peralatan Teknis</option>
                                            <option value="kendaraan">Kendaraan</option>
                                            <option value="perpus">Perpustakaan</option>
                                            <option value="lain-lain">Lain-lain</option>
                                        <?php }elseif($brg['kategori']=="perpus"){ ?>
                                            <option value="perpus">Perpustakaan</option>
                                            <option value="elektronik">Elektronik</option>
                                            <option value="teknis">Peralatan Teknis</option>
                                            <option value="kendaraan">Kendaraan</option>
                                            <option value="lain-lain">Lain-lain</option>
                                        <?php }elseif($brg['kategori']=="lain-lain"){ ?>
                                            <option value="lain-lain">Lain-lain</option>
                                            <option value="perpus">Perpustakaan</option>
                                            <option value="elektronik">Elektronik</option>
                                            <option value="teknis">Peralatan Teknis</option>
                                            <option value="kendaraan">Kendaraan</option>
                                        <?php } ?>

                                    </select> 
                                  </div>
                                  <div class="col">
                                    <label>Merk</label>
                                    <input name="merk" value="<?php echo $brg['merk']?>" type="text" class="form-control">
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tgl Masuk</label>
                                <input type="date" name="tgl_masuk" value="<?php echo $brg['tgl_masuk']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <input type="text" name="spesifikasi" value="<?php echo $brg['spesifikasi']?>" class="form-control" placeholder="Spesifikasi">
                            </div>
                            
                        </div>
                    <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="id" value="<?php echo $brg['id']?>">
                            <input type="hidden" name="cek" value="tdkada">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Sertakan Foto</h3>
                    </div>
                    <div class="card-body">
                      <?php echo form_open_multipart('admin/edit_brg', array('role' => 'form', 'id'=>'uploadForm'))?>
                        <div class="form-group">
                          <label>Upload Foto</label>
                        </div>
                        <input type="file" name="file" id="file" require>
                        <div class="kotakUp" id="gambar">
                            <img src="<?php echo base_url().'admin-lte-master/foto/barang/'.$brg['foto'] ?>" width=150px height=150px>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" name="id" value="<?php echo $brg['id']?>">
                        <input type="hidden" name="cek" value="ada">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                      <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    
    </section>
    <!-- /.content -->
</div>