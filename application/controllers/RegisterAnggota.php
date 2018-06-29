<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterAnggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("RegisterAnggota_m");
	}

	public function index()
	{
		$data['data'] = $this->db->get('roles')->result();
		if ($this->input->post('register')){
			$config['upload_path']          = './assets/users/anggota/';
			$config['allowed_types']        = 'pdf|gif|jpg|png|jpeg';
			$config['max_size']             = 50000000;
			$config['remove_spaces'] 		= true;

			$this->load->library('upload', $config);
			// $this->upload->initialize($config);
			if(!$this->upload->do_upload('ktm'))
			{
				$error = array('error' => $this->upload->display_errors());
				//echo 'Gagal upload, resolusi atau ukuran foto melebihi batas!';
			}else{
				$ktm = $this->upload->data()['file_name'];
				//$nim = $this->input->post('nim');
				$nama = $this->input->post('nama');
				$jenkel = $this->input->post('jenis_kelamin');
				$no_telpon = $this->input->post('no_telpon');
				$email = $this->input->post('email');
				$instansi = $this->input->post('instansi');
				$password = $this->input->post('password');
			//$level = $this->input->post('pilihananggota');	

				$this->form_validation->set_rules('nama','nama','required|trim');
				//$this->form_validation->set_rules('nim','nim','required|trim');
				$this->form_validation->set_rules('email','email','required|trim');
				$this->form_validation->set_rules('no_telpon','no_telpon','required|trim');
				$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required|trim');
				$this->form_validation->set_rules('instansi','instansi','required|trim');
				$this->form_validation->set_rules('password','password','required|trim');

				if ($this->form_validation->run() == FALSE) {
					// echo 'ERROR VALIDASI GAGAL';
					// $this->session->set_flashdata('') ;
					$this->load->view('reg_anggota', $data);
				}else{
					$users = array(
						'nama_users'=>$nama,
						'email'=>$email,
						'jenis_kelamin'=>$jenkel,
						'no_telpon'=>$no_telpon,
						'instansi'=>$instansi,
						'id_roles' =>3,
						'password' =>password_hash($password, PASSWORD_DEFAULT)
					); 
					$id_users=$this->RegisterAnggota_m->createAnggota($users, $ktm);
					$this->session->set_flashdata('message', 'Register Berhasil');
					// redirect('login');

			//apabila regis dengan level anggota maka akan langsung create tim di db
					$tim = array(
						'nama_tim'=>$nama,
						'status'=>'aktif',
						'status_tim' =>'individu',
					); 
					$id_tim =$this->RegisterAnggota_m->createTeam($tim);
					$detail_tim = array(
						'id_tim'=>$id_tim,
						'id_users'=>$id_users,
						'id_posisi' =>1,
					); 
					$this->db->insert('detail_tim',$detail_tim);

					redirect('Login_anggota');	
				}

			}
		}else{
			$this->load->view('reg_anggota');
		}
	}
}
