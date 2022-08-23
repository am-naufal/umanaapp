-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 03:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `niu` int(11) DEFAULT NULL,
  `kd_instansi` int(11) NOT NULL,
  `kd_jabatan` int(11) DEFAULT NULL,
  `jam_masuk` varchar(20) DEFAULT NULL,
  `jam_pulang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `tanggal`, `niu`, `kd_instansi`, `kd_jabatan`, `jam_masuk`, `jam_pulang`) VALUES
(9, '2/8/2022', 2020502002, 209, 107, '20:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `kd_instansi` int(11) NOT NULL,
  `instansi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`kd_instansi`, `instansi`) VALUES
(205, 'SMK IBRAHIMY 1'),
(206, 'SMA IBRAHIMY '),
(207, 'SMP IBRAHIMY 1'),
(208, 'SMP IBRAHIMY 2'),
(209, 'SMP IBRAHIMY 3'),
(210, 'SMA IBRAHIMY 1'),
(211, 'SMA IBRAHIMY 2'),
(212, 'Fakultas Saintek'),
(213, 'Fakultas Dakwah'),
(214, 'Fakultas Tarbiyah'),
(215, 'Fakultas Ekonomi Sya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
(101, 'Kaur. Kesiswaan'),
(102, 'Kepala Sekolah'),
(103, 'Kaur. Kurikulum'),
(104, 'GURU'),
(105, 'Staf Umum'),
(106, 'Kepala Tata Usaha'),
(107, 'Dosen'),
(108, 'Kepala Prodi'),
(109, 'Sekretaris Prodi'),
(110, 'Rektor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `kd_status` int(11) NOT NULL,
  `status` enum('aktif','tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`kd_status`, `status`) VALUES
(1, 'aktif'),
(2, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_umana`
--

CREATE TABLE `tb_umana` (
  `niu` int(20) NOT NULL,
  `kd_status` int(11) DEFAULT NULL,
  `kd_jabatan` int(11) DEFAULT NULL,
  `kd_instansi` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_umana`
--

INSERT INTO `tb_umana` (`niu`, `kd_status`, `kd_jabatan`, `kd_instansi`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES
(20201, 1, 107, 212, 'ammar', 'bondowoso', '2001-10-20', 'suko'),
(202021, 2, 105, 209, 'bismika', 'laut', '0004-04-04', 'ad'),
(20202020, 1, 104, 205, 'zacky', 'banyuwangi', '2022-08-18', 'asdasd'),
(2020502002, 1, 107, 209, 'z', 'z', '0001-01-01', 'z'),
(2020503002, 1, 101, 205, 'sopyan', 'lerrek', '2022-07-20', 'sakskakskas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('admin','umana') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(253, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', ''),
(254, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', ''),
(257, 'pemilik', '1f86485ac9c8b00fb355bd1eb1c86d937f6d457c', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`kd_instansi`),
  ADD UNIQUE KEY `tb_instansi_pk` (`kd_instansi`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`),
  ADD UNIQUE KEY `tb_jabatan_pk` (`kd_jabatan`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`kd_status`),
  ADD UNIQUE KEY `tb_status_pk` (`kd_status`);

--
-- Indexes for table `tb_umana`
--
ALTER TABLE `tb_umana`
  ADD PRIMARY KEY (`niu`),
  ADD UNIQUE KEY `tb_umana_pk` (`niu`),
  ADD KEY `data_status_fk` (`kd_status`),
  ADD KEY `data_instansi_fk` (`kd_instansi`),
  ADD KEY `data_jabatan_fk` (`kd_jabatan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_user_pk` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `kd_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_umana`
--
ALTER TABLE `tb_umana`
  MODIFY `niu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
