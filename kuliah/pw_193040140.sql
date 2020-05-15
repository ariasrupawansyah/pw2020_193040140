-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 04:21 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_193040140`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nrp` char(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Sandhika Galih', '043040023', 'sandhikagalih@unpas.ac.id', 'Teknik Informatika', 'sandhikagalih.jpeg'),
(2, 'Doddy', '133304012', 'doddy@yahoo.com', 'Teknik Industri', 'doddy.png'),
(3, 'Aegon', '193040991', '193040991.aegon@mail.unpas.ac.id', 'Teknik informatika', 'aegon.jpeg'),
(4, 'Erik', '153030321', 'erik@gmail.com', 'Ekonomi', 'erik.jpg'),
(5, 'Igrid', '193040199', 'igrid@gmail.com', 'Teknik informatika', 'igrid.jpeg'),
(6, 'Tifa', '193040222', 'tifa@mako.com', 'Teknik informatika', 'tifa.jpeg'),
(7, 'Amon', '19304066', 'amon@mail.com', 'Teknik informatika', 'Amon.jpeg'),
(8, 'Kimio', '193040982', 'kimio@mail.com', 'Teknik Pangan', 'kimio.png'),
(9, 'Edward Kenway', '193040243', 'kenway@abstergo.com', 'Teknik informatika', 'edward.jpeg'),
(11, 'Simon', '193040199', 'simon@gmail.com', 'Teknik informatika', 'acelora.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'udang', '$2y$10$De1mJJOhMAPN8jvasvuyt.UY15hDObcWu34mc6frsNc5zYLXu4HXG'),
(4, 'pw', '$2y$10$YjvmBn2UEv1X2pYYrCEO8uwncCDwNoLk9pOzzvThIww18b1WxtOMe'),
(5, 'admin', '$2y$10$L1785vtBuLp093WjpoMXBuetGSkbD9y7Q94jrc9cZo8CNjwMZ5Zpi'),
(6, 'aria', '$2y$10$NaaiYjQiwpDFxljJ0WgSVuhS4.2g2dFhUoF.4WnXLxHdtmekwLLQC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
