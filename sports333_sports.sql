-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2020 at 07:52 AM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports333_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `multi_bet_info`
--

CREATE TABLE `multi_bet_info` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `game_id` int(255) NOT NULL,
  `stack_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi_bet_info`
--

INSERT INTO `multi_bet_info` (`id`, `user_id`, `game_id`, `stack_id`) VALUES
(28, 201, 147, 1061),
(29, 201, 148, 1065),
(32, 198, 147, 1061),
(33, 198, 148, 1064);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(10) NOT NULL,
  `about` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about`) VALUES
(1, '200XBet SportsBook, Live sports\r\n\r\n200xBet is a leading online Sportsbook  offering the biggest number of Live Matches. alltime live matches stay this site.\r\n\r\n200xbet is operated by rengla VR registered in the Commercial register of Curacao no. 1226765 and has a SubLicense CIL pursuant to Master gaming License â„–8709/JAZ.\r\nRengla Limited DSLR Notaries (Suite 788), Ftieh St. Birkirkara Bypass, Birkirkara BKR 2870, Malta under the license of the fully owned otsunomia N.V.\r\n\r\nPlay responsibly. For further information contact www.200xbet.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bet`
--

CREATE TABLE `tbl_bet` (
  `bet_id` int(10) NOT NULL,
  `bet_by` varchar(100) NOT NULL,
  `game_id` varchar(100) NOT NULL,
  `stake_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `current_rate` varchar(100) NOT NULL,
  `return_amount` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `bet_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bet`
--

INSERT INTO `tbl_bet` (`bet_id`, `bet_by`, `game_id`, `stake_id`, `amount`, `current_rate`, `return_amount`, `sell_price`, `date`, `bet_status`) VALUES
(661, '201', '147', '1061', '200', '22', '4400', '0.00', '2020-03-28 01:09 PM', '0'),
(662, '201', '148', '1065', '200', '3', '600', '0.00', '2020-03-28 01:09 PM', '3'),
(664, '201', '147', '1061', '200', '22', '4400', '0.00', '2020-04-04 12:42 AM', '0'),
(665, '201', '148', '1065', '200', '3', '600', '0.00', '2020-04-04 12:42 AM', '0'),
(666, '201', '147', '1061', '100', '22', '2200', '0.00', '2020-04-04 12:52 AM', '0'),
(667, '201', '148', '1065', '100', '3', '300', '0.00', '2020-04-04 12:52 AM', '0'),
(668, '201', '147', '1061', '100', '22', '2200', '0.00', '2020-04-04 01:09 AM', '0'),
(669, '198', '155', '1077', '200', '1.95', '390', '0.00', '2020-04-08 10:53 PM', '2'),
(670, '202', '155', '1077', '1000', '1.95', '1950', '0.00', '2020-04-08 11:00 PM', '2'),
(671, '202', '155', '1077', '346', '1.95', '674.7', '0.00', '2020-04-08 11:02 PM', '2'),
(672, '202', '155', '1077', '1000', '1.95', '1950', '0.00', '2020-04-08 11:05 PM', '2'),
(673, '202', '155', '1077', '1000', '1.95', '1950', '0.00', '2020-04-08 11:06 PM', '2'),
(674, '202', '155', '1077', '200', '1.95', '390', '0.00', '2020-04-08 11:20 PM', '1'),
(675, '202', '156', '1067', '1000', '1.95', '1950', '0.00', '2020-04-08 11:30 PM', '1'),
(676, '202', '155', '1077', '1000', '1.95', '1950', '0.00', '2020-04-08 11:32 PM', '1'),
(677, '202', '155', '1077', '1000', '1.95', '1950', '0.00', '2020-04-08 11:32 PM', '1'),
(678, '202', '155', '1080', '200', '1.90', '380', '0.00', '2020-04-08 11:34 PM', '0'),
(679, '202', '155', '1078', '200', '1.95', '390', '0.00', '2020-04-09 12:17 AM', '0'),
(680, '202', '156', '1070', '1000', '1.60', '1600', '0.00', '2020-04-09 12:22 AM', '0'),
(681, '202', '156', '1070', '1000', '1.60', '1600', '0.00', '2020-04-09 12:22 AM', '0'),
(682, '202', '156', '1068', '1000', '1.95', '1950', '0.00', '2020-04-09 12:22 AM', '0'),
(683, '202', '156', '1070', '1000', '1.60', '1600', '0.00', '2020-04-09 12:23 AM', '0'),
(684, '202', '157', '1071', '1000', '1.95', '1950', '0.00', '2020-04-09 12:30 AM', '0'),
(685, '202', '155', '1078', '1000', '1.95', '1950', '0.00', '2020-04-09 12:32 AM', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club`
--

CREATE TABLE `tbl_club` (
  `club_id` int(10) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `club_owner_id` varchar(100) NOT NULL,
  `open_date` varchar(3000) NOT NULL,
  `club_status` varchar(10) NOT NULL,
  `balance` int(255) NOT NULL,
  `club_percenteg` varchar(255) NOT NULL,
  `club_rank` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_club`
--

INSERT INTO `tbl_club` (`club_id`, `club_name`, `club_owner_id`, `open_date`, `club_status`, `balance`, `club_percenteg`, `club_rank`) VALUES
(11, '200x Bet', 'hellow', '30/12/2019', '1', 0, '5', 6),
(12, 'Smart Club', '4', '30/12/2019', '1', 0, '10', 5),
(17, 'Demo', '180', '12/01/2020', '1', 0, '3', 3),
(20, 'web cloudex', '198', '3.7.2020', '1', 353, '2', 1),
(21, 'abcdx', '201', '11/03/2020', '1', 219, '8', 2),
(22, 'admin', '201', '21/03/2020', '1', 0, '2', 4),
(23, 'barisall', '198', '08/04/2020', '1', 0, '3', 740);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_owner`
--

CREATE TABLE `tbl_club_owner` (
  `club_owner_id` int(100) NOT NULL,
  `club_id` varchar(100) NOT NULL,
  `club_owner_name` varchar(100) NOT NULL,
  `club_owner_email` varchar(100) NOT NULL,
  `club_owner_phone` varchar(100) NOT NULL,
  `club_owner_image` varchar(100) NOT NULL,
  `club_owner_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_owner_balance_transfer`
--

CREATE TABLE `tbl_club_owner_balance_transfer` (
  `club_owner_balance_transfer_id` int(11) NOT NULL,
  `club_owner_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `transfer_amount` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_owner_deposit`
--

CREATE TABLE `tbl_club_owner_deposit` (
  `club_owner_deposit_id` int(10) NOT NULL,
  `club_owner_id` varchar(100) NOT NULL,
  `club_owner_deposit_to` varchar(100) NOT NULL,
  `club_owner_deposit_by` varchar(100) NOT NULL,
  `club_owner_deposit_method` varchar(100) NOT NULL,
  `club_owner_deposit_amount` varchar(100) NOT NULL,
  `club_owner_deposit_transaction_number` varchar(100) NOT NULL,
  `club_owner_deposit_date` varchar(100) NOT NULL,
  `club_owner_deposit_note` varchar(100) NOT NULL,
  `club_owner_deposit_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_owner_message`
--

CREATE TABLE `tbl_club_owner_message` (
  `club_owner_message_id` int(10) NOT NULL,
  `club_owner_message_date` varchar(100) NOT NULL,
  `club_owner_message_time` varchar(100) NOT NULL,
  `club_owner_id` varchar(100) NOT NULL,
  `club_owner_message` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_owner_transaction`
--

CREATE TABLE `tbl_club_owner_transaction` (
  `club_owner_transaction_id` int(10) NOT NULL,
  `club_owner_transaction_type` varchar(100) NOT NULL,
  `club_owner_transaction_detail_id` varchar(100) NOT NULL,
  `club_owner_transaction_description` varchar(100) NOT NULL,
  `club_owner_transaction_date` varchar(100) NOT NULL,
  `club_owner_transaction_user_balance` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_owner_withdraw`
--

CREATE TABLE `tbl_club_owner_withdraw` (
  `club_owner_withdraw_id` int(10) NOT NULL,
  `club_owner_withdraw_request_by` varchar(100) NOT NULL,
  `club_owner_withdraw_amount` varchar(100) NOT NULL,
  `club_owner_withdraw_method` varchar(100) NOT NULL,
  `club_owner_withdraw_send_to` varchar(100) NOT NULL,
  `club_owner_withdraw_account_type` varchar(100) NOT NULL,
  `club_owner_withdraw_date` varchar(100) NOT NULL,
  `club_owner_withdraw_note` varchar(100) NOT NULL,
  `club_owner_withdraw_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commission`
--

CREATE TABLE `tbl_commission` (
  `commission_id` int(10) NOT NULL,
  `commission_to` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `commission_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_commission`
--

INSERT INTO `tbl_commission` (`commission_id`, `commission_to`, `amount`, `commission_date`) VALUES
(1, '23', '0.925', '2019-12-02 08:52'),
(2, '23', '2.109', '2019-12-03 09:10'),
(3, '23', '3.8', '2019-12-03 09:10'),
(4, '22', '1.78', '2019-12-03 09:33'),
(5, '23', '0.9', '2019-12-03 09:34'),
(6, '23', '0.9', '2019-12-03 09:41'),
(7, '23', '0.9', '2019-12-03 09:41'),
(8, '23', '0.9', '2019-12-03 09:47'),
(9, '23', '0.9', '2019-12-03 09:54'),
(10, '23', '1.125', '2019-12-03 09:57'),
(11, '23', '1.125', '2019-12-03 09:57'),
(12, '23', '9', '2019-12-03 09:57'),
(13, '23', '0.5775', '2019-12-03 10:12'),
(14, '23', '3.5', '2019-12-03 10:38'),
(15, '23', '0.4725', '2019-12-03 10:38'),
(16, '23', '0.525', '2019-12-03 11:04'),
(17, '23', '1.4', '2019-12-04 12:16'),
(18, '23', '2.625', '2019-12-04 12:43'),
(19, '23', '1.225', '2019-12-04 12:59'),
(20, '23', '2.5', '2019-12-04 12:59'),
(21, '23', '2.09', '2019-12-04 09:06'),
(22, '23', '1.9', '2019-12-04 09:06'),
(23, '23', '3.61', '2019-12-04 09:06'),
(24, '23', '3.7', '2019-12-04 09:53'),
(25, '23', '1.85', '2019-12-04 09:59'),
(26, '23', '1.85', '2019-12-04 10:06'),
(27, '23', '3.7', '2019-12-04 10:12'),
(28, '23', '2.0905', '2019-12-04 10:17'),
(29, '23', '3.7', '2019-12-04 10:27'),
(30, '23', '0.74', '2019-12-04 11:30'),
(31, '23', '6.4', '2019-12-05 11:37'),
(32, '23', '1.28', '2019-12-05 11:37'),
(33, '23', '0.74', '2019-12-05 09:53'),
(34, '18', '0.69', '2019-12-06 04:50'),
(35, '18', '0.48', '2019-12-06 04:53'),
(36, '23', '2.3', '2019-12-06 04:54'),
(37, '23', '0.902', '2019-12-06 03:50'),
(38, '23', '6.6732', '2019-12-06 04:51'),
(39, '23', '3.515', '2019-12-06 07:02'),
(40, '23', '4.625', '2019-12-06 07:02'),
(41, '43', '3.7', '2019-12-06 07:02'),
(42, '23', '6.66', '2019-12-06 07:02'),
(43, '23', '0.925', '2019-12-06 07:45'),
(44, '43', '0.875', '2019-12-06 07:52'),
(45, '43', '0.875', '2019-12-06 08:03'),
(46, '23', '0.7175', '2019-12-06 08:03'),
(47, '23', '1.15', '2019-12-06 08:05'),
(48, '43', '1.15', '2019-12-06 08:05'),
(49, '22', '0.875', '2019-12-06 09:35'),
(50, '22', '2.349', '2019-12-07 01:41'),
(51, '43', '2', '2019-12-07 01:41'),
(52, '43', '2', '2019-12-07 01:41'),
(53, '18', '0.5', '2019-12-07 01:41'),
(54, '23', '16.2', '2019-12-07 01:41'),
(55, '18', '0.55', '2019-12-07 01:44'),
(56, '43', '2', '2019-12-07 02:07'),
(57, '43', '2', '2019-12-07 02:07'),
(58, '18', '0.5', '2019-12-07 02:07'),
(59, '23', '16.2', '2019-12-07 02:07'),
(60, '18', '0.836', '2019-12-07 04:32'),
(61, '23', '0.931', '2019-12-07 04:32'),
(62, '23', '6.84', '2019-12-07 04:32'),
(63, '23', '6.878', '2019-12-07 04:32'),
(64, '18', '0.836', '2019-12-07 04:32'),
(65, '23', '0.931', '2019-12-07 04:32'),
(66, '23', '6.84', '2019-12-07 04:32'),
(67, '23', '6.878', '2019-12-07 04:32'),
(68, '43', '3.8', '2019-12-07 04:34'),
(69, '18', '1.15', '2019-12-07 04:34'),
(70, '22', '2.1875', '2019-12-07 04:34'),
(71, '22', '2.625', '2019-12-07 04:35'),
(72, '22', '4.4', '2019-12-07 07:18'),
(73, '43', '4.4', '2019-12-07 07:18'),
(74, '43', '21.78', '2019-12-07 07:18'),
(75, '18', '1.1', '2019-12-07 07:18'),
(76, '18', '21.78', '2019-12-07 07:18'),
(77, '43', '1.54', '2019-12-07 07:18'),
(78, '18', '1.1', '2019-12-07 07:18'),
(79, '18', '1.2', '2019-12-07 08:35'),
(80, '23', '1.656', '2019-12-07 08:35'),
(81, '22', '1.2', '2019-12-07 08:35'),
(82, '32', '0.95', '2019-12-07 08:35'),
(83, '43', '3.8', '2019-12-07 08:35'),
(84, '32', '1.9', '2019-12-07 08:35'),
(85, '32', '1.9', '2019-12-07 08:35'),
(86, '32', '0.76', '2019-12-07 08:35'),
(87, '43', '3.8', '2019-12-07 08:35'),
(88, '22', '1.3125', '2019-12-07 08:35'),
(89, '18', '0.88', '2019-12-07 08:41'),
(90, '43', '3', '2019-12-07 08:41'),
(91, '43', '0.85', '2019-12-07 09:52'),
(92, '23', '2.1516', '2019-12-07 09:53'),
(93, '18', '1.05', '2019-12-07 10:01'),
(94, '23', '4.0683', '2019-12-07 11:39'),
(95, '32', '0.51', '2019-12-08 01:42'),
(96, '22', '6.72', '2019-12-08 01:44'),
(97, '22', '3.5', '2019-12-08 01:44'),
(98, '43', '10.5', '2019-12-08 01:44'),
(99, '23', '7.0525', '2019-12-08 01:44'),
(100, '18', '1.25', '2019-12-08 04:36'),
(101, '43', '0.38', '2019-12-08 09:00'),
(102, '22', '1.9', '2019-12-08 09:00'),
(103, '22', '5.32', '2019-12-08 12:59'),
(104, '32', '0.95', '2019-12-08 12:59'),
(105, '43', '4.75', '2019-12-08 12:59'),
(106, '22', '2.47', '2019-12-08 12:59'),
(107, '23', '13.262', '2019-12-08 12:59'),
(108, '32', '0.798', '2019-12-08 12:59'),
(109, '22', '1.75', '2019-12-08 02:07'),
(110, '18', '1.05', '2019-12-08 02:29'),
(111, '18', '0.875', '2019-12-08 03:17'),
(112, '32', '0.77', '2019-12-08 03:34'),
(113, '43', '0.875', '2019-12-08 03:58'),
(114, '22', '1.575', '2019-12-08 04:28'),
(115, '18', '0.6125', '2019-12-08 04:46'),
(116, '18', '0.35', '2019-12-08 05:06'),
(117, '43', '2.625', '2019-12-08 05:06'),
(118, '18', '0.64', '2019-12-08 05:11'),
(119, '43', '2', '2019-12-08 05:11'),
(120, '43', '1.75', '2019-12-08 05:35'),
(121, '59', '0.85', '2019-12-08 05:40'),
(122, '32', '1.98', '2019-12-08 05:40'),
(123, '32', '0.925', '2019-12-08 07:16'),
(124, '32', '0.925', '2019-12-08 07:16'),
(125, '18', '0.5', '2019-12-08 09:43'),
(126, '43', '2.9', '2019-12-08 09:59'),
(127, '43', '2.6', '2019-12-09 01:39'),
(128, '59', '1.3', '2019-12-09 01:39'),
(129, '18', '2.125', '2019-12-09 01:41'),
(130, '59', '0.45', '2019-12-09 05:41'),
(131, '22', '7.35', '2019-12-09 05:41'),
(132, '18', '0.5', '2019-12-09 08:50'),
(133, '59', '1.91', '2019-12-09 09:22'),
(134, '43', '0.955', '2019-12-09 09:22'),
(135, '18', '0.955', '2019-12-09 09:22'),
(136, '32', '1.6999', '2019-12-09 09:22'),
(137, '22', '2.6167', '2019-12-09 09:22'),
(138, '22', '3.5', '2019-12-09 10:00'),
(139, '18', '1.26', '2019-12-09 11:30'),
(140, '59', '1.05', '2019-12-09 11:30'),
(141, '43', '1.176', '2019-12-09 11:30'),
(142, '32', '1.2765', '2019-12-10 12:00'),
(143, '55', '3.7', '2019-12-10 12:00'),
(144, '43', '0.925', '2019-12-10 12:00'),
(145, '18', '0.814', '2019-12-10 12:00'),
(146, '59', '0.925', '2019-12-10 12:00'),
(147, '43', '0.817', '2019-12-10 02:14'),
(148, '23', '7.6', '2019-12-10 02:14'),
(149, '59', '0.775', '2019-12-10 04:57'),
(150, '18', '0.46', '2019-12-10 04:57'),
(151, '18', '0.805', '2019-12-10 08:26'),
(152, '23', '3.146', '2019-12-11 05:14'),
(153, '18', '0.4375', '2019-12-11 05:18'),
(154, '59', '2.4', '2019-12-23 09:49'),
(155, '32', '1.665', '2019-12-23 09:51'),
(156, '180', '6.8', '2019-12-30 12:14'),
(157, '187', '9', '2019-12-30 12:40'),
(158, '187', '2.3', '2019-12-30 12:43'),
(159, '187', '6.8', '2019-12-30 01:03'),
(160, '180', '19', '2020-01-10 10:40'),
(161, '180', '19', '2020-01-10 10:40'),
(162, '180', '91.2', '2020-01-10 10:43'),
(163, '179', '95', '2020-01-10 11:07'),
(164, '179', '136.8', '2020-01-10 11:08'),
(165, '179', '9', '2020-01-11 09:23'),
(166, '179', '9', '2020-01-11 09:23'),
(167, '179', '9', '2020-01-11 09:23'),
(168, '179', '1.8', '2020-01-11 09:23'),
(169, '180', '19', '2020-01-11 09:30'),
(170, '180', '19', '2020-01-11 09:30'),
(171, '179', '95', '2020-01-11 09:30'),
(172, '180', '5', '2020-01-12 02:40'),
(173, '20', '10', '2020-03-12 02:57'),
(174, '20', '10', '2020-03-12 02:57'),
(175, '20', '2', '2020-03-12 03:00'),
(176, '20', '4', '2020-03-12 03:03'),
(177, '20', '10', '2020-03-12 03:05'),
(178, '20', '4', '2020-03-12 03:06'),
(179, '20', '4', '2020-03-12 03:14'),
(180, '20', '4', '2020-03-14 05:23'),
(181, '20', '4', '2020-03-14 05:23'),
(182, '20', '4', '2020-03-14 05:23'),
(183, '20', '4', '2020-03-14 05:23'),
(184, '20', '4', '2020-03-14 05:23'),
(185, '20', '4', '2020-03-14 05:23'),
(186, '20', '4', '2020-03-14 05:23'),
(187, '20', '4', '2020-03-14 05:23'),
(188, '20', '4', '2020-03-14 05:23'),
(189, '20', '4', '2020-03-14 05:23'),
(190, '20', '4', '2020-03-14 05:23'),
(191, '20', '4', '2020-03-14 05:23'),
(192, '20', '4', '2020-03-14 05:23'),
(193, '20', '4', '2020-03-14 05:23'),
(194, '20', '4', '2020-03-14 05:23'),
(195, '20', '4', '2020-03-14 05:35'),
(196, '20', '4', '2020-03-14 05:35'),
(197, '20', '4', '2020-03-14 05:35'),
(198, '20', '4', '2020-03-14 05:35'),
(199, '20', '4', '2020-03-14 05:35'),
(200, '20', '4', '2020-03-14 05:35'),
(201, '20', '4', '2020-03-14 05:36'),
(202, '20', '4', '2020-03-14 05:38'),
(203, '20', '4', '2020-03-14 05:41'),
(204, '20', '4', '2020-03-14 05:41'),
(205, '20', '6.92', '2020-04-08 11:02'),
(206, '21', '20', '2020-04-08 11:06'),
(207, '21', '4', '2020-04-08 11:20'),
(208, '21', '20', '2020-04-08 11:30'),
(209, '21', '20', '2020-04-08 11:32'),
(210, '21', '20', '2020-04-08 11:32'),
(211, '21', '4', '2020-04-08 11:34'),
(212, '21', '4', '2020-04-09 12:17'),
(213, '21', '20', '2020-04-09 12:22'),
(214, '21', '20', '2020-04-09 12:22'),
(215, '21', '20', '2020-04-09 12:22'),
(216, '21', '20', '2020-04-09 12:23'),
(217, '21', '20', '2020-04-09 12:30'),
(218, '21', '20', '2020-04-09 12:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_message`
--

CREATE TABLE `tbl_contact_message` (
  `contact_message_id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_message`
--

INSERT INTO `tbl_contact_message` (`contact_message_id`, `date`, `full_name`, `email`, `subject`, `message`) VALUES
(147, '2019-12-10 06:27', 'Antoniogox', 'yourmail@gmail.com', 'Test, just a test', 'Hello. And Bye.'),
(148, '2020-04-04 12:13', 'Eric', 'eric@talkwithwebvisitor.com', 'Cool website!', 'Cool website!\r\n\r\nMy nameâ€™s Eric, and I just found your site - stylesbd.com - while surfing the net'),
(149, '2020-04-07 11:06', 'Eric', 'eric@talkwithwebvisitor.com', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website stylesbd.com...\r\n\r\nIâ€™m on the internet a lot'),
(150, '2020-04-08 10:40', 'Eric', 'eric@talkwithwebvisitor.com', 'Your site â€“ more leads?', 'Hey, this is Eric and I ran across stylesbd.com a few minutes ago.\r\n\r\nLooks greatâ€¦ but now what?\r\n'),
(151, '2020-04-10 06:41', 'Thomashak', 'raphaeInhashy@gmail.com', 'Do you want cheap and innovative advertising for little money?', 'Hi!  sports333.live \r\n \r\nDid you know that it is possible to send message completely legit? \r\nWe pro');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_number`
--

CREATE TABLE `tbl_contact_number` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_number`
--

INSERT INTO `tbl_contact_number` (`contact_id`, `name`, `number`) VALUES
(1, 'Contact Page Number', '00000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deposit`
--

CREATE TABLE `tbl_deposit` (
  `deposit_id` int(10) NOT NULL,
  `request_by` varchar(100) NOT NULL,
  `deposit_to` varchar(100) NOT NULL,
  `deposit_by` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `amount` varchar(1000) NOT NULL,
  `transection_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deposit`
--

INSERT INTO `tbl_deposit` (`deposit_id`, `request_by`, `deposit_to`, `deposit_by`, `method`, `amount`, `transection_number`, `date`, `note`, `status`) VALUES
(96, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', NULL, '0'),
(97, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', NULL, '0'),
(98, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', NULL, '0'),
(99, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', NULL, '0'),
(100, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', NULL, '0'),
(101, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', ' ', '1'),
(102, '201', '01406685673', '01533592610', 'Bkash Personal', '500', 'sdfvdsfsd', '2020-03-14', ' ', '1'),
(103, '202', '01406685673', '7654357', 'Bkash Personal', '100', 'fylfiok', '2020-04-08', ' ', '1'),
(104, '202', '01406685673', '7654357', 'Bkash Personal', '110', 'fylfiok', '2020-04-08', ' ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deposite_limit`
--

CREATE TABLE `tbl_deposite_limit` (
  `id` int(11) NOT NULL,
  `minimum_amount` int(220) NOT NULL,
  `maximum_amount` int(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deposite_limit`
--

INSERT INTO `tbl_deposite_limit` (`id`, `minimum_amount`, `maximum_amount`) VALUES
(1, 50, 300),
(2, 220, 520),
(3, 100, 1000),
(4, 50, 500),
(5, 100, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_game`
--

CREATE TABLE `tbl_game` (
  `game_id` int(10) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `desh1` varchar(100) NOT NULL,
  `desh2` varchar(20) DEFAULT NULL,
  `tournament` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `game_update` varchar(1000) DEFAULT NULL,
  `game_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_game`
--

INSERT INTO `tbl_game` (`game_id`, `game_name`, `type`, `desh1`, `desh2`, `tournament`, `date`, `time`, `game_update`, `game_status`) VALUES
(158, 'F', 'Football', 'Dinamo Brest', 'hakhtyor Soligorsk', ' Belarus Cup , Semifinals ', 'Apr-08,2020', ' 10:30 PM', '--', '8'),
(155, 'cricket', 'Cricket', 'BANGLADESH', 'INDIA', 't20 match', '09 march', '09:00 pm', '--', '1'),
(156, 'Cricket', 'Cricket', 'pakistan', 'australia', 't10', '09 mar 2020', '10:00 pm', '--', '1'),
(157, 'Cricket', 'Cricket', 'srilanka', 'england', 'one day match', '15 mar 2020', '12:00 pm', '--', '1'),
(160, 'Football', 'Football', 'Neman Reserve ', 'Bobrujsk Reserve', ' Belarus Vysshaya Liga Dublery ', ' Apr-09-2020', ' 06:00 PM', '--', '8'),
(162, 'Football', 'Football', 'El-Entag El-Harby', 'Al-Ittihad Alexandri', 'Egypt Premier League ', ' Apr-09-2020', ' 05:30 PM', '--', '8'),
(163, 'Football', 'Football', ' FC Hermannstadt', ' Churchill Brothers ', 'India I-League ', ' Apr-09-2020', '09:00 PM [ L I V E Running ]', '--', '8'),
(164, 'cricket', 'Cricket', 'Aciesta Trau FC', 'Bobrujsk Reserve', ' India I-League', ' Apr-09-2020', ' 05:30 PM', '--', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_color`
--

CREATE TABLE `tbl_home_color` (
  `function_id` int(10) NOT NULL,
  `function_name` varchar(100) NOT NULL,
  `color_code` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home_color`
--

INSERT INTO `tbl_home_color` (`function_id`, `function_name`, `color_code`) VALUES
(1, 'Homepage Background', '#4c4c4c'),
(2, 'Header Color', '#2874A6 '),
(3, 'Game Title', '#2874A6 '),
(4, 'Bet Name', '#5C5C5C'),
(5, 'Bet Modal', '#1C69C2'),
(6, 'Status Bar', '#2E86C1'),
(7, 'Footer Color', '#474747'),
(8, 'Live-up', '#2E86C1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `credit` varchar(3000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `club_id` varchar(255) DEFAULT NULL,
  `sponsor_id` varchar(255) DEFAULT NULL,
  `joining_date` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`user_id`, `full_name`, `user_name`, `credit`, `email`, `phone`, `password`, `country`, `club_id`, `sponsor_id`, `joining_date`, `status`) VALUES
(198, 'shkil', 'user', '2865', 'mamun@gmail.com', '01533592610', 'e10adc3949ba59abbe56e057f20f883e', NULL, '20', NULL, '2020-03-04', '1'),
(199, 'web cloudex', 'web', '695', 'web@gmail.com', '01533592610', '25d55ad283aa400af464c76d713c07ad', NULL, '20', NULL, '2020-03-07', '1'),
(201, 'mamun', 'mamun', '89898', 'mamun@gmail.com', '01533592610', 'e10adc3949ba59abbe56e057f20f883e', NULL, '12', NULL, '2020-03-09', '1'),
(202, 'hero', 'hero', '8450', 'preham@gmail.com', '01924754280', 'c33367701511b4f6020ec61ded352059', NULL, '21', NULL, '2020-04-06', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_received`
--

CREATE TABLE `tbl_message_received` (
  `message_id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `sent_by` varchar(100) NOT NULL,
  `message` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_received`
--

INSERT INTO `tbl_message_received` (`message_id`, `date`, `time`, `sent_by`, `message`) VALUES
(1, '2019-11-24', '12:45:52AM', '6', 'H'),
(2, '2019-11-24', '12:45:58AM', '6', 'H'),
(4, '2019-12-02', '10:33:40AM', '24', 'Hi'),
(5, '2019-12-02', '12:57:03PM', '24', 'Hello'),
(6, '2019-12-02', '12:57:16PM', '24', 'Hello'),
(7, '2019-12-02', '08:03:19PM', '24', 'à¦­à¦¾à¦‡ à¦…à¦¨à§à¦¯à§‡ à¦¸à¦¾à¦‡à¦Ÿà§‡à¦° à¦šà§‡à§Ÿà§‡ à¦°à§‡à¦Ÿ à¦•à¦® à¦¹à§Ÿà§‡ à¦¯à¦¾à§Ÿà¥¤à¦†à¦° à¦¸à§à¦ªà¦šà§‡à¦° à¦à¦° à¦¬à§‹à¦¨à¦¾à¦¸ à¦¨à§‡à¦‡ à¦•à§‡à¦¨à§‹à¥¤à¦¬à§‹à¦¨à¦¾à¦¸à§‡à¦° à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦® à¦•à¦°à§‡à¦¨ à¦¤à¦¾à¦°à¦¾à¦¤à¦¾à¦°à¦¿'),
(9, '2019-12-07', '01:18:39AM', '34', 'Win ar taka akhno jog krn ni kno vaiya?'),
(10, '2019-12-07', '01:19:01AM', '38', 'vi taka add koren na kno.'),
(11, '2019-12-07', '01:19:51AM', '38', 'vi taka add koren na kno.'),
(12, '2019-12-07', '01:21:00AM', '38', 'vi taka add koren na kno.'),
(13, '2019-12-07', '01:27:50AM', '38', ' vi deposit ar taka add koren.win ar ta na hoi kal dian.na ki kicu akta koren.'),
(14, '2019-12-07', '01:27:56AM', '38', ' vi deposit ar taka add koren.win ar ta na hoi kal dian.na ki kicu akta koren.'),
(15, '2019-12-07', '01:28:39AM', '38', ' vi deposit ar taka add koren.win ar ta na hoi kal dian.na ki kicu akta koren.'),
(16, '2019-12-07', '08:30:40PM', '34', 'Vaiya win ar tk akhno jog hyni'),
(17, '2019-12-07', '10:18:51PM', '107', 'hi à¦†à¦®à¦¿ à¦¸à¦°à§à¦¬à¦¨à¦¿à¦®à§à¦¨ à¦•à¦¤ à¦Ÿà¦¾à¦•à¦¾ à¦¡à¦¿à¦ªà¦œà¦¿à¦Ÿ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‹'),
(18, '2019-12-07', '10:18:57PM', '107', 'hi à¦†à¦®à¦¿ à¦¸à¦°à§à¦¬à¦¨à¦¿à¦®à§à¦¨ à¦•à¦¤ à¦Ÿà¦¾à¦•à¦¾ à¦¡à¦¿à¦ªà¦œà¦¿à¦Ÿ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‹'),
(19, '2019-12-08', '01:24:05AM', '121', 'à¦à¦–à¦¨ à¦•à¦¿ à¦¡à¦¿à¦ªà§‹à¦œà¦¿à¦Ÿ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‹'),
(20, '2019-12-08', '01:24:31AM', '121', 'à¦à¦–à¦¨ à¦•à¦¿ à¦¡à¦¿à¦ªà§‹à¦œà¦¿à¦Ÿ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‹'),
(21, '2019-12-09', '11:28:37PM', '136', 'à¦­à¦¾à¦‡ à¦†à¦ªà¦¨à¦¾à¦°à¦¾ à¦•à§‡à¦¨à§‹ à¦†à¦—à§‡ à¦†à¦—à§‡ à¦–à§‡à¦²à¦¾ à¦¦à¦¿à¦²à§‡à¦¤ à¦•à¦°à§‡à¥¤?       '),
(22, '2019-12-11', '03:12:44AM', '172', 'Akane tk mair jbena2'),
(23, '2019-12-11', '03:13:13AM', '172', 'Akane tk mair jbena2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_sent`
--

CREATE TABLE `tbl_message_sent` (
  `message_sent_id` int(10) NOT NULL,
  `message_sent_date` varchar(100) NOT NULL,
  `sent_time` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `message_sent_to` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_sent`
--

INSERT INTO `tbl_message_sent` (`message_sent_id`, `message_sent_date`, `sent_time`, `message`, `message_sent_to`, `type`) VALUES
(2, '2019-11-29', '05:27:42pm', 'Hi', 'All user', 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) NOT NULL,
  `method` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `method`, `number`) VALUES
(71, 'Bkash Personal', '01406685673');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referral`
--

CREATE TABLE `tbl_referral` (
  `referral_id` int(10) NOT NULL,
  `referred_id` varchar(100) NOT NULL,
  `referred_iby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scroll`
--

CREATE TABLE `tbl_scroll` (
  `scroll_id` int(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_scroll`
--

INSERT INTO `tbl_scroll` (`scroll_id`, `message`) VALUES
(1, '??? Good News,     [ Deposit 100 to 25000& withdraw 400 to 10000\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sponsor`
--

CREATE TABLE `tbl_sponsor` (
  `sponsor-id` int(10) NOT NULL,
  `sponsor_user_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stake`
--

CREATE TABLE `tbl_stake` (
  `stake_id` int(10) NOT NULL,
  `game_id` varchar(100) NOT NULL,
  `stake_name` varchar(100) NOT NULL,
  `bet_name` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `sell_price` varchar(100) NOT NULL,
  `stake_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stake`
--

INSERT INTO `tbl_stake` (`stake_id`, `game_id`, `stake_name`, `bet_name`, `rate`, `sell_price`, `stake_status`) VALUES
(1060, '147', 'we', 'we', '2', '0.00', '1'),
(1061, '147', 'we', 'ew', '22', '0.00', '1'),
(1062, '147', 'dfs', 'df', '3', '0.00', '1'),
(1063, '147', 'dfs', 'dfs', '4', '0.00', '1'),
(1064, '148', 'ew', 'win', '2', '0.00', '1'),
(1065, '148', 'ew', 'loss', '3', '0.00', '1'),
(1066, '153', 'ew', 'win', '2', '0.00', '0'),
(1067, '156', 'Toss Result', 'Pakistan', '1.95', '0.00', '3'),
(1068, '156', 'Toss Result', 'Australia', '1.95', '0.00', '3'),
(1069, '156', 'Match Winner', 'Pakistan ', '2.20', '0.00', '2'),
(1070, '156', 'Match Winner', 'Australia', '1.60', '0.00', '3'),
(1071, '157', 'Toss Result', 'Srilanka ', '1.95', '0.00', '3'),
(1072, '157', 'Toss Result', 'England', '1.95', '0.00', '2'),
(1073, '164', 'Toss Result', 'w1', '1.95', '0.00', '1'),
(1074, '164', 'Toss Result', 'w2', '1.95', '0.00', '1'),
(1075, '164', 'Match Winner', 'w1', '2.20', '0.00', '1'),
(1076, '164', 'Match Winner', 'w2', '1.40', '0.00', '1'),
(1077, '155', 'MATCH WINNER', 'Bangladesh', '1.95', '0.00', '2'),
(1078, '155', 'MATCH WINNER', 'india', '1.95', '0.00', '3'),
(1079, '155', 'TOSS WINNER', 'Bangladesh', '1.90', '0.00', '3'),
(1080, '155', 'TOSS WINNER', 'INDIA', '1.90', '0.00', '3'),
(1081, '157', 'MATCH WINNER', 'srilanka', '2.30', '0.00', '3'),
(1082, '157', 'MATCH WINNER', 'england ', '1.50', '0.00', '3'),
(1083, '156', '1st ball run', '1 run', '3.00', '0.00', '3'),
(1084, '156', '1st ball run', '2 run', '4.00', '0.00', '3'),
(1085, '156', '1st ball run', '3 run', '5.00', '0.00', '3'),
(1086, '156', '1st ball run', '4 run', '6.00', '0.00', '3'),
(1087, '156', '1st ball run', '5 run', '7.00', '0.00', '3'),
(1088, '156', '1st ball run', '6 run', '15.00', '0.00', '3'),
(1089, '156', '1st ball run', 'wicket', '20.00', '0.00', '3'),
(1090, '156', '1st ball run', 'leg bye run', '25.00', '0.00', '3'),
(1091, '156', '1st ball run', 'no ball', '26.00', '0.00', '3'),
(1092, '156', '1st ball run', 'wide', '8.00', '0.00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms`
--

CREATE TABLE `tbl_terms` (
  `terms_id` int(10) NOT NULL,
  `terms` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detail_id` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `transaction_date` varchar(100) NOT NULL,
  `user_balance` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `type`, `detail_id`, `description`, `transaction_date`, `user_balance`) VALUES
(1, 'Deposit', '1', 'Deposit By Bkash', '2019-11-23 09:49', '10000'),
(2, 'Deposit', '1', 'Deposit By Bkash', '2019-11-23 09:49', '10000'),
(3, 'Deposit', '2', 'Deposit By Bkash', '2019-11-23 09:59', '10000.888'),
(4, 'Deposit', '3', 'Deposit By Bkash', '2019-11-23 10:44', '1000'),
(5, 'Bet Win', '1', 'Bet Win', '2019-11-23 10:47', '1000'),
(6, 'Bet Win', '2', 'Bet Win', '2019-11-23 10:47', '1970.2'),
(7, 'Return win', '1', 'Return by Admin', '2019-11-23 10:47', '980.2'),
(8, 'Return win', '2', 'Return by Admin', '2019-11-23 10:47', '10'),
(9, 'Bet Refund', '2', 'Bet Refund', '2019-11-23 10:48', '500'),
(10, 'Bet Refund', '1', 'Bet Refund', '2019-11-23 10:48', '1000'),
(11, 'Deposit', '4', 'Deposit By Bkash', '2019-11-27 11:15', '0.00'),
(12, 'Bet Refund', '2', 'Bet Refund', '2019-12-01 03:11', '490.01'),
(13, 'Bet Refund', '1', 'Bet Refund', '2019-12-01 04:27', '990.01'),
(14, 'Bet Refund', '3', 'Bet Refund', '2019-12-01 05:22', '336.45'),
(15, 'Bet Win', '4', 'Bet Win', '2019-12-01 05:56', '662.34'),
(16, 'Bet Refund', '4', 'Bet Refund', '2019-12-01 05:57', '862.34'),
(17, 'Bet Refund', '4', 'Bet Refund', '2019-12-01 05:57', '1062.34'),
(18, 'Bet Win', '5', 'Bet Win', '2019-12-01 06:00', '482.95'),
(19, 'Bet Win', '6', 'Bet Win', '2019-12-01 06:06', '2240.34'),
(20, 'Deposit', '6', 'Deposit By BKash ', '2019-12-01 10:04', '2040.34'),
(21, 'Withdraw', '1', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-01 10:06', '1040.34'),
(22, 'Bet Refund', '7', 'Bet Refund', '2019-12-01 10:18', '1540.34'),
(23, 'Deposit', '7', 'Deposit By Rocket', '2019-12-02 11:18', '1840.34'),
(24, 'Bet Win', '8', 'Bet Win', '2019-12-02 11:20', '2016.54'),
(25, 'Return win', '8', 'Return by Admin', '2019-12-02 11:22', '1640.34'),
(26, 'Return win', '8', 'Return by Admin', '2019-12-02 11:22', '1264.14'),
(27, 'Commission Win', '1', 'Sponsor Bonus', '2019-12-02 08:52', '0.925'),
(28, 'Bet Win', '9', 'Bet Win', '2019-12-02 08:52', '191.575'),
(29, 'Bet Loss', '10', 'Bet Loss', '2019-12-03 02:14', '191.575'),
(30, 'Deposit', '11', 'Deposit By BKash ', '2019-12-03 07:01', '500'),
(31, 'Deposit', '11', 'Deposit By BKash ', '2019-12-03 07:01', '1000'),
(32, 'Deposit', '12', 'Deposit By BKash ', '2019-12-03 07:24', '500'),
(33, 'Deposit', '13', 'Deposit By BKash ', '2019-12-03 08:46', '500'),
(34, 'Bet Loss', '12', 'Bet Loss', '2019-12-03 08:58', '10.575'),
(35, 'Bet Loss', '14', 'Bet Loss', '2019-12-03 08:59', '10.575'),
(36, 'Commission Win', '2', 'Sponsor Bonus', '2019-12-03 09:10', '3.034'),
(37, 'Bet Win', '11', 'Bet Win', '2019-12-03 09:10', '219.366'),
(38, 'Bet Win', '15', 'Bet Win', '2019-12-03 09:10', '206.43'),
(39, 'Commission Win', '3', 'Sponsor Bonus', '2019-12-03 09:10', '6.834'),
(40, 'Bet Win', '17', 'Bet Win', '2019-12-03 09:10', '426.2'),
(41, 'Bet Win', '24', 'Bet Win', '2019-12-03 09:10', '208.1'),
(42, 'Bet Win', '25', 'Bet Win', '2019-12-03 09:10', '358.58'),
(43, 'Bet Loss', '30', 'Bet Loss', '2019-12-03 09:32', '154.43'),
(44, 'Bet Loss', '31', 'Bet Loss', '2019-12-03 09:32', '154.43'),
(45, 'Bet Loss', '29', 'Bet Loss', '2019-12-03 09:33', '200'),
(46, 'Commission Win', '4', 'Sponsor Bonus', '2019-12-03 09:33', '-1.78'),
(47, 'Return win', '29', 'Return by Admin', '2019-12-03 09:33', '23.78'),
(48, 'Bet Loss', '28', 'Bet Loss', '2019-12-03 09:33', '60.366'),
(49, 'Commission Win', '5', 'Sponsor Bonus', '2019-12-03 09:34', '7.734'),
(50, 'Bet Win', '18', 'Bet Win', '2019-12-03 09:34', '415.3'),
(51, 'Bet Loss', '27', 'Bet Loss', '2019-12-03 09:34', '60.366'),
(52, 'Bet Loss', '32', 'Bet Loss', '2019-12-03 09:34', '258.58'),
(53, 'Commission Win', '6', 'Sponsor Bonus', '2019-12-03 09:41', '8.634'),
(54, 'Bet Win', '19', 'Bet Win', '2019-12-03 09:41', '104.4'),
(55, 'Commission Win', '7', 'Sponsor Bonus', '2019-12-03 09:41', '9.534'),
(56, 'Bet Win', '20', 'Bet Win', '2019-12-03 09:41', '193.5'),
(57, 'Bet Loss', '35', 'Bet Loss', '2019-12-03 09:41', '10.366'),
(58, 'Bet Loss', '21', 'Bet Loss', '2019-12-03 09:41', '193.5'),
(59, 'Bet Loss', '37', 'Bet Loss', '2019-12-03 09:41', '80.43'),
(60, 'Commission Win', '8', 'Sponsor Bonus', '2019-12-03 09:47', '10.434'),
(61, 'Bet Win', '22', 'Bet Win', '2019-12-03 09:47', '282.6'),
(62, 'Commission Win', '9', 'Sponsor Bonus', '2019-12-03 09:54', '11.334'),
(63, 'Bet Win', '33', 'Bet Win', '2019-12-03 09:54', '371.7'),
(64, 'Commission Win', '10', 'Sponsor Bonus', '2019-12-03 09:57', '12.459'),
(65, 'Bet Win', '26', 'Bet Win', '2019-12-03 09:57', '121.741'),
(66, 'Commission Win', '11', 'Sponsor Bonus', '2019-12-03 09:57', '13.584'),
(67, 'Bet Win', '38', 'Bet Win', '2019-12-03 09:57', '233.116'),
(68, 'Commission Win', '12', 'Sponsor Bonus', '2019-12-03 09:57', '22.584'),
(69, 'Bet Win', '39', 'Bet Win', '2019-12-03 09:57', '1262.7'),
(70, 'Bet Loss', '41', 'Bet Loss', '2019-12-03 09:57', '40.43'),
(71, 'Bet Loss', '34', 'Bet Loss', '2019-12-03 09:59', '1262.7'),
(72, 'Bet Win', '40', 'Bet Win', '2019-12-03 10:02', '331.83'),
(73, 'Bet Loss', '42', 'Bet Loss', '2019-12-03 10:12', '20.43'),
(74, 'Commission Win', '13', 'Sponsor Bonus', '2019-12-03 10:12', '23.1615'),
(75, 'Bet Win', '43', 'Bet Win', '2019-12-03 10:12', '257.2885'),
(76, 'Commission Win', '14', 'Sponsor Bonus', '2019-12-03 10:38', '26.6615'),
(77, 'Bet Win', '44', 'Bet Win', '2019-12-03 10:38', '1409.2'),
(78, 'Commission Win', '15', 'Sponsor Bonus', '2019-12-03 10:38', '27.134'),
(79, 'Bet Win', '46', 'Bet Win', '2019-12-03 10:38', '247.066'),
(80, 'Bet Loss', '45', 'Bet Loss', '2019-12-03 10:38', '231.83'),
(81, 'Bet Loss', '13', 'Bet Loss', '2019-12-03 10:58', '247.066'),
(82, 'Commission Win', '16', 'Sponsor Bonus', '2019-12-03 11:04', '27.659'),
(83, 'Bet Win', '47', 'Bet Win', '2019-12-03 11:04', '299.041'),
(84, 'Bet Win', '48', 'Bet Win', '2019-12-03 11:04', '392.98'),
(85, 'Bet Loss', '51', 'Bet Loss', '2019-12-03 11:30', '1209.2'),
(86, 'Bet Loss', '49', 'Bet Loss', '2019-12-03 11:35', '1209.2'),
(87, 'Bet Loss', '50', 'Bet Loss', '2019-12-03 11:41', '1209.2'),
(88, 'Bet Loss', '53', 'Bet Loss', '2019-12-03 11:51', '200.041'),
(89, 'Bet Loss', '54', 'Bet Loss', '2019-12-04 12:01', '1009.2'),
(90, 'Commission Win', '17', 'Sponsor Bonus', '2019-12-04 12:16', '29.059'),
(91, 'Bet Win', '55', 'Bet Win', '2019-12-04 12:16', '162.8'),
(92, 'Commission Win', '18', 'Sponsor Bonus', '2019-12-04 12:43', '31.684'),
(93, 'Bet Win', '57', 'Bet Win', '2019-12-04 12:43', '272.675'),
(94, 'Commission Win', '19', 'Sponsor Bonus', '2019-12-04 12:59', '32.909'),
(95, 'Bet Win', '52', 'Bet Win', '2019-12-04 12:59', '221.316'),
(96, 'Commission Win', '20', 'Sponsor Bonus', '2019-12-04 12:59', '35.409'),
(97, 'Bet Win', '56', 'Bet Win', '2019-12-04 12:59', '468.816'),
(98, 'Bet Loss', '16', 'Bet Loss', '2019-12-04 12:59', '23.78'),
(99, 'Bet Loss', '23', 'Bet Loss', '2019-12-04 12:59', '392.98'),
(100, 'Bet Loss', '36', 'Bet Loss', '2019-12-04 12:59', '20.43'),
(101, 'Bet Loss', '58', 'Bet Loss', '2019-12-04 01:00', '22.675'),
(102, 'Withdraw', '3', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 01:03', '468.816'),
(103, 'Bet Loss', '59', 'Bet Loss', '2019-12-04 06:28', '410.816'),
(104, 'Bet Win', '60', 'Bet Win', '2019-12-04 06:29', '53.7215'),
(105, 'Withdraw', '3', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 08:35', '300.816'),
(106, 'Withdraw', '2', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 08:35', '22.675'),
(107, 'Withdraw', '4', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 08:45', '300.816'),
(108, 'Deposit', '14', 'Deposit By BKash ', '2019-12-04 09:05', '522.675'),
(109, 'Withdraw', '5', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 10:00', '12.98'),
(110, 'Bet Win', '68', 'Bet Win', '2019-12-04 10:20', '10177.6'),
(111, 'Bet Win', '61', 'Bet Win', '2019-12-04 06:26', '108.6325'),
(112, 'Bet Loss', '64', 'Bet Loss', '2019-12-04 09:06', '10'),
(113, 'Bet Loss', '70', 'Bet Loss', '2019-12-04 09:06', '10'),
(114, 'Bet Loss', '74', 'Bet Loss', '2019-12-04 09:06', '274.78'),
(115, 'Commission Win', '21', 'Sponsor Bonus', '2019-12-04 09:06', '12.7225'),
(116, 'Bet Win', '62', 'Bet Win', '2019-12-04 09:06', '217.726'),
(117, 'Commission Win', '22', 'Sponsor Bonus', '2019-12-04 09:06', '14.6225'),
(118, 'Bet Win', '65', 'Bet Win', '2019-12-04 09:06', '405.826'),
(119, 'Bet Win', '67', 'Bet Win', '2019-12-04 09:06', '163.46'),
(120, 'Bet Win', '71', 'Bet Win', '2019-12-04 09:06', '539.66'),
(121, 'Bet Win', '73', 'Bet Win', '2019-12-04 09:06', '106.86'),
(122, 'Commission Win', '23', 'Sponsor Bonus', '2019-12-04 09:06', '18.2325'),
(123, 'Bet Win', '75', 'Bet Win', '2019-12-04 09:06', '763.216'),
(124, 'Bet Refund', '75', 'Bet Refund', '2019-12-04 09:07', '953.216'),
(125, 'Bet Refund', '75', 'Bet Refund', '2019-12-04 09:09', '1143.216'),
(126, 'Withdraw', '6', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 09:17', '594.81'),
(127, 'Withdraw', '7', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-04 09:18', '594.81'),
(128, 'Bet Win', '77', 'Bet Win', '2019-12-04 09:34', '105.905'),
(129, 'Bet Loss', '78', 'Bet Loss', '2019-12-04 09:42', '330.81'),
(130, 'Bet Win', '79', 'Bet Win', '2019-12-04 09:48', '122.535'),
(131, 'Bet Win', '80', 'Bet Win', '2019-12-04 09:53', '119.165'),
(132, 'Commission Win', '24', 'Sponsor Bonus', '2019-12-04 09:53', '21.9325'),
(133, 'Bet Win', '81', 'Bet Win', '2019-12-04 09:53', '688.975'),
(134, 'Bet Loss', '63', 'Bet Loss', '2019-12-04 09:56', '10'),
(135, 'Bet Loss', '66', 'Bet Loss', '2019-12-04 09:56', '10'),
(136, 'Bet Loss', '72', 'Bet Loss', '2019-12-04 09:58', '21.9325'),
(137, 'Bet Loss', '83', 'Bet Loss', '2019-12-04 09:58', '95.165'),
(138, 'Bet Win', '82', 'Bet Win', '2019-12-04 09:59', '705.96'),
(139, 'Commission Win', '25', 'Sponsor Bonus', '2019-12-04 09:59', '23.7825'),
(140, 'Bet Win', '84', 'Bet Win', '2019-12-04 09:59', '413.96'),
(141, 'Bet Loss', '85', 'Bet Loss', '2019-12-04 10:06', '55.165'),
(142, 'Commission Win', '26', 'Sponsor Bonus', '2019-12-04 10:06', '25.6325'),
(143, 'Bet Win', '87', 'Bet Win', '2019-12-04 10:06', '572.125'),
(144, 'Bet Loss', '86', 'Bet Loss', '2019-12-04 10:12', '55.165'),
(145, 'Commission Win', '27', 'Sponsor Bonus', '2019-12-04 10:12', '29.3325'),
(146, 'Bet Win', '88', 'Bet Win', '2019-12-04 10:12', '738.425'),
(147, 'Bet Loss', '89', 'Bet Loss', '2019-12-04 10:17', '55.165'),
(148, 'Commission Win', '28', 'Sponsor Bonus', '2019-12-04 10:17', '31.423'),
(149, 'Bet Win', '91', 'Bet Win', '2019-12-04 10:17', '507.9195'),
(150, 'Bet Win', '90', 'Bet Win', '2019-12-04 10:27', '71.795'),
(151, 'Commission Win', '29', 'Sponsor Bonus', '2019-12-04 10:27', '15.123'),
(152, 'Bet Win', '92', 'Bet Win', '2019-12-04 10:27', '704.725'),
(153, 'Bet Win', '93', 'Bet Win', '2019-12-04 10:27', '872.26'),
(154, 'Bet Loss', '94', 'Bet Loss', '2019-12-04 10:37', '50.795'),
(155, 'Bet Loss', '95', 'Bet Loss', '2019-12-04 10:37', '400.9195'),
(156, 'Bet Loss', '96', 'Bet Loss', '2019-12-04 10:37', '504.725'),
(157, 'Bet Loss', '97', 'Bet Loss', '2019-12-04 10:37', '15.123'),
(158, 'Bet Loss', '98', 'Bet Loss', '2019-12-04 10:52', '504.725'),
(159, 'Bet Loss', '100', 'Bet Loss', '2019-12-04 10:52', '772.26'),
(160, 'Bet Loss', '101', 'Bet Loss', '2019-12-04 10:52', '30.795'),
(161, 'Bet Win', '104', 'Bet Win', '2019-12-04 11:12', '65.445'),
(162, 'Bet Loss', '108', 'Bet Loss', '2019-12-04 11:30', '24.725'),
(163, 'Commission Win', '30', 'Sponsor Bonus', '2019-12-04 11:30', '15.863'),
(164, 'Bet Win', '107', 'Bet Win', '2019-12-04 11:30', '97.985'),
(165, 'Bet Loss', '76', 'Bet Loss', '2019-12-05 06:09', '400.9195'),
(166, 'Commission Win', '31', 'Sponsor Bonus', '2019-12-05 11:37', '22.263'),
(167, 'Bet Win', '110', 'Bet Win', '2019-12-05 11:37', '651.585'),
(168, 'Bet Win', '115', 'Bet Win', '2019-12-05 11:37', '85.885'),
(169, 'Commission Win', '32', 'Sponsor Bonus', '2019-12-05 11:37', '23.543'),
(170, 'Bet Win', '116', 'Bet Win', '2019-12-05 11:37', '778.305'),
(171, 'Bet Loss', '109', 'Bet Loss', '2019-12-05 11:37', '350.9195'),
(172, 'Bet Loss', '111', 'Bet Loss', '2019-12-05 11:37', '100'),
(173, 'Bet Loss', '114', 'Bet Loss', '2019-12-05 11:37', '100'),
(174, 'Deposit', '15', 'Deposit By BKash ', '2019-12-05 12:49', '500'),
(175, 'Bet Loss', '112', 'Bet Loss', '2019-12-05 04:23', '100'),
(176, 'Bet Loss', '113', 'Bet Loss', '2019-12-05 04:23', '100'),
(177, 'Bet Loss', '117', 'Bet Loss', '2019-12-05 04:23', '528.305'),
(178, 'Deposit', '16', 'Deposit By BKash ', '2019-12-05 07:52', '400'),
(179, 'Bet Loss', '121', 'Bet Loss', '2019-12-05 08:50', '20'),
(180, 'Bet Loss', '124', 'Bet Loss', '2019-12-05 08:50', '10.9195'),
(181, 'Bet Loss', '127', 'Bet Loss', '2019-12-05 08:50', '10.305'),
(182, 'Bet Loss', '130', 'Bet Loss', '2019-12-05 08:50', '350'),
(183, 'Bet Loss', '122', 'Bet Loss', '2019-12-05 09:53', '20'),
(184, 'Bet Loss', '126', 'Bet Loss', '2019-12-05 09:53', '10.305'),
(185, 'Bet Loss', '131', 'Bet Loss', '2019-12-05 09:53', '350'),
(186, 'Commission Win', '33', 'Sponsor Bonus', '2019-12-05 09:53', '24.283'),
(187, 'Bet Win', '125', 'Bet Win', '2019-12-05 09:53', '84.1795'),
(188, 'Bet Refund', '129', 'Bet Refund', '2019-12-05 11:24', '78.305'),
(189, 'Bet Refund', '118', 'Bet Refund', '2019-12-05 11:25', '275.26'),
(190, 'Bet Refund', '132', 'Bet Refund', '2019-12-05 11:26', '35.885'),
(191, 'Bet Refund', '128', 'Bet Refund', '2019-12-05 11:26', '278.305'),
(192, 'Bet Refund', '123', 'Bet Refund', '2019-12-05 11:26', '214.1795'),
(193, 'Bet Refund', '119', 'Bet Refund', '2019-12-05 11:27', '510'),
(194, 'Bet Refund', '120', 'Bet Refund', '2019-12-05 11:27', '50'),
(195, 'Bet Refund', '133', 'Bet Refund', '2019-12-05 11:27', '134.78'),
(196, 'Bet Refund', '133', 'Bet Refund', '2019-12-05 11:28', '258.78'),
(197, 'Bet Refund', '134', 'Bet Refund', '2019-12-05 11:28', '398.78'),
(198, 'Bet Win', '138', 'Bet Win', '2019-12-06 04:49', '80.435'),
(199, 'Bet Loss', '136', 'Bet Loss', '2019-12-06 04:49', '260'),
(200, 'Bet Loss', '135', 'Bet Loss', '2019-12-06 04:49', '114.1795'),
(201, 'Commission Win', '34', 'Sponsor Bonus', '2019-12-06 04:50', '0.69'),
(202, 'Bet Win', '137', 'Bet Win', '2019-12-06 04:50', '328.31'),
(203, 'Bet Loss', '139', 'Bet Loss', '2019-12-06 04:50', '80.435'),
(204, 'Commission Win', '35', 'Sponsor Bonus', '2019-12-06 04:53', '1.17'),
(205, 'Bet Win', '141', 'Bet Win', '2019-12-06 04:53', '375.83'),
(206, 'Commission Win', '36', 'Sponsor Bonus', '2019-12-06 04:54', '26.583'),
(207, 'Bet Win', '140', 'Bet Win', '2019-12-06 04:54', '341.8795'),
(208, 'Bet Loss', '142', 'Bet Loss', '2019-12-06 04:55', '375.83'),
(209, 'Deposit', '17', 'Deposit By Rocket', '2019-12-06 11:00', '1500'),
(210, 'Deposit', '18', 'Deposit By Rocket', '2019-12-06 11:04', '5000'),
(211, 'Bet Refund', '147', 'Bet Refund', '2019-12-06 01:14', '110.8795'),
(212, 'Bet Refund', '147', 'Bet Refund', '2019-12-06 01:15', '210.8795'),
(213, 'Bet Refund', '124', 'Bet Refund', '2019-12-06 01:18', '110.8795'),
(214, 'Bet Refund', '150', 'Bet Refund', '2019-12-06 01:19', '122'),
(215, 'Commission Win', '37', 'Sponsor Bonus', '2019-12-06 03:50', '27.485'),
(216, 'Bet Win', '145', 'Bet Win', '2019-12-06 03:50', '112.1775'),
(217, 'Bet Loss', '149', 'Bet Loss', '2019-12-06 04:50', '10.435'),
(218, 'Commission Win', '38', 'Sponsor Bonus', '2019-12-06 04:51', '34.1582'),
(219, 'Bet Win', '146', 'Bet Win', '2019-12-06 04:51', '670.9518'),
(220, 'Commission Win', '39', 'Sponsor Bonus', '2019-12-06 07:02', '37.6732'),
(221, 'Bet Win', '148', 'Bet Win', '2019-12-06 07:02', '358.1625'),
(222, 'Commission Win', '40', 'Sponsor Bonus', '2019-12-06 07:02', '42.2982'),
(223, 'Bet Win', '154', 'Bet Win', '2019-12-06 07:02', '717.875'),
(224, 'Commission Win', '41', 'Sponsor Bonus', '2019-12-06 07:02', '3.7'),
(225, 'Bet Win', '156', 'Bet Win', '2019-12-06 07:02', '676.3'),
(226, 'Commission Win', '42', 'Sponsor Bonus', '2019-12-06 07:02', '48.9582'),
(227, 'Bet Win', '157', 'Bet Win', '2019-12-06 07:02', '970.2918'),
(228, 'Bet Loss', '151', 'Bet Loss', '2019-12-06 07:02', '15.26'),
(229, 'Bet Loss', '159', 'Bet Loss', '2019-12-06 07:02', '140.435'),
(230, 'Bet Loss', '160', 'Bet Loss', '2019-12-06 07:33', '80.435'),
(231, 'Bet Loss', '155', 'Bet Loss', '2019-12-06 07:33', '150.1625'),
(232, 'Bet Win', '162', 'Bet Win', '2019-12-06 07:33', '89.9602'),
(233, 'Bet Loss', '165', 'Bet Loss', '2019-12-06 07:45', '476.3'),
(234, 'Commission Win', '43', 'Sponsor Bonus', '2019-12-06 07:45', '11.8852'),
(235, 'Bet Win', '169', 'Bet Win', '2019-12-06 07:45', '241.7375'),
(236, 'Commission Win', '44', 'Sponsor Bonus', '2019-12-06 07:52', '4.575'),
(237, 'Bet Win', '166', 'Bet Win', '2019-12-06 07:52', '562.925'),
(238, 'Bet Loss', '170', 'Bet Loss', '2019-12-06 07:52', '10.435'),
(239, 'Bet Loss', '172', 'Bet Loss', '2019-12-06 07:52', '11.8852'),
(240, 'Bet Win', '171', 'Bet Win', '2019-12-06 07:57', '45.085'),
(241, 'Bet Loss', '173', 'Bet Loss', '2019-12-06 08:03', '25.085'),
(242, 'Commission Win', '45', 'Sponsor Bonus', '2019-12-06 08:03', '5.45'),
(243, 'Bet Win', '167', 'Bet Win', '2019-12-06 08:03', '649.55'),
(244, 'Commission Win', '46', 'Sponsor Bonus', '2019-12-06 08:03', '12.6027'),
(245, 'Bet Win', '174', 'Bet Win', '2019-12-06 08:03', '271.77'),
(246, 'Commission Win', '47', 'Sponsor Bonus', '2019-12-06 08:05', '13.7527'),
(247, 'Bet Win', '158', 'Bet Win', '2019-12-06 08:05', '385.62'),
(248, 'Commission Win', '48', 'Sponsor Bonus', '2019-12-06 08:05', '6.6'),
(249, 'Bet Win', '168', 'Bet Win', '2019-12-06 08:05', '763.4'),
(250, 'Bet Loss', '175', 'Bet Loss', '2019-12-06 08:15', '25.085'),
(251, 'Deposit', '19', 'Deposit By BKash ', '2019-12-06 08:17', '600.78'),
(252, 'Bet Refund', '161', 'Bet Refund', '2019-12-06 09:02', '468.62'),
(253, 'Bet Loss', '164', 'Bet Loss', '2019-12-06 09:04', '370.875'),
(254, 'Bet Loss', '176', 'Bet Loss', '2019-12-06 09:04', '468.62'),
(255, 'Bet Loss', '177', 'Bet Loss', '2019-12-06 09:04', '325.83'),
(256, 'Bet Loss', '185', 'Bet Loss', '2019-12-06 09:34', '10.085'),
(257, 'Commission Win', '49', 'Sponsor Bonus', '2019-12-06 09:35', '-0.905'),
(258, 'Bet Win', '186', 'Bet Win', '2019-12-06 09:35', '97.405'),
(259, 'Bet Loss', '188', 'Bet Loss', '2019-12-06 09:47', '360.62'),
(260, 'Bet Loss', '183', 'Bet Loss', '2019-12-06 09:58', '10.085'),
(261, 'Bet Loss', '180', 'Bet Loss', '2019-12-06 09:58', '10.62'),
(262, 'Bet Loss', '187', 'Bet Loss', '2019-12-06 09:58', '97.405'),
(263, 'Deposit', '20', 'Deposit By BKash ', '2019-12-07 01:40', '417.405'),
(264, 'Commission Win', '50', 'Sponsor Bonus', '2019-12-07 01:41', '1.444'),
(265, 'Bet Win', '152', 'Bet Win', '2019-12-07 01:41', '649.956'),
(266, 'Bet Loss', '143', 'Bet Loss', '2019-12-07 01:41', '10'),
(267, 'Bet Loss', '144', 'Bet Loss', '2019-12-07 01:41', '200.83'),
(268, 'Bet Loss', '153', 'Bet Loss', '2019-12-07 01:41', '10.62'),
(269, 'Bet Loss', '163', 'Bet Loss', '2019-12-07 01:41', '10.085'),
(270, 'Commission Win', '51', 'Sponsor Bonus', '2019-12-07 01:41', '8.6'),
(271, 'Bet Win', '178', 'Bet Win', '2019-12-07 01:41', '511.4'),
(272, 'Commission Win', '52', 'Sponsor Bonus', '2019-12-07 01:41', '10.6'),
(273, 'Bet Win', '179', 'Bet Win', '2019-12-07 01:41', '709.4'),
(274, 'Bet Win', '181', 'Bet Win', '2019-12-07 01:41', '128.885'),
(275, 'Commission Win', '53', 'Sponsor Bonus', '2019-12-07 01:41', '122.5'),
(276, 'Bet Win', '184', 'Bet Win', '2019-12-07 01:41', '250.33'),
(277, 'Commission Win', '54', 'Sponsor Bonus', '2019-12-07 01:41', '29.9527'),
(278, 'Bet Win', '191', 'Bet Win', '2019-12-07 01:41', '1614.0918'),
(279, 'Bet Loss', '182', 'Bet Loss', '2019-12-07 01:42', '649.956'),
(280, 'Bet Loss', '190', 'Bet Loss', '2019-12-07 01:42', '10.62'),
(281, 'Commission Win', '55', 'Sponsor Bonus', '2019-12-07 01:44', '123.05'),
(282, 'Bet Win', '189', 'Bet Win', '2019-12-07 01:44', '304.78'),
(283, 'Bet Refund', '190', 'Bet Refund', '2019-12-07 02:03', '360.62'),
(284, 'Commission Win', '56', 'Sponsor Bonus', '2019-12-07 02:07', '8.6'),
(285, 'Return win', '178', 'Return by Admin', '2019-12-07 02:07', '511.4'),
(286, 'Commission Win', '57', 'Sponsor Bonus', '2019-12-07 02:07', '6.6'),
(287, 'Return win', '179', 'Return by Admin', '2019-12-07 02:07', '313.4'),
(288, 'Return win', '181', 'Return by Admin', '2019-12-07 02:07', '10.085'),
(289, 'Commission Win', '58', 'Sponsor Bonus', '2019-12-07 02:07', '122.55'),
(290, 'Return win', '184', 'Return by Admin', '2019-12-07 02:07', '255.28'),
(291, 'Commission Win', '59', 'Sponsor Bonus', '2019-12-07 02:07', '13.7527'),
(292, 'Return win', '191', 'Return by Admin', '2019-12-07 02:07', '10.2918'),
(293, 'Bet Refund', '191', 'Bet Refund', '2019-12-07 02:16', '910.2918'),
(294, 'Bet Refund', '198', 'Bet Refund', '2019-12-07 02:18', '360.62'),
(295, 'Bet Refund', '184', 'Bet Refund', '2019-12-07 02:22', '280.28'),
(296, 'Bet Refund', '181', 'Bet Refund', '2019-12-07 02:22', '70.085'),
(297, 'Bet Refund', '179', 'Bet Refund', '2019-12-07 02:22', '413.4'),
(298, 'Bet Refund', '178', 'Bet Refund', '2019-12-07 02:23', '513.4'),
(299, 'Bet Refund', '184', 'Bet Refund', '2019-12-07 02:23', '305.28'),
(300, 'Bet Refund', '198', 'Bet Refund', '2019-12-07 02:25', '360.62'),
(301, 'Bet Loss', '193', 'Bet Loss', '2019-12-07 05:39', '300.28'),
(302, 'Bet Loss', '195', 'Bet Loss', '2019-12-07 05:39', '709.4'),
(303, 'Bet Loss', '196', 'Bet Loss', '2019-12-07 05:39', '313.2918'),
(304, 'Bet Loss', '197', 'Bet Loss', '2019-12-07 05:39', '649.956'),
(305, 'Bet Loss', '199', 'Bet Loss', '2019-12-07 05:39', '10.62'),
(306, 'Bet Loss', '202', 'Bet Loss', '2019-12-07 05:39', '313.2918'),
(307, 'Bet Refund', '199', 'Bet Refund', '2019-12-07 05:43', '360.62'),
(308, 'Bet Refund', '216', 'Bet Refund', '2019-12-07 08:51', '200.956'),
(309, 'Bet Refund', '214', 'Bet Refund', '2019-12-07 08:51', '350.956'),
(310, 'Bet Refund', '215', 'Bet Refund', '2019-12-07 08:51', '500.956'),
(311, 'Bet Refund', '211', 'Bet Refund', '2019-12-07 08:52', '100.28'),
(312, 'Bet Refund', '212', 'Bet Refund', '2019-12-07 08:52', '370.875'),
(313, 'Bet Refund', '213', 'Bet Refund', '2019-12-07 08:52', '250.28'),
(314, 'Bet Loss', '192', 'Bet Loss', '2019-12-07 09:10', '344.28'),
(315, 'Bet Loss', '194', 'Bet Loss', '2019-12-07 09:10', '709.4'),
(316, 'Bet Loss', '200', 'Bet Loss', '2019-12-07 09:10', '564.2918'),
(317, 'Bet Loss', '201', 'Bet Loss', '2019-12-07 09:10', '344.28'),
(318, 'Withdraw', '9', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-07 10:03', '59.2918'),
(319, 'Bet Refund', '205', 'Bet Refund', '2019-12-07 12:26', '260.62'),
(320, 'Bet Win', '217', 'Bet Win', '2019-12-07 12:47', '192.885'),
(321, 'Deposit', '21', 'Deposit By BKash ', '2019-12-07 01:05', '300'),
(322, 'Withdraw', '2', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-07 01:52', '10.2918'),
(323, 'Withdraw', '3', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-07 01:52', '10.62'),
(324, 'Withdraw', '3', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-07 01:52', '10.62'),
(325, 'Withdraw', '3', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-07 01:52', '10.62'),
(326, 'Withdraw', '10', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-07 02:04', '20.875'),
(327, 'Withdraw', '10', 'Withdraw By ', '2019-12-07 02:12', '370.875'),
(328, 'Return win', '208', 'Return by Admin', '2019-12-07 04:32', '-1316.7'),
(329, 'Commission Win', '60', 'Sponsor Bonus', '2019-12-07 04:32', '121.714'),
(330, 'Return win', '219', 'Return by Admin', '2019-12-07 04:32', '117.516'),
(331, 'Commission Win', '61', 'Sponsor Bonus', '2019-12-07 04:32', '12.8217'),
(332, 'Return win', '220', 'Return by Admin', '2019-12-07 04:32', '-81.8772'),
(333, 'Commission Win', '62', 'Sponsor Bonus', '2019-12-07 04:32', '5.9817'),
(334, 'Return win', '222', 'Return by Admin', '2019-12-07 04:32', '-666.285'),
(335, 'Commission Win', '63', 'Sponsor Bonus', '2019-12-07 04:32', '-0.8963'),
(336, 'Return win', '223', 'Return by Admin', '2019-12-07 04:32', '-670.047'),
(337, 'Return win', '208', 'Return by Admin', '2019-12-07 04:32', '-1316.7'),
(338, 'Commission Win', '64', 'Sponsor Bonus', '2019-12-07 04:32', '120.878'),
(339, 'Return win', '219', 'Return by Admin', '2019-12-07 04:32', '34.752'),
(340, 'Commission Win', '65', 'Sponsor Bonus', '2019-12-07 04:32', '-1.8273'),
(341, 'Return win', '220', 'Return by Admin', '2019-12-07 04:32', '-174.0462'),
(342, 'Commission Win', '66', 'Sponsor Bonus', '2019-12-07 04:32', '-8.6673'),
(343, 'Return win', '222', 'Return by Admin', '2019-12-07 04:32', '-1343.445'),
(344, 'Commission Win', '67', 'Sponsor Bonus', '2019-12-07 04:32', '-15.5453'),
(345, 'Return win', '223', 'Return by Admin', '2019-12-07 04:32', '-1347.207'),
(346, 'Commission Win', '68', 'Sponsor Bonus', '2019-12-07 04:34', '2.8'),
(347, 'Return win', '221', 'Return by Admin', '2019-12-07 04:34', '133.2'),
(348, 'Return win', '224', 'Return by Admin', '2019-12-07 04:34', '109.503'),
(349, 'Commission Win', '69', 'Sponsor Bonus', '2019-12-07 04:34', '119.728'),
(350, 'Return win', '218', 'Return by Admin', '2019-12-07 04:34', '-79.098'),
(351, 'Commission Win', '70', 'Sponsor Bonus', '2019-12-07 04:34', '-0.7435'),
(352, 'Return win', '227', 'Return by Admin', '2019-12-07 04:34', '284.3935'),
(353, 'Return win', '225', 'Return by Admin', '2019-12-07 04:34', '63.963'),
(354, 'Commission Win', '71', 'Sponsor Bonus', '2019-12-07 04:35', '-3.3685'),
(355, 'Return win', '228', 'Return by Admin', '2019-12-07 04:35', '24.5185'),
(356, 'Commission Win', '72', 'Sponsor Bonus', '2019-12-07 07:18', '1.0315'),
(357, 'Bet Win', '254', 'Bet Win', '2019-12-07 07:18', '836.1185'),
(358, 'Commission Win', '73', 'Sponsor Bonus', '2019-12-07 07:18', '7.2'),
(359, 'Bet Win', '255', 'Bet Win', '2019-12-07 07:18', '447.8'),
(360, 'Commission Win', '74', 'Sponsor Bonus', '2019-12-07 07:18', '28.98'),
(361, 'Bet Win', '256', 'Bet Win', '2019-12-07 07:18', '2168.42'),
(362, 'Bet Win', '259', 'Bet Win', '2019-12-07 07:18', '68.879'),
(363, 'Commission Win', '75', 'Sponsor Bonus', '2019-12-07 07:18', '120.828'),
(364, 'Bet Win', '260', 'Bet Win', '2019-12-07 07:18', '208.998'),
(365, 'Commission Win', '76', 'Sponsor Bonus', '2019-12-07 07:18', '142.608'),
(366, 'Bet Win', '261', 'Bet Win', '2019-12-07 07:18', '2256.318'),
(367, 'Commission Win', '77', 'Sponsor Bonus', '2019-12-07 07:18', '30.52'),
(368, 'Bet Win', '262', 'Bet Win', '2019-12-07 07:18', '600.26'),
(369, 'Commission Win', '78', 'Sponsor Bonus', '2019-12-07 07:18', '143.708'),
(370, 'Bet Win', '263', 'Bet Win', '2019-12-07 07:18', '317.898'),
(371, 'Bet Loss', '252', 'Bet Loss', '2019-12-07 07:18', '10.445'),
(372, 'Bet Loss', '240', 'Bet Loss', '2019-12-07 07:18', '600.26'),
(373, 'Deposit', '24', 'Deposit By BKash ', '2019-12-07 07:22', '300'),
(374, 'Commission Win', '79', 'Sponsor Bonus', '2019-12-07 08:35', '144.908'),
(375, 'Bet Win', '226', 'Bet Win', '2019-12-07 08:35', '436.698'),
(376, 'Commission Win', '80', 'Sponsor Bonus', '2019-12-07 08:35', '-13.8893'),
(377, 'Bet Win', '242', 'Bet Win', '2019-12-07 08:35', '173.9902'),
(378, 'Commission Win', '81', 'Sponsor Bonus', '2019-12-07 08:35', '2.2315'),
(379, 'Bet Win', '245', 'Bet Win', '2019-12-07 08:35', '954.9185'),
(380, 'Bet Win', '247', 'Bet Win', '2019-12-07 08:35', '64.52'),
(381, 'Bet Win', '257', 'Bet Win', '2019-12-07 08:35', '147.679'),
(382, 'Bet Win', '258', 'Bet Win', '2019-12-07 08:35', '112.04'),
(383, 'Commission Win', '82', 'Sponsor Bonus', '2019-12-07 08:35', '148.629'),
(384, 'Bet Win', '264', 'Bet Win', '2019-12-07 08:35', '104.05'),
(385, 'Bet Win', '265', 'Bet Win', '2019-12-07 08:35', '223.869'),
(386, 'Commission Win', '83', 'Sponsor Bonus', '2019-12-07 08:35', '34.32'),
(387, 'Bet Win', '266', 'Bet Win', '2019-12-07 08:35', '576.46'),
(388, 'Commission Win', '84', 'Sponsor Bonus', '2019-12-07 08:35', '225.769'),
(389, 'Bet Win', '267', 'Bet Win', '2019-12-07 08:35', '292.15'),
(390, 'Commission Win', '85', 'Sponsor Bonus', '2019-12-07 08:35', '227.669'),
(391, 'Bet Win', '268', 'Bet Win', '2019-12-07 08:35', '480.25'),
(392, 'Commission Win', '86', 'Sponsor Bonus', '2019-12-07 08:35', '228.429'),
(393, 'Bet Win', '269', 'Bet Win', '2019-12-07 08:35', '555.49'),
(394, 'Commission Win', '87', 'Sponsor Bonus', '2019-12-07 08:35', '38.12'),
(395, 'Bet Win', '270', 'Bet Win', '2019-12-07 08:35', '952.66'),
(396, 'Bet Loss', '246', 'Bet Loss', '2019-12-07 08:35', '954.9185'),
(397, 'Bet Loss', '248', 'Bet Loss', '2019-12-07 08:35', '112.04'),
(398, 'Bet Loss', '241', 'Bet Loss', '2019-12-07 08:35', '952.66'),
(399, 'Bet Loss', '244', 'Bet Loss', '2019-12-07 08:35', '228.429'),
(400, 'Bet Loss', '253', 'Bet Loss', '2019-12-07 08:35', '952.66'),
(401, 'Commission Win', '88', 'Sponsor Bonus', '2019-12-07 08:35', '3.544'),
(402, 'Bet Win', '249', 'Bet Win', '2019-12-07 08:35', '1084.856'),
(403, 'Commission Win', '89', 'Sponsor Bonus', '2019-12-07 08:41', '145.788'),
(404, 'Bet Win', '230', 'Bet Win', '2019-12-07 08:41', '523.818'),
(405, 'Bet Win', '238', 'Bet Win', '2019-12-07 08:41', '59.6'),
(406, 'Commission Win', '90', 'Sponsor Bonus', '2019-12-07 08:41', '41.12'),
(407, 'Bet Win', '239', 'Bet Win', '2019-12-07 08:41', '1249.66'),
(408, 'Bet Win', '250', 'Bet Win', '2019-12-07 08:41', '99.2'),
(409, 'Commission Win', '91', 'Sponsor Bonus', '2019-12-07 09:52', '41.97'),
(410, 'Bet Win', '275', 'Bet Win', '2019-12-07 09:52', '1083.81'),
(411, 'Bet Loss', '272', 'Bet Loss', '2019-12-07 09:52', '500.818'),
(412, 'Commission Win', '92', 'Sponsor Bonus', '2019-12-07 09:53', '-11.7377'),
(413, 'Bet Win', '271', 'Bet Win', '2019-12-07 09:53', '223.9986'),
(414, 'Bet Loss', '231', 'Bet Loss', '2019-12-07 10:00', '19.2'),
(415, 'Bet Loss', '232', 'Bet Loss', '2019-12-07 10:00', '19.2'),
(416, 'Bet Loss', '233', 'Bet Loss', '2019-12-07 10:00', '19.2'),
(417, 'Bet Loss', '234', 'Bet Loss', '2019-12-07 10:00', '19.2'),
(418, 'Bet Loss', '235', 'Bet Loss', '2019-12-07 10:00', '19.2'),
(419, 'Bet Loss', '236', 'Bet Loss', '2019-12-07 10:00', '19.2'),
(420, 'Commission Win', '93', 'Sponsor Bonus', '2019-12-07 10:01', '46.838'),
(421, 'Bet Win', '229', 'Bet Win', '2019-12-07 10:01', '604.768'),
(422, 'Bet Win', '237', 'Bet Win', '2019-12-07 10:01', '60.78'),
(423, 'Bet Win', '243', 'Bet Win', '2019-12-07 10:01', '143.94'),
(424, 'Bet Win', '251', 'Bet Win', '2019-12-07 10:01', '137.857'),
(425, 'Bet Win', '273', 'Bet Win', '2019-12-07 10:48', '125.815'),
(426, 'Bet Loss', '274', 'Bet Loss', '2019-12-07 10:53', '883.81'),
(427, 'Bet Loss', '277', 'Bet Loss', '2019-12-07 11:39', '100.857'),
(428, 'Bet Loss', '280', 'Bet Loss', '2019-12-07 11:39', '20.856'),
(429, 'Bet Loss', '284', 'Bet Loss', '2019-12-07 11:39', '883.81'),
(430, 'Bet Win', '276', 'Bet Win', '2019-12-07 11:39', '253.3742'),
(431, 'Bet Win', '278', 'Bet Win', '2019-12-07 11:39', '182.542'),
(432, 'Commission Win', '94', 'Sponsor Bonus', '2019-12-07 11:39', '-7.6694'),
(433, 'Bet Win', '283', 'Bet Win', '2019-12-07 11:39', '413.7603'),
(434, 'Bet Win', '281', 'Bet Win', '2019-12-08 12:22', '230.062'),
(435, 'Bet Loss', '285', 'Bet Loss', '2019-12-08 01:42', '500.768'),
(436, 'Commission Win', '95', 'Sponsor Bonus', '2019-12-08 01:42', '253.8842'),
(437, 'Bet Win', '279', 'Bet Win', '2019-12-08 01:42', '525.98'),
(438, 'Commission Win', '96', 'Sponsor Bonus', '2019-12-08 01:44', '10.264'),
(439, 'Bet Win', '289', 'Bet Win', '2019-12-08 01:44', '686.136'),
(440, 'Commission Win', '97', 'Sponsor Bonus', '2019-12-08 01:44', '13.764'),
(441, 'Bet Win', '290', 'Bet Win', '2019-12-08 01:44', '1032.636'),
(442, 'Bet Win', '292', 'Bet Win', '2019-12-08 01:44', '164.9595'),
(443, 'Commission Win', '98', 'Sponsor Bonus', '2019-12-08 01:44', '52.47'),
(444, 'Bet Win', '293', 'Bet Win', '2019-12-08 01:44', '1053.31'),
(445, 'Commission Win', '99', 'Sponsor Bonus', '2019-12-08 01:44', '-0.6169'),
(446, 'Bet Win', '294', 'Bet Win', '2019-12-08 01:44', '708.9578'),
(447, 'Bet Win', '282', 'Bet Win', '2019-12-08 04:36', '279.562'),
(448, 'Commission Win', '100', 'Sponsor Bonus', '2019-12-08 04:36', '48.088'),
(449, 'Bet Win', '286', 'Bet Win', '2019-12-08 04:36', '524.518'),
(450, 'Bet Loss', '287', 'Bet Loss', '2019-12-08 04:43', '279.562'),
(451, 'Bet Loss', '288', 'Bet Loss', '2019-12-08 09:00', '279.562'),
(452, 'Bet Loss', '300', 'Bet Loss', '2019-12-08 09:00', '524.518'),
(453, 'Commission Win', '101', 'Sponsor Bonus', '2019-12-08 09:00', '10.85'),
(454, 'Bet Win', '297', 'Bet Win', '2019-12-08 09:00', '1090.93'),
(455, 'Commission Win', '102', 'Sponsor Bonus', '2019-12-08 09:00', '15.664'),
(456, 'Bet Win', '298', 'Bet Win', '2019-12-08 09:00', '990.736'),
(457, 'Withdraw', '12', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-08 09:47', '25.98'),
(458, 'Bet Win', '308', 'Bet Win', '2019-12-08 11:53', '263.222'),
(459, 'Bet Loss', '301', 'Bet Loss', '2019-12-08 12:59', '500.518'),
(460, 'Bet Loss', '305', 'Bet Loss', '2019-12-08 12:59', '130.8842'),
(461, 'Bet Loss', '307', 'Bet Loss', '2019-12-08 12:59', '144.9595'),
(462, 'Commission Win', '103', 'Sponsor Bonus', '2019-12-08 12:59', '20.984'),
(463, 'Bet Win', '291', 'Bet Win', '2019-12-08 12:59', '1327.416'),
(464, 'Commission Win', '104', 'Sponsor Bonus', '2019-12-08 12:59', '131.8342'),
(465, 'Bet Win', '295', 'Bet Win', '2019-12-08 12:59', '120.03'),
(466, 'Commission Win', '105', 'Sponsor Bonus', '2019-12-08 12:59', '15.6'),
(467, 'Bet Win', '296', 'Bet Win', '2019-12-08 12:59', '1561.18'),
(468, 'Commission Win', '106', 'Sponsor Bonus', '2019-12-08 12:59', '23.454'),
(469, 'Bet Win', '299', 'Bet Win', '2019-12-08 12:59', '1571.946'),
(470, 'Commission Win', '107', 'Sponsor Bonus', '2019-12-08 12:59', '12.6451'),
(471, 'Bet Win', '302', 'Bet Win', '2019-12-08 12:59', '1323.8958'),
(472, 'Commission Win', '108', 'Sponsor Bonus', '2019-12-08 12:59', '132.6322'),
(473, 'Bet Win', '303', 'Bet Win', '2019-12-08 12:59', '94.602'),
(474, 'Deposit', '51', 'Deposit By BKash ', '2019-12-08 01:05', '300'),
(475, 'Bet Win', '309', 'Bet Win', '2019-12-08 01:06', '312.227'),
(476, 'Bet Loss', '304', 'Bet Loss', '2019-12-08 01:06', '132.6322'),
(477, 'Bet Loss', '306', 'Bet Loss', '2019-12-08 01:06', '500.518'),
(478, 'Withdraw', '13', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-08 01:31', '10.8958'),
(479, 'Bet Loss', '312', 'Bet Loss', '2019-12-08 01:40', '1571.946'),
(480, 'Bet Loss', '316', 'Bet Loss', '2019-12-08 01:40', '10.8958'),
(481, 'Bet Win', '314', 'Bet Win', '2019-12-08 01:40', '69.2402'),
(482, 'Bet Loss', '324', 'Bet Loss', '2019-12-08 02:06', '10.2402'),
(483, 'Commission Win', '109', 'Sponsor Bonus', '2019-12-08 02:07', '25.204'),
(484, 'Bet Win', '318', 'Bet Win', '2019-12-08 02:07', '1374.196'),
(485, 'Bet Loss', '319', 'Bet Loss', '2019-12-08 02:07', '400.518'),
(486, 'Bet Loss', '323', 'Bet Loss', '2019-12-08 02:07', '100.9595'),
(487, 'Bet Loss', '325', 'Bet Loss', '2019-12-08 02:29', '10.2402'),
(488, 'Bet Loss', '320', 'Bet Loss', '2019-12-08 02:29', '1374.196'),
(489, 'Bet Loss', '322', 'Bet Loss', '2019-12-08 02:29', '57.9595'),
(490, 'Commission Win', '110', 'Sponsor Bonus', '2019-12-08 02:29', '49.138'),
(491, 'Bet Win', '321', 'Bet Win', '2019-12-08 02:29', '504.468'),
(492, 'Bet Loss', '332', 'Bet Loss', '2019-12-08 02:52', '10.9595'),
(493, 'Bet Loss', '333', 'Bet Loss', '2019-12-08 02:52', '874.196'),
(494, 'Bet Loss', '334', 'Bet Loss', '2019-12-08 02:53', '774.196'),
(495, 'Bet Loss', '336', 'Bet Loss', '2019-12-08 02:53', '10.9595'),
(496, 'Bet Loss', '338', 'Bet Loss', '2019-12-08 02:53', '1001.18'),
(497, 'Bet Loss', '344', 'Bet Loss', '2019-12-08 02:53', '400.468'),
(498, 'Bet Loss', '345', 'Bet Loss', '2019-12-08 02:53', '774.196'),
(499, 'Bet Loss', '335', 'Bet Loss', '2019-12-08 03:14', '750.196'),
(500, 'Bet Loss', '339', 'Bet Loss', '2019-12-08 03:14', '1001.18'),
(501, 'Bet Loss', '337', 'Bet Loss', '2019-12-08 03:16', '750.196'),
(502, 'Bet Loss', '340', 'Bet Loss', '2019-12-08 03:16', '1001.18'),
(503, 'Bet Loss', '343', 'Bet Loss', '2019-12-08 03:16', '400.468'),
(504, 'Bet Loss', '346', 'Bet Loss', '2019-12-08 03:16', '750.196'),
(505, 'Bet Loss', '342', 'Bet Loss', '2019-12-08 03:17', '901.18'),
(506, 'Bet Loss', '347', 'Bet Loss', '2019-12-08 03:17', '750.196'),
(507, 'Bet Loss', '348', 'Bet Loss', '2019-12-08 03:17', '10.602'),
(508, 'Bet Loss', '351', 'Bet Loss', '2019-12-08 03:17', '901.18'),
(509, 'Commission Win', '111', 'Sponsor Bonus', '2019-12-08 03:17', '50.013'),
(510, 'Bet Win', '352', 'Bet Win', '2019-12-08 03:18', '437.093'),
(511, 'Commission Win', '112', 'Sponsor Bonus', '2019-12-08 03:34', '11.0102'),
(512, 'Bet Win', '350', 'Bet Win', '2019-12-08 03:34', '86.832'),
(513, 'Bet Loss', '341', 'Bet Loss', '2019-12-08 03:34', '901.18'),
(514, 'Bet Loss', '349', 'Bet Loss', '2019-12-08 03:34', '86.832'),
(515, 'Commission Win', '113', 'Sponsor Bonus', '2019-12-08 03:58', '13.707'),
(516, 'Bet Win', '355', 'Bet Win', '2019-12-08 03:58', '737.805'),
(517, 'Bet Loss', '356', 'Bet Loss', '2019-12-08 03:58', '100.196'),
(518, 'Bet Loss', '357', 'Bet Loss', '2019-12-08 03:58', '100.196'),
(519, 'Bet Loss', '358', 'Bet Loss', '2019-12-08 04:24', '637.805'),
(520, 'Commission Win', '114', 'Sponsor Bonus', '2019-12-08 04:28', '26.779'),
(521, 'Bet Win', '359', 'Bet Win', '2019-12-08 04:28', '166.121'),
(522, 'Bet Loss', '360', 'Bet Loss', '2019-12-08 04:45', '635.805'),
(523, 'Commission Win', '115', 'Sponsor Bonus', '2019-12-08 04:46', '50.6255'),
(524, 'Bet Win', '361', 'Bet Win', '2019-12-08 04:46', '410.7305'),
(525, 'Bet Loss', '362', 'Bet Loss', '2019-12-08 04:49', '16.121'),
(526, 'Bet Loss', '363', 'Bet Loss', '2019-12-08 04:49', '485.805'),
(527, 'Bet Loss', '367', 'Bet Loss', '2019-12-08 05:02', '300.805'),
(528, 'Commission Win', '116', 'Sponsor Bonus', '2019-12-08 05:06', '50.9755'),
(529, 'Bet Win', '365', 'Bet Win', '2019-12-08 05:06', '445.3805'),
(530, 'Commission Win', '117', 'Sponsor Bonus', '2019-12-08 05:06', '16.332'),
(531, 'Bet Win', '366', 'Bet Win', '2019-12-08 05:06', '560.68'),
(532, 'Commission Win', '118', 'Sponsor Bonus', '2019-12-08 05:11', '51.6155'),
(533, 'Bet Win', '364', 'Bet Win', '2019-12-08 05:11', '473.7405'),
(534, 'Commission Win', '119', 'Sponsor Bonus', '2019-12-08 05:11', '18.332'),
(535, 'Bet Win', '368', 'Bet Win', '2019-12-08 05:11', '758.68'),
(536, 'Commission Win', '120', 'Sponsor Bonus', '2019-12-08 05:35', '20.082'),
(537, 'Bet Win', '370', 'Bet Win', '2019-12-08 05:35', '631.93'),
(538, 'Bet Loss', '371', 'Bet Loss', '2019-12-08 05:36', '450.7405'),
(539, 'Bet Loss', '374', 'Bet Loss', '2019-12-08 05:36', '60.9595'),
(540, 'Bet Loss', '369', 'Bet Loss', '2019-12-08 05:37', '450.7405'),
(541, 'Commission Win', '121', 'Sponsor Bonus', '2019-12-08 05:40', '0.85'),
(542, 'Bet Win', '313', 'Bet Win', '2019-12-08 05:40', '334.15'),
(543, 'Commission Win', '122', 'Sponsor Bonus', '2019-12-08 05:40', '12.9902'),
(544, 'Bet Win', '317', 'Bet Win', '2019-12-08 05:40', '206.05'),
(545, 'Bet Loss', '310', 'Bet Loss', '2019-12-08 05:41', '100'),
(546, 'Bet Loss', '311', 'Bet Loss', '2019-12-08 05:41', '100'),
(547, 'Bet Loss', '315', 'Bet Loss', '2019-12-08 05:41', '12.9902'),
(548, 'Deposit', '53', 'Deposit By BKash ', '2019-12-08 06:41', '300'),
(549, 'Deposit', '55', 'Deposit By BKash ', '2019-12-08 06:43', '516.121'),
(550, 'Deposit', '54', 'Deposit By BKash ', '2019-12-08 06:44', '0.00'),
(551, 'Bet Refund', '373', 'Bet Refund', '2019-12-08 07:14', '531.93'),
(552, 'Bet Refund', '372', 'Bet Refund', '2019-12-08 07:14', '40.9595'),
(553, 'Bet Refund', '375', 'Bet Refund', '2019-12-08 07:15', '200'),
(554, 'Bet Refund', '354', 'Bet Refund', '2019-12-08 07:15', '94.082'),
(555, 'Bet Loss', '377', 'Bet Loss', '2019-12-08 07:16', '531.93'),
(556, 'Commission Win', '123', 'Sponsor Bonus', '2019-12-08 07:16', '13.9152'),
(557, 'Bet Win', '376', 'Bet Win', '2019-12-08 07:16', '197.625'),
(558, 'Bet Win', '379', 'Bet Win', '2019-12-08 07:16', '95.9045'),
(559, 'Commission Win', '124', 'Sponsor Bonus', '2019-12-08 07:16', '14.8402'),
(560, 'Bet Win', '381', 'Bet Win', '2019-12-08 07:16', '289.2'),
(561, 'Bet Loss', '326', 'Bet Loss', '2019-12-08 07:20', '80'),
(562, 'Bet Loss', '327', 'Bet Loss', '2019-12-08 07:20', '80'),
(563, 'Bet Loss', '328', 'Bet Loss', '2019-12-08 07:20', '80'),
(564, 'Bet Loss', '329', 'Bet Loss', '2019-12-08 07:20', '80'),
(565, 'Bet Refund', '353', 'Bet Refund', '2019-12-08 07:33', '566.121'),
(566, 'Bet Loss', '388', 'Bet Loss', '2019-12-08 08:17', '130'),
(567, 'Bet Loss', '386', 'Bet Loss', '2019-12-08 08:17', '766.121'),
(568, 'Bet Loss', '384', 'Bet Loss', '2019-12-08 08:17', '400.7405'),
(569, 'Bet Loss', '389', 'Bet Loss', '2019-12-08 08:17', '766.121'),
(570, 'Bet Loss', '390', 'Bet Loss', '2019-12-08 08:17', '105.9045'),
(571, 'Bet Loss', '385', 'Bet Loss', '2019-12-08 08:56', '12.227'),
(572, 'Bet Loss', '393', 'Bet Loss', '2019-12-08 08:56', '131.93'),
(573, 'Bet Loss', '395', 'Bet Loss', '2019-12-08 09:26', '81.93'),
(574, 'Bet Loss', '398', 'Bet Loss', '2019-12-08 09:26', '80.9045'),
(575, 'Bet Loss', '402', 'Bet Loss', '2019-12-08 09:35', '275.7405'),
(576, 'Bet Loss', '404', 'Bet Loss', '2019-12-08 09:35', '11.93'),
(577, 'Commission Win', '125', 'Sponsor Bonus', '2019-12-08 09:43', '52.1155'),
(578, 'Bet Win', '405', 'Bet Win', '2019-12-08 09:43', '250.2405'),
(579, 'Bet Win', '407', 'Bet Win', '2019-12-08 09:43', '80.5045'),
(580, 'Bet Loss', '403', 'Bet Loss', '2019-12-08 09:54', '250.2405'),
(581, 'Bet Loss', '408', 'Bet Loss', '2019-12-08 09:54', '60.5045'),
(582, 'Bet Win', '391', 'Bet Win', '2019-12-08 09:59', '243.55'),
(583, 'Bet Win', '392', 'Bet Win', '2019-12-08 09:59', '387.1'),
(584, 'Commission Win', '126', 'Sponsor Bonus', '2019-12-08 09:59', '96.982'),
(585, 'Bet Win', '394', 'Bet Win', '2019-12-08 09:59', '299.03'),
(586, 'Bet Loss', '409', 'Bet Loss', '2019-12-08 10:00', '250.2405'),
(587, 'Bet Loss', '411', 'Bet Loss', '2019-12-08 10:00', '60.5045'),
(588, 'Bet Refund', '330', 'Bet Refund', '2019-12-08 10:34', '80.5045'),
(589, 'Bet Refund', '331', 'Bet Refund', '2019-12-08 10:34', '103.5045'),
(590, 'Bet Refund', '425', 'Bet Refund', '2019-12-09 01:36', '99.03'),
(591, 'Bet Refund', '424', 'Bet Refund', '2019-12-09 01:37', '149.03'),
(592, 'Bet Refund', '423', 'Bet Refund', '2019-12-09 01:37', '199.03'),
(593, 'Bet Refund', '422', 'Bet Refund', '2019-12-09 01:37', '100.2405'),
(594, 'Bet Loss', '400', 'Bet Loss', '2019-12-09 01:39', '250'),
(595, 'Commission Win', '127', 'Sponsor Bonus', '2019-12-09 01:39', '99.582'),
(596, 'Bet Win', '378', 'Bet Win', '2019-12-09 01:39', '456.43'),
(597, 'Bet Win', '380', 'Bet Win', '2019-12-09 01:39', '154.9845'),
(598, 'Bet Win', '382', 'Bet Win', '2019-12-09 01:39', '269.627'),
(599, 'Bet Win', '383', 'Bet Win', '2019-12-09 01:39', '398.327'),
(600, 'Commission Win', '128', 'Sponsor Bonus', '2019-12-09 01:39', '2.15'),
(601, 'Bet Win', '387', 'Bet Win', '2019-12-09 01:39', '228.7'),
(602, 'Bet Loss', '415', 'Bet Loss', '2019-12-09 01:40', '456.43'),
(603, 'Bet Loss', '410', 'Bet Loss', '2019-12-09 01:41', '100.2405'),
(604, 'Bet Loss', '412', 'Bet Loss', '2019-12-09 01:41', '40'),
(605, 'Bet Loss', '413', 'Bet Loss', '2019-12-09 01:41', '40'),
(606, 'Bet Loss', '418', 'Bet Loss', '2019-12-09 01:41', '10.2'),
(607, 'Bet Win', '414', 'Bet Win', '2019-12-09 01:41', '523.7'),
(608, 'Commission Win', '129', 'Sponsor Bonus', '2019-12-09 01:41', '54.2405'),
(609, 'Bet Win', '421', 'Bet Win', '2019-12-09 01:41', '310.6155'),
(610, 'Bet Loss', '419', 'Bet Loss', '2019-12-09 01:41', '50'),
(611, 'Bet Loss', '396', 'Bet Loss', '2019-12-09 01:41', '310.6155'),
(612, 'Bet Loss', '397', 'Bet Loss', '2019-12-09 01:42', '10.2'),
(613, 'Bet Loss', '399', 'Bet Loss', '2019-12-09 01:42', '10.121'),
(614, 'Bet Loss', '401', 'Bet Loss', '2019-12-09 01:42', '250'),
(615, 'Bet Loss', '406', 'Bet Loss', '2019-12-09 01:42', '456.43'),
(616, 'Bet Loss', '416', 'Bet Loss', '2019-12-09 05:40', '310.6155'),
(617, 'Commission Win', '130', 'Sponsor Bonus', '2019-12-09 05:41', '2.6'),
(618, 'Bet Win', '417', 'Bet Win', '2019-12-09 05:41', '273.25'),
(619, 'Commission Win', '131', 'Sponsor Bonus', '2019-12-09 05:41', '34.129'),
(620, 'Bet Win', '420', 'Bet Win', '2019-12-09 05:41', '737.771'),
(621, 'Withdraw', '14', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-09 10:12', '23.7'),
(622, 'Deposit', '61', 'Deposit By BKash ', '2019-12-09 01:30', '300'),
(623, 'Deposit', '60', 'Deposit By BKash ', '2019-12-09 01:37', '523.7'),
(624, 'Bet Refund', '433', 'Bet Refund', '2019-12-09 04:33', '154.9845'),
(625, 'Deposit', '63', 'Deposit By BKash ', '2019-12-09 07:05', '510.8958'),
(626, 'Bet Refund', '437', 'Bet Refund', '2019-12-09 07:51', '537.771'),
(627, 'Bet Loss', '432', 'Bet Loss', '2019-12-09 08:50', '150.327'),
(628, 'Bet Loss', '445', 'Bet Loss', '2019-12-09 08:50', '10.43'),
(629, 'Commission Win', '132', 'Sponsor Bonus', '2019-12-09 08:50', '54.7405'),
(630, 'Bet Win', '450', 'Bet Win', '2019-12-09 08:50', '250.1155'),
(631, 'Deposit', '65', 'Deposit By BKash ', '2019-12-09 09:08', '1000'),
(632, 'Commission Win', '133', 'Sponsor Bonus', '2019-12-09 09:22', '4.51'),
(633, 'Bet Win', '440', 'Bet Win', '2019-12-09 09:22', '292.34'),
(634, 'Commission Win', '134', 'Sponsor Bonus', '2019-12-09 09:22', '11.537'),
(635, 'Bet Win', '446', 'Bet Win', '2019-12-09 09:22', '104.975'),
(636, 'Commission Win', '135', 'Sponsor Bonus', '2019-12-09 09:22', '55.6955'),
(637, 'Bet Win', '448', 'Bet Win', '2019-12-09 09:22', '344.6605'),
(638, 'Commission Win', '136', 'Sponsor Bonus', '2019-12-09 09:22', '16.5401'),
(639, 'Bet Win', '456', 'Bet Win', '2019-12-09 09:22', '179.8271'),
(640, 'Commission Win', '137', 'Sponsor Bonus', '2019-12-09 09:22', '36.7457'),
(641, 'Bet Win', '457', 'Bet Win', '2019-12-09 09:22', '659.8243'),
(642, 'Bet Loss', '428', 'Bet Loss', '2019-12-09 09:22', '150.327'),
(643, 'Bet Loss', '439', 'Bet Loss', '2019-12-09 09:22', '22.9845'),
(644, 'Bet Loss', '453', 'Bet Loss', '2019-12-09 09:22', '10.8958'),
(645, 'Commission Win', '138', 'Sponsor Bonus', '2019-12-09 10:00', '40.2457'),
(646, 'Bet Win', '438', 'Bet Win', '2019-12-09 10:00', '1006.3243'),
(647, 'Bet Loss', '434', 'Bet Loss', '2019-12-09 10:00', '22.9845'),
(648, 'Bet Loss', '435', 'Bet Loss', '2019-12-09 10:00', '22.9845'),
(649, 'Bet Loss', '449', 'Bet Loss', '2019-12-09 10:00', '104.975'),
(650, 'Bet Loss', '451', 'Bet Loss', '2019-12-09 10:00', '344.6605'),
(651, 'Bet Loss', '431', 'Bet Loss', '2019-12-09 10:00', '23.7'),
(652, 'Bet Loss', '442', 'Bet Loss', '2019-12-09 10:00', '292.34'),
(653, 'Bet Loss', '443', 'Bet Loss', '2019-12-09 10:00', '104.975'),
(654, 'Bet Loss', '447', 'Bet Loss', '2019-12-09 10:00', '104.975'),
(655, 'Bet Loss', '452', 'Bet Loss', '2019-12-09 10:00', '10.8958'),
(656, 'Bet Loss', '454', 'Bet Loss', '2019-12-09 10:00', '22.9845'),
(657, 'Bet Loss', '430', 'Bet Loss', '2019-12-09 10:02', '150.327'),
(658, 'Bet Loss', '455', 'Bet Loss', '2019-12-09 10:02', '344.6605'),
(659, 'Withdraw', '15', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-09 10:16', '206.3243'),
(660, 'Commission Win', '139', 'Sponsor Bonus', '2019-12-09 11:30', '56.9555'),
(661, 'Bet Win', '427', 'Bet Win', '2019-12-09 11:30', '425.4005'),
(662, 'Bet Win', '436', 'Bet Win', '2019-12-09 11:30', '64.5645'),
(663, 'Commission Win', '140', 'Sponsor Bonus', '2019-12-09 11:30', '5.56'),
(664, 'Bet Win', '441', 'Bet Win', '2019-12-09 11:30', '296.29'),
(665, 'Commission Win', '141', 'Sponsor Bonus', '2019-12-09 11:30', '12.0031'),
(666, 'Bet Win', '444', 'Bet Win', '2019-12-09 11:30', '128.399'),
(667, 'Deposit', '66', 'Deposit By BKash ', '2019-12-09 11:44', '410.8958'),
(668, 'Bet Loss', '429', 'Bet Loss', '2019-12-10 12:00', '100.327'),
(669, 'Bet Loss', '469', 'Bet Loss', '2019-12-10 12:00', '16.3243'),
(670, 'Bet Win', '426', 'Bet Win', '2019-12-10 12:00', '56.63'),
(671, 'Commission Win', '142', 'Sponsor Bonus', '2019-12-10 12:00', '17.8166'),
(672, 'Bet Win', '459', 'Bet Win', '2019-12-10 12:00', '138.3766'),
(673, 'Commission Win', '143', 'Sponsor Bonus', '2019-12-10 12:00', '68.2645'),
(674, 'Bet Win', '460', 'Bet Win', '2019-12-10 12:00', '466.3'),
(675, 'Commission Win', '144', 'Sponsor Bonus', '2019-12-10 12:00', '139.3016'),
(676, 'Bet Win', '464', 'Bet Win', '2019-12-10 12:00', '219.974'),
(677, 'Commission Win', '145', 'Sponsor Bonus', '2019-12-10 12:00', '57.7695'),
(678, 'Bet Win', '466', 'Bet Win', '2019-12-10 12:00', '505.9865'),
(679, 'Commission Win', '146', 'Sponsor Bonus', '2019-12-10 12:00', '6.485'),
(680, 'Bet Win', '467', 'Bet Win', '2019-12-10 12:00', '237.865'),
(681, 'Bet Loss', '458', 'Bet Loss', '2019-12-10 02:13', '100.3016'),
(682, 'Bet Loss', '462', 'Bet Loss', '2019-12-10 02:13', '10'),
(683, 'Bet Loss', '463', 'Bet Loss', '2019-12-10 02:13', '10'),
(684, 'Bet Loss', '468', 'Bet Loss', '2019-12-10 02:13', '237.865'),
(685, 'Bet Loss', '470', 'Bet Loss', '2019-12-10 02:13', '237.865'),
(686, 'Bet Loss', '472', 'Bet Loss', '2019-12-10 02:13', '466.3'),
(687, 'Bet Loss', '473', 'Bet Loss', '2019-12-10 02:13', '466.3'),
(688, 'Commission Win', '147', 'Sponsor Bonus', '2019-12-10 02:14', '101.1186'),
(689, 'Bet Win', '465', 'Bet Win', '2019-12-10 02:14', '180.857'),
(690, 'Commission Win', '148', 'Sponsor Bonus', '2019-12-10 02:14', '20.2451'),
(691, 'Bet Win', '474', 'Bet Win', '2019-12-10 02:14', '763.2958'),
(692, 'Bet Loss', '461', 'Bet Loss', '2019-12-10 04:57', '100.327'),
(693, 'Bet Loss', '475', 'Bet Loss', '2019-12-10 04:57', '400.9865'),
(694, 'Bet Loss', '479', 'Bet Loss', '2019-12-10 04:57', '180.857'),
(695, 'Commission Win', '149', 'Sponsor Bonus', '2019-12-10 04:57', '7.26'),
(696, 'Bet Win', '471', 'Bet Win', '2019-12-10 04:57', '314.59'),
(697, 'Commission Win', '150', 'Sponsor Bonus', '2019-12-10 04:57', '58.2295'),
(698, 'Bet Win', '477', 'Bet Win', '2019-12-10 04:57', '446.5265'),
(699, 'Bet Loss', '481', 'Bet Loss', '2019-12-10 04:58', '101.1186'),
(700, 'Bet Loss', '476', 'Bet Loss', '2019-12-10 04:58', '446.5265'),
(701, 'Bet Loss', '478', 'Bet Loss', '2019-12-10 04:58', '180.857'),
(702, 'Bet Loss', '480', 'Bet Loss', '2019-12-10 04:58', '180.857'),
(703, 'Bet Refund', '486', 'Bet Refund', '2019-12-10 11:35', '255.2958'),
(704, 'Bet Refund', '485', 'Bet Refund', '2019-12-10 11:36', '214.59'),
(705, 'Bet Refund', '486', 'Bet Refund', '2019-12-10 11:36', '500.2958'),
(706, 'Bet Refund', '483', 'Bet Refund', '2019-12-10 11:36', '80.327'),
(707, 'Bet Refund', '484', 'Bet Refund', '2019-12-10 11:37', '314.59'),
(708, 'Withdraw', '16', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-10 11:45', '500.2958'),
(709, 'Bet Refund', '482', 'Bet Refund', '2019-12-10 01:37', '100.327'),
(710, 'Deposit', '67', 'Deposit By BKash ', '2019-12-10 04:58', '916.3'),
(711, 'Withdraw', '18', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2019-12-10 05:35', '16.3'),
(712, 'Deposit', '68', 'Deposit By BKash ', '2019-12-10 05:48', '500'),
(713, 'Commission Win', '151', 'Sponsor Bonus', '2019-12-10 08:26', '59.0345'),
(714, 'Bet Win', '487', 'Bet Win', '2019-12-10 08:26', '351.2215'),
(715, 'Bet Refund', '495', 'Bet Refund', '2019-12-10 09:21', '252.2958'),
(716, 'Bet Refund', '509', 'Bet Refund', '2019-12-10 09:44', '252.2958'),
(717, 'Bet Refund', '508', 'Bet Refund', '2019-12-10 09:45', '150');
INSERT INTO `tbl_transaction` (`transaction_id`, `type`, `detail_id`, `description`, `transaction_date`, `user_balance`) VALUES
(718, 'Bet Refund', '507', 'Bet Refund', '2019-12-10 09:45', '90.8166'),
(719, 'Bet Refund', '504', 'Bet Refund', '2019-12-10 09:46', '50.327'),
(720, 'Bet Refund', '503', 'Bet Refund', '2019-12-10 09:46', '100.327'),
(721, 'Bet Refund', '498', 'Bet Refund', '2019-12-10 09:47', '40.857'),
(722, 'Bet Refund', '491', 'Bet Refund', '2019-12-10 09:47', '409.2215'),
(723, 'Bet Refund', '489', 'Bet Refund', '2019-12-10 09:48', '250'),
(724, 'Bet Refund', '490', 'Bet Refund', '2019-12-10 09:49', '459.2215'),
(725, 'Bet Refund', '510', 'Bet Refund', '2019-12-10 10:12', '40.857'),
(726, 'Bet Refund', '500', 'Bet Refund', '2019-12-10 10:13', '60.857'),
(727, 'Bet Refund', '492', 'Bet Refund', '2019-12-10 10:14', '56.63'),
(728, 'Bet Refund', '506', 'Bet Refund', '2019-12-10 10:36', '117.8166'),
(729, 'Bet Refund', '505', 'Bet Refund', '2019-12-10 10:37', '217.8166'),
(730, 'Bet Refund', '502', 'Bet Refund', '2019-12-10 10:38', '130.857'),
(731, 'Bet Refund', '499', 'Bet Refund', '2019-12-10 10:38', '416.3243'),
(732, 'Bet Refund', '496', 'Bet Refund', '2019-12-10 10:39', '68.2645'),
(733, 'Bet Refund', '497', 'Bet Refund', '2019-12-10 10:39', '430.2215'),
(734, 'Bet Refund', '493', 'Bet Refund', '2019-12-10 10:40', '314.59'),
(735, 'Bet Refund', '488', 'Bet Refund', '2019-12-10 10:41', '180.857'),
(736, 'Bet Refund', '494', 'Bet Refund', '2019-12-10 10:42', '101.1186'),
(737, 'Bet Refund', '494', 'Bet Refund', '2019-12-10 10:42', '192.1186'),
(738, 'Commission Win', '152', 'Sponsor Bonus', '2019-12-11 05:14', '23.3911'),
(739, 'Bet Win', '513', 'Bet Win', '2019-12-11 05:14', '321.7498'),
(740, 'Bet Loss', '514', 'Bet Loss', '2019-12-11 05:14', '10.327'),
(741, 'Bet Loss', '511', 'Bet Loss', '2019-12-11 05:14', '200.2215'),
(742, 'Bet Loss', '515', 'Bet Loss', '2019-12-11 05:15', '11.3243'),
(743, 'Bet Loss', '518', 'Bet Loss', '2019-12-11 05:15', '200.2215'),
(744, 'Bet Win', '501', 'Bet Win', '2019-12-11 05:16', '454.65'),
(745, 'Bet Loss', '516', 'Bet Loss', '2019-12-11 05:16', '10'),
(746, 'Bet Loss', '517', 'Bet Loss', '2019-12-11 05:17', '16.63'),
(747, 'Commission Win', '153', 'Sponsor Bonus', '2019-12-11 05:18', '59.472'),
(748, 'Bet Win', '512', 'Bet Win', '2019-12-11 05:18', '243.534'),
(749, 'Deposit', '71', 'Deposit By BKash ', '2019-12-11 11:21', '310.327'),
(750, 'Deposit', '72', 'Deposit By BKash ', '2019-12-16 05:58', '500'),
(751, 'Bet Win', '534', 'Bet Win', '2019-12-16 06:12', '526.032'),
(752, 'Withdraw', '19', 'Withdraw By ', '2019-12-16 06:15', '526.032'),
(753, 'Deposit', '73', 'Deposit By Rocket', '2019-12-17 10:18', '1000'),
(754, 'Deposit', '74', 'Deposit By BKash ', '2019-12-23 09:46', '700'),
(755, 'Commission Win', '154', 'Sponsor Bonus', '2019-12-23 09:49', '9.66'),
(756, 'Bet Win', '522', 'Bet Win', '2019-12-23 09:49', '257.6'),
(757, 'Commission Win', '155', 'Sponsor Bonus', '2019-12-23 09:51', '219.4816'),
(758, 'Bet Win', '521', 'Bet Win', '2019-12-23 09:51', '174.9536'),
(759, 'Deposit', '75', 'Deposit By Bkash Personal', '2019-12-30 12:03', '400'),
(760, 'Deposit', '76', 'Deposit By Bkash Personal', '2019-12-30 12:08', '300'),
(761, 'Commission Win', '156', 'Sponsor Bonus', '2019-12-30 12:14', '6.8'),
(762, 'Bet Win', '538', 'Bet Win', '2019-12-30 12:14', '773.2'),
(763, 'Deposit', '77', 'Deposit By Bkash Personal', '2019-12-30 12:39', '400'),
(764, 'Bet Win', '537', 'Bet Win', '2019-12-30 12:40', '1436.5'),
(765, 'Commission Win', '157', 'Sponsor Bonus', '2019-12-30 12:40', '782.2'),
(766, 'Bet Win', '539', 'Bet Win', '2019-12-30 12:40', '1091'),
(767, 'Commission Win', '158', 'Sponsor Bonus', '2019-12-30 12:43', '784.5'),
(768, 'Bet Win', '540', 'Bet Win', '2019-12-30 12:43', '1218.7'),
(769, 'Bet Loss', '541', 'Bet Loss', '2019-12-30 12:46', '918.7'),
(770, 'Bet Win', '542', 'Bet Win', '2019-12-30 12:52', '2713.5'),
(771, 'Deposit', '78', 'Deposit By Bkash Personal', '2019-12-30 01:01', '500'),
(772, 'Commission Win', '159', 'Sponsor Bonus', '2019-12-30 01:03', '791.3'),
(773, 'Bet Win', '543', 'Bet Win', '2019-12-30 01:03', '973.2'),
(774, 'Bet Refund', '543', 'Bet Refund', '2019-12-30 05:28', '1173.2'),
(775, 'Bet Refund', '543', 'Bet Refund', '2019-12-30 05:29', '1373.2'),
(776, 'Deposit', '79', 'Deposit By Bkash Personal', '2020-01-10 10:40', '5000'),
(777, 'Commission', '160', 'Sponsor Bonus', '2020-01-10 10:40', '25.8'),
(778, 'Commission', '161', 'Sponsor Bonus', '2020-01-10 10:40', '44.8'),
(779, 'Commission', '162', 'Sponsor Bonus', '2020-01-10 10:43', '136'),
(780, 'Commission', '163', 'Sponsor Bonus', '2020-01-10 11:07', '20095'),
(781, 'Commission', '164', 'Sponsor Bonus', '2020-01-10 11:08', '20231.8'),
(782, 'Withdraw', '20', 'Withdraw By BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '2020-01-10 11:08', '2000'),
(783, 'Commission', '165', 'Sponsor Bonus', '2020-01-11 09:23', '20240.8'),
(784, 'Commission', '166', 'Sponsor Bonus', '2020-01-11 09:23', '20249.8'),
(785, 'Commission', '167', 'Sponsor Bonus', '2020-01-11 09:23', '20258.8'),
(786, 'Commission', '168', 'Sponsor Bonus', '2020-01-11 09:23', '20260.6'),
(787, 'Commission Win', '169', 'Sponsor Bonus', '2020-01-11 09:30', '117'),
(788, 'Return win', '544', 'Return by Admin', '2020-01-11 09:30', '-900'),
(789, 'Commission Win', '170', 'Sponsor Bonus', '2020-01-11 09:30', '98'),
(790, 'Return win', '545', 'Return by Admin', '2020-01-11 09:30', '-2800'),
(791, 'Commission Win', '171', 'Sponsor Bonus', '2020-01-11 09:30', '11165.6'),
(792, 'Return win', '547', 'Return by Admin', '2020-01-11 09:30', '-9100'),
(793, 'Bet Loss', '546', 'Bet Loss', '2020-01-11 09:30', '-2800'),
(794, 'Bet Loss', '548', 'Bet Loss', '2020-01-11 09:30', '-9100'),
(795, 'Return win', '555', 'Return by Admin', '2020-01-11 09:30', '2165.6'),
(796, 'Bet Win', '549', 'Bet Win', '2020-01-11 09:30', '-8200'),
(797, 'Bet Win', '550', 'Bet Win', '2020-01-11 09:30', '-7300'),
(798, 'Bet Win', '551', 'Bet Win', '2020-01-11 09:30', '-6400'),
(799, 'Bet Loss', '552', 'Bet Loss', '2020-01-11 09:30', '-6400'),
(800, 'Deposit', '68', 'Deposit By BKash ', '2020-01-12 06:30', '1000'),
(801, 'Deposit', '79', 'Deposit By Bkash Personal', '2020-01-12 06:30', '2200'),
(802, 'Deposit', '79', 'Deposit By Bkash Personal', '2020-01-12 06:30', '7200'),
(803, 'Deposit', '79', 'Deposit By Bkash Personal', '2020-01-12 06:31', '12200'),
(804, 'Deposit', '79', 'Deposit By Bkash Personal', '2020-01-12 06:31', '17200'),
(805, 'Commission', '172', 'Sponsor Bonus', '2020-01-12 02:40', '103'),
(806, 'Bet Win', '554', 'Bet Win', '2020-01-12 02:42', '9065.6'),
(807, 'Bet Win', '556', 'Bet Win', '2020-01-12 02:42', '1441.3'),
(808, 'Deposit', '80', 'Deposit By Bkash Personal', '2020-01-12 04:21', '500'),
(809, 'Deposit', '81', 'Deposit By Bkash Personal', '2020-01-12 04:28', '510'),
(810, 'Deposit', '82', 'Deposit By Bkash Personal', '2020-01-15 07:05', '5010'),
(811, 'Return win', '561', 'Return by Admin', '2020-01-15 09:56', '5550'),
(812, 'Return win', '561', 'Return by Admin', '2020-01-15 09:56', '10300'),
(813, 'Bet Loss', '557', 'Bet Loss', '2020-01-15 09:58', '300'),
(814, 'Bet Loss', '558', 'Bet Loss', '2020-01-15 09:58', '10'),
(815, 'Bet Loss', '559', 'Bet Loss', '2020-01-15 09:58', '10300'),
(816, 'Return win', '561', 'Return by Admin', '2020-01-15 09:59', '15050'),
(817, 'Return win', '562', 'Return by Admin', '2020-01-15 10:02', '14800'),
(818, 'Deposit', '83', 'Deposit By Bkash Personal', '2020-03-04 12:01', '500'),
(819, 'Deposit', '84', 'Deposit By Bkash Personal', '2020-03-07 05:15', '900'),
(820, 'Deposit', '86', 'Deposit By Bkash Personal', '2020-03-10 01:36', '1500'),
(821, 'Deposit', '87', 'Deposit By Bkash Personal', '2020-03-10 02:19', '1755'),
(822, 'Deposit', '87', 'Deposit By Bkash Personal', '2020-03-10 02:23', '3010'),
(823, 'Deposit', '92', 'Deposit By Bkash Personal', '2020-03-11 02:56', '850'),
(824, 'Deposit', '88', 'Deposit By 01406685673', '2020-03-11 02:56', '1100'),
(825, 'Deposit', '95', 'Deposit By Bkash Personal', '2020-03-12 11:45', '700'),
(826, 'Deposit', '102', 'Deposit By Bkash Personal', '2020-03-14 04:41', '95500'),
(827, 'Withdraw', '23', 'Withdraw By 23', '2020-03-15 11:58', ''),
(828, 'Withdraw', '23', 'Withdraw By 23', '2020-03-15 11:59', ''),
(829, 'Withdraw', '23', 'Withdraw By 23', '2020-03-15 12:02', ''),
(830, 'Deposit', '101', 'Deposit By Bkash Personal', '2020-03-28 06:24', '90408'),
(831, 'Return win', '662', 'Return by Admin', '2020-03-28 07:06', '90598'),
(832, 'Deposit', '103', 'Deposit By Bkash Personal', '2020-04-08 11:08', '5764'),
(833, 'Deposit', '104', 'Deposit By Bkash Personal', '2020-04-08 11:08', '5874'),
(834, 'Bet Loss', '669', 'Bet Loss', '2020-04-08 11:14', '2865'),
(835, 'Bet Loss', '670', 'Bet Loss', '2020-04-08 11:14', '5874'),
(836, 'Bet Loss', '671', 'Bet Loss', '2020-04-08 11:14', '5874'),
(837, 'Bet Loss', '672', 'Bet Loss', '2020-04-08 11:14', '5874'),
(838, 'Bet Loss', '673', 'Bet Loss', '2020-04-08 11:14', '5874'),
(839, 'Bet Win', '674', 'Bet Win', '2020-04-08 11:23', '6064'),
(840, 'Bet Win', '675', 'Bet Win', '2020-04-09 12:24', '6550'),
(841, 'Bet Win', '676', 'Bet Win', '2020-04-09 12:33', '6500'),
(842, 'Bet Win', '677', 'Bet Win', '2020-04-09 12:33', '8450');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfer_list`
--

CREATE TABLE `tbl_transfer_list` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `cash_out` varchar(255) NOT NULL,
  `cash_in` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transfer_list`
--

INSERT INTO `tbl_transfer_list` (`id`, `user_id`, `description`, `notes`, `cash_out`, `cash_in`, `date`) VALUES
(5, 201, 'Admin give', 'test', '', '20', '2020-03-17  22:15 PM'),
(6, 201, 'Admin return', 'test return', '50', '', '2020-03-17  22:18 PM'),
(7, 201, 'Admin return', 'test return two', '20', '', '2020-03-17  22:19 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(1, 'God Slayer', 'limon@gmail.com', '666666666', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'Super admin', '1'),
(421, 'mamun', 'mamun@gmail.com', '01533592610', 'e10adc3949ba59abbe56e057f20f883e', ' ', 'Deposite', '1'),
(422, 'withdraw', 'withdraw@gmail.com', '01533592620', 'e10adc3949ba59abbe56e057f20f883e', ' ', 'Withdraw', '1'),
(423, 'game', 'game@gmail.com', '01533592610', 'e10adc3949ba59abbe56e057f20f883e', ' ', 'Game', '1'),
(424, 'game live', 'live@gmail.com', '01533592620', 'e10adc3949ba59abbe56e057f20f883e', ' ', 'Live', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `description`, `link`, `status`) VALUES
(1, 'Bangladesh VS Indias', 'https://www.youtube.com/embed/E7UEDATmt64', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdraw`
--

CREATE TABLE `tbl_withdraw` (
  `withdraw_id` int(10) NOT NULL,
  `request_by` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `send_to` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `withdraw_note` varchar(100) DEFAULT NULL,
  `withdraw_status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_withdraw`
--

INSERT INTO `tbl_withdraw` (`withdraw_id`, `request_by`, `amount`, `method`, `send_to`, `account_type`, `date`, `withdraw_note`, `withdraw_status`) VALUES
(22, '199', '23', '23', '23', '23', '23', '2', '1'),
(24, '201', '54', 'BKASH   (????????)', 'dgdf', 'Agent', '2020-03-15 01:38', NULL, '0'),
(25, '202', '990', 'BKASH   (à¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶)', '09974321', 'Personal', '2020-04-08 10:49', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdraw_limit`
--

CREATE TABLE `tbl_withdraw_limit` (
  `id` int(11) NOT NULL,
  `minimum_amount` int(250) NOT NULL,
  `maximum_amount` int(250) NOT NULL,
  `status` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_withdraw_limit`
--

INSERT INTO `tbl_withdraw_limit` (`id`, `minimum_amount`, `maximum_amount`, `status`) VALUES
(1, 50, 100, 1),
(2, 1000, 10000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multi_bet_info`
--
ALTER TABLE `multi_bet_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_bet`
--
ALTER TABLE `tbl_bet`
  ADD PRIMARY KEY (`bet_id`);

--
-- Indexes for table `tbl_club`
--
ALTER TABLE `tbl_club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `tbl_club_owner`
--
ALTER TABLE `tbl_club_owner`
  ADD PRIMARY KEY (`club_owner_id`);

--
-- Indexes for table `tbl_club_owner_balance_transfer`
--
ALTER TABLE `tbl_club_owner_balance_transfer`
  ADD PRIMARY KEY (`club_owner_balance_transfer_id`);

--
-- Indexes for table `tbl_club_owner_deposit`
--
ALTER TABLE `tbl_club_owner_deposit`
  ADD PRIMARY KEY (`club_owner_deposit_id`);

--
-- Indexes for table `tbl_club_owner_message`
--
ALTER TABLE `tbl_club_owner_message`
  ADD PRIMARY KEY (`club_owner_message_id`);

--
-- Indexes for table `tbl_club_owner_transaction`
--
ALTER TABLE `tbl_club_owner_transaction`
  ADD PRIMARY KEY (`club_owner_transaction_id`);

--
-- Indexes for table `tbl_club_owner_withdraw`
--
ALTER TABLE `tbl_club_owner_withdraw`
  ADD PRIMARY KEY (`club_owner_withdraw_id`);

--
-- Indexes for table `tbl_commission`
--
ALTER TABLE `tbl_commission`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `tbl_contact_message`
--
ALTER TABLE `tbl_contact_message`
  ADD PRIMARY KEY (`contact_message_id`);

--
-- Indexes for table `tbl_contact_number`
--
ALTER TABLE `tbl_contact_number`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_deposit`
--
ALTER TABLE `tbl_deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `tbl_deposite_limit`
--
ALTER TABLE `tbl_deposite_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_game`
--
ALTER TABLE `tbl_game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `tbl_home_color`
--
ALTER TABLE `tbl_home_color`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_message_received`
--
ALTER TABLE `tbl_message_received`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_referral`
--
ALTER TABLE `tbl_referral`
  ADD PRIMARY KEY (`referral_id`);

--
-- Indexes for table `tbl_scroll`
--
ALTER TABLE `tbl_scroll`
  ADD PRIMARY KEY (`scroll_id`);

--
-- Indexes for table `tbl_sponsor`
--
ALTER TABLE `tbl_sponsor`
  ADD PRIMARY KEY (`sponsor-id`);

--
-- Indexes for table `tbl_stake`
--
ALTER TABLE `tbl_stake`
  ADD PRIMARY KEY (`stake_id`);

--
-- Indexes for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_transfer_list`
--
ALTER TABLE `tbl_transfer_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_withdraw`
--
ALTER TABLE `tbl_withdraw`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- Indexes for table `tbl_withdraw_limit`
--
ALTER TABLE `tbl_withdraw_limit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multi_bet_info`
--
ALTER TABLE `multi_bet_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bet`
--
ALTER TABLE `tbl_bet`
  MODIFY `bet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=686;

--
-- AUTO_INCREMENT for table `tbl_club`
--
ALTER TABLE `tbl_club`
  MODIFY `club_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_club_owner`
--
ALTER TABLE `tbl_club_owner`
  MODIFY `club_owner_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_club_owner_balance_transfer`
--
ALTER TABLE `tbl_club_owner_balance_transfer`
  MODIFY `club_owner_balance_transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_club_owner_deposit`
--
ALTER TABLE `tbl_club_owner_deposit`
  MODIFY `club_owner_deposit_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_club_owner_message`
--
ALTER TABLE `tbl_club_owner_message`
  MODIFY `club_owner_message_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_club_owner_transaction`
--
ALTER TABLE `tbl_club_owner_transaction`
  MODIFY `club_owner_transaction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_club_owner_withdraw`
--
ALTER TABLE `tbl_club_owner_withdraw`
  MODIFY `club_owner_withdraw_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_commission`
--
ALTER TABLE `tbl_commission`
  MODIFY `commission_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `tbl_contact_message`
--
ALTER TABLE `tbl_contact_message`
  MODIFY `contact_message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tbl_contact_number`
--
ALTER TABLE `tbl_contact_number`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_deposit`
--
ALTER TABLE `tbl_deposit`
  MODIFY `deposit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_deposite_limit`
--
ALTER TABLE `tbl_deposite_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_game`
--
ALTER TABLE `tbl_game`
  MODIFY `game_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tbl_home_color`
--
ALTER TABLE `tbl_home_color`
  MODIFY `function_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `tbl_message_received`
--
ALTER TABLE `tbl_message_received`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_sent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_referral`
--
ALTER TABLE `tbl_referral`
  MODIFY `referral_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_scroll`
--
ALTER TABLE `tbl_scroll`
  MODIFY `scroll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sponsor`
--
ALTER TABLE `tbl_sponsor`
  MODIFY `sponsor-id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stake`
--
ALTER TABLE `tbl_stake`
  MODIFY `stake_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1093;

--
-- AUTO_INCREMENT for table `tbl_terms`
--
ALTER TABLE `tbl_terms`
  MODIFY `terms_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

--
-- AUTO_INCREMENT for table `tbl_transfer_list`
--
ALTER TABLE `tbl_transfer_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_withdraw`
--
ALTER TABLE `tbl_withdraw`
  MODIFY `withdraw_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_withdraw_limit`
--
ALTER TABLE `tbl_withdraw_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
