-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 06:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `useraccounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `matricule` varchar(150) NOT NULL,
  `Email` tinytext NOT NULL,
  `pwd` longtext NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `cycle` varchar(150) NOT NULL,
  `filiere` varchar(150) NOT NULL,
  `niveau` varchar(150) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `img` varchar(100) NOT NULL,
  `cin` varchar(100) NOT NULL,
  `bac` varchar(100) NOT NULL,
  `reussite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`matricule`, `Email`, `pwd`, `firstname`, `lastname`, `cycle`, `filiere`, `niveau`, `date1`, `date2`, `img`, `cin`, `bac`, `reussite`) VALUES
('0000', 'soummermehdi16@gmail.com', '$2y$10$k/KMaZRFSTsFyZ8QnaGFZ.EcVk4BW6uCTv27GjagPVO6Kro1/y6hK', 'mehdi', 'SOUMMER', 'ingenieur', 'DSE', '1ere', '1999-11-11', '2020-02-02', 'changbok-ko-F8t2VGnI47I-unsplash (1).jpg', 'guillaume-bleyer-372uM1cIQqE-unsplash.jpg', 'patrick-tomasso-Oaqk7qqNh_c-unsplash.jpg', 'ross-sneddon-d-66ejdDbPk-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
