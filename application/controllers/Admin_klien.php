<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_klien extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_klien_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}

	public function index(){
		$data["klien"]=$this->Admin_klien_model->getKlien();
		$this->load->view('admin/pengguna_klien',$data);
	}

	public function tambah_klien(){
		$data["error_upload"] = "";
		$this->load->view('admin/pengguna_klien_tambah',$data);
	}

	public function inputKlien()
	{
		$config['upload_path']          = './assets/users/klien';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 300;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('foto'))
		{
			$data_error['error_upload'] = $this->upload->display_errors();
			// echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
			$this->load->view('admin/pengguna_klien_tambah',$data_error);
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
				"id_roles"=>2,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				'foto'=>$foto,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$this->db->insert('users', $data);
			redirect('Admin_klien');
		}
	}

	public function ubahKlien(){ //ubah data klien
		$status_users = $this->input->post('status_users');
		$id_users = $this->input->post('id_users');
		
		$data = array(
			'status_users' => $status_users
		);
		
		$this->Admin_klien_model->editKlien($data, $id_users);
		$this->session->set_flashdata('success', 'Klien dinon-aktfikan.');
		redirect('Admin_klien');
    }

	// public function aktivasi_klien()
	// {
	// 	$data["aktivasi"]=$this->Admin_klien_model->getAktivasi();
	// 	$this->load->view('admin/klien_baru', $data);
	// }

	// public function aktifkan($id_users)
	// {
	// 	$result = $this->db->where('id_users',$id_users)
	// 	->update('users', array('status_users'=>'aktif'));

	// 	if ($result == TRUE) $this->session->set_flashdata('success','Klien berhasil diaktifkan');
	// 	else $this->session->set_flashdata('error','Klien gagal diaktifkan');

	// 	redirect('Admin_klien/klien_baru');
	// }
}