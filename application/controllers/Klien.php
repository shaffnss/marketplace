<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('Klien/view_dasboard');
	}
}
