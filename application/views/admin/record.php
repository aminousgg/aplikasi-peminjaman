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
          <button class="btn btn-info" type="button" onclick="window.location=">
            <i class="ion ion-ios-printer-outline"></i> PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location=">
            <i class="ion ion-ios-printer-outline"></i> Excel
          </button>
          <button class="btn btn-info" type="button">
            <i class="ion ion-ios-printer-outline"></i> Print Out
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
                  <th style="">kd_pjm</th>
                  <th style="">Nama</th>
                  <th style="">Barang</th>
                  <th style="">Jml_pinjam</th>
                  <th style="">Jml_kmbl</th>
                  <th style="">Status</th>
                    
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($tabel_record as $row){ ?>
                <tr>
                  <td><?= $row->kd_pjm ?></td>
                  <td>
                    <?php
                        $nama=$this->db->get_where('anggota',array('nip'=>$row->nip))->row_array();
                        echo "<b style='color:blue; cursor:pointer;' data-toggle='modal' data-target='#".$row->id."'>".$nama['nama']."</b>";
                    ?>
                  </td>
                  <td>
                    <?php
                        $namaBrg=$this->db->get_where('barang',array('kode_barang'=>$row->kd_brg))->row_array();
                        echo $namaBrg['nama_barang'];
                    ?>
                  </td>
                  <td><?= $row->jml_pjm ?></td>
                  <td><?= $row->jml_kmbl ?></td>
                  <td><?= $row->status ?></td>
                </tr>
                <div class="modal fade" id="<?php echo $row->id ?>" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Record</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-4">
                              Kode pinjam<br>
                              Nama<br>
                              Nama Barang<br>
                              Jml Pinjam<br>
                              Jml Kembali<br>
                              Tgl Pinjam<br>
                              Tgl Kembali<br>
                              Petugas Pinjam <br>
                              Petugas Kembali <br>
                              Status <br>
                            </div>
                            <div class="col-md-4">
                              &nbsp;:&nbsp;<?php echo $row->kd_pjm ?><br>
                              &nbsp;:&nbsp;<?php 
                                $nama=$this->db->get_where('anggota',array('nip'=>$row->nip))->row_array();
                                echo $nama['nama'];
                              ?><br>
                              &nbsp;:&nbsp;<?php
                                $namaBrg=$this->db->get_where('barang',array('kode_barang'=>$row->kd_brg))->row_array();
                                echo $namaBrg['nama_barang'];
                              ?><br>
                              &nbsp;:&nbsp;<?php echo $row->jml_pjm ?><br>
                              &nbsp;:&nbsp;<?php echo $row->jml_kmbl ?><br>
                              &nbsp;:&nbsp;<?php echo $row->tgl_pjm ?><br>
                              &nbsp;:&nbsp;<?php
                                if($row->tgl_kmbl=="0000-00-00"){
                                    echo "masih terpinjam";
                                }else{
                                    echo $row->tgl_kmbl;
                                }
                              ?><br>
                              &nbsp;:&nbsp;<?php
                                $namapts=$this->db->get_where('anggota',array('nip'=>$row->ptgs_pjm))->row_array();
                                echo $namapts['nama'];
                              ?><br>
                              &nbsp;:&nbsp;<?php
                                $namaptgs=$this->db->get_where('anggota',array('nip'=>$row->ptg_kmbl))->row_array();
                                if($namaptgs['nama']==null){
                                  echo "-";
                                }
                                echo $namaptgs['nama'];
                              ?><br>
                              &nbsp;:&nbsp;<?php echo $row->status ?><br>
                            </div>
                          </div></div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
              <?php $i++; } ?>   
              </tbody>
              <tfoot>
                <tr>
                  <th style="">kd_pjm</th>
                  <th style="">Nama</th>
                  <th style="">Barang</th>
                  <th style="">Jml_pinjam</th>
                  <th style="">Jml_kmbl</th>
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

