<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$this->load->view('password_forgot');
	}

	public function kirim_email(){
		// $this->load->library('email');

		date_default_timezone_set("Asia/jakarta");

		$email = $this->input->post('email');

		$rs = $this->m_user->getByEmail($email);

  // cek email ada atau engga
		if (!$rs->num_rows() > 0){
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Email tidak ditemukan!');
			$this->session->set_flashdata('message', 'Cek kembali email yang terdaftar.');

			redirect ('password/forgot');
		}

		$user = $rs->row();

  // get id user
		$user_token = $user->id_users;

  //create valid dan expire token
		$date_create_token = date("Y-m-d H:i");
		$date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));

  // create token string
		$tokenstring = md5(sha1($user_token.$date_create_token));

  // simpan data token
		$data = array('token'=>$tokenstring,'id_users'=>$user_token,'created'=>$date_create_token,'expired'=>$date_expired_token);
		$simpan = $this->m_user->simpanToken($data);

		if ($simpan > 0){

    // email link reset
			$config['protocol'] = "smtp";
			$config['smtp-crypto'] = 'ssl';
			$config['smtp_host'] = "ssl://smtp.googlemail.com";
			$config['smtp_port'] = "465";
		    $config['smtp_user'] = "komsidev@gmail.com"; // ganti dengan emailmu sendiri
		    $config['smtp_pass'] = "Komsidev7"; // ganti dengan password emailmu
		    $config['charset'] = "iso-8859-1";
		    $config['mailtype'] = "html";
		    $config['newline'] = "\r\n";

    $this->load->library('email', $config);

    $this->email->initialize($config);


    $this->email->from('komsidev@gmail.com', 'My-Apps');
    $this->email->to($email);
    $this->email->subject('Reset Password');

    $this->email->message("
    	Token ini berlaku untuk 2 jam dari pengiriman token ini:
    	Klik disini untuk reset password anda : http://localhost/marketplaceta/password/reset/token/".$tokenstring
    );

    if (!$this->email->send()) {
    	echo $this->email->print_debugger();
    	exit;
    }

    $this->session->set_flashdata('style', 'success');
    $this->session->set_flashdata('alert', 'Berhasil !');
    $this->session->set_flashdata('message', 'Silahkan cek email anda');

    redirect ('password');
}

}

public function reset(){ //mengecek apa token sudah expired atau belum
	date_default_timezone_set("Asia/jakarta");
	$token = $this->uri->segment(4);

  // get token ke nodel user
	$cekToken = $this->m_user->cekToken($token);
	$rs = $cekToken->num_rows();

  // cek token ada atau engga
	if ($rs > 0){

		$data = $cekToken->row();
		$tokenExpired = $data->expired;
		$timenow = date("Y-m-d H:i:s");

    // cek token expired atau engga
		if ($timenow < $tokenExpired){

      // tampilkan form reset
			$datatoken['token'] = $token;
			$this->load->view('password_reset',$datatoken);

		}else{

      // redirect form forgot
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Maaf, Token Anda Sudah Expired!');
			$this->session->set_flashdata('message', 'Coba masukkan email anda kembali');

			redirect ('password');
		}
	}else{
		$this->session->set_flashdata('style', 'danger');
		$this->session->set_flashdata('alert', 'Maaf, Token Anda Tidak Ditemukan!');
		$this->session->set_flashdata('message', 'Coba masukkan email anda kembali');
		redirect ('password/forgot');
	}
}

public function kirim_reset(){ //untuk mengupdate password yang ada di database

	$password = $this->input->post('password');
	$token = $this->input->post('token');
	$cekToken = $this->m_user->cekToken($token);
	$data = $cekToken->row();
	$id = $data->id_users;
	// var_dump($id);
  // ubah password
	$data = array ('password'=>password_hash($password, PASSWORD_DEFAULT));
	$simpan = $this->m_user->ubahData($id,$data);

	if ($simpan > 0){
		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Password Berhasil Dirubah!');
		$this->session->set_flashdata('message', 'Silahkan login kembali');
	}else{
		$this->session->set_flashdata('style', 'danger');
		$this->session->set_flashdata('alert', 'Password Gagal Dirubah');
		$this->session->set_flashdata('message', 'Cek kembali yang anda masukkan');
	}
	redirect('login');
}
}
?>