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
        <!-- <div class="callout callout-info">
          <h4>Tata Cara Pembayaran :</h4>

          <p>Silahkan lakukan pembayaran pembelian sistem anda melalui Transfer ke nomor rekening Bank BNI 009477590342929 a.n Shafira Fitrianissa</p>
        </div> -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Keranjang Produk</h3>

            <div class="box-tools">
              <!-- <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped data-tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Jenis Sistem</th>
                  <th>Deskripsi Produk</th>
                  <th>Aksi</th>
                </tr>
              </thead>

            
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>dummy</td>
                    <td>dummy</td>
                    <td>dummy</td>
                    <td>dummy</td>
                    <td>
                      <div>
                        <button type="button" class="btn btn-primary">
                          <i class="fa fa-check"></i>Beli Produk
                        </button>
                      </div> 
                    </td>
                  </tr>
                </tbody>
             
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
$this->load->view('klien/foot_klien');
?>