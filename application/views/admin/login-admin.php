<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>user/login/login.css">
</head>
<body>
<div class="login-card">
    <img class="center" src="<?php echo base_url() ?>user/logo/logo-esdm.png" width=70px height=70px>
    <h3 style="text-align:center;">Admin</h3>
    <?php echo form_open('admin/aksi_login'); ?>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" class="login login-submit" value="login">
    <?php echo form_close(); ?>
    
  <div class="login-help">
        <?php if($this->session->flashdata('error')):
                echo '<p style="color: red; text-align: center;">Username/password salah</p>';
              endif; 
        ?>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
</body>
</html>