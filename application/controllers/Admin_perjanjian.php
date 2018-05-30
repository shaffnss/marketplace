<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_perjanjian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_perjanjian_model");
	}
 
	public function index()
	{
		$data["perjanjian"]=$this->admin_perjanjian_model->getPerjanjian();
		$this->load->view('admin/perjanjian', $data);
	}

	public function kategori(){
		$data["kategori"]=$this->admin_perjanjian_model->getKategori();
		$this->load->view('admin/kategori_perjanjian',$data);
	}

	public function inputKategori(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_kategori','nama kategori','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Admin_perjanjian/kategori_perjanjian');
		}
		else
		{
			$nama_kategori = $this->input->post('nama_kategori');

			$data =  array(
				"nama_kategori"=>$nama_kategori,
			);

			$result = $this->admin_perjanjian_model->insertKategori($data);

		}

		redirect('Admin_perjanjian/kategori');
	}

	public function ubahKategori(){
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$status = $this->input->post('status');

		$data=array(
			'nama_kategori'=>$nama_kategori,
			"status"=>$status
		);
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori_perjanjian',$data);
		redirect('Admin_perjanjian/kategori');
	}
}
