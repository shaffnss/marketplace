<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pemesanan_model extends CI_Model {

	public function getPemesanan()
	{
		$this->db->select("users.*,pemesanan.status AS status_pemesanan,pemesanan.*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("users.id_roles",2);
		$this->db->where("pemesanan.status","proses");
		return $this->db->get()->result();	
	}

	public function getPemesananDiterima()
	{
		$this->db->select("users.*,pemesanan.status AS status_pemesanan,pemesanan.*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("users.id_roles",2);
		$this->db->where("pemesanan.status","diterima");
		return $this->db->get()->result();	
	}

	public function getPemesananDitolak()
	{
		$this->db->select("users.*,pemesanan.status AS status_pemesanan,pemesanan.*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("users.id_roles",2);
		$this->db->where("pemesanan.status","ditolak");
		return $this->db->get()->result();	
	}

	public function getDetailPesan($id_users)
	{
		$this->db->select("*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->join("detail_pemesanan","pemesanan.id_pemesanan=detail_pemesanan.id_pemesanan");
		$this->db->join("tim","tim.id_tim=detail_pemesanan.id_tim");
		$this->db->where("users.id_users",$id_users);
		$this->db->where("users.id_roles",2);
		return $this->db->get()->result();
	}

	public function getTeam(){
		$this->db->select("*");
		$this->db->from("tim");
		return $this->db->get()->result();
	}

	public function insertdetail($dataDetail)
	{
		return $this->db->insert("detail_pemesanan",$dataDetail);
	}

	public function updateStatus($dataPemesanan,$id_pemesanan)
	{
		$this->db->where("id_pemesanan",$id_pemesanan);
		return $this->db->update("pemesanan",$dataPemesanan);
	}
}
