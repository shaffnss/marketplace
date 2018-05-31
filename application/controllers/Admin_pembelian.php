<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_pembelian extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_pembelian_model");
		$this->isLoggedIn();
	}
 
	public function index()
	{
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data["pembelian"]=$this->admin_pembelian_model->getPembelian();
			$this->load->view('admin/pembelian',$data);
		}
	}
	
	public function pembelian_selesai()
	{
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data["pembelian"]=$this->admin_pembelian_model->getPembelianSelesai();
			$this->load->view('admin/pembelian_selesai',$data);
		}
	}


	public function ubahStatus($id_pembelian) 
	{
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data = array(
				'status_pembelian' => 'selesai'
				// 'id_pemesanan' => 'id_pemesanan'
			);
			$this->admin_pembelian_model->ubahStatus($id_pembelian,$data);

			redirect('Admin_pembelian/pembelian_selesai');
		}
	}

	public function pembelianSelesai()
	{
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data["pembelian"]=$this->admin_pembelian_model->getPembelianSelesai();
			$this->load->view('admin/pembelian',$data);
		}
	}
}
