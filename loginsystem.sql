-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2018 at 09:54 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(100) NOT NULL,
  `SHOPNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CONTACT` varchar(100) NOT NULL,
  `CONTACTNUM` varchar(100) NOT NULL,
  `AREA` varchar(100) NOT NULL,
  `COORDINATES` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `SHOPNAME`, `ADDRESS`, `CONTACT`, `CONTACTNUM`, `AREA`, `COORDINATES`) VALUES
('1', 'ABC', 'aaa', 'ME', '03342597845', 'aaa', '123,123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `shade` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `salesprice` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand`, `type`, `shade`, `size`, `salesprice`) VALUES
('111', 'berger ', 'matte', 'orange ', '200', '1001'),
('112', 'nelson', 'matte', 'pink', '50', '1500'),
('113 ', 'behn ', 'abx', 'blue   ', '50', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ContactNum` varchar(100) NOT NULL,
  `CustList` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`id`, `username`, `ContactNum`, `CustList`) VALUES
('001', 'Hussein', '03332541639', '2'),
('002', 'Sami', '03152345678', '1'),
('003', 'Mehdi', '03462525252', '1'),
('004', 'Abbas', '03331245789', '1'),
('', '', '', ''),
('', '', '', ''),
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` varchar(100) NOT NULL,
  `salesperson` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `active`, `salesperson`) VALUES
('001', 'abc001', 'yes', 'Hussein'),
('002', 'abc002', 'yes', 'Sami'),
('003', 'abc003', 'yes', 'Mehdi'),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('005', 'abc005', 'yes', 'narjis');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
