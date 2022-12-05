-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2022 at 01:11 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(10) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat_dokter` varchar(30) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_poli` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_pengguna`, `nama_dokter`, `alamat_dokter`, `no_tlp`, `jenis_poli`, `status`) VALUES
('111 ', 0, 'Vigero', 'A', '085', 'Umum', 'aktif'),
('2134 ', 0, 'ayu', 'sragi', '093981298', 'Gigi', 'senin'),
('23792 ', 0, 'b', 'bojong', '08978756799', 'Umum', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal_dokter` varchar(50) NOT NULL,
  `id_dokter` varchar(10) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `jadwal_dokter`, `id_dokter`, `jam`) VALUES
(1, 'senin', '111 ', '07:25:40'),
(2, 'selasa', '111 ', '12:26:12'),
(8, '', '242 ', '07:00:00'),
(9, '', '688 ', '00:00:00'),
(10, '', '23244 ', '00:00:00'),
(11, '', '23455 ', '00:00:00'),
(12, '', '3242 ', '00:00:00'),
(13, '', '43234 ', '00:00:00'),
(14, '', '2133 ', '00:00:00'),
(15, '', ' 77776', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `diagnosapenyakit` varchar(50) NOT NULL,
  `jumlahkasus` varchar(30) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_transaksi` varchar(10) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `id_resep` varchar(10) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `nama_poli` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_pengguna`, `nama_pasien`, `tanggal_lahir`, `jekel`, `nama_kk`, `alamat_pasien`, `nama_poli`) VALUES
(2, 2, 'user1', '2004-12-12', 'Perempuan', 'user1', 'user1', NULL),
(3, 0, 'coba ubah', '2003-08-24', 'Laki-laki', 'test', 'test', 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `username`, `password`, `hak_akses`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` bigint(20) NOT NULL,
  `id_pasien` varchar(15) NOT NULL,
  `tanggal_periksa` datetime NOT NULL,
  `shift` varchar(30) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `nama_poli_periksa` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `id_pasien`, `tanggal_periksa`, `shift`, `waktu_daftar`, `nama_poli_periksa`, `status`) VALUES
(9, '2', '2022-11-28 12:24:00', 'Pagi', '2022-11-27 11:24:29', 'Umum', 'selesai'),
(10, '2    ', '2022-11-29 22:18:00', 'Pagi', '2022-12-01 09:18:48', 'KIA/KB', 'proses'),
(12, '3', '2022-12-04 20:32:00', 'Siang', '2022-12-04 07:32:28', 'Gigi', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(15) NOT NULL,
  `alamat_petugas` varchar(20) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` varchar(10) NOT NULL,
  `nama_poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `id_dokter` varchar(10) NOT NULL,
  `data_subjektif` varchar(20) NOT NULL,
  `data_objektif` varchar(20) NOT NULL,
  `diagnosa` varchar(200) NOT NULL,
  `planning` varchar(200) NOT NULL,
  `tanggal_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_pasien`, `id_dokter`, `data_subjektif`, `data_objektif`, `diagnosa`, `planning`, `tanggal_periksa`) VALUES
(36827928, '4667', '111 ', 'mk', 'mk', 'mk', 'mk', '2022-11-25'),
(36827929, '4667', '111 ', 'asd', 'asd', 'addd', 'adasdasd', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `kode` varchar(15) NOT NULL,
  `tanggal` datetime NOT NULL,
  `resep` varchar(15) NOT NULL,
  `id_dokter` varchar(15) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`kode`, `tanggal`, `resep`, `id_dokter`, `id_pasien`, `umur`, `alamat_pasien`, `penerima`) VALUES
('3239', '2022-11-01 11:28:09', 'sirup', 'nama', '4667', '23', 'Konoha Village', 'saya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36827930;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
