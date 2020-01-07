-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2018 pada 17.10
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `pjnId` varchar(30) DEFAULT NULL,
  `mnId` varchar(30) DEFAULT NULL,
  `detQty` int(20) DEFAULT NULL,
  `detSubharga` int(20) DEFAULT NULL,
  `detTC` datetime DEFAULT NULL,
  `detTU` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `jbtId` varchar(30) NOT NULL,
  `jbtNama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ktgId` varchar(30) NOT NULL,
  `ktgNama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `mnId` varchar(30) NOT NULL,
  `mnNama` varchar(50) DEFAULT NULL,
  `mnFoto` varchar(255) DEFAULT NULL,
  `mnHarga` int(20) DEFAULT NULL,
  `mnStatus` varchar(20) DEFAULT NULL,
  `ktgId` varchar(30) DEFAULT NULL,
  `mnTC` datetime DEFAULT NULL,
  `mnTU` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pgId` varchar(30) NOT NULL,
  `pgNama` varchar(50) DEFAULT NULL,
  `pgTelp` varchar(13) DEFAULT NULL,
  `jbtId` varchar(30) DEFAULT NULL,
  `pgUsername` varchar(30) DEFAULT NULL,
  `pgPassword` varchar(50) DEFAULT NULL,
  `pgTC` datetime DEFAULT NULL,
  `pgTU` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `pjnId` varchar(30) NOT NULL,
  `pjnNamapemesan` varchar(50) DEFAULT NULL,
  `pjnTharga` int(20) DEFAULT NULL,
  `pjnNamapegawai` varchar(50) DEFAULT NULL,
  `pjnStatus` varchar(30) DEFAULT NULL,
  `pjnTC` datetime DEFAULT NULL,
  `pjnTU` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD KEY `pjnId` (`pjnId`),
  ADD KEY `mnId` (`mnId`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jbtId`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ktgId`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mnId`),
  ADD KEY `ktgId` (`ktgId`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pgId`),
  ADD KEY `jbtId` (`jbtId`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`pjnId`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD CONSTRAINT `detailpenjualan_ibfk_3` FOREIGN KEY (`pjnId`) REFERENCES `penjualan` (`pjnId`),
  ADD CONSTRAINT `detailpenjualan_ibfk_4` FOREIGN KEY (`mnId`) REFERENCES `menu` (`mnId`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ktgId`) REFERENCES `kategori` (`ktgId`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`jbtId`) REFERENCES `jabatan` (`jbtId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
