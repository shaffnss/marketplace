<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pembelian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_pembelian_model");
	}
 
	public function index()
	{
		$data["pembelian"]=$this->admin_pembelian_model->getPembelian();
		$this->load->view('admin/pembelian',$data);
	}


	public function ubahStatus($id_pembelian) 
	{
		$data = array(
			'status_pembelian' => 'selesai'
			// 'id_pemesanan' => 'id_pemesanan'
		);
		$this->admin_pembelian_model->ubahStatus($id_pembelian,$data);

		redirect('Admin_pembelian/index');
	}

	public function pembelianSelesai()
	{
		$data["pembelian"]=$this->admin_pembelian_model->getPembelianSelesai();
		$this->load->view('admin/pembelian',$data);
	}
}
