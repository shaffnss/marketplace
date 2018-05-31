<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <center><p style="font-size: 30px;" >Selamat Datang, <?php echo $this->session->userdata('name');?>!</p></center>
              </div>
        </div>
<!-- <hr style="border-width: 1px; border-color: #DDD;"> -->
      </div>


  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
$this->load->view('anggota/foot_anggota');
?>