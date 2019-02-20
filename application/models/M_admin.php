<?php 
class M_admin extends CI_Model{
	// ambil barang
	function tampil_barang(){
		return $this->db->get('barang');
	}
	function tambah_brg($table,$data){
		return $this->db->insert($table, $data);
	}
	function tampil_anggota(){
		return $this->db->get('anggota');
	}
	function tambah_agt($table,$data){
		return $this->db->insert($table, $data);
	}
	function tampil_pinjam(){
		return $this->db->get('pinjam_barang');
	}
	function ambil_row($id){
		return $this->db->get_where('barang',array('kode_barang'=>$id));
	}
	function ambil_anggota($nip){
		return $this->db->get_where('anggota',array('nip'=>$nip));
	}
	function ambil_pinjam($id){
		return $this->db->get_where('pinjam_barang',array('id'=>$id));
	}
	function get_anggota($nama){
		$hsl=$this->db->get_where('anggota',array('nama'=>$nama));
		return $hsl;
	}
	function get_form_anggota($id){
		$hsl=$this->db->get_where('anggota',array('id'=>$id));
		return $hsl;
	}
	function get_brg($id){
		$hsl=$this->db->get_where('barang',array('id'=>$id));
		return $hsl;
    }

	function tampil_kembali(){
		return $this->db->get('kembali_brg');
	}

	function tampil_rec(){
		return $this->db->get('aktifitas_pinjam');
	}
}
?>