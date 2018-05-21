<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_team_model extends CI_Model {
	public function getTim(){
		$this->db->select("*");
		$this->db->from("tim");
		$this->db->where("status", "aktif");
		return $this->db->get()->result();
	}

	public function insertTeam($team){
		$this->db->trans_start();
		$this->db->insert('tim',$team);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getAnggota(){
		$this->db->where("users.id_roles",3); 
		return $this->db->get('users')->result(); //get dari DB users
	}

	public function getAnggotaTim($id_team){
		$this->db->join('users','users.id_users=detail_tim.id_users');
		$this->db->join('tim','tim.id_tim=detail_tim.id_tim');
		$this->db->where("tim.id_tim",$id_team); 
		return $this->db->get('detail_tim')->result(); //get dari DB users
	}	

	public function tim($id_team){
		$this->db->select("*");
		$this->db->from("tim");
		$this->db->where('id_tim',$id_team);
		return $this->db->get()->result();
	}
}
