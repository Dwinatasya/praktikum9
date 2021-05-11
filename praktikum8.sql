-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 12:32 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum8`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_lainnya`
--

CREATE TABLE `data_lainnya` (
  `id_lainnya` int(10) NOT NULL,
  `hp` int(30) NOT NULL,
  `telp` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kps_pkh_kip` varchar(5) NOT NULL,
  `no_kps_kks_kip` int(20) NOT NULL,
  `warga_negara` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_lainnya`
--

INSERT INTO `data_lainnya` (`id_lainnya`, `hp`, `telp`, `email`, `kps_pkh_kip`, `no_kps_kks_kip`, `warga_negara`) VALUES
(1, 2147483647, 0, 'kyubi11.dwi@gmail.com', 'Tidak', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pribadi`
--

CREATE TABLE `data_pribadi` (
  `id_pribadi` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nik` int(16) NOT NULL,
  `tempallahir` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kelainan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pribadi`
--

INSERT INTO `data_pribadi` (`id_pribadi`, `nama`, `jeniskelamin`, `nisn`, `nik`, `tempallahir`, `tgllahir`, `agama`, `kelainan`) VALUES
(1, 'Kadek Dwi Natasya Pradnyani', 'P', 3142141, 4124142, 'Bangli', '2001-09-11', 'Hindu', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `data_tempattinggal`
--

CREATE TABLE `data_tempattinggal` (
  `id_tempattinggal` int(10) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `rt` varchar(30) NOT NULL,
  `rw` varchar(30) NOT NULL,
  `dusun` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kodpos` int(10) NOT NULL,
  `tempattinggal` varchar(30) NOT NULL,
  `transportasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tempattinggal`
--

INSERT INTO `data_tempattinggal` (`id_tempattinggal`, `jalan`, `rt`, `rw`, `dusun`, `desa`, `kecamatan`, `kodpos`, `tempattinggal`, `transportasi`) VALUES
(1, 'Arjuna Mas', '', '', '', 'Br. Puseh', 'Kediri', 121212, 'Bersama Orang Tua', 'Jalan kaki');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_didik`
--

CREATE TABLE `peserta_didik` (
  `id_peserta` int(10) NOT NULL,
  `jenispendaf` varchar(30) NOT NULL,
  `tglmasuk` date NOT NULL,
  `nis` int(10) NOT NULL,
  `nopeserta` int(20) NOT NULL,
  `paud` varchar(5) NOT NULL,
  `tk` varchar(5) NOT NULL,
  `noskhun` int(16) NOT NULL,
  `noijasah` int(16) NOT NULL,
  `hobi` varchar(10) NOT NULL,
  `citacita` varchar(10) NOT NULL,
  `id_pribadi` int(10) NOT NULL,
  `id_tempattinggal` int(10) NOT NULL,
  `id_lainnya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_didik`
--

INSERT INTO `peserta_didik` (`id_peserta`, `jenispendaf`, `tglmasuk`, `nis`, `nopeserta`, `paud`, `tk`, `noskhun`, `noijasah`, `hobi`, `citacita`, `id_pribadi`, `id_tempattinggal`, `id_lainnya`) VALUES
(1, 'Siswa Baru', '2021-05-04', 1111122222, 2147483647, 'Tidak', 'Ya', 2147483647, 2147483647, 'Kesenian', 'Wirausaha', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lainnya`
--
ALTER TABLE `data_lainnya`
  ADD PRIMARY KEY (`id_lainnya`);

--
-- Indexes for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  ADD PRIMARY KEY (`id_pribadi`);

--
-- Indexes for table `data_tempattinggal`
--
ALTER TABLE `data_tempattinggal`
  ADD PRIMARY KEY (`id_tempattinggal`);

--
-- Indexes for table `peserta_didik`
--
ALTER TABLE `peserta_didik`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_pribadi` (`id_pribadi`),
  ADD KEY `id_tempattinggal` (`id_tempattinggal`),
  ADD KEY `id_lainnya` (`id_lainnya`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lainnya`
--
ALTER TABLE `data_lainnya`
  MODIFY `id_lainnya` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pribadi`
--
ALTER TABLE `data_pribadi`
  MODIFY `id_pribadi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_tempattinggal`
--
ALTER TABLE `data_tempattinggal`
  MODIFY `id_tempattinggal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta_didik`
--
ALTER TABLE `peserta_didik`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
