-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 05:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosque_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('Bank Transfer','Credit Card','QR Code','Paypal') NOT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `UserID`, `name`, `email`, `amount`, `method`, `bank`, `created_at`) VALUES
(1, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 994.00, 'Bank Transfer', 'Maybank', '2024-10-20 17:34:26'),
(2, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 1000.00, 'Bank Transfer', 'CIMB', '2024-10-20 17:41:00'),
(3, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 3.00, 'Bank Transfer', 'BSN', '2024-10-20 17:44:15'),
(4, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 10.00, '', 'Maybank', '2024-10-20 19:48:42'),
(5, 2, 'Danny', 'admin01@gmail.com', 50.00, 'Bank Transfer', 'CIMB', '2024-10-20 23:30:36'),
(6, 7, 'Danny', 'danny@gmail.com', 56.00, '', 'BSN', '2024-10-20 23:49:07'),
(7, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 100.00, '', 'Maybank', '2024-10-21 01:18:18'),
(8, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 555.00, '', 'Maybank', '2024-10-21 02:52:49'),
(9, 1, 'Syahmir', 'syahmirsahari18@gmail.com', 100.00, '', 'BSN', '2024-10-21 03:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `NotificationSent` tinyint(1) DEFAULT 0,
  `CreatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventName`, `Description`, `StartDate`, `EndDate`, `NotificationSent`, `CreatedBy`) VALUES
(1, 'Ceramah with Ustaz Adnin', 'Join us for an enlightening session with Ustaz Adnin, where he will share insights on the rulings of ikhtilat (interaction between genders) and love in Islam. This event is an opportunity to explore these important topics, enhancing our understanding of their significance in our daily lives and relationships. Don\'t miss this chance to deepen your knowledge and engage in meaningful discussions within our community.', '2024-11-01 09:55:00', '2024-11-01 12:30:00', 0, 2),
(2, 'Kawan Tanya Ustaz Jawab with Imam Muda Ashraf', 'Join us for an engaging session with Imam Muda Ashraf, where he will answer your questions and share insights on various topics of interest. This event is a fantastic opportunity for open dialogue, allowing participants to seek guidance on issues that matter in their lives. Don’t miss this chance to deepen your understanding and connect with the community in meaningful discussions.', '2024-11-24 21:30:00', '2024-11-24 23:00:00', 0, NULL),
(3, 'Mencari Ilmu adalah Kewajipan with Ustaz Azhar Idrus', 'Join us for an enlightening session with Ustaz Azhar Idrus, where he will discuss the importance of seeking knowledge in Islam. This event emphasizes that pursuing knowledge is not just encouraged but is a duty for every Muslim. It’s a fantastic opportunity to deepen your understanding of the significance of education and engage in meaningful discussions with fellow community members. Don’t miss this chance to enrich your spiritual and intellectual journey.', '2024-12-18 21:30:00', '2024-12-18 21:30:00', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_bookings`
--

CREATE TABLE `event_bookings` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Participants` int(11) NOT NULL,
  `BookingDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_bookings`
--

INSERT INTO `event_bookings` (`BookingID`, `UserID`, `EventID`, `Participants`, `BookingDateTime`) VALUES
(1, 1, 1, 10, '2024-10-21 04:10:41'),
(2, 5, 2, 5, '2024-10-21 01:21:09'),
(3, 1, 1, 1, '2024-10-21 09:17:32'),
(4, 1, 2, 20, '2024-10-21 10:50:37'),
(5, 1, 1, 8, '2024-10-21 11:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `FacilityID` int(11) NOT NULL,
  `FacilityName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`FacilityID`, `FacilityName`, `Description`, `Capacity`) VALUES
(1, 'Multipurpose Space', 'A flexible space designed for various activities, including religious events, community gatherings, and social functions. It features a spacious, open layout with modern audio-visual equipment, making it ideal for lectures, workshops, and celebrations. The hall is adorned with subtle Islamic designs, creating a peaceful atmosphere, and is fully accessible with nearby washrooms and a kitchen for event support. Its versatile design allows it to serve as a hub for both spiritual and community events.', 5),
(2, 'Parking Centre', 'The parking center is a spacious and well-organized area designed to accommodate a large number of vehicles. It can be transformed into an outdoor event space for Islamic gatherings and community events. With ample open space, the area is ideal for hosting events such as Eid prayers, bazaars, and community iftars. Temporary tents and seating can be set up, and the surrounding space allows for food stalls, vendor booths, and children’s activities. The parking layout ensures easy traffic flow and access for participants, making it a practical venue for large-scale outdoor Islamic events.', 1),
(3, 'Al-Hidayah Hall', 'Al-Hidayah Hall is a beautifully designed venue perfect for hosting marriage programs and celebrations. The hall offers a spacious, elegant setting with modern amenities, including a sound system, lighting, and air conditioning to ensure guests’ comfort. Its simple yet tasteful Islamic décor creates a serene and welcoming atmosphere, making it ideal for traditional or modern Islamic wedding ceremonies. The hall can accommodate a large number of guests, and there is ample space for seating, dining, and a stage for the bride and groom.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `EventID` int(11) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `SentDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `FacilityID` int(11) DEFAULT NULL,
  `StartDateTime` datetime NOT NULL,
  `EndDateTime` datetime NOT NULL,
  `Status` enum('Pending','Confirmed','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ReservationID`, `UserID`, `FacilityID`, `StartDateTime`, `EndDateTime`, `Status`) VALUES
(1, 1, NULL, '2024-10-10 09:13:58', '2024-10-10 09:13:58', 'Confirmed'),
(5, 1, 1, '2024-10-21 08:00:00', '2024-10-21 13:00:00', 'Confirmed'),
(6, 1, 2, '2024-10-23 08:30:00', '2024-10-24 16:30:00', 'Pending'),
(7, 1, 2, '2024-10-21 11:05:00', '2024-10-21 00:05:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Role` enum('Administrator','Member') NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Phone`, `Address`, `Role`, `Password`) VALUES
(1, 'syahmir', 'syahmirsahari18@gmail.com', '01139220216', 'Pura Kencana, Batu Pahat, Johor.', 'Member', '$2y$10$XCA.M6n1N2q5EB0OscvB3eeRmg4QaVAcQC/oCMl4XjRFegcgaLMdq'),
(2, 'admin01', 'admin01@gmail.com', '01111113211', 'Johor Bahru, Johor.', 'Administrator', '123'),
(5, 'admin02', 'admin02@gmail.com', '01173945069', 'KPTM Batu Pahat,83300, Sri Gading, Batu Pahat, Johor.', 'Administrator', '$2y$10$iRGKJdN9uAPD7dM6baXuG.YQ4.x5bQjaf9tzkb0/rx5WH3ypQdjHi'),
(7, 'Danny', 'danny@gmail.com', '01173945069', 'Johor Bahru, Johor.', 'Member', '$2y$10$Lpv9E/8.n4fD/EZBoQGFnOeRisRZdqKbaOGRLl/oYM15OsXhEIVqG'),
(8, 'azwan', 'azwan@gmail.com', '01111113211', 'KPTM Batu Pahat,83300, Sri Gading, Batu Pahat, Johor.', 'Member', '$2y$10$dPfsQKa6wKaJYCdK2UqVhu8gEg60Bxu80Gu88M2.cBTFQvBZSmenu'),
(13, 'irfan', 'irfan@gmail.com', '01139220219', 'Johor Bahru, Johor.', 'Member', '$2y$10$chvIovAymXAs8IvxJNKZmORY/p/L5grzZbPpEyrRaAVuSkvAdiLAC'),
(15, 'Azwan01', 'azwan01@gmail.com', '01139220213', 'Johor Bahru, Johor.', 'Member', '$2y$10$.FS1IYj12vF9V47naSWo7eazdYasNglZEFhsvHmHPAvQpT2HOufhK'),
(16, 'Nadia', 'nadia@gmai.com', '01139220211', 'Johor Bahru, Johor.', 'Member', '$2y$10$ii54GcMVvvexCmBrejoTO.Wk1lW5c6J.0EI4Gy0JQY0ymfywMAq1W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- Indexes for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`FacilityID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FacilityID` (`FacilityID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_bookings`
--
ALTER TABLE `event_bookings`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `FacilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD CONSTRAINT `event_bookings_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `event_bookings_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`FacilityID`) REFERENCES `facilities` (`FacilityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
