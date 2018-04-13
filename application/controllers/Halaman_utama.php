<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_utama extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('admin/view_halaman_utama');
	}
}
