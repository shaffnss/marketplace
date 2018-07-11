<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_anggota extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_anggota_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}

	public function index(){
		$data["anggota"]=$this->Admin_anggota_model->getAnggota();
		$this->load->view('admin/pengguna_anggota',$data);
	}

	public function tambah_anggota(){
		$data["error_upload"] = "";
		$this->load->view('admin/pengguna_anggota_tambah');
	}

	public function inputAnggota(){
		$config['upload_path']          = './assets/users/anggota';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 50000000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		if( ! $this->upload->do_upload('foto'))
		{
			$data_error['error_upload'] = $this->upload->display_errors();
			$this->load->view('admin/pengguna_anggota_tambah',$data_error);
		}else{
			$img = $this->upload->data();
			$foto = $img['file_name'];
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$email = $this->input->post('email', true);
			$no_telpon = $this->input->post('no_telpon', true);
			$instansi = $this->input->post('instansi', true);
			$password = $this->input->post('password', true);

			if( ! $this->upload->do_upload('ktm'))
			{
				$data_error['error_upload'] = $this->upload->display_errors();
				$this->load->view('admin/pengguna_anggota_tambah',$data_error);
			}else{ 
				$ktm=$this->upload->data();
				$ktm1=$ktm['file_name'];
			}
			$data =  array(
				"id_roles"=>3,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"email"=>$email,
				'validasi'=>1,
				'foto'=>$foto,
				'instansi'=>'UGM',
				"password"=>PASSWORD_HASH($password,PASSWORD_DEFAULT)
			);

			$id_users=$this->Admin_anggota_model->insertAnggota($data, $ktm1);
			redirect('Admin_anggota');
		}
	}

	public function ubahAnggota(){ //ubah data klien
		$status_users = $this->input->post('status_users');
		$id_users = $this->input->post('id_users');
		
		$data = array(
			'status_users' => $status_users
		);
		
		$this->Admin_anggota_model->editAnggota($data, $id_users);
		$this->session->set_flashdata('success', 'Anggota dinon-aktfikan.');
		redirect('Admin_anggota');
	}


	// public function ubahAnggota(){
	// 	$config['upload_path']          = './assets/users/anggota';
	// 	$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 	$config['max_size']             = 300;
	// 	$config['max_width']            = 1024;
	// 	$config['max_height']           = 768;

	// 	$this->load->library('upload', $config);
	// 	if( ! $this->upload->do_upload('foto')) //jika tidak update foto 
	// 	{	
	// 		$id_users = $this->input->post('id_users', true);
	// 		$nama_users = $this->input->post('nama_users', true);
	// 		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
	// 		$instansi = $this->input->post('instansi', true);
	// 		$no_telpon = $this->input->post('no_telpon', true);
	// 		$email = $this->input->post('email', true);
	// 		$status_users = $this->input->post('status_users', true);
	// 		$anggota =  array(
	// 			"id_roles"=>3,
	// 			"id_users"=>$id_users,
	// 			"nama_users"=>$nama_users,
	// 			"jenis_kelamin"=>$jenis_kelamin,
	// 			"instansi"=>$instansi,
	// 			"no_telpon"=>$no_telpon,
	// 			"email"=>$email,
	// 			"status_users"=>$status_users,
	// 		);
	// 	}else{ //jika update foto
	// 		$img = $this->upload->data();
	// 		$foto = $img['file_name'];
	// 		$id_users = $this->input->post('id_users', true);
	// 		$nama_users = $this->input->post('nama_users', true);
	// 		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
	// 		$instansi = $this->input->post('instansi', true);
	// 		$no_telpon = $this->input->post('no_telpon', true);
	// 		$email = $this->input->post('email', true);
	// 		$password = $this->input->post('password', true);
	// 		$status_users = $this->input->post('status_users', true);
	// 		$anggota =  array(
	// 			"id_roles"=>3,
	// 			"id_users"=>$id_users,
	// 			"nama_users"=>$nama_users,
	// 			"jenis_kelamin"=>$jenis_kelamin,
	// 			"instansi"=>$instansi,
	// 			"no_telpon"=>$no_telpon,
	// 			"email"=>$email,
	// 			"status_users"=>$status_users,
	// 			"foto"=> $foto
	// 		);
	// 	}
	// 	$id_users= $this->input->post('id_users');
	// 	$this->db->where('id_users',$id_users);
	// 	$this->db->update('users',$anggota);
	// 	$this->session->set_flashdata('success', 'Anggota dinon-aktfikan.');
	// 	redirect('Admin_anggota');
	// }

	public function posisi_tim(){
		$data["posisi"]=$this->Admin_anggota_model->getPosisi();
		$this->load->view('admin/pengguna_posisi_tim',$data);
	}

	public function inputPosisi(){
		$nama_posisi = $this->input->post('nama_posisi');

		$data = array(
			'nama_posisi' => $nama_posisi,

		);
		
		$this->Admin_anggota_model->insertPosisi($data);
		$this->session->set_flashdata('success', 'Berhasil! Data jabatan tim berhasil ditambahkan.');
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

	public function aktivasi_anggota(){
		$data["aktivasi"]=$this->Admin_anggota_model->getAktivasi();
		$this->load->view('admin/pengguna_anggota_baru', $data);
	}

	public function hapusPosisi($id_posisi) {
		$this->db->where('id_posisi', $id_posisi)->delete('posisi_tim');
		$this->session->set_flashdata('success', 'Data jabatan berhasil dihapus.');
		redirect('Admin_anggota/posisi_tim');
	}

	public function aktifkan($id_users){
		$result = $this->db->where('id_users',$id_users)
		->update('users', array('status_users'=>'aktif'));
		
		if ($result == TRUE) $this->session->set_flashdata('success','Anggota berhasil diaktifkan');
		else $this->session->set_flashdata('error','Anggota gagal diaktifkan');
		
		redirect('Admin_anggota');
	}
}
