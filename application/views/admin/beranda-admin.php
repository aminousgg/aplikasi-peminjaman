<script src="<?php echo base_url() ?>admin-lte-master/pesan/js/shoppingCart.js"></script>
<script>
shoppingCart.clearCart();
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- baris icon beranda -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-inbox"></i></span>
              <div class="info-box-content">
                <a href="<?php echo base_url()?>admin/barang">Barang</a>
                <!--<span class="info-box-text">Barang</span>-->
                <span class="info-box-number"><?php echo $brg ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url()?>admin/anggota">Anggota</a>
                <!--<span class="info-box-text">Anggota</span>-->
                <span class="info-box-number"><?php echo $agt ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <a href="<?php echo base_url()?>admin/pinjam">Peminjaman</a>
                <!--<span class="info-box-text">Peminjam</span>-->
                <span class="info-box-number"><?php echo $pinjam ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-files-o"></i></span>
              <div class="info-box-content">
              <a href="<?php echo base_url()?>admin/kembali">Pengembalian</a>
                <!--<span class="info-box-text">Transaksi</span>-->
                <span class="info-box-number"><?php echo $kembali ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
        <div class="row">
          <div class="col-md-4">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Anggota terdaftar</h3>
                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php $i=0; foreach($aggt as $row){
                    if($i>7){
                      break;
                    }
                    ?>
                  <li>
                    <img style="width:50px; height:50px;" src="<?= base_url()."admin-lte-master/foto/agt/".$row->foto ?>" alt="Image">
                    <a class="users-list-name" href="#"><?= $row->nama ?></a>
                    <span class="users-list-date"><?= $row->nip ?></span>
                  </li>
                  <?php $i++; } ?>
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript::">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>

          </div>
        </div>
          



      </div><!-- /.container-fluid -->
      
      
    </section>
    <!-- /.content -->
    

</div>
<script>
  $('.info-box-number').each(function () {
    $(this).prop('Counter',-1).animate({
      Counter: $(this).text()
    }, {
      duration: 2450,
      easing: 'swing',
      step: function (now) {
        $(this).text(Math.ceil(now));
      }
    });
  });
</script>