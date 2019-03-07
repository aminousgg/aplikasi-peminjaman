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
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <img src="<?= base_url()?>admin-lte-master/dist/img/Logo-Jateng.png" class="mx-auto " width="200px" height="130px">
        </div>
        <div class="col-md-6">
          <h4 class="" style="text-align: center; margin-top:20px;">
          <b>Pengembalian Barang</b> <br>
          Dinas Energi dan Sumber Daya Mineral <br>
          Provinsi Jawa Tengah <br>
          </h4>
        </div>
        <div class="col-md-3">
          ini juga
        </div>
      </div>
      <div class="row">
      <div class="col-md-12">
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
              <td>: <?php 
              $namaptg=$this->db->get_where('anggota', array('nip'=>$row['ptgs_pjm']))->row_array();
              echo $namaptg['nama'];
              ?></td>
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
                            <td><button data-toggle="modal" data-target="#<?= $i ?>" class="btn btn-danger btn-sm">kembalikan</button></td>
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
<?php $o=0; foreach($tabel_record as $row){ ?>
<!-- <div class="modal fade" role="dialog"> -->
  <div class="modal fade" id="<?= $o+1 ?>"  tabindex="<?= $o ?>" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Set Jumlah yg di kembalikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('admin/kembalikan/'.$row->id)?>
            <label>Unit kembali ? </label>
            <input type="number" required name="jml_kmbl" class="numeric" data-min_max data-min="1" data-max="<?= $row->jml_pinjam?>">
            <button class="btn btn-info" type="submit"><i class="fa fa-exchange"></i></button>
          <?php echo form_close()?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
<?php $o++; } ?>
<script>
    function link(id){
        window.location.href='<?php echo base_url() ?>admin/kembalikan/'+id;
    }

    $(document).on("input", ".numeric", function() {
        this.value = this.value.replace(/\D/g,'');
        var min = parseInt($(this).data('min'));
        var max = parseInt($(this).data('max'));
        var val = parseInt($(this).val());
        if(val > max)
        {
            $(this).val(max);
            return false;
        }
        else if(val < min)
        {
            $(this).val(min);
            return false;
        }

    });
</script>
