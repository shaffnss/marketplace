<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_team extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('admin/view_user_team');
	}

	public function detail_anggota()
	{
		$this->load->view('admin/view_user_detail_team');
	}
}
