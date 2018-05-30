<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_perjanjian_model extends CI_Model {
	public function getPerjanjian(){
		$this->db->select("*");
		$this->db->from("perjanjian");
		$this->db->join("kategori_perjanjian","kategori_perjanjian.id_kategori=perjanjian.id_kategori");
		$this->db->join("pembelian","pembelian.id_pembelian=perjanjian.id_pembelian");
		$this->db->join("detail_pembelian","pembelian.id_pembelian=detail_pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		return $this->db->get()->result();
	}

	public function getKategori(){
		$this->db->select("*");
		$this->db->from("kategori_perjanjian");
		return $this->db->get()->result();
	}

	public function insertKategori($kategori){
		$this->db->trans_start();
		$this->db->insert('kategori_perjanjian',$kategori);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
}
