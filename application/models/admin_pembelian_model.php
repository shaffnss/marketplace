<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pembelian_model extends CI_Model {
	public function getPembelian(){
		$this->db->select("*");
		$this->db->from("pembelian");
		$this->db->join("users","pembelian.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("pembelian.status_pembelian","proses");
		$this->db->order_by('pembelian.tgl_pembelian', 'DESC');
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
		$this->db->join("perjanjian","perjanjian.id_pembelian=pembelian.id_pembelian");
		$this->db->where("pembelian.status_pembelian","selesai");
		return $this->db->get()->result();	
	}
	
	public function getPembelianDibatalkan()
	{
		$this->db->select("*");
		$this->db->from("pembelian");
		$this->db->join("users","pembelian.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->join("detail_pembelian","pembelian.id_pembelian=detail_pembelian.id_pembelian", "LEFT");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk", "LEFT");
		$this->db->join("perjanjian","perjanjian.id_pembelian=pembelian.id_pembelian", "LEFT");
		$this->db->where("pembelian.status_pembelian","batal");
		return $this->db->get()->result();	
	}
}
