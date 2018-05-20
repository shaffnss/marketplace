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
				<div class="box box-solid">
					<div class="box-header with-border">		
						<h3 class="box-title">Ubah Nama Tim dan Status</h3>
					</div>

					<form method="post" action="<?php echo site_url('Admin_team/ubahNamaTim') ?>" >
						<div class="box-body">
							<input type="hidden" class="form-control" name="id_tim" value="<?php echo $tim[0]->id_tim ?>">
							<div class="form-group">		
								<label for="inputName" class="col-sm-3 control-label" style="text-align: right;">Nama Tim</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_tim" value="<?php echo $tim[0]->nama_tim ?>">
								</div>
							</div><br><br>

							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align: right;">Status</label> 
								<div class="col-sm-6">       
									<select class="form-control" name="status">
										<option value="aktif" <?php if($tim[0]->status == "aktif") {echo "selected=selected";} ?>>Aktif</option>
										<option value="nonaktif" <?php if($tim[0]->status == "nonaktif") {echo "selected=selected";} ?>>Non Aktif</option>
									</select>
									<br>
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</div><br>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-solid">
					<div class="box-header with-border">		
						<h3 class="box-title">Tambah dan Hapus anggota</h3>
					</div>

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
							foreach ($anggotaTim as $data) {
												# code...


								?>
								<tbody>
									<tr>
										<td><?php echo $no ?></td>
										<td>
											<?php echo $data->nama_users ?>
										</td>
										<td>
											<?php echo $data->posisi_tim ?>	
										</td>
										<td>
											<a href="<?php echo site_url('Admin_team/hapusAnggota/'.$data->id_detail_tim.'/'.$data->id_tim) ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a> 
										</td>
									</tr>
									<?php 
									$no++;
								}?>
								<tr>
									<form method="post" action="<?php echo site_url('Admin_team/tambahAnggota') ?>" >

										<td><?php echo $no ?></td>
										<td><input type="hidden" name="id_tim" value="<?php echo $tim[0]->id_tim ?>">
											<select class="form-control select2 anggota" style="width: 60%;" name="id_users" required="">
												<option value="">Pilih Anggota</option>
												<?php foreach ($panggil_anggota as $item) {
																					# code...
													?>
													<option value="<?php echo $item->id_users ?>"><?php echo $item->nama_users ?></option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select class="form-control select2 posisi" style="width: 60%;" name="posisi_tim" required="">
												<option value="">Pilih Posisi</option>
												<option value="Project Manager">Project Manager</option>
												<option value="UI/UX Designer">UI/UX Designer</option>
												<option value="Front End">Front End</option>
												<option value="Back End">Back End</option>
												<option value="Database Analyst">Database Analyst</option>
											</select>
										</td>
										<td>
											<input type="submit" class="btn btn-primary" value="Tambah Anggota">
										</td>
									</form>
								</tr>
							</tbody>											
						</table>
					</div>
					<!-- /.col-md-12-->
					<!-- /.box body -->

					<div class="box-footer">

						<a href="<?php echo site_url('Admin_team')?>" type="button" class="btn btn-default" >
							<i class="glyphicon glyphicon-chevron-left"></i> Kembali
						</a>
					</div>
				</div>
				<!-- /.form primary -->
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