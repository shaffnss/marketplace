<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_perjanjian extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_perjanjian_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}
 
	public function index()
	{
		$data["perjanjian"]=$this->Admin_perjanjian_model->getPerjanjian();
		$this->load->view('admin/perjanjian', $data);
	}

	public function kategori(){
		$data["kategori"]=$this->Admin_perjanjian_model->getKategori();
		$this->load->view('admin/kategori_perjanjian',$data);
	}

	public function inputKategori(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_perjanjian','nama perjanjian','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Admin_perjanjian/kategori_perjanjian');
		}
		else
		{
			$nama_perjanjian = $this->input->post('nama_perjanjian');

			$data =  array(
				"nama_perjanjian"=>$nama_perjanjian,
			);

			$result = $this->Admin_perjanjian_model->insertKategori($data);

		}

		redirect('Admin_perjanjian/kategori');
	}

	public function unggahPerjanjian(){
			$config['upload_path']          = './assets/file_perjanjian/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 5000;
			$config['max_width']            = 5024;
			$config['max_height']           = 5024;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('file_perjanjian'))
			{
				$this->session->set_flashdata('message', 'Gagal upload, resolusi atau ukuran foto melebihi batas!');
			}else{
				$file_perjanjian = $this->upload->data();
				$id_pembelian = $this->input->post('id_pembelian', true);
				$file_perjanjian = $file_perjanjian['file_name'];

				$data = array(
					'id_pembelian'=>$id_pembelian,
					'file_perjanjian'=>$file_perjanjian,
				); 

				$id_perjanjian = $this->Admin_perjanjian_model->insertPerjanjian($data);
				
				$this->session->set_flashdata('message', 'File berhasil ditambahkan');
	}
	redirect('Admin_perjanjian');
}

	public function ubahKategori(){
		$id_kategori = $this->input->post('id_kategori');
		$nama_perjanjian = $this->input->post('nama_perjanjian');
		$status = $this->input->post('status');

		$data=array(
			'nama_perjanjian'=>$nama_perjanjian,
			"status"=>$status
		);
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori_perjanjian',$data);
		redirect('Admin_perjanjian/kategori');
	}
}
