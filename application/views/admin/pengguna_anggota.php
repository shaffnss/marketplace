<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Data Anggota Tim<small>Lihat, Tambah, Edit Data Anggota</small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Admin_dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><i class="fa fa-users"></i> Anggota</a></li>
      <li><a href=""><i class=""></i> Data Anggota Tim</li>
      </ol>
    </section>

    <section class="content-header">
      <div>
        <a href="<?php echo site_url('Admin_Anggota/tambah_anggota')?>" type="button" class="btn btn-primary" >
          <i class="glyphicon glyphicon-plus"></i> Tambah Anggota Tim
        </a>
      </div> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         <!-- Alert -->
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('style'); ?> fade-in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp; 
        </br><?php echo $this->session->flashdata('message'); ?>
      </div>
    <?php endif; ?>
    <!-- End Alert -->

          <div class="row">
            <div class="col-md-12">
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>E-mail</th>
                    <th>No Telpon</th>
                    <th>Berkas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($anggota as $data) {
                  # code...
                    ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><img src="<?php echo site_url('/assets/users/anggota/'.$data['foto']) ?>" onerror="this.src='<?php echo site_url('assets/users/anggota/index.png'); ?>'" class="img-responsive" style="height: 80px; width: 80px"></td>
                      <td><?php echo $data['nama_users']?></td>
                      <td><?php echo $data['jenis_kelamin']?></td>
                      <td><?php echo $data['email']?></td>
                      <td><?php echo $data['no_telpon']?></td>
                      <td>
                        <?php if ($data['ktm'] !=''){?>
                          <a href="<?php echo site_url().'assets/users/anggota/'.$data['ktm'] ?>" target="_blank"><i class="fa fa-file-pdf-o fa-2x" style="color:black"></i></a>
                        <?php }else{?>
                          -
                        <?php }?>
                      </td>
                      <td>
                        <?php if($data['status_users']=='aktif') {
                          ?>
                          <span class="label label-success">Aktif</span>
                        <?php }else{ ?>
                          <span class="label label-danger">Non Aktif</span>
                        <?php }?>
                      </td>
                      <td>
                        <div>
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah-data<?php echo $data['id_users']; ?>"><i class="fa fa-edit"></i></button>
                          <!--  <button type="button" onclick="reset_password(<?php echo $data['id_users']; ?>)" class="btn btn-sm btn-warning" style="background: #d41912; border-color: #fff"><i class="fa fa-refresh"></i>Reset</button>  -->
                        </div>   
                      </td>
                    </tr>

                    <!-- Modals Ubah Data -->
                    <div class="modal fade" id="ubah-data<?php echo $data['id_users']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Ubah Data Anggota</h4>
                            </div>

                            <div class="modal-body">
                              <form action="<?php echo site_url('Admin_anggota/ubahAnggota') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

                                <div class="box-body">
                                  <input type="hidden" class="form-control" id="inputName" name="id_users" value="<?php echo $data['idu']; ?>">
                                  
                                  <div class="form-group">
                                    <label>Status</label>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="status_users" id="optionsAktif" value="aktif" <?php if($data['status_users'] == "aktif") {echo "checked";} ?>>Aktif
                                      </label>
                                      <label>
                                        <input type="radio" name="status_users" id="optionsTdkAktif" value="nonaktif"  <?php if($data['status_users'] == "nonaktif") {echo "checked";} ?>>Non Aktif
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                  <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.Modals Ubah Data -->
                      <?php 
                      $no++; } ?>
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