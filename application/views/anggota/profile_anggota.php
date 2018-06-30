<?php
$this->load->view('anggota/head_anggota');
$this->load->model('Anggota_profile_model');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <h1>Profil<small>Anggota</small></h1>
 </section>

 <?php 
 foreach ($profile as $data) {
          # code...
  ?>

  <!-- Main content -->
  <section class="content">
    <!-- /.Row End --> 
    <div class="row">
      <!-- Profile -->
      <div class="col-md-4">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url('/assets/users/anggota/').$data->foto ?>" onerror="this.src='<?php echo site_url('assets/users/anggota/index.png'); ?>'" alt="User profile picture">
           <h3 class="profile-username text-center">
            <?php echo $data->nama_users?>
          </h3>

        </div>
        <!--- /.Box Body Profile End --->
      </div>

      <!-- About Me Box -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Tentang Saya</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i>Nama</strong>
          <p class="text-muted">
            <?php echo $data->nama_users?>
          </p>
          <hr>

          <strong><i class="fa fa-user margin-r-5"></i>Jenis Kelamin</strong>
          <p class="text-muted">
            <?php echo $data->jenis_kelamin?>
          </p>
          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Email</strong>
          <p class="text-muted">
            <?php echo $data->email?>
          </p>
          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i>Instansi</strong>
          <p class="text-muted">
            <?php echo $data->instansi?>
          </p>
          <hr>

          <strong><i class="fa fa-phone margin-r-5"></i> No Telpon</strong>
          <p class="text-muted">
            <?php echo $data->no_telpon?>
          </p>
          <hr>

          <div>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ubah-profile<?php echo $data->id_users; ?>" style="background:#1a75ff; border-color:#fff" onclick="ubah-profile"><i class="fa fa-pencil"></i> Ubah
            </button>
          </div>
        </div>
        <!-- /.BOX BODY ABOUT ME --> 
      </div>
      <!--- /.Box Primary About Me End --->
    </div>
    <!--- /.Col md 4 --->
  <?php }?>

  <!-- modal-content -->
  <div class="modal fade" id="ubah-profile<?php echo $data->id_users; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Data Anggota</h4>
          </div>

          <form action="<?php echo site_url('Anggota_profile/ubahAnggota') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" class="form-control" name="id_users" value="<?php echo $data->id_users ?>" >
								<input type="hidden" name="nama_foto" value="<?php echo $data->foto; ?>">

                <div class="form-group">
                  <label for="inputName" class="">Nama Anggota</label>
                  <input type="text" class="form-control" id="inputName" name="nama_users" value="<?php echo $data->nama_users; ?>">
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>        
                  <select class="form-control" name="jenis_kelamin">
                    <option value="Pria" <?php if($data->jenis_kelamin == "Pria") {echo "selected=selected";} ?>>Pria</option>
                    <option value="Wanita" <?php if($data->jenis_kelamin == "Wanita") {echo "selected=selected";} ?>>Wanita</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $data->email; ?>">
                </div>

                <div class="form-group">
                  <label for="inputTelp" class="">No Telpon</label>
                  <input type="text" class="form-control" id="inputName" name="no_telpon" value="<?php echo $data->no_telpon; ?>">
                </div>

                <div class="form-group">
                  <label for="inputTelp" class="">Instansi</label>
                  <input type="text" class="form-control" id="inputName" name="instansi" value="<?php echo $data->instansi; ?>">
                </div>

                <!--     <div class="form-group">
                      <label>Status Mahasiswa</label>        
                      <select class="form-control" name="posisi">
                        <option value="mahasiswa" <?php// if($data->posisi == "mahasiswa") {echo "selected=selected";} ?>>Mahasiswa</option>
                        <option value="alumni" <?php //if($data->posisi == "alumni") {echo "selected=selected";} ?>>Alumni</option>
                      </select>
                    </div>
                  -->
                  <div class="form-group">
                    <label class="">Upload Foto</label>
                    <input type="file" name="foto" value="<?php echo $data->foto; ?>">
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-primary" value="Simpan">
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="col-md-8">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title">Daftar Tim Anda</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Tim</th>
                  <th>Posisi Anda</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $no=1;
                foreach ($tampilTim as $item) {
                  # code...

                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $item->nama_tim; ?></td>
                    <td><?php echo $item->nama_posisi; ?></td>
                    <td>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail-tim<?php echo $item->id_tim; ?>">
                      Detail Anggota
                    </button>
                  </td>
                </tr>
                
                <!-- Modal Tim --> 
                <div class="modal fade bs-example-modal-lg" id="detail-tim<?php echo $item->id_tim; ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Susunan Anggota Tim <?php echo $item->nama_tim; ?></h4>
                        </div>

                        <div class="modal-body">
                          <div class="box-body">


                            <?php 
                            $index=1;
                            $detail_tim=$this->Anggota_profile_model->getDetailTeam($item->id_tim);
                            foreach ($detail_tim as $tim) {
                                  # code...

                              ?>
                              <div class="row">
                                      <!-- <div class="col-md-1">
                                      </div> -->
                                      <div class="col-md-1">
                                        <h5><?php echo $index ?></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <img style="height: 50px; width: 50px; border-radius: 100%" src="<?php echo site_url('assets/users/klien/'.$tim->foto) ?>">
                                      </div>
                                      <div class="col-md-2">
                                        <h5><?php echo $tim->nama_users; ?></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <h5><?php echo $tim->nama_posisi; ?></h5>
                                      </div>
                                      <div class="col-md-3">
                                        <h5><?php echo $tim->email; ?></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <h5><?php echo $tim->no_telpon; ?></h5>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <?php 
                                    $index++; 
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        
                        <?php 
                        $no++; 
                      }
                      ?>
                    </tbody>
                  </table>
                </div>  
              </div>
            </div>
            <!-- /.COL-MD-8 -->
          </div>
          <!--- /.ROW --->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


      <?php
      $this->load->view('anggota/foot_anggota');
      ?>