-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2009 at 12:33 PM
-- Server version: 5.0.42
-- PHP Version: 4.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `van-den-hout_nl_-_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `stamnr`
--

CREATE TABLE IF NOT EXISTS `stamnr` (
  `id` int(6) unsigned NOT NULL default '0',
  `achternaam` varchar(30) NOT NULL default 'N.N.',
  `voorvoegsel` varchar(10) default NULL,
  `voornaam` varchar(30) default NULL,
  `geslacht` char(1) NOT NULL default 'O',
  `geboortedatum` varchar(40) default NULL,
  `geboorteplaats` varchar(40) default NULL,
  `doopdatum` varchar(40) default NULL,
  `doopplaats` varchar(40) default NULL,
  `aangiftedatum` varchar(40) default NULL,
  `aangifteplaats` varchar(30) default NULL,
  `overlijdingsdatum` varchar(40) default NULL,
  `overlijdingsplaats` varchar(40) default NULL,
  `begravendatum` varchar(40) default NULL,
  `begravenplaats` varchar(40) default NULL,
  `aangifteoverdatum` varchar(40) default NULL,
  `aangifteoverplaats` varchar(40) default NULL,
  `volgnummer` tinyint(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
