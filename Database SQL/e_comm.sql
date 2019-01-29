-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 01:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_comm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addtocart`
--

CREATE TABLE IF NOT EXISTS `tbl_addtocart` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_addtocart`
--

INSERT INTO `tbl_addtocart` (`id`, `product_id`, `session_id`, `quantity`, `date`) VALUES
(1, 32, '28beqsdfl09nu0j8kcqmvpjti5', '1', '2017-05-28'),
(2, 31, '28beqsdfl09nu0j8kcqmvpjti5', '1', '2017-05-28'),
(3, 21, '28beqsdfl09nu0j8kcqmvpjti5', '1', '2017-05-28'),
(4, 26, '28beqsdfl09nu0j8kcqmvpjti5', '1', '2017-05-28'),
(5, 27, '28beqsdfl09nu0j8kcqmvpjti5', '1', '2017-05-28'),
(6, 22, '28beqsdfl09nu0j8kcqmvpjti5', '3', '2017-05-28'),
(7, 31, '3rvcir6al2vis6n7luclqnf4t1', '1', '2017-05-29'),
(8, 0, 'd7mq6ntor892fo2j1prsn8bvr2', '1', '2017-05-29'),
(9, 22, 'd7mq6ntor892fo2j1prsn8bvr2', '4', '2017-05-29'),
(10, 23, 'd7mq6ntor892fo2j1prsn8bvr2', '1', '2017-05-29'),
(11, 21, 'd7mq6ntor892fo2j1prsn8bvr2', '1', '2017-05-29'),
(12, 26, 'd7mq6ntor892fo2j1prsn8bvr2', '1', '2017-05-29'),
(13, 28, 'd7mq6ntor892fo2j1prsn8bvr2', '4', '2017-05-29'),
(14, 22, '3rvcir6al2vis6n7luclqnf4t1', '1', '2017-05-29'),
(15, 22, 't5kvhe41ddvhbq3a1qrhl0g4q7', '1', '2017-06-01'),
(16, 32, 't5kvhe41ddvhbq3a1qrhl0g4q7', '2', '2017-06-01'),
(17, 21, 't5kvhe41ddvhbq3a1qrhl0g4q7', '1', '2017-06-01'),
(18, 28, '9ml16omcthpqr2ecarchbr8rk0', '7', '2017-06-03'),
(19, 23, '9ml16omcthpqr2ecarchbr8rk0', '22', '2017-06-03'),
(20, 22, '9ml16omcthpqr2ecarchbr8rk0', '14', '2017-06-03'),
(21, 24, '9ml16omcthpqr2ecarchbr8rk0', '17', '2017-06-03'),
(22, 25, '9ml16omcthpqr2ecarchbr8rk0', '1', '2017-06-03'),
(23, 29, '9ml16omcthpqr2ecarchbr8rk0', '1', '2017-06-03'),
(24, 20, '9ml16omcthpqr2ecarchbr8rk0', '2', '2017-06-03'),
(25, 31, '9ml16omcthpqr2ecarchbr8rk0', '1', '2017-06-03'),
(26, 27, '9ml16omcthpqr2ecarchbr8rk0', '3', '2017-06-03'),
(27, 21, '9ml16omcthpqr2ecarchbr8rk0', '6', '2017-06-03'),
(28, 32, '9ml16omcthpqr2ecarchbr8rk0', '16', '2017-06-03'),
(29, 26, '9ml16omcthpqr2ecarchbr8rk0', '1', '2017-06-03'),
(30, 4, '9ml16omcthpqr2ecarchbr8rk0', '1', '2017-06-03'),
(31, 15, 'p8ksh0nr7cvmheb85ck0vlu5f2', '1', '2017-06-03'),
(32, 3, '9ml16omcthpqr2ecarchbr8rk0', '1', '2017-06-03'),
(33, 2, 'iulcagu6n5cdb2lnrs6nsamo17', '1', '2017-06-03'),
(34, 8, 'iulcagu6n5cdb2lnrs6nsamo17', '1', '2017-06-04'),
(35, 9, 'iulcagu6n5cdb2lnrs6nsamo17', '1', '2017-06-04'),
(36, 3, 'nctocm180705fbtsiqs5n36vb2', '1', '2017-06-04'),
(37, 21, '262mjih9odoteuh9d2jgni6et3', '1', '2017-06-05'),
(38, 20, '262mjih9odoteuh9d2jgni6et3', '1', '2017-06-05'),
(39, 22, '262mjih9odoteuh9d2jgni6et3', '2', '2017-06-05'),
(40, 3, 'qaanqet24e1ejgcn8mb5v885s1', '1', '2017-06-06'),
(41, 3, 'r4hfu179tjhqi7s71hk99d1h54', '1', '2017-06-10'),
(42, 2, 'ln3hat2qfsec4jhdb964482b96', '1', '2017-06-10'),
(43, 5, 'ln3hat2qfsec4jhdb964482b96', '1', '2017-06-10'),
(44, 7, 'ln3hat2qfsec4jhdb964482b96', '1', '2017-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_account`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_account` (
`admn_srl_no` int(11) NOT NULL,
  `admn_id` int(11) NOT NULL,
  `admn_name` varchar(255) NOT NULL,
  `admn_mail` varchar(255) NOT NULL,
  `admn_phn` varchar(255) NOT NULL,
  `admn_u_name` varchar(255) NOT NULL,
  `admn_pwd` varchar(255) NOT NULL,
  `admn_usr_sts` varchar(1) NOT NULL,
  `admn_user_ip` varchar(255) NOT NULL,
  `admn_pre_address` varchar(255) NOT NULL,
  `admn_per_address` varchar(255) NOT NULL,
  `admn_gndr` varchar(255) NOT NULL,
  `admn_dstct` varchar(255) NOT NULL,
  `admn_cntry` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_all_orders` (
`all_o_id` int(11) NOT NULL,
  `all_o_name` varchar(255) NOT NULL,
  `all_o_number` varchar(255) NOT NULL,
  `all_o_description` text NOT NULL,
  `all_o_ttl_amount` varchar(255) NOT NULL,
  `all_o_image` varchar(255) NOT NULL,
  `all_o_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_all_orders`
--

INSERT INTO `tbl_all_orders` (`all_o_id`, `all_o_name`, `all_o_number`, `all_o_description`, `all_o_ttl_amount`, `all_o_image`, `all_o_date`) VALUES
(1, 'Banana', '32', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised', '560', 't1.jpg', '2017-05-17 03:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE IF NOT EXISTS `tbl_area` (
`area_id` int(11) NOT NULL,
  `area_district` varchar(60) NOT NULL,
  `area_country` varchar(60) NOT NULL,
  `area_road_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
`brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Bata'),
(2, 'Azad'),
(3, ' Oppo'),
(4, 'Bay'),
(5, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
`id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `cart_p_name` varchar(60) NOT NULL,
  `cart_p_image` varchar(32) NOT NULL,
  `cart_quantity` varchar(3) NOT NULL,
  `cart_line_total` varchar(4) NOT NULL,
  `cart_delivery_cost` varchar(4) NOT NULL,
  `cart_total_amount` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `cart_id`, `cart_p_name`, `cart_p_image`, `cart_quantity`, `cart_line_total`, `cart_delivery_cost`, `cart_total_amount`) VALUES
