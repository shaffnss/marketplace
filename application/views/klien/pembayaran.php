<?php
	$this->load->view('klien/head_klien');
	
	function rupiah($angka){
		
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Invoice & Pembayaran</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Klien_dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"> Invoice & Pembayaran</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
<div class="row">
      <div class="col-md-12">
         <!-- Alert -->
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('style'); ?> fade-in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp; 
        </br><?php echo $this->session->flashdata('message'); ?>
      </div>
    <?php endif; ?>
    <!-- End Alert -->

        <div class="row">
          <div class="col-md-12">
            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12">
        <div class="callout callout-warning">
          <h4>Lanjutkan Pembayaran Anda</h4>
					
          <p>Silahkan lanjutkan pembayaran dengan upload bukti pembayaran pada pembelian Anda</p>
				</div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pembayaran Pembelian Produk</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped data-tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pembelian</th>
                  <th>Total Harga</th>
                  <th>Tanggal Pembelian</th>
                  <th>Bukti pembayaran</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
								</tr>
							</thead>
							
              <?php 
								$no=1;
								foreach ($pembelian as $item) { ?>
								
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $item->kode_pembelian ?></td>
                    <td><?php echo rupiah($item->total)?></td>
                    <td><?php echo date("d F Y", strtotime($item->tgl_pembelian)) ?></td>
                    <td><?php if(!empty($item->bukti_pembayaran)) { ?><a target="_blank" href="<?php echo site_url("assets/bukti pembayaran/" . $item->bukti_pembayaran) ?>" ><i class="fa fa-file fa-2x"></i></a><?php }else{echo "-";} ?></td>
                    <td>
                      <?php if($item->status_pembelian=='proses') {
											?>
											<span class="label label-warning">Proses</span>
                      <?php }else{ ?>
											<span class="label label-success">Selesai</span>
                      <?php }?>
										</td>
                    <td>
                      <div>
                        <a href="<?php echo site_url('Klien_pembayaran/invoice/'.$item->idPembelian)?>" class="btn btn-success btn-sm" ><i class="fa fa-check"></i> Bayar</a>
                         <?php if(!$item->bukti_pembayaran){   ?>
                        <a onclick="return confirm('Apakah Anda yakin ingin menghapus Pembelian ini?');" class="btn btn-danger btn-sm glyphicon glyphicon-remove" href="<?php echo site_url('Klien_pembayaran/hapusPembelian/'.$item->idPembelian); ?>"></a>
                      <?php }?>
                      </div> 
                    </td>
                  </tr>
                </tbody>
                <?php $no++; } 
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
	$this->load->view('klien/foot_klien');
?>
