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
      <div class="col-xs-12">
        <div class="callout callout-info">
          <h4>Tata Cara Pembayaran :</h4>
					
          <p>Silahkan lakukan pembayaran pembelian sistem anda melalui Transfer ke nomor rekening Bank BNI 009477590342929 a.n Shafira Fitrianissa</p>
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
                  <th>Total Harga</th>
                  <th>Tanggal Pembelian</th>
                  <th>Bukti pembayaran</th>
                  <th>File Perjanjian</th>
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
                    <td><?php echo rupiah($item->total)?></td>
                    <td><?php echo $item->tgl_pembelian ?></td>
                    <td><?php if(!empty($item->bukti_pembayaran)) { ?><a target="_blank" href="<?php echo site_url("assets/bukti pembayaran/" . $item->bukti_pembayaran) ?>" ><i class="fa fa-file"></i></a><?php }else{echo "-";} ?></td>
                    <td><?php if(!empty($item->file_perjanjian)) { ?><a target="_blank" href="<?php echo site_url("assets/bukti pembayaran/" . $item->bukti_pembayaran) ?>" ><i class="fa fa-pdf"></i></a><?php }else{echo "-";} ?></td>
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
                        <a href="<?php echo site_url('Klien_pembayaran/invoice/'.$item->idPembelian)?>" class="btn btn-primary" >Pembayaran</a>
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
