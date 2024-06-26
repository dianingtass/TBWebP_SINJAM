-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 10:57 AM
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
-- Database: `sinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `lokasi` enum('pl','limo') NOT NULL,
  `pic` enum('FIK','FISIP','FEB','FK','FT','Rektorat','FH') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `lokasi`, `pic`, `foto`) VALUES
(1, 'FIKLAB', 'pl', 'FIK', '1.png'),
(2, 'Selasar FIK', 'pl', 'FIK', '2.png'),
(3, 'Ubin Coklat', 'pl', 'FEB', '3.png'),
(4, 'Auditorium dr. Wahidin', 'pl', 'FK', '4.png'),
(5, 'Auditorium BEJ', 'pl', 'FEB', '5.png'),
(6, 'Auditorium MERCe', 'limo', 'FK', '6.png'),
(7, 'Laboratorium Diplomasi', 'pl', 'FISIP', '7.png'),
(8, 'Auditorium Tanah Airku', 'limo', 'FT', '8.png'),
(9, 'Auditorium Bhinneka Tunggal Ika', 'pl', 'Rektorat', '9.png'),
(10, 'Plaza Wardiman', 'pl', 'Rektorat', '10.png'),
(11, 'Plaza Internet', 'pl', 'Rektorat', '11.png'),
(12, 'Lapangan Olahraga', 'pl', 'Rektorat', '12.png'),
(13, 'Aula Serbaguna', 'pl', 'Rektorat', '13.png'),
(14, 'Ruang Sidang FH', 'pl', 'FH', '14.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kak`
--

CREATE TABLE `kak` (
  `id_kak` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

CREATE TABLE `pembatalan` (
  `id_batal` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` enum('Diproses','Diterima','Tidak Diterima') NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `program_studi`, `fakultas`, `email`, `password`, `role`) VALUES
('001', 'admin', '', '', '', 'pass4admin', '1'),
('2210512048', 'Septian Sugiarta Saputra', 'S1 Sistem Informasi', 'Fakultas Ilmu Komputer', '2210512048@mahasiswa.upnvj.ac.id', 'pass048', '2'),
('2210512049', 'Safira Ramadhani', 'S1 Sistem Informasi', 'Fakultas Ilmu Komputer', '2210512049@mahasiswa.upnvj.ac.id', 'pass049', '2'),
('2210512056', 'Dianingtas Hartono Simajorang', 'S1 Sistem Informasi', 'Fakultas Ilmu Komputer', '2210512056@mahasiswa.upnvj.ac.id', 'pass056', '2'),
('2210512065', 'Kayla Nagioti Nasution', 'S1 Sistem Informasi', 'Fakultas Ilmu Komputer', '2210512065@mahasiswa.upnvj.ac.id', 'pass065', '2'),
('2210512070', 'Salsabillah Febridha', 'S1 Sistem Informasi', 'Fakultas Ilmu Komputer', '2210512070@mahasiswa.upnvj.ac.id', 'pass070', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `kak`
--
ALTER TABLE `kak`
  ADD PRIMARY KEY (`id_kak`);

--
-- Indexes for table `pembatalan`
--
ALTER TABLE `pembatalan`
  ADD PRIMARY KEY (`id_batal`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kak`
--
ALTER TABLE `kak`
  MODIFY `id_kak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembatalan`
--
ALTER TABLE `pembatalan`
  MODIFY `id_batal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
