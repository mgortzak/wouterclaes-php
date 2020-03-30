-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2009 at 12:32 PM
-- Server version: 5.0.42
-- PHP Version: 4.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `van-den-hout_nl_-_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `stamvlg`
--

CREATE TABLE IF NOT EXISTS `stamvlg` (
  `pers1` int(6) default NULL,
  `pers2` int(6) default NULL,
  `relatie` int(6) NOT NULL default '0',
  `volgnummer` char(2) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
