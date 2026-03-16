-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2026 at 04:52 AM
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
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `heading` varchar(100) NOT NULL,
  `profile_title` varchar(100) NOT NULL,
  `profile_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `heading`, `profile_title`, `profile_text`) VALUES
(1, 'Tentang Saya', 'Profil', 'Saya adalah Mahasiswa aktif Semester 4 Sistem Informasi di Universitas Mulawarman Samarinda. Saya memiliki minat dalam bidang website, desain poster, dan database MySQL. Saya juga memiliki pengalaman dalam mengembangkan website sederhana menggunakan HTML dan CSS, serta memiliki kemampuan dalam pembuatan database MySQL.');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `description`, `year`, `image`, `sort_order`) VALUES
(1, 'Kepengurusan INFORSA', 'Anggota INFORSA Departemen Cominfo', '2025', 'Sertifikat Kepengurusan INFORSA 2025.jpeg', 1),
(2, 'Cyber Security', 'Peserta Study Club Sistem Informasi', '2025', 'Sertifikat Cyber Security SC.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `description`, `sort_order`) VALUES
(1, 'Anggota INFORSA Departemen Cominfo (2025)', 1),
(2, 'Anggota Study Club Cyber Security Sistem Informasi (2025)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `greeting` varchar(150) NOT NULL,
  `tagline` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `cta_text` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `footer_name` varchar(100) NOT NULL,
  `footer_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `greeting`, `tagline`, `description`, `cta_text`, `profile_image`, `footer_name`, `footer_year`) VALUES
(1, 'Muhammad Ilyasa\' \'Izzuddin', 'Assalamu\'alaikum, saya', 'Mahasiswa Sistem Informasi di Universitas Mulawarman Samarinda Kalimantan Timur', 'Mahasiswa Sistem Informasi di Universitas Mulawarman Samarinda Kalimantan Timur', 'Tentang Saya', 'Foto Ilyasa.png', 'Muhammad Ilyasa\' \'Izzuddin', '2026');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` decimal(5,2) NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `level`, `sort_order`) VALUES
(1, 'HTML', '22.00', 1),
(2, 'CSS', '20.00', 2),
(3, 'JavaScript', '1.90', 3),
(4, 'Desain Poster', '22.50', 4),
(5, 'Database MySQL', '24.50', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
