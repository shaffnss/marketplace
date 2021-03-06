<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ListProduk_model extends CI_Model {
	public function getProduk(){
		$this->db->where('status', 'aktif'); //nge get produk dimana statusnya itu tersedia
		return $this->db->get('produk')->result(); // datanya diambil dari table produk
	}
	
	public function getDetailProduk($id_produk){
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori=produk.id_kategori');
		$this->db->where('id_produk', $id_produk); 
		$this->db->where('status', 'aktif'); //nge get produk dimana statusnya itu tersedia
		return $this->db->get('produk')->row(); // datanya diambil dari table produk
	}
	
	public function getNamaProduk($nama_produk){
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori=produk.id_kategori');
		$this->db->where('status', 'aktif'); //nge get produk dimana statusnya itu tersedia
		$this->db->like('nama_produk', $nama_produk); 
		return $this->db->get('produk')->result(); // datanya diambil dari table produk
	}
	public function getProdukKategori($id_kategori){
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori=produk.id_kategori');
		$this->db->where('status', 'aktif'); //nge get produk dimana statusnya itu tersedia
		$this->db->where('produk.id_kategori', $id_kategori); 
		return $this->db->get('produk')->result(); // datanya diambil dari table produk
	}
	public function getKategori(){
		return $this->db->get('kategori_produk')->result();
	}
	
	public function insertPembelian($data) {
		$this->db->trans_start();
		$this->db->insert('pembelian', $data);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		return $id;
	}
}