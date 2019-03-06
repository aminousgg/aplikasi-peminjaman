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
          
        </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pilih Anggota Untuk jadi Petugas</h3>
          </div>
          <!-- /.card-header -->
          <script>
            function pilih(nip){
                window.location.href='<?php echo base_url() ?>admin/petugas/'+nip;
            }
          </script>
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
                  <th style="">Pilih</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($tabel_record as $row){ ?>
                    <?php
                        $level=$this->db->get_where('akun_admin',array('username'=>$row->nip));
                        if($level->num_rows()>0){
                        }else {
                    ?>
                  <?php ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->nip ?></td>
                    <td> <a href="#" data-toggle="modal" data-target="#<?php echo $row->id ?>" title="Detail"><?php echo $row->nama ?></a></td>
                    <td><?php echo $row->jabatan ?></td>
                    <td><?php echo $row->pangkat_golongan ?></td>
                    <td><?php echo $row->seksi ?></td>
                    <td><button type="button" onclick="pilih(<?php echo $row->nip ?>)" class="btn btn-success" style="font-size:12px; padding:3px;">Jadikan Petugas</button></td>

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
                             
                            </div>
                            <div class="col-md-4">
                              <img src="<?php echo base_url().'admin-lte-master/foto/'.$row->foto ?>" width=150px height=150px>
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
                  <th style="">Pilih</th>
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
