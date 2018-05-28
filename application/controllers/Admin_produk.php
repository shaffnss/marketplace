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
  
  //fungsi untuk mengarah ke halaman produk dengan status diterima
  public function produk_diterima()
  {
    $data['produk']=$this->admin_produk_model->getProdukDiterima();
    $data['kategori']=$this->admin_produk_model->getKategori();
    $this->load->view('admin/produk_diterima',$data);
  }
  
  //fungsi untuk merubah status detail produk menjadi diterima
  public function diterima($id_detail_produk)
  {
    $result = $this->db->where('id_detail_produk', $id_detail_produk)
    ->update('detail_produk', array('status'=>'diterima'));
    
    if ($result == TRUE) $this->session->set_flashdata('success','Produk berhasil diterima');
    else $this->session->set_flashdata('error','Produk gagal dieksekusi');
    
    redirect('Admin_produk/produk_diterima');
  }
  
  //fungsi untuk mengarah ke halaman produk dengan status diterima
  public function produk_ditolak()
  {
    $data['produk']=$this->admin_produk_model->getProdukDitolak();
    $data['kategori']=$this->admin_produk_model->getKategori();
    $this->load->view('admin/produk_ditolak',$data);
  }
  
  //fungsi untuk merubah status detail produk menjadi ditolak
  public function ditolak($id_detail_produk)
  {
    $result = $this->db->where('id_detail_produk', $id_detail_produk)
    ->update('detail_produk', array('status'=>'ditolak'));
    
    if ($result == TRUE) $this->session->set_flashdata('success','Produk berhasil ditolak');
    else $this->session->set_flashdata('error','Produk gagal dieksekusi');
    
    redirect('Admin_produk/produk_ditolak');
  } 

  public function tambahProduk()
  {
    $data["tambah_tim"]=$this->admin_produk_model->getTeam();
     $data["tambah_produk"]=$this->admin_produk_model->getTeam();
     $data["kategoris"]=$this->admin_produk_model->getKategori();
		 
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


