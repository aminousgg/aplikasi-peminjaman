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
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_pdf/pdf_barang/<?= $aktif ?>';">
            <i class="fa fa-print"></i> PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_Excel/exportBarang';">
            <i class="fa fa-print"></i> Excel
          </button>
          <button class="btn btn-info" type="button" onclick="window.open('<?php echo base_url() ?>admin/print_barang/<?= $aktif ?>')">
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
                  title: "'.$this->session->flashdata('error').'",
                  text: "'.'Gagal menambahkan ke database'.'",
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
                  title: "'.$this->session->flashdata('success').'",
                  text: "'.'Telah Ditambahkan'.'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
?>


  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
              <?php if($this->session->userdata('admin')['nama']==null){ ?>
                <button style="margin-top:-27px;" onclick="link(1)" class="btn btn-success float-right"><i class="fa fa-plus">
                    </i>  Tambah Barang
                </button><br>
                <?php if($aktif=="k"){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=="e"){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=="l"){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)"class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=='t'){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=='p'){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif==""){?>
                  <button onclick="link(2)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php } ?>

              <?php }else { ?>
                <button style="margin-top:-27px;" onclick="link(1)" class="btn btn-success float-right"><i class="fa fa-plus"></i>  Tambah Barang</button><br>
                
                <?php if($aktif=="k"){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=="e"){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=="l"){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)"class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=='t'){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif=='p'){ ?>
                  <button onclick="link(2)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php }elseif($aktif==""){?>
                  <button onclick="link(2)" class="btn btn-secondary btn-sm"><i class="nav-icon fa fa-list"></i> All</button>
                  <button onclick="link(3)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Kendaraan</button>
                  <button onclick="link(6)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Teknis</button>
                  <button onclick="link(4)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> Elektronik</button>
                  <button onclick="link(7)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i>Perpustakaan</button>
                  <button onclick="link(5)" class="btn btn-danger btn-sm"><i class="nav-icon fa fa-list"></i> lain-lain</button>
                <?php } ?>


              <?php } ?>
            </div>
            <script>
              function link(a) {
                if(a==1){
                  window.location.href='<?php echo base_url() ?>admin/tambah_barang';
                }else if(a==2){
                  window.location.href='<?php echo base_url() ?>admin/barang';
                }else if(a==3){
                  window.location.href='<?php echo base_url() ?>admin/brg_kat/kendaraan';
                }else if(a==4){
                  window.location.href='<?php echo base_url() ?>admin/brg_kat/elektronik';
                }else if(a==5){
                  window.location.href='<?php echo base_url() ?>admin/brg_kat/lain-lain';
                }else if(a==6){
                  window.location.href='<?php echo base_url() ?>admin/brg_kat/teknis';
                }else if(a==7){
                  window.location.href='<?php echo base_url() ?>admin/brg_kat/perpus';
                }
                
              }
            </script>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="font-size:13px; width:10px;">No</th>
                    <th style="">Kode</th>
                    <th style="">Nama Barang</th>
                    <th style="">Merk</th>
                    <th style="">Status</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tabel_record as $row){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->kode_barang ?></td>
                      <td><a href="#" data-toggle="modal" data-target="#<?php echo $row->id ?>"><?php echo $row->nama_barang ?></a></td>
                      <td><?php echo $row->merk ?></td>
                      <td><?php
                        if($row->status==0){
                          echo "<p style='color:red'>Terpinjam</p>";
                        }else{
                          echo "Tersedia";
                        }
                      ?></td>
                        <?php if($this->session->userdata('admin')['nama']==null){ ?>
                          <td>
                            <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_barang/<?php echo $row->id ?>';" class="btn btn-warning btn-sm" title="Edit" >
                              <i class="fa fa-pencil-square-o"></i>
                            </button>
                          </td>
                        <?php }else { ?>
                          <td>
                            <div class="button-group">
                              
                              <script>
                                function link1() {
                                  window.location.href='<?php echo base_url()."admin/edit_form_pinjam/".$row->id ?>';
                                }
                              </script>
                              <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_barang/<?php echo $row->id ?>';" class="btn btn-info" title="Edit" >
                                <i class="fa fa-pencil-square-o"></i>
                              </button>
                              <?php
                                if($row->status==0){ ?>
                                  <button style="cursor: not-allowed;" type="button" class="btn btn-danger" title="Hapus">
                                    <i class="fa fa-trash-o"></i>
                                  </button>
                                <?php }else{ ?>
                                  <button type="button" onclick="del(<?php echo $row->id?>)" class="btn btn-danger" title="Hapus">
                                    <i class="fa fa-trash-o"></i>
                                  </button>
                                <?php } ?>
                              
                            </div>
                          </td>
                        <?php } ?>
                      <?php $i++; ?>
                    </tr>
                    <!-- detail -->
                    <div class="modal fade" id="<?php echo $row->id ?>" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Detail Barang</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                Kode Barang <br>
                                Nama Barang <br>
                                Merk <br>
                                Kategori <br>
                                Tgl Masuk <br>
                                Spesifikasi <br>
                              </div>
                              <div class="col-md-4">
                                &nbsp;:&nbsp;<?php echo $row->kode_barang ?><br>
                                &nbsp;:&nbsp;<?php echo $row->nama_barang ?><br>
                                &nbsp;:&nbsp;<?php echo $row->merk ?><br>
                                &nbsp;:&nbsp;<?php echo $row->kategori ?><br>
                                &nbsp;:&nbsp;<?php echo $row->tgl_masuk ?><br>
                                &nbsp;:&nbsp;<?php echo $row->spesifikasi ?><br>
                                &nbsp;:&nbsp;<?php
                                  if($row->status==0){
                                    echo "Terpinjam";
                                  }else{
                                    echo "Tersedia";
                                  }
                                ?><br>
                              </div>
                              <div class="col-md-4">
                                <img src="<?php echo base_url().'admin-lte-master/foto/barang/'.$row->foto ?>" width=150px height=150px>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <!-- Tambah unit -->
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="font-size:13px; width:10px;">No</th>
                    <th style="">Kode</th>
                    <th style="">Nama Barang</th>
                    <th style="">Merk</th>
                    <th style="">Status</th>
                    <th style="width:100px;">Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- modal -->
  
  
  <!-- /.content -->
</div>
<?php
$link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
echo $link;

?>
<script>
  function del(id){
    swal({
      title: 'Hapus?',
      text: "Yakin akan menghapus ini?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
          window.location = "<?php echo base_url() ?>admin/hapus_barang/"+id;;
        }
    })
  }
  function del1(id){
      Swal.fire({
      type: 'error',
      title: 'Tdk Dapat diHapus',
      text: 'Barang Masih ada yg terpinjam'
    })
  }
</script>