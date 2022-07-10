-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-04 16:30:46
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
-- 資料表結構 `order_product`
--

CREATE TABLE `order_product` (
  `id` int(3) UNSIGNED NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `product_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `product_quantity`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 1, 28, 4),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 22, 2),
(8, 2, 8, 1),
(9, 2, 28, 1),
(10, 2, 22, 1),
(11, 3, 11, 5),
(12, 3, 12, 1),
(13, 3, 28, 1),
(14, 3, 22, 1),
(15, 4, 15, 1),
(16, 4, 22, 1),
(17, 5, 17, 1),
(18, 5, 22, 1),
(19, 5, 19, 1),
(20, 5, 20, 1),
(21, 6, 21, 1),
(22, 7, 6, 1),
(23, 8, 23, 1),
(24, 9, 24, 1),
(25, 10, 6, 1),
(26, 11, 26, 1),
(27, 12, 27, 1),
(28, 13, 6, 1),
(29, 14, 29, 1),
(30, 15, 30, 1),
(31, 16, 31, 1),
(32, 17, 6, 1),
(33, 18, 33, 1),
(34, 19, 28, 1),
(35, 20, 28, 1),
(36, 21, 22, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
