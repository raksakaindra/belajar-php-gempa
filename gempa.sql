-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2019 at 08:23 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gempabumi`
--

-- --------------------------------------------------------

--
-- Table structure for table `gempa`
--

CREATE TABLE `gempa` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `magnitude` decimal(3,1) NOT NULL,
  `kedalaman` int(5) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `latitude` decimal(5,2) NOT NULL,
  `longitude` decimal(5,2) NOT NULL,
  `dirasakan` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gempa`
--

INSERT INTO `gempa` (`id`, `waktu`, `magnitude`, `kedalaman`, `lokasi`, `latitude`, `longitude`, `dirasakan`) VALUES
(2, '2018-12-30 11:10:54', '4.9', 20, 'Pusat gempa berada di darat 13 km BaratLaut Sumba', '-9.49', '119.03', 'IV - V Tambolaka'),
(3, '2018-12-30 15:39:11', '5.7', 192, 'Pusat gempa berada di darat 42km TimurLaut Lebong', '-2.77', '102.25', 'IV Kota Bengkulu, III Manna, III Mukomuko, III Lebong, III Pesisir Selatan, II Kepulauaan Mentawai, II Pariaman, II Padang'),
(4, '2018-12-31 01:34:55', '5.1', 10, 'Pusat gempa berada di laut 132km Tenggara SIAUTAGULANDANGBIARO', '1.65', '126.38', 'II-III Minahasa Tenggara, II-III Manado, II-III Bitung'),
(5, '2018-12-31 23:15:44', '3.0', 10, 'Pusat gempa berada di darat 8 km barat laut Lombok Utara', '-8.36', '116.20', 'III Lombok Utara'),
(6, '2019-01-01 06:48:50', '3.4', 10, 'Pusat gempa berada di darat 1 km Timurlaut Tapanuli Utara', '2.05', '99.11', 'III Sipahuntar'),
(7, '2019-01-01 18:55:00', '5.1', 14, 'Pusat gempa berada di laut 93 km Barat Daya Banda Aceh', '5.47', '94.49', 'II Banda Aceh'),
(8, '2019-01-02 03:24:39', '4.8', 39, 'Pusat gempa berada dilaut 56 km tenggara kep. mentawai', '-2.51', '99.66', 'II Tua Pejat'),
(9, '2019-01-02 12:25:29', '3.2', 10, 'Pusat gempa berada di laut 40 km barat daya Obi', '-1.52', '127.33', 'II-III Pulau Obi'),
(10, '2019-01-02 14:59:46', '5.3', 10, 'Pusat gempa berada di laut 75 km BaratLaut Sarmi', '-1.79', '139.15', 'II-III Sarmi'),
(11, '2019-01-02 19:30:43', '3.4', 10, 'Pusat gempa berada di Darat 15 Km Selatan Kec. Gumbasa Kab.Sigi', '-1.38', '119.95', 'III Kulawi'),
(12, '2019-01-02 20:40:23', '4.9', 27, 'Pusat gempa berada di laut 144 km BaratDaya Pesisir Barat Lampung', '-6.47', '103.69', 'I-II Liwa'),
(13, '2019-01-02 21:26:06', '5.2', 10, 'Pusat gempa berada di Laut 104 km Barat daya Dompu', '-9.43', '118.04', 'III-IV Bima, III Sumbawa'),
(14, '2019-01-03 06:31:50', '2.6', 10, 'Pusat gempa berada di darat 6 km utara Kec. Bonehau Kab. Mamuju', '-2.54', '119.33', 'II Kec. Sampaga Kab. Mamuju'),
(15, '2019-01-03 11:21:21', '4.6', 10, 'Pusat gempa berada di laut 47 km Barat Ambon', '-3.68', '127.74', 'III Ambon'),
(16, '2019-01-03 18:27:47', '2.7', 24, 'Pusat gempa berada di darat 11 km TimurLaut Kec. Nosu, Kab. Mamasa', '-3.19', '119.57', 'II Mamasa'),
(17, '2019-01-03 18:32:30', '2.9', 6, 'Pusat gempa berada di darat 2 km Utara Kec. Mamasa, Kab. Mamasa', '-2.86', '119.41', 'II Mamasa'),
(18, '2019-01-04 02:44:38', '2.8', 5, 'Pusat gempa berada di darat 8 km barat laut Mamasa', '-2.80', '119.48', 'III Mamasa'),
(19, '2019-01-04 06:15:46', '4.2', 10, 'Pusat gempa berada di darat 13 Km TimurLaut Jayapura', '-2.46', '140.55', 'III Sentani, III Heram, II-III Jayapura'),
(20, '2019-01-04 13:22:45', '5.7', 118, 'Pusat gempa berada di laut 139 km BaratLaut Maluku Tenggara Barat', '-6.66', '130.46', 'II-III Saumlaki'),
(21, '2019-01-04 21:13:16', '3.5', 10, 'Pusat gempa berada di laut 29 km Selatan Labuha', '-0.89', '127.43', 'II Labuha'),
(22, '2019-01-05 04:46:42', '3.7', 15, 'Pusat gempa berada di laut 19 km BaratLaut Lombok utara', '-8.28', '116.13', 'III Lombok Barat, III Lombok Tengah, II Mataram, III Lombok Utara'),
(23, '2019-01-05 05:12:18', '3.3', 13, 'Pusat gempa berada di darat 8 km Selatan Palu', '-0.97', '119.88', 'II Palu, II Sigi'),
(24, '2019-01-05 08:04:19', '5.7', 114, 'Pusat gempa berada di laut 64 km barat laut Kep. Talaud', '4.37', '126.24', 'II-III Sangihe'),
(25, '2019-01-05 08:55:39', '5.1', 10, 'Pusat gempa berada di laut, 72 km Barat Laut Halmahera Selatan', '-0.89', '127.51', 'III Labuha, II-III Bacan'),
(26, '2019-01-05 10:11:53', '4.7', 10, 'Pusat gempa berada di laut 30 km Selatan Labuha', '-0.90', '127.45', 'II Labuha'),
(27, '2019-01-05 10:50:48', '3.9', 10, 'Pusat gempa berada di laut 36 km Selatan Labuha', '-0.96', '127.46', 'II Labuha'),
(28, '2019-01-05 12:02:23', '4.4', 10, 'Pusat gempa berada di laut 28 km Selatan Labuha', '-0.89', '127.49', 'II Labuha'),
(29, '2019-01-05 12:31:59', '3.9', 15, 'Pusat gempa berada di laut, 15 km Barat Laut Lombok Utara', '-8.32', '116.15', 'III Lombok Utara, III Lombok Barat, III Mataram, II Karangasem'),
(30, '2019-01-05 15:34:24', '4.5', 4, 'Pusat gempa berada di laut 28 km Selatan Labuha', '-0.88', '127.43', 'II Labuha, II-III Pulau Bacan'),
(116, '2019-01-05 17:54:58', '5.2', 10, 'Pusat gempa berada di Laut 78 km Barat Laut Halmahera Selatan.', '-0.84', '127.51', 'III Labuha, II Weda, II Gane Barat'),
(117, '2019-01-06 08:29:53', '4.5', 10, 'Pusat gempa berada di darat 71 km barat laut Kep. Yapen', '-1.66', '135.64', 'II-III Serui'),
(118, '2019-01-06 13:53:50', '3.2', 10, 'Pusat gempa berada di darat Tenggara Kairatu', '-3.43', '128.41', 'II Liang, II Kairatu'),
(119, '2019-01-06 19:12:20', '3.5', 10, 'Pusat gempa berada di darat 26 km TimurLaut Lombok Utara', '-8.23', '116.47', 'II Lombok Utara, II Lombok Barat'),
(120, '2019-01-07 00:27:18', '6.5', 10, 'Pusat gempa berada di laut 146 km baratlaut Halmahera Barat', '2.36', '126.74', 'II-III Manado, II-III Bitung, II-III Siau, II-III Naha, II-III Tobelo, II-III Galela, II Ternate'),
(121, '2019-01-07 03:20:23', '4.7', 10, 'Pusat gempa berada di darat 25 km tenggara Mamasa', '-3.06', '119.50', 'III-IV Mamasa'),
(122, '2019-01-07 10:48:29', '5.0', 10, 'Pusat gempa berada di laut 66 km barat laut Manggarai Barat', '-8.10', '119.88', 'III Bima, II-III Labuan Bajo, I-II Ruteng'),
(123, '2019-01-07 22:04:09', '4.8', 21, 'Pusat gempa berada di laut 62 km BaratDaya Kab. Tasikmalaya', '-8.15', '107.88', 'II-III Tasikmalaya, II-III Sukabumi, II-III Garut, II-III Ciamis, II-III Pangandaran'),
(124, '2019-01-07 23:58:49', '4.5', 11, 'Pusat gempa berada di laut 69 km tenggara cilacap', '-8.32', '109.09', 'II Cilacap, II Pangandaran'),
(125, '2019-01-08 16:54:45', '5.5', 10, 'Pusat gempa berada di laut 113 km Barat daya Sukabumi', '-7.85', '106.48', 'II-III Bandung, III Sukabumi, III Pelabuhan Ratu, II Pangandaran, II Lembang, II Cibareno, II Lebak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `status`) VALUES
(1, 'saka', 'Raksaka Indra A', '3715517c74ddeede3ad8104acf84d5e4', 1),
(2, 'john', 'John Appleseed', '3715517c74ddeede3ad8104acf84d5e4', 2),
(6, 'raksaka', 'Raksaka', '3715517c74ddeede3ad8104acf84d5e4', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gempa`
--
ALTER TABLE `gempa`
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
-- AUTO_INCREMENT for table `gempa`
--
ALTER TABLE `gempa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
