<?php 
class M_admin extends CI_Model{

	// ambil barang
	function tampil_barang(){
		return $this->db->get('barang');
	}
	function tampil_pinjam(){
		return $this->db->get('pinjam_barang');
	}
	function tampil_anggota(){
		return $this->db->get('anggota');
	}

}

?>