<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota_profile_model extends CI_Model {
	public function getProfile(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","anggota");
		$this->db->where("id_users",$this->session->userdata('userId'));
		return $this->db->get()->result();
	}

	public function getTeam()
	{
		$this->db->select("*");
		$this->db->from("tim");
		$this->db->join("detail_tim","detail_tim.id_tim=tim.id_tim");
		$this->db->join("users","detail_tim.id_users=users.id_users");
		$this->db->where("users.id_users",4);	
		return $this->db->get()->result();
	}
}	
