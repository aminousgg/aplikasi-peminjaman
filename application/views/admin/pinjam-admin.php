<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1>Data <?php //echo $judul; ?></h1> -->
            
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Peminjaman Barang</li>
          </ol> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Peminjam</h3>
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Pinjam Barang</button>
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body" style="padding-left:4px;">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="font-size:13px;">NIP</th>
                  <th style="font-size:13px;">Nama</th>
                  <th style="font-size:13px;">Nama Barang</th>
                  <th style="font-size:13px;">Unit</th>
                  <th style="font-size:13px;">Estimasi Kembali</th>
                  <th style="font-size:13px;">Status</th>
                  <th style="font-size:13px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->nip ?></td>
                    <td><?php echo $row->nama ?></td>
                    <td><?php echo $row->nama_barang ?></td>
                    <td><?php echo $row->jml_pinjam ?></td>
                    <td>otw</td>
                    <td><?php echo $row->status ?></td>
                    <td>
                      <div class="button-group">
                        
                        <!-- <script>
                          function link1() {
                            window.location.href='<?php //echo base_url()."admin/edit_form_pinjam/".$row->id ?>';
                          }
                        </script> -->
                        <button type="button" class="btn btn-danger" style="font-size:13px;">Kembalikan</button>
                      </div>
                    </td>
                    <?php $i++; ?>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th style="font-size:13px;">NIP</th>
                  <th style="font-size:13px;">Nama</th>
                  <th style="font-size:13px;">Nama Barang</th>
                  <th style="font-size:13px;">Unit</th>
                  <th style="font-size:13px;">Estimasi Kembali</th>
                  <th style="font-size:13px;">Stattus</th>
                  <th style="font-size:13px;">Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
        
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