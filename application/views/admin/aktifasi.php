<!DOCTYPE html>
<html>
<head>
	<title>Aktifasi Akun</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>user/login/login.css">
    <script type="text/javascript" src="<?php echo base_url().'admin-lte-master/jquery.js'?>"></script>
</head>
<body>

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
    <!-- <img class="center" src="<?php echo base_url() ?>user/logo/logo-esdm.png" width=70px height=70px> -->
    <h3 style="text-align:center;">Sipirang Aktifation</h3>
    <p style="text-align:center;">Ganti Password untuk aktifasi akun</p>
    <?php echo form_open('admin/aktifasi/'.$token); ?>
        <input type="password" name="pwd_lama" id="pwd_lama" placeholder="Password Lama" required>
        <input type="password" name="pwd_baru" id="pwd_baru" placeholder="Password" required>
        <input type="password" name="pwd_baru1" id="pwd_baru1" placeholder="Password" required>
        <input type="hidden" name="token" value="<?= $token ?>">
        <div id="error">
        </div>
        <input type="submit" name="login" class="login login-submit" value="Ubah">
        
    <?php echo form_close(); ?>
    
    
  <div class="login-help">
        
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

<script>
    $(document).ready(function(){
         
         $('#pwd_baru1').on('input',function(){
            var pwd = $('#pwd_baru').val();
            var cpwd = $('#pwd_baru1').val();
            if(cpwd!=pwd){
                $('#error').html('** Password tdk cocok');
                $('#error').css('color','red');
                return false;
            }else{
                $('#error').html('');
                return false;
            }
         });
    });
</script>
</body>
</html>