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

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_klien','nama klien','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('instansi','instansi','required');
		$this->form_validation->set_rules('no_telpon','no telpon','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');

		if($this->form_validation->run() == FALSE)
		{
   //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
			redirect('Admin_klien');
		}
		else
		{
			echo 'masuk';
			$nama_klien = $this->input->post('nama_klien');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$instansi = $this->input->post('instansi');
			$no_telpon = $this->input->post('no_telpon');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$klien =  array(
				"id_roles"=>2,
				"nama_users"=>$nama_klien,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$result = $this->admin_klien_model->insertKlien($klien);

		}

		redirect('Admin_klien');
	}

	public function ubahKlien()
	{
		$id_users = $this->input->post('id_users');
		$nama_klien = $this->input->post('nama_users');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$instansi = $this->input->post('instansi');
		$no_telpon = $this->input->post('no_telpon');
		$email = $this->input->post('email');
		$status_users = $this->input->post('status_users');

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
