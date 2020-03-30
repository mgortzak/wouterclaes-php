-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2009 at 12:31 PM
-- Server version: 5.0.42
-- PHP Version: 4.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `van-den-hout_nl_-_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `stamoud`
--

CREATE TABLE IF NOT EXISTS `stamoud` (
  `relatie` mediumint(6) NOT NULL default '0',
  `id` mediumint(6) NOT NULL default '0',
  `volgnummer` tinyint(2) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
