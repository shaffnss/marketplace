<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
     <h1>Ubah Password</h1>
  </section>

  <!-- Main content -->
  <section class="content"> 
  <div class="row">
        <div class="col-md-12">
        	<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
        </div>
  </div>
  
    <div class="row">
     <div class="col-md-12">
      <div class="box box-solid">
        <br>
        <br>
          <form class="form-horizontal" action="<?php echo site_url('anggota_password/ubahPassword') ?>" method="post">
              <div class="box-body">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Password Lama</label>

                  <div class="col-sm-8">
                    <input type="password" name="passwordLama" class="form-control" id="inputName" placeholder="Password Lama">
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Password Baru</label>

                  <div class="col-sm-8">
                    <input type="password" name="passwordBaru" class="form-control" id="inputName" placeholder="Password Baru">
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Ulangi Password Baru</label>

                  <div class="col-sm-8">
                    <input type="password" class="form-control" name="re_password" id="inputEmail" placeholder="Ulangi Password Baru">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-10 col-sm-12">
                    <input type="submit" class="btn btn-success" value="Simpan">
                  </div>
                </div>
              </div>
            </form> 

      </div>
      <!-- /.Form Data Pemesanan end -->
    </div>
    <div class="col-md-12"></div>
      </div>
      <!--- /.ROW --->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php
  $this->load->view('anggota/foot_anggota');
  ?>