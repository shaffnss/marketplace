<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. '/libraries/BaseController.php';

class Anggota_dashboard extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->IsLoggedIn();

	}
 
	public function index()
	{
		// $data["tampilTim"]=$this->anggota_profile_model->getTeam($id_users);
		// $data["detail_tim"]=$this->anggota_profile_model->getDetailTeam($id_tim);
		$this->load->view('anggota/dashboard');
	}
}
