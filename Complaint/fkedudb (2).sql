-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2023 at 11:14 AM
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
-- Database: `fkedudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(7) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `admin_password`, `admin_name`, `admin_email`) VALUES
('1', '1234', 'izzan', 'izzan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_list`
--

CREATE TABLE `complaint_list` (
  `Complaint_ID` int(7) NOT NULL,
  `Complaint_date` date NOT NULL,
  `Complaint_time` time NOT NULL,
  `Complaint_type` varchar(50) NOT NULL,
  `Complaint_description` varchar(300) NOT NULL,
  `Complaint_status` varchar(30) NOT NULL,
  `User_ID` varchar(7) NOT NULL,
  `Admin_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_list`
--

INSERT INTO `complaint_list` (`Complaint_ID`, `Complaint_date`, `Complaint_time`, `Complaint_type`, `Complaint_description`, `Complaint_status`, `User_ID`, `Admin_ID`) VALUES
(1, '2023-06-08', '15:22:57', 'Misleading or Incorrect Information', 'The expert\'s feedback is lacking details', 'Resolved', '1', '1'),
(4, '2023-06-08', '15:43:11', 'Unsatisfied Expert\'s Feedback', 'The expert assigned is not suitable for the questionef', 'In Investigation', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_report`
--

CREATE TABLE `complaint_report` (
  `CR_ID` varchar(7) NOT NULL,
  `totalComplaint` int(11) NOT NULL,
  `Complaint_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discussionboard`
--

CREATE TABLE `discussionboard` (
  `Discussion_ID` varchar(7) NOT NULL,
  `post_status` varchar(10) NOT NULL,
  `post_duration` time NOT NULL,
  `expert_answer` varchar(500) NOT NULL,
  `expert_publication` varchar(500) NOT NULL,
  `Admin_ID` varchar(7) NOT NULL,
  `Post_ID` varchar(7) NOT NULL,
  `Expert_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `Expert_ID` varchar(7) NOT NULL,
  `expert_password` varchar(20) NOT NULL,
  `expert _name` varchar(30) NOT NULL,
  `expert _email` varchar(20) NOT NULL,
  `expert_phoneNum` varchar(20) NOT NULL,
  `expert_status` varchar(10) NOT NULL,
  `expert_researchArea` varchar(50) NOT NULL,
  `expert_academicStatus` varchar(50) NOT NULL,
  `expert_socialMediaAcc` varchar(50) NOT NULL,
  `expert_CV` varchar(100) NOT NULL,
  `Admin_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` varchar(7) NOT NULL,
  `post_likes` int(11) NOT NULL,
  `post_content` varchar(500) NOT NULL,
  `post_comment` varchar(100) NOT NULL,
  `post_keyword` varchar(20) NOT NULL,
  `post_category` varchar(7) NOT NULL,
  `user_rating` float NOT NULL,
  `post_dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_report`
--

CREATE TABLE `post_report` (
  `PR_ID` varchar(7) NOT NULL,
  `totalpost` int(11) NOT NULL,
  `Post_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_report`
--

CREATE TABLE `rating_report` (
  `RR_ID` varchar(7) NOT NULL,
  `totalRating` float NOT NULL,
  `totalPublication` int(11) NOT NULL,
  `Discussion_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_list`
--

CREATE TABLE `report_list` (
  `RL_ID` varchar(7) NOT NULL,
  `report_type` varchar(20) NOT NULL,
  `totalReport` int(11) NOT NULL,
  `engagementRate` float NOT NULL,
  `retentionRate` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `userSatisfaction` float NOT NULL,
  `report_status` varchar(10) NOT NULL,
  `UR_ID` varchar(7) NOT NULL,
  `PR_ID` varchar(7) NOT NULL,
  `CR_ID` varchar(7) NOT NULL,
  `RR_ID` varchar(7) NOT NULL,
  `Admin_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` varchar(7) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user _name` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_phoneNum` varchar(20) NOT NULL,
  `user_researchArea` varchar(50) NOT NULL,
  `user_academicStatus` varchar(50) NOT NULL,
  `user_socialMediaAcc` varchar(50) NOT NULL,
  `Admin_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `user_password`, `user _name`, `user_type`, `user_email`, `user_phoneNum`, `user_researchArea`, `user_academicStatus`, `user_socialMediaAcc`, `Admin_ID`) VALUES
('1', '1234', 'shahril', 'expert', 'shahril@gmail.com', '01234', 'IT', 'PHD', 'ShahrilTwitter', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `UR_ID` varchar(7) NOT NULL,
  `totalUserByType` int(11) NOT NULL,
  `User_ID` varchar(7) NOT NULL
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
  ADD KEY `Complaint_ID` (`Complaint_ID`) USING BTREE;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint_list`
--
ALTER TABLE `complaint_list`
  MODIFY `Complaint_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
