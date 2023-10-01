-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 02:53 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spphuxen`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `input_spp` (IN `tahun_input` INT(4), IN `nominal_input` INT(7))  INSERT INTO spp (tahun, nominal) VALUES (tahun_input, nominal_input)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'X RPL 1', 'Rekayasa Perangkat Lunak'),
(2, 'X RPL 2', 'Rekayasa Perangkat Lunak'),
(3, 'XI RPL 1', 'Rekayasa Perangkat Lunak'),
(4, 'XI RPL 2', 'Rekayasa Perangkat Lunak'),
(5, 'XII RPL 1', 'Rekayasa Perangkat Lunak'),
(6, 'XII RPL 2', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(4) NOT NULL,
  `id_petugas` int(2) DEFAULT NULL,
  `nisn` char(10) DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` varchar(10) NOT NULL,
  `tahun_bayar` varchar(4) NOT NULL,
  `id_spp` int(2) DEFAULT NULL,
  `jumlah_bayar` varchar(11) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `status` enum('Belum bayar','Sedang proses','Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_bayar`, `tahun_bayar`, `id_spp`, `jumlah_bayar`, `Foto`, `status`) VALUES
(1, 2, '1111', '0000-00-00', 'Januari', '2022', 1, '200000', '29749.jpg', 'Lunas'),
(3, 2, '3333', '0000-00-00', 'Januari', '2022', 1, '200000', '', 'Lunas'),
(5, 2, '4444', '0000-00-00', 'Januari', '2022', 1, '200000', '', 'Belum bayar'),
(9, 2, '2222', '2023-04-10', 'Februari', '2022', 1, '200000', 'Capture.PNG', 'Lunas'),
(24, 1, '1111', '0000-00-00', 'Januari', '2023', 1, '200000', '', 'Belum bayar'),
(25, 1, '2222', '0000-00-00', 'Januari', '2023', 1, '200000', '', 'Belum bayar'),
(26, 1, '3333', '0000-00-00', 'Januari', '2023', 1, '200000', '', 'Belum bayar'),
(27, 1, '1111', '0000-00-00', 'Januari', '2023', 1, '200000', '', 'Belum bayar'),
(28, 1, '2222', '0000-00-00', 'Januari', '2023', 1, '200000', '', 'Belum bayar'),
(29, 1, '3333', '0000-00-00', 'Januari', '2023', 1, '200000', '', 'Belum bayar'),
(30, 1, '1111', '0000-00-00', 'Januari', '2025', 1, '200000', '', 'Belum bayar'),
(31, 1, '2222', '0000-00-00', 'Januari', '2025', 1, '200000', '', 'Belum bayar'),
(32, 1, '3333', '0000-00-00', 'Januari', '2025', 1, '200000', '', 'Belum bayar'),
(33, 1, '1111', '0000-00-00', 'Agustus', '2024', 1, '200000', '', 'Belum bayar'),
(34, 1, '2222', '0000-00-00', 'Agustus', '2024', 1, '200000', '', 'Belum bayar'),
(35, 1, '3333', '0000-00-00', 'Agustus', '2024', 1, '200000', '', 'Belum bayar'),
(36, 1, '1111', '0000-00-00', 'Desember', '2025', 1, '200000', '', 'Belum bayar'),
(37, 1, '2222', '2023-04-10', 'Desember', '2025', 1, '200000', 'Capture.PNG', 'Lunas'),
(38, 1, '3333', '0000-00-00', 'Desember', '2025', 1, '200000', '', 'Belum bayar'),
(39, 1, '1111', '0000-00-00', 'Oktober', '2024', 1, '200000', '', 'Belum bayar'),
(40, 1, '2222', '2023-04-10', 'Oktober', '2024', 1, '200000', 'Capture.PNG', 'Lunas'),
(41, 1, '3333', '0000-00-00', 'Oktober', '2024', 1, '200000', '', 'Belum bayar');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'walter', '123', 'Husen', 'admin'),
(2, 'George W Bush', 'freedom', 'George W Bush', 'admin'),
(3, 'nopal', '123', 'Montgomary', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_kelas` int(2) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `id_spp` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('1111', '11111', 'victor', 1, 'usa', '03985392582', 1),
('2222', '22222', 'navorsky', 1, 'russia', '07376578969', 1),
('3333', '33333', 'goose', 1, 'usa', '019324357574', 1),
('4444', '44444', 'afduer', 2, 'dsjcnsdhuvg\r\n', '235354645', 1),
('5555', '55555', 'thoriq', 2, 'afg', '08987416689', 1),
('6666', '66666', 'syamsir', 2, 'dfgdf', '0812345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2023, 200000),
(2, 2023, 250000),
(3, 2023, 350000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_5` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_6` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_7` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
