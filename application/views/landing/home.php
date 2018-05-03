<?php
$this->load->view('landing/head_landing');
?>

  <body>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo base_url('img/slide-1.jpg') ?>')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo base_url('img/slide-2.jpg') ?>')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo base_url('img/slide-3.jpg') ?>')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4" align="center">Apa yang anda butuhkan?</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        
        <div class="col-lg-2 mb-4">
          
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Membeli Produk</h4>
            <div class="card-body">
              <p class="card-text">VokasiDev menyediakan produk-produk yang siap Anda beli</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo site_url('ListProduk')?>" class="btn btn-primary">Lihat Produk</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Memesan Produk Kustom</h4>
            <div class="card-body">
              <p class="card-text">Pesan produk sesuai keinginan dan kebutuhan anda</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo site_url('Contact')?>" class="btn btn-primary">Pesan Produk</a>
            </div>
          </div>
        </div>

         <div class="col-lg-2 mb-4">
          
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php
$this->load->view('landing/foot_landing');
?>
