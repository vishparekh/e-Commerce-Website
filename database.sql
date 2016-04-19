-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2016 at 04:48 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vasant`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(100) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `content`, `images`) VALUES
(1, 'About Us', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We SJ Traders are the direct Manufacturer and Exporter of all kinds of religious marble murti, statues, god idols, handicraft, temples, roman figure, garden statues and decorative items etc. We SJ Traders with view of nourish ancient indian art devoted to propagate this spiritual art. <br>\n<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SJ Traders , based in the Ahmedabad are established as one of the reputed Manufacturers, Exporters and Suppliers of large varity of Moorti & Statues. We manufactures and exports various types of Marble Murtis of Ganesha, buddha, Jain Moortis, Durga, Radha Krishna, Ram Darbar, SaiBaba, Hanumanji, Vishnu Laxmi, Shiva parivar and other God Murtis Idols and Sculptures; we made them in different sizes and styles.', 'aboutus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rowid` varchar(255) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `email_id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `id`, `qty`, `price`, `name`, `rowid`, `subtotal`, `email_id`) VALUES
(14, '3', 1, 3456, '3trdyfguhij', '', 3456, 'vishalparekh26@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `no_of_times_viewed` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `no_of_times_viewed`) VALUES
(1, 'Ganesha', 78),
(2, 'Saraswati', 1),
(3, 'Lakshmi', 3),
(4, 'Radha Krishna', 2),
(5, 'Sai Baba', 4),
(6, 'Makhan Krishna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE IF NOT EXISTS `latest_news` (
  `news_id` int(100) NOT NULL,
  `news_item` text NOT NULL,
  `chosen` varchar(255) NOT NULL,
  `posted_at` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`news_id`, `news_item`, `chosen`, `posted_at`) VALUES
(1, 'dhasdhygd  kgdiuawgd giad ywq1', 'yes', '23546'),
(2, 'dhasdhygd  kgdiuawgd giad ywqdhasdhygd  kgdiuawgd giad ywq2', 'yes', '23456'),
(3, 'dhasdhygd  kgdiuawgd giad ywqtyfugihjk3', 'yes', '2435'),
(4, 'dhasdhygd  kgdiuawgd giad ywqtyfugihjkdhasdhygd  kgdiuawgd giad ywqtyfugihjk4', 'no', ''),
(5, 'visah fghjknl5', 'no', ''),
(6, 'visah fghjknlvisah fghjknl6', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_names` text NOT NULL,
  `product_prices` text NOT NULL,
  `product_qtys` text NOT NULL,
  `order_total` int(100) NOT NULL,
  `ordered_date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `email_id`, `phone_no`, `address_line1`, `address_line2`, `city`, `state`, `pincode`, `company_name`, `product_names`, `product_prices`, `product_qtys`, `order_total`, `ordered_date`) VALUES
(1, 'Vishal', 'Parekh', 'vishalparekh26@gmail.com', '7405350854', 'wesrtdfyuhijkwserdtfhjkl', 'wesrdtfyghjkl;erdtfyghj', 'Ahmedabad', 'Gujarat', 380013, '', 'Shirt|Jeans|Jacket', '900|2000|5000', '25|3|1', 10000, '23546'),
(2, 'xdfcgvhb', 'sxdfcgvhb', 'jnzsdxcf@rtgh.tfgh', 'gvhbn', 'sxdcfvghbj', 'sxdfcgvhb', 'serdtfg', 'rdtfgy', 0, 'dfg', '7trdyfguhij', '345654', '10', 3456540, '1435079587'),
(3, 'sdfgh', 'dtf', 'ghj@rxcgvh.tdfgh', 'edrtfgyh', 'dxcfgvhbj', 'dxcfgvhb', 'jnd', 'fcgvhbnj', 0, 'mgvhbjn', '7trdyfguhij|6trdyfguhij', '345654|345654', '10|1', 3802194, '1435079897'),
(4, 'xcgvbn', 'fcgvb', 'nm@sdxfcgv.dtrfgh', 'edtfghj', 'dxfcgvhbn', 'dxfc', 'gvhb', 'dxfcgvhbj', 0, 'hb', '7trdyfguhij|6trdyfguhij|13Product', '345654|345654|5000', '10|1|1', 3807194, '1435079994'),
(5, 'esdfgh', 'dfghj', 'edrtfghj@dxfgv.trdfghj', 'edtfgh', 'j', 'dtfghbj', 'edtfghbj', 'dtfgvh', 0, 'vhbj', '7trdyfguhij|6trdyfguhij|13Product', '345654|345654|5000', '10|1|2', 3812194, '1435080041'),
(6, 'Jay', 'Parekh', 'vishalparekh26@gmail.com', '1234567890', 'w3ertyui', '4er6tyuiop', 'ertyuio', 'rtyuijkl', 0, 'drtfyghjk', '13Product', '5000', '2', 10000, '1435080563'),
(7, 'vishal', 'Parekh', 'vishalparekh26@gmail.com', '7405350854', 'I-404 Swaminarayan Park', 'Nava Vadaj', 'Ahmedabad', 'Gujarat', 380013, 'Vasant', '7trdyfguhij|8trdyfguhij|11Prdoduct', '345654|345654|3000', '1|1|1', 694308, '1435163808'),
(8, 'vishal', 'Parekh', 'vishalparekh26@gmail.com', '7405350854', 'I-404 Swaminarayan Park', 'Nava Vadaj', 'Ahmedabad', 'Gujarat', 380013, 'Vasant', '6trdyfguhij', '345654', '1', 345654, '1435314278'),
(9, 'Rachana', 'Kakadia', 'rachanakakadia95@gmail.com', '1234567890', 'Sachi Tower', 'Satellite', 'Surat', 'Gujarat', 35007, 'Vasant', '12Product', '2500', '1', 2500, '1435316768');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `category_id` int(100) NOT NULL,
  `product_extraimages` text NOT NULL,
  `no_of_times_viewed` int(100) NOT NULL,
  `posted_at` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_size`, `product_image`, `category_id`, `product_extraimages`, `no_of_times_viewed`, `posted_at`) VALUES
