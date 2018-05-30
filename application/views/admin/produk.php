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
    <h1>Produk</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li class="active"> Produk</li>
   </ol>
 </section>

 <section class="content-header">
  <div>
    <a href="<?php echo site_url('Admin_produk/tambahProduk')?>" type="button" class="btn btn-primary" >
      <i class="glyphicon glyphicon-plus"></i> Tambah Produk
    </a>
  </div> 
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tabel Data Produk</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jenis Sistem</th>
                <th>Harga</th>
                <th>Team Pembuat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($produk as $data) {
                # code...

              ?>
              <tbody>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $data->nama_produk?></td>
                  <td><?php echo $data->nama_kategori?></td>
                  <td><?php echo rupiah($data->harga_produk)?></td>
                  <td><?php echo $data->nama_tim ?></td>
                  <td>
                    <?php 
                    if ($data->status_produk == "aktif") {
                      echo '<span class="label label-success">Aktif</span>';
                    }else{
                      echo '<span class="label label-danger">Non Aktif</span>';
                    }
                    ?>
                  </td>
                  <td class="text-center">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail-produk<?php echo $data->id_produk; ?>" style="background:#1a75ff; border-color:#fff" onclick="detail-produk"><i class="fa fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah-produk<?php echo $data->id_produk; ?>" onclick="ubah-produk"><i class="fa fa-pencil"></i>
                    </button>
                    <a onclick="return confirm('apakah anda yakin ingin menerima produk ini?'); " href="<?php echo site_url('Admin_produk/diterima/'.$data->id_detail_produk)?>" class="btn btn-sm btn-info" style="background: #4e9e02; border-color: #fff"><i class="fa fa-check"></i></a>
                    <a onclick="return confirm('apakah anda yakin ingin menolak produk ini?'); " href="<?php echo site_url('Admin_produk/ditolak/'.$data->id_detail_produk)?>" class="btn btn-sm btn-info" style="background: #d41912; border-color: #fff"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>

                <!-- Modal Ubah Status -->
                <div class="modal fade" id="ubah-produk<?php echo $data->id_produk; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Ubah Status Produk</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo site_url('Admin_produk/ubahProduk') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
                            <div class="box-body">
                              <input type="hidden" class="form-control" id="inputName" name="id_produk" value="<?php echo $data->id_produk; ?>" required>   

                              <div class="form-group">
                                <label for="inputName">Nama Produk</label>
                                <p class="form-control" name="nama_produk"><?php echo $data->nama_produk; ?></p>
                              </div>

                              <div class="form-group">
                                <label for="produk">Status</label>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="status_produk" id="optionsAktif" value="Aktif" checked>Aktif
                                  </label>
                                  <label>
                                    <input type="radio" name="status_produk" id="optionsTdkAktif" value="Tidak Aktif">Tidak Aktif
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.Modal Ubah Status -->

                  <!-- Modal Detail Produk -->
                  <div class="modal fade" id="detail-produk<?php echo $data->id_produk; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail <?php echo $data->nama_produk; ?></h4>
                          </div>
                          <div class="modal-body">
                            <!-- <form action="<?php //echo site_url('Admin_produk/ubahProduk') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal"> -->
                              <div class="box-body">
                                <div class="form-group">
                                  <label for="inputName">ID Produk</label>
                                  <input type="text" class="form-control" id="inputName" name="id_produk" value="<?php echo $data->id_produk; ?>" required>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Nama Produk</label>
                                  <p class="form-control" name="nama_produk"><?php echo $data->nama_produk; ?></p>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Kategori Produk</label>
                                  <p class="form-control" name="nama_produk"><?php echo $data->nama_kategori?></p>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Harga</label>
                                  <p class="form-control" name="nama_produk"><?php echo rupiah($data->harga_produk)?></p>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Nama Tim Pembuat</label>
                                  <p class="form-control" name="nama_produk"><?php echo $data->nama_tim ?></p>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Deskripsi Produk</label>
                                  <p class="form-control" name="nama_produk"><?php echo $data->deskripsi_produk?></p>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Link Demo</label>
                                  <p class="form-control" name="nama_produk"><?php echo $data->link_demo?></p>
                                </div>

                                <div class="form-group">
                                  <label for="inputName">Foto Produk</label>
                                  <img src="<?php echo site_url('/assets/produk/'.$data->foto_produk); ?>" height='100px' width='100px'>
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
                    <?php 
                    $no++; }
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