<?php
$this->load->view('anggota/head_anggota');
function rupiah($angka){

  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;

}
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
      <i class="fa fa-plus"></i> Unggah Produk
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
                <td><?php echo $data->nama_kategori?></td>
                <td><?php echo rupiah($data->harga_produk)?></td>
                <td><?php echo $data->deskripsi_produk?></td>
                <td><a target="_blank" href="<?php echo $data->link_demo?>" class="btn btn-sm btn-primary" href><i class="fa fa-link" style="color: #fff"></i></a></td>
                <td class="text-center">
									<?php if($data->foto_produk) { ?>
                  <img src="<?php echo site_url('/assets/produk/'.$data->foto_produk); ?>" height="100px" width="100px">
									<?php }else{echo "-";} ?>
                </td>
                <td>
                   <?php if($data->status=='proses') { ?>
                        <span class="label label-warning">Proses</span>
                      <?php }elseif($data->status=='diterima') { ?>
                        <span class="label label-success">Diterima</span>
                      <?php }else{ ?>
                         <span class="label label-danger">Ditolak</span>
                      <?php }?>     
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ubah-produk<?php echo $data->id_produk; ?>" style="background:#1a75ff; border-color:#fff" onclick="ubah-produk"><i class="fa fa-pencil">Edit</i>
                  </button>
                 <a onclick="return confirm('apakah anda yakin ingin menghapus produk ini?'); " href="<?php echo site_url('Anggota_uploadProduk/delete_upload/'.$data->id_produk)?>" class="btn btn-sm btn-info" style="background: #d41912; border-color: #fff"><i class="fa fa-remove"></i>Hapus</a>
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
                            <input type="text" name="nama_file" value="<?php echo $data->file_produk; ?>" >   
                            <input type="text" name="nama_foto" value="<?php echo $data->foto_produk; ?>" >   

                            <div class="form-group">
                              <label for="inputName">Nama Produk</label>
                              <input type="text" class="form-control" id="inputName" name="nama_produk" value="<?php echo $data->nama_produk; ?>" required="">  
                            </div>
                            <div class="form-group">
															<div class="row">
																<div class="col-md-6">
																	<label for="inputPrice">Harga</label><input type="number" class="form-control" name="harga_produk" value="<?php echo $data->harga_produk; ?>" required="">
																</div>
																<div class="col-md-6">
																	<label >Jenis Produk</label>
																	<select class="form-control" name="jenis_produk">
																		<option disabled selected="">---Pilih Jenis Produk---</option>
																		 <?php foreach ($kategoris as $kategori) { ?>
																				<option <?php if($data->nama_kategori == $kategori->nama_kategori){ echo 'selected'; }?> value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori?></option>
																			<?php } ?>
																	</select>              
																</div>
															</div>
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
														<div class="row">
															<div class="col-md-6">
																<label for="inputEmail">Foto</label>                
																<input type="file" name="foto_produk">
																<p class="text-muted small"><i>File dalam bentuk gif | jpg | png | jpeg, max size 7MB</i></p><br>
																<?php if($data->foto_produk){ ?>
																<img src="<?php echo site_url('/assets/produk/'); echo $data->foto_produk ?>" height='100px' width='100px'>             
																<?php } ?>
															</div>
															<div class="col-md-6">
																<label for="inputEmail">File Produk</label>                
																<input type="file" name="file_produk">
																<p class="text-muted small"><i>File dalam bentuk .zip, max size 7MB</i></p>
																<?php if($data->file_produk){ ?>
																<a target="_blank" class="btn btn-success btn-sm" href="<?php echo site_url('assets/file_produk/'.$data->file_produk); ?>"><i class="fa fa-file"></i> Download File</a>
																<?php } ?>
															</div>
														</div>
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