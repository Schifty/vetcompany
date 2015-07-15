-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2015 at 10:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `OwnerID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `DateJoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`OwnerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`OwnerID`, `UserName`, `Password`, `Name`, `ContactNumber`, `Email`, `Address`, `Avatar`, `DateJoined`) VALUES
(7, 'sam cook', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sam cook', '12346789', 'sam@cook.com', '123 fake st', 'album5.png', '1999-11-30 00:00:00'),
(8, 'terry kim', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'terry kim', '234567891', 'terry@kim.com', '321 fake st', 'album6.png', '2000-11-30 00:00:00'),
(9, 'Simon', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'simon says', '123456789123', 'simon@simon.co', '232 simon st', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `PetID` int(11) NOT NULL AUTO_INCREMENT,
  `OwnerID` int(11) NOT NULL,
  `PetType` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Age` int(3) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Doctor` varchar(30) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `PatientSince` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PetID`),
  KEY `OwnersID` (`OwnerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`PetID`, `OwnerID`, `PetType`, `Name`, `Age`, `Sex`, `Doctor`, `Avatar`, `PatientSince`) VALUES
(1, 7, 'dog', 'Rover', 12, 'm', 'DrTony', 'rover.jpg', '2009-11-30 00:00:00'),
(2, 7, 'cat', 'Morris', 4, 'm', 'DrTony', 'morris.jpg', '2001-11-30 00:00:00'),
(3, 8, 'cat', 'yayo', 4, 'm', 'DrTony', 'yayo.jpg', '2015-06-10 05:27:00'),
(4, 8, 'Dog', 'buster', 7, 'f', 'DrTony', 'buster.jpg', '2014-12-15 13:00:27'),
(35, 8, 'test', 'test', 21, 'f', 'DrTony', 'tony.PNG', '1899-11-30 00:00:00'),
(36, 9, 'horse', 'george', 5, 'm', 'DrRakesh', 'horse.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `petvisits`
--

CREATE TABLE IF NOT EXISTS `petvisits` (
  `PetVisitID` int(11) NOT NULL AUTO_INCREMENT,
  `ProcedureID` int(11) NOT NULL,
  `PetID` int(11) NOT NULL,
  `VisitNotes` varchar(150) NOT NULL,
  `DrID` int(3) NOT NULL,
  `VisitDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PetVisitID`),
  KEY `petID_ibfk_1` (`PetID`),
  KEY `fk_procedure_id` (`ProcedureID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `petvisits`
--

INSERT INTO `petvisits` (`PetVisitID`, `ProcedureID`, `PetID`, `VisitNotes`, `DrID`, `VisitDate`) VALUES
(1, 1, 1, 'Vacine given, no complications', 1, '2015-01-03 00:00:00'),
(2, 2, 1, 'Dogs paws treated for 2nd degree burns', 1, '2015-02-20 00:00:00'),
(3, 3, 1, 'tested for heart worm,   tested negative', 1, '2015-05-27 00:00:00'),
(4, 2, 3, 'facial laceration, given stitches and anti-biotics', 2, '0000-00-00 00:00:00'),
(5, 4, 2, 'performed a cleaning, everthing looked god', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE IF NOT EXISTS `procedures` (
  `ProcedureID` int(11) NOT NULL AUTO_INCREMENT,
  `ProcedureName` varchar(40) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Cost` varchar(10) NOT NULL,
  PRIMARY KEY (`ProcedureID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`ProcedureID`, `ProcedureName`, `Description`, `Cost`) VALUES
(1, 'Rabies Vacination', 'This Procedure includes 1 pet vacination against the Rabies virus', '$149.00'),
(2, 'Examine and treat wound', 'Clean and inspect the wound as well as provide care and bandaging. Cost of any prescription is extra', '$99.99'),
(3, 'Heart Worm Test', 'The pet is tested for Heart worms. Any prescriptions or care will ost extra', '$64.99'),
(4, 'Routine Examination', 'Pet is examined by the Dr for general health', '$87.88'),
(5, 'Oral Checkup', 'Oral check includes a cleaning and and visual inspection, any additional treatments cost extra', '$72.49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(16) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `DateJoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Name`, `Email`, `Avatar`, `DateJoined`) VALUES
(1, 'DrTony', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Tony Schifferns', 'tony@VetCompny.com', 'DrTony.png', '2015-06-17 18:53:23'),
(2, 'DrRakesh', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Dr. Rakesh', 'DrRakesh@Petdoctor.com', 'DrRakesh.jpg', '2015-06-29 19:35:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `OwnersID` FOREIGN KEY (`OwnerID`) REFERENCES `owners` (`OwnerID`);

--
-- Constraints for table `petvisits`
--
ALTER TABLE `petvisits`
  ADD CONSTRAINT `fk_procedure_id` FOREIGN KEY (`ProcedureID`) REFERENCES `procedures` (`ProcedureID`),
  ADD CONSTRAINT `petID_ibfk_1` FOREIGN KEY (`PetID`) REFERENCES `pets` (`PetID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
