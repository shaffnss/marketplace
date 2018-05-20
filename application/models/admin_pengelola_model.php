<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pengelola_model extends CI_Model {
	public function getPengelola(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","pengelola");
		return $this->db->get()->result();
	}

	public function insertPengelola($pengelola){
		$this->db->trans_start();
		$this->db->insert('users',$pengelola);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
}
