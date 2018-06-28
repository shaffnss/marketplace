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
    <h1>
      Invoice
      <!-- <small>#007612</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Klien_dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo site_url('Klien_pembayaran')?>"><i class="fa fa-money"></i>Invoice & Pembayaran</a></li>
      <li class="active">Invoice</li>
    </ol>
  </section>

  <div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
      <h4><i class="fa fa-info"></i> Catatan:</h4>
      Silahkan cetak Invoice anda. Klik tombol cetak yang berada dibawah Invoice anda.
    </div>
  </div>

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> VokasiDev
          <!-- <small class="pull-right">Date: 2/10/2014</small> -->
        </h2>
      </div>
      <!-- /.col -->
    </div>


      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Dari
          <address>
            <strong>VokasiDev</strong><br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Untuk
          <address>
            <strong><?php echo $invoices[0]->nama_users ?></strong><br>
            <?php echo $invoices[0]->instansi ?><br>
            Phone: <?php echo $invoices[0]->no_telpon ?><br>
            Email: <?php echo $invoices[0]->email ?>
          </address>
        </div>
        <!-- /.col -->
       <div class="col-sm-4 invoice-col">
          <b>Invoice </b><br>
          <br>
          <b>Order ID:</b> <?php echo $invoices[0]->kode_pembelian ?><br>
          <b>Payment Due:</b> <?php echo date("d F Y", strtotime("+1 day", strtotime($invoices[0]->tgl_pembelian))) ?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Number</th>
                <th>Product Name</th>
                <th>System Type</th>
                <th>Price</th>
              </tr>
            </thead>

            <tbody>
						<?php 
						$no=1;
						foreach ($invoices as $invoice) { ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $invoice->nama_produk ?></td>
                <td><?php echo $invoice->nama_kategori ?></td>
                <td><?php echo rupiah($invoice->harga_produk)?></td>
              </tr>
						<?php $no++; }?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Infromation:</p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Bank BNI <br>
            009477590342929 <br>
            a.n John Doe
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><small>Lakukan Pembayaran Sebelum </small> <?php echo date("d F Y", strtotime("+1 day", strtotime($invoices[0]->tgl_pembelian))) ?></p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total:</th>
                <td><?php echo rupiah($invoices[0]->total) ?></td>
              </tr>
              <tr>
                <th>Diskon</th>
                <td>0</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><?php echo rupiah($invoices[0]->total) ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo site_url('Klien_pembayaran')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
          <?php if(empty($invoices[0]->bukti_pembayaran)): ?>
					<a href="<?php echo site_url('Klien_pembayaran/pembayaran/'.$invoices[0]->id_pembelian)?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Lanjutkan Pembayaran</a>
					<?php endif; ?>
          <button type="button" onclick="window.print();" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Cetak Invoice</button>
          </div>
        </div>
      </section>
      <!-- /.content -->
      <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->


    <?php
    $this->load->view('klien/foot_klien');
    ?>
