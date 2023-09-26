-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 08:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `Category` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Category`) VALUES
(0, 'Others\r\n'),
(1, 'Breakfast recipes'),
(2, 'Lunch recipes'),
(3, 'Dinner recipes'),
(4, 'Appetizer recipes'),
(5, 'Salad recipes'),
(6, 'Main-dish recipes'),
(7, 'Side-dish recipes	\r\n'),
(8, 'Baked-goods recipes	\r\n'),
(9, 'Dessert recipes	\r\n'),
(10, 'Snack recipes	\r\n'),
(11, 'Soup recipes	\r\n'),
(12, 'Holiday recipes	\r\n'),
(13, 'Vegetarian Dishes	\r\n'),
(14, 'Cookbook Reviews	'),
(15, 'BBQ and Grilling'),
(16, 'Casseroles'),
(17, 'Meats'),
(18, 'Pasta'),
(19, 'Pizza'),
(20, 'Rice & Beans'),
(21, 'Salads'),
(22, 'Soups and Stews'),
(23, 'Stir-Fry');

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `ID` int(10) NOT NULL,
  `First_name` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Surname` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Phone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Username` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Image` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Brand` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Country` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`ID`, `First_name`, `Surname`, `Phone`, `Email`, `Username`, `Password`, `Image`, `Brand`, `CreationDate`, `Country`) VALUES
(1, 'Delany', 'Damian', '0723000120', 'Delany@gmail.com', 'Delany', 'e10adc3949ba59abbe56e057f20f883e', '19dfcfcca08aea1c33fe6931a1ed52241695562902.png', 'Proffesional Dishes', '2023-09-24 13:41:42', 'Singapore'),
(2, 'Harry', 'Delany', '0748730758', 'info.truck9harriez@gmail.com', 'Harriez', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Golden Meals', '2023-09-26 06:20:14', 'Kenya'),
(3, 'Merry ', 'Carner', '0788888888', 'merry@gmail.com', 'Merry', '81dc9bdb52d04dc20036dbd8313ed055', '', NULL, '2023-09-24 11:12:52', NULL),
(4, 'Alvin', 'Belly', '0768799106', 'alvin@belly.com', 'Alvin', '827ccb0eea8a706c4c34a16891f84e7b', '7247a32c59dc11a3aacef8743207304b1695562455.jpg', 'Alvin Eateries', '2023-09-26 06:20:50', 'Singapore'),
(6, 'Amos', 'Peter', '0799999999', 'amos@gmail.com', 'Amos', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Kings Meal', '2023-09-26 06:23:59', 'Newsland');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(10) NOT NULL,
  `food_name` varchar(500) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `categoryid` int(20) NOT NULL,
  `Duration` varchar(200) NOT NULL,
  `step1` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step2` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step3` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step4` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step5` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step6` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step7` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step8` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step9` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step10` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step11` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step12` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step13` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step14` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step15` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step16` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step17` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step18` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step19` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `step20` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Nick` varchar(500) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Image` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`ID`, `food_name`, `about`, `categoryid`, `Duration`, `step1`, `step2`, `step3`, `step4`, `step5`, `step6`, `step7`, `step8`, `step9`, `step10`, `step11`, `step12`, `step13`, `step14`, `step15`, `step16`, `step17`, `step18`, `step19`, `step20`, `Nick`, `Phone`, `Image`, `CreationDate`) VALUES
(1, 'Burger', 'add ingredients and tools', 9, '1 Hrs', 'Preheat the Oven', 'etc..................', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Awesome', '0723000120', 'c4dc88289ace6d4b5bbd22dffc50537c1695482443.jpg', '2023-09-26 05:52:00'),
(2, 'Bradcam', 'add ingredients and tools', 16, '30 Mins', 'Preheat the Oven', 'etc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Fry', '0723000120', '2fa06207311235e3e2d330311dd856a61695482504.jpg', '2023-09-26 05:52:04'),
(3, 'Curiosoles', 'Add ingredients and tools', 7, '30 Mins', 'Preheat the frying pan', 'Do the rest...', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Fry', '0748730758', '064fd6894f5d5a8c4a4da50b8ff845881695547936.jpg', '2023-09-26 05:52:10'),
(4, 'Cookies', 'Add the particulars', 9, '1 Hr 15 Mins', 'Preheat the frying pan', 'etc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Apetizer', '0768799106', '6e5b3944551e48d94bc445950498114d1695556628jpeg', '2023-09-26 05:52:14'),
(5, 'Pizza', 'Add Ingridients and Tools(Items).', 9, '1 Hrs', 'Preheat the Oven', 'Prepare the Pizza Dough', 'Prepare the Pizza Pan or Stone', 'etc ', 'etc', 'etc', 'etc', 'etc', 'etc', 'etc', 'Serve and Enjoy', '', '', '', '', '', '', '', '', '', 'Apetizer', '0723000120', 'fa06b300042d8dde21354eb8e3c316691695452305.jpg', '2023-09-23 11:42:01'),
(6, 'Fried Meat', 'Add ingredients adn tools used', 15, '50 Mins', 'Cut your meat into equal pieces', 'Wash carefully', 'Preheat pressure pan', 'Add frying oil', 'Heat till hot', 'Rinse your meat', 'Add to oil piece by piece', 'Stir for awhile', 'Allow it to deep to be fried', 'Continue stiring until it changes it colour to golden brown', 'Remove it from heat', 'Cut 3 tomatoes and 2 onions into small pieces', 'Preheat another clean pan', 'Add oil ..............', '.............', '...............', '...............', '..............', '...............', 'Serve with rice and enjoy....CHEER..!', 'Apetizer', '0723000120', '74ca18f6e255f3402ee9eae5402ceee11695546276.png', '2023-09-24 09:04:36'),
(7, 'Noodles', 'Add story ,tools and ingridients', 2, '30 Mins', 'Wash it till clean', 'etc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Aroma', '0768799106', '9d64322ac4e4aa21a178edb5d048688e1695564432.png', '2023-09-26 05:52:47'),
(8, 'Fries', 'Add steps and tools', 1, '30 Mins', 'Preheat the frying pan', 'etc', 'etc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Fries', '0768799106', '6bb289ef04789a249903c8c51f18ac101695625578.jpg', '2023-09-26 05:52:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
