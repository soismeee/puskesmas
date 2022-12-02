-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2022 pada 12.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

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
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(10) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat_dokter` varchar(30) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_poli` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `alamat_dokter`, `no_tlp`, `jenis_poli`, `status`, `username`, `password`) VALUES
('111 ', 'Vigero', 'A', '085', 'Umum', 'aktif', '', ''),
('2134 ', 'ayu', 'sragi', '093981298', 'Gigi', 'senin', '', ''),
('23792 ', 'b', 'bojong', '08978756799', 'Umum', 'tidak aktif', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `jadwal_dokter` varchar(50) NOT NULL,
  `id_dokter` varchar(10) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_dokter`
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
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `diagnosapenyakit` varchar(50) NOT NULL,
  `jumlahkasus` varchar(30) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_kk` varchar(50) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL,
  `nama_poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `nama_kk`, `alamat_pasien`, `nama_poli`) VALUES
('4667', 'andi', '2021-12-01', 'budi', 'Bojong', 'gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `username`, `password`, `hak_akses`) VALUES
(' 77776', 'anggi', 'agito', 'nano', 'dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` bigint(20) NOT NULL,
  `id_pasien` varchar(15) NOT NULL,
  `tanggal_periksa` datetime NOT NULL,
  `shift` varchar(30) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `nama_poli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `id_pasien`, `tanggal_periksa`, `shift`, `waktu_daftar`, `nama_poli`) VALUES
(9, '4667', '2022-11-28 12:24:00', 'Pagi', '2022-11-27 11:24:29', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
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
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` varchar(10) NOT NULL,
  `nama_poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
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
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_pasien`, `id_dokter`, `data_subjektif`, `data_objektif`, `diagnosa`, `planning`, `tanggal_periksa`) VALUES
(36827928, '4667', '111 ', 'mk', 'mk', 'mk', 'mk', '2022-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
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
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`kode`, `tanggal`, `resep`, `id_dokter`, `id_pasien`, `umur`, `alamat_pasien`, `penerima`) VALUES
('3239', '2022-11-01 11:28:09', 'sirup', 'nama', '4667', '23', 'Konoha Village', 'saya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36827929;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
