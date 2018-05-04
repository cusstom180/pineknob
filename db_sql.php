-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 09:52 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pine_knob`
--

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `id` int(11) NOT NULL,
  `age` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`id`, `age`) VALUES
(1, 'child'),
(2, 'teen'),
(3, 'adult');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `age_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `discount_cde` varchar(10) NOT NULL,
  `net_price` int(11) NOT NULL,
  `cancel` tinyint(1) NOT NULL,
  `cancel_reason` varchar(250) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `add_user` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `session_id`, `sport_id`, `lesson_id`, `age_id`, `employee_id`, `duration_id`, `skill_id`, `date`, `time`, `price`, `client_id`, `discount_cde`, `net_price`, `cancel`, `cancel_reason`, `add_date`, `add_user`) VALUES
(29, '', 1, 1, 2, 1, 1, 1, '2018-04-30', '10:00:00', 0, 0, '', 0, 0, '', '2018-04-20 23:36:00', ''),
(30, '', 1, 1, 2, 1, 1, 1, '2018-04-30', '10:00:00', 0, 0, '', 0, 0, '', '2018-04-20 23:40:29', ''),
(31, '', 1, 1, 3, 1, 1, 2, '2018-04-30', '12:00:00', 0, 0, '', 0, 0, '', '2018-04-26 16:50:52', ''),
(32, '', 1, 1, 1, 1, 1, 2, '2018-04-30', '14:00:00', 0, 0, '', 0, 0, '', '2018-04-27 18:26:21', ''),
(34, '', 1, 1, 1, 0, 0, 2, '2018-05-31', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 16:25:37', ''),
(35, '4vr2547bi2lkmite4rcc523mjsk579l9', 1, 1, 2, 0, 0, 2, '2018-05-31', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 16:41:51', ''),
(36, '8b76f0povm1a7lk857lvg5j85e79bh0k', 1, 1, 2, 0, 0, 2, '2018-05-31', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 17:06:05', ''),
(37, '7798fommjer7aeqti0kna7bftbhuu492', 1, 1, 2, 0, 0, 2, '2018-05-31', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 17:12:05', ''),
(38, '7798fommjer7aeqti0kna7bftbhuu492', 1, 1, 2, 0, 0, 2, '2018-05-31', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 17:13:00', ''),
(39, '', 2, 1, 2, 0, 0, 2, '2018-05-29', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 19:32:08', ''),
(40, '1525462325', 2, 1, 2, 0, 0, 1, '2018-05-28', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 19:36:15', ''),
(41, '1525462731', 1, 1, 1, 0, 0, 4, '2018-05-24', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 19:40:01', ''),
(42, '1525462731', 1, 1, 1, 0, 0, 4, '2018-05-30', '00:00:00', 0, 0, '', 0, 0, '', '2018-05-04 19:42:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_booked`
--

CREATE TABLE `appointment_booked` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_day`
--

CREATE TABLE `appointment_day` (
  `id` int(11) NOT NULL,
  `day` varchar(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_service_provided`
--

CREATE TABLE `appointment_service_provided` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_slot`
--

CREATE TABLE `appointment_slot` (
  `id` int(11) NOT NULL,
  `slot` time NOT NULL,
  `deploy` tinyint(1) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` varchar(250) NOT NULL,
  `deploy` tinyint(1) NOT NULL,
  `revision` int(100) NOT NULL
) ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `slug`, `content`, `deploy`, `revision`) VALUES
(1, 'index', 'get your cheap lessons', 0, 1),
(2, 'thunderbolt', 'get your jacket while supplies last', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `body`
--

CREATE TABLE `body` (
  `id` int(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` varchar(250) NOT NULL,
  `deploy` tinyint(1) NOT NULL,
  `version` int(100) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`id`, `date`) VALUES
(1, '2018-05-31'),
(2, '2018-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `minute` int(11) NOT NULL
) ;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `name`, `minute`) VALUES
(1, 'one hour', 60),
(2, 'two hour', 120);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'first', 'available', '1234567890', 'name@name.com'),
(3, 'lisa', 'naperkoski', '2481234567', 'mom@yahoo.com'),
(4, 'brian', 'naperkoski', '2486065893', 'cusstom180@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee_time_slot`
--

CREATE TABLE `employee_time_slot` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `date_id` int(11) NOT NULL
) ;

--
-- Dumping data for table `employee_time_slot`
--

INSERT INTO `employee_time_slot` (`id`, `employee_id`, `slot_id`, `date_id`) VALUES
(1, 1, 1, 1),
(4, 3, 1, 1),
(5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jumbotron`
--

CREATE TABLE `jumbotron` (
  `id` int(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pattern_id` int(100) NOT NULL,
  `tag_1` varchar(250) NOT NULL,
  `tag_2` varchar(250) NOT NULL,
  `tag_3` varchar(250) NOT NULL,
  `deploy` tinyint(1) NOT NULL,
  `version` int(11) NOT NULL
) ;

--
-- Dumping data for table `jumbotron`
--

INSERT INTO `jumbotron` (`id`, `slug`, `pattern_id`, `tag_1`, `tag_2`, `tag_3`, `deploy`, `version`) VALUES
(1, 'index', 2, 'It is snowing. Enjoy the snow', 'jim bob is back', '', 0, 1),
(2, 'index', 1, 'It is snowing. Enjoy the snow', '', '', 0, 1),
(3, 'index', 6, 'let it snow', 'I want to ski', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet tempor turpis. Donec vestibulum felis non facilisis blandit. Proin porttitor faucibus dignissim. Curabitur volutpat augue metus.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(350) NOT NULL,
  `img` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `price`, `description`, `img`) VALUES
(1, 'private lesson', 65, 'Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.', ''),
(2, 'semi private lesson', 110, 'Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.', '');

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `id` int(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` varchar(150) NOT NULL,
  `version` int(11) NOT NULL
) ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `slug`, `name`, `content`, `version`) VALUES
(1, 'index', 'description', 'premier ski lessons', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(100) NOT NULL,
  `slug_id` int(11) NOT NULL,
  `deploy` tinyint(1) NOT NULL,
  `title_id` int(11) NOT NULL,
  `jumbotron_id` int(11) NOT NULL,
  `meta_id` int(100) NOT NULL,
  `banner_id` int(100) NOT NULL,
  `call_to_action` int(100) NOT NULL,
  `body_id` int(100) NOT NULL,
  `version` int(100) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE `pattern` (
  `id` int(11) NOT NULL,
  `tag_1` varchar(10) NOT NULL,
  `tag_2` varchar(10) NOT NULL,
  `tag_3` varchar(10) NOT NULL
) ;

--
-- Dumping data for table `pattern`
--

INSERT INTO `pattern` (`id`, `tag_1`, `tag_2`, `tag_3`) VALUES
(1, 'h1', '', ''),
(2, 'h1', 'h2', ''),
(6, 'h1', 'h2', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `pine_knob`
--

CREATE TABLE `pine_knob` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ;

--
-- Dumping data for table `pine_knob`
--

INSERT INTO `pine_knob` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('t3s3acnbnugnlq1atl5ecpg2kjs4je00', '::1', 1525462941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353436323733313b666f726d7c613a363a7b733a353a2273706f7274223b733a313a2231223b733a333a22616765223b733a313a2231223b733a353a22736b696c6c223b733a313a2234223b733a343a2264617465223b733a31303a22323031382d30352d3330223b733a363a226c6573736f6e223b733a313a2231223b733a363a22636865636b31223b733a313a2231223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(350) NOT NULL
) ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `duration`, `price`, `description`) VALUES
(1, 'single private one hour', 60, 65, 'Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.'),
(2, 'single private two hour', 120, 120, 'Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(1, 'never ever'),
(2, 'beginner'),
(3, 'intermediate'),
(4, 'advanced');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id` int(11) NOT NULL,
  `time_slot` time NOT NULL
) ;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id`, `time_slot`) VALUES
(1, '09:00:00'),
(2, '10:00:00'),
(3, '11:00:00'),
(4, '12:00:00'),
(5, '13:00:00'),
(6, '14:00:00'),
(7, '15:00:00'),
(8, '16:00:00'),
(9, '17:00:00'),
(10, '18:00:00'),
(11, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE `slug` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`) VALUES
(1, 'ski'),
(2, 'snowboard');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pattern` int(11) NOT NULL
) ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `slug`, `pattern`) VALUES
(1, 'index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_content`
--

CREATE TABLE `temp_content` (
  `1` int(10) NOT NULL,
  `tag_1` varchar(250) NOT NULL,
  `tag_2` varchar(250) NOT NULL,
  `tag_3` varchar(500) NOT NULL
) ;

--
-- Dumping data for table `temp_content`
--

INSERT INTO `temp_content` (`1`, `tag_1`, `tag_2`, `tag_3`) VALUES
(1, 'Pine Knob Ski School', 'EXPERIENCE A MOUNTAIN LIKE NO OTHER', 'Learn a new sport, improve your technique, or explore new possibilities. At Vail, you don''t just experience a mountain like no other, you learn how to truly explore it.');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `deploy` tinyint(1) NOT NULL,
  `version` int(100) NOT NULL
) ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `slug`, `content`, `deploy`, `version`) VALUES
(1, 'index', 'Pine Knob Ski School', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_client_id_idx` (`client_id`) USING BTREE,
  ADD KEY `app_employee_id_idx` (`employee_id`) USING BTREE,
  ADD KEY `app_sport_id_idx` (`sport_id`) USING BTREE,
  ADD KEY `app_lesson_id_idx` (`lesson_id`),
  ADD KEY `app_age_id_idx` (`age_id`),
  ADD KEY `app_duration_id_idx` (`duration_id`),
  ADD KEY `app_skill_id_idx` (`skill_id`);

--
-- Indexes for table `appointment_booked`
--
ALTER TABLE `appointment_booked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apb_appointment_id_idx` (`appointment_id`) USING BTREE,
  ADD KEY `apb_service_id_idx` (`service_id`) USING BTREE;

--
-- Indexes for table `appointment_day`
--
ALTER TABLE `appointment_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_service_provided`
--
ALTER TABLE `appointment_service_provided`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asp_apointment_id_idx` (`appointment_id`,`id`),
  ADD KEY `asp_service_id_idx` (`service_id`,`id`);

--
-- Indexes for table `appointment_slot`
--
ALTER TABLE `appointment_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ban_slug_idx` (`slug`);

--
-- Indexes for table `body`
--
ALTER TABLE `body`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `bdy_slug_idx` (`slug`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_time_slot`
--
ALTER TABLE `employee_time_slot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ets_employee_id_idx` (`employee_id`),
  ADD KEY `ets_day_id_idx` (`date_id`),
  ADD KEY `ets_slot_id_idx` (`slot_id`) USING BTREE;

--
-- Indexes for table `jumbotron`
--
ALTER TABLE `jumbotron`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jum_pattern_id_idx` (`pattern_id`) USING BTREE;

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `mta_slug` (`slug`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `pag_slug_idx` (`slug_id`),
  ADD KEY `pag_meta_idx` (`meta_id`),
  ADD KEY `pag_banner_idx` (`banner_id`),
  ADD KEY `pag_call_to_action_idx` (`call_to_action`),
  ADD KEY `pag_body_idx` (`body_id`),
  ADD KEY `pag_title_id_idx` (`title_id`),
  ADD KEY `pag_jumbotron_id_idx` (`jumbotron_id`) USING BTREE;

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pine_knob`
--
ALTER TABLE `pine_knob`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`,`employee_id`),
  ADD KEY `sch_employee_id_idx` (`employee_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tit_slug_idx` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `appointment_booked`
--
ALTER TABLE `appointment_booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appointment_day`
--
ALTER TABLE `appointment_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appointment_slot`
--
ALTER TABLE `appointment_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_time_slot`
--
ALTER TABLE `employee_time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `app_age_id_fk` FOREIGN KEY (`age_id`) REFERENCES `age` (`id`),
  ADD CONSTRAINT `app_lesson_id_fk` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`),
  ADD CONSTRAINT `app_sport_id_fk` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`);

--
-- Constraints for table `appointment_booked`
--
ALTER TABLE `appointment_booked`
  ADD CONSTRAINT `apb_appointment_id_fk` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`);

--
-- Constraints for table `employee_time_slot`
--
ALTER TABLE `employee_time_slot`
  ADD CONSTRAINT `ets_date_id_fk` FOREIGN KEY (`date_id`) REFERENCES `date` (`id`),
  ADD CONSTRAINT `ets_employee_id_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `ets_slot_id_fk` FOREIGN KEY (`slot_id`) REFERENCES `slot` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
