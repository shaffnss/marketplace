<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pemesanan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_pemesanan_model");
	}
 
	public function index()
	{
		$data["konfirmasi_pemesanan"]=$this->admin_pemesanan_model->getPemesanan();
		$this->load->view('admin/pemesanan',$data);
	}

	public function pemesananDiterima()
	{
		$data["konfirmasi_pemesanan"]=$this->admin_pemesanan_model->getPemesananDiterima();
		$this->load->view('admin/pemesanan',$data);
	}

	public function pemesananDitolak()
	{
		$data["konfirmasi_pemesanan"]=$this->admin_pemesanan_model->getPemesananDitolak();
		$this->load->view('admin/pemesanan',$data);
	}
	
	public function detail_pemesanan($id_users)
	{
		$data["detail"]=$this->admin_pemesanan_model->getDetailPesan($id_users);
		$data["tim"]=$this->admin_pemesanan_model->getTeam();
		$this->load->view('admin/pemesanan_detail',$data);
	}

	public function UbahStatus()
	{
		$id_pemesanan=$this->input->post("id_pemesanan"); //
		$id_team=$this->input->post("team");
		$dataPemesanan=array(
			'status'=>'diterima',

		);

		//load model
		$pemesanan=$this->admin_pemesanan_model->updateStatus($dataPemesanan,$id_pemesanan);

		//INSERT TIM
		$dataDetail=array(
			'id_pemesanan'=>$id_pemesanan,
			'id_tim'=>$id_team
		);

		//load model
		$detail=$this->admin_pemesanan_model->insertdetail($dataDetail);

		
		redirect('admin_pemesanan');
	}

	public function UbahStatusDitolak($id_pemesanan)
	{
		
		//$id_team=$this->input->post("team");
		$dataPemesanan=array(
			'status'=>'ditolak',

		);

		//load model
		$pemesanan=$this->admin_pemesanan_model->updateStatus($dataPemesanan,$id_pemesanan);
	}
}
