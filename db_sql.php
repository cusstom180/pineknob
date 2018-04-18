
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
  `sport_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `age_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `date` date NOT NULL,
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

INSERT INTO `appointment` (`id`, `sport_id`, `lesson_id`, `age_id`, `employee_id`, `duration_id`, `skill_id`, `date`, `price`, `client_id`, `discount_cde`, `net_price`, `cancel`, `cancel_reason`, `add_date`, `add_user`) VALUES
(8, 1, 1, 2, 0, 1, 0, '0000-00-00', 0, 1, '', 0, 0, '', '2018-04-09 19:24:17', ''),
(25, 1, 1, 2, 0, 1, 3, '0000-00-00', 0, 1, '', 0, 0, '', '2018-04-07 07:07:53', ''),
(26, 1, 1, 2, 0, 1, 3, '0000-00-00', 0, 1, '', 0, 0, '', '2018-04-07 07:08:12', '');

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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'unknown', 'unknown', '1234567890', 'name@name.com'),
(2, 'Jami', 'Jordan', '2486065893', 'cusstom180@yahoo.com');

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
(1, 'two hour', 120),
(2, 'one hour', 60);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'unknown', 'unknown', '1234567890', 'name@name.com'),
(2, 'lisa', 'naperkoski', '2481234567', 'mom@yahoo.com'),
(3, 'brian', 'naperkoski', '2486065893', 'cusstom180@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee_day_sch`
--

CREATE TABLE `employee_day_sch` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `working` tinyint(1) NOT NULL
) ;

--
-- Dumping data for table `employee_day_sch`
--

INSERT INTO `employee_day_sch` (`id`, `employee_id`, `date`, `working`) VALUES
(1, 1, '2018-04-30', 1),
(2, 3, '2018-04-30', 1),

-- --------------------------------------------------------

--
-- Table structure for table `employee_day_time_sch`
--

CREATE TABLE `employee_day_time_sch` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `slot_1` time NOT NULL,
  `slot_2` time NOT NULL,
  `slot_3` time NOT NULL,
  `slot_4` time NOT NULL,
  `slot_5` time NOT NULL,
  `slot_6` time NOT NULL,
  `slot_7` time NOT NULL,
  `slot_8` time NOT NULL,
  `slot_9` time NOT NULL,
  `slot_10` time NOT NULL,
  `slot_11` time NOT NULL
) ;

--
-- Dumping data for table `employee_day_time_sch`
--

INSERT INTO `employee_day_time_sch` (`id`, `employee_id`, `day`, `slot_1`, `slot_2`, `slot_3`, `slot_4`, `slot_5`, `slot_6`, `slot_7`, `slot_8`, `slot_9`, `slot_10`, `slot_11`) VALUES
(1, 2, '2018-04-30', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00'),
(2, 1, '2018-04-30', '09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00');

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
  `type` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `type`) VALUES
(1, 'snowboard'),
(2, 'ski');

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
  `price` int(11) NOT NULL
) ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `duration`, `price`) VALUES
(1, 'single private one hour', 60, 65),
(2, 'single private two hour', 120, 120);

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
(2, 'beginner'),
(3, 'intermediate'),
(4, 'advanced'),
(1, 'never ever');

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
-- Indexes for table `client`
--
ALTER TABLE `client`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_day_sch`
--
ALTER TABLE `employee_day_sch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_day_time_sch`
--
ALTER TABLE `employee_day_time_sch`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_day_sch`
--
ALTER TABLE `employee_day_sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_day_time_sch`
--
ALTER TABLE `employee_day_time_sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  ADD CONSTRAINT `app_duration_id_fk` FOREIGN KEY (`duration_id`) REFERENCES `duration` (`id`),
  ADD CONSTRAINT `app_lesson_id_fk` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`),
  ADD CONSTRAINT `app_sport_id_fk` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`);

--
-- Constraints for table `appointment_booked`
--
ALTER TABLE `appointment_booked`
  ADD CONSTRAINT `apb_appointment_id_fk` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
