-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 12:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `action` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  `done_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `action`, `created_at`, `update_at`, `done_at`) VALUES
(45, 40, 'shopping1', 1, '2021-05-12 05:51:36', '2021-05-12 07:27:49', '2021-05-12 06:00:02'),
(48, 40, 'test', 0, '2021-05-12 07:28:36', NULL, NULL),
(49, 41, 'test1', 1, '2021-05-12 07:47:36', '2021-05-12 07:59:35', '2021-05-12 07:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'user',
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remember_token` varchar(225) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `remember_token`, `password`, `created_at`) VALUES
(40, 'admin', 'test', 'test@gmail.com', 'w9Z88r4pg2aK4yUSlnAEzW0amcrwKfqNCFlviIbHkgLwMVpXoYi4ieK4vbOzVJSjGjf4KVtrY3MqEeiNjGhaV9z43lZRdexaA4LtyJxSPmhK72QNwexnBEgumzSWNo9KoFvASrnmTaYl7VTSeEiiLsQV74BiouYbZ9tXgysk2V7z6EFaXRoyTiaDVUJfsuPUS2kWSSKJkS3bXImvjEDBrmkNA57M9XdmA', '$2y$12$fwytfZ78RSPVTN8UAq6LuuMZAfk3Rdh3AZbIroqzNfp3RfB7hJ3WG', '2021-05-11 07:19:15'),
(41, 'user', 'tavassoli', 'tavassoli@gmail.com', NULL, '$2y$12$taUxwbm4oMrtiKD7SOYXru0I86pIQuwEs6S6VGwRYsSxs0x6zQZ7S', '2021-05-12 07:44:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
