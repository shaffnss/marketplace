<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class RegisterAnggota_m extends CI_Model{

	public function createAnggota($users, $ktm, $nim){
		$this->db->trans_start();
		$this->db->insert('users',$users);
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

	public function createTeam($tim){
		$this->db->trans_start();
		$this->db->insert('tim',$tim);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}


}
?>