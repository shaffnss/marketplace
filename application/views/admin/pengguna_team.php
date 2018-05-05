<?php<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Daftar Tim</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Tim</a></li>
    </ol>
  </section>

  <!-- Modals Tambah Tim -->
  <section class="content-header">
    <div>
      <a href="<?php echo site_url('Admin_team/tambah_team')?>" type="button" class="btn btn-warning" >
        <i class="glyphicon glyphicon-plus"></i> Tambah Tim
      </a>
    </div> 
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Tim</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Team</th>
                  <th>Jumlah Anggota</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php 
              $no=1;
              foreach ($tim as $data) {
                    # code...

               ?>
               <tbody>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data->nama_tim?></td>
                  <td>jumlah anggota</td>
                  <td>
                    <a class="btn btn-sm btn-info" href="<?php echo site_url('Admin_team/ubah_team')?>" style="background: #4e9e02; border-color:#fff"><i class="fa fa-pencil"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
              <?php $no++; } ?>
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
