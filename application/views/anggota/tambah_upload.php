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
    <!-- Alert -->
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('style'); ?> fade-in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?php echo $this->session->flashdata('alert'); ?></strong>&nbsp; 
        </br><?php echo $this->session->flashdata('message'); ?>
      </div>
    <?php endif; ?>
    
    <!-- End Alert -->
   <div class="row">
    <!-- Form pemesanan -->
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h2 class="box-title">Form Pengisian Data Unggah Produk</h2>
        </div>
          <form class="form-horizontal" method="POST" action="<?php echo site_url('Anggota_uploadProduk/inputProduk') ?>" enctype="multipart/form-data">

            <div class="box-body">
             <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Nama Produk</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputName" name="nama_produk" placeholder="Nama Produk" required="">

               <!--  <input type="hidden" class="form-control" name="id_team" placeholder="Nama Produk" value="<?php echo $id_team[0]->id_tim ?>" required=""> -->
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
                  <?php foreach ($kategoris as $kategori) { ?>
									<option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
									<?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Deskripsi Produk</label>
              <div class="col-sm-8">
                <textarea class="form-control" id="inputExperience" placeholder="Deskripsi Produk" name="deskripsi_produk" required=""></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Link Demo</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="link_demo" placeholder="Link demo" required="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Upload Screenshot Tampilan Sistem</label>
              <div class="col-sm-8">
                <input type="file" name="foto_produk" placeholder="inputkan mockup produk" required="">
								<p class="text-muted"><i>File dalam bentuk gif | jpg | png | jpeg, max size 7MB</i></p>
              </div>
            </div>
						
						<div class="form-group">
              <label class="col-sm-2 control-label">Upload System</label>
              <div class="col-sm-8">
                <input type="file" name="file_produk" placeholder="inputkan mockup produk" required="">
								<p class="text-muted"><i>File dalam bentuk .zip, max size 7MB</i></p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <label>
                  <label>
                  <input type="radio" name="status_tim" id="optTeam" value="tim" checked>Team
                </label>
                  <input type="radio" name="status_tim" id="optIndividu" value="individu">Individu
                </label>
              </div>
            </div>

            <div class="form-group" id="selectAktif">
              <label class="col-sm-2 control-label">Tentukan Team</label>
              <div class="col-sm-8">            
                <select class="form-control" name="nama_tim">
                  <option disabled selected="">---Pilih Team---</option>
                  <?php 
                  foreach ($id_team as $data) {
                        # code...
                    ?>
                    <option value="<?php echo $data->id_tim; ?>"><?php echo $data->nama_tim; ?></option>
                    <?php 
                  }
                  ?>
                </select>
              </div>
            </div>

           <!--  <div class="form-group">
              <label class="col-sm-2 control-label">Tentukan Team</label>
              <div class="col-sm-8">
                <select class="form-control" id="selectTdkAktif" disabled>
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
              </div>
            </div> -->

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
                <input type="submit" name="Simpan" value="Tambah" class="btn btn-success pull-right">
              </div>
            </div>

          </div>
          <!-- /.box-body
          -->
        </form>
        

        <div class="box-footer">
          <a href="<?php echo site_url('Anggota_uploadProduk') ?>" type="button" class="btn btn-primary" >
            <i class="glyphicon glyphicon-chevron-left"></i> Kembali
          </a>
        </div> 

      </div>
      <!-- /.Form Data Pemesanan end -->
    </div>
  </div>

</section>
</div>


<?php
$this->load->view('anggota/foot_anggota');
?>