<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Tambah Data Klien</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="#"><i class="fa fa-dashboard"></i> Klien</a></li>
     <li class="active"> Tambah Klien</li>
   </ol>
 </section>

 <!-- Main content -->
 <section class="content">
  <div class="row">
    <!-- Form Tambah Klien -->
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Menambah Data Klien</h3>

          <form class="form-horizontal" method="post" action="<?php echo site_url('Admin_klien/inputKlien') ?>">
            <div class="box-body">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Nama Klien</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nama_klien" placeholder="Nama Klien">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-8">            
                  <select class="form-control" name="jenis_kelamin" required="">
                    <!-- <option disabled selected="">---Pilih Jenis Kelamin---</option> -->
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Instansi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="instansi" placeholder="Instansi">
                </div>
              </div>

              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">No Telpon</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="no_telpon" placeholder="No Telpon">
                </div>
              </div>

              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" name="email" placeholder="Email">
               </div>
             </div>

             <div class="form-group">
              <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" class="btn btn-success">Tambah</button>
              </div>
            </div>
          </form>

          <div class="box-footer">
            <a href="<?php echo site_url('Admin_klien')?>" type="button" class="btn btn-primary" >
              <i class="glyphicon glyphicon-chevron-left"></i> Kembali
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
$this->load->view('admin/foot_admin');
?>