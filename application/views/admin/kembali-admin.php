<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <button class="btn btn-info" type="button">
          <i class="ion ion-android-add"></i>
          </button> -->
          <button class="btn btn-info" type="button">
            <i class="ion ion-ios-printer-outline"></i>
          </button>
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pengembalian Barang</li>
          </ol> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <?php 
  if($this->session->flashdata('error')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.'Gagal'.'",
                  text: "'.$this->session->flashdata('error').'",
                  timer: 10000,
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
 
  if($this->session->flashdata('success')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'success'.'",
                  title: "'.'Berhasil'.'",
                  text: "'.$this->session->flashdata('success').'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Barang Kembali</h3>
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Pinjam Barang</button>
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="">Peminjam</th>
                  <th style="">Barang</th>
                  <th style="">Tgl pinjam</th>
                  <th style="">Tgl Kembali</th>
                  <th style="">Status</th>
                    
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($tabel_record as $row){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php 
                          $anggota=$this->db->get_where('anggota',array('nip'=>$row->nip));
                          $hsl=$anggota->row_array();
                          echo $hsl['nama'];
                          ?>
                      </td>

                      <td><?php
                          $brg=$this->db->get_where('barang',array('kode_barang'=>$row->kode_brg));
                          $hsl1=$brg->row_array();
                          echo $hsl1['nama_barang'];
                          ?>
                      </td>
                      <td><?php echo $row->tgl_pinjam ?></td>
                      <td><?php echo $row->wkt_kembali ?></td>
                      <td>Telah Kembali</td>
                    </tr>

              <?php } ?>   
              </tbody>
              <tfoot>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="">Peminjam</th>
                  <th style="">Barang</th>
                  <th style="">Tgl pinjam</th>
                  <th style="">Tgl Kembali</th>
                  <th style="">Status</th>
                    
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