(1, '1-No-LEKHAK', '425', '', '5 x 4 x 6.75', '1-No-LEKHAK.JPG', 1, '', 26, ''),
(3, '1-No-SAI', '425', '', '5 x 4 x 7.25', '1-No-SAI.JPG', 5, '', 3, ''),
(4, '220', '250', '', '4 x 3 x 6', '220.JPG', 3, '', 3, ''),
(5, '221', '250', '', '4 x 3 x 6', '221.JPG', 1, '', 1, ''),
(6, '222', '250', '', '4 x 3 x 6', '222.JPG', 2, '', 1, ''),
(7, '348', '330', '', '4.75 x 4 x 5.25', '348.JPG', 1, '', 19, ''),
(9, '348', '330', '', '4.75 x 4 x 5.25', '348.JPG', 1, '', 23, ''),
(10, '1230', '80', '', '2.75 x 2.25 x 2.75', '1230.JPG', 1, '', 0, ''),
(11, '1232', '125', '', '3.25 x 2.75 x 3.50', '1232.JPG', 1, '', 0, ''),
(12, '1233', '95', '', '2.50 x 2.25 x 3.25', '1233.JPG', 1, '', 0, ''),
(13, '7501', '250', '', '4 x 3.75 x 5.25', '7501.JPG', 1, '', 2, ''),
(14, '71092', '95', '', '2.50 x 2.25 x 3.25', '71092.JPG', 6, '', 0, ''),
(15, '71093', '330', '', '5 x 4 x 6.50', '71093.JPG0', 6, '', 0, ''),
(16, '71261', '625', '', '5.50 x 3.50 x 8.25', '71261.JPG', 4, '', 0, ''),
(17, '71263', '250', '', '4 x 3 x 6', '', 4, '', 2, ''),
(18, '71266', '425', '', '5 x 4.50 x 6.75', '71266', 1, '', 0, ''),
(19, '71268', '5 x 4.50 x 6.75', '', '425', '71268.JPG', 3, '', 0, ''),
(20, '71272', '425', '', '5 x 4.50 x 7', '71272.JPG', 6, '', 0, ''),
(21, '71297', '250', '', '4 x 3 x 5', '71297.JPG', 1, '', 0, ''),
(22, '71298', '125', '', '3.25 x 2.75 x 3.50', '71298.JPG', 1, '', 0, ''),
(23, '71311', '330', '', '5 x 4 x 6.50', '71311.JPG', 6, '', 0, ''),
(24, '71366', '330', '', '4.75 x 4 x 5.25', '71366.JPG', 1, '', 0, ''),
(25, '71461', '330', '', '4.75 x 4 x 5.25', '71461.JPG', 1, '', 0, ''),
(26, 'KG-1', '250', '', '4 x 3.75 x 5.25', 'KG-1.JPG', 1, '', 0, ''),
(27, 'L-6', '250', '', '4 x 3 x6', 'L-6.JPG', 1, '', 3, ''),
(28, 'L-7', '250', '', '4 x 3 x6', 'L-7.JPG', 3, '', 0, ''),
(29, 'M-88', '80', '', '2.75 x 2.25 x 2.75', 'M-88.JPG', 1, '', 0, ''),
(30, 'M-98', '95', '', '2.50 x 2.25 x 3.25', 'M-98', 1, '', 4, ''),
(31, 'M-99', '95', '', '2.50 x 2.25 x 3.25', 'M-99.JPG', 1, '', 0, ''),
(32, 'N-14', '425', '', '5 x 4.50 x 6.75', 'N-14', 1, '', 0, ''),
(33, 'N-18', '250', '', '4 x 3.75 x 5', 'N-18.JPG', 1, '', 0, ''),
(34, 'N-21', '425', '', '5 x 4.50 x 6.75', 'N-21.JPG', 1, '', 0, ''),
(35, 'N-32', '250', '', '4 x 3.75 x 5', 'N-32.JPG', 1, '', 0, ''),
(36, 'O-No-sai', '250', '', '4 x 3 x6', 'O-No-sai.JPG', 5, '', 1, ''),
(37, 'S-102', '580', '', '5.75 x 5 x 6', 'S-102.JPG', 6, '', 0, ''),
(38, 'S-110', '625', '', '5.50 x 3.50 x 8.25', 'S-110.JPG', 4, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(100) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `chosen` varchar(255) NOT NULL,
  `posted_at` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `slide_name`, `caption`, `chosen`, `posted_at`) VALUES
