-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 08:23 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `rest_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `price` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `user_id` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`user_id`, `pwd`, `fname`, `lname`, `email`, `contact`, `role`) VALUES
('aditya25', 'Aditya25', 'Aditya', 'Pandey', 'adityapandey@gmail.com', 8745632189, 'Customer'),
('ankita03', 'Ankita03', 'Ankita', 'Tiwari', 'ankitatiwari@gmail.com', 7887459632, 'Receptionist'),
('dharmik20', 'Dharmik20', 'Dharmik', 'Joshi', 'dharmikjoshi@gmail.com', 8552631457, 'Customer'),
('harsh07', 'Harsh07', 'Harsh', 'Gandhi', 'harshgandhi@gmail.com', 8745236984, 'Customer'),
('harshpatel23', 'Harsh123', 'Harsh', 'Patel', 'harsh.patel4@somaiya.edu', 4521478569, 'Customer'),
('jash24', 'Jash24', 'Jash', 'Mehta', 'jashmehta@gmail.com', 8569996587, 'Customer'),
('kiran08', 'Kiran08', 'Kiran', 'Kanchan', 'kirankanchan@gmail.com', 7415523654, 'Manager'),
('milan23', 'Milan23', 'Milan', 'Barot', 'milanbarot@gmail.com', 7854412541, 'Receptionist'),
('murtaza20', 'Murtaza123', 'Murtaza', 'Patrawala', 'murtaza.p@somaiya.edu', 9855589642, 'Customer'),
('ojaskapre12', 'Ojas123', 'Ojas', 'Kapre', 'ojas.kapre@somaiya.edu', 7441252365, 'Receptionist'),
('prithvi23', 'Prithvi23', 'Prithvi', 'Kunder', 'prithvikunder@gmail.com', 7741235698, 'Receptionist'),
('priyeshpatel20', 'Priyesh123', 'Priyesh', 'Patel', 'priyesh.patel@somaiya.edu', 8546321478, 'Customer'),
('rishik21', 'Rishik21', 'Rishik', 'Kabra', 'rishikkabra@gmail.com', 9632565255, 'Manager'),
('shakti18', 'Shakti18', 'Shakti', 'Singh', 'shaktisingh@gmail.com', 7856932145, 'Customer'),
('shifa10', 'Shifa10', 'Shifa', 'Khan', 'shifakhan@gmail.com', 5225698745, 'Customer'),
('tanayraul01', 'Tanay123', 'Tanay', 'Raul', 'tanay.raul@somaiya.edu', 1236547896, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `resv_id` int(10) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `date_time` datetime NOT NULL,
  `no_of_ppl` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rest_id` int(11) NOT NULL,
  `rest_name` varchar(20) NOT NULL,
  `mgr_id` varchar(15) NOT NULL,
  `rec_id` varchar(15) DEFAULT NULL,
  `appr_cost` int(11) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rest_id`, `rest_name`, `mgr_id`, `rec_id`, `appr_cost`, `start_time`, `end_time`, `street`, `city`, `state`, `pincode`) VALUES
(1, 'Dominos', 'kiran08', 'milan23', 300, '09:00:00', '10:00:00', 'Achole Road', 'Kurla', 'Maharashtra', 400015);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_contact`
--

CREATE TABLE `restaurant_contact` (
  `rest_id` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `resv_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `rest_id` int(11) NOT NULL,
  `size` smallint(5) UNSIGNED NOT NULL,
  `quantiity` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pwd` (`pwd`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`resv_id`),
  ADD KEY `rest_id` (`rest_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rest_id`),
  ADD KEY `mgr_id` (`mgr_id`),
  ADD KEY `rec_id` (`rec_id`);

--
-- Indexes for table `restaurant_contact`
--
ALTER TABLE `restaurant_contact`
  ADD PRIMARY KEY (`rest_id`,`contact`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`resv_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rest_id` (`rest_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`rest_id`,`size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `resv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`rest_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`rest_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `person` (`user_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`mgr_id`) REFERENCES `person` (`user_id`),
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`rec_id`) REFERENCES `person` (`user_id`);

--
-- Constraints for table `restaurant_contact`
--
ALTER TABLE `restaurant_contact`
  ADD CONSTRAINT `restaurant_contact_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`rest_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `person` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`rest_id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`rest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
