<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. '/libraries/BaseController.php';

class Admin_dashboard extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->IsLoggedIn();
		$this->load->model("admin_produk_model");
		$this->load->model("admin_pembelian_model");
		$this->load->model("admin_klien_model");
		
	}
 
	public function index()
	{
		$data['produk']=$this->admin_produk_model->getProduk();
		$data["pembelian"]=$this->admin_pembelian_model->getPembelian();
		$data['produkDiterima']=$this->admin_produk_model->getProdukDiterima();
		$data["klien"]=$this->admin_klien_model->getKlien();
		$data["dashboards"]=$this->admin_pembelian_model->getPembelian();
		$data["produks"]=$this->admin_produk_model->getProduk();
		$this->load->view('admin/dashboard', $data);
	}
}
