-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 15, 2022 at 12:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judge_photo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAID` int(11) NOT NULL,
  `Cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAID`, `Cname`) VALUES
(1, 'Animal (Air)'),
(2, 'Animal (Land)'),
(3, 'Animal (Water)'),
(4, 'Season (Spring)'),
(5, 'Season (Summer)'),
(6, 'Season (Fall)'),
(7, 'Season (Winter)'),
(8, 'Weather (Sunny)'),
(9, 'Weather (Raining)'),
(10, 'Weather (Snowing)'),
(11, 'Scenery'),
(12, 'Plant');

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `COID` int(11) NOT NULL,
  `COname` varchar(255) NOT NULL,
  `COdate` date NOT NULL,
  `CAID` int(11) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`COID`, `COname`, `COdate`, `CAID`, `UID`) VALUES
(1, 'The most attractive moment for animal', '2022-02-15', 1, 10),
(2, 'Complement a snowy landscape', '2022-03-09', 7, 7),
(3, 'Beauty of raining', '2022-04-10', 9, 6),
(4, 'The moment of leisure for animal', '2022-05-17', 2, 11),
(5, 'The differences of the world', '2022-06-01', 11, 9),
(6, 'The plant with different colour', '2022-07-20', 12, 13),
(7, 'The charm of swimwear', '2022-08-05', 5, 8),
(8, 'The colours of the ocean', '2022-09-20', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `MID` int(11) NOT NULL,
  `Mark` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`MID`, `Mark`, `PID`) VALUES
(1, 67, 1),
(2, 72, 2),
(3, 91, 3),
(4, 94, 4),
(5, 86, 5),
(6, 65, 6),
(7, 76, 7),
(8, 83, 8),
(9, 61, 9),
(10, 92, 10),
(11, 73, 11),
(12, 76, 12),
(13, 82, 13),
(14, 77, 14),
(15, 87, 15),
(16, 94, 16);

-- --------------------------------------------------------

--
-- Table structure for table `marking_scheme`
--

CREATE TABLE `marking_scheme` (
  `MSID` int(11) NOT NULL,
  `CAID` int(11) NOT NULL,
  `MSdescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marking_scheme`
--

INSERT INTO `marking_scheme` (`MSID`, `CAID`, `MSdescription`) VALUES
(1, 1, 'Record ideas that is relevant with the theme setting.'),
(2, 7, 'Create a unified and balanced composition.'),
(8, 9, 'Demonstrate an understanding of the properties, possibilities and constraints of the chosen theme.'),
(9, 2, 'Include design elements such as flow, movement, rhythm, texture, linkage.'),
(10, 11, 'Record ideas that is relevant with the theme setting.'),
(11, 12, 'Demonstrate an understanding of the properties, possibilities and constraints of the chosen theme.'),
(12, 5, 'Create a unified and balanced composition.');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `PID` int(11) NOT NULL,
  `Pname` text NOT NULL,
  `COID` int(11) NOT NULL,
  `Pdescription` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`PID`, `Pname`, `COID`, `Pdescription`) VALUES
(1, 'Jane', 1, 'An eagle hunting'),
(2, 'Emma', 1, 'An owl sleeping'),
(3, 'Linda', 1, 'Honeybird on flower'),
(4, 'Daniel', 1, 'Butterfly on leaves'),
(5, 'John', 1, 'Seagull catching fish'),
(6, 'Rose', 1, 'Firefly glowing'),
(7, 'Ken', 1, 'Northern light'),
(8, 'Lance', 2, 'Three happy snowman'),
(9, 'Bobby', 2, 'Igloo in the snow'),
(10, 'Emily', 2, 'Snow mountain'),
(11, 'Rebecca', 2, 'Snow white forest'),
(12, 'Harold', 2, 'Fire in the snow'),
(13, 'Brian', 3, 'People with umbrella'),
(14, 'Tina', 3, 'Leaves dropping water'),
(15, 'Tiffany', 3, 'Raindrop on lake'),
(16, 'Nancy', 3, 'Rainbow on sky'),
(17, 'David', 3, 'Rainwater splash'),
(18, 'Tommy', 3, 'Raindrops on flower'),
(19, 'Sam', 4, 'Kangaroo hopping');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `Uname` varchar(255) NOT NULL,
  `Upassword` varchar(255) NOT NULL,
  `Urole` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Uname`, `Upassword`, `Urole`) VALUES
(1, 'Ali', '123', 'admin'),
(2, 'Ben', '456', 'admin'),
(3, 'Caty', '789', 'organizer'),
(4, 'Dalan', '111', 'organizer'),
(5, 'Edan', '222', 'judger'),
(6, 'Falito', '333', 'judger'),
(7, 'Gal', '444', 'judger'),
(8, 'Hady', '555', 'judger'),
(9, 'Rady', '666', 'judger'),
(10, 'Sadi', '777', 'judger'),
(11, 'Tajo', '888', 'judger'),
(12, 'Quin', '999', 'judger'),
(13, 'Xeno', 'aaa', 'judger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAID`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`COID`),
  ADD KEY `Category ID (competition)` (`CAID`),
  ADD KEY `User ID (competition)` (`UID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `PID (mark)` (`PID`);

--
-- Indexes for table `marking_scheme`
--
ALTER TABLE `marking_scheme`
  ADD PRIMARY KEY (`MSID`),
  ADD KEY `Category ID (marking_scheme)` (`CAID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `COID (participant)` (`COID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `COID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `marking_scheme`
--
ALTER TABLE `marking_scheme`
  MODIFY `MSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `Category ID (competition)` FOREIGN KEY (`CAID`) REFERENCES `category` (`CAID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User ID (competition)` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `PID (mark)` FOREIGN KEY (`PID`) REFERENCES `participant` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marking_scheme`
--
ALTER TABLE `marking_scheme`
  ADD CONSTRAINT `Category ID (marking_scheme)` FOREIGN KEY (`CAID`) REFERENCES `category` (`CAID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `COID (participant)` FOREIGN KEY (`COID`) REFERENCES `competition` (`COID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
