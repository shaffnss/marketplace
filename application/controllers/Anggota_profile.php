<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("anggota_profile_model");
	}
 
	public function index()
	{
		$data["profile"]=$this->anggota_profile_model->getProfile();
		$this->load->view('anggota/profile_anggota',$data);
	}
}
