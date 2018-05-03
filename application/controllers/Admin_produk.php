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
		$data["produk"]=$this->admin_produk_model->getProduk();
		$this->load->view('admin/produk',$data);
	}

	public function tambahProduk()
	{
    $data["tambah_tim"]=$this->admin_produk_model->getTeam();
    $this->load->view('admin/produkTambah',$data);
  }	

  public function ubahProduk()
  {
    $data["tambah_produk"]=$this->admin_produk_model->getTeam();
    $this->load->view('admin/produkUbah',$data);
  } 

  public function inputProduk()
  {

    $this->load->library('form_validation');

    $this->form_validation->set_rules('nama_produk','nama produk','required');
    $this->form_validation->set_rules('harga_produk','harga produk','required');
    $this->form_validation->set_rules('jenis_produk','jenis produk','required');
    $this->form_validation->set_rules('deskripsi_produk','deskripsi produk','required');
  		  //$this->form_validation->set_rules('file_produk','file produk','required|xss_clean');
    //$this->form_validation->set_rules('mockup_produk','mockup produk','required');
    $this->form_validation->set_rules('link_demo','link demo','required');
    if($this->form_validation->run() == FALSE)
    {
   //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
    redirect('Admin_produk');
    }
    else
    {
     echo 'masuk';
     $nama_produk = $this->input->post('nama_produk');
     $harga_produk = $this->input->post('harga_produk');
   //$status = $this->input->post('status');
     $jenis_produk = $this->input->post('jenis_produk');
     $deskripsi_produk = $this->input->post('deskripsi_produk');
   //$file_produk = $this->input->post('file_produk');
     $mockup_produk = $this->input->post('mockup_produk');
     $link_demo = $this->input->post('link_demo');

     $produk =  array(
      "nama_produk"=>$nama_produk,
      "harga_produk"=>$harga_produk,
    //"status"=>$status,
      "jenis_produk"=>$jenis_produk,
      "deskripsi_produk"=>$deskripsi_produk,
    //"file_produk"=>$file_produk,
      "mockup_produk"=>$mockup_produk,
      "link_demo"=>$link_demo
    );

     $result = $this->admin_produk_model->insertProduk($produk);

    }
    
   redirect('Admin_produk');
  }
}


