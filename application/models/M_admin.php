<?php 
class M_admin extends CI_Model{

	// ambil barang
	function tampil_barang(){
		return $this->db->get('barang');
	}
}

?>