-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2026 at 06:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `role` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `affected` varchar(100) NOT NULL,
  `is_open` int(5) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `uid`, `role`, `action`, `affected`, `is_open`, `time`) VALUES
(1, 3, 'admin', 'logged in', '', 1, '2026-08-05 12:38:55'),
(2, 1, 'admin', 'logged in', '', 1, '2026-08-05 12:39:58'),
(3, 1, 'admin', 'added a new category', 'sports', 1, '2026-08-05 12:42:15'),
(4, 1, 'admin', 'added a new category', 'entertainment', 1, '2026-08-05 12:42:32'),
(5, 1, 'admin', 'added a new category', 'politics', 1, '2026-08-05 12:42:45'),
(6, 1, 'admin', 'added a location', ' the location is chennai', 1, '2026-08-05 12:45:20'),
(7, 1, 'admin', 'added a location', ' the location is bihar', 1, '2026-08-05 12:45:27'),
(8, 1, 'admin', 'logged out', '', 1, '2026-08-05 12:46:03'),
(9, 4, 'member', 'logged in', '', 1, '2026-08-05 12:46:42'),
(10, 4, 'member', 'logged out', '', 1, '2026-08-05 12:47:05'),
(11, 5, 'reporter', 'logged in', '', 1, '2026-08-05 12:47:58'),
(12, 5, 'reporter', 'uploaded news', 'Fatal accident by Hyderabad teen puts underage driving in focus', 1, '2026-08-05 12:50:47'),
(13, 5, 'reporter', 'uploaded news', 'Cyberabad Police nab interstate ATM attention-diversion gang', 1, '2026-08-05 12:53:00'),
(14, 5, 'reporter', 'logged out', '', 1, '2026-08-05 12:53:07'),
(15, 6, 'reporter', 'logged in', '', 1, '2026-08-05 12:55:56'),
(16, 6, 'reporter', 'uploaded news', 'Esha Singh felicitated by Sports Authority of Telangana', 1, '2026-08-05 12:57:23'),
(17, 6, 'reporter', 'uploaded news', 'Charminar Chargers and Gladiators storm into basketball finals', 1, '2026-08-05 12:58:39'),
(18, 6, 'reporter', 'logged out', '', 1, '2026-08-05 13:01:25'),
(19, 7, 'reporter', 'logged in', '', 1, '2026-08-05 13:02:33'),
(20, 7, 'reporter', 'uploaded news', 'Oh Sukumari\' OTT release: When and where to watch Thiruveer and Aishwarya Rajesh\'s romantic comedy', 1, '2026-08-05 13:08:38'),
(21, 7, 'reporter', 'uploaded news', 'Andrea Jeremiah dismisses \'Arasan\' rumours, confirms she reprises Chandra from \'Vada Chennai\': \'I\'m ', 1, '2026-08-05 13:10:43'),
(22, 7, 'reporter', 'logged out', '', 1, '2026-08-05 13:10:50'),
(23, 8, 'reporter', 'logged in', '', 1, '2026-08-05 13:13:02'),
(24, 8, 'reporter', 'uploaded news', 'Devdutt Pattanaik writes: When vegetarianism becomes a badge of power, not compassion', 1, '2026-08-05 13:15:04'),
(25, 8, 'reporter', 'uploaded news', 'House of Yadavs: RJD digs in its heels over 10, Circular Road, a day after govt notice, says ‘Rabri ', 1, '2026-08-05 13:15:51'),
(26, 8, 'reporter', 'deleted news', 'news id is 8', 1, '2026-08-05 13:16:01'),
(27, 8, 'reporter', 'deleted news', 'news id is 8', 1, '2026-08-05 13:18:56'),
(28, 8, 'reporter', 'uploaded news', 'Newsmaker | Who is Mukesh Sahani, the Mahagathbandhan’s Bihar Deputy CM face', 1, '2026-08-05 13:20:07'),
(29, 8, 'reporter', 'logged out', '', 1, '2026-08-05 13:20:09'),
(30, 5, 'reporter', 'logged in', '', 1, '2026-08-05 13:20:41'),
(31, 5, 'reporter', 'uploaded news', 'Four-year-old boy critically injured after father allegedly attacks him in Hyderabad', 1, '2026-08-05 13:21:18'),
(32, 5, 'reporter', 'uploaded news', 'Man hacked to death in full public view in Saidabad', 1, '2026-08-05 13:22:29'),
(33, 5, 'reporter', 'deleted news', 'news id is 11', 1, '2026-08-05 13:22:39'),
(34, 5, 'reporter', 'uploaded news', 'Man hacked to death in full public view in Saidabad', 1, '2026-08-05 13:23:15'),
(35, 5, 'reporter', 'uploaded news', 'Hyderabad police arrest man with 15 fake educational certificates', 1, '2026-08-05 13:24:16'),
(36, 5, 'reporter', 'logged out', '', 1, '2026-08-05 13:24:34'),
(37, 6, 'reporter', 'logged in', '', 1, '2026-08-05 13:24:56'),
(38, 6, 'reporter', 'uploaded news', 'Brock Lesnar retires from wrestling after SummerSlam loss to Oba Femi', 1, '2026-08-05 13:26:14'),
(39, 6, 'reporter', 'uploaded news', 'Lionel Messi donates 80,000 euros for Madrid wildfire reconstruction', 1, '2026-08-05 13:27:31'),
(40, 6, 'reporter', 'logged out', '', 1, '2026-08-05 13:27:44'),
(41, 0, '', 'logged out', '', 1, '2026-08-05 13:49:22'),
(42, 1, 'admin', 'logged in', '', 1, '2026-08-05 14:03:44'),
(43, 1, 'admin', 'published news', 'newsid: 1', 1, '2026-08-05 14:03:56'),
(44, 1, 'admin', 'published news', 'newsid: 12', 1, '2026-08-05 14:04:20'),
(45, 1, 'admin', 'published news', 'newsid: 3', 1, '2026-08-05 14:04:44'),
(46, 1, 'admin', 'published news', 'newsid: 4', 1, '2026-08-05 14:07:53'),
(47, 1, 'admin', 'published news', 'newsid: 2', 1, '2026-08-05 14:10:04'),
(48, 1, 'admin', 'published news', 'newsid: 14', 1, '2026-08-05 14:10:09'),
(49, 1, 'admin', 'published news', 'newsid: 15', 1, '2026-08-05 14:10:14'),
(50, 1, 'admin', 'published news', 'newsid: 6', 1, '2026-08-05 14:10:20'),
(51, 1, 'admin', 'published news', 'newsid: 5', 1, '2026-08-05 14:10:25'),
(52, 1, 'admin', 'published news', 'newsid: 9', 1, '2026-08-05 14:10:29'),
(53, 1, 'admin', 'published news', 'newsid: 13', 1, '2026-08-05 14:10:33'),
(54, 1, 'admin', 'approved a reporter', '5', 1, '2026-08-05 14:10:53'),
(55, 1, 'admin', 'approved a reporter', '6', 1, '2026-08-05 14:10:54'),
(56, 1, 'admin', 'logged out', '', 1, '2026-08-05 14:11:53'),
(57, 7, 'reporter', 'logged in', '', 1, '2026-08-05 14:21:38'),
(58, 7, 'reporter', 'uploaded news', 'Inside ‘I Is Another’: The True(ish) Story of the Man Who Massaged a Nazi and Maybe Saved Lives', 1, '2026-08-05 14:22:56'),
(59, 7, 'reporter', 'uploaded news', 'NY Film Festival to Host World Premiere of ‘Godzilla Minus Zero’', 1, '2026-08-05 14:24:18'),
(60, 7, 'reporter', 'uploaded news', 'The Box Office Is Finally Back: “We’re All Breathing a Hell of a Lot Easier”', 1, '2026-08-05 14:25:41'),
(61, 7, 'reporter', 'logged out', '', 1, '2026-08-05 14:25:59'),
(62, 9, 'editor', 'logged in', '', 1, '2026-08-05 14:29:02'),
(63, 9, 'editor', 'published news', 'newsid: 17', 1, '2026-08-05 14:29:16'),
(64, 9, 'editor', 'published news', 'newsid: 18', 1, '2026-08-05 14:29:18'),
(65, 9, 'editor', 'published news', 'newsid: 5', 1, '2026-08-05 14:29:39'),
(66, 9, 'editor', 'logged out', '', 1, '2026-08-05 14:29:54'),
(67, 10, 'editor', 'signed up', '', 1, '2026-08-05 14:30:54'),
(68, 10, 'editor', 'logged in', '', 1, '2026-08-05 14:31:13'),
(69, 10, 'editor', 'logged out', '', 1, '2026-08-05 14:31:54'),
(70, 7, 'reporter', 'logged in', '', 1, '2026-08-05 14:32:13'),
(71, 5, 'reporter', 'logged in', '', 1, '2026-08-05 14:46:44'),
(72, 7, 'reporter', 'logged out', '', 1, '2026-08-05 14:54:26'),
(73, 1, 'admin', 'logged in', '', 1, '2026-08-05 14:54:42'),
(74, 1, 'admin', 'added a new category', 'international', 1, '2026-08-05 14:55:00'),
(75, 1, 'admin', 'logged out', '', 1, '2026-08-05 14:55:05'),
(76, 11, 'reporter', 'signed up', '', 1, '2026-08-05 14:55:44'),
(77, 11, 'reporter', 'logged in', '', 1, '2026-08-05 14:55:55'),
(78, 11, 'reporter', 'uploaded news', 'Projectile sinks Indian-flagged ship off Yemen coast', 1, '2026-08-05 14:57:09'),
(79, 11, 'reporter', 'uploaded news', 'Listening to youth is ‘most powerful force’ to prevent protest violence: Supreme Court', 1, '2026-08-05 14:58:59'),
(80, 11, 'reporter', 'logged out', '', 1, '2026-08-05 14:59:42'),
(81, 0, '', 'logged out', '', 1, '2026-08-05 14:59:50'),
(82, 1, 'admin', 'logged in', '', 1, '2026-08-05 15:08:37'),
(83, 1, 'admin', 'published news', 'newsid: 19', 1, '2026-08-05 15:09:02'),
(84, 1, 'admin', 'published news', 'newsid: 19', 1, '2026-08-05 15:09:09'),
(85, 1, 'admin', 'published news', 'newsid: 20', 1, '2026-08-05 15:17:09'),
(86, 1, 'admin', 'logged out', '', 1, '2026-08-05 15:22:15'),
(87, 12, 'member', 'signed up', '', 1, '2026-08-05 15:22:37'),
(88, 12, 'member', 'logged in', '', 1, '2026-08-05 15:22:49'),
(89, 12, '', 'commented on news', 'newsid:17', 1, '2026-08-05 15:27:47'),
(90, 12, '', 'commented on news', 'newsid:17', 1, '2026-08-05 15:29:36'),
(91, 1, 'admin', 'logged in', '', 1, '2026-08-06 08:15:59'),
(92, 1, 'admin', 'logged out', '', 1, '2026-08-06 08:19:53'),
(93, 4, 'member', 'logged in', '', 1, '2026-08-06 08:20:13'),
(94, 4, 'member', 'logged out', '', 1, '2026-08-06 08:21:32'),
(95, 5, 'reporter', 'logged in', '', 1, '2026-08-06 08:22:07'),
(96, 5, 'reporter', 'logged out', '', 1, '2026-08-06 08:22:18'),
(97, 5, 'reporter', 'logged in', '', 1, '2026-08-06 08:22:24'),
(98, 5, 'reporter', 'logged out', '', 1, '2026-08-06 08:23:15'),
(99, 5, 'reporter', 'logged in', '', 1, '2026-08-06 08:23:27'),
(100, 5, 'reporter', 'logged out', '', 1, '2026-08-06 08:23:38'),
(101, 10, 'editor', 'logged in', '', 1, '2026-08-06 08:24:51'),
(102, 10, 'editor', 'logged out', '', 1, '2026-08-06 08:26:02'),
(103, 1, 'admin', 'logged in', '', 1, '2026-08-06 08:26:16'),
(104, 1, 'admin', 'approved a member', '12', 1, '2026-08-06 08:29:23'),
(105, 1, 'admin', 'logged in', '', 1, '2026-08-06 08:50:03'),
(106, 1, 'admin', 'logged in', '', 1, '2026-08-06 19:14:09'),
(107, 1, 'admin', 'logged out', '', 1, '2026-08-06 21:17:34'),
(108, 12, 'member', 'logged in', '', 1, '2026-08-06 21:17:44'),
(109, 12, 'member', 'logged out', '', 1, '2026-08-06 21:43:03'),
(110, 1, 'admin', 'logged in', '', 1, '2026-08-06 21:43:40'),
(111, 1, 'admin', 'logged out', '', 1, '2026-08-06 22:35:39'),
(112, 4, 'member', 'logged in', '', 1, '2026-08-06 22:35:52'),
(113, 4, 'member', 'logged out', '', 1, '2026-08-06 22:36:24'),
(114, 12, 'member', 'logged in', '', 1, '2026-08-06 22:36:33'),
(115, 1, 'admin', 'logged in', '', 1, '2026-08-07 07:47:00'),
(116, 1, 'admin', 'logged out', '', 1, '2026-08-07 08:44:36'),
(117, 4, 'member', 'logged in', '', 1, '2026-08-07 08:44:48'),
(118, 4, 'member', 'logged out', '', 1, '2026-08-07 08:44:52'),
(119, 1, 'admin', 'logged in', '', 1, '2026-08-07 08:44:59'),
(120, 1, 'admin', 'logged out', '', 1, '2026-08-07 08:51:00'),
(121, 1, 'admin', 'logged in', '', 1, '2026-08-07 08:51:12'),
(122, 1, 'admin', 'logged out', '', 1, '2026-08-07 08:51:28'),
(123, 4, 'member', 'logged in', '', 1, '2026-08-07 08:51:36'),
(124, 4, 'member', 'logged out', '', 1, '2026-08-07 08:51:38'),
(125, 1, 'admin', 'logged in', '', 1, '2026-08-07 08:51:48'),
(126, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:08:14'),
(127, 1, 'admin', 'published news', 'newsid: 16', 1, '2026-08-07 09:12:28'),
(128, 1, 'admin', 'logged out', '', 1, '2026-08-07 09:48:05'),
(129, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:48:20'),
(130, 1, 'admin', 'logged out', '', 1, '2026-08-07 09:49:04'),
(131, 4, 'member', 'logged in', '', 1, '2026-08-07 09:49:13'),
(132, 4, 'member', 'logged out', '', 1, '2026-08-07 09:49:37'),
(133, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:49:46'),
(134, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:50:16'),
(135, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:50:52'),
(136, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:51:25'),
(137, 1, 'admin', 'logged out', '', 1, '2026-08-07 09:55:13'),
(138, 4, 'member', 'logged in', '', 1, '2026-08-07 09:55:30'),
(139, 4, 'member', 'logged out', '', 1, '2026-08-07 09:55:45'),
(140, 1, 'admin', 'logged in', '', 1, '2026-08-07 09:57:58'),
(141, 1, 'admin', 'logged out', '', 1, '2026-08-07 09:59:00'),
(142, 4, 'member', 'logged in', '', 1, '2026-08-07 12:40:05'),
(143, 4, 'member', 'logged out', '', 1, '2026-08-07 12:43:55'),
(144, 0, '', 'logged out', '', 1, '2026-08-07 12:56:13'),
(145, 0, '', 'logged out', '', 1, '2026-08-07 12:56:34'),
(146, 0, '', 'logged out', '', 1, '2026-08-07 12:59:13'),
(147, 1, 'admin', 'logged in', '', 1, '2026-08-07 12:59:35'),
(148, 1, 'admin', 'logged out', '', 1, '2026-08-07 13:03:58'),
(149, 0, '', 'logged out', '', 1, '2026-08-07 13:04:42'),
(150, 0, '', 'logged out', '', 1, '2026-08-07 13:04:48'),
(151, 0, '', 'logged out', '', 1, '2026-08-07 13:13:52'),
(152, 4, 'member', 'logged in', '', 1, '2026-08-07 13:19:22'),
(153, 4, 'member', 'logged out', '', 1, '2026-08-07 13:23:22'),
(154, 5, 'reporter', 'logged in', '', 1, '2026-08-07 13:23:54'),
(155, 1, 'admin', 'logged in', '', 1, '2026-08-07 21:50:20'),
(156, 1, 'admin', 'disapproved a reporter', '5', 1, '2026-08-07 21:50:47'),
(157, 1, 'admin', 'disapproved a reporter', '6', 1, '2026-08-07 21:50:48'),
(158, 1, 'admin', 'approved a reporter', '5', 1, '2026-08-07 21:50:56'),
(159, 1, 'admin', 'approved a reporter', '6', 1, '2026-08-07 21:50:57'),
(160, 1, 'admin', 'approved a reporter', '7', 1, '2026-08-07 21:51:00'),
(161, 1, 'admin', 'logged out', '', 1, '2026-08-07 22:44:42'),
(162, 10, 'editor', 'logged in', '', 1, '2026-08-07 22:51:54'),
(163, 10, 'editor', 'logged in', '', 1, '2026-08-07 22:57:07'),
(164, 10, 'editor', 'logged out', '', 1, '2026-08-07 23:01:02'),
(165, 5, 'reporter', 'logged in', '', 1, '2026-08-07 23:01:32'),
(166, 5, 'reporter', 'logged out', '', 1, '2026-08-07 23:03:17'),
(167, 0, '', 'logged out', '', 1, '2026-08-07 23:03:55'),
(168, 0, '', 'logged out', '', 1, '2026-08-07 23:04:13'),
(169, 0, '', 'logged out', '', 1, '2026-08-07 23:04:27'),
(170, 5, 'reporter', 'logged in', '', 1, '2026-08-07 23:07:07'),
(171, 5, 'reporter', 'logged out', '', 1, '2026-08-07 23:07:43'),
(172, 1, 'admin', 'logged in', '', 1, '2026-08-08 06:44:17'),
(173, 1, 'admin', 'logged out', '', 1, '2026-08-08 06:51:40'),
(174, 1, 'admin', 'logged in', '', 1, '2026-08-08 06:53:07'),
(175, 1, 'admin', 'approved an editor', '9', 1, '2026-08-08 06:53:28'),
(176, 1, 'admin', 'approved a reporter', '8', 1, '2026-08-08 06:53:40'),
(177, 1, 'admin', 'approved a comment ', ' comment id is 1', 1, '2026-08-08 06:54:51'),
(178, 1, 'admin', 'logged out', '', 1, '2026-08-08 06:57:46'),
(179, 5, 'reporter', 'logged in', '', 1, '2026-08-08 06:57:58'),
(180, 5, 'reporter', 'uploaded news', 'Ameenpur police book suspended Jubilee Hills CI Srinivasulu Reddy for rape', 1, '2026-08-08 07:03:30'),
(181, 5, 'reporter', 'uploaded news', 'Watch: Ruckus at Secunderabad Bonalu cheque distribution programme', 1, '2026-08-08 07:05:16'),
(182, 5, 'reporter', 'logged out', '', 1, '2026-08-08 08:02:52'),
(183, 1, 'admin', 'logged in', '', 1, '2026-08-08 22:38:11'),
(184, 1, 'admin', 'logged out', '', 1, '2026-08-08 22:39:32'),
(185, 1, 'admin', 'logged in', '', 1, '2026-08-08 22:39:44'),
(186, 1, 'admin', 'logged in', '', 1, '2026-08-08 22:52:05'),
(187, 1, 'admin', 'logged out', '', 1, '2026-08-08 23:34:59'),
(188, 5, 'reporter', 'logged in', '', 1, '2026-08-08 23:35:09'),
(189, 1, 'admin', 'logged in', '', 1, '2026-08-09 20:36:38'),
(190, 1, 'admin', 'published news', 'newsid: 22', 1, '2026-08-09 20:45:25'),
(191, 1, 'admin', 'published news', 'newsid: 22', 1, '2026-08-09 20:46:27'),
(192, 1, 'admin', 'published news', 'newsid: 22', 1, '2026-08-09 20:47:20'),
(193, 1, 'admin', 'published news', 'newsid: 22', 1, '2026-08-09 20:47:45'),
(194, 1, 'admin', 'published news', 'newsid: 22', 1, '2026-08-09 20:49:16'),
(195, 1, 'admin', 'published news', 'newsid: 22', 1, '2026-08-09 20:53:56'),
(196, 1, 'admin', 'logged in', '', 1, '2026-08-09 21:47:16'),
(197, 1, 'admin', 'added a location', ' the location is habsiguda', 1, '2026-08-09 22:01:13'),
(198, 1, 'admin', 'deleted a location', ' location id is 5', 1, '2026-08-09 22:01:17'),
(199, 1, 'admin', 'added a new category', 'games', 1, '2026-08-09 22:02:00'),
(200, 1, 'admin', 'deketed category', 'the catid is 7', 1, '2026-08-09 22:02:03'),
(201, 1, 'admin', 'added a location', ' the location is nicobar', 1, '2026-08-09 22:14:06'),
(202, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:09'),
(203, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:10'),
(204, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:11'),
(205, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:12'),
(206, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:12'),
(207, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:12'),
(208, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:13'),
(209, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:14'),
(210, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:15'),
(211, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:14:17'),
(212, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:16:51'),
(213, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:16:53'),
(214, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:16:53'),
(215, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:16:55'),
(216, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:17:18'),
(217, 1, 'admin', 'deleted a location', ' location id is 6', 1, '2026-08-09 22:17:19'),
(218, 1, 'admin', 'logged out', '', 1, '2026-08-09 22:22:57'),
(219, 1, 'admin', 'logged in', '', 1, '2026-08-10 07:56:20'),
(220, 1, 'admin', 'logged out', '', 1, '2026-08-10 07:56:38'),
(221, 1, 'admin', 'logged in', '', 1, '2026-08-10 08:07:37'),
(222, 1, 'admin', 'disapproved an editor', '9', 1, '2026-08-10 08:10:51'),
(223, 1, 'admin', 'approved an editor', '9', 1, '2026-08-10 08:10:57'),
(224, 1, 'admin', 'logged out', '', 1, '2026-08-10 08:14:15'),
(225, 1, 'admin', 'logged in', '', 1, '2026-08-10 08:35:08'),
(226, 1, 'admin', 'logged out', '', 1, '2026-08-10 08:41:28'),
(227, 1, 'admin', 'logged in', '', 1, '2026-08-10 08:42:09'),
(228, 1, 'admin', 'approved a member', '4', 1, '2026-08-10 08:42:18'),
(229, 1, 'admin', 'logged out', '', 1, '2026-08-10 08:42:19'),
(230, 4, 'member', 'logged in', '', 1, '2026-08-10 08:42:30'),
(231, 4, 'member', 'logged out', '', 1, '2026-08-10 08:44:52'),
(232, 1, 'admin', 'logged in', '', 1, '2026-08-10 08:45:02'),
(233, 1, 'admin', 'logged out', '', 1, '2026-08-10 08:51:35'),
(234, 4, 'member', 'logged in', '', 1, '2026-08-10 08:51:53'),
(235, 4, 'member', 'logged out', '', 1, '2026-08-10 08:53:09'),
(236, 1, 'admin', 'logged in', '', 1, '2026-08-10 08:53:25'),
(237, 1, 'admin', 'logged out', '', 1, '2026-08-10 08:55:12'),
(238, 4, 'member', 'logged in', '', 1, '2026-08-10 08:55:21'),
(239, 4, 'member', 'logged out', '', 1, '2026-08-10 08:56:08'),
(240, 1, 'admin', 'logged in', '', 1, '2026-08-10 09:19:48'),
(241, 5, 'reporter', 'logged in', '', 1, '2026-08-10 09:25:40'),
(242, 5, 'reporter', 'logged out', '', 1, '2026-08-10 09:28:43'),
(243, 4, 'member', 'logged in', '', 1, '2026-08-10 09:29:15'),
(244, 4, 'member', 'commented on news', 'newsid:14', 1, '2026-08-10 09:36:57'),
(245, 4, 'member', 'logged out', '', 1, '2026-08-10 09:38:58'),
(246, 5, 'reporter', 'logged in', '', 1, '2026-08-10 09:39:09'),
(247, 5, 'reporter', 'updated his details', '', 1, '2026-08-10 09:39:50'),
(248, 5, 'reporter', 'updated his details', '', 1, '2026-08-10 09:40:43'),
(249, 5, 'reporter', 'uploaded news', 'Speeding car kills Army jawan, injures several in Hayath Shahkote', 1, '2026-08-10 09:44:18'),
(250, 5, 'reporter', 'logged out', '', 1, '2026-08-10 09:44:44'),
(251, 1, 'admin', 'logged in', '', 1, '2026-08-10 09:45:35'),
(252, 1, 'admin', 'logged out', '', 1, '2026-08-10 09:45:45'),
(253, 10, 'editor', 'logged in', '', 1, '2026-08-10 09:45:59'),
(254, 10, 'editor', 'published news', 'newsid: 23', 1, '2026-08-10 09:46:06'),
(255, 10, 'editor', 'logged out', '', 1, '2026-08-10 09:46:09'),
(256, 5, 'reporter', 'logged in', '', 1, '2026-08-10 09:46:16'),
(257, 5, 'reporter', 'logged out', '', 1, '2026-08-10 09:47:29'),
(258, 10, 'editor', 'logged in', '', 1, '2026-08-10 09:47:39'),
(259, 10, 'editor', 'edited news', ' news id:23', 1, '2026-08-10 09:48:42'),
(260, 10, 'editor', 'logged out', '', 1, '2026-08-10 09:49:46'),
(261, 5, 'reporter', 'logged in', '', 1, '2026-08-10 09:49:55'),
(262, 5, 'reporter', 'logged out', '', 1, '2026-08-10 09:58:24'),
(263, 1, 'admin', 'logged in', '', 1, '2026-08-10 09:58:32'),
(264, 1, 'admin', 'added a location', ' the location is habsiguda', 1, '2026-08-10 10:00:15'),
(265, 1, 'admin', 'added a new category', 'national', 1, '2026-08-10 10:00:44'),
(266, 1, 'admin', 'deketed category', 'the catid is 8', 1, '2026-08-10 10:00:51'),
(267, 1, 'admin', 'deleted a location', ' location id is 7', 1, '2026-08-10 10:01:06'),
(268, 1, 'admin', 'deleted a location', ' location id is 7', 1, '2026-08-10 10:01:21'),
(269, 1, 'admin', 'disapproved a reporter', '5', 1, '2026-08-10 10:09:11'),
(270, 1, 'admin', 'disapproved a reporter', '6', 1, '2026-08-10 10:09:12'),
(271, 1, 'admin', 'disapproved a reporter', '7', 1, '2026-08-10 10:09:12'),
(272, 1, 'admin', 'disapproved a reporter', '8', 1, '2026-08-10 10:09:12'),
(273, 1, 'admin', 'logged out', '', 1, '2026-08-10 10:11:53'),
(274, 13, 'reporter', 'signed up', '', 1, '2026-08-10 10:14:06'),
(275, 1, 'admin', 'logged in', '', 1, '2026-08-10 10:14:33'),
(276, 1, 'admin', 'logged out', '', 1, '2026-08-10 10:28:12'),
(277, 4, 'member', 'logged in', '', 1, '2026-08-10 10:28:23'),
(278, 4, 'member', 'updated his details', '', 1, '2026-08-10 10:28:37'),
(279, 4, 'member', 'logged out', '', 1, '2026-08-10 10:28:39'),
(280, 4, 'member', 'logged in', '', 1, '2026-08-10 10:28:48'),
(281, 4, 'member', 'updated his details', '', 1, '2026-08-10 10:28:56'),
(282, 4, 'member', 'logged out', '', 1, '2026-08-10 10:28:59'),
(283, 0, '', 'logged out', '', 1, '2026-08-10 10:32:17'),
(284, 1, 'admin', 'logged in', '', 1, '2026-08-10 10:33:49'),
(285, 1, 'admin', 'logged out', '', 1, '2026-08-10 11:02:34'),
(286, 5, 'reporter', 'logged in', '', 1, '2026-08-10 11:04:24'),
(287, 5, 'reporter', 'logged out', '', 1, '2026-08-10 11:08:43'),
(288, 1, 'admin', 'logged in', '', 1, '2026-08-10 11:08:54'),
(289, 1, 'admin', 'logged out', '', 1, '2026-08-10 11:09:07'),
(290, 10, 'editor', 'logged in', '', 1, '2026-08-10 11:09:23'),
(291, 10, 'editor', 'published news', 'newsid: 1', 1, '2026-08-10 11:19:46'),
(292, 10, 'editor', 'published news', 'newsid: 2', 1, '2026-08-10 11:19:47'),
(293, 10, 'editor', 'published news', 'newsid: 12', 1, '2026-08-10 11:19:49'),
(294, 10, 'editor', 'published news', 'newsid: 13', 1, '2026-08-10 11:19:51'),
(295, 10, 'editor', 'published news', 'newsid: 22', 1, '2026-08-10 11:19:53'),
(296, 10, 'editor', 'published news', 'newsid: 23', 1, '2026-08-10 11:19:56'),
(297, 10, 'editor', 'logged in', '', 1, '2026-08-10 19:59:32'),
(298, 10, 'editor', 'logged out', '', 1, '2026-08-10 20:20:40'),
(299, 5, 'reporter', 'logged in', '', 1, '2026-08-10 20:20:49'),
(300, 4, 'member', 'logged in', '', 1, '2026-08-10 21:01:48'),
(301, 4, 'member', 'logged in', '', 1, '2026-08-10 21:08:12'),
(302, 4, 'member', 'logged out', '', 1, '2026-08-10 21:19:02'),
(303, 5, 'reporter', 'logged in', '', 1, '2026-08-10 21:19:12'),
(304, 5, 'reporter', 'logged out', '', 1, '2026-08-10 21:19:47'),
(305, 4, 'member', 'logged in', '', 1, '2026-08-10 21:19:55'),
(306, 4, 'member', 'liked an article', '', 1, '2026-08-10 21:22:24'),
(307, 4, 'member', 'logged out', '', 1, '2026-08-10 21:24:10'),
(308, 4, 'member', 'logged in', '', 1, '2026-08-10 21:31:37'),
(309, 4, 'member', 'logged out', '', 1, '2026-08-10 21:41:44'),
(310, 5, 'reporter', 'logged in', '', 1, '2026-08-10 21:41:53'),
(311, 5, 'reporter', 'logged out', '', 1, '2026-08-10 21:49:44'),
(312, 1, 'admin', 'logged in', '', 1, '2026-08-10 21:49:53'),
(313, 1, 'admin', 'published news', 'newsid: 23', 1, '2026-08-10 21:51:01'),
(314, 1, 'admin', 'logged out', '', 1, '2026-08-10 21:52:04'),
(315, 5, 'reporter', 'logged in', '', 1, '2026-08-10 21:52:12'),
(316, 5, 'reporter', 'logged out', '', 1, '2026-08-10 21:53:48'),
(317, 10, 'editor', 'logged in', '', 1, '2026-08-10 21:53:55'),
(318, 10, 'editor', 'edited news', ' news id:1', 1, '2026-08-10 21:54:31'),
(319, 10, 'editor', 'edited news', ' news id:22', 1, '2026-08-10 22:03:03'),
(320, 10, 'editor', 'logged out', '', 1, '2026-08-10 22:04:32'),
(321, 5, 'reporter', 'logged in', '', 1, '2026-08-10 22:06:02'),
(322, 5, 'reporter', 'edited news', ' news id:1', 1, '2026-08-10 22:08:54'),
(323, 5, 'reporter', 'edited news', ' news id:1', 1, '2026-08-10 22:09:10'),
(324, 5, 'reporter', 'edited news', ' news id:1', 1, '2026-08-10 22:09:36'),
(325, 5, 'reporter', 'edited news', ' news id:1', 1, '2026-08-10 22:10:13'),
(326, 5, 'reporter', 'edited news', ' news id:1', 1, '2026-08-10 22:11:06'),
(327, 5, 'reporter', 'edited news', ' news id:1', 1, '2026-08-10 22:14:16'),
(328, 5, 'reporter', 'logged out', '', 1, '2026-08-10 22:16:18'),
(329, 1, 'admin', 'logged in', '', 1, '2026-08-10 22:16:26'),
(330, 1, 'admin', 'deleted a location', ' location id is 7', 1, '2026-08-10 22:30:38'),
(331, 1, 'admin', 'deketed category', 'the catid is 7', 1, '2026-08-10 22:37:24'),
(332, 4, 'member', 'logged in', '', 1, '2026-08-11 07:22:59'),
(333, 4, 'member', 'logged out', '', 1, '2026-08-11 07:32:08'),
(334, 1, 'admin', 'logged in', '', 1, '2026-08-11 07:32:16'),
(335, 1, 'admin', 'disapproved a reporter', '5', 1, '2026-08-11 07:32:35'),
(336, 1, 'admin', 'approved a reporter', '5', 1, '2026-08-11 07:43:31'),
(337, 1, 'admin', 'approved a reporter', '7', 1, '2026-08-11 07:43:34'),
(338, 1, 'admin', 'approved a reporter', '11', 1, '2026-08-11 07:43:36'),
(339, 1, 'admin', 'approved a reporter', '8', 1, '2026-08-11 07:43:38'),
(340, 1, 'admin', 'approved a reporter', '6', 1, '2026-08-11 07:43:41'),
(341, 1, 'admin', 'logged out', '', 1, '2026-08-11 07:50:49'),
(342, 4, 'member', 'logged in', '', 1, '2026-08-11 07:50:56'),
(343, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 07:51:04'),
(344, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 07:52:11'),
(345, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 07:54:03'),
(346, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 07:55:29'),
(347, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 07:56:10'),
(348, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 07:58:45'),
(349, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:02:53'),
(350, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:03:57'),
(351, 4, 'member', 'logged out', '', 1, '2026-08-11 08:04:08'),
(352, 4, 'member', 'logged in', '', 1, '2026-08-11 08:05:23'),
(353, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:06:24'),
(354, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:13:51'),
(355, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:24:33'),
(356, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:24:40'),
(357, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:25:33'),
(358, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:25:47'),
(359, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 08:28:55'),
(360, 4, 'member', 'logged in', '', 1, '2026-08-11 08:38:48'),
(361, 4, 'member', 'logged in', '', 1, '2026-08-11 08:44:26'),
(362, 4, 'member', 'logged out', '', 1, '2026-08-11 08:45:09'),
(363, 1, 'admin', 'logged in', '', 1, '2026-08-11 08:45:35'),
(364, 1, 'admin', 'disapproved a reporter', '5', 1, '2026-08-11 08:49:08'),
(365, 1, 'admin', 'disapproved a reporter', '6', 1, '2026-08-11 08:49:08'),
(366, 1, 'admin', 'disapproved a reporter', '7', 1, '2026-08-11 08:49:08'),
(367, 1, 'admin', 'disapproved a reporter', '8', 1, '2026-08-11 08:49:08'),
(368, 1, 'admin', 'disapproved a reporter', '11', 1, '2026-08-11 08:49:09'),
(369, 1, 'admin', 'approved a reporter', '5', 1, '2026-08-11 08:49:33'),
(370, 1, 'admin', 'approved a reporter', '7', 1, '2026-08-11 08:49:35'),
(371, 1, 'admin', 'approved a reporter', '11', 1, '2026-08-11 08:49:37'),
(372, 1, 'admin', 'approved a reporter', '6', 1, '2026-08-11 08:49:40'),
(373, 1, 'admin', 'logged out', '', 1, '2026-08-11 08:50:05'),
(374, 4, 'member', 'logged in', '', 1, '2026-08-11 08:58:03'),
(375, 4, 'member', 'logged out', '', 1, '2026-08-11 08:58:07'),
(376, 1, 'admin', 'logged in', '', 1, '2026-08-11 08:58:31'),
(377, 1, 'admin', 'logged out', '', 1, '2026-08-11 09:01:03'),
(378, 1, 'admin', 'logged in', '', 1, '2026-08-11 09:01:26'),
(379, 1, 'admin', 'logged out', '', 1, '2026-08-11 09:02:32'),
(380, 1, 'admin', 'logged in', '', 1, '2026-08-11 09:03:05'),
(381, 1, 'admin', 'logged out', '', 1, '2026-08-11 09:09:44'),
(382, 1, 'admin', 'logged in', '', 1, '2026-08-11 09:10:12'),
(383, 1, 'admin', 'logged out', '', 1, '2026-08-11 09:14:33'),
(384, 10, 'editor', 'logged in', '', 1, '2026-08-11 09:14:47'),
(385, 10, 'editor', 'logged out', '', 1, '2026-08-11 09:14:52'),
(386, 10, 'editor', 'logged in', '', 1, '2026-08-11 09:15:02'),
(387, 10, 'editor', 'logged out', '', 1, '2026-08-11 09:17:16'),
(388, 5, 'reporter', 'logged in', '', 1, '2026-08-11 09:17:33'),
(389, 5, 'reporter', 'logged out', '', 1, '2026-08-11 09:18:56'),
(390, 4, 'member', 'logged in', '', 1, '2026-08-11 09:19:13'),
(391, 4, 'member', 'logged out', '', 1, '2026-08-11 09:19:19'),
(392, 4, 'member', 'logged in', '', 1, '2026-08-11 09:20:14'),
(393, 4, 'member', 'logged out', '', 1, '2026-08-11 09:20:28'),
(394, 4, 'member', 'logged in', '', 1, '2026-08-11 09:24:17'),
(395, 1, 'admin', 'logged in', '', 1, '2026-08-11 11:57:01'),
(396, 1, 'admin', 'approved a reporter', '13', 1, '2026-08-11 11:59:34'),
(397, 1, 'admin', 'approved a reporter', '8', 1, '2026-08-11 11:59:54'),
(398, 1, 'admin', 'published news', 'newsid: 14', 1, '2026-08-11 12:00:54'),
(399, 1, 'admin', 'disapproved a reporter', '8', 1, '2026-08-11 12:01:33'),
(400, 1, 'admin', 'edited news needs approval from editor or admin', ' news id:14', 1, '2026-08-11 12:02:15'),
(401, 1, 'admin', 'published news', 'newsid: 14', 1, '2026-08-11 12:02:47'),
(402, 1, 'admin', 'commented on news', 'newsid:23', 1, '2026-08-11 12:04:36'),
(403, 1, 'admin', 'logged out', '', 1, '2026-08-11 12:04:53'),
(404, 4, 'member', 'logged in', '', 1, '2026-08-11 12:05:03'),
(405, 4, 'member', 'logged out', '', 1, '2026-08-11 12:05:19'),
(406, 1, 'admin', 'logged in', '', 1, '2026-08-11 12:05:29'),
(407, 1, 'admin', 'logged out', '', 1, '2026-08-11 12:08:12'),
(408, 4, 'member', 'logged in', '', 1, '2026-08-11 12:08:19'),
(409, 4, 'member', 'commented on news', 'newsid:23', 1, '2026-08-11 12:08:43'),
(410, 4, 'member', 'logged out', '', 1, '2026-08-11 12:08:58'),
(411, 1, 'admin', 'logged in', '', 1, '2026-08-11 12:09:08'),
(412, 1, 'admin', 'deleted a comment ', ' comment id is 5', 1, '2026-08-11 12:09:25'),
(413, 4, 'admin', 'commented on news', 'newsid:23', 1, '2026-08-11 12:09:38'),
(414, 1, 'admin', 'deleted a comment ', ' comment id is 6', 1, '2026-08-11 12:10:25'),
(415, 1, 'admin', 'deleted a comment ', ' comment id is 5', 1, '2026-08-11 12:10:33'),
(416, 1, 'admin', 'deleted a comment ', ' comment id is 6', 1, '2026-08-11 12:11:26'),
(417, 1, 'admin', 'deleted a comment ', ' comment id is 5', 1, '2026-08-11 12:13:29'),
(418, 1, 'admin', 'logged out', '', 1, '2026-08-11 12:16:26'),
(419, 4, 'member', 'logged in', '', 1, '2026-08-11 12:16:33'),
(420, 4, 'member', 'commented on news', 'newsid:18', 1, '2026-08-11 12:23:23'),
(421, 4, 'member', 'bookmarked an article', '', 1, '2026-08-11 13:00:31'),
(422, 4, 'member', 'logged out', '', 1, '2026-08-11 13:07:53'),
(423, 4, 'member', 'logged in', '', 1, '2026-08-12 07:35:47'),
(424, 4, 'member', 'logged out', '', 1, '2026-08-12 07:46:26'),
(425, 1, 'admin', 'logged in', '', 1, '2026-08-12 07:46:37'),
(426, 1, 'admin', 'approved a reporter', '8', 1, '2026-08-12 07:46:47'),
(427, 1, 'admin', 'published news', 'newsid: 9', 1, '2026-08-12 07:54:29'),
(428, 1, 'admin', 'logged out', '', 1, '2026-08-12 07:54:54'),
(429, 4, 'member', 'logged in', '', 1, '2026-08-12 07:55:11'),
(430, 4, 'member', 'logged out', '', 1, '2026-08-12 07:58:41'),
(431, 10, 'editor', 'logged in', '', 1, '2026-08-12 08:05:36'),
(432, 10, 'editor', 'logged out', '', 1, '2026-08-12 08:07:38'),
(433, 5, 'reporter', 'logged in', '', 1, '2026-08-12 08:07:47'),
(434, 5, 'reporter', 'logged out', '', 1, '2026-08-12 08:10:42'),
(435, 4, 'member', 'logged in', '', 1, '2026-08-12 08:14:02'),
(436, 4, 'member', 'logged out', '', 1, '2026-08-12 08:37:19'),
(437, 4, 'member', 'logged in', '', 1, '2026-08-12 09:27:27'),
(438, 4, 'member', 'logged out', '', 1, '2026-08-12 09:34:12'),
(439, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:34:51'),
(440, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:35:10'),
(441, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:35:13'),
(442, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:38:33'),
(443, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:38:43'),
(444, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:38:46'),
(445, 0, '', 'logged out', '', 1, '2026-08-12 09:38:58'),
(446, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:39:08'),
(447, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:41:14'),
(448, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:41:16'),
(449, 0, '', 'logged out', '', 1, '2026-08-12 09:41:20'),
(450, 0, '', 'logged out', '', 1, '2026-08-12 09:42:15'),
(451, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:42:49'),
(452, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:42:56'),
(453, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:42:59'),
(454, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:43:32'),
(455, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:43:41'),
(456, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:44:10'),
(457, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:45:44'),
(458, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:46:10'),
(459, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:47:08'),
(460, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:48:35'),
(461, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:48:52'),
(462, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:49:02'),
(463, 1, 'admin', 'updated his details', '', 1, '2026-08-12 09:49:46'),
(464, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:49:57'),
(465, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:50:08'),
(466, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:51:49'),
(467, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:52:00'),
(468, 1, 'admin', 'logged out', '', 1, '2026-08-12 09:52:17'),
(469, 1, 'admin', 'logged in', '', 1, '2026-08-12 09:54:59'),
(470, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:55:06'),
(471, 1, 'admin', 'logged in', '', 0, '2026-08-12 09:55:19'),
(472, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:55:29'),
(473, 1, 'admin', 'logged in', '', 0, '2026-08-12 09:55:38'),
(474, 1, 'admin', 'updated his details', '', 0, '2026-08-12 09:56:47'),
(475, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:56:50'),
(476, 1, 'admin', 'logged in', '', 0, '2026-08-12 09:57:04'),
(477, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:57:13'),
(478, 1, 'admin', 'logged in', '', 0, '2026-08-12 09:57:28'),
(479, 1, 'admin', 'updated his details', '', 0, '2026-08-12 09:57:34'),
(480, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:57:36'),
(481, 1, 'admin', 'logged in', '', 0, '2026-08-12 09:58:56'),
(482, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:59:17'),
(483, 0, '', 'logged out', '', 0, '2026-08-12 09:59:23'),
(484, 0, '', 'logged out', '', 0, '2026-08-12 09:59:26'),
(485, 1, 'admin', 'logged in', '', 0, '2026-08-12 09:59:50'),
(486, 1, 'admin', 'logged out', '', 0, '2026-08-12 09:59:53'),
(487, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:03:13'),
(488, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:03:17'),
(489, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:08:52'),
(490, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:08:54'),
(491, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:10:46'),
(492, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:10:50'),
(493, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:10:52'),
(494, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:13:05'),
(495, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:13:08'),
(496, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:13:44'),
(497, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:13:48'),
(498, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:14:00'),
(499, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:14:02'),
(500, 0, '', 'logged out', '', 0, '2026-08-12 10:14:06'),
(501, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:14:20'),
(502, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:14:23'),
(503, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:15:32'),
(504, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:15:40'),
(505, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:15:54'),
(506, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:15:56'),
(507, 1, 'admin', 'logged in', '', 0, '2026-08-12 10:16:06'),
(508, 1, 'admin', 'updated his details', '', 0, '2026-08-12 10:16:34'),
(509, 1, 'admin', 'logged out', '', 0, '2026-08-12 10:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bid` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`bid`, `news_id`, `user_id`) VALUES
(1, 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(5) NOT NULL,
  `category` text NOT NULL,
  `cat_is_delete` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`, `cat_is_delete`) VALUES
(1, 'all', 0),
(2, 'crime', 0),
(3, 'sports', 0),
(4, 'entertainment', 0),
(5, 'politics', 0),
(6, 'international', 0),
(7, 'games', 1),
(8, 'national', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(5) NOT NULL,
  `message` varchar(500) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `to_id` int(5) NOT NULL,
  `from_id` int(5) NOT NULL,
  `is_read` int(5) NOT NULL DEFAULT 0,
  `is_delete` int(5) NOT NULL DEFAULT 0,
  `sent_delete` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `message`, `attachment`, `to_id`, `from_id`, `is_read`, `is_delete`, `sent_delete`, `date`) VALUES
(1, 'are you verified', '', 4, 1, 1, 0, 0, '2026-08-06 20:09:48'),
(2, 'is this pic original', 'messages/zilla.jpg', 11, 1, 0, 0, 0, '2026-08-06 20:10:31'),
(3, 'how the news happening in bihar i want updates right now', '', 8, 1, 0, 0, 0, '2026-08-06 20:16:18'),
(4, 'is hyderabad coverage good?? anything wrong??', '', 6, 1, 0, 0, 0, '2026-08-06 20:16:42'),
(5, 'hello deepika are you amember or a news agent are you verified have you seenthis image im sending you\r\n', 'messages/teencrime.jpg', 12, 1, 0, 1, 1, '2026-08-06 20:17:26'),
(6, 'is chennai working good ', 'messages/chenent.jpg', 9, 1, 0, 0, 0, '2026-08-06 20:23:42'),
(7, 'is chennai working good ', 'messages/chenent.jpg', 9, 1, 0, 0, 0, '2026-08-06 20:27:57'),
(8, 'r you really an adming or just spam dod', '', 1, 12, 1, 0, 1, '2026-08-06 21:26:22'),
(9, 'flajfadf\r\n', '', 1, 4, 1, 0, 0, '2026-08-07 09:49:23'),
(10, 'aldjfklklk', '', 1, 4, 1, 0, 0, '2026-08-07 09:49:30'),
(11, 'kldkljakjkjldskkjsdfkljfklj', '', 0, 4, 0, 0, 0, '2026-08-07 09:49:35'),
(12, 'hllo hos', '', 1, 4, 1, 0, 0, '2026-08-07 09:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `replied_on` int(5) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `news_id`, `user_id`, `comments`, `date`, `replied_on`, `is_verified`, `is_delete`) VALUES
(1, 17, 12, 'this movie is going to be a flop\r\n', '2026-08-05 15:27:47', 0, 1, 0),
(2, 17, 12, 'this movie is going to be a flop\r\n', '2026-08-05 15:29:36', 0, 0, 0),
(3, 14, 4, 'wrestling fake', '2026-08-10 09:36:57', 0, 0, 0),
(5, 23, 4, 'drinking is injurious to health', '2026-08-11 12:08:43', 0, 0, 1),
(6, 23, 4, 'drinking is injurious to health', '2026-08-11 12:09:38', 0, 0, 1),
(7, 18, 4, 'sam raimi spiderman was good', '2026-08-11 12:23:23', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(5) NOT NULL,
  `news_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `news_id`, `user_id`) VALUES
(1, 20, 4),
(2, 19, 4),
(3, 19, 12),
(4, 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_id` int(5) NOT NULL,
  `location` text NOT NULL,
  `loc_is_delete` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `location`, `loc_is_delete`) VALUES
(1, 'all', 0),
(2, 'hyderabad', 0),
(3, 'chennai', 0),
(4, 'bihar', 0),
(6, 'nicobar', 1),
(7, 'habsiguda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_table`
--

CREATE TABLE `news_table` (
  `nid` int(5) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `n_category_id` int(5) NOT NULL,
  `n_location_id` int(5) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `reporter_id` int(5) NOT NULL,
  `news_image` varchar(50) NOT NULL,
  `posted_date` date NOT NULL DEFAULT current_timestamp(),
  `views` int(5) NOT NULL,
  `is_delete` int(5) NOT NULL DEFAULT 0,
  `is_publish` int(5) NOT NULL DEFAULT 0,
  `published_by` int(5) DEFAULT NULL,
  `is_breaking` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_table`
--

INSERT INTO `news_table` (`nid`, `heading`, `n_category_id`, `n_location_id`, `description`, `reporter_id`, `news_image`, `posted_date`, `views`, `is_delete`, `is_publish`, `published_by`, `is_breaking`) VALUES
(1, 'Fatal accident by Hyderabad puts underage dri', 2, 2, 'Hyderabad: The spotlight is back on underage driving in Hyderabad after a 17-year-old lost control of a car he was driving in Yousufguda on Sunday, August 2, ramming into seven parked motorcycles, killing a 60-year-old man and critically injuring another. Data shows that the problem appears to be getting worse despite tougher laws and sustained enforcement drives.\r\n\r\nThe Hyderabad Commissionerate registered 3,283 underage driving cases in 2024. In 2025, that figure more than doubled to 7,808. In the first five months of this year alone, 2,539 such cases were booked, said Joint Commissioner of Police (Traffic) Joel Davis at a recent road safety meeting.\r\n\r\nPolice have moved beyond issuing traffic challans to registering criminal cases under Section 199A of the Motor Vehicles Act, under which both the minor and the parent or vehicle owner face prosecution. Under Section 199A, parents or vehicle owners who permit a minor to drive face a fine of Rs 25,000 and imprisonment of up to three years. The vehicle’s registration certificate (RC) is suspended for 12 months, and the minor is barred from obtaining a driving licence until the age of 25. ', 5, 'newspic/teencrime.jpg', '2026-08-05', 0, 0, 0, 0, 0),
(2, 'Cyberabad Police nab interstate ATM attention-dive', 2, 2, 'Hyderabad: The Cyberabad police have arrested an interstate criminal gang of six members, involved in cheating people, particularly senior citizens, at ATM centres.\r\n\r\nShahjad alias Sazza, Ajrudeen and Mohammad Jafar, all auto drivers, hail from Rajasthan but live in Jeedimetla.\r\n\r\nThe other accused, Mohd Vasim (25) driver; Sakib (28), who works at a kirana store; and Md Asfak Khan, aged 25, unemployed, all live in Haryana.\r\nThe following day, the complainant was notified that Rs 65,400 was withdrawn from his account without his knowledge.\r\n\r\nAccording to the police, the accused lurk at isolated ATMs and approach unassuming people, particularly the elderly, pretending to assist them. They discreetly take note of the victims’ ATM details and replace other cards.\r\n\r\nThe accused would leave the area and later use the stolen ATM card to withdraw cash. The accused also make transactions through POS (Point of Sale) swipe machines, cheating the victims, police said.\r\n\r\nCrime committed in Haryana as well\r\nInvestigation revealed that the accused committed similar offences in Ameenpur, Hyderabad, Cyberabad, and surrounding areas, as well as in Haryana, where some of them originate\r\n\r\nDuring interrogation, the accused confessed that they withdrew cash using stolen ATM cards and spent part of the money on personal expenses.', 5, 'newspic/atm.jpg', '2026-08-05', 1, 0, 1, 10, 0),
(3, 'Esha Singh felicitated by Sports Authority of Tela', 3, 2, 'Sports Authority of Telangana Managing Director Dr A Soni Bala Devi felicitated ace shooter Esha Singh following her gold medal victory at the ISSF World Cup Pistol Shooting Championships in China, praising her historic achievement and wishing her continued success\r\nHyderabad: Dr A Soni Bala Devi, Managing Director of the Sports Authority of Telangana, congratulated ace shooter Esha Singh for her outstanding achievement in winning the gold medal at the ISSF World Cup Pistol Shooting Championships held in Hangzhou, China.\r\n\r\nEsha Singh paid a courtesy visit to Dr A Soni Bala Devi at the Sports Authority office in LB Stadium, Hyderabad, where the Managing Director felicitated her and extended heartfelt congratulations to the young shooter.\r\n\r\nSpeaking on the occasion, Dr A Soni Bala Devi said Esha Singh’s remarkable victory had brought immense pride to India and further elevated the country’s stature on the international sporting stage. She lauded Esha for creating history by becoming the first shooter to win back-to-back World Cup gold medals in the pistol shooting category, describing the feat as a matter of great pride for the nation and Telangana.\r\n\r\nDr A Soni Bala Devi wished Esha Singh continued success in her sporting career and expressed confidence that she would achieve many more milestones, bringing further international recognition and glory to both India and Telangana.', 6, 'newspic/hydsport.jpg', '2026-08-05', 0, 0, 1, NULL, 0),
(4, 'Charminar Chargers and Gladiators storm into baske', 3, 2, 'Hyderabad: Charminar Chargers Girls booked a berth in the final against Birla Blazers, which had already qualified as the top team in the league phase, with a convincing 38-24 win over Secunderabad Stallions. In the boys section, Golconda Gladiators will meet Secunderabad Stallions, which had already qualified as the top team in the league phase, after trouncing Birla Blazers 67-42 in the Hyderabad District Basketball Championship at YMCA, Secunderabad, here on Tuesday.\r\n\r\nIn the sub-junior girls’ eliminator, Charminar Chargers led 16-6 at half-time.\r\n\r\nAfter the change of ends, Charminar Chargers regrouped and played a fast-paced game. Saanvika, with good support from Anika and Viya, scored 17 points while restricting Secunderabad Stallions to just four points, taking a 23-16 lead at the end of the third quarter. In the last quarter, Charminar Chargers dominated, adding another 15 points to their tally to win the match comfortably 38-24.\r\n\r\nIn the sub-junior boys’ eliminator, Rishon and Trishul played well for Birla Blazers, while Manideep and Moksha starred for the Gladiators.\r\n\r\nAided by two three-pointers, one each from Mohd Rahman and Manideep, the Gladiators led 21-15 at the end of the first quarter.\r\n\r\nGladiators led 29-22 at half-time.\r\n\r\nAfter the lemon break, both teams tightened their defence, but Manideep’s three-pointer and drive-in shot helped the Gladiators extend their lead. They added 11 points to their tally against five points scored by the Blazers to lead 40-27 at the end of the third quarter.\r\n\r\nIn the last quarter, Blazers tried hard to stage a comeback through Rishon and Trishul, who played in tandem. However, Manideep, Ansh and Itihas were unstoppable, scoring at will and adding another 27 points to help the Gladiators register a comfortable 67-42 win.', 6, 'newspic/hydbask.jpg', '2026-08-05', 0, 0, 1, NULL, 0),
(5, 'Oh Sukumari\' OTT release: When and where to watch ', 4, 3, 'The makers of the Telugu romantic comedy, featuring Thiruveer and Aishwarya Rajesh in the lead roles, have officially confirmed that the film will begin streaming on Prime Video from August 7, 2026. The film is also expected to be available in multiple language options.\r\nThe makers of the Telugu romantic comedy, featuring Thiruveer and Aishwarya Rajesh in the lead roles, have officially confirmed that the film will begin streaming on Prime Video from August 7, 2026. The film is also expected to be available in multiple language options.\r\n', 7, 'newspic/entchen.jpg', '2026-08-05', 0, 0, 0, NULL, 0),
(6, 'Andrea Jeremiah dismisses \'Arasan\' rumours, confir', 4, 3, 'She then firmly added, \"I\'m not Simbu\'s mother. I\'m the same Chandra. Arasan is the continuation of Vada Chennai.\" Her clarification quickly caught the attention of fans, many of whom had been debating the reports online. With her statement, Andrea Jeremiah confirmed that her character from \'Vada Chennai\' will continue in the new film without any major change to her identity.\r\nAndrea Jeremiah ends fan confusion with a direct clarification\r\nAndrea\'s remarks have largely put an end to the speculation surrounding her role. Since the rumours first surfaced, several social media posts claimed she would be seen in an entirely different character alongside Simbu. However, the actress has now made it clear that those reports are false. Fans of Vada Chennai will instead see her reprise Chandra, one of the memorable characters from the acclaimed gangster drama. Her confirmation has also increased excitement about how Chandra\'s journey will continue in the new story, which is expected to expand the \'Vada Chennai\' universe.', 7, 'newspic/and.jpg', '2026-08-05', 1, 0, 1, NULL, 0),
(7, 'Devdutt Pattanaik writes: When vegetarianism becom', 5, 4, 'Nathuram Godse killed Gandhi. Was he a vegetarian? As per Hindu lore, Parashuram slaughtered generations of Kshatriyas. Was he a vegetarian? As per Jain lore, Akbar and Aurangzeb embraced vegetarianism. Did that make them non-violent? These are questions that need to be asked by the next generation of historians and scientists as politicians proclaim that meat eating makes people violent.\r\n\r\nIs the opposite true? Are vegetarians kinder people? Are vegetarians less likely to be murderers? There is no scientific paper that proves that eating vegetarian food makes a person morally superior, gentler, or more compassionate. Yet, in India, the belief that vegetarians are nicer people isNathuram Godse killed Gandhi. Was he a vegetarian? As per Hindu lore, Parashuram slaughtered generations of Kshatriyas. Was he a vegetarian? As per Jain lore, Akbar and Aurangzeb embraced vegetarianism. Did that make them non-violent? These are questions that need to be asked by the next generation of historians and scientists as politicians proclaim that meat eating makes people violent.\r\n\r\nIs the opposite true? Are vegetarians kinder people? Are vegetarians less likely to be murderers? There is no scientific paper that proves that eating vegetarian food makes a person morally superior, gentler, or more compassionate. Yet, in India, the belief that vegetarians are nicer people is', 8, 'newspic/histo.jpg', '2026-08-05', 0, 0, 0, NULL, 0),
(8, 'House of Yadavs: RJD digs in its heels over 10, Ci', 5, 4, 'A day after the Bihar government issued a letter allotting RJD leader Rabri Devi a different house, the party said the Leader of the Opposition in the Legislative Council would not move out of her current address — 10, Circular Road, Patna — and claimed the decision seemed “politically motivated”.\r\n\r\n“Rabri Devi won’t vacate the house because it has a lift for Lalu Prasad ji, who needs it because of health reasons, and there are security reasons for retaining the house. The house, unlike the one allotted, has adequate space to keep the combined security of her and Lalu Prasad. And the decision looks politically motivated and smacks of spite. This house was first allotted to Rabri Devi as former CM and later as LoP, Legislative Council, after the Supreme Court made it clear that the government was not obliged to allot a house to a former CM. I also want to know why 10, Circular Road, cannot be earmarked as the residence of the LoP, Council, just as the government has earmarked houses of the CM, Deputy CMs, LoP of the Assembly, Speaker, and Legislative Council chairman. We would again request the government to withdraw the order and earmark the existing residence for the LoP, Legislative Council.” RJD state president Mangani Lal Mandal told The Indian Express.A day after the Bihar government issued a letter allotting RJD leader Rabri Devi a different house, the party said the Leader of the Opposition in the Legislative Council would not move out of her current address — 10, Circular Road, Patna — and claimed the decision seemed “politically motivated”.\r\n\r\n“Rabri Devi won’t vacate the house because it has a lift for Lalu Prasad ji, who needs it because of health reasons, and there are security reasons for retaining the house. The house, unlike the one allotted, has adequate space to keep the combined security of her and Lalu Prasad. And the decision looks politically motivated and smacks of spite. This house was first allotted to Rabri Devi as former CM and later as LoP, Legislative Council, after the Supreme Court made it clear that the government was not obliged to allot a house to a former CM. I also want to know why 10, Circular Road, cannot be earmarked as the residence of the LoP, Council, just as the government has earmarked houses of the CM, Deputy CMs, LoP of the Assembly, Speaker, and Legislative Council chairman. We would again request the government to withdraw the order and earmark the existing residence for the LoP, Legislative Council.” RJD state president Mangani Lal Mandal told The Indian Express.', 8, 'newspic/', '2026-08-05', 0, 1, 0, NULL, 0),
(9, 'Newsmaker | Who is Mukesh Sahani, the Mahagathband', 5, 4, 'HIS Bollywood dreams may have remained unfulfilled, but Mukesh Sahani has just landed a starring role. The Vikassheel Insaan Party (VIP) chief, with no MLAs in the Assembly but suitors in both the Bihar political fronts, has been declared by the Mahagathbandhan as its deputy chief minister face.\r\n\r\nBy all accounts, Sahani fought hard for this, and will be satisfied that the announcement of his name was made at the same press conference whereHIS Bollywood dreams may have remained unfulfilled, but Mukesh Sahani has just landed a starring role. The Vikassheel Insaan Party (VIP) chief, with no MLAs in the Assembly but suitors in both the Bihar political fronts, has been declared by the Mahagathbandhan as its deputy chief minister face.\r\n\r\nBy all accounts, Sahani fought hard for this, and will be satisfied that the announcement of his name was made at the same press conference where', 8, 'newspic/bihar.jpg', '2026-08-05', 1, 0, 1, 1, 0),
(10, 'Four-year-old boy critically injured after father ', 2, 2, 'Hyderabad: A four-year-old boy was critically injured after his father allegedly attacked him with a stone in Gudimalkapur on Wednesday.\r\n\r\nThe suspect, identified as Salman, was taken into police custody following the incident.\r\n\r\nAccording to police, Salman, a resident of Golconda, frequently consumed alcohol, leading to repeated disputes with his wife. He allegedly believed that his son, Armaan, was an obstacle in their family issues and planned to kill the child.\r\n\r\nOn Wednesday morning, Salman reportedly told family members that he was taking Armaan to visit relatives at Aramghar. Instead, he allegedly took the boy near a pillar of the PV Expressway, where he struck the child’s head with a stone Hyderabad: A four-year-old boy was critically injured after his father allegedly attacked him with a stone in Gudimalkapur on Wednesday.\r\n\r\nThe suspect, identified as Salman, was taken into police custody following the incident.\r\n\r\nAccording to police, Salman, a resident of Golconda, frequently consumed alcohol, leading to repeated disputes with his wife. He allegedly believed that his son, Armaan, was an obstacle in their family issues and planned to kill the child.\r\n\r\nOn Wednesday morning, Salman reportedly told family members that he was taking Armaan to visit relatives at Aramghar. Instead, he allegedly took the boy near a pillar of the PV Expressway, where he struck the child’s head with a stone ', 5, 'newspic/crime hyd.jpg', '2026-08-05', 3, 0, 0, NULL, 0),
(11, 'Man hacked to death in full public view in Saidaba', 2, 2, 'Hyderabad: A 35-year-old man was brutally hacked to death in public view in Saidabad on Tuesday.\r\n\r\nThe incident took place at Singareni Colony, where the victim, identified as Hameer, was allegedly attacked in full public view by a local resident wielding a coconut-cutting machete.\r\n\r\nHameer suffered severe injuries in the assault and was rushed to a nearby private hospital, where he later succumbed to his injuries.\r\n\r\nPreliminary information suggests that the victim had several criminal cases registered against him in the past. However, police are yet to ascertain whether those cases were linked to the motive behind the killing.\r\n\r\nOn receiving information, the Saidabad police reached the crime spot along with the CLUES team. A case was booked and an investigation to determine the exact circumstances and motive behind the murder is on.\r\n', 5, 'newspic/', '2026-08-05', 0, 1, 0, NULL, 0),
(12, 'Man hacked to death in full public view in Saidaba', 2, 2, 'Hyderabad: A 35-year-old man was brutally hacked to death in public view in Saidabad on Tuesday.\r\n\r\nThe incident took place at Singareni Colony, where the victim, identified as Hameer, was allegedly attacked in full public view by a local resident wielding a coconut-cutting machete.\r\n\r\nHameer suffered severe injuries in the assault and was rushed to a nearby private hospital, where he later succumbed to his injuries.\r\n\r\nPreliminary information suggests that the victim had several criminal cases registered against him in the past. However, police are yet to ascertain whether those cases were linked to the motive behind the killing.\r\n\r\nOn receiving information, the Saidabad police reached the crime spot along with the CLUES team. A case was booked and an investigation to determine the exact circumstances and motive behind the murder is on.\r\n\r\nFollow Us :', 5, 'newspic/newstoday.jpg', '2026-08-05', 0, 0, 1, 10, 0),
(13, 'Hyderabad police arrest man with 15 fake education', 2, 2, 'The accused, identified as Abdul Rashed Khan, son of Abdul Razzak Khan, is a businessman residing in Ahmad Colony, Naseeb Nagar, Chandrayangutta, Hyderabad. Police seized 15 fake educational certificates, a Vivo mobile phone, and a Suzuki Burgman scooter from him.\r\n\r\nA case has been registered at Mirchowk Police Station under Crime No. 175/2026, citing Sections 338 and 339 of the Bharatiya Nyaya Sanhita (BNS). Authorities confirmed that two additional suspects remain at large, with efforts ongoing to locate and detain them.\r\n\r\nAccording to police, the primary objective of the accused was to generate quick profits by selling counterfeit educational certificates to individuals seeking employment abroad. The seized certificates purportedly included documents from the SRM Institute of Science and Technology in Tamil Nadu and the Maharashtra State Board of Secondary and Higher Secondary Education, Pune.\r\n\r\nThe arrest and recovery were conducted under the guidance of Khare Kiran Prabhakar, IPS, Deputy Commissioner of Police for the Charminar Zone, and M. A. Majeed, Additional Deputy Commissioner of Police, Charminar Zone. The operation was supervised by G. Shyam Sundar, Assistant Commissioner of Police, Mirchowk Division, along with M. Kondala Rao, Inspector of Police, Mirchowk Police Station; N. Saidaiah, Detective Inspector; and Sub-Inspector C. Anitha.\r\n\r\nPolice officers Mohammed Jani, MA Akheel Pasha, Sri B. Sravan Kumar, and B. Ashok of Mirchowk Police Station actively participated in the case. Senior officials expressed high appreciation for the Mirchowk Police team’s exemplary work.', 5, 'newspic/hydfraud.jpg', '2026-08-05', 4, 0, 1, 10, 0),
(14, 'Brock Lesnar retires from wrestling after SummerSl', 3, 2, 'Lesnar recounted that after losing to Femi at WrestleMania 42 in April, he felt he was done as a wrestler, having removed his gloves and boots in the ring. However, he returned to defeat the 28-year-old at Clash in Italy in May before ultimately losing to him in a Hell in a Cell match at SummerSlam. After the match, Lesnar raised Oba Femi’s hand in a gesture of respect, calling him “the future of WWE” and referring to himself as “the past.”\r\n\r\n“I am here today to let the world know that I am retired,” Lesnar said on the show, as quoted by ESPN. He added: “Saturday was a very emotional day for me. It was kind of weird. When Oba Femi slammed me at WrestleMania, I said, ‘I cannot do this anymore. I think I am done.’ But the business called, and I still had some fuel in the tank.”\r\n\r\nHe concluded, “Saturday, for Brock Lesnar, that is it. That is it for me in the squared circle and everything else.”\r\n\r\nLesnar’s retirement brings to a close one of the most distinguished careers in combat sports. A two-time All-American and two-time Big Ten wrestling champion, he won the NCAA Division I national championship in 2000 representing the University of Minnesota before signing with WWE.\r\n\r\nKnown for his physicality, athleticism, and signature F5 finishing move, Lesnar secured his first of ten WWE Championship titles by defeating Dwayne ‘The Rock’ Johnson in 2002. His accolades also include victories in the Royal Rumble (2003, 2022), King of the Ring tournament (2002), and the Money in the Bank ladder match (2019), which granted him a world championship match contract at any time.\r\n\r\nIn 2004, Lesnar briefly left WWE to pursue a career in the National Football League (NFL), appearing in preseason games for the Minnesota Vikings before his release. He then transitioned to mixed martial arts in 2007, winning the UFC Heavyweight title in 2008 against Randy Couture.\r\n\r\nLesnar retired from MMA in 2011, returned to WWE in 2012, and engaged in notable matches against wrestlers including John Cena, Triple H, CM Punk, Roman Reigns, The Undertaker, and others. A career-defining moment occurred at WrestleMania 30 in 2014 when he ended The Undertaker’s 21-0 undefeated streak.\r\n\r\nThough he retired from MMA in 2015, he fought one final bout in 2016. His final WWE run spanned from 2021 to 2026, during which he was known for his use of German suplexes, popularising the term “Suplex City.”\r\n\r\nReflecting on his journey, Lesnar said, “I was just a farm kid from South Dakota with a big dream, a big heart and a big-ass chip on my shoulder. I am just grateful to be 49 years old and have been able to do what I did in this lifetime. I thank God and everybody that supported me.”', 6, 'newspic/brock.jpg', '2026-08-05', 8, 0, 1, 1, 0),
(15, 'Lionel Messi donates 80,000 euros for Madrid wildf', 3, 2, 'Football star Lionel Messi has contributed 80,000 euros towards reconstruction efforts in areas of Madrid affected by recent wildfires, Isabel Diaz Ayuso, president of the Madrid regional government, announced on social media.\r\n\r\nDiaz Ayuso expressed gratitude for Messi’s support, stating, “Leo Messi has donated 80,000 euros to rebuild the Sierra Oeste area in Madrid. I would like to thank him, and to tell him that the people of Madrid look forward to welcoming him soon and giving him the applause he deserves.”Football star Lionel Messi has contributed 80,000 euros towards reconstruction efforts in areas of Madrid affected by recent wildfires, Isabel Diaz Ayuso, president of the Madrid regional government, announced on social media.\r\n\r\nDiaz Ayuso expressed gratitude for Messi’s support, stating, “Leo Messi has donated 80,000 euros to rebuild the Sierra Oeste area in Madrid. I would like to thank him, and to tell him that the people of Madrid look forward to welcoming him soon and giving him the applause he deserves.”', 6, 'newspic/mess.jpg', '2026-08-05', 12, 0, 1, NULL, 0),
(16, 'Inside ‘I Is Another’: The True(ish) Story of the ', 4, 3, 'A few years ago German writer-director Felix Randau (Iceman) got what sounded like an interesting proposal from France: to direct episodes of a miniseries about Felix Kersten, the former massage therapist of Nazi SS leader Heinrich Himmler.\r\n\r\n“When I got back to Berlin and read their concept, I really liked it,” he recalls. “But there was this one special sentence in it that said, ‘If Steven Spielberg had known about Felix Kersten, he would have shot a film about Felix Kersten and not about Oskar Schindler.’ I knew that Steven Spielberg struggled for, I don’t know, about 10 years before he started shooting Schindler’s List, and he’s a smart guy who has a lot of assistance. So I became suspicious and started my own research, going to the archives and reading a lot of books and stuff.”A few years ago German writer-director Felix Randau (Iceman) got what sounded like an interesting proposal from France: to direct episodes of a miniseries about Felix Kersten, the former massage therapist of Nazi SS leader Heinrich Himmler.\r\n\r\n“When I got back to Berlin and read their concept, I really liked it,” he recalls. “But there was this one special sentence in it that said, ‘If Steven Spielberg had known about Felix Kersten, he would have shot a film about Felix Kersten and not about Oskar Schindler.’ I knew that Steven Spielberg struggled for, I don’t know, about 10 years before he started shooting Schindler’s List, and he’s a smart guy who has a lot of assistance. So I became suspicious and started my own research, going to the archives and reading a lot of books and stuff.”', 7, 'newspic/mvie.jpg', '2026-08-05', 1, 0, 1, NULL, 0),
(17, 'NY Film Festival to Host World Premiere of ‘Godzil', 4, 3, 'Godzilla Minus Zero picks up two years after the events of Godzilla Minus One, in 1949, and continues the story of the Shikishima family as they face a new threat.\r\n\r\n“An experience that demands the big screen, featuring even more astounding effects choreography than its predecessor, Godzilla Minus Zero cranks up the terror while always keeping its post-WWII Japan narrative at human eye level,” the festival said in Tuesday’s announcement.\r\n\r\nGKIDS will release Godzilla Minus Zero on Nov. 6 in the U.S. and Nov. 3 in Japan.\r\n\r\n“More than 70 years after the first Godzilla movie, Takashi Yamazaki continues to prove that there’s life in the old franchise yet, returning to its postwar roots to locate a haunting, primal terror,” NYFF artistic director Dennis Lim said in a statement. “Like its predecessor, Godzilla Minus Zero is a throwback blockbuster, a showcase for human drama and innovative craft, and we are excited to have its world premiere as this year’s NYFF Spotlight gala.”\r\n\r\nYamazaki added, “It is truly an honor to introduce our film to a global audience for the first time in a place of such history and prestige. I am filled with both awe and excitement to see how far the power of Japan’s Godzilla can terrify audiences around the world, and whether they will resonate with what lies beyond that fear.”\r\n\r\nThe 64th New York Film Festival will open with the North American premiere of James Gray’s Paper Tiger, screen Tony Gilroy’s Pedro Pascal starrer Behemoth! as the centerpiece film and close with the world premiere of Ava DuVernay’s 14th. The 2026 NYFF is set to run from\r\n', 7, 'newspic/zilla.jpg', '2026-08-05', 15, 0, 1, NULL, 0),
(18, 'The Box Office Is Finally Back: “We’re All Breathi', 4, 3, 'And now: Spider-Man, Spider-Man, delivering an opening weekend that seemingly only Spider-Man can. Nearly $1 billion globally in just a handful of days, an all-time record opening of $360 million domestic. The film wasn’t even some “you must see this in a pricy premium format” release like an Avatar or Dune.\r\n\r\nSo far, 2026 is shaping up to be the strongest post-pandemic year at the box office to date, raking in about $6.2 billion domestically through last Sunday. That’s 15 percent ahead of the same point in 2025, with five movies approaching or crossing $1 billion globally. The second quarter, in particular, very nearly matched the same periods in 2017 through 2019.\r\n\r\n“We’re all breathing a hell of a lot easier,” one major exhibitor representative said.\r\n\r\nThe weekend numbers are expected to drop considerably, however, as we go into fall. Potential breakouts on the calendar include Zach Cregger’s Resident Evil reboot (Sept. 18), DC’s horror effort Clayface (Oct. 23), and The Hunger Games: Sunrise on the Reaping (Nov. 20). But a trio of potential blockbusters will swoop in just under the calendar wire, with Dune: Part Three and Avengers: Doomsday coming Dec. 18, and Jumanji: Open World on Dec. 25.\r\n\r\nBut this week really belongs to the man in the red and blue suit, with a title that kicked that tiresome post-pandemic virus — superhero fatigue (and, perhaps, its even scarier mutant strain: franchise fatigue). Credit Sony and Marvel for their outstanding stewardship of the Spider-Man brand despite a seemingly “too many cooks” joint custody arrangement along with Pascal Pictures. The three previous stand-alone Tom Holland Spider-Man movie have all been critical and audience hits, and the actor has enjoyed winsome appearances in a trio of popular MCU team-up movies. DC and Marvel have had their hits and misses in recent years — more misses than either would care to admit — yet Spider-Man’s creative chain of custody has remained strong, and not too frequent (there was, thankfully, no Disney+ spin-off series).\r\n\r\nOne can speculate that a few other factors boosted Brand New Day. The film directed by Destin Daniel Cretton went for a relatively “grounded” vibe at a time when genre films that feel more realistic are registering with fans compared to fantastical efforts (like Supergirl or Fantastic Four). As pointed out by longtime Spider-Man comic book writer J. Michael Straczynski, Brand New Day also avoided the tired “MacGuffin quest” trope — where superheroes try to obtain or stop some magical object — and instead felt more character-driven. Plus, Holland and his co-star Zendaya are arguably at the top of their game, and the height of their box-office drawing power, with fans enamored with the now-married couple’s real-life relationship.\r\n\r\nAnd finally, Brand New Day is, quite simply, a great time at the theater. The film has the highest Rotten Tomatoes audience score, 98 percent, of any live-action Spider-Man film.', 7, 'newspic/spidey.jpg', '2026-08-05', 25, 0, 1, NULL, 0),
(19, 'Projectile sinks Indian-flagged ship off Yemen coa', 6, 2, 'An Indian-flagged vessel capsized and sunk after it was hit by a projectile off the coast of Yemen, officials say.\r\n\r\nAll 14 people on board the MSV ​Faize Noore Oliya - 13 of which were Indian nationals - were safely rescued, India\'s Shipping Minister Sarbananda Sonowal said.\r\n\r\nSonowal condemned the \"unprovoked attack\" and said steps would be taken to ensure the safety of seafarers in the region. It is not clear who struck the ship.\r\n\r\nIt is the latest in a spate of attacks on vessels in the Red Sea, an alternative waterway that some tankers had been using since Iran blocked the Strait of Hormuz in February.\r\n\r\nThreat to oil tankers in Middle East worst since start of Iran war, analysts say\r\nIndia\'s ministry of external affairs later released a statement calling attacks on commercial shipping in the region \"deeply worrisome\".\r\n\r\n\"The targeting of commercial shipping in the region must end, and free and unimpeded navigation and commerce through the international waterways in the region, in keeping with international law, must be restored at the earliest,\" the ministry said.\r\n\r\nMuch of the region\'s shipping routes have been disrupted since the US and Israeli strikes on Iran in late February.\r\n\r\nSince then, Iran has blocked the Strait of Hormuz, one of the world\'s busiest oil shipping channels, hugely impacting global oil prices.\r\n\r\nSome \r\ncarrying oil from Saudi Arabia had instead passed through an alternative shipping lane in the Red Sea, but a recent spate of attacks by Yemen\'s Houthi fighters on Saudi tankers has further heightened risks in the region.', 11, 'newspic/break.jpg', '2026-08-05', 13, 0, 1, NULL, 1),
(20, 'Listening to youth is ‘most powerful force’ to pre', 6, 2, 'The Supreme Court on Wednesday said the “most powerful force” available to society and law enforcement authorities to prevent violence during protests is to listen to young people and counsel them, cautioning that any “aggressive action in the name of the mighty State” could aggravate the situation and trigger further unrest.\r\n\r\nA security official carries out Lathi charge on protestors during their protest march towards Parliament called by Cockroach Janta Party, near Jantar Mantar in New Delhi. (ANI)\r\nA security official carries out Lathi charge on protestors during their protest march towards Parliament called by Cockroach Janta Party, near Jantar Mantar in New Delhi. (ANI)\r\nA bench comprising Chief Justice of India (CJI) Surya Kant and justices Joymalya Bagchi and V Mohana made the observations while agreeing to hear a petition seeking action against the organisers of the July 20 “Sansad Chalo” march in the national capital, during which violence had broken out. The court directed that the plea be tagged with the batch of petitions already pending before it concerning the student protests and the alleged police excesses during the demonstrations.The Supreme Court on Wednesday said the “most powerful force” available to society and law enforcement authorities to prevent violence during protests is to listen to young people and counsel them, cautioning that any “aggressive action in the name of the mighty State” could aggravate the situation and trigger further unrest.\r\n\r\nA security official carries out Lathi charge on protestors during their protest march towards Parliament called by Cockroach Janta Party, near Jantar Mantar in New Delhi. (ANI)\r\nA security official carries out Lathi charge on protestors during their protest march towards Parliament called by Cockroach Janta Party, near Jantar Mantar in New Delhi. (ANI)\r\nA bench comprising Chief Justice of India (CJI) Surya Kant and justices Joymalya Bagchi and V Mohana made the observations while agreeing to hear a petition seeking action against the organisers of the July 20 “Sansad Chalo” march in the national capital, during which violence had broken out. The court directed that the plea be tagged with the batch of petitions already pending before it concerning the student protests and the alleged police excesses during the demonstrations.', 11, 'newspic/team.jpg', '2026-08-05', 25, 0, 1, NULL, 1),
(21, 'Ameenpur police book suspended Jubilee Hills CI Sr', 2, 2, 'Sangareddy: Ameenpur police registered rape, culpable homicide, IT Act and cases under several other sections against Inspector U Sreenivasulu Reddy following a complaint filed by a woman living in Jayalakshmi Nagar under the police station limits.\r\n\r\nFollowing her complaint, Hyderabad Police Commissioner VC Sajjanar suspended Sriniuvasulu Reddy, who was working as SHO of Jubilee Hills police station, from duties on July 28.\r\n\r\nSrinivasulu Reddy, who worked as CI Ameenpur in the past, befriended the victim when she approached him in a case. In her complaint, the woman said that the CI sexually exploited her. She said that he recorded her videos and threatened her with serious consequences if she revealed the relationship to anyone.\r\n\r\nThe victim said that he forced her to undergo an abortion when she became pregnant after he exploited her. She said that the CI also forcibly took a huge amount from her.', 5, 'newspic/police.jpg', '2026-08-08', 0, 0, 0, NULL, 0),
(22, 'Watch: Ruckus at Secunderabad Bonalu cheque distri', 2, 2, 'Hyderabad: Ruckus prevailed at a Bonalu cheque distribution programme in Secunderabad on Friday over a protocol issue, with BRS and Congress leaders engaging in heated arguments.\r\n\r\nCongress leaders began distributing cheques even before local MLA T Padma Rao Goud, who was scheduled to formally distribute them, arrived at the Madhuranagar Community Hall, the venue for the programme. BRS leaders objected to the distribution in the MLA’s absence. Funds of Rs 1.10 crore had been released for 212 cheques in the Secunderabad constituency, and the distribution was scheduled for Friday.\r\n\r\nHowever, MLC Balmuri Venkat, accompanied by Congress leaders from Secunderabad, began distributing the cheques. BRS leaders attempted to intervene. Meanwhile, Padma Rao Goud arrived at the venue and expressed his displeasure after finding that the distribution was already under way.\r\n\r\nBRS leaders strongly objected to the presence of the defeated Congress candidate from Secunderabad on the stage and his distribution of the cheques. This led to a scuffle between the two groups. Congress leaders raised “Go Back” slogans against the MLA, apparently provoking BRS leaders, who responded with slogans against Chief Minister A Revanth Reddy. The exchange escalated into a scuffle between members of the two parties.\r\n\r\nChilakalaguda police arr', 5, 'newspic/ruckus.jpg', '2026-08-08', 14, 0, 1, 10, 1),
(23, 'car kills Army jawan, injures several in ', 2, 2, 'Hyderabad: A speeding car, allegedly driven by a group of youths in an inebriated condition, ran amok at Hayath Shahkote on Sunday night, August 9, killing an Army jawan and leaving several others injured.\r\n\r\nAccording to preliminary information, the car was being driven recklessly and allegedly came onto the wrong side of the road before hitting the Army personnel. The impact was so severe that the jawan died on the spot.\r\n\r\nThe car did not stop after the first collision and allegedly went on to hit several other persons. At least one of the injured persons was reported to be in critical condition. The injured were shifted to a nearby hospital for t', 5, 'newspic/acc.jpg', '2026-08-10', 27, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(5) NOT NULL,
  `name` text NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `loc_id` int(5) NOT NULL,
  `is_verified` int(5) NOT NULL DEFAULT 0,
  `is_deleted` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `name`, `mobile`, `email`, `password`, `role`, `photo`, `cat_id`, `loc_id`, `is_verified`, `is_deleted`) VALUES
(1, 'admin', '9963880438', 'admin@gmail.com', '1234', 'admin', 'profilepics/1div.jpg', 1, 1, 1, 0),
(4, 'raj', '123658', 'raj@gmail.com', 'asdf', 'member', 'profilepics/2026-08-11_06-03-48and.jpg', 1, 1, 1, 0),
(5, 'reporter hyd crime', '4456999999', 'reporter@gmail.com', 'asdf', 'reporter', '', 2, 2, 1, 0),
(6, 'reporter sport hyd', '2220033', 'reporterhyd2@gmail.com', 'asdf', 'reporter', 'profilepics/pic5.jpg', 3, 2, 1, 0),
(7, 'reporter chennai', '4477552', 'reporterchennai@gmail.com', 'asdf', 'reporter', 'profilepics/pic.jpg', 4, 3, 1, 0),
(8, 'reporterbihar', '7789632', 'reporterbihar@gmail.com', 'asdf', 'reporter', 'profilepics/pic2.jpg', 5, 4, 1, 0),
(9, 'editor chennai', '444777900', 'editorchennai@gmail.com', 'asdf', 'editor', '', 4, 3, 1, 0),
(10, 'editor hyderabad', '11668800', 'editorhyd@gmail.com', 'asdf', 'editor', '', 2, 2, 1, 0),
(11, 'reporter international', '445223698', 'reporterint@gmail.com', 'asdf', 'reporter', '', 6, 2, 1, 0),
(12, 'deepika', '4456932', 'deepika@gmail.com', 'asdf', 'member', '', 1, 1, 1, 0),
(13, 'reporter2', '4455698', 'reporter2@gmail.com', 'asdf', 'reporter', '', 5, 2, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `news_table`
--
ALTER TABLE `news_table`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `reporter_id` (`reporter_id`),
  ADD KEY `n_location_id` (`n_location_id`),
  ADD KEY `n_category_id` (`n_category_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_table`
--
ALTER TABLE `news_table`
  MODIFY `nid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news_table` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_table`
--
ALTER TABLE `news_table`
  ADD CONSTRAINT `news_table_ibfk_1` FOREIGN KEY (`reporter_id`) REFERENCES `user_details` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_table_ibfk_2` FOREIGN KEY (`n_category_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_details_ibfk_3` FOREIGN KEY (`loc_id`) REFERENCES `location` (`loc_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
