<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk_model extends CI_Model {

	public function getProduk(){
		$this->db->where('status', 'aktif'); //nge get produk dimana statusnya itu tersedia
		return $this->db->get('produk')->result(); // datanya diambil dari table produk
	}

	public function getKategori(){
		return $this->db->get('kategori_produk')->result();
	}
}