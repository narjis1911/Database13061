-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 03:49 PM
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
  `id` varchar(5) NOT NULL,
  `SHOPNAME` varchar(20) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `CONTACT` varchar(20) NOT NULL,
  `CONTACTNUM` varchar(10) NOT NULL,
  `AREA` varchar(50) NOT NULL,
  `COORDINATES` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `SHOPNAME`, `ADDRESS`, `CONTACT`, `CONTACTNUM`, `AREA`, `COORDINATES`) VALUES
('011', 'AAA', 'cy, khi', 'Zainab', '0334259784', 'gulshan', '12121,1232'),
('012', 'mashallah', 'si, khi', 'Sila', '0334259755', 'gulshan', '2552,2555');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` varchar(50) NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `productID` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ContactNum` varchar(20) NOT NULL,
  `CustList` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`id`, `username`, `ContactNum`, `CustList`) VALUES
('001', 'HUssein', '033333333', '2'),
('002', 'Sami', '02232626565', '1'),
('003', 'Mehdi', '022565626', '5'),
('004', 'Abbas', '0334545454', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `salesperson` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `active`, `salesperson`) VALUES
('001', 'abc001', 0, 'Mehdi'),
('002', 'abc002', 2, 'narjis');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
