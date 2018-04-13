<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Pembelian</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Pembelian</h3>
          </div>

          <div class="box-tools"></div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nama Klien</th>
                <th>E-mail</th>
                <th>No Telfon</th>
                <th>Instansi</th>
                <th>Tanggal Pembelian</th>
                <th>Produk</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>01</td>
                <td>Aya</td>
                <td>aya@gmail.com</td>
                <td>082138657982</td>
                <td>IT U</td>
                <td>31-03-2017</td>
                <td>Sistem Kasir</td>
                <td></td>
                <td><span class="label label-success">Approved</span></td>
                <td>
                  <a class="btn btn-success glyphicon glyphicon-ok"></a>
                  <button class="btn btn-danger glyphicon glyphicon-remove"></button>
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
$this->load->view('admin/foot_admin');
?>