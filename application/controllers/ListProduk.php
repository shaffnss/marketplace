<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
 
	public function index()
	{
		$this->load->view('landing/produk');
	}

	public function detail()
	{
		$this->load->view('landing/DetailProduk');
	}
}
