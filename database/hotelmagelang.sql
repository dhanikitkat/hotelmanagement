-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2024 pada 05.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmagelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `harga_min` int(100) DEFAULT NULL,
  `harga_max` int(100) DEFAULT NULL,
  `gambar_hotel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `alamat`, `fasilitas`, `telepon`, `email`, `website`, `harga_min`, `harga_max`, `gambar_hotel`) VALUES
(2, 'Hotel Puri Asri', 'Jl. Cempaka, 9, 56122 Magelang, Indonesia', 'Restoran,  Pool, Wi-Fi', '082345678901', 'reservation@hotelpuriasri.com', 'www.hotelpuriasri.com', 350000, 950000, '79432349.jpg'),
(3, 'Hotel Sriti', 'Jalan Daha No 23, 56122 Magelang, Indonesia', 'Kolam renang, Spa, Gym', '083456789012', 'info@hotelsriti.com', 'www.hotelsriti.com', 300000, 850000, '794323491.jpg'),
(5, 'Hotel Catur Magelang', 'Jl. Mayjend Bambang Soegeng ( Jl. Raya Mertoyudan ) no. 308 Magelang Jawa Tengah - Indonesia', 'Kolam renang, Wi-Fi', '(0293) 326 980', 'hotel_catur@yahoo.com', 'www.hotelcaturmgl.com', 150000, 400000, '794323492.jpg'),
(6, 'Hotel Sumber Waras', 'Jalan Pemuda No. 45, Magelang', 'Restoran, Wi-Fi', '0274-555555', 'reservation@hotelsumberwaras.com', 'www.hotelsumberwaras.com', 70000, 150000, '794323493.jpg'),
(7, 'Hotel Wisata Magelang', 'Jl. Jend. Sudirman No.139, Tidar Sel., Kec. Magelang Sel, Kota Magelang, Jawa Tengah 59214', 'Wi-Fi gratis, Parkir gratis, Ber-AC', '(0293) 364089', 'info@hotelwisatainternational.com', 'www.hotelwisatainternational.com', 150000, 400000, '794323494.jpg'),
(8, 'Hotel Oxalis Regency', 'Jl. Cempaka Street No.17, Magelang Selatan, Magelang, Indonesia, 56123', 'Restoran, Gym, Wi-Fi', '082345678901', 'reservation@hoteloxalisregency.com', 'www.hoteloxalisregency.com', 180000, 700000, '794323495.jpg'),
(10, 'Hotel Borobudur Indah Magelang', 'alan Jenderal Sudirman No. 51 Magelang', 'Spa, Wi-Fi', '081234567890', 'reservation@hotelborobudurmagelang.com', 'www.hotelborobudurmagelang.com', 120000, 320000, '794323496.jpg'),
(11, 'Ning Tidar Hotel', 'Jl. Magelang - Purworejo No.KM 1, Glagah, Banjarnegoro, Kec. Mertoyudan, Magelang, Jawa Tengah 56172', 'Kolam renang, Restoran, Wi-Fi', '081234567890', 'info@ningtidarhotel.com', 'www.ningtidarhotel.com', 250000, 560000, '794323497.jpg'),
(12, 'Plataran Heritage Borobudur Hotel', 'Dusun Kretek, Karangrejo, Borobudur, Magelang, Central Java 56553, 56553 Borobudur, Indonesia', 'Spa, Gym, Wi-Fi, Pool', '029 2345678901', 'reservation@plataranheritage.com', 'www.plataranheritage.com', 680000, 3500000, '794323498.jpg'),
(13, 'Trio Front One Resort Magelang', 'Jl. Jend. Sudirman No.72, Magelang Selatan, Magelang, Jawa Tengah, Indonesia, 56126', 'Kolam renang, Restoran, Spa, Wi-Fi', '083456789012', 'info@trifrontone.com', 'www.triofrontone.com', 427000, 570000, '794323499.jpg'),
(14, 'Eduhotel Citra Magelang', 'alan Pahlawan No.70, 56117, Magelang, Jawa Tengah', 'Restoran, Wi-Fi', '081234567890', 'reservation@eduhotel.com', 'www.eduhotel.com', 200000, 350000, '6666722a.jpg'),
(15, 'Citihub Hotel', 'Jl. Gatot Subroto 260 MAGELANG', 'Kolam renang, Spa, Wi-Fi', '082345678901', 'info@citihub.com', 'www.citihub.com', 290000, 600000, '625381_16100609440047474219.jpg'),
(16, 'Grand Artos Hotel', 'Jl. Mayjen Bambang Soegeng No.1, Kedungdowo, Mertoyudan, Kec. Mertoyudan, Kabupaten Magelang, Jawa Tengah 56172', 'Spa & Beauty, Eco & Adventure', '02933218888', 'artos@gmail.com', 'http://grandartoshotel.com/', 650000, 2000000, 'artos.jpg'),
(18, 'Hotel Ahava Magelang', 'Jln. Sriwijaya No. 450, Magelang 56111 Indonesia', 'Restoran, Gym, Wifi', '029 9352097', 'reservation@ahavamagelang.co.id', 'www.hotelahava.com', 350000, 700000, '1517544_16100314330047270085.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role_id`, `notelp`, `email_user`) VALUES
(1, 'John Doe', 'johndoe', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567890', 'johndoe@example.com'),
(2, 'Jane Smith', 'janesmith', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567891', 'janesmith@example.com'),
(3, 'Michael Johnson', 'michaeljohnson', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567892', 'michaeljohnson@example.com'),
(4, 'Emily Davis', 'emilydavis', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567893', 'emilydavis@example.com'),
(5, 'Daniel Wilson', 'danielwilson', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567894', 'danielwilson@example.com'),
(6, 'Olivia Anderson', 'oliviaanderson', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567895', 'oliviaanderson@example.com'),
(7, 'James Taylor', 'jamestaylor', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567896', 'jamestaylor@example.com'),
(8, 'Sophia Thomas', 'sophiathomas', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567897', 'sophiathomas@example.com'),
(9, 'Benjamin Clark', 'benjaminclark', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567898', 'benjaminclark@example.com'),
(10, 'Isabella Lewis', 'isabellalewis', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567899', 'isabellalewis@example.com'),
(11, 'William Lee', 'williamlee', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567810', 'williamlee@example.com'),
(12, 'Mia Martin', 'miamartin', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567811', 'miamartin@example.com'),
(13, 'Ethan Walker', 'ethanwalker', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567812', 'ethanwalker@example.com'),
(14, 'Ava Hernandez', 'avahernandez', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567813', 'avahernandez@example.com'),
(15, 'Liam Young', 'liamyoung', '482c811da5d5b4bc6d497ffa98491e38', 2, '081234567814', 'liamyoung@example.com'),
(16, 'Admin Ani Putri Salamah', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 1, '0822626594949', 'admin@gmail.com'),
(17, 'Operator Ani Putri Salamah', 'operator', '4b583376b2767b923c3e1da60d10de59', 2, '08392939499', 'operator@gmail.com'),
(18, 'ani putri', 'anips', 'f127d10308a4fc9d4bb3292802c581fe', 2, '029332195562', 'aniputri2403@gmail.com'),
(19, 'ada', 'ada', '8c8d357b5e872bbacd45197626bd5759', 2, 'ada', 'ada@ada.ada');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
