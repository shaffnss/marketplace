<?php
$this->load->view('admin/head_admin');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Manajemen Anggota Tim <small>tambah, ubah, hapus anggota</small></h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Susunan Anggota Tim (Nama Teamnya)</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th style="width: 10px">ID</th>
                <th>Nama </th>
                <th>Posisi</th>
                <th>Aksi</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Afif</td>
                <td>Project Manager</td>
                <td><button type="button" class="btn btn-danger">Hapus</button></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Afif</td>
                <td>FE</td>
                <td><button type="button" class="btn btn-danger">Hapus</button></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Afif</td>
                <td>BE</td>
                <td><button type="button" class="btn btn-danger">Hapus</button></td>
              </tr>

            </table>
            </div>
        <!-- /.box -->
        <div class="box-footer">
          <button type="button" class="btn btn-success pull-right">Setujui</button>
          <a href="<?php echo site_url('User_team')?>" type="button" class="btn btn-primary" >
          <i class="glyphicon glyphicon-chevron-left"></i> Kembali
        </a>
        </a>
      </div> 
          </div>
          <!-- /.box-body -->
    </div>

    <!-- TABEL ANGGOTA START -->
    <div class="col-md-6">
      <!-- Custom Tabs -->
      <div class="box">
      <div class="box-header">
            <h3 class="box-title">Pilih Anggota Tim</h3>
          </div>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Project Manager</a></li>
          <li><a href="#tab_2" data-toggle="tab">UI/UX</a></li>
          <li><a href="#tab_3" data-toggle="tab">Front End</a></li>
          <li><a href="#tab_4" data-toggle="tab">Back End</a></li>
          <li><a href="#tab_5" data-toggle="tab">Data Base</a></li>
          <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th style="width: 10px">Aksi</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>Project Manager</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>fitri</td>
                    <td>Project Manager</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>Project Manager</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="tab_2">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th style="width: 10px">Aksi</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>UI/UX</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>fitri</td>
                    <td>UI/UX</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>UI/UX</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="tab_3">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th style="width: 10px">Aksi</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>Front End</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>fitri</td>
                    <td>Front End</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>Front End</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab_4">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th style="width: 10px">Aksi</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>Back End</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>fitri</td>
                    <td>Back End</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>Back End</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab_5">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th style="width: 10px">Aksi</th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>UI/UX</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>fitri</td>
                    <td>UI/UX</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Afif</td>
                    <td>UI/UX</td>
                    <td>
                      <button type="button" class="btn btn-primary">Tambah</button>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      <!-- Tabel Anggota End -->
    </div>
  </div>
</section>
</div>



<?php
$this->load->view('admin/foot_admin');
?>