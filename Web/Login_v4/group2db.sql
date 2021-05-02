-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 03:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `job_ID` int(10) NOT NULL,
  `j_email` varchar(50) NOT NULL,
  `accepted` int(10) NOT NULL,
  `e_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`job_ID`, `j_email`, `accepted`, `e_email`) VALUES
(1, 'DEEMA2@gmail.com', 1, 'stc@gmail.com'),
(1, 'lm@gmail.com', -1, 'stc@gmail.com'),
(2, 'DEEMA2@gmail.com', 1, 'LeanNode@gmail.com'),
(2, 'lm@gmail.com', 0, 'LeanNode@gmail.com'),
(3, 'DEEMA2@gmail.com', -1, 'LeanNode@gmail.com'),
(3, 'lm@gmail.com', -1, 'LeanNode@gmail.com'),
(5232, 'DEEMA2@gmail.com', 1, 'dedeEE@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `e_email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `company_scope` varchar(100) NOT NULL,
  `company_description` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`e_email`, `password`, `phone`, `address`, `company_scope`, `company_description`, `mission`, `vision`, `company_name`) VALUES
('Aziz8b@gmail.com', 'Wewewewej', 508295848, 'jn', 'jj', 'nj', 'jkjk', 'jkj', 'TALAj'),
('Aziz@gmail.com', 'Wewewewe', 508295843, 'r', 'df', 'd', 'fd', 'fd', 'TALAa'),
('dedeEE@gmail.com', 'PASSWORD', 508295843, 'ADDRESS', 'SCOPE', 'DES', 'MISSION', 'VISION', 'NAME'),
('elm@gmail.com', '1234321', 558345275, 'Riyadh,Saudi Arabia', ' ', 'We are a pioneer digital champion, always been focused on innovation and evolution, thinking about future to make it, to stay ahead as a truly meaningful and purposeful organization.', ' ', '.', 'Elm'),
('LeanNode@gmail.com', '12343215', 566666666, 'Riyadh, KSA', ' ', 'We are a pioneer digital champion, always been focused on innovation and evolution, thinking about future to make it, to stay ahead as a truly meaningful and purposeful organization.', ' ', ' ', 'LeanNode'),
('NEW9A@gmail.com', 'WeweweweSA', 508295841, 'AA', 'SA', 'DA', 'MA', 'VA', 'NEWA'),
('PATH@gmail.com', '12343215', 566666668, 'Jeddah, KSA', 'P2P', 'We are a pioneer digital champion, always been focused on innovation and evolution, thinking about future to make it, to stay ahead as a truly meaningful and purposeful organization.', '', '', 'PATH'),
('stc@gmail.com', '1234321', 558345265, 'Riyadh,Saudi Arabia', 'We create and bring greater dimension and richness to people’s personal and professional lives.', 'We are a pioneer digital champion, always been focused on innovation and evolution, thinking about future to make it, to stay ahead as a truly meaningful and purposeful organization.', 'We create and bring greater dimension and richness to people’s personal and professional lives.', 'We are a world-class digital leader providing innovative services and platforms to our customers and enabling the digital transformation of the MENA region.', 'STC'),
('ThiqahBusiness@gmail.com', '123432154', 566666688, 'Jeddah, KSA', 'bossiness services ', 'THIQAH was established in 2012 with a desire to lead change through impactful business solutions, smart services and data services. Enabling partners from governmental and private sectors by being a trusted partner led by young and innovative Saudi professionals that can create long-lasting value and achieve a positive impact.', 'Leading change through impactful business and digital solutions.\r\n', 'Becoming the trusted partner that can create long-lasting value through innovative business and digital solutions delivered by vibrant talents, while enabling partners from government and private sectors to achieve a positive impact.', 'Thiqah Business');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `JobID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `status` varchar(25) NOT NULL,
  `bookedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobID` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `required_skills` text NOT NULL,
  `required_qualifications` text NOT NULL,
  `position` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `type` varchar(15) NOT NULL,
  `salary_starts_from` int(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `e-email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `title`, `major`, `description`, `required_skills`, `required_qualifications`, `position`, `location`, `type`, `salary_starts_from`, `gender`, `e-email`) VALUES
(1, 'Solutions Architect', 'IT', 'Lead Discovery and requirements refinement', 'NoSQL, API Design, data modeling\r\n', 'Bachelor’s degree in Computer Science\r\n', 'Developer', 'Riyadh 13315, Saudi Arabia\r\n', 'Full time', 19000, '', 'stc@gmail.com'),
(2, 'Senior Game Producer', 'SWE', 'Analyze business requirements and convert.', 'Great communication, English language,  Leadership', 'Bachelor’s degree in Computer Science\r\n', 'Developer', 'Riyadh', 'Part time', 20000, '', 'LeanNode@gmail.com'),
(3, 'Data Analyst', 'IT', 'business processes to analyze and refine', 'databases(SQL DBs, AWS), Data Studio, data modeling', 'Bachelor’s degree in Computer Science or Information Systems.', 'Manager', 'Jeddah', 'Full time', 20000, '', 'LeanNode@gmail.com'),
(4, 'Event & sponsorships senior specialist', 'IT', 'to the identification of...', 'NoSQL, API Design, data modeling', 'Bachelor\'s degree in Business Administration', 'Developer', 'Riyadh', 'Full time', 20000, '', 'ThiqahBusiness@gmail.com'),
(5, 'rw', 'e', 'e', 'eqr', 'eqr', 'qr', 'qe', 'ear', 3333, 'sf', 'elm@gmail.com'),
(5232, 'Forth', 'ds', 'sd', 'svdsdv', 'sd', 'ds', 'ds', 'FullTime', 3, 'male', 'dedeEE@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `j_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `current_job` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `skills` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`fname`, `lname`, `j_email`, `password`, `birthdate`, `nationality`, `city`, `phone`, `gender`, `current_job`, `major`, `experience`, `skills`) VALUES
('DEEMA', 'AlMutairi', 'DEEMA2@gmail.com', 'testtes2', '2003-12-17', 'Saudi', 'Riyadh', 508295843, 'female', 'ALLAH KNOWS', 'SWE', 'DS', 'SK'),
('Latifa', 'Mohammed', 'latm@gmail.com', '1233214', '1995-09-10', 'saudi', 'riyadh', 555655657, 'female', 'none', 'IS', 'journalist', 'Enterprise systems'),
('Lama', 'Mohammed', 'lm@gmail.com', '1234554321', '1998-10-09', 'saudi', 'jeddah', 555555543, 'female', 'none', 'MIS', 'assistant manager', 'Analytical and problem solving skills'),
('NEWB', 'NEWLB', 'new8@gmail.com', 'WeweweweNB', '1999-06-09', 'NB', 'CB', 508295841, 'female', 'JB', 'MB', 'EB', 'SB'),
('Naif', 'Mohammed', 'Nm@gmail.com', '123123', '2000-10-09', 'saudi', 'jeddah', 555555556, 'male', 'none', 'IS', 'assistant manager', 'Advising'),
('Razan', 'Majed', 'rm@gmail.com', '123321', '2000-09-10', 'saudi', 'riyadh', 555555555, 'female', 'none', 'swe', 'none', 'none'),
('Reema', 'Mohammed', 'rmm@gmail.com', '12344321', '2000-09-10', 'saudi', 'riyadh', 555555557, 'female', 'none', 'swe', 'journalist', 'Information security and assurance'),
('Saud', 'Mohammed', 'sm@gmail.com', '12345678', '1999-09-3', 'saudi', 'riyadh', 555555553, 'male', 'none', 'swe', 'journalist', 'Information security and assurance'),
('Sarah', 'Mohammed', 'smm@gmail.com', '1233214', '1990-09-10', 'saudi', 'riyadh', 555555657, 'female', 'none', 'MIS', 'journalist', 'Enterprise systems');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`job_ID`,`j_email`,`e_email`),
  ADD KEY `applicant_ibfk_1` (`e_email`),
  ADD KEY `j_email` (`j_email`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`e_email`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD KEY `fk_1` (`JobID`),
  ADD KEY `fk_2` (`bookedBy`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `EmployerE` (`e-email`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`j_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`e_email`) REFERENCES `employer` (`e_email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`job_ID`) REFERENCES `job` (`jobID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicants_ibfk_3` FOREIGN KEY (`j_email`) REFERENCES `job_seeker` (`j_email`) ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`e-email`) REFERENCES `employer` (`e_email`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
