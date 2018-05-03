<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_transaksi_pemesanan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_transaksi_pemesanan_model");
	}
 
	public function index() //nampilin data dari db ke view
	{
		$data["bayar_pemesanan"]=$this->admin_transaksi_pemesanan_model->getTransaksiPemesanan();
		$this->load->view('admin/transaksi_pemesanan',$data);
	}

	public function ubahStatus($id_pemesanan) //parameter id_pemesanan buat 
	{

		$data = array(
			'status_pembayaran' => 'selesai',
			// 'id_pemesanan' => 'id_pemesanan'
		);
		$this->admin_transaksi_pemesanan_model->ubahStatus($id_pemesanan, $data);

		redirect('Admin_transaksi_pemesanan/index');
	}

	public function statusProses()
	{
		$data["bayar_pemesanan"]=$this->admin_transaksi_pemesanan_model->getStatusProses();
		$this->load->view('admin/transaksi_pemesanan',$data);
	}

	public function statusSelesai()
	{
		$data["bayar_pemesanan"]=$this->admin_transaksi_pemesanan_model->getStatusSelesai();
		$this->load->view('admin/transaksi_pemesanan',$data);
	}
}
