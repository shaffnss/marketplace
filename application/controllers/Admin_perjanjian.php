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
		$nama_perjanjian = $this->input->post('nama_perjanjian');

		$data = array(
			'nama_perjanjian' => $nama_perjanjian,
		);
		
		$this->Admin_perjanjian_model->insertKategori($data);
		$this->session->set_flashdata('success', 'Berhasil! Jenis kategori berhasil ditambah.');
		redirect('Admin_perjanjian/kategori');
	}

	public function hapusPerjanjian($id_kategori) {
		$this->db->where('id_kategori', $id_kategori)->delete('kategori_perjanjian');
		$this->session->set_flashdata('success', 'Data jenis kategori berhasil dihapus.');
		redirect('Admin_perjanjian/kategori');
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
		$this->session->set_flashdata('success', 'Berhasil! Data jenis kategori berhasil diubah.');
		redirect('Admin_perjanjian/kategori');
	}

	public function unggahPerjanjian(){ //fungsi unggah perjanjian
		$config['upload_path']          = './assets/file_perjanjian/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5024;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if( ! $this->upload->do_upload('file_perjanjian'))
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}else{
			$file_perjanjian = $this->upload->data();
			$id_pembelian = $this->input->post('id_pembelian', true);
			$file_perjanjian = $file_perjanjian['file_name'];

			$data = array(
				'id_pembelian'=>$id_pembelian,
				'file_perjanjian'=>$file_perjanjian,
			); 

			$id_perjanjian = $this->Admin_perjanjian_model->insertPerjanjian($data, $id_pembelian);

			$this->session->set_flashdata('success', 'File berhasil ditambahkan');
		}
		redirect('Admin_perjanjian');
	}

}
