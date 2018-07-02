<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_kategori_produk extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_kategoriProduk_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}

	public function index()
	{
		$data["kategori"]=$this->admin_kategoriProduk_model->getKategori();
		$this->load->view('admin/kategori_produk',$data);
	}

	public function inputKategori()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kategori','nama kategori','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Admin_produk/kategori_produk');
		}
		else
		{
			$nama_kategori = $this->input->post('nama_kategori');

			$data =  array(
				"nama_kategori"=>$nama_kategori,
			);

			$result = $this->admin_kategoriProduk_model->insertKategori($data);

		}

		redirect('Admin_kategori_produk');
	}

	public function ubahKategori(){
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$status_kategori = $this->input->post('status_kategori');

		$data=array(
			'nama_kategori'=>$nama_kategori,
			"status_kategori"=>$status_kategori
		);
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori_produk',$data);
		redirect('Admin_kategori_produk');
	}
}