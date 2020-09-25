-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 03:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `nomor_meja` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meja_id` int(11) NOT NULL,
  `jumlah_pesanan` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`gambar`, `nama`, `harga`, `id`, `admin_id`) VALUES
('product-11.jpg', 'Italian Beef with Sour Cream', 60000, 5, 1),
('product-51.jpg', 'Scallops', 80000, 6, 1),
('product-61.jpg', 'Toasted Bread with Strawberry', 35000, 7, 1),
('carrot-cake1.jpg', 'carrot cake', 40000, 8, 1),
('food-photography-french-toast-nicole-young1.jpg', 'Lamicho Cake', 80000, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `image`, `password`, `role_id`, `date_created`) VALUES
(1, 'Thari Annisa', 'thari@gmail.com', 'profilcewek.jpg', '$2y$10$OCB6ZCzO9NQmd30Wcco7TukzT2yr1h2yIE073AjPOBkEqFu8Mvm8q', 1, 1557848896),
(2, 'Aqil Fiqran', 'aqil@gmail.com', 'pictures1.jpg', '$2y$10$W5H6RTGfDwPWyvKoU91LqOMWl.kbaot6VqyzStJ9U4M/KEIpqmkiq', 1, 1557938672),
(3, 'putra', 'putra@gmail.com', 'default.jpg', '$2y$10$E1xEXDLnmaG5TqGbhTd1SOMlTu.4PxUSHVGS1e8wzKq/Kw.QItcka', 2, 1557895664),
(4, 'Teddy Alfa Edison', 'teddy@gmail.com', 'default.jpg', '$2y$10$fzIVcKIjj6myo9EA1.T7MextrEK0o.KGWI8hvo50E1JghVCEhrUnq', 1, 1557937933),
(5, 'Riftha Mudzilla', 'riftha@gmail.com', 'default.jpg', '$2y$10$tU1GS.yssXx0zUIqyqD2b.UYExhLIIXZzZwz2ydjzsCPhlev0Q6de', 1, 1557937960),
(6, 'Arinda Febriyola', 'arinda@gmail.com', 'default.jpg', '$2y$10$iU7di04AkYvcmySeW9rCsOjckcOkrB5RtSNCanMNJRYBY7bU.YnmK', 1, 1557937987),
(7, 'abi farhan', 'abi@gmail.com', 'default.jpg', '$2y$10$ZHCb7CC7oQUAdxlAIN5oYesV4BM9Us.004KUq57yPBwMAUUwp/iHG', 2, 1558339413),
(8, 'mumud', 'mumud@gmail.com', 'default.jpg', '$2y$10$SF3xaLrRLAOskMpo2SEsR..oJpPrtJfN/ofnQ9.L1rx5xxeBk43Uy', 2, 1558412030),
(9, 'miftah', 'miftah@gmail.com', 'default.jpg', '$2y$10$f2NPjegTLNPy4XyK8DKKYeRht1Uv7lkG2v.hgen7MxrAYqEANEtQC', 2, 1558416584),
(10, 'indra azhari', 'indra@gmail.com', 'default.jpg', '$2y$10$XyVR/KIHtRdG.c9sJyJsbuNGCBAT8gqtDzgra.Ay/hgmH.HG73DmO', 2, 1558434183),
(11, 'aca', 'aca@gmail.com', 'default.jpg', '$2y$10$y3/qtlIXQ52EzexdD9fVLe8yUyIHZJX5cZCfrxL6Aa08orR0.g4HS', 2, 1558434240),
(12, 'maulana', 'maulana@gmail.com', 'default.jpg', '$2y$10$Pl6/64Y3Yk.Tsf7sHcWKZey6TzQE71LjBw6YPULfa6U/RvF0Drboe', 2, 1558960525);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
