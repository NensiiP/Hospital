-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 04:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novena_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123'),
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `department` varchar(30) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(11) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `message` varchar(150) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `department`, `doctor`, `docFees`, `appdate`, `apptime`, `message`, `userStatus`, `doctorStatus`) VALUES
(4, 25, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Nidhi', 300, '2025-02-28', '04:53:00', 'ass', 0, 0),
(4, 26, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Nidhi', 300, '2025-02-01', '10:58:00', 'ere', 0, 0),
(4, 27, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Krisha', 100, '2025-02-28', '11:27:00', '', 1, 1),
(12, 28, 'fdag', 'uu', 'Female', 'nensi@gmail.coma', '9652387411', '', 'Krisha', 100, '2025-02-26', '11:47:00', 'yeeeee', 0, 1),
(12, 29, 'fdag', 'uu', 'Female', 'nensi@gmail.coma', '9652387411', '', 'Krish', 200, '2025-02-28', '05:00:00', 'hellooo', 1, 1),
(4, 30, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Nidhi', 300, '2025-02-27', '21:03:00', 'qqqqqq', 1, 0),
(4, 31, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Nidhi', 300, '2025-02-20', '17:11:00', 'qqqqq', 1, 1),
(4, 32, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Nidhi', 300, '2025-02-21', '10:00:00', 'qqq', 1, 0),
(4, 33, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Nidhi', 300, '2025-02-06', '20:21:00', 'qq', 0, 0),
(4, 34, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '', 'Krisha', 100, '2025-03-01', '12:00:00', 'thyu', 0, 1),
(8, 35, 'Vensi', 'Patel', 'Female', 'v@gmail.com', '7410258963', 'Dental ', 'Krisha', 100, '2025-03-28', '14:00:00', 'dcxfvgdgv dfdf', 1, 1),
(8, 36, 'Vensi', 'Patel', 'Female', 'v@gmail.com', '7410258963', 'Neurology ', 'Krish', 200, '2025-03-14', '10:00:00', 'dfsgv fvg', 1, 1),
(9, 37, 'Pranali', 'Patel', 'Female', 'p@gmail.com', '9632584710', 'Dental ', 'Nidhi', 300, '2025-03-21', '10:00:00', 'Dental Problem', 1, 1),
(9, 38, 'Pranali', 'Patel', 'Female', 'p@gmail.com', '9632584710', 'Neurology ', 'Krish', 200, '2025-03-27', '12:00:00', 'sdsd', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `topic` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `topic`, `contact`, `message`) VALUES
(4, 'nensi', 'nensi@gmail.com', 'wwwwwwww', '0963852741', 'qtyuioplkjhgfd'),
(5, 'nensi', 'nensi@gmail.com', 'wwwwwwww', '0963852741', 'qtyuioplkjhgfd'),
(7, 'nensi', 'nensi@gmail.com', 'ayy', '0963852741', 'oye yoeee'),
(8, 'nensi', 'nensi@gmail.com', 'ayy', '0963852741', 'oye yoeee'),
(9, 'Pranali', 'p@gmail.com', 'Suggestion', '9632584710', 'Good ');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `deptImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`, `description`, `deptImage`) VALUES
(5, 'Dental ', 'fgrv rer ret  rterre rety jyu rt yju cdvfg rety', 'service-8.jpg'),
(7, 'cardiology ', 'hg', 'service-6.jpg'),
(8, 'Neurology ', 'hg', 'bg-1.jpg'),
(10, 'Heart', 'Heart related problems', 'service-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `docFees` int(11) NOT NULL,
  `docImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `username`, `password`, `email`, `department`, `docFees`, `docImage`) VALUES
(8, 'Nidhi', 'n123', 'k@gmail.com', 'Dental ', 300, 'doctor3.jpg'),
(9, 'Krisha', 'k123', 'k@gmail.com', 'Dental ', 100, 'doctor2.jpg'),
(11, 'Nensi', 'n123', 'nensi@gmail.com', 'cardiology ', 600, 'test-thumb2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`) VALUES
(4, 'nensi', 'patel', 'Female', 'nensi@gmail.com', '9087634511', '1234567', '1234567'),
(5, 'krisha', 'Nathani', 'Female', 'krisha@gmil.com', '7896543210', 'krisha123', 'krisha123'),
(6, 'Bansi', 'Patel', 'Female', 'b@gmail.com', '9632587410', 'b123456', 'b123456'),
(7, 'Dhruvi', 'Patel', 'Female', 'd@gmail.com', '9632587410', 'd123456', 'd123456'),
(8, 'Vensi', 'Patel', 'Female', 'v@gmail.com', '7410258963', 'v123456', 'v123456'),
(9, 'Pranali', 'Patel', 'Female', 'p@gmail.com', '9632584710', 'p123456', 'p123456');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `doctor` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Nidhi', 4, 31, 'nensi', 'patel', '2025-02-20', '17:11:00', 'fdg', 'fgr', 'df'),
('Krisha', 8, 35, 'Vensi', 'Patel', '2025-03-28', '14:00:00', 'dsf', 'dsf', 'dsf'),
('Krish', 8, 36, 'Vensi', 'Patel', '2025-03-14', '10:00:00', 'fcvg', 'fdgv', 'fdg'),
('Nidhi', 9, 37, 'Pranali', 'Patel', '2025-03-21', '10:00:00', 'fdg', 'fdg', 'fdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
