-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 05:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_tb`
--

CREATE TABLE `booking_tb` (
  `bid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `bdate` date NOT NULL,
  `btime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check-in-date` date NOT NULL,
  `check-out-date` date NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `paystatus` varchar(255) NOT NULL,
  `paymentkey` varchar(255) NOT NULL,
  `total amount` int(255) NOT NULL,
  `total_rooms` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_tb`
--

INSERT INTO `booking_tb` (`bid`, `uid`, `hid`, `tid`, `bdate`, `btime`, `check-in-date`, `check-out-date`, `paytype`, `paystatus`, `paymentkey`, `total amount`, `total_rooms`) VALUES
(26, 1, 40, 6, '2023-06-14', '2023-06-13 19:51:15', '2023-06-13', '2023-06-13', 'cod', 'unpaid', '', 4999, 1),
(27, 1, 40, 6, '2023-06-14', '2023-06-13 19:53:40', '2023-06-14', '2023-06-28', 'cod', 'unpaid', '', 19996, 4),
(28, 1, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-28', 'online', 'paid', 'pay_M1bCt8syQWdMe2', 19996, 4),
(29, 1, 40, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-14', 'online', 'paid', 'pay_M1kmnaEbzU2iPI', 5999, 1),
(30, 1, 40, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-14', 'online', 'paid', '', 5999, 1),
(31, 1, 40, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-14', 'online', 'paid', '', 5999, 1),
(32, 1, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-29', 'online', 'paid', 'pay_M1ksDBEXbblWyk', 4999, 1),
(33, 1, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-29', 'online', 'paid', '', 4999, 1),
(34, 1, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-29', 'online', 'paid', '', 4999, 1),
(35, 1, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-29', 'online', 'paid', 'pay_M1ksDBEXbblWyk', 4999, 1),
(36, 2, 40, 6, '2023-06-14', '2023-06-14 06:47:21', '2023-06-14', '2023-06-16', 'cod', 'unpaid', '', 9998, 1),
(37, 2, 39, 2, '2023-06-14', '2023-06-14 07:03:17', '2023-06-14', '2023-06-15', 'cod', 'unpaid', '', 2599, 1),
(38, 2, 39, 2, '2023-06-14', '2023-06-14 07:04:01', '2023-06-14', '2023-06-22', 'cod', 'unpaid', '', 20792, 1),
(39, 2, 39, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-22', 'online', 'paid', 'pay_M1mKu9RH6xB4sP', 20792, 1),
(40, 2, 39, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-23', 'online', 'paid', 'pay_M1mOcxdWOLwY45', 23391, 1),
(41, 2, 39, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-16', 'online', 'paid', 'pay_M1mYx4Z49Ojd22', 5198, 1),
(42, 2, 40, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-16', 'online', 'paid', 'pay_M1qYp3xYQ4S64r', 11998, 1),
(43, 2, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-15', 'online', 'paid', 'pay_M1qe6eGVf3UKhP', 4999, 1),
(44, 2, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-16', 'online', 'paid', 'pay_M1qiyZImU3fUGO', 9998, 1),
(45, 2, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-16', 'online', 'paid', 'pay_M1qrAyhVoTyGOa', 9998, 1),
(46, 2, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-16', 'online', 'paid', 'pay_M1qrAyhVoTyGOa', 9998, 1),
(47, 2, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-15', 'online', 'paid', 'pay_M1r5KUP0IWecS9', 4999, 1),
(48, 2, 40, 6, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-16', 'online', 'paid', 'pay_M1rk18kAfdf1Wk', 9998, 1),
(49, 1, 39, 2, '2023-06-14', '0000-00-00 00:00:00', '2023-06-14', '2023-06-21', 'online', 'paid', 'pay_M1viqzPGTt0pMa', 18193, 1),
(50, 1, 40, 2, '2023-06-15', '0000-00-00 00:00:00', '2023-06-15', '2023-06-16', 'online', 'paid', 'pay_M25wB78soMmgZI', 5999, 1),
(51, 1, 40, 6, '2023-06-15', '0000-00-00 00:00:00', '2023-06-15', '2023-06-17', 'online', 'paid', 'pay_M28L3B3gaRzJTC', 19996, 2),
(52, 1, 39, 2, '2023-06-15', '2023-06-15 06:14:47', '2023-06-15', '2023-06-15', 'cod', 'unpaid', '', 2599, 1),
(53, 2, 40, 6, '2023-06-17', '0000-00-00 00:00:00', '2023-06-17', '2023-07-01', 'online', 'paid', 'pay_M2tjfSaZqCD1Z2', 69986, 1),
(54, 1, 42, 6, '2023-06-18', '2023-06-18 17:51:03', '2023-06-18', '2023-06-18', 'cod', 'unpaid', '', 2555, 1),
(55, 1, 40, 2, '2023-06-19', '0000-00-00 00:00:00', '2023-06-19', '2023-06-23', 'online', 'paid', 'pay_M3fgwWpwwVfr9m', 23996, 1),
(56, 1, 40, 6, '2023-06-19', '0000-00-00 00:00:00', '2023-06-19', '2023-06-22', 'online', 'paid', 'pay_M3hSeLmma6rRJF', 29994, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cancellation_master`
--

