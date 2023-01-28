-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 01:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trian_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id_Card` char(13) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Tel` char(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Birth` date NOT NULL,
  `role` varchar(1) DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id_Card`, `First_Name`, `Last_Name`, `Tel`, `Email`, `Nationality`, `Password`, `Birth`, `role`) VALUES
('1111111111111', 'Admin', 'admin', '0645185779', 'admin@gmail.com', 'ไทย', '25f9e794323b453885f5181f1b624d0b', '2022-01-12', 'A'),
('1234567891155', 'กวี', 'หน้าหนังหี', '086549835', 'kavi@gmail.com', 'ไทย', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-11', 'U'),
('1315647231024', 'สุชาติ', 'ปลาดาว', '0841669841', 'mopuyy44@gmail.com', 'ไทย', '25f9e794323b453885f5181f1b624d0b', '2022-03-15', 'U'),
('1319800275911', 'กวี', 'นวณสุธา', '0804567123', 'admin@hotmail.com', 'ไทย', '25f9e794323b453885f5181f1b624d0b', '2022-01-11', 'U'),
('1319800275920', 'ณัฐพงศ์', 'เสาวพันธ์', '0807991000', 'Nathapong@gmail.com', 'ไทย', '25f9e794323b453885f5181f1b624d0b', '2000-01-15', 'U'),
('222222222222', 'BEn', 'hhh', '0610904116', 'admin0000@hotmail.com', 'ไทย', '25f9e794323b453885f5181f1b624d0b', '2022-03-03', 'U'),
('8888888888888', 'แก๋ว', 'ปลาทู', '0647213041', 'admin011@hotmail.com', 'ไทย', '25d55ad283aa400af464c76d713c07ad', '2022-03-15', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `Order_Id` int(10) NOT NULL,
  `Travel_date` date NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Amount` double(10,2) NOT NULL,
  `Order_Date` date NOT NULL DEFAULT current_timestamp(),
  `Travel_Id` char(10) NOT NULL,
  `Id_Card` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`Order_Id`, `Travel_date`, `Quantity`, `Amount`, `Order_Date`, `Travel_Id`, `Id_Card`) VALUES
(33, '2022-03-05', 5, 375.00, '2022-03-02', '1020608071', '1319800275911'),
(35, '2022-03-11', 4, 300.00, '2022-03-02', '1033554477', '8888888888888'),
(39, '2022-03-16', 6, 450.00, '2022-03-02', '1020608045', '1319800275920'),
(43, '2022-03-18', 10, 750.00, '2022-03-02', '1020608333', '1319800275920'),
(53, '2022-03-11', 7, 525.00, '2022-03-03', '1020608045', '1319800275920'),
(55, '2022-03-06', 2, 150.00, '2022-03-05', '1020608023', '1319800275920'),
(57, '2022-03-06', 6, 450.00, '2022-03-06', '1020608023', '222222222222'),
(59, '2022-03-11', 2, 150.00, '2022-03-10', '1020608146', '1319800275920'),
(60, '2022-03-11', 3, 225.00, '2022-03-10', '1020608146', '1319800275911'),
(61, '2022-03-12', 3, 225.00, '2022-03-11', '1045697855', '1234567891155');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Receipt_Id` int(10) NOT NULL,
  `Receipt_date` date NOT NULL DEFAULT current_timestamp(),
  `Order_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Path_ID` int(10) NOT NULL,
  `Source` varchar(30) NOT NULL,
  `Destination` varchar(30) NOT NULL,
  `Capacity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Path_ID`, `Source`, `Destination`, `Capacity`) VALUES
(16, 'ประจวบคิรีขันธ์', 'ชุมพร', 100),
(17, 'ลพบุรี', 'ปากนํ้าโพ', 120),
(18, 'นครปฐม', 'หัวหิน', 200),
(19, 'ขอนแก่น', 'หนองคาย', 160),
(20, 'ชุมพร', 'สุราษฎร์ธานี', 200),
(21, 'หาดใหญ่', 'ปาดังเบซาร์', 120),
(22, 'บ้านไผ่', 'นครปฐม', 200),
(23, 'กรุงเทพ', 'รังสิต', 300),
(37, 'เชียงราย', 'เชียงใหม่', 200),
(38, 'ตรัง', 'น่าน', 100),
(39, 'ยะลา', 'อุบล', 100);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `Ticket _Id` int(10) NOT NULL,
  `Ticket _date` date NOT NULL DEFAULT current_timestamp(),
  `Receipt_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `train_schedule`
--

CREATE TABLE `train_schedule` (
  `Travel_Id` char(10) NOT NULL,
  `Time_Date` date NOT NULL,
  `Path_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `train_schedule`
--

INSERT INTO `train_schedule` (`Travel_Id`, `Time_Date`, `Path_ID`) VALUES
('1020608023', '2022-03-06', 37),
('1020608045', '2022-03-02', 23),
('1020608056', '2022-02-22', 22),
('1020608071', '2022-03-04', 19),
('1020608146', '2022-03-11', 38),
('1020608333', '2022-03-04', 16),
('1033554477', '2022-03-10', 21),
('1045697855', '2022-03-12', 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Card`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `Id_Card` (`Id_Card`),
  ADD KEY `Travel_Id` (`Travel_Id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Receipt_Id`),
  ADD KEY `Order_Id` (`Order_Id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Path_ID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Ticket _Id`);

--
-- Indexes for table `train_schedule`
--
ALTER TABLE `train_schedule`
  ADD PRIMARY KEY (`Travel_Id`),
  ADD KEY `Path_ID` (`Path_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `Order_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Receipt_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `Path_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `Ticket _Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`Id_Card`) REFERENCES `customer` (`Id_Card`),
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`Travel_Id`) REFERENCES `train_schedule` (`Travel_Id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`Order_Id`) REFERENCES `purchase_order` (`Order_Id`);

--
-- Constraints for table `train_schedule`
--
ALTER TABLE `train_schedule`
  ADD CONSTRAINT `train_schedule_ibfk_1` FOREIGN KEY (`Path_ID`) REFERENCES `route` (`Path_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
