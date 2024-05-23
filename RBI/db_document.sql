-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 12:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_document`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_arsip` varchar(15) DEFAULT NULL,
  `nama_arsip` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` text DEFAULT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `id_kategori`, `no_arsip`, `nama_arsip`, `deskripsi`, `tgl_upload`, `tgl_update`, `file_arsip`, `ukuran_file`, `id_dep`, `id_user`) VALUES
(24, 22, '24042335-7EgW', 'BIOT', 'aasd', '2024-04-23', '2024-04-23', '1713828906_4e98b96cc7a48418b0a3.pdf', 3885505, 7, 17),
(25, 22, '28-04-24', 'BIOT 2', 'dokumen', '2024-04-28', '2024-04-28', '1714281372_8dc664f379150423d0d2.pdf', 3886031, 7, 17),
(26, 22, '28-04-24', 'BIOT 2', 'sdfasdf', '2024-04-28', '2024-04-28', '1714281536_a2efdda58c8afc157adc.pdf', 3885809, 7, 17),
(27, 22, '28-04-24', 'BIOT', 'wegesgsegseg', '2024-04-28', '2024-04-28', '1714281597_843e781478451d980645.pdf', 3886240, 7, 17),
(28, 25, NULL, 'Serku', 'afasf', '2024-04-28', '2024-04-28', '1714282859_7fd9416aba586c38df88.pdf', 3885505, 7, 17),
(29, 22, NULL, 'tugas', 'egEGg', '2028-04-24', '2028-04-24', '1714305170_733ff155811a7631dff4.pdf', 3911373, 7, 17),
(31, 22, NULL, 'major', 'mls', '2024-05-16', '2024-05-16', '1715828482_f1d7165100ea3d735581.pdf', 223421, 7, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dep`
--

CREATE TABLE `tbl_dep` (
  `id_dep` int(11) NOT NULL,
  `nama_dep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_dep`
--

INSERT INTO `tbl_dep` (`id_dep`, `nama_dep`) VALUES
(6, 'Keuangan'),
(7, 'Humas'),
(8, 'Pemasaran'),
(9, 'Produksi'),
(10, 'Administrasi'),
(11, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(19, 'Laporan Keuangan'),
(20, 'Dokumen Humas'),
(21, 'Dokumen Kontrak'),
(22, 'Sertifikat'),
(23, 'Rencana Bisnis'),
(24, 'Laporan Kinerja Karyawan'),
(25, 'Laporan Mingguan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_dep`) VALUES
(17, 'Bagas', 'bagas@gmail.com', '1234', 1, '1713826848_caa5183ccd1cce0be54a.jpg', 7),
(18, 'Alif', 'alif@gmail.com', '1234', 2, '1713826903_3adf121b9d389c5cfba2.jpg', 6),
(19, 'Zetta', 'zeta@gmail.com', '1234', 1, '1714304477_bc25ad6c94e36e2cc68d.jpg', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`) USING BTREE,
  ADD KEY `id_kategori` (`id_kategori`,`id_dep`,`id_user`),
  ADD KEY `id_dep` (`id_dep`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_dep`
--
ALTER TABLE `tbl_dep`
  ADD PRIMARY KEY (`id_dep`) USING BTREE;

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `id_dep` (`id_dep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_dep`
--
ALTER TABLE `tbl_dep`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD CONSTRAINT `tbl_arsip_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `tbl_dep` (`id_dep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_arsip_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_arsip_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `tbl_dep` (`id_dep`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
