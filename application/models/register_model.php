<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{

	public function createAnggota($users){
		$this->db->trans_start();
		$this->db->insert('users',$users);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function createTeam($tim){
		$this->db->trans_start();
		$this->db->insert('tim',$tim);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}	
}
?>