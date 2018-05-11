<?php
$this->load->view('landing/head_landing');
?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Website</a>
          <a href="#" class="list-group-item">Mobile Apps</a>
          <a href="#" class="list-group-item">Game</a>
          <a href="#" class="list-group-item">Artificial Intelegent</a>
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
            <h3 class="card-title">Sistem Informasi TA
            <a href="<?php echo site_url('')?>" class="btn btn-primary btn-sm">Lihat Demo</a></h3>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
          </div>


          <div class="card-body">
             <!-- Button trigger modal -->
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Purchase
            </button>
          </div>
          </div>   
        <!-- /.card -->

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda ingin membeli produk ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                       <h5><p class="text-center">Pembelian anda sudah tersimpan. Silahkan login/register untuk melakukan pembelian</p></h5>
                       <div class="box-body">
                         
                       </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?php echo site_url('Login/loginMe')?>" type="button" class="btn btn-primary">Login</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.modal -->
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
