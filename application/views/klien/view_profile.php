<?php
$this->load->view('klien/head_klien');
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
          <div class="box box-warning">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo site_url('/assets/users/klien/').$data->foto ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $data->nama_users?></h3>

              <?php if($data->nama_roles=='klien') {
                ?>
                <p class="text-muted text-center">Klien</p>
              <?php }?>
            </div>
            <!-- /.box-body -->
          </div>

          <!-- About Me Box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Nama</strong>

              <p class="text-muted"><?php echo $data->nama_users?></p>

              <hr>

              <strong><i class="fa fa-intersex margin-r-5"></i>Jenis Kelamin</strong>

              <p class="text-muted"><?php echo $data->jenis_kelamin?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Email</strong>

              <p class="text-muted"><?php echo $data->email?></p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> No Telfon</strong>

              <p class="text-muted"><?php echo $data->no_telpon?></p>

              <hr>

              <strong><i class="fa fa-building margin-r-5"></i> Nama Instansi</strong>

              <p class="text-muted"><?php echo $data->instansi?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box-warning-->
        </div>
        <!-- /.col-md-4 -->
      <?php  } ?>


      <div class="col-md-8">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#ubahData" data-toggle="tab">Ubah Data</a></li>
            <li><a href="#ubahPassword" data-toggle="tab">Ubah Password</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="ubahData">
              <form action="<?php echo site_url('Klien_profile/ubahKlien') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" class="form-control" name="id_users" value="<?php echo $data->id_users; ?>">

               <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nama</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" name="nama_users" value="<?php echo $data->nama_users; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label> 

                <div class="col-sm-10">       
                  <select class="form-control" name="jenis_kelamin">
                    <option value="Pria" <?php if($data->jenis_kelamin == "Pria") {echo "selected=selected";} ?>>Pria</option>
                    <option value="Wanita" <?php if($data->jenis_kelamin == "Wanita") {echo "selected=selected";} ?>>Wanita</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="<?php echo $data->email; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="inputTelp" class="col-sm-2 control-label">No Telpon</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" name="no_telpon" value="<?php echo $data->no_telpon; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="inputTelp" class="col-sm-2 control-label">Instansi</label>

                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputName" name="instansi" value="<?php echo $data->instansi; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Upload Foto</label>

                <div class="col-sm-10">
                  <input type="file" name="foto" value="<?php echo $data->foto; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success pull-right" value="Simpan">
                </div>
              </div>
            </form>
          </div>    

          <div class="tab-pane" id="ubahPassword">
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputName">Password Baru</label>
                  </div>

                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="inputName" placeholder="Masukkan Password Baru">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-3">
                    <label for="inputEmail">Re-type Password</label>
                  </div>

                  <div class="col-sm-12">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Re-type Password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-10 col-sm-12">
                    <input type="submit" class="btn btn-success" value="Simpan">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
$this->load->view('klien/foot_klien');
?>