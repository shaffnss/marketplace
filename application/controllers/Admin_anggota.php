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
		$data["error_upload"] = "";
		$this->load->view('admin/pengguna_anggota_tambah');
	}

	// public function reset($id){
	// 	$this->load->helper('string');
	// 	$reset=random_string('alnum',8);
	// 	$this->db->where('id_users',$id);
	// 	$this->db->update('users', array('password'=>PASSWORD_HASH($reset,PASSWORD_DEFAULT)));
	// 	echo json_encode(array("status" => true, 'data'=>$reset));
	// }

	public function inputAnggota()
	{
		$config['upload_path']          = './assets/users/anggota';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 300;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('foto'))
		{
			$data_error['error_upload'] = $this->upload->display_errors();
			// echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
			$this->load->view('admin/pengguna_anggota_tambah',$data_error);
		}
		else
		{
			$img = $this->upload->data();
			$foto = $img['file_name'];
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$email = $this->input->post('email', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$instansi = $this->input->post('instansi', true);
			$password = $this->input->post('password', true);

			$data =  array(
				"id_roles"=>3,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				'foto'=>$foto,
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$this->db->insert('users', $data);
			redirect('Admin_anggota');
		}
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
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$email = $this->input->post('email', true);
			$status_users = $this->input->post('status_users', true);
			$anggota =  array(
				"id_roles"=>3,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				"status_users"=>$status_users,
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
			$anggota =  array(
				"id_roles"=>3,
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
		$this->db->update('users',$anggota);
		redirect('Admin_anggota');
	}

	public function posisi_tim(){
		$data["posisi"]=$this->admin_anggota_model->getPosisi();
		$this->load->view('admin/pengguna_posisi_tim',$data);
	}

	public function inputPosisi(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_posisi','nama posisi','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Admin_anggota/posisi_tim');
		}
		else
		{
			$nama_posisi = $this->input->post('nama_posisi');

			$data =  array(
				"nama_posisi"=>$nama_posisi,
			);

			$result = $this->admin_anggota_model->insertPosisi($data);

		}

		redirect('Admin_anggota/posisi_tim');
	}

	public function ubahPosisi(){
		$id_posisi = $this->input->post('id_posisi');
		$nama_posisi = $this->input->post('nama_posisi');
		$status_posisi = $this->input->post('status_posisi');

		$data=array(
			'nama_posisi'=>$nama_posisi,
			"status_posisi"=>$status_posisi
		);
		$this->db->where('id_posisi',$id_posisi);
		$this->db->update('posisi_tim',$data);
		redirect('Admin_anggota/posisi_tim');
	}
}
