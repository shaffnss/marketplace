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
		$config['max_size']             = 2000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5024;
		$config['file_name'] 			= "produk".time();
        
        $error = '';
        
		$this->load->library('upload', $config);
		if( !$this->upload->do_upload('foto_produk'))
		{
			$this->session->set_flashdata('style','danger');
			$this->session->set_flashdata('alert','Gagal upload');
			$this->session->set_flashdata('message','Foto produk gagal diunggah, silahkan cek tipe & ukuran file anda');
           redirect('Anggota_uploadProduk/tambah_uploadProduk');
		}else{
		    $config['upload_path']          = './assets/file_produk/';
			$config['allowed_types']        = 'zip';
			$config['max_size']             = 7000;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if( ! $this->upload->do_upload('file_produk')){
				$this->session->set_flashdata('style','danger');
        		$this->session->set_flashdata('alert','Gagal upload');
        		$this->session->set_flashdata('message','File Produk gagal diunggah, silahkan cek tipe & ukuran file anda');
                redirect('Anggota_uploadProduk/tambah_uploadProduk');
			}else{
				$file_produk = $this->upload->data();
				$data['file_produk'] = $file_produk['file_name'];
			}
			$img = $this->upload->data();
			$foto_produk = $img['file_name'];
			$nama_produk = $this->input->post('nama_produk', true);
			$jenis_produk = $this->input->post('jenis_produk', true);
			$harga_produk = $this->input->post('harga_produk', true);
			$deskripsi_produk = $this->input->post('deskripsi_produk', true);
			$link_demo = $this->input->post('link_demo', true);
			$id_user = $this->session->userdata('userId');
			$id_team = $this->input->post('nama_tim');
			$get_kode = $this->db->where('id_kategori', $jenis_produk)->get('kategori_produk')->row(); //create kode pembelian
			$randomstring = random_string('alpha', 4); 
	
			$data = array(
				'nama_produk'=>$nama_produk,
				'id_kategori' =>$jenis_produk,
				'harga_produk' => $harga_produk,
				'deskripsi_produk' => $deskripsi_produk,
				'link_demo'	=> $link_demo,
				'foto_produk' => $foto_produk,
				'id_users' => $id_user,
				'kode_produk'=>$get_kode->kode_jenis."-".$randomstring
			); 
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
		    $this->session->set_flashdata('style','success');
		    $this->session->set_flashdata('alert','Berhasil!');
		    $this->session->set_flashdata('message','Data produk berhasil ditambahkan');
			redirect('Anggota_uploadProduk');
		}
	}

	public function ubahProduk(){
		$config['upload_path']          = './assets/produk/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);
		$error = '';

		$id_produk= $this->input->post('id_produk', true);
		$nama_produk = $this->input->post('nama_produk', true);
		$jenis_produk = $this->input->post('jenis_produk', true);
		$harga_produk = $this->input->post('harga_produk', true);
		$deskripsi_produk = $this->input->post('deskripsi_produk', true);
		$link_demo = $this->input->post('link_demo', true);
		$foto_produk = $this->input->post('foto_produk', true);
		$file_produk = $this->input->post('file_produk', true);

		if( !$this->upload->do_upload('foto_produk')){
		    if ( $_FILES['foto_produk']['name']){ //kalo upload foto produk tapi syarat salah
		        $error.= 'Foto Produk gagal diunggah, silahkan cek tipe & ukuran file anda';
		        
		   }
		   
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
		
		if(!$this->upload->do_upload('file_produk')){
			$errorp = 1; //pengecekan apabila file produk tidak diupload
			if ( $_FILES['file_produk']['name']){ //kalo upload file produk tapi syarat salah
		       $error.= 'File Produk gagal diunggah, silahkan cek tipe & ukuran file anda';
		   }
		   
		}else{ //kalo upload file dan syarat terpenuhi
			unlink('./assets/file_produk/'.$file_produk); //hapus file yang lama
			$errorp = 0; 
			
	        
			$file_produk = $this->upload->data();
			$data['file_produk'] = $file_produk['file_name'];
		}
		
		if($error){
		    $this->session->set_flashdata('style','success');
	        $this->session->set_flashdata('alert','Berhasil!');
	        $this->session->set_flashdata('message','Data produk berhasil dirubah, namun '.$error);
		}else{
		    $this->session->set_flashdata('style','success');
	        $this->session->set_flashdata('alert','Berhasil!');
	        $this->session->set_flashdata('message','Data produk berhasil dirubah');
		}
		
		$this->db->where('id_produk',$id_produk); //yg di update menjadi sesuai dengan id_produk
		$this->db->update('produk', $data);
		redirect('Anggota_uploadProduk');
	} 

	public function delete_upload($id_produk){
		$this->Anggota_uploadProduk_model->deleteUpload($id_produk);
		redirect('Anggota_uploadProduk');
	}	
}

