-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 03:55 PM
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
(53, '2023-04-04', '20:39:27', 'Unsatisfied Expert\'s Feedback', '<p>The expert\'s feedback is not suitable for my research.</p>', 'Resolved', '1', '1'),
(54, '2023-04-28', '20:41:39', 'Unsatisfied Expert\'s Feedback', '<p>The expert\'s answer is too hard for me.</p>', 'In Investigation', '1', '1'),
(55, '2023-04-28', '20:41:56', 'Wrongly Assigned Research Area', '<p>The expert assigned the wrong research area...</p>', 'Resolved', '1', '1'),
(56, '2023-05-09', '20:42:24', 'Wrongly Assigned Research Area', '<p>My research area is focused on Graphics!</p>', 'On Hold', '1', '1'),
(57, '2023-05-11', '20:43:23', 'Wrongly Assigned Research Area', '<p>The expert assigned is not specialised in Robotic.</p>', 'In Investigation', '1', '1'),
(58, '2023-05-25', '20:43:45', 'Wrongly Assigned Research Area', '<p>The expert assigned the wrong research area!!!</p>', 'In Investigation', '2', '1'),
(59, '2023-05-26', '20:44:41', 'Unsatisfied Expert\'s Feedback', '<p>The expert did not provide any guidance.</p>', 'In Investigation', '1', '1'),
(60, '2023-05-30', '20:45:01', 'Unsatisfied Expert\'s Feedback', '<p>Unsatisfied with the expert\'s feedback</p>', 'In Investigation', '1', '1'),
(61, '2023-05-31', '20:45:52', 'Misleading or Incorrect Information', '<p>The expert\'s information has no credentials.</p>', 'On Hold', '1', '1'),
(62, '2023-06-20', '21:27:59', 'Misleading or Incorrect Information', '<p>The information is not correct!</p>', 'In Investigation', '1', '1'),
(63, '2023-06-20', '21:28:28', 'Unsatisfied Expert\'s Feedback', '<p>The expert is suck at explaining theory.</p>', 'In Investigation', '2', '1'),
(64, '2023-06-20', '21:28:59', 'Misleading or Incorrect Information', '<p>Expert gave misleading information. </p>', 'In Investigation', '2', '1'),
(65, '2023-06-20', '21:29:24', 'Misleading or Incorrect Information', '<p>I hate this expert. He always gave incorrect information</p>', 'In Investigation', '1', '1');

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
  `Post_ID` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` varchar(500) NOT NULL,
  `post_keyword` varchar(50) NOT NULL,
  `post_category` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  `post_comment` varchar(100) NOT NULL,
  `user_rating` float NOT NULL,
  `user_feedback` varchar(100) NOT NULL,
  `postStatus` varchar(20) NOT NULL,
  `expertAnswer` varchar(100) NOT NULL,
  `post_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Expert_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `post_title`, `post_content`, `post_keyword`, `post_category`, `post_date`, `post_time`, `post_comment`, `user_rating`, `user_feedback`, `postStatus`, `expertAnswer`, `post_timestamp`, `Expert_ID`) VALUES
(1, 'What algorithms are used in Generative Design Software?', 'Dear all, I am wrting a research paper on Topology optimization and Generative design in Enginerring. Once it comes to Generative design and its use in Autodesk fusion 360, CATIA, or Ansys I cannot find any literature about the used algorithms to generate GD solutions.', 'dataset', 'Software Engineering', '2023-06-18', '00:00:00', 'Please give me the answers in details, thank you so much', 0, '', 'Completed', '', '2023-06-20 12:30:04', 0),
(2, 'Open source CFD code to start?', 'Hello everyone. I am planning to start working with open source CFD codes (in Windows, in principle). I am thinking of #OpenFoam or #SU2.', 'CFD coding', 'Graphic And Multimedia', '2023-06-19', '10:00:00', 'Up.', 0, '', 'Completed', '', '2023-06-20 10:51:32', 0),
(3, 'How Can I Search for The Dataset Used for My Research?', 'How Can I Search for The Dataset Used for My Research? I hope someone can tell me.', 'dataset', 'Artificial  Intelligence', '2023-03-20', '09:00:00', 'Nice question.', 0, '', 'Completed', '', '2023-06-20 11:03:56', 0),
(4, 'Isn’t Dataset for Dyscalculia Rate in Malaysia Is Suitable for My Research?', 'Isn’t Dataset for Dyscalculia Rate in Malaysia Is Suitable for My Research? I have do some many information review and searching for many reference...', 'dyscalculia', 'Human Computer  Interaction', '2023-02-20', '09:00:00', 'Up.Follow.', 0, '', 'Completed', '', '2023-06-20 10:59:30', 0),
(5, 'Question About Machine Learning', 'Can You Give Me Some Previous Research Resources\r\nRelated to the Topic of Machine Learning?', 'Artificial Intelligence and Machine Learning', 'Artificial Intelligence and Machine Learning', '2023-01-20', '21:00:00', '', 0, '', 'Completed', '', '2023-06-20 11:01:05', 0),
(6, 'Is my research topic suitable if I choose to \r\ndo networking?', 'Is my research topic suitable if I choose to \r\ndo networking? Any suggestions?', 'Systems and Networking', 'Systems and Networking', '2023-03-23', '09:10:00', 'I want to know too the extra journal reference.', 0, '', 'Completed', '', '2023-06-20 11:03:20', 0),
(7, 'Are any applications of multimedia suitable for me to do the research?', 'Are any applications of multimedia suitable for me to do the research?', 'Graphic And  Multimedia', 'Graphic And  Multimedia', '2023-02-20', '09:30:00', 'I think can use the Adobe Editor. Am I right?', 0, '', 'Completed', '', '2023-06-20 11:09:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_report`
--

CREATE TABLE `post_report` (
  `PR_ID` varchar(7) NOT NULL,
  `totalpost` int(11) NOT NULL,
  `NumberOfPost` int(11) NOT NULL,
  `SE_NoPost` int(11) NOT NULL,
  `AI_NoPost` int(11) NOT NULL,
  `SAN_NoPost` int(11) NOT NULL,
  `HCI_NoPost` int(11) NOT NULL,
  `GAM_NoPost` int(11) NOT NULL,
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
  `User_ID` int(11) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phoneNum` varchar(20) NOT NULL,
  `user_researchArea` varchar(50) NOT NULL,
  `user_academicStatus` varchar(50) NOT NULL,
  `user_socialMediaAcc` varchar(50) NOT NULL,
  `user_ProfileStatus` varchar(100) NOT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `user_password`, `user_name`, `user_type`, `user_email`, `user_phoneNum`, `user_researchArea`, `user_academicStatus`, `user_socialMediaAcc`, `user_ProfileStatus`, `Admin_ID`) VALUES
(1, 'testing', 'Yan Jie Ying', 'Student', 'yanjieying@gmail.com', '0165365369', 'Systems and Networking', 'Master', 'Facebook: Jie Ying Yan', 'Approved', 1),
(2, '1234', 'Muhammad Shahril', 'Student', 'shahril@gmail.com', '0198765432', 'Robotic', 'Degree', 'Twitter: Shahril', 'Approved', 1);

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
  MODIFY `Complaint_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
