<?php
if($this->session->userdata('admin')!=null){
  $petugas=$this->session->userdata('admin')['nama'];
}else{
  $petugas=$this->session->userdata('petugas')['nama'];
}
?>
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
      <!-- form -->
      <div class="col-md-6">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Identitas Peminjam</h3>
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open_multipart('admin/inPinjam', array('role' => 'form','autocomplete' => 'off'))?>
                <div class="card-body">
                  <input type="hidden" name='id' value='<?php echo $id ?>'>
                  <input type='hidden' name='petugas' value='<?= $petugas ?>'>
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
                  
                  <?php $i=0; foreach($brg as $u){?>
                    <?php if($i==0){ ?>
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          <label>Nama Barang</label>
                          <input type="text" name="brg" class="form-control" value="<?php echo $u->name ?>" disabled>
                          <input type="hidden" name="brg1[]" value="<?php echo $u->name ?>">
                          <input type="hidden" name="kode[]" value="<?php echo $u->price ?>">
                        </div>
                        <div class="col">
                          <label>Jml Barang</label>
                          <input type="text" name="jml" class="form-control" value="<?php echo $u->count ?>" disabled>
                          <input type="hidden" name="jml1[]" value="<?= $u->count ?>">
                        </div>
                      </div>
                    </div>
                    <?php }else{?>
                    <div class="form-group">
                      <div class="row">
                        <div class="col">
                          
                          <input type="text" name="brg" class="form-control" value="<?php echo $u->name ?>" disabled>
                          <input type="hidden" name="brg1[]" value="<?php echo $u->name ?>">
                          <input type="hidden" name="kode[]" value="<?php echo $u->price ?>">
                        </div>
                        <div class="col">
                          
                          <input type="text" name="jml" class="form-control" value="<?php echo $u->count ?>" disabled>
                          <input type="hidden" name="jml1[]" value="<?= $u->count ?>">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  <?php $i++; }?>
                
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
      <!-- detail -->
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
            <?php foreach($brg as $u){?>
              <?php 
                $foto=$this->db->get_where('barang',array('kode_barang'=>$u->price));
                $namaFoto=$foto->row_array();
              ?>
              <img width="100px" height="100px" src="<?php echo base_url() ?>admin-lte-master/foto/barang/<?= $namaFoto['foto']?>">
            <?php }?>
          </div>
          <!-- /.card-body -->
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