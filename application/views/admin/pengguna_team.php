<?php<?php
$this->load->view('admin/head_admin');
// var_dump($tim);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Tim<small>Tambah, Edit, Ubah Data Tim</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Tim</a></li>
    </ol>
  </section>

  <!-- Modals Tambah Tim -->
  <section class="content-header">
    <div>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahTim"><i class="glyphicon glyphicon-plus"></i> Tambah Tim </button>   
   </div> 
   <!-- Modals Ubah Tamabh tim -->
   <div class="modal fade" id="tambahTim">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Nama Tim</h4>
          </div>

          <form class="form-horizontal" method="post" action="<?php echo site_url('Admin_team/inputNamaTeam') ?>">
            <div class="modal-body">
              <form action="" method="post" class="form-horizontal">
                <div class="box-body">

                  <div class="form-group">
                    <label class="">Nama Tim</label>
                    <input type="text" class="form-control" id="inputName" name="nama_tim" placeholder="Masukkan Nama Tim">
                  </div>

                  <div class="form-group">
                    <label class="">Jenis Tim</label>
                    <select class="form-control" name="status_tim" required="">
                      <option disabled selected="">---Pilih Jenis Tim---</option>
                      <option value="individu">Individu</option>
                      <option value="tim">Tim</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" value="Simpan">
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Tim</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Team</th>
                    <th>Jumlah Anggota</th>
                    <th>Status Tim</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <?php 
                $no=1;
                foreach ($tim as $data) {
                    # code...

                 ?>
                 <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->nama_tim ?></td>
                    <td>jumlah anggota</td>
                    <td> 
                      <?php if($data->status_tim=='individu') {
                        ?>
                        <span class="label label-info">Individu</span>
                      <?php }else{ ?>
                        <span class="label label-primary">Tim</span>
                      <?php }?>
                    </td>
                    <td>
                      <?php if($data->status=='aktif') {
                        ?>
                        <span class="label label-success">Aktif</span>
                      <?php }else{ ?>
                        <span class="label label-danger">Non Aktif</span>
                      <?php }?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-warning" href="<?php echo site_url('Admin_team/ubah_team/').$data->id_tim?>"><i class="fa fa-edit"></i></a>
                      <!-- <a href="" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a> -->
                    </a>
                  </td>
                </tr>
              </tbody>
              <?php $no++; } ?>
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
