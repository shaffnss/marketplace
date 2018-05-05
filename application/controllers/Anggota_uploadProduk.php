<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_uploadProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("anggota_uploadProduk_model");
		$this->load->helper("form");
		$this->load->helper("url");
	}

	public function index()
	{
		$data['upload']=$this->anggota_uploadProduk_model->getUpload();
		$this->load->view('anggota/uploadProduk',$data);		
	}

	public function tambah_uploadProduk()
	{
		$data['id_team']=$this->anggota_uploadProduk_model->getTeam(51);
		$this->load->view('anggota/tambah_upload',$data);
	}

	public function ubahProduk()
	{
		$config['upload_path']          = './assets/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('mockup_produk'))
		{
			echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
		}
		else
		{
			$img = $this->upload->data();
			$mockup_produk = $img['file_name'];
			$id_produk= $this->input->post('id_produk', true);
			$nama_produk = $this->input->post('nama_produk', true);
			$jenis_produk = $this->input->post('jenis_produk', true);
			$harga_produk = $this->input->post('harga_produk', true);
			$deskripsi_produk = $this->input->post('deskripsi_produk', true);
			$link_demo = $this->input->post('link_demo', true);
			//$mockup_produk = $this->input->post('mockup_produk', true);
			
			$data = array(
				
				'nama_produk'=>$nama_produk,
				'jenis_produk' =>$jenis_produk,
				'harga_produk' => $harga_produk,
				'deskripsi_produk' => $deskripsi_produk,
				'link_demo'	=> $link_demo,
				'mockup_produk' => $mockup_produk
			); 
			//$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan');
			$this->db->where('id_produk',$id_produk); //yg di update menjadi sesuai dengan id_produk
			$this->db->update('produk', $data);
			redirect('Anggota_uploadProduk');
		}
	} 	

	public function inputProduk()
	{
		$config['upload_path']          = './assets/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('mockup_produk'))
		{
			echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
		}
		else
		{
			$img = $this->upload->data();
			$mockup_produk = $img['file_name'];
			$id_produk= $this->input->post('id_produk', true);
			$nama_produk = $this->input->post('nama_produk', true);
			$jenis_produk = $this->input->post('jenis_produk', true);
			$harga_produk = $this->input->post('harga_produk', true);
			$deskripsi_produk = $this->input->post('deskripsi_produk', true);
			$link_demo = $this->input->post('link_demo', true);
			//$mockup_produk = $this->input->post('mockup_produk', true);
			
			$data = array(
				'id_produk'=>$id_produk,
				'nama_produk'=>$nama_produk,
				'jenis_produk' =>$jenis_produk,
				'harga_produk' => $harga_produk,
				'deskripsi_produk' => $deskripsi_produk,
				'link_demo'	=> $link_demo,
				'mockup_produk' => $mockup_produk
			); 
			//$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan');
			$this->db->insert('produk', $data);
			redirect('Anggota_uploadProduk');
		}
	}

}
