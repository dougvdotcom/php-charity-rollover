-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Generation Time: Nov 20, 2007 at 11:04 PM
-- Server version: 5.0.24
-- PHP Version: 4.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `php_charity_donors`
--

CREATE TABLE IF NOT EXISTS `php_charity_donors` (
  `donor_id` int(10) unsigned NOT NULL auto_increment,
  `donor_name` varchar(150) NOT NULL,
  `donor_amount` float(6,2) unsigned NOT NULL,
  `donor_message` varchar(255) NOT NULL,
  PRIMARY KEY  (`donor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `php_charity_donors`
--

INSERT INTO `php_charity_donors` (`donor_id`, `donor_name`, `donor_amount`, `donor_message`) VALUES
(1, 'John Q. Public', 32.78, 'In memory of my beloved cat, Fluffy'),
(2, 'Joe Schmoe', 3245.00, ''),
(3, 'Tommy TwoTone', 5.00, 'Hello World! I think it''s great you are doing this. Thanks so much! I really appreciate it.'),
(4, 'Ebeneezer Scrooge', 0.01, 'Bah Humbug!'),
(5, 'Paul Proxy', 325.22, '');

-- --------------------------------------------------------

--
-- Table structure for table `php_charity_rollover`
--

CREATE TABLE IF NOT EXISTS `php_charity_rollover` (
  `rollover_id` int(10) unsigned NOT NULL auto_increment,
  `rollover_x` int(10) unsigned NOT NULL,
  `rollover_y` int(10) unsigned NOT NULL,
  `donor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`rollover_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `php_charity_rollover`
--

INSERT INTO `php_charity_rollover` (`rollover_id`, `rollover_x`, `rollover_y`, `donor_id`) VALUES
(1, 1, 3, 1),
(2, 3, 2, 2),
(3, 3, 4, 4),
(4, 4, 4, 3),
(5, 5, 1, 5);
