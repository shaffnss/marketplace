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

	public function ubahPassword(){
		$this->form_validation->set_rules('passwordLama','Password Lama','trim|required');
		$this->form_validation->set_rules('passwordBaru','Password Baru','trim|required');
		$this->form_validation->set_rules('re_password','Re Password','trim|required|min_length[6]|max_length[20]|matches[passwordBaru]');

		if ($this->form_validation->run() ==  FALSE)
		{
			$data['body'] = $this->load->view('admin_profile', '', true);
			$this->load->view('admin/head_admin',$data);
		}else{
			$this->db->where('id_users', $this->session->userdata('userId'));
			$this->db->where('password', PASSWORD_HASH($this->input->post('passwordLama'),PASSWORD_DEFAULT));
			$cek = $this->db->get('users')->num_rows();
			if ($cek > 0){
				$this->db->where('id_users', $this->session->userdata('userId'));
				$this->db->update('users', array('password', PASSWORD_HASH($this->input->post('passwordBaru') ,PASSWORD_DEFAULT)));
				echo "<script>alert('Password Berhasil Dirubah');document.location='../admin_profile'</script>";
			}else{
				$this->data['status']="<div style='color:red; '>Password lama anda salah</div>";
				$data['body'] = $this->load->view('admin_profile', $this->data, true);
				$this->load->view('admin/head_admin',$data);
			}

		}
	}

// 	public function ubah(){
// 		$this->form_validation->set_rules('passwordLama', 'Password Lama', 'trim|required|xss_clean');
// 		$this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required|matches[re_password]');
// 		$this->form_validation->set_rules('re_password', 'Retype Password', 'required');
// 		if($this->form_validation->run() == FALSE){
// 			$this->data['title'] = 'Change Password';
// 			$sessionData = $this->session->userdata($sessionArray);
// 			$id = $sessionData['role'];
// 			$username = $sessionData['roleText'];

// 			$this->load->view('templates/header', $this->data);
// 			$this->load->view('pages/change_password');
// 			$this->load->view('templates/footer');
// 		}else{

// 			$id =  $this->session->userdata('userId');
// 			$hasil = $this->db->query('select * from users where id_users = '.$id.'')->result_array();
// 			$password =  $hasil[0]['password'];
			
// 			$passBaru = $this->input->post('passwordBaru');
// 			$data=array(
// 				$passBaru=>PASSWORD_HASH($password,PASSWORD_DEFAULT),
// 			);
// 			$this->db->replace('users', $data);

// 			//inputan formnya diambil dienkripsi pake password hash
// 			//if inputannya = $password maka diinputan pass baru dan retype pass maka inputan password barunya di updatekan di db sesuai id
// 		}
// 	}
// 	public function test(){
// 		//echo $sessionArray['userId'];
// 		$id =  $this->session->userdata('userId');
// 		$hasil = $this->db->query('select * from users where id_users = '.$id.'')->result_array();
// 		$password =  $hasil[0]['password'];
// 	}

// 	public function index(){
// 		$this->data['title'] = 'Change Password';
// 		$sessionData = $this->session->userdata('loggedIn');
// 		$this->data['id'] = $sessionData['id'];
// 		$this->data['username'] = $sessionData['username'];
// 		$this->data['type'] = $sessionData['type'];

// 		$this->load->view('templates/header', $this->data);
// 		$this->load->view('pages/change_password');
// 		$this->load->view('templates/footer');
// 	}

}
?>