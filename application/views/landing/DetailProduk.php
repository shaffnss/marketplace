<?php
	$this->load->view('landing/head_landing');
	
	function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>

<!-- Page Content -->
<div class="container my-4">
	<div class="row">
		<div class="col-lg-3">
			<h1 class="my-4">Detail Produk</h1>
			<div class="list-group">
				<a href="#" class="list-group-item active"><?php echo $produks->nama_kategori ?></a>
			</div>
		</div>
		<!-- /.col-lg-3 -->
		
		<div class="col-lg-9">
			<br>
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<img class="d-block w-100" src="<?php echo site_url('assets/produk/'.$produks->foto_produk) ?>" onerror="this.src='<?php echo site_url('assets/produk/hal_admin.JPg'); ?>'" alt="Foto Produk">
			</div>
			
			<div class="card mt-4">
				<div class="card-body">
					<h3 class="card-title"><?php echo $produks->nama_produk ?>
					<a target="_blank" href="<?php echo $produks->link_demo ?>" class="btn btn-primary float-right">Lihat Demo</a></h3>
					<p class="card-text"><?php echo rupiah($produks->harga_produk) ?> <b>[Beli Lepas]</b> | <?php echo rupiah($produks->harga_produk*0.6) ?> <b>[Trial]</b> (Diskon 40%)</p>
					<p class="small text-muted"><strong>Beli Lepas</strong> | Perjanjian dimana ketika telah melakukan pembayaran dan penyerahan, produk sepenuhnya menjadi milik klien <br><strong>Trial</strong> | Perjanjian dimana ketika telah melakukan pembayaran dan penyerahan, produk hanya dapat digunakan oleh klien sesuai dengan periode penggunaan yang telah disepakati</p>
					<label><b>Kategori Produk</b></label>
					<p class="card-text"><?php echo $produks->nama_kategori ?> </p>
					<label><b>Deskripsi</b></label>
					<p class="card-text"><?php echo $produks->deskripsi_produk ?> </p>
				</div>
				
				<!-- Button trigger modal -->
				<form method="post" action="<?php echo site_url('listProduk/keranjang'); ?>">
					<div class="card-footer text-right">
						<input type="hidden" name="id" value="<?php echo $produks->id_produk ?>">
						<input type="hidden" name="nama" value="<?php echo $produks->nama_produk ?>">
						<input type="hidden" name="harga" value="<?php echo $produks->harga_produk ?>">
						<input type="hidden" name="gambar" value="<?php echo $produks->foto_produk ?>">

						<button type="submit" class="btn btn-success">Beli Sekarang</button>

					</div>
				</form>
			</div>   
			<!-- /.card -->
			
		</div>
		
	</div>
	<!-- /.col-lg-9 -->
	
</div>
</div>
<!-- /.container -->


<?php
  $this->load->view('landing/foot_landing');
?>
