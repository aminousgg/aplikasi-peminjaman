<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>user/login/login.css">
</head>
<body style="background-image: url(<?php echo base_url() ?>user/login/bg-login.jpg);">
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
<div class="login-card">
    <img class="center" src="<?php echo base_url() ?>admin-lte-master/dist/img/Logo-Jateng.png" width=100px height=70px>
    <h3 style="text-align:center; color: #fff;">Sipirang</h3>
    <p style="margin-top:-15px; text-align:center; color: #fff;">Sistem Pinjam Barang</p>
    <?php echo form_open('admin/aksi_login'); ?>
        <input type="text" name="username" placeholder="Nama Pengguna / NIP">
        <input type="password" name="password" placeholder="Kata Sandi">
        <input type="submit" name="login" class="login login-submit" value="Masuk">
    <?php echo form_close(); ?>
    
  <div class="login-help">
        <?php if($this->session->flashdata('error')):
          echo '<p style="color: red; text-align: center;"><b>Username/password salah</b></p>';
        endif;
        ?>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
</body>
</html>