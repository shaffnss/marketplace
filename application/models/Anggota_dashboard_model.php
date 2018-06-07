<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_dashboard_model extends CI_Model {

	public function getTeam($id_users)
	{
		$this->db->select("*");
		$this->db->select("detail_tim.id_tim as idTim");
		$this->db->from("tim");
		$this->db->join("detail_tim","detail_tim.id_tim=tim.id_tim");
		$this->db->join("posisi_tim","detail_tim.id_posisi=posisi_tim.id_posisi");
		$this->db->join("users","detail_tim.id_users=users.id_users");
		$this->db->where("users.id_users", $id_users);
		$this->db->where("tim.status", 'aktif');
		return $this->db->get()->result();
	}
	
	public function getDetailTeam($id_tim)
	{
		$this->db->select("*");
		$this->db->from("tim");
		$this->db->join("detail_tim","detail_tim.id_tim=tim.id_tim");
		$this->db->join("posisi_tim","detail_tim.id_posisi=posisi_tim.id_posisi");
		$this->db->join("users","detail_tim.id_users=users.id_users");
		$this->db->where("detail_tim.id_tim", $id_tim);	
		return $this->db->get()->result();
	}
}	
