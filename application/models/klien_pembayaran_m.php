<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class klien_pembayaran_m extends CI_Model {

	public function getPembelian(){
		$this->db->select("*");
		$this->db->from("pembelian");
		$this->db->join("users","pembelian.id_users=users.id_users");
		$this->db->join("roles","roles.id_roles=users.id_roles");
		$this->db->join("detail_pembelian","pembelian.id_pembelian=detail_pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->join("kategori_produk","kategori_produk.id_kategori=produk.id_kategori");
		$this->db->join("perjanjian","perjanjian.id_pembelian=pembelian.id_pembelian");
		$this->db->join("kategori_perjanjian","kategori_perjanjian.id_kategori=perjanjian.id_kategori");
		$this->db->join("detail_produk","detail_produk.id_produk=produk.id_produk");
		$this->db->join("tim","tim.id_tim=detail_produk.id_tim");
		$this->db->where("pembelian.status_pembelian","proses");
		return $this->db->get()->result();
	}

	public function getPerjanjian(){
		$this->db->where('status', 'aktif');
		return $this->db->get('kategori_perjanjian')->result();
	}
	
	public function cekPerjanjian($id_pembelian){
		$this->db->where('id_pembelian', $id_pembelian);
		return $this->db->get('perjanjian')->row();
	}

	public function insertBukti($pembelian, $id_pembelian){
		$this->db->where('id_pembelian',$id_pembelian);
		return $this->db->update('pembelian', $pembelian);
	}
}