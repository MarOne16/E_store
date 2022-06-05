-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 01:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_storeupdate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `psw` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `prenom`, `email`, `psw`) VALUES
(1, 'othmane', 'othmane@gmail.com', '123'),
(2, 'marwan', 'marwan@gmail.com', '123'),
(3, 'yassin', 'yassin@gmail.com', '123'),
(4, 'AbdulSamad', 'AbdulSamad@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `id_client` int(11) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_çolor` int(11) NOT NULL,
  `çolor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `invoice_amount` decimal(10,0) DEFAULT NULL,
  `invoice_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `category` varchar(11) DEFAULT NULL,
  `nom` varchar(30) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `color` varchar(11) DEFAULT NULL,
  `size` varchar(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_seller`, `category`, `nom`, `image`, `color`, `size`, `quantity`, `description`, `price`, `create_date`) VALUES
(1, 5, '1', 'bader', 'images/SD58sVXW/download (4).jpg', '1', '', 10, 'jlkjsidfouoiufoziuofziefzef', '1200', '2022-05-31 02:19:32'),
(2, 5, '1', 'bader', 'images/lrWV5voO/la5er11111111122222222222222222.png', '1', '', 10, 'jlkjsidfouoiufoziuofziefzef', '1200', '2022-05-31 02:50:52'),
(3, 0, 'electronics', 'bader', 'images/oSq8SZWC/download (4).jpg', 'black', 'S', 10, 'jlkjsidfouoiufoziuofziefzef', '1200', '2022-05-31 02:57:42'),
(4, 5, 'electronics', 'bader', 'images/h5SBfN1n/la5er11111111122222222222222222.png', 'black', 'S', 10, 'jlkjsidfouoiufoziuofziefzef', '1200', '2022-05-31 03:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `sellerstatus`
--

CREATE TABLE `sellerstatus` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellerstatus`
--

INSERT INTO `sellerstatus` (`id_status`, `status`) VALUES
(1, 'inProcess'),
(2, 'accepted'),
(3, 'rejected'),
(4, 'suspend'),
(5, 'banned');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_acount`
--

CREATE TABLE `sellers_acount` (
  `id_seller` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `datenaissance` date NOT NULL,
  `cin` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `cin_photo` varchar(100) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `id_status` int(11) DEFAULT 1,
  `createdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers_acount`
--

INSERT INTO `sellers_acount` (`id_seller`, `nom`, `prenom`, `datenaissance`, `cin`, `phone`, `photo`, `address`, `city`, `cin_photo`, `email`, `psw`, `id_status`, `createdate`) VALUES
(1, 'reguig	', 'othmane	', '4156-12-31', 'q445688', 710884423, 'hp.jpg	', 'lot elfirdaouss hay dakhla', 'khouribga', 'mac.jpeg', '	othmanereguig@gmail.com', '123', 5, NULL),
(2, 'yassin', 'yassin	', '0000-00-00', 'q166659', 710884423, 'nike.jpg', 'lot elfirdaouss hay dakhla', '	khouribga', '	mac.jpeg', '	yassin199@gmail', '123', 5, NULL),
(3, 'reguig	', 'othmane	', '4156-12-31', 'q445688', 710884423, 'hp.jpg	', 'lot elfirdaouss hay dakhla', 'khouribga', 'mac.jpeg', '	othmanereguig199@gmail.com', '123', 5, NULL),
(4, 'yassin', 'yassin	', '0000-00-00', 'q166659', 710884423, 'nike.jpg', 'lot elfirdaouss hay dakhla', '	khouribga', '	mac.jpeg', '	yassin2000@gmail', '123', 3, NULL),
(5, 'redwan', 'el mouhi', '1999-12-03', 'Q4569872', 2147483647, 'images (1).jpg', 'lot elfirdaouss hay dakhla', 'khouribga', 'Capture.PNG', 'redwan199@gmail.com', '123', 2, NULL),
(7, 'mohsine', 'mo7sine', '2003-10-20', 'q166654', 710884423, 'bes.png', 'lot elfirdaouss hay dakhla', 'khouribga', 'bes-removebg.png', 'mohsin1e99@gmail.com', '123', 2, NULL),
(8, 'reguig', 'othmane', '2012-12-05', 'Q4569872', 710884423, 'la5er11111111133333333333333.png', 'lot elfirdaouss hay dakhla', 'khouribga', 'download (4).jpg', 'othmanereguig4000@gmail.com', '123', 1, NULL),
(9, 'mohamed', 'othmane', '2013-11-11', 'Q4569872', 710884423, 'download (4).jpg', 'lot elfirdaouss hay dakhla', 'khouribga', 'download (4).jpg', 'mohamed199@gmail.com', '123', 1, NULL),
(10, 'bader', 'othmane', '2013-11-11', 'Q4569872', 710884423, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'bader199@gmail.com', '123', 1, '2022-05-25'),
(11, 'safaa', 'rahmani', '2013-11-11', 'Q4569872', 710884423, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'safaa199@gmail.com', '123', 1, '2022-05-25'),
(12, 'hoda', 'rahmani', '2013-11-11', 'Q4569872', 710884423, 'images//', 'lot elfirdaouss hay dakhla', 'khouribga', 'images//', 'hoda199@gmail.com', '123', 1, '2022-05-25'),
(13, 'fatima', 'rahmani', '2013-11-11', 'Q4569872', 710884423, 'images//', 'lot elfirdaouss hay dakhla', 'khouribga', 'images//', 'fatima199@gmail.com', '123', 1, '2022-05-25'),
(14, 'rahma', 'rahmani', '2013-11-11', 'Q4569872', 710884423, 'images//', 'lot elfirdaouss hay dakhla', 'khouribga', 'images//', 'rahma199@gmail.com', '123', 1, '2022-05-25'),
(15, 'zahra', 'rahmani', '2013-11-11', 'Q4569872', 710884423, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'zahra199@gmail.com', '123', 1, '2022-05-25'),
(16, 'wiaam', 'rahmani', '2013-11-11', 'Q4569872', 710884423, 'images//', 'lot elfirdaouss hay dakhla', 'khouribga', 'images//', 'wiaam199@gmail.com', '123', 1, '2022-05-25'),
(17, 'lina', 'rahmani', '2013-11-11', 'Q4569872', 710884423, 'images//', 'lot elfirdaouss hay dakhla', 'khouribga', 'images//', 'lina199@gmail.com', '123', 1, '2022-05-25'),
(18, 'rachida', 'rahmani', '2013-11-11', 'Q4569872', 710884423, '', 'lot elfirdaouss hay dakhla', 'khouribga', 'download (4).jpg', 'rachida199@gmail.com', '123', 1, '2022-05-25'),
(19, 'lotfi', 'lotfi', '2000-10-20', 'Q4569872', 710884455, '', 'lot elfirdaouss hay dakhla', 'khouribga', 'download (4).jpg', 'lotfi199@gmail.com', '123', 1, '2022-05-31'),
(20, 'rayhana', 'rayhana', '2000-12-24', 'Q166654', 710883465, '', 'lot elfirdaouss hay dakhla', 'khouribga', 'download (4).jpg', 'rayhana199@gmail.com', '123', 1, '2022-05-31'),
(21, 'bella', 'bella', '2000-02-02', 'Q4569872', 710859462, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'bella199@gmail.com', '123', 1, '2022-05-31'),
(22, 'sofya', 'sofya', '2010-07-08', 'Q4569872', 710883564, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'sofiya199@gmail.com', '123', 1, '2022-05-31'),
(23, 'reguig', 'othmane', '2020-12-15', 'Q4569872', 710884423, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'BALBO199@gmail.com', '123', 1, '2022-05-31'),
(24, 'reguig', 'othmane', '2000-10-10', 'Q4569872', 710884423, '', 'lot elfirdaouss hay dakhla', 'khouribga', '', 'falcon199@gmail.com', '123', 1, '2022-05-31'),
(25, 'safya', 'safya', '2015-05-15', 'Q4569872', 710884423, NULL, 'lot elfirdaouss hay dakhla', 'khouribga', NULL, 'safya199@gmail.com', '123', 1, '2022-05-31'),
(26, 'marlin', 'marlin', '1980-08-08', 'Q4569872', 710884423, NULL, 'lot elfirdaouss hay dakhla', 'khouribga', NULL, 'marlin@gmail.com', '123', 1, '2022-05-31'),
(27, 'reguig', 'othmane', '2003-10-20', 'Q4569872', 710884423, 'selerimage/TE6SPtLJ/download (4).jpg', 'lot elfirdaouss hay dakhla', 'khouribga', 'selerimage/MEEEFtNJ/download (4).jpg', 'othmanereguig199@gmail.com', '123', 1, '2022-06-01'),
(28, 'barbara', 'barbara', '2000-10-10', '', 710884423, 'selerimage/PJaw3rzJ/la5er11111111133333333333333.png', 'lot elfirdaouss hay dakhla', 'khouribga', 'selerimage/o4R3A2iK/la5er11111111133333333333333.png', 'barbara199@gmail.com', '123', 1, '2022-06-01'),
(29, 'bradli', 'bradli', '2002-10-10', 'T989562', 524548788, 'selerimage/JRSLts9s/35779915-ff8f-4b77-84d5-1f2d7889b27c.jpg', 'lot elfirdaouss hay dakhla', 'khouribga', 'selerimage/Gc1oKNHw/35779915-ff8f-4b77-84d5-1f2d7889b27c.jpg', 'bradli199@gmail.com', '123', 1, '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_çolor`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_seller` (`id_seller`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `sellerstatus`
--
ALTER TABLE `sellerstatus`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `sellers_acount`
--
ALTER TABLE `sellers_acount`
  ADD PRIMARY KEY (`id_seller`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellers_acount`
--
ALTER TABLE `sellers_acount`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_info`
--
ALTER TABLE `client_info`
  ADD CONSTRAINT `client_info_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `sellers_acount` (`id_seller`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `sellers_acount`
--
ALTER TABLE `sellers_acount`
  ADD CONSTRAINT `sellers_acount_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `sellerstatus` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