(3, 22, 'Multa', 'img/d79b9e4968.jpg', '15', '1200', '20', ''),
(5, 26, 'Pizza', 'img/625c6468ee.jpg', '1', '450', '', ''),
(6, 27, 'Mizan', 'img/9a6db85956.jpg', '1', '1500', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Mens Ware'),
(2, 'Womens Ware'),
(3, 'Kids Ware'),
(4, 'Bags'),
(5, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_dashboard`
--

CREATE TABLE IF NOT EXISTS `tbl_client_dashboard` (
`client_db_id` int(11) NOT NULL,
  `client_db_name` varchar(255) NOT NULL,
  `client_db_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client_dashboard`
--

INSERT INTO `tbl_client_dashboard` (`client_db_id`, `client_db_name`, `client_db_image`) VALUES
(1, 'Md. Muzammal Hossain', 'people1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cntry`
--

CREATE TABLE IF NOT EXISTS `tbl_cntry` (
`cntry_id` int(11) NOT NULL,
  `cntry_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cntry`
--

INSERT INTO `tbl_cntry` (`cntry_id`, `cntry_name`) VALUES
(1, 'Bangladesh'),
(2, 'Pakistan'),
(3, 'India'),
(4, 'Turky'),
(5, 'Canada'),
(6, 'Nedarland'),
(7, 'USA'),
(8, 'UAE'),
(9, 'Syria'),
(10, 'Russia'),
(11, 'Japan'),
(12, 'China'),
(13, 'England'),
(14, 'Qatar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `phone`, `subject`, `description`) VALUES
(1, 'md. Nurul Islam', 'coderssign@gmail.com', '0167104770', '', 'dfgvdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_acc`
--

CREATE TABLE IF NOT EXISTS `tbl_customer_acc` (
`cstmr_srl_no` int(11) NOT NULL,
  `cstmr_id` int(11) NOT NULL,
  `cstmr_name` varchar(255) NOT NULL,
  `cstmr_mail` varchar(255) NOT NULL,
  `cstmr_phn_no` varchar(255) NOT NULL,
  `cstmr_u_name` varchar(255) NOT NULL,
  `cstmr_u_pswd` varchar(255) NOT NULL,
  `cstmr_prsnt_address` varchar(255) NOT NULL,
  `cstmr_per_address` varchar(255) NOT NULL,
  `cstmr_gndr` varchar(255) NOT NULL,
  `cstmr_dstct` varchar(255) NOT NULL,
  `cstmr_cntry` varchar(255) NOT NULL,
  `cstmr_img` varchar(255) NOT NULL,
  `cstmr_u_sts` varchar(1) NOT NULL,
  `cstmr_ip` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_acc`
--

INSERT INTO `tbl_customer_acc` (`cstmr_srl_no`, `cstmr_id`, `cstmr_name`, `cstmr_mail`, `cstmr_phn_no`, `cstmr_u_name`, `cstmr_u_pswd`, `cstmr_prsnt_address`, `cstmr_per_address`, `cstmr_gndr`, `cstmr_dstct`, `cstmr_cntry`, `cstmr_img`, `cstmr_u_sts`, `cstmr_ip`) VALUES
(1, 0, 'md. Muzammal Hoq', 'mzlh7542@gmail.com', '015241876514785', 'dfghdgh', 'ghfgjhf', 'jghjgh', 'ghjghjgh', 'jghj', 'sdfg', 'Pakistan', '', '', ''),
(2, 0, 'md. Muzammal Hoq', 'mzlh7542@gmail.com', '015241876514785', 'dfghdgh', 'ghfgjhf', 'jghjgh', 'ghjghjgh', 'jghj', 'sdfg', 'Bangladesh', '', 'j', ''),
(3, 0, 'md. Muzammal Hoq', 'mzlh7542@gmail.com', '015241876514785', 'dfghdgh', 'ghfgjhf', 'jghjgh', 'ghjghjgh', 'jghj', 'sdfg', 'Bangladesh', '', 'j', ''),
(4, 0, 'md. Muzammal Hoq', 'mzlh7542@gmail.com', '015241876514785', 'dfghdgh', 'ghfgjhf', 'jghjgh', 'ghjghjgh', 'jghj', 'sdfg', 'Bangladesh', '', 'j', ''),
(5, 0, 'md. Muzammal Hoq', 'mzlh7542@gmail.com', '015241876514785', 'dfghdgh', 'ghfgjhf', 'jghjgh', 'ghjghjgh', 'jghj', 'sdfg', 'Bangladesh', '', 'j', ''),
(6, 12, 'md. Muzammal Hoq', 'mzlh7542@gmail.com', '015241876514785', 'admin', '12345', 'jghjgh', 'ghjghjgh', 'jghj', 'ggjgjh', 'Turky', 'coloured-flower-design_1284-1550.jpg', 'p', ''),
(7, 12, 'md. Nurul Islam', 'mzlh7542@gmail.com', '015241876514785', 'monir', 'mzlh7542', 'Curabitur elementum varius odio,', 'Curabitur elementum varius odio,', 'jghj', 'sdfg', 'Syria', '2016-08-bg-bento-bag-t-ft.jpg', 'p', ''),
(8, 12, 'md. Nurul Islam', 'mzlh7542@gmail.com', '015241876514785', 'monir', 'mzlh7542', 'Curabitur elementum varius odio,', 'Curabitur elementum varius odio,', 'jghj', 'sdfg', 'Qatar', 'dbd.png', 'p', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deleivery_address`
--

CREATE TABLE IF NOT EXISTS `tbl_deleivery_address` (
`deliver_serial_no` int(11) NOT NULL,
  `deliver_id` int(11) NOT NULL,
  `deliver_name` varchar(255) NOT NULL,
  `deliver_house_no` varchar(255) NOT NULL,
  `deliver_road_no` varchar(255) NOT NULL,
  `deliver_sector` varchar(255) NOT NULL,
  `deliver_zip_code` varchar(255) NOT NULL,
  `deliver_mobile` varchar(255) NOT NULL,
  `deliver_district` varchar(255) NOT NULL,
  `deliver_country` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deleivery_address`
--

INSERT INTO `tbl_deleivery_address` (`deliver_serial_no`, `deliver_id`, `deliver_name`, `deliver_house_no`, `deliver_road_no`, `deliver_sector`, `deliver_zip_code`, `deliver_mobile`, `deliver_district`, `deliver_country`) VALUES
(1, 0, 'md. Nurul Islam', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', '12/B', '2200', '01674048880', 'mymensingh', 'Bangladesh'),
(2, 0, 'md. Nurul Islam', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', '12/B', '2200', '01674048880', 'mymensingh', 'Bangladesh'),
(3, 0, 'Mizanur ', 'fhfghf', 'hfghf', 'hjfjhfj', 'fjfjj', 'jdj', 'fjfdj', ''),
(4, 0, 'Mizanur ', 'fhfghf', 'hfghf', 'hjfjhfj', 'fjfjj', 'jdj', 'fjfdj', ''),
(5, 0, '', '', '', '', '', '', '', ''),
(6, 0, 'Mizanur ', 'fhfghf', 'hfghf', 'hjfjhfj', 'fjfjj', 'jdj', 'fjfdj', ''),
(7, 0, 'Moula', '', '', '', '', '', '', ''),
(8, 0, '', '', '', '', '', '', '', ''),
(9, 0, 'Moula', '', '', '', '', '', '', ''),
(10, 0, 'Moula', 'dfgdg', 'dfgdfg', 'dgfgdf', 'gdfg', 'dfgggggf', 'fdgfdg', ''),
(11, 0, 'Moula', 'dfgdg', 'dfgdfg', 'dgfgdf', 'gdfg', 'dfgggggf', 'fdgfdg', ''),
(12, 0, 'Mizanur ', 'Mizanur ', '15/26', '3/B', '2200', 'cnbcbn', 'cvbfc', 'cncn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
`e_srl_no` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_f_name` varchar(255) NOT NULL,
  `e_m_name` varchar(255) NOT NULL,
  `e_phn_no` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `e_address` text NOT NULL,
  `e_post` varchar(255) NOT NULL,
  `e_slry` varchar(255) NOT NULL,
  `e_image` varchar(255) NOT NULL,
  `e_status` varchar(1) NOT NULL,
  `e_svd_by` varchar(255) NOT NULL,
  `e_svd_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `e_ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_post`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_post` (
`emp_serial_no` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(60) NOT NULL,
  `emp_post` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_is_offer`
--

CREATE TABLE IF NOT EXISTS `tbl_is_offer` (
`is_offer_id` int(11) NOT NULL,
  `is_offer_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_is_offer`
--

INSERT INTO `tbl_is_offer` (`is_offer_id`, `is_offer_name`) VALUES
(1, 'YES'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_reg`
--

CREATE TABLE IF NOT EXISTS `tbl_login_reg` (
`member_id` int(11) NOT NULL,
  `member_name` varchar(60) NOT NULL,
  `member_email` varchar(60) NOT NULL,
  `member_phone` varchar(15) NOT NULL,
  `member_house` text NOT NULL,
  `member_road` text NOT NULL,
  `member_sector` text NOT NULL,
  `member_distric` text NOT NULL,
  `member_zip` varchar(6) NOT NULL,
  `member_phone_2` varchar(15) NOT NULL,
  `member_image` varchar(32) NOT NULL,
  `member_city` varchar(255) NOT NULL,
  `member_state` varchar(255) NOT NULL,
  `member_area_zip` varchar(60) NOT NULL,
  `member_country` varchar(32) NOT NULL,
  `member_Security_code` varchar(6) NOT NULL,
  `member_username` varchar(60) NOT NULL,
  `member_password` varchar(32) NOT NULL,
  `member_status` int(11) NOT NULL,
  `member_reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_order_id` int(11) NOT NULL,
  `member_order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_order_ship_to` varchar(255) NOT NULL,
  `member_order_total` varchar(10) NOT NULL,
  `member_order_status` varchar(10) NOT NULL,
  `member_ordered_product_image` varchar(255) NOT NULL,
  `member_billing_address` text NOT NULL,
  `member_billing_system` varchar(255) NOT NULL,
  `member_billing_bank_name` varchar(255) NOT NULL,
  `member_shipping_adrress` text NOT NULL,
  `member_shipping_vehicles` text NOT NULL,
  `member_shipping_cost` varchar(10) NOT NULL,
  `p_order_status` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login_reg`
--

INSERT INTO `tbl_login_reg` (`member_id`, `member_name`, `member_email`, `member_phone`, `member_house`, `member_road`, `member_sector`, `member_distric`, `member_zip`, `member_phone_2`, `member_image`, `member_city`, `member_state`, `member_area_zip`, `member_country`, `member_Security_code`, `member_username`, `member_password`, `member_status`, `member_reg_time`, `member_order_id`, `member_order_date`, `member_order_ship_to`, `member_order_total`, `member_order_status`, `member_ordered_product_image`, `member_billing_address`, `member_billing_system`, `member_billing_bank_name`, `member_shipping_adrress`, `member_shipping_vehicles`, `member_shipping_cost`, `p_order_status`) VALUES
(2, 'Md. Muzammal Hoq', 'coderssign@gmail.com', '01671047770', '', '', '', '', '', '', '', '', '', '', '', '', 'hoq', '202cb962ac59075b964b07152d234b70', 0, '2017-05-28 12:52:25', 0, '2017-05-28 12:52:25', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Nurul Islam', 'nu@gmail.com', '015745748544', '', '', '', '', '', '', '', '', '', '', '', '', 'nu', '202cb962ac59075b964b07152d234b70', 0, '2017-05-28 12:55:08', 0, '2017-05-28 12:55:08', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'md. Nurul Islam', 'anamul@gmail.com', '015745748544', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', '12/B', 'mymensingh', '2200', '01674048880', '', '', '', '', '', '', 'anamul', '202cb962ac59075b964b07152d234b70', 0, '2017-05-28 12:58:58', 0, '2017-05-28 12:58:58', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'md. Nurul Islam', 'coderssign@gmail.com', '01671047770', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', 'Curabitur elementum varius odio,, Curabitur elementum varius odio,', '12', 'mymensingh', '2200', '01674048880', '', '', '', '', '', '', 'monir', 'b95ea09b38c06b2c188b5a27a3609d3b', 0, '2017-05-28 13:19:06', 0, '2017-05-28 13:19:06', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'md. Nurul Islam', 'coderssign@gmail.com', '01554474165478', '', '', '', '', '', '', '', '', '', '', '', '', 'monir', 'b95ea09b38c06b2c188b5a27a3609d3b', 0, '2017-05-28 13:20:14', 0, '2017-05-28 13:20:14', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Mizanur ', 'mzn@gmail.com', '01254547923', 'Mizanur ', '15/26', '3/B', 'cvbfc', '2200', 'cnbcbn', '', '', '', '', '', '', 'mzn', '202cb962ac59075b964b07152d234b70', 0, '2017-05-28 13:22:26', 0, '2017-05-28 13:22:26', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Md. Nurul Islam', 'moula@gmail.com', '01671047770', 'Baridhara', '15/26', '3/B', 'mymensingh', '2200', '01674048880', '', '', '', '', '', '', 'moula', '202cb962ac59075b964b07152d234b70', 0, '2017-05-29 09:38:17', 0, '2017-05-29 09:38:17', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'sultan', 'mzlh7542@gmail.com', '015745748544', '', '', '', '', '', '', '', '', '', '', '', '', 'sultan', '202cb962ac59075b964b07152d234b70', 0, '2017-06-01 03:10:23', 0, '2017-06-01 03:10:23', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_my_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_my_profile` (
`my_prof_id` int(11) NOT NULL,
  `my_prof_client_name` varchar(255) NOT NULL,
  `my_prof_order_id` int(11) NOT NULL,
  `my_prof_order_date` date NOT NULL,
  `my_prof_order_ship_to` text NOT NULL,
  `my_prof_order_total` varchar(255) NOT NULL,
  `my_prof_order_status` varchar(255) NOT NULL,
  `my_prof_order_image` varchar(255) NOT NULL,
  `my_prof_contact_name` varchar(255) NOT NULL,
  `my_prof__contact_email` varchar(255) NOT NULL,
  `my_prof__contact_address` text NOT NULL,
  `my_prof__contact_phone` varchar(255) NOT NULL,
  `my_prof_billing_address` text NOT NULL,
  `my_prof__billing_system` varchar(255) NOT NULL,
  `my_prof__billing_bank_name` varchar(255) NOT NULL,
  `my_prof_shipping_adrress` text NOT NULL,
  `my_prof_shipping_vehicles` varchar(255) NOT NULL,
  `my_prof_shipping_cost` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_my_profile`
--

INSERT INTO `tbl_my_profile` (`my_prof_id`, `my_prof_client_name`, `my_prof_order_id`, `my_prof_order_date`, `my_prof_order_ship_to`, `my_prof_order_total`, `my_prof_order_status`, `my_prof_order_image`, `my_prof_contact_name`, `my_prof__contact_email`, `my_prof__contact_address`, `my_prof__contact_phone`, `my_prof_billing_address`, `my_prof__billing_system`, `my_prof__billing_bank_name`, `my_prof_shipping_adrress`, `my_prof_shipping_vehicles`, `my_prof_shipping_cost`) VALUES
(1, 'Aminul Islam', 12, '2017-05-10', 'fghfgfjhj', '200', 'p', 'l2.jpg', 'Tanzilul hoque', 'tanjil@yahoo.com', 'bvb', '0165421558', 'cbcbb', 'Cash', 'DBBL', 'xbcbcb', 'Truck', '150');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`o_srl_no` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `o_cstmr_id` int(25) NOT NULL,
  `o_cstmr_name` varchar(255) NOT NULL,
  `o_cstmr_address` varchar(255) NOT NULL,
  `o_phn_no` varchar(255) NOT NULL,
  `o_mail` varchar(255) NOT NULL,
  `o_payment_type` varchar(255) NOT NULL,
  `o_sub_total` varchar(255) NOT NULL,
  `o_vat` varchar(255) NOT NULL,
  `o_srvc_chrg` varchar(255) NOT NULL,
  `o_dlvry_chrg` varchar(255) NOT NULL,
  `o_total_amount` varchar(9) NOT NULL,
  `o_status` varchar(1) NOT NULL,
  `o_ip_address` varchar(255) NOT NULL,
  `o_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `o_time` time DEFAULT NULL,
  `o_dlvry_name` varchar(60) NOT NULL,
  `o_dlvry_phone` varchar(15) NOT NULL,
  `o_dlvry_address` text NOT NULL,
  `o_dlvry_zone` varchar(255) NOT NULL,
  `o_dlvry_instrn` text NOT NULL,
  `o_cstmr_house` varchar(255) NOT NULL,
  `o_cstmr_road` varchar(255) NOT NULL,
  `o_cstmr_sector` varchar(255) NOT NULL,
  `o_cstmr_zip` varchar(255) NOT NULL,
  `o_cstmr_distric` varchar(255) NOT NULL,
  `o_cstmr_phone_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_order_detail` (
`o_d_srl_no` int(11) NOT NULL,
  `o_d_id` int(11) NOT NULL,
  `o_d_product_id` int(11) NOT NULL,
  `o_d_p_qnty` varchar(6) NOT NULL,
  `o_d_price` varchar(5) NOT NULL,
  `o_d_status` varchar(1) NOT NULL,
  `o_d_ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_pending_orders` (
`p_o_id` int(11) NOT NULL,
  `p_o_number` varchar(10) NOT NULL,
  `p_o_description` text NOT NULL,
  `p_o_ttl_amount` varchar(8) NOT NULL,
  `p_o_image` varchar(255) NOT NULL,
  `p_o_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pending_orders`
--

INSERT INTO `tbl_pending_orders` (`p_o_id`, `p_o_number`, `p_o_description`, `p_o_ttl_amount`, `p_o_image`, `p_o_date`) VALUES
(1, '12', 'simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset', '1205', '13.jpg', '2017-05-17 02:13:56'),
(2, '51', 'page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable', '50689', 't3.jpg', '2017-05-17 02:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prev_order`
--

CREATE TABLE IF NOT EXISTS `tbl_prev_order` (
`prev_o_id` int(11) NOT NULL,
  `prev_o_name` varchar(255) NOT NULL,
  `prev_o_number` varchar(255) NOT NULL,
  `prev_o_description` text NOT NULL,
  `prev_o_ttl_amount` varchar(8) NOT NULL,
  `prev_o_image` varchar(255) NOT NULL,
  `prev_o_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prev_order`
--

INSERT INTO `tbl_prev_order` (`prev_o_id`, `prev_o_name`, `prev_o_number`, `prev_o_description`, `prev_o_ttl_amount`, `prev_o_image`, `prev_o_date`) VALUES
(1, 'Mandana', '15', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure', '5622', 'mater.jpg', '2017-05-17 02:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`p_srl_no` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_brnd_name` varchar(50) NOT NULL,
  `p_ctgy_name` varchar(50) NOT NULL,
  `p_price` varchar(5) NOT NULL,
  `p_is_special` varchar(255) NOT NULL,
  `p_new_arrival` varchar(255) NOT NULL,
  `p_offer_price` varchar(6) NOT NULL,
  `p_is_offer` varchar(255) NOT NULL,
  `p_status` varchar(1) NOT NULL COMMENT 'L= Ladies Ware M=mens ware',
  `p_saved_by_id` varchar(5) NOT NULL,
  `p_svd_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `p_ip_address` varchar(20) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_image_2` varchar(255) NOT NULL,
  `p_image_3` varchar(255) NOT NULL,
  `p_image_4` varchar(255) NOT NULL,
  `p_image_5` varchar(255) NOT NULL,
  `p_image_6` varchar(255) NOT NULL,
  `p_order_status` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_srl_no`, `p_id`, `p_name`, `p_brnd_name`, `p_ctgy_name`, `p_price`, `p_is_special`, `p_new_arrival`, `p_offer_price`, `p_is_offer`, `p_status`, `p_saved_by_id`, `p_svd_time`, `p_ip_address`, `p_image`, `p_image_2`, `p_image_3`, `p_image_4`, `p_image_5`, `p_image_6`, `p_order_status`) VALUES
(11, 101, 'Multa', 'dghh', 'Mens Ware', '1200', '', '', '1100', 'YES', '', '', '0000-00-00 00:00:00', '', 'img/098dc13608.jpg', 'img/a0fe234120.jpg', 'img/.jpg', 'img/c8e62b8e9b.jpg', 'img/124237993c.jpg', 'img/9c46d35f94.jpg', ''),
(12, 22, 'Multa', 'dghh', 'Womens Ware', '1200', '', '', '1100', 'YES', '', '', '0000-00-00 00:00:00', '', 'img/dbf813a563.jpg', 'img/1c4e148378.jpg', 'img/.jpg', 'img/ae0604e451.jpg', 'img/a8439190cc.jpg', 'img/44ac68210a.jpg', ''),
(13, 2562, 'Multa', 'Golden Tie', 'Mens Ware', '1200', '', '', '1100', 'YES', '', '', '0000-00-00 00:00:00', '', 'img/7bed735bad.jpg', 'img/5865b7cbcf.jpg', 'img/.jpg', 'img/c6bbf83286.jpg', 'img/10cd30d0b9.jpg', 'img/4f14f14c81.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sidebar`
--

CREATE TABLE IF NOT EXISTS `tbl_sidebar` (
`sidebar_id` int(11) NOT NULL,
  `sidebar_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sidebar`
--

INSERT INTO `tbl_sidebar` (`sidebar_id`, `sidebar_name`) VALUES
(1, 'Dress For Men'),
(2, 'Dress For Women'),
(3, 'Exclusive'),
(4, 'New Arrival'),
(5, 'Offers'),
(6, 'All Products'),
(7, 'Gallery'),
(8, 'Latest Collection');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addtocart`
--
ALTER TABLE `tbl_addtocart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_account`
--
ALTER TABLE `tbl_admin_account`
 ADD PRIMARY KEY (`admn_srl_no`);

--
-- Indexes for table `tbl_all_orders`
--
ALTER TABLE `tbl_all_orders`
 ADD PRIMARY KEY (`all_o_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
 ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_client_dashboard`
--
ALTER TABLE `tbl_client_dashboard`
 ADD PRIMARY KEY (`client_db_id`);

--
-- Indexes for table `tbl_cntry`
--
ALTER TABLE `tbl_cntry`
 ADD PRIMARY KEY (`cntry_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_acc`
--
ALTER TABLE `tbl_customer_acc`
 ADD PRIMARY KEY (`cstmr_srl_no`);

--
-- Indexes for table `tbl_deleivery_address`
--
ALTER TABLE `tbl_deleivery_address`
 ADD PRIMARY KEY (`deliver_serial_no`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
 ADD PRIMARY KEY (`e_srl_no`);

--
-- Indexes for table `tbl_employee_post`
--
ALTER TABLE `tbl_employee_post`
 ADD PRIMARY KEY (`emp_serial_no`);

--
-- Indexes for table `tbl_is_offer`
--
ALTER TABLE `tbl_is_offer`
 ADD PRIMARY KEY (`is_offer_id`);

--
-- Indexes for table `tbl_login_reg`
--
ALTER TABLE `tbl_login_reg`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_my_profile`
--
ALTER TABLE `tbl_my_profile`
 ADD PRIMARY KEY (`my_prof_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`o_srl_no`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
 ADD PRIMARY KEY (`o_d_srl_no`);

--
-- Indexes for table `tbl_pending_orders`
--
ALTER TABLE `tbl_pending_orders`
 ADD PRIMARY KEY (`p_o_id`);

--
-- Indexes for table `tbl_prev_order`
--
ALTER TABLE `tbl_prev_order`
 ADD PRIMARY KEY (`prev_o_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`p_srl_no`);

--
-- Indexes for table `tbl_sidebar`
--
ALTER TABLE `tbl_sidebar`
 ADD PRIMARY KEY (`sidebar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addtocart`
--
ALTER TABLE `tbl_addtocart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_admin_account`
--
ALTER TABLE `tbl_admin_account`
MODIFY `admn_srl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_all_orders`
--
ALTER TABLE `tbl_all_orders`
MODIFY `all_o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_client_dashboard`
--
ALTER TABLE `tbl_client_dashboard`
MODIFY `client_db_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cntry`
--
ALTER TABLE `tbl_cntry`
MODIFY `cntry_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_customer_acc`
--
ALTER TABLE `tbl_customer_acc`
MODIFY `cstmr_srl_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_deleivery_address`
--
ALTER TABLE `tbl_deleivery_address`
MODIFY `deliver_serial_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
MODIFY `e_srl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_employee_post`
--
ALTER TABLE `tbl_employee_post`
MODIFY `emp_serial_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_is_offer`
--
ALTER TABLE `tbl_is_offer`
MODIFY `is_offer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_login_reg`
--
ALTER TABLE `tbl_login_reg`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_my_profile`
--
ALTER TABLE `tbl_my_profile`
MODIFY `my_prof_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `o_srl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
MODIFY `o_d_srl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pending_orders`
--
ALTER TABLE `tbl_pending_orders`
MODIFY `p_o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_prev_order`
--
ALTER TABLE `tbl_prev_order`
MODIFY `prev_o_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `p_srl_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_sidebar`
--
ALTER TABLE `tbl_sidebar`
MODIFY `sidebar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
