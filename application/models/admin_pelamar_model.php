<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pelamar_model extends CI_Model {
	public function getPelamar(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","pelamar");
		return $this->db->get()->result();
	}
}
