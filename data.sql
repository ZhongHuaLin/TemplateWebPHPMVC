-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2013 at 03:19 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ImageName` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ImageName` (`ImageName`),
  KEY `productName` (`productName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `ImageName`, `productName`) VALUES
(5, 'placeholder.png', 'productA');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `type` (`type`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `description`) VALUES
(1, 'productA', 'typeA', 'jjjj'),
(2, 'productB', 'typeB', 'jkjkjkl'),
(3, 'productC', 'typeB', 'iujkk'),
(4, 'productD', 'typeA', 'ksjdalk'),
(5, 'productE', 'typeD', 'ioewoieuioq'),
(6, 'productA', 'typeA', 'jjjj'),
(7, 'productA', 'typeA', 'jjjj');

-- --------------------------------------------------------

--
-- Table structure for table `typename`
--

CREATE TABLE `typename` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typename`
--

INSERT INTO `typename` (`id`, `name`) VALUES
(1, 'typeA'),
(2, 'typeB'),
(3, 'typeC'),
(4, 'typeD'),
(5, 'typeE');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_3` FOREIGN KEY (`productName`) REFERENCES `product` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`type`) REFERENCES `typename` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
