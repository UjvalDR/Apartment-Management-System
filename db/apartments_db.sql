-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 02:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartments_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `apt_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `apt_type_code` varchar(10) NOT NULL,
  `apt_number` int(11) NOT NULL,
  `bathroom_count` int(11) NOT NULL,
  `bedroom_count` int(11) NOT NULL,
  `room_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`apt_id`, `building_id`, `apt_type_code`, `apt_number`, `bathroom_count`, `bedroom_count`, `room_count`) VALUES
(2, 2, 'complex', 2, 2, 3, 5),
(3, 1, 'simple', 4, 4, 4, 4),
(5, 6, 'Luxury', 5, 2, 3, 5),
(6, 4, 'simple', 11, 4, 3, 6),
(7, 4, 'Luxury', 21, 4, 4, 6),
(8, 5, 'Luxury', 15, 2, 3, 5),
(9, 2, 'complex', 5, 2, 3, 5),
(10, 7, 'complex', 21, 2, 2, 4),
(11, 8, 'simple', 31, 2, 2, 4),
(12, 9, 'simple', 41, 2, 3, 5),
(13, 10, 'complex', 51, 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_bookings`
--

CREATE TABLE `apartment_bookings` (
  `apt_booking_id` int(11) NOT NULL,
  `apt_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `booking_status_code` varchar(10) NOT NULL,
  `booking_start_date` date NOT NULL,
  `booking_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_bookings`
--

INSERT INTO `apartment_bookings` (`apt_booking_id`, `apt_id`, `guest_id`, `booking_status_code`, `booking_start_date`, `booking_end_date`) VALUES
(501, 5, 1, 'BKD', '2019-09-04', '2020-11-04'),
(502, 8, 12, 'PRC', '2020-11-10', '2020-11-25'),
(503, 11, 9, 'BKD', '2020-11-10', '2020-11-22'),
(504, 8, 17, 'BKD', '2020-11-03', '2020-11-04'),
(505, 6, 15, 'CND', '2020-11-03', '2020-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_buildings`
--

CREATE TABLE `apartment_buildings` (
  `building_id` int(10) NOT NULL,
  `building_short_name` varchar(20) NOT NULL,
  `building_full_name` varchar(30) NOT NULL,
  `building_description` varchar(50) NOT NULL,
  `building_address` varchar(100) NOT NULL,
  `building_manager` varchar(15) NOT NULL,
  `building_phone` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_buildings`
--

INSERT INTO `apartment_buildings` (`building_id`, `building_short_name`, `building_full_name`, `building_description`, `building_address`, `building_manager`, `building_phone`) VALUES
(1, 'paramount', 'paramount pilatus', 'A very good apartment', 'Arakere', 'Ujval', 9453227721),
(2, 'square', 'mantri square', 'a very luxurious apartments', 'malleshwaram', 'pavan', 9954652132),
(3, 'Pimento', 'Maratt Pimetto', 'A lakeview apartment', 'JP Nagar', 'Kiran', 9865654512),
(4, 'Richmond', 'Prestige Richmond', 'An apartment in the heart of the city', 'Shanthinagar', 'Abdul', 9564232345),
(5, 'Magnolia', 'Shobha Magnolia', 'A Shobha\'s finest', 'Tilaknagar', 'Vaishnavi', 9563234345),
(6, 'Millenium', 'Brigade Millenium', 'A lakeview apartment', 'Halasuru', 'Sumanth', 7864232323),
(7, 'Woodlands', 'Mantri Woodlands', 'A Green and Clean apartment', 'Arakere', 'Jaswanth', 9108407624),
(8, 'Pratheek', 'Maruthi Pratheek', 'A spacious and peaceful apartments', 'Tin Factory', 'Shankar', 7676888123),
(9, 'Sapthagiri', 'Sapthagiri Springs', 'A colourful and joyful apartments', 'Begur', 'Arjun Reddy', 9876452311),
(10, 'Roshan', 'Roshan Platinum', 'A friendly neighborhood apartments', 'Bommanahalli', 'Varun Gowda', 8891235422);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_facilities`
--

CREATE TABLE `apartment_facilities` (
  `apt_id` int(11) NOT NULL,
  `facility_description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_facilities`
--

INSERT INTO `apartment_facilities` (`apt_id`, `facility_description`) VALUES
(2, 'Swimming pool,24*7 electricity-water,near to metro');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_type`
--

CREATE TABLE `apartment_type` (
  `apt_type_code` varchar(15) NOT NULL,
  `apt_type_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment_type`
--

INSERT INTO `apartment_type` (`apt_type_code`, `apt_type_description`) VALUES
('complex', 'This apartment is complex and has 4 blocks'),
('Luxury', 'A very spacious apartment'),
('simple', 'this is a one block building with 10 flats');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `booking_status_code` varchar(10) NOT NULL,
  `booking_status_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`booking_status_code`, `booking_status_description`) VALUES
('BKD', 'BOOKED'),
('CND', 'CANCELLED'),
('PRC', 'PROCESSING');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(10) NOT NULL,
  `guest_first_name` varchar(10) NOT NULL,
  `guest_last_name` varchar(15) NOT NULL,
  `guest_date_of_birth` date NOT NULL,
  `guest_gender` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `guest_first_name`, `guest_last_name`, `guest_date_of_birth`, `guest_gender`) VALUES
(1, 'pavan', 'kumar', '1999-09-09', 'M'),
(2, 'Prajwal', 'Kumar', '2000-10-17', 'M'),
(7, 'kamal', 'hasan', '1998-09-09', 'M'),
(8, 'Sumanth', 'Acharya', '1997-08-09', 'M'),
(9, 'Vaishnavi', 'Chaithanya', '1996-08-07', 'F'),
(10, 'VEENA ', 'PODTAR', '1995-06-19', 'F'),
(12, 'Rashi', 'Khanna', '2004-06-08', 'F'),
(15, 'Raja', 'Shekar', '2018-10-25', 'F'),
(16, 'Priyanka', 'DR', '2000-12-18', 'F'),
(17, 'Abhimanyu', 'sarkar', '2008-07-25', 'M'),
(18, 'Rama', 'Krishna', '1998-11-11', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`) VALUES
(1, 'ujval', 'ujval', 'ujvaldr@gmail.com'),
(2, 'pavan', 'pavan', 'pavan@123'),
(3, 'kiran', 'kiran', 'kiran@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`apt_id`);

--
-- Indexes for table `apartment_bookings`
--
ALTER TABLE `apartment_bookings`
  ADD PRIMARY KEY (`apt_booking_id`);

--
-- Indexes for table `apartment_buildings`
--
ALTER TABLE `apartment_buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `apartment_facilities`
--
ALTER TABLE `apartment_facilities`
  ADD PRIMARY KEY (`apt_id`);

--
-- Indexes for table `apartment_type`
--
ALTER TABLE `apartment_type`
  ADD PRIMARY KEY (`apt_type_code`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`booking_status_code`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD UNIQUE KEY `guest_id` (`guest_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment_bookings`
--
ALTER TABLE `apartment_bookings`
  MODIFY `apt_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
