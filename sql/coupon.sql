-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-07 04:29:41
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mfee27_group2_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount` float NOT NULL,
  `valid` int(1) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `number`, `start_date`, `end_date`, `discount`, `valid`, `create_time`) VALUES
(1, '我想不到了', 'TK777', '2022-07-15', '2022-07-23', 0.7, 1, '2022-07-05 15:49:41'),
(2, '五百拿去花', 'VIP666', '2022-07-14', '2022-07-21', 0.6, 1, '2022-07-05 15:50:59'),
(3, '一刀殺進去', 'powerman', '2022-07-07', '2022-07-14', 0.7, 1, '2022-07-05 15:51:44'),
(4, '撿便宜趁現在', 'NOW70', '2022-09-15', '2022-09-16', 0.7, 1, '2022-07-05 15:52:12'),
(5, '守住荷包君', 'MONEY80', '2022-08-18', '2022-07-15', 0.8, 0, '2022-07-05 15:53:32'),
(6, '歡樂送', 'TK123', '2022-07-15', '2022-07-23', 0.8, 0, '2022-07-06 08:24:28'),
(7, '登入送好禮', 'TK888', '2022-06-16', '2022-07-14', 0.8, 0, '2022-07-06 09:36:53'),
(8, '讓你野餐不失禮', 'HAPPY120', '2022-10-20', '2022-10-26', 0.6, 0, '2022-07-06 09:40:35'),
(9, '想送就送', 'TK0857', '2022-07-13', '2022-07-14', 0.5, 0, '2022-07-06 09:41:17'),
(10, '暑假有特產', 'ALIMAMADO878', '2022-07-01', '2022-08-30', 0.9, 0, '2022-07-06 09:41:49'),
(11, '老闆瘋了嗎', 'CarryBOSS', '2022-08-23', '2022-08-24', 0.2, 0, '2022-07-06 09:42:45'),
(12, '夏廚趣 讓你這夏更有趣', 'SUMMER85', '2022-07-01', '2022-07-29', 0.6, 0, '2022-07-07 04:23:34');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
