<?php
$this->load->view('landing/head_landing');
?>

<body>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <!--  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo base_url('img/web-background.png') ?>'); background-size: 100%">
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
              <form>
                <div class="form-row">
                  <div class="col-12 col-md-9 mb-2 mb-md-0">
                    <input type="text" class="form-control form-control-lg" placeholder="Search...">
                  </div>
                  <div class="col-12 col-md-3">
                    <button type="submit" class="btn btn-block btn-lg btn-primary"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <!-- <div class="carousel-item" style="background-image: url('<?php //echo base_url('img/slide-2.jpg') ?>')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          Slide Three - Set the background image for this slide in the line below
          <div class="carousel-item" style="background-image: url('<?php //echo base_url('img/slide-3.jpg') ?>')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div> -->
        </div>
       <!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> -->
      </div>
    </header>

    <!-- Page Content -->
    <div class="container marketing" style="padding-left: 15px; padding-right: 15px; padding-top: 70px">
      <h1 class="text-center">Our Product</h1>
      <div class="row" style="padding-top: 30px">
        <div class="col-lg-4"><center>
          <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Website</h2>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </center>
      <div class="col-lg-4"><center>
        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
        <h2>Mobile Apps</h2>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </center>
    <div class="col-lg-4"><center>
      <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
      <h2>Game</h2>
      <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
  </center>
</div><!-- /.row -->
</div>


<section class="jumbotron text-center">
  <div class="container">
    <h2 class="jumbotron-heading">About Us</h2>
    <h3 class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</h3>
    <p>

    </p>
  </div>
</section>

<!-- Content Row -->
<div class="row" style="padding-left: 110px; padding-right: 40px; padding-top: 30px">
  <!-- Map Column -->
  <div class="col-lg-8 mb-4">
    <!-- Embedded Google Map -->
    <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
  </div>
  <!-- Contact Details Column -->
  <div class="col-lg-4 mb-4">
    <h3>Contact Details</h3>
    <p>
      Sekolah Vokasi
      <br>Universitas Gadjah Mada
      <br>
    </p>
    <p>
      <abbr title="Phone">Phone</abbr>: (123) 456-7890
    </p>
    <p>
      <abbr title="Email">Email</abbr>:
      <a href="mailto:name@example.com">komsidev@example.com
      </a>
    </p>
    <p>
      <abbr title="Hours">Hours</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
    </p>
  </div>
</div>
<!-- /.row -->

        <!-- <div class="col-lg-2 mb-4">
          
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Membeli Produk</h4>
            <div class="card-body">
              <p class="card-text">VokasiDev menyediakan produk-produk yang siap Anda beli</p>
            </div>
            <div class="card-footer">
              <a href="<?php //echo site_url('ListProduk')?>" class="btn btn-primary">Lihat Produk</a>
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
              <a href="<?php //echo site_url('Contact')?>" class="btn btn-primary">Pesan Produk</a>
            </div>
          </div>
        </div>

         <div class="col-lg-2 mb-4">
          
         </div> -->

         <?php
         $this->load->view('landing/foot_landing');
         ?>
