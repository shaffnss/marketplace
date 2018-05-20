<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_kategori_model extends CI_Model {

	public function getKategori(){
		$this->db->select("*");
		$this->db->from("kategori_produk");
		return $this->db->get()->result();
	}

	public function insertKategori($kategori){
		$this->db->trans_start();
		$this->db->insert('kategori_produk',$kategori);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

}