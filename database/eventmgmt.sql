-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 04:13 PM
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
-- Database: `eventmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `name`, `email`, `phone`, `image`) VALUES
(1, 'admin', '$2y$10$VbPz8yWzfhtfEI4EzlTKNOoRJDwhiPH0NL0oZBpc26SPoWt6V85e.', 'admin', 'shuseel@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publish_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `post_title`, `author_name`, `publish_date`, `description`, `image`, `publish_time`) VALUES
(4, 'Sunt ut pariatur E', 'Omnis facilis aliqui', '2023-12-02', 'Veniam inventore am ', '../blogUploads/656b2e08bd143.jpg', '14:15:52'),
(6, 'Obcaecati enim aut a', 'Aperiam duis ut enim', '2023-12-02', 'Autem modi excepturi', '../blogUploads/656b2f6479612.jpg', '14:21:40'),
(7, 'Maxime obcaecati omn', 'Expedita facere sequ', '2023-12-02', 'Aut non est incidun', '../blogUploads/656b34f222a33.jpeg', '14:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `eventOrganizer` varchar(255) NOT NULL,
  `dateofStart` date NOT NULL,
  `dateofEnd` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `eventType` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `ad_status` varchar(255) NOT NULL,
  `adPostedDate` date NOT NULL,
  `event_days` int(11) NOT NULL,
  `ad_expired_date` date NOT NULL,
  `adPostedTIme` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `eventOrganizer`, `dateofStart`, `dateofEnd`, `venue`, `eventType`, `description`, `image`, `eventName`, `ad_status`, `adPostedDate`, `event_days`, `ad_expired_date`, `adPostedTIme`) VALUES
(1, 'Phoebe Larsen', '2023-12-03', '2023-12-24', 'Hyacinth Stein', 4, 'Ipsum culpa distin', '656a25b3ed5e9.jpg', 'Barrett Foley', 'expired', '0000-00-00', 21, '2023-12-02', '00:20:23'),
(7, 'Eden Barnes', '2023-12-02', '2023-12-08', 'Howard Juarez', 5, 'Et quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non c', '656a26032805b.jpg', 'Petra Howard', 'expired', '0000-00-00', 6, '2023-12-02', '00:20:23'),
(13, 'Ryan Meadows', '2023-12-02', '2023-12-07', 'Noelle Foreman', 2, 'Impedit assumenda u', '656adb97b90ca.jpg', 'Hedda Paul', 'expired', '0000-00-00', 5, '2023-12-02', '00:20:23'),
(14, 'Rogan Price', '2023-12-02', '1991-05-20', 'Hedy Wooten', 7, 'Voluptatem quisquam ', '656adbf3e4cac.webp', 'Isabelle Winters', 'active', '0000-00-00', 7, '0000-00-00', '00:20:23'),
(16, 'Kiara Horne', '2023-12-02', '2001-11-17', 'Ignatius Lambert', 1, 'Velit cumque deserunVelit cumque deserunVelit cumque deserun', '656add2b50103.jpg', 'Brett Blair', 'active', '0000-00-00', 11, '0000-00-00', '00:20:23'),
(24, 'Veda Diaz', '2023-12-02', '2001-05-04', 'Christian Fields', 2, 'Veniam nulla et lab', '656b3503eda02.webp', 'Kadeem Fletcher', 'active', '0000-00-00', 26, '0000-00-00', '00:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail`
--

CREATE TABLE `tbl_mail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `publish_date` date NOT NULL,
  `publish_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mail`
--

INSERT INTO `tbl_mail` (`id`, `name`, `email`, `subject`, `phone`, `message`, `publish_date`, `publish_time`) VALUES
(2, 'Shuseel', 'shuseel@gmail.com', 'testing', 333444, 'tesging', '2023-11-20', '18:20:26'),
(3, 'Shuseel', 'shuseel@gmail.com', 'testing', 333444, 'tesging', '2023-11-20', '18:21:52'),
(4, 'Tester', 'tester@gmail.com', 'dfjdslafj', 3434, '`test\r\n', '2023-11-21', '12:17:43'),
(5, 'Tester', 'tester@gmail.com', 'dfjdslafj', 3434, '`test\r\n', '2023-11-21', '12:19:09'),
(6, 'tester', 'tester@gmail.com', 'tester', 23232, 'testing', '2023-11-21', '12:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `pkg_id` int(11) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `pkg_cost` float NOT NULL,
  `pkg_guest` int(11) NOT NULL,
  `pkg_description` text NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`pkg_id`, `pkg_name`, `pkg_cost`, `pkg_guest`, `pkg_description`, `service_id`) VALUES
