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
			$password = $this->input->post('password');
			$level = $this->input->post('pilihananggota');

			$this->form_validation->set_rules('nama','Nama','required|trim');
			$this->form_validation->set_rules('email','Email','required|trim');
			$this->form_validation->set_rules('password','Password','required|trim');
			$this->form_validation->set_rules('pilihananggota','Pilihan Anggota','required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('register',$data,'');		
			}else{
				$users = array(
					'nama_users'=>$nama,
					'email'=>$email,
					'id_roles' =>$level,
					'password' =>password_hash($password, PASSWORD_DEFAULT)
				); 
				$id_users=$this->Register_model->createAnggota($users);

			//apabila regis dengan level anggota maka akan langsung create tim di db
			if($level == 3){
				$tim = array(
					'nama_tim'=>$nama,
					'status'=>'aktif',
					'status_tim' =>'individu',
				); 
				$id_tim =$this->Register_model->createTeam($tim);
				$detail_tim = array(
					'id_tim'=>$id_tim,
					'id_users'=>$id_users,
					'id_posisi' =>1,
				); 
				$this->db->insert('detail_tim',$detail_tim);
			}

				redirect('login');	
			}
		}else{
			
			$this->load->view('register',$data,'');	
		}
		
		
	}


}
