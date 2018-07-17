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
			<div class="col-md-12">
				<div class="callout callout-warning">
					<h4>Lanjutkan Dengan Unggah File Perjanjian</h4>
					
					<p>Unggah file perjanjian segera setelah Anda mengkonfirmasi pembayaran klien</p>
				</div>
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
					<!-- Tab Pane Draft -->
					<div class="box-header">
						<div class="col-md-6">
							<a href="#proses" class="btn btn-primary" style="width: 100%" data-toggle="tab" >PROSES</a>
						</div>
						<div class="col-md-6">
							<a href="#selesai"  class="btn btn-primary" style="width: 100%" data-toggle="tab">SELESAI</a>
						</div>
					</div>
					<div class="tab-content">
						<div class="active tab-pane fade in" id="proses">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Pembelian</th>
											<th>Nama Klien</th>
											<th>Nama Produk</th>
											<th>Kategori Perjanjian</th>
											<th>Keterangan</th>
											<th>Status Pembayaran</th>
											<th>File Perjanjian</th>
											<th>Upload File</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no=1;
										foreach ($perjanjian as $data) {
											# code...
											if($data->status_perjanjian == "proses") {
												?>

												<tr>
													<td><?php echo $no?></td>
													<td><?php echo $data->kode_pembelian ?></td>
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
													<td><?php if($data->file_perjanjian){ ?><a href="<?php echo site_url().'assets/file_perjanjian/'.$data->file_perjanjian ?>" target="_blank"><i class="fa fa-file-pdf-o fa-2x" style="color:black"></i></a><?php }else{echo '-';} ?></td>
													<td>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-file<?php echo $data->id_pembelian ?>"><i class="fa fa-upload"></i></button>
													</td>
												</tr>

												<!-- Modal Upload File-->
												<div class="modal fade" id="upload-file<?php echo $data->id_pembelian ?>">
													<div class="modal-dialog">
														<div class="modal-content">

															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">Unggah File Perjanjian Produk <strong><?php echo $data->nama_produk ?></strong></h4>
																</div>

																<form action="<?php echo site_url('Admin_perjanjian/unggahPerjanjian') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
																	<div class="modal-body">
																		<div class="box-body">
																			<div class="form-group">
																				<label for="exampleInputFile">Unggah File</label>
																				<input type="file" name="file_perjanjian">
																				<input type="hidden" name="id_pembelian" value="<?php echo $data->id_pembelian ?>">
																			</div>
																			<p class="text-muted"><i>*File harus berekstensi PDF dan maksimal ukuran file 5 MB</i></p>
																		</div>
																	</div>

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

													<?php $no++; }}?>
												</tbody>
											</table>
											<!-- /.box-body -->
										</div>
									</div>
									<!-- /.tab-pane -->

									<div class="tab-pane fade in" id="selesai">
										<div class="box-body">
											<table id="example1" class="table table-bordered table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Kode Pembelian</th>
														<th>Nama Klien</th>
														<th>Nama Produk</th>
														<th>Kategori Perjanjian</th>
														<th>Keterangan</th>
														<th>Status Pembelian</th>
														<th>File Perjanjian</th>
														<th>Upload File</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$no=1;
													foreach ($perjanjian as $data) {
											# code...
														if($data->status_perjanjian == "selesai") {
															?>

															<tr>
																<td><?php echo $no?></td>
																<td><?php echo $data->kode_pembelian ?></td>
																<td><?php echo $data->nama_users ?></td>
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
																<td><?php if($data->file_perjanjian){ ?><a href="<?php echo site_url().'assets/materi/'.$data->file_perjanjian ?>" target="_blank"><i class="fa fa-file-pdf-o fa-2x" style="color:black"></i></a><?php }else{echo '-';} ?></td>
																<td>
																	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload-file<?php echo $data->id_pembelian ?>"><i class="fa fa-upload"></i></button>
																</td>
															</tr>
															<!-- Modal Upload File-->
															<div class="modal fade" id="upload-file<?php echo $data->id_pembelian ?>">
																<div class="modal-dialog">
																	<div class="modal-content">

																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title">Unggah File Perjanjian Produk <strong><?php echo $data->nama_produk ?></strong></h4>
																			</div>

																			<form action="<?php echo site_url('Admin_perjanjian/unggahPerjanjian') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
																				<div class="modal-body">
																					<div class="box-body">
																						<div class="form-group">
																							<label for="exampleInputFile">Unggah File</label>
																							<input type="file" name="file_perjanjian">
																							<input type="hidden" name="id_pembelian" value="<?php echo $data->id_pembelian ?>">
																						</div>
																						<p class="text-muted"><i>*File harus berekstensi PDF dan maximal ukuran file 2 MB</i></p>
																					</div>
																				</div>

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
																<?php $no++; }}?>
															</tbody>
														</table>
														<!-- /.box-body -->
													</div>
												</div>

											</div>
											<!-- /.tab-content -->
										</div>
										<!-- /.box -->
									</div>
									<!-- /.col-xs-12 -->
								</div>
								<!-- /.row -->
							</section>
							<!-- /.content -->
						</div>
						<!-- /.content-wrapper -->

						<?php
						$this->load->view('admin/foot_admin');
						?>																				