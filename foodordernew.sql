-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 07:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
CREATE DATABASE IF NOT EXISTS foodorder;
USE foodorder;

-- all table creation scripts follow

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `Email`, `Mobile`, `Subject`, `Message`) VALUES
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('BIRJU KUMAR', 'ckj40856@gmail.com', '8903079750', 'asd', 'asdasdasd'),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'asd', 'hfgdsfsx'),
('ARUN', 'arun123@gmail.com', '8716227399', 'Feedback', 'Nice'),
('RAJAVIGNESH R', 'rajavignesh792@gmail.com', '9042455095', 'Feedback', 'good'),
('Varun', 'varun01@gmail.com', '9887551207', 'Feedback', 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('Arun', 'Arun', 'arun01@gmail.com', '9977785420', 'Saravanampatti', 'Arun@0123'),
('CHAND', 'chandran', 'raghul123@gmail.com', '9042455095', 'Saravanampatti', '123456'),
('Ganesh', 'Ganesh', 'ganesh01@gmail.com', '9657841032', 'Chennai', 'Ganesh@01'),
('Naveen', 'Naveen', 'naveen14@gmail.com', '8880007814', 'Coimbatore', 'Naveen@01'),
('Nichu', 'Nichu', 'nichu01@gmail.com', '9731085266', 'Coimbatore', 'Nichu@012'),
('Prem', 'Prem', 'prem01@gmail.com', '9999785420', 'Saravanampatti', 'Prem@012'),
('rahul10', 'rahul', 'rahul123@gmail.com', '9955662244', 'Saravanampatti', 'Rahul@1234'),
('Raja', 'Raja', 'raja26@gmail.com', '9635147820', 'Saravanampatti', '$2y$10$Gtl8PQOCX5dtb1MuVRCNiuY'),
('Ram', 'Ram', 'ram012@gmail.com', '9907354960', 'Coimbatore', 'Ram@0123'),
('Ramu', 'Ramu', 'ramu01@gmail.com', '9635147820', 'Saravanampatti', 'ramu01'),
('Sharma', 'Sharma', 'sharma01@gmail.com', '9778854220', 'Coimbatore', 'Sharma@01'),
('Varun', 'Varun', 'varun01@gmail.com', '9017354962', 'Coimbatore', '$2y$10$DM/B2at7BHMlUAU.tTcPoO4');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE',
  `is_offer` tinyint(1) DEFAULT 0,
  `offer_price` int(11) DEFAULT NULL,
  `offer_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `R_ID`, `images_path`, `options`, `is_offer`, `offer_price`, `offer_quantity`) VALUES
(60, 'Chocolate Hazelnut Truffle', 99, 'Lose all senses over this very delicious chocolate hazelnut truffle.', 3, 'images/Chocolate_Hazelnut_Truffle.jpg', 'ENABLE', 0, NULL, 0),
(61, 'Happy Happy Choco Chip Shake', 80, 'Happy Happy Choco Chip Shake - a perfect party sweet treat.', 1, 'images/Happy_Happy_Choco_Chip_Shake.jpg', 'ENABLE', 0, NULL, 0),
(62, 'Spring Rolls', 65, 'Delicious Spring Rolls by Dragon Hut, Delhi. Order now!!!', 2, 'images/Spring_Rolls.jpg', 'ENABLE', 0, NULL, 0),
(65, 'Coffee', 25, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 4, 'images/coffee.jpg', 'DISABLE', 0, NULL, 0),
(66, 'Tea', 20, 'The simple elixir of tea is of our natural world.', 4, 'images/tea.jpg', 'DISABLE', 0, NULL, 0),
(69, 'Coffee', 25, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 2, 'images/coffee.jpg', 'ENABLE', 0, NULL, 0),
(70, 'Tea', 20, 'The simple elixir of tea is of our natural world.', 2, 'images/tea.jpg', 'ENABLE', 0, NULL, 0),
(71, 'Samosa', 40, 'Cocktail Crispy Samosa..', 2, 'images/samosa.jpg', 'ENABLE', 0, NULL, 0),
(72, 'Paneer Pakora', 45, 'it gives whole new dimension even to the most boring or dull vegetable', 2, 'images/paneer pakora.jpg', 'ENABLE', 0, NULL, 0),
(73, 'Puff', 35, 'Vegetable Puff, a snack with crisp-n-flaky outer layer and mixed vegetables stuffing', 2, 'images/puff.jpg', 'ENABLE', 0, NULL, 0),
(74, 'Pizza', 200, 'Good and Tasty ', 2, 'Pizza.jpg', 'DISABLE', 0, NULL, 0),
(75, 'French Fries', 60, 'Pure Veg and Tasty.', 2, 'frenchfries.jpg', 'DISABLE', 0, NULL, 0),
(76, 'Pakora', 35, 'Pure Vegetable and Tasty.', 2, 'images/Pakora.jpg', 'DISABLE', 0, NULL, 0),
(77, 'Pizza', 200, 'Pure Vegetable and Tasty.', 2, 'images/Pizza.jpg', 'ENABLE', 0, NULL, 0),
(78, 'French Fries', 75, 'Pure Veg and Tasty.', 2, 'images/frenchfries.jpg', 'ENABLE', 0, NULL, 0),
(79, 'Pakora', 45, 'TASTY', 2, 'images/Pakora.jpg', 'ENABLE', 0, NULL, 0),
(80, 'Chicken Biriyani', 160, 'Delicious', 7, 'images\\biriyani.jpg', 'ENABLE', 1, 170, 0),
(81, 'Cheese Burger', 120, 'Cheesyyy', 7, 'images\\cheese_burger.jpg', 'DISABLE', 0, 100, 0),
(82, 'Cold Coffee', 180, 'Refreshing, Chilled Coffee Drink', 7, 'images/cold-coffee.jpg', 'ENABLE', 1, 150, 1),
(83, 'Falooda', 150, 'Vibrant, Layered Cold Dessert', 7, 'images/faluda.jpg', 'ENABLE', 1, 100, 2),
(84, 'Lays Chat', 50, 'Crunchy, and Tangy  Snack', 7, 'images/lays_chats.jpg', 'ENABLE', 0, 35, 0),
(85, 'BlueBerry White Chocolate Cake', 80, 'Creamy White Chocolate, Topped with Fresh Blueberries', 7, 'images/blue_cake.jpg', 'DISABLE', 0, 60, 0),
(86, 'Strawberry Cake', 45, 'Fruityyyy', 7, 'images/strawberry.jpg', 'DISABLE', 0, NULL, 0),
(87, 'Strawberry Cake', 50, 'Fruityy', 7, 'images/strawberry.jpg', 'ENABLE', 0, NULL, 0),
(88, 'Blue Berry Cake', 50, 'Tasty ', 7, 'images/blue_cake.jpg', 'ENABLE', 0, NULL, 0),
(89, 'Cheese Burger', 170, 'Cheesyy', 7, 'images/burger', 'DISABLE', 0, NULL, 0),
(90, 'Cheese Burger', 170, 'Cheesyy', 7, 'images/cheese_burger', 'DISABLE', 0, NULL, 0),
(91, 'Cheese Burger', 170, 'Cheesyy', 7, 'images/cheese_burger.jpg', 'ENABLE', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('aditi068', 'Aditi Naik', 'aditi@gmail.com', '8654751259', 'Goa', 'aditi'),
('aminnikhil073', 'Nikhil Amin', 'aminnikhil073@gmail.com', '9632587412', 'Karnataka', 'nikhil'),
('ckumar', 'Chandan Kumar', 'ckj40856@gmail.com', '9487810674', 'Pondicherry University, SRK HOSTEL ROOM NUMBER-59,', 'Ckumar123'),
('dhiraj', 'DHIRAJ kUMAR', 'dk123@gmail.com', '8903079750', 'Pondicherry. Le cafe', 'Dhiraj'),
('RAJ', 'Raja', 'velmore263@gmail.com', '9042455095', 'Saravanampatti', '1234'),
('roshanraj07', 'Roshan Raj', 'roshan@gmail.com', '9541258761', 'Bihar', 'roshan'),
('Virat', 'Virat', 'virat01@gmail.com', '8000321551', 'Saravanampatti', 'Virat@01');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `food_name` varchar(100) DEFAULT NULL,
  `original_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `manager_username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `payment_method` varchar(20) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `upi_id` varchar(50) DEFAULT NULL,
  `received_status` varchar(20) DEFAULT 'Not Received',
  `order_status` varchar(20) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `F_ID`, `foodname`, `price`, `quantity`, `order_date`, `username`, `R_ID`, `status`, `payment_method`, `payment_status`, `upi_id`, `received_status`, `order_status`) VALUES
(73, 80, 'Chicken Biriyani', 199, 1, '2026-01-20 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(74, 81, 'Cheese Burger', 120, 1, '2026-01-20 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(91, 83, 'Falooda', 150, 3, '2026-01-27 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(92, 84, 'Lays Chat', 50, 1, '2026-01-27 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Cancelled'),
(93, 82, 'Cold Coffee', 180, 1, '2026-01-27 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Cancelled'),
(94, 80, 'Chicken Biriyani', 199, 1, '2026-01-27 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(95, 81, 'Cheese Burger', 120, 1, '2026-01-27 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(96, 85, 'BlueBerry White Chocolate Cake', 80, 1, '2026-01-28 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(97, 82, 'Cold Coffee', 180, 1, '2026-01-28 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(98, 80, 'Chicken Biriyani', 170, 1, '2026-01-28 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(99, 82, 'Cold Coffee', 150, 1, '2026-01-28 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(100, 83, 'Falooda', 150, 1, '2026-01-28 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(101, 83, 'Falooda', 150, 1, '2026-01-28 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(102, 81, 'Cheese Burger', 120, 2, '2026-01-28 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(103, 85, 'BlueBerry White Chocolate Cake', 80, 4, '2026-01-28 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(104, 80, 'Chicken Biriyani', 199, 4, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(105, 82, 'Cold Coffee', 180, 5, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(106, 80, 'Chicken Biriyani', 199, 4, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(107, 84, 'Lays Chat', 50, 3, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(108, 81, 'Cheese Burger', 120, 3, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(109, 85, 'BlueBerry White Chocolate Cake', 60, 2, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(110, 85, 'BlueBerry White Chocolate Cake', 60, 4, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(111, 85, 'BlueBerry White Chocolate Cake', 80, 10, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(112, 85, 'BlueBerry White Chocolate Cake', 60, 2, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(113, 85, 'BlueBerry White Chocolate Cake', 60, 2, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(114, 85, 'BlueBerry White Chocolate Cake', 80, 5, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(115, 84, 'Lays Chat', 50, 4, '2026-02-04 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(116, 82, 'Cold Coffee', 180, 4, '2026-02-04 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Received', 'Active'),
(117, 81, 'Cheese Burger', 100, 2, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(118, 85, 'BlueBerry White Chocolate Cake', 60, 1, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(119, 85, 'BlueBerry White Chocolate Cake', 80, 4, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(120, 83, 'Falooda', 130, 1, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(121, 82, 'Cold Coffee', 150, 1, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(122, 82, 'Cold Coffee', 150, 1, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(123, 82, 'Cold Coffee', 150, 1, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(124, 82, 'Cold Coffee', 180, 2, '2026-02-04 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(125, 84, 'Lays Chat', 50, 5, '2026-02-04 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(126, 84, 'Lays Chat', 40, 3, '2026-02-04 00:00:00', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(127, 84, 'Lays Chat', 50, 4, '2026-02-05 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(128, 84, 'Lays Chat', 40, 1, '2026-02-05 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(129, 84, 'Lays Chat', 40, 1, '2026-02-05 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(130, 83, 'Falooda', 150, 5, '2026-02-10 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(131, 85, 'BlueBerry White Chocolate Cake', 80, 4, '2026-02-10 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(132, 83, 'Falooda', 150, 5, '2026-02-10 00:00:00', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(133, 81, 'Cheese Burger', 120, 3, '2026-02-10 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(134, 83, 'Falooda', 100, 3, '2026-02-10 00:00:00', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(135, 83, 'Falooda', 150, 3, '2026-02-10 00:00:00', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(136, 82, 'Cold Coffee', 180, 5, '2026-02-10 00:00:00', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(137, 85, 'BlueBerry White Chocolate Cake', 80, 2, '2026-02-10 00:00:00', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(138, 80, 'Chicken Biriyani', 199, 3, '2026-02-11 00:00:00', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(139, 83, 'Falooda', 150, 2, '2026-02-11 00:00:00', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(140, 83, 'Falooda', 150, 2, '2026-02-14 00:00:00', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(141, 84, 'Lays Chat', 50, 3, '2026-02-14 00:00:00', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(142, 83, 'Falooda', 150, 4, '2026-02-14 10:21:59', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(143, 82, 'Cold Coffee', 180, 5, '2026-02-14 10:23:50', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(144, 82, 'Cold Coffee', 180, 3, '2026-02-14 10:24:32', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(145, 85, 'BlueBerry White Chocolate Cake', 80, 3, '2026-02-14 10:32:58', 'Ramu', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(146, 84, 'Lays Chat', 35, 1, '2026-02-14 11:24:28', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(147, 83, 'Falooda', 150, 5, '2026-02-17 11:22:35', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(148, 84, 'Lays Chat', 50, 4, '2026-02-17 11:22:35', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(149, 81, 'Cheese Burger', 120, 3, '2026-02-19 14:41:26', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(150, 81, 'Cheese Burger', 120, 4, '2026-02-19 14:45:01', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(151, 84, 'Lays Chat', 35, 1, '2026-02-20 09:54:55', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(152, 85, 'BlueBerry White Chocolate Cake', 80, 3, '2026-02-20 09:59:08', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(153, 83, 'Falooda', 150, 2, '2026-02-20 11:10:14', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(154, 81, 'Cheese Burger', 120, 2, '2026-02-20 11:10:38', 'Ramu', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(155, 85, 'BlueBerry White Chocolate Cake', 80, 2, '2026-02-20 11:57:07', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(156, 80, 'Chicken Biriyani', 199, 3, '2026-02-20 12:00:23', 'Ramu', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(157, 85, 'BlueBerry White Chocolate Cake', 80, 2, '2026-02-20 16:24:12', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(158, 85, 'BlueBerry White Chocolate Cake', 80, 3, '2026-02-23 08:39:19', 'Ramu', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(159, 82, 'Cold Coffee', 180, 3, '2026-02-23 10:06:25', 'Ramu', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(160, 83, 'Falooda', 150, 3, '2026-02-23 10:11:02', 'Ramu', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(161, 81, 'Cheese Burger', 120, 2, '2026-02-23 10:11:02', 'Ramu', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(162, 82, 'Cold Coffee', 150, 2, '2026-02-23 10:16:01', 'Ramu', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(163, 82, 'Cold Coffee', 150, 1, '2026-02-23 10:16:20', 'Ramu', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(164, 83, 'Falooda', 150, 3, '2026-04-04 10:37:31', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(165, 87, 'Strawberry Cake', 50, 2, '2026-04-04 10:38:37', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(166, 83, 'Falooda', 150, 3, '2026-04-04 13:27:09', 'Ganesh', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(167, 87, 'Strawberry Cake', 50, 2, '2026-04-04 13:27:09', 'Ganesh', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(168, 82, 'Cold Coffee', 180, 4, '2026-04-04 13:33:59', 'CHAND', 7, 'Cancelled', NULL, NULL, NULL, 'Not Received', 'Active'),
(169, 87, 'Strawberry Cake', 50, 2, '2026-04-04 13:33:59', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active'),
(170, 84, 'Lays Chat', 35, 2, '2026-04-04 13:35:16', 'CHAND', 7, 'Completed', NULL, NULL, NULL, 'Received', 'Active'),
(171, 82, 'Cold Coffee', 150, 2, '2026-04-04 13:41:04', 'CHAND', 7, 'Pending', NULL, NULL, NULL, 'Not Received', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `R_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `M_ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`R_ID`, `name`, `email`, `contact`, `address`, `M_ID`) VALUES
(1, 'Nikhil\'s Restaurant', 'nikhil@restaurant.com', '7998562145', 'Karnataka', 'aminnikhil073'),
(2, 'Roshan\'s Restaurant', 'roshan@restaurant.com', '9887546821', 'Bihar', 'roshanraj07'),
(3, 'Aditi\'s Restaurant', 'aditi@restaurant.com', '7778564231', 'Goa', 'aditi068'),
(4, 'Food Exploria', 'ckj40856@gmail.com', '09487810674', 'C:\\xampp\\htdocs\\FoodExploria-master\\images/coffee.', 'ckumar'),
(6, 'Le Cafe', 'lecafepondi234@gmail.com', '9443369040', 'Pondicherry,rock beach Near,Le cafe', 'dhiraj'),
(7, 'KORE', 'kore123@gmail.com', '8122509198', 'Saravanampatti', 'RAJ'),
(8, 'Virat Cafe', 'cafev01@gmail.com', '9955712350', 'Coimbatore', 'Virat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`,`R_ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `username` (`username`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`R_ID`),
  ADD UNIQUE KEY `M_ID_2` (`M_ID`),
  ADD KEY `M_ID` (`M_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `F_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `R_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`R_ID`) REFERENCES `restaurants` (`R_ID`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `manager` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
