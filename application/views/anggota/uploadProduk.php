<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Produk</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li class="active"> Unggah Data Produk</li>
   </ol>
 </section>

 <section class="content-header">
  <div>
    <a href="<?php echo site_url('Anggota_uploadProduk/uploadProduk')?>" type="button" class="btn btn-primary" >
      <i class="glyphicon glyphicon-plus"></i> Unggah
    </a>
  </div> 
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Produk yang Telah Diunggah</h3>
        </div>
       
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
             <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Jenis Produk</th>
              <th>Harga</th>
              <th>Deskripsi Produk</th>
              <th>Link Demo</th>
              <th>Tampilan Produk</th>
              <th>Status</th>
            </tr>
            </thead>

            <?php 
            $no=1;
            foreach ($upload as $data) {
              # code...
            
            ?>
            <tbody>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $data->nama_produk?></td>
              <td><?php echo $data->jenis_produk?></td>
              <td><?php echo $data->harga_produk?></td>
              <td><?php echo $data->deskripsi_produk?></td>
              <td><?php echo $data->link_demo?></td>
              <td><?php echo $data->mockup_produk?></td>
              <td><span class="label label-success">Disetujui</span></td>
              <?php 
              $no++; }
              ?>
            </tr>
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
$this->load->view('anggota/foot_anggota');
?>