-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 02:44 AM
-- Server version: 8.0.28
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fkedudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `admin_password`, `admin_name`, `admin_email`) VALUES
('A0001', 'admin', 'June Laurence', 'admin1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_list`
--

CREATE TABLE `complaint_list` (
  `Complaint_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `Complaint_date` date NOT NULL,
  `Complaint_time` time NOT NULL,
  `Complaint_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Complaint_description` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `Complaint_status` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `User_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_report`
--

CREATE TABLE `complaint_report` (
  `CR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `totalComplaint` int NOT NULL,
  `Complaint_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussionboard`
--

CREATE TABLE `discussionboard` (
  `Discussion_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `post_status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `post_duration` time NOT NULL,
  `expert_answer` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_publication` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `Post_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `Expert_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `Expert_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `expert _name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `expert _email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_phoneNum` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_researchArea` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_academicStatus` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_socialMediaAcc` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `expert_CV` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `post_likes` int NOT NULL,
  `post_content` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `post_comment` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `post_keyword` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `post_category` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `user_rating` float NOT NULL,
  `post_dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `post_likes`, `post_content`, `post_comment`, `post_keyword`, `post_category`, `user_rating`, `post_dateTime`) VALUES
('P0001', 112, 'Database management on UMP library', 'none', 'Database', 'DB', 4.2, '2023-06-12 02:06:33'),
('P0002', 92, 'Software requirement for Marriage system', 'nice work', 'Software Engineering', 'SE', 4.4, '2023-06-01 10:12:52'),
('P0003', 200, 'Food delivery web application (Foody)', 'none', 'Web Application', 'WEB', 3.9, '2023-05-25 10:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `post_report`
--

CREATE TABLE `post_report` (
  `PR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `totalpost` int NOT NULL,
  `Post_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_report`
--

CREATE TABLE `rating_report` (
  `RR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `totalRating` float NOT NULL,
  `totalPublication` int NOT NULL,
  `Discussion_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_list`
--

CREATE TABLE `report_list` (
  `RL_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `report_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `totalReport` int NOT NULL,
  `engagementRate` float NOT NULL,
  `retentionRate` float NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `userSatisfaction` float NOT NULL,
  `report_status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `UR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `PR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `CR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `RR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `Admin_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user _name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_phoneNum` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_researchArea` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_academicStatus` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_socialMediaAcc` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_LastLogin` datetime NOT NULL,
  `Admin_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `user_password`, `user _name`, `user_type`, `user_email`, `user_phoneNum`, `user_researchArea`, `user_academicStatus`, `user_socialMediaAcc`, `user_LastLogin`, `Admin_ID`) VALUES
('U0001', 'user', 'Lai Hui Ying', 'Student', 'lai@gmail.com', '0124258029', 'Software Engineering', 'Degree in Computer Science', 'Hui Ying', '2023-06-12 01:49:21', 'A0001'),
('U0002', 'user', 'Mohd Talib Bin Ali', 'Student', 'mohd@gmail.com', '0179099909', 'Networking', 'Degree in Computer Science', 'Talib9909', '2023-06-01 15:57:25', 'A0001'),
('U0003', 'user', 'Janice Lee', 'Student', 'janice@gmail.com', '0112018080', 'Graphics & Multimedia Technology', 'Degree in Computer Science', 'janice80', '2023-06-10 08:59:10', 'A0001'),
('U0004', 'user', 'Muthu ', 'Student', 'muthu@gmail.com', '0166061234', 'Networking', 'Degree in Computer Science', 'muthu123', '2023-06-04 10:02:04', 'A0001'),
('U0005', 'user', 'Siti Binti Abu Bakar', 'Student', 'siti@gmail.com', '0125084590', 'Software Engineering', 'Degree in Computer Science', 'siti321', '2023-05-10 10:03:22', 'A0001');

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `UR_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `totalUserByType` int NOT NULL,
  `User_ID` varchar(7) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `complaint_list`
--
ALTER TABLE `complaint_list`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `complaint_report`
--
ALTER TABLE `complaint_report`
  ADD PRIMARY KEY (`CR_ID`),
  ADD KEY `Complaint_ID` (`Complaint_ID`);

--
-- Indexes for table `discussionboard`
--
ALTER TABLE `discussionboard`
  ADD PRIMARY KEY (`Discussion_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Post_ID` (`Post_ID`),
  ADD KEY `Expert_ID` (`Expert_ID`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`Expert_ID`),
  ADD KEY `expert_ibfk_1` (`Admin_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `post_report`
--
ALTER TABLE `post_report`
  ADD PRIMARY KEY (`PR_ID`),
  ADD KEY `Post_ID` (`Post_ID`);

--
-- Indexes for table `rating_report`
--
ALTER TABLE `rating_report`
  ADD PRIMARY KEY (`RR_ID`),
  ADD KEY `Discussion_ID` (`Discussion_ID`);

--
-- Indexes for table `report_list`
--
ALTER TABLE `report_list`
  ADD PRIMARY KEY (`RL_ID`),
  ADD KEY `UR_ID` (`UR_ID`),
  ADD KEY `PR_ID` (`PR_ID`),
  ADD KEY `CR_ID` (`CR_ID`),
  ADD KEY `RR_ID` (`RR_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `user_ibfk_1` (`Admin_ID`);

--
-- Indexes for table `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`UR_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint_list`
--
ALTER TABLE `complaint_list`
  ADD CONSTRAINT `complaint_list_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `complaint_list_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `complaint_report`
--
ALTER TABLE `complaint_report`
  ADD CONSTRAINT `complaint_report_ibfk_1` FOREIGN KEY (`Complaint_ID`) REFERENCES `complaint_list` (`Complaint_ID`);

--
-- Constraints for table `discussionboard`
--
ALTER TABLE `discussionboard`
  ADD CONSTRAINT `discussionboard_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `discussionboard_ibfk_2` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`Post_ID`),
  ADD CONSTRAINT `discussionboard_ibfk_3` FOREIGN KEY (`Expert_ID`) REFERENCES `expert` (`Expert_ID`);

--
-- Constraints for table `expert`
--
ALTER TABLE `expert`
  ADD CONSTRAINT `expert_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `post_report`
--
ALTER TABLE `post_report`
  ADD CONSTRAINT `post_report_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`Post_ID`);

--
-- Constraints for table `rating_report`
--
ALTER TABLE `rating_report`
  ADD CONSTRAINT `rating_report_ibfk_1` FOREIGN KEY (`Discussion_ID`) REFERENCES `discussionboard` (`Discussion_ID`);

--
-- Constraints for table `report_list`
--
ALTER TABLE `report_list`
  ADD CONSTRAINT `report_list_ibfk_1` FOREIGN KEY (`UR_ID`) REFERENCES `user_report` (`UR_ID`),
  ADD CONSTRAINT `report_list_ibfk_2` FOREIGN KEY (`PR_ID`) REFERENCES `post_report` (`PR_ID`),
  ADD CONSTRAINT `report_list_ibfk_3` FOREIGN KEY (`CR_ID`) REFERENCES `complaint_report` (`CR_ID`),
  ADD CONSTRAINT `report_list_ibfk_4` FOREIGN KEY (`RR_ID`) REFERENCES `rating_report` (`RR_ID`),
  ADD CONSTRAINT `report_list_ibfk_5` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `user_report`
--
ALTER TABLE `user_report`
  ADD CONSTRAINT `user_report_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
