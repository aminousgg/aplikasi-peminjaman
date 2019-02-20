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
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_pdf/pdf_record';">
            <i class="fa fa-print"></i> PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_Excel/exportRec';">
            <i class="fa fa-print"></i> Excel
          </button>
          <button class="btn btn-info" type="button" onclick="window.open('<?php echo base_url() ?>admin/print_rec')">
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
            <button style="margin-top:-27px;" onclick="link(1)" class="btn btn-success float-right"><i class="fa fa-plus"></i>  Pinjam Barang</button><br>
            <button onclick="link(2)" class="btn btn-danger"><i class="nav-icon fa fa-list"></i> 1 Bulan</button>
            <button onclick="link(3)" class="btn btn-danger"><i class="nav-icon fa fa-list"></i> 1 Minggu</button>
            <button onclick="link(4)" class="btn btn-danger"><i class="nav-icon fa fa-list"></i> hari ini</button>
            <!-- <button style="" onclick="link()" class="btn btn-success float-right"><i class="fa fa-plus"></i>  Pinjam Barang</button> -->
          </div>
          <script>
            function link(a) {
              if(a==1){
                window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
              }
              else if(a==2){
                window.location.href='<?php echo base_url() ?>admin/recordbulan';
              }
              else if(a==3){
                window.location.href='<?php echo base_url() ?>admin/recordminggu';
              }
              else if(a==4){
                window.location.href='<?php echo base_url() ?>admin/recordhari';
              }
              
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="">Kode Pinjam</th>
                  <th style="">Nama</th>
                  <th style="">Barang</th>
                  <th style="">Jumlah Pinjam</th>
                  <th style="">Jumlah Kembali</th>
                  <th style="">Status</th>
                    
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($tabel_record as $row){ ?>
              <?php if($row->jml_kmbl!=0){ ?>
                <tr style="background-color:#E6E6FA;">
              <?php }else{ ?>
                <tr style="background-color:#fff;">
              <?php }?>
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
                  <th style="">Kode Pinjam</th>
                  <th style="">Nama</th>
                  <th style="">Barang</th>
                  <th style="">Jumlah Pinjam</th>
                  <th style="">Jumlah Kembali</th>
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

