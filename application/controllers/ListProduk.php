<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('listProduk_model');
	}
 
	public function index()
	{
		$data['produks'] = $this->listProduk_model->getProduk();
		$data['kategoris'] = $this->listProduk_model->getKategori();
		
		$this->load->view('landing/produk', $data);
	}

	public function detail()
	{
		$this->load->view('landing/DetailProduk');
	}
}
