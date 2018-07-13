<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_uploadProduk_model extends CI_Model {
	public function getUpload($id_user){
		$this->db->select("*");
		$this->db->select("detail_produk.status as status_produk");
		$this->db->from("produk");
		$this->db->join("kategori_produk", "kategori_produk.id_kategori = produk.id_kategori");
		$this->db->join("detail_produk", "detail_produk.id_produk = produk.id_produk");
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
	public function getTeam($id_users){
		return $this->db
		->join("detail_tim",'detail_tim.id_tim = tim.id_tim')
		->join("posisi_tim",'detail_tim.id_posisi=posisi_tim.id_posisi')
		->where("detail_tim.id_users",$id_users)
		->where("posisi_tim.nama_posisi", 'Project Manager')
		->where("tim.status", 'aktif')
		->where('tim.status_tim','tim')
		->get("tim")->result();
	}
	
	public function getKategori(){
		return $this->db->where('status_kategori', 'aktif')->get('kategori_produk')->result();
	}

	public function checkTim($id_user){
		$this->db->join('users','users.id_users=detail_tim.id_users');
		$this->db->join('tim','tim.id_tim=detail_tim.id_tim');
		$this->db->where('detail_tim.id_users',$id_user);
		$this->db->where('tim.status_tim','individu');
		return $this->db->get('detail_tim')->row();
	}

	public function deleteUpload($id_produk){
		$this->db->delete('produk', array('id_produk' =>$id_produk));
		return TRUE;
	}
}