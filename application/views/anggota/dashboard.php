<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
          <center><p style="font-size: 30px;" >Selamat Datang, <?php echo $this->session->userdata('name');?>!</p></center>
          <br>
      </div>

        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Daftar Tim Anda</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Tim</th>
                    <th>Posisi Anda</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $no=1;
                  foreach ($tampilTim as $item) {
                  # code...

                    ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $item->nama_tim; ?></td>
                      <td><?php echo $item->nama_posisi; ?></td>
                      <td>
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail-tim<?php echo $item->id_tim; ?>">
                        Detail Anggota
                      </button>
                    </td>
                  </tr>

                  <!-- Modal Tim --> 
                  <div class="modal fade bs-example-modal-lg" id="detail-tim<?php echo $item->id_tim; ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Susunan Anggota Tim <?php echo $item->nama_tim; ?></h4>
                          </div>

                          <div class="modal-body">
                            <div class="box-body">


                              <?php 
                              $index=1;
                              $detail_tim=$this->Anggota_dashboard_model->getDetailTeam($item->id_tim);
                              foreach ($detail_tim as $tim) {
                                  # code...

                                ?>
                                <div class="row">
                                      
                                      <div class="col-md-1">
                                        <h5><?php echo $index ?></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <img style="height: 50px; width: 50px; border-radius: 100%" src="<?php echo site_url('assets/users/klien/'.$tim->foto) ?>" onerror="this.src='<?php echo site_url('assets/users/anggota/index.png'); ?>'" >
                                      </div>
                                      <div class="col-md-2">
                                        <h5><?php echo $tim->nama_users; ?></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <h5><?php echo $tim->nama_posisi; ?></h5>
                                      </div>
                                      <div class="col-md-3">
                                        <h5><?php echo $tim->email; ?></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <h5><?php echo $tim->no_telpon; ?></h5>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <?php 
                                    $index++; 
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        
                        <?php 
                        $no++; 
                      }
                      ?>
                    </tbody>
                  </table>
                </div>  
              </div>
            </div>
            <!-- /.COL-MD-8 -->
        </div>
      </section>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?php
    $this->load->view('anggota/foot_anggota');
    ?>