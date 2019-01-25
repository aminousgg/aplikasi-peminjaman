<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Anggota</h3>
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Input Anggota</button>
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
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Anggota</th>
                  <th>Jabatan</th>
                  <th>pangkat/gol</th>
                  <th>seksi</th>
                  <th>level user</th>
                  <th>Aksi</th>
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
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info"> <i class="ion ion-ios-more"></i> </button>
                        <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_anggota/<?php echo $row->id ?>';" class="btn btn-warning"> <i class="ion ion-edit"></i> </button>
                        <button type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-danger"> <i class="ion ion-android-delete"></i> </button>
                      </div>
                    </td>
                    <?php $i++; ?>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Anggota</th>
                  <th>Jabatan</th>
                  <th>pangkat/gol</th>
                  <th>seksi</th>
                  <th>level user</th>
                  <th>Aksi</th>
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