<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Admin Sipirang</title>
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
    <h3 style="text-align:center;">Daftar</h3>
    <p style="text-align:center;">Admin Sipirang</p>
    <?php echo form_open('regadminsipirang/dftr/'.$usr); ?>
        <label>Username</label>
        <input type="text" name="usr0" id="usr0" value="<?= $usr ?>" placeholder="" disabled>
        <input type="hidden" name="usr" value="<?= $usr ?>">
        <input type="password" name="pwd" id="pwd_baru" placeholder="Password" required>
        <input type="password" name="cpwd" id="pwd_baru1" placeholder="Confirm Password" required>
        <div id="error">
        </div>
        <input type="submit" name="reg" class="login login-submit" value="Daftar">
        
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