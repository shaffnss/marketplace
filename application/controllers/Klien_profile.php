<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Klien_profile extends Basecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Klien_profile_model");
		$this->IsLoggedIn();
		$this->isKlien();
	}
 
	public function index()
	{
		$id_users = $this->session->userdata('userId');
		$data["profile"]=$this->Klien_profile_model->getProfile($id_users);
		$this->load->view('klien/view_profile',$data);
	}

	public function ubahKlien()
	{
		$config['upload_path']          = './assets/users/klien';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 300;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload('foto')) //jika tidak update foto 
		{	
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			//$email = $this->input->post('email', true);
			$klien =  array(
				"id_roles"=>2,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				//"email"=>$email
			);
		}
		else //jika update foto
		{

			$img = $this->upload->data();
			$foto = $img['file_name'];
			$id_users = $this->input->post('id_users', true);
			$nama_users = $this->input->post('nama_users', true);
			$jenis_kelamin = $this->input->post('jenis_kelamin', true);
			$instansi = $this->input->post('instansi', true);
			$no_telpon = $this->input->post('no_telpon', true);
			//$email = $this->input->post('email', true);
			$klien =  array(
				"id_roles"=>2,
				"id_users"=>$id_users,
				"nama_users"=>$nama_users,
				"jenis_kelamin"=>$jenis_kelamin,
				"instansi"=>$instansi,
				"no_telpon"=>$no_telpon,
				"foto"=> $foto,
			);
			$this->session->set_userdata('foto', $foto);
		}
			$id_users= $this->input->post('id_users');
			$this->db->where('id_users',$id_users);
			$this->db->update('users',$klien);
			$this->session->set_userdata('name', $nama_users);
			redirect('Klien_profile');
		}

		public function ubahPassword(){
		$id_users=$this->session->userdata('userId');
		$datas["profile"]=$this->Klien_profile_model->getProfile($id_users);	
		$passLama = $this->input->post('passwordLama');
		$passBaru = password_hash($this->input->post('passwordBaru'), PASSWORD_DEFAULT);
		$passRe = password_hash($this->input->post('re_password'), PASSWORD_DEFAULT);

		$this->form_validation->set_rules('passwordLama','Password Lama','trim|required');
		$this->form_validation->set_rules('passwordBaru','Password Baru','trim|required');
		$this->form_validation->set_rules('re_password','Re Password','trim|required|max_length[20]|matches[passwordBaru]');

		if ($this->form_validation->run() ==  FALSE)
		{
			$datas["profile"]=$this->Klien_profile_model->getProfile($id_users);
			$data['body'] = $this->load->view('klien/view_profile', $datas,'');
			$this->load->view('klien/head_admin',$data);
		}else{
			$this->db->where('id_users', $this->session->userdata('userId'));
			// $this->db->where('password', PASSWORD_HASH($this->input->post('passwordLama'),PASSWORD_DEFAULT));
			$cek = $this->db->get('users')->result();
			
            if(password_verify($passLama, $cek[0]->password)){
            	$this->db->set('password', $passBaru);
                $this->db->where('id_users', $this->session->userdata('userId'));
				$this->db->update('users');
				// $this->db->update('users', array('password', PASSWORD_HASH($this->input->post('passwordBaru') ,PASSWORD_DEFAULT)));
				echo "<script>alert('Password Berhasil Dirubah');document.location='../Klien_profile'</script>";
            }else{
                echo "<script>alert('Password Lama Anda Salah');document.location='../Klien_profile'</script>";
            }

		}
	}
}
?>