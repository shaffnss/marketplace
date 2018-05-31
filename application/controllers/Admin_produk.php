<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_produk extends BaseController {

  function __construct()
  {
    parent::__construct();
    $this->load->model("admin_produk_model");
    $this->load->helper("form");
    $this->load->helper("url");
		$this->isLoggedIn();
  }
	
  function index()
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data['produk']=$this->admin_produk_model->getProduk();
			$data['kategori']=$this->admin_produk_model->getKategori();
			$this->load->view('admin/produk',$data);
		}
  }
  
  //fungsi untuk mengarah ke halaman produk dengan status diterima
  function produk_diterima()
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data['produk']=$this->admin_produk_model->getProdukDiterima();
			$data['kategori']=$this->admin_produk_model->getKategori();
			$this->load->view('admin/produk_diterima',$data);
		}
  }
  
  //fungsi untuk merubah status detail produk menjadi diterima
  function diterima($id_detail_produk)
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$result = $this->db->where('id_detail_produk', $id_detail_produk)
			->update('detail_produk', array('status'=>'diterima'));
			
			if ($result == TRUE) $this->session->set_flashdata('success','Produk berhasil diterima');
			else $this->session->set_flashdata('error','Produk gagal dieksekusi');
			
			redirect('Admin_produk/produk_diterima');
		}
  }
  
  //fungsi untuk mengarah ke halaman produk dengan status diterima
 function produk_ditolak()
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data['produk']=$this->admin_produk_model->getProdukDitolak();
			$data['kategori']=$this->admin_produk_model->getKategori();
			$this->load->view('admin/produk_ditolak',$data);
		}
  }
  
  //fungsi untuk merubah status detail produk menjadi ditolak
  function ditolak($id_detail_produk)
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$result = $this->db->where('id_detail_produk', $id_detail_produk)
			->update('detail_produk', array('status'=>'ditolak'));
			
			if ($result == TRUE) $this->session->set_flashdata('success','Produk berhasil ditolak');
			else $this->session->set_flashdata('error','Produk gagal dieksekusi');
			
			redirect('Admin_produk/produk_ditolak');
		}
  } 

  function tambahProduk()
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$data["tambah_tim"]=$this->admin_produk_model->getTeam();
			$data["tambah_produk"]=$this->admin_produk_model->getTeam();
			$data["kategoris"]=$this->admin_produk_model->getKategori();
			 
			$this->load->view('admin/produkTambah',$data);
		}
  }  

  function inputProduk()
  {
		if($this->isAdmin() == TRUE)
		{
			$this->loadThis();
		}
		else
		{
			$config['upload_path']          = './assets/produk/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 3000;
			$config['max_width']            = 5024;
			$config['max_height']           = 5068;

			$this->load->library('upload', $config);
			if( ! $this->upload->do_upload('foto_produk'))
			{
				echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
			}
			else
			{
				$id_users = $this->session->userdata('userId');
				$img = $this->upload->data();
				$mockup_produk = $img['file_name'];
				$nama_produk = $this->input->post('nama_produk', true);
				$kategori_produk = $this->input->post('kategori_produk', true);
				$harga_produk = $this->input->post('harga_produk', true);
				$deskripsi_produk = $this->input->post('deskripsi_produk', true);
				$link_demo = $this->input->post('link_demo', true);
				$nama_tim = $this->input->post('nama_tim', true);
				
				$data = array(
					'nama_produk'=>$nama_produk,
					'id_kategori' =>$kategori_produk,
					'harga_produk' => $harga_produk,
					'deskripsi_produk' => $deskripsi_produk,
					'link_demo' => $link_demo,
					'foto_produk' => $mockup_produk,
					'id_users' => $id_users
				); 
				$id_produk = $this->admin_produk_model->insertProduk($data);
				
				$data2 = array(
					'id_produk'=>$id_produk,
					'id_tim' =>$nama_tim
				); 
				$this->db->insert('detail_produk', $data2);
				
				$this->session->set_flashdata('message', 'Data produk berhasil ditambahkan');
				redirect('Admin_produk');
			}
		}
		
		function editProduk()
		{
			$id_produk= $this->input->post('id_produk', true);
			$status_produk = $this->input->post('status_produk', true);
			
			$data = array(
				'status'=>$status_produk
			); 
			
			$this->db->where('id_produk', $id_produk);
			$this->db->update('produk', $data);
			
			$this->session->set_flashdata('success', 'Status produk berhasil diubah');
			redirect('Admin_produk');
		}
		}
  
}


