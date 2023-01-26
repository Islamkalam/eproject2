-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 08:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `vaccine` varchar(255) NOT NULL,
  `bookingkey` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `vaccinated` int(11) NOT NULL,
  `childid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `cnic`, `hospital`, `vaccine`, `bookingkey`, `userid`, `vaccinated`, `childid`) VALUES
(5, 'murtaza', '786745', 'jinnah', 'syno', 1, 9, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `childs`
--

CREATE TABLE `childs` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `age` varchar(11) NOT NULL,
  `pfkid` int(11) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `cnic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childs`
--

INSERT INTO `childs` (`id`, `cname`, `age`, `pfkid`, `contact`, `address`, `gender`, `cnic`) VALUES
(21, 'murtaza', '55', 9, '54234', 'xduiygokrtnj', 'Male', '786745');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hid` int(11) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `hpassword` varchar(255) NOT NULL,
  `haddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hid`, `hname`, `hpassword`, `haddress`) VALUES
(11, 'jinnah', '$2y$10$BKjTZRtyM9L7D77Hhefugu19oGX4LnjepKKGZh71KKqVOpLMRVM4m', '5 star');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `mid`, `message`, `date`) VALUES
(6, 9, 'Your application has been accepted please come tomorrow and get vaccinated.', 2147483647),
(7, 9, ' Yayy! You have been vaccinated.', 2147483647),
(8, 9, ' Yayy! You have been vaccinated.', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`pid`, `pname`, `password`, `email`) VALUES
(9, 'islam', '$2y$10$M3gENhIfIRwzccawk4..mO2vOV4jE5EkXfqLskjJ.HK5Fp1ONBKgS', 'islam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `vaccinestatus` int(11) NOT NULL,
  `stfkid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `vaccinestatus`, `stfkid`) VALUES
(2, 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hfkid` int(11) NOT NULL,
  `available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`id`, `name`, `hfkid`, `available`) VALUES
(8, 'syno', 11, '1');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_status`
--

CREATE TABLE `vaccination_status` (
  `vsid` int(11) NOT NULL,
  `cfkid` int(11) NOT NULL,
  `vfkid` int(11) NOT NULL,
  `chfkid` int(11) NOT NULL,
  `statuskey` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccination_status`
--

INSERT INTO `vaccination_status` (`vsid`, `cfkid`, `vfkid`, `chfkid`, `statuskey`, `userid`) VALUES
(7, 21, 8, 11, 1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childs`
--
ALTER TABLE `childs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`pfkid`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fkho` (`hfkid`);

--
-- Indexes for table `vaccination_status`
--
ALTER TABLE `vaccination_status`
  ADD PRIMARY KEY (`vsid`),
  ADD KEY `cfk` (`cfkid`),
  ADD KEY `vfk` (`vfkid`),
  ADD KEY `chfk` (`chfkid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `childs`
--
ALTER TABLE `childs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vaccination_status`
--
ALTER TABLE `vaccination_status`
  MODIFY `vsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `childs`
--
ALTER TABLE `childs`
  ADD CONSTRAINT `fk` FOREIGN KEY (`pfkid`) REFERENCES `parents` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD CONSTRAINT `fkho` FOREIGN KEY (`hfkid`) REFERENCES `hospital` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccination_status`
--
ALTER TABLE `vaccination_status`
  ADD CONSTRAINT `cfk` FOREIGN KEY (`cfkid`) REFERENCES `childs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chfk` FOREIGN KEY (`chfkid`) REFERENCES `hospital` (`hid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vfk` FOREIGN KEY (`vfkid`) REFERENCES `vaccination` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
