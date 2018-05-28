<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. '/libraries/BaseController.php';

class Admin_dashboard extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->IsLoggedIn();
		
	}
 
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
}
