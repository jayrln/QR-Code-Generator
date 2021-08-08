-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 03:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdtrace`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertCustomer` (IN `Fname` VARCHAR(100), IN `Mname` VARCHAR(100), IN `Lname` VARCHAR(100), IN `Birthdate` DATE, IN `Address` TINYTEXT, `MobileNo` VARCHAR(16), IN `qrCode` VARCHAR(50))  BEGIN
		INSERT INTO `tbl_customer`(`Fname`,`Mname`,`Lname`,`Birthdate`,`Address`,`MobileNo`,`qrCode`) VALUES(Fname,Mname,Lname,Birthdate,Address,MobileNo,qrCode);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertCustomerLog` (IN `qrVal` VARCHAR(50), IN `Temp` VARCHAR(5))  BEGIN
		SELECT `CustomerID` INTO @custID FROM `tbl_customer` WHERE `qrCode` = qrVal + ".png";
		INSERT INTO `tbl_customerlogs`(`CustomerID`,`Temperature`,`DateTimeLogs`) VALUES (@custID,Temp,NOW());
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertEmployees` (IN `empNo` VARCHAR(100), IN `Fname` VARCHAR(100), IN `Mname` VARCHAR(100), IN `Lname` VARCHAR(100), IN `Address` TINYTEXT, IN `qrCode` VARCHAR(50))  BEGIN
		INSERT INTO `tbl_employee`(`empNo`,`Fname`,`Mname`,`Lname`,`Address`,`qrCode`) VALUES(empNo,Fname,Mname,Lname,Address,qrCode);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectCustDetails` (IN `qrCde` VARCHAR(50))  BEGIN
		SELECT CONCAT(`Fname`,' ',`Mname`,' ',`Lname`) AS FullName, `Address` FROM `tbl_customer` WHERE `qrCode` = qrCde;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectEmpDetails` (IN `qrCde` VARCHAR(50))  BEGIN
		SELECT CONCAT(`Fname`,' ',`Mname`,' ',`Lname`) AS FullName, `Address` FROM `tbl_employee` WHERE `qrCode` = qrCde;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectUserDetails` (IN `sLastname` VARCHAR(100), IN `dBdate` DATE)  BEGIN
		SELECT CONCAT(`Fname`,' ',`Mname`,' ',`Lname`) AS FullName, `Address`, `qrCode` FROM `tbl_customer` WHERE `Lname` = sLastname  AND BirthDate = dBdate;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(8) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Mname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Address` tinytext DEFAULT NULL,
  `MobileNo` varchar(16) DEFAULT NULL,
  `qrCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customerlogs`
--

CREATE TABLE `tbl_customerlogs` (
  `CustLogs` int(8) NOT NULL,
  `CustomerID` int(8) DEFAULT NULL,
  `Temperature` varchar(5) DEFAULT NULL,
  `DateTimeLogs` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `empNo` varchar(15) DEFAULT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Mname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Address` tinytext DEFAULT NULL,
  `qrCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeelogs`
--

CREATE TABLE `tbl_employeelogs` (
  `EmpLogs` int(8) NOT NULL,
  `empID` varchar(15) DEFAULT NULL,
  `Temperature` varchar(5) DEFAULT NULL,
  `DateTimeLogs` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `tbl_customerlogs`
--
ALTER TABLE `tbl_customerlogs`
  ADD PRIMARY KEY (`CustLogs`);

--
-- Indexes for table `tbl_employeelogs`
--
ALTER TABLE `tbl_employeelogs`
  ADD PRIMARY KEY (`EmpLogs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customerlogs`
--
ALTER TABLE `tbl_customerlogs`
  MODIFY `CustLogs` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employeelogs`
--
ALTER TABLE `tbl_employeelogs`
  MODIFY `EmpLogs` int(8) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
