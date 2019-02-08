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
                        <h3 class="card-title">Edit anggota</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                        <div class="card-body">
                            <?php echo form_open_multipart('admin/edit_agt', array('role' => 'form', 'id'=>'uploadForm'))?>
                            <div class="form-group">
                                <div class="row">
                                  <div class="col">
                                    <label>NIP</label>
                                    <input name="id" value="<?php echo $angg['id']?>" type="hidden">
                                    <input name="nip" value="<?php echo $angg['nip']?>" placeholder="NIP" type="text" class="form-control">
                                  </div>
                                  <div class="col">
                                    <label>Nama</label>
                                    <input name="nama" value="<?php echo $angg['nama']?>" placeholder="Nama" type="text" class="form-control">
                                  </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <label>Jabatan</label>
                                  <input name="jabatan" value="<?php echo $angg['jabatan']?>" placeholder="Jabatan" type="text" class="form-control">
                                </div>
                                <div class="col">
                                  <label>Golongan</label>
                                  <input name="pangkat_golongan" value="<?php echo $angg['pangkat_golongan']?>" placeholder="Golongan" type="text" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" value="<?php echo $angg['seksi']?>" name="seksi" class="form-control" placeholder="Seksi Bagian">
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                  <label>Tgl Lahir</label>
                                  <input type="date" name="tgl_lahir" value="<?php echo $angg['tgl_lahir']?>" class="form-control">
                                </div>
                                <div class="col">
                                  <label>Level User</label>
                                  <select name="level_user" class="form-control select2" style="width: 100%;">
                                      <?php if($angg['level_user']=="user"){?>
                                        <option selected="selected" value="user">User</option>
                                        <option value="admin">Admin</option>
                                      <?php } else { ?>
                                        <option value="user">User</option>
                                        <option selected="selected" value="admin">Admin</option>
                                      <?php } ?>
                                        
                                        
                                  </select>
                                </div>
                              </div>
                            </div>
                          
                        </div>
                    <!-- /.card-body -->
                    <input type="hidden" name="cek" value="tdkada">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    <?php echo form_close(); ?>
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update gambar</h3>
                    </div>
                    <div class="card-body">
                      <?php echo form_open_multipart('admin/edit_agt', array('role' => 'form', 'id'=>'uploadForm'))?>
                        <div class="form-group">
                          <label>Upload Foto</label>
                        </div>
                        <input type="file" name="file" id="file" require>
                        <input type="hidden" name="cek" value="ada">
                        <input type="hidden" name="id" value="<?php echo $angg['id']?>">
                        <div class="kotakUp" id="gambar">
                          
                          <img src="<?php echo base_url().'admin-lte-master/foto/agt/'.$angg['foto'] ?>" width=150px height=150px>
                        </div>
                      
                    </div>
                      
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <?php echo form_close(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /.row -->
    
    </section>
    <!-- /.content -->
</div>
