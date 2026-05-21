-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2026 at 04:00 PM
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
-- Database: `apk_eticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`, `is_active`) VALUES
(1, 'KINSATKER - eKeuangan', 1),
(2, 'KINSATKER - eRegister', 1),
(3, 'KINSATKER - eValidasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `satker_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `name`, `phone_number`, `satker_id`, `is_active`) VALUES
(1, 'Muhammad Yusron Hartoyo, A.Md.Kom', '082186427595', 2, 1),
(2, 'Reyhan Fuadhi, A.Md.Kom', '082228299992', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reporter`
--

CREATE TABLE `reporter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `satker_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reporter`
--

INSERT INTO `reporter` (`id`, `name`, `phone_number`, `satker_id`, `image`) VALUES
(1, 'Cean Feby Validia, S.H', '082188299922', 2, 'upload/reporter/cean.jpg'),
(2, 'Suci Lestari, S.H', '08192999222', 2, 'upload/reporter/suci.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `satker`
--

CREATE TABLE `satker` (
  `id` int(11) NOT NULL,
  `kode_satker` varchar(10) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `nomor_hp_satker` varchar(15) NOT NULL,
  `email_satker` varchar(50) NOT NULL,
  `jenis_satker` enum('PTA','BADILAG','') NOT NULL DEFAULT 'PTA',
  `alamat` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `satker`
--

INSERT INTO `satker` (`id`, `kode_satker`, `nama_satker`, `nomor_hp_satker`, `email_satker`, `jenis_satker`, `alamat`, `is_active`) VALUES
(1, 'STKR001', 'Direktorat Jenderal Badan Peradilan Agama', '081282922938', 'cs@badilag.go.id', 'BADILAG', 'Jakarta Pusat', 1),
(2, 'STKR002', 'Pengadilan Tinggi Agama Palembang', '081282922938', 'cs@pta-palembang.go.id', 'PTA', 'Palembang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`, `is_active`) VALUES
(1, 'Menunggu Support', 1),
(2, 'Dalam Proses', 1),
(3, 'Pending', 1),
(4, 'Solved', 1),
(5, 'Closed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `category` enum('Software','Hardware') NOT NULL,
  `module_id` int(11) NOT NULL,
  `ticket_number` varchar(20) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `reported_by` int(11) NOT NULL,
  `reported_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `category`, `module_id`, `ticket_number`, `title`, `description`, `status_id`, `reported_by`, `reported_at`, `is_active`) VALUES
(13, 'Software', 1, 'TID-2-0001', 'Error nominal tidak sesuai', 'Sistem gagal menyimpan data transaksi karena koneksi database timeout.\nError terjadi saat proses insert ke tabel transaksi.', 1, 1, '2026-05-21 07:59:24', 1),
(15, 'Software', 2, 'TID-2-0003', 'Error tidak bisa login', 'TES', 2, 2, '2026-05-21 08:47:54', 1),
(16, 'Software', 3, 'TID-2-0004', 'Error perkara lama muncul lagi', 'TES', 1, 1, '2026-05-21 08:49:40', 0),
(19, 'Software', 1, 'TID-1-0007', 'Tidak generate report', 'Tidak dapat melakukan generate report kauangan bulanan priode april 2026', 1, 1, '2026-05-21 13:50:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_assignees`
--

CREATE TABLE `ticket_assignees` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `assignment_method` enum('Auto','Manual') NOT NULL DEFAULT 'Auto',
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_assignees`
--

INSERT INTO `ticket_assignees` (`id`, `ticket_id`, `petugas_id`, `assignment_method`, `assigned_at`) VALUES
(1, 13, 1, 'Auto', '2026-05-21 07:59:44'),
(2, 15, 2, 'Auto', '2026-05-21 08:47:54'),
(3, 16, 1, 'Auto', '2026-05-21 08:49:40'),
(6, 19, 2, 'Auto', '2026-05-21 13:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachment`
--

CREATE TABLE `ticket_attachment` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `attachment` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_attachment`
--

INSERT INTO `ticket_attachment` (`id`, `ticket_id`, `attachment`, `created_at`, `is_deleted`, `deleted_at`) VALUES
(1, 13, 'upload/attachment/13/image1.png', '2026-05-21 13:00:13', 0, NULL),
(2, 13, 'upload/attachment/13/image1.png', '2026-05-21 13:00:13', 0, NULL),
(3, 13, 'upload/attachment/13/image1.png', '2026-05-21 13:00:13', 0, NULL),
(11, 19, 'M5IUX2J5JA12JSY12W5R.pdf', '2026-05-21 13:50:41', 0, NULL),
(12, 19, 'C3XOIMPFQKVGDAM5HHD9.png', '2026-05-21 13:50:41', 0, NULL),
(13, 19, 'X7TRTZGOSI148TW3XYTC.pdf', '2026-05-21 13:50:41', 0, NULL),
(14, 19, 'OJIVI8VDDN9VESWY7S6P.png', '2026-05-21 13:50:41', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `is_internal` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_counter`
--

CREATE TABLE `ticket_counter` (
  `id` int(11) NOT NULL,
  `last_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_counter`
--

INSERT INTO `ticket_counter` (`id`, `last_number`) VALUES
(12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_ratings`
--

CREATE TABLE `ticket_ratings` (
  `id` int(11) NOT NULL,
  `ticket_assignee_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `rated_by` int(11) DEFAULT NULL,
  `rated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status_histories`
--

CREATE TABLE `ticket_status_histories` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `old_status` varchar(20) DEFAULT NULL,
  `new_status` varchar(20) NOT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_status_histories`
--

INSERT INTO `ticket_status_histories` (`id`, `ticket_id`, `old_status`, `new_status`, `changed_by`, `changed_at`) VALUES
(1, 10, '0', '1', 1, '2026-05-21 02:36:52'),
(2, 11, '0', '1', 1, '2026-05-21 06:38:01'),
(3, 12, '0', '1', 1, '2026-05-21 07:40:02'),
(4, 13, '0', '1', 1, '2026-05-21 07:59:24'),
(5, 15, '0', '1', 1, '2026-05-21 08:47:54'),
(6, 16, '0', '1', 1, '2026-05-21 08:49:40'),
(9, 19, '0', '1', 1, '2026-05-21 13:50:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satker_id` (`satker_id`);

--
-- Indexes for table `reporter`
--
ALTER TABLE `reporter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satker_id` (`satker_id`);

--
-- Indexes for table `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_satker` (`kode_satker`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_number` (`ticket_number`),
  ADD KEY `reported_by` (`reported_by`),
  ADD KEY `modul_id` (`module_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `ticket_assignees`
--
ALTER TABLE `ticket_assignees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indexes for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `ticket_counter`
--
ALTER TABLE `ticket_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_ratings`
--
ALTER TABLE `ticket_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rated_by` (`rated_by`),
  ADD KEY `ticket_assignee_id` (`ticket_assignee_id`);

--
-- Indexes for table `ticket_status_histories`
--
ALTER TABLE `ticket_status_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reporter`
--
ALTER TABLE `reporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `satker`
--
ALTER TABLE `satker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ticket_assignees`
--
ALTER TABLE `ticket_assignees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_counter`
--
ALTER TABLE `ticket_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticket_ratings`
--
ALTER TABLE `ticket_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_status_histories`
--
ALTER TABLE `ticket_status_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`satker_id`) REFERENCES `satker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reporter`
--
ALTER TABLE `reporter`
  ADD CONSTRAINT `reporter_ibfk_1` FOREIGN KEY (`satker_id`) REFERENCES `satker` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`reported_by`) REFERENCES `reporter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_assignees`
--
ALTER TABLE `ticket_assignees`
  ADD CONSTRAINT `ticket_assignees_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_assignees_ibfk_2` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  ADD CONSTRAINT `ticket_attachment_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD CONSTRAINT `ticket_comments_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_ratings`
--
ALTER TABLE `ticket_ratings`
  ADD CONSTRAINT `ticket_ratings_ibfk_1` FOREIGN KEY (`rated_by`) REFERENCES `reporter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ratings_ibfk_2` FOREIGN KEY (`ticket_assignee_id`) REFERENCES `ticket_assignees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_status_histories`
--
ALTER TABLE `ticket_status_histories`
  ADD CONSTRAINT `ticket_status_histories_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
