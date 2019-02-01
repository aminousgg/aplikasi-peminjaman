<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		//$this->load->model('M_user');	
	}

    
}