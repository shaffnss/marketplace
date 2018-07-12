<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Anggota_uploadProduk extends BaseController {

	function __construct(){
		parent::__construct();
		$this->load->model("Anggota_uploadProduk_model");
		$this->load->helper("form");
		$this->load->helper("url");
		$this->isLoggedIn();
		$this->isAnggota();
	}

	public function index(){
		$id_user = $this->session->userdata('userId'); //manggil session id yg sedang login
		$data['upload']=$this->Anggota_uploadProduk_model->getUpload($id_user);
		$data["kategoris"]=$this->Anggota_uploadProduk_model->getKategori();
		$this->load->view('anggota/uploadProduk',$data);		
	}

	public function tambah_uploadProduk(){
		$id_users = $this->session->userdata('userId');
		$data['id_team']=$this->Anggota_uploadProduk_model->getTeam($id_users);
		$data['kategoris']=$this->Anggota_uploadProduk_model->getKategori();
		$this->load->view('anggota/tambah_upload',$data);
	}

	public function inputProduk(){
		$config['upload_path']          = './assets/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 9000;
		$config['max_width']            = 20000;
		$config['max_height']           = 20000;
		$config['file_name'] = "produk".time();

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('foto_produk'))
		{
			$this->session->set_flashdata('style','danger');
			$this->session->set_flashdata('alert','Gagal upload');
			$this->session->set_flashdata('message','resolusi atau ukuran foto melebihi batas!');

			redirect('Anggota_uploadProduk/tambah_uploadProduk');
		}else{
			$img = $this->upload->data();
			$foto_produk = $img['file_name'];
			$nama_produk = $this->input->post('nama_produk', true);
			$jenis_produk = $this->input->post('jenis_produk', true);
			$harga_produk = $this->input->post('harga_produk', true);
			$deskripsi_produk = $this->input->post('deskripsi_produk', true);
			$link_demo = $this->input->post('link_demo', true);
			$id_user = $this->session->userdata('userId');
			$id_team = $this->input->post('nama_tim');
			// var_dump("lele");exit;
			$data = array(
				'nama_produk'=>$nama_produk,
				'id_kategori' =>$jenis_produk,
				'harga_produk' => $harga_produk,
				'deskripsi_produk' => $deskripsi_produk,
				'link_demo'	=> $link_demo,
				'foto_produk' => $foto_produk,
				'id_users' => $id_user
			); 
			
			$config['upload_path']          = './assets/file_produk/';
			$config['allowed_types']        = 'zip|rar';
			$config['max_size']             = 7000;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if( ! $this->upload->do_upload('file_produk')){
				$errorp = 1;
				var_dump($this->upload->display_errors());
			exit;
			}else{
				$errorp = 0;
				$file_produk = $this->upload->data();
				$data['file_produk'] = $file_produk['file_name'];
			}
			
			$this->db->trans_start();
			$this->db->insert('produk', $data);
			$id_produk = $this->db->insert_id();
			$this->db->trans_complete();
			
			$status_tim = $this->input->post('status_tim');
			if ($status_tim == 'individu') {
				$checkTim = $this->Anggota_uploadProduk_model->checkTim($id_user);
				$data2 = array(
					'id_produk'=>$id_produk,
					'id_tim'=>$checkTim->id_tim,
					'status'=>'proses'
				);
				$this->db->insert('detail_produk', $data2);
				
			}else{
				$data2 = array(
					'id_produk'=>$id_produk,
					'id_tim'=>$id_team,
				);
				$this->db->insert('detail_produk', $data2);
			}
			
			if($errorp){
				$this->session->set_flashdata('message', 'Data produk berhasil ditambahkan, namun file produk gagal di upload');
			}else{
				$this->session->set_flashdata('message', 'Data produk berhasil ditambahkan');
			}
			redirect('Anggota_uploadProduk');
		}
	}

	public function ubahProduk()
	{
		$config['upload_path']          = './assets/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);

		$id_produk= $this->input->post('id_produk', true);
		$nama_produk = $this->input->post('nama_produk', true);
		$jenis_produk = $this->input->post('jenis_produk', true);
		$harga_produk = $this->input->post('harga_produk', true);
		$deskripsi_produk = $this->input->post('deskripsi_produk', true);
		$link_demo = $this->input->post('link_demo', true);
		$foto_produk = $this->input->post('foto_produk', true);
		$file_produk = $this->input->post('file_produk', true);

		if( ! $this->upload->do_upload('foto_produk'))
		{
			$data = array(
				
				'nama_produk'=>$nama_produk,
				'id_kategori' =>$jenis_produk,
				'harga_produk' => $harga_produk,
				'deskripsi_produk' => $deskripsi_produk,
				'link_demo'	=> $link_demo
			);
		}else{
			unlink('./assets/produk/'.$foto_produk); //hapus file yang lama
			$img = $this->upload->data();
			$foto_produk = $img['file_name'];
			$data = array(
				'nama_produk'=>$nama_produk,
				'id_kategori' =>$jenis_produk,
				'harga_produk' => $harga_produk,
				'deskripsi_produk' => $deskripsi_produk,
				'link_demo'	=> $link_demo,
				'foto_produk' => $foto_produk
			);
		}

		$config['upload_path']          = './assets/file_produk/';
		$config['allowed_types']        = 'zip';
		$config['max_size']             = 7000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if( ! $this->upload->do_upload('file_produk'))
		{
			$errorp = 1;
		}
		else
		{
			unlink('./assets/file_produk/'.$file_produk); //hapus file yang lama
			$errorp = 0;
			$file_produk = $this->upload->data();
			$data['file_produk'] = $file_produk['file_name'];
		}
		
		$this->db->where('id_produk',$id_produk); //yg di update menjadi sesuai dengan id_produk
		$this->db->update('produk', $data);

		if($errorp){
			$this->session->set_flashdata('message', 'Data produk berhasil diubah, namun file produk tidak di upload');
		}else{
			$this->session->set_flashdata('message', 'Data produk berhasil diubah');
		}
		
		redirect('Anggota_uploadProduk');
	} 

	public function delete_upload($id_produk){
		$this->Anggota_uploadProduk_model->deleteUpload($id_produk);
		redirect('Anggota_uploadProduk');
	}	

	

}

