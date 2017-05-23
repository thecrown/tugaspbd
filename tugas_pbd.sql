-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 10:48 AM
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
(12, 'tyas panorama nan cerah', '<p>jl dahlia d 212 bukit diponegoro tembalang semarang </p>', 2, 'Aktif', '2017-05-04', 6),
(13, 'niken', '<p>jl semar gede 7 semarang timur</p>', 1, 'Aktif', '2017-05-04', 1),
(14, 'virzawan', '<p>jl kemyoran jakarta tenggara</p>', 2, 'Aktif', '2017-05-04', 1),
(15, 'kholidwp', '<p>yayaya</p>', 5, 'Aktif', '2017-05-08', 2),
(16, 'yudi', '<p>jljlj</p>', 2, 'Aktif', '2017-05-17', 1);

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
(1, 'infokom', '<p>infokom bidang yang bersahaja aaa</p>'),
(2, 'Ristek', '<p>memberikan wawasan riset berupa informasi akademis mahasiswa</p>'),
(5, 'PSDM', '<p>Adalah bidang yang mengkader mulu</p>'),
(6, 'Mikatan', '<p>mikatan adalah divisi yang suka main bola</p>'),
(8, 'Kesma', '<p>Kesma Merupakan Bidang yang bertugas mencarikan Beasiswa</p>'),
(9, 'PPK', '<p>bidang yang paling keren yang pernah ada</p>'),
(12, 'pangurus harian', '<p>mengurusi masalah administrasi harian himaskom</p>');

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
(3, '12', '<p>12</p>\r\n', '7', 12, 1, 'Pengajuan', '12.pdf'),
(4, 'amien', '<p>amien</p>\r\n', '7', 12212, 8, 'ACC', 'amien3.pdf'),
(6, 'amien', '<p>12</p>\r\n', '7', 12, 2, 'Pengajuan', 'amien'),
(7, 'amien', '<p>12</p>\r\n', '8', 12, 8, 'Pengajuan', 'amien'),
(10, 'fianl proposal ', '<p>12</p>\r\n', '7', 0, 9, 'Pengajuan', 'fianl-proposal1.pdf'),
(11, 'jumintan', '<p>xxx</p>\r\n', '7', 12, 8, 'Revisi', 'jumintan3.pdf'),
(12, 'coba nama baru 2', '<p>90</p>\r\n', '7', 90, 8, 'ACC', 'coba-nama-baru-2.pdf'),
(13, 'new', '<p>1</p>\r\n', '8', 1, 2, 'Pengajuan', 'new.pdf'),
(14, 'amien 12', '<p>12</p>\r\n', '7', 12, 8, 'Pengajuan', 'amien-12.pdf'),
(15, 'amien', '<p>12</p>\r\n', '8', 12, 8, 'Pengajuan', 'amien'),
(17, 'amien kurniawan', '<p>12</p>\r\n', '8', 12, 8, 'Pengajuan', 'amien-kurniawan.pdf'),
(18, 'mas danal 2', '<p>mas danal</p>\r\n', '10', 12, 8, 'Pengajuan', 'mas-danal-2.pdf'),
(19, 'jalan jalan mikat', '<p>merupakan proker yang isinya jalan jalan</p>\r\n', '12', 200000, 6, 'ACC', 'jalan-jalan-mikat.docx'),
(20, 'coba', '<p>test</p>\r\n', '15', 0, 2, 'Pengajuan', 'coba.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('Administrator','Ketua') NOT NULL,
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
(4, 'zaki', '9784ea3da268563469df99b2e6593564', 'Ketua', 'zaki@gmail.com', 7, 'Aktif', 'zaskia', 'zaki_thumb.png', 8),
(8, 'tyas', '0c36534326afe8f3c3e7f4d1aaab1079', 'Ketua', 'tyaspnc@ce.undip.ac.id', 12, 'Aktif', 'tyas panorama nan cerah', 'tyas_thumb.jpg', 6),
(9, 'ocang', '202cb962ac59075b964b07152d234b70', 'Ketua', 'virzawan@gmail.com', 14, 'Aktif', 'ocang', 'ocang_thumb.jpg', 1),
(10, 'kholidwp', 'b8571e859aa5dd003ef1e3fa67e9305b', 'Ketua', 'kk@gmail.com', 15, 'Aktif', 'kholid', 'kholidwp_thumb.PNG', 2);

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
