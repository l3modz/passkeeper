-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2020 at 01:21 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passkeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_password`
--

CREATE TABLE `tb_password` (
  `judul` varchar(130) NOT NULL DEFAULT '',
  `id_user` varchar(150) NOT NULL,
  `passwd` varchar(225) NOT NULL,
  `kategori` varchar(132) NOT NULL,
  `url` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_password`
--

INSERT INTO `tb_password` (`judul`, `id_user`, `passwd`, `kategori`, `url`, `deskripsi`) VALUES
('contoh-judul', 'contoh-user', 'OHlyYTNRRXJmZWVhYVRvMnJoQ2FFYXJPWW94NW44TUhiclIrV3hhZ2pFTT0=', 'Kantor', 'https://url-link/account/login', 'reset email ke..');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `lastlogin` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `hak_akses`, `aktif`, `lastlogin`) VALUES
('admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Y', '2020-10-02 01:07:53am'),
('staff', 'Staff', '202cb962ac59075b964b07152d234b70', 'staff', 'Y', '2020-10-02 01:03:20am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_password`
--
ALTER TABLE `tb_password`
  ADD PRIMARY KEY (`judul`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
