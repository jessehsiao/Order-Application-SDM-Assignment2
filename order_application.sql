-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 03 月 08 日 14:52
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `order_application`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Items`
--

CREATE TABLE `Items` (
  `ItemID` varchar(20) NOT NULL,
  `ItemName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `Items`
--

INSERT INTO `Items` (`ItemID`, `ItemName`) VALUES
('001', 'Apple'),
('002', 'Banana'),
('003', 'Orange'),
('004', 'Kiwi'),
('005', 'Pineapple');

-- --------------------------------------------------------

--
-- 資料表結構 `OrderItems`
--

CREATE TABLE `OrderItems` (
  `num` int(11) NOT NULL,
  `OrderID` varchar(20) NOT NULL,
  `ItemID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `OrderItems`
--

INSERT INTO `OrderItems` (`num`, `OrderID`, `ItemID`) VALUES
(1, '001', '004'),
(2, '001', '005'),
(3, '017', '002'),
(4, '078', '001'),
(5, '017', '001'),
(6, '017', '003'),
(9, '021', '003'),
(10, '021', '004'),
(11, '101', '002'),
(12, '101', '003');

-- --------------------------------------------------------

--
-- 資料表結構 `Orders`
--

CREATE TABLE `Orders` (
  `ID` varchar(20) NOT NULL,
  `customer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `Orders`
--

INSERT INTO `Orders` (`ID`, `customer`) VALUES
('001', 'Steve'),
('017', 'Steve'),
('021', 'Steve'),
('078', 'Jesse'),
('101', 'Steve');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`ItemID`);

--
-- 資料表索引 `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`num`),
  ADD KEY `ItemID` (`ItemID`),
  ADD KEY `restrict1` (`OrderID`);

--
-- 資料表索引 `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `Items` (`ItemID`),
  ADD CONSTRAINT `restrict1` FOREIGN KEY (`OrderID`) REFERENCES `Orders` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
