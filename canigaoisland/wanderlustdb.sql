-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 03:57 AM
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
-- Database: `wanderlustdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `Birthdate`, `Email`, `Username`, `Password`) VALUES
(1, 'Admin', 'Admin', '2023-10-04', 'Admin@admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `boat`
--

CREATE TABLE `boat` (
  `BoatID` int(11) NOT NULL,
  `BoatName` varchar(255) NOT NULL,
  `BoatType` varchar(255) NOT NULL,
  `BoatCapacity` int(11) NOT NULL,
  `BoatStatus` enum('Active','Inactive') NOT NULL,
  `CaptainName` varchar(255) NOT NULL,
  `agentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE `boats` (
  `id` int(11) NOT NULL,
  `boatName` enum('Duran-Duran','Franklyn','Island  Rose','San Pedro de Nonok','Lorwinds') DEFAULT NULL,
  `boat_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`id`, `boatName`, `boat_status`) VALUES
(1, 'Duran-Duran', 'Active'),
(2, 'Franklyn', 'Active'),
(3, 'Island  Rose', 'Active'),
(4, 'San Pedro de Nonok', 'Active'),
(5, 'Lorwinds', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cottage_type` varchar(255) NOT NULL,
  `stayType` varchar(255) NOT NULL,
  `time_schedule` varchar(255) NOT NULL,
  `status` enum('IN','OUT') NOT NULL,
  `boat` enum('San Pedro de Nonok','Lorwinds','Island Rose','Franklyn','Duran Duran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `ticket_type`, `group_name`, `contact_number`, `address`, `cottage_type`, `stayType`, `time_schedule`, `status`, `boat`) VALUES
(440, 'standard', 'Caridad Sons', '00987654321', 'Matalom, Leyte', 'Two-Story w/ Attic', 'Daytour', '2:00 PM', 'IN', 'Duran Duran'),
(441, 'vip', 'Caridad Norte', '1234567890', 'Matalom, Leyte', 'Duplex Cottage(Right Side of the Island)', 'Daytour', '5:30 PM', 'IN', 'Franklyn'),
(442, 'family', 'Sto. Nino', '098765434567', 'Matalom, oky', 'Duplex Cottage(Right Side of the Island)', 'Daytour', '5:00 PM', 'IN', 'Lorwinds'),
(443, 'standard', 'Jonathan', '77788', '098798', 'Duplex Cottage(Right Side of the Island)', 'Daytour', '5:00 PM', 'IN', 'Duran Duran'),
(444, 'vip', 'tabern', '123', 'ee', 'Two-Story w/ Attic', 'Overnight', '5:00 PM', 'IN', 'Franklyn'),
(445, 'family', 'refref', 'sdfds', 'dfedf', 'Duplex Cottage(Right Side of the Island)', 'Daytour', '5:00 PM', 'IN', 'Duran Duran'),
(446, 'family', 'dsv', '77788', 'dsvds', 'Duplex Cottage(Right Side of the Island)', 'Daytour', '5:00 PM', 'IN', 'Duran Duran'),
(447, 'vip', 'weewewd', 'cew', 'ewc', 'Two-Story w/ Attic', 'Daytour', '5:00 PM', 'IN', 'Duran Duran'),
(448, 'vip', 'kasdasd', '1213123', 'asdasdsad', 'Duplex Cottage(Right Side of the Island)', 'Overnight', '10:00 AM', 'IN', 'Island Rose'),
(449, 'family', 'tabern', '77788', 'none', 'Duplex Cottage(Right Side of the Island)', 'Overnight', '8:30 AM', 'IN', 'Franklyn');

-- --------------------------------------------------------

--
-- Table structure for table `cottageavail`
--

CREATE TABLE `cottageavail` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `cottage_type` varchar(255) NOT NULL,
  `stay_type` varchar(255) NOT NULL,
  `status` enum('IN','OUT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cottageavail`
--

INSERT INTO `cottageavail` (`id`, `group_name`, `cottage_type`, `stay_type`, `status`) VALUES
(1, 'OK', 'attik', 'obernayt', 'OUT'),
(2, 'wdwd', 'awdawd', 'wdqw', 'OUT'),
(3, 'dqwd', 'qwdq', 'wqdwq', 'OUT');

-- --------------------------------------------------------

--
-- Table structure for table `cottages`
--

CREATE TABLE `cottages` (
  `id` int(11) NOT NULL,
  `price_overnight` decimal(10,2) NOT NULL,
  `price_day_tour` decimal(10,2) NOT NULL,
  `cottage_type` enum('Two-Story w/ Attic','Duplex Cottage(Right Side of  the Island)','Duplex Cottage(Left Side of  the Island)','Tourism Building Room') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cottages`
--

INSERT INTO `cottages` (`id`, `price_overnight`, `price_day_tour`, `cottage_type`) VALUES
(12, '15.00', '10.00', 'Two-Story w/ Attic'),
(13, '800.00', '1200.00', 'Duplex Cottage(Right Side of  the Island)'),
(14, '700.00', '1100.00', 'Duplex Cottage(Left Side of  the Island)'),
(15, '1500.00', '2500.00', 'Tourism Building Room');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `fee_type` enum('Entrance Fee','Environmental Fee','Boat Fee') DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `fee_type`, `amount`) VALUES
(1, 'Entrance Fee', '20.00'),
(2, 'Environmental Fee', '20.00'),
(3, 'Boat Fee', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `groupName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `groupName`) VALUES
(1, 'khael', ''),
(2, 'khael', ''),
(3, 'khael', ''),
(4, 'meow', 'group 1'),
(5, 'meow', 'group 13'),
(6, 'khael', 'group 13'),
(7, 'esss', 'group 13'),
(8, 'khael', 'unique'),
(9, 'khael', 'unique'),
(10, 'khael', 'unique'),
(11, 'khael', 'unique'),
(12, 'khael', 'unique'),
(13, 'khael', 'unique'),
(14, 'khael', 'unique'),
(15, 'khael', 'unique'),
(16, 'DWD', 'PADDING'),
(17, 'QWD', 'PADDING'),
(18, 'QWD', 'PADDING'),
(19, 'dscdsc', 'sdcds'),
(20, 'dscdscds', 'sdcds'),
(21, 'cdscsdc', 'sdcds'),
(22, 'sdcsdc', 'sdcds'),
(23, 'kklm', ''),
(24, 'lkmlk;m', ''),
(25, 'lkmklmkl', ''),
(26, 'lmk', ''),
(27, 'lm;lkm', ''),
(28, 'lkm;kl', ''),
(29, 'l;kmkl;', ''),
(30, 'lkmlk;', ''),
(31, 'lkm', ''),
(32, ';lkmkl;', '');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `agentID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `BoatID` int(11) DEFAULT NULL,
  `Role` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`agentID`, `FirstName`, `LastName`, `Birthdate`, `Email`, `Username`, `Password`, `BoatID`, `Role`, `PhoneNumber`) VALUES
(66, 'ada', 'dad', '2023-11-08', 'aqw@few', 'qa', 'qa', 2, 'Ticketing Agent', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `boat`
--
ALTER TABLE `boat`
  ADD PRIMARY KEY (`BoatID`),
  ADD KEY `agentID` (`agentID`);

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cottageavail`
--
ALTER TABLE `cottageavail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cottages`
--
ALTER TABLE `cottages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`agentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boat`
--
ALTER TABLE `boat`
  MODIFY `BoatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boats`
--
ALTER TABLE `boats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `cottageavail`
--
ALTER TABLE `cottageavail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cottages`
--
ALTER TABLE `cottages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `agentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boat`
--
ALTER TABLE `boat`
  ADD CONSTRAINT `boat_ibfk_1` FOREIGN KEY (`agentID`) REFERENCES `useraccounts` (`agentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
