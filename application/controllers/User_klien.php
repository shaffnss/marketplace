<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_klien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('admin/view_user_klien');
	}
}
