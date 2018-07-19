<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterAnggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("registerAnggota_m");
	}

	public function index() //fungsi register anggota
	{
		$data['data'] = $this->db->get('roles')->result();
		if ($this->input->post('register')){
			$config['upload_path']          = './assets/users/anggota/';
			$config['allowed_types']        = 'pdf|gif|jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['max_width']            = 5024;
			$config['max_height']           = 5024;
			$config['remove_spaces'] 		= true;

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('ktm'))
			{
				$error = array('error' => $this->upload->display_errors());
			}else{
				$ktm = $this->upload->data()['file_name'];
				$nama = $this->input->post('nama');
				$jenkel = $this->input->post('jenis_kelamin');
				$no_telpon = $this->input->post('no_telpon');
				$email = $this->input->post('email');
				$password = $this->input->post('password');	

				$this->form_validation->set_rules('nama','nama','required|trim');
				$this->form_validation->set_rules('email','email','required|trim');
				$this->form_validation->set_rules('no_telpon','no_telpon','required|trim');
				$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required|trim');
				$this->form_validation->set_rules('password','password','required|trim');

				if ($this->form_validation->run() == FALSE) { //jika validasi salah
					$this->load->view('reg_anggota', $data);
				}else{
				    // cek email udah ada pada database atau belum
        			$cekEmail = $this->registerAnggota_m->cekEmail($email);
        			if($cekEmail->num_rows() > 0){
        				$this->session->set_flashdata('style','danger');
        				$this->session->set_flashdata('alert','Registrasi Gagal');
        				$this->session->set_flashdata('message','Email yang anada gunakan telah terdaftar');
        				redirect('Register');
        			}
        			
					$users = array( //jika validasi benar
						'nama_users'=>$nama,
						'email'=>$email,
						'jenis_kelamin'=>$jenkel,
						'no_telpon'=>$no_telpon,
						'instansi'=>'UGM',
						'id_roles' =>3,
						'validasi' =>1,
						'password' =>password_hash($password, PASSWORD_DEFAULT)
					); 
					$id_users=$this->registerAnggota_m->createAnggota($users, $ktm);

			        //apabila regis dengan level anggota maka akan langsung create tim di db
					$tim = array(
						'nama_tim'=>$nama,
						'status'=>'aktif',
						'status_tim' =>'individu',
					); 
					$id_tim =$this->registerAnggota_m->createTeam($tim);
					$detail_tim = array(
						'id_tim'=>$id_tim,
						'id_users'=>$id_users,
						'id_posisi' =>1,
					); 
					$this->db->insert('detail_tim',$detail_tim);
                    
                    $this->session->set_flashdata('style','success');
	                $this->session->set_flashdata('alert','Registrasi Anda Berhasil!');
	                $this->session->set_flashdata('message','Silahkan tunggu konfirmasi admin melalui email anda ');
        
					redirect('Login_anggota');	
				}
			}
		}else{
			$this->load->view('reg_anggota');
		}
	}
}
