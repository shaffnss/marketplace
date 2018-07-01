<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_pengelola extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_pengelola_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}

	public function index()
	{
		$data["pengelola"]=$this->Admin_pengelola_model->getPengelola();
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

	public function pengguna_tidak_aktif()
	{
		$data["pengelola"]=$this->Admin_pengelola_model->getPengelolaTidakAktif();
		$this->load->view('admin/pengguna_tidak_aktif',$data);
	}

	public function aktifkan($id_users)
	{
		$result = $this->db->where('id_users',$id_users)
		->update('users', array('status_users'=>'aktif'));
		
		if ($result == TRUE) $this->session->set_flashdata('success','Users berhasil diaktifkan kembali');
		else $this->session->set_flashdata('error','Users gagal diaktifkan');
		
		redirect('Admin_pengelola/pengguna_tidak_aktif');
	}

	public function jadisuperadmin($id_admin){
		$id_users = $this->session->userdata('userId');
		$data= $this->Admin_pengelola_model->getJadiSuperadmin($id_users, $id_admin);
		session_destroy();
		$lokasi = base_url('Login');
		//redirect('Login');
		echo "<script>alert('Anda berhasil memberikan hak akses anda sebagai Superadmin');</script>";
		echo "<script>location='".$lokasi."';</script>";
		
	}

}
