<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_anggota_model extends CI_Model {
	public function getAnggota(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","anggota");
		$this->db->where("status_users", "aktif");
		// return $this->db->get()->result();
		return $this->db->get()->result_array();
	}

	public function insertAnggota($anggota){
		$this->db->trans_start();
		$this->db->insert('users',$anggota);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
	public function getPosisi(){
		$this->db->select("*");
		$this->db->from("posisi_tim");
		return $this->db->get()->result();
	}

	public function insertPosisi($posisi){
		$this->db->trans_start();
		$this->db->insert('posisi_tim',$posisi);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

}
