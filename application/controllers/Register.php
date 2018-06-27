<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Register_model");
	}
 
	public function index()
	{
		$data['data'] = $this->db->get('roles')->result();
		if ($this->input->post('register')){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$no_telpon = $this->input->post('no_telpon');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$instansi = $this->input->post('instansi');
			$password = $this->input->post('password');

			$this->form_validation->set_rules('nama','nama','required|trim');
			$this->form_validation->set_rules('email','email','required|trim');
			$this->form_validation->set_rules('no_telpon','no_telpon','required|trim');
			$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required|trim');
			$this->form_validation->set_rules('instansi','instansi','required|trim');
			$this->form_validation->set_rules('password','password','required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('register',$data,'');		
			}else{
				$users = array(
					'nama_users'=>$nama,
					'email'=>$email,
					'no_telpon'=>$no_telpon,
					'jenis_kelamin'=>$jenis_kelamin,
					'instansi'=>$instansi,
					'id_roles' =>2, //id_roles klien
					'password' =>password_hash($password, PASSWORD_DEFAULT)
				);
			
				$id_users=$this->Register_model->createKlien($users);

				redirect('login');	
			}
		}else{
			
			$this->load->view('register',$data,'');	
		}
	}

	public function anggota(){
		$this->load->view('reg_anggota');
	}


}
