<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_profile_model extends CI_Model {
	public function getProfile(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","klien");
		return $this->db->get()->result();
	}

}
