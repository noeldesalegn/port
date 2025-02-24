-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 12:23 PM
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
  `sText` varchar(255) NOT NULL,
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

INSERT INTO `portfolios` (`id`, `title`, `sText`, `text`, `category`, `client`, `date`, `image`, `image2`, `image3`, `link`, `created_at`, `updated_at`) VALUES
(3, 'Real-Time Chat App', 'Real-Time Chat Application designed to enable seamless communication between users.', 'Real-Time Chat Application designed to enable seamless communication between users. Here\'s what I accomplished:\n+User Authentication: Implemented secure account creation and login functionality to ensure user data protection and privacy.\n+Real-Time Messaging: Developed a system that allows users to send and receive messages instantly, fostering smooth communication.\n+Chat History & Messaging Interface: Designed a clean and user-friendly interface using Tailwind CSS to display chat history and enable easy message sending.\n Key Technologies:\n+Leveraged Laravel Livewire for reactive components and dynamic updates without page reloads.\nThis project highlights practical experience with building a full-stack real-time application, combining frontend design and backend logic to deliver a responsive and interactive user experience.', 'Web app', 'GO2COD', '2024-11-25', 'uploads/portfolio_67bc2ae3b09db5.95421939.png', 'uploads/portfolio_67bc2ae3b0ec42.55274636.png', 'uploads/portfolio_67bc2ae3b13137.58775162.png', 'https://www.linkedin.com/posts/noel-bekele-0a0193205_real-time-chat-app-internship-highlight-activity-7264646406773039106-88BI?utm_source=share&utm_medium=member_desktop&rcm=ACoAADQsibgBcWnjaGp0Hq61MdwqfyVrZT6grXE', '2025-02-24 08:16:35', '2025-02-24 10:08:56'),
(4, 'A blogging application', 'A simple blogging application.', 'I developed a simple blog application using Laravel for the backend, managing routes, authentication, data storage, and post handling. For the frontend, I used Bootstrap to create a responsive and visually engaging interface.', 'Web app', 'GO2COD', '2024-11-10', 'uploads/portfolio_67bc49be984742.02689976.png', 'uploads/portfolio_67bc49be995328.61976051.png', 'uploads/portfolio_67bc49be9a3c58.31151046.png', 'https://www.linkedin.com/posts/noel-bekele-0a0193205_internship-update-im-excited-to-share-activity-7260331722427314178-doU5?utm_source=share&utm_medium=member_desktop&rcm=ACoAADQsibgBcWnjaGp0Hq61MdwqfyVrZT6grXE', '2025-02-24 10:28:14', '2025-02-24 10:31:46'),
(5, 'E-commerce website', 'An online store that includes core e-commerce functionality', 'I built an online store that includes core e-commerce functionality:\r\nProduct Display: Shows a collection of products with images, descriptions, and prices, creating an inviting browsing experience for users.\r\nShopping Cart: Allows users to easily add, remove, and view items in their cart, with smooth item management for a seamless experience.\r\nTotal Price Calculation: Dynamically updates the total cost of items in the cart, providing users with clear pricing information as they shop.\r\nThis project showcases practical implementation of a full-stack approach for e-commerce, applying both frontend and backend skills.', 'Web app', 'GO2COD', '2024-11-17', 'uploads/portfolio_67bc51b9edba20.22627887.png', 'uploads/portfolio_67bc51b9ee3424.67368333.png', 'uploads/portfolio_67bc51b9eeaa43.70060343.png', 'https://www.linkedin.com/posts/noel-bekele-0a0193205_internship-update-im-thrilled-to-share-activity-7262103518256197632-B7OH?utm_source=share&utm_medium=member_desktop&rcm=ACoAADQsibgBcWnjaGp0Hq61MdwqfyVrZT6grXE', '2025-02-24 11:02:17', '2025-02-24 11:02:17');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
