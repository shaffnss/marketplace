<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>User Anggota Team</h1>
  </section>

  <section class="content-header">
    <div>
      <a href="<?php echo site_url('User_Anggota/tambah_anggota')?>" type="button" class="btn btn-primary" >
        <i class="glyphicon glyphicon-plus"></i> Tambah
      </a>
    </div> 
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Anggota Team</h3>

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>E-mail</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              <tr>
                <td>01</td>
                <td>Fira</td>
                <td>fira@gmail.com</td>
                <td>Programmer</td>
                <td><span class="label label-success">Approved</span></td>
                <td>
                  <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-data">
                      Ubah
                    </button>
                  </div> 

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
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php
  $this->load->view('admin/foot_admin');
  ?>