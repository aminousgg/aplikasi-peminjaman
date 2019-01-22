<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		
		// if ($this->session->userdata('username')=="") {
		// 	redirect('login');
		// }
	
		//  else if(!$this->session->userdata('level') =="admin"){
		//  	redirect(base_url("menu/guru"));
		//  }
	}

	function index(){
		$data['judul']="Beranda";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/beranda-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function barang(){
		$data['judul']="Barang";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/barang-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
		function anggota(){
		$data['judul']="Anggota";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/anggota-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function pinjam(){
		$data['judul']="Pinjam";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/pinjam-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function kembali(){
		$data['judul']="Kembali";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/kembali-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function Laporan(){
		$data['judul']="Laporan";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/laporan-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
}
?>
