<?php
	$this->load->view('landing/head_landing');
	
	function rupiah($angka){
		
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
		
	}
?>

<!-- Page Content -->
<div class="container">
	
	<div class="row h-100">
		
		<div class="col-md-12 my-5">
				<h2 align="center">KERANJANG BELANJA</h2><br>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Gambar</th>
								<th>Nama Produk</th>
								<th>Harga Produk</th>
								<th width="150">QTY</th>
								<th>Subtotal</th>
								<th>Opsi</th>
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
											<a href="<?php echo site_url('ListProduk/bayar/'.$item['rowid']); ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
											<a href="<?php echo site_url('ListProduk/hapus/'.$item['rowid']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php }}else{echo'<tr><td colspan="6" align="center">Keranjang Belanja Kosong.</td></tr>'; } ?>
						</tbody>
						<tfoot>
							<tr>
								<th class="text-right" colspan="4" >Total</th>
								<th colspan="2"><?php echo rupiah($total); ?></th>
							</tr>
						</tfoot>
					</table>
					<a href="<?php echo site_url('ListProduk/hapus/semua'); ?>" class="btn btn-danger">Kosongkan</a>
					<a href="<?php echo site_url('ListProduk/bayar/semua'); ?>" class="btn btn-primary">Bayar</a>
			</div> <!-- /container -->
		</div>
		<!-- /.col-lg-9 -->
		
	</div>
	<!-- /.row -->


<?php
$this->load->view('landing/foot_landing');
?>
