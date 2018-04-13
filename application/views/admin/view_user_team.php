<?php<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Manajemen Team</h1>
  </section>

  <!-- modal -->
  <section class="content-header">
    <div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-anggota">
        Tambah
      </button>
    </div> 
  </section>

  <div class="modal fade" id="tambah-anggota">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambahkan Team</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Team</label>

              <div>
                <input type="text" class="form-control" placeholder="Masukkan Nama Team">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Team</h3>

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
                  <th>Nama Team</th>
                  <th>Detail Anggota</th>
                  <th>Status</th>
                </tr>
                <tr>
                  <td>01</td>
                  <td>Team Hore</td>
                  <th>
                    <a href="<?php echo site_url('User_team/detail_anggota')?>" type="button" class="btn btn-primary" /> Lihat </a>
                  </th>
                  <td><span class="label label-success">Approved</span></td>
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
  