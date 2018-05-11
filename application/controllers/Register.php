<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$data['data'] = $this->db->get('roles')->result();
		if ($this->input->post('register')){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$level = $this->input->post('pilihananggota');

			$this->form_validation->set_rules('nama','Nama','required|trim');
			$this->form_validation->set_rules('email','Email','required|trim');
			$this->form_validation->set_rules('password','Password','required|trim');
			$this->form_validation->set_rules('pilihananggota','Pilihan Anggota','required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('register',$data,'');		
			}else{
				$row = array(
					'nama_users'=>$nama,
					'email'=>$email,
					'id_roles' =>$level,
					'password' =>password_hash($password, PASSWORD_DEFAULT)
				); 
				$this->db->insert('users', $row);
				redirect('login');	
			}
		}else{
			
			$this->load->view('register',$data,'');	
		}
		
		
	}


}
