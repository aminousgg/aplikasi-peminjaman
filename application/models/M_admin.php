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

	function tampil_rec($range){
		if($range=="all"){
			return $this->db->get('aktifitas_pinjam');
		}elseif($range=="h"){
			date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-0 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$rec = $this->db->get('aktifitas_pinjam');
			return $rec;
		}elseif($range=="m"){
			date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-7 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$rec = $this->db->get('aktifitas_pinjam');
			return $rec;
		}elseif($range=="b"){
			date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-30 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$rec = $this->db->get('aktifitas_pinjam');
			return $rec;
		}
		
	}
}
?>