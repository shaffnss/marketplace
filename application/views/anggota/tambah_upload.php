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

        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="inputName" class="">Nama Produk</label>
              <input type="email" class="form-control" id="inputName" placeholder="">
            </div>

            <div class="form-group">
              <label for="inputEmail" class="">Jenis Produk</label>
              <div>            
                <select class="form-control">
                  <option disabled selected="">---Pilih Jenis Produk---</option>
                  <option>WEB</option>
                  <option>Mobile Apps</option>
                  <option>Game</option>
                  <option>AI</option>
                </select>
              </div>
            </div>

              <div class="form-group">
              <label for="inputTipeProyek" class="">Tipe Proyek</label>
              <div>            
                <select class="form-control">
                  <option disabled selected="">---Pilih Tipe Proyek---</option>
                  <option>Individu (ex : TA)</option>
                  <option>Tim</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHarga" class="">Harga</label>
              <input type="Harga" class="form-control" id="inputHarga" placeholder="Harga">
            </div>

            <div class="form-group">
              <label for="inputPosisi" class="">Deskripsi Produk</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>

            <div class="form-group">
              <label for="inputLink" class="">Link Demo</label>
              <input type="Link" class="form-control" id="inputLink" placeholder="Link URL">
            </div>

            <br>

            <div class="form-group">
              <label for="exampleInputFile">Upload Screenshot Tampilan Sistem</label>
              <input type="file" id="exampleInputFile">

              <p class="help-block">Example block-level help text here.</p>
            </div>

          </div>
          <!-- /.box-body
          -->
        </form>

        <div class="box-footer">
          <a href="<?php echo site_url('Anggota_uploadProduk') ?>" type="button" class="btn btn-primary"> Kembali</a>
          <a href=" " type="button" class="btn btn-success pull-right"> Kirim</a>
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