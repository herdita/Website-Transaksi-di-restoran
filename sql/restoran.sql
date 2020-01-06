-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jul 2018 pada 18.11
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` varchar(30) DEFAULT NULL,
  `id_menu` varchar(30) DEFAULT NULL,
  `qty` int(20) DEFAULT NULL,
  `sub_harga` int(20) DEFAULT NULL,
  `tc_detail` datetime DEFAULT NULL,
  `tu_detail` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_menu`, `qty`, `sub_harga`, `tc_detail`, `tu_detail`) VALUES
('105-38e66ae8', '103-2311d', 1, 18000, '2018-07-23 22:44:41', '2018-07-23 22:44:41'),
('105-38e66ae8', '103-7faae', 1, 20000, '2018-07-23 22:44:41', '2018-07-23 22:44:41'),
('105-38e66ae8', '103-81338', 2, 50000, '2018-07-23 22:44:41', '2018-07-23 22:44:41'),
('105-38e66ae8', '103-9aa17', 1, 15000, '2018-07-23 22:44:41', '2018-07-23 22:44:41'),
('105-38e66ae8', NULL, 1, 20000, '2018-07-23 22:46:59', '2018-07-23 22:46:59'),
('105-38e66ae8', '103-81338', 2, 50000, '2018-07-23 22:46:59', '2018-07-23 22:46:59'),
('105-38e66ae8', '103-9aa17', 1, 15000, '2018-07-23 22:47:00', '2018-07-23 22:47:00'),
('105-d3bd758a', '103-2311d', 1, 18000, '2018-07-23 22:47:48', '2018-07-23 22:47:48'),
('105-d3bd758a', '103-7faae', 4, 80000, '2018-07-23 22:47:48', '2018-07-23 22:47:48'),
('105-d3bd758a', '103-81338', 2, 50000, '2018-07-23 22:47:48', '2018-07-23 22:47:48'),
('105-d3bd758a', '103-9aa17', 1, 15000, '2018-07-23 22:47:48', '2018-07-23 22:47:48'),
('105-d3bd758a', NULL, 4, 80000, '2018-07-23 22:48:31', '2018-07-23 22:48:31'),
('105-d3bd758a', '103-81338', 2, 50000, '2018-07-23 22:48:31', '2018-07-23 22:48:31'),
('105-d3bd758a', '103-9aa17', 1, 15000, '2018-07-23 22:48:31', '2018-07-23 22:48:31'),
('105-8f6eadb8', '103-2311d', 1, 18000, '2018-07-23 22:48:38', '2018-07-23 22:48:38'),
('105-8f6eadb8', '103-7faae', 4, 80000, '2018-07-23 22:48:38', '2018-07-23 22:48:38'),
('105-8f6eadb8', '103-81338', 2, 50000, '2018-07-23 22:48:38', '2018-07-23 22:48:38'),
('105-8f6eadb8', '103-9aa17', 1, 15000, '2018-07-23 22:48:39', '2018-07-23 22:48:39'),
('105-cefe1b5f', '103-2311d', 1, 18000, '2018-07-23 22:48:43', '2018-07-23 22:48:43'),
('105-cefe1b5f', '103-7faae', 4, 80000, '2018-07-23 22:48:43', '2018-07-23 22:48:43'),
('105-cefe1b5f', '103-81338', 2, 50000, '2018-07-23 22:48:43', '2018-07-23 22:48:43'),
('105-cefe1b5f', '103-9aa17', 1, 15000, '2018-07-23 22:48:43', '2018-07-23 22:48:43'),
('105-cefe1b5f', NULL, 4, 80000, '2018-07-23 22:49:59', '2018-07-23 22:49:59'),
('105-cefe1b5f', '103-81338', 2, 50000, '2018-07-23 22:49:59', '2018-07-23 22:49:59'),
('105-cefe1b5f', '103-9aa17', 1, 15000, '2018-07-23 22:49:59', '2018-07-23 22:49:59'),
('105-cefe1b5f', NULL, 4, 80000, '2018-07-23 22:50:03', '2018-07-23 22:50:03'),
('105-cefe1b5f', '103-81338', 2, 50000, '2018-07-23 22:50:03', '2018-07-23 22:50:03'),
('105-cefe1b5f', '103-9aa17', 1, 15000, '2018-07-23 22:50:03', '2018-07-23 22:50:03'),
('105-284a793d', '103-2311d', 2, 36000, '2018-07-23 22:50:18', '2018-07-23 22:50:18'),
('105-284a793d', '103-7faae', 5, 100000, '2018-07-23 22:50:18', '2018-07-23 22:50:18'),
('105-284a793d', '103-81338', 2, 50000, '2018-07-23 22:50:18', '2018-07-23 22:50:18'),
('105-284a793d', '103-9aa17', 1, 15000, '2018-07-23 22:50:18', '2018-07-23 22:50:18'),
('105-0a3f28ef', '103-2311d', 2, 36000, '2018-07-23 22:51:17', '2018-07-23 22:51:17'),
('105-0a3f28ef', '103-7faae', 5, 100000, '2018-07-23 22:51:17', '2018-07-23 22:51:17'),
('105-0a3f28ef', '103-81338', 2, 50000, '2018-07-23 22:51:17', '2018-07-23 22:51:17'),
('105-0a3f28ef', '103-9aa17', 1, 15000, '2018-07-23 22:51:17', '2018-07-23 22:51:17'),
('105-b6ac396e', '103-2311d', 2, 36000, '2018-07-23 22:51:21', '2018-07-23 22:51:21'),
('105-b6ac396e', '103-7faae', 5, 100000, '2018-07-23 22:51:21', '2018-07-23 22:51:21'),
('105-b6ac396e', '103-81338', 2, 50000, '2018-07-23 22:51:21', '2018-07-23 22:51:21'),
('105-b6ac396e', '103-9aa17', 1, 15000, '2018-07-23 22:51:21', '2018-07-23 22:51:21'),
('105-24b79ba4', '103-2311d', 1, 18000, '2018-07-23 23:08:34', '2018-07-23 23:08:34'),
('105-24b79ba4', '103-7faae', 1, 20000, '2018-07-23 23:08:34', '2018-07-23 23:08:34'),
('105-c849a8d4', '103-2311d', 2, 36000, '2018-07-24 13:18:38', '2018-07-24 13:18:38'),
('105-c849a8d4', '103-7faae', 1, 20000, '2018-07-24 13:18:38', '2018-07-24 13:18:38'),
('105-5af1f8a9', '103-2311d', 3, 54000, '2018-07-24 17:44:04', '2018-07-24 17:44:04'),
('105-5af1f8a9', '103-7faae', 2, 40000, '2018-07-24 17:44:05', '2018-07-24 17:44:05'),
('105-5af1f8a9', '103-9aa17', 1, 15000, '2018-07-24 17:44:05', '2018-07-24 17:44:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(30) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `tc_jabatan` datetime DEFAULT NULL,
  `tu_jabatan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `tc_jabatan`, `tu_jabatan`) VALUES
('102-11e71', 'admin', '2018-07-19 10:50:22', '2018-07-19 10:50:22'),
('102-466d4', 'pemilik', '2018-07-19 10:51:25', '2018-07-19 10:51:25'),
('102-f4511', 'data entry', '2018-07-19 10:51:33', '2018-07-19 10:52:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `tc_kategori` datetime DEFAULT NULL,
  `tu_kategori` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tc_kategori`, `tu_kategori`) VALUES
('104-484e0', 'makanan', '2018-07-22 18:50:06', '2018-07-22 18:50:06'),
('104-4f0d9', 'Minuman', '2018-07-19 13:01:47', '2018-07-19 13:01:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(30) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga_menu` int(20) DEFAULT NULL,
  `id_kategori` varchar(30) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `gambar_menu` varchar(255) DEFAULT NULL,
  `tc_menu` datetime DEFAULT NULL,
  `tu_menu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `id_kategori`, `ket`, `gambar_menu`, `tc_menu`, `tu_menu`) VALUES
('103-2311d', 'burger', 18000, '104-484e0', 'Tersedia', 'menu-1532261538.jpg', '2018-07-21 16:43:53', '2018-07-22 19:12:18'),
('103-3d833', 'Soto', 25000, '104-4f0d9', 'Habis', 'menu-1532260319.jpeg', '2018-07-22 18:51:58', '2018-07-23 19:27:26'),
('103-7faae', 'nasi goreng', 20000, '104-4f0d9', 'Tersedia', 'menu-1532260237.jpg', '2018-07-22 18:50:36', '2018-07-23 22:39:10'),
('103-81338', 'Mie Goreng', 25000, '104-4f0d9', 'Tersedia', 'menu-1532260295.jpg', '2018-07-22 18:51:34', '2018-07-22 21:12:48'),
('103-886cc', 'seafood', 30000, '104-4f0d9', 'Habis', 'menu-1532260272.jpg', '2018-07-22 18:51:12', '2018-07-22 21:21:22'),
('103-9aa17', 'Jahe', 15000, '104-4f0d9', 'Tersedia', 'menu-1532166177.jpg', '2018-07-21 16:42:56', '2018-07-21 16:42:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(30) NOT NULL,
  `nama_p` varchar(50) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `id_jabatan` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `Pass` varchar(50) DEFAULT NULL,
  `tc_pegawai` datetime DEFAULT NULL,
  `tu_pegawai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_p`, `no_telp`, `id_jabatan`, `username`, `Pass`, `tc_pegawai`, `tu_pegawai`) VALUES
('101-3d206', 'herdita permana', '089668354665', '102-466d4', 'admin', '202cb962ac59075b964b07152d234b70', '2018-07-19 11:00:26', '2018-07-19 11:00:26'),
('101-e0669', 'karyawan', '089668354665', '102-f4511', 'karyawan', '202cb962ac59075b964b07152d234b70', '2018-07-24 18:03:49', '2018-07-24 18:03:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(30) NOT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `tharga` int(20) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `tc_penjualan` datetime DEFAULT NULL,
  `tu_penjualan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `nama_pemesan`, `tharga`, `id_user`, `status`, `tc_penjualan`, `tu_penjualan`) VALUES
('105-0a3f28ef', 'asfsda', 201000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:51:17', '2018-07-23 22:51:17'),
('105-24b79ba4', 'herher', 38000, '106-ffa68', 'Belum Bayar', '2018-07-23 23:08:34', '2018-07-23 23:08:34'),
('105-284a793d', 'agans', 201000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:50:18', '2018-07-23 22:50:18'),
('105-38e66ae8', 'mecca nur hadi', 103000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:44:40', '2018-07-23 22:44:40'),
('105-5af1f8a9', 'ss', 109000, '106-ffa68', 'Sudah Bayar', '2018-07-24 17:44:04', '2018-07-24 17:45:19'),
('105-8f6eadb8', 'agan', 163000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:48:38', '2018-07-23 22:48:38'),
('105-b6ac396e', 'werewrwe', 201000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:51:21', '2018-07-23 22:51:21'),
('105-c849a8d4', 'kiki', 56000, '106-ffa68', 'Sudah Bayar', '2018-07-24 13:18:37', '2018-07-24 17:46:06'),
('105-cefe1b5f', 'ass', 163000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:48:43', '2018-07-23 22:48:43'),
('105-d3bd758a', 'Nurhadiyansyah', 163000, '106-ffa68', 'Belum Bayar', '2018-07-23 22:47:47', '2018-07-23 22:47:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(30) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `tc_user` datetime DEFAULT NULL,
  `tu_user` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `tc_user`, `tu_user`) VALUES
('106-31a76', 'Meja2', '2018-07-20 08:35:28', '2018-07-20 08:35:42'),
('106-dafb9', 'Meja4', '2018-07-20 08:36:47', '2018-07-20 08:36:47'),
('106-fda61', 'Meja3', '2018-07-20 08:35:34', '2018-07-20 08:35:53'),
('106-ffa68', 'Meja1', '2018-07-20 08:34:54', '2018-07-20 08:34:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `pjnId` (`id_penjualan`),
  ADD KEY `mnId` (`id_menu`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `ktgId` (`id_kategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `jbtId` (`id_jabatan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
