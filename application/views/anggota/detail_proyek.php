<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Detail Proyek</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
     <!-- Form Data Klien start -->
      <div class="col-md-6">
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
          </div>
        </div>
          <!-- Form Data Klien end -->

          <!-- Form Data Pemesanan start -->
            <div class="col-md-6">
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
          <!-- Form Data Pemesanan end -->

          <!-- Form Deskripsi Sistem start -->
          <div class="row">
           <div class="col-md-6">
            <div class="box body">
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
          <div class="col-md-6 ">
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

        <div class="box-footer">
          <a href="<?php echo site_url('Proyek_anggota')?>" type="button" class="btn btn-primary" >
            <i class="glyphicon glyphicon-chevron-left"></i> Kembali
          </a>
        </div> 

      </div> 
</section>
</div>



<?php
$this->load->view('anggota/foot_anggota');
?>