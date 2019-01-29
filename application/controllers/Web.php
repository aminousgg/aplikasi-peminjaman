<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Web extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		//$this->load->model('M_user');
		
	}
	function index(){
		$data['judul']="Beranda";
		$this->load->view('user/header-user',$data);
		$this->load->view('user/body-user',$data);
		$this->load->view('user/footer-user',$data);
		
	}

}