<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Detail Pemesanan</h1>
     <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-file-text-o"></i> Pemesanan</a></li>
        <li class="active"> Detail Pemesanan</li>
      </ol>
  </section>

  <?php 
  foreach ($detail as $data) {
          # code...
    ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <!-- Form Data Klien start -->
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
                  <h4>: <?php echo $data->nama_users; ?></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <h5><b>No Telpon</b></h5>
                </div>
                <div class="col-md-4">
                  <h4>: <?php echo $data->no_telpon; ?> </h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <h5><b>E-mail</b></h5>
                </div>
                <div class="col-md-4">
                  <h4>: <?php echo $data->email; ?> </h4>
                </div>
              </div>
            </div>
          </form>
          <!-- Form Data Klien end -->

          <!-- Form Data Pemesanan start -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
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
                        <h4>: <?php echo $data->judul_pemesanan; ?></h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <h5><b>Jenis Sistem</b></h5>
                      </div>
                      <div class="col-md-4">
                        <h4>:<?php echo $data->jenis_produk; ?> </h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <h5><b>Tanggal Deadline</b></h5>
                      </div>
                      <div class="col-md-4">
                        <h4>: <?php echo $data->deadline; ?> </h4>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Form Data Pemesanan end -->

          <!-- Form Deskripsi Sistem start -->
          <div class="row">
           <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Deskripsi Sistem</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <dl>
                  <dd><?php echo $data->deskripsi_pemesanan; ?></dd>
                </dl>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- Form Deskripsi end -->

          <!-- Form Bisnis Rules start-->
          <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-text-width"></i>
                <h3 class="box-title">Bisnis Rules</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <dl>
                  <dd><?php echo $data->business_rules; ?>
                </dl>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!-- Form Bisnis Rules end -->

        <form method="post" action="<?php echo base_url("Admin_pemesanan/UbahStatus") ?>">
        <div class="box-body">
          <div class="form-group">
            <label class="col-md-2">Tentukan Team</label>
            <div class="col-md-3">            
              <select class="form-control" name="team" required="">
                <option disabled selected="">---Pilih Tim Pembuat---</option>
                <?php
                  foreach ($tim as $dataTeam) {
                    # code...

                 ?>
                <option value="<?php echo $dataTeam->id_tim ?>"><?php echo $dataTeam->nama_tim ?>
                  
                </option>
                <?php
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <input name="id_pemesanan" type="hidden" value="<?php echo $data->id_pemesanan?>">
       

        <div class="box-footer pull-right">
         <input type="submit" value="diterima" class="btn btn-success"> 
          <a href="<?php echo base_url('admin_pemesanan/UbahStatusDitolak/'.$data->id_pemesanan)?>" type="button" class="btn btn-danger" >
            <i class="fa fa-close"></i> Tolak
          </a>   
        </div>
        </form>

         <?php } ?>

        <div class="box-footer">
          <a href="<?php echo site_url('Admin_pemesanan')?>" type="button" class="btn btn-primary" >
            <i class="glyphicon glyphicon-chevron-left"></i> Kembali
          </a>
        </div> 
      </div>
    </div>
  </div>
</section>


<?php
$this->load->view('admin/foot_admin');
?>