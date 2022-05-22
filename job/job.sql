-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2022 at 10:20 AM
-- Server version: 8.0.28
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
  `CampusDateTime` text NOT NULL,
  `LastRegistrationDate` text NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `JobProfile` varchar(255) NOT NULL,
  `Package` varchar(255) NOT NULL,
  `WorkLocation` varchar(255) NOT NULL,
  `JobDescription` text NOT NULL,
  `SkillsRequired` text NOT NULL,
  `SelectionProcess` varchar(255) NOT NULL,
  `EducationQualification` text NOT NULL,
  `EligibilityCriteria` varchar(255) NOT NULL,
  `RegistrationProcess` varchar(255) NOT NULL,
  `PlacementCellContactPerson` text NOT NULL,
  `OtherInformation` text NOT NULL,
  `AboutCompany` text NOT NULL,
  `Status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `CompanyName`, `TypeOfCompany`, `CampusDateTime`, `LastRegistrationDate`, `Venue`, `JobProfile`, `Package`, `WorkLocation`, `JobDescription`, `SkillsRequired`, `SelectionProcess`, `EducationQualification`, `EligibilityCriteria`, `RegistrationProcess`, `PlacementCellContactPerson`, `OtherInformation`, `AboutCompany`, `Status`) VALUES
(3, 'Systenics Solutions', 'MNC', '17-05-2022 9:00', '15-05-2022', 'Virtual Mode', 'Trainee Software Developer (.NET)', '3 to 4.5 LPA', 'WFH', 'yrtrhgcjv n', 'yfgjvn ', 'yyghjvm ', 'jyrhgjvbn', '5.5 CPI', 'Online', 'TUSHAR OZA Mob. : 7573012806', 'resydxtgcf', ' bvhcfgjdtftu', 1),
(4, 'Google', 'MNC', '17-05-2022 9:00', '15-05-2022', 'Virtual Mode', 'Trainee Software Developer (C++)', '6 to 7 LPA', 'WFH', 'qwertyuiop', 'asdfghjkl', 'zxcvbnm', 'qazwsxedcrfvtgbyhnujmikolp', '5.5 CPI', 'Online', 'M J', 'qwazesxrdctfvygbuhnijm', ',okmjinhbugvyfctdrx', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
