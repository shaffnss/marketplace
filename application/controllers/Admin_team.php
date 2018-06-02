<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_team extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("admin_team_model");
	}
 
	public function index()
	{
		$data["tim"]=$this->admin_team_model->getTim();
		$this->load->view('admin/pengguna_team',$data);
	}


	public function ubah_team($id_team)
	{
		$data['panggil_anggota']=$this->admin_team_model->getAnggota(); //panggil dari db
		$data['anggotaTim']=$this->admin_team_model->getAnggotaTim($id_team); //panggil dari db
		$data['tim']=$this->admin_team_model->tim($id_team);
		$data['posisi']=$this->admin_team_model->getPosisi($id_team);
		$this->load->view('admin/pengguna_team_ubah',$data);
	}

	public function inputNamaTeam() //MENGINPUTKAN NAMA TIM KE VIEW
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_tim','nama tim','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('Admin_team');
		}
		else
		{
			//echo 'masuk';
			$nama_tim = $this->input->post('nama_tim');

			$team =  array(
				"nama_tim"=>$nama_tim,
			);

			$result = $this->admin_team_model->insertTeam($team);

		}

		redirect('Admin_team');
	}

	public function tambahAnggota() //TAMBAH ANGGOTA DIBAGIAN UBAH TEAM
	{
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

	public function ubahNamaTim(){
		$id_tim = $this->input->post('id_tim');
		$nama_tim = $this->input->post('nama_tim');
		$status = $this->input->post('status');

		$data=array(
			'nama_tim'=>$nama_tim,
			"status"=>$status
		);
		$this->db->where('id_tim',$id_tim);
		$this->db->update('tim',$data);
		redirect('Admin_team/ubah_team/'.$id_tim);
	}

	public function hapusAnggota($id_detail_tim,$id_team) //HAPUS ANGGOTA DIBAGIAN UBAH TIM
	{
		$this->db->where('id_detail_tim',$id_detail_tim);
		$this->db->delete('detail_tim');
		redirect('Admin_team/ubah_team/'.$id_team);
	}
}
