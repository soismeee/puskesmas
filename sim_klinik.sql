-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2022 at 01:40 PM
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

--
-- Dumping data for table `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`id_detkon`, `id_konsultasi`, `pesan`, `akses`) VALUES
(1, 'KONSUL2001', 'haloo', 'pasien'),
(2, 'KONSUL2001', 'haii', 'dokter'),
(3, 'KONSUL2001', 'test', 'pasien'),
(4, 'KONSUL2001', 'halo dok', 'pasien'),
(5, 'KONSUL2001', 'tes pesan', 'pasien'),
(7, 'KONSUL2001', 'test dokter', 'pasien');

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
(1, 4, 'test dokter lagi', 'dokter aktif', '123456', 'Gigi', 'aktif'),
(2, 6, 'dokter ridwan kamil', 'pekalongan', '98785765', 'Gigi', 'non_aktif');

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
(1, 'senin', '1', '07:25:40'),
(2, 'selasa', '1', '12:26:12'),
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
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` varchar(255) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal_konsul` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_dokter`, `id_penyakit`, `id_pasien`, `tanggal_konsul`) VALUES
('KONSUL2001', 1, 1, 2, '2022-12-12');

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

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_transaksi`, `jenis_transaksi`, `id_resep`, `jumlah`, `total`) VALUES
('NOTA0001', 'test', '3239', '123', '123');

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
(2, 2, 'Andika', '2004-12-12', 'Perempuan', 'user1', 'user', 'Umum'),
(3, 0, 'testing', '2003-08-24', 'Laki-laki', 'test d', 'test', 'KIA/KB'),
(4, 0, 'test', '1000-12-12', 'Perempuan', 'asd', 'asd', 'Gigi'),
(5, 9, 'coba', '2000-12-12', 'Laki-laki', 'coba', 'coba', NULL);

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
(2, 'test', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'pasien'),
(4, 'dokter sana', 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 'dokter'),
(5, 'hapus yaa', 'hapus', '896108ffe704496149885c995838779b', 'dokter'),
(6, 'dokter ridwan', 'ridwan', 'd584c96e6c1ba3ca448426f66e552e8e', 'dokter'),
(8, 'listi', 'listi', '3dc0c1f3d00f2ca8991c08acef866550', 'admin'),
(9, 'coba', 'coba', 'c3ec0f7b054e729c5a716c8125839829', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `ket_penyakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `ket_penyakit`) VALUES
(1, 'test', 'ubah keterangan');

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

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `id_pasien`, `tanggal_periksa`, `shift`, `waktu_daftar`, `nama_poli_periksa`, `status`) VALUES
('10', '2', '2022-11-29 22:18:00', 'Pagi', '2022-11-29 22:18:00', 'KIA/KB', 'selesai'),
('11', '2', '2022-12-10 14:28:00', 'Siang', '2022-12-10 01:28:29', 'KIA/KB', 'proses'),
('12', '3', '2022-12-04 20:32:00', 'Siang', '2022-12-04 20:32:00', 'Gigi', 'selesai'),
('9', '2', '2022-11-28 12:24:00', 'Pagi', '2022-11-28 12:24:00', 'Umum', 'selesai'),
('PRS2-0010', '2', '2022-12-09 14:32:00', 'Siang', '2022-12-10 01:33:08', 'Gigi', 'proses'),
('PRS2-0011', '2', '2022-12-15 07:38:00', 'Siang', '2022-12-14 06:38:50', 'Gigi', 'proses'),
('PRS9-0012', '5', '2022-12-15 07:40:00', 'Pagi', '2022-12-14 06:40:52', 'Umum', 'proses');

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

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_pasien`, `id_dokter`, `data_subjektif`, `data_objektif`, `diagnosa`, `planning`, `tanggal_periksa`) VALUES
('RM0001', '2', '1', 'test', 'okeeeeeee', 'test ffff', 'test lagi', '2022-12-08'),
('RM0002', '3', '2', 'oke ff', 'sdkajsd', 'oke gg', 'oke', '2022-12-02');

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
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`kode`, `id_rm`, `tanggal`, `resep`, `id_dokter`, `id_pasien`, `umur`, `alamat_pasien`, `penerima`) VALUES
('3239', 'RM0002', '2022-11-01', 'sirup', '1', '2', '23', 'tes lagi', 'testing'),
('RS3240', 'RM0001', '2022-12-13', 'test simpan', '1', '2', '18', 'pekalongan', 'Andika');

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
  MODIFY `id_detkon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
