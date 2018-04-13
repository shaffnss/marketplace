<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Manajemen Proyek</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
     <!-- Tabel Proyek Terbaru-->
     <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Daftar Proyek Terbaru</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Proyek</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01</td>
                <td>Aya</td>
                <td><span class="label label-success">Approved</span></td>
                <td>
                  <a class="btn btn-primary"> Dikerjakan</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.Tabel Proyek Terbaru-->

    <!-- Tabel Proyek Dikerjakan-->
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Daftar Proyek Dikerjakan</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Proyek</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01</td>
                <td>Aya</td>
                <td><span class="label label-success">Approved</span></td>
                <td>
                  <a href="<?php echo site_url('Proyek_anggota/proyek')?>" type="button" class="btn btn-primary" />Lihat Detail</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.Tabel Proyek Dikerjakan-->

</div>
</section>
</div>





<?php
$this->load->view('anggota/foot_anggota');
?>