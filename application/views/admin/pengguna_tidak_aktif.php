<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pengguna Pengguna Tidak Aktif <small>Lihat Data Pengguna Tidak Aktif</small></h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="#"><i class="fa fa-dashboard"></i> Pengguna Tidak Aktif</a></li>
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
          <h3 class="box-title">Data Pengguna Tidak Aktif</h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <th>No</th>
              <th>Foto</th>
              <th>Nama Pengguna</th>
              <th>Jenis Kelamin</th>
              <th>Instansi</th>
              <th>No Telfon</th>
              <th>E-mail</th>
              <th>Roles</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

            <tbody>
          <?php 
          $no=1;
          foreach ($pengelola as $data) {
                  # code...

            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><img src="<?php echo site_url('/assets/users/klien/').$data->foto ?>" class="img-responsive" style="height: 80px; width: 80px"></td>
                <td><?php echo $data->nama_users?></td>
                <td><?php echo $data->jenis_kelamin?></td>
                <td><?php echo $data->instansi?></td>
                <td><?php echo $data->no_telpon?></td>
                <td><?php echo $data->email?></td>
                <td>
									<?php if($data->id_roles==1) {
                    ?>
                    <span class="label label-info">Pengelola</span>
										<?php }else if($data->id_roles==2){ ?>
                    <span class="label label-warning">Klien</span>
                  <?php }else{ ?>
                    <span class="label bg-blue">Anggota</span>
                  <?php }?>
								</td>
                <td>
                  <?php if($data->status_users=='aktif') {
                    ?>
                    <span class="label label-success">Aktif</span>
                  <?php }else{ ?>
                    <span class="label label-danger">Non Aktif</span>
                  <?php }?>
                </td>

                 <?php  
                  if ($this->session->userdata('role')== 4){
                    ?>
                <td>
                  <a onclick="return confirm('Apakah Anda yakin akan mengaktifkan kembali user ini?'); " class="btn-sm btn-success" href="<?php echo site_url('Admin_pengelola/aktifkan/'.$data->id_users) ?>"><i class="fa fa-check"></i>Aktifkan</a>
                </td>
                <?php }?>
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