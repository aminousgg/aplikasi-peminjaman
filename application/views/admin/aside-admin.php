<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url()?>admin" class="brand-link">
    <img src="<?php echo base_url() ?>admin-lte-master/dist/img/Logo-Jateng.png" alt="AdminLTE Logo" class="brand-image img-circle"
      style="opacity: .8">
    <span class="brand-text font-weight-light">
    <?php
      if($this->session->userdata('admin')['nama']!=null){
        $cari=$this->session->userdata('admin')['nama'];
        $dapat=$this->db->get_where('akun_admin',array('username'=>$cari))->row_array();
        echo $dapat['level_user'];
      }else{
        $cari=$this->session->userdata('petugas')['nama'];
        $dapat=$this->db->get_where('akun_admin',array('username'=>$cari))->row_array();
        echo $dapat['level_user']; 
      }
    ?>
    
    Sipirang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="<?php echo base_url() ?>admin-lte-master/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Image"> -->
        <?php if($this->session->userdata('admin')['nama']==null){ 
              $cek=$this->session->userdata('petugas')['nama'];
              $angg=$this->db->get_where('anggota',array('nip'=>$cek))->row_array();
              if($angg['nama']!=null){
                echo '<img src="'.base_url().'admin-lte-master/foto/agt/'.$angg['foto'].'" class="img-circle ukuran img-aside elevation-2" alt="Image">';
              }else{
                echo '<img src="'.base_url().'admin-lte-master/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Image">';
              }
            }else{
              $cek=$this->session->userdata('admin')['nama'];
              $angg=$this->db->get_where('anggota',array('nip'=>$cek))->row_array();
              if($angg['nama']!=null){
                echo '<img style="height:40px;" src="'.base_url().'admin-lte-master/foto/agt/'.$angg['foto'].'" class="img-circle elevation-2" alt="Image">';
              }else{
                echo '<img src="'.base_url().'admin-lte-master/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Image">';
              }
            }
          ?>
      </div>
      <div class="info">
        <a href="<?php echo base_url()?>admin" class="d-block">
          <?php if($this->session->userdata('admin')['nama']==null){ 
              $cek=$this->session->userdata('petugas')['nama'];
              $angg=$this->db->get_where('anggota',array('nip'=>$cek))->row_array();
              if($angg['nama']!=null){
                echo $angg['nama'];
              }else{
                echo "Developer";
              }
              
            }else{
              $cek=$this->session->userdata('admin')['nama'];
              $angg=$this->db->get_where('anggota',array('nip'=>$cek))->row_array();
              if($angg['nama']!=null){
                echo $angg['nama'];
              }else{
                echo "Developer";
              }
            }
          ?>
        </a>
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
            <i class="nav-icon fa fa-briefcase"></i>
            <p>
              Barang
            </p>
            </a>
        </li>
        <?php 
          $check="";
          if($this->session->userdata('admin')['nama']){
            $usr=$this->session->userdata('admin')['nama'];
            $check=$this->db->get_where('akun_admin',array('username'=>$usr))->row_array();
          }else{
            $usr=$this->session->userdata('petugas')['nama'];
            $check=$this->db->get_where('akun_admin',array('username'=>$usr))->row_array();
          }
        ?>
        <?php if($check['level_user']=="petugas"){ ?>
          <li class="nav-item">
            <?php if($judul=="Anggota_0"||$judul=="Anggota_1"){ ?>
              <a href="<?php echo base_url()?>admin/anggota/0" class="nav-link active">
            <?php }else{ ?>
              <a href="<?php echo base_url()?>admin/anggota/0" class="nav-link">
            <?php } ?>
            <i class="nav-icon fa fa-user"></i>
              <p>
                Anggota
              </p>
            </a>
          </li>
        <?php }else{ ?>
          <?php
            if($judul=="Anggota_0"||$judul=="Anggota_1"){
              echo '<li class="nav-item has-treeview menu-open">';
            }else{
              echo '<li class="nav-item has-treeview">';
            }
          ?>
            <!-- <li class="nav-item has-treeview"> -->
              <?php if($judul=="Anggota_0"||$judul=="Anggota_1"){ ?>
                <a href="#" class="nav-link active">
              <?php }else{ ?>
                <a href="#" class="nav-link">
              <?php } ?>
              <i class="nav-icon fa fa fa-user"></i>
              <p>
                Anggota
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul style="margin-left:8px;" class="nav nav-treeview">
              <li class="nav-item">
              <?php
                if($judul=="Anggota_0"){
                  echo '<a href="'.base_url().'admin/anggota/0" class="nav-link active">';
                }else{
                  echo '<a href="'.base_url().'admin/anggota/0" class="nav-link">';
                }
              ?>
                <!-- <a href="<?php echo base_url()?>admin/anggota/0" class="nav-link active"> -->
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Semua Anggota</p>
                </a>
              </li>
              <li class="nav-item">
              <?php
                if($judul=="Anggota_1"){
                  echo '<a href="'.base_url().'admin/anggota/1" class="nav-link active">';
                }else{
                  echo '<a href="'.base_url().'admin/anggota/1" class="nav-link">';
                }
              ?>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Akun Petugas</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>

        <li class="nav-item">
          <?php if($judul=="Peminjaman"){ ?>
            <a href="<?php echo base_url()?>admin/pinjam" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin/pinjam" class="nav-link">
          <?php } ?>
            <i class="nav-icon fa fa-exchange"></i>
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
          <?php if($judul=="Record"){ ?>
            <a href="<?php echo base_url()?>admin/record" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin/record" class="nav-link">
          <?php } ?>
            <!-- <a href="#" class="nav-link"> -->
            <i class="nav-icon fa fa-list"></i>
            <p>
              Record
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if($judul=="Contact"){ ?>
            <a href="<?php echo base_url()?>admin/contact" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url()?>admin/contact" class="nav-link">
          <?php } ?>
            <!-- <a href="#" class="nav-link"> -->
            <i class="nav-icon fa fa-comments-o"></i>
            <p>
              Contact
            </p>
          </a>
        </li>
        
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
