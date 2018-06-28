<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{

	public function createKlien($users){
		$this->db->trans_start();
		$this->db->insert('users',$users);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

}
?>