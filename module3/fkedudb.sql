-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2023 at 11:18 PM
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
  `Admin_ID` int(11) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `admin_password`, `admin_name`, `admin_email`) VALUES
(1, 'admin', 'Admin', 'admin1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_report_list`
--

CREATE TABLE `admin_report_list` (
  `R_ID` int(100) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `report_description` varchar(200) NOT NULL,
  `report_solution` varchar(200) NOT NULL,
  `report_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_report_list`
--

INSERT INTO `admin_report_list` (`R_ID`, `report_type`, `report_description`, `report_solution`, `report_status`) VALUES
(6, 'Low retention rate', 'users not activessssssssssssss', 'testing', 'In Investigation'),
(11, 'sdasd', 'adsa', 'aaa', 'Resolved');

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
  `Admin_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_list`
--

INSERT INTO `complaint_list` (`Complaint_ID`, `Complaint_date`, `Complaint_time`, `Complaint_type`, `Complaint_description`, `Complaint_status`, `User_ID`, `Admin_ID`) VALUES
(53, '2023-04-04', '20:39:27', 'Unsatisfied Expert\'s Feedback', '<p>The expert\'s feedback is not suitable for my research.</p>', 'Resolved', '1', 1),
(54, '2023-06-20', '23:00:29', 'Unsatisfied Expert\'s Feedback', '<p>The expert\'s answer is too hard for me. :(</p>', 'In Investigation', '1', 1),
(55, '2023-04-28', '20:41:56', 'Wrongly Assigned Research Area', '<p>The expert assigned the wrong research area...</p>', 'Resolved', '1', 1),
(56, '2023-05-09', '20:42:24', 'Wrongly Assigned Research Area', '<p>My research area is focused on Graphics!</p>', 'On Hold', '1', 1),
(57, '2023-05-11', '20:43:23', 'Wrongly Assigned Research Area', '<p>The expert assigned is not specialised in Robotic.</p>', 'In Investigation', '1', 1),
(58, '2023-05-25', '20:43:45', 'Wrongly Assigned Research Area', '<p>The expert assigned the wrong research area!!!</p>', 'In Investigation', '2', 1),
(59, '2023-05-26', '20:44:41', 'Unsatisfied Expert\'s Feedback', '<p>The expert did not provide any guidance.</p>', 'In Investigation', '1', 1),
(60, '2023-05-30', '20:45:01', 'Unsatisfied Expert\'s Feedback', '<p>Unsatisfied with the expert\'s feedback</p>', 'In Investigation', '1', 1),
(61, '2023-05-31', '20:45:52', 'Misleading or Incorrect Information', '<p>The expert\'s information has no credentials.</p>', 'On Hold', '1', 1),
(62, '2023-06-20', '21:27:59', 'Misleading or Incorrect Information', '<p>The information is not correct!</p>', 'In Investigation', '1', 1),
(63, '2023-06-20', '21:28:28', 'Unsatisfied Expert\'s Feedback', '<p>The expert is suck at explaining theory.</p>', 'In Investigation', '2', 1),
(64, '2023-06-20', '21:28:59', 'Misleading or Incorrect Information', '<p>Expert gave misleading information. </p>', 'In Investigation', '2', 1),
(65, '2023-06-20', '21:29:24', 'Misleading or Incorrect Information', '<p>I hate this expert. He always gave incorrect information</p>', 'In Investigation', '1', 1);

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
  `Expert_ID` int(11) NOT NULL,
  `expert_password` varchar(20) NOT NULL,
  `expert_name` varchar(30) NOT NULL,
  `expert_email` varchar(30) NOT NULL,
  `expert_phoneNum` varchar(20) NOT NULL,
  `expert_status` varchar(10) NOT NULL,
  `expert_researchArea1` varchar(50) NOT NULL,
  `expert_researchArea2` varchar(100) NOT NULL,
  `expert_researchArea3` varchar(100) NOT NULL,
  `expert_academicStatus` varchar(50) NOT NULL,
  `expert_socialAcc1` varchar(50) DEFAULT NULL,
  `expert_socialAcc2` varchar(20) DEFAULT NULL,
  `expert_CV` blob NOT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`Expert_ID`, `expert_password`, `expert_name`, `expert_email`, `expert_phoneNum`, `expert_status`, `expert_researchArea1`, `expert_researchArea2`, `expert_researchArea3`, `expert_academicStatus`, `expert_socialAcc1`, `expert_socialAcc2`, `expert_CV`, `Admin_ID`) VALUES
(1, '123', 'Abby Luna', 'abbyoxide01@gmail.com', '     01161569195', 'active', '    Web Engineering', '    Big Data Analysis', '    AI', 'Phd in Computer Science, University Malaya', 'Abby Luna', 'abbyoxide', 0x43562e706466, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` varchar(7) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` varchar(500) NOT NULL,
  `post_keyword` varchar(20) NOT NULL,
  `post_category` varchar(7) NOT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  `post_comment` varchar(100) NOT NULL,
  `user_rating` float NOT NULL,
  `user_feedback` varchar(100) NOT NULL,
  `postStatus` varchar(20) NOT NULL,
  `expertAnswer` varchar(100) DEFAULT NULL,
  `post_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Expert_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `post_title`, `post_content`, `post_keyword`, `post_category`, `post_date`, `post_time`, `post_comment`, `user_rating`, `user_feedback`, `postStatus`, `expertAnswer`, `post_timestamp`, `Expert_ID`) VALUES
('1', 'What algorithms are used in Generative Design Software?', 'Dear all, I am wrting a research paper on Topology optimization and Generative design in Enginerring. Once it comes to Generative design and its use in Autodesk fusion 360, CATIA, or Ansys I cannot find any literature about the used algorithms to generate GD solutions.', 'dataset', 'Softwar', '2023-06-18', '00:00:00', 'Please give me the answers in details, thank you so much', 0, '', 'Not accept yet', '...', '2023-06-20 04:30:04', 1),
('2', 'Open source CFD code to start?', 'Hello everyone. I am planning to start working with open source CFD codes (in Windows, in principle). I am thinking of #OpenFoam or #SU2.', 'CFD coding', 'Graphic', '2023-06-19', '10:00:00', 'Up.', 0, '', 'Not accept yet', '...', '2023-06-20 02:51:32', 1),
('3', 'How Can I Search for The Dataset Used for My Research?', 'How Can I Search for The Dataset Used for My Research? I hope someone can tell me.', 'dataset', 'Artific', '2023-03-20', '09:00:00', 'Nice question.', 0, '', 'Not accept yet', '...', '2023-06-20 03:03:56', 1),
('4', 'Isn’t Dataset for Dyscalculia Rate in Malaysia Is Suitable for My Research?', 'Isn’t Dataset for Dyscalculia Rate in Malaysia Is Suitable for My Research? I have do some many information review and searching for many reference...', 'dyscalculia', 'Human C', '2023-02-20', '09:00:00', 'Up.Follow.', 0, '', 'Not accept yet', '', '2023-06-20 02:59:30', 1),
('5', 'Question About Machine Learning', 'Can You Give Me Some Previous Research Resources\r\nRelated to the Topic of Machine Learning?', 'Artificial Intellige', 'Artific', '2023-01-20', '21:00:00', '', 0, '', 'Not accept yet', '', '2023-06-20 03:01:05', 1),
('6', 'Is my research topic suitable if I choose to \r\ndo networking?', 'Is my research topic suitable if I choose to \r\ndo networking? Any suggestions?', 'Systems and Networki', 'Systems', '2023-03-23', '09:10:00', 'I want to know too the extra journal reference.', 0, '', 'Not accept yet', '', '2023-06-20 03:03:20', 1),
('7', 'Are any applications of multimedia suitable for me to do the research?', 'Are any applications of multimedia suitable for me to do the research?', 'Graphic And  Multime', 'Graphic', '2023-02-20', '09:30:00', 'I think can use the Adobe Editor. Am I right?', 0, '', 'Not accept yet', '', '2023-06-20 03:09:36', 1);

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
-- Table structure for table `publication_list`
--

CREATE TABLE `publication_list` (
  `Publication_ID` int(7) NOT NULL,
  `publication_date` date NOT NULL,
  `publication_topic` varchar(30) NOT NULL,
  `publication_author` varchar(30) NOT NULL,
  `publication_description` varchar(100) NOT NULL,
  `publication_content` varchar(500) NOT NULL,
  `publication_type` varchar(20) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `Admin_ID` int(7) NOT NULL,
  `Expert_ID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication_list`
--

INSERT INTO `publication_list` (`Publication_ID`, `publication_date`, `publication_topic`, `publication_author`, `publication_description`, `publication_content`, `publication_type`, `total_amount`, `Admin_ID`, `Expert_ID`) VALUES
(1, '2023-04-01', 'Web Engineering', 'Abby', 'The tips to score A in subject Web Engineering of computer science...', 'Be patient !!!!', 'Article', 0, 1, 1),
(14, '2023-04-12', 'DSA', 'abby', 'DSA SO FUN', 'gogogo learn', 'Jornal', 0, 1, 1),
(15, '2023-05-04', 'web project', 'abby', 'susah la !!!!!', 'Please jadi baik baik la awak', 'Syllabus', 0, 1, 1),
(16, '2023-05-13', 'operating system', 'abby', 'apa itu os', 'os tu bukan os', 'Thesis', 0, 1, 1),
(17, '2023-05-17', 'DSA', 'abby', 'hi aa', 'hiaa', 'Syllabus', 0, 1, 1),
(18, '2023-06-17', 'Software Security', 'abby', 'Security is important!!!!!!!!', 'How to do.............', 'Thesis', 0, 1, 1),
(19, '2023-06-19', 'Dwww', 'abby', 'aaaswww', 'aaaaww', 'Syllabus', 0, 1, 1);

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
  `RL_ID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `R_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` varchar(7) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_phoneNum` varchar(20) NOT NULL,
  `user_researchArea` varchar(50) NOT NULL,
  `user_academicStatus` varchar(50) NOT NULL,
  `user_socialMediaAcc` varchar(50) NOT NULL,
  `user_ProfileStatus` varchar(100) NOT NULL,
  `user_LastLogin` datetime NOT NULL,
  `Admin_ID` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `user_password`, `user_name`, `user_type`, `user_email`, `user_phoneNum`, `user_researchArea`, `user_academicStatus`, `user_socialMediaAcc`, `user_ProfileStatus`, `user_LastLogin`, `Admin_ID`) VALUES
('1', 'testing', 'Yan Jie Ying', 'Student', 'yanjieying@gmail.com', '0165365369', 'Systems and Networking', 'Master', 'Facebook: Jie Ying Yan', 'Approved', '2023-06-12 01:49:21', '1'),
('2', 'user', 'Lai Hui Ying', 'Student', 'lai@gmail.com', '0124258029', 'Software Engineering', 'Degree', 'Facebook: Hui Ying', 'Approved', '2023-06-12 01:49:21', '1'),
('3', 'user', 'Mohd Talib Bin Ali', 'Student', 'mohd@gmail.com', '0179099909', 'Systems and Networking', 'Degree', 'Facebook: Talib9909', 'Approved', '2023-06-01 15:57:25', '1'),
('4', 'user', 'Janice Lee', 'Student', 'janice@gmail.com', '0112018080', 'Graphics & Multimedia Technology', 'Degree', 'Facebook: janice80', 'Approved', '2023-06-10 08:59:10', '1'),
('5', 'user', 'Muthu ', 'Student', 'muthu@gmail.com', '0166061234', 'Systems and Networking', 'Degree', 'Facebook: muthu123', 'Approved', '2023-06-04 10:02:04', '1'),
('6', 'user', 'Siti Binti Abu Bakar', 'Student', 'siti@gmail.com', '0125084590', 'Software Engineering', 'Degree', 'Facebook: siti321', 'Approved', '2023-05-10 10:03:22', '1'),
('7', '1234', 'Muhammad Shahril', 'Student', 'shahril@gmail.com', '0198765432', 'Robotic', 'Degree', 'Twitter: Shahril', 'Approved', '2023-05-12 01:49:21', '1');

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
-- Indexes for table `admin_report_list`
--
ALTER TABLE `admin_report_list`
  ADD PRIMARY KEY (`R_ID`);

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
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `Expert_ID` (`Expert_ID`);

--
-- Indexes for table `post_report`
--
ALTER TABLE `post_report`
  ADD PRIMARY KEY (`PR_ID`),
  ADD KEY `Post_ID` (`Post_ID`);

--
-- Indexes for table `publication_list`
--
ALTER TABLE `publication_list`
  ADD PRIMARY KEY (`Publication_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`),
  ADD KEY `Expert_ID` (`Expert_ID`);

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
  ADD KEY `R_ID` (`R_ID`);

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
-- AUTO_INCREMENT for table `admin_report_list`
--
ALTER TABLE `admin_report_list`
  MODIFY `R_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `complaint_list`
--
ALTER TABLE `complaint_list`
  MODIFY `Complaint_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `Expert_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publication_list`
--
ALTER TABLE `publication_list`
  MODIFY `Publication_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- Constraints for table `expert`
--
ALTER TABLE `expert`
  ADD CONSTRAINT `expert_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Expert_ID`) REFERENCES `expert` (`Expert_ID`);

--
-- Constraints for table `publication_list`
--
ALTER TABLE `publication_list`
  ADD CONSTRAINT `publication_list_ibfk_1` FOREIGN KEY (`Expert_ID`) REFERENCES `expert` (`Expert_ID`);

--
-- Constraints for table `report_list`
--
ALTER TABLE `report_list`
  ADD CONSTRAINT `report_list_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `admin_report_list` (`R_ID`);

--
-- Constraints for table `user_report`
--
ALTER TABLE `user_report`
  ADD CONSTRAINT `user_report_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
