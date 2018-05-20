<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VokasiDev | Registrasi </title>
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
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="<?php echo site_url('Home')?>"><b>Marketplace TA</b></a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Daftar Akun Baru</p>
      <?php 
      echo validation_errors();
      echo form_open('register');?>
      <!-- <form action="<?php //echo site_url('Register')?>" method="post"> -->
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Full name" name="nama">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Alamat Email" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        
        <div class="form-group">
          <label>Daftar Sebagai</label>
          <div class="radio">
            <label>
              <?php foreach ($data as $value) {
                if ($value->id_roles != 1) {
                  ?>
                  <input type="radio" name="pilihananggota" value="<?php echo $value->id_roles ?>">
                  <?php echo $value->nama_roles ?><br>
                  <?php } } ?>
                </label>
              </div>
            </div>

          <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" value="register" name="register">Register</button>
        </div>
        <br>
        <br>
        <br>
        <p style="text-align: center;">Sudah memiliki akun? Silahkan&nbsp<a href="<?php echo site_url('login') ?>">Login</a> &nbsp;disini</p>
        <!-- /.col -->
      </div>
      <?php echo form_close()?>
    </div>
  </div>
  <!-- /.register-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js') ?>"></script>
  <script>
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     radioClass: 'iradio_square-blue',
  //     increaseArea: '20%' // optional
  //   });
  // });
</script>
</body>
</html>