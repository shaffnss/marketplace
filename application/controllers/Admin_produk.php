<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_produk_model");
		$this->load->helper("form");
		$this->load->helper("url");
	}

	public function index()
	{
		$data['produk']=$this->admin_produk_model->getProduk();
		$data['kategori']=$this->admin_produk_model->getKategori();
		$this->load->view('admin/produk',$data);
	}

	public function tambahProduk()
	{
    $data["tambah_tim"]=$this->admin_produk_model->getTeam();
     $data["tambah_produk"]=$this->admin_produk_model->getTeam();
    $this->load->view('admin/produkTambah',$data);
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
        'link_demo' => $link_demo,
        'mockup_produk' => $mockup_produk
      ); 
      //$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan');
      $this->db->insert('produk', $data);
      redirect('Admin_produk');
    }
  }
  
}


