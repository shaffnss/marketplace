<?php
$this->load->view('admin/head_admin');
function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pembelian Produk Selesai</h1>
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
         <!--  <div class="box-header">
            <h3 class="box-title">Tabel Pembelian</h3>
          </div> -->

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pembelian</th>
                  <th>Nama Klien</th>
                  <th>Total</th>
                  <th>Tgl Pembelian</th>
                  <th>Bukti Pembayaran</th>
                  <th>File Perjanjian</th>
                  <th>Status</th>
                </tr>
              </thead>

              <?php 
               $no=1;
              foreach ($pembelian as $item) { ?>
              
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                     <td><?php echo $item->kode_pembelian; ?></td>
                    <td><?php echo $item->nama_users; ?></td>
                    <td><?php echo rupiah($item->total)?></td>
                    <td><?php echo $item->tgl_pembelian; ?></td>
                    <td><?php if(!empty($item->bukti_pembayaran)) { ?><a target="_blank" href="<?php echo site_url("assets/bukti pembayaran/" . $item->bukti_pembayaran) ?>" ><i class="fa fa-file fa-2x"></i></a><?php }else{echo "-";} ?></td>
                    <td><?php if($item->file_perjanjian){ ?><a href="<?php echo site_url().'assets/file_perjanjian/'.$item->file_perjanjian ?>" target="_blank"><i class="fa fa-file-pdf-o fa-2x" style="color:black"></i></a><?php }else{echo '-';} ?></td>
                    <td>
                      <span class="label label-success">Selesai</span>
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