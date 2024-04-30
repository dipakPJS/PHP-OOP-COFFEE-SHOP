-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 02:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `email`, `admin_password`, `created_at`) VALUES
(5, 'turi', 'turi@gmail.com', '$2y$10$/.wdN4CTUx2s8CVkkNw38.skNDr7/R53rF0OMWw9Ft.1Dbxy4cXq6', '2024-04-25 10:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL DEFAULT '0',
  `last_name` varchar(200) NOT NULL DEFAULT '0',
  `booking_date` varchar(200) NOT NULL,
  `booking_time` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `messages` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `booking_date`, `booking_time`, `phone`, `messages`, `status`, `user_id`, `created_at`) VALUES
(10, 'Dipak', 'Pokharel', '4/27/2024', '12:30am', '9867216630', 'Nam adipiscing. Nam adipiscing. Quisque id mi.', 'Confirmed', 4, '2024-04-26 00:55:58'),
(11, 'Dipak', 'Pokharel', '4/29/2024', '1:00am', '9867216630', 'Etiam vitae tortor. Duis leo. Curabitur ullamcorper ultricies nisi.', 'Done', 4, '2024-04-26 00:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `product_size` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_image`, `price`, `product_size`, `product_id`, `product_description`, `product_quantity`, `user_id`, `created_at`) VALUES
(35, 'Coffee2', 'coffee2.jpg', 13, 'Medium', 25, 'Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Ut tincidunt tincidunt erat. Phasellus consectetuer vestibulum elit.', 1, 4, '2024-04-26 11:26:42'),
(36, 'Cake2', 'cake2.jpg', 150, 'Small', 30, 'Sed a libero. Praesent venenatis metus at tortor pulvinar varius.', 1, 4, '2024-04-26 11:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `states` varchar(200) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zip_code` int(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `current_status` varchar(200) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `states`, `street_address`, `city`, `zip_code`, `phone`, `email`, `user_id`, `current_status`, `total_price`, `created_at`) VALUES
(6, 'Dipak', 'Pokharel', 'Bagmati Province', 'Tilottama-13', 'Butwal', 32903, '9867216630', 'dpak.pokharel@gmail.com', 4, 'Delivered', 18, '2024-04-24 19:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `description`, `price`, `type`, `created_at`) VALUES
(20, 'Coffee', 'coffee.jpg', 'Sed hendrerit. Pellentesque ut neque. Curabitur ullamcorper ultricies nisi.', '13', 'drink', '2024-04-26 01:18:17'),
(25, 'Coffee2', 'coffee2.jpg', 'Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Ut tincidunt tincidunt erat. Phasellus consectetuer vestibulum elit.', '13', 'drink', '2024-04-26 11:01:44'),
(26, 'Coffee3', 'coffee3.jpg', 'Etiam feugiat lorem non metus. Phasellus dolor.', '25', 'drink', '2024-04-26 11:02:19'),
(27, 'Cake', 'cake1.jpg', 'Proin magna. Vestibulum fringilla pede sit amet augue. Vivamus euismod mauris.', '25', 'dessert', '2024-04-26 11:02:46'),
(30, 'Cake2', 'cake2.jpg', 'Sed a libero. Praesent venenatis metus at tortor pulvinar varius.', '150', 'dessert', '2024-04-26 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `user_name`, `created_at`) VALUES
(9, 'Phasellus consectetuer vestibulum elit. Vestibulum volutpat pretium libero. Praesent nonummy mi in odio.', 'putho', '2024-04-25 00:32:31'),
(10, 'Suspendisse feugiat. Vestibulum dapibus nunc ac augue. Cras ultricies mi eu turpis hendrerit fringilla. Etiam imperdiet imperdiet orci. Curabitur nisi.', 'turi', '2024-04-25 00:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_password`, `created_at`) VALUES
(4, 'putho', 'putho@gmail.com', '$2y$10$nJKfVlc43DLurM/IH.Jpz.dD0dh.wTTGp0AXXWwdeHfmtcNgBeasO', '2024-04-17 12:59:12'),
(5, 'turi', 'turi@gmail.com', '$2y$10$/.wdN4CTUx2s8CVkkNw38.skNDr7/R53rF0OMWw9Ft.1Dbxy4cXq6', '2024-04-17 13:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
