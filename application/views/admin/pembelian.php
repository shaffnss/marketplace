<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pembayaran Pembelian Produk</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"> Pembelian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Pembelian</h3>
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Klien</th>
                  <th>Instansi</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                  <th>Tanggal Pembelian</th>
                  <th>Bukti Pembayaran</th>
                  <th>Bukti Terima</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <?php 
               $no=1;
              foreach ($pembelian as $item) { ?>
              
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $item->nama_users; ?></td>
                    <td><?php echo $item->instansi; ?></td>
                    <td><?php echo $item->nama_produk; ?></td>
                    <td><?php echo $item->jumlah_pembelian; ?></td>
                    <td><?php echo $item->total; ?></td>
                    <td><?php echo $item->tgl_pembelian; ?></td>
                    <td><?php echo $item->bukti_pembayaran; ?></td>
                    <td><?php echo $item->bukti_terima; ?></td>
                    <td>
                      <?php 
                        if($item->status_pembelian=="proses"){ 
                      ?>
                      <span class="label label-warning">Proses</span>
                      <?php 
                        }else{ 
                      ?>
                      <span class="label label-success">Selesai</span>
                      <?php 
                        }
                      ?>
                    </td>
                    <td>
                      <div>
                        <a href="<?php echo site_url('Admin_pembelian/ubahStatus/'.$item->id_pembelian)?>" class="btn btn-success glyphicon glyphicon-ok"> Selesai</a>
                      </div>
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