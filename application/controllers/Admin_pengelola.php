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
		$this->load->view('admin/pengguna_pengelola_tambah');
	}

	public function inputPengelola()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_pengelola','nama pengelola','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('instansi','instansi','required');
		$this->form_validation->set_rules('no_telpon','no telpon','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');

		if($this->form_validation->run() == FALSE)
		{
   //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
			redirect('Admin_pengelola');
		}
		else
		{
			//echo 'masuk';
			$nama_pengelola = $this->input->post('nama_pengelola');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$instansi = $this->input->post('instansi');
			$no_telpon = $this->input->post('no_telpon');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$pengelola =  array(
				"id_roles"=>1,
				"nama_users"=>$nama_pengelola,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"posisi"=>"pengelola",
				"email"=>$email,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$result = $this->admin_pengelola_model->insertPengelola($pengelola);

		}

		redirect('Admin_pengelola');
	}

	public function ubahPengelola()
	{
		$id_users = $this->input->post('id_users');
		$nama_pengelola = $this->input->post('nama_users');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$instansi = $this->input->post('instansi');
		$no_telpon = $this->input->post('no_telpon');
		$email = $this->input->post('email');
		$status_users = $this->input->post('status_users');

		$pengelola =  array(
			"id_roles"=>1,
			"nama_users"=>$nama_pengelola,
			"jenis_kelamin"=>$jenis_kelamin,
			"instansi"=>$instansi,
			"no_telpon"=>$no_telpon,
			"email"=>$email,
			"status_users"=>$status_users
		);
		$this->db->where('id_users',$id_users);
		$this->db->update('users',$pengelola);
		redirect('Admin_pengelola');

	}
}
