-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `text`, `category`, `client`, `date`, `image`, `image2`, `image3`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Blog Platform', 'Welcome to the Blog Platform! This project enables users to share their thoughts by creating blog posts and allows viewers to browse these posts on the homepage in reverse chronological order.', 'Web app', 'GO2COD', '2024-11-11', 'uploads/portfolio_67bc1ce0ac9e77.07013562.png', '', '', 'https://www.linkedin.com/posts/noel-bekele-0a0193205_internship-update-im-excited-to-share-activity-7260331722427314178-doU5?utm_source=share&utm_medium=member_desktop&rcm=ACoAADQsibgBcWnjaGp0Hq61MdwqfyVrZT6grXE', '2025-02-24 07:16:48', '2025-02-24 07:44:50'),
(2, 'Online Store Platform', 'Welcome to the Online Store Platform! This project empowers users to explore products and manage a shopping cart, creating a streamlined and interactive e-commerce experience.', 'Web app', 'GO2COD', '2024-11-18', 'uploads/portfolio_67bc25de90bb59.78733466.png', '', '', 'https://www.linkedin.com/posts/noel-bekele-0a0193205_internship-update-im-thrilled-to-share-activity-7262103518256197632-B7OH?utm_source=share&utm_medium=member_desktop&rcm=ACoAADQsibgBcWnjaGp0Hq61MdwqfyVrZT6grXE', '2025-02-24 07:55:10', '2025-02-24 07:55:10'),
(3, 'Real-Time Chat App', ' Real-Time Chat Application designed to enable seamless communication between users. Here\'s what I accomplished:\r\n+User Authentication: Implemented secure account creation and login functionality to ensure user data protection and privacy.\r\n+Real-Time Messaging: Developed a system that allows users to send and receive messages instantly, fostering smooth communication.\r\n+Chat History & Messaging Interface: Designed a clean and user-friendly interface using Tailwind CSS to display chat history and enable easy message sending.\r\n Key Technologies:\r\n+Leveraged Laravel Livewire for reactive components and dynamic updates without page reloads.\r\nThis project highlights practical experience with building a full-stack real-time application, combining frontend design and backend logic to deliver a responsive and interactive user experience.', 'Web app', 'GO2COD', '2024-11-25', 'uploads/portfolio_67bc2ae3b09db5.95421939.png', 'uploads/portfolio_67bc2ae3b0ec42.55274636.png', 'uploads/portfolio_67bc2ae3b13137.58775162.png', 'https://www.linkedin.com/posts/noel-bekele-0a0193205_real-time-chat-app-internship-highlight-activity-7264646406773039106-88BI?utm_source=share&utm_medium=member_desktop&rcm=ACoAADQsibgBcWnjaGp0Hq61MdwqfyVrZT6grXE', '2025-02-24 08:16:35', '2025-02-24 08:16:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
