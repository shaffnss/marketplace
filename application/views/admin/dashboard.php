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
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<center><p style="font-size: 30px;" >Selamat Datang, <?php echo $this->session->userdata('name');?>!<br></p></center>
			<br>
		</div>
		<!-- <hr style="border-width: 1px; border-color: #DDD;"> -->

		<!-- Box Notifikasi -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-aqua"><i class="fa fa-cart-plus"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Pembelian</span>
							<span class="info-box-number"><?php echo sizeof($pembelian);?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-red"><i class="fa fa-plus-square"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Produk Masuk</span>
							<span class="info-box-number"><?php echo sizeof($produk);?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-green"><i class="fa fa-check-square"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Produk Diterima</span>
							<span class="info-box-number"><?php echo sizeof($produkDiterima);?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Klien Baru</span>
							<span class="info-box-number"><?php echo sizeof($klien);?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			
			<br>
			<br>

			<div class="row">
				<!-- TABLE: LATEST ORDERS -->
				<div class="col-md-8">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Pembelian Terbaru</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin datatable" id="example1">
									<thead>
										<tr>
											<th>Kode Pembelian</th>
											<th>Status</th>
											<th>Nama Klien</th>
											<th>Bukti Pembayaran</th>
										</tr>
									</thead>

									<?php 
									foreach ($dashboards as $dashboard) { 
										?>
										<tbody>
											<tr>
												<td><?php echo $dashboard->kode_pembelian?></td>
												<td><span class="label label-warning">Proses</span></td>
												<td><?php echo $dashboard->nama_users?></td>
												<td><?php if($dashboard->bukti_pembayaran){ ?><a href="<?php echo site_url('assets/bukti pembayaran/'.$dashboard->bukti_pembayaran) ?>"><i class="fa fa-file"></i></a><?php }else{echo "<i style='color: #dd4b39' class='fa fa-close'></i>";} ?></td>
											</tr>
										</tbody>
									<?php }?>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer clearfix">
							<a href="<?php echo site_url('Admin_pembelian') ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Pembelian</a>
						</div>
						<!-- /.box-footer -->
					</div>
					<!-- /.box -->
				</div>

				<div class="col-md-4">
					<!-- PRODUCT LIST -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Produk Masuk Terbaru</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							
							<ul class="products-list product-list-in-box">
								<?php foreach ($produks as $produk) { ?>
									<li class="item">
									<div class="product-info">
										<p class="product-title"><?php echo $produk->nama_produk?></p>
										<span class="label label-info pull-right"><?php echo rupiah($produk->harga_produk)?></span></a>
										<span class="product-description">By: <?php echo $produk->nama_tim?></span>
									</div>
								</li>
							<?php }?>
						</ul>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
						<a href="<?php echo site_url('Admin_produk') ?>" class="uppercase">Lihat Semua Produk</a>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col-md-4 -->
		</div>
		<!-- /.row -->
	</section>
	<!-- Box Notifikasi (End) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$this->load->view('admin/foot_admin');
?>
