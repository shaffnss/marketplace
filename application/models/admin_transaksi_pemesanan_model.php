<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_transaksi_pemesanan_model extends CI_Model {
	public function getTransaksiPemesanan()
	{
		$this->db->select("*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("users.id_roles",2);
		return $this->db->get()->result();
	}

	public function ubahStatus($id_pemesanan, $data)
	{
		$this->db->where('id_pemesanan', $id_pemesanan);
		return $this->db->update('pemesanan', $data);	
	}

	public function getStatusProses()
	{
		$this->db->select("users.*,pemesanan.status_pembayaran,pemesanan.*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("users.id_roles",2);
		$this->db->where("pemesanan.status_pembayaran","proses");
		return $this->db->get()->result();	
	}

	public function getStatusSelesai()
	{
		$this->db->select("users.*,pemesanan.status_pembayaran,pemesanan.*");
		$this->db->from("pemesanan");
		$this->db->join("users","pemesanan.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->where("users.id_roles",2);
		$this->db->where("pemesanan.status_pembayaran","selesai");
		return $this->db->get()->result();	
	}

}
