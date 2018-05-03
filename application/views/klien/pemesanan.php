<?php
$this->load->view('klien/head_klien');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pemesanan Produk Kustom</h1>
  </section>
  <br>

  <!-- Main content -->
  <section class="content">
   <div class="row">
    <!-- Form pemesanan -->
    <div class="col-md-10">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h2 class="box-title">Form Pemesanan Produk Kustom</h2>
        </div>
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="inputName" class="">Judul Sistem</label>
              <input type="email" class="form-control" id="inputName" placeholder="">
            </div>
            <div class="form-group">
              <label for="inputEmail" class="">Jenis Sistem</label>
              <div>            
                <select class="form-control">
                  <option disabled selected="">---Pilih Jenis Sistem---</option>
                  <option>WEB</option>
                  <option>Mobile Apps</option>
                  <option>Game</option>
                  <option>AI</option>
                </select>
              </div>
            </div>
              <!-- Date range -->
              <div class="form-group">
                <label>Periode Pengerjaan</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            <div class="form-group">
              <label for="inputPosisi" class="">Deskripsi Sistem</label>
              <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
            <div class="form-group">
              <label for="inputSkills" class="">Business Rules</label>
              <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>        
            </div>
            </div>
          </form>
        </div>

        <div class="box-footer">
          <a href="<?php echo site_url('Admin_pemesanan')?>" type="button" class="btn btn-success pull-right"> Kirim</a>
        </div> 
        <!-- /.Form Data Pemesanan end -->
      </div>
      
      <div class="col-md-2"></div>

    </div>

  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
$this->load->view('klien/foot_klien');
?>