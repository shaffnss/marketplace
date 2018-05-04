<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Upload Produk</h1>
  </section>

  <!-- Main content -->
  <section class="content">
   <div class="row">
    <!-- Form pemesanan -->
    <div class="col-md-10">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h2 class="box-title">Form Pengisian Data Unggah Produk</h2>
        </div>

        <form id="form" role="form" class="form-horizontal" method="POST" action="<?php echo site_url('Anggota_uploadProduk/inputProduk') ?>" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group">
              <label for="inputName" class="form-control">Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk<">
            </div>

            <div class="form-group">
              <label for="inputEmail" class="">Jenis Produk</label>
              <div>            
                <select class="form-control" name="jenis_produk">
                  <option disabled selected="">---Pilih Jenis Produk---</option>
                  <option value="Website">WEB</option>
                  <option value="Mobile Apps">Mobile Apps</option>
                  <option value="Game">Game</option>
                  <option value="Artificial Intelegent(AI)">Artificial Intelegent(AI)</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHarga" class="">Harga</label>
              <input type="text" class="form-control" name="harga_produk" placeholder="Harga">
            </div>

            <div class="form-group">
              <label for="inputPosisi" class="">Deskripsi Produk</label>
              <textarea class="form-control" rows="3" name="deskripsi Produk" placeholder="Enter ..."></textarea>
            </div>

            <div class="form-group">
              <label for="inputLink" class="">Link Demo</label>
              <input type="text" class="form-control" name="link_demo" placeholder="Link Demo">
            </div>

            <br>

            <div class="form-group">
              <label for="exampleInputFile">Upload Screenshot Tampilan Sistem</label>
              <input type="file" id="exampleInputFile" name="mockup_produk" required="">
            </div>

          </div>
          <!-- /.box-body
          -->
        </form>

        <div class="box-footer">
          <a href="<?php echo site_url('Anggota_uploadProduk') ?>" type="button" class="btn btn-primary"> Kembali</a>
         <input type="submit" name="Simpan" value="Tambah" class="btn btn-success pull-right">
        </div> 

      </div>
      <!-- /.Form Data Pemesanan end -->
    </div>
  </div>


  <div class="col-md-2"></div>

</section>

</div>


<?php
$this->load->view('anggota/foot_anggota');
?>