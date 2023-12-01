-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 12:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(1, 'Nearly 60% of families say youth sports are a ‘financial strain’—3 ways to budget for them', 'admin', '2023-11-19', 'A vast majority of children play at least one sport as they are growing up. As of 2020, 76.1% of kids ages 6 through 12 and 73.4% of kids ages 13 through 17 played a team or individual sport, according to Project Play from the Aspen Institute.\r\n\r\nBut youth sports typically aren’t free. In fact, 59% of families experience financial strain from their children’s sports, according to a recent survey from financial services company LendingTree.\r\n\r\nLendingTree conducted an online survey reaching 1,578 U.S. citizens ages 18 to 76. The survey used a non-profitability sample, with quotas making sure responses represented the overall population.\r\n\r\nWhile 48% of families with kids participating in sports say they will find a way to make it work, 11% plan to take on debt.\r\n\r\nAs far as costs go, 50% of parents plan to spend anywhere from $100 to $499 on fall sport expenses, including equipment, travel and attire. Nearly 20% of parents expect to spend over $1,000.  ', '../blogUploads/655a2b3a8c327.jpg', '16:35:22'),
(2, 'Mount Everest | Height, Location, Map, Facts, Climbers, & Deaths | Britannica', 'admin', '2023-11-19', 'Mount Everest, mountain on the crest of the Great Himalayas of southern Asia that lies on the border between Nepal and the Tibet Autonomous Region of China, at 27°59′ N 86°56′ E. Reaching an elevation of 29,032 feet (8,849 metres), Mount Everest is the highest mountain in the world.\r\n\r\nMount Everest\r\nMount Everest\r\nNew Zealander Edmund Hillary and Sherpa Tenzing Norgay were the first to summit Mount Everest in 1953. As of 2017, more than 7,600 people have reached the top of the mountain, and nearly 300 have perished in the attempt.\r\nLike other high peaks in the region, Mount Everest has long been revered by local peoples. Its most common Tibetan name, Chomolungma, means “Goddess Mother of the World” or “Goddess of the Valley.” The Sanskrit name Sagarmatha means literally “Peak of Heaven.” Its identity as the highest point on the Earth’s surface was not recognized, however, until 1852, when the governmental Survey of India established that fact. In 1865 the mountain—previously referred to as Peak XV—was renamed for Sir George Everest, British surveyor general of India from 1830 to 1843.', '../blogUploads/655a2c20e132a.jpeg', '16:39:12'),
(3, 'Quis ducimus quis dQuis ducimus quis d Quis ducimus quis dQuis ducimus quis dQuis ducimus quis d', 'Anim qui minima sunt', '2023-11-28', '* Offer excludes all Woo Express plans, Storefront Extensions Bundle, WooCommerce In-Person Payments M2 card reader, and WooCommerce In-Person Payments WisePad 3 card reader. Valid on the purchase price for new purchases only — not applicable for subscription renewals. All product subscriptions renew at regular price after the first year. Cannot be used in conjunction with any other promotions, discounts, or coupons.\r\n\r\n\r\n* Offer excludes all Woo Express plans, Storefront Extensions Bundle, WooCommerce In-Person Payments M2 card reader, and WooCommerce In-Person Payments WisePad 3 card reader. Valid on the purchase price for new purchases only — not applicable for subscription renewals. All product subscriptions renew at regular price after the first year. Cannot be used in conjunction with any other promotions, discounts, or coupons.\r\n\r\n\r\n* Offer excludes all Woo Express plans, Storefront Extensions Bundle, WooCommerce In-Person Payments M2 card reader, and WooCommerce In-Person Payments WisePad 3 card reader. Valid on the purchase price for new purchases only — not applicable for subscription renewals. All product subscriptions renew at regular price after the first year. Cannot be used in conjunction with any other promotions, discounts, or coupons.\r\n\r\n\r\n* Offer excludes all Woo Express plans, Storefront Extensions Bundle, WooCommerce In-Person Payments M2 card reader, and WooCommerce In-Person Payments WisePad 3 card reader. Valid on the purchase price for new purchases only — not applicable for subscription renewals. All product subscriptions renew at regular price after the first year. Cannot be used in conjunction with any other promotions, discounts, or coupons.\r\n\r\n  ', '../blogUploads/6566054c86624.jpg', '16:20:44');

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
(1, 'Phoebe Larsen', '2023-11-20', '2009-10-25', 'Hyacinth Stein', 4, 'Ipsum culpa distin', '655b212254635.jpeg', 'Barrett Foley', 'active', '0000-00-00', 21, '0000-00-00', '00:20:23'),
(2, 'Mara Price', '2023-11-20', '1996-11-18', 'Clio Browning', 3, 'Lorem voluptatem au', '655b22881d588.jpg', 'Irene Cantrell', 'active', '0000-00-00', 25, '0000-00-00', '00:20:23'),
(3, 'Imelda Christensen', '2023-11-20', '2004-01-11', 'Shaine Kim', 6, 'Commodo voluptate de', '655b24c3e5b3c.jpg', 'Michael Moreno', 'active', '0000-00-00', 20, '0000-00-00', '00:20:23'),
(4, 'Mia Mullen', '2023-11-20', '2020-02-15', 'Jerry Meyer', 3, 'Veniam qui eveniet', '655b2a6baf54a.jpg', 'Seth Kent', 'active', '0000-00-00', 16, '0000-00-00', '00:20:23'),
(5, 'Tamekah Bates', '2023-11-28', '1970-10-20', 'Hilda Moran', 1, 'Sit iusto consectetu', '6565f968724e8.jpeg', 'Ella Rocha', 'active', '0000-00-00', 12, '0000-00-00', '00:20:23'),
(6, 'Cecilia Bernard', '2023-11-28', '2005-07-28', 'Sydnee Baird', 5, 'Sunt aut consequatur', '6565f99e50f9d.webp', 'Nadine Good', 'active', '0000-00-00', 17, '0000-00-00', '00:20:23'),
(7, 'Eden Barnes', '2023-11-28', '1972-10-30', 'Howard Juarez', 5, 'Et quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non cEt quasi natus non c', '6566063cc2e6f.jpg', 'Petra Howard', 'active', '0000-00-00', 6, '0000-00-00', '00:20:23');

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
(2, 'Medium', 10000, 10, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', 1),
(3, 'Bigger', 20000, 20, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', 1),
(4, 'Small', 30000, 100, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', 2),
(5, 'Small', 80000, 100, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.', 3);

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
  `amtstatus` int(11) NOT NULL,
  `eventDestination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`res_id`, `userId`, `packageId`, `reserveDate`, `reserveTime`, `status`, `totalcost`, `advanceamt`, `numDays`, `event_date`, `amtstatus`, `eventDestination`) VALUES
(1, 1, 2, '2023-11-25', '16:21:23', 'completed', 10000, 0, 1, '2023-11-30', 0, 'test'),
(2, 1, 4, '2023-11-25', '16:22:02', '', 30000, 0, 1, '2023-11-30', 0, 'test'),
(3, 1, 4, '2023-11-25', '17:47:54', '', 90000, 0, 3, '2023-11-30', 0, 'test'),
(9, 1, 1, '2023-11-27', '15:41:49', 'pending', 112000, 0, 28, '2023-11-27', 0, 'Consectetur aliquid');

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
(1, 'Birthday Celebrations', 4, '655a2d186ba10.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(2, 'Concert', 7, '655b1aaa9c005.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,'),
(3, 'Marriage', 4, '655b1b1db1107.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,');

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
(7, 'Concert');

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
(1, 'Shristy Shrestha', 'shristy@gmail.com', 'shrisu', '1999-04-14', 9808858789, 'female', 'Ram Kumar Shrestha ', 'Sita Shrestha', 'Maidi', 'Naikap', 'uploads/1700920179_41fc6090a225.jpg', '$2y$10$4NH9tEVpRYhd258cXrICBejuZWc7.5Xv.hPRgOb/Av.jxsvKFgVV6', '2023-11-05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_types`
--
ALTER TABLE `tbl_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_service_id` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`ser_id`);

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `fk_packageId` FOREIGN KEY (`packageId`) REFERENCES `tbl_packages` (`pkg_id`),
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`id`);

--
-- Constraints for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `tbl_types` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
