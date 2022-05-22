-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2022 at 04:57 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(255) NOT NULL,
  `TypeOfCompany` varchar(255) NOT NULL,
  `CampusDateTime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LastRegistrationDate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `JobProfile` varchar(255) NOT NULL,
  `Package` varchar(255) NOT NULL,
  `WorkLocation` varchar(255) NOT NULL,
  `JobDescription` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `SkillsRequired` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `SelectionProcess` varchar(255) NOT NULL,
  `EducationQualification` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `EligibilityCriteria` varchar(255) NOT NULL,
  `RegistrationProcess` varchar(255) NOT NULL,
  `PlacementCellContactPerson` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `OtherInformation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `AboutCompany` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `CompanyName`, `TypeOfCompany`, `CampusDateTime`, `LastRegistrationDate`, `Venue`, `JobProfile`, `Package`, `WorkLocation`, `JobDescription`, `SkillsRequired`, `SelectionProcess`, `EducationQualification`, `EligibilityCriteria`, `RegistrationProcess`, `PlacementCellContactPerson`, `OtherInformation`, `AboutCompany`, `Status`) VALUES
(3, 'Systenics Solutions', 'MNC', '17-05-2022 9:00', '15-05-2022', 'Virtual Mode', 'Trainee Software Developer (.NET)', '3 to 4.5 LPA', 'WFH', 'yrtrhgcjv n', 'yfgjvn ', 'yyghjvm ', 'jyrhgjvbn', '5.5 CPI', 'Online', 'TUSHAR OZA Mob. : 7573012806', 'resydxtgcf', ' bvhcfgjdtftu', 1),
(4, 'Google', 'MNC', '17-05-2022 9:00', '15-05-2022', 'Virtual Mode', 'Trainee Software Developer (C++)', '6 to 7 LPA', 'WFH', 'qwertyuiop', 'asdfghjkl', 'zxcvbnm', 'qazwsxedcrfvtgbyhnujmikolp', '5.5 CPI', 'Online', 'M J', 'qwazesxrdctfvygbuhnijm', ',okmjinhbugvyfctdrx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `enrollment_no` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  UNIQUE KEY `enrollment_no` (`enrollment_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`enrollment_no`, `password`, `category`, `status`) VALUES
('92000', '@admin123', 'admin', 1),
('92000133001', 'mbj@1234', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `enrollment_no` (`enrollment_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `enrollment_no`, `email`, `phone_number`, `password`, `razorpay_order_id`, `razorpay_payment_id`, `payment_status`, `price`, `category`, `status`) VALUES
(111, '92000133001', 'mayurdhvajsinhjadeja123@gmail.com', '9911223344', 'mbj@1234', 'order_JRbGUdIlEocoNT', 'pay_JRbGze0ZMQP38e', 'success', '1000', 'user', 1),
(165, '92000133002', 'vasubhalodi111@gmail.com', '9913260225', '66k12hrku8u', 'order_JRbkkXuCimoKsc', 'pay_JRbl3CdPgOub8G', 'success', '1000', 'user', 0),
(166, '92000133005', 'kaushalfaldu@gmail.com', '9988776655', 'kaushalfaldu', 'order_JRbzPn2CxVyET8', 'pay_JRbzVrNacyXSPs', 'success', '1000', 'user', 0),
(167, '92000133009', 'renishsurani9900@gmail.com', '9913224423', 'renishsurani', 'order_JRc0m6DoL6LORn', 'pay_JRc0sAlqtkIfyO', 'success', '1000', 'user', 0),
(168, '92000133015', 'bintibhatt@gmail.com', '9988005544', 'bintibhatt', 'order_JRc2FAdnQWOrLi', 'pay_JRc2MDPVBaJH2o', 'success', '1000', 'user', 0),
(169, '92000133018', 'pushti18depani@gmail.com', '9913224422', 'pushtidepani', 'order_JRc3mUiij3sX2J', 'pay_JRc3s5MMYEid7u', 'success', '1000', 'user', 0),
(170, '92000133035', 'ddobariya5262@gmail.com', '9977885544', 'dhruvi123', 'order_JRc5AHKGLTHxId', 'pay_JRc5GP049So9Bg', 'success', '1000', 'user', 0),
(171, '92000133036', 'hetvi191@gmail.com', '9867889433', 'hetvi191', 'order_JRc6y5SPuquHVn', 'pay_JRc73s9lbdkvQf', 'success', '1000', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_Number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_No` varchar(255) NOT NULL,
  `current_job` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `company` varchar(50) NOT NULL,
  `package` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `enrollment_Number` (`enrollment_Number`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `enrollment_Number`, `name`, `email`, `mobile_No`, `current_job`, `batch`, `company`, `package`, `image`, `category`, `status`) VALUES
(8, '92000', 'Vasu Bhalodi', 'ictmualumniportal@gmail.com', '9913260225', 'No', '0', 'No', 'No', 'No', 'admin', 0),
(20, '92000133001', 'Mayur Jadeja', 'mayurdhvajsinhjadeja123@gmail.com', '9911223344', 'Senior Executive', '2020-2024', 'Google', '50000000', '1651766569.jpg', 'user', 1),
(21, '92000133002', 'Vasu Bhalodi', 'vasubhalodi111@gmail.com', '9913260225', 'Senior Executive', '2017-2021', 'Google', '50000000', '1651767239.jpg', 'user', 1),
(22, '92000133005', 'Kaushal Faldu', 'kaushalfaldu@gmail.com', '9988776655', 'Executive', '2018-2022', 'Cisco', '1000000', '1651768063.jpg', 'user', 1),
(23, '92000133009', 'Renish Surani', 'renishsurani9900@gmail.com', '9913224423', 'Manager', '2019-2023', 'RT Camp', '10000000', '1651768140.jpg', 'user', 1),
(24, '92000133015', 'Binti Bhatt', 'bintibhatt@gmail.com', '9988005544', 'Executive', '2020-2024', 'RT Camp', '10000000', '1651768237.jpg', 'user', 1),
(25, '92000133018', 'Pushti Depani', 'pushti18depani@gmail.com', '9913224422', 'Senior Executive', '2021-2025', 'VLSI', '1000000', '1651768316.jpg', 'user', 1),
(26, '92000133035', 'Dhruvi Dobariya', 'ddobariya5262@gmail.com', '9977885544', 'Executive', '2020-2024', 'Cisco', '10000000', '1651768422.jpg', 'user', 1),
(27, '92000133036', 'Hetvi Sojitra', 'hetvi191@gmail.com', '9867889433', 'Senior Executive', '2020-2024', 'VLSI', '50000000', '1651768499.jpg', 'user', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
