<script src="<?php echo base_url() ?>admin-lte-master/pesan/js/shoppingCart.js"></script>
<script>
shoppingCart.clearCart();
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_pdf/pdf_kembali';">
            <i class="fa fa-print"></i> PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_Excel/exportKembali';">
            <i class="fa fa-print"></i> Excel
          </button>
          <button class="btn btn-info" type="button" onclick="window.open('<?php echo base_url() ?>admin/print_kembali')">
            <i class="fa fa-print"></i> Print Out
          </button>
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
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="fa fa-plus"></i>  Pinjam Barang</button>
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
                  <th style="">Petugas</th>
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
                          $brg=$this->db->get_where('barang',array('kode_barang'=>$row->kd_brg));
                          $hsl1=$brg->row_array();
                          echo $hsl1['nama_barang'];
                          ?>
                      </td>
                      <td><?php echo $row->tgl_pjm ?></td>
                      <td><?php echo $row->tgl_kmbl ?></td>
                      <td><?php echo $row->ptg_kmbl ?></td>
                      <td><?php echo $row->status ?></td>
                    </tr>
                    
              <?php $i++; } ?>   
              </tbody>
              <tfoot>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="">Peminjam</th>
                  <th style="">Barang</th>
                  <th style="">Tgl pinjam</th>
                  <th style="">Tgl Kembali</th>
                  <th style="">Petugas</th>
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

