<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Tambah Produk</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="#"><i class="fa fa-dashboard"></i> Produk</a></li>
     <li class="active"> Tambah Produk</li>
   </ol>
 </section>


 <!-- Main content -->
 <section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Menambah Data Produk</h3>   
          <br>       
          <form id="form" role="form" class="form-horizontal" method="post" action="<?php echo site_url('Admin_produk/inputProduk') ?>" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nama Produk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputName" name="nama_produk" placeholder="Nama Produk" required="">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPrice" class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" name="harga_produk" placeholder="Harga" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Produk</label>
                <div class="col-sm-8">            
                  <select class="form-control" name="jenis_produk" required="">
                    <option disabled selected="">---Pilih Jenis Produk---</option>
                    <?php foreach($kategoris as $kategori) { ?>
                    <option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Deskripsi Produk</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="5" id="inputExperience" placeholder="Deskripsi Produk" name="deskripsi_produk" maxLength="255" required=""></textarea>
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Link Demo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="link_demo" placeholder="Link demo" required="">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Upload Screenshot Tampilan Sistem</label>
                <div class="col-sm-8">
                  <input type="file" name="foto_produk" placeholder="inputkan mockup produk" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tentukan Team</label>
                <div class="col-sm-8">            
                  <select class="form-control" name="nama_tim" required="">
                    <option disabled selected="">---Pilih Team---</option>
                    <?php 
                      foreach ($tambah_tim as $data) {
                        # code...
                      
                    ?>
                    <option value="<?php echo $data->id_tim; ?>"><?php echo $data->nama_tim; ?></option>
                    <?php 
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                  <input type="submit" name="Simpan" value="Tambah" class="btn btn-success pull-right">
                </div>
              </div>
            </form>

            <div class="box-footer">
              <a href="<?php echo site_url('Admin_produk')?>" type="button" class="btn btn-primary" >
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali
              </a>
            </div> 
          </div>
        </div>
      </div>
    </section>
</div>

    <?php
    $this->load->view('admin/foot_admin');
    ?>