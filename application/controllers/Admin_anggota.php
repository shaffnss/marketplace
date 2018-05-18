<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_anggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_anggota_model");
	}
 
	public function index()
	{
		$data["anggota"]=$this->admin_anggota_model->getAnggota();
		$this->load->view('admin/pengguna_anggota',$data);
	}

	public function tambah_anggota()
	{
		$this->load->view('admin/pengguna_anggota_tambah');
	}

	public function inputAnggota()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_anggota','nama_anggota','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('no_telpon','no telpon','required');
		$this->form_validation->set_rules('instansi','instansi','required');
		$this->form_validation->set_rules('posisi','posisi','required');
		$this->form_validation->set_rules('password','password','required');

		if($this->form_validation->run() == FALSE)
		{
   //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
			redirect('Admin_anggota');
		}
		else
		{
			echo 'masuk';
			$nama_anggota = $this->input->post('nama_anggota');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$email = $this->input->post('email');
			$no_telpon = $this->input->post('no_telpon');
			$instansi = $this->input->post('instansi');
			$posisi = $this->input->post('posisi');
			$password = $this->input->post('password');


			$anggota =  array(
				"id_roles"=>3,
				"nama_users"=>$nama_anggota,
				"jenis_kelamin"=>$jenis_kelamin,
				"email"=>$email,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"posisi"=>$posisi,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$result = $this->admin_anggota_model->insertAnggota($anggota);

		}

		redirect('Admin_anggota');
	}

	public function ubahAnggota()
	{
		$id_users = $this->input->post('id_users');
		$nama_anggota = $this->input->post('nama_users');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$instansi = $this->input->post('instansi');
		$status_users = $this->input->post('status_users');
		$posisi = $this->input->post('posisi');

		$anggota =  array(
			"id_roles"=>3,
			"nama_users"=>$nama_anggota,
			"jenis_kelamin"=>$jenis_kelamin,
			"no_telpon"=>$no_telpon,
			"email"=>$email,
			"status_users"=>$status_users,
			"instansi"=>$instansi,
			"posisi"=>$posisi
		);
		$this->db->where('id_users',$id_users);
		$this->db->group_start();
		$this->db->where('posisi','mahasiswa');
		$this->db->or_where('posisi','alumni');
		$this->db->group_end();
		$this->db->update('users',$anggota);
		redirect('Admin_anggota');

	}
}
