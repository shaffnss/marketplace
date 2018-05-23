<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_password extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		//$this->load->model('users_model', 'um');
		// $this->load->library('session');
		// if(!$this->session->userdata('loggedIn')){
		// 	redirect('login');
		// }
	}

	public function ubah(){
		$this->form_validation->set_rules('old_password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|matches[re_password]');
		$this->form_validation->set_rules('re_password', 'Retype Password', 'required');
		if($this->form_validation->run() == FALSE){
			$this->data['title'] = 'Change Password';
			$sessionData = $this->session->userdata($sessionArray);
			$id = $sessionData['role'];
			$username = $sessionData['roleText'];

			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/change_password');
			$this->load->view('templates/footer');
		}else{

			$id =  $this->session->userdata('userId');
			$hasil = $this->db->query('select * from users where id_users = '.$id.'')->result_array();
			$password =  $hasil[0]['password'];

			//inputan formnya diambil dienkripsi pake password hash
			//if inputannya = $password maka diinputan pass baru dan retype pass maka inputan password barunya di updatekan di db sesuai id
		}
	}
	public function test(){
		//echo $sessionArray['userId'];
		$id =  $this->session->userdata('userId');
		$hasil = $this->db->query('select * from users where id_users = '.$id.'')->result_array();
		$password =  $hasil[0]['password'];
	}

	public function index(){
		$this->data['title'] = 'Change Password';
		$sessionData = $this->session->userdata('loggedIn');
		$this->data['id'] = $sessionData['id'];
		$this->data['username'] = $sessionData['username'];
		$this->data['type'] = $sessionData['type'];

		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/change_password');
		$this->load->view('templates/footer');
	}

}
?>