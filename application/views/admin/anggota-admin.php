<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

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
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Tambah Anggota</button>
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/form_anggota';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="font-size:13px; width:10px;">NIP</th>
                  <th style="font-size:13px; width:10px;">Nama Anggota</th>
                  <th style="font-size:13px; width:10px;">Jabatan</th>
                  <th style="font-size:13px; width:10px;">Pangkat/Gol</th>
                  <th style="font-size:13px; width:10px;">Seksi</th>
                  <th style="font-size:13px; width:10px;">Level User</th>
                  <th style="font-size:13px; width:10px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->nip ?></td>
                    <td><?php echo $row->nama ?></td>
                    <td><?php echo $row->jabatan ?></td>
                    <td><?php echo $row->pangkat_golongan ?></td>
                    <td><?php echo $row->seksi ?></td>
                    <td><?php echo $row->level_user ?></td>
                    <td>
                      <div class="button-group">
                        <button type="button" data-toggle="modal" data-target="#<?php echo $row->id ?>" class="btn btn-info"> <i class="ion ion-ios-more"></i> </button>
                        <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_anggota/<?php echo $row->id ?>';" class="btn btn-warning"> <i class="ion ion-edit"></i> </button>
                        <button type="button" onclick="del()" class="btn btn-danger"> <i class="ion ion-android-delete"></i> </button>
                      </div>
                    </td>
                    <?php $i++; ?>
                  </tr>
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
                              <div class="col-md-4">NIP</div>
                              <div class="col-md-8"><?php echo $row->nip ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Nama Anggota</div>
                              <div class="col-md-8"><?php echo $row->nama ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Jabatan</div>
                              <div class="col-md-8"><?php echo $row->jabatan ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Pangkat / Golongan</div>
                              <div class="col-md-8"><?php echo $row->pangkat_golongan ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Seksi</div>
                              <div class="col-md-8"><?php echo $row->seksi ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Tanggal Lahir</div>
                              <div class="col-md-8"><?php echo $row->tgl_lahir ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Level User</div>
                              <div class="col-md-8"><?php echo $row->level_user ?></div>
                            </div>
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
                  <th style="font-size:13px; width:10px;">NIP</th>
                  <th style="font-size:13px; width:10px;">Nama Anggota</th>
                  <th style="font-size:13px; width:10px;">Jabatan</th>
                  <th style="font-size:13px; width:10px;">Pangkat/Gol</th>
                  <th style="font-size:13px; width:10px;">Seksi</th>
                  <th style="font-size:13px; width:10px;">Level User</th>
                  <th style="font-size:13px; width:10px;">Aksi</th>
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
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Ingin menghapus data ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
  function del(){
    swal({
      title: 'Are you sure?',
      text: "Yakin akan menghapus ini?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
          window.location = "#";
        }
    })
  }
</script>
