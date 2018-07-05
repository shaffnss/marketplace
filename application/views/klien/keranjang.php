<?php
	$this->load->view('klien/head_klien');
	
	function rupiah($angka){
		
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Keranjang</h1>
		<ol class="breadcrumb">
      <li><a href="<?php echo site_url('Klien_dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"> Keranjang</a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Keranjang Produk</h3>
					
					<div class="box-tools">
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped data-tables">
						<thead>
							<tr>
								<th>Foto produk</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Jenis Sistem</th>
								<th>Deskripsi Produk</th>
								<th>Aksi</th>
							</tr>
						</thead>
						
            
						<tbody>
							<?php
								$total = 0;
								if(count($cart) > 0){
									foreach($cart as $item){
										$total += $item['subtotal'];
									?>
									<tr>
										<td><img src="<?php echo base_url('assets/produk/'.$item['gambar']) ?>" width="200"></td>
										<td><?php echo $item['name']; ?></td>
										<td>Rp <?php echo number_format($item['price'],0,',','.'); ?></td>
										<td><?php echo $item['qty']; ?></td>
										<td>Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></td>
										<td>
											<a href="<?php echo site_url('ListProduk/bayarid/'.$item['rowid']); ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
											<a href="<?php echo site_url('ListProduk/hapus/'.$item['rowid']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php }}else{echo'<tr><td colspan="6" align="center">Keranjang Belanja Kosong.<br><a style="margin-top: 10px" class="btn btn-success btn-sm" href="'.site_url('ListProduk').'">Pilih Produk</a></td></tr>'; } ?>
						</tbody>
						<tfoot>
							<tr>
								<th class="text-right" colspan="4" >Total</th>
								<th colspan="2"><?php echo rupiah($total); ?></th>
							</tr>
						</tfoot>
					</table>
					<?php if(count($cart) > 0) { ?>
					<a href="<?php echo site_url('ListProduk/hapus/semua'); ?>" class="btn btn-danger">Kosongkan</a>
					<a href="<?php echo site_url('ListProduk/bayar'); ?>" class="btn btn-primary">Bayar</a>
					<?php } ?>
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
$this->load->view('klien/foot_klien');
?>