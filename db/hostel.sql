-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 11:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Sakib', 'sakib@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(11) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `room_no` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `hall_name`, `room_no`, `seat_no`, `room_type`) VALUES
(12, 'Nazrul Hall', 23, 118, 'Non single'),
(13, 'Zia Hall', 53, 327, 'Non single'),
(14, 'Sher E Bangla Hall', 130, 562, 'Non single'),
(15, 'Mohsin Hall', 140, 331, 'Non single'),
(16, 'Rokeya Hall', 160, 400, 'Non single');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_booking`
--

CREATE TABLE `hostel_booking` (
  `booking_id` int(50) NOT NULL,
  `hostel_id` int(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `room_number` int(20) NOT NULL,
  `monthly_rent` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_booking`
--

INSERT INTO `hostel_booking` (`booking_id`, `hostel_id`, `student_id`, `room_number`, `monthly_rent`) VALUES
(15, 12, '17181103054', 12, 2000),
(16, 15, '17181103120', 12, 6000),
(17, 13, '15236523021', 50, 2200),
(18, 13, '15675543456', 12, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(200) NOT NULL,
  `notice` varchar(2000) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice`, `date`) VALUES
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry ', '2021-03-10'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '  Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.  Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-03-14'),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum is simply dummy text of the printing and typesetting', '2021-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `p_method` varchar(30) NOT NULL,
  `p_type` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `student_id`, `amount`, `p_method`, `p_type`, `date`, `month`) VALUES
(18, '17181103054', 2000, 'Bank', 'Monthly Hall Bill', '2021-03-23', '2021-02'),
(19, '17181103054', 2000, 'Bkash', 'Monthly Hall Bill', '2021-03-23', '2021-03'),
(20, '17181103054', 550, 'Mobile Banking', 'Others', '2021-03-23', '2021-02'),
(21, '17181103054', 4050, 'Nagad', 'Others', '2021-03-23', '2021-03'),
(22, '17181103120', 6000, 'Bank', 'Monthly Hall Bill', '2021-03-23', '2021-03'),
(23, '17181103120', 6000, 'Credit card', 'Monthly Hall Bill', '2021-03-23', '2021-02');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` int(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `is_hall` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `dept`, `password`, `gender`, `mobile`, `address`, `is_hall`, `image`) VALUES
('15236523021', 'Student A', 'EEE', '698d51a19d8a121ce581499d7b701668', 'Female', 178923214, 'Dhaka, Bangladesh', 1, 'images/profile_img_1615741824_1616423098_1616423198_1616423343.jpg'),
('15675543456', 'Md Rayhan', 'BBA', '698d51a19d8a121ce581499d7b701668', 'Male', 1914609987, 'Mirpur', 1, 'images/profile_img_1615741824_1616423825.jpg'),
('17181103033', 'MD Rabbi', 'CSE', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Male', 178923214, 'Mirpur', 0, 'images/profile_img_1615741824.jpg'),
('17181103054', 'Sakibul Islam', 'CSE', '698d51a19d8a121ce581499d7b701668', 'Male', 1914603437, 'Dhaka, Bangladesh', 1, 'images/IMG_20210304_164705_1615308948.jpg'),
('17181103055', 'Mehedi Hasan', 'CSE', '698d51a19d8a121ce581499d7b701668', 'Male', 1452603437, 'Dhaka, Bangladesh', 0, 'images/profile_img_1615741824_1616423098.jpg'),
('17181103067', 'Samiha Jahan', 'CSE', '698d51a19d8a121ce581499d7b701668', 'Male', 178923214, 'Mohammadpur', 0, 'images/profile_img_1615741824_1616423098_1616423198.jpg'),
('17181103069', 'Student B', 'BBA', '698d51a19d8a121ce581499d7b701668', 'Male', 178923214, 'Badda', 0, 'images/profile_img_1615741824_1616423098_1616423198_1616423343_1616423436.jpg'),
('17181103089', 'Student C', 'EEE', '698d51a19d8a121ce581499d7b701668', 'Male', 1914603437, 'Uttara, Dhaka', 0, 'images/profile_img_1615741824_1616423540.jpg'),
('17181103090', 'Student D', 'EEE', '698d51a19d8a121ce581499d7b701668', 'Female', 1914603437, 'Dhaka, Bangladesh', 0, 'images/profile_img_1615741824_1616423098_1616423589.jpg'),
('17181103120', 'Student E', 'EEE', '698d51a19d8a121ce581499d7b701668', 'Male', 1914603437, 'Dhaka', 1, 'images/profile_img_1615741824_1616423737.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `hostel_booking`
--
ALTER TABLE `hostel_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hostel_booking`
--
ALTER TABLE `hostel_booking`
  MODIFY `booking_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
