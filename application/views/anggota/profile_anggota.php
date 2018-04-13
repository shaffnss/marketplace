<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Profil Anggota</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- /.Row End --> 
    <div class="row">
      <!-- Profile -->
      <div class="col-md-4">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('AdminLTE/dist') ?>/img/user4-128x128.jpg" alt="User profile picture">
            <h3 class="profile-username text-center">(NAMA KLIEN)</h3>
            <p class="text-muted text-center">Software Engineer</p>
          </div>
        </div>

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tentang Saya</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Nama Anggota</strong>
            <p class="text-muted">Fira</p>
            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Email</strong>
            <p class="text-muted"> fira@gmail.com</p>
            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> No Telfon</strong>
            <p class="text-muted">082138657982</p>
            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Posisi</strong>
            <p class="text-muted"> penggembira</p>

            <div>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ubah-data">
                Ubah
              </button>
            </div>

            <!-- modal-content -->
            <div class="modal fade" id="ubah-data">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Data Anggota</h4>
                          </div>

                          <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputName" class="">Nama Anggota</label>
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
                                <label for="inputPosisi" class="">Posisi</label>
                                <div>            
                                  <select class="form-control">
                                    <option disabled selected="">---Pilih Posisi---</option>
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputSkills" class="">Skills</label>
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">                           
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
             </div> 
           <!-- /.About Me Box -->
        </div>     
        <!-- /.Profile End-->

        <div class="col-md-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Anggota Team</h3>
              <h5>Nama Team : halo</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama Anggota</th>
                  <th>Email</th>
                  <th>No Telfon</th>
                  <th>Posisi</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>email@gmail.com</td>
                  <td>08214657885</td>
                  <td>Bacon</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>email@gmail.com</td>
                  <td>08214657885</td>
                  <td>Bacon</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>email@gmail.com</td>
                  <td>08214657885</td>
                  <td>Bacon</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>email@gmail.com</td>
                  <td>08214657885</td>
                  <td>Bacon</td>
                </tr>
              </table>
            </div>
         
        </div>
      </div>
      <!-- /.Row End --> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php
  $this->load->view('anggota/foot_anggota');
  ?>