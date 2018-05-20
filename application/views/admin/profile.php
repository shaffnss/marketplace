<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Profil<small>Klien</small></h1>
    </section>

     <?php 
    
                foreach ($profile as $data) {
                  # code...
                ?>

     <!-- Main content -->
 	<section class="content">
      <div class="row">

        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('AdminLTE/dist') ?>/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $data->nama_users?></h3>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
          
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Nama</strong>

              <p class="text-muted"><?php echo $data->nama_users?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Email</strong>

              <p class="text-muted"><?php echo $data->email?></p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> No Telfon</strong>

              <p class="text-muted"><?php echo $data->no_telpon?></p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Nama Instansi</strong>

              <p class="text-muted"><?php echo $data->instansi?></p>

              <div>
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ubah-data">
                      Ubah
                    </button>
                  </div> 

                  <div class="modal fade" id="ubah-data">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Data Klien</h4>
                          </div>

                          <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputName" class="">Nama</label>
                                <input type="email" class="form-control" id="inputName" placeholder="Nama Anggota">
                              </div>
                              <div class="form-group">
                                <label for="inputEmail" class="">Email</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label for="inputTelp" class="">No Telpon</label>
                                <input type="text" class="form-control" id="inputName" placeholder="No Telpon">
                              </div>
                              <div class="form-group">
                                <label for="inputTelp" class="">Nama Instansi</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Nama Instansi">
                              </div>
                              </div>
                          </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                              <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <!-- /.col -->

    </section>
    <?php  } ?>

  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
$this->load->view('admin/foot_admin');
?>