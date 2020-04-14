-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 11:47 AM
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
-- Database: `tubes_193040140`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparel`
--

CREATE TABLE `apparel` (
  `id` int(11) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `jenis_pakaian` varchar(30) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ukuran` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apparel`
--

INSERT INTO `apparel` (`id`, `foto`, `jenis_pakaian`, `deskripsi`, `nama`, `ukuran`, `harga`) VALUES
(1, 'a.jpg', 'Jacket', 'Jaket cotton lengan pendek Millerain dengan nama Black Racemaster Jacket. berwarna hitam. Ikat pin-buckle yang bisa disesuaikan di kerah. Penutupan kancing di depan. Tutup kantung dengan menggunakan magnet. Patch logo di lengan. Kantong-kantong bilahan penutup zip di bagian pinggang. Manset kancing tunggal. Sepenuhnya berjajar horizontal.', 'Belstaff (Black racemaster)', 'M, L, XL', 1200000),
(2, 'b.jpg', 'Jacket', 'Jaket denim lengan panjang berwarna abu-abu pudar dengan nama Grey Denim 1998 Jacket. kerah panjang. Penutupan kancing di depan. Kantong kancing di dada. Manset kancing tunggal. bagian kancing yang dapat disesuaikan di ujung belakang. Polos. Jahitan kontras berwarna abu-abu gelap.', 'Acne Studios (Grey Denim 1998)', 'M, L, XL', 1100000),
(3, 'c.jpg', 'Coat', 'Jas wol yang berpanel lengan panjang berwarna hitam dan bernama Black Gamel Coat. Konstruksi yang asimetris. Kerah kerah yang berlekuk. Penutupan kancing di depan. Saku yang di patch logo dan dapat dilepas di dada', 'ADER error (Black gamel)', 'L, XL', 2000000),
(4, 'd.jpg', 'T-Shirt', 'Polo lengan panjang dari katun berwarna hitam yang bernama Black Rhombus Badge Long Sleeve Polo. garis topstitched putih yang terperinci dan berkerah. 2 kancing yang terletak di bawah leher. Plak logo berenamel warna dan trim kulit di dada. Manset kancing tunggal.', 'A-COLD-WALL* (Black rhombus)', 'S, M, L, XL', 900000),
(5, 'e.jpg', 'Sweater', 'Kaus terry Prancis lengan panjang yang berwarna hitam, diberi nama Black Premium Sweatshirt. Menggunakan ikat kerah dileher, manset, dan ujung tangan. Logo Terrycloth adidas dicetak putih di dada.', 'Adidas (Black Premium Sweatshirt)', 'M, L, XL, XXL', 1000000),
(6, 'f.jpg', 'Shirt', 'Kemeja katun twill lengan panjang yang menampilkan pola kotak dalam warna abu-abu dan putih, bernama Grey East-Long-Shirt-N Shirt. Kerah lebar. Penutupan kancing di depan. Tutup kantung di dada. Dengan 3 kancing di ujung tangan.', 'Diesel (Twill)', 'S, M, L', 800000),
(7, 'g.jpg', 'Shirt', 'Kemeja poplin katun lengan panjang berwarna hitam berpola garis-garis putih di seluruh bagiannya, shirt ini bernama Black S-Alek Shirt. Kerah lebar. Penutupan kancing di depan. Satu saku di dada. Lapisan bawah poplin berwarna putih menampilkan garis-garis hitam di lengan baju. Logo hitam dibordir di ujung manset dengan 2 kancing.', 'Diesel (Poplin)', 'S, L, XL', 900000),
(8, 'h.jpg', 'Blazer', 'Blazer linen lengan panjang berwarna abu-abu, dengan nama Grey Linen Blazer. Kerah kerah yang berlekuk. Penutupan kancing di depan. Saku kantong di dada. 2 kantung di pinggang. Bergaris pudar dan kecil.', 'Eidos (Grey linen blazer)', 'S, M, L, XL', 1300000),
(9, 'i.jpg', 'Jacket', 'Jaket denim lengan panjang berwarna biru dengan nama Blue Level Denim Jacket. kerah lebar. 2 saku didepan tanpa kancing. Tutup kantung di dada. Logo tanda tangan dijahit di bagian belakang kerah. Bagian kancing yang dapat disesuaikan di ujung belakang.	', 'Kuro (Blue level denim jacket)', 'S, M, L', 1800000),
(10, 'j.jpg', 'Shirt', 'Baju chambray katun lengan pendek berwarna biru yang menampilkan pola garis putih di seluruh bagiannya, Shirt ini bernama Blue Bruce Short Sleeve Shirt. Kerah lebar. Penutupan kancing di depan. 1 saku di dada kiri.', 'A.P.C (Chambray)', 'S, M, L, XL', 700000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparel`
--
ALTER TABLE `apparel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparel`
--
ALTER TABLE `apparel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
