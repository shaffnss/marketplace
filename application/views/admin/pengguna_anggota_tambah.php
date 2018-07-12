<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Tambah Anggota Tim</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Anggota</a></li>
      <li class="active"> Tambah Anggota</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Masukkan Data Anggota Tim</h3>
          </div>

          <!-- Alert file-->
          <?php if(!empty($error_upload)): ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Peringatan</h4>
              <?php echo $error_upload; ?>
            </div>
          <?php endif; ?>

          <form class="form-horizontal" method="post" action="<?php echo site_url('Admin_anggota/inputAnggota') ?>" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nama Anggota</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_users" placeholder="Nama Anggota" value="<?php echo set_value("nama_users") ?>" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-8">            
                  <select class="form-control" name="jenis_kelamin" required="">
                    <option disabled selected="">---Pilih Jenis Kelamin---</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value("email") ?>" required="" >
                </div>
              </div>

              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">No Telpon</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="no_telpon" placeholder="No Telpon" value="<?php echo set_value("no_telpon") ?>" required="">
                </div>
              </div>

              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                 <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value("password") ?>" required="">
               </div>
             </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Upload Foto</label>
              <div class="col-sm-8">
                <input type="file" name="foto" required>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Upload Berkas (KTM/Kartu Kagama)</label>
              <div class="col-sm-8">
                <input type="file" name="ktm" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-12">
                <input type="submit" class="btn btn-success" value="Tambah">
              </div>
            </div>
          </form>

          <div class="box-footer">
            <a href="<?php echo site_url('Admin_anggota')?>" type="button" class="btn btn-primary" >
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