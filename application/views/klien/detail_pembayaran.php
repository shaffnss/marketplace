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
		<h1>Pembayaran</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('Klien_dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo site_url('Klien_pembayaran')?>"><i class="fa fa-money"></i>Invoice & Pembayaran</a></li>
			<li><a href="<?php echo site_url('Klien_pembayaran/invoice')?>"><i class="fa fa-file-text-o"></i>Invoice</a></li>
			<li class="active">Pembayaran</li>
		</ol>
	</section>

	<div class="container" style="padding-top: 20px">
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><i class="fa fa-info"></i> Informasi Perjanjian</button>
	</div>

	<div id="demo" class="collapse" style="padding-top: 10px">
		<div class="col-lg-12">
			<div class="alert alert-info"> 
				<h4>Informasi mengenai <strong>jenis perjanjian</strong> untuk pengisian form pembayaran dibawah</h4> 
				<p>Pemilihan jenis perjanjian berguna untuk menentukan tipe pembelian yang klien inginkan dengan keterangan sebagai berikut :</p>
				<table border="3" style="border-color: transparent; border-radius: 5px;" class="table table-sm table borderless"> 
					<tr style="height: 10px;"> 
						<td style="width: 6%"><h5> Beli Lepas</h5></td> 
						<td style="width: 62%"><h5> Beli lepas merupakan perjanjian dimana ketika telah melakukan pembayaran dan penyerahan, produk sepenuhnya menjadi milik klien </h5></td> 
					</tr> 
					<tr style="height: 30px"> 
						<td><h5>Trial</h5></td> 
						<td><h5> Trial merupakan perjanjian dimana ketika telah melakukan pembayaran dan penyerahan, produk hanya dapat digunakan oleh klien sesuai dengan periode penggunaan yang telah disepakati </h5></td> 
					</tr> 
					<br> 
				</table> 
			</div>
		</div>
	</div>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- Form Tambah Klien -->
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Detail Pembelian</h3>
					</div>
					<!-- Table row -->
					<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Jenis Sistem</th>
										<th>Harga</th>
									</tr>
								</thead>

								<?php 
								$no=1;
								foreach ($pembayarans as $pembayaran) { ?>

									<tbody>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $pembayaran->nama_produk ?></td>
											<td><?php echo $pembayaran->nama_kategori ?></td>
											<td><?php echo rupiah($pembayaran->harga_produk)?></td>
										</tr>
									</tbody>
									<?php $no++; }?>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
				</div>

				<!-- upload pembayaran -->
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Pembayaran Produk</h3>
						</div>

						<h3 class="text-center">Pilih Jenis Perjanjian dan Upload Bukti Pembayaran</h3>

						<form class="form-horizontal" method="post" action="<?php echo site_url('Klien_pembayaran/unggahPembayaran')?>" enctype="multipart/form-data">

							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Jenis Perjanjian</label>
									<div class="col-sm-8">
										<input type="hidden" name="id_pembelian" value="<?php echo $this->uri->segment(3) ?>">
										<select class="form-control" name="nama_perjanjian">
											<option disabled selected="">--- Pilih Jenis Perjanjian ---</option>
											<?php foreach ($perjanjians as $perjanjian) { ?>
												<option value="<?php echo $perjanjian->id_kategori ?>"><?php echo $perjanjian->nama_perjanjian?></option>
											<?php } ?>
										</select>  
									</div>
								</div>

								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Keterangan Perjanjian</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" id="inputExperience" placeholder="Keterangan" name="keterangan_perjanjian" maxLength="255" required=""></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Upload Bukti Pembayaran</label>
									<div class="col-sm-8">
										<input type="file" name="bukti_pembayaran" required>
										<p class="text-muted"><i>*Maksimal ukuran file 3 MB (tipe file .gif, .jpg, .png, .jpeg, .pdf)</i></p>
									</div>
								</div>
							</div>

						<div class="box-footer">
							<a href="<?php echo site_url('Klien_pembayaran/invoice/'.$this->uri->segment(3))?>" type="button" class="btn btn-default" >
								<i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
								<input type="submit" class="btn btn-success pull-right" value="Unggah Pembayaran">
							</div>
						</form>
						</div>
					</div>
					<!-- /.upload pembayaran -->
				</div>
			</div>




		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
