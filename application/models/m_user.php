<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class m_user extends CI_Model
{
	public function getByEmail($email){
		$this->db->where('email',$email);
		$result = $this->db->get('users');
		return $result;
	}

	public function simpanToken($data){
		$this->db->insert('forgot_password', $data);
		return $this->db->affected_rows();
	}

	public function cekToken($token){
		$this->db->where('token',$token);
		$result = $this->db->get('forgot_password');
		return $result;
	}

	public function ubahData($id, $data){
		$this->db->where('id_users', $id);
		return $this->db->update('users', $data);	
	}

}
?>