<?php
$this->load->view('anggota/head_anggota');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Produk</h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li class="active"> Unggah Data Produk</li>
   </ol>
 </section>

 <section class="content-header">
  <div>
    <a href="<?php echo site_url('Anggota_uploadProduk/tambah_uploadProduk')?>" type="button" class="btn btn-primary" >
      <i class="glyphicon glyphicon-plus"></i>Unggah
    </a>
  </div> 
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Produk yang Telah Diunggah</h3>
        </div>

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Jenis Produk</th>
              <th>Harga</th>
              <th>Deskripsi Produk</th>
              <th>Link Demo</th>
              <th>Tampilan Produk</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <?php 
          $no=1;
          foreach ($upload as $data) {
              # code...

            ?>
            <tbody>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data->nama_produk?></td>
                <td><?php echo $data->jenis_produk?></td>
                <td><?php echo $data->harga_produk?></td>
                <td><?php echo $data->deskripsi_produk?></td>
                <td><?php echo $data->link_demo?></td>
                <!-- <td><?php echo $data->mockup_produk?></td> -->
                <td>
                  <img src="<?php echo site_url('/assets/produk/'); echo $data->mockup_produk ?>" height='100px' width='100px'>
                </td>
                <td>
                  <span class="label label-success">Disetujui</span>
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ubah-produk<?php echo $data->id_produk; ?>" style="background:#1a75ff; border-color:#fff" onclick="ubah-produk"><i class="fa fa-pencil"></i>
                  </button>
                  <a class="btn btn-sm btn-info" style="background: #d41912; border-color: #fff"><i class="fa fa-remove"></i></a>
                </td>
              </tr>

              <div class="modal fade" id="ubah-produk<?php echo $data->id_produk; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Ubah Data Produk</h4>
                      </div>

                      <div class="modal-body">
                        <form action="<?php echo site_url('Anggota_uploadProduk/ubahProduk') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
                          <div class="box-body">
                            <input type="hidden" class="form-control" id="inputName" name="id_produk" value="<?php echo $data->id_produk; ?>" required="">   

                            <div class="form-group">
                              <label for="inputName">Nama Produk</label>
                              <input type="text" class="form-control" id="inputName" name="nama_produk" value="<?php echo $data->nama_produk; ?>" required="">  
                            </div>

                            <div class="form-group">
                              <label for="inputPrice">Harga</label><input type="number" class="form-control" name="harga_produk" value="<?php echo $data->harga_produk; ?>" required="">
                            </div>

                            <div class="form-group">
                              <label >Jenis Produk</label>
                              <select class="form-control" name="jenis_produk" value="<?php echo $data->jenis_produk; ?>">
                                <option disabled selected="">---Pilih Jenis Produk---</option>
                                <option value="Website" <?php if($data->jenis_produk == "Website") {echo "selected=selected";} ?>>Website</option>
                                <option value="Mobile Apps" <?php if($data->jenis_produk == "Mobile Apps") {echo "selected=selected";} ?>>Mobile Apps</option>
                                <option value="Game" <?php if($data->jenis_produk == "Game") {echo "selected=selected";} ?> >Game</option>
                                <option value="Artificial Intelegent(AI)" <?php if($data->jenis_produk == "Artificial Intelegent(AI)") {echo "selected=selected";} ?> >Artificial Intelegent(AI)</option>
                              </select>              
                            </div>

                            <div class="form-group">
                              <label for="inputName">Deskripsi Produk</label>          
                              <textarea class="form-control" name="deskripsi_produk"><?php echo $data->deskripsi_produk; ?>
                              </textarea>                
                            </div>

                            <div class="form-group">
                              <label for="inputEmail">Link Demo</label>
                              <input type="text" class="form-control" name="link_demo" value="<?php echo $data->link_demo; ?>" required="">
                            </div>

                            <div class="form-group">
                              <label for="inputEmail">Mockup</label>                
                              <input type="file" name="mockup_produk">
                              <img src="<?php echo site_url('/assets/produk/'); echo $data->mockup_produk ?>" height='100px' width='100px'>             
                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <?php 
                $no++; }
                ?>

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
$this->load->view('anggota/foot_anggota');
?>