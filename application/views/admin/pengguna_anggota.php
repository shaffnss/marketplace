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
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>E-mail</th>
                  <th>No Telpon</th>
                  <th>Posisi</th>
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
                    <td><?php echo $data->email?></td>
                    <td><?php echo $data->no_telpon?></td>
                    <td><?php echo $data->posisi_tim?></td>
                    <td><a href="<?php echo site_url('Admin_Anggota/ubah_status/'.$data->id_users) ?>">
                      <span class="label label-<?php echo ($data->status=='aktif')?'success':'danger' ?>"><?php echo ($data->status=='aktif')?'Aktif':'Tidak Aktif' ?></span></a>
                    </td>
                    <td>
                      <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-data">Ubah
                        </button>
                      </div>   
                    </td>
                  </tr>
                </tbody>
                <?php 
                $no++; } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- Modals Ubah Data -->
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
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">         </div>
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
              <!-- /.Modals Ubah Data -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->


          <?php
          $this->load->view('admin/foot_admin');
          ?>