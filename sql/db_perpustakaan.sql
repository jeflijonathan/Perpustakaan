-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 11:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `ID_Anggota` int(11) NOT NULL,
  `Nama_Anggota` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `No_Telepon` varchar(25) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`ID_Anggota`, `Nama_Anggota`, `Email`, `No_Telepon`, `Status`, `Created_At`, `Updated_At`) VALUES
(1, 'Jefli Jonathan', 'jeflijonathan@gmail.com', '08218238748', 0, '2025-05-18 05:31:47', '2025-05-18 09:23:56'),
(2, 'Nicholas Tan', 'NicholasTan@gmail.com', '08218238749', 1, '2025-05-18 05:41:53', '2025-05-18 05:41:53'),
(3, 'Calvin', 'Calvin@gmail.com', '082182616802', 1, '2025-05-18 09:24:27', '2025-05-18 09:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahasa`
--

CREATE TABLE `tb_bahasa` (
  `ID_Bahasa` int(11) NOT NULL,
  `Nama_Bahasa` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bahasa`
--

INSERT INTO `tb_bahasa` (`ID_Bahasa`, `Nama_Bahasa`, `Created_At`, `Status`) VALUES
(1, 'Indonesia', '2025-05-18 05:05:29', 1),
(2, 'Inggris', '2025-05-18 05:05:36', 1),
(3, 'Jepang', '2025-05-18 05:05:42', 1),
(4, 'Mandarin', '2025-05-18 05:05:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Id_Penerbit` int(11) NOT NULL,
  `ID_Bahasa` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`ID_Buku`, `Judul`, `Id_Penerbit`, `ID_Bahasa`, `ID_Kategori`, `Stok`, `Created_At`, `Updated_At`, `Status`) VALUES
(1, 'Cara Membuat Nasi Goreng', 2, 1, 1, 1, '2025-05-18 05:09:30', '2025-05-18 09:07:04', 1),
(2, 'Cara Cepat Success', 4, 1, 3, 0, '2025-05-18 06:32:47', '2025-05-18 09:06:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID_Kategori` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`ID_Kategori`, `Nama`, `Status`, `Created_At`, `Updated_At`) VALUES
(1, 'Jurnal', '1', '2025-05-18 05:02:24', '2025-05-18 05:02:24'),
(2, 'Novel NonFiksi', '1', '2025-05-18 05:02:42', '2025-05-18 05:03:19'),
(3, 'Novel Fiksi', '1', '2025-05-18 05:03:09', '2025-05-18 05:03:09'),
(4, 'Komik', '1', '2025-05-18 05:03:28', '2025-05-18 05:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `ID_Peminjaman` int(11) NOT NULL,
  `Tanggal_Pinjam` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL,
  `ID_Anggota` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` enum('Dipinjam','Dibatalkan','Dikembalikan','') NOT NULL,
  `ID_Buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`ID_Peminjaman`, `Tanggal_Pinjam`, `Tanggal_Kembali`, `ID_Anggota`, `Created_At`, `Updated_At`, `Status`, `ID_Buku`) VALUES
(1, '2025-05-19', '2025-05-20', 1, '2025-05-18 05:34:39', '2025-05-18 08:25:12', 'Dikembalikan', 1),
(2, '2025-05-19', '2025-05-20', 2, '2025-05-18 05:42:21', '2025-05-18 08:19:20', '', 1),
(3, '2025-05-19', '2025-05-20', 2, '2025-05-18 06:16:08', '2025-05-18 08:19:20', '', 1),
(4, '2025-05-18', '2025-05-22', 1, '2025-05-18 07:20:40', '2025-05-18 08:19:20', '', 1),
(5, '2025-05-18', '2025-05-21', 1, '2025-05-18 07:26:59', '2025-05-18 08:19:20', '', 1),
(6, '2025-05-18', '2025-05-21', 1, '2025-05-18 07:27:43', '2025-05-18 08:19:20', '', 1),
(7, '2025-05-18', '2025-05-21', 1, '2025-05-18 07:28:10', '2025-05-18 08:19:20', '', 1),
(8, '2025-05-18', '2025-05-20', 1, '2025-05-18 07:28:33', '2025-05-18 08:19:20', '', 1),
(9, '2025-05-18', '2025-05-22', 1, '2025-05-18 07:29:17', '2025-05-18 08:19:20', '', 1),
(10, '2025-05-18', '2025-05-30', 1, '2025-05-18 07:32:25', '2025-05-18 08:19:20', '', 1),
(11, '2025-05-18', '2025-05-14', 1, '2025-05-18 07:32:32', '2025-05-18 08:19:20', '', 1),
(12, '2025-05-18', '2025-05-22', 1, '2025-05-18 07:34:26', '2025-05-18 08:19:20', '', 2),
(13, '2025-05-18', '2025-05-20', 1, '2025-05-18 08:25:20', '2025-05-18 09:07:04', 'Dikembalikan', 1),
(14, '2025-05-18', '2025-05-29', 2, '2025-05-18 09:06:50', '2025-05-18 09:06:50', 'Dipinjam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `ID_Penerbit` int(11) NOT NULL,
  `Nama_Penerbit` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`ID_Penerbit`, `Nama_Penerbit`, `Status`, `Created_At`, `Updated_At`) VALUES
(1, 'Erlanga', 1, '2025-05-18 05:06:06', '2025-05-18 05:06:41'),
(2, 'Gramedia Pustaka Utama', 1, '2025-05-18 05:07:02', '2025-05-18 05:07:02'),
(3, 'Mizan', 1, '2025-05-18 05:07:16', '2025-05-18 05:07:16'),
(4, 'Bentang Pustaka', 1, '2025-05-18 05:07:25', '2025-05-18 05:07:25'),
(5, 'Penerbit Kanisius', 1, '2025-05-18 05:07:34', '2025-05-18 05:07:34'),
(6, 'GagasMedia', 1, '2025-05-18 05:07:45', '2025-05-18 05:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penulis`
--

CREATE TABLE `tb_penulis` (
  `ID_Penulis` int(11) NOT NULL,
  `Nama_Penulis` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `No_Telepon` varchar(25) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penulis`
--

INSERT INTO `tb_penulis` (`ID_Penulis`, `Nama_Penulis`, `Email`, `No_Telepon`, `Created_At`, `Updated_At`, `Status`) VALUES
(1, 'jefli jonathan', 'jeflyjonathan1@gmail.com', '082182616807', '2025-05-18 05:08:02', '2025-05-18 05:15:16', 1),
(2, 'Michael Felix Chandara', 'MichaelFelixChan@gmail.com', '082182616801', '2025-05-18 05:08:16', '2025-05-18 05:15:51', 1),
(3, 'Calvin', 'Calvin@gmail.com', '082182616805', '2025-05-18 05:08:33', '2025-05-18 05:08:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penulis_buku`
--

CREATE TABLE `tb_penulis_buku` (
  `ID_Buku` int(11) NOT NULL,
  `ID_Penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penulis_buku`
--

INSERT INTO `tb_penulis_buku` (`ID_Buku`, `ID_Penulis`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indexes for table `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  ADD PRIMARY KEY (`ID_Bahasa`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`ID_Buku`),
  ADD KEY `Id_Penerbit` (`Id_Penerbit`),
  ADD KEY `ID_Kategori` (`ID_Kategori`),
  ADD KEY `ID_Bahasa` (`ID_Bahasa`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`ID_Peminjaman`),
  ADD KEY `ID_Anggota` (`ID_Anggota`),
  ADD KEY `ID_Buku` (`ID_Buku`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`ID_Penerbit`);

--
-- Indexes for table `tb_penulis`
--
ALTER TABLE `tb_penulis`
  ADD PRIMARY KEY (`ID_Penulis`);

--
-- Indexes for table `tb_penulis_buku`
--
ALTER TABLE `tb_penulis_buku`
  ADD KEY `ID_Buku` (`ID_Buku`),
  ADD KEY `ID_Penulis` (`ID_Penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `ID_Anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  MODIFY `ID_Bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `ID_Buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `ID_Peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `ID_Penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penulis`
--
ALTER TABLE `tb_penulis`
  MODIFY `ID_Penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`Id_Penerbit`) REFERENCES `tb_penerbit` (`ID_Penerbit`),
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`ID_Kategori`) REFERENCES `tb_kategori` (`ID_Kategori`),
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`ID_Bahasa`) REFERENCES `tb_bahasa` (`ID_Bahasa`);

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`ID_Anggota`) REFERENCES `tb_anggota` (`ID_Anggota`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`ID_Buku`) REFERENCES `tb_buku` (`ID_Buku`);

--
-- Constraints for table `tb_penulis_buku`
--
ALTER TABLE `tb_penulis_buku`
  ADD CONSTRAINT `tb_penulis_buku_ibfk_1` FOREIGN KEY (`ID_Buku`) REFERENCES `tb_buku` (`ID_Buku`),
  ADD CONSTRAINT `tb_penulis_buku_ibfk_2` FOREIGN KEY (`ID_Penulis`) REFERENCES `tb_penulis` (`ID_Penulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
