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
-- Table structure for table `stamrel`
--

CREATE TABLE IF NOT EXISTS `stamrel` (
  `relatie` mediumint(8) NOT NULL default '0',
  `reltype` char(1) default NULL,
  `reldatum` varchar(40) NOT NULL default 'Onbekend',
  `relplaats` varchar(40) default NULL,
  `reltype2` varchar(20) default NULL,
  `reldatum2` varchar(40) default NULL,
  `relplaats2` varchar(40) default NULL,
  `vader` mediumint(6) NOT NULL default '999999',
  `moeder` mediumint(6) NOT NULL default '999999',
  PRIMARY KEY  (`relatie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
