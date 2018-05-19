<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota_uploadProduk_model extends CI_Model {
	
	public function getUpload($id_user)
	{
		$this->db->select("*");
		$this->db->from("produk");
		$this->db->where("id_users", $id_user);
		return $this->db->get()->result();
	}

	public function insertProduk($produk){
		$this->db->trans_start();
		$this->db->insert('produk',$produk);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function getTeam($id_tim)
	{
		$this->db->where("id_tim",$id_tim);
		return $this->db->get("tim")->result();
	}
}