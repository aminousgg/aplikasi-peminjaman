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
<?php
if($this->session->flashdata('error')):
  $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
  echo $link;
  echo '<script>
          swal({
              type: "'.'error'.'",
              title: "'.$this->session->flashdata('error').'",
              text: "'.'Tanggal yg anda masukan salah'.'",
              timer: 10000,
              customClass: "'.'animated bounceIn'.'",
              })
        </script>';
endif;

?>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fa fa-text-width"></i>
              Detail Barang
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
            </blockquote>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Masukan Data peminjaman</h3>
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart('admin/tambah_pinjam', array('role' => 'form','autocomplete' => 'off'))?>
                <div class="card-body">
                  <input type="hidden" name='id' value='<?php echo $id ?>'>
                  <!-- <input type="hidden" name='brg' value='<?php //echo $brg ?>'> -->
                  <!-- <div class="form-group">
                    <label>NIP</label>
                    <input type="text" id="nip" name="nip" onkeyup="autofill()" class="form-control" placeholder="NIP">
                  </div> -->
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" id="nama" list="browsers" class="form-control" placeholder="Nama">
                    <datalist id="browsers">
                      <?php foreach($angg as $u){?>
                        <option value="<?php echo $u->nama ?>">
                      <?php }?>
                    </datalist>
                    <!-- <input type="hidden" name="nama1" id="nama1"> -->
                  </div>
                  <div class="form-group">
                    <label>NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control" disabled>
                    <input type="hidden" id="nip1" name="nip1" class="form-control">
                  </div>
                  <!-- <div class="form-group">
                    <label>Seksi Bagian</label>
                    <input type="text" name="seksi" class="form-control" placeholder="Seksi">
                  </div> -->
                  <div class="form-group">
                    <label>Jumlah Unit</label>
                    <select name="unit">
                      <?php for($i=1;$i<=$sedia;$i++) { ?>
                        <option value="<?php echo $i?>"><?php echo $i?></option>
                      <?php }?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="brg" class="form-control" value="<?php echo $brg ?>" disabled>
                    <input type="hidden" name="brg1" value="<?php echo $brg ?>">
                  </div>
                
                
                  <div class="form-group">
                    <label>Tgl Pinjam</label>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input type="date" name="tgl_pinjam" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                    <input type="hidden" name="tgl_pinjam1" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                  
                  <div class="form-group">
                    <label>Tgl Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Pinjam</button>
                </div>
              <?php echo form_close(); ?>
        </div>
      </div>
    </div>
      <!-- /.row -->
  </section>
    <!-- /.content -->
</div>

<script type="text/javascript" src="<?php echo base_url().'admin-lte-master/jquery.js'?>"></script>
<script type="text/javascript">
        $(document).ready(function(){
             $('#nama').on('input',function(){
                 
                var nama=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url().'admin/get_anggota/'?>"+nama,
                    data : {nama: nama},
                    success: function(data){
                      var json = data,
                      obj = JSON.parse(json);
                      $("#nip").val(obj.nip);
                      $("#nip1").val(obj.nip);
                         
                    }
                });
                return false;
           });
 
        });
    </script>