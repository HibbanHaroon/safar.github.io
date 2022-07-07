-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 05:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careem`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `carType` varchar(256) CHARACTER SET utf8 NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `carType`, `vehicle_id`) VALUES
(4, 'carXL', 13),
(5, 'carXL', 14),
(6, 'carXL', 16),
(7, 'carL', 17);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phoneNumber` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `DOB` date NOT NULL,
  `salary` int(12) NOT NULL,
  `rating` int(11) NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `name`, `phoneNumber`, `email`, `DOB`, `salary`, `rating`, `profilePicture`) VALUES
(20, 'Sanie Asim', '03303005578', 'sanieasim@yahoo.com', '2001-11-06', 0, 0, 'blank_picture.png'),
(22, 'Bangash Khattak', '03314879145', 'bangash@gmail.com', '2001-02-05', 0, 0, 'blank_picture.png'),
(23, 'Abdur Rehman', '03330333607', 'abdurerehman@yahoo.com', '2001-08-16', 0, 0, 'blank_picture.png'),
(24, 'Mirza Abdullah', '03330009785', 'mirza@gmail.com', '2002-05-29', 0, 0, 'blank_picture.png'),
(25, 'Shaheer Ahmed', '03123456789', 'shaheer123@gmail.com', '2001-08-20', 0, 0, 'blank_picture.png'),
(26, 'Hamza Usman', '03330555123', 'hamza1234@gmail.com', '2001-09-15', 0, 0, 'blank_picture.png'),
(27, 'Kashif Mazir', '03114856123', 'kashifmzair123@gmail.com', '2002-05-26', 0, 0, 'blank_picture.png'),
(28, 'Mahrukh Hafeez', '03148485789', 'mahrukh@gmail.com', '2002-06-05', 0, 0, 'blank_picture.png'),
(29, 'Eeshan Shahid', '03144848795', 'eeshan@gmail.com', '2000-09-08', 0, 0, 'blank_picture.png'),
(30, 'Amna Mirza', '03355336895', 'amymirza@gmail.com', '2002-08-07', 0, 0, 'blank_picture.png'),
(31, 'Bilal Akram', '03335556781', 'bilalakram@gmail.com', '2004-09-11', 0, 0, 'blank_picture.png'),
(32, 'Hamza Usman', '03355505478', 'hamzausman@gmail.com', '2001-01-09', 0, 0, 'blank_picture.png'),
(33, 'Sana Haroon', '03165122401', 'sanaharoon@yahoo.com', '2002-05-20', 0, 0, 'blank_picture.png'),
(34, 'Inshal Haroon', '03160603489', 'inshalharoon@gmail.com', '2000-02-07', 0, 0, 'blank_picture.png');

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE `fare` (
  `fare_id` int(11) NOT NULL,
  `tripfare` float NOT NULL,
  `initialWaiting` float NOT NULL,
  `subtotal` float NOT NULL,
  `promo` float NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`fare_id`, `tripfare`, `initialWaiting`, `subtotal`, `promo`, `fare`) VALUES
(1, 83.75, 1.26, 85.01, 16.75, 68);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `phoneNumber` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `phoneNumber`, `password`) VALUES
(27, '03114856123', 'kashif'),
(25, '03123456789', 'shaheer'),
(29, '03144848795', 'eeshan'),
(28, '03148485789', 'mahrukh0987'),
(34, '03160603489', 'inshal'),
(33, '03165122401', 'sanak'),
(20, '03303005578', 'sanie'),
(22, '03314879145', 'bangash'),
(24, '03330009785', 'mirza'),
(23, '03330333607', 'mano'),
(26, '03330555123', 'hamza1234'),
(31, '03335556781', 'bilal2345'),
(30, '03355336895', 'amy1234'),
(32, '03355505478', 'hamza'),
(18, '03355505712', 'ahmed'),
(21, '03355522963', 'kashif0987');

-- --------------------------------------------------------

--
-- Table structure for table `pasthistory`
--

CREATE TABLE `pasthistory` (
  `history_id` int(11) NOT NULL,
  `pickUp` varchar(256) DEFAULT NULL,
  `dropOff` varchar(256) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fare` float DEFAULT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasthistory`
--

INSERT INTO `pasthistory` (`history_id`, `pickUp`, `dropOff`, `date`, `fare`, `rider_id`, `driver_id`) VALUES
(1, 'Pakistan Town', 'DHA Phase - 2', '2002-11-06', 68, 18, 20),
(2, 'F-8, Islamabad', 'G-7/4, Islamabad', '2022-05-01', 1200, 21, 22),
(3, 'F-11/3, Islamabad', 'G-9 Markaz, Islamabad', '2021-12-20', 478, 18, 22);

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `phoneNumber` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `DOB` date NOT NULL,
  `profilePicture` varchar(256) CHARACTER SET utf8 NOT NULL,
  `rating` int(11) NOT NULL,
  `ratingInWords` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `name`, `phoneNumber`, `email`, `DOB`, `profilePicture`, `rating`, `ratingInWords`) VALUES
(18, 'Ahmed Kalair', '03355505712', 'ahmed@yahoo.com', '2000-05-13', 'Screenshot 2022-07-06 023843.png', 4, ' '),
(21, 'Kashif Ali', '03355522963', 'kashifali123@gmail.com', '2000-01-05', 'kashif.jfif', 0, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `basicPay` varchar(11) CHARACTER SET utf8 NOT NULL,
  `weeklyBonus` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `basicPay`, `weeklyBonus`, `salary`, `driver_id`) VALUES
(1, '35000', 25000, 60000, 20),
(2, '30000', 20000, 50000, 22);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `phoneNumber` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `confirmPassword` varchar(256) CHARACTER SET utf8 NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `phoneNumber`, `email`, `DOB`, `password`, `confirmPassword`, `profilePicture`) VALUES
(27, 'Kashif Mazir', '03114856123', 'kashifmzair123@gmail.com', '2002-05-26', 'kashif', 'kashif', 'blank_picture.png'),
(25, 'Shaheer Ahmed', '03123456789', 'shaheer123@gmail.com', '2001-08-20', 'shaheer', 'shaheer', 'blank_picture.png'),
(29, 'Eeshan Shahid', '03144848795', 'eeshan@gmail.com', '2000-09-08', 'eeshan', 'eeshan', 'blank_picture.png'),
(28, 'Mahrukh Hafeez', '03148485789', 'mahrukh@gmail.com', '2002-06-05', 'mahrukh0987', 'mahrukh0987', 'blank_picture.png'),
(34, 'Inshal Haroon', '03160603489', 'inshalharoon@gmail.com', '2000-02-07', 'inshal', 'inshal', 'blank_picture.png'),
(33, 'Sana Haroon', '03165122401', 'sanaharoon@yahoo.com', '2002-05-20', 'sanak', 'sanak', 'blank_picture.png'),
(20, 'Sanie Asim', '03303005578', 'sanieasim@yahoo.com', '2001-11-06', 'sanie', 'sanie', 'blank_picture.png'),
(19, 'Sanie Asim', '03304098087', 'sanieasim@yahoo.com', '2001-06-11', 'sanie', 'sanie', 'blank_picture.png'),
(22, 'Bangash Khattak', '03314879145', 'bangash@gmail.com', '2001-02-05', 'bangash', 'bangash', 'blank_picture.png'),
(24, 'Mirza Abdullah', '03330009785', 'mirza@gmail.com', '2002-05-29', 'mirza', 'mirza', 'blank_picture.png'),
(23, 'Abdur Rehman', '03330333607', 'abdurerehman@yahoo.com', '2001-08-16', 'mano', 'mano', 'blank_picture.png'),
(26, 'Hamza Usman', '03330555123', 'hamza1234@gmail.com', '2001-09-15', 'hamza1234', 'hamza1234', 'blank_picture.png'),
(31, 'Bilal Akram', '03335556781', 'bilalakram@gmail.com', '2004-09-11', 'bilal2345', 'bilal2345', 'blank_picture.png'),
(30, 'Amna Mirza', '03355336895', 'amymirza@gmail.com', '2002-08-07', 'amy1234', 'amy1234', 'blank_picture.png'),
(32, 'Hamza Usman', '03355505478', 'hamzausman@gmail.com', '2001-01-09', 'hamza', 'hamza', 'blank_picture.png'),
(18, 'Ahmed Kalair', '03355505712', 'ahmed@yahoo.com', '2000-05-13', 'ahmed', 'ahmed', 'Screenshot 2022-07-06 023843.png'),
(21, 'Kashif Ali', '03355522963', 'kashifali123@gmail.com', '2000-01-05', 'kashif0987', 'kashif0987', 'kashif.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tripfare`
--

CREATE TABLE `tripfare` (
  `tripfare_id` int(11) NOT NULL,
  `surcharges` float NOT NULL,
  `duration` int(11) NOT NULL,
  `distance` float NOT NULL,
  `peak` float NOT NULL,
  `vehicleRate` float NOT NULL,
  `tripfare` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tripfare`
--

INSERT INTO `tripfare` (`tripfare_id`, `surcharges`, `duration`, `distance`, `peak`, `vehicleRate`, `tripfare`) VALUES
(1, 3.15, 32, 30, 0, 1.3, 83.75);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `modelNumber` varchar(256) CHARACTER SET utf8 NOT NULL,
  `numberPlate` varchar(256) CHARACTER SET utf8 NOT NULL,
  `vehicleType` varchar(256) CHARACTER SET utf8 NOT NULL,
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `modelNumber`, `numberPlate`, `vehicleType`, `driver_id`) VALUES
(5, '9389324823', 'ASS5695', 'car', 27),
(6, '26549989465', 'LIT5896', 'bike', 28),
(7, '26549989465', 'LIT5896', 'bike', 28),
(8, '256256256', 'KIT4564', 'bike', 29),
(9, '256256256', 'KIT4564', 'bike', 29),
(10, '1234567895', 'HIT5895', 'bike', 29),
(11, '12345678975', 'ABD7465', 'car', 29),
(12, '1234567895', 'ASD2345', 'car', 30),
(13, '7895145698', 'ASD1234', 'car', 30),
(14, '123456951', 'WER7845', 'car', 31),
(15, '7894561230', 'YTS5645', 'bike', 32),
(16, 'Civic 2020', 'GVH7596', 'car', 33),
(17, 'Honda 2018', 'BHC9098', 'car', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD UNIQUE KEY `car_id` (`car_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `fare`
--
ALTER TABLE `fare`
  ADD UNIQUE KEY `fare_id` (`fare_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`phoneNumber`),
  ADD UNIQUE KEY `sample_id` (`id`);

--
-- Indexes for table `pasthistory`
--
ALTER TABLE `pasthistory`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `rider_id` (`rider_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD UNIQUE KEY `salary_id` (`salary_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`phoneNumber`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tripfare`
--
ALTER TABLE `tripfare`
  ADD UNIQUE KEY `tripfare_id` (`tripfare_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD UNIQUE KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fare`
--
ALTER TABLE `fare`
  MODIFY `fare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasthistory`
--
ALTER TABLE `pasthistory`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tripfare`
--
ALTER TABLE `tripfare`
  MODIFY `tripfare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasthistory`
--
ALTER TABLE `pasthistory`
  ADD CONSTRAINT `pasthistory_ibfk_1` FOREIGN KEY (`rider_id`) REFERENCES `rider` (`rider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasthistory_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
