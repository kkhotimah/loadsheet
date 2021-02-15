-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2020 at 07:04 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loadsheet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `cargo_pergi` int(11) NOT NULL,
  `cargo_pulang` int(11) NOT NULL,
  `id_loadsheet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `cargo_pergi`, `cargo_pulang`, `id_loadsheet`) VALUES
(1, 40, 54, 15),
(2, 40, 54, 16),
(3, 0, 0, 17),
(4, 0, 0, 18),
(5, 0, 0, 19),
(6, 0, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `loadsheet`
--

CREATE TABLE `loadsheet` (
  `id_loadsheet` int(11) NOT NULL,
  `no_of_destination` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `id_pilot` int(11) NOT NULL,
  `id_copilot` int(11) NOT NULL,
  `id_pesawat` int(11) NOT NULL,
  `id_penerbangan_pergi` int(11) NOT NULL,
  `id_penerbangan_pulang` int(11) NOT NULL,
  `fuel` int(11) NOT NULL,
  `oat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loadsheet`
--

INSERT INTO `loadsheet` (`id_loadsheet`, `no_of_destination`, `date`, `customer`, `id_pilot`, `id_copilot`, `id_pesawat`, `id_penerbangan_pergi`, `id_penerbangan_pulang`, `fuel`, `oat`) VALUES
(15, 1, '2007-06-20', 'khusnul', 5, 7, 1, 1, 2, 1800, 0),
(16, 2, '2008-06-20', 'PHE ONWJ', 5, 7, 1, 1, 2, 1800, 30),
(17, 0, '2005-10-20', 'a', 1, 1, 1, 1, 1, 0, 0),
(18, 5, '2005-10-20', 'a', 7, 4, 4, 1, 1, 0, 0),
(19, 5, '2005-10-20', 'a', 1, 1, 1, 1, 1, 1700, 0),
(20, 0, '2020-10-05', 'a', 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mtow`
--

CREATE TABLE `mtow` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `mtow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtow`
--

INSERT INTO `mtow` (`id`, `location`, `mtow`) VALUES
(1, 'PCABE', 11700),
(2, 'HALIM', 11700),
(3, 'MERAK', 11700),
(4, 'FOXTROT', 11450),
(5, 'SOEHANAH', 11450),
(6, 'FLYOVER', 11450),
(7, 'CAKRA', 11450),
(8, 'YYA', 11450),
(9, 'STORK', 11450);

-- --------------------------------------------------------

--
-- Table structure for table `penerbangan`
--

CREATE TABLE `penerbangan` (
  `id` int(11) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `via` varchar(20) NOT NULL,
  `ke` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbangan`
--

INSERT INTO `penerbangan` (`id`, `dari`, `via`, `ke`) VALUES
(1, 'PCABE', 'TIDUNG', 'STORK'),
(2, 'STORK', 'DIRECT', 'PCABE');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `c1a` int(11) NOT NULL,
  `c1b` int(11) NOT NULL,
  `c1c` int(11) NOT NULL,
  `c1d` int(11) NOT NULL,
  `c2a` int(11) NOT NULL,
  `c2b` int(11) NOT NULL,
  `c2c` int(11) NOT NULL,
  `c2d` int(11) NOT NULL,
  `c3a` int(11) NOT NULL,
  `c3b` int(11) NOT NULL,
  `c3c` int(11) NOT NULL,
  `c3d` int(11) NOT NULL,
  `kode_terbang` varchar(50) NOT NULL,
  `id_loadsheet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `c1a`, `c1b`, `c1c`, `c1d`, `c2a`, `c2b`, `c2c`, `c2d`, `c3a`, `c3b`, `c3c`, `c3d`, `kode_terbang`, `id_loadsheet`) VALUES
(11, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 'pergi', 15),
(12, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 'pulang', 15),
(13, 95, 0, 89, 97, 75, 74, 64, 53, 0, 0, 0, 0, 'pergi', 16),
(14, 95, 110, 57, 97, 75, 51, 83, 53, 0, 0, 0, 0, 'pulang', 16),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pergi', 17),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pulang', 17),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pergi', 18),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pulang', 18),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pergi', 19),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pulang', 19),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pergi', 20),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'pulang', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesawat`
--

INSERT INTO `pesawat` (`id`, `name`, `weight`) VALUES
(1, 'PDF', 7839),
(2, 'PUW', 7750),
(4, 'PUE', 6963);

-- --------------------------------------------------------

--
-- Table structure for table `pilot`
--

CREATE TABLE `pilot` (
  `id` int(11) NOT NULL,
  `nick_name` varchar(10) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilot`
--

INSERT INTO `pilot` (`id`, `nick_name`, `weight`) VALUES
(1, 'BRN', 75),
(4, 'AND', 70),
(5, 'RUD', 80),
(7, 'JOF', 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@example.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `waypoint`
--

CREATE TABLE `waypoint` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `heading` varchar(10) NOT NULL,
  `distance` double NOT NULL,
  `penerbangan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waypoint`
--

INSERT INTO `waypoint` (`id`, `name`, `heading`, `distance`, `penerbangan_id`) VALUES
(1, 'PCABE', '0', 0, 1),
(2, 'ABMSNY', '036', 7, 1),
(3, 'STORK', '0', 0, 2),
(4, 'POMAS', '265', 45, 2),
(5, 'POMAS', '040', 5, 1),
(6, 'ABMSNY', '222', 5, 2),
(7, 'PEDAM', '347', 13, 1),
(8, 'P.TIDUNG', '295', 23, 1),
(9, 'P.HARAPAN', '027', 10, 1),
(10, 'STORK', '113', 69, 1),
(11, 'PCABE', '217', 7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loadsheet`
--
ALTER TABLE `loadsheet`
  ADD PRIMARY KEY (`id_loadsheet`);

--
-- Indexes for table `mtow`
--
ALTER TABLE `mtow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbangan`
--
ALTER TABLE `penerbangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pilot`
--
ALTER TABLE `pilot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `waypoint`
--
ALTER TABLE `waypoint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerbangan_id` (`penerbangan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loadsheet`
--
ALTER TABLE `loadsheet`
  MODIFY `id_loadsheet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mtow`
--
ALTER TABLE `mtow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penerbangan`
--
ALTER TABLE `penerbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pilot`
--
ALTER TABLE `pilot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waypoint`
--
ALTER TABLE `waypoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
