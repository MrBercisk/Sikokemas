-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2021 pada 18.38
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikokemas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_penchat` int(5) NOT NULL,
  `pesan` varchar(300) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_antrian`
--

CREATE TABLE `data_antrian` (
  `id_antrian` int(11) NOT NULL,
  `no_antrian` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_puskesmas` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `no_hp`, `email`, `password`, `foto`) VALUES
(3, 'dr Darto', '0875433433', 'darto@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(10, 'dr. Edi', '0099474623846', 'edi@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(11, 'dr. Santi', '34343', 'iwan@gmail.com', '202cb962ac59075b964b07152d234b70', '1639410050.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama_login` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_puskesmas` varchar(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama_login`, `email`, `password`, `id_puskesmas`, `is_active`) VALUES
(1, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 1),
(2, 'Anto', 'anto@gmail.com', '202cb962ac59075b964b07152d234b70', '1', 1),
(3, 'Bimo', 'bimo@gmail.com', '202cb962ac59075b964b07152d234b70', '2', 1),
(4, 'Noval', 'noval@gmail.com', '202cb962ac59075b964b07152d234b70', '3', 1),
(5, 'Fauzi', 'fauzi@yahoo.com', '202cb962ac59075b964b07152d234b70', '4', 1),
(7, 'edo', 'edo@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `kategori`, `id_login`) VALUES
(1, 'Paramek ', 'obat sakit kepala', 1),
(2, 'Amoxilin', 'Obat Sakit Kulit', 1),
(3, 'Betadin', 'Luka Bakar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id_puskesmas` int(11) NOT NULL,
  `nama_puskesmas` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `puskesmas`
--

INSERT INTO `puskesmas` (`id_puskesmas`, `nama_puskesmas`, `alamat`, `id_login`) VALUES
(1, 'Puskesmas Ambar Ketawang', 'gamping', 1),
(2, 'Sikokemas', 'Wakuncar', 1),
(3, 'Puskesmas Gamping', 'jl Brawijaya', 1),
(4, 'Puskesmas Srunggo 1', 'Imogiri Bantul', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pengobatan`
--

CREATE TABLE `riwayat_pengobatan` (
  `id_riwayat` int(11) NOT NULL,
  `no_antrian` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `usia` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_hp`, `usia`, `email`, `password`, `foto`, `tgl_entry`) VALUES
(1, 'Noval', 'ee', '08123456789', '50', 'novalsaja@gmail.com', '202cb962ac59075b964b07152d234b70', '1638966700pas.jpg', '2021-11-21 11:12:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `data_antrian`
--
ALTER TABLE `data_antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id_puskesmas`);

--
-- Indeks untuk tabel `riwayat_pengobatan`
--
ALTER TABLE `riwayat_pengobatan`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_antrian`
--
ALTER TABLE `data_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id_puskesmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pengobatan`
--
ALTER TABLE `riwayat_pengobatan`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
