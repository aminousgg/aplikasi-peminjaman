<script src="<?php echo base_url() ?>admin-lte-master/pesan/js/shoppingCart.js"></script>
<script>
shoppingCart.clearCart();
</script>
<?php 
  if($this->session->flashdata('error')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.$this->session->flashdata('error').'",
                  text: "'.'Data tidak masuk ke database'.'",
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
                  text: "'.'Barang Telah di kembalikan'.'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Pengembalian Barang</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <h4 style="text-align: center">
          <b>Pengembalian Barang</b> <br>
          Dinas Energi dan Sumber Daya Mineral <br>
          Provinsi Jawa Tengah <br>
          </h4>
          <table style="margin-left:20px;">
            <tr>
                <td>Kode Pinjam &nbsp;</td>
                <td>: <?php echo $row['kd_pjm'] ?></td>
            </tr>
            <tr>
                <td>Nama &nbsp;</td>
                <td>: <?php
                    $nama=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$row['kd_pjm']))->row_array();
                    echo $nama['nama'];
                ?></td>
            </tr>
            <tr>
                <td>NIP &nbsp;</td>
                <td>: <?php echo $row['nip'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam &nbsp;</td>
                <td>: <?php echo $row['tgl_pjm'] ?></td>
            </tr>
            <tr>
                <td>Petugas &nbsp;</td>
                <td>: <?php echo $row['ptgs_pjm'] ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
          <div class="col-12 table-responsive">
            <div class="card">
              <div class="card-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah Pinjam</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $i=1; foreach($tabel_record as $row){ ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->kode_barang ?></td>
                            <td><?php echo $row->nama_barang ?></td>
                            <td><?php echo $row->jml_pinjam ?></td>
                            <td><button onclick="link(<?= $row->id ?>)" class="btn btn-danger btn-sm">kembalikan</button></td>
                            <?php $i++; ?>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
              </div>
            </div>
          </div>
          <!-- /.col -->
      </div>
    </section>
</div>
<script>
    function link(id){
        window.location.href='<?php echo base_url() ?>admin/kembalikan/'+id;
    }
</script>
