<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_klien_model extends CI_Model {
	public function getKlien(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","klien");
		$this->db->where("status_users", "aktif");
		return $this->db->get()->result();
	}

	public function insertKlien($klien){
		$this->db->trans_start();
		$this->db->insert('users',$klien);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	// public function getAktivasi(){;
	// 	$this->db->join("roles","users.id_roles=roles.id_roles");
	// 	$this->db->where("roles.nama_roles","klien");
	// 	$this->db->where("updated_at",NULL);
	// 	//$this->db->order_by("created_at");
	// 	return $this->db->get('users')->result();
	// }
}
