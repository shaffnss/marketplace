<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<center><p style="font-size: 30px;" >Selamat Datang, <?php echo $this->session->userdata('name');?>!<br></p></center>
			<br>
		</div>
		<!-- <hr style="border-width: 1px; border-color: #DDD;"> -->

		<!-- Box Notifikasi -->
		<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-cart-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pembelian</span>
              <span class="info-box-number">1,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-plus-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Produk Masuk</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Produk Diterima</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Klien Baru</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
			</div>
			<!-- /.row -->
			
			<br>

			<!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Grafik Penjualan</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          <br>
			<div class="row">
				<!-- TABLE: LATEST ORDERS -->
				<div class="col-md-8">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Pembelian Terbaru</h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin">
									<thead>
										<tr>
											<th>ID Pembelian</th>
											<th>Nama Produk</th>
											<th>Status</th>
											<th>Nama Klien</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="pages/examples/invoice.html">OR9842</a></td>
											<td>Call ofduty</td>
											<td><span class="label label-success">Shipped</span></td>
											<td>nama klien</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.box-body -->
						<div class="box-footer clearfix">
							<a href="<?php echo site_url('Admin_pembelian') ?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Pembelian</a>
						</div>
						<!-- /.box-footer -->
					</div>
					<!-- /.box -->
				</div>

				<div class="col-md-4">
					<!-- PRODUCT LIST -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Produk Masuk Terbaru</h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<ul class="products-list product-list-in-box">
								<li class="item">
									<div class="product-img">
										<img src="<img class="card-img-top" src="" alt="Product Image">
									</div>
									<div class="product-info">
										<a href="javascript:void(0)" class="product-title">Samsung TV
											<span class="label label-warning pull-right">$1800</span></a>
											<span class="product-description">
												Samsung 32" 1080p 60Hz LED Smart HDTV.
											</span>
										</div>
									</li>
											</ul>
										</div>
										<!-- /.box-body -->
										<div class="box-footer text-center">
											<a href="<?php echo site_url('Admin_pembelian') ?>" class="uppercase">Lihat Semua Produk</a>
										</div>
										<!-- /.box-footer -->
									</div>
									<!-- /.box -->
								</div>
								<!-- /.col-md-4 -->
							</div>
							<!-- /.row -->
						</section>
						<!-- Box Notifikasi (End) -->

					</section>

					<!-- /.content -->
				</div>
				<!-- /.content-wrapper -->

				<?php
				$this->load->view('admin/foot_admin');
				?>