CREATE TABLE `cancellation_master` (
  `cid` int(255) NOT NULL,
  `bid` int(255) NOT NULL,
  `bdate` date NOT NULL,
  `btime` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `cdate` date NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp(),
  `refundstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city_tb`
--

CREATE TABLE `city_tb` (
  `city_id` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_tb`
--

INSERT INTO `city_tb` (`city_id`, `city`, `state_id`) VALUES
(1, 'Ahmedabad', 7),
(2, 'Surat', 7),
(3, 'Vadodara', 7),
(4, 'Rajkot', 7),
(5, 'Bhavnagar', 7),
(6, 'Jamnagar', 7),
(7, 'Junagadh', 7),
(8, 'Gandhinagar', 7),
(9, 'Anand', 7),
(10, 'Navsari', 7),
(11, 'Morbi', 7),
(12, 'Surendranagar', 7),
(13, 'Gandhidham', 7),
(14, 'Bharuch', 7),
(15, 'Porbandar', 7),
(16, 'Godhra', 7),
(17, 'Valsad', 7),
(18, 'Vapi', 7),
(19, 'Bhuj', 7),
(20, 'Nadiad', 7),
(21, 'Mehsana', 7),
(22, 'Dahod', 7),
(23, 'Morvi', 7),
(24, 'Patan', 7),
(25, 'Veraval', 7),
(26, 'Gandhinagar', 7),
(27, 'Anjar', 7),
(28, 'Botad', 7),
(29, 'Vyara', 7),
(30, 'Palanpur', 7),
(31, 'Visakhapatnam', 1),
(32, 'Vijayawada', 1),
(33, 'Guntur', 1),
(34, 'Nellore', 1),
(35, 'Kurnool', 1),
(36, 'Kadapa', 1),
(37, 'Rajahmundry', 1),
(38, 'Kakinada', 1),
(39, 'Tirupati', 1),
(40, 'Anantapur', 1),
(41, 'Vizianagaram', 1),
(42, 'Eluru', 1),
(43, 'Ongole', 1),
(44, 'Nandyal', 1),
(45, 'Machilipatnam', 1),
(46, 'Adoni', 1),
(47, 'Tenali', 1),
(48, 'Proddatur', 1),
(49, 'Chittoor', 1),
(50, 'Hindupur', 1),
(51, 'Itanagar', 2),
(52, 'Dispur', 3),
(53, 'Patna', 4),
(54, 'Raipur', 5),
(55, 'Panaji', 6),
(56, 'Chandigarh', 8),
(57, 'Shimla', 9),
(58, 'Ranchi', 10),
(59, 'Bengaluru', 11),
(60, 'Thiruvananthapuram', 12),
(61, 'Bhopal', 13),
(62, 'Mumbai', 14),
(63, 'Imphal', 15),
(64, 'Shillong', 16),
(65, 'Aizawl', 17),
(66, 'Kohima', 18),
(67, 'Bhubaneswar', 19),
(68, 'Chandigarh', 20),
(69, 'Jaipur', 21),
(70, 'Gangtok', 22),
(71, 'Chennai', 23),
(72, 'Hyderabad', 24),
(73, 'Agartala', 25),
(74, 'Lucknow', 26),
(75, 'Dehradun', 27),
(76, 'Kolkata', 28),
(77, 'Port Blair', 29),
(78, 'Chandigarh', 30),
(79, '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `comment_master`
--

CREATE TABLE `comment_master` (
  `cmtid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_master`
--

INSERT INTO `comment_master` (`cmtid`, `uid`, `hid`, `comment`) VALUES
(28, 1, 40, 'nowww'),
(29, 1, 40, 'hey beautiful'),
(30, 1, 41, 'asd'),
(31, 2, 51, 'wow!');

-- --------------------------------------------------------

--
-- Table structure for table `coverpic_tb`
--

CREATE TABLE `coverpic_tb` (
  `pid` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coverpic_tb`
--

INSERT INTO `coverpic_tb` (`pid`, `hid`, `image`) VALUES
(1, 40, 'coverpic/img1.jpg\r\n'),
(3, 47, 'coverpic/img3.jpg'),
(6, 50, 'coverpic/img3.jpg'),
(10, 41, 'coverpic/img3.jpg'),
(11, 51, 'coverpic/farraido2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `description_master`
--

CREATE TABLE `description_master` (
  `desid` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `aspect` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `description_master`
--

INSERT INTO `description_master` (`desid`, `hid`, `aspect`, `description`) VALUES
(5, 51, 'Room', 'A family room is a warm and inviting space within a home that is specifically designed to foster a sense of togetherness and relaxation for family members. It is typically a multipurpose area where family members can gather to spend quality time, engage in activities, and enjoy each other\'s company.');

-- --------------------------------------------------------

--
-- Table structure for table `facility_master`
--

CREATE TABLE `facility_master` (
  `fid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fdescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_master`
--

INSERT INTO `facility_master` (`fid`, `fname`, `fdescription`) VALUES
(1, 'Swimming Pool', 'A large pool for guests to enjoy.'),
(2, 'Fitness Center', 'A fully equipped gym for fitness enthusiasts.'),
(3, 'Spa', 'Relaxing spa treatments for guests.'),
(5, 'Restaurant', 'On-site restaurant offering delicious meals.'),
(6, 'Parking', 'Ample parking space for guests.'),
(7, '24/7 Front Desk', 'Round-the-clock reception and assistance.'),
(8, 'Room Service', 'Convenient in-room dining options.'),
(9, 'Conference Room', 'Meeting and conference facilities.'),
(10, 'Laundry Service', 'Professional laundry and dry cleaning services.');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_facility_master`
--

CREATE TABLE `hotel_facility_master` (
  `hfid` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `fid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_facility_master`
--

INSERT INTO `hotel_facility_master` (`hfid`, `hid`, `fid`) VALUES
(26, 40, 1),
(27, 40, 10),
(28, 40, 8),
(29, 40, 8),
(30, 40, 8),
(31, 40, 8),
(32, 47, 8),
(33, 50, 9),
(34, 51, 7);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE `hotel_master` (
  `hid` int(255) NOT NULL,
  `hname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `state_id` int(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `pincode` int(255) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `wide_photos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`hid`, `hname`, `street`, `state_id`, `city_id`, `location`, `description`, `pincode`, `photos`, `wide_photos`) VALUES
(39, 'Hotel Taj', 'Taj', 14, 62, 'Surat', 'The Taj Hotel is a luxurious and iconic hotel known for its elegance, opulence, and exceptional hospitality. Nestled in the heart of a bustling city or offering breathtaking views of scenic landscapes, the Taj Hotel is synonymous with timeless grandeur and impeccable service.', 395007, 'uploads/taj.jpg', 'uploads/taj_wide.jpg'),
(40, 'Hotel Farraido', 'Surat', 7, 2, 'Surat', 'Hotel Farraido is a luxurious and contemporary establishment located in the heart of a vibrant city. Boasting a prime location, this upscale hotel offers an exceptional blend of elegance, comfort, and impeccable service. From the moment guests step foot into the grand lobby, they are greeted with an aura of sophistication and warmth.\r\n\r\nThe architecture of Hotel Farraido seamlessly combines modern design elements with traditional influences, creating a visually stunning ambiance. The interior spaces are tastefully adorned with exquisite artwork, stylish furnishings, and thoughtful touches that enhance the overall aesthetic appeal.\r\n\r\nAccommodations at Hotel Farraido are designed to provide the utmost comfort and relaxation. Each room and suite is meticulously appointed, featuring a harmonious blend of contemporary décor and state-of-the-art amenities. Whether guests are visiting for business or leisure, they can expect a restful night\'s sleep in plush beds and indulge in the luxurious bathrooms equipped with premium fixtures and toiletries.', 395007, 'uploads/room-1.png', 'uploads/farraido.jpg\r\n'),
(41, 'Hotel TGB', 'abc', 7, 2, 'Surat', '0', 395007, 'uploads/tgb.jpg', ''),
(42, 'Hotel Baidian', 'Baidian', 5, 54, 'Surat', '0', 395007, 'uploads/badian.jpg', ''),
(47, 'The Geetha Hotel', 'A-42', 7, 1, 'Surat', '395007', 0, 'coverpic/Hotel Rajhans.jpg', 'uploads/farraido.jpg'),
(50, 'Rishi', 'A-42', 7, 1, 'Surat', '', 395007, 'uploads/farraido4.jpg', 'coverpic/img1.jpg'),
(51, 'Hotel Krishna', 'A-42', 7, 1, 'Surat', '', 395007, 'uploads/farraido.jpg', 'coverpic/hotel-big-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `razorpay_payment_id`, `status`, `email`, `price`) VALUES
(1, '123', '123', 'success', 'something', 0),
(2, 'order_GOULzvaUdTkGxh', 'pay_GOUMD2ci7aJIq6', 'success', 'admin@azhark.com', 0),
(3, 'order_GOUOQbjWaGxTtn', 'pay_GOUOaVKgUe6vyY', 'success', 'contact@azhark.com', 500),
(4, 'order_M1HqEW4Pu8dFYX', 'pay_M1HqTtAkUrSZTQ', 'success', 'rishipatel1850@gmail.com', 1),
(5, 'order_M1HqEW4Pu8dFYX', 'pay_M1HqTtAkUrSZTQ', 'success', 'rishipatel1850@gmail.com', 1),
(6, 'order_M1I46mTXGd9PEG', 'pay_M1I4P2lSKRwQtm', 'success', 'rishipatel1850@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos_master`
--

CREATE TABLE `photos_master` (
  `photoid` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos_master`
--

INSERT INTO `photos_master` (`photoid`, `hid`, `pic`) VALUES
(1, 39, 'extrahotelpics/taj_1.jpg'),
(2, 39, 'extrahotelpics/taj_2.jpg'),
(3, 40, 'extrahotelpics/farraido.jpg\r\n'),
(5, 40, 'extrahotelpics/farraido2.jpg'),
(6, 40, 'extrahotelpics/farraido4.jpg'),
(7, 39, 'extrahotelpics/small-3.png'),
(8, 39, 'extrahotelpics/small-3.png'),
(9, 42, 'extrahotelpics/holiday-5.png'),
(10, 47, 'extrahotelpics/holiday-5.png'),
(11, 47, 'extrahotelpics/holiday-1.png'),
(12, 42, 'extrahotelpics/hotel-big-1.png'),
(14, 47, 'extrahotelpics/farraido2.jpg'),
(15, 40, 'extrahotelpics/Hotel Rajhans.jpg'),
(16, 50, 'extrahotelpics/img2.jpg'),
(17, 51, 'extrahotelpics/farraido.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_tb`
--

CREATE TABLE `ratings_tb` (
  `rating_id` int(255) NOT NULL,
  `hid` int(255) NOT NULL,
  `ratings` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings_tb`
--

INSERT INTO `ratings_tb` (`rating_id`, `hid`, `ratings`) VALUES
(1, 39, 5),
(2, 41, 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE `room_master` (
  `hid` int(255) NOT NULL,
  `tid` int(255) NOT NULL,
  `total_rooms` int(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `adults` int(255) NOT NULL,
  `price_per_room` int(255) NOT NULL,
  `childeren` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`hid`, `tid`, `total_rooms`, `description`, `adults`, `price_per_room`, `childeren`) VALUES
(40, 2, 40, 'The Deluxe Room is a luxurious and spacious accommodation option designed to provide utmost comfort and style for guests seeking an elevated stay. With meticulous attention to detail and an elegant design, the Deluxe Room offers a retreat-like ambiance that ensures a truly indulgent experience.', 4, 5999, 2),
(40, 6, 50, 'The Family Room is a spacious and welcoming accommodation option designed to cater to the needs of families or larger groups. With ample space and thoughtful amenities, the Family Room offers a comfortable and convenient stay for guests of all ages.', 2, 4999, 1),
(41, 7, 15, '', 2, 5999, 2),
(42, 6, 25, 'This type of rooms are really cool to choose to stay!', 2, 2555, 2),
(47, 6, 2, 'asdasdasd', 2, 123, 2),
(50, 10, 12, 'asdasd', 1, 123123, 1),
(51, 6, 5, 'A family room is a warm and inviting space within a home that is specifically designed to foster a sense of togetherness and relaxation for family members. It is typically a multipurpose area where family members can gather to spend quality time, engage in activities, and enjoy each other\'s company.', 2, 5999, 1),
(39, 8, 10, 'A family room is a warm and inviting space within a home that is specifically designed to foster a sense of togetherness and relaxation for family members. It is typically a multipurpose area where family members can gather to spend quality time, engage in activities, and enjoy each other\'s company.', 2, 2999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_tb`
--

CREATE TABLE `state_tb` (
  `state_id` int(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `state_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_tb`
--

INSERT INTO `state_tb` (`state_id`, `state`, `state_img`) VALUES
(1, 'Andhra Pradesh', 'stateimg/i1.jpg'),
(2, 'Arunachal Pradesh', 'stateimg/ap2.jpg'),
(3, 'Assam', 'stateimg/i3.jpg'),
(4, 'Bihar', 'stateimg/img14.jpg'),
(5, 'Chhattisgarh', 'stateimg/img15.jpg'),
(6, 'Goa', 'stateimg/img6.jpg'),
(7, 'Gujarat', 'stateimg/har.jpg'),
(8, 'Haryana', 'stateimg/har.jpg'),
(9, 'Himachal Pradesh', 'stateimg/hp.jpg'),
(10, 'Jharkhand', 'stateimg/jharkhand12.jpg'),
(11, 'Karnataka', 'stateimg/karnatak.jpg'),
(12, 'Kerala', 'stateimg/kerala1.jpg'),
(13, 'Madhya Pradesh', 'stateimg/img13.jpg'),
(14, 'Maharashtra', 'stateimg/img14.jpg'),
(15, 'Manipur', 'stateimg/img15.jpg'),
(16, 'Meghalaya', 'stateimg/img16.jpg'),
(17, 'Mizoram', 'stateimg/img17.jpg'),
(18, 'Nagaland', 'stateimg/img18.jpg'),
(19, 'Odisha', 'stateimg/img19.jpg'),
(20, 'Punjab', 'stateimg/img20.jpg'),
(21, 'Rajasthan', 'stateimg/img21.jpg'),
(22, 'Sikkim', 'stateimg/img22.jpg'),
(23, 'Tamil Nadu', 'stateimg/img23.jpg'),
(24, 'Telangana', 'stateimg/img24.jpg'),
(25, 'Tripura', 'stateimg/img25.jpg'),
(26, 'Uttar Pradesh', ''),
(27, 'Uttarakhand', ''),
(28, 'West Bengal', ''),
(29, 'Andaman and Nicobar Islands', ''),
(30, 'Chandigarh', ''),
(31, 'Dadra and Nagar Haveli and Daman and Diu', ''),
(32, 'Delhi', ''),
(33, 'Ladakh', ''),
(34, 'Lakshadweep', ''),
(35, 'Puducherry', ''),
(36, 'asd', 'stateimg/small-3.png'),
(37, 'asd', '');

-- --------------------------------------------------------

--
-- Table structure for table `type_master`
--

CREATE TABLE `type_master` (
  `tid` int(255) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `timage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_master`
--

INSERT INTO `type_master` (`tid`, `tname`, `timage`) VALUES
(2, 'Deluxe Room', 'typeimg/img12.jpg'),
(6, 'Family Room', 'typeimg/img13.jpg'),
(7, 'Presidential Suite', 'typeimg/img11.jpg'),
(8, 'Duplex Suite', 'typeimg/img12.jpg'),
(9, 'Penthouse Suite', 'typeimg/img13.jpg'),
(10, 'Bungalow', 'typeimg/img11.jpg'),
(12, 'asd', 'small-2.png'),
(13, 'asd', 'small-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking_details`
--

CREATE TABLE `user_booking_details` (
  `ubid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `bid` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_booking_details`
--

INSERT INTO `user_booking_details` (`ubid`, `uid`, `bid`, `firstname`, `lastname`, `phone`) VALUES
(5, 1, 26, 'Rishi', 'Patel', 7573),
(6, 1, 27, 'Rishi', 'Patel', 7573),
(7, 1, 28, 'Rishi', 'Patel', 7573),
(8, 1, 29, 'Rishi', 'Patel', 7573),
(9, 1, 30, 'Rishi', 'Patel', 7573),
(10, 1, 31, '', '', 0),
(11, 1, 32, 'Rishi', 'Patel', 7573),
(12, 1, 33, '', '', 0),
(13, 1, 34, '', '', 0),
(14, 1, 35, '', '', 0),
(15, 2, 36, 'Rishi', 'Patel', 7573),
(16, 2, 37, 'Rishi', 'Patel', 7573),
(17, 2, 38, 'Rishi', 'Patel', 7573),
(18, 2, 39, 'Rishi', 'Patel', 7573),
(19, 2, 40, 'Rishi', 'Patel', 7573),
(20, 2, 41, 'Rishi', 'Patel', 7573),
(21, 2, 42, 'Rishi', 'Patel', 7573),
(22, 2, 43, 'Rishi', 'Patel', 7573),
(23, 2, 44, 'Rishi', 'Patel', 7573),
(24, 2, 45, 'Rishi', 'Patel', 7573),
(25, 2, 46, '', '', 0),
(26, 2, 47, 'Rishi', 'Patel', 7573),
(27, 2, 48, 'Rishi', 'Patel', 7573),
(28, 1, 49, 'Rishi', 'Patel', 7573),
(29, 1, 50, 'Rishi', 'Patel', 7573),
(30, 1, 51, 'Rishi', 'Patel', 7573),
(31, 1, 52, 'Rishi', 'Patel', 7573),
(32, 2, 53, 'Rishi', 'Patel', 7573),
(33, 1, 54, 'Rishi', 'Patel', 7573),
(34, 1, 55, 'Rishi', 'Patel', 7573),
(35, 1, 56, 'Rishi', 'Patel', 7573);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `uid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phn` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uid`, `name`, `password`, `email`, `phn`, `address`, `photo`) VALUES
(1, 'Rajesh Kumar', 'r123', 'rajesh.kumar@example.com', 2147483647, '123 Gandhi Road, Mumbai', 'images/user.jpg'),
(2, 'Priya Sharma', 'r123', 'priya.sharma@example.com', 2147483647, '456 Nehru Street, Delhi', 'images/user2.png'),
(3, 'Amit Patel', 'r123', 'amit.patel@example.com', 2147483647, '789 Gandhi Nagar, Bangalore', 'images/user.jpg'),
(4, 'Neha Gupta', 'r123', 'neha.gupta@example.com', 2147483647, '567 Patel Road, Kolkata', 'images/user.jpg'),
(5, 'Rahul Singh', 'r123', 'rahul.singh@example.com', 2147483647, '890 Sharma Lane, Chennai', 'images/user.jpg'),
(6, 'Pooja Verma', 'r123', 'pooja.verma@example.com', 2147483647, '234 Sharma Nagar, Hyderabad', 'images/user.jpg'),
(7, 'Deepak Mishra', 'r123', 'deepak.mishra@example.com', 2147483647, '901 Verma Street, Ahmedabad', 'images/user.jpg'),
(8, 'Anjali Reddy', 'r123', 'anjali.reddy@example.com', 2109876543, '678 Reddy Road, Pune', 'images/user.jpg'),
(9, 'Vivek Sharma', 'r123', 'vivek.sharma@example.com', 1098765432, '345 Kumar Lane, Jaipur', 'images/user.jpg'),
(10, 'Sneha Joshi', 'r123', 'sneha.joshi@example.com', 2147483647, '567 Joshi Nagar, Lucknow', 'images/user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_tb`
--
ALTER TABLE `booking_tb`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `hid` (`hid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `cancellation_master`
--
ALTER TABLE `cancellation_master`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `city_tb`
--
ALTER TABLE `city_tb`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `comment_master`
--
ALTER TABLE `comment_master`
  ADD PRIMARY KEY (`cmtid`),
  ADD KEY `hid` (`hid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `coverpic_tb`
--
ALTER TABLE `coverpic_tb`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `description_master`
--
ALTER TABLE `description_master`
  ADD PRIMARY KEY (`desid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `facility_master`
--
ALTER TABLE `facility_master`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `hotel_facility_master`
--
ALTER TABLE `hotel_facility_master`
  ADD PRIMARY KEY (`hfid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos_master`
--
ALTER TABLE `photos_master`
  ADD PRIMARY KEY (`photoid`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `ratings_tb`
--
ALTER TABLE `ratings_tb`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `room_master`
--
ALTER TABLE `room_master`
  ADD KEY `hid` (`hid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `state_tb`
--
ALTER TABLE `state_tb`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `type_master`
--
ALTER TABLE `type_master`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user_booking_details`
--
ALTER TABLE `user_booking_details`
  ADD PRIMARY KEY (`ubid`),
  ADD KEY `bid` (`bid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tb`
--
ALTER TABLE `booking_tb`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cancellation_master`
--
ALTER TABLE `cancellation_master`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_tb`
--
ALTER TABLE `city_tb`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `comment_master`
--
ALTER TABLE `comment_master`
  MODIFY `cmtid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `coverpic_tb`
--
ALTER TABLE `coverpic_tb`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `description_master`
--
ALTER TABLE `description_master`
  MODIFY `desid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facility_master`
--
ALTER TABLE `facility_master`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotel_facility_master`
--
ALTER TABLE `hotel_facility_master`
  MODIFY `hfid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `hotel_master`
--
ALTER TABLE `hotel_master`
  MODIFY `hid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photos_master`
--
ALTER TABLE `photos_master`
  MODIFY `photoid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ratings_tb`
--
ALTER TABLE `ratings_tb`
  MODIFY `rating_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state_tb`
--
ALTER TABLE `state_tb`
  MODIFY `state_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `type_master`
--
ALTER TABLE `type_master`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_booking_details`
--
ALTER TABLE `user_booking_details`
  MODIFY `ubid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_tb`
--
ALTER TABLE `booking_tb`
  ADD CONSTRAINT `booking_tb_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`),
  ADD CONSTRAINT `booking_tb_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `user_master` (`uid`),
  ADD CONSTRAINT `booking_tb_ibfk_4` FOREIGN KEY (`tid`) REFERENCES `type_master` (`tid`);

--
-- Constraints for table `cancellation_master`
--
ALTER TABLE `cancellation_master`
  ADD CONSTRAINT `cancellation_master_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `booking_tb` (`bid`);

--
-- Constraints for table `city_tb`
--
ALTER TABLE `city_tb`
  ADD CONSTRAINT `city_tb_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_tb` (`state_id`);

--
-- Constraints for table `comment_master`
--
ALTER TABLE `comment_master`
  ADD CONSTRAINT `comment_master_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`),
  ADD CONSTRAINT `comment_master_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user_master` (`uid`);

--
-- Constraints for table `coverpic_tb`
--
ALTER TABLE `coverpic_tb`
  ADD CONSTRAINT `coverpic_tb_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`);

--
-- Constraints for table `description_master`
--
ALTER TABLE `description_master`
  ADD CONSTRAINT `description_master_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`);

--
-- Constraints for table `hotel_facility_master`
--
ALTER TABLE `hotel_facility_master`
  ADD CONSTRAINT `hotel_facility_master_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `facility_master` (`fid`),
  ADD CONSTRAINT `hotel_facility_master_ibfk_3` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`);

--
-- Constraints for table `photos_master`
--
ALTER TABLE `photos_master`
  ADD CONSTRAINT `photos_master_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`);

--
-- Constraints for table `ratings_tb`
--
ALTER TABLE `ratings_tb`
  ADD CONSTRAINT `ratings_tb_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`);

--
-- Constraints for table `room_master`
--
ALTER TABLE `room_master`
  ADD CONSTRAINT `room_master_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `hotel_master` (`hid`),
  ADD CONSTRAINT `room_master_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `type_master` (`tid`);

--
-- Constraints for table `user_booking_details`
--
ALTER TABLE `user_booking_details`
  ADD CONSTRAINT `user_booking_details_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `booking_tb` (`bid`),
  ADD CONSTRAINT `user_booking_details_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user_master` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
