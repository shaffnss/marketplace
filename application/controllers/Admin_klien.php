<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_klien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_klien_model");
	}

	public function index()
	{
		$data["klien"]=$this->admin_klien_model->getKlien();
		$this->load->view('admin/pengguna_klien',$data);

	}

	public function tambah_klien()
	{
		$this->load->view('admin/pengguna_klien_tambah');
	}

	public function inputKlien()
	{

		$config['upload_path']          = './assets/users/klien';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('foto'))
		{
			echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
		}
		else
		{
			$img = $this->upload->data();
			$foto = $img['file_name'];
			$nama_klien = $this->input->post('nama_klien', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			$klien =  array(
				"id_roles"=>2,
				"nama_users"=>$nama_klien,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"posisi"=>"klien",
				"email"=>$email,
				'foto'=>$foto,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$this->db->insert('users', $data);
			redirect('Admin_klien');
		}
	}

	public function ubahKlien()
	{
		$config['upload_path']          = './assets/users/klien';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5068;

		$this->load->library('upload', $config);

		$img = $this->upload->data();
		$foto = $img['file_name'];
		$nama_klien = $this->input->post('nama_klien', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$instansi = $this->input->post('instansi', true);
		$no_telpon = $this->input->post('no_telpon', true);
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);


		if( ! $this->upload->do_upload('foto'))
		{

			$klien =  array(
				"id_roles"=>2,
				"nama_users"=>$nama_klien,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users
			);
			$this->db->where('id_users',$id_users);
			$this->db->update('users',$klien);
			redirect('Admin_klien');
		}
		else
		{

			$klien =  array(
				"id_roles"=>2,
				"nama_users"=>$nama_klien,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users
			);

			$this->db->where('id_users',$id_users);
			$this->db->update('users',$klien);
			redirect('Admin_klien');
		}
	}
}