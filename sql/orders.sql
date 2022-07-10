-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-04 16:30:40
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
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int(3) UNSIGNED NOT NULL,
  `user_id` int(3) NOT NULL,
  `memo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_id` int(3) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `memo`, `coupon_id`, `create_time`) VALUES
(1, 1, '', 0, '2022-01-08 14:10:40'),
(2, 1, '', 0, '2022-02-28 14:10:40'),
(3, 2, '盡速出貨', 1, '2022-03-05 14:31:33'),
(4, 3, '', 0, '2022-03-18 14:31:33'),
(5, 5, '', 0, '2022-04-01 14:31:33'),
(6, 5, '', 0, '2022-04-05 14:31:33'),
(7, 8, '', 0, '2022-04-17 14:31:33'),
(8, 4, '', 0, '2022-04-27 14:31:33'),
(9, 9, '請假日送到，平日無法收件', 3, '2022-05-09 14:31:33'),
(10, 6, '', 0, '2022-05-21 14:31:33'),
(11, 15, '', 2, '2022-05-25 14:31:33'),
(12, 12, '', 0, '2022-06-01 14:31:33'),
(13, 12, '', 0, '2022-06-08 14:31:33'),
(14, 13, '', 0, '2022-06-10 14:31:33'),
(15, 14, '', 7, '2022-06-15 14:31:33'),
(16, 15, '', 0, '2022-06-18 14:31:33'),
(17, 16, '', 0, '2022-06-20 14:31:33'),
(18, 18, '', 0, '2022-06-25 14:31:33'),
(19, 25, '', 10, '2022-07-01 14:31:33'),
(20, 26, '', 0, '2022-07-05 14:31:33'),
(21, 27, '', 0, '2022-07-08 14:31:33');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
