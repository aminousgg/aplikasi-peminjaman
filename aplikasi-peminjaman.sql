-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Feb 2019 pada 13.00
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
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

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
  `level_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nip`, `nama`, `jabatan`, `pangkat_golongan`, `seksi`, `tgl_lahir`, `level_user`) VALUES
(1, '45355', 'asdfdff', 'dfgddad', 'asfgaas', 'asdf', '1950-01-02', 'admin'),
(2, '56451', 'asdf ads', 'asdf', 'sdf', 'asdf afsd', '1980-01-17', 'user'),
(3, '55555', 'Nur Amin', 'ffff', 'gg', 'asd', '2019-01-29', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_terpinjam` int(4) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `jml_barang` int(4) NOT NULL,
  `jml_tersedia` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `merk`, `tgl_masuk`, `jml_terpinjam`, `spesifikasi`, `jml_barang`, `jml_tersedia`) VALUES
(2, '4545', 'adfasdas', 'sfdh', '2019-01-02', 10, 'sdfga', 11, 1),
(3, '4444', 'Motor', 'Honda', '2019-01-28', 1, 'asfda fdds sdsf', 10, 9),
(4, '5374', 'Monitor', 'LG', '2019-01-29', 0, 'dssadf dsa LED', 8, 8);

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
  `wkt_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kembali_brg`
--

INSERT INTO `kembali_brg` (`id`, `nip`, `kode_brg`, `tgl_pinjam`, `estimasi`, `wkt_kembali`) VALUES
(1, '45355', '4545', '2019-01-27', '2019-01-29', '2019-02-05'),
(2, '45355', '456', '2019-01-27', '2019-01-30', '2019-02-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `seksi` varchar(20) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_pinjam` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id`, `nip`, `nama`, `jabatan`, `seksi`, `kode_barang`, `nama_barang`, `jml_pinjam`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(7, '56451', 'asdf ads', 'asdf', 'asdf afsd', '456', 'asfsadf', 1, '2019-01-27', '2019-01-31', 'Belum Kembali'),
(8, '56451', 'asdf ads', 'asdf', 'asdf afsd', '456', 'asfsadf', 1, '2019-01-27', '2019-02-01', 'Belum Kembali'),
(9, '45355', 'asdfdff', 'dfgddad', 'asdf', '456', 'asfsadf', 1, '2019-01-28', '2019-02-09', 'Belum Kembali'),
(10, '55555', 'Nur Amin', 'ffff', 'asd', '4444', 'Motor', 1, '2019-02-06', '2019-02-09', 'Belum Kembali');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kembali_brg`
--
ALTER TABLE `kembali_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
