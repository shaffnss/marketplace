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
    <h1>Produk Ditolak</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li class="active"> Produk Ditolak</li>
   </ol>
 </section>

 <!-- <section class="content-header">
  <div>
    <a href="<?php echo site_url('Admin_produk/tambahProduk')?>" type="button" class="btn btn-warning" >
      <i class="glyphicon glyphicon-plus"></i> Tambah Produk
    </a>
  </div> 
</section> -->

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php
				$this->load->helper('form');
				$error = $this->session->flashdata('error');
				if($error)
				{
				?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('error'); ?>                    
				</div>
			<?php } ?>
			<?php  
				$success = $this->session->flashdata('success');
				if($success)
				{
				?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php } ?>
			
			<div class="row">
				<div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
				</div>
			</div>
		</div>
	</div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tabel Produk Ditolak</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>No</th>
               <th>Nama Produk</th>
                  <th>Jenis Sistem</th>
                  <th>Harga</th>
                  <th>Team Pembuat</th>
                  <th>Link Demo</th>
                  <th>Status Penerimaan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
              <tbody>
            <?php 
            $no=1;
            foreach ($produk as $data) {
                # code...

              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><!-- <a target="_blank" href="<?php echo $data->link_demo?>"> --><?php echo $data->nama_produk?></a></td>
                  <td><?php echo $data->nama_kategori?></td>
                  <td><?php echo rupiah($data->harga_produk)?></td>
                  <td><?php echo $data->nama_tim?></td>
                   <td>
                      <a href="<?php echo $data->link_demo?>" type="button" class="btn btn-sm btn-primary" href><i class="fa fa-link" style="color: #fff"></i></a>
                    </td>
                 <!--  <td>
                    <img src="<?php echo site_url('/assets/produk/'.$data->foto_produk); ?>" height='100px' width='100px'>
                  </td> -->
                  <td><span class="label label-danger">Ditolak</span></td>
									<td>
										<?php 
											if ($data->status_produk == "aktif") {
												echo '<span class="label label-success">Aktif</span>';
											}else{
												echo '<span class="label label-danger">Tidak Aktif</span>';
											}
										?>
                  </td>
                  <td class="text-center">
                    <!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah-produk<?php echo $data->id_produk; ?>" onclick="ubah-produk"><i class="fa fa-edit">Edit</i>
                    </button> -->
                    <a href="<?php echo site_url('Admin_produk/diterima/'.$data->id_detail_produk)?>" class="btn btn-sm btn-info" style="background: #4e9e02; border-color: #fff"><i class="fa fa-check"></i> Terima</a>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat-produk<?php echo $data->id_produk; ?>" style="background:#1a75ff; border-color:#fff"><i class="fa fa-eye"></i> Detail
                    </button>
										</td>
                </tr>

                <div class="modal fade" id="ubah-produk<?php echo $data->id_produk; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title"> Ubah Data Produk Ditolak</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo site_url('Admin_produk/editProduk'); ?>" method="POST" class="form-horizontal">
                            <div class="box-body">
                              <input type="hidden" class="form-control" id="inputName" name="id_produk" value="<?php echo $data->id_produk; ?>" required>   

                              <div class="form-group">
                                <label for="inputName"> Nama Produk</label>
                                <p><?php echo $data->nama_produk; ?></p>
                              </div>

                              <div class="form-group">
                                <label for="produk">Status</label>
                                    <div class="radio">
                                      <label>
                                        <input <?php echo ($data->status_produk=='aktif' ? 'checked' : '') ?> type="radio" name="status_produk" id="optionsAktif" value="aktif" > Aktif
                                      </label>
                                      <label>
                                        <input <?php echo ($data->status_produk=='nonaktif' ? 'checked' : '') ?> type="radio" name="status_produk" id="optionsTdkAktif" value="nonaktif"> Tidak Aktif
                                      </label>
                                    </div>
                              </div>
                            </div>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Close</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                   <!-- Modal Detail Produk -->
                    <div class="modal fade" id="lihat-produk<?php echo $data->id_produk; ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Detail <?php echo $data->nama_produk; ?></h4>
                            </div>
                            <div class="modal-body">
                            <div class="box-body">
                              <div class="form-group">
                                <div class="row">
                                 <input type="hidden"<?php echo $data->id_produk; ?>></input>
                                  <div class="col-md-3">
                                    <label for="inputName">Kode Produk</label>
                                    <p readonly="" class="form-control" ><?php echo $data->kode_produk; ?></p>
                                  </div>
                                  <div class="col-md-9">
                                    <label for="inputName">Nama Produk</label>
                                    <p readonly="" class="form-control" ><?php echo $data->nama_produk; ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="inputName">Harga Produk</label>
                                    <p readonly="" class="form-control" ><?php echo rupiah($data->harga_produk)?></p>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="inputName">Nama Tim</label>
                                    <p readonly="" class="form-control" name="nama_tim"><?php echo $data->nama_tim; ?></p>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for="inputName">Jenis Produk</label>
                                    <p readonly="" class="form-control" ><?php echo $data->nama_kategori; ?></p>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="inputName">Link Demo</label>
                                    <p readonly="" class="form-control" href="<?php echo $data->link_demo?>">link demo</p>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputName">Deskripsi Produk</label>
                                <textarea readonly="" rows="5" class="form-control" name="nama_klien"><?php echo $data->deskripsi_produk; ?></textarea>
                              </div>

                              <div class="form-group">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label for="inputEmail">Foto Produk</label>
                                      <?php if($data->foto_produk){ ?>
                                        <p><img src="<?php echo site_url('/assets/produk/'); echo $data->foto_produk ?>" height='100px' width='200px'></p>
                                      <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="inputEmail">File Produk</label>
                                      <?php if($data->file_produk){ ?>
                                        <p><a target="_blank" class="btn btn-success btn-sm" href="<?php echo site_url('assets/file_produk/'.$data->file_produk); ?>"><i class="fa fa-file"></i> Download File</a></p>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>
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