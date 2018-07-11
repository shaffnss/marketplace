<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Kelola Bank</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-file"></i> Bank</a></li>
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

		<div class="box">
			<div class="row">

				<div class="col-xs-12">
					<div class="box-header">
						<!-- <h3 class="box-title">Tabel Bank</h3> -->
						<a data-target="#add-bank" data-toggle="modal" class="btn btn-primary pull-right">Tambah Bank</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Bank</th>
									<th>No Rekening</th>
									<th>Atas Nama (a.n)</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php 
							$no=1;
							foreach ($bank as $data) {
                    # code...

								?>
								<tbody>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $data->nama_bank?></td>
										<td><?php echo $data->no_rekening?></td>
										<td><?php echo $data->nama_pemilik?></td>
										<td>
											<a class="btn btn-warning glyphicon glyphicon-edit" data-target="#edit-bank<?php echo $data->id_bank; ?>" data-toggle="modal"></a>
											<a onclick="return confirm('Apakah Anda yakin ingin menghapus Bank ini?');" class="btn btn-danger glyphicon glyphicon-remove" href="<?php echo site_url('Admin_bank/hapusBank/'.$data->id_bank); ?>"></a>
										</td>
									</tr>
								</tbody>

								<!-- Modal Tambah Bank -->
								<div class="modal fade" id="add-bank">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title">Tambah Bank </h4>
												</div>
												<div class="modal-body">
													<form action="<?php echo site_url('Admin_bank/tambahBank') ?>" method="POST" class="form-horizontal">
														<div class="box-body">
															<div class="form-group">
																<div class="row">
																	<div class="col-md-3">
																		<label for="inputName">Nama Bank</label>
																		<input type="text" class="form-control" name="nama_bank" required >
																	</div>
																	<div class="col-md-9">
																		<label for="inputName">No Rekening</label>
																		<input type="text" class="form-control" name="no_rekening" required >
																	</div>
																</div>
															</div>
															<div class="form-group">
																<div class="row">
																	<div class="col-md-12">
																		<label for="inputName">Atas Nama (a.n)</label>
																		<input type="text" class="form-control" name="nama_pemilik" required>
																	</div>
																</div>
															</div>												
														</div>
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
														<input type="submit" class="btn btn-primary pull-right" value="Simpan">
													</div>
												</form>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->

									<!-- Modal Detail Produk -->
									<div class="modal fade" id="edit-bank<?php echo $data->id_bank; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title">Detail Bank <?php echo $data->nama_bank; ?></h4>
													</div>
													<div class="modal-body">
														<form action="<?php echo site_url('Admin_bank/ubahBank') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
															<div class="box-body">
																<div class="form-group">
																	<div class="row">
																		<div class="col-md-3">
																			<label for="inputName">Nama Bank</label>
																			<input type="text" class="form-control" name="nama_bank" value="<?php echo $data->nama_bank; ?>">
																			<input type="hidden" class="form-control" name="id_bank" value="<?php echo $data->id_bank; ?>">
																		</div>
																		<div class="col-md-9">
																			<label for="inputName">No Rekening</label>
																			<input type="text" class="form-control" name="no_rekening" value="<?php echo $data->no_rekening; ?>">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row">
																		<div class="col-md-12">
																			<label for="inputName">Atas Nama (a.n)</label>
																			<input type="text" class="form-control" name="nama_pemilik" value="<?php echo $data->nama_pemilik; ?>">
																		</div>
																	</div>
																</div>												
															</div>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
															<input type="submit" class="btn btn-primary pull-right" value="Simpan">
														</div>
													</form>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
										</div>
										<!-- /.modal -->
										<?php $no++; 
									} 
									?>
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