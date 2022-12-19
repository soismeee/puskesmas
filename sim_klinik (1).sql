-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2022 at 08:06 AM
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
-- Table structure for table `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_detkon` int(11) NOT NULL,
  `id_konsultasi` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat_dokter` varchar(30) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_poli` varchar(10) NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_pengguna`, `nama_dokter`, `alamat_dokter`, `no_tlp`, `jenis_poli`, `status`) VALUES
(1, 2, 'Drs. Andriana', 'pekalongan selatan kota pekalo', '08837634623', 'KIA/KB', 'aktif');

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

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` varchar(255) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal_konsul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 3, 'pasien', '2000-12-12', 'Laki-laki', 'pasien', 'pekalongan', 'KIA/KB');

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
(1, 'Administrator', 'admin', '$2y$10$ZpI1lRU3ByHhHwblPxRFTehNee7zrp/eaLPG4gXSQMWmEabvwJjfu', 'admin'),
(2, 'Drs. Andriana', 'dokter', '$2y$10$UviD6atkkDkNazzGu1kBSuepq/5vWZ3Xmx1hL8viFLtHvlYAq2Gf.', 'dokter'),
(3, 'pasien', 'pasien', '$2y$10$qQfoQMl0s1scvJ09GyW6iuVsv6MawwAxV5v9L6frKcf4HGXEFx0WG', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `ket_penyakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` varchar(255) NOT NULL,
  `id_pasien` varchar(15) NOT NULL,
  `tanggal_periksa` datetime NOT NULL,
  `shift` varchar(30) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `nama_poli_periksa` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_rm` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `id_dokter` varchar(10) NOT NULL,
  `data_subjektif` varchar(20) NOT NULL,
  `data_objektif` varchar(20) NOT NULL,
  `diagnosa` varchar(200) NOT NULL,
  `planning` varchar(200) NOT NULL,
  `tanggal_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `kode` varchar(15) NOT NULL,
  `id_rm` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `resep` varchar(15) NOT NULL,
  `id_dokter` varchar(15) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD PRIMARY KEY (`id_detkon`);

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
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

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
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

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
-- AUTO_INCREMENT for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  MODIFY `id_detkon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
