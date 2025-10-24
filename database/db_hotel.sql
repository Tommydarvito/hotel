-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2025 at 02:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `deskripsi` text,
  `harga_per_malam` int NOT NULL,
  `kapasitas` int NOT NULL,
  `jumlah_bed` varchar(50) NOT NULL,
  `luas` varchar(20) DEFAULT NULL,
  `fasilitas` text,
  `gambar` varchar(255) DEFAULT NULL,
  `diskon` float DEFAULT '0',
  `rating` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `deskripsi`, `harga_per_malam`, `kapasitas`, `jumlah_bed`, `luas`, `fasilitas`, `gambar`, `diskon`, `rating`) VALUES
(1, 'Single Room', 'Kamar nyaman untuk satu orang dengan tempat tidur single, cocok bagi solo travel atau pebisnis yang mencari kenyamanan dengan harga terjangkau.', 450000, 1, '1 Bedrooms', '24 m²', 'AC \r\nTV layar datar\r\nMeja kerja kecil\r\nKamar mandi pribadi\r\nWi-Fi gratis\r\nLemari kecil atau gantungan pakaian', 'single.jpg', 0, 4.8),
(2, 'Double Room', 'Dilengkapi dua kamar tidur terpisah dengan desain modern, ideal untuk tamu yang menginginkan ruang lebih luas dan privasi.', 650000, 2, '2 Bedrooms', '28 m²', 'AC\r\nTV layar datar\r\nKamar mandi pribadi \r\nWi-Fi gratis\r\nMeja kerja dan kursi\r\nLemari pakaian\r\nteko listrik', 'double.jpg', 0, 4.7),
(3, 'Deluxe Room', 'Ruangan luas dengan balkon pribadi dan pemandangan kota. Dilengkapi bathtub, minibar, dan sofa santai untuk pengalaman menginap yang mewah.', 1100000, 2, '1 King Bedrooms', '35 m²', 'Balkon \r\nTV LED\r\nkulkas kecil\r\nBathup dan shower\r\nAC & Wi-Fi cepat\r\nMeja kerja + sofa kecil\r\nBrankas pribadi \r\nSandal & perlengkapan mandi lengkap', 'deluxee.jpg', 0, 4.9),
(4, 'Suite Room', 'Suite eksklusif dengan ruang tamu terpisah, area kerja elegan, serta kamar mandi marmer dengan bathtub. Sempurna untuk tamu yang menginginkan kemewahan dan privasi.', 2100000, 2, '1 King Bedrooms', '42 m²', 'TV besar di 2 ruangan\r\nBathup jacuzzi\r\nMini bar lengkap & kulkas besar\r\nSofa set & meja makan kecil\r\nBalkon besar\r\nBrankas pribadi\r\nRoom service 24 jam\r\nPerlengkapan mandi premium', 'suitee.jpg', 0, 4.9),
(5, 'Family Room', 'Didesain untuk keluarga, dengan dua tempat tidur queen, ruang bermain anak, dan area duduk luas. Menyediakan kenyamanan bagi seluruh anggota keluarga.', 2200000, 4, '2 Bedrooms', '50 m²', 'Ruang tamu kecil\r\nTV LED besar\r\nKulkas & teko listrik\r\nKamar mandi besar \r\nWi-Fi dan AC di seluruh ruangan\r\nMeja makan mini\r\nBalkon \r\nMainan anak ', 'loby.jpg', 0, 4.9),
(6, 'Executive Room', 'Kamar premium dengan pemandangan kota dari lantai atas, dilengkapi meja kerja ergonomis, layanan kamar 24 jam, dan akses lounge eksekutif.', 2500000, 2, '2 King Bedrooms', '54 m²', 'Ruang tamu & ruang kerja mewah\r\nTV besar \r\nBathup jacuzzi \r\nMini bar eksklusif\r\nMesin kopi premium\r\nBrankas digital\r\nAkses lounge eksekutif\r\nLayanan butler pribadi\r\nView panorama kota', 'executive.jpg', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `total_bayar` int NOT NULL,
  `bukti_pembayaran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_pembayaran` datetime DEFAULT CURRENT_TIMESTAMP,
  `status_pembayaran` enum('menunggu','terverifikasi','gagal') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `metode_pembayaran`, `total_bayar`, `bukti_pembayaran`, `tanggal_pembayaran`, `status_pembayaran`) VALUES
(1, 1, 'transfer', 450000, 'bukti_1_1761271171.png', '2025-10-24 08:59:31', 'terverifikasi'),
(2, 2, 'cash', 900000, NULL, '2025-10-24 09:15:01', 'menunggu'),
(3, 3, 'transfer', 1350000, 'bukti_3_1761272485.png', '2025-10-24 09:21:25', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_kamar` int NOT NULL,
  `jumlah_kamar` int DEFAULT '1',
  `jumlah_tamu` int DEFAULT '1',
  `durasi_malam` int DEFAULT '1',
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `total_harga` int NOT NULL,
  `status_pemesanan` enum('pending','dibayar','selesai','batal') DEFAULT 'pending',
  `tanggal_pesan` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_kamar`, `jumlah_kamar`, `jumlah_tamu`, `durasi_malam`, `tanggal_checkin`, `tanggal_checkout`, `total_harga`, `status_pemesanan`, `tanggal_pesan`) VALUES
(1, 3, 1, 1, 1, 1, '2025-10-25', '2025-10-26', 450000, 'dibayar', '2025-10-24 08:59:19'),
(2, 2, 1, 1, 1, 2, '2025-10-25', '2025-10-27', 900000, 'pending', '2025-10-24 09:14:53'),
(3, 4, 1, 1, 1, 3, '2025-10-25', '2025-10-28', 1350000, 'pending', '2025-10-24 09:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `tanggal_daftar` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `no_tlp`, `role`, `tanggal_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$/XbciI5tL8NI4l.Fp0A7bu9F1qX6.ahq72E8twg9Hdd/X8dA2385i', '0318911', 'admin', '2025-10-24 08:46:39'),
(2, 'rusdi', 'rusdi@gmail.com', '$2y$10$qapU.9N1LfcvirVUBzIW6.lnx9X2DBLSavbl.ZvevXjI9cKl9.MO6', '43285320', 'customer', '2025-10-24 01:54:09'),
(3, 'amba', 'amba@gmail.com', '$2y$10$m6VBAP8zAycb6gxWYGLTiO9hpXZuh1w.qFazi0WP1Yrd.BXCfh5cK', '428702', 'customer', '2025-10-24 01:58:39'),
(4, 'ayam', 'ayam@gmail.com', '$2y$10$W.ziqT40HEEy7dvMElY4Wu9waISxjo0FmNVlQ1VweLbAc9F47.NdK', '32563', 'customer', '2025-10-24 02:19:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
