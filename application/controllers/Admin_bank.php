<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_bank extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_bank_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}
 
	public function index(){ //menampilkan view bank
		$data["bank"]=$this->Admin_bank_model->getBank();
		$this->load->view('admin/bank',$data);
	}
	
	public function tambahBank() {
		$nama_bank = $this->input->post('nama_bank');
		$no_rekening = $this->input->post('no_rekening');
		$nama_pemilik = $this->input->post('nama_pemilik');
		
		$data = array(
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'nama_pemilik' => $nama_pemilik
		);
		
		$this->Admin_bank_model->tambahBank($data);
		$this->session->set_flashdata('success', 'Berhasil! Bank berhasil ditambahkan.');
		redirect('Admin_bank');
	}
	
	public function ubahBank() {
		$nama_bank = $this->input->post('nama_bank');
		$no_rekening = $this->input->post('no_rekening');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$id_bank = $this->input->post('id_bank');
		
		$data = array(
			'nama_bank' => $nama_bank,
			'no_rekening' => $no_rekening,
			'nama_pemilik' => $nama_pemilik
		);
		
		$this->Admin_bank_model->editBank($data, $id_bank);
		
		$this->session->set_flashdata('success', 'Berhasil! Bank berhasil diubah.');
		
		redirect('Admin_bank');
	}
	
	public function hapusBank($id_bank) {
		
		$this->db->where('id_bank', $id_bank)->delete('bank');
		
		$this->session->set_flashdata('success', 'Berhasil! Bank berhasil didelete.');
		
		redirect('Admin_bank');
	}
}
