<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pembelian_model extends CI_Model {
	public function getPembelian(){
		$this->db->select("*");
		$this->db->from("pembelian");
		$this->db->join("users","pembelian.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->join("detail_pembelian","pembelian.id_pembelian=detail_pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->where("users.id_roles",2);
		$this->db->where("pembelian.status_pembelian","proses");
		return $this->db->get()->result();
	}

	public function ubahStatus($id_pembelian, $data)
	{
		$this->db->where('id_pembelian', $id_pembelian);
		return $this->db->update('pembelian', $data);	
	}

	public function getPembelianSelesai()
	{
		$this->db->select("*");
		$this->db->from("pembelian");
		$this->db->join("users","pembelian.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->join("detail_pembelian","pembelian.id_pembelian=detail_pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->where("users.id_roles",2);
		$this->db->where("pembelian.status_pembelian","selesai");
		return $this->db->get()->result();	
	}
}
