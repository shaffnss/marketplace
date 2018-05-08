<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_anggota_model extends CI_Model {
	public function getAnggota(){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->where("roles.nama_roles","anggota");
		$this->db->where_in("users.status_users",array('aktif','tidak_aktif'));
		return $this->db->get()->result();
	}

	public function UbahStatus($id_users)
	{
		$this->db->select("status");
		$this->db->from("users");
		$this->db->where("id_users",$id_users);
		$status=$this->db->get()->row();
		if ($status->status=='tidak_aktif'){
			$status->status='aktif';
		}
		else {
			$status->status='tidak_aktif';
		}
		$this->db->where("id_users",$id_users);
		return $this->db->update("users",$status);

	}

	public function insertKlien($anggota){
		$this->db->trans_start();
		$this->db->insert('users',$anggota);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
	
}
