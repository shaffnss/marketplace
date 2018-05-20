<?php<?php
$this->load->view('admin/head_admin');
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Tambah Tim <small>Buat Nama Tim dan Tambah Anggota</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Tim</a></li>
			<li class="active">Tambah Tim</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<!-- /.box header -->

					<form class="form-horizontal" method="post" action="<?php echo site_url('Admin_team/inputTeam') ?>">
						<div class="box-body">
							<div class="form-group">			
								<label for="inputName" class="col-sm-3 control-label">Nama Tim</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_tim" placeholder="Nama Tim" required>
								</div>

								<br>

								<div class="col-md-12">
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
											<?php 
											$no=1;

											?>
											<tbody>
												<td><?php echo $no ?></td>
												<td>
													<select class="form-control select2 anggota" style="width: 60%;">
														<?php foreach ($panggil_anggota as $data) {
																					# code...
															?>
															<option value="<?php echo $data->id_users ?>"><?php echo $data->nama_users ?></option>
															<?php } ?>
														</select>
													</td>
													<td>
													
															<select class="form-control select2 posisi" style="width: 60%;">
																<option value="Project Manager">Project Manager</option>
																<option value="UI/UX Designer">UI/UX Designer</option>
																<option value="Front End">Front End</option>
																<option value="Back End">Back End</option>
																<option value="Database Analyst">Database Analyst</option>
															</select>
														
													</td>
													<td>
														<button href="" type="button" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></button>
														</td>
													</tbody>											
												</table>
											</div>
											<!-- /.box body tabel anggota -->
										</div>
										<!-- /.col-md-12-->
									</div>
									<!-- /.form group -->

									<!-- /.box body -->
								</form>

								<div class="box-footer">
									<button type="submit" class="btn btn-primary pull-right">Simpan</button>
									<a href="<?php echo site_url('Admin_team')?>" type="button" class="btn btn-default" >
										<i class="glyphicon glyphicon-chevron-left"></i> Kembali
									</a>
								</div>

						
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