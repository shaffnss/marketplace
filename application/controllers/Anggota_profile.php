<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Anggota_profile extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Anggota_profile_model");
		$this->isLoggedIn();
		$this->isAnggota();
	}
	
	public function index(){
		$id_users = $this->session->userdata('userId');
		$data["profile"]=$this->Anggota_profile_model->getProfile();
		$data["tampilTim"]=$this->Anggota_profile_model->getTeam($id_users);
		$this->load->view('anggota/profile_anggota',$data);
	}

	public function ubahAnggota(){
		$config['upload_path']          = './assets/users/anggota/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
	    $config['max_size']             = 3000;
        $config['remove_spaces']        = true;
        $config['max_width']            = 5024;
        $config['max_height']           = 5068;
        
		$this->load->library('upload', $config);
	    $this->upload->initialize($config);
		if( !$this->upload->do_upload('foto')){ //jika gagal update foto 
		   if ( $_FILES['foto']['name']){ //kalo isi tapi syarat salah
		       $this->session->set_flashdata('style','danger');
	           $this->session->set_flashdata('alert','Gagal!');
	           $this->session->set_flashdata('message','Foto profil anda gagal dirubah '.$this->upload->display_errors());
		   }else{ //karena tidak diisi
		       $this->session->set_flashdata('style','success');
	           $this->session->set_flashdata('alert','Berhasil!');
	           $this->session->set_flashdata('message','Data profil anda berhasil dirubah');
		   }
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$anggota =  array(
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"no_telpon"=>$no_telpon,
			);
		}else{ //jika update foto
		    $this->session->set_flashdata('style','success');
	        $this->session->set_flashdata('alert','Berhasil!');
	        $this->session->set_flashdata('message','Data profil anda berhasil dirubah');
	        
			$img = $this->upload->data();
			$foto = $img['file_name'];
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$anggota =  array(
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"no_telpon"=>$no_telpon,
				"foto"=> $foto
			);
			$this->session->set_userdata('foto', $foto);
			unlink('./assets/users/anggota/'.$nama_foto);
		}
		$id_users= $this->input->post('id_users');
		$this->db->where('id_users',$id_users);
		$this->db->update('users',$anggota);
		$this->session->set_userdata('name', $nama_users);
		redirect('Anggota_profile');
	}
}
