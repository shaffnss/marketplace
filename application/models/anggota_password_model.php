<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_password_model extends CI_Model {
	public function getProfile($id_users){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","anggota");
		$this->db->where("id_users",$id_users);
		return $this->db->get()->result();
	}
}	
