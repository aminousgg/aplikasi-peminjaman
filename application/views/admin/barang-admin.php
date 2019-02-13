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
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_pdf/pdf_barang';">
            <i class="ion ion-ios-printer-outline"></i> Cetak PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_Excel/exportBarang';">
            <i class="ion ion-ios-printer-outline"></i> Cetak Excel
          </button>
          <button class="btn btn-info" type="button">
            <i class="ion ion-ios-printer-outline"></i> Cetak Langsung
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
              <?php if($this->session->userdata('admin')['nama']==null){ 
              
              }else {?>
                <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Tambah Barang</button>
              <?php } ?>
            </div>
            <script>
              function link() {
                window.location.href='<?php echo base_url() ?>admin/tambah_barang';
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
                    <th style="">Jumlah</th>
                    <th style="">Tersedia</th>
                    <?php if($this->session->userdata('admin')['nama']==null){ 
              
                    }else {?>
                      <th style="width:100px;">Aksi</th>
                    <?php } ?>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tabel_record as $row){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->kode_barang ?></td>
                      <td><a href="#" data-toggle="modal" data-target="#<?php echo $row->id ?>"><?php echo $row->nama_barang ?></a></td>
                      <td><?php echo $row->merk ?></td>
                      
                      <td>
                        <?php echo $row->jml_barang ?>
                        <?php if($this->session->userdata('admin')['nama']==null){ 
              
                        }else {?>
                          <button data-toggle="modal" data-target="#<?php echo $row->id ?>_unit" class="btn btn-success float-right"><i class="ion ion-android-add"></i></button>
                        <?php } ?>
                        
                      </td>
                      <?php if($row->jml_tersedia==0){ ?>
                        <td style="color:red;"><?php echo $row->jml_tersedia; ?></td>
                      <?php }else{ ?>
                        <td><?php echo $row->jml_tersedia;}  ?></td>
                        <?php if($this->session->userdata('admin')['nama']==null){ 
              
                        }else {?>
                          <td>
                            <div class="button-group">
                              
                              <script>
                                function link1() {
                                  window.location.href='<?php echo base_url()."admin/edit_form_pinjam/".$row->id ?>';
                                }
                              </script>
                              
                              <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_barang/<?php echo $row->id ?>';" class="btn btn-info" title="Edit" > <i class="ion ion-edit"></i> </button>
                              <button type="button" onclick="del(<?php echo $row->id?>)" class="btn btn-danger" title="Hapus"> <i class="ion ion-android-delete"></i> </button>
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
                                Terpinjam <br>
                                Spesifikasi <br>
                                Total Unit <br>
                                Tersedia <br>
                              </div>
                              <div class="col-md-4">
                                &nbsp;:&nbsp;<?php echo $row->kode_barang ?><br>
                                &nbsp;:&nbsp;<?php echo $row->nama_barang ?><br>
                                &nbsp;:&nbsp;<?php echo $row->merk ?><br>
                                &nbsp;:&nbsp;<?php echo $row->kategori ?><br>
                                &nbsp;:&nbsp;<?php echo $row->tgl_masuk ?><br>
                                &nbsp;:&nbsp;<?php echo $row->jml_terpinjam ?><br>
                                &nbsp;:&nbsp;<?php echo $row->spesifikasi ?><br>
                                &nbsp;:&nbsp;<?php echo $row->jml_barang ?><br>
                                &nbsp;:&nbsp;<?php echo $row->jml_tersedia ?><br>
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
                    <div class="modal fade" id="<?php echo $row->id ?>_unit" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Unit</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <div class="modal-body">
                            <?php echo form_open('admin/unit'); ?>
                              <label for="">Unit</label> &nbsp;&nbsp;&nbsp;
                              <input type="number" name="unit"> &nbsp;&nbsp;
                              <input type="hidden" name="id" value="<?php echo $row->id ?>">
                              <input type="hidden" name="asli" value="<?php echo $row->jml_barang ?>">
                              <input type="hidden" name="sedia" value="<?php echo $row->jml_tersedia ?>">
                              <button type="submit" class="btn btn-info"><i class="ion ion-android-add"></i></button>
                            <?php echo form_close(); ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="font-size:13px; width:10px;">No</th>
                    <th style="">Kode</th>
                    <th style="">Nama Barang</th>
                    <th style="">Merk</th>
                    
                    <th style="">Jumlah</th>
                    <th style="">Tersedia</th>
                    <?php if($this->session->userdata('admin')['nama']==null){ 
              
                    }else {?>
                      <th style="width:100px;">Aksi</th>
                    <?php } ?>
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
</script>