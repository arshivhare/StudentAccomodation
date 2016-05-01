-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 04:53 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accommodation`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` bigint(9) NOT NULL,
  `id` int(9) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `booking_flag` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `id`, `house_no`, `booking_flag`) VALUES
(4, 800147896, '1978A', 0),
(5, 800147896, '1978C', 0),
(6, 800458889, '1978C', 0),
(7, 800458889, '135 A', 0),
(8, 800458889, '190 D', 0),
(9, 800458889, '190 D', 0),
(10, 800123259, '220D', 0),
(11, 800147896, '1978A', 0),
(12, 800134689, '135 A', 0),
(13, 800134689, '135 A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `current_student`
--

CREATE TABLE IF NOT EXISTS `current_student` (
  `username` varchar(30) NOT NULL,
  `id` int(9) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `pswd` varchar(15) NOT NULL,
  `ph_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_student`
--

INSERT INTO `current_student` (`username`, `id`, `email_id`, `pswd`, `ph_no`) VALUES
('walter', 800032632, 'walter@uncc.edu', 'walter', '2356896412'),
('amu', 800123258, 'amu@uncc.edu', 'amu', '7456987412'),
('ali', 800125478, 'ali@uncc.edu', 'ali', '6589632589'),
('zoey', 800125896, 'zoey@uncc.edu', 'zoey', '7896325896'),
('ali', 800145369, 'ali@uncc.edu', 'ali', '7456985236'),
('zack', 800145698, 'zack@uncc.edu', 'zack', '7898789652'),
('pam', 800147852, 'pam@uncc.edu', 'pam', '3698523698'),
('ben', 800222369, 'ben@uncc.edu', 'ben', '4564445698'),
('emily', 800414789, 'emily@uncc.edu', 'emily', '4569852369'),
('ashu', 800463698, 'ashu@uncc.edu', 'ashu', '1459856325'),
('jamie', 800467985, 'jamie@uncc.edu', 'jamie', '6985347896'),
('qin', 800986578, 'qin@uncc.edu', 'qin', '6574898756');

-- --------------------------------------------------------

--
-- Table structure for table `permanent_acco`
--

CREATE TABLE IF NOT EXISTS `permanent_acco` (
  `id` bigint(9) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `no_room` int(2) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `dist` varchar(10) NOT NULL,
  `furnished` enum('YES','NO') NOT NULL,
  `prop_manager` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `availability` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permanent_acco`
--

INSERT INTO `permanent_acco` (`id`, `house_no`, `addr`, `zip_code`, `no_room`, `rent`, `dist`, `furnished`, `prop_manager`, `contact_no`, `availability`) VALUES
(800125896, '1978A', 'Mallard Creek', '28262', 4, '1200', '1.3', 'NO', 'zoey', '7896325896', '1'),
(800125896, '1978B', 'Mallard Creek', '28262', 4, '1100', '1.3', 'NO', 'zoey', '7896325896', '1'),
(800145698, '220D', 'AG', '12366', 2, '1000', '1.5', 'YES', 'zack', '7898789652', '1'),
(800222369, '1234 E', 'CG', '12566', 2, '450', '4', 'YES', 'ben', '4567984657', '1'),
(800222369, '135 A', 'Colonnial', '45987', 4, '1200', '2.1', 'YES', 'ben', '5478963258', '0'),
(800414789, '190 D', 'UTN', '45698', 3, '1000', '1', 'NO', 'emily', '2036985632', '1'),
(800414789, '190 F', 'UT', '47899', 5, '2000', '3.0', 'YES', 'Emily', '2369874563', '1'),
(800414789, '650 D', 'queens', '459965', 4, '1000', '53', 'YES', 'Emily', '4588969555', '1'),
(800467985, '155A', 'UTN', '28262', 4, '1500', '1.0', 'YES', 'jamie', '6985347896', '1');

-- --------------------------------------------------------

--
-- Table structure for table `property_manager`
--

CREATE TABLE IF NOT EXISTS `property_manager` (
  `id` int(5) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_manager`
--

INSERT INTO `property_manager` (`id`, `email_id`, `pass`) VALUES
(1, 'sam@gmail.com', 'sam'),
(2, 'zoe@gmail.com', 'zoe'),
(3, 'sue@yahoo.co.in', 'sue'),
(4, 'jack@gamil.com', 'jack'),
(5, 'abhi@yahoo.co.in', 'abhi');

-- --------------------------------------------------------

--
-- Table structure for table `prop_acco`
--

CREATE TABLE IF NOT EXISTS `prop_acco` (
  `id` int(11) NOT NULL,
  `house_no` varchar(25) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `no_room` int(2) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `dist` varchar(10) NOT NULL,
  `furnished` enum('YES','NO') NOT NULL,
  `prop_manager` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `prop_address` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_acco`
--

INSERT INTO `prop_acco` (`id`, `house_no`, `addr`, `zip_code`, `no_room`, `rent`, `dist`, `furnished`, `prop_manager`, `email_id`, `prop_address`, `contact_no`) VALUES
(2, '2000A', 'Mallard Creek', '45698', 4, '2500', '1.3', 'YES', 'Zoe A', 'zoe@gmail.com', '123 BCR, charlotte', '4568964569'),
(2, '2000B', 'Mallard Creek', '45698', 3, '1900', '1.3', 'YES', 'Zoe A', 'zoe@gmail.com', '123 BCR, charlotte', '4568964569'),
(3, '100D', 'UT', '45855', 3, '1255', '3.5', 'YES', 'Sue Qin', 'sue@yahoo.co.in', '32 MC, charlotte', '7878787878'),
(3, '2345W', 'UTN', '55555', 1, '330', '3', 'NO', 'sue Qin', 'sue@yahoo.co.in', '32 MC, charlotte', '1253125896'),
(3, '345A', 'UT', '45855', 3, '1500', '3', 'YES', 'Sue Qin', 'sue@yahoo.co.in', '32 MC, charlotte', '7897897895'),
(4, '131B', 'Walden Station', '55656', 4, '2500', '1.3', 'YES', 'jack Qwe', 'jack@gamil.com', '54 Silver Hills, Charlotte', '4569871236'),
(5, '121A', 'Walden Station', '55656', 3, '1500', '1.3', 'NO', 'abhishek banerjee', 'abhi@yahoo.co.in', '34 UC Place, charlotte', '4569871236');

-- --------------------------------------------------------

--
-- Table structure for table `prospective_student`
--

CREATE TABLE IF NOT EXISTS `prospective_student` (
  `username` varchar(100) NOT NULL,
  `id` int(9) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `ph_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospective_student`
--

INSERT INTO `prospective_student` (`username`, `id`, `email_id`, `pass`, `ph_no`) VALUES
('emma', 800123259, 'emma@uncc.edu', 'emma', '7894789632'),
('harsh', 800123654, 'harsh@uncc.edu', 'harsh', '8907897654'),
('amu', 800123698, 'amu@uncc.edu', 'amu', '7800023698'),
('johan', 800134689, 'johan@uncc.edu', 'johan', '2203698569'),
('alia', 800147896, 'alia@uncc.edu', 'alia', '9658745896'),
('ashu', 800369856, 'ashu@uncc.edu', 'ashu', '8569856985'),
('ross', 800458889, 'ross@uncc.edu', 'ross', '2258963256'),
('joe', 800459874, 'joe@uncc.edu', 'joe', '4587896589'),
('anil', 800478963, 'anil@uncc.edu', 'anil', '1258745696'),
('matt', 800479632, 'matt@uncc.edu', 'matt', '4452012369'),
('qin', 800905678, 'qin@uncc.edu', 'qin', '3456789657'),
('mann', 800963587, 'mann@uncc.edu', 'mann', '7845122589'),
('anil', 800963696, 'anil@uncc.edu', 'anil', '5677734567');

-- --------------------------------------------------------

--
-- Table structure for table `p_info`
--

CREATE TABLE IF NOT EXISTS `p_info` (
  `id` bigint(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `date_of_arrival` date NOT NULL,
  `no_days` int(2) NOT NULL,
  `food_choice` enum('veg','nveg','np') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_info`
--

INSERT INTO `p_info` (`id`, `name`, `contact_no`, `date_of_arrival`, `no_days`, `food_choice`) VALUES
(800123259, 'emma ', '7894789632', '2015-12-18', 6, 'nveg'),
(800123654, 'harsh arora', '8907897654', '2015-12-09', 14, 'veg'),
(800134689, 'johan ', '2203698569', '2015-12-26', 12, 'veg'),
(800147896, 'alia ', '9658745896', '2015-12-02', 7, 'veg'),
(800458889, 'ross ', '2258963256', '2015-12-23', 6, 'veg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `current_student`
--
ALTER TABLE `current_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permanent_acco`
--
ALTER TABLE `permanent_acco`
  ADD PRIMARY KEY (`id`,`house_no`);

--
-- Indexes for table `property_manager`
--
ALTER TABLE `property_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prop_acco`
--
ALTER TABLE `prop_acco`
  ADD PRIMARY KEY (`id`,`house_no`);

--
-- Indexes for table `prospective_student`
--
ALTER TABLE `prospective_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_info`
--
ALTER TABLE `p_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `property_manager`
--
ALTER TABLE `property_manager`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
