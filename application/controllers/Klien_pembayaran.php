<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Klien_pembayaran extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Klien_pembayaran_m");
		$this->isLoggedIn();
		$this->isKlien();
	}
 
	public function index(){
		$id_users = $this->session->userdata('userId');
		$data["pembelian"]=$this->Klien_pembayaran_m->getPembelian($id_users);
		$this->load->view('Klien/pembayaran', $data);
	}
	
	public function pembayaranSelesai(){
		$id_users = $this->session->userdata('userId');
		$data["pembelian"]=$this->Klien_pembayaran_m->getPembelianSelesai($id_users);
		$this->load->view('Klien/pembayaran_selesai', $data);
	}

	public function invoice($id_pembelian){
		$data["invoices"]=$this->Klien_pembayaran_m->getInvoice($id_pembelian);
		$data["bank"]=$this->Klien_pembayaran_m->getBank();	
		$this->load->view('Klien/invoice', $data);
	}

	public function pembayaran($id_pembelian){
		$data["pembayarans"]=$this->Klien_pembayaran_m->getPembayaran($id_pembelian);
		$data["perjanjians"]=$this->Klien_pembayaran_m->getPerjanjian();
		$this->load->view('Klien/detail_pembayaran', $data);
	}

	public function unggahPembayaran(){ //unggah detail pembelian 
			$config['upload_path']          = './assets/bukti pembayaran/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
			$config['max_size']             = 3000;
			$config['max_width']            = 5024;
			$config['max_height']           = 5024;
			
			$id_kategori = $this->input->post('nama_perjanjian');
			$id_pembelian = $this->input->post('id_pembelian');
			$keterangan_perjanjian = $this->input->post('keterangan_perjanjian');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if( ! $this->upload->do_upload('bukti_pembayaran'))
			{
				$cekPerjanjian = $this->Klien_pembayaran_m->cekPerjanjian($id_pembelian);
				
				if (count($cekPerjanjian) > 0) {
					//apabila perjanjian dah ada maka update kategori
					$this->db->where('id_perjanjian', $cekPerjanjian->id_perjanjian)->update('perjanjian', 
						array('id_kategori'=>$id_kategori));
				}else{
					//apabila perjanjian belum ada maka insert kategori perjanjian
					$dataPerjanjian = array(
						'id_pembelian' => $id_pembelian,
						'keterangan' => $keterangan_perjanjian,
						'id_kategori' => $id_kategori
					);
					$this->db->insert('perjanjian', $dataPerjanjian);
				}
				
				$this->session->set_flashdata('message', 'Data pembelian berhasil diubah');
				redirect('Klien_pembayaran');
			}else{
				$bukti_pembayaran = $this->upload->data();
				
				$bukti_pembayaran = $bukti_pembayaran['file_name'];
				
				$cekPerjanjian = $this->Klien_pembayaran_m->cekPerjanjian($id_pembelian);
				
				if (count($cekPerjanjian) > 0) {
					//apabila perjanjian dah ada maka update kategori
					$this->db->where('id_perjanjian', $cekPerjanjian->id_perjanjian)->update('perjanjian',
					 array('id_kategori'=>$id_kategori));
				}else{
					//apabila perjanjian belum ada maka insert kategori perjanjian
					$dataPerjanjian = array(
						'id_pembelian' => $id_pembelian,
						'keterangan' => $keterangan_perjanjian,
						'id_kategori' => $id_kategori
					);
					$this->db->insert('perjanjian', $dataPerjanjian);
				}
				
				$data = array(
					// 'id_kategori'=>$nama_perjanjian,
					'bukti_pembayaran'=>$bukti_pembayaran,
				); 

				$id_pembelian = $this->Klien_pembayaran_m->uploadBukti($data, $id_pembelian);
				
				$this->session->set_flashdata('message', 'File berhasil ditambahkan');
				redirect('Klien_pembayaran');
	}
}
}
