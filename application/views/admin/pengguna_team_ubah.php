<?php<?php
$this->load->view('admin/head_admin');
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Ubah Data Tim <small>Ubah Nama Tim dan Susunan Anggota</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Tim</a></li>
			<li class="active">Ubah Tim</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Form Ubah Tim</h3>
					</div>
					<!-- /.box header -->

					<form class="form-horizontal" method="post" action="<?php echo site_url('Admin_anggota/inputAnggota') ?>">

						<div class="box-body">
							<div class="form-group">			
								<label for="inputName" class="col-sm-3 control-label">Nama Tim</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_tim" placeholder="Nama Tim">
								</div>

								<div class="form-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-anggota">
										<i class="glyphicon glyphicon-plus"></i> Tambah Anggota
									</button>
								</div>	

								<div class="col-md-10">
									<div class="box-body">
										<table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Anggota</th>
													<th>Posisi</th>													
													<th>Aksi</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td>
														<a class="btn btn-sm btn-info" style="background: #d41912; border-color: #fff"><i class="fa fa-remove"></i></a>
													</td>
												</tr>

												<!-- MODALS TAMBAH ANGGOTA -->
												<div class="modal fade" id="tambah-anggota">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">Tambah Anggota</h4>
																</div>
																<div class="modal-body">
																	<div class="box-body">
																		<div class="form-group">
																			<label class="col-md-3">Nama Anggota</label>
																			<select class="form-control select2" style="width: 60%;">
																				<option selected="selected">Alabama</option>
																				<option>Alaska</option>
																				<option>California</option>
																				<option>Delaware</option>
																				<option>Tennessee</option>
																				<option>Texas</option>
																				<option>Washington</option>
																			</select>
																		</div>

																		<div class="form-group">
																			<label class="col-md-3">Posisi</label>
																			<select class="form-control select2" style="width: 60%;">
																				<option selected="selected">Alabama</option>
																				<option>Alaska</option>
																				<option>California</option>
																				<option>Delaware</option>
																				<option>Tennessee</option>
																				<option>Texas</option>
																				<option>Washington</option>
																			</select>
																		</div>
																	</div>
																</div>

																<div class="modal-footer">
																	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
																	<button type="button" class="btn btn-success">Tambah</button>
																</div>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
													<!-- /.modal -->
												</tbody>											
											</table>
										</div>
										<!-- /.box body tabel anggota -->
									</div>
									<!-- /.col-md-8 -->
								</div>
								<!-- /.form group -->

								<!-- /.box body -->
							</form>

							<div class="box-footer">
								<button type="submit" class="btn btn-warning pull-right">Simpan</button>
								<a href="<?php echo site_url('Admin_team')?>" type="button" class="btn btn-primary" >
									<i class="glyphicon glyphicon-chevron-left"></i> Kembali
								</a>
							</div>

						</div>
						<!-- /.box primary -->
					</div>
					<!-- /.col md 12 -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.section content -->
		</div>
		<!-- /.wrapper -->





		<?php
		$this->load->view('admin/foot_admin');
		?>