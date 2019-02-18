-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Feb 2019 pada 03.20
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi-peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktifitas_pinjam`
--

CREATE TABLE `aktifitas_pinjam` (
  `id` int(11) NOT NULL,
  `kd_pjm` varchar(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `jml_pjm` int(4) NOT NULL,
  `jml_kmbl` int(4) NOT NULL,
  `tgl_pjm` date NOT NULL,
  `estimate_kmbl` date NOT NULL,
  `tgl_kmbl` date NOT NULL,
  `ptgs_pjm` varchar(30) NOT NULL,
  `ptg_kmbl` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aktifitas_pinjam`
--

INSERT INTO `aktifitas_pinjam` (`id`, `kd_pjm`, `nip`, `kd_brg`, `jml_pjm`, `jml_kmbl`, `tgl_pjm`, `estimate_kmbl`, `tgl_kmbl`, `ptgs_pjm`, `ptg_kmbl`, `status`) VALUES
(31, '7063', '33667', '2812', 1, 0, '2019-02-17', '2019-02-18', '0000-00-00', '11001', '-', 'Belum Kembali'),
(32, '7063', '33667', '5097', 1, 0, '2019-02-17', '2019-02-18', '0000-00-00', '11001', '-', 'Belum Kembali'),
(33, '7063', '33667', '7302', 0, 1, '2019-02-17', '2019-02-18', '2019-02-17', '11001', '11001', 'Telah Kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `level_user` varchar(7) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `level_user`, `password`, `token`, `status`) VALUES
(1, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, '11001', 'petugas', '827ccb0eea8a706c4c34a16891f84e7b', '64254db8396e404d9223914a0bd355d2', 1),
(3, '99005', 'petugas', 'b0baee9d279d34fa1dfd71aadb908c3f', 'be548e4593c60a91f0b9efcd28742167', 1),
(5, '66672', 'admin', 'b0baee9d279d34fa1dfd71aadb908c3f', 'f9454bdf67218089cace948e7da7d88e', 1),
(7, '339999', 'petugas', 'b0baee9d279d34fa1dfd71aadb908c3f', 'bb7b09568bf8641dfb1fcac2992f50c7', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pangkat_golongan` varchar(30) NOT NULL,
  `seksi` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nip`, `nama`, `jabatan`, `pangkat_golongan`, `seksi`, `tgl_lahir`, `foto`) VALUES
(4, '11001', 'Marwan Sunar', 'Kelistrikan', '4/a', 'Sekretariat', '1980-08-09', 'drow.jpg'),
(5, '99005', 'Akhmad Budiman', 'Minerba', '3/c', 'Sekretariat', '1992-06-01', ''),
(6, '88776', 'Manto Widodo', 'Program', '4/a', 'Sekretariat', '1986-07-08', ''),
(7, '88990', 'Marzuki Rido', 'Keuangan', '4/d', 'Sekretariat', '1991-06-21', ''),
(8, '33667', 'Sudirman Wahab', 'Kepegawean/Umum', '3/a', 'Sekretariat', '1989-12-08', ''),
(9, '99887', 'Nisya Purnamasari', 'EBT', 'Non', 'Sekretariat', '1994-12-09', ''),
(10, '55442', 'Tugiman Slamet', 'Program', '4/b', 'Sekretariat', '1980-12-20', ''),
(11, '99655', 'Handayani S', 'Kelistrikan', '3/a', 'Sekretariat', '1995-09-09', ''),
(12, '66672', 'Marni Styani', 'Keuangan', '4/d', 'Sekretariat', '1992-09-17', ''),
(13, '443321', 'Mahmud Dwi Yanto', 'EBT', '4/c', 'Sekretariat', '1983-11-08', ''),
(14, '334421', 'Maryanto S', 'Keuangan', '4/a', 'Sekretariat', '1991-05-19', 'A11201610010.jpg'),
(15, '339999', 'Dody Setiawan', 'Kepala EBT', '4/a', 'Sekretariat', '1998-12-12', 'A11_2016_099361.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_terpinjam` int(4) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `jml_barang` int(4) NOT NULL,
  `jml_tersedia` int(4) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `merk`, `kategori`, `tgl_masuk`, `jml_terpinjam`, `spesifikasi`, `jml_barang`, `jml_tersedia`, `foto`) VALUES
(9, '9668', 'Mobil', 'Honda Brio', 'Kendaraan', '2019-02-07', 0, 'Tahun 2017', 3, 3, ''),
(10, '6587', 'Motor Matic', 'Honda Beat', 'Kendaraan', '2019-02-07', 0, '110 cc Tahun 2016', 4, 4, 'Honda-Beat1.jpeg'),
(11, '4345', 'Kamera Dron', 'Canon', 'Elektonik', '2019-02-06', 0, 'Lensa 12 mm', 2, 2, ''),
(12, '4981', 'Printer', 'Epson', 'Elektonik', '2019-02-07', 0, 'E300', 10, 10, ''),
(13, '2396', 'Monitor', 'BenQ', 'Elektonik', '2019-02-05', 0, '16 inci', 4, 4, ''),
(14, '7680', 'Kursi', '-', 'Prabotan', '2019-02-07', 0, 'Kursi audience', 25, 25, ''),
(15, '6132', 'Meteran', '-', 'Lain-lain', '2019-02-01', 0, 'Ukuran 500 m', 20, 20, ''),
(16, '7015', 'Tang Ampere', 'Simbada', 'Lain-lain', '2019-02-07', 0, 'Max 10 ampere', 7, 7, ''),
(17, '7566', 'Distance Meter', '-', 'Lain-lain', '2019-02-07', 0, '5 Meter', 5, 5, ''),
(18, '2812', 'Gas Detector', 'Hitaci', 'Lain-lain', '2019-02-01', 1, 'Detect 100 m', 3, 2, ''),
(19, '7302', 'Helm', 'INK', 'Lain-lain', '2019-02-04', 1, 'SNI', 10, 9, ''),
(20, '2139', 'Kompas', '-', 'Lain-lain', '2019-01-29', 0, 'Kompas 4 inci', 10, 10, ''),
(21, '5097', 'GPS', 'Nokia', 'Lain-lain', '2019-02-05', 1, '5 inci', 4, 3, ''),
(22, '4691', 'Motor', 'Honda SupraX', 'Kendaraan', '2019-02-08', 0, '125 cc', 2, 2, 'sampleMotor.jpg'),
(23, '9550', 'Motor', 'Yamaha Mio', 'Kendaraan', '0000-00-00', 0, 'Tahun 2016', 3, 3, '6903-woman-darkness.jpg'),
(24, '7569', 'Lemari', 'Olimpic', 'Lain-lain', '2019-02-18', 0, '2x4 meter', 4, 4, 'logo_esdm.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali_brg`
--

CREATE TABLE `kembali_brg` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `estimasi` date NOT NULL,
  `wkt_kembali` date NOT NULL,
  `petugas_kmbl` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kembali_brg`
--

INSERT INTO `kembali_brg` (`id`, `nip`, `kode_brg`, `tgl_pinjam`, `estimasi`, `wkt_kembali`, `petugas_kmbl`) VALUES
(43, '33667', '7302', '2019-02-17', '2019-02-18', '2019-02-17', '11001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id` int(11) NOT NULL,
  `kd_pinjam` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `seksi` varchar(20) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_pinjam` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `petugas` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id`, `kd_pinjam`, `nip`, `nama`, `jabatan`, `seksi`, `kode_barang`, `nama_barang`, `jml_pinjam`, `tgl_pinjam`, `tgl_kembali`, `petugas`, `status`) VALUES
(54, '7063', '33667', 'Sudirman Wahab', 'Kepegawean/Umum', 'Sekretariat', '2812', 'Gas Detector', 1, '2019-02-17', '2019-02-18', '11001', 'Belum Kembali'),
(55, '7063', '33667', 'Sudirman Wahab', 'Kepegawean/Umum', 'Sekretariat', '5097', 'GPS', 1, '2019-02-17', '2019-02-18', '11001', 'Belum Kembali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktifitas_pinjam`
--
ALTER TABLE `aktifitas_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `kembali_brg`
--
ALTER TABLE `kembali_brg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktifitas_pinjam`
--
ALTER TABLE `aktifitas_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kembali_brg`
--
ALTER TABLE `kembali_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
