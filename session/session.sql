-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 03:42 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `testlogin`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `UserName` varchar(6) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `UserId` varchar(5) NOT NULL,
  PRIMARY KEY  (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `login`
-- 

INSERT INTO `login` VALUES ('admin', '1234', 'admin', '001');
INSERT INTO `login` VALUES ('user', '1234', 'user', '002');
INSERT INTO `login` VALUES ('1', '1', 'admin', '11');
INSERT INTO `login` VALUES ('233', '33', 'user', '12');
INSERT INTO `login` VALUES ('3', '3', 'user', '13');
INSERT INTO `login` VALUES ('22', '22', 'user', '22');
