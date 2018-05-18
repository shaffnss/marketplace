<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("klien_profile_model");
	}
 
	public function index()
	{
		$id_users = $this->session->userdata('userId');
		$data["profile"]=$this->klien_profile_model->getProfile($id_users);
		$this->load->view('Klien/view_profile',$data);
	}
}
