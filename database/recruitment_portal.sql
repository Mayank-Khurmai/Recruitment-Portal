-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 09:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitment_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_info`
--

CREATE TABLE `admin_login_info` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login_info`
--

INSERT INTO `admin_login_info` (`email`, `name`, `pass`, `mobile`, `role`) VALUES
('iaayushisharma@gmail.com', 'Aayushi Sharma', '1810136', 3745394, 'Admin'),
('mayankkhurmai8@gmail.com', 'Mayank Khurmai', '1810135', 9720315564, 'Super Admin'),
('pragati@gmail.com', 'Pragati Singh', '1810136', 849358, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `exam_date_time`
--

CREATE TABLE `exam_date_time` (
  `exam_date` date NOT NULL,
  `exam_time_start` time NOT NULL,
  `exam_time_end` time NOT NULL,
  `total_duration` bigint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_date_time`
--

INSERT INTO `exam_date_time` (`exam_date`, `exam_time_start`, `exam_time_end`, `total_duration`) VALUES
('2020-06-24', '13:30:00', '14:20:00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'Unknown',
  `student_no` bigint(15) NOT NULL DEFAULT 0,
  `ques_id` bigint(5) NOT NULL,
  `visited` int(1) NOT NULL DEFAULT 0,
  `marked` int(1) NOT NULL DEFAULT 0,
  `reviewed` int(1) NOT NULL DEFAULT 0,
  `option_a_final_ans` int(1) NOT NULL DEFAULT 0,
  `option_b_final_ans` int(1) NOT NULL DEFAULT 0,
  `option_c_final_ans` int(1) NOT NULL DEFAULT 0,
  `option_d_final_ans` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`email`, `name`, `student_no`, `ques_id`, `visited`, `marked`, `reviewed`, `option_a_final_ans`, `option_b_final_ans`, `option_c_final_ans`, `option_d_final_ans`) VALUES
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 1, 1, 1, 0, 1, 0, 0, 0),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 4, 1, 1, 0, 0, 1, 0, 0),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 11, 1, 1, 0, 0, 1, 1, 0),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 22, 1, 1, 0, 0, 0, 1, 1),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 33, 1, 1, 0, 0, 1, 0, 0),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 35, 1, 1, 0, 0, 1, 0, 0),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 41, 1, 1, 0, 0, 0, 0, 1),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 45, 1, 1, 0, 0, 0, 0, 1),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 1, 1, 1, 0, 0, 0, 1, 0),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 4, 1, 0, 0, 0, 0, 0, 0),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 11, 1, 1, 0, 1, 1, 0, 0),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 22, 1, 1, 0, 0, 0, 0, 1),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 33, 1, 1, 0, 0, 0, 0, 1),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 35, 1, 0, 0, 0, 0, 0, 0),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 41, 1, 1, 0, 0, 0, 1, 0),
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 45, 1, 1, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_time`
--

CREATE TABLE `exam_time` (
  `email` varchar(50) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_start_time` time NOT NULL,
  `exam_end_time` time NOT NULL,
  `exam_duration` bigint(3) NOT NULL DEFAULT 0,
  `minute_remain` bigint(3) NOT NULL DEFAULT 0,
  `second_remain` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_time`
--

INSERT INTO `exam_time` (`email`, `exam_date`, `exam_start_time`, `exam_end_time`, `exam_duration`, `minute_remain`, `second_remain`) VALUES
('iaayushisharma@gmail.com', '2020-06-24', '13:30:00', '14:20:00', 50, 50, 0),
('mayankkhurmai8@gmail.com', '2020-06-24', '13:30:00', '14:20:00', 50, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `student_no` bigint(15) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`email`, `name`, `student_no`, `mobile`, `status`) VALUES
('iaayushisharma@gmail.com', 'Aayushi Sharma', 1810136, 9720315565, 'Approved'),
('mayankkhurmai8@gmail.com', 'Mayank kumar khurmai', 1810135, 9720315564, 'Approved'),
('pragatisingh@gmail.com', 'Pragati Singh', 1810137, 9720315566, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `ques_id` int(5) NOT NULL,
  `question` varchar(350) NOT NULL,
  `option_a` varchar(200) NOT NULL,
  `option_a_ans` int(1) NOT NULL DEFAULT 0,
  `option_b` varchar(200) NOT NULL,
  `option_b_ans` int(1) NOT NULL DEFAULT 0,
  `option_c` varchar(200) NOT NULL,
  `option_c_ans` int(1) NOT NULL DEFAULT 0,
  `option_d` varchar(200) NOT NULL,
  `option_d_ans` int(1) NOT NULL DEFAULT 0,
  `is_radiobox` int(1) NOT NULL DEFAULT 1,
  `is_checkbox` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`ques_id`, `question`, `option_a`, `option_a_ans`, `option_b`, `option_b_ans`, `option_c`, `option_c_ans`, `option_d`, `option_d_ans`, `is_radiobox`, `is_checkbox`) VALUES
(1, 'What is your Name', 'Mayank', 1, 'Pragati', 0, 'Aayushi', 0, 'Satyam', 0, 1, 0),
(4, 'Who is the Caption of Indian Team', 'Ms Dohni', 0, 'Virat Kohli', 1, 'Rohit Sharma', 0, 'Dhavan', 0, 1, 0),
(11, 'What is the name of my college', 'Akg', 1, 'Agec', 1, 'Kiet', 0, 'Jss', 0, 0, 1),
(22, 'What is the Capital of India', 'Assam', 0, 'Delhi', 1, 'Indrprasth', 1, 'Kerala', 0, 0, 1),
(33, 'What is your State Name?', 'UP', 1, 'Uttar Pradesh', 1, 'Delhi', 0, 'Haryana', 0, 0, 1),
(35, 'Who is the actor of movie Boss', 'Ranbir Kapoor', 0, 'Akshay Kumar', 1, 'Kartik Aryan', 0, 'Salman Khan', 0, 1, 0),
(41, 'Who is the current Prime Minister of India', 'Sonia Gandhi', 0, 'Rahul Gandhi', 0, 'Narender Modi', 1, 'Amit Shah', 0, 1, 0),
(45, 'This is sample question for testing purpose', 'this is option c', 0, 'this is option c', 0, 'this is option c', 1, 'this is option c', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_info`
--
ALTER TABLE `admin_login_info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `exam_time`
--
ALTER TABLE `exam_time`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`ques_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `ques_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
