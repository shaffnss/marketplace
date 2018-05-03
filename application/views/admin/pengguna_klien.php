<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Daftar Klien</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="#"><i class="fa fa-dashboard"></i> Klien</a></li>
   </ol>
 </section>

 <section class="content-header">
  <div>
    <a href="<?php echo site_url('Admin_klien/tambah_klien')?>" type="button" class="btn btn-primary" >
      <i class="glyphicon glyphicon-plus"></i> Tambah
    </a>
  </div> 
</section>

<!-- Main content -->
<section class="content">
  <div class="row">

    <!-- Form Daftar Klien -->
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Klien</h3>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <th>No</th>
              <th>Nama Klien</th>
              <th>Jenis Kelamin</th>
              <th>Instansi</th>
              <th>No Telfon</th>
              <th>E-mail</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <?php 
          $no=1;
          foreach ($klien as $data) {
                  # code...

            ?>
            <tbody>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data->nama_users?></td>
                <td><?php echo $data->jenis_kelamin?></td>
                <td><?php echo $data->instansi?></td>
                <td><?php echo $data->no_telpon?></td>
                <td><?php echo $data->email?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-data">
                      Ubah
                    </button>     
                </td>
              </tr>
              <?php $no++; } ?>
            </tbody>
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
            <h4 class="modal-title">Ubah Data Klien</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label class="">Nama Klien</label>
                <input type="text" class="form-control" id="inputName" name="nama_users" placeholder="Nama Anggota">
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>          
                <select class="form-control" name="jenis_kelamin" required="">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>

              <div class="form-group">
                <label class="">Instansi</label>
                <input type="text" class="form-control" id="inputName" name="instansi" placeholder="Nama Anggota">
              </div>

              <div class="form-group">
                <label class="">No Telpon</label>
                <input type="text" class="form-control" id="inputName" name="nama_users" placeholder="Nama Anggota">
              </div>

              <div class="form-group">
                <label class="">Email</label>
                <input type="text" class="form-control" id="inputName" name="email" placeholder="Nama Anggota">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->      
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
$this->load->view('admin/foot_admin');
?>