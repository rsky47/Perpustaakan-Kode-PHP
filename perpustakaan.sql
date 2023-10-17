-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2023 at 03:20 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kodebuku` varchar(5) NOT NULL,
  `namabuku` varchar(35) NOT NULL,
  `penerbit` varchar(35) NOT NULL,
  `tahunterbit` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kodebuku`, `namabuku`, `penerbit`, `tahunterbit`) VALUES
('K002', 'Algotirma', 'Gramediaa', '2008'),
('K003', 'Matematika Diskrit', 'Erlangga', '2011'),
('K004', 'spiderman', 'granmediqa', '1990'),
('k0023', 'bunga', 'erer', '1994'),
('K008', 'vixsion', 'elrangag', '2019'),
('K0013', 'BOY wiliew', 'Aboy', '2016'),
('T001', 'Tani', 'Jaya', '2017'),
('T002', 'Tani', 'Jayam', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tgllahir`, `alamat`, `jurusan`) VALUES
('2016610003', 'Dio hermanto', '1997-10-10', 'Jl.Komp.PGRI No.02 Padang', 'Teknik i'),
('2016610039', 'Rabil Maindra', '1997-07-09', 'Jl.Gajah Mada', 'Teknik Informatika'),
('16075015', 'indah', '1997-12-12', 'Padang', 'Teknik Informatika'),
('2016610018', 'Anggi', '1998-12-12', 'Padang XI', 'Ti');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `nim` varchar(10) NOT NULL,
  `kodebuku` varchar(5) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `bataspeminjaman` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`nim`, `kodebuku`, `tanggalpinjam`, `bataspeminjaman`) VALUES
('2016610003', 'K001', '2018-12-02', '2018-12-09'),
('16075015', 'K004', '2018-12-18', '2018-12-25'),
('2016610039', 'K002', '2018-12-04', '2018-12-11'),
('201819920', 'K002', '2018-12-04', '2018-12-17'),
('2016610018', 'K003', '2018-12-03', '2018-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('Rabil', '90'),
('Dio', '4321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kodebuku`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`nim`,`kodebuku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
