<?php
$this->load->view('admin/head_admin');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pemesanan</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Pemesanan</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nama Klien</th>
                  <th>Nama Instansi</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
                <tr>
                  <td>01</td>
                  <td>Fira</td>
                  <td>SV</td>
                  <td>13-03-2018</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>
                    <a href="<?php echo site_url('Pemesanan/detail_pemesanan')?>" type="button" class="btn btn-primary" />Lihat Detail</a>
                  </td>
                </tr>
                </tr>
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