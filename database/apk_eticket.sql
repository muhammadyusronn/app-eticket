-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2026 at 05:56 PM
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
-- Table structure for table `comment_attachments`
--

CREATE TABLE `comment_attachments` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `attachment` varchar(256) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Solved', 1);

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
(23, 'Software', 1, 'TID-1-0011', 'User tidak dapat login ke aplikasi Kinstaker menggunakan akun aktif. Muncul pesan \"Invalid Credentials\" meskipun username dan password sudah benar.', 'User melaporkan gagal login sejak pagi hari setelah reset password.\nSudah mencoba:\n- Clear cache browser\n- Ganti browser\n- Reset password ulang\n\nNamun login tetap gagal.', 4, 1, '2026-05-23 15:32:42', 1),
(24, 'Software', 1, 'TID-1-0012', 'Gagal Validasi Laporan Keuangan Satker', 'Tidak dapat melakukan validasi laporan keuangan hanya loading saja tidak ada pesan error. Ketika di refresh statusnya masih belum di validasi.', 1, 2, '2026-05-23 15:50:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_assignees`
--

CREATE TABLE `ticket_assignees` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `assignment_method` enum('Regular','Token') NOT NULL DEFAULT 'Regular',
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_assignees`
--

INSERT INTO `ticket_assignees` (`id`, `ticket_id`, `petugas_id`, `assignment_method`, `assigned_at`) VALUES
(10, 23, 1, 'Regular', '2026-05-23 15:32:42'),
(11, 24, 2, 'Regular', '2026-05-23 15:50:54');

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
(17, 23, 'PAQUCDKFKZB0HOMCEPC3.png', '2026-05-23 15:32:42', 0, NULL),
(18, 24, 'FNEEJ6GJS5XIJ448PLW5.png', '2026-05-23 15:50:54', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(256) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_comments`
--

INSERT INTO `ticket_comments` (`id`, `ticket_id`, `name`, `photo`, `comment`, `created_at`, `is_deleted`, `deleted_at`) VALUES
(8, 23, 'Muhammad Yusron Hartoyo', NULL, 'Pending karena tidak menginformasikan informasi username akun. Mohon berikan username dari user untuk kita cek di database', '2026-05-23 15:38:27', 0, NULL),
(9, 23, 'Cean Feby Validia, S.H', 'upload/reporter/cean.jpg', 'Usernamenya : ceanfeby', '2026-05-23 15:38:54', 0, NULL),
(10, 23, 'Muhammad Yusron Hartoyo', NULL, 'Root Cause: Data password hash pada database tidak sinkron setelah proses reset password.<br>Solution: Melakukan regenerate password hash dan clear session cache user.\r\nUser berhasil login kembali setelah reset ulang.<br>Preventive Action: Menambahkan validasi password hash consistency setelah proses reset password pada sistem.', '2026-05-23 15:47:10', 0, NULL);

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
(12, 12);

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
  `pending_reason` text DEFAULT NULL,
  `root_cause` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `preventive_action` text DEFAULT NULL,
  `changed_by` int(11) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_status_histories`
--

INSERT INTO `ticket_status_histories` (`id`, `ticket_id`, `old_status`, `new_status`, `pending_reason`, `root_cause`, `solution`, `preventive_action`, `changed_by`, `changed_at`) VALUES
(19, 23, '0', '1', NULL, NULL, NULL, NULL, 1, '2026-05-23 15:32:42'),
(20, 23, '1', '2', '', '', '', '', 1, '2026-05-23 15:35:13'),
(21, 23, '2', '3', 'Pending karena tidak menginformasikan informasi username akun. Mohon berikan username dari user untuk kita cek di database', '', '', '', 1, '2026-05-23 15:38:27'),
(22, 23, '3', '4', 'Pending karena tidak menginformasikan informasi username akun. Mohon berikan username dari user untuk kita cek di database', 'Data password hash pada database tidak sinkron setelah proses reset password.', 'Melakukan regenerate password hash dan clear session cache user.\r\nUser berhasil login kembali setelah reset ulang.', 'Menambahkan validasi password hash consistency setelah proses reset password pada sistem.', 1, '2026-05-23 15:47:10'),
(23, 24, '0', '1', NULL, NULL, NULL, NULL, 1, '2026-05-23 15:50:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_attachments`
--
ALTER TABLE `comment_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_attachments_ibfk_1` (`comment_id`);

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
-- AUTO_INCREMENT for table `comment_attachments`
--
ALTER TABLE `comment_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ticket_assignees`
--
ALTER TABLE `ticket_assignees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ticket_attachment`
--
ALTER TABLE `ticket_attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_attachments`
--
ALTER TABLE `comment_attachments`
  ADD CONSTRAINT `comment_attachments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `ticket_comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ticket_status_histories_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
