-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 07 月 05 日 22:36
-- 伺服器版本： 10.4.21-MariaDB
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
-- 資料表結構 `customer_users`
--

CREATE TABLE `customer_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `create_time` datetime NOT NULL,
  `img` varchar(150) NOT NULL,
  `valid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `customer_users`
--

INSERT INTO `customer_users` (`id`, `name`, `email`, `password`, `phone`, `address`, `birthday`, `create_time`, `img`, `valid`) VALUES
(1, 'aaron', 'aaron@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0912345678', '台中市北區市政北七路55號', '1995-11-25', '2022-06-01 01:02:30', 'aaron.jpg', 1),
(2, 'kevin', 'kevin@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0923456789', '台中市北區市政北七路87號', '1991-12-30', '2022-06-02 15:11:45', 'kevin.png', 1),
(3, 'alice', 'alice@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0934567891', '台中市北區市政北七路5號', '1992-06-05', '2022-06-03 22:45:36', 'alice.png', 1),
(4, 'alex', 'alex@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0945678912', '台中市北區市政北七路98號', '1993-02-05', '2022-06-04 04:20:50', 'alex.png', 1),
(5, 'lisa', 'lisa@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0956789123', '台中市北區市政北七路63號', '1990-09-07', '2022-06-05 06:28:10', 'lisa.png', 1),
(6, 'sue', 'sue@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0987654321', '桃園市中壢區環南路二段87號', '1989-06-04', '2022-06-06 07:10:37', 'sue.png', 1),
(7, 'tom', 'tom@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0911122233', '桃園市中壢區環南路二段78號', '1989-06-05', '2022-06-07 05:50:30', 'tom.png', 1),
(8, 'alen', 'alen@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0922233344', '桃園市中壢區環南路二段89號', '1989-06-06', '2022-06-08 23:58:00', 'alen.png', 1),
(9, 'sandy', 'sandy@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0933344455', '桃園市中壢區環南路二段88號', '1989-06-07', '2022-06-09 18:30:24', 'sandy.png', 1),
(10, 'helen', 'helen@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0955566677', '桃園市中壢區環南路二段86號', '1989-06-08', '2022-06-10 12:33:09', 'helen.png', 1),
(11, 'jason', 'jason@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000001', '台北市中正區重慶南路一段122號', '1911-01-01', '2022-06-11 00:05:46', 'jason.png', 1),
(12, 'jack', 'jack@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000002', '台北市中正區重慶南路一段123號', '1911-01-02', '2022-06-12 00:00:00', 'jack.png', 1),
(13, 'jay', 'jay@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000003', '台北市中正區重慶南路一段124號', '1911-01-03', '2022-06-13 18:28:33', 'jay.png', 1),
(14, 'joe', 'joe@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000004', '台北市中正區重慶南路一段125號', '1911-01-04', '2022-06-14 17:00:09', 'joe.png', 1),
(15, 'john', 'john@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000005', '台北市中正區重慶南路一段126號', '1911-01-05', '2022-06-15 13:56:58', 'john.png', 1),
(16, '柯蚊折', 'kerp@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000006', '臺北市信義區信義路四段456號', '1959-08-06', '2022-06-16 14:34:11', 'kerp.png', 1),
(17, '陳水貶', 'water@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000007', '桃園市桃園區中正路152號', '1965-06-07', '2022-06-17 14:34:11', 'water.png', 1),
(18, '馬英酒', 'horse@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000008', '台中市中區三民路二段135號', '1963-05-08', '2022-06-18 14:35:59', 'horse.png', 1),
(19, '韓國魚', 'fish@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000009', '高雄市環河北路一段185號', '1970-04-09', '2022-06-19 14:35:59', 'fish.png', 1),
(20, '蔡鷹雯', 'english@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0900000010', '臺北市信義區市府路1號中央區9樓', '1968-11-10', '2022-05-20 14:37:38', 'english.png', 1),
(21, 'kellen', 'kellen@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0987654321', '台南市全糖路8號', '1936-05-09', '2022-06-21 14:37:38', 'kellen.png', 1),
(22, 'poly', 'poly@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0976543219', '台南市全糖路81號', '1955-06-07', '2022-06-22 14:39:21', 'poly.png', 1),
(23, 'frank', 'frank@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0965432198', '台南市全糖路89號', '1987-08-07', '2022-06-23 14:39:21', 'frank.png', 1),
(24, 'zack', 'zack@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0954321987', '台南市全糖路80號', '1963-05-05', '2022-06-24 20:26:51', 'zack.png', 1),
(25, 'dennis', 'dennis@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0943219876', '台南市全糖路98號', '1964-09-09', '2022-06-25 20:26:51', 'dennis.png', 1),
(26, 'peter', 'peter@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0932198765', '台南市全糖一路8號', '1978-06-09', '2022-06-26 20:30:07', 'peter.png', 0),
(27, 'amy', 'amy@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0921987654', '台南市全糖二路88號', '2001-04-25', '2022-06-27 20:30:07', 'amy.png', 0),
(28, 'tina', 'tina@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0919876543', '台南市全糖三路58號', '1990-03-11', '2022-06-28 20:32:27', 'tina.png', 0),
(29, 'sarah', 'sarah@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0998765432', '台南市全糖路48號', '1991-03-17', '2022-06-29 20:32:27', 'sarah.png', 0),
(30, 'hasaki', 'hasaki@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '0908553216', '台南市全糖路28號', '1995-06-28', '2022-06-30 20:35:05', 'hasaki.png', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `customer_users`
--
ALTER TABLE `customer_users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customer_users`
--
ALTER TABLE `customer_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
