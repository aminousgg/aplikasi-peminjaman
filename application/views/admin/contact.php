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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pesan</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                  </tr>
                  <?php $i=1; foreach($tabel_record as $row) { ?>
                    <tr>
                        <td><?= $row->tgl ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->isi ?></td>
                        <td>
                            <button type="button" onclick="del(<?= $row->id?>)" class="btn btn-sm btn-danger" title="Hapus">
                              <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>
                  <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->

      </div>
    </div>
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
          window.location = "<?php echo base_url() ?>admin/contact/"+id;;
        }
    })
  }
</script>