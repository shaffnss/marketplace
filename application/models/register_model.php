<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model{

	public function createKlien($users){
		$this->db->trans_start();
		$this->db->insert('users',$users);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function cekEmail($email){
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email',$email);

		$query= $this->db->get();

		return $query;
	}

	public function changeActiveState($key){
		$this->load->database();
		$data= array(
			'validasi' => '1',
			'status_users' => 'aktif'
		);
		$this->db->where('md5(id_users)', $key);
		$this->db->update('users', $data);
		return true;
	}

}
?>