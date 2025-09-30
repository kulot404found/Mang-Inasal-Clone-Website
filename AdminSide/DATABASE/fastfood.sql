
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'FAST MEAL'),
(5, 'SIDE DISH'),
(6, 'DESSERTS'),
(7, 'BEVERAGES');



CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`) VALUES
(14, 4, 'Chicken Sandwich ', 90, 'upload/Chicken Sandwich_1639237538.png'),
(15, 4, 'Hamburger', 70, 'upload/Hamburger_1639237617.png'),
(18, 7, 'Bottled Water', 25, 'upload/Bottled Water_1639224773.png'),
(19, 7, 'Iced Tea', 30, 'upload/Iced Tea_1639224837.png'),
(20, 6, 'Pancakes', 75, 'upload/Pancakes_1639222870.png'),
(21, 4, 'Fried Chicken with Rice', 70, 'upload/Fried Chicken_1639237577.png'),
(22, 4, 'Fish Sandwich ', 110, 'upload/Fish Sandwich_1639237561.png'),
(23, 7, 'Orange Juice', 40, 'upload/Orange Juice_1639224726.png'),
(26, 6, 'Brownies', 50, 'upload/Brownies_1639222921.png'),
(27, 4, 'Hash Brown', 110, 'upload/Hash Brown_1639237648.png'),
(28, 5, 'French Fries', 55, 'upload/French Fries_1639318054.png'),
(29, 5, 'Macaroni Salad', 40, 'upload/Macaroni Salad_1639318197.png'),
(30, 5, 'Onion Rings ', 65, 'upload/Onion Rings_1639318263.png');



CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(11, 'Cyn', 55, '2021-12-12 00:26:42');


CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 3),
(17, 10, 16, 1),
(18, 10, 23, 1),
(19, 11, 16, 1);


ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);


ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);


ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);


ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;


ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

