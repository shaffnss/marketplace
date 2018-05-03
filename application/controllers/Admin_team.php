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

	public function detail_anggota()
	{
		$this->load->view('admin/pengguna_team_detail');
	}

	public function inputTeam()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_tim','nama tim','required');
		if($this->form_validation->run() == FALSE)
		{
   //jika form tidak lengkap maka akan dikembalikan ke route "matkulAdminR"
			redirect('Admin_team');
		}
		else
		{
			echo 'masuk';
			$nama_tim = $this->input->post('nama_tim');

			$team =  array(
				"nama_tim"=>$nama_tim,
			);

			$result = $this->admin_team_model->insertTeam($team);

		}

		redirect('Admin_team');
	}
}
