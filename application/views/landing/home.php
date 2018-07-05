<?php
$this->load->view('landing/head_landing');
?>

<body>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('<?php echo base_url('img/web-background.png') ?>'); background-size: 100%">
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form role="form" method="POST" action="<?php echo site_url('ListProduk/search') ?>">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" name="nama_produk" class="form-control form-control-lg" placeholder="Search...">
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
    <h3 class="lead text-muted">Vokasi Dev memudahkan anda menemukan aplikasi yang anda butuhkan.</h3>
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


<?php
$this->load->view('landing/foot_landing');
?>
