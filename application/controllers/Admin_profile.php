<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_profile_model");
	}
 
	public function index()
	{
		$data["profile"]=$this->anggota_profile_model->getProfile();
		$data["tampilTim"]=$this->anggota_profile_model->getTeam();
		$this->load->view('admin/profile',$data);
	}

	public function ubahAnggota()
	{
		$config['upload_path']          = './assets/users/klien';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload('foto')) //jika tidak update foto 
		{	
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$status_users = $this->input->post('status_users', true);
			$posisi = $this->input->post('posisi', true);
			$anggota =  array(
				"id_roles"=>2,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users,
				"posisi"=>$posisi
			);
		}
		else //jika update foto
		{

			$img = $this->upload->data();
			$foto = $img['file_name'];
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$status_users = $this->input->post('status_users', true);
			$posisi = $this->input->post('posisi', true);
			$anggota =  array(
				"id_roles"=>2,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users,
				"foto"=> $foto,
				"posisi"=>$posisi
			);
		}
			$id_users= $this->input->post('id_users');
			$this->db->where('id_users',$id_users);
			$this->db->update('users',$anggota);
			redirect('Anggota_profile');
		}
}
