-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 04:16 AM
-- Server version: 10.1.28-MariaDB
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
-- Table structure for table `aktifitas_pinjam`
--

CREATE TABLE `aktifitas_pinjam` (
  `id` int(11) NOT NULL,
  `kd_pjm` varchar(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kd_brg` varchar(5) NOT NULL,
  `tgl_pjm` date NOT NULL,
  `estimate_kmbl` date NOT NULL,
  `tgl_kmbl` date NOT NULL,
  `ptgs_pjm` varchar(30) NOT NULL,
  `ptg_kmbl` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktifitas_pinjam`
--

INSERT INTO `aktifitas_pinjam` (`id`, `kd_pjm`, `nip`, `kd_brg`, `tgl_pjm`, `estimate_kmbl`, `tgl_kmbl`, `ptgs_pjm`, `ptg_kmbl`, `status`) VALUES
(65, '7569', '88776', '3252', '2019-03-13', '2019-03-20', '2019-04-05', 'admin', '', 'Kembali'),
(66, '7569', '88776', '4046', '2019-03-13', '2019-03-20', '0000-00-00', 'admin', '-', 'Belum Kembali'),
(67, '7569', '88776', '6107', '2019-03-13', '2019-03-20', '2019-03-14', 'admin', '', 'Kembali'),
(68, '7569', '88776', '5301', '2019-03-13', '2019-03-20', '2019-04-05', 'admin', '', 'Kembali'),
(69, '7569', '88776', '1130', '2019-03-13', '2019-03-20', '2019-04-05', 'admin', '', 'Kembali'),
(70, '3881', '33667', '5136', '2019-04-04', '2019-04-11', '2019-04-04', 'admin', 'Marni Styani', 'Kembali'),
(71, '3881', '33667', '2271', '2019-04-04', '2019-04-11', '2019-04-04', 'admin', 'Marni Styani', 'Kembali'),
(72, '9858', '66672', '8492', '2019-04-04', '2019-04-11', '2019-04-05', '66672', 'Marni Styani', 'Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
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
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `level_user`, `password`, `token`, `status`) VALUES
(1, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, '11001', 'petugas', '827ccb0eea8a706c4c34a16891f84e7b', '64254db8396e404d9223914a0bd355d2', 1),
(5, '66672', 'admin', 'b0baee9d279d34fa1dfd71aadb908c3f', 'f9454bdf67218089cace948e7da7d88e', 1),
(7, '339999', 'petugas', 'b0baee9d279d34fa1dfd71aadb908c3f', 'bb7b09568bf8641dfb1fcac2992f50c7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
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
-- Dumping data for table `anggota`
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
(12, '66672', 'Marni Styani', 'Keuangan', '4/d', 'Sekretariat', '1992-09-17', 'drow1.jpg'),
(13, '443321', 'Mahmud Dwi Yanto', 'EBT', '4/c', 'Sekretariat', '1983-11-08', ''),
(14, '334421', 'Maryanto S', 'Keuangan', '4/a', 'Sekretariat', '1991-05-19', 'A11201610010.jpg'),
(15, '339999', 'Dody Setiawan', 'Kepala EBT', '4/a', 'Sekretariat', '1998-12-12', 'A11_2016_099361.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `merk`, `kategori`, `tgl_masuk`, `spesifikasi`, `status`, `foto`) VALUES
(29, '8492', 'Kompas', 'gigabit', 'teknis', '2019-02-21', 'anti magnet', 1, 'logo_1.jpg'),
(30, '1130', 'Buku Kimia', 'Gmedia', 'perpus', '2019-02-21', '300 halaman', 1, 'texture-red-brick-wall.jpg'),
(31, '2271', 'Gelas', 'BBC', 'lain-lain', '2019-02-26', 'kaca', 0, 'warna1.jpg'),
(32, '5136', 'Flasdisk', 'Sandisk', 'elektronik', '2019-03-10', '4 GB', 0, 'pilihan.png'),
(33, '6107', 'asfa', 'asfasdf', 'lain-lain', '2019-03-06', 'afasfsdf', 0, 'img_bg_1.jpg'),
(34, '3252', 'asd', 'sdasdadas', 'teknis', '0000-00-00', 'asdfsdfadsfasdfsd', 0, 'Screenshot_(3).png'),
(35, '5301', 'asfaasf', 'asdfsfs', 'lain-lain', '0000-00-00', 'asfasdf asdf', 0, 'Screenshot_(12).png'),
(37, '7043', 'Komputer', 'asus', 'elektronik', '2019-04-06', 'ram 4gb', 1, 'jabat-tangan-ilustrasi-_151221');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `tgl`, `nama`, `email`, `isi`) VALUES
(1, '2019-04-15', 'dsafdsaf', 'afds@gmail.com', 'sdfsdf asxdcvf dfv'),
(2, '2019-04-17', 'dfgdffd', 'afds@gmail.com', 'dfvb fdsb vxfd '),
(4, '2019-04-30', 'asdcsdcasx ', 'axvcsadsafdkjb@gmail.com', 'asdgvfdv  sdzfbsdfbv sdfghbsdfg sfdhbsdfhgads egrssdfv');

-- --------------------------------------------------------

--
-- Table structure for table `kembali_brg`
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
-- Dumping data for table `kembali_brg`
--

INSERT INTO `kembali_brg` (`id`, `nip`, `kode_brg`, `tgl_pinjam`, `estimasi`, `wkt_kembali`, `petugas_kmbl`) VALUES
(52, '33667', '8492', '2019-02-21', '2019-02-28', '2019-02-21', 'admin'),
(53, '99887', '8492', '2019-02-21', '2019-02-28', '2019-02-21', 'admin'),
(54, '33667', '8492', '2019-02-26', '2019-03-05', '2019-02-26', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kembali_brg`
--
ALTER TABLE `kembali_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
