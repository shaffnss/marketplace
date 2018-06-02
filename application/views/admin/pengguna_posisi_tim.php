<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Posisi Tim</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li class="active"> Posisi Tim</li>

   </ol>
 </section>

 <section class="content-header">
  <div>
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPosisi"><i class="glyphicon glyphicon-plus"></i> Tambah Posisi </button>   
 </div> 

 <!-- Modals tambah Kategori -->
 <div class="modal fade" id="tambahPosisi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Posisi</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
           <form class="form-horizontal" method="post" action="<?php echo site_url('Admin_anggota/inputPosisi') ?>">
            <div class="form-group">
              <label class="">Nama Posisi</label>
              <input type="text" class="form-control" name="nama_posisi" placeholder="Nama Posisi" required="">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="Simpan">
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
         <!--  <h3 class="box-title">Tabel Produk</h3> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            // $no=1;
            foreach ($posisi as $data) {
                # code...
              ?>
              <tbody>
                <tr>
                  <td><?php echo $data->id_posisi ?></td>
                  <td><?php echo $data->nama_posisi?></td>
                  <td>
                    <?php if($data->status_posisi=='aktif') {
                      ?>
                      <span class="label label-success">Aktif</span>
                    <?php }else{ ?>
                      <span class="label label-danger">Non Aktif</span>
                    <?php }?>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah-posisi<?php echo $data->id_posisi; ?>" onclick="ubah-produk"><i class="fa fa-edit"></i>
                    </button>
                  </td>
                </tr>

                <div class="modal fade" id="ubah-posisi<?php echo $data->id_posisi; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Ubah Nama Posisi</h4>
                        </div>

                        <div class="modal-body">
                          <form action="<?php echo site_url('Admin_anggota/ubahPosisi') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
                            <div class="box-body">
                              <input type="hidden" class="form-control" id="inputName" name="id_posisi" value="<?php echo $data->id_posisi; ?>">   

                              <div class="form-group">
                                <label for="inputName">Nama Posisi</label>
                                <input type="text" class="form-control" id="inputName" name="nama_posisi" value="<?php echo $data->nama_posisi; ?>">
                              </div>

                              <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="status_posisi" id="optionsAktif" value="aktif" <?php if($data->status_posisi == "aktif") {echo "checked";} ?>>Aktif
                                  </label>
                                  <label>
                                    <input type="radio" name="status_posisi" id="optionsTdkAktif" value="nonaktif"  <?php if($data->status_posisi == "nonaktif") {echo "checked";} ?>>Non Aktif
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" value="Simpan">
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <?php 
                  // $no++; 
                }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


      <?php
      $this->load->view('admin/foot_admin');
      ?>