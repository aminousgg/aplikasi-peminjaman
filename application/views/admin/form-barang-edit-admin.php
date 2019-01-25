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
                            <i class="fa fa-text-width"></i>
                            Detail Barang
                        </h3>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Barang</h3>
                </div>
                <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart('admin/tambah_barang', array('role' => 'form'))?>
                <div class="card-body">
                    <div class="form-group">
                        <label>KODE BARANG</label>
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
                    </div>
                    <div class="form-group">
                        <label>NAMA BARANG</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>MERK</label>
                        <input type="text" name="merk" class="form-control" placeholder="Merk">
                    </div>
                    <div class="form-group">
                        <label>TANGGAL MASUK</label>
                        <input type="date" name="tgl_masuk" class="form-control">
                    </div>  
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea name="spesifikasi" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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