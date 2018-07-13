<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_kategori_produk extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_kategoriProduk_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}

	public function index(){ //menampilkan data kategori
		$data["kategori"]=$this->admin_kategoriProduk_model->getKategori();
		$this->load->view('admin/kategori_produk',$data);
	}

	public function inputKategori(){ //menambah kategori
		$nama_kategori = $this->input->post('nama_kategori');
		$kode_jenis = $this->input->post('kode_jenis');
		
		$data = array(
			'nama_kategori' => $nama_kategori,
			'kode_jenis' => $kode_jenis,
		);
		
		$this->admin_kategoriProduk_model->insertKategori($data);
		$this->session->set_flashdata('success', 'Berhasil! Kategori produk berhasil ditambahkan.');
		redirect('Admin_kategori_produk');
	}

	public function ubahKategori(){ //mengubah kategori
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$kode_jenis = $this->input->post('kode_jenis');
		$status_kategori = $this->input->post('status_kategori');

		$data=array(
			'nama_kategori'=>$nama_kategori,
			"status_kategori"=>$status_kategori,
			'kode_jenis'=>$kode_jenis
		);
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori_produk',$data);
		$this->session->set_flashdata('success', 'Berhasil! Kategori produk berhasil diubah.');
		redirect('Admin_kategori_produk');
	}

	public function hapusKategori($id_kategori) {
		$this->db->where('id_kategori', $id_kategori)->delete('kategori_produk');
		$this->session->set_flashdata('success', 'Data kategori produk berhasil dihapus.');
		redirect('Admin_kategori_produk');
	}
}