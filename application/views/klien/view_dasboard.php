<?php
$this->load->view('klien/head_klien');
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard<small>Control Panel</small></h1>
       <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
    </section>

     <!-- Main content -->
 	<section class="content">
    <div class="row">
        <center><p style="font-size: 30px;" >Selamat Datang, <?php echo $this->session->userdata('name');?>!</p></center>
        <br>
<!-- <hr style="border-width: 1px; border-color: #DDD;"> -->
      </div>

    <div class="callout callout-warning">
        <h4>Apakah anda telah melakukan pembelian?</h4>

        <p>Silahkan masuk ke menu pembayaran untuk melihat produk pembelian anda &nbsp;<a href="<?php echo site_url('Klien_pembayaran') ?>">Klik Disini</a> &nbsp;
        </p>
      </div>
 		

    </section>

  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
$this->load->view('klien/foot_klien');
?>