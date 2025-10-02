-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2025 at 09:13 AM
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
-- Database: `roadready_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`) VALUES
(45, 1, 17),
(46, 1, 8),
(47, 1, 27),
(49, 1, 13),
(50, 1, 66),
(52, 5, 44);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catdescription` text NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `catdescription`, `image`) VALUES
(1, 'Exterior Accessory', 'Car exterior accessories can improve a vehicle\'s aesthetics, functionality, and protection from the elements. Common options range from practical items like car covers and door guards to cosmetic upgrades like chrome garnishes and spoilers.', '1756879464_i4.jpg'),
(2, 'Interior accessory', 'You can enhance the comfort, safety, and functionality of your vehicle with a wide range of interior accessories. Must-have items include floor mats, seat covers, air fresheners, organizers, and tech mounts. ', '1756909105_i1.jpg'),
(3, 'Electronic Accessory', 'Electronic accessories for cars include a wide range of devices for safety, comfort, and entertainment, from must-have essentials like dash cameras to convenience items like power inverters. The best choice for you will depend on your budget and needs, ranging from simple phone mounts to a full smart stereo system.', '1756907985_i2.jpg'),
(4, 'Car Care and Maintanence', 'For a comprehensive car care and maintenance, you will need a variety of accessories covering interior cleaning, exterior detailing, and essential vehicle upkeep. These items range from simple cleaning cloths to specialized polishes and maintenance tools.', '1756908184_i5.jpg'),
(5, 'Wheels and tyres', 'For wheels and tires, a wide range of accessories are available for both practical use and aesthetic customization. These items serve various purposes, from essential maintenance to adding a personalized touch to your vehicle.', '1756909295_i3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Ahmedabad'),
(2, 1, 'Rajkot'),
(3, 1, 'Surat'),
(4, 2, 'Ajmer'),
(5, 2, 'Jaipur');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Amit Patoliya', '', 'hii', 'ioahihasdihaiud', '2025-09-24 07:13:49'),
(2, 'Amit Patoliya', 'amit@gmail.com', 'jkadhasid', 'ouaifhdasiodas', '2025-09-24 07:14:24'),
(3, 'Amit Patoliya', 'admin@gmail.com', ',msjkdfbsuidfisa', 'jhabhdfbasbdfbasgf', '2025-09-24 07:15:32'),
(4, 'Amit Patoliya', 'admin@cottoncore.com', 'jkadhasidsfsdfsdfs', 'sjknfaifwnfdaekdasdias', '2025-09-24 07:16:45'),
(5, 'Amit Patoliya', 'admin@gmail.com', 'product', 'product 10101010', '2025-09-25 11:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `shipping` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `first_name`, `last_name`, `phone`, `email`, `address1`, `address2`, `country`, `state`, `city`, `pincode`, `payment_method`, `subtotal`, `shipping`, `total`, `order_date`) VALUES
(11, 1, 'ORD68C805339DAA6', 'Amit', 'Patoliya', '9510211376', 'amit@gmail.com', 'uuihdadbas,iuhsduisf', 'shflksjlfksdfsdf', '1', '2', '5', '302004', 'Google Pay', 1449.00, 50.00, 1499.00, '2025-09-15 12:23:15'),
(12, 1, 'ORD68CA58DFB4B98', 'Amit', 'Patoliya', '9510211376', 'amit@gmail.com', 'uuihdadbas,iuhsduisf', 'shflksjlfksdfsdf', '1', '1', '2', '360004', 'Google Pay', 1000.00, 50.00, 1050.00, '2025-09-17 06:44:47'),
(13, 1, 'ORD68CC3A1A7E5AB', 'Amit', 'Patoliya', '9510211376', 'amit@gmail.com', 'uuihdadbas,iuhsduisf', 'shflksjlfksdfsdf', '1', '1', '2', '360004', 'Google Pay', 2897.00, 50.00, 2947.00, '2025-09-18 16:58:02'),
(14, 1, 'ORD68CE7953DFFAE', 'Amit', 'Patoliya', '9510211376', 'amit@gmail.com', 'uuihdadbas,iuhsduisf', 'shflksjlfksdfsdf', '1', '1', '2', '360004', 'Google Pay', 3130.00, 50.00, 3180.00, '2025-09-20 09:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `total_price`) VALUES
(10, 11, 25, 'side-door-trimer-4', 899.00, 899.00),
(11, 11, 15, 'car charger 4', 550.00, 550.00),
(12, 12, 22, 'side-door-trimer-1', 1000.00, 1000.00),
(13, 13, 24, 'side-door-trimer-3', 999.00, 999.00),
(14, 13, 24, 'side-door-trimer-3', 999.00, 999.00),
(15, 13, 25, 'side-door-trimer-4', 899.00, 899.00),
(16, 14, 15, 'car charger 4', 550.00, 550.00),
(17, 14, 5, 'steering wheel cover 1', 2000.00, 2000.00),
(18, 14, 16, 'car charger 5', 580.00, 580.00);

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pincode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `city_id`, `pincode`) VALUES
(1, 1, '380001'),
(2, 1, '380002'),
(3, 1, '380015'),
(4, 2, '360001'),
(5, 2, '360002'),
(6, 3, '395003'),
(7, 3, '395004'),
(8, 4, '305001'),
(9, 4, '305002'),
(10, 5, '302001'),
(11, 5, '302002'),
(12, 5, '302004'),
(13, 2, '360003'),
(14, 2, '360004');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `catid` int(5) NOT NULL,
  `subcatid` int(5) NOT NULL,
  `productname` varchar(40) NOT NULL,
  `productprice` int(5) NOT NULL,
  `productdescription` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catid`, `subcatid`, `productname`, `productprice`, `productdescription`, `image`) VALUES
(1, 2, 1, 'car-air-fresher-1', 400, 'SpadeAces Car Air Freshener Rechargeable Car Diffuser purifier Home Office Portable Car Air Purifier  (Black)', '1756910093_car-air-freshner-1.jpg'),
(2, 2, 1, 'car-air-fresher-2', 420, 'SpadeAces Car Air Freshener Rechargeable Car Diffuser purifier Home Office Portable Car Air Purifier  (Black)', '1756910116_car-air-freshner-2.jpg'),
(3, 2, 1, 'car-air-fresher-3', 450, 'SpadeAces Car Air Freshener Rechargeable Car Diffuser purifier Home Office Portable Car Air Purifier  (Black)', '1756910147_car-air-freshner-3.jpg'),
(4, 2, 1, 'car-air-fresher-4', 499, 'SpadeAces Car Air Freshener Rechargeable Car Diffuser purifier Home Office Portable Car Air Purifier  (Black)', '1756910180_car-air-freshner-4.jpg'),
(5, 2, 2, 'steering wheel cover 1', 2000, 'Zlirfy Microfiber Leather Car Medium Steering Wheel Cover,Universal Car Wheel Cover,Breathable Wheel Cover,Anti-Slip Full Surround,Sports Style Steering Wheel Covers (Black&Red Line)', '1756910302_stearing-wheel-cover-1.jpg'),
(6, 2, 2, 'steering wheel cover 2', 2200, 'Zlirfy Microfiber Leather Car Medium Steering Wheel Cover,Universal Car Wheel Cover,Breathable Wheel Cover,Anti-Slip Full Surround,Sports Style Steering Wheel Covers (Black&Red Line)', '1756910348_stearing-wheel-cover-2.jpg'),
(7, 2, 2, 'steering wheel cover 3', 2500, 'Zlirfy Microfiber Leather Car Medium Steering Wheel Cover,Universal Car Wheel Cover,Breathable Wheel Cover,Anti-Slip Full Surround,Sports Style Steering Wheel Covers (Black&Red Line)', '1756910373_stearing-wheel-cover-3.jpg'),
(8, 2, 2, 'steering wheel cover 4', 2250, 'Zlirfy Microfiber Leather Car Medium Steering Wheel Cover,Universal Car Wheel Cover,Breathable Wheel Cover,Anti-Slip Full Surround,Sports Style Steering Wheel Covers (Black&Red Line)', '1756910416_stearing-wheel-cover-4.jpg'),
(9, 2, 2, 'steering wheel cover 5', 2400, 'Zlirfy Microfiber Leather Car Medium Steering Wheel Cover,Universal Car Wheel Cover,Breathable Wheel Cover,Anti-Slip Full Surround,Sports Style Steering Wheel Covers (Black&Red Line)', '1756910443_stearing-wheel-cover-5.jpg'),
(11, 2, 2, 'steering wheel cover 7', 3000, 'Steering Wheel Covers (orange)', '1756910588_stearing-wheel-cover-7.jpg'),
(12, 2, 3, 'car charger 1', 600, ' Car Mobile Charger for Fast Charging 45W Dual Port with 3 in 1 Multi Charger Cable Grey', '1756910756_car-charger-1.jpg'),
(13, 2, 3, 'car charger 2', 700, ' Car Mobile Charger for Fast Charging 45W Dual Port with 3 in 1 Multi Charger Cable Grey', '1756910825_car-charger-2.jpg'),
(14, 2, 3, 'car charger 3', 650, 'Car Mobile Charger for Fast Charging 45W Dual Port with 3 in 1 Multi Charger Cable Grey 3', '1756977510_car-charger-3.jpg'),
(15, 2, 3, 'car charger 4', 550, 'Car Mobile Charger for Fast Charging 45W Dual Port with 3 in 1 Multi Charger Cable Grey 4', '1756977536_car-charger-4.jpg'),
(17, 1, 4, 'car door guard 1', 500, 'car door guard that guard your car door from scratches ', '1756977785_car-door-guard-1.jpg'),
(18, 1, 4, 'car door guard 2', 580, 'car door guard that guard your car door from scratches 2', '1756977845_car-door-guard-2.jpg'),
(19, 1, 4, 'car door guard 3', 470, 'car door guard that guard your car door from scratches 3', '1756977903_car-door-guard-3.jpg'),
(20, 1, 4, 'car door guard 4', 400, 'car door guard that guard your car door from scratches', '1756977929_car-door-guard-4.jpg'),
(21, 1, 4, 'car door guard 5', 560, 'car door guard that guard your car door from scratches', '1756977959_car-door-guard-5.jpg'),
(22, 1, 5, 'side-door-trimer-1', 1000, 'side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2', '1756978137_side-door-trimer-1.jpg'),
(23, 1, 5, 'side-door-trimer-2', 1020, 'side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2', '1756978190_side-door-trimer-2.jpg'),
(24, 1, 5, 'side-door-trimer-3', 999, 'side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2', '1756978229_side-door-trimer-3.jpg'),
(25, 1, 5, 'side-door-trimer-4', 899, 'side-door-trimerside-door-trimer-2side-door-trimer-2side-door-trimer-2-2', '1756978255_side-door-trimer-4.jpg'),
(26, 1, 5, 'side-door-trimer-5', 1200, 'side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2side-door-trimer-2', '1756978324_side-door-trimer-5.jpg'),
(27, 5, 6, 'alloy 1', 4000, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.', '1758369271_alloy 1.jpg'),
(28, 5, 6, 'alloy 2', 4200, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.222', '1758369292_alloy 2.jpeg'),
(29, 5, 6, 'alloy 3', 4300, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.', '1758369318_alloy 3.jpeg'),
(30, 5, 6, 'alloy 4', 4400, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.', '1758369359_alloy 4.jpeg'),
(31, 5, 6, 'alloy 5', 4500, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.55555', '1758369432_alloy 5.jpg'),
(32, 5, 6, 'alloy 6', 4600, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.666666', '1758369458_alloy 6.jpg'),
(33, 5, 6, 'alloy 7', 4700, 'Alloy wheels are car wheels made from an alloy of light metals like aluminum or magnesium.', '1758369482_alloy 7.jpeg'),
(34, 5, 7, 'Wheel Cover Plate 1', 1200, 'A \"wheel cover plate\" most commonly refers to a hubcap or a center cap, a decorative and protective cover for a vehicle\'s wheel', '1758370084_cover plate 1.jpg'),
(35, 5, 7, 'Wheel Cover Plate 2', 1220, 'Wheel Cover Plate 1 Wheel Cover Plate 1Wheel Cover Plate 1 22', '1758370119_cover plate 2.jpg'),
(36, 5, 7, 'Wheel Cover Plate 3', 1300, 'Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1 333', '1758370144_cover plate 3.jpg'),
(37, 5, 7, 'Wheel Cover Plate 4', 1400, 'Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 14444', '1758370173_cover plate 4.jpg'),
(38, 5, 7, 'Wheel Cover Plate 5', 1500, 'Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 155555', '1758370201_cover plate 5.jpg'),
(39, 5, 7, 'Wheel Cover Plate 6', 1600, 'Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1Wheel Cover Plate 1666666', '1758370236_cover plate 6.jpg'),
(40, 5, 8, 'tire 1', 22000, 'Car tires are the only part of a vehicle that makes contact with the road, and choosing the right ones is crucial for safet', '1758370717_tire 1.jpeg'),
(41, 5, 8, 'tire 2', 27000, 'Car tires are the only part of a vehicle that makes contact with the road, and choosing the right ones is crucial for safet', '1758370774_tire 2.jpg'),
(42, 5, 8, 'tire 3', 30000, 'Car tires are the only part of a vehicle that makes contact with the road, and choosing the right ones is crucial for safet', '1758370811_tire 3.jpg'),
(43, 5, 8, 'tire 4', 29000, 'Car tires are the only part of a vehicle that makes contact with the road, and choosing the right ones is crucial for safet', '1758370847_tire 4.jpg'),
(44, 5, 8, 'tire 5', 7000, 'Car tires are the only part of a vehicle that makes contact with the road, and choosing the right ones is crucial for safet5555', '1758370878_tire 5.jpeg'),
(45, 5, 9, 'Car Air Compressor 1', 2400, 'An air pump compressor, or air compressor, is a device that converts power into kinetic energy by forcing', '1758371362_Air Pump Compressor 1.jpg'),
(46, 5, 9, 'Car Air Compressor 2', 2500, 'An air pump compressor, or air compressor, is a device that converts power into kinetic energy by forcing22', '1758371394_Air Pump Compressor 2.jpg'),
(47, 5, 9, 'Car Air Compressor 3', 2630, 'An air pump compressor, or air compressor, is a device that converts power into kinetic energy by forcing 333', '1758371432_Air Pump Compressor 3.jpeg'),
(48, 5, 9, 'Car Air Compressor 4', 2700, 'An air pump compressor, or air compressor, is a device that converts power into kinetic energy by forcing', '1758371525_Air Pump Compressor 4.jpeg'),
(49, 5, 9, 'Car Air Compressor 5', 2800, 'An air pump compressor, or air compressor, is a device that converts power into kinetic energy by forcing 555', '1758371498_Air Pump Compressor 5.jpeg'),
(50, 5, 9, 'Car Air Compressor 6', 2900, 'An air pump compressor, or air compressor, is a device that converts power into kinetic energy by forcing 666666', '1758371569_Air Pump Compressor 6.jpg'),
(51, 4, 10, 'Car Pressure Washer 1', 2000, 'car pressure washer to clean your car with pressured water 11', '1758520795_car pressure washer 1.jpg'),
(52, 4, 10, 'Car Pressure Washer 2', 1580, 'car pressure washer to clean your car with pressured water 22', '1758520835_car pressure washer 2.jpg'),
(53, 4, 10, 'Car Pressure Washer 3', 1440, 'car pressure washer to clean your car with pressured water 333', '1758520865_car pressure washer 3.jpg'),
(54, 4, 10, 'Car Pressure Washer 4', 1390, 'car pressure washer to clean your car with pressured water 444', '1758520901_car pressure washer 4.jpg'),
(55, 4, 10, 'Car Pressure Washer 5', 3200, 'car pressure washer to clean your car with pressured water 555', '1758520931_car pressure washer 5.jpg'),
(56, 4, 10, 'Car Pressure Washer 6', 4300, 'car pressure washer to clean your car with pressured water 666666', '1758520967_car pressure washer 6.jpg'),
(57, 4, 11, 'Car Vacume Cleaner 1', 999, 'A car vacuum cleaner is a portable, compact device specifically designed to clean the interior of a vehicle 11', '1758521521_vacume cleaner 1.jpeg'),
(58, 4, 11, 'Car Vacume Cleaner 2', 950, 'A car vacuum cleaner is a portable, compact device specifically designed to clean the interior of a vehicle 222', '1758521564_vacume cleaner 2.jpg'),
(59, 4, 11, 'Car Vacume Cleaner 3', 1049, 'A car vacuum cleaner is a portable, compact device specifically designed to clean the interior of a vehicle 333', '1758521618_vacume cleaner 3.jpg'),
(60, 4, 11, 'Car Vacume Cleaner 4', 980, 'A car vacuum cleaner is a portable, compact device specifically designed to clean the interior of a vehicle 4444', '1758521655_vacume cleaner 4.jpeg'),
(61, 1, 17, 'Spoiler 1', 5000, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388824_car spoiler 1.jpg'),
(62, 1, 17, 'Car Spoiler 2', 6000, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388848_car spoiler 2.jpg'),
(63, 1, 17, 'Car Spoiler 3', 6500, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388865_car spoiler 3.jpeg'),
(64, 1, 17, 'Car Spoiler 4', 5500, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388891_car spoiler 4.jpeg'),
(65, 1, 17, 'Car Spoiler 5', 5000, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388935_car spoiler 5.jpg'),
(66, 1, 17, 'Car Spoiler 6', 6400, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388954_car spoiler 6.png'),
(67, 1, 17, 'Car Spoiler 7', 6600, 'A car spoiler is an aerodynamic device attached to a vehicle, most commonly on the rear, to alter airflow and improve handling at high speeds.', '1759388967_car spoiler 7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Gujarat'),
(2, 1, 'Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(5) NOT NULL,
  `catid` int(5) NOT NULL,
  `subcatname` varchar(80) NOT NULL,
  `subcatdescription` text NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `catid`, `subcatname`, `subcatdescription`, `image`) VALUES
(1, 2, 'car air freshner', 'car air fresher for good smell in your car', '1756909745_car-air-freshner-3.jpg'),
(2, 2, 'Steering Wheel cover', 'cover for steering wheel which improve looks and enhance grip of steering wheel', '1756909902_stearing-wheel-cover-1.jpg'),
(3, 2, 'car charger', 'allows you to charge your mobile in your car', '1756909946_car-charger-4.jpg'),
(4, 1, 'car door guard', 'car door door  door door door door door', '1756977694_car-door-guard-2.jpg'),
(5, 1, 'side-door-trimer', 'car door door door door trimer', '1756978067_side-door-trimer-2.jpg'),
(6, 5, 'Alloy Wheels', 'popular choice for improving a vehicle\'s performance and appearance.', '1758272553_alloycat.jpeg'),
(7, 5, 'Wheel Cover Plates', 'Wheel covers, also known as hubcaps or wheel trims, are decorative disks that fit over a vehicle\'s steel wheels. .', '1758272749_wheelcoverplate.jpeg'),
(8, 5, 'Tires', 'Performance tires are engineered with specialized rubber compounds and tread designs to provide superior handling, grip, and responsiveness at high speeds.', '1758273027_tyres.jpg'),
(9, 5, 'Air Pump Compressor', 'A portable air pump or compressor for a car is a compact device that quickly inflates tires and other items using a power source', '1758273622_car air compressor.jpg'),
(10, 4, 'Pressure Washers', 'A pressure washer, or power washer, is a powerful tool that uses a high-pressure stream of water to remove dirt, grime, mold, and stains from outdoor surfaces. ', '1758273858_pressure washers.jpg'),
(11, 4, 'Car Vacuum Cleaners', 'Car vacuum cleaners are compact, portable devices designed to clean the tight ', '1758273971_car vecume cleaner.jpg'),
(12, 4, 'Tire Shiners', 'tire shiners typically include the polish or dressing, along with tools for a proper application..', '1758274301_Tire Shiners.jpg'),
(13, 4, 'Microfiber cleaning cloths', 'Microfiber cleaning cloths are highly effective synthetic cleaning tools that are more absorbent, durable..', '1758274498_Microfiber cleaning cloths.jpg'),
(14, 3, 'Dash Cams', 'A dash cam is a camera mounted on a vehicle\'s windshield or dashboard that continuously records video of the road ahead', '1758274714_Dash Cams.jpg'),
(15, 3, 'Underbody LED Lights', 'popular modification for aesthetic appeal, installation requires understanding the legality, potential effects on warranty, and installation process.', '1758274940_car lights.jpg'),
(16, 3, 'Interior Ambient LED Light Strips', 'Interior ambient LED light strips are flexible, customizable lighting systems used to create a pleasant', '1758275122_Interior Ambient LED Light Strips.jpeg'),
(17, 1, 'Spoilers', 'Car spoilers are aerodynamic devices that \"spoil\" or disrupt the airflow over a vehicle to improve handling, reduce drag,', '1758275411_spoilers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `bdate` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `bdate`) VALUES
(1, 'admin', '303f57cb6cd867e749e3c448c0b56ceb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email_` varchar(50) NOT NULL,
  `bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`id`, `username`, `password`, `mobile_no`, `email_`, `bdate`) VALUES
(1, 'admin', '303f57cb6cd867e749e3c448c0b56ceb', '9510211376', 'amit@gmail.com', '0000-00-00'),
(5, 'Amit Patoliya', '08ba18961265a400a771aeec07fee285', '9879117611', 'amitamit@gmail.com', '2006-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(12, 1, 1),
(13, 5, 39),
(14, 5, 64),
(15, 5, 66);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD CONSTRAINT `pincodes_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
