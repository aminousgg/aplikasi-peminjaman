<!DOCTYPE html>
<html>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Peminjaman</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>swal/sweetalert2.min.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  </head>
<body>
<div class="wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
    
            <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Horizontal Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-10 control-label">NIP</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="NIP">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-10 control-label">KATA SANDI</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="KATA SANDI">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Ingatkan Saya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">MASUK</button>
                        <button type="button" onclick="window.location='<?php echo base_url() ?>web/index';" class="btn btn-default float-right">BATAL</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </section>
</div>