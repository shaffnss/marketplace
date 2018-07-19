<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('listProduk_model');
	}

	public function index(){ //fungsi untuk menampilkan produk sesuai kategori
		$data['produks'] = $this->listProduk_model->getProduk();
		$data['kategoris'] = $this->listProduk_model->getKategori();
		$this->load->view('landing/produk', $data);
	}

	public function kategori($id_kategori = ''){
		if($id_kategori == '') {
			redirect('ListProduk');
		}
		$data['produks'] = $this->listProduk_model->getProdukKategori($id_kategori);
		$data['kategoris'] = $this->listProduk_model->getKategori();
		$this->load->view('landing/produk', $data);
	}

	public function search(){
		$nama_produk = $this->input->post('nama_produk');
		$data['produks'] = $this->listProduk_model->getNamaProduk($nama_produk);
		$data['kategoris'] = $this->listProduk_model->getKategori();
		$this->load->view('landing/produk', $data);
	}

	public function detail($id_produk){
		$data['produks'] = $this->listProduk_model->getDetailProduk($id_produk);
		$this->load->view('landing/DetailProduk', $data);
	}
	
	public function keranjang_belanja(){ //menampilkan keranjang
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		$data['cart'] = $this->cart->contents();
		
		//bila login
		if($isLoggedIn) {
			$this->load->view('klien/keranjang', $data);
		}else{ //jika tidak login
			$this->load->view('landing/keranjang',$data);
		}
	}
	
	public function keranjang(){ //fungsi untuk menampilkan detail produk yang dipilih
		$arr = $this->cart->contents();
		$in_cart = false;
		
		foreach ($arr as $item) {
			if ($item['id'] == $this->input->post('id')){
				$in_cart = true;
				break;
			}
		}
		
		if($in_cart == FALSE) {
			$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('nama'),
				'price' => $this->input->post('harga'),
				'gambar' => $this->input->post('gambar'),
				'qty' =>1
			);
			
			$this->cart->insert($data);
		}
		redirect('ListProduk/keranjang_belanja');
	}
	
	public function bayar(){ //fungsi pada button bayar
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		//jika sudah login
		if($isLoggedIn) {
			$cart = $this->cart->contents();
			$total = 0;
			
			//menghitung total
			foreach($cart as $item){
				$total += $item['subtotal'];
				$id_produk = $item['id'];
			}

			$randomstring = random_string('alnum', 6);
			
			//-----INSERT PEMBELIAN-----//
			$data = array(
				'tgl_pembelian' => date('Y-m-d'),
				'total' => $total,
				'id_users' => $this->session->userdata('userId'),
				'kode_pembelian'=>"BY-".strtoupper($randomstring)
			);
			$id_pembelian = $this->listProduk_model->insertPembelian($data); 
			//insert sekaligus get id_pembelian yang barusan dibuat
			
			foreach($cart as $item){
				//-----INSERT DETAIL PEMBELIAN BANYAK BARANG-----//				
				$data2 = array(
					'id_pembelian' => $id_pembelian,
					'id_produk' => $item['id'],
					'qty' => $item['qty']
				);
				$this->db->insert('detail_pembelian', $data2);
			}
			
			//kosongkan keranjang
			$this->cart->destroy();

			redirect('klien_pembayaran');
		}else{
			//jika belum login
			redirect('login');
		}
	}
	
	public function bayarid($rowid){ //fungsi bayar apabila dipilih per produk
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		//jika sudah login
		if($isLoggedIn) {
			$cart = $this->cart->contents();
			$cart = $cart[$rowid];
			$total = 0;

			$randomstring = random_string('alnum', 6);
			
			//-----INSERT PEMBELIAN-----//
			$data = array(
				'tgl_pembelian' => date('Y-m-d'),
				'total' => $cart['price'],
				'id_users' => $this->session->userdata('userId'),
				'kode_pembelian'=>"BY-".strtoupper($randomstring)
			);
			$id_pembelian = $this->listProduk_model->insertPembelian($data); 
			//insert sekaligus get id_pembelian yang barusan dibuat
			
			//-----INSERT DETAIL PEMBELIAN 1 BARANG-----//				
			$data2 = array(
				'id_pembelian' => $id_pembelian,
				'id_produk' => $cart['id'],
				'qty' => $cart['qty']
			);
			$this->db->insert('detail_pembelian', $data2);

			//hapus cart yang sudah dibeli dari keranjang
			$data = array(
				'rowid' => $rowid,
				'qty' =>0
			);
			
			$this->cart->update($data);
			
			redirect('klien_pembayaran');
		}else{
			//jika belum login
			redirect('login');
		}
	}
	
	public function hapus($rowid){ //fungsi button hapus per produk di keranjang
		if ($rowid =="semua"){
			$this->cart->destroy();
		}else{
			$data = array('rowid' => $rowid,
				'qty' =>0);
			$this->cart->update($data);
		}
		redirect('ListProduk/keranjang_belanja');
	}
}
