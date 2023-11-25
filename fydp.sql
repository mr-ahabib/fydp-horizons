-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 08:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fydp`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(255) NOT NULL,
  `gid` varchar(200) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `supervisor1ID` varchar(50) NOT NULL,
  `supervisor2ID` varchar(20) NOT NULL,
  `supervisor3ID` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `gid`, `topic`, `supervisor1ID`, `supervisor2ID`, `supervisor3ID`, `status`) VALUES
(1, '12', 'Deep Learning', '1', '2', '3', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(255) NOT NULL,
  `gid` varchar(50) NOT NULL,
  `supervisor` varchar(30) NOT NULL,
  `supervisorid` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `gid`, `supervisor`, `supervisorid`, `status`) VALUES
(5, '12', 'Suman Ahmed', '2', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `field` varchar(200) NOT NULL,
  `password` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `email`, `field`, `password`) VALUES
(1, 'Dr.Hasan Sarwar', 'hsarwar@cse.uiu.ac.bd', 'Deep Learning', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Suman Ahmed', 'sahmed@cse.uiu.ac.bd', 'Software Engineering', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Dr. Mohammad Nurul Huda', 'mnh@cse.uiu.ac.bd', 'Deep Learning', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(255) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `limits` varchar(200) NOT NULL,
  `field` varchar(200) NOT NULL,
  `des` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `sid`, `gname`, `limits`, `field`, `des`) VALUES
(12, '011201261', 'Griffyndor', '5', 'Machine Learning', 'We all the group members will give the best effort to publish the paper.'),
(14, '011201142', 'The Pirates ', '6', 'Networking ', 'We will work on the network based materials and we need dynamic members for that. '),
(15, '011201088', 'Hufflepuff ', '5', 'Blockchain', 'We need a dynamic group to bring out the best of the projects.'),
(16, '011201403', 'The Gladiators ', '6', 'Machine Learning ', 'We will work on the machine Learning based project and we need dynamic members for that. ');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `gid` varchar(200) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `memid` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `gid`, `gname`, `memid`, `mname`, `topic`, `status`) VALUES
(13, '12', 'Griffyndor', '011201261', 'Habib Ahashan', 'Machine Learning', 'Accepted'),
(16, '12', 'Griffyndor', '011202135', '$Faria Akter', 'Machine Learning', 'Accepted'),
(18, '14', 'The Pirates ', '011201142', ' Israt Jahan Khan', 'Networking ', 'Accepted'),
(19, '15', 'Hufflepuff ', '011201088', ' Fashat Bin Faruk', 'Blockchain', 'Accepted'),
(20, '16', 'The Gladiators ', '011201403', ' Dibosh Rajbongshi', 'Machine Learning ', 'Accepted'),
(21, '12', 'Griffyndor', '011213171', 'Md.A Tareq', 'Machine Learning', 'Accepted'),
(22, '12', 'Griffyndor', '011203023', 'Sabbir Hossain ', 'Machine Learning', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(5000) NOT NULL,
  `verification_code` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `u_id`, `email`, `password`, `verification_code`) VALUES
(18, 'Sonjoy Dey', '011202074', 'sdey202074@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(19, ' Farhan Shahriar Alvi', '011192010', 'falvi192010@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(20, 'Al-Momen Reyad', '011203011', 'areyad203011@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(21, ' Masud Bhuiyan', '011183071', 'mbhuiyan183071@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(22, 'Anas', '011203004', 'aosmani203004@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(23, ' Md. Ariful Islam', '011191014', 'mislam191014@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(24, ' Mobashera Israq', '011202275', 'misraq202275@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(25, 'Sahadat Islam Evan', '011203030', 'sevan203030@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(26, ' Most. Sumiya Yeasmin Labannya', '011192001', 'mlabannya192001@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(27, ' Rafiul Hassan', '011193038', 'rhassan193038@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(28, ' Ramisa Hossain', '011202337', 'rhossain202337@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(29, 'Mir Akram', '011202265', 'makram202265@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(30, 'Santi Brata Nath (Joy)', '011201230', 'snath201230@bscse.uiu.ac.bd', '050248cd2efad770e194ca0e12d44264', 0),
(31, 'Taimur Rahman', '011221427', 'trahman221427@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(32, 'Mirza Shemin', '011183050', 'mshemin183050@bscse.uiu.ac.bd', '2c89109d42178de8a367c0228f169bf8', 0),
(35, ' Mithila Farjana', '011201127', 'mfarjana201127@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(36, ' Md. Jubair Hossain Sheebly', '011183017', 'msheebly183017@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(37, 'Shahariar Sarkar', '011201237', 'ssarkar201237@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(38, ' Md.Abdul Kader', '011202244', 'mkader202244@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(39, 'Md.Aman Ulla Faisal', '011192136', 'mfaisal192136@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(40, 'Md.Arshadul Mokaddis', '011201260', 'mmokaddis201260@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(41, ' Samira Raisha Ferdous', '011201334', 'sferdous201334@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(42, 'Toufoque Eamam', '011203018', 'teamam203018@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(43, ' Tasmima Hossain Jamim', '011201216', 'tjamim201216@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(44, 'Md.Awinul Hoque Utsha', '011202163', 'mutsha202163@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(45, 'Tun Tun U', '011193035', 'tu193035@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(46, ' Umma Hani Mim', '011201068', 'umim201068@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(47, 'Emon Karmokar', '011201386', 'ekarmoker201386@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(48, ' Tarikuzzaman Tuhin', '011192003', 'ttuhin192003@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(49, 'Taiyaba Taskin', '011162063', 'ttaskin162063@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(50, ' Abdullah Al Noman', '011203043', 'anoman203043@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(51, 'Susmita ', '011191188', 'sreia191188@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(52, 'Nazmul Hoda', '011201224', 'nhoda201224@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(53, 'Sumaiya Akter', '0112011069', 'sakhter201069@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(54, ' Abu Hasib Muhammad Nanzil', '011192094', 'a192094@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(55, 'Nur Islam Shourab', '011201318', 'nsahourab201318@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(56, 'Mirza Hasan', '011201247', 'mhasan201247@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(57, ' Amina Afroz', '011201391', 'aafroz201391@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(58, 'Kabirul Hossain ', '011202026', 'mhossain202026@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(59, 'Md.Sazzad Mazumder', '011201285', 'mmazumder201285@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(60, ' Dhiman Mozumder', '011202286', 'dmozumder202286@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(61, ' Dibosh Rajbongshi', '011201403', 'drajbongshi201403@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(62, ' Fashat Bin Faruk', '011201088', 'ffaruk201088@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(63, ' Israt Jahan Khan', '011201142', 'ikhan201142@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(64, 'Md.Masud', '011193145', 'mmasud193145@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(65, 'Mahamudul', '011193088', 'mhaque193088@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(66, 'Tanvir Hasan', '011203033', 'thasan203033@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(75, 'Habib Ahashan', '011201261', 'mhabib201261@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(76, 'Pritam Gupta Jitu', '011202301', 'pgupta202301@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(77, 'Faria Akter', '011202135', 'fakter202135@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(78, 'Md.A Tareq', '011213171', 'mtareq213171@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(79, 'Sabbir Hossain ', '011203023', 'msourav203023@bscse.uiu.ac.bd', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(255) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `verification_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
