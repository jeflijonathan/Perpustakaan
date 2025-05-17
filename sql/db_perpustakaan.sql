-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2025 pada 14.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `ID_Anggota` int(11) NOT NULL,
  `Nama_Anggota` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `No_Telepon` varchar(25) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahasa`
--

CREATE TABLE `tb_bahasa` (
  `ID_Bahasa` int(11) NOT NULL,
  `Nama_Bahasa` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Id_Penerbit` int(11) NOT NULL,
  `ID_Bahasa` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `Stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID_Kategori` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `ID_Peminjaman` int(11) NOT NULL,
  `Tanggal_Pinjam` date NOT NULL,
  `Tanggal_Kembali` date NOT NULL,
  `ID_Anggota` int(11) NOT NULL,
  `ID_Pustakawan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `ID_Penerbit` int(11) NOT NULL,
  `Nama_Penerbit` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penulis`
--

CREATE TABLE `tb_penulis` (
  `ID_Penulis` int(11) NOT NULL,
  `Nama_Penulis` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `No_Telepon` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penulis_buku`
--

CREATE TABLE `tb_penulis_buku` (
  `ID_Buku` int(11) NOT NULL,
  `ID_Penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pustakawan`
--

CREATE TABLE `tb_pustakawan` (
  `ID_Pustakawan` int(11) NOT NULL,
  `Nama_Pustakawan` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `No_Telepon` varchar(25) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indeks untuk tabel `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  ADD PRIMARY KEY (`ID_Bahasa`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`ID_Buku`),
  ADD KEY `Id_Penerbit` (`Id_Penerbit`),
  ADD KEY `ID_Kategori` (`ID_Kategori`),
  ADD KEY `ID_Bahasa` (`ID_Bahasa`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`ID_Peminjaman`),
  ADD KEY `ID_Anggota` (`ID_Anggota`),
  ADD KEY `ID_Pustakawan` (`ID_Pustakawan`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`ID_Penerbit`);

--
-- Indeks untuk tabel `tb_penulis`
--
ALTER TABLE `tb_penulis`
  ADD PRIMARY KEY (`ID_Penulis`);

--
-- Indeks untuk tabel `tb_penulis_buku`
--
ALTER TABLE `tb_penulis_buku`
  ADD KEY `ID_Buku` (`ID_Buku`),
  ADD KEY `ID_Penulis` (`ID_Penulis`);

--
-- Indeks untuk tabel `tb_pustakawan`
--
ALTER TABLE `tb_pustakawan`
  ADD PRIMARY KEY (`ID_Pustakawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `ID_Anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_bahasa`
--
ALTER TABLE `tb_bahasa`
  MODIFY `ID_Bahasa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `ID_Buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `ID_Kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penulis`
--
ALTER TABLE `tb_penulis`
  MODIFY `ID_Penulis` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`Id_Penerbit`) REFERENCES `tb_penerbit` (`ID_Penerbit`),
  ADD CONSTRAINT `tb_buku_ibfk_2` FOREIGN KEY (`ID_Kategori`) REFERENCES `tb_kategori` (`ID_Kategori`),
  ADD CONSTRAINT `tb_buku_ibfk_3` FOREIGN KEY (`ID_Bahasa`) REFERENCES `tb_bahasa` (`ID_Bahasa`);

--
-- Ketidakleluasaan untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`ID_Anggota`) REFERENCES `tb_anggota` (`ID_Anggota`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`ID_Pustakawan`) REFERENCES `tb_pustakawan` (`ID_Pustakawan`);

--
-- Ketidakleluasaan untuk tabel `tb_penulis_buku`
--
ALTER TABLE `tb_penulis_buku`
  ADD CONSTRAINT `tb_penulis_buku_ibfk_1` FOREIGN KEY (`ID_Buku`) REFERENCES `tb_buku` (`ID_Buku`),
  ADD CONSTRAINT `tb_penulis_buku_ibfk_2` FOREIGN KEY (`ID_Penulis`) REFERENCES `tb_penulis` (`ID_Penulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
