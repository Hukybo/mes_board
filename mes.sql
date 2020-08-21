-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-08-14 17:53:35
-- 服务器版本： 5.7.28
-- PHP 版本： 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `message_board`
--

-- --------------------------------------------------------

--
-- 表的结构 `mes`
--

CREATE TABLE `mes` (
  `mes_id` int(11) primary key not null auto_increment,
  `mes_username` varchar(30) NOT NULL,
  `mes_content` text NOT NULL,
  `mes_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mes_top` tinyint(4) NOT NULL DEFAULT '0',
  `mes_praise` tinyint(4) NOT NULL DEFAULT '0',
  `mes_report` tinyint(4) NOT NULL DEFAULT '0'
); ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mes`
--

INSERT INTO `mes` (`mes_id`, `mes_username`, `mes_content`, `mes_time`, `mes_top`, `mes_praise`, `mes_report`) VALUES
(3, '毛泽东', '星星之火可以燎原。', '2020-08-14 07:01:31', 1, 0, 0),
(4, '孔子', '己所不欲，勿施于人。', '2020-08-14 07:03:13', 0, 0, 0),
(5, '拿破仑', '不想当将军的士兵，不是好士兵。', '2020-08-14 07:04:20', 0, 0, 0),
(6, '高尔基', '信仰是伟大的情感，一种创造力量。', '2020-08-14 07:04:38', 0, 0, 0),
(7, '李白', '长风破浪会有时，直挂云帆济沧海。', '2020-08-14 07:05:35', 0, 0, 1),
(8, '白居易', '同是天涯沦落人，相逢何必曾相识。', '2020-08-14 07:12:37', 0, 1, 0),
(9, '达芬奇', '把最复杂的变成最简单的，才是最高明的。', '2020-08-14 08:03:59', 0, 0, 0),
(10, '罗素', '一切社会的不平等，从长远看来，都是收入上的不平等。', '2020-08-14 09:08:03', 0, 0, 0),
(11, '马云', '商业本身就是最大的公益。？', '2020-08-14 09:09:58', 0, 0, 0);

--
-- 转储表的索引
--

--
-- 表的索引 `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`mes_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mes`
--
ALTER TABLE `mes`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
