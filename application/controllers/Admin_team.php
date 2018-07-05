<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Admin_team extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_team_model");
		$this->isLoggedIn();
		$this->isAdmin();
	}

	public function index(){
		$data["tim"]=$this->Admin_team_model->getTim();
		$this->load->view('admin/pengguna_team',$data);
	}

	public function ubahNamaTim(){
		$id_tim = $this->input->post('id_tim');
		$nama_tim = $this->input->post('nama_tim');
		$status = $this->input->post('status');
		$status_tim = $this->input->post('status_tim');

		$data=array(
			'nama_tim'=>$nama_tim,
			"status"=>$status,
			"status_tim"=>$status_tim
		);
		$this->db->where('id_tim',$id_tim);
		$this->db->update('tim',$data);
		redirect('Admin_team/ubah_team/'.$id_tim);
	}

	public function inputNamaTeam(){ //MENGINPUTKAN NAMA TIM KE VIEW
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_tim','nama tim','required');
		$this->form_validation->set_rules('status_tim','status tim','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Admin_team');
		}else{
			//echo 'masuk';
			$nama_tim = $this->input->post('nama_tim');
			$status_tim = $this->input->post('status_tim');

			$team =  array(
				"nama_tim"=>$nama_tim,
				"status_tim"=>$status_tim,
			);

			$result = $this->Admin_team_model->insertTeam($team);
		}
		redirect('Admin_team');
	}

	public function ubah_team($id_team){
		$data['panggil_anggota']=$this->Admin_team_model->getAnggota(); //panggil dari db
		$data['anggotaTim']=$this->Admin_team_model->getAnggotaTim($id_team); //panggil dari db
		$data['tim']=$this->Admin_team_model->tim($id_team);
		$data['posisi']=$this->Admin_team_model->getPosisi($id_team);
		$this->load->view('admin/pengguna_team_ubah',$data);
	}

	public function tambahAnggota(){ //TAMBAH ANGGOTA DIBAGIAN UBAH TEAM
		$id_tim = $this->input->post('id_tim');
		$id_users = $this->input->post('id_users');
		$id_posisi = $this->input->post('id_posisi');

		$data=array(
			'id_tim'=>$id_tim,
			'id_users'=>$id_users,
			'id_posisi'=>$id_posisi
		);
		$this->db->insert('detail_tim',$data);

		redirect('Admin_team/ubah_team/'.$id_tim);
	}

	public function hapusAnggota($id_detail_tim,$id_team){ //HAPUS ANGGOTA DIBAGIAN UBAH TIM
		$this->db->where('id_detail_tim',$id_detail_tim);
		$this->db->delete('detail_tim');
		redirect('Admin_team/ubah_team/'.$id_team);
	}
}
