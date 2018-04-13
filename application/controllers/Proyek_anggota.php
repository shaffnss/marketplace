<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_anggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('anggota/proyek_anggota');
	}

	public function proyek()
	{
		$this->load->view('anggota/detail_proyek');
	}
}
