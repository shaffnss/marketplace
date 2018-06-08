<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_pembayaran_m extends CI_Model {

	public function getPembelian($id_users){
		$this->db->select("*");
		$this->db->select("pembelian.id_pembelian as idPembelian");
		$this->db->from("pembelian");
		$this->db->join("detail_pembelian","pembelian.id_pembelian=detail_pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->join("kategori_produk","kategori_produk.id_kategori=produk.id_kategori");
		$this->db->join("perjanjian","perjanjian.id_pembelian=pembelian.id_pembelian", "left");
		// $this->db->join("kategori_perjanjian","kategori_perjanjian.id_kategori=perjanjian.id_kategori");
		// $this->db->join("detail_produk","detail_produk.id_produk=produk.id_produk");
		// $this->db->join("detail_tim","users.id_users=detail_tim.id_users");
		// $this->db->join("tim","tim.id_tim=detail_tim.id_tim");
		$this->db->where("pembelian.status_pembelian","proses");
		$this->db->where("pembelian.id_users", $id_users);
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
	
	public function cekPembelian($id_pembelian){
		$this->db->where('id_pembelian', $id_pembelian);
		return $this->db->get('pembelian')->row();
	}

	public function insertBukti($pembelian){
		$this->db->trans_start();
		$this->db->insert('pembelian',$pembelian);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getInvoice($id_pembelian){
		$this->db->select("*");
		$this->db->from("pembelian");
		$this->db->join("users","users.id_users=pembelian.id_users");
		$this->db->join("detail_pembelian","detail_pembelian.id_pembelian=pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->join("kategori_produk","kategori_produk.id_kategori=produk.id_kategori");
		$this->db->where('pembelian.id_pembelian', $id_pembelian);
		return $this->db->get()->result();
	}

	public function getPembayaran(){
		$this->db->select("*");
		$this->db->from("pembelian");
		// $this->db->join("users","users.id_users=pembelian.id_users");
		$this->db->join("detail_pembelian","detail_pembelian.id_pembelian=pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->join("kategori_produk","kategori_produk.id_kategori=produk.id_kategori");
		return $this->db->get()->result();
	}
}