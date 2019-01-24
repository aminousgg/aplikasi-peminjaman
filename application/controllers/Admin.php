<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_admin');
		
	}
	function index(){
		$data['judul']="Beranda";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/beranda-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function barang(){
		$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
		$data['judul']="Barang";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/barang-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function anggota(){
		$data['tabel_record'] = $this->M_admin->tampil_anggota()->result();
		$data['judul']="Anggota";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/anggota-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
//	function form-anggota(){
//		$data['judul']="FormAnggota";
//		$this->load->view('admin/header-admin',$data);
//		$this->load->view('admin/aside-admin',$data);
//		$this->load->view('admin/form-anggota-admin',$data);
//		$this->load->view('admin/footer-admin',$data);
//	}
	// ===========================Peminjaman==================================
	function pinjam(){
		$data['tabel_record'] = $this->M_admin->tampil_pinjam()->result();
		$data['judul']="Peminjaman";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/pinjam-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function pinjam_barang(){
		$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
		$data['judul']="Peminjaman";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/pilih-pinjam-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function form_pinjam($id){
		$ez=$this->M_admin->ambil_row($id)->row_array();
		$data['sedia']=$ez['jml_tersedia'];
		$data['id']=$id;
		$data['brg']=$ez['nama_barang'];
		$data['judul']="Peminjaman";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-pinjam-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function tambah_pinjam(){
		// date_default_timezone_set('Asia/Jakarta');
		$exp_date = $this->input->post('tgl_kembali');
		$todays_date = $this->input->post('tgl_pinjam'); 
		$today = strtotime($todays_date); 
		$expiration_date = strtotime($exp_date); 
		if ($expiration_date >= $today) { 
			// echo 'Still Active';
			$status="(Aktif) belum kembali";
		} else { 
			// echo 'Time Expired';
			$status="Salah tanggal";
			die;
		}
		$id=$this->input->post('id');
		// var_dump($id); die;
		//$brg=$this->input->post('brg');
		if($status!="Salah tanggal"){
			$data = $this->M_admin->ambil_row($id)->row_array();
			//var_dump($data["jml_tersedia"]); die;
			if($data['jml_tersedia']>=$this->input->post('unit')){
				//var_dump($this->input->post('unit')); die;
				$b=$data['jml_terpinjam'] + $this->input->post('unit');
				$c=$data['jml_tersedia'] - $this->input->post('unit');
				$set = array(
					'jml_terpinjam'	=> $b,
					'jml_tersedia'	=> $c,
				);
				var_dump($set); die;
				$this->db->where('id',$id);
				$result=$this->db->update('barang',$set);
				if($result==true){
					// Tambah data(ambil data anggota)
				}

				//redirect(base_url('admin/pinjam'));
			} else {
				echo "unit tidak cukup untuk di pinjam";
			}
			
			
			$this->db->where('id',$id);
			$result=$this->db->update('barang',$data);
			//habis ini ngeset stok
		}
	}
	// ========================================================================
	function kembali(){
		// $data['tabel_record'] = $this->M_admin->tampil_kembali()->result();
		$data['judul']="Kembali";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/kembali-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function laporan(){
		$data['judul']="Laporan";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/laporan-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
}
