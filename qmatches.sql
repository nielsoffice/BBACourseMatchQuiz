-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 11:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qmatches`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_bba_qm_elist`
--

CREATE TABLE `wp_bba_qm_elist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_session` bigint(20) UNSIGNED NOT NULL,
  `qm_emal` varchar(255) NOT NULL,
  `qm_e_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wp_bba_qm_products`
--

CREATE TABLE `wp_bba_qm_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_session` bigint(20) UNSIGNED NOT NULL,
  `QM_code` varchar(5) NOT NULL,
  `qm_selection_Guide` varchar(255) DEFAULT NULL,
  `qm_classic_kit` int(60) NOT NULL,
  `qm_ultimate_Bundle` int(60) NOT NULL,
  `qm_classic` int(60) NOT NULL,
  `qm_volume` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wp_bba_qm_session`
--

CREATE TABLE `wp_bba_qm_session` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'User session begin',
  `Date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_bba_qm_elist`
--
ALTER TABLE `wp_bba_qm_elist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_bba_qm_products`
--
ALTER TABLE `wp_bba_qm_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_bba_qm_session`
--
ALTER TABLE `wp_bba_qm_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_bba_qm_elist`
--
ALTER TABLE `wp_bba_qm_elist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_bba_qm_products`
--
ALTER TABLE `wp_bba_qm_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_bba_qm_session`
--
ALTER TABLE `wp_bba_qm_session`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User session begin';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
