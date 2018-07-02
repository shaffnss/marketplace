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

			// cek email udah ada apa belom
			$cekEmail = $this->Register_model->cekEmail($email);
			if($cekEmail->num_rows() > 0){
				$this->session->set_flashdata('style','danger');
				$this->session->set_flashdata('alert','Register Gagal');
				$this->session->set_flashdata('message','Email sudah terdaftar');
				redirect('Register');
			}

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
					'password' =>password_hash($password, PASSWORD_DEFAULT),
					'validasi' => 0
				);

				$id_users=$this->Register_model->createKlien($users);

				//ENKRIPSI ID
				$encrypted_id = md5($id_users);

				$this->load->helper(array('form','url'));

				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_port'] = 465;
				$config['smtp_user'] = 'komsidev@gmail.com';
         		$config['smtp_pass'] = 'Komsidev2018';  //senders password
         		$config['mailtype'] = 'html';
         		$config['charset'] = 'iso-8859-1';
         		$config['wordwrap'] = 'TRUE';
         		$config['crlf'] = "\r\n";
         		$config['newline'] = "\r\n";


         		$this->load->library('email', $config);
         		$this->email->initialize($config);
         		$this->email->set_newline("\r\n");

			    $address = $email; //penerima email
			    $subject = "Verifikasi Akun Klien"; // subject
			    $message = //body email is start
			   '<html>
			   <head> <h2> Pendaftaran Akun Klien VokasiDev </h2> </head>
			   <body>

			   Selamat datang di VokasiDev
			   <br/>
			   Silahkan verifikasi akun anda untuk melanjutkan pembelian anda lakukan <a href="'.site_url("Register/verifikasi/$encrypted_id").'">Login</a> dengan menggunakan:<br/>
			   Email: '.$email.'<br/>
			   Password: '.$this->input->post('password').'<br/>
			   <br/>
			   <br/	>
			   Admin VokasiDev
			   </body>
			   </html>';
			    // body email is end

			    // $this->email->set_newline("\r\n");
			   $this->email->from('komsidev@gmail.com','VokasiDev'); //sender email
			   $this->email->to($address);
			   $this->email->subject($subject);
			   $this->email->message($message);
			   $this->email->send();

			   $this->session->set_flashdata('style','info');
		$this->session->set_flashdata('alert','Silahkan Cek Email Anda');
		//$this->session->set_flashdata('message','');

			   redirect('login');	
			}
		}else{

			$this->load->view('register',$data,'');	
		}
	}

	public function verifikasi($key)
	{
		$this->load->helper('url');
		$this->load->model('Register_model');
		$this->Register_model->changeActiveState($key);
  		// echo "Selamat kamu telah memverifikasi akun kamu";
  		// echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";

		$this->session->set_flashdata('style','info');
		$this->session->set_flashdata('alert','Silahkan Login');
		$this->session->set_flashdata('message','Gunakan Email dan Password Terdaftar');

		// $data['menu'] = $this->web_model->getMenu();
		// $data['gantiWarna'] = $this->web_model->getWarna();
		// $data['logo1'] = $this->web_model->getLogo1();
		//$data['gantiWarnaTextMenu'] = $this->web_model->getWarna();

		$this->load->view('login');
	}


}
