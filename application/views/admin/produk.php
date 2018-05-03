<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Produk</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li class="active"> Produk</li>
   </ol>
 </section>

 <section class="content-header">
  <div>
    <a href="<?php echo site_url('Admin_produk/tambahProduk')?>" type="button" class="btn btn-primary" >
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
          <h3 class="box-title">Tabel Produk</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jenis Sistem</th>
                <th>Harga</th>
                <th>Deskripsi Produk</th>
                <th>Team Pembuat</th>
                <th>Tampilan Produk</th>
                <th>Link Demo</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            $i=1;
            foreach ($produk as $data) {
                # code...

              ?>
              <tbody>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $data->nama_produk?></td>
                  <td><?php echo $data->jenis_produk?></td>
                  <td><?php echo $data->harga_produk?></td>
                  <td><?php echo $data->deskripsi_produk?></td>
                  <td><?php echo $data->nama_tim?></td>
                  <td><?php echo $data->mockup_produk?></td>
                  <td><?php echo $data->link_demo?></td>
                  <td><span class="label label-success">Aktif</span></td>
                  <td>
                     <div>
    <a href="<?php echo site_url('Admin_produk/ubahProduk')?>" type="button" class="btn btn-primary"></i> Ubah</a>
  </div> 
                  </td>
                    <?php $i++; } ?>
                  </tr>
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