-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 05:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_anggota`
--

INSERT INTO `tabel_anggota` (`id_anggota`, `nama_anggota`, `kelas`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(1, 'Nabila Cahyani ', 'XI RPL 2', 'perempuan', '083116677022', 'Langensari, Kota Banjar 1'),
(2, 'Ayu Rustriningsih', 'XI RPL 2', 'perempuan', '087825172600', 'Bantardawa'),
(3, 'Hilda Liasti', 'XI RPL 2', 'perempuan', '085703148807', 'Padaemut'),
(4, 'Dewi Novita Sari', 'XI RPL 2', 'perempuan', '085703288786', 'Padaemut'),
(7, 'Naila', 'XI APHP 2', 'Perempuan', '087654321567', 'Langensari, Kota Banjar');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_buku`
--

CREATE TABLE `tabel_buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `jenis_buku` enum('Fiksi','Non fiksi') NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_buku`
--

INSERT INTO `tabel_buku` (`id_buku`, `nama_buku`, `jenis_buku`, `penulis_buku`, `penerbit_buku`) VALUES
(1, 'Mariposa', 'Non fiksi', 'Luluk HF', 'Coconut Book'),
(2, 'Matematika', 'Fiksi', 'Sari Rahayu', 'PT Reading Book'),
(5, 'Administration', 'Non fiksi', 'Intan puspita', 'PT Media');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_peminjaman`
--

CREATE TABLE `tabel_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `tanggal_pinjam` varchar(15) NOT NULL,
  `tanggal_kembali` varchar(15) NOT NULL,
  `tanggal_pengembalian` varchar(20) NOT NULL,
  `telat` varchar(25) NOT NULL,
  `denda` varchar(20) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `petugas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_peminjaman`
--

INSERT INTO `tabel_peminjaman` (`id_peminjaman`, `nama_peminjam`, `kelas`, `nama_buku`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_pengembalian`, `telat`, `denda`, `jumlah_pinjam`, `petugas`) VALUES
(1, 'Mentari ', 'XI AKL 1', 'Administration', '04/05/2021', '05/05/2021', '10/05/2021', '5 Hari', 'Rp.50.000', 0, 'Ibu Henny Wahyu'),
(2, 'Nabila', 'XI RPL 2', 'Mariposa', '05/05/2021', '10/05/2021', '10/05/2021', '-', '-', 1, 'Ibu Henny'),
(3, 'coba', 'x rpl 2', 'Mariposa2', '2021-05-04', '2021-05-17', '125151', '5', '1000000', 1000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `alamat_user` text NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `level` enum('pengurus','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `nama_user`, `alamat_user`, `no_hp`, `level`) VALUES
(1, 'admin', '123', 'admin', 'langensari', '085712126196', 'pengurus'),
(3, 'pengguna', '123', 'pengguna', 'langensari', '082121588972', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tabel_peminjaman`
--
ALTER TABLE `tabel_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_peminjaman`
--
ALTER TABLE `tabel_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
