-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.infinityfree.com
-- Generation Time: Feb 22, 2025 at 11:23 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37790168_port`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'noel bekele', 'noel', 'nbekele8@gmail.com', '$2y$10$R/.hvg60v8F1Nt3CVRHmZuxsKcMe2ShvFXXqqUnoOoLl/LmsMY97.', 'admin', '2024-11-25 23:32:17', '2024-11-25 23:32:17'),
(2, 'Noel Bekele', 'noel@2121', 'nbekele21@gmail.com', '$2y$10$j93OsqyCxsL2DNBMKtxrBuNY92ZYoyYV2Ndjrie8gbovMsoS/kCzS', 'admin', '2025-02-12 13:11:26', '2025-02-12 13:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `title` text NOT NULL,
  `stitle` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title_name` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `s_title` text NOT NULL,
  `l_title` text NOT NULL,
  `b_day` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `freelance` tinyint(1) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `title_name`, `email_verified_at`, `password`, `s_title`, `l_title`, `b_day`, `about`, `website`, `phone`, `city`, `age`, `degree`, `freelance`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Noel Bekele', 'nbekele8@gmail.com', 'Full-stack web developer', NULL, 'lovedada2()', 'Full-stack web developer', 'As a highly skilled and experienced full-stack developer and software programmer with over 5 years of dedicated practice, I possess a diverse skill set that spans multiple technologies and platforms.', '1998-12-01', 'As a highly skilled and experienced full-stack developer and software programmer with over 5 years of dedicated practice, I possess a diverse skill set that spans multiple technologies and platforms. My educational background, which includes a degree from Dire Dawa University, has been further enriched by my commitment to continuous learning through online courses from African Leadership eXchange (ALX) and Udemy. This blend of formal education and practical expertise has honed my abilities and made me an insightful and persistent professional in the world of technology.\r\n\r\nMy proficiency extends across a spectrum of programming languages and systems. I am well-versed in developing software solutions on Linux environments, creating dynamic and functional web applications with Python and PHP, and building robust, scalable applications with Java. My mastery of SQL enables me to design and manage efficient databases, ensuring data integrity and reliability.\r\n\r\nFurthermore, I have a passion for mobile app development, having successfully navigated the Android ecosystem to craft impactful and user-friendly applications. As a Flutter developer, I am well-versed in creating cross-platform mobile and web applications with a focus on intuitive user interfaces and responsive design.\r\n\r\nMy role as a full-stack web developer encompasses both front-end and back-end development, where I seamlessly blend aesthetics with functionality. This includes expertise in HTML, CSS, and JavaScript to create engaging and visually appealing user interfaces, while also working with server-side technologies to deliver efficient, data-driven applications. My proficiency with web frameworks and libraries complements my full-stack capabilities, allowing me to build custom solutions tailored to meet unique project requirements.\r\n\r\nMy commitment to staying up-to-date with the latest industry trends and best practices ensures that I deliver cutting-edge and future-proof solutions for clients and projects. With a track record of successful development endeavors and a dedication to problem-solving, I am ready to take on new challenges and contribute my expertise to create innovative and impactful software solutions.\r\n', 'http://www.noelport.free.nf', '+251 901 336 536', 'Dire Dawa', '24', 'Computer Science (BCS)', 1, NULL, '2024-11-25 14:00:51', '2025-02-12 13:12:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
