-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 08:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `addressId` int(11) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`addressId`, `address`, `contact`, `email`, `dateTime`, `updateDateTime`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '01123456789', 'info@demo.com', NULL, '2021-09-13 11:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `userId` int(11) NOT NULL,
  `controlerName` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `contact` varchar(500) DEFAULT NULL,
  `userName` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`userId`, `controlerName`, `email`, `contact`, `userName`, `password`, `level`, `dateTime`, `updateDateTime`) VALUES
(3, 'Md. Shah Alam', 'shaha2266@gmail.com', '01777330633', 'shah', 'shah', '1', '2017-03-01 10:20:55', '2017-04-05 10:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `categoryName` varchar(200) DEFAULT NULL,
  `brandName` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `categoryName`, `brandName`, `image`, `dateTime`, `updateDateTime`) VALUES
(19, 'Electronics', 'Mobile', 'images/brand/36ad805af1.png', '2016-12-26 07:52:46', '2017-01-07 01:30:02'),
(60, 'Mans Fashion', 'T-Shirt', NULL, '2021-09-13 12:06:08', NULL),
(20, 'Electronics', 'Home theater', 'images/brand/656c614677.png', '2016-12-26 07:57:08', '2017-01-07 01:29:45'),
(21, 'Accessories', 'Lens Hoods And Lens Caps', 'images/brand/5addf8745f.png', '2016-12-26 08:48:53', '2017-01-07 01:29:27'),
(24, 'Accessories', 'Charger &amp; Battery', NULL, '2016-12-27 03:29:05', '2017-01-02 06:37:38'),
(23, 'Accessories', 'Tripods', 'images/brand/272f270517.png', '2016-12-26 08:55:13', '2017-01-07 01:29:15'),
(61, 'Mans Fashion', 'Hats and caps', NULL, '2021-09-13 12:06:32', NULL),
(62, 'Computer', 'Apple', NULL, '2021-09-13 12:06:48', NULL),
(63, 'Computer', 'dell', NULL, '2021-09-13 12:06:55', NULL),
(64, 'Computer', 'HP', NULL, '2021-09-13 12:07:04', NULL),
(65, 'Computer', 'Windows', NULL, '2021-09-13 12:07:25', NULL),
(66, 'Health and Beauty', 'CBS', 'images/brand/e9f33d60ee.png', '2021-09-13 12:19:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(1000) DEFAULT NULL,
  `productId` varchar(1000) DEFAULT NULL,
  `productName` varchar(1000) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sessionId`, `productId`, `productName`, `price`, `quantity`, `image`, `dateTime`, `updateDateTime`) VALUES
(1, '3990a4a990aacab6430ae035e61b5e25', '38', 'Canon EOS 1300D DSLR Camera with EF-S18-55 III', 30, 1, 'images/product/9f21bc8f3d.jpg', '2016-12-28 10:06:46', NULL),
(2, '3990a4a990aacab6430ae035e61b5e25', '23', 'Canon LP-E6N Lithium-Ion Battery', 1, 1, 'images/product/b9648b9c28.jpg', '2016-12-29 12:36:00', NULL),
(3, '9eb0240b875647f697742ff22ebecd6f', '44', 'Canon EOS 700D (EOS Rebel T5i / EOS Kiss X7i) with Canon EF-S 18-135mm f/3.5-5.6 IS STM', 52, 1, 'images/product/0e5c80d581.png', '2016-12-29 11:13:02', NULL),
(4, 'ac67c0d21054c633d0ccfa187c033cda', '43', 'Canon EOS 7D Mark II DSLR Camera with 18-135mm f/3.5-5.6 STM Lens ', 1, 1, 'images/product/277820410e.jpg', '2016-12-29 08:16:12', NULL),
(10, '3b92fdc8cb227aaeaca79b758205f4ed', '87', 'Nikon AF-S DX NIKKOR 55-300mm f/4.5-5.6G ED VR Lens', 97000, 1, 'images/product/e072ce49a0.jpg', '2016-12-31 10:37:42', NULL),
(9, 'd179d9f6701a21f21da9d46d33b55569', '62', 'Jowepro Model BP 30', 1, 1, 'images/product/b15374b9f6.jpg', '2016-12-31 10:00:29', NULL),
(17, '8a66752dcdf41eaf0c28b1431693c02c', '90', 'Sony HXR-NX100 Full HD NXCAM Camcorder', 155000, 1, 'images/product/c9f30e70ba.png', '2017-01-01 06:13:11', NULL),
(16, '704f321c604747900e1f8e3be9b558bd', '89', 'Sony HXR-MC2500 Shoulder Mount AVCHD Camcorder', 94000, 1, 'images/product/e71d1ec5e3.jpeg', '2017-01-01 02:00:55', NULL),
(15, '704f321c604747900e1f8e3be9b558bd', '44', 'Canon EOS 700D (EOS Rebel T5i / EOS Kiss X7i) with Canon EF-S 18-135mm f/3.5-5.6 IS STM', 52000, 1, 'images/product/0e5c80d581.png', '2017-01-01 12:37:28', NULL),
(23, '127339bec972700130c441ca353f71c7', '116', 'Nikon SB-5000 AF Speedlight', 36000, 1, 'images/product/266b3f637b.jpg', '2017-01-07 10:43:16', NULL),
(24, '9e5a835c3aac0b6e8144d72e963b6e95', '118', 'Nikon AF NIKKOR 50mm f/1.8D Lens', 7500, 1, 'images/product/47258cdad8.jpg', '2017-01-08 10:20:43', NULL),
(31, '8d0d6714dfe44c817b6eaf079ded0d94', '33', 'Canon EOS 80D DSLR Camera with 18-135mm USM Lens', 96000, 1, 'images/product/005b89c62a.jpg', '2017-01-28 02:13:29', NULL),
(50, '110224dbef312635131076fa5c291550', '136', 'Sony Strap Textile Soft Type (Black)', 400, 2, 'images/product/239ec60f7a.jpg', '2017-02-03 06:30:31', NULL),
(51, '2326728a8d686f8349bac977288a57fb', '44', 'Canon EOS 700D (EOS Rebel T5i / EOS Kiss X7i) with Canon EF-S 18-135mm f/3.5-5.6 IS STM', 50000, 3, 'images/product/0e5c80d581.png', '2017-02-03 11:36:08', '2017-02-03 11:36:39'),
(59, 'ac2b9df430f0577994395c79ba256d39', '44', 'Canon EOS 700D (EOS Rebel T5i / EOS Kiss X7i) with Canon EF-S 18-135mm f/3.5-5.6 IS STM', 50000, 1, 'images/product/0e5c80d581.png', '2017-02-05 08:45:28', NULL),
(62, 'd8b464d09f532d3dacb6435162d55227', '97', 'Nikon D5500 DSLR Camera with lens 18-55mm', 47000, 1, 'images/product/5cb83c8851.png', '2017-02-13 02:28:56', NULL),
(63, 'c86be55f30ba30bd8b641668073586b8', '97', 'Nikon D5500 DSLR Camera with lens 18-55mm', 47000, 1, 'images/product/5cb83c8851.png', '2017-02-13 02:31:27', NULL),
(67, 'f73f2fcdf25123f9ec8948131181426d', '89', 'Sony HXR-MC2500 Shoulder Mount AVCHD Camcorder', 90000, 1, 'images/product/e71d1ec5e3.jpg', '2017-02-15 03:38:08', NULL),
(68, 'd2b345a6c3167e9e2857f1700465597e', '134', 'Panasonic HC-X1000 4K DCI/Ultra HD/Full HD Camcorder', 190000, 5, 'images/product/e3061cd276.jpg', '2017-02-15 04:29:17', '2017-02-15 04:29:28'),
(77, '1d02f3283fa1498b1b2eddae0ce1e127', '143', 'Canon LC-E8E Charger for LP-E8 Battery Pack', 500, 1, 'images/product/0e286ab211.jpg', '2017-02-22 05:29:06', NULL),
(73, '7660d8489a5935bf4082283bb97ef40a', '121', 'Sony PXW-X160 Full HD XDCAM Handheld Camcorder', 290000, 1, 'images/product/d7260e65e5.jpg', '2017-02-19 12:13:58', NULL),
(78, 'cc14947a2cd350c80f8154d4eab1f051', '143', 'Canon LC-E8E Charger for LP-E8 Battery Pack', 500, 1, 'images/product/0e286ab211.jpg', '2017-02-22 05:41:16', NULL),
(82, '5c25de98ee8b6af4be83bdaff3e2b55d', '44', 'Canon EOS 700D (EOS Rebel T5i / EOS Kiss X7i) with Canon EF-S 18-135mm f/3.5-5.6 IS STM', 50000, 1, 'images/product/0e5c80d581.png', '2017-02-26 06:42:29', NULL),
(83, '24b3a3ac9d9e23c9ce072e50ffbaad7a', '135', 'Canon EF-S 55-250mm f/4-5.6 IS II Lens', 8000, 1, 'images/product/dfbd294cde.jpg', '2017-02-27 08:57:34', NULL),
(84, 'ea15acc5fb7527e87ba4f775af45eaf1', '135', 'Canon EF-S 55-250mm f/4-5.6 IS II Lens', 8000, 1, 'images/product/dfbd294cde.jpg', '2017-02-27 09:43:24', NULL),
(86, '0f62c56f8ec129cc50ec6f7b19483527', '134', 'Panasonic HC-X1000 4K DCI/Ultra HD/Full HD Camcorder', 190000, 1, 'images/product/e3061cd276.jpg', '2017-03-01 12:36:24', NULL),
(89, '18d07fdd81443399cc30421eadfa55f4', '38', 'Canon EOS 1300D DSLR Camera with EF-S18-55 III', 29500, 1, 'images/product/9f21bc8f3d.jpg', '2017-03-07 09:26:31', NULL),
(91, 'c902a85748e4dc019967e64a6ec98c9f', '89', 'Sony HXR-MC2500 Shoulder Mount AVCHD Camcorder', 88000, 1, 'images/product/e71d1ec5e3.jpg', '2017-03-07 06:45:27', NULL),
(94, '5b0402260256297b0699362019395c37', '33', 'Canon EOS 80D DSLR Camera with 18-135mm USM Lens', 96000, 1, 'images/product/005b89c62a.jpg', '2017-03-14 11:30:05', NULL),
(96, 'ba054a8935fdf4a9d8056f4ecc37d346', '94', 'Panasonic HC-MDH2 AVCHD Camcorder PAL', 69000, 1, 'images/product/de4c8601e0.jpg', '2017-03-25 03:01:34', NULL),
(100, '77c2a2c5ae57961ccd944d680801801f', '111', 'Sony HDR-CX405 HD Handycam', 18300, 1, 'images/product/2aa490f8b9.jpg', '2017-03-29 01:01:23', NULL),
(102, 'b1628a8e93c0199ba99ac4fd4342ceda', '47', 'Canon EOS 5D Mark III DSLR Camera with 24-105mm Lens', 208000, 1, 'images/product/99bfc3cbca.jpg', '2017-03-30 02:06:55', NULL),
(107, '2d9bfd2c03a53ad9dfcd974e095a531b', '116', 'Nikon SB-5000 AF Speedlight', 36000, 1, 'images/product/266b3f637b.jpg', '2017-04-08 06:27:12', NULL),
(109, '55dfd6f0634be9ce59486cfc4111ed1b', '89', 'Sony HXR-MC2500 Shoulder Mount AVCHD Camcorder', 87000, 1, 'images/product/e71d1ec5e3.jpg', '2017-04-12 04:14:40', NULL),
(112, 'bc1ade5295ba2de08b6743fe067c4908', '70', 'Jowepro Model BP V10', 600, 1, 'images/product/c01aef0056.jpg', '2017-04-18 10:42:35', NULL),
(113, 'bc1ade5295ba2de08b6743fe067c4908', '79', 'Canon EF 50mm f/1.8 STM Lens', 8300, 1, 'images/product/540cfa644d.jpg', '2017-04-18 10:46:10', NULL),
(114, '76ad126bade6f30e573da1fa4694f166', '33', 'Canon EOS 80D DSLR Camera with 18-135mm USM Lens', 96000, 1, 'images/product/005b89c62a.jpg', '2017-04-18 08:55:14', NULL),
(116, 'b70ed80e289c3872f6615819796293a7', '96', 'Nikon D7200 DSLR Camera kit 18-140mm&nbsp;', 81000, 1, 'images/product/785cc39718.png', '2017-04-23 05:45:18', NULL),
(118, '50a6626561d5928a1b6669fe129a9020', '96', 'Nikon D7200 DSLR Camera kit 18-140mm&nbsp;', 81000, 0, 'images/product/785cc39718.png', '2017-05-06 01:21:20', NULL),
(120, '3e51d8897ad5f1fe6a585d6063781df3', '96', 'Nikon D7200 DSLR Camera kit 18-140mm&nbsp;', 81000, 1, 'images/product/785cc39718.png', '2017-05-13 03:16:30', NULL),
(122, '1dd3fb0896aa154b6898b14d5d5a6d4c', '204', 'Sony HDR-CX405 HD Handycam', 18000, 1, 'images/product/d6042a4ca0.jpg', '2017-05-23 04:28:36', NULL),
(126, '02eb56ff08cbb6387bbb39b668643936', '94', 'Panasonic HC-MDH2 AVCHD Camcorder PAL', 67000, 1, 'images/product/de4c8601e0.jpg', '2017-07-09 03:38:35', NULL),
(127, '29d1c5427021c9a3f0c0af23b46daf5f', '205', 'Sony PXW-X70 Professional XDCAM Compact Camcorder', 160000, 1, 'images/product/e362e5b6f0.jpg', '2017-07-11 12:37:12', NULL),
(128, 'adfdd154fde15a8e9ecd88a99be01c5d', '199', 'Yongnuo YN560-III Speedlite', 4000, 1, 'images/product/5e84ba9057.jpg', '2017-07-13 01:54:18', NULL),
(129, '7142b546a69aaef1ba019b3ff9a7cd78', '119', 'Nikon D5300  with lens 18-55mm', 39000, 1, 'images/product/902390f925.jpg', '2017-07-19 02:09:28', NULL),
(130, 'fe8e84c6ecfcc747ca5003801b4a3dcd', '83', 'Panasonic HD Camcorder HC-PV100', 135000, 1, 'images/product/90f1998bdd.jpg', '2017-07-20 04:08:52', NULL),
(131, 'caa13aab97953f7a28e99c7ba2877bed', '44', 'Canon EOS 700D (EOS Rebel T5i / EOS Kiss X7i) with Canon EF-S 18-135mm f/3.5-5.6 IS STM', 50000, 1, 'images/product/0e5c80d581.png', '2017-07-24 05:56:45', NULL),
(132, 'd4f2a878fda3d18ec84bd3c06c1528ff', '199', 'Yongnuo YN560-III Speedlite', 4000, 100, 'images/product/5e84ba9057.jpg', '2017-07-26 05:11:12', NULL),
(133, '63cca142b7a4b017e414c8441be7507c', '104', 'Sony KLV40R352D 40 (102 cm) Full HD LED TV', 30000, 1, 'images/product/07a548a5b1.jpg', '2017-08-09 01:39:05', NULL),
(134, '747d6172d163f9ecaa5a1309f5e738d0', '41', 'Canon EOS 6D DSLR Camera with 24-105mm f/4L Lens', 142000, 1, 'images/product/4ec8d9deaf.jpg', '2017-08-13 06:30:43', NULL),
(136, '026e13d7dcc3735367289c4987813294', '204', 'Sony HDR-CX405 HD Handycam', 18000, 1, 'images/product/d6042a4ca0.jpg', '2017-08-16 04:16:56', NULL),
(139, 'af4fd1837e2a817331de6566ba335d1d', '38', 'Canon EOS 1300D DSLR Camera with EF-S18-55 is ii', 28500, 1, 'images/product/9f21bc8f3d.jpg', '2017-08-24 08:26:51', NULL),
(140, '3de58097635ee7092c232c5c7738e41b', '224', 'Panasonic Lumix DMC-FZ2500 Digital Camera', 93000, 1, 'images/product/4b72a70e50.jpg', '2017-08-24 10:52:58', NULL),
(141, 'e0cae7fd7384d5b1170a1912006d121a', '61', 'Canon EOS 70D DSLR Camera (Body Only)', 61000, 1, 'images/product/e5b30a7128.jpg', '2017-08-29 01:29:49', NULL),
(142, '23385154af4eb7edee253cb9d6cca9f9', '89', 'Sony HXR-MC2500 Shoulder Mount AVCHD Camcorder', 87000, 1, 'images/product/e71d1ec5e3.jpg', '2017-08-31 11:23:26', NULL),
(143, '52209342a0fdfb8a67bb5cae0a3a6b98', '219', 'GoPro HERO5 Black', 31000, 1, 'images/product/1bf84f72fc.jpg', '2017-09-02 03:05:37', NULL),
(144, '70399fcfc1162866733f9775f87da314', '90', 'Sony HXR-NX100 Full HD NXCAM Camcorder', 143000, 1, 'images/product/c9f30e70ba.png', '2017-09-06 05:44:30', NULL),
(145, 'p8i31ucvc4c63s78k3tvhumcd1', '196', 'JYC Camera professional LCD Screen Protector  for Nikon D7000', 300, 1, 'images/product/a084e88cfe.jpg', '2021-09-13 11:14:12', NULL),
(146, 'p8i31ucvc4c63s78k3tvhumcd1', '199', 'Yongnuo YN560-III Speedlite', 4000, 1, 'images/product/5e84ba9057.jpg', '2021-09-13 11:20:17', NULL),
(147, 'ppr9srq8j6me37pjvb9vigslb2', '92', 'iPhone 7 Plus Jet Black', 84000, 9, 'images/product/c6ca5b1744.jpg', '2021-09-13 12:32:54', '2021-09-13 12:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `categoryName` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `categoryName`, `dateTime`, `updateDateTime`) VALUES
(17, 'Womens Fashion', '2021-09-13 12:03:07', '2021-09-13 12:04:20'),
(16, 'Computer', '2021-09-13 12:02:32', NULL),
(14, 'Mans Fashion', '2021-09-13 12:01:39', '2021-09-13 12:04:28'),
(8, 'Accessories', '2016-12-26 07:16:17', '2016-12-28 09:52:21'),
(9, 'Electronics', '2016-12-26 07:48:50', '2016-12-27 01:40:07'),
(10, 'Lighting &amp; Studio', '2016-12-30 11:32:01', NULL),
(12, 'Drone', '2017-08-20 04:57:46', NULL),
(15, 'Health and Beauty', '2021-09-13 12:02:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactId` int(11) NOT NULL,
  `firstName` varchar(1000) DEFAULT NULL,
  `lastName` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `contact` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactId`, `firstName`, `lastName`, `email`, `contact`, `message`, `dateTime`, `status`) VALUES
(8, 'Subhashish', 'Das Rana', 'subhashish.rana@isdbd.org', '8801833317784', 'Need Price for Sony PXW-X180 Professional video camera.', '2017-05-15 10:52:56', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `crId` int(11) NOT NULL,
  `text` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`crId`, `text`, `dateTime`, `updateDateTime`) VALUES
(1, 'demo.com All Rights Reserved', NULL, '2021-09-13 11:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `logoId` int(11) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`logoId`, `logo`, `dateTime`, `updateDateTime`) VALUES
(1, 'images/logo/3e3ecb8556.png', NULL, '2021-09-13 11:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `sessionId` varchar(1000) DEFAULT NULL,
  `productId` varchar(1000) DEFAULT NULL,
  `productName` varchar(1000) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `customerName` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `contact` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `sessionId`, `productId`, `productName`, `price`, `quantity`, `vat`, `discount`, `image`, `customerName`, `email`, `contact`, `address`, `dateTime`) VALUES
(13, '76db41fb9e71f0e28e7ad1bc3f89ff88', '96', 'Nikon D7200 DSLR Camera kit 18-140mm&nbsp;', 81000, 1, NULL, NULL, 'images/product/785cc39718.png', 'Shazzed hossain sohel', 'Shazzedhossain@gmail.com', '01715247601', 'SHAWON  VIDEO\r\n126/1, North Mugda para,   DHAKA', '2017-01-28 05:09:28'),
(43, 'd3ca463790347b4fce4f9932ae2f8dde', '110', 'Simpex 99 Monopod &nbsp;(Black, Supports Up to 10000 g)', 8000, 1, NULL, NULL, 'images/product/ece9ce3e71.jpg', 'Md. Sohagh', 'mdsohagh912@gmail.com', '01827411366', 'Moddom azam nagar,hinguli,jorargong,chittagong', '2017-02-25 03:26:30'),
(44, '9fd87760ef8309f4207ee1e7abe8d60e', '21', 'Libec TH-650HD Head/Tripod', 14000, 1, NULL, NULL, 'images/product/57c1e7b8d3.jpg', 'Md Anwarul Islam', 'shishir.shifat@gmail.com', '01822811113', 'dulalpur, brahmanpara, comilla.', '2017-02-28 01:15:48'),
(50, '466f40435bb151afba8f8806382d04bc', '97', 'Nikon D5500 DSLR Camera with lens 18-55mm', 47000, 1, NULL, NULL, 'images/product/5cb83c8851.png', 'Tausif Ahmed Munna', 'munnatausifahmed@gmail.com', '01795286063', 'jahangirabad cantonment,Bogra,Bangladesh', '2017-03-28 07:08:05'),
(64, 'b2d0f567ba7d533e82cc649a361b2cfb', '167', 'Canon LC-E10C Battery Charger For Canon Genuine LP-E10', 400, 1, NULL, NULL, 'images/product/0a290d37a1.jpg', 'MD HOSSAN SANY', 'mdhossansany2000@gmail.com', '01926219296', 'MUNSHIGONJ SADAR', '2017-08-16 03:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `pId` int(11) NOT NULL,
  `pageName` varchar(100) DEFAULT NULL,
  `pageHeading` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`pId`, `pageName`, `pageHeading`, `description`, `image`, `dateTime`, `updateDateTime`) VALUES
(2, 'about', 'Welcome demo e-commerce', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'images/page/17e3db163c.png', '2016-12-26 07:06:18', '2016-12-29 10:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(200) DEFAULT NULL,
  `catId` varchar(200) DEFAULT NULL,
  `brandId` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `description` varchar(15000) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `type`, `price`, `discount`, `description`, `image`, `dateTime`, `updateDateTime`) VALUES
(21, 'Libec TH-650HD Head/Tripod', '8', '23', 'featured', 14000, 0, '<p><span style=\"color:#666699\"><strong><span style=\"font-size:24px\">Libec&nbsp;TH-650HD Head/Tripod with Carrying Case&nbsp;</span></strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">PRODUCT HIGHLIGHTS</span></p>\r\n\r\n<ul>\r\n	<li>Complete Tripod Kit</li>\r\n	<li>Aluminum Construction</li>\r\n	<li>Supports Up to 6.5 lb (3.0 kg)</li>\r\n	<li>59&quot; Maximum Height</li>\r\n	<li>Head with Spring-Loaded Counter Balance</li>\r\n	<li>65mm Leveling Ball</li>\r\n	<li>Sliding Quick Release Plate</li>\r\n	<li>Two-Stage Leg Design with Built-in Brace</li>\r\n	<li>Spiked Rubber Feet</li>\r\n	<li>Carrying Case Included</li>\r\n</ul>\r\n', 'images/product/57c1e7b8d3.jpg', '2016-12-27 05:57:31', '2017-01-01 11:32:43'),
(23, 'Canon LP-E6N Lithium-Ion Battery', '8', '24', 'featured', 1100, 0, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"color:#0000cd\"><span style=\"font-size:20px\"> &nbsp;Canon&nbsp;LP-E6N Lithium-Ion Battery Pack (7.2V, 1865mAh)</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PRODUCT HIGHLIGHTS</p>\r\n\r\n<ul>\r\n	<li>&nbsp;Compatible with Canon EOS 7D Mark II, 7D, 5D Mark II, 5D Mark III, 5DS, 5DS R, 60D, 60Da, 70D, and 6D Cameras</li>\r\n</ul>\r\n', 'images/product/b9648b9c28.jpg', '2016-12-27 07:46:10', '2017-01-01 11:30:12'),
(24, 'Canon LP-E6N Lithium-Ion Battery (Original)', '8', '24', 'featured', 5500, 0, '<p><span style=\"font-size:20px\"><span style=\"color:#ff0000\"><strong>Canon</strong></span></span><span style=\"color:#666699\"><strong><span style=\"font-size:18px\">&nbsp;LP-E6N Lithium-Ion Battery Pack (7.2V, 1865mAh) </span><span style=\"font-size:26px\">original</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>PRODUCT HIGHLIGHTS</strong></p>\r\n\r\n<ul>\r\n	<li>Compatible with Canon EOS 7D Mark II, 7D, 5D Mark II, 5D Mark III, 5DS, 5DS R, 60D, 60Da, 70D, and 6D Cameras</li>\r\n</ul>\r\n', 'images/product/a1e6c422ae.jpg', '2016-12-27 08:06:06', '2017-01-01 11:27:46'),
(92, 'iPhone 7 Plus Jet Black', '9', '19', 'popular', 84000, 0, '<h1><a href=\"https://www.google.com/url?sa=t&amp;rct=j&amp;q=&amp;esrc=s&amp;source=web&amp;cd=8&amp;cad=rja&amp;uact=8&amp;sqi=2&amp;ved=0ahUKEwjjs5T9jKHRAhVGNY8KHYm2CDgQtwIIPjAH&amp;url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DpCegl1K7m6M&amp;usg=AFQjCNEJc-Op0srsOMvMOHk-w5qBv-tKcg&amp;sig2=yOLpvTBRP-uWWacDa4JUlA&amp;bvm=bv.142059868,d.c2I\"><span style=\"color:#000000\">iPhone 7 Plus Jet Black</span></a><span style=\"color:#000000\">&nbsp; 128GB</span></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>All-new dual 12 MP cameras. The brightest, most colorful iPhone display ever. The fastest performance and best battery life in an iPhone. And stereo speakers. Every bit as powerful as it looks&mdash;this is iPhone 7 Plus.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/product/c6ca5b1744.jpg', '2017-01-01 08:05:41', NULL),
(225, 'Air Mac New', '16', '62', 'recent', 123456, 0, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 'images/product/512f1cad63.jpg', '2021-09-13 12:15:34', NULL),
(97, 'Nikon D5500 DSLR Camera with lens 18-55mm', '3', '2', 'popular', 47000, 0, '<h1><span style=\"color:#000080\">Nikon D5500 DSLR Camera with lens 18-55mm</span></h1>\r\n\r\n<h2><br />\r\nPRODUCT HIGHLIGHTS</h2>\r\n\r\n<p>24.2MP DX-Format CMOS Sensor<br />\r\nEXPEED 4 Image Processor<br />\r\nNo Optical Low-Pass Filter<br />\r\n3.2&quot; 1,037k-Dot Vari-Angle Touchscreen<br />\r\nFull HD 1080p Video Recording at 60 fps<br />\r\nMulti-CAM 4800DX 39-Point AF Sensor<br />\r\nISO 100-25600<br />\r\n5 fps Shooting at Full Resolution<br />\r\nBuilt-In Wi-Fi Connectivity<br />\r\n2,016-Pixel RGB Sensor Exposure Metering</p>\r\n\r\n<h3><br />\r\n<strong>Imaging</strong></h3>\r\n\r\n<p>Lens Mount&nbsp;&nbsp; &nbsp;Nikon F<br />\r\nCamera Format&nbsp;&nbsp; &nbsp;DX / (1.5x Crop Factor)<br />\r\nPixels&nbsp;&nbsp; &nbsp;Actual: 24.78 Megapixel<br />\r\nEffective: 24.2 Megapixel<br />\r\nMax Resolution&nbsp;&nbsp; &nbsp;24 MP: 6000 x 4000<br />\r\nAspect Ratio&nbsp;&nbsp; &nbsp;3:2<br />\r\nSensor Type / Size&nbsp;&nbsp; &nbsp;CMOS, 23.5 x 15.6 mm<br />\r\nFile Formats&nbsp;&nbsp; &nbsp;Still Images: JPEG, RAW<br />\r\nMovies: MOV<br />\r\nAudio: Linear PCM<br />\r\nBit Depth&nbsp;&nbsp; &nbsp;14-bit<br />\r\nDust Reduction System&nbsp;&nbsp; &nbsp;Yes<br />\r\nMemory Card Type&nbsp;&nbsp; &nbsp;SD<br />\r\nSDHC<br />\r\nSDXC</p>\r\n\r\n<h3><br />\r\n<strong>Focus Control</strong></h3>\r\n\r\n<p><br />\r\nFocus Type&nbsp;&nbsp; &nbsp;Auto &amp; Manual<br />\r\nFocus Mode&nbsp;&nbsp; &nbsp;Continuous-servo AF (C), Manual Focus (M), Single-servo AF (S)<br />\r\nAutofocus Points&nbsp;&nbsp; &nbsp;Phase Detection: 39, 9 cross-type</p>\r\n\r\n<h3><strong>Viewfinder/Display</strong></h3>\r\n\r\n<p>Viewfinder Type&nbsp;&nbsp; &nbsp;Pentamirror<br />\r\nViewfinder Coverage&nbsp;&nbsp; &nbsp;95%<br />\r\nViewfinder Magnification&nbsp;&nbsp; &nbsp;Approx. 0.82x<br />\r\nDiopter Adjustment&nbsp;&nbsp; &nbsp;- 1.7 to +1 m<br />\r\nDisplay Screen&nbsp;&nbsp; &nbsp;3.2&quot; Rear Touchscreen Swivel &nbsp;LCD (1,037,000)<br />\r\nScreen Coverage&nbsp;&nbsp; &nbsp;100%<br />\r\nDiagonal Angle of View&nbsp;&nbsp; &nbsp;170.0&deg;</p>\r\n\r\n<h3><br />\r\n<strong>Exposure Control</strong></h3>\r\n\r\n<p>ISO Sensitivity&nbsp;&nbsp; &nbsp;Auto, 100-25600 (Extended Mode: )<br />\r\nShutter&nbsp;&nbsp; &nbsp;Type: Electronic &amp; Mechanical<br />\r\nSpeed: 30 - 1/4000 second, &nbsp;Bulb Mode<br />\r\nRemote Control&nbsp;&nbsp; &nbsp;MC-DC2 (Optional)<br />\r\nMirror Lock-Up&nbsp;&nbsp; &nbsp;Yes<br />\r\nMetering Method&nbsp;&nbsp; &nbsp;3D Color Matrix Metering, Center-weighted average metering, Spot metering<br />\r\nExposure Modes&nbsp;&nbsp; &nbsp;Modes: Aperture Priority, Auto, Manual, Programmed Auto, Scene Modes, Shutter Priority<br />\r\nMetering Range: EV 0.0 - EV 20.0<br />\r\nCompensation: -5 EV to +5 EV (in 1/3 or 1/2 EV steps)<br />\r\nWhite Balance Modes&nbsp;&nbsp; &nbsp;Auto, Cloudy, Direct Sunlight, Flash, Fluorescent, Incandescent, Preset Manual, Shade</p>\r\n\r\n<h3><br />\r\n<strong>Flash</strong></h3>\r\n\r\n<p>Flash Modes&nbsp;&nbsp; &nbsp;Auto<br />\r\nAuto/Red-eye Reduction<br />\r\nFill-in<br />\r\nOff<br />\r\nRear Curtain/Slow Sync<br />\r\nRear Sync<br />\r\nRed-eye Reduction<br />\r\nSlow Sync<br />\r\nSlow Sync/Red-eye Reduction</p>\r\n\r\n<p>Flash<br />\r\nFlash Modes&nbsp;&nbsp; &nbsp;Auto<br />\r\nAuto/Red-eye Reduction<br />\r\nFill-in<br />\r\nOff<br />\r\nRear Curtain/Slow Sync<br />\r\nRear Sync<br />\r\nRed-eye Reduction<br />\r\nSlow Sync<br />\r\nSlow Sync/Red-eye Reduction<br />\r\nBuilt-in Flash&nbsp;&nbsp; &nbsp;Yes<br />\r\nGuide No.&nbsp;&nbsp; &nbsp;39&#39; (11.89 m) ISO100&nbsp;<br />\r\nMax Sync Speed&nbsp;&nbsp; &nbsp;1 / 200 seconds<br />\r\nFlash Compensation&nbsp;&nbsp; &nbsp;-3 EV to +1 EV (in 1/3 or 1/2 EV steps)<br />\r\nDedicated Flash System&nbsp;&nbsp; &nbsp;iTTL<br />\r\nExternal Flash Connection&nbsp;&nbsp; &nbsp;Hot Shoe</p>\r\n\r\n<p><br />\r\nFlash<br />\r\nFlash Modes&nbsp;&nbsp; &nbsp;Auto<br />\r\nAuto/Red-eye Reduction<br />\r\nFill-in<br />\r\nOff<br />\r\nRear Curtain/Slow Sync<br />\r\nRear Sync<br />\r\nRed-eye Reduction<br />\r\nSlow Sync<br />\r\nSlow Sync/Red-eye Reduction<br />\r\nBuilt-in Flash&nbsp;&nbsp; &nbsp;Yes<br />\r\nGuide No.&nbsp;&nbsp; &nbsp;39&#39; (11.89 m) ISO100&nbsp;<br />\r\nMax Sync Speed&nbsp;&nbsp; &nbsp;1 / 200 seconds<br />\r\nFlash Compensation&nbsp;&nbsp; &nbsp;-3 EV to +1 EV (in 1/3 or 1/2 EV steps)<br />\r\nDedicated Flash System&nbsp;&nbsp; &nbsp;iTTL<br />\r\nExternal Flash Connection&nbsp;&nbsp; &nbsp;Hot Shoe</p>\r\n\r\n<h3><br />\r\n<strong>AV Recording</strong></h3>\r\n\r\n<p><br />\r\nVideo Recording&nbsp;&nbsp; &nbsp;Yes<br />\r\nFile Size&nbsp;&nbsp; &nbsp;1920 x 1080p (Full HD)<br />\r\n1280 x 720p (HD)<br />\r\n640 x 424p (SD)<br />\r\nAspect Ratio&nbsp;&nbsp; &nbsp;16:9<br />\r\nFrame Rate&nbsp;&nbsp; &nbsp;@ 1920 x 1080: 60 fps, 50 fps, 30 fps, 25 fps, 24 fps<br />\r\n@ 1280 x 720: 60 fps, 50 fps<br />\r\n@ 640 x 424: 30 fps, 25 fps<br />\r\nExposure Control&nbsp;&nbsp; &nbsp;Auto<br />\r\nManual<br />\r\nISO Sensitivity&nbsp;&nbsp; &nbsp;100 - 25600<br />\r\nFocus&nbsp;&nbsp; &nbsp;Auto<br />\r\nManual<br />\r\nContinuous Auto<br />\r\nVideo Clip Length&nbsp;&nbsp; &nbsp;1920 x 1080<br />\r\n@ 60 fps: 20 min.<br />\r\n@ 30 fps: 29 min.<br />\r\nAudio Recording&nbsp;&nbsp', 'images/product/5cb83c8851.png', '2017-01-02 12:47:51', NULL),
(98, 'Libec LX7 M Tripod With Pan and Tilt Fluid Head and Mid-Level Spreader', '8', '23', 'popular', 47000, 0, '<h1><span style=\"color:#000080\">Libec LX7 M Tripod With Pan and Tilt Fluid Head and Mid-Level Spreader</span></h1>\r\n\r\n<h2><strong>PRODUCT HIGHLIGHTS</strong></h2>\r\n\r\n<p>Aluminum Tripod<br />\r\nPan and Tilt Fluid Head<br />\r\nSliding Plate Included<br />\r\nSuper Torque System<br />\r\nLoad Capacity of 17.5 lb<br />\r\nMaximum Height of 65.4&quot;<br />\r\nOutstanding Rigidity<br />\r\nMid-Level Spreader Included<br />\r\nTripod Case Included</p>\r\n\r\n<h3><br />\r\n<strong>General</strong></h3>\r\n\r\n<p>Load Capacity&nbsp;&nbsp; &nbsp;17.5 lb (8 kg)<br />\r\nMaximum Height&nbsp;&nbsp; &nbsp;65.4&quot; (166 cm)<br />\r\nMaximum Height w/o Column Extended&nbsp;&nbsp; &nbsp;N/A<br />\r\nMinimum Height&nbsp;&nbsp; &nbsp;32&quot; (81 cm)<br />\r\nFolded Length&nbsp;&nbsp; &nbsp;Not specified by manufacturer<br />\r\nLeveling Bubble/Illuminated&nbsp;&nbsp; &nbsp;Not specified by manufacturer<br />\r\nWeight&nbsp;&nbsp; &nbsp;11.4 lb (5.2 kg)</p>\r\n\r\n<h3><strong>Head</strong></h3>\r\n\r\n<p>Counter Balance System&nbsp;&nbsp; &nbsp;Fixed<br />\r\nQuick Release/Wedge Plate&nbsp;&nbsp; &nbsp;Yes<br />\r\nBalance Plate&nbsp;&nbsp; &nbsp;Not specified by manufacturer<br />\r\nTilt Drag&nbsp;&nbsp; &nbsp;Fixed<br />\r\nTilt Range&nbsp;&nbsp; &nbsp;+90/-80&deg;<br />\r\nPan Range&nbsp;&nbsp; &nbsp;360&deg;</p>\r\n\r\n<p><br />\r\nLegs</p>\r\n\r\n<p>Material&nbsp;&nbsp; &nbsp;Aluminum<br />\r\nHead Attachment Fitting&nbsp;&nbsp; &nbsp;75 mm ball, plate with 1/4&quot; screw with video pin<br />\r\nLeg Stages/Sections&nbsp;&nbsp; &nbsp;2-stage<br />\r\nLeg Lock Type&nbsp;&nbsp; &nbsp;Not specified by manufacturer<br />\r\nIndependent Leg Spread&nbsp;&nbsp; &nbsp;No<br />\r\nSpiked/Retractable Feet&nbsp;&nbsp; &nbsp;No, rubber<br />\r\nCenter Brace&nbsp;&nbsp; &nbsp;Mid-level spreader</p>\r\n\r\n<h3><strong>Packaging Info</strong></h3>\r\n\r\n<p>Package Weight&nbsp;&nbsp; &nbsp;18.5 lb<br />\r\nBox Dimensions (LxWxH)&nbsp;&nbsp; &nbsp;36.0 x 11.0 x 10.0&quot;</p>\r\n', 'images/product/41511ac861.jpg', '2017-01-02 02:30:50', NULL),
(106, 'Canon LC-E6 Charger for LP-E6 Battery Pack', '8', '24', 'featured', 500, 0, '<h1><span style=\"color:#000080\">Canon LC-E6 Charger for LP-E6 Battery Pack</span></h1>\r\n\r\n<h2>PRODUCT HIGHLIGHTS</h2>\r\n\r\n<p>Use with Canon EOS 5D Mark II, 5D Mark III, 7D &amp; 60D</p>\r\n\r\n<p>Power Requirements&nbsp;&nbsp; &nbsp;100-240 VAC, 0.21-0.115 A</p>\r\n\r\n<p>Packaging Info</p>\r\n\r\n<p><br />\r\nPackage Weight&nbsp;&nbsp; &nbsp;0.35 lb<br />\r\nBox Dimensions (LxWxH)&nbsp;&nbsp; &nbsp;4.5 x 3.0 x 1.7&quot;</p>\r\n', 'images/product/86e9536a05.jpg', '2017-01-02 06:49:00', NULL),
(110, 'Simpex 99 Monopod &nbsp;(Black, Supports Up to 10000 g)', '8', '23', 'popular', 8000, 0, '<h1><span style=\"color:#000080\">Simpex 99 Monopod &nbsp;(Black, Supports Up to 10000 g)</span></h1>\r\n\r\n<h2><br />\r\n<strong>Features</strong></h2>\r\n\r\n<p><br />\r\nDesigned For: DSLR/SLR Camera<br />\r\nLoad Capacity: 10000 g<br />\r\nHeight Range: 708 mm - 1780 mm</p>\r\n', 'images/product/ece9ce3e71.jpg', '2017-01-03 12:28:00', NULL),
(143, 'Canon LC-E8E Charger for LP-E8 Battery Pack', '8', '24', 'popular', 500, 0, '<h1><span style=\"color:#0000cd\">Canon LC-E8E Charger for LP-E8 Battery Pack&nbsp;</span></h1>\r\n\r\n<p>Input Voltage&nbsp;&nbsp; &nbsp;100-240 VAC<br />\r\nPower (Voltage/Hz/Watts)&nbsp;&nbsp; &nbsp;50/60 Hz</p>\r\n\r\n<h3><strong>Packaging Info</strong></h3>\r\n\r\n<p><br />\r\nPackage Weight&nbsp;&nbsp; &nbsp;0.58 lb<br />\r\nBox Dimensions (LxWxH)&nbsp;&nbsp; &nbsp;7.0 x 3.1 x 2.2&quot;</p>\r\n', 'images/product/0e286ab211.jpg', '2017-02-22 05:21:35', NULL),
(144, 'Nikon D7100 DSLR Camera with 18-140mm Lens&nbsp;', '3', '2', 'recent', 66000, 0, '<h1><span style=\"color:#0000cd\">Nikon D7100 DSLR Camera with 18-140mm Lens&nbsp;</span></h1>\r\n\r\n<h1><br />\r\n<strong>PRODUCT HIGHLIGHTS</strong></h1>\r\n\r\n<p><br />\r\n24.1 MP DX-Format CMOS Sensor<br />\r\nEXPEED 3 Image Processor<br />\r\nNo Optical Low-Pass Filter<br />\r\n3.2&quot; 1,229k-Dot LCD Monitor<br />\r\nFull HD 1080i Video Recording at 60 fps<br />\r\nMulti-CAM 3500DX 51-Point AF Sensor<br />\r\nNative ISO 6400, Extended to ISO 25600<br />\r\n6 fps Shooting for 100 Shots<br />\r\n2,016-Pixel RGB Sensor Exposure Metering<br />\r\nDX NIKKOR 18-140mm f/3.5-5.6G ED VR Lens</p>\r\n\r\n<h3><br />\r\n<strong>Imaging</strong></h3>\r\n\r\n<p><br />\r\nLens Mount&nbsp;&nbsp; &nbsp;Nikon F<br />\r\nCamera Format&nbsp;&nbsp; &nbsp;DX / (1.5x Crop Factor)<br />\r\nPixels&nbsp;&nbsp; &nbsp;Actual: 24.71 Megapixel<br />\r\nEffective: 24.1 Megapixel<br />\r\nMax Resolution&nbsp;&nbsp; &nbsp;24.1 MP: 6000 x 4000<br />\r\nAspect Ratio&nbsp;&nbsp; &nbsp;3:2, 16:9<br />\r\nSensor Type / Size&nbsp;&nbsp; &nbsp;CMOS, 23.5 x 15.6 mm<br />\r\nFile Formats&nbsp;&nbsp; &nbsp;Still Images: JPEG, RAW<br />\r\nMovies: MOV, MPEG-4 AVC/H.264<br />\r\nAudio: Linear PCM<br />\r\nBit Depth&nbsp;&nbsp; &nbsp;14-Bit<br />\r\nMemory Card Type&nbsp;&nbsp; &nbsp;SD<br />\r\nSDHC<br />\r\nSDXC<br />\r\nImage Stabilization&nbsp;&nbsp; &nbsp;None</p>\r\n\r\n<h3><br />\r\n<strong>Focus Control</strong></h3>\r\n\r\n<p><br />\r\nFocus Type&nbsp;&nbsp; &nbsp;Auto &amp; Manual<br />\r\nFocus Mode&nbsp;&nbsp; &nbsp;Continuous-Servo AF (C), Focus Lock AF Area Mode, Manual Focus (M), Single-servo AF (S)<br />\r\nAutofocus Points&nbsp;&nbsp; &nbsp;51</p>\r\n\r\n<p>Viewfinder/Display</p>\r\n\r\n<p><br />\r\nViewfinder Type&nbsp;&nbsp; &nbsp;Pentaprism<br />\r\nViewfinder Coverage&nbsp;&nbsp; &nbsp;100%<br />\r\nViewfinder Magnification&nbsp;&nbsp; &nbsp;Approx. 0.94x<br />\r\nDiopter Adjustment&nbsp;&nbsp; &nbsp;-2 to +1 m<br />\r\nDisplay Screen&nbsp;&nbsp; &nbsp;3.2&quot; Rear Screen Live Preview LCD (1,229,000)<br />\r\nScreen Coverage&nbsp;&nbsp; &nbsp;100%<br />\r\nDiagonal Angle of View&nbsp;&nbsp; &nbsp;170.0&deg;</p>\r\n\r\n<h3><strong>Exposure Control</strong></h3>\r\n\r\n<p><br />\r\nISO Sensitivity&nbsp;&nbsp; &nbsp;Auto, 100-6400 (Extended Mode: 12800-25600)<br />\r\nShutter&nbsp;&nbsp; &nbsp;Type: Electronic<br />\r\nSpeed: 30 - 1/8000 Seconds<br />\r\nRemote Control&nbsp;&nbsp; &nbsp;ML-L3 (Optional)<br />\r\nMirror Lock-Up&nbsp;&nbsp; &nbsp;Yes<br />\r\nMetering Method&nbsp;&nbsp; &nbsp;3D Color Matrix Metering, Center-Weighted Average Metering, Spot Metering<br />\r\nExposure Modes&nbsp;&nbsp; &nbsp;Modes: Aperture Priority, Auto, Bulb, Flash Off, Manual, Programmed Auto, Shutter Priority<br />\r\nCompensation: -5 EV to +5 EV (in 1/3 or 1/2 EV Steps)<br />\r\nWhite Balance Modes&nbsp;&nbsp; &nbsp;Auto, Cloudy, Daylight, Flash, Fluorescent, Fluorescent (Day White), Fluorescent (Natural White), Fluorescent (White), Fluorescent H, Incandescent, Kelvin, Preset Manual, Shade</p>\r\n\r\n<h3><br />\r\n<strong>Flash</strong></h3>\r\n\r\n<p><br />\r\nFlash Modes&nbsp;&nbsp; &nbsp;Auto<br />\r\nAuto/Red-Eye Reduction<br />\r\nFill-In<br />\r\nFirst-Curtain Sync<br />\r\nOff<br />\r\nRear Curtain/Slow Sync<br />\r\nRed-Eye Reduction<br />\r\nSecond-Curtain Sync<br />\r\nSlow Sync<br />\r\nSlow Sync/Red-Eye Reduction<br />\r\nBuilt-in Flash&nbsp;&nbsp; &nbsp;Yes<br />\r\nGuide No.&nbsp;&nbsp; &nbsp;39&#39; (11.89 m) ISO100&nbsp;<br />\r\nMax Sync Speed&nbsp;&nbsp; &nbsp;1 / 250 Second<br />\r\nFlash Compensation&nbsp;&nbsp; &nbsp;-3 EV to +1 EV (in 1/3 or 1/2 EV steps)<br />\r\nDedicated Flash System&nbsp;&nbsp; &nbsp;iTTL Remote Firing<br />\r\nExternal Flash Connection&nbsp;&nbsp; &nbsp;Hot Shoe</p>\r\n\r\n<h3><strong>AV Recording</strong></h3>\r\n\r\n<p><br />\r\nVideo Recording&nbsp;&nbsp; &nbsp;Yes, NTSC/PAL<br />\r\nFile Size&nbsp;&nbsp; &nbsp;1920 x 1080p (Full HD)<br />\r\n1920 x 1080i (Full HD)<br />\r\n1280 x 720p (HD)<br />\r\nAspect Ratio&nbsp;&nbsp; &nbsp;16:9<br />\r\nFrame Rate&nbsp;&nbsp; &nbsp;@ 1920 x 1080: 60 fps, 50 fps<br />\r\n@ 1920 x 1080: 30 fps, 25 fps, 24 fps<br />\r\n@ 1280 x 720: 60 fps, 50 fps<br />\r\nExposure Control&nbsp;&nbsp; &nbsp;Auto: Shutter Speed, Aperture, ISO<br />\r\nManual: Shutter Speed, Aperture, ISO<br />\r\nISO Sensitivity&nbsp;&nbsp; &nbsp;Auto, 100 - 6400, Expandable to 25600<br />\r\nExposure Compensation&nbsp;&nbsp; &nbsp;-5 EV to +5 EV (in 1/3 or 1/2 EV steps)<br />\r\nFocus&nbsp;&nbsp; &nbsp;Auto<br />\r\nManual<br />\r\nContinuous Auto<br />\r\nMax Video Clip Length&nbsp;&nbsp; &nbsp;1920 x 1080: 20 Minutes&nbsp;<br />\r\n1280 x 720: 29 Minutes, 59 Seconds&nbsp;<br />\r\nAudio Recording&nbsp;&nbsp; &nbsp;Optional External Mic:With Video (Stereo)</p>\r\n\r\n<h3><strong>Performance</strong></h3>\r\n\r\n<p><br />\r\nSelf Timer&nbsp;&nbsp; &nbsp;2 Seconds, 5 Seconds, 10 Seconds, 20 Seconds<br />\r\nNumber of Shots: 1 - 9<br />\r\nInterval Recording&nbsp;&nbsp; &nbsp;Yes<br />\r\nConnectivity&nbsp;&nbsp; &nbsp;1/8&quot; Microphone<br />\r\nHDMI C (Mini)<br />\r\nUSB 2.0<br />\r\nWi-Fi Capable&nbsp;&nbsp; &nbsp;Yes</p>\r\n\r\n<h3><strong>Power</strong></h3>\r\n\r\n<p><br />\r\nBattery&nbsp;&nbsp; &nbsp;1 x EN-EL15 Rechargeable Lithium-Ion Battery Pack<br />\r\nAC Power Adapter&nbsp;&nbsp; &nbsp;EH-5b (Optional)<br />\r\nOperating/Storage Temperature&nbsp;&nbsp; &nbsp;Operating<br />\r\n32 to 104&deg;F (0 to 40&deg;C)<br />\r\nHumidity: 0 - 85%</p>\r\n\r\n<h3><strong>Physical</strong></h3>\r\n\r\n<p>Dimensions (WxHxD)&nbsp;&nbsp; &nbsp;5.3 x 4.2 x 3.0&quot; / 135.5 x 106.5 x 76.0 mm<br />\r\nWeight&nbsp;&nbsp; &nbsp;1.49 lb / 675 g camera body only</p>\r\n\r\n<h3><br />\r\n<strong>Kit Lens</strong></h3>\r\n\r\n<p><br />\r\nFocal Length&nbsp;&nbsp; &nbsp;18 - 140mm<br />\r\nComparable 35mm Focal Length: 27 - 210 mm<br />\r\nAperture&nbsp;&nbsp; &nbsp;Maximum: f/3.5 - 5.6<br />\r\nMinimum: f/22 - 38<br />\r\nAngle of View&nbsp;&nbsp; &nbsp;76&deg; - 11&deg; 30&#39;<br />\r\nMinimum Focus Distance&nbsp;&nbsp; &nbsp;1.48&#39; (45.11 cm)<br />\r\nMagnification&nbsp;&nbsp; &nbsp;1.5x<br />\r\nMaximum Reproduction Ratio&nbsp;&nbsp; &nbsp;1:0<br />\r\nElements/Groups&nbsp;&nbsp; &nbsp;17/12<br />\r\nDiaphragm Blades&nbsp;&nbsp; &nbsp;7<br />\r\nAutofocus&nbsp;&nbsp; &nbsp;Yes<br />\r\nImage Stabilization&nbsp;&nbsp; &nbsp;Yes<br />\r\nFilter Thread&nbsp;&nbsp; &nbsp;Front: 67 mm<br />\r\nDimensions (DxL)&nbsp;&nbsp; &nbsp;Approx. 3.07 x 3.82&quot; (7.80 x 9.70 cm)<br />\r\nWeight&nbsp;&nbsp; &nbsp;17.3 oz (490 g)</p>\r\n\r\n<h3><strong>Packaging Info</strong></h3>\r\n\r\n<p>Package Weight&nbsp;&nbsp; &nbsp;7.15 lb<br />\r\nBox Dimensions (LxWxH)&nbsp;&nbsp; &nbsp;14.0 x 7.0 x 6.5&quot;<br />\r\n&nbsp;</p>\r\n', 'images/product/397fe15dbf.jpg', '2017-02-23 05:42:41', '2017-03-07 03:01:32'),
(155, 'Sony\'s NP-F970 Info-Lithium Battery Pack&nbsp;(6300mAh)', '8', '24', 'featured', 1800, 0, '<h1><strong>Sony&#39;s NP-F970 Info-Lithium Battery Pack</strong>&nbsp;(6300mAh)</h1>\r\n\r\n<p>Small and lightweight,&nbsp;<strong>Sony&#39;s NP-F970 Info-Lithium Battery Pack</strong>&nbsp;(6300mAh) provides the advantages of lithium-ion, meaning it can be charged or discharged at anytime without developing memory effect. This means the battery never loses its ability to hold a full charge. The NP-F970 displays remaining battery time on the LCD as well as in the viewfinder by continuously communicating with the camcorder. The battery lasts for up to 12 hours on a single full charge. Sony&#39;s Info-Lithium battery packs have a built-in micro processor that accurately calculates remaining battery life in minutes.</p>\r\n', 'images/product/12c5fb6915.jpg', '2017-04-05 08:51:18', NULL),
(157, 'Sony NP-FV100 Rechargeable Battery Pack', '8', '24', 'featured', 1100, 0, '<h1>Sony NP-FV100 Rechargeable Battery Pack</h1>\r\n\r\n<p><br />\r\nSony Branded Retail Package<br />\r\nMean out put 6.8V, 26.5 wh(3,900mAh)<br />\r\nCapacity: 26.5Wh(3,900mAh)<br />\r\nRealize faster charging with optional AC-VQV10 quick charger<br />\r\n&nbsp;</p>\r\n', 'images/product/410e1e50c9.jpg', '2017-04-06 01:00:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `title`, `description`, `image`, `dateTime`, `updateDateTime`) VALUES
(6, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy\r\n', 'images/slider/e4ff8cf83f.jpg', '2017-02-27 08:35:04', '2021-09-13 11:32:37'),
(7, 'Front View', 'Lorem Ipsum is simply dummy\r\n', 'images/slider/7e939c5b00.png', '2017-02-27 08:38:00', '2021-09-13 11:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `sLinkId` int(11) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `googlePlus` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`sLinkId`, `facebook`, `youtube`, `twitter`, `googlePlus`, `instagram`, `dateTime`, `updateDateTime`) VALUES
(1, '#', '#', '#', '#', '#', NULL, '2021-09-13 11:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_widget`
--

CREATE TABLE `tbl_widget` (
  `widgetId` int(11) NOT NULL,
  `iconName` varchar(1000) DEFAULT NULL,
  `widgetheading` varchar(1000) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `updateDateTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_widget`
--

INSERT INTO `tbl_widget` (`widgetId`, `iconName`, `widgetheading`, `content`, `dateTime`, `updateDateTime`) VALUES
(1, 'money', 'Online payments', 'We Save your Time', '2016-12-26 07:12:29', '2016-12-30 10:12:41'),
(2, 'car', 'Free Delivery', 'Free Delivery Services', '2016-12-26 07:13:46', '2016-12-30 10:10:47'),
(3, 'thumbs-o-up', 'Best Services', 'Customer satisfaction', '2016-12-30 10:05:07', '2017-08-02 11:05:27'),
(4, 'camera', 'Our products', 'We provides best products', '2016-12-30 10:07:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `categoryName` (`categoryName`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`crId`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`logoId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`pId`),
  ADD UNIQUE KEY `pageName` (`pageName`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`sLinkId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_widget`
--
ALTER TABLE `tbl_widget`
  ADD PRIMARY KEY (`widgetId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `crId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `logoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `sLinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_widget`
--
ALTER TABLE `tbl_widget`
  MODIFY `widgetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
