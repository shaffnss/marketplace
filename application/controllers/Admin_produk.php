<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_produk_model");
		$this->load->helper("form");
		$this->load->helper("url");
	}

	public function index()
	{
		$data['produk']=$this->admin_produk_model->getProduk();
		$this->load->view('admin/produk',$data);
	}

	public function tambahProduk()
	{
    $data["tambah_tim"]=$this->admin_produk_model->getTeam();
     $data["tambah_produk"]=$this->admin_produk_model->getTeam();
    $this->load->view('admin/produkTambah',$data);
  }	 

  public function inputProduk()
  {
    $config['upload_path']          = './assets/produk/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 3000;
    $config['max_width']            = 5024;
    $config['max_height']           = 5068;

    $this->load->library('upload', $config);
    if( ! $this->upload->do_upload('mockup_produk'))
    {
      echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
    }
    else
    {
      $img = $this->upload->data();
      $mockup_produk = $img['file_name'];
      $id_produk= $this->input->post('id_produk', true);
      $nama_produk = $this->input->post('nama_produk', true);
      $jenis_produk = $this->input->post('jenis_produk', true);
      $harga_produk = $this->input->post('harga_produk', true);
      $deskripsi_produk = $this->input->post('deskripsi_produk', true);
      $link_demo = $this->input->post('link_demo', true);
      //$mockup_produk = $this->input->post('mockup_produk', true);
      
      $data = array(
        'id_produk'=>$id_produk,
        'nama_produk'=>$nama_produk,
        'jenis_produk' =>$jenis_produk,
        'harga_produk' => $harga_produk,
        'deskripsi_produk' => $deskripsi_produk,
        'link_demo' => $link_demo,
        'mockup_produk' => $mockup_produk
      ); 
      //$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan');
      $this->db->insert('produk', $data);
      redirect('Admin_produk');
    }
  }
  //   $this->load->library('form_validation');

  //   $this->form_validation->set_rules('nama_produk','nama produk','required');
  //   $this->form_validation->set_rules('harga_produk','harga produk','required');
  //   $this->form_validation->set_rules('jenis_produk','jenis produk','required');
  //   $this->form_validation->set_rules('deskripsi_produk','deskripsi produk','required');
  // 		  //$this->form_validation->set_rules('file_produk','file produk','required|xss_clean');
  //   //$this->form_validation->set_rules('mockup_produk','mockup produk','required');
  //   $this->form_validation->set_rules('link_demo','link demo','required');
  //   if($this->form_validation->run() == FALSE)
  //   {
  //  //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
  //   redirect('Admin_produk');
  //   }
  //   else
  //   {
  //    echo 'masuk';
  //    $nama_produk = $this->input->post('nama_produk');
  //    $harga_produk = $this->input->post('harga_produk');
  //  //$status = $this->input->post('status');
  //    $jenis_produk = $this->input->post('jenis_produk');
  //    $deskripsi_produk = $this->input->post('deskripsi_produk');
  //  //$file_produk = $this->input->post('file_produk');
  //    $mockup_produk = $this->input->post('mockup_produk');
  //    $link_demo = $this->input->post('link_demo');

  //    $produk =  array(
  //     "nama_produk"=>$nama_produk,
  //     "harga_produk"=>$harga_produk,
  //   //"status"=>$status,
  //     "jenis_produk"=>$jenis_produk,
  //     "deskripsi_produk"=>$deskripsi_produk,
  //   //"file_produk"=>$file_produk,
  //     "mockup_produk"=>$mockup_produk,
  //     "link_demo"=>$link_demo
  //   );

  //    $result = $this->admin_produk_model->insertProduk($produk);

  //   }
  
  //  redirect('Admin_produk');
  // }
}


