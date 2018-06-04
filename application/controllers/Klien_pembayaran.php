<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Klien_pembayaran extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("klien_pembayaran_m");
		$this->isLoggedIn();
	}
 
	public function index()
	{
		if($this->session->userdata('id_produk')) {	
			$id_produk = $this->session->userdata('id_produk');
			if($id_produk['id_roles'] == 2) {				
				$data = array(
					'tgl_pembelian'=>date('Y-m-d'),
					'id_users'=>$this->session->userdata('userId'),
					'status_pembelian'=>'proses',
				);
				
				$id_pembelian = $this->klien_pembayaran_m->insertKeranjang($data);
				$this->db->insert('detail_pembelian', array('id_pembelian'=>$id_pembelian, 'id_produk'=>$id_produk['id_produk']));
			}
			$this->session->unset_userdata('id_produk');
		}
		
		$id_users = $this->session->userdata('userId');
		$data["pembelian"]=$this->klien_pembayaran_m->getPembelian($id_users);
		$data["perjanjians"]=$this->klien_pembayaran_m->getPerjanjian();
		$this->load->view('Klien/pembayaran', $data);
	}


	public function unggahPembayaran(){
			$config['upload_path']          = './assets/bukti pembayaran/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']             = 3000;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;
			
			$id_kategori = $this->input->post('nama_perjanjian');
			$id_pembelian = $this->input->post('id_pembelian');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('bukti_pembayaran'))
			{
				$cekPerjanjian = $this->klien_pembayaran_m->cekPerjanjian($id_pembelian);
				
				if (count($cekPerjanjian) > 0) {
					//apabila perjanjian dah ada maka update kategori
					$this->db->where('id_perjanjian', $cekPerjanjian->id_perjanjian)->update('perjanjian', array('id_kategori'=>$id_kategori));
				}else{
					//apabila perjanjian belum ada maka insert kategori perjanjian
					$dataPerjanjian = array(
						'id_pembelian' => $id_pembelian,
						'id_kategori' => $id_kategori
					);
					$this->db->insert('perjanjian', $dataPerjanjian);
				}
				
				$this->session->set_flashdata('message', 'Data pembelian berhasil diubah');
				redirect('Klien_pembayaran');
			}else{
				$bukti_pembayaran = $this->upload->data();
				// $nama_perjanjian =$this->input->post('nama_perjanjian', true);
				$bukti_pembayaran = $bukti_pembayaran['file_name'];
				
				$cekPerjanjian = $this->klien_pembayaran_m->cekPerjanjian($id_pembelian);
				
				if (count($cekPerjanjian) > 0) {
					//apabila perjanjian dah ada maka update kategori
					$this->db->where('id_perjanjian', $cekPerjanjian->id_perjanjian)->update('perjanjian', array('id_kategori'=>$id_kategori));
				}else{
					//apabila perjanjian belum ada maka insert kategori perjanjian
					$dataPerjanjian = array(
						'id_pembelian' => $id_pembelian,
						'id_kategori' => $id_kategori
					);
					$this->db->insert('perjanjian', $dataPerjanjian);
				}
				
				$data = array(
					// 'id_kategori'=>$nama_perjanjian,
					'bukti_pembayaran'=>$bukti_pembayaran,
				); 
				
				$this->klien_pembayaran_m->insertBukti($data, $id_pembelian);
				
				$this->session->set_flashdata('message', 'File berhasil ditambahkan');
				redirect('Klien_pembayaran');
	}
}
}
