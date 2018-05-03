<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_uploadProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('anggota/uploadProduk');
	}
	public function tambah_upload()
	{
		$this->load->view('anggota/tambah_upload');
	}
}