(1, 'second-page-slider.jpg', 'srdtfgbhjn hjnkm,', 'yes', '1434558953'),
(2, 'slide-banner-02.jpg', 'sdfcgvhjnkml, dfghjk', 'yes', '1434558953'),
(3, 'vishal.jpg', 'sdfgvhbtry tuy ', 'no', '1434559008'),
(4, '4fyghbjknlm.jpg', 'tyf ytf t ', 'no', '1434559008'),
(5, 'slide-banner-03.jpg', 'f k tfu', 'yes', '1434559062'),
(6, 'vishal.jpg', 'ft t ftuk', 'no', '1434559062');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_id`, `phone_no`, `address_line1`, `address_line2`, `city`, `state`, `pincode`, `password`, `company_name`) VALUES
(1, 'Vishal', 'Parekh', 'vishalparekh26@gmail.com', '7405350854', 'I-404 Swaminarayan Park', 'Nava Vadaj', 'Ahmedabad', 'Gujarat', 380013, 'vishal', 'Vasant'),
(2, 'Jay', 'Parekh', 'jay@gmail.com', '7405350854', 'I-404 Swaminarayan Park', 'Nava Vadaj', 'Ahmedabad', 'Gujarat', 380013, 'jay1', 'Vasant'),
(3, 'Irshad', 'Ansari', 'irshad.ans.786@gmail.com', '9933905698', 'IIT kharagpur', 'West Bengal', 'Satna', 'Madhya Pradesh', 485001, 'irshad@786', 'Vasant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
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
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `news_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
