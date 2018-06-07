<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Anggota_profile_model");
	}
 
	public function index()
	{
		$id_users = $this->session->userdata('userId');
		$data["profile"]=$this->Anggota_profile_model->getProfile();
		$data["tampilTim"]=$this->Anggota_profile_model->getTeam($id_users);
		
		$this->load->view('anggota/profile_anggota',$data);
	}

	public function ubahAnggota()
	{
		$config['upload_path']          = './assets/users/anggota';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 300;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload('foto')) //jika tidak update foto 
		{	
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$anggota =  array(
				"id_roles"=>3,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email
			);
		}
		else //jika update foto
		{

			$img = $this->upload->data();
			$foto = $img['file_name'];
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$anggota =  array(
				"id_roles"=>3,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"foto"=> $foto
			);
		}
			$id_users = $this->session->userdata('userId');
			$this->db->where('id_users',$id_users);
			$this->db->update('users',$anggota);
			redirect('Anggota_profile');
		}
}
