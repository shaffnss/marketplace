<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_team_model extends CI_Model {
	public function getTim(){
		$this->db->select("*");
		$this->db->from("tim");
		return $this->db->get()->result();
	}

	public function insertTeam($team){
		$this->db->trans_start();
		$this->db->insert('tim',$team);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
}
