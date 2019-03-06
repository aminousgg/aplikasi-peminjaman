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
            <h3 class="card-title">Akun Petugas</h3>
          </div>
          <script>
            function link() {
              
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Bidang</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                  <td><?= $i ?></td>
                    <td>
                      <?php
                        $ambil=$this->db->get_where('anggota',array('nip'=>$row->username))->row_array();
                        echo $ambil['nama'];
                      ?>
                    </td>
                    <td><?= $row->username ?></td>
                    <td><?= $ambil['jabatan'] ?></td>
                    <td><?php
                        if($row->status==0){
                            echo 'belum aktif';
                        }else{
                            echo 'aktif';
                        }
                    ?></td>
                    <td>
                        <button type="button" onclick="reset(<?= $row->id ?>)" class="btn btn-warning btn-sm">
                            reset pass
                        </button>
                        <button type="button" onclick="del(<?= $row->id ?>)" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash-o" title="Hapus"></i>
                        </button>
                    </td>
                  </tr>
                <?php $i++; } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="font-size:13px; width:10px;">No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Bidang</th>
                  <th>Status</th>
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
  <!-- /.content -->
</div>
<?php
$link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
echo $link;
?>
<script>
    function reset(id){
        swal({
        title: 'Reset Akun',
        text: "Password akan kembali default",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location = "";
            }
        })
    }
    function del(id){
        swal({
        title: 'Hapus Akun',
        text: "Akun akan di hapus dan kembali menjadi user",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location = "";
            }
        })
    }
</script>
