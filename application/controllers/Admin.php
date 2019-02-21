<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_admin');
		$this->load->model('M_login');
		
	}

	//==============================LOGIN & LOGOUT===================
	function login(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			redirect(base_url('admin'));
		}
		else{
			$this->load->view('admin/login-admin');
		}
	}
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//var_dump($username);die;
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->M_login->cek_login("akun_admin",$where)->num_rows();
		$level = $this->M_login->cek_login("akun_admin",$where)->row_array();
		if($cek > 0){
			if($level['level_user']=="admin"){
				$data_session = array(
					'nama' 		=> $username,
					'status' 	=> "login",
					'level'		=> "admin"
					);
				$this->session->set_userdata('admin',$data_session);
				//var_dump($this->session->userdata('admin','status'));die;
				redirect(base_url("admin"));
			}else{
				if($level['status']==1){
					$data_session = array(
						'nama' 		=> $username,
						'status' 	=> "login",
						'level'		=> "petugas"
						);
					$this->session->set_userdata('petugas',$data_session);
					//var_dump($this->session->userdata('admin','status'));die;
					redirect(base_url("admin"));
				}else{
					$link="admin/aktifasi/".md5($username);
					redirect(base_url($link));
				}
				
			}
			
 
		}else{
			$this->session->set_flashdata('error', 'gagal login');
			$this->load->view('admin/login-admin');
		}
	}
	function aktifasi($token){
		$cek=$this->db->get_where('akun_admin',array('token'=>$token));
		if($cek->num_rows()>0){
			if($this->input->post('login')==null){
				$data['token']=$token;
				$this->load->view('admin/aktifasi',$data);
			}else{
				$p_lama=md5($this->input->post('pwd_lama'));
				$ha=$this->db->get_where('akun_admin',array('password'=>$p_lama));
				if($ha->num_rows()>0){
					$data = array(
						'password'			=> md5($this->input->post('pwd_baru1')),
						'status'			=> 1,
					);
					$this->db->where('token',$token);
					$result=$this->db->update('akun_admin',$data);
					if($result==true){
						$usr=$cek->row_array();
						$data_session = array(
							'nama' 		=> $usr['username'],
							'status' 	=> "login",
							'level'		=> "petugas"
							);
						$this->session->set_userdata('petugas',$data_session);
						//var_dump($this->session->userdata('admin','status'));die;
						redirect(base_url("admin"));

					}else{
						$this->session->set_flashdata('error', 'Gagal Mengubah');
						$link="admin/aktifasi/".$token;
						redirect(base_url($link));
					}

				}else{
					$this->session->set_flashdata('error', 'Pass lama salah');
					$link="admin/aktifasi/".$token;
					redirect(base_url($link));
				}
			}

			
		}else{
			echo "salah url bos";
		}
		
	}
	function logout(){
		if($this->session->unset_userdata('admin')["nama"]!=null){
			$this->session->unset_userdata('admin')["nama"];
			$this->session->unset_userdata('admin')["level"];
			$this->session->unset_userdata('admin')["status"];
		}
		else{
			$this->session->unset_userdata('petugas')["nama"];
			$this->session->unset_userdata('petugas')["level"];
			$this->session->unset_userdata('petugas')["status"];
		}
		//$this->session->sess_destroy('admin');
		redirect(base_url('admin'));
	}
	//======================================================
	// =============================BERANDA=================
	function index(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){

			$data['judul']="Beranda"; 
			$data['brg'] = $this->db->get('barang')->num_rows();
			$data['agt'] = $this->db->get('anggota')->num_rows();
			$data['aggt'] = $this->db->get('anggota')->result();
			$data['pinjam'] = $this->db->get('pinjam_barang')->num_rows();
			$data['kembali'] = $this->db->get('kembali_brg')->num_rows();
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/beranda-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
			
	}
	//=====================================================
	// ==============================BARANG================
	function barang(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
			$data['aktif']='';
			$data['judul']="Barang";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/barang-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function brg_kat($kat){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			//$this->db->get_where('barang', array('kategori'=>'kendaraan'))->result();
			if($kat=="kendaraan"){
				$data['aktif']='k';
			}elseif($kat=="elektronik"){
				$data['aktif']='e';
			}elseif($kat=="lain-lain"){
				$data['aktif']='l';
			}elseif($kat=="teknis"){
				$data['aktif']='t';
			}elseif($kat=="perpus"){
				$data['aktif']='p';
			}else{
				$data['aktif']='';
			}
			$data['tabel_record'] = $this->db->get_where('barang', array('kategori'=>$kat))->result();
			$data['judul']="Barang";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/barang-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}



	function tambah_barang(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['judul']="Barang";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/form-barang-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}

	function tambah_barang_aksi(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$kode = rand(1000,9999);
			$kode_barang = (string)$kode;

			$config['upload_path'] 		= './admin-lte-master/foto/barang/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->do_upload('file');
			$hasil = $this->upload->data();

			$data = array(
				'kode_barang'		=> $kode_barang,
				'nama_barang'		=> $this->input->post('nama_barang'),
				'merk'				=> $this->input->post('merk'),
				'kategori'			=> $this->input->post('kategori'),
				'tgl_masuk'			=> $this->input->post('tgl_masuk'),
				'jml_terpinjam'		=> 0,
				'spesifikasi'		=> $this->input->post('spesifikasi'),
				'jml_barang'		=> $this->input->post('jml_barang'),
				'jml_tersedia'		=> $this->input->post('jml_barang'),
				'foto'				=> $hasil['file_name'],
			);
			$result=$this->M_admin->tambah_brg('barang', $data);
			if($result==true){
				$this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
				redirect(base_url('admin/barang'));
			}else{
				$this->session->set_flashdata('error', 'Gagal ditambahkan');
				redirect(base_url('admin/barang'));
			}

		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function unit(){
		$update=$this->input->post('asli')+$this->input->post('unit');
		$sedia=$this->input->post('sedia')+$this->input->post('unit');
		$data=array(
			'jml_barang'	=> $update,
			'jml_tersedia'	=> $sedia,
		);
		$this->db->where('id',$this->input->post('id'));
		$result=$this->db->update('barang',$data);
		if($result==true){
			$this->session->set_flashdata('success', 'Unit Berhasil ditambah');
			redirect(base_url('admin/barang'));
		}else{
			$this->session->set_flashdata('error', 'Gagal Menambah');
			redirect(base_url('admin/barang'));
		}
		
	}
	function unitmin(){
		$update=$this->input->post('asli')-$this->input->post('unit');
		$sedia=$this->input->post('sedia')-$this->input->post('unit');
		$data=array(
			'jml_barang'	=> $update,
			'jml_tersedia'	=> $sedia,
		);
		$this->db->where('id',$this->input->post('id'));
		$result=$this->db->update('barang',$data);
		if($result==true){
			$this->session->set_flashdata('success', 'Unit Berhasil dikurangi');
			redirect(base_url('admin/barang'));
		}else{
			$this->session->set_flashdata('error', 'Gagal mengurangi');
			redirect(base_url('admin/barang'));
		}
		
	}
	function edit_form_barang($id){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['brg']=$this->M_admin->get_brg($id)->row_array();
			//var_dump($data['brg']); die;
			$data['judul']="Barang";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/form-barang-edit-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function edit_brg(){
		if($this->input->post('cek')=="tdkada"){
			$id=$this->input->post('id');
			$data = array(
				'nama_barang'		=> $this->input->post('nama_barang'),
				'merk'				=> $this->input->post('merk'),
				'kategori'			=> $this->input->post('kategori'),
				'tgl_masuk'			=> $this->input->post('tgl_masuk'),
				'spesifikasi'		=> $this->input->post('spesifikasi'),
			);
			$this->db->where('id',$id);
			$result=$this->db->update('barang',$data);
			if($result==true){
				$this->session->set_flashdata('success', 'Update Berhasil');
				redirect(base_url('admin/barang'));
			}else{
				$this->session->set_flashdata('error', 'Gagal Ubah');
				redirect(base_url('admin/anggota'));
			}

		}else{
			$config['upload_path'] 		= './admin-lte-master/foto/barang/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->do_upload('file');
			$hasil = $this->upload->data();
			$id=$this->input->post('id');
			$data=array(
				'foto'	=>	$hasil['file_name'],
			);
			$this->db->where('id',$id);
			$result=$this->db->update('barang',$data);
			if($result==true){
				$this->session->set_flashdata('success', 'Update Berhasil');
				redirect(base_url('admin/barang'));
			}else{
				$this->session->set_flashdata('error', 'Gagal Ubah');
				redirect(base_url('admin/barang'));
			}
		}
	}

	function hapus_barang($id){
		//echo $id; die;
		$result=$this->db->delete('barang',array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/barang'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/barang'));
		}
		//redirect('admin/news');
	}
	//==========================================================================
	//======================================ANGGOTA=============================
	function anggota(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_anggota()->result();
			$data['judul']="Anggota";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/anggota-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function form_anggota(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['judul']="Anggota";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/form-anggota-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function tambah_agt_aksi(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			// Upload
			$config['upload_path'] 		= './admin-lte-master/foto/agt/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->do_upload('file');
			$hasil 	= $this->upload->data();
			//echo $hasil['file_name']; die;
			$data = array(
				'nip'				=> $this->input->post('nip'),
				'nama'				=> $this->input->post('nama'),
				'jabatan'			=> $this->input->post('jabatan'),
				'pangkat_golongan'	=> $this->input->post('pangkat_golongan'),
				'seksi'				=> $this->input->post('seksi'),
				'tgl_lahir'			=> $this->input->post('tgl_lahir'),
				'foto'				=> $hasil['file_name'],
			);
			$result=$this->M_admin->tambah_agt('anggota', $data);
			if($result==true){
				$this->session->set_flashdata('success', 'Anggota berhasil ditambahkan');
				redirect(base_url('admin/anggota'));
			}else{
				$this->session->set_flashdata('error', 'Gagal ditambahkan');
				redirect(base_url('admin/anggota'));
			}
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function edit_form_anggota($id){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['angg']=$this->M_admin->get_form_anggota($id)->row_array();
			$data['judul']="Anggota";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/form-anggota-edit-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function edit_agt(){
		if($this->input->post('cek')=="tdkada"){
			//var_dump($this->input->post('cek')); die;
			$id=$this->input->post('id');
			$data=array(
				'nip'				=> $this->input->post('nip'),
				'nama'				=> $this->input->post('nama'),
				'jabatan'			=> $this->input->post('jabatan'),
				'pangkat_golongan'	=> $this->input->post('pangkat_golongan'),
				'seksi'				=> $this->input->post('seksi'),
				'tgl_lahir'			=> $this->input->post('tgl_lahir'),
				'level_user'		=> $this->input->post('level_user'),
			);
			$this->db->where('id',$id);
			$result=$this->db->update('anggota',$data);
			if($result==true){
				$this->session->set_flashdata('success', 'Update Berhasil');
				redirect(base_url('admin/anggota'));
			}else{
				$this->session->set_flashdata('error', 'Gagal Ubah');
				redirect(base_url('admin/anggota'));
			}

		}else{
			$config['upload_path'] 		= './admin-lte-master/foto/agt/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->do_upload('file');
			$hasil = $this->upload->data();
			$id=$this->input->post('id');
			$data=array(
				'foto'	=>	$hasil['file_name'],
			);
			$this->db->where('id',$id);
			$result=$this->db->update('anggota',$data);
			if($result==true){
				$this->session->set_flashdata('success', 'Update Berhasil');
				redirect(base_url('admin/anggota'));
			}else{
				$this->session->set_flashdata('error', 'Gagal Ubah');
				redirect(base_url('admin/anggota'));
			}
		}
	}

	function daftar_ptgs(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['judul']="Anggota";
			$data['tabel_record'] = $this->M_admin->tampil_anggota()->result();
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/daftar-petugas',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	function petugas($nip){
		$pwdDefault="12345";
		$data = array(
			'username'		=> $nip,
			'level_user'	=> "petugas",
			'password'		=> md5($pwdDefault),
			'token'			=> md5($nip),
			'status'		=> 0,
		);
		$result=$this->db->insert('akun_admin', $data);
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil');
			redirect(base_url('admin/anggota'));
		}else{
			$this->session->set_flashdata('error', 'Gagal');
			redirect(base_url('admin/anggota'));
		}

	}

	function hapus_anggota($id){
		//echo $id; die;
		$result=$this->db->delete('anggota',array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/anggota'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/anggota'));
		}
		//redirect('admin/news');
	}

	//=========================================================================
	// ===========================Peminjaman==================================
	function pinjam(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_pinjam()->result();
			//var_dump($data['tabel_record'][0]); die;
			$data['judul']="Peminjaman";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/pinjam-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	function pinjam_barang(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
			$data['judul']="Peminjaman";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/pilih-pinjam-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function get_anggota($nama){
		$nm=urldecode($nama);
		$data=$this->M_admin->get_anggota($nm);
		if($data->num_rows()>0){
			$hasil=$data->row_array();
			echo json_encode($hasil);
		}else{
			echo "nama Tdk Ketemu";
		}
        
	}
	function get_foto($kode){
		$foto=$this->db->get_where('barang',array('kode_barang'=>$kode));
	}
	function form_pinjam(){
		$list=json_decode($this->input->post('list'));
		// var_dump($list); die;
		$data['angg'] = $this->db->get('anggota')->result();
		$data['brg']=$list;
		$data['judul']="Peminjaman";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-pinjam-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function inPinjam(){
		$kodePinjam = rand(1000,9999);
		$zzz=0; //ceking
		for($i=0;$i<count($this->input->post('kode'));$i++){
			$data = $this->M_admin->ambil_row($this->input->post('kode')[$i])->row_array();
			if($data["jml_tersedia"]>=$this->input->post('jml1')[$i]){
				$zzz++;
			}
		}
		//var_dump(count($this->input->post('kode'))); die;
		if($zzz==count($this->input->post('kode'))){
			// lakukan
			$a=0;
			for($i=0;$i<count($this->input->post('kode'));$i++){
				$data = $this->M_admin->ambil_row($this->input->post('kode')[$i])->row_array();
				$angg = $this->M_admin->ambil_anggota($this->input->post('nip1'))->row_array();
					//var_dump($data); die;
				$in = array(
					'kd_pinjam'		=> $kodePinjam,
					'nip'			=> $this->input->post('nip1'),
					'nama'			=> $this->input->post('nama'),
					'jabatan'		=> $angg['jabatan'],
					'seksi'			=> $angg['seksi'],
					'kode_barang'	=> $this->input->post('kode')[$i],
					'nama_barang'	=> $this->input->post('brg1')[$i],
					'jml_pinjam'	=> $this->input->post('jml1')[$i],
					'tgl_pinjam'	=> $this->input->post('tgl_pinjam'),
					'tgl_kembali'	=> $this->input->post('tgl_kembali'),
					'petugas'		=> $this->input->post('petugas'),
					'status'		=> "Belum Kembali"
				);
				$time = strtotime('00/00/0000');
				$noltime = date('Y-m-d',$time);
				$inAktifitas = array(
					'kd_pjm'	=> $kodePinjam,
					'nip'		=> $this->input->post('nip1'),
					'kd_brg'	=> $this->input->post('kode')[$i],
					'jml_pjm'	=> $this->input->post('jml1')[$i],
					'jml_kmbl'	=> 0,
					'tgl_pjm'	=> $this->input->post('tgl_pinjam'),
					'estimate_kmbl'	=> $this->input->post('tgl_kembali'),
					'ptgs_pjm'	=> $this->input->post('petugas'),
					'ptg_kmbl' => "-",
					'status'	=> "Belum Kembali"
				);
				//var_dump($this->input->post('jml1')); die;
				$masuk=$this->db->insert('pinjam_barang',$in);
				$masuk1=$this->db->insert('aktifitas_pinjam',$inAktifitas);
				if($masuk==true&&$masuk1==true){
					$b=$data['jml_terpinjam'] + $this->input->post('jml1')[$i];
					$c=$data['jml_tersedia'] - $this->input->post('jml1')[$i];
					$set = array(
						'jml_terpinjam'	=> $b,
						'jml_tersedia'	=> $c,
					);
					//var_dump($set); die;
					$this->db->where('kode_barang',$this->input->post('kode')[$i]);
					$result=$this->db->update('barang',$set);
					if($result==true){
						$a++;
					}else{
						echo "gagal";
					}
				}else{
					$this->session->set_flashdata('error', 'error Dalam Proses menambah!');
					redirect(base_url('admin/pinjam'));
				}
			}
			
			if($a==count($this->input->post('kode'))){
				$this->session->set_flashdata('success', $kodePinjam);
				redirect(base_url('admin/pinjam'));
			}else{
				$this->session->set_flashdata('error', 'Gagal Meminjam!');
				redirect(base_url('admin/pinjam'));
			}

		}else{
			// jumlah brg terlalu bnyk
		}
		
	}
	function tambah_pinjam(){
		
		date_default_timezone_set('Asia/Jakarta');
		$exp_date = $this->input->post('tgl_kembali');
		$todays_date = $this->input->post('tgl_pinjam1'); 
		$today = strtotime($todays_date); 
		$expiration_date = strtotime($exp_date); 
		if ($expiration_date >= $today) { 
			// echo 'Still Active';
			$status="Belum Kembali";
		} else { 
			// echo 'Time Expired';
			$this->session->set_flashdata('error', 'Salah Tanggal');
			$id=$this->input->post('id');
			redirect(base_url('admin/form_pinjam/'.$id));
			$status="Salah tanggal";
			//echo $status;
			//die;
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
				//var_dump($set); die;
				$nip = $this->input->post('nip1');
				$angg = $this->M_admin->ambil_anggota($nip)->row_array();
				//var_dump($this->input->post('nip')); die;
				if($angg==null){
					echo "NIP tidak Ditemukan";
					die;
				}
				$this->db->where('id',$id);
				$result=$this->db->update('barang',$set);
				if($result==true){
					$in = array(
						'nip'			=> $nip,
						'nama'			=> $this->input->post('nama'),
						'jabatan'		=> $angg['jabatan'],
						'seksi'			=> $angg['seksi'],
						'kode_barang'	=> $data['kode_barang'],
						'nama_barang'	=> $this->input->post('brg1'),
						'jml_pinjam'	=> $this->input->post('unit'),
						'tgl_pinjam'	=> $this->input->post('tgl_pinjam1'),
						'tgl_kembali'	=> $this->input->post('tgl_kembali'),
						'status'		=> $status
					);
					$masuk=$this->db->insert('pinjam_barang',$in);
					
					if($masuk==true){
						$this->session->set_flashdata('success', 'Berhasil Meminjam !');
						redirect(base_url('admin/pinjam'));
					}else{
						$this->session->set_flashdata('error', 'Gagal Mendaftar!');
						redirect(base_url('admin/pinjam'));
					}
				}else{
					$this->session->set_flashdata('gagal', 'error set stok');
					redirect(base_url('admin/pinjam'));
				}

				
			} else {
				echo "unit tidak cukup untuk di pinjam";
			}
			
		}
	}
	// ========================================================================
	//==================================PENGEMBALIAN===========================
	function kembali(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_kembali()->result();
			$data['judul']="Kembali";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/kembali-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}
	function list_kmbl($kode_pjm){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$cekjml=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$kode_pjm))->num_rows();
			if($cekjml<1){
				echo "tidak ditemukan transaksi pemnijaman"; die;
			}

			$data['tabel_record']=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$kode_pjm))->result();
			$data['row']=$this->db->get_where('aktifitas_pinjam', array('kd_pjm'=>$kode_pjm))->row_array();
			$data['judul']="Kembali";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/list-kembalikan',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}

	function kembalikan($id){
		//echo $id; die;
		if($this->session->userdata('admin')!=null){
			$petugas=$this->session->userdata('admin')['nama'];
		}else{
			$petugas=$this->session->userdata('petugas')['nama'];
		}
		//
		$pinjam = $this->M_admin->ambil_pinjam($id)->row_array();
		//var_dump($pinjam['kode_barang']); die;
		if($pinjam==null){
			echo "Peminjam tdk ditemukan";
			die;
		}
		date_default_timezone_set('Asia/Jakarta');
		$in = array(
			'nip'			=> $pinjam['nip'],
			'kode_brg'		=> $pinjam['kode_barang'],
			'tgl_pinjam'	=> $pinjam['tgl_pinjam'],
			'estimasi'		=> $pinjam['tgl_kembali'],
			'wkt_kembali'	=> date('Y-m-d'),
			'petugas_kmbl'	=> $petugas,
		);
		$insert=$this->db->insert('kembali_brg',$in);
		//$nipPetugas=$this->db->get_where('anggota',array('nama'=>$petugas))->row_array();
		//var_dump($nipPetugas); die;
		$inAkt = array(
			'jml_pjm'	=> 0,
			'jml_kmbl'	=> $pinjam['jml_pinjam'],
			'tgl_kmbl'	=> date('Y-m-d'),
			'ptg_kmbl'	=> $petugas,
			'status'	=> "Telah Kembali"
		);
		$dimana = array('kd_pjm' => $pinjam['kd_pinjam'], 'nip' => $pinjam['nip'], 'kd_brg' => $pinjam['kode_barang']);
		$this->db->where($dimana); 	
		$res=$this->db->update('aktifitas_pinjam',$inAkt);
		if($insert==true&&$res==true){
			$result=$this->db->delete('pinjam_barang',array('id'=>$id));
			if($result==false){
				echo "gagal ada kesalahan sistem";
				die;
			}
			// set jml tersedia
			$ambilbrg=$this->db->get_where('barang',array('kode_barang'=>$pinjam['kode_barang']))->row_array();

			$on=array(
				'jml_terpinjam'=>$ambilbrg['jml_terpinjam']-$pinjam['jml_pinjam'],
				'jml_tersedia'=>$ambilbrg['jml_tersedia']+$pinjam['jml_pinjam']
			);
			$brg=$this->db->where(array('kode_barang'=>$pinjam['kode_barang']));
			$r=$this->db->update('barang',$on);
			if($r==false){
				echo "set barang gagal"; die;
			}
			$cekjml=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$pinjam['kd_pinjam']))->num_rows();
			if($cekjml>0){
				$this->session->set_flashdata('success', 'Pengembalian '.$pinjam['nama_barang']);
				redirect(base_url('admin/list_kmbl/'.$pinjam['kd_pinjam']));
			}else{
				$this->session->set_flashdata('success1', 'Pengembalian '.$pinjam['nama_barang']);
				redirect(base_url('admin/pinjam'));
			}		
		}else{
			$this->session->set_flashdata('error', 'Pengembalian '.$pinjam['nama_barang']);
			redirect(base_url('admin/list_kmbl/'.$pinjam['kd_pinjam']));
		}
	}


	// ===================================================================================
	// ===============================================RECORD============================
	function record(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			// date_default_timezone_set('Asia/Jakarta');
			// $first_date=new DateTime();
			// $first_date=$first_date->modify('-1 day');
			// $second_date=date_create(date('Y-m-d'));
			// //var_dump($first_date->modify('-2 day')); die;
			// $this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			// $this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			// $data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			$data['a']='';
			$data['judul']="Record";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/record',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	function recordbulan(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			//$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-30 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			$data['a']='b';
			$data['judul']="Record";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/record',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	function recordminggu(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			//$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-1 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			$data['a']='m';
			$data['judul']="Record";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/record',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	function recordhari(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			//$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-0 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$data['tabel_record'] = $this->db->get('aktifitas_pinjam')->result();
			$data['a']='h';
			$data['judul']="Record";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/record',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}


	// ===============================================PRINT BARANG============================
	function print_barang(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
			$data['judul']="Record";
			$this->load->view('admin/print/head-print',$data);
			$this->load->view('admin/print/barang-print',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	
	// ===============================================PRINT ANGGOTA============================
	function print_anggota(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_anggota()->result();
			$data['judul']="Record";
			$this->load->view('admin/print/head-print',$data);
			$this->load->view('admin/print/anggota-print',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	// ===============================================PRINT PINJAM============================
	function print_pinjam(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_pinjam()->result();
			$data['judul']="Record";
			$this->load->view('admin/print/head-print',$data);
			$this->load->view('admin/print/pinjam-print',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}

	// ===============================================PRINT KEMBALI============================
	function print_kembali(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_kembali()->result();
			$data['judul']="Record";
			$this->load->view('admin/print/head-print',$data);
			$this->load->view('admin/print/kembali-print',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	// ===============================================PRINT RECORD============================
	function print_rec(){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record'] = $this->M_admin->tampil_rec()->result();
			$data['judul']="Record";
			$this->load->view('admin/print/head-print',$data);
			$this->load->view('admin/print/record-print',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
	// ===============================================PRINT FORM============================
	function print_form($kode_pjm){
		if($this->session->userdata('admin')["status"] == "login" || $this->session->userdata('petugas')["status"] == "login"){
			$data['tabel_record']=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$kode_pjm))->result();
			$data['row']=$this->db->get_where('aktifitas_pinjam', array('kd_pjm'=>$kode_pjm))->row_array();
			$data['judul']="Record";
			$this->load->view('admin/print/head-print',$data);
			$this->load->view('admin/print/form-print',$data);
		}else{
			redirect(base_url('admin/login'));
		}
	}
}