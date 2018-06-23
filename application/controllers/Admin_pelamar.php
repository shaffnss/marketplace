<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pelamar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_pelamar_model");
	}
 
	public function index()
	{
		$data["pelamar"]=$this->Admin_pelamar_model->getPelamar();
		$this->load->view('admin/pelamar',$data);
	}
}
