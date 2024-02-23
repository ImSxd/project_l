-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 01:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_l`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_com` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comment` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_com`, `id_post`, `comment`, `id_user`) VALUES
(2, 2, 'หล่อจัง', 2),
(3, 2, 'หล่อจังx2', 2),
(4, 2, 'หล่อจังx2', 2),
(5, 2, 'แย่มาก', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_p` int(11) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `post` varchar(25) NOT NULL,
  `img_p` varchar(50) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_p`, `time`, `post`, `img_p`, `id_user`) VALUES
(2, '22:53:16', 'dsaddsa', '624527192.png', 2),
(3, '02:33:31', 'Congast', NULL, 2),
(5, '02:45:41', 'dsadsa', '1425342678.jpg', 2),
(7, '03:06:13', 'งานเยอะจัง', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type_user`
--

CREATE TABLE `type_user` (
  `id_typeuser` int(11) NOT NULL,
  `name_typeuser` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_user`
--

INSERT INTO `type_user` (`id_typeuser`, `name_typeuser`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(25) NOT NULL,
  `password_user` varchar(25) NOT NULL,
  `fname_user` varchar(25) NOT NULL,
  `lname_user` varchar(25) NOT NULL,
  `email_user` varchar(25) DEFAULT NULL,
  `img_user` varchar(50) NOT NULL,
  `type_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `password_user`, `fname_user`, `lname_user`, `email_user`, `img_user`, `type_user`) VALUES
(1, 'admin', '123', '', '', NULL, 'default.png', 1),
(2, 'customer', '123', 'วีรชิต', 'แต่งแก้ว', 'weerachit@gmail.com', '624527192.png', 2),
(3, 'customer1', '123', 'ร้านลุงไก่', 'แต่งแก้ว', 'weerachit@gmail.com', '1697124946.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id_typeuser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `type_user` (`type_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type_user`) REFERENCES `type_user` (`id_typeuser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
