<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Regadminsipirang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_admin');
		$this->load->model('M_login');
		
    }

    function dftr($nip){
        $cek=$this->db->get_where('anggota',array('nip'=>$nip));
        $cekAkun=$this->db->get_where('akun_admin',array('username'=>$nip));
        if($cekAkun->num_rows()>0){
            echo "akun anda sudah terdaftar";
            die;
        }
        if($cek->num_rows()>0){
            // $data['token']=$token;
            if($this->input->post('reg')==null){
                $data['usr']=$nip;
                $this->load->view('admin/reg/register',$data);
            }else{
                // aksi
                $in = array(
                    'username'  => $nip,
                    'level_user'=> "admin",
                    'password'  => md5($this->input->post('pwd')),
                    'token'     => md5($nip),
                    'status'    => 1,
                );
                $res=$this->db->insert('akun_admin',$in);
                if($res==true){
                    $this->session->set_flashdata('success', 'Berhasil Mendaftar');
				    redirect(base_url('admin/login'));
                }else{
                    $this->session->set_flashdata('error', 'Gagal Mendaftar');
				    redirect(base_url('admin/login'));
                }
            }
			
        }else{
            echo "nip Tidak di temukan";
        }
    }
}