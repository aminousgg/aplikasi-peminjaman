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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
		if($cek > 0){
 
			$data_session = array(
				'nama' 		=> $username,
				'status' 	=> "login",
				'level'		=> "admin"
				);
 
			$this->session->set_userdata('admin',$data_session);

			//var_dump($this->session->userdata('admin','status'));die;
 
			redirect(base_url("admin"));
 
		}else{
			$this->session->set_flashdata('error', 'gagal login');
			$this->load->view('admin/login-admin');
		}
	}
	function logout(){
		$this->session->unset_userdata('admin')["nama"];
		$this->session->unset_userdata('admin')["level"];
		$this->session->unset_userdata('admin')["status"];
		//$this->session->sess_destroy('admin');
		redirect(base_url('admin'));
	}
	//======================================================
	// =============================BERANDA=================
	function index(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			$data['judul']="Beranda"; 
			$data['brg'] = $this->db->get('barang')->num_rows();
			$data['agt'] = $this->db->get('anggota')->num_rows();
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
				'merk'					=> $this->input->post('merk'),
				'kategori'			=> $this->input->post('kategori'),
				'tgl_masuk'			=> $this->input->post('tgl_masuk'),
				'jml_terpinjam'	=> 0,
				'spesifikasi'		=> $this->input->post('spesifikasi'),
				'jml_barang'		=> $this->input->post('jml_barang'),
				'jml_tersedia'	=> $this->input->post('jml_barang'),
				'foto'					=> $hasil['file_name'],
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
	function edit_form_barang($id){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
				'merk'					=> $this->input->post('merk'),
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			// Upload
			$config['upload_path'] 		= './admin-lte-master/foto/agt/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->do_upload('file');
			$hasil 	= $this->upload->data();
			//echo $hasil['file_name']; die;
			$data = array(
				'nip'								=> $this->input->post('nip'),
				'nama'							=> $this->input->post('nama'),
				'jabatan'						=> $this->input->post('jabatan'),
				'pangkat_golongan'	=> $this->input->post('pangkat_golongan'),
				'seksi'							=> $this->input->post('seksi'),
				'tgl_lahir'					=> $this->input->post('tgl_lahir'),
				'level_user'				=> $this->input->post('level_user'),
				'foto'							=> $hasil['file_name'],
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			$data['tabel_record'] = $this->M_admin->tampil_pinjam()->result();
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
		$a=0;
		for($i=0;$i<count($this->input->post('kode'));$i++){
			$data = $this->M_admin->ambil_row($this->input->post('kode')[$i])->row_array();
			$angg = $this->M_admin->ambil_anggota($this->input->post('nip1'))->row_array();
			if($data["jml_tersedia"]>=$this->input->post('jml1')[$i]){
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
					'tgl_pinjam'	=> $this->input->post('tgl_pinjam1'),
					'tgl_kembali'	=> $this->input->post('tgl_kembali'),
					'status'		=> "Belum Kembali"
				);
				//var_dump($this->input->post('jml1')); die;
				$masuk=$this->db->insert('pinjam_barang',$in);
				if($masuk==true){
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
					// gagal insert
				}
			}else{
				//jumlah yg  di pinjam terlalu banyak
			}
		}
		
		if($a==count($this->input->post('kode'))){
			$this->session->set_flashdata('success', 'Berhasil Meminjam !');
			redirect(base_url('admin/pinjam'));
		}else{
			$this->session->set_flashdata('error', 'Gagal Mendaftar!');
			redirect(base_url('admin/pinjam'));
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
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
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
	function kembalikan($id){
		// echo $id; die;
		$pinjam = $this->M_admin->ambil_pinjam($id)->row_array();
		if($pinjam==null){
			echo "Peminjam tdk ditemukan";
			die;
		}
		//var_dump($pinjam); die;
		
		//set today
		date_default_timezone_set('Asia/Jakarta');
		$in = array(
			'nip'			=> $pinjam['nip'],
			'kode_brg'		=> $pinjam['kode_barang'],
			'tgl_pinjam'	=> $pinjam['tgl_pinjam'],
			'estimasi'		=> $pinjam['tgl_kembali'],
			'wkt_kembali'	=> date('Y-m-d'),
		);
		$insert=$this->db->insert('kembali_brg',$in);
		if($insert==true){
			$result=$this->db->delete('pinjam_barang',array('id'=>$id));
			if($result==false){
				echo "gagal ada kesalahan sistem";
				die;
			}
			$this->session->set_flashdata('success', 'Pengembalian '.$pinjam['nama']);
			redirect(base_url('admin/kembali'));
					
		}else{
			$this->session->set_flashdata('error', 'Pengembalian '.$pinjam['nama']);
			redirect(base_url('admin/kembali'));
		}

	}

	//=========================================================================
	//===============================LAPORAN===================================
	function laporan(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			$data['judul']="Laporan";
			$this->load->view('admin/header-admin',$data);
			$this->load->view('admin/aside-admin',$data);
			$this->load->view('admin/laporan-admin',$data);
			$this->load->view('admin/footer-admin',$data);
		}else{
			redirect(base_url('admin/login'));
		}
		
	}

	//=============================USER==================
	
}