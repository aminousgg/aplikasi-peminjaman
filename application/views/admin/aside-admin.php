<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url()?>admin" class="brand-link">
    <img src="<?php echo base_url() ?>admin-lte-master/dist/img/logo-esdm.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Peminjaman</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url() ?>admin-lte-master/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo base_url()?>admin" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
          <?php if($judul=="Beranda"){ ?>
            <a href="<?php echo base_url()?>admin" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin" class="nav-link">
          <?php } ?>

          <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Beranda
                
            </p>
          </a>
            
        </li>
        <li class="nav-item">
          <?php if($judul=="Barang"){ ?>
              <a href="<?php echo base_url()?>admin/barang" class="nav-link active">
          <?php }else{ ?>
              <a href="<?php echo base_url()?>admin/barang" class="nav-link">
          <?php } ?>

          <!-- <a href="<?php //echo base_url()?>admin/barang" class="nav-link"> -->
            <i class="nav-icon ion ion-bag"></i>
            <p>
              Barang
                
            </p>
            </a>
        </li>
        <li class="nav-item">
          <?php if($judul=="Anggota"){ ?>
            <a href="<?php echo base_url()?>admin/anggota" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin/anggota" class="nav-link">
          <?php } ?>
            
          <i class="nav-icon ion ion-person"></i>
            <p>
              Anggota
             
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if($judul=="Peminjaman"){ ?>
            <a href="<?php echo base_url()?>admin/pinjam" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin/pinjam" class="nav-link">
          <?php } ?>
            <i class="nav-icon fa fa-shopping-cart"></i>
            <p>
             Log Peminjaman
                
            </p>
          </a>
            
        </li>
        <li class="nav-item">
          <?php if($judul=="Kembali"){ ?>
              <a href="<?php echo base_url()?>admin/kembali" class="nav-link active">
          <?php }else{ ?>
              <a href="<?php echo base_url()?>admin/kembali" class="nav-link">
          <?php } ?>
            <i class="nav-icon fa fa-repeat"></i>
            <p>
              Daftar Pengembalian
                
            </p>
          </a>
            
        </li>
          

        <li class="nav-item">
          <?php if($judul=="Laporan"){ ?>
            <a href="<?php echo base_url()?>admin/laporan" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin/laporan" class="nav-link">
          <?php } ?>
            <!-- <a href="#" class="nav-link"> -->
            <i class="nav-icon fa fa-files-o"></i>
            <p>
              Laporan
              
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
