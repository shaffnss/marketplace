<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pengelola extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_pengelola_model");
	}

	public function index()
	{
		$data["pengelola"]=$this->admin_pengelola_model->getPengelola();
		$this->load->view('admin/pengguna_pengelola',$data);

	}

	public function tambah_pengelola()
	{
		$data["error_upload"] = "";
		$this->load->view('admin/pengguna_pengelola_tambah');
	}

	public function inputPengelola()
	{
		$config['upload_path']          = './assets/users/pengelola';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 300;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('foto'))
		{
			$data_error['error_upload'] = $this->upload->display_errors();
			// echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
			$this->load->view('admin/pengguna_pengelola_tambah',$data_error);
		}
		else
		{
			$img = $this->upload->data();
			$foto = $img['file_name'];
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			$data =  array(
				"id_roles"=>1,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"posisi"=>"pengelola",
				"email"=>$email,
				'foto'=>$foto,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$this->db->insert('users', $data);
			redirect('Admin_pengelola');
		}
	}

		public function ubahPengelola()
		{
			$config['upload_path']          = './assets/users/pengelola';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 300;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

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

			$pengelola =  array(
				"id_roles"=>1,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users
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
			//$password = $this->input->post('password', true);
			$status_users = $this->input->post('status_users', true);

			$pengelola =  array(
				"id_roles"=>1,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users,
				"foto"=> $foto
			);
		}
		$id_users= $this->input->post('id_users');
		$this->db->where('id_users',$id_users);
		$this->db->update('users',$pengelola);
		redirect('Admin_pengelola');
	}
}