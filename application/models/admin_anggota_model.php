<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_anggota_model extends CI_Model {
	public function getAnggota(){
		$this->db->select("*");
		$this->db->select("users.id_users as idu");
		$this->db->from("users");
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->join("detail_anggota","users.id_users=detail_anggota.id_users",'left');
		$this->db->where("roles.nama_roles","anggota");
		$this->db->where("status_users", "aktif");
		// return $this->db->get()->result();
		return $this->db->get()->result_array();
	}

	public function insertAnggota($anggota, $ktm){
		$this->db->trans_start();
		$this->db->insert('users',$anggota);
		$insert_id = $this->db->insert_id();
		// id_users = $insert_id
		$data = array(
			'ktm' => $ktm,
			'id_users' => $insert_id
		) ;
		$this->db->insert('detail_anggota', $data) ; //data ktm
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

	public function getAktivasi(){;
		$this->db->join("roles","users.id_roles=roles.id_roles");
		$this->db->join("detail_anggota","users.id_users=detail_anggota.id_users",'left');
		$this->db->where("users.updated_at",NULL);
		$this->db->where("roles.nama_roles","anggota");
		$this->db->where("users.status_users","nonaktif");
		//$this->db->order_by("created_at");
		return $this->db->get('users')->result();
	}


}
