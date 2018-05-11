<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Daftar Anggota Tim</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i> Anggota</a></li>
    </ol>
  </section>

  <section class="content-header">
    <div>
      <a href="<?php echo site_url('Admin_Anggota/tambah_anggota')?>" type="button" class="btn btn-primary" >
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
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>E-mail</th>
                  <th>No Telpon</th>
                  <th>Instansi</th>
                  <th>Status Mahasiswa</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <?php 
              $no=1;
              foreach ($anggota as $data) {
                  # code...
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->nama_users?></td>
                    <td><?php echo $data->jenis_kelamin?></td>
                    <td><?php echo $data->email?></td>
                    <td><?php echo $data->no_telpon?></td>
                    <td><?php echo $data->instansi?></td>
                    <td>
                      <?php if($data->status_mhs=='mahasiswa') {
                        ?>
                        <span class="label label-primary">Mahasiswa</span>
                        <?php }else{ ?>
                          <span class="label label-info">Alumni</span>
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

                            <td>
                              <div>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ubah-data<?php echo $data->id_users; ?>" style="background:#1a75ff; border-color:#fff"><i class="fa fa-pencil"></i>
                                </div>   
                              </td>
                            </tr>

                            <!-- Modals Ubah Data -->
                            <div class="modal fade" id="ubah-data<?php echo $data->id_users; ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Ubah Data Anggota</h4>
                                    </div>

                                    <div class="modal-body">
                                      <form action="<?php echo site_url('Admin_anggota/ubahAnggota') ?>" method="post" class="form-horizontal">
                                        <div class="box-body">
                                          <input type="hidden" class="form-control" id="inputName" name="id_users" value="<?php echo $data->id_users; ?>" required>

                                          <div class="form-group">
                                            <label class="">Nama Anggota</label>
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
                                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $data->email; ?>">
                                          </div>

                                          <div class="form-group">
                                            <label for="inputTelp" class="">No Telpon</label>
                                            <input type="text" class="form-control" id="inputName" name="no_telpon" value="<?php echo $data->no_telpon; ?>">
                                          </div>


                            <div class="form-group">
                              <label class="">Instansi</label>
                              <input type="text" class="form-control" id="inputName" name="instansi" value="<?php echo $data->instansi; ?>" required>
                            </div>



                                          <div class="form-group">
                                            <label>Jstatus Mahasiswa</label>        
                                            <select class="form-control" name="status_mhs">
                                              <option value="mahasiswa" <?php if($data->status_mhs == "mahasiswa") {echo "selected=selected";} ?>>Mahasiswa</option>
                                              <option value="alumni" <?php if($data->status_mhs == "alumni") {echo "selected=selected";} ?>>Alumni</option>
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <label>Status</label>
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