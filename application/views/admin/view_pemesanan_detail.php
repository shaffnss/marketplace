<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Detail Pemesanan</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <!-- Form Data Klien start -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Klien</h3>
          </div>
          <form role="form">
            <div class="box-body">
              <div class="row">
                <div class="col-md-1">
                  <h5><b>Nama Klien</b></h5>
                </div>
                <div class="col-md-2">
                  <h4>: </h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <h5><b>No Telpon</b></h5>
                </div>
                <div class="col-md-4">
                  <h4>: </h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <h5><b>E-mail</b></h5>
                </div>
                <div class="col-md-4">
                  <h4>: </h4>
                </div>
              </div>
            </div>
          </form>
          <!-- Form Data Klien end -->

          <!-- Form Data Pemesanan start -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pemesanan</h3>
                </div>
                <form role="form">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-1">
                        <h5><b>Judul Sistem</b></h5>
                      </div>
                      <div class="col-md-2">
                        <h4>: </h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <h5><b>Jenis Sistem</b></h5>
                      </div>
                      <div class="col-md-4">
                        <h4>: </h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <h5><b>Tanggal Deadline</b></h5>
                      </div>
                      <div class="col-md-4">
                        <h4>: </h4>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Form Data Pemesanan end -->

          <!-- Form Deskripsi Sistem start -->
          <div class="row">
           <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Deskripsi Sistem</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <dl>
                  <dd>A description list is perfect for defining term.</dd>
                </dl>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- Form Deskripsi end -->

          <!-- Form Bisnis Rules start-->
          <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Bisnis Rules</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <dl>
                  <dd>A description list is perfect for defining term.</dd>
                </dl>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- Form Bisnis Rules end -->

        <div class="box-body">
          <div class="form-group">
            <label class="col-md-2">Tentukan Team</label>
            <div class="col-md-3">            
              <select class="form-control">
                <option disabled selected="">---Pilih Team---</option>
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
        </div>
        <div class="box-footer pull-right">
          <a href="#" type="button" class="btn btn-success" >
            <i class="fa fa-check"></i> Terima
          </a>
          <a href="#" type="button" class="btn btn-danger" >
            <i class="fa fa-close"></i> Tolak
          </a>
          
        </div>

        <div class="box-footer">
          <a href="<?php echo site_url('Pemesanan')?>" type="button" class="btn btn-primary" >
            <i class="glyphicon glyphicon-chevron-left"></i> Kembali
          </a>
        </div> 
      </div>
    </div>
  </div>
</section>


<?php
$this->load->view('admin/foot_admin');
?>