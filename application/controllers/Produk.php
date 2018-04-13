<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('admin/view_produk');
	}

	public function tambah_produk()
	{
		$this->load->view('admin/view_produkTambah');
	}
}
