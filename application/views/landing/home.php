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
        <div class="carousel-item active" style="background-image: url('<?php echo base_url('img/background.jpg') ?>'); background-size: 100%; height: 600px;">
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
    <div class="container marketing" style="padding-left: 15px; padding-right: 15px; padding-top: 70px; padding-bottom: 70px">
      <h1 class="text-center">KELEBIHAN</h1>
      <div class="row" style="padding-top: 30px">
        <div class="col-lg-4">
          <center>
            <img class="rounded-circle" src="<?php echo base_url('img/time.png') ?>" alt="Generic placeholder image" width="140" height="140">
            <h2 style="padding-bottom: 15px; padding-top:15px">7 Days Support</h2>
            <h3 class="lead text-muted">Layanan kami tersedia setiap saat</h3>
            <!-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
          </center>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4"><center>
          <img class="rounded-circle" src="<?php echo base_url('img/easy.png') ?>" alt="Generic placeholder image" width="140" height="140">
          <h2  style="padding-bottom: 15px; padding-top:15px">Easy</h2>
          <h3 class="lead text-muted">Temukan produk yang anda butuhkan dengan mudah</h3>
        </div><!-- /.col-lg-4 -->
      </center>
       <div class="col-lg-4">
          <center>
            <img class="rounded-circle" src="<?php echo base_url('img/servis.png') ?>" alt="Generic placeholder image" width="140" height="140">
            <h2  style="padding-bottom: 15px; padding-top:15px">Updates</h2>
            <h3 class="lead text-muted">Produk yang kami sediakan selalu teraktual</h3>
            <!--  <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> -->
          </center>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  </div>


  <section class="jumbotron text-center">
    <div class="container">
      <h2 class="jumbotron-heading" style="padding-bottom: 15px">TENTANG KAMI</h2>
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
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15812.589066326691!2d110.3747223!3d-7.7742046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x294cd98559dc9c8c!2sSekolah+Vokasi+Universitas+Gadjah+Mada!5e0!3m2!1sid!2sid!4v1512758530824" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    <!-- Contact Details Column -->
    <div class="col-lg-4 mb-4">
      <h3>INFORMASI KAMI</h3>
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
