<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_produk_model extends CI_Model {

	public function getProduk(){
		$this->db->select("*");
		$this->db->from("produk");
		$this->db->join("detail_produk","produk.id_produk=detail_produk.id_produk");
		$this->db->join("tim","tim.id_tim=detail_produk.id_tim");
		return $this->db->get()->result();
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
}