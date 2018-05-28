<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_profile_model extends CI_Model {
	public function getProfile($id_users){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles", "roles.id_roles=users.id_roles");
		$this->db->where("id_users",$id_users);
		$this->db->where("users.id_roles",1);
		$this->db->or_where("users.id_roles",4);
		return $this->db->get()->result();
	}

}
