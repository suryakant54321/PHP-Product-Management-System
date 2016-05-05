-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2013 at 10:06 PM
-- Server version: 5.0.91
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csredataproducts`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataproduct`
--

CREATE TABLE IF NOT EXISTS `dataproduct` (
  `date` bigint(10) NOT NULL,
  `productName` varchar(250) NOT NULL,
  `productId` varchar(50) NOT NULL,
  `productScale` varchar(50) NOT NULL,
  `productQuality` varchar(50) NOT NULL,
  `productQuantity` int(10) NOT NULL,
  `productCredentials` varchar(50) NOT NULL,
  `productPStatus` varchar(50) NOT NULL,
  `productRemark` varchar(255) default NULL,
  `rack` varchar(255) default NULL,
  `drawer` varchar(255) default NULL,
  `productStatus` varchar(10) default 'not_issued',
  PRIMARY KEY  (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataproduct`
--

INSERT INTO `dataproduct` (`date`, `productName`, `productId`, `productScale`, `productQuality`, `productQuantity`, `productCredentials`, `productPStatus`, `productRemark`, `rack`, `drawer`, `productStatus`) VALUES
(1357929000, 'toposheet', '54_E_20 ', '1:50000', 'RGB', 3, 'Restricted', 'Good', 'Laminated', '12', '2', 'not_issued'),
(1356978600, 'toposheet', '54_E_21 ', '1:50000', 'IRS', 1, 'Restricted', 'Less Damage', 'Laminated', '1', '2', 'not_issued'),
(1356978600, 'toposheet', '54_E_27 ', '1:50000', 'RGB', 3, 'Restricted', 'Good', 'Laminated', '12', '1', 'not_issued'),
(1356978600, 'toposheet', '54_E_28 ', '1:50000', 'IRS', 3, 'Restricted', 'Good', 'Laminated', '1', '1', 'not_issued'),
(1367346600, 'IRS', '54_F_20 ', '1:50000', 'IRS', 1, 'Restricted', 'Good', 'Laminated', '12', '1', 'not_issued'),
(1386786600, 'toposheet', '54_J_2 ', '1:50000', 'Toposheet', 1, 'Non Restricted', 'Good', 'Laminated', '4', '1', 'not_issued');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `issueDate` bigint(10) NOT NULL,
  `submitDate` bigint(10) default NULL,
  `userName` varchar(250) NOT NULL,
  `userRegNo` varchar(15) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userContact` varchar(13) NOT NULL,
  `userDept` varchar(250) NOT NULL,
  `userGuideName` varchar(250) NOT NULL,
  `userPurpose` varchar(250) NOT NULL,
  `userProductQty` varchar(250) NOT NULL,
  `userProductId` text NOT NULL,
  `userSubmitProductRemark` varchar(255) default NULL,
  `userStatus` varchar(10) default 'issued'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`issueDate`, `submitDate`, `userName`, `userRegNo`, `userEmail`, `userContact`, `userDept`, `userGuideName`, `userPurpose`, `userProductQty`, `userProductId`, `userSubmitProductRemark`, `userStatus`) VALUES
(1369982326, 1369982351, 'xyz', '1754711', 'xyz21@gmail.com', '979999999', 'Cafsa', 'Prof. abc', 'land use analysis', '3', '54_E_20 ,54_E_21 ,54_E_27 ', 'no damage to product', 'submitted'),
(1370613619, 1370613648, 'abc', '1542304', 'sasfasf@gmail.com', '9786456322', 'agad', 'Prof. mmmm', 'land use analysis', '4', '54_E_20 ,54_E_21 ,54_E_27 ,54_E_28 ', 'no damage to product', 'submitted');
