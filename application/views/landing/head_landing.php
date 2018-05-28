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
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('Landing/css/business-frontpage.css') ?>" rel="stylesheet">
  <!-- Load icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo site_url('Home') ?>">Marketplace TA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-search"></i>
    </button>

   <!--  <div class="collapse navbar-collapse" id="searchBar" style="flex-grow: 14">
      <form class="form-inline col-sm-12">
        <input class="form-control col-sm-10" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success col-sm-2" type="submit">Search
          <span class="glyphicons glyphicons-search"></span>
        </button>
      </form>
    </div> -->

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('ListProduk')?>">Produk</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Login')?>">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Register')?>">Register</a>
        </li>
      </ul>

    </div>
  </div>
</nav>