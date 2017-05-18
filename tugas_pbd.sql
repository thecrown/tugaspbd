-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 09:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_pbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kd_jabatan` int(2) NOT NULL,
  `status` enum('Aktif','NonAktif') NOT NULL,
  `tahun_masuk` date NOT NULL,
  `id_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama`, `alamat`, `kd_jabatan`, `status`, `tahun_masuk`, `id_dept`) VALUES
(1, 'amien', 'jl kebon sawit v no 13', 1, 'Aktif', '2015-04-05', 1),
(2, 'tyas', 'jl menoreh timur', 1, 'Aktif', '2017-02-02', 5),
(6, 'reza', '<p>resa</p>', 1, 'Aktif', '2017-05-12', 1),
(7, 'zaki', '<p>semarang bawah</p>', 5, 'Aktif', '2017-05-15', 8),
(8, 'zakiosa', '<p>zakiosa</p>', 1, 'Aktif', '2017-05-23', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id` int(11) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL,
  `deskripsi_bidang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`id`, `nama_bidang`, `deskripsi_bidang`) VALUES
(1, 'infokom', 'infokom bidang yang bersahaja'),
(2, 'ristek', '<p>selalu sholat</p>'),
(5, 'PSDM', '<p>Adalah bidang yang marah-marah mulu</p>'),
(6, 'Mikatan', '<p>mikatan adalah divisi yang suka main bola</p>'),
(7, 'Pengurus Harian', '<p>Pengurus Harian Adalah bidang yang mengurusi masalah Administratif</p>'),
(8, 'Kesma', '<p>Kesma Merupakan Bidang yang bertugas mencarikan Beasiswa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `Nama_Jabatan` enum('Staff','Ketua Bidang','Ketua Himpunan','Sekertaris','Bendahara') NOT NULL,
  `Deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `Nama_Jabatan`, `Deskripsi`) VALUES
(1, 'Staff', ''),
(2, 'Ketua Bidang', ''),
(3, 'Ketua Himpunan', ''),
(5, 'Sekertaris', ''),
(6, 'Bendahara', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proposal`
--

CREATE TABLE `tbl_proposal` (
  `id_proposal` int(11) NOT NULL,
  `nama_proker` varchar(100) NOT NULL,
  `deskripsi_proker` longtext NOT NULL,
  `PJ` varchar(100) NOT NULL,
  `pengajuan_dana` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `Status_proposal` enum('ACC','Revisi','Pengajuan') NOT NULL,
  `nama_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proposal`
--

INSERT INTO `tbl_proposal` (`id_proposal`, `nama_proker`, `deskripsi_proker`, `PJ`, `pengajuan_dana`, `kd_bidang`, `Status_proposal`, `nama_file`) VALUES
(1, 'jumintan', '<p>12</p>\r\n', '7', 12, 8, 'Revisi', 'jumintan'),
(2, 'jumintan', '<p>12</p>\r\n', '7', 12, 5, 'Pengajuan', 'jumintan'),
(3, 'jumintan', '<p>12</p>\r\n', '7', 12, 8, 'Pengajuan', 'jumintan'),
(4, 'amien', '<p>amien</p>\r\n', '7', 0, 8, 'ACC', 'amien'),
(6, 'amien', '<p>12</p>\r\n', '7', 12, 2, 'Pengajuan', 'amien'),
(7, 'amien', '<p>12</p>\r\n', '8', 12, 8, 'Pengajuan', 'amien'),
(10, 'fianl proposal ', '<p>12</p>\r\n', '7', 0, 9, 'Pengajuan', 'fianl-proposal'),
(11, 'jumintan', '<p>xxx</p>\r\n', '7', 12, 8, 'Revisi', 'jumintan'),
(12, 'coba nama baru', '<p>90</p>\r\n', '7', 90, 8, 'ACC', ''),
(13, 'new', '<p>1</p>\r\n', '8', 1, 8, 'Pengajuan', ''),
(14, 'amien', '<p>12</p>\r\n', '7', 12, 8, 'Pengajuan', ''),
(15, 'amien', '<p>12</p>\r\n', '8', 12, 8, 'Pengajuan', 'amien'),
(16, '1', '<p>1</p>\r\n', '7', 1, 8, 'Pengajuan', '1.pdf'),
(17, 'amien kurniawan', '<p>12</p>\r\n', '8', 12, 8, 'Pengajuan', 'amien-kurniawan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('Administrator','Ketua','Staff') NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `Status` enum('Aktif','Nonaktif') NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `role`, `email`, `id_pengurus`, `Status`, `nama_user`, `foto`, `id_bidang`) VALUES
(1, 'amien', '270e589efc43c0d79c0123bf0a1c763f', 'Administrator', 'amienkurniawan5@gmail.com', 1, 'Aktif', 'amien', 'amien_thumb.jpg', 1),
(3, 'reza', 'bb98b1d0b523d5e783f931550d7702b6', 'Ketua', 'reza@gmail.com', 6, 'Aktif', 'reza', 'reza_thumb.jpg', 1),
(4, 'zaki', '9784ea3da268563469df99b2e6593564', 'Ketua', 'zaki@gmail.com', 7, 'Aktif', 'zaskia', 'zaki_thumb.png', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
