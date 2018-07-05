<?php
$this->load->view('admin/head_admin');

function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pembayaran Produk Diproses</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"> Pembayaran</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">Tabel Pembelian</h3> -->
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pembelian</th>
                  <th>Nama Klien</th>
                  <th>Total</th>
                  <th>Tgl Pembelian</th>
                  <th>Bukti Pembayaran</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <?php 
              $no=1;
              foreach ($pembelian as $item) { 
         
                ?>

                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $item->kode_pembelian; ?></td>
                    <td><?php echo $item->nama_users; ?></td>
                    <td><?php echo rupiah($item->total)?></td>
                    <td><?php echo $item->tgl_pembelian; ?></td>
                    <td><?php if(!empty($item->bukti_pembayaran)) { ?><a target="_blank" href="<?php echo site_url("assets/bukti pembayaran/" . $item->bukti_pembayaran) ?>" ><i class="fa fa-file fa-2x"></i></a><?php }else{echo "-";} ?></td>
                    <td>
                      <span class="label label-warning">Proses</span>
                    </td>
                    <td>
                      <div>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail-pembelian<?php echo $item->id_pembelian; ?>" style="background:#1a75ff; border-color:#fff" onclick="detail-produk"><i class="fa fa-eye"></i>
                        </button>
                        <a href="<?php echo site_url('Admin_pembelian/ubahStatus/'.$item->id_pembelian)?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Selesai</a>
                      </div>
                    </td>
                  </tr>

                  <!-- Modal Detail Pembelian -->
                  <div class="modal fade" id="detail-pembelian<?php echo $item->id_pembelian; ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail Pembelian <?php echo $item->kode_pembelian; ?></h4>
                          </div>
                          <div class="modal-body">
                           <!--  <form action="<?php //echo site_url('Admin_pembelian/ubahPembelian') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal"> -->
                            <div class="box-body">
                              <div class="form-group">
                                <label for="inputName">Nama Klien</label>
                                <p class="form-control" name="nama_klien"><?php echo $item->nama_users; ?></p>
                              </div>

                              <div class="form-group">
                                <label for="inputName">Instansi</label>
                                <p class="form-control" name="nama_klien"><?php echo $item->instansi; ?></p>
                              </div>

                              <div class="form-group">
                                <label for="inputName">No Telepon</label>
                                <p class="form-control" name="nama_klien"><?php echo $item->no_telpon; ?></p>
                              </div>

                              <div class="form-group">
                                <label for="inputName">Email</label>
                                <p class="form-control" name="email"><?php echo $item->email; ?></p>
                              </div>

                              <div class="form-group">
                                <label for="inputName">Total</label>
                                <p class="form-control" name="harga_produk"><?php echo rupiah($item->total)?></p>
                              </div>

                              <div class="form-group">
                                <label for="inputName">Tanggal Pembelian</label>
                                <p class="form-control" name="tgl_pembelian"><?php echo $item->tgl_pembelian; ?></p>
                              </div>

                                <div class="form-group">
                                  <label for="inputName">Bukti Pembayaran</label>
                                  <?php if($item->bukti_pembayaran){ ?>
																	<p><img src="<?php echo site_url('/assets/bukti pembayaran/'.$item->bukti_pembayaran); ?>" height='100px' width='100px'></p>
                                  <!-- <p class="form-control" name="nama_produk"><?php //echo $item->bukti_pembayaran?></p> -->
																	<?php }else{ ?>
																	<p><span class="label label-warning">Belum upload bukti pembayaran</span></p>
																	<?php } ?>
                                </div>

                              </div>
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                  </tbody>
                  <?php $no++; } ?>
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