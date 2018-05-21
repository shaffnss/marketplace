<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_produk_model extends CI_Model {

	public function getProduk(){
		$this->db->select("*");
		$this->db->select("produk.status as status_produk");
		$this->db->from("produk");
		$this->db->join("detail_produk","produk.id_produk=detail_produk.id_produk");
		$this->db->join("tim","tim.id_tim=detail_produk.id_tim");
		$this->db->join("kategori_produk","produk.id_kategori=kategori_produk.id_kategori");
		$this->db->where('detail_produk.status', 'proses');
		return $this->db->get()->result();
	}
	
	public function getProdukDiterima(){
		return $this->db
		->select("*")->select("produk.status as status_produk")
		->from("produk")
		->join("detail_produk","produk.id_produk=detail_produk.id_produk")
		->join("tim","tim.id_tim=detail_produk.id_tim")
		->join("kategori_produk","produk.id_kategori=kategori_produk.id_kategori")
		->where('detail_produk.status', 'diterima')
		->get()->result();
	}
	
	public function getProdukDitolak(){
		return $this->db
		->select("*")->select("produk.status as status_produk")
		->from("produk")
		->join("detail_produk","produk.id_produk=detail_produk.id_produk")
		->join("tim","tim.id_tim=detail_produk.id_tim")
		->join("kategori_produk","produk.id_kategori=kategori_produk.id_kategori")
		->where('detail_produk.status', 'ditolak')
		->get()->result();
	}

	public function insertProduk($produk){
		$this->db->trans_start();
		$this->db->insert('produk',$produk);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getTeam()
	{
		$this->db->select("*");
		$this->db->from("tim");
		return $this->db->get()->result();
	}
	
	public function getKategori()
	{
		return $this->db->get('kategori_produk')->result();
	}
}