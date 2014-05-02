-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2014 at 01:48 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobi`
--

CREATE TABLE IF NOT EXISTS `hobi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `umur` int(11) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hobi`
--

INSERT INTO `hobi` (`id`, `nama`, `umur`, `hobi`) VALUES
(1, 'Leo ', 13, 'berenang,'),
(2, 'Kusuma', 12, 'berenang'),
(3, 'Leo ', 13, 'berenangtidur   ,'),
(4, 'Kusuma', 12, 'berenangtidur   ,'),
(5, 'Leo ', 13, 'berenang,'),
(6, 'Kusuma', 12, 'tidur   '),
(7, 'Leo ', 13, 'berenang,tidur   '),
(8, 'Kusuma', 12, 'tidur   '),
(9, 'Leo ', 13, 'berenang,tidur   '),
(10, 'Kusuma', 12, 'berenang,tidur   '),
(11, 'q', 0, ''),
(12, 'adsad', 1, 'berenang'),
(13, '2', 3, 'tidur   '),
(14, '', 0, 'berenang'),
(15, '', 3, 'tidur   '),
(16, '', 0, ''),
(17, '', 0, 'tidur   '),
(18, 'as', 0, 'berenang,tidur   ');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(4) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(25) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `Umur` int(2) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `Nama`, `Jenis_Kelamin`, `hobi`, `Umur`) VALUES
(28, 'dema', 'Laki-Laki', 'renang', 111),
(29, 'Leo', 'Laki-Laki', 'nonton', 12),
(30, 'Leo', 'Laki-Laki', 'renang', 1),
(31, 'masta', 'Laki-Laki', 'renang,nonton   ', 13),
(32, 'Aldonie', 'Laki-Laki', 'nonton,Video Game', 12),
(33, 'a', 'Laki-Laki', 'renang,nonton   ', 0),
(34, 'M', 'Laki-Laki', 'renang,nonton   ', 0),
(35, 'Q', 'Laki-Laki', 'nonton,Video Game', 22),
(36, '12', 'Laki-Laki', 'renang,nonton,Video Game', 12),
(37, 'Leo', 'Laki-Laki', 'renang,nonton   ', 12),
(38, 'Donie', 'Laki-Laki', 'renang,nonton   ,video game', 12),
(39, 'Aldonie Saputra', 'Laki-Laki', 'renang,nonton,Video Game', 40);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `permission` enum('allow','deny') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(40) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `role`) VALUES
(1, 'ommasta', 'masta123', 'admin'),
(4, 'Leo', 'abc123', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;