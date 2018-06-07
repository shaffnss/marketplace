<?php
$this->load->view('klien/head_klien');

function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
?>

<body onload="window.print();">
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
        <h4><i class="fa fa-info"></i> Note:</h4>
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
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>

      <?php 
      $no=1;
      foreach ($invoices as $invoice) { ?>

        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>VokasiDev</strong><br>
              San Francisco, CA 94107<br>
              Phone: (804) 123-5432<br>
              Email: info@almasaeedstudio.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong><?php echo $invoice->nama_users ?></strong><br>
              <?php echo $invoice->instansi ?><br>
              Phone: <?php echo $invoice->no_telpon ?><br>
              Email: <?php echo $invoice->email ?>
            </address>
          </div>
          <!-- /.col -->
       <!--  <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jenis Sistem</th>
                <th>Harga</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $invoice->nama_produk ?></td>
                <td><?php echo $invoice->nama_kategori ?></td>
                <td><?php echo $invoice->harga_produk ?></td>
              </tr>
            </tbody>
          </table>
          <?php $no++ }?>
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
        <!-- <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo site_url('Klien_pembayaran')?>" type="button" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
          <a href="invoice-print.html" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
          <a href="<?php echo site_url('Klien_pembayaran/pembayaran')?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF</button>
          </div>
        </div>
      </section>
      <!-- /.content -->
      <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->
  </body>

  <?php
  $this->load->view('klien/foot_klien');
  ?>
