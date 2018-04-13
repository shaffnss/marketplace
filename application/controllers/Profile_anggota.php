<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_anggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('anggota/profile_anggota');
	}
}
