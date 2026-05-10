-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2026 at 03:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mosaic`
--

-- --------------------------------------------------------

--
-- Table structure for table `perkara`
--

CREATE TABLE `perkara` (
  `id` int(11) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `tanggal_registrasi_perkara` varchar(11) NOT NULL,
  `no_perkara` varchar(50) NOT NULL,
  `is_ecourt` int(11) NOT NULL DEFAULT 1,
  `jenis_perkara_id` int(11) NOT NULL,
  `satker_id` int(11) NOT NULL,
  `nama_penggugat` varchar(100) NOT NULL,
  `nomor_hp_penggugat` varchar(15) NOT NULL,
  `email_penggugat` varchar(100) NOT NULL,
  `alamat_domisili_penggugat` text NOT NULL,
  `nama_tergugat` varchar(100) NOT NULL,
  `nomor_hp_tergugat` varchar(15) NOT NULL,
  `email_tergugat` varchar(100) NOT NULL,
  `alamat_domisili_tergugat` text NOT NULL,
  `hakim_ketua` varchar(100) DEFAULT NULL,
  `hakim_anggota_satu` varchar(100) DEFAULT NULL,
  `hakim_anggota_dua` varchar(100) DEFAULT NULL,
  `panitera_pengganti` varchar(100) DEFAULT NULL,
  `tanggal_sidang_putusan` varchar(15) DEFAULT NULL,
  `tanggal_ikrar_talak` varchar(15) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level_user` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_token` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `activated_at` timestamp NULL DEFAULT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `original_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `kontak`, `password`, `last_login`, `level_user`, `token`, `expired_token`, `is_active`, `activated_at`, `registered_at`, `original_pass`) VALUES
(1, 'admin@gmail.com', 'Admin', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2026-04-25 11:21:15', 1, '', NULL, 1, NULL, '2026-04-25 11:16:23', ''),
(2, 'koordinator@gmail.com', 'Koordinator', '082189299222', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2026-05-03 23:00:42', 2, '', NULL, 1, NULL, '2026-04-25 11:16:23', ''),
(3, 'sekretaris@gmail.com', 'Sekretaris', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2026-04-25 09:47:10', 3, '', NULL, 1, NULL, '2026-04-25 11:16:23', ''),
(4, 'hkdokptaplg@gmail.com', 'Cean Feby Validia', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2026-04-27 22:19:42', 4, '', NULL, 1, NULL, '2026-04-25 11:16:23', ''),
(20, 'panitera@gmail.com', 'Panitera', '081299929922', '$2y$10$i6LAb9xDh4G.pgVZ.cGknOUtRiPvK5SAW8SeMvAnICqKvnejunsQS', '2026-04-27 22:20:20', 3, '', NULL, 1, NULL, '2026-04-25 11:16:23', ''),
(28, 'yusron.ptaplg@gmail.com', 'Muhammad Yusron Hartoyo', '089691983093', '$2y$10$sBeCRybXmVFd1pA/oHrzCeQQEu9DUBnf3IvqCa.jci2LhaMAaxbdW', '2026-05-04 08:03:49', 4, '', NULL, 1, NULL, '2026-04-25 13:20:59', '12qwasZX!@#'),
(29, 'forumbelajardipkomilkom@gmail.com', 'Gusti', '082188299922', '$2y$10$UXbECQTgWl/xy.t1ImPI0ujjSyRHeQdXr/4m.E6/yAtjMWGg00vea', '2026-04-25 15:36:11', 4, 'DZW9PAUD3ALCCMR6YZDB1EXZPSIEKTB1V93036WDAG8OBUEL6H', '2026-04-27 10:36:11', 0, NULL, '2026-04-25 15:36:11', '12qwasZX!@#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perkara`
--
ALTER TABLE `perkara`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_perkara` (`no_perkara`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `satker_id` (`satker_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`email`),
  ADD KEY `level_user` (`level_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perkara`
--
ALTER TABLE `perkara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