(1, 'Small', 4000, 6, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', 1),
(2, 'Mediumm', 10000, 10, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', 2),
(7, 'Berk Sweet', 853, 237, 'Ut eos eiusmod in no', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `res_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `packageId` int(11) NOT NULL,
  `reserveDate` date NOT NULL,
  `reserveTime` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `totalcost` int(11) NOT NULL,
  `advanceamt` int(11) NOT NULL,
  `numDays` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `amtstatus` varchar(255) NOT NULL,
  `eventDestination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`res_id`, `userId`, `packageId`, `reserveDate`, `reserveTime`, `status`, `totalcost`, `advanceamt`, `numDays`, `event_date`, `amtstatus`, `eventDestination`) VALUES
(1, 1, 2, '2023-11-25', '16:21:23', 'completed', 10000, 0, 1, '2023-11-30', '0', 'test'),
(9, 1, 1, '2023-11-27', '15:41:49', 'onwork', 112000, 0, 28, '2023-11-27', 'due', 'Consectetur aliquid'),
(10, 2, 2, '2023-12-02', '14:12:39', '', 10000, 0, 1, '2023-12-13', '', 'test'),
(11, 2, 7, '2023-12-02', '16:11:15', '', 853, 0, 1, '2023-12-13', '', 'Praesentium libero d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ser_id` int(11) NOT NULL,
  `ser_name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`ser_id`, `ser_name`, `type`, `image`, `description`) VALUES
(1, 'Birthday Celebrationss', 3, '656a263a4c9e5.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(2, 'Concert', 7, '656a2647357a9.jpeg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(3, 'Marriage', 4, '656a265460846.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types`
--

CREATE TABLE `tbl_types` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_types`
--

INSERT INTO `tbl_types` (`type_id`, `name`) VALUES
(1, 'Marriage'),
(2, 'Sports'),
(3, 'Promotion'),
(4, 'Ceromony'),
(5, 'Seminar'),
(6, 'Competition'),
(7, 'Concert'),
(8, 'test'),
(9, 'check'),
(10, 'testing'),
(11, 'chjecking'),
(12, 'testingg'),
(13, 'event'),
(14, 'eventt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `perAddress` varchar(255) NOT NULL,
  `tmpAddress` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateofjoin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `username`, `dob`, `phone`, `gender`, `fatherName`, `motherName`, `perAddress`, `tmpAddress`, `image`, `password`, `dateofjoin`) VALUES
(1, 'Shristy Shrestha', 'shristy@gmail.com', 'shrisu', '1999-04-14', 9808858789, 'female', 'Ram Kumar Shrestha ', 'Sita Shrestha', 'Maidi', 'Naikap', '1701454710_f02e1b5d532a.jpg', '$2y$10$4NH9tEVpRYhd258cXrICBejuZWc7.5Xv.hPRgOb/Av.jxsvKFgVV6', '2023-11-05'),
(2, 'Sushil Maharjan', 'sushil@gmail.com', 'sushil', '2023-11-29', 22222, 'male', '', '', '', '', '', '$2y$10$IefAtTqguoHr4B0J7oTDmO/TzLvwH8tsrP8nfH0krtuKQVhesiNEG', '2023-12-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eventType` (`eventType`);

--
-- Indexes for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`pkg_id`),
  ADD KEY `fk_service_id` (`service_id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `fk_userId` (`userId`),
  ADD KEY `fk_packageId` (`packageId`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`ser_id`),
  ADD KEY `fk_type` (`type`);

--
-- Indexes for table `tbl_types`
--
ALTER TABLE `tbl_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `fk_eventType` FOREIGN KEY (`eventType`) REFERENCES `tbl_types` (`type_id`);

--
-- Constraints for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD CONSTRAINT `fk_service_id` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`ser_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `tbl_packages` (`pkg_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `tbl_types` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
