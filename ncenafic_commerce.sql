-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2020 at 05:35 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncenafic_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `adminid` int(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminid`, `email`, `pass`) VALUES
(1, 'magic@magic.com', 'test@2020');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(100) NOT NULL,
  `category` varchar(500) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `category`, `status`) VALUES
(3, 'Tables and Desks', ''),
(2, 'Decor', ''),
(4, 'Beds', ''),
(5, 'Seats and Chairs', ''),
(6, 'Shelves and Cabinets', ''),
(7, 'Sofas', ''),
(8, 'Dining Tables', ''),
(9, 'Table Lamps', ''),
(10, 'Dressers', ''),
(11, 'Chests', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders1`
--

CREATE TABLE `orders1` (
  `tableid` int(100) NOT NULL,
  `productid` int(100) NOT NULL,
  `productname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `customername` varchar(500) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `location` varchar(500) NOT NULL,
  `productprice` varchar(100) NOT NULL,
  `imagelink` text NOT NULL,
  `productdescription` text NOT NULL,
  `visitorid` varchar(100) NOT NULL,
  `productstatus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders1`
--

INSERT INTO `orders1` (`tableid`, `productid`, `productname`, `email`, `customername`, `phone`, `location`, `productprice`, `imagelink`, `productdescription`, `visitorid`, `productstatus`) VALUES
(1, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '20200916020524895966131', ''),
(2, 4, 'Pine Office Desk', '', '', '', '', '200', 'uploads/20200919112305desk1.jpg', ' Pine Office Desk. Shiny and classy.', '20200916020524895966131', ''),
(3, 2, 'French Bed with Flare', '', '', '', '', '179', 'uploads/20200919112035bed2.jpg', ' This french bed is 4 by 6 in size. It\'s the best for you.', '202009191142534046861209', ''),
(4, 6, 'Office Set-Desk and 3 chairs', '', '', '', '', '450', 'uploads/20200919112502desk3.jpg', ' This is all what you need to set your office.', '202009191142534046861209', ''),
(5, 1, 'Mahogany Bed 4 by 6', '', '', '', '', '97', 'uploads/20200919111807bed1.jpg', ' This is a Mahogany bed. The best for you.', '202009191210526498528852', 'removed'),
(6, 5, 'Executive Desk', '', '', '', '', '300', 'uploads/20200919112405desk2.jpg', ' This is best for executives.', '202009191223155700061412', ''),
(7, 4, 'Pine Office Desk', '', '', '', '', '200', 'uploads/20200919112305desk1.jpg', ' Pine Office Desk. Shiny and classy.', '202009191223155700061412', ''),
(8, 6, 'Office Set-Desk and 3 chairs', '', '', '', '', '450', 'uploads/20200919112502desk3.jpg', ' This is all what you need to set your office.', '20200919121756248024837', ''),
(9, 5, 'Executive Desk', '', '', '', '', '300', 'uploads/20200919112405desk2.jpg', ' This is best for executives.', '20200919121756248024837', ''),
(10, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '20200919121756248024837', ''),
(11, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '20200919065636892918950', ''),
(12, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '20200919065636892918950', ''),
(13, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '20200919065636892918950', ''),
(14, 6, 'Office Set-Desk and 3 chairs', '', '', '', '', '450', 'uploads/20200919112502desk3.jpg', ' This is all what you need to set your office.', '202009201039142263981597', ''),
(15, 4, 'Pine Office Desk', '', '', '', '', '200', 'uploads/20200919112305desk1.jpg', ' Pine Office Desk. Shiny and classy.', '20200920103925831894285', ''),
(16, 1, 'Mahogany Bed 4 by 6', '', '', '', '', '97', 'uploads/20200919111807bed1.jpg', ' This is a Mahogany bed. The best for you.', '202009201039369866671388', ''),
(17, 5, 'Executive Desk', '', '', '', '', '300', 'uploads/20200919112405desk2.jpg', ' This is best for executives.', '202009201039552678125135', ''),
(18, 2, 'French Bed with Flare', '', '', '', '', '179', 'uploads/20200919112035bed2.jpg', ' This french bed is 4 by 6 in size. It\'s the best for you.', '202009201040022747554357', ''),
(19, 6, 'Office Set-Desk and 3 chairs', '', '', '', '', '450', 'uploads/20200919112502desk3.jpg', ' This is all what you need to set your office.', '20200920083733413542797', ''),
(20, 5, 'Executive Desk', '', '', '', '', '300', 'uploads/20200919112405desk2.jpg', ' This is best for executives.', '20200920083733413542797', ''),
(21, 4, 'Pine Office Desk', '', '', '', '', '200', 'uploads/20200919112305desk1.jpg', ' Pine Office Desk. Shiny and classy.', '20200920083733413542797', ''),
(22, 4, 'Pine Office Desk', '', '', '', '', '200', 'uploads/20200919112305desk1.jpg', ' Pine Office Desk. Shiny and classy.', '202009201040394530748903', ''),
(23, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '202009201040394530748903', ''),
(24, 1, 'Mahogany Bed 4 by 6', '', '', '', '', '97', 'uploads/20200919111807bed1.jpg', ' This is a Mahogany bed. The best for you.', '202009201040394530748903', ''),
(25, 4, 'Pine Office Desk', '', '', '', '', '200', 'uploads/20200919112305desk1.jpg', ' Pine Office Desk. Shiny and classy.', '202009201041137455033046', ''),
(26, 3, 'Slumber Bed', '', '', '', '', '129', 'uploads/20200919112141bed3.jpg', ' This is a slumber bed. For a good night\'s sleep.', '202009201041137455033046', ''),
(27, 2, 'French Bed with Flare', '', '', '', '', '179', 'uploads/20200919112035bed2.jpg', ' This french bed is 4 by 6 in size. It\'s the best for you.', '202009201041137455033046', ''),
(28, 6, 'Office Set-Desk and 3 chairs', '', '', '', '', '450', 'uploads/20200919112502desk3.jpg', ' This is all what you need to set your office.', '202009191204532052082913', ''),
(29, 9, 'The comfy 3 sitter sofa', '', '', '', '', '150000', 'uploads/20200921025032seat4.PNG', ' The comfy seat', '202009191204532052082913', 'removed'),
(30, 10, 'White Italian Stretch seat', '', '', '', '', '230000', 'uploads/20200921025156seat5.PNG', ' White Italian Stretch seat', '202009191204532052082913', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders2`
--

CREATE TABLE `orders2` (
  `orderid` int(100) NOT NULL,
  `orderstatus` varchar(100) NOT NULL,
  `time` varchar(200) NOT NULL,
  `timecode` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `ordertotal` varchar(100) NOT NULL,
  `grandtotal` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `town` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `paymentoption` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders2`
--

INSERT INTO `orders2` (`orderid`, `orderstatus`, `time`, `timecode`, `details`, `ordertotal`, `grandtotal`, `firstname`, `lastname`, `email`, `phone`, `town`, `address`, `paymentoption`) VALUES
(1, '', '', '', ' <p> 1. Product ID 3 Product name: Slumber Bed Product Price: 129</p><p> 2. Product ID 4 Product name: Pine Office Desk Product Price: 200</p>', '329', '429', 'Test', 'Testlast', 'lastinging@teste.com', '5654', 'Orlando', '12340 Boggy Creek Road', 'ondelivery'),
(2, '', '', '', ' <p> 1. Product ID 2 Product name: French Bed with Flare Product Price: 179</p><p> 2. Product ID 6 Product name: Office Set-Desk and 3 chairs Product Price: 450</p>', '629', '729', 'Juz', 'June', 'junejuz@gmail.com', '4353', 'Los Angles', '23 Los Angels Fourth Stree', 'ondelivery'),
(3, '', '', '', ' <p> 1. Product ID 6 Product name: Office Set-Desk and 3 chairs Product Price: 450</p><p> 2. Product ID 5 Product name: Executive Desk Product Price: 300</p><p> 3. Product ID 3 Product name: Slumber Bed Product Price: 129</p>', '879', '979', 'rohan', 'kakkad', 'rohankakkad34@gmail.com', '412786198', 'fawkner', '4, moray street', 'ondelivery'),
(4, '', '', '', ' <p> 1. Product ID 3 Product name: Slumber Bed Product Price: 129</p><p> 2. Product ID 3 Product name: Slumber Bed Product Price: 129</p><p> 3. Product ID 3 Product name: Slumber Bed Product Price: 129</p>', '387', '487', 'Eddly', 'Ethan', 'eddly@gmail.com', '3407321598', 'Conacry', '456-743566', 'ondelivery'),
(5, '', '', '', ' <p> 1. Product ID 6 Product name: Office Set-Desk and 3 chairs Product Price: 450</p><p> 2. Product ID 5 Product name: Executive Desk Product Price: 300</p><p> 3. Product ID 4 Product name: Pine Office Desk Product Price: 200</p>', '950', '1050', 'rohan', 'kakkad', 'rohankakkad34@gmail.com', '412786198', 'fawkner', '4, moray street', 'paynow');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(100) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `offerprice` varchar(100) NOT NULL,
  `imagelink` text NOT NULL,
  `extraimages` text NOT NULL,
  `availability` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `productcondition` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `description`, `price`, `offerprice`, `imagelink`, `extraimages`, `availability`, `category`, `status`, `productcondition`) VALUES
(1, 'Mahogany Bed 4 by 6', ' This is a Mahogany bed. The best for you.', '100', '97', 'uploads/20200919111807bed1.jpg', '', '', 'Beds', '', 'new'),
(2, 'French Bed with Flare', ' This french bed is 4 by 6 in size. It\'s the best for you.', '200', '179', 'uploads/20200919112035bed2.jpg', '', '', 'Beds', '', 'new'),
(3, 'Slumber Bed', ' This is a slumber bed. For a good night\'s sleep.', '134', '129', 'uploads/20200919112141bed3.jpg', '', '', 'Beds', '', 'new'),
(4, 'Pine Office Desk', ' Pine Office Desk. Shiny and classy.', '230', '200', 'uploads/20200919112305desk1.jpg', '', '', 'Tables and Desks', '', 'new'),
(5, 'Executive Desk', ' This is best for executives.', '', '300', 'uploads/20200919112405desk2.jpg', '', '', 'Tables and Desks', '', 'new'),
(6, 'Office Set-Desk and 3 chairs', ' This is all what you need to set your office.', '500', '450', 'uploads/20200919112502desk3.jpg', '', '', 'Tables and Desks', '', 'new'),
(7, 'Seat and Play', ' Sit and play', '100000', '98000', 'uploads/20200921022228sofa1.PNG', '', '', 'Sofas', '', 'featured'),
(8, 'Kingly seat', ' Second hand', '210000', '200000', 'uploads/20200921024621seat3.PNG', '', '', 'Sofas', '', 'second_hand'),
(9, 'The comfy 3 sitter sofa', ' The comfy seat', '', '150000', 'uploads/20200921025032seat4.PNG', '', '', 'Sofas', '', 'new'),
(10, 'White Italian Stretch seat', ' White Italian Stretch seat', '250000', '230000', 'uploads/20200921025156seat5.PNG', '', '', 'Seats and Chairs', '', 'featured'),
(11, 'Executive Black Seat', ' Executive  Executive Black Seat Executive Black Seat Executive Black Seat Black Seat', '300000', '245000', 'uploads/20200921025312seat6.PNG', '', '', 'Seats and Chairs', '', 'second_hand'),
(12, 'Maroon Let\'s Converse Sofa', ' Maroon Let\'s Converse Sofa', '', '150000', 'uploads/20200921025422seat7.PNG', '', '', 'Sofas', '', 'new'),
(13, 'Next Generation 3 seater', ' Next Generation 3 seater', '340000', '200000', 'uploads/20200921025522sofa1.PNG', '', '', 'Sofas', '', 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `orders1`
--
ALTER TABLE `orders1`
  ADD PRIMARY KEY (`tableid`);

--
-- Indexes for table `orders2`
--
ALTER TABLE `orders2`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `adminid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders1`
--
ALTER TABLE `orders1`
  MODIFY `tableid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders2`
--
ALTER TABLE `orders2`
  MODIFY `orderid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
