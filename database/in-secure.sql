-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Bulan Mei 2025 pada 07.27
-- Versi server: 5.7.24
-- Versi PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `in-secure`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `isi` mediumtext NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `gambar`, `judul`, `unit_id`, `isi`, `link_reset`, `tanggal_update`, `views`) VALUES
(1, 'desain-tanpa-judul-17-1746673239.png', 'PIKK PLN Surabaya Barat Tingkatkan Ketrampilan Desain Dalam Berdayakan Perempuan', '5', '<p>lorem</p>', NULL, '2025-05-13 20:06:54', NULL),
(2, 'screenshot-2025-04-29-094627-1746673374.png', 'Penambahan Arus Listrik', '5', '<p>lorem</p>', NULL, '2025-05-16 01:59:13', NULL),
(3, 'img-20241204-wa0018-1-1747386077.jpg', 'Penambahan Arus Listrik', '5', '<p>oke</p>', NULL, '2025-05-16 09:01:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift_masuk`
--

CREATE TABLE `shift_masuk` (
  `id_masuk` int(11) NOT NULL,
  `nama_security_1` varchar(255) NOT NULL,
  `jam_kehadiran_1` time NOT NULL,
  `nama_security_2` varchar(255) NOT NULL,
  `jam_kehadiran_2` time NOT NULL,
  `nama_security_3` varchar(255) DEFAULT NULL,
  `jam_kehadiran_3` time DEFAULT NULL,
  `shift` varchar(255) NOT NULL,
  `tanggal_shift` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `shift_masuk`
--

INSERT INTO `shift_masuk` (`id_masuk`, `nama_security_1`, `jam_kehadiran_1`, `nama_security_2`, `jam_kehadiran_2`, `nama_security_3`, `jam_kehadiran_3`, `shift`, `tanggal_shift`, `foto`, `link_reset`, `tanggal_update`) VALUES
(7, 'Aku', '12:38:00', 'Ikan', '11:40:00', NULL, NULL, 'Pagi', '2025-05-15', 'img-20241205-wa0004-1747283908.jpg', NULL, '2025-05-14 21:38:28'),
(9, 'Aku', '19:14:00', 'Ria', '19:04:00', NULL, NULL, 'Malam', '2025-05-16', 'img20241119wa0011-1747376112.jpg', NULL, '2025-05-15 23:15:12'),
(10, 'Aku', '14:05:00', 'Kamu', '14:05:00', NULL, NULL, 'Siang', '2025-05-16', 'img-20241204-wa0018-1747378993.jpg', NULL, '2025-05-16 00:03:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift_selesai`
--

CREATE TABLE `shift_selesai` (
  `id_selesai` int(11) NOT NULL,
  `nama_security_1` varchar(255) NOT NULL,
  `jam_selesai_1` time NOT NULL,
  `nama_security_2` varchar(255) NOT NULL,
  `jam_selesai_2` time NOT NULL,
  `nama_security_3` varchar(255) DEFAULT NULL,
  `jam_selesai_3` time DEFAULT NULL,
  `tanggal_shift` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `lampu` varchar(255) NOT NULL,
  `membuka_kunci` varchar(255) NOT NULL,
  `mengunci_pintu` varchar(255) NOT NULL,
  `uraian_kegiatan` mediumtext NOT NULL,
  `catatan_shift_selanjutnya` mediumtext NOT NULL,
  `shift` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `shift_selesai`
--

INSERT INTO `shift_selesai` (`id_selesai`, `nama_security_1`, `jam_selesai_1`, `nama_security_2`, `jam_selesai_2`, `nama_security_3`, `jam_selesai_3`, `tanggal_shift`, `foto`, `lampu`, `membuka_kunci`, `mengunci_pintu`, `uraian_kegiatan`, `catatan_shift_selanjutnya`, `shift`, `link_reset`, `tanggal_update`) VALUES
(8, 'Aku', '16:14:00', 'Kamu', '16:14:00', NULL, NULL, '2025-05-16', 'img-20241205-wa0004-1747386987.jpg', 'Sudah', 'Sudah', 'Sudah', '<p>oke</p>', '<p>Menyalurkan surat masuk</p>', 'Pagi', NULL, '2025-05-16 02:16:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id_unit` int(111) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id_unit`, `nama`) VALUES
(1, 'Security'),
(2, 'Staff'),
(3, 'Manager'),
(4, 'Asisten Manager'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `unit_id` varchar(255) NOT NULL,
  `link_reset` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `unit_id`, `link_reset`, `tanggal_update`) VALUES
(1, 'Narendra', 'narendra@gmail.com', 'rendra', '48965b6388a34f47ea8283ae0958904444becf93', '5', NULL, '2025-05-19 04:38:55'),
(2, 'sayasecurity', 'sayasecurity@gmail.com', 'security', 'f45fc5847bee336ee240f2698da4d5833caa5803', '1', NULL, '2025-05-19 06:06:13'),
(5, 'security2', 'security2@gmail.com', 'security2', '479d99c0b61c809e259e2144cf259984bf229f13', '1', NULL, '2025-05-19 06:36:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `shift_masuk`
--
ALTER TABLE `shift_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `shift_selesai`
--
ALTER TABLE `shift_selesai`
  ADD PRIMARY KEY (`id_selesai`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `shift_masuk`
--
ALTER TABLE `shift_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `shift_selesai`
--
ALTER TABLE `shift_selesai`
  MODIFY `id_selesai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id_unit` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
