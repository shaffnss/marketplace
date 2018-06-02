<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Perjanjian Pembelian</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Perjanjian Pembelian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">Tabel Pemesanan</h3> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Nama Produk</th>
                <th>Kategori Perjanjian</th>
                <th>Keterangan</th>
                <th>Status Pembelian</th>
                <th>File Perjanjian</th>
                <th>Upload File</th>
              </tr>
            </thead>
              
              <?php 
              $no=1;
              foreach ($perjanjian as $data) {
                  # code...

                ?>
              <tbody>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data->nama_users?></td>
                  <td><?php echo $data->nama_produk?></td>
                  <td><?php echo $data->nama_perjanjian?></td>
                  <td><?php echo $data->keterangan?></td>
                  <td>
                    <?php 
                      if($data->status_pembelian=="proses"){ 
                    ?>
                    <span class="label label-warning">Proses</span>
                    <?php
                      }else{
                    ?>
                    <span class="label label-success">Selesai</span>
                    <?php 
                      }
                    ?>
                  </td>
                  <td><?php echo $data->file_perjanjian?></td>
                  <td>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-file"><i class="fa fa-upload"></i></button>
                  </td>
                </tr>

                 <!-- Modal Upload File-->
                <div class="modal fade" id="upload-file">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Unggah File Perjanjian</h4>
                          </div>

                          <form action="<?php echo site_url('Admin_perjanjian/unggahPerjanjian') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
                          <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputFile">Unggah File</label>
                                <input type="file" name="file_perjanjian">
                                <input type="hidden" name="id_pembelian" value="<?php echo $data->id_pembelian ?> ">

                                <p class="help-block">Example block-level help text here.</p>
                              </div>
                            </div>
                          </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                <input type="submit" name="Unggah" class="btn btn-warning" value="Unggah">
                              </div>
                            </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                <?php $no++; }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php
  $this->load->view('admin/foot_admin');
  ?>