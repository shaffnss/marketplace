<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_bank_model extends CI_Model {
	public function getBank(){
		return $this->db->get('bank')->result();
	}
	
	public function tambahBank($data){
		return $this->db->insert('bank', $data);
	}
	
	public function editBank($data, $id_bank){
		$this->db->where('id_bank', $id_bank);
		return $this->db->update('bank', $data);
	}
}
