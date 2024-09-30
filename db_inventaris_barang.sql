-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2024 at 01:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_departement`
--

CREATE TABLE `m_departement` (
  `id` varchar(60) NOT NULL,
  `departement_name` varchar(126) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_departement`
--

INSERT INTO `m_departement` (`id`, `departement_name`, `created_at`, `updated_at`) VALUES
('22d2f70c-b740-11eb-a91e-0cc47abcfab7', 'Pergudangan', '2024-01-23 17:25:02', '2024-01-29 19:55:36'),
('32d7ea1f-c0a5-11ee-a0d4-04d4c47d1361', 'Pergudangan Edit', '2024-02-01 01:57:05', '2024-02-01 01:57:05'),
('5416ca9a-bec1-11ee-ad60-04d4c47d1361', 'Gudang edyy', '2024-01-29 16:13:24', '2024-02-01 01:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `id` int NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `is_active` enum('1','0') NOT NULL COMMENT '1 = active, 0 = none a\r\nactive ',
  `unit_id` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE `m_unit` (
  `id` varchar(60) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_unit`
--

INSERT INTO `m_unit` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
('abcdefghij', 'Lusin edit', '2024-01-30 15:25:08', '2024-02-01 01:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id` varchar(60) NOT NULL,
  `npp` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `departement_id` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_role_id` varchar(60) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `npp`, `email`, `password`, `name`, `avatar`, `departement_id`, `user_role_id`, `is_active`, `created_at`, `updated_at`) VALUES
('3acc137d-b8bc-11eb-a91e-0cc47abcg5ab', '215372913', 'inventorybeljar@gmail.com', '$2y$10$PfnBydd36TYNRKHftw3RqOI7v.dHNwbQtSpxT1ipnfbB04aWdMTAS', 'satouru', 'photo.png\r\n', '22d2f70c-b740-11eb-a91e-0cc47abcfab7', '22d2f70c-b740-11eb-a91e-0cc47abcfuu8', '1', '2024-01-23 17:32:53', '2024-01-27 15:58:53'),
('3acc137d-b8bc-11eb-a91e-0cc47abcg6dc', '479013902143', 'n.a.a.a.i.djokam@gmail.com', '$2y$10$CfZvpfXCqbrA/uGvDhuxqeXZciUDHQJ3QUDeTDYHl04/3judqsN4S', 'Yuji Itadori', 'photo.png\r\n', '22d2f70c-b740-11eb-a91e-0cc47abcfa9', '22d2f70c-b740-11eb-a91e-0cc47abcfuu0', '1', '2024-01-23 17:32:53', '2024-02-01 01:56:40'),
('3acc137d-b8bc-11eb-a91e-0cc47abcg6hb', '4790139013', 'bsekolah36@gmail.com', '$2y$10$CfZvpfXCqbrA/uGvDhuxqeXZciUDHQJ3QUDeTDYHl04/3judqsN4S', 'Yuji Itadori', 'photo.png\r\n', '22d2f70c-b740-11eb-a91e-0cc47abcfab7', '22d2f70c-b740-11eb-a91e-0cc47abcfuu7', '1', '2024-01-23 17:32:53', '2024-02-01 01:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `m_user_id`
--

CREATE TABLE `m_user_id` (
  `id` int NOT NULL,
  `role_name` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_user_role`
--

CREATE TABLE `m_user_role` (
  `id` varchar(60) NOT NULL,
  `role_name` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_user_role`
--

INSERT INTO `m_user_role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
('471c2db1-c0a5-11ee-a0d4-04d4c47d1361', 'Admin', '2024-02-01 01:57:39', '2024-02-01 01:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `tr_item_in`
--

CREATE TABLE `tr_item_in` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `item_id` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_item_out`
--

CREATE TABLE `tr_item_out` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `item_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `amount_approval` int NOT NULL,
  `approval` enum('pending','accept','reject','expired') NOT NULL,
  `approval_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_user_token`
--

CREATE TABLE `tr_user_token` (
  `id` varchar(60) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tr_user_token`
--

INSERT INTO `tr_user_token` (`id`, `email`, `token`, `created_at`) VALUES
('3d13d67d-bdaf-11ee-a0d0-04d4c47d1361', 'baranginventaris35@gmail.com', 'hQDtswcNCdvSYijmkApQ7n1VUbdkWBEIb5gKXvljGPzgMxN4RfOI3ExUT920D4S39azsuR5qHTyJW86JGaFByCfoL7XVLi0Pm1ut', '2024-01-28 07:31:23'),
('b701ffe8-bdb8-11ee-a0d0-04d4c47d1361', 'baranginventaris179@gmail.com', 'pWvx5ZLRgUIOoPVh6TTSH8wYmOceuMZltY8NdheU7ogB26vGaSLiwk0CFfXCPbj1ryEsp7Q4XzMiaHDR2Ix9FKsAbNdk4Ejm3crJ', '2024-01-28 08:39:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_departement`
--
ALTER TABLE `m_departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_unit`
--
ALTER TABLE `m_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user_id`
--
ALTER TABLE `m_user_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user_role`
--
ALTER TABLE `m_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_item_in`
--
ALTER TABLE `tr_item_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_item_out`
--
ALTER TABLE `tr_item_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_user_token`
--
ALTER TABLE `tr_user_token`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
