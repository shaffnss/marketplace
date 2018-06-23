<?php
	$this->load->view('landing/head_landing');
?>

<!-- Page Content -->
<div class="container my-4">
	<div class="row">
		<div class="col-lg-3">
			<h1 class="my-4">Shop Review</h1>
			<div class="list-group">
				<a href="#" class="list-group-item active"><?php echo $produks->nama_kategori ?></a>
			</div>
		</div>
		<!-- /.col-lg-3 -->
		
		<div class="col-lg-9">
			<br>
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?php echo base_url('img/produk-1.jpg') ?>" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo base_url('img/produk-2.jpg') ?>" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo base_url('img/produk-3.jpg') ?>" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			
			<div class="card mt-4">
				<div class="card-body">
					<h3 class="card-title"><?php echo $produks->nama_produk ?>
					<a href="<?php echo site_url('')?>" class="btn btn-primary btn-sm">Lihat Demo</a></h3>
					<p class="card-text"><?php echo $produks->deskripsi_produk ?> <?php var_dump($this->session->userdata('produk')) ?></p>
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
<!-- /.container -->


<?php
  $this->load->view('landing/foot_landing');
?>
