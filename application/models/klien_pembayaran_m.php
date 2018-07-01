<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_pembayaran_m extends CI_Model {

	public function getPembelian($id_users){
		$this->db->select("*");
		$this->db->select("pembelian.id_pembelian as idPembelian");
		$this->db->from("pembelian");
		$this->db->join("perjanjian","perjanjian.id_pembelian=pembelian.id_pembelian", "left");
		$this->db->where("pembelian.status_pembelian","proses");
		$this->db->where("pembelian.id_users", $id_users);
		$this->db->order_by("timestamp", "DESC");
		return $this->db->get()->result();
	}
	
	public function getPembelianSelesai($id_users){
		$this->db->select("*");
		$this->db->select("pembelian.id_pembelian as idPembelian");
		$this->db->from("pembelian");
		$this->db->join("perjanjian","perjanjian.id_pembelian=pembelian.id_pembelian", "left");
		$this->db->where("pembelian.status_pembelian","selesai");
		$this->db->where("pembelian.id_users", $id_users);
		$this->db->order_by("timestamp", "DESC");
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
	
	public function uploadBukti($data, $id_pembelian){
		$this->db->where('id_pembelian',$id_pembelian);
		return $this->db->update('pembelian',$data);
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

	public function getPembayaran($id_pembelian){
		$this->db->select("*");
		$this->db->from("pembelian");
		//$this->db->join("users","users.id_users=pembelian.id_users");
		$this->db->join("detail_pembelian","detail_pembelian.id_pembelian=pembelian.id_pembelian");
		$this->db->join("produk","produk.id_produk=detail_pembelian.id_produk");
		$this->db->join("kategori_produk","kategori_produk.id_kategori=produk.id_kategori");
		$this->db->where('pembelian.id_pembelian', $id_pembelian);
		return $this->db->get()->result();
	}
}