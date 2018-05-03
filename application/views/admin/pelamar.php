<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pelamar</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-file"></i> Pelamar</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Pelamar</h3>
          </div>
          <!-- /.box-header -->
         <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelamar</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No Telpon</th>
                <th>Instansi</th>
                <th>Pilihan Posisi</th>
                <th>File CV</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <?php 
                   $no=1;
                     foreach ($pelamar as $data) {
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
                <td><?php echo $data->posisi_tim?></td>
                <td>CV</td>
                <td>
                    <a class="btn btn-success glyphicon glyphicon-ok"></a>
                    <button class="btn btn-danger glyphicon glyphicon-remove"></button>

                </td>
              </tr>
              </tbody>
              <?php $no++; 
                } 
              ?>
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