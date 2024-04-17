-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2024 at 05:36 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ticket_type` varchar(30) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `event_id`, `user_id`, `quantity`, `ticket_type`, `booking_date`) VALUES
(32, 1, 9, 23, 'VIP', '2024-03-08 06:45:52'),
(33, 21, 9, 1, 'simple', '2024-03-08 06:53:47'),
(34, 1, 9, 2, 'VIP', '2024-03-08 06:54:34'),
(35, 1, 9, 2, 'Lounge', '2024-03-08 06:54:57'),
(36, 2, 10, 1, 'Lounge', '2024-03-08 07:33:24'),
(37, 1, 10, 1, 'Back Stage', '2024-03-08 07:33:36'),
(38, 1, 9, 1, 'Simple Ticket', '2024-03-08 07:40:33'),
(39, 30, 9, 2, 'Back Stage', '2024-03-08 08:08:40'),
(40, 1, 11, 2, 'Simple Ticket', '2024-03-08 11:37:32'),
(41, 1, 13, 2, 'Lounge', '2024-03-13 08:06:11'),
(42, 1, 15, 2, 'Back Stage', '2024-04-03 17:34:48'),
(43, 6, 15, 2, 'Back Stage', '2024-04-03 17:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `price`, `type_id`) VALUES
(1, 'Golden Sunrise Hour', 'Description of the event.', 'path_to_image6.jpg', '15.00', 1),
(2, 'Rewind X Clan', 'Description of the event.', 'path_to_image6.jpg', '15.00', 2),
(3, 'Rodge Live at the Village Dbayeh', 'Description of the event.', 'path_to_image6.jpg', '15.00', 3),
(4, 'Fady Raidy Comedy Show at Portemilio Hotel', 'Description of the event.', 'path_to_image6.jpg', '30.00', 4),
(5, 'Tnein Bel Leil: The Musical at Theatre Monot', 'Description of the event.', 'path_to_image6.jpg', '10.00', 5),
(6, 'Summer Beach Party', 'Description of the event.', 'path_to_image6.jpg', '20.00', 1),
(7, 'Neon Glow Party', 'Description of the event.', 'path_to_image6.jpg', '25.00', 1),
(8, 'Trance Nation Festival', 'Description of the event.', 'path_to_image6.jpg', '35.00', 3),
(9, 'Rock the Stage: Live Concert', 'Description of the event.', 'path_to_image6.jpg', '30.00', 3),
(10, 'Laugh Out Loud Comedy Show', 'Description of the event.', 'path_to_image6.jpg', '25.00', 4),
(11, 'Comedy Night at Laughter Club', 'Description of the event.', 'path_to_image6.jpg', '20.00', 4),
(12, 'Shakespearean Drama: Hamlet', 'Description of the event.', 'path_to_image6.jpg', '15.00', 5),
(13, 'The Phantom of the Opera', 'Description of the event.', 'path_to_image6.jpg', '25.00', 5),
(14, 'Electro Beats Dance Party', 'Description of the event.', 'path_to_image6.jpg', '20.00', 2),
(15, 'VIP Night at Luminous Lounge', 'Description of the event.', 'path_to_image6.jpg', '50.00', 2),
(16, 'Jazz in the Park', 'Description of the event.', 'path_to_image6.jpg', '15.00', 3),
(17, 'Hip Hop Jam Fest', 'Description of the event.', 'path_to_image6.jpg', '30.00', 3),
(18, 'Stand-up Comedy Showcase', 'Description of the event.', 'path_to_image6.jpg', '20.00', 4),
(19, 'Sunday Funday: Family Comedy', 'Description of the event.', 'path_to_image6.jpg', '15.00', 4),
(20, 'Classic Broadway: The Lion King', 'Description of the event.', 'path_to_image6.jpg', '40.00', 5),
(21, 'Modern Drama: The Curious Incident', 'Description of the event.', 'path_to_image6.jpg', '30.00', 5),
(22, 'Retro Disco Night', 'Description of the event.', 'path_to_image6.jpg', '20.00', 2),
(23, 'Glamorous Gala Dinner', 'Description of the event.', 'path_to_image6.jpg', '100.00', 1),
(24, 'Indie Music Festival', 'Description of the event.', 'path_to_image6.jpg', '25.00', 3),
(25, 'Carnival Extravaganza', 'Description of the event.', 'path_to_image6.jpg', '40.00', 1),
(26, 'sfjsjfsf', 'sfjsjfsjfjsefsjfjsjfsjfs', 'path_to_image6.jpg', '12.12', 1),
(27, 'sad', 'dfd', 'path_to_image6.jpg', '23.00', 1),
(28, 'sds', 'dsds', 'path_to_image6.jpg', '23.00', 3),
(29, 'elio', 'sds', 'Screenshot 2024-03-08 at 8.12.27 AM.png', '23.00', 1),
(30, 'sds', 'sds', 'Screenshot 2024-03-08 at 8.12.27 AM.png', '23.00', 1),
(31, 'sds', 'sds', 'Screenshot 2024-03-08 at 8.12.27 AM.png', '23.00', 1),
(32, 'sds', '232', 'Screenshot 2024-03-08 at 8.24.26 AM.png', '23.00', 1),
(33, 'sds', '232', 'Screenshot 2024-03-08 at 8.24.26 AM.png', '23.00', 1),
(34, 'dsd', 'sds', 'Screenshot 2024-03-08 at 8.12.27 AM.png', '2.00', 1),
(35, 'seeds', '23', 'Screenshot 2024-03-08 at 8.25.09 AM.png', '23.00', 2),
(36, 'seeds', '23', 'Screenshot 2024-03-08 at 8.25.09 AM.png', '23.00', 2),
(37, 'charbelmnessa', 'night', 'Screenshot 2024-03-08 at 8.36.21 AM.png', '20.00', 2),
(38, 'charbelmnessa', 'night', 'Screenshot 2024-03-08 at 8.36.21 AM.png', '20.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`) VALUES
(1, 'Parties'),
(2, 'Clubs 18+'),
(3, 'Concerts'),
(4, 'Stand-up Comedy Shows'),
(5, 'Theatre Shows');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `image`) VALUES
(1, 'XXL LEB', 'images/Screenshot 2024-03-08 at 8.24.26 AM.png'),
(2, 'RED BULL LEB', 'path_to_image6.jpg'),
(3, 'MALAK TAWOUK', 'path_to_image6.jpg'),
(4, 'sds', 'images/Screenshot 2024-03-08 at 8.24.26 AM.png'),
(5, 'sds', 'Screenshot 2024-03-08 at 8.25.09 AM.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `password`, `email`, `phone_number`) VALUES
(1, 'John Doe', 'password123', 'john@example.com', '1234567890'),
(2, 'Jane Smith', 'pass456', 'jane@example.com', '9876543210'),
(3, 'Mike Johnson', 'abc123', 'mike@example.com', '5556667777'),
(4, 'Emily Brown', 'testpass', 'emily@example.com', '4443332222'),
(5, 'admin1fsfssdssdssd', 'admin@gmail.com1', 'admin@gmail.com1sd', '1313131dsds'),
(6, 'christxcsds', 'christ', 'christ@gmail.com', '223232'),
(7, 'torio', 'torio', 'admin@gmail.com', '76335598'),
(8, 'charbel menassa', '12345678', 'charbelmenassa@gmail.com', '70371291'),
(9, 'chsd', 'a', 'a@gmail.com', '12'),
(10, 'charbelmnessa', '12345678', 'charbelmnessa12@gmail.com', '70371291'),
(11, 'kevin akiki', '123', 'kevin@gmail.com', '76335598'),
(12, 'jd', 'dcc', 'cd@gmail.com', 'cc'),
(13, 'charbel mnessa', 'asdqwe123', 'charbel123@gmail.com', '70371291'),
(14, 'christ', 'a', 'a@gmail.com', '70657943'),
(15, 'a@gmail.com', 'a@gmail.com', 'a@gmail.com', 'a@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `event_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
