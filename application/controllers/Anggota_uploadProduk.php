<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_uploadProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Anggota_uploadProduk_model");
	}

	public function index()
	{
		$data["upload"]=$this->admin_uploadProduk_model->getUpload();
		$this->load->view('anggota/uploadProduk',$data);
	}

	public function inputProduk()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_produk','nama produk','required');
		$this->form_validation->set_rules('jenis_produk','jenis produk','required');
		$this->form_validation->set_rules('harga_produk','harga produk','required');
		$this->form_validation->set_rules('deskripsi_produk','deskripsi produk','required');
		$this->form_validation->set_rules('link_demo','link demo','required');
  		  //$this->form_validation->set_rules('file_produk','file produk','required|xss_clean');
    //$this->form_validation->set_rules('mockup_produk','mockup produk','required');
		if($this->form_validation->run() == FALSE)
		{
   //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
			redirect('Anggota_uploadProduk');
		}
		else
		{
			echo 'masuk';
			$nama_produk = $this->input->post('nama_produk');
			$jenis_produk = $this->input->post('jenis_produk');
			$harga_produk = $this->input->post('harga_produk');
   //$status = $this->input->post('status');
			$deskripsi_produk = $this->input->post('deskripsi_produk');
   //$file_produk = $this->input->post('file_produk');
			$link_demo = $this->input->post('link_demo');
			$mockup_produk = $this->input->post('mockup_produk');

			$produk =  array(
				"nama_produk"=>$nama_produk,
    //"status"=>$status,
				"jenis_produk"=>$jenis_produk,
				"harga_produk"=>$harga_produk,
				"deskripsi_produk"=>$deskripsi_produk,
    //"file_produk"=>$file_produk,
				"link_demo"=>$link_demo,
				"mockup_produk"=>$mockup_produk
			);

			$result = $this->admin_uploadProduk_model->insertProduk($produk);

		}

		redirect('Admin_uploadProduk');
	}

}
