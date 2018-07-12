<?php
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
								<label class="col-sm-3 control-label" style="text-align: right;">Jenis Tim</label> 
								<div class="col-sm-6">       
									<select class="form-control" name="status_tim">
										<option value="individu" <?php if($tim[0]->status_tim == "individu") {echo "selected=selected";} ?>>Individu</option>
										<option value="tim" <?php if($tim[0]->status_tim == "tim") {echo "selected=selected";} ?>>Tim</option>
									</select>
								</div>
							</div>
							<br><br>

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
															<tbody>
							<?php 
							$no=1;
							foreach ($anggotaTim as $data) {
												# code...


								?>
									<tr>
										<td><?php echo $no ?></td>
										<td>
											<?php echo $data->nama_users ?>
										</td>
										<td>
											<?php echo $data->nama_posisi ?>	
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
											<select class="form-control select2 posisi" style="width: 60%;" name="id_posisi" required="">
												<option value="">Pilih Posisi</option>
												<?php foreach ($posisi as $value) { ?>
													<option value="<?php echo $value->id_posisi ?>"><?php echo $value->nama_posisi ?></option>
												<?php } ?>
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