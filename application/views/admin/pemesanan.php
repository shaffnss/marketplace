<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pemesanan</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"> Pemesanan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Pemesanan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Nama Instansi</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>
              
              <?php 
              $no=1;
              foreach ($konfirmasi_pemesanan as $item) {
                  # code...

                ?>
              <tbody>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $item->nama_users; ?></td>
                  <td><?php echo $item->instansi; ?></td>
                  <td><?php echo $item->tgl_pemesanan ?></td>
                  <td>
                    <?php 
                      if($item->status_pemesanan=="diterima"){ 
                    ?>
                    <span class="label label-success">Diterima</span>
                    <?php 
                      }elseif ($item->status_pemesanan=="ditolak") {
                    ?>
                    <span class="label label-danger">ditolak</span>
                    <?php 
                      }else if ($item->status_pemesanan=="selesai"){
                    ?>
                    <span class="label label-info">selesai</span>
                    <?php 
                      }else{
                    ?>
                    <span class="label label-warning">proses</span>
                    <?php 
                      }
                    ?>
                  </td>
                  <td>
                    <a href="<?php echo site_url('Admin_pemesanan/detail_pemesanan/'.$item->id_users)?>" type="button" class="btn btn-primary" />Lihat Detail</a>
                  </td>
                </tr>
                <?php $no++; }?>
                </tbody>
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