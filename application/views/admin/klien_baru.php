<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Aktivasi Klien Baru <small></small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Admin_dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><i class="fa fa-users"></i> Klien</a></li>
      <li><i class=""></i> Aktivasi Klien Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-12">
       <?php
       $this->load->helper('form');
       $error = $this->session->flashdata('error');
       if($error)
       {
        ?>
        <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $this->session->flashdata('error'); ?>                    
       </div>
     <?php } ?>
     <?php  
     $success = $this->session->flashdata('success');
     if($success)
     {
      ?>
      <div class="alert alert-success alert-dismissable">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <?php echo $this->session->flashdata('success'); ?>
     </div>
   <?php } ?>

   <div class="row">
    <div class="col-md-12">
     <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
   </div>
 </div>
</div>
</div>
<div class="row">

  <!-- Form Daftar Pengguna Tidak Aktif -->
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Aktivasi Klien Baru</h3>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
             <th>No</th>
              <th>Foto</th>
              <th>Nama Klien</th>
              <th>Jenis Kelamin</th>
              <th>Instansi</th>
              <th>No Telfon</th>
              <th>E-mail</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php 
            $no=1;
            foreach ($aktivasi as $data) {
                  # code...

              ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><img src="<?php echo site_url('/assets/users/klien/').$data->foto ?>" class="img-responsive" style="height: 100px; width: 100px"></td>
                <td><?php echo $data->nama_users?></td>
                <td><?php echo $data->jenis_kelamin?></td>
                <td><?php echo $data->instansi?></td>
                <td><?php echo $data->no_telpon?></td>
                <td><?php echo $data->email?></td>
                <td>
                  <?php if($data->status_users=='aktif') {
                    ?>
                    <span class="label label-success">Aktif</span>
                  <?php }else{ ?>
                    <span class="label label-danger">Non Aktif</span>
                  <?php }?>
                </td>
                <td>
                  <a onclick="return confirm('Apakah Anda ingin mengaktifkan akun klien ini?'); " class="btn-sm btn-success" href="<?php echo site_url('Admin_anggota/aktifkan/'.$data->id_users) ?>"><i class="fa fa-check"></i>Aktifkan</a>
                </td>
              </tr>    
              <?php $no++; } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php
  $this->load->view('admin/foot_admin');
  ?>