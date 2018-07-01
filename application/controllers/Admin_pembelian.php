<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_pembelian extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_pembelian_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}
 
	public function index()
	{
		$data["pembelian"]=$this->Admin_pembelian_model->getPembelian();
		$this->load->view('admin/pembelian',$data);
	}
	

	public function ubahStatus($id_pembelian) 
	{
		$data = array(
			'status_pembelian' => 'selesai'
			// 'id_pemesanan' => 'id_pemesanan'
		);
		$this->Admin_pembelian_model->ubahStatus($id_pembelian,$data);

		redirect('Admin_perjanjian');
	}

	public function pembelianSelesai()
	{
		$data["pembelian"]=$this->Admin_pembelian_model->getPembelianSelesai();
		$this->load->view('admin/pembelian_selesai',$data);
	}
}
