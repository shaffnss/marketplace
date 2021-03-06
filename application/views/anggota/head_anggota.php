<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anggota</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist') ?>/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist') ?>/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins') ?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components') ?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

   <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>VokasiDev</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <img src="<?php echo base_url().'/assets/users/anggota/'.$this->session->userdata('foto')?>" onerror="this.src='<?php echo site_url('assets/users/anggota/index.png'); ?>'" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu" style="width: 50px">
              <li>
                <br>
                <a href="<?php echo site_url('Anggota_profile') ?>">Profile</a>
                <hr>
              </li>
              <li>
                <a href="<?php echo site_url('Anggota_password') ?>"></i>Ubah Password</a>
                <hr>
              </li>
              <li>
                <a href="<?php echo site_url('login_anggota/logout') ?>"></i>Sign out</a>
                <br>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
          <div class="pull-left image">
             <img src="<?php echo base_url().'/assets/users/anggota/'.$this->session->userdata('foto')?>" onerror="this.src='<?php echo site_url('assets/users/anggota/index.png'); ?>'" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <br
            <p><?php echo $this->session->userdata('name');?></p>
          </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>

          <li>
            <a href="<?php echo site_url('Anggota_dashboard') ?>">
              <i class="fa fa-dashboard"></i> 
              <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a href="<?php echo site_url('Anggota_profile') ?>">
              <i class="fa fa-user"></i>
              <span>Profile</span>
            </a>
          </li>

          <li>
            <a href="<?php echo site_url('Anggota_uploadProduk') ?>">
              <i class="fa fa-upload"></i>
              <span>Upload Produk</span>
            </a>
          </li>       
        </ul>
      </section>
    </aside>