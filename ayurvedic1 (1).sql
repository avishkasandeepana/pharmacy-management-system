-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 07:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayurvedic1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `cus_id` varchar(64) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `cus_email` varchar(256) NOT NULL,
  `cus_pnumber` varchar(150) NOT NULL,
  `cus_address` varchar(256) NOT NULL,
  `reguler_discount` varchar(256) NOT NULL,
  `cus_note` varchar(256) NOT NULL,
  `cus_image` varchar(256) NOT NULL,
  `cus_t_amount` varchar(256) NOT NULL,
  `cus_t_discount` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `cus_id`, `customer_name`, `cus_email`, `cus_pnumber`, `cus_address`, `reguler_discount`, `cus_note`, `cus_image`, `cus_t_amount`, `cus_t_discount`) VALUES
(11, 'C0003445', 'sdfsf', 'banda123@gmail.com', '5', '35343', '4354', '534', '', '454343', '354'),
(12, 'C7028719', 'sunda', '4645@gmail.com', '4456', '45', '45645', '4', '', '64564', '4564'),
(13, 'C8736687', 'sunda', 'banda123@gmail.com', '21212', 'sfdsdfdf', '12', '221', '', '121', '21');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `product_name` varchar(64) DEFAULT NULL,
  `strength` varchar(64) DEFAULT NULL,
  `form` varchar(64) DEFAULT NULL,
  `trade_price` varchar(64) DEFAULT NULL,
  `box_price` varchar(64) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `product_image` blob DEFAULT NULL,
  `side_effect` varchar(512) DEFAULT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `company_name`, `product_name`, `strength`, `form`, `trade_price`, `box_price`, `expire_date`, `product_image`, `side_effect`, `quantity`) VALUES
(68, 'siddalepa', 'panadollll', 'dfsfdf', 'Inhaler', '6454641', '9845', '2023-06-29', NULL, 'sdfdfdsfssdf', 0),
(72, 'aadsadad', 'dasdadsa', 'asd54', 'Tablet', '45', '', '2023-07-26', NULL, 'ghjkh', 0),
(73, '56464', '564564', '45645', 'Tablet', '456', '', '2023-12-27', NULL, '', 0),
(74, 'aluth', 'asamodagam', '45', 'Tablet', '456', '', '2023-06-22', NULL, '', 125),
(75, 'check', '456456', '45646', 'Tablet', '56464', '465', '2023-06-29', NULL, '', 45);

-- --------------------------------------------------------

--
-- Table structure for table `medi_category`
--

CREATE TABLE `medi_category` (
  `id` int(255) NOT NULL,
  `category_code` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medi_category`
--

INSERT INTO `medi_category` (`id`, `category_code`, `category_name`, `note`, `status`) VALUES
(3, '', 'cream', 'this is a cream', 0),
(4, '', 'tablet', 'this is a tablet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(255) NOT NULL,
  `sales_date` date NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_note` varchar(255) NOT NULL,
  `s_phone` varchar(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_img` varchar(255) NOT NULL,
  `s_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `s_id`, `s_name`, `s_email`, `s_note`, `s_phone`, `s_address`, `s_img`, `s_status`) VALUES
(45, 'S1782430', 'banda ', '', '', '', '', '', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(14) NOT NULL,
  `e_id` varchar(50) NOT NULL,
  `em_name` varchar(128) NOT NULL,
  `em_role` enum('salesman','admin','manager') DEFAULT 'salesman',
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `em_password` varchar(128) NOT NULL,
  `em_address` varchar(200) NOT NULL,
  `em_email` varchar(128) NOT NULL,
  `em_contact` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `e_id`, `em_name`, `em_role`, `status`, `em_password`, `em_address`, `em_email`, `em_contact`) VALUES
(1, '', 'admin', 'salesman', 'ACTIVE', '123', '155/jayavardhanapura kotte', '123', '01254658912');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medi_category`
--
ALTER TABLE `medi_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `medi_category`
--
ALTER TABLE `medi_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
