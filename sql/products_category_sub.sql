-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-04 20:02:19
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
-- 資料表結構 `products_category_sub`
--

CREATE TABLE `products_category_sub` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `products_category_sub`
--

INSERT INTO `products_category_sub` (`id`, `name`) VALUES
(1, '氣炸鍋'),
(2, '咖啡機'),
(3, '氣泡水機'),
(4, '快煮壺'),
(5, '磨豆機'),
(6, '果汁機'),
(7, '料理鍋'),
(8, '烤箱/氣炸烤箱'),
(9, '電烤盤'),
(10, '隨行果汁機'),
(11, '鬆餅機/熱壓吐司機'),
(12, '攪拌機');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `products_category_sub`
--
ALTER TABLE `products_category_sub`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products_category_sub`
--
ALTER TABLE `products_category_sub`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
