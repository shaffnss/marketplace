<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. '/libraries/BaseController.php';

class Klien_dashboard extends Basecontroller {

	function __construct()
	{
		parent::__construct();
		$this->IsLoggedIn();
		$this->isKlien();
	}
 
	public function index()
	{
		$this->load->view('klien/view_dasboard');
	}
}
