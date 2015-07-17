-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-07-17 18:06:02
-- 服务器版本： 5.5.40
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gracephp`
--

-- --------------------------------------------------------

--
-- 表的结构 `dy_user`
--

CREATE TABLE IF NOT EXISTS `dy_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `tname` varchar(32) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `authkey` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) DEFAULT NULL,
  `logtime` int(11) DEFAULT NULL,
  `logip` varchar(32) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  `regtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `enable` (`enable`),
  KEY `groupid` (`groupid`),
  KEY `uname` (`uname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `dy_user`
--

INSERT INTO `dy_user` (`uid`, `uname`, `tname`, `pwd`, `groupid`, `authkey`, `accessToken`, `logtime`, `logip`, `enable`, `regtime`) VALUES
(16, 'irones', '', 'irones', 0, '', '', 192168, '192.168.1.200', 1, 1437126549),
(17, 'iron123', '', 'iron2es', 0, '', '', 0, '', 0, 1436146751),
(18, 'Avatarar', '', 'avatarar', 0, '', '', 1436322516, '192.168.1.200', 1, 1436147014);

-- --------------------------------------------------------

--
-- 表的结构 `g_accessrules`
--

CREATE TABLE IF NOT EXISTS `g_accessrules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(64) NOT NULL,
  `rid` int(11) NOT NULL,
  `deny` int(2) NOT NULL,
  `allow` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uname` (`uname`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `g_accessrules`
--

INSERT INTO `g_accessrules` (`id`, `uname`, `rid`, `deny`, `allow`) VALUES
(1, 'irones', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `g_rulelib`
--

CREATE TABLE IF NOT EXISTS `g_rulelib` (
  `rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_group` varchar(64) NOT NULL,
  `rule_name` varchar(64) NOT NULL,
  `rule_dis` text,
  `rule_module` varchar(64) NOT NULL,
  `rule_controller` varchar(64) NOT NULL,
  `rule_action` varchar(64) NOT NULL,
  `sort` int(3) NOT NULL DEFAULT '0',
  `enable` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `g_rulelib`
--

INSERT INTO `g_rulelib` (`rule_id`, `rule_group`, `rule_name`, `rule_dis`, `rule_module`, `rule_controller`, `rule_action`, `sort`, `enable`) VALUES
(1, '', '', NULL, 's', 'home', 'main', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
