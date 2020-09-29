-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2020 at 09:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14993753_gripspark`
--
CREATE DATABASE IF NOT EXISTS `id14993753_gripspark` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id14993753_gripspark`;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(20) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Receiver` varchar(50) NOT NULL,
  `Transferred_Credits` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`ID`, `Sender`, `Receiver`, `Transferred_Credits`) VALUES
(1, 'Alice', 'Bob', 20),
(2, 'Catherine', 'Nicholas', 50),
(7, 'Zed', 'Alice', 800),
(8, 'Xander', 'Zed', 1000),
(11, 'Ekkire', 'Alice', 10),
(12, 'Alice', 'Ekkire', 94),
(14, 'Catherine', 'Alice', 100),
(15, 'Catherine', 'Xander', 20),
(19, 'Bob', 'Drake', 100),
(18, 'Alice', 'Ganto', 901),
(21, 'Alice', 'Bob', 10),
(25, 'Legend', 'Alice', 76);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Credits` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Email`, `Credits`) VALUES
('Alice', 'alice@gmail.com', 2139),
('Bob', 'bob@sparks.com', 426),
('Catherine', 'catherine@susova.com', 337),
('Drake', 'drake@dracula.com', 574),
('Ekkire', 'ekkire@unknown.com', 834),
('Ganto', 'ganto@santo.com', 1499),
('Zed', 'zed@zegma.qwerty', 1000),
('Xander', 'xander@devil.slayer', 9019),
('Luke', 'luke@skywalker.yo', 880),
('Nicholas', 'nicholas@sing.er', 4561),
('Legend', 'legend@super.ultimate', 9800),
('ajay', 'sdcsd@ggsg.vjn', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
