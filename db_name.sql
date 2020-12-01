-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 08:39 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id_attach` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `file` varchar(100) NOT NULL,
  `vendorID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id_attach`, `name`, `file`, `vendorID`) VALUES
(4, 'Addendums', 'Support_Handover_document2.doc', 1),
(5, 'business license2020', 'LAMP_STACK_ON_UBUNTU.docx', 1),
(6, 'business license', 'LAMP_STACK_ON_UBUNTU2.docx', 1),
(7, 'VAT', 'GPS_nm.docx', 1),
(8, 'BRELA Registration', 'Support_Handover_document.doc', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `attachments`
-- (See below for the actual view)
--
CREATE TABLE `attachments` (
`id_attach` int(30)
,`name` varchar(30)
,`file` varchar(100)
,`v_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cnt_over`
-- (See below for the actual view)
--
CREATE TABLE `cnt_over` (
`id` int(255)
,`date` timestamp
,`contract_name` varchar(255)
,`description` varchar(255)
,`date_of_expiry` date
,`file` varchar(255)
,`user_id` int(255)
,`vendorID` int(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contract_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_of_start` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `is_checked` int(10) DEFAULT '0',
  `file` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `vendorID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `date`, `contract_name`, `description`, `date_of_start`, `date_of_expiry`, `is_checked`, `file`, `user_id`, `vendorID`) VALUES
(14, '2020-11-16 09:42:57', 'Test contract', 'ABC', '2020-11-12', '2020-11-27', 0, '', 6, 0),
(15, '2020-11-09 07:28:15', 'jhjehrje', 'djhj', '2020-11-11', '2020-11-14', 0, 'LAMP_STACK_ON_UBUNTU10.docx', 6, 1),
(16, '2020-11-09 12:15:00', 'check contract', 'here we go again', '2020-11-25', '2021-01-24', 0, 'LAMP_STACK_ON_UBUNTU11.docx', 6, 1),
(17, '2020-11-09 12:18:00', 'kjkjjfk', 'kjkjkrje', '2020-11-26', '2020-12-20', 0, 'LAMP_STACK_ON_UBUNTU12.docx', 6, 1),
(18, '2020-11-09 12:38:52', 'Enm', 'djsf', '2020-11-26', '2021-01-31', 0, 'LAMP_STACK_ON_UBUNTU13.docx', 6, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `contracts`
-- (See below for the actual view)
--
CREATE TABLE `contracts` (
`contract_num` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `deadline_contract`
-- (See below for the actual view)
--
CREATE TABLE `deadline_contract` (
`id` int(255)
,`contract_name` varchar(255)
,`user_id` int(255)
,`file` varchar(255)
,`namba` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `deadline_license`
-- (See below for the actual view)
--
CREATE TABLE `deadline_license` (
`id` int(255)
,`license_name` varchar(255)
,`user_id` int(255)
,`file` varchar(255)
,`namba` int(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'LEGAL');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lcs_over`
-- (See below for the actual view)
--
CREATE TABLE `lcs_over` (
`id` int(255)
,`date` timestamp
,`license_name` varchar(255)
,`description` varchar(255)
,`activations_number` int(255)
,`date_of_expiry` date
,`file` varchar(255)
,`user_id` int(255)
,`vendorID` int(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `license_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `activations_number` int(255) NOT NULL,
  `date_of_expiry` date NOT NULL,
  `is_checked` int(10) DEFAULT '0',
  `file` varchar(255) DEFAULT NULL,
  `user_id` int(255) NOT NULL,
  `vendorID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `date`, `license_name`, `description`, `activations_number`, `date_of_expiry`, `is_checked`, `file`, `user_id`, `vendorID`) VALUES
(5, '2019-08-20 12:42:04', 'VPN', 'SQL Servers upgrade', 45, '2020-12-06', 1, 'CAA_-_FORM3.pdf', 2, 1),
(13, '2020-11-09 07:53:40', 'jhhdja', 'dhhsshd', 45, '2021-02-07', 0, 'LAMP_STACK_ON_UBUNTU5.docx', 6, 1),
(14, '2020-11-09 08:04:26', 'dfjdhfj', 'jdhjdhj', 34, '2021-04-11', 0, 'LAMP_STACK_ON_UBUNTU6.docx', 6, 1),
(15, '2020-11-09 08:05:19', 'checj', 'jhjehj', 34, '2020-11-13', 0, 'LAMP_STACK_ON_UBUNTU7.docx', 6, 1),
(16, '2020-11-09 08:07:35', 'check', 'hjdhsj', 34, '2021-02-13', 0, 'LAMP_STACK_ON_UBUNTU8.docx', 6, 1),
(17, '2020-11-09 12:22:02', 'ABC', 'JHDJSH', 30, '2020-11-19', 0, 'LAMP_STACK_ON_UBUNTU10.docx', 6, 1),
(18, '2020-11-09 12:42:33', 'Test License', 'jshfjshjfh', 34, '2021-01-16', 0, 'LAMP_STACK_ON_UBUNTU11.docx', 6, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `licenses`
-- (See below for the actual view)
--
CREATE TABLE `licenses` (
`license_num` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(200) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL DEFAULT 'dcbfc670ca2c09e2d709c89565d97b76',
  `role` int(200) NOT NULL,
  `is_active` int(20) DEFAULT '1',
  `groups` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `role`, `is_active`, `groups`) VALUES
(2, 'admin', '50387fcd08daefcc1719ced928b9af67', 2, 1, NULL),
(3, 'vendorad', '6ae28a55456b101be8261e5dee44cd3e', 2, 1, '2'),
(6, 'nmwamlima', '50387fcd08daefcc1719ced928b9af67', 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(20) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `user_id` int(255) NOT NULL,
  `location_address` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `service_offered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `v_name`, `user_id`, `location_address`, `contact_person`, `contact_email`, `phone_number`, `service_offered`) VALUES
(1, 'Tigo New Building', 6, 'Kijitonyama, Makumbusho', 'BB', 'tigo@gmail.com', '255765433221', 'Internet');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_other`
--

CREATE TABLE `vendor_other` (
  `vendorID` int(255) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `name_person` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(255) NOT NULL,
  `service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_other`
--

INSERT INTO `vendor_other` (`vendorID`, `v_name`, `location`, `name_person`, `email`, `phone`, `service`) VALUES
(1, 'fjsfk', 'fhdjfd', 'fdhfjd', 'ht@gmail.com', 389238, 'sdjsdjsd'),
(2, 'dsjdks', 'fdjfhdj', 'fdhjfhd', 'gh@gmail.com', 2131212, 'dsdsd'),
(3, 'dsdhsj', 'fdjfhj', 'fdhjfhd', 'dsdh@gmail.com', 2147483647, 'hdjahdjs'),
(4, 'Ntonsite Mwamlima', 'KANISANI KWA PINDA, KINONDONI', 'sdsds', 'mwamlimantonsite@gmail.com', 2147483647, 'checking in'),
(5, 'fhdjfhdj', 'fdhjfd', 'fjdfh', 'fjhdjf@ehrjehr', 329329742, 'hfkdhfjd'),
(6, 'Ntonsite Mwamlima', 'KANISANI KWA PINDA, KINONDONI', 'dsds', 'mwamlimantonsite@gmail.com', 232784723, 'sdjdhad'),
(7, 'Ntonsite Mwamlima', 'KANISANI KWA PINDA, KINONDONI', 'fjdfj', 'mwamlimantonsite@gmail.com', 2147483647, 'jewjehwe'),
(8, 'feerhj', 'jhejhr', 'rjhejr', 'jhfe@jhfj', 23728742, 'rejhrere');

-- --------------------------------------------------------

--
-- Structure for view `attachments`
--
DROP TABLE IF EXISTS `attachments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attachments`  AS  select `attachment`.`id_attach` AS `id_attach`,`attachment`.`name` AS `name`,`attachment`.`file` AS `file`,`vendor`.`v_name` AS `v_name` from (`vendor` join `attachment` on((`vendor`.`vendorID` = `attachment`.`vendorID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `cnt_over`
--
DROP TABLE IF EXISTS `cnt_over`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cnt_over`  AS  select `contract`.`id` AS `id`,`contract`.`date` AS `date`,`contract`.`contract_name` AS `contract_name`,`contract`.`description` AS `description`,`contract`.`date_of_expiry` AS `date_of_expiry`,`contract`.`file` AS `file`,`contract`.`user_id` AS `user_id`,`contract`.`vendorID` AS `vendorID` from `contract` where (`contract`.`date_of_expiry` > curdate()) ;

-- --------------------------------------------------------

--
-- Structure for view `contracts`
--
DROP TABLE IF EXISTS `contracts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `contracts`  AS  select count(`contract`.`id`) AS `contract_num` from `contract` ;

-- --------------------------------------------------------

--
-- Structure for view `deadline_contract`
--
DROP TABLE IF EXISTS `deadline_contract`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deadline_contract`  AS  select `contract`.`id` AS `id`,`contract`.`contract_name` AS `contract_name`,`contract`.`user_id` AS `user_id`,`contract`.`file` AS `file`,(to_days(`contract`.`date_of_expiry`) - to_days(curdate())) AS `namba` from `contract` where ((to_days(`contract`.`date_of_expiry`) - to_days(curdate())) > 5) ;

-- --------------------------------------------------------

--
-- Structure for view `deadline_license`
--
DROP TABLE IF EXISTS `deadline_license`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `deadline_license`  AS  select `license`.`id` AS `id`,`license`.`license_name` AS `license_name`,`license`.`user_id` AS `user_id`,`license`.`file` AS `file`,(to_days(`license`.`date_of_expiry`) - to_days(curdate())) AS `namba` from `license` where ((to_days(`license`.`date_of_expiry`) - to_days(curdate())) > 5) ;

-- --------------------------------------------------------

--
-- Structure for view `lcs_over`
--
DROP TABLE IF EXISTS `lcs_over`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lcs_over`  AS  select `license`.`id` AS `id`,`license`.`date` AS `date`,`license`.`license_name` AS `license_name`,`license`.`description` AS `description`,`license`.`activations_number` AS `activations_number`,`license`.`date_of_expiry` AS `date_of_expiry`,`license`.`file` AS `file`,`license`.`user_id` AS `user_id`,`license`.`vendorID` AS `vendorID` from `license` where (`license`.`date_of_expiry` > curdate()) ;

-- --------------------------------------------------------

--
-- Structure for view `licenses`
--
DROP TABLE IF EXISTS `licenses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `licenses`  AS  select count(`license`.`id`) AS `license_num` from `license` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id_attach`),
  ADD KEY `vendorID` (`vendorID`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`),
  ADD KEY `license_ibfk_1` (`vendorID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- Indexes for table `vendor_other`
--
ALTER TABLE `vendor_other`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id_attach` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_other`
--
ALTER TABLE `vendor_other`
  MODIFY `vendorID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`);

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `license_ibfk_1` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
