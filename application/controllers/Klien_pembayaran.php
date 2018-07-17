<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Klien_pembayaran extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("klien_pembayaran_m");
		$this->isLoggedIn();
		$this->isKlien();
	}

	public function index(){
		$id_users = $this->session->userdata('userId');
		$data["pembelian"]=$this->klien_pembayaran_m->getPembelian($id_users);
		$this->load->view('klien/pembayaran', $data);
	}
	
	public function pembayaranSelesai(){
		$id_users = $this->session->userdata('userId');
		$data["pembelian"]=$this->klien_pembayaran_m->getPembelianSelesai($id_users);
		$this->load->view('klien/pembayaran_selesai', $data);
	}

	public function invoice($id_pembelian){
		$data["invoices"]=$this->klien_pembayaran_m->getInvoice($id_pembelian);
		$data["bank"]=$this->klien_pembayaran_m->getBank();	
		$this->load->view('klien/invoice', $data);
	}

	public function pembayaran($id_pembelian){
		$data["pembayarans"]=$this->klien_pembayaran_m->getPembayaran($id_pembelian);
		$data["perjanjians"]=$this->klien_pembayaran_m->getPerjanjian();
		$this->load->view('klien/detail_pembayaran', $data);
	}

	public function unggahPembayaran(){ //unggah detail pembelian 
		$config['upload_path']          = './assets/bukti pembayaran/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
		$config['max_size']             = 5000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5024;
		$config['file_name'] 			= "bukti_pembayaran".time();

		$id_kategori = $this->input->post('nama_perjanjian');
		$id_pembelian = $this->input->post('id_pembelian');
		$keterangan_perjanjian = $this->input->post('keterangan_perjanjian');

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if( !$this->upload->do_upload('bukti_pembayaran'))
		{   
		    $this->session->set_flashdata('style','danger');
			$this->session->set_flashdata('alert','Gagal upload');
			$this->session->set_flashdata('message','Bukti pembelian gagal diunggah, silahkan cek tipe & ukuran file anda'.$this->upload->display_errors);
			$cekPerjanjian = $this->klien_pembayaran_m->cekPerjanjian($id_pembelian);

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
			redirect('Klien_pembayaran');
		}else{
			$bukti_pembayaran = $this->upload->data();

			$bukti_pembayaran = $bukti_pembayaran['file_name'];

			$cekPerjanjian = $this->klien_pembayaran_m->cekPerjanjian($id_pembelian);

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
				'bukti_pembayaran'=>$bukti_pembayaran,
			); 

			$id_pembelian = $this->klien_pembayaran_m->uploadBukti($data, $id_pembelian);
            $this->session->set_flashdata('style','success');
			$this->session->set_flashdata('alert','Berhasil');
			$this->session->set_flashdata('message','Berkas pembelian anda telah terkirim, silahkan menunggu konfirmasi dari admin');
			redirect('klien_pembayaran');
		}
	}

	public function hapusPembelian($id_pembelian) {
		$this->db->where('id_pembelian', $id_pembelian)->delete('pembelian');
		$this->session->set_flashdata('success', 'Pembelian berhasil dihapus.');
		redirect('klien_pembayaran');
	}
}
