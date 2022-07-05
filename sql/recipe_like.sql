-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-03 22:44:49
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
-- 資料表結構 `recipe_like`
--

CREATE TABLE `recipe_like` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(3) NOT NULL,
  `recipe_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `recipe_like`
--

INSERT INTO `recipe_like` (`id`, `user_id`, `recipe_id`) VALUES
(1, 2, 5),
(2, 1, 6),
(3, 1, 4),
(4, 6, 5),
(5, 2, 4),
(6, 3, 16),
(7, 4, 17),
(8, 7, 18),
(9, 8, 19),
(10, 9, 19),
(11, 15, 16),
(12, 12, 14),
(13, 13, 14),
(14, 12, 13),
(15, 12, 9),
(16, 15, 9),
(17, 10, 3),
(18, 20, 8),
(19, 21, 7),
(20, 28, 10),
(21, 27, 11),
(22, 5, 12);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `recipe_like`
--
ALTER TABLE `recipe_like`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `recipe_like`
--
ALTER TABLE `recipe_like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
