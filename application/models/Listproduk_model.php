<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk_model extends CI_Model {
	public function getProduk(){
		$this->db->where('status', 'tersedia');
		return $this->db->get('produk')->result();
	}
	
	public function getDetailProduk($id_produk){
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori=produk.id_kategori');
		$this->db->where('id_produk', $id_produk); 
		$this->db->where('status', 'aktif'); //nge get produk dimana statusnya itu tersedia
		return $this->db->get('produk')->row(); // datanya diambil dari table produk
	}
	
	public function getKategori(){
		return $this->db->get('kategori_produk')->result();
	}

}
