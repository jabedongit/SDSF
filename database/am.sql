-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 01:54 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am`
--

-- --------------------------------------------------------

--
-- Table structure for table `am_users`
--

CREATE TABLE `am_users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `am_users`
--

INSERT INTO `am_users` (`username`, `password`) VALUES
('alice@gmail.com', 'alice');

-- --------------------------------------------------------

--
-- Table structure for table `data_cus_registration`
--

CREATE TABLE `data_cus_registration` (
  `dataCustodian` varchar(200) NOT NULL,
  `dataRepGran` varchar(300) NOT NULL,
  `dataRepAnonym` varchar(10) NOT NULL,
  `notification` varchar(10) NOT NULL,
  `accounting` varchar(10) NOT NULL,
  `dataCusSecret` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_cus_registration`
--

INSERT INTO `data_cus_registration` (`dataCustodian`, `dataRepGran`, `dataRepAnonym`, `notification`, `accounting`, `dataCusSecret`) VALUES
('http://localhost/swin', 'level1, level 2, level 3', 'true', 'true', 'true', 'ba28391c6cafd');

-- --------------------------------------------------------

--
-- Table structure for table `data_resource_mapping`
--

CREATE TABLE `data_resource_mapping` (
  `uri` varchar(200) NOT NULL,
  `policies_id` varchar(20) NOT NULL,
  `seurity_token` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_resource_mapping`
--

INSERT INTO `data_resource_mapping` (`uri`, `policies_id`, `seurity_token`) VALUES
('8d28560cdd074053c78b417adbfa3d25', '728890c1e0a99', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ImFsaWNlIiwidGltZSI6IjIwMTctMDUtMDkgMTc6NTA6NDUifQ.dtPabmP8TNLPgvjSlPWLtJoBK4P-esQJAuj_ASf1lcw'),
('8d28560cdd074053c78b417adbfa3d25', '80e44e54f1470', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ImFsaWNlIiwidGltZSI6IjIwMTctMDYtMDcgMjA6MTI6MzYifQ.9_KcrNL_Y3VhawyMtFye4akUrGO9qvq361K88aqmpSs'),
('8d28560cdd074053c78b417adbfa3d25', '85a1f924e5279', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ImFsaWNlQGdtYWlsLmNvbSIsInRpbWUiOiIyMDE3LTA1LTA5IDE4OjA1OjQ1In0.tUaWHQFKSMDkDYppIAokZ2vdkweAld-qNs2yBCiQ-zA'),
('8d28560cdd074053c78b417adbfa3d25', 'e6fde73cb1429', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ImFsaWNlQGdtYWlsLmNvbSIsInRpbWUiOiIyMDE3LTA1LTEwIDE1OjA5OjQ1In0.pjY7qbSil42D3bLFNJBj1XFKH_OgfaGWE-1S_iJLfaY'),
('8d28560cdd074053c78b417adbfa3d25', 'c86cfeee2ca40', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ImFsaWNlQGdtYWlsLmNvbSIsInRpbWUiOiIyMDE3LTA1LTEwIDEyOjQwOjQwIn0.03KRYOoGzyh4k3TRKHnWLZpsTX_W4kQYiUyFLDAPeDI'),
('8d28560cdd074053c78b417adbfa3d25', 'b707504255b93', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6ImFsaWNlQGdtYWlsLmNvbSIsInRpbWUiOiIyMDE3LTA1LTEwIDEyOjUxOjUwIn0._r3EOLj6ub2JlsufDDJo9BwOxyitorvUKb2I5iEcp5s');

-- --------------------------------------------------------

--
-- Table structure for table `policy_administration`
--

CREATE TABLE `policy_administration` (
  `resourceURI` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `policyId` varchar(30) NOT NULL,
  `timeGenerated` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy_administration`
--

INSERT INTO `policy_administration` (`resourceURI`, `description`, `policyId`, `timeGenerated`) VALUES
('http://localhost/swin/academicrecord_2.php', 'morshed policy', '728890c1e0a99', '09/05/2017 05:50:45 pm'),
('http://localhost/swin/academicrecord_2.php', 'smith policy', '80e44e54f1470', '07/06/2017 08:12:37 pm'),
('http://localhost/swin/academicrecord_2.php', 'mohammad policy', '85a1f924e5279', '09/05/2017 06:05:45 pm'),
('http://localhost/swin/academicrecord_2.php', 'smith policy', 'b707504255b93', '10/05/2017 12:51:51 pm'),
('http://localhost/swin/academicrecord_2.php', 'jabed policy', 'c86cfeee2ca40', '10/05/2017 12:40:40 pm'),
('http://localhost/swin/academicrecord_2.php', 'test policy', 'e6fde73cb1429', '10/05/2017 03:09:45 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `am_users`
--
ALTER TABLE `am_users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_cus_registration`
--
ALTER TABLE `data_cus_registration`
  ADD PRIMARY KEY (`dataCustodian`),
  ADD UNIQUE KEY `dataCustodian` (`dataCustodian`),
  ADD UNIQUE KEY `dataCusSecret` (`dataCusSecret`);

--
-- Indexes for table `data_resource_mapping`
--
ALTER TABLE `data_resource_mapping`
  ADD UNIQUE KEY `seurity_token` (`seurity_token`);

--
-- Indexes for table `policy_administration`
--
ALTER TABLE `policy_administration`
  ADD UNIQUE KEY `policyId` (`policyId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
