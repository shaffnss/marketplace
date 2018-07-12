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
		<h1>Produk Masuk</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active"> Produk</li>
		</ol>
	</section>
	
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
						<h3 class="box-title">Tabel Produk</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped datatable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Produk</th>
									<th>Jenis Produk</th>
									<th>Harga</th>
									<th>Team Pembuat</th>
									<th>Link Demo</th>
									<th>Status Penerimaan</th>
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
										<td><?php echo $data->nama_produk?></td>
										<td><?php echo $data->nama_kategori?></td>
										<td><?php echo rupiah($data->harga_produk)?></td>
										<td><?php echo $data->nama_tim?></td>
										<td>
											<a href="<?php echo $data->link_demo?>" type="button" class="btn btn-sm btn-primary" href><i class="fa fa-link" style="color: #fff"></i></a>
										</td>
										<td><span class="label label-warning">Proses</span></td>
										<!-- <td>
											<?php 
											if ($data->status_produk == "aktif") {
												echo '<span class="label label-success">Aktif</span>';
											}else{
												echo '<span class="label label-danger">Tidak Aktif</span>';
											}
											?>
										</td> -->
										<td class="text-center">
											<div class="row">
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihat-produk<?php echo $data->id_produk; ?>" style="background:#1a75ff; border-color:#fff"><i class="fa fa-eye"></i> Detail
												</button>
												<a onclick="return confirm('apakah anda yakin ingin menerima produk ini?'); " href="<?php echo site_url('Admin_produk/diterima/'.$data->id_detail_produk)?>" class="btn btn-sm btn-info" style="background: #4e9e02; border-color: #fff"><i class="fa fa-check"></i> Terima</a>
												<a onclick="return confirm('apakah anda yakin ingin menolak produk ini?'); " href="<?php echo site_url('Admin_produk/ditolak/'.$data->id_detail_produk)?>" class="btn btn-sm btn-info" style="background: #d41912; border-color: #fff"><i class="fa fa-remove"></i> Tolak</a>
											</div>
										</td>
									</tr>

										<!-- Modal Detail Produk -->
										<div class="modal fade" id="lihat-produk<?php echo $data->id_produk; ?>">
											<div class="modal-dialog">
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
																			<div class="col-md-3">
																				<label for="inputName">ID Produk</label>
																				<p class="form-control"><?php echo $data->id_produk; ?></p>
																			</div>
																			<div class="col-md-9">
																				<label for="inputName">Nama Produk</label>
																				<p class="form-control" ><?php echo $data->nama_produk; ?></p>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="row">
																			<div class="col-md-6">
																				<label for="inputName">Harga Produk</label>
																				<p class="form-control" ><?php echo rupiah($data->harga_produk)?></p>
																			</div>
																			<div class="col-md-6">
																				<label for="inputName">Nama Tim</label>
																				<p class="form-control" name="nama_tim"><?php echo $data->nama_tim; ?></p>
																			</div>
																		</div>
																	</div>

																	<div class="form-group">
																		<div class="row">
																			<div class="col-md-6">
																				<label for="inputName">Jenis Produk</label>
																				<p class="form-control" ><?php echo $data->nama_kategori; ?></p>
																			</div>
																			<div class="col-md-6">
																				<label for="inputName">Link Demo</label>
																				<p class="form-control" href="<?php echo $data->link_demo?>">link demo</p>
																			</div>
																		</div>
																	</div>

																	<div class="form-group">
																		<label for="inputName">Deskripsi Produk</label>
																		<p class="form-control" name="nama_klien"><?php echo $data->deskripsi_produk; ?></p>
																	</div>
																	
																	<div class="form-group">
																		<div class="form-group">
																			<div class="row">
																				<div class="col-md-6">
																					<label for="inputEmail">Foto Produk</label>
																					<?php if($data->foto_produk){ ?>
																					<p><img src="<?php echo site_url('/assets/produk/'); echo $data->foto_produk ?>" height='100px' width='100px'></p>
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
						</div>
						<!-- /.col --> 
					</div>
					<!-- /.row --> 
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->


			<?php
			$this->load->view('admin/foot_admin');
			?>
