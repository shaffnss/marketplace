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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-tim">
        Tambah
      </button>
    </div> 
  </section>

  <div class="modal fade" id="tambah-tim">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambahkan Tim</h4>
          </div>

          <form id="form" class="form-horizontal" method="POST" action="<?php echo site_url('Admin_team/inputTeam') ?>">
            <div class="modal-body">
              <label>Nama Tim</label>
              <div>
                <input type="text" class="form-control" name="nama_tim" placeholder="Masukkan Nama Tim">
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.Modals Tambah Tim -->

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
                    <th>Detail Anggota</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <?php 
                $i=1;
                foreach ($tim as $data) {
                    # code...
                  
                 ?>
                 <tbody>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data->nama_tim?></td>
                    <th>
                      <a href="<?php echo site_url('Admin_team/detail_anggota')?>" type="button" class="btn btn-primary" /> Lihat </a>
                    </th>
                    <td><span class="label label-success">Aktif</span></td>
                  </tr>
                </tbody>
                <?php $i++; } ?>
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
  