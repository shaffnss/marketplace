<?php
$this->load->view('klien/head_klien');

function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pembayaran</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="callout callout-info">
          <h4>Tata Cara Pembayaran :</h4>

          <p>Silahkan lakukan pembayaran pembelian sistem anda melalui Transfer ke nomor rekening Bank BNI 009477590342929 a.n Shafira Fitrianissa</p>
        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pembayaran Pembelian Produk</h3>

            <div class="box-tools">
              <!-- <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped data-tables">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jenis Sistem</th>
                  <th>Bukti pembayaran</th>
                  <th>Jenis Perjanjian</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <?php 
              $no=1;
              foreach ($pembelian as $item) { ?>

                <tbody>
                  <tr>
                    <td>KODE PEMBELIAN</td>
                    <td><?php echo $item->nama_produk ?></td>
                    <td><?php echo rupiah($item->harga_produk)?></td>
                    <td><?php echo $item->nama_kategori ?></td>
                    <td><img src="<?php echo site_url('/assets/bukti pembayaran').$item->bukti_pembayaran ?>" class="img-responsive" style="height: 100px; width: 100px"></td>
                    <td><?php echo $item->nama_perjanjian ?></td>
                    <td>
                      <?php if($item->status_pembelian=='proses') {
                        ?>
                        <span class="label label-warning">Proses</span>
                      <?php }else{ ?>
                        <span class="label label-success">Selesai</span>
                      <?php }?>
                    </td>
                    <td>
                      <div>
                        <button type="button" style="text-center" class="btn btn-primary" data-toggle="modal" data-target="#ubah-data">
                          <i class="fa fa-cloud-upload"></i>
                        </button>
                      </div> 
                    </td>
                  </tr>
                </tbody>
                <?php $no++; } ?>
              </table>

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
                             <div class="col-xs-12">
                              <p class="lead">Detail Pembayaran</p>

                              <div class="table-responsive">
                                <table class="table">
                                  <tr>
                                    <th style="width:50%">ID</th>
                                    <td><?php echo $item->kode_pembelian ?></td>
                                  </tr>
                                  <tr>
                                    <th>Nama Produk</th>
                                    <td><?php echo $item->nama_produk ?></td>
                                  </tr>
                                  <tr>
                                    <th>Harga</th>
                                    <td><?php echo rupiah($item->harga_produk)?></td>
                                  </tr>
                                  <tr>
                                    <th>Team Pembuat</th>
                                    <td><?php echo $item->nama_tim?></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                        </div>                      
                        <hr>
                        
                        <h3 class="text-center">Pilih Jenis Perjanjian dan Upload Bukti Pembayaran</h3>

                        <form action="<?php echo site_url('Klien_pembayaran/unggahPembayaran') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                          <input type="hidden" name="id_pembelian" value="<?php echo $item->id_pembelian ?> ">

                          <div class="col-md-12" style="padding-top: 20px">
                            <label >Jenis Perjanjian</label>
                            <select class="form-control" name="nama_perjanjian">
                             <option disabled selected="">Pilih Jenis Perjanjian</option>
                             <?php foreach ($perjanjians as $perjanjian) { ?>
                              <option value="<?php echo $perjanjian->id_kategori ?>"><?php echo $perjanjian->nama_perjanjian?></option>
                            <?php } ?>
                          </select>  
                        </div>

                        <div class="col-xs-12" style="padding-top: 20px">
                          <label for="exampleInputFile">Upload Bukti Pembayaran</label>
                          <input type="file" id="exampleInputFile" name="bukti_pembayaran" style="padding-top: 5px">

                          <p class="help-block">Example block-level help text here.</p>
                        </div>
                      </div>
                    </div> 
                    <!-- /.modal-body-->

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <input type="submit" name="Unggah" class="btn btn-warning" value="Unggah">
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
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
