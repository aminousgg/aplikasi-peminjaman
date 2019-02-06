<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_admin');
		
	}
	// =============================BERANDA===============
	function index(){
		$data['judul']="Beranda";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/beranda-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	//=====================================================
	// ==============================BARANG================
	function barang(){
		$data['tabel_record'] = $this->M_admin->tampil_barang()->result();
		$data['judul']="Barang";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/barang-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function tambah_barang(){
		$data['judul']="Barang";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-barang-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}

	function tambah_barang_aksi(){
		$kode = rand(1000,9999);
		$kode_barang = (string)$kode;
		$data = array(
			'kode_barang'	=> $kode_barang,
			'nama_barang'	=> $this->input->post('nama_barang'),
			'merk'			=> $this->input->post('merk'),
			'tgl_masuk'		=> $this->input->post('tgl_masuk'),
			'jml_terpinjam'	=> 0,
			'spesifikasi'	=> $this->input->post('spesifikasi'),
			'jml_barang'	=> $this->input->post('jml_barang'),
			'jml_tersedia'	=> $this->input->post('jml_barang'),
		);
		$result=$this->M_admin->tambah_brg('barang', $data);
		if($result==true){
			$this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
			redirect(base_url('admin/barang'));
		}else{
			$this->session->set_flashdata('error', 'Gagal ditambahkan');
			redirect(base_url('admin/barang'));
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
		$data['brg']=$this->M_admin->get_brg($id)->row_array();
		//var_dump($data['brg']); die;
		$data['judul']="Barang";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-barang-edit-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	//==========================================================================
	//======================================ANGGOTA=============================
	function anggota(){
		$data['tabel_record'] = $this->M_admin->tampil_anggota()->result();
		$data['judul']="Anggota";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/anggota-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function form_anggota(){
		$data['judul']="Anggota";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-anggota-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function tambah_agt_aksi(){
		$data = array(
			'nip'				=> $this->input->post('nip'),
			'nama'				=> $this->input->post('nama'),
			'jabatan'			=> $this->input->post('jabatan'),
			'pangkat_golongan'	=> $this->input->post('pangkat_golongan'),
			'seksi'				=> $this->input->post('seksi'),
			'tgl_lahir'			=> $this->input->post('tgl_lahir'),
			'level_user'		=> $this->input->post('level_user'),
		);
		$result=$this->M_admin->tambah_agt('anggota', $data);
		if($result==true){
			$this->session->set_flashdata('success', 'Anggota berhasil ditambahkan');
			redirect(base_url('admin/anggota'));
		}else{
			$this->session->set_flashdata('error', 'Gagal ditambahkan');
			redirect(base_url('admin/anggota'));
		}
	}
	function edit_form_anggota($id){
		$data['angg']=$this->M_admin->get_form_anggota($id)->row_array();
		$data['judul']="Anggota";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-anggota-edit-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}

	//=========================================================================
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
	function get_anggota($nip){
		$kode=$nip;
		$data=$this->M_admin->get_anggota($kode);
		if($data->num_rows()>0){
			$hasil=$data->row_array();
			echo json_encode($hasil);
		}else{
			echo "nip salah"; die;
		}
        
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
	function edit_form_pinjam($id){
		$data['judul']="EditPeminjaman";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/form-pinjam-edit-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}
	function tambah_pinjam(){
		
		// date_default_timezone_set('Asia/Jakarta');
		//var_dump($this->input->post('tgl_pinjam1')); die;
		//var_dump($this->input->post('nama1')); die;
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
				$nip=$this->input->post('nip');
				$angg = $this->M_admin->ambil_anggota($nip)->row_array();
				//var_dump($this->input->post('nip')); die;
				if($angg==null){
					echo "NIP tidak Ditemukan";
					die;
				}
				//var_dump($id); die;
				$this->db->where('id',$id);
				$result=$this->db->update('barang',$set);
				if($result==true){
					// Tambah data(ambil data anggota)
					// var_dump($angg);
					$in = array(
						'nip'			=> $nip,
						'nama'			=> $this->input->post('nama1'),
						'jabatan'		=> $angg['jabatan'],
						'seksi'			=> $angg['seksi'],
						'kode_barang'	=> $data['kode_barang'],
						'nama_barang'	=> $this->input->post('brg1'),
						'jml_pinjam'	=> $this->input->post('unit'),
						'tgl_pinjam'	=> $this->input->post('tgl_pinjam1'),
						'tgl_kembali'	=> $this->input->post('tgl_kembali'),
						'status'		=> $status
					);
					//var_dump($in); die;
					$masuk=$this->db->insert('pinjam_barang',$in);
					
					if($masuk==true){
						//echo "Berhasil Meminjam";
						$this->session->set_flashdata('success', 'Berhasil Meminjam !');
						//var_dump(base_url()); die;
						redirect(base_url('admin/pinjam'));
					}else{
						$this->session->set_flashdata('error', 'Gagal Mendaftar!');
						redirect(base_url('admin/pinjam'));
					}
				}else{
					$this->session->set_flashdata('gagal', 'error set stok');
					redirect(base_url('admin/pinjam'));
				}

				//redirect(base_url('admin/pinjam'));
			} else {
				echo "unit tidak cukup untuk di pinjam";
			}
			
		}
	}
	// ========================================================================
	//==================================PENGEMBALIAN===========================
	function kembali(){
		$data['tabel_record'] = $this->M_admin->tampil_kembali()->result();
		$data['judul']="Kembali";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/kembali-admin',$data);
		$this->load->view('admin/footer-admin',$data);
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
		$data['judul']="Laporan";
		$this->load->view('admin/header-admin',$data);
		$this->load->view('admin/aside-admin',$data);
		$this->load->view('admin/laporan-admin',$data);
		$this->load->view('admin/footer-admin',$data);
	}

	//=============================USER==================
	//=============================BERANDA===============
	function index2(){
		$data['judul']="BerandaUser";
		$this->load->view('user/header-user',$data);
		$this->load->view('user/body-user',$data);
		$this->load->view('user/footer-user',$data);
	}
}