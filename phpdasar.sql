-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 12 Okt 2021 pada 05.35
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
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `absen` char(2) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `absen`, `kelas`, `jurusan`, `gambar`) VALUES
(1, 'IBRAHIM', '01', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163d99610d56.png'),
(2, 'JULIAN', '07', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163d988042f6.png'),
(3, 'LOVIANNO', '11', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163d963de144.png'),
(4, 'MORENO', '18', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163d9463d828.png'),
(26, 'FIRMAN', '27', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163a0478798e.png'),
(27, 'REZA ', '29', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163a088129a1.png'),
(28, 'AMELLLL', '39', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163a0a17e4c0.png'),
(29, 'venosaur', '40', 'XI (SEBELAS)', 'Rekayasa Perangkat Lunak', '6163a0b3d4377.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'reza', '$2y$10$0nhCz275E/vH8RdKwuU6uuouR.jJ78Ir54Z7V.IQPj3.xKFPGc//O');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
