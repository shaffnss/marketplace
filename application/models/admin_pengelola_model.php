<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pengelola_model extends CI_Model {
	public function getPengelola(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","pengelola");
		//$this->db->where("status_users", "aktif");
		return $this->db->get()->result();
	}

	public function insertPengelola($pengelola){
		$this->db->trans_start();
		$this->db->insert('users',$pengelola);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getPengelolaTidakAktif(){
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("status_users","nonaktif");
		$this->db->order_by("nama_roles");
		return $this->db->get('users')->result();
	}

	public function getJadisuperadmin($id_users, $id_admin){
		$data['id_roles'] = 4;
		$this->db->where('id_users', $id_admin);
		$this->db->update('users', $data);

		$data['id_roles'] = 1;
		$this->db->where('id_users', $id_users);
		$this->db->update('users', $data);
	}

	
}
