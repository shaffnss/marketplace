<?php
$this->load->view('klien/head_klien');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pembayaran</h1>
  </section>
  <br>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pembayaran Produk dan Pemesanan</h3>

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Nama Produk/Pemesanan</th>
                <th>Harga</th>
                <th>Team Pembuat</th>
                <th>Status</th>
                <th>Bukti pembayaran</th>
              </tr>
              <tr>
                <td>01</td>
                <td>Sistem Informasi TA</td>
                <td>Rp 1.000.000,-</td>
                <td>Team Hore</td>
                <td><span class="label label-success">Approved</span></td>
                <td>
                  <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-data">
                      Upload
                    </button>
                  </div> 

                  <div class="modal fade" id="ubah-data">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                          </div>

                          <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">
                               <div class="row">
                                 <div class="col-xs-10">
                                  <p class="lead">Detail Pembayaran</p>


                                  <div class="table-responsive">
                                    <table class="table">
                                      <tr>
                                        <th style="width:50%">ID</th>
                                        <td>B01/P01</td>
                                      </tr>
                                      <tr>
                                        <th>Nama Produk/Pemesanan</th>
                                        <td>Sistem Kasir SV</td>
                                      </tr>
                                      <tr>
                                        <th>Harga</th>
                                        <td>Rp 5.000.000,-</td>
                                      </tr>
                                      <tr>
                                        <th>Team Pembuat</th>
                                        <td>Team Hore</td>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                                <!-- /.col -->
                              </div>                       
                              <br>

                              <div class="form-group">
                                <label for="exampleInputFile">Upload Bukti Pembayaran</label>
                                <input type="file" id="exampleInputFile">

                                <p class="help-block">Example block-level help text here.</p>
                              </div>


                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Kirim</button>
                              </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </td>
                  </tr>
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
    $this->load->view('klien/foot_klien');
    ?>