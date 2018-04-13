<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Tambah Produk</h1>
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        
      </div>

      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Menambah Data Produk</h3>          
                <form class="form-horizontal">
                  <div class="box-body">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Produk</label>

                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputName" placeholder="Nama Produk">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Harga</label>

                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Harga">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-6 control-label">Deskripsi Produk</label>
                    <div class="col-sm-12 ">
                      <textarea class="form-control" id="inputExperience" placeholder="Deskripsi Produk"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Nama Team Pembuat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputName" placeholder="Nama Team Pembuat">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-12">
                      <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                  </div>
                </form>


        <div class="box-footer">
          <a href="<?php echo site_url('Produk')?>" type="button" class="btn btn-primary" >
            <i class="glyphicon glyphicon-chevron-left"></i> Kembali
          </a>
        </div> 
      </div>
    </div>
  </div>
   <div class="col-md-3">
        
      </div>
</section>


<?php
$this->load->view('admin/foot_admin');
?>