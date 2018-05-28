<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>User Anggota Tim</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i> Anggota</a></li>
    </ol>
  </section>

  <section class="content-header">
   <?php  
   if ($this->session->userdata('role')== 4){
    ?>
    <div>
      <a href="<?php echo site_url('Admin_Anggota/tambah_anggota')?>" type="button" class="btn btn-primary" >
        <i class="glyphicon glyphicon-plus"></i> Tambah Anggota Tim
      </a>
    </div> 
  <?php }?>
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
                <th>Foto</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>E-mail</th>
                <th>No Telpon</th>
                <th>Instansi</th>
                <th>Status</th>
                <?php  
                if ($this->session->userdata('role')== 4){
                  ?>
                  <th>Aksi</th>
                </tr>
              <?php }?>
            </thead>

            <?php 
            $no=1;
            foreach ($anggota as $data) {
                  # code...
              ?>
              <tbody>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><img src="<?php echo site_url('/assets/users/anggota/').$data['foto'] ?>" class="img-responsive" style="height: 100px; width: 100px"></td>
                  <td><?php echo $data['nama_users']?></td>
                  <td><?php echo $data['jenis_kelamin']?></td>
                  <td><?php echo $data['email']?></td>
                  <td><?php echo $data['no_telpon']?></td>
                  <td><?php echo $data['instansi']?></td>

                  <td>
                    <?php if($data['status_users']=='aktif') {
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
                      <div>
                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah-data<?php echo $data['id_users']; ?>"><i class="fa fa-edit"></i></button>
                        <button type="button" onclick="reset_password(<?php echo $data['id_users']; ?>)" class="btn btn-sm btn-black">Reset</button>
                      </div>   
                    </td>
                  <?php }?>
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
                              <input type="hidden" class="form-control" id="inputName" name="id_users" value="<?php echo $data['id_users']; ?>" required>

                              <div class="form-group">
                                <label class="">Nama Anggota</label>
                                <input type="text" class="form-control" id="inputName" name="nama_users" value="<?php echo $data['nama_users']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Jenis Kelamin</label>        
                                <select class="form-control" name="jenis_kelamin">
                                  <option value="Pria" <?php if($data['jenis_kelamin'] == "Pria") {echo "selected=selected";} ?>>Pria</option>
                                  <option value="Wanita" <?php if($data['jenis_kelamin'] == "Wanita") {echo "selected=selected";} ?>>Wanita</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label class="">Instansi</label>
                                <input type="text" class="form-control" id="inputName" name="instansi" value="<?php echo $data['instansi']; ?>" required>
                              </div>

                              <div class="form-group">
                                <label for="inputEmail" class="">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $data['email']; ?>">
                              </div>

                              <div class="form-group">
                                <label for="inputTelp" class="">No Telpon</label>
                                <input type="text" class="form-control" id="inputName" name="no_telpon" value="<?php echo $data['no_telpon']; ?>">
                              </div>

                              <div class="form-group">
                                <label class="">Upload Foto</label>
                                <input type="file" name="foto" value="<?php echo $data['foto']; ?>">
                              </div>

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

      <script type="text/javascript">
        function reset_password(id){
          if(confirm('Apakah anda yakin akan reset password ?')){

            $.ajax({
              url: "<?php echo base_url('Admin_anggota/reset')?>/"+ id,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                if (data.status==true) {
                  alert("Password baru adalah "+data.data);
                  location.reload();
                }
              },
              error: function(jqXHR, textStatus, errorThrown)
              {
                alert('Error deleting data');
              }
            });
          }
        }
      </script>