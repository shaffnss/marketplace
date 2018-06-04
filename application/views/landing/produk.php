<?php
$this->load->view('landing/head_landing');

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
?>

    <!-- Page Content -->
    <div class="container">

      <div class="row h-100">

        <div class="col-lg-3">

          <h1 class="my-4">VokasiDev</h1>
          <div class="list-group">
            <?php foreach ($kategoris as $kategori) : ?>
            <a href="<?php echo site_url('ListProduk/kategori/'.$kategori->id_kategori) ?>" class="list-group-item <?php echo ($this->uri->segment(3) == $kategori->id_kategori ? 'active' : '') ?>" ><?php echo $kategori->nama_kategori ?></a>
            <?php endforeach; ?>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
       <!--    <div class="card mt-4">
          <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
       </div>
         -->
        <br>
        <br>
        <br>
        <br>
					<?php if(!empty($produks)) { ?>
          <div class="row">
            <?php
              foreach ($produks as $produk) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo base_url('assets/produk/'.$produk->foto_produk) ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="<?php echo site_url('ListProduk/detail/'.$produk->id_produk)?>"><?php echo strtoupper($produk->nama_produk) ?></a>
                  </h4>
                  <h5><?php echo rupiah($produk->harga_produk) ?></h5>
                  <div style="height: 100px; overflow: hidden">
                    <p class="card-text"><?php echo $produk->deskripsi_produk ?></p>
                  </div>
                  </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
     
            <?php }  ?>
          </div>
          <!-- /.row -->
					<?php } else { ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-secondary" role="alert">
								Maaf, Produk yang anda cari tidak ditemukan.
							</div>
						</div>
					</div>
					<?php } ?>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


<?php
$this->load->view('landing/foot_landing');
?>
