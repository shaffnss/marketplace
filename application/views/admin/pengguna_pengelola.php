<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Daftar Pengelola<small>Lihat, Tambah, Edit Data Pengelola</small></h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="#"><i class="fa fa-dashboard"></i> Pengelola</a></li>
   </ol>
 </section>

 <section class="content-header">
  <div>
    <a href="<?php echo site_url('Admin_pengelola/tambah_pengelola')?>" type="button" class="btn btn-primary" >
      <i class="glyphicon glyphicon-plus"></i>Tambah Pengelola
    </a>
  </div> 
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
    <!-- Form Daftar Klien -->
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Pengelola</h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <th>No</th>
              <th>Foto</th>
              <th>Nama Pengelola</th>
              <th>Jenis Kelamin</th>
             <!--  <th>Instansi</th> -->
              <th>No Telfon</th>
              <th>E-mail</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <?php 
          $no=1;
          foreach ($pengelola as $data) {
                  # code...

            ?>
            <tbody>
              <tr>
               <td><?php echo $no ?></td>
                <td><img src="<?php echo site_url('/assets/users/pengelola/').$data->foto ?>" onerror="this.src='<?php echo site_url('assets/users/anggota/index.png'); ?>'" class="img-responsive" style="height: 100px; width: 100px"></td>
                <td><?php echo $data->nama_users?></td>
                <td><?php echo $data->jenis_kelamin?></td>
               <!--  <td><?php echo $data->instansi?></td> -->
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
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah-pengelola<?php echo $data->id_users; ?>"><i class="fa fa-edit"></i>
                        </button> 
                        <?php if($data->status_users=='aktif' && $data->validasi== 1){?>
                        <a onclick="return confirm('apakah anda ingin ingin menjadikan <?php echo $data->nama_users ?> sebagai superadmin?');" href="<?php echo site_url('Admin_pengelola/jadisuperadmin/'.$data->id_users)?>" class="btn btn-sm btn-info" style="background: #4e9e02; border-color: #fff"></i> Jadi Superadmin</a>
                      <?php }?>
                      </td>
                  </tr>

                  <!-- Modals Ubah DATA KLIEN -->
                  <div class="modal fade" id="ubah-pengelola<?php echo $data->id_users; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Data pengelola</h4>
                          </div>

                          <div class="modal-body">
                            <form action="<?php echo site_url('Admin_pengelola/ubahPengelola') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

                              <div class="box-body">
                                <input type="hidden" class="form-control" id="inputName" name="id_users" value="<?php echo $data->id_users; ?>" required>

                               <!--  <div class="form-group">
                                  <label class="">Nama Pengelola</label>
                                  <input type="text" class="form-control" id="inputName" name="nama_users" value="<?php echo $data->nama_users; ?>">
                                </div>

                                <div class="form-group">
                                  <label>Jenis Kelamin</label>        
                                  <select class="form-control" name="jenis_kelamin">
                                    <option value="Pria" <?php if($data->jenis_kelamin == "Pria") {echo "selected=selected";} ?>>Pria</option>
                                    <option value="Wanita" <?php if($data->jenis_kelamin == "Wanita") {echo "selected=selected";} ?>>Wanita</option>
                                  </select>
                                </div> -->

                                <!-- <div class="form-group">
                                  <label class="">Instansi</label>
                                  <input type="text" class="form-control" id="inputName" name="instansi" value="<?php echo $data->instansi; ?>" required>
                                </div>
 -->
                               <!--  <div class="form-group">
                                  <label class="">No Telpon</label>
                                  <input type="text" class="form-control" id="inputName" name="no_telpon" value="<?php echo $data->no_telpon; ?>" required>
                                </div>

                                <div class="form-group">
                                  <label class="">Email</label>
                                  <input type="text" class="form-control" id="inputName" name="email" value="<?php echo $data->email; ?>" required>
                                </div>

                                <div class="form-group">
                                  <label class="">Upload Foto</label>
                                  <input type="file" name="foto" value="<?php echo $data->foto; ?>">
                                </div>
 -->
                                <div class="form-group">
                                  <label for="produk">Status</label>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="status_users" id="optionsAktif" value="aktif" <?php if($data->status_users == "aktif") {echo "checked";} ?>>Aktif
                                    </label>
                                    <label>
                                      <input type="radio" name="status_users" id="optionsTdkAktif" value="nonaktif"  <?php if($data->status_users == "nonaktif") {echo "checked";} ?>>Non Aktif
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->      
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