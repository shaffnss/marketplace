<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. '/libraries/BaseController.php';

class Anggota_dashboard extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->IsLoggedIn();
		$this->load->model("Anggota_dashboard_model");

	}
 
	public function index()
	{
		$id_users = $this->session->userdata('userId');
		$data["tampilTim"]=$this->Anggota_dashboard_model->getTeam($id_users);
		$this->load->view('anggota/dashboard', $data);
	}
}
