<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VokasiDev</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('Landing/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('Landing/css/modern-business.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('Landing/css/shop-homepage.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('Landing/css/shop-item.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?php echo base_url('Landing/css/search-form.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('Landing/css/font-awesome.css') ?>" rel="stylesheet">
 
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<style>
		.badge-notify{
   background:red;
   position:relative;
   top: -7px;
   left: -3px;
}
	</style>
	</head>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #DD3F00;">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('Home') ?>" style="color=#000">VOKASI DEV</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-search"></i>
    </button>

    <!-- <div class="collapse navbar-collapse" id="searchBar" style="flex-grow: 14">
      <form class="form-inline col-sm-12">
        <input class="form-control col-sm-10" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success col-sm-2" type="submit">Search
          <span class="glyphicons glyphicons-search"></span>
        </button>
      </form>
    </div> -->

    <div class="collapse navbar-collapse navbar-dark" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
				<?php
				$role = $this->session->userdata('role');
				$isLoggedIn = $this->session->userdata("isLoggedIn");
				if($role == 2 || $isLoggedIn == FALSE){
				?>
				<li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('ListProduk/keranjang_belanja')?>" style="color: white;">Keranjang <span class="badge badge-notify"><?php echo count($this->cart->contents()); ?></span></a>
        </li>
				<?php
				}
				?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('ListProduk')?>" style="color: white;">Produk</a>
        </li>
        
        <?php 
        $role = $this->session->userdata('role');
		$isLoggedIn = $this->session->userdata("isLoggedIn");
			if( $isLoggedIn == FALSE){
			    
        ?>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login')?>" style="color: white;">Masuk</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Register')?>" style="color: white;">Daftar</a>
					</li>
				<?php
					}
					
					if( $isLoggedIn == TRUE){
						if($role == 1){
            //Login Admin
				?>
				<li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Admin_dashboard')?>"><?php echo $this->session->userdata('name'); ?></a>
				</li>
					<li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('LoginAnggota/logout')?>">Logout</a>
				</li>
				<?php
            }elseif ($role == 2) {
                //Login Klien
        ?>
				<li class="nav-item">
          <a class="nav-link" style="color: white;" href="<?php echo site_url('Klien_dashboard')?>"><?php echo $this->session->userdata('name'); ?></a>
				</li>
					<li class="nav-item">
          <a class="nav-link" style="color: white;" href="<?php echo site_url('Login/logout')?>">Logout</a>
				</li>
				<?php
            }elseif ($role == 3){
                //Login Anggota
        ?>
				<li class="nav-item">
          <a class="nav-link" style="color: white;" href="<?php echo site_url('Anggota_dashboard')?>"><?php echo $this->session->userdata('name'); ?></a>
				</li>
					<li class="nav-item">
          <a class="nav-link" style="color: white;" href="<?php echo site_url('LoginAnggota/logout')?>">Logout</a>
				</li>
				<?php
            }elseif ($role == 4){
                //Login Superadmin
        ?>
				<li class="nav-item">
          <a class="nav-link" style="color: white;" href="<?php echo site_url('Admin_dashboard')?>"><?php echo $this->session->userdata('name'); ?></a>
				</li>
					<li class="nav-item">
          <a class="nav-link" style="color: white;" href="<?php echo site_url('Login_anggota/logout')?>">Logout</a>
				</li>
				<?php
            }
					}
			?>
      </ul>

    </div>
  </div>
</nav>