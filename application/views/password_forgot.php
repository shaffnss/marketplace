<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VokasiDev | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/AdminLTE.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/square/blue.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
   <div class="login-logo">
     <a href="<?php echo site_url('Home')?>"><b>VokasiDev</b></a>
   </div>
   <div class="login-box-body">
     <p class="login-box-msg">Masukkan Alamat Email Anda</p>
     <!-- Alert -->
     <?php if ($this->session->flashdata('message')): ?>
     <div class="alert alert-<?php echo $this->session->flashdata('style'); ?> fade in">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp; <?php echo $this->session->flashdata('message'); ?>
     </div>
     <?php endif; ?>
     <!-- End Alert -->
     <form action="<?php echo base_url();?>password/kirim_email" method="post">
       <div class="form-group has-feedback">
         <input type="mail" name="email" id="email" class="form-control" placeholder="Email">
         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       </div>
       <div class="row">
         <div class="col-xs-8">
         </div>
         <div class="col-xs-4">
           <button type="submit" class="btn btn-primary btn-block btn-flat">Lanjutkan</button>
         </div>
       </div>
     </form>
   </div>
</div>
 
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js') ?>"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });
    });
  </script>
</body>
</html>
