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
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_pdf/pdf_anggota';">
            <i class="ion ion-ios-printer-outline"></i> PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_Excel/exportAnggota';">
            <i class="ion ion-ios-printer-outline"></i> Excel
          </button>
          <button class="btn btn-info" type="button">
            <i class="ion ion-ios-printer-outline"></i> Print Out
          </button>
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Anggota</h3>
            <?php if($this->session->userdata('admin')['nama']==null){ 
              
            }else {?>
              <button style="margin-top:-25px; margin-left: 10px;" onclick="link()" class="btn btn-info float-right"><i class="ion ion-android-add"></i>  Tambah Anggota</button>
              <button style="margin-top:-25px;" onclick="linkPtgs()" class="btn btn-info float-right"><i class="ion ion-android-add"></i>  Daftarkan Petugas</button>
            <?php }?>
            
            
            
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/form_anggota';
            }
            function linkPtgs(){
              window.location.href='<?php echo base_url() ?>admin/daftar_ptgs';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="">NIP</th>
                  <th style="">Nama Anggota</th>
                  <th style="">Jabatan</th>
                  <th style="">Pangkat/Gol</th>
                  <th style="">Bidang</th>
                  <th style="">Level</th>
                  <?php if($this->session->userdata('admin')['nama']==null){ 
              
                  }else {?>
                    <th style="">Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->nip ?></td>
                    <td> <a href="#" data-toggle="modal" data-target="#<?php echo $row->id ?>" title="Detail"><?php echo $row->nama ?></a></td>
                    <td><?php echo $row->jabatan ?></td>
                    <td><?php echo $row->pangkat_golongan ?></td>
                    <td><?php echo $row->seksi ?></td>
                    <td><?php 
                      $level=$this->db->get_where('akun_admin',array('username'=>$row->nip));
                      if($level->num_rows()>0){
                        $level=$level->row_array();
                        echo '<span style="cursor:pointer;" class="badge badge-success">'.$level['level_user'].'</span>';
                      }else{
                        echo '<span style="cursor:pointer;" class="badge badge-secondary">user</span>';
                      }

                    ?></td>
                    
                    <?php if($this->session->userdata('admin')['nama']==null){ 
              
                    }else {?>
                    <td>
                      <div class="button-group">
                          
                        <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_anggota/<?php echo $row->id ?>';" class="btn btn-info" title="Edit"> <i class="ion ion-edit"></i> </button>
                        <button type="button" onclick="del(<?php echo $row->id?>)" class="btn btn-danger"> <i class="ion ion-android-delete" title="Hapus"></i> </button>
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
                          <h4 class="modal-title">Detail Anggota</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-4">
                              NIP<br>
                              Nama<br>
                              Jabatan<br>
                              Golongan<br>
                              Bidang<br>
                              Tgl Lahir<br>
                              Level User<br>
                            </div>
                            <div class="col-md-4">
                              &nbsp;:&nbsp;<?php echo $row->nip ?><br>
                              &nbsp;:&nbsp;<?php echo $row->nama ?><br>
                              &nbsp;:&nbsp;<?php echo $row->jabatan ?><br>
                              &nbsp;:&nbsp;<?php echo $row->pangkat_golongan ?><br>
                              &nbsp;:&nbsp;<?php echo $row->seksi ?><br>
                              &nbsp;:&nbsp;<?php echo $row->tgl_lahir ?><br>
                              &nbsp;:&nbsp;<?php
                                $level=$this->db->get_where('akun_admin',array('username'=>$row->nip));
                                if($level->num_rows()>0){
                                  $level=$level->row_array();
                                  echo '<span style="cursor:pointer;" class="badge badge-success">'.$level['level_user'].'</span>';
                                }else{
                                  echo '<span style="cursor:pointer;" class="badge badge-secondary">user</span>';
                                }
                              ?><br>
                            </div>
                            <div class="col-md-4">
                              <img src="<?php echo base_url().'admin-lte-master/foto/agt/'.$row->foto ?>" width=150px height=150px>
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
                  <th style="">NIP</th>
                  <th style="">Nama Anggota</th>
                  <th style="">Jabatan</th>
                  <th style="">Pangkat/Gol</th>
                  <th style="">Bidang</th>
                  <th style="">Level</th>
                  <?php if($this->session->userdata('admin')['nama']==null){ 
              
                  }else {?>
                    <th style="">Aksi</th>
                  <?php } ?>
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
  <!-- modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
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
          window.location = "<?php echo base_url() ?>admin/hapus_anggota/"+id;;
        }
    })
  }
</script>
