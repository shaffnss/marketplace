<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Anggota_password extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Anggota_password_model");
		$this->isLoggedIn();
		$this->isAnggota();
	}

	public function index()
	{
		$id_users=$this->session->userdata('userId');
		$data["profile"]=$this->Anggota_password_model->getProfile($id_users);
		$this->load->view('anggota/ubah_password');
	}

	public function ubahPassword(){ //fungsi ubah password
		$id_users=$this->session->userdata('userId');
		$datas["profile"]=$this->Anggota_password_model->getProfile($id_users);	

		$passLama = $this->input->post('passwordLama');
		$passBaru = password_hash($this->input->post('passwordBaru'), PASSWORD_DEFAULT);
		$passRe = password_hash($this->input->post('re_password'), PASSWORD_DEFAULT);

		$this->form_validation->set_rules('passwordLama','Password Lama','trim|required');
		$this->form_validation->set_rules('passwordBaru','Password Baru','trim|required');
		$this->form_validation->set_rules('re_password','Re Password',
			'trim|required|max_length[20]|matches[passwordBaru]');

		if ($this->form_validation->run() ==  FALSE) //jika input password salah
		{
			$datas["profile"]=$this->Admin_profile_model->getProfile($id_users);
			$data['body'] = $this->load->view('anggota/ubah_password', $datas,'');
			$this->load->view('anggota/head_anggota',$data);
		}else{ //jika input password benar
			$this->db->where('id_users', $this->session->userdata('userId'));
			// $this->db->where('password', PASSWORD_HASH($this->input->post('passwordLama'),PASSWORD_DEFAULT));
			$cek = $this->db->get('users')->result();
			
			if(password_verify($passLama, $cek[0]->password)){
				$this->db->set('password', $passBaru);
				$this->db->where('id_users', $this->session->userdata('userId'));
				$this->db->update('users');
				echo "<script>alert('Password Berhasil Dirubah');document.location='../Anggota_password'</script>";
			}else{
				echo "<script>alert('Password Lama Anda Salah');document.location='../Anggota_password'</script>";
			}
		}
	}
}
?>