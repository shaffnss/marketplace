<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("klien_pembayaran_m");
	}
 
	public function index()
	{
		$data["pembelian"]=$this->klien_pembayaran_m->getPembelian();
		$data["perjanjians"]=$this->klien_pembayaran_m->getPerjanjian();
		$this->load->view('Klien/pembayaran', $data);
	}


	public function unggahPembayaran(){
			$config['upload_path']          = './assets/bukti pembayaran/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']             = 3000;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('bukti_pembayaran'))
			{
				echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
			}else{
				$bukti_pembayaran = $this->upload->data();
				// $nama_perjanjian =$this->input->post('nama_perjanjian', true);
				$bukti_pembayaran = $bukti_pembayaran['file_name'];

				$data = array(
					// 'id_kategori'=>$nama_perjanjian,
					'bukti_pembayaran'=>$bukti_pembayaran,
				); 

				$id_pembelian = $this->klien_pembayaran_m->insertBukti($data);
				
				$this->session->set_flashdata('message', 'File berhasil ditambahkan');
				redirect('Klien_pembayaran');
	}
}
}
