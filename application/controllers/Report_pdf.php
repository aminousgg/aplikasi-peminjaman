
<?php
Class Report_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        //$this->load->library('fpdf');
    }
    
    function pdf_Barang($kat){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Data Barang',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        date_default_timezone_set('Asia/Jakarta');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(30);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(17,6,'Kode',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(40,6,'Nama Barang',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Merk',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(25,6,'Status',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(25,6,'Tgl Masuk',1,0,'C',1);
        
        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        
        if($kat=='k'){
            $kate="kendaraan";
        }elseif($kat=='e'){
            $kate="elektronik";
        }elseif($kat=='l'){
            $kate="lain-lain";
        }elseif($kat=='t'){
            $kate="teknis";
        }elseif($kat=='p'){
            $kate="perpus";
        }else{
            $kate='';
        }
        $brg = $this->db->get_where('barang',array('kategori'=>$kate))->result();
        $i=1;
        foreach ($brg as $row){
            $pdf->SetX(30);
            $pdf->Cell(9,6,$i,1,0,'C');
            $pdf->Cell(17,6,$row->kode_barang,1,0);
            $pdf->Cell(40,6,$row->nama_barang,1,0);
            $pdf->Cell(30,6,$row->merk,1,0);
            if($row->status==1){
                $pdf->Cell(25,6,"Tersedia",1,0,'C');
            }else{
                $pdf->Cell(25,6,"Terpinjam",1,0,'C');
            }
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(25,6,$row->tgl_masuk,1,0,'C');
            $i++;
            $pdf->Ln();
        }
        //echo '<script>print();</script>'; die;  
        $pdf->Output();
        echo '<script>print();</script>';
        
        
    }
    function pdf_anggota(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Daftar Anggota',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        date_default_timezone_set('Asia/Jakarta');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(7);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(7,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(32,6,'NIP',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(52,6,'Nama',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(42,6,'Jabatan',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(20,6,'Golongan',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(20,6,'Bidang',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(22,6,'Tgl Lahir',1,0,'C',1);
        
        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        $agt = $this->db->get('anggota')->result();
        $i=1;
        foreach ($agt as $row){
            $pdf->SetX(7);
            $pdf->Cell(7,6,$i,1,0,'C');
            $pdf->Cell(32,6,$row->nip,1,0);
            $pdf->Cell(52,6,$row->nama,1,0);
            $pdf->Cell(42,6,$row->jabatan,1,0);
            $pdf->Cell(20,6,$row->pangkat_golongan,1,0);
            $pdf->Cell(20,6,$row->seksi,1,0);
            $pdf->Cell(22,6,$row->tgl_lahir,1,0);
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
    function pdf_pinjam(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Data Peminjam',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        date_default_timezone_set('Asia/Jakarta');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'NIP',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(40,6,'Nama Peminjam',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Barang',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(10,6,'Unit',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(25,6,'Estimasi',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Status',1,0,'C',1);
        
        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        $brg = $this->db->get('pinjam_barang')->result();
        $i=1;
        foreach ($brg as $row){
            $pdf->SetX(20);
            $pdf->Cell(9,6,$i,1,0,'C');
            $pdf->Cell(30,6,$row->nip,1,0);
            $pdf->Cell(40,6,$row->nama,1,0);
            $pdf->Cell(30,6,$row->nama_barang,1,0);
            $pdf->Cell(10,6,$row->jml_pinjam,1,0,'C');
            //Our "then" date.
            $then = $row->tgl_kembali;
            //Convert it into a timestamp.
            $then = strtotime($then);
            //Get the current timestamp.
            $now = time();
            //Calculate the difference.
            $difference = $then - $now;
            //Convert seconds into days.
            $days = floor($difference / (60*60*24) )+1;
            //echo $days;
            //echo $days." hari"
            if($days>0){
                $pdf->Cell(25,6,$days." hari",1,0);
            }elseif($days==0){
                $pdf->Cell(25,6,"Hari ini",1,0);
            }else{
                $day=$days*-1;
                $pdf->Cell(25,6,"Lewat ".$day." hari",1,0);
            }
            
            $pdf->Cell(30,6,$row->status,1,0);
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
    
    function pdf_kembali(){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Data Kembali',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        date_default_timezone_set('Asia/Jakarta');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'NIP',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Kode Barang',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(35,6,'Tanggal Pinjam',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(35,6,'Estimasi',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(35,6,'Waktu Kembali',1,0,'C',1);

        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        $brg = $this->db->get('kembali_brg')->result();
        $i=1;
        foreach ($brg as $row){
            $pdf->SetX(20);
            $pdf->Cell(9,6,$i,1,0,'C');
            $pdf->Cell(30,6,$row->nip,1,0);
            $pdf->Cell(30,6,$row->kode_brg,1,0);
            $pdf->Cell(35,6,$row->tgl_pinjam,1,0,'C');
            $pdf->Cell(35,6,$row->estimasi,1,0);
            $pdf->Cell(35,6,$row->wkt_kembali,1,0);
            
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
    function pdf_record($range){
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10,10,10);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'Data Record',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'Dinas Energi Sumber Daya dan Mineral',0,1,'C');
        date_default_timezone_set('Asia/Jakarta');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,date('Y-m-d'),0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1,'');
        $pdf->SetX(13);
        $pdf->SetFont('Arial','B',11);
        
        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(9,6,'No',1,0,'C',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(26,6,'Kode Pinjam',1,0,'L',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(45,6,'Nama',1,0,'L',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(28,6,'Barang',1,0,'L',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(23,6,'jml Pinjam',1,0,'L',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(23,6,'jml Kembali',1,0,'L',1);

        $pdf->SetFillColor(28, 166, 205);
        $pdf->Cell(30,6,'Status',1,0,'L',1);

        $pdf->SetFont('Arial','',11);
        $pdf->Ln();
        if($range==1){
            date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-0 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$rec = $this->db->get('aktifitas_pinjam')->result();
        }elseif($range==7){
            date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-7 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$rec = $this->db->get('aktifitas_pinjam')->result();
        }elseif($range==30){
            date_default_timezone_set('Asia/Jakarta');
			$first_date=new DateTime();
			$first_date=$first_date->modify('-30 day');
			$second_date=date_create(date('Y-m-d'));
			//var_dump($first_date->modify('-2 day')); die;
			$this->db->where('tgl_pjm >=', date_format($first_date,"Y/m/d"));
			$this->db->where('tgl_pjm <=', date_format($second_date,"Y/m/d"));
			$rec = $this->db->get('aktifitas_pinjam')->result();
        }else{
            $rec = $this->db->get('aktifitas_pinjam')->result();
        }
        
        $i=1;
        foreach ($rec as $row){
            $pdf->SetX(13);
            $pdf->Cell(9,6,$i,1,0,'C');
            $pdf->Cell(26,6,$row->kd_pjm,1,0);
            
                $anggota=$this->db->get_where('anggota',array('nip'=>$row->nip));
                $hsl=$anggota->row_array();
                
            $pdf->Cell(45,6,$hsl['nama'],1,0);
                $brg=$this->db->get_where('barang',array('kode_barang'=>$row->kd_brg));
                $hsl1=$brg->row_array();
            $pdf->Cell(28,6,$hsl1['nama_barang'],1,0);
            $pdf->Cell(23,6,$row->jml_pjm,1,0);
            $pdf->Cell(23,6,$row->jml_kmbl,1,0);
            $pdf->Cell(30,6,$row->status,1,0);
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
    
}

