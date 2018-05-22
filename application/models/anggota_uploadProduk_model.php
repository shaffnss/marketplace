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
	
	//get id_users berdasarkan id_users
	public function getTeam($id_users)
	{
		return $this->db
		->join("detail_tim", 'detail_tim.id_tim = tim.id_tim')
		->where("detail_tim.id_users",$id_users)
		->where("detail_tim.posisi_tim", 'Project Manager')
		->get("tim")->result();
	}
	
	public function getKategori() {
		return $this->db->where('status_kategori', 'aktif')->get('kategori_produk')->result();
	}
}