-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2024 at 03:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surozawaairlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `addschedule`
--

CREATE TABLE `addschedule` (
  `id_schedule` int NOT NULL,
  `id_pesawat` varchar(5) DEFAULT NULL,
  `tanggal_keberangkatan` date DEFAULT NULL,
  `waktu_keberangkatan` time DEFAULT NULL,
  `bandara_asal` varchar(100) DEFAULT NULL,
  `bandara_tujuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addschedule`
--

INSERT INTO `addschedule` (`id_schedule`, `id_pesawat`, `tanggal_keberangkatan`, `waktu_keberangkatan`, `bandara_asal`, `bandara_tujuan`) VALUES
(1, 'SA004', '2024-05-30', '17:20:00', 'Ngurah Rai Bali', 'Juanda Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `id_pesawat` varchar(5) NOT NULL,
  `nama_pesawat` varchar(100) NOT NULL,
  `kapasitas` int DEFAULT NULL,
  `jenis_pesawat` varchar(50) DEFAULT NULL,
  `tanggal_pembuatan` date DEFAULT NULL,
  `nomor_registrasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`id_pesawat`, `nama_pesawat`, `kapasitas`, `jenis_pesawat`, `tanggal_pembuatan`, `nomor_registrasi`) VALUES
('SA002', 'Garuda Indonesia', 700, 'SHD', '2024-05-29', 'GI-230'),
('SA003', 'Gajayana Air', 20, 'A12O', '2019-12-30', 'a12021'),
('SA004', 'Bagus Air', 2, 'FHD ', '1997-01-22', 'BR-1E');

--
-- Triggers `plane`
--
DELIMITER $$
CREATE TRIGGER `before_plane_insert` BEFORE INSERT ON `plane` FOR EACH ROW BEGIN
    DECLARE max_id INT;
    DECLARE new_id VARCHAR(5);

    -- Ambil nilai maksimum id_pesawat yang sudah ada
    SELECT MAX(CAST(SUBSTRING(id_pesawat, 3) AS UNSIGNED)) INTO max_id FROM plane;

    -- Jika tidak ada data, atur nilai max_id menjadi 0
    IF max_id IS NULL THEN
        SET max_id = 0;
    END IF;

    -- Generate new id_pesawat
    SET new_id = CONCAT('SA', LPAD(max_id + 1, 3, '0'));

    -- Set nilai id_pesawat baru ke dalam row yang akan di-insert
    SET NEW.id_pesawat = new_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `name`) VALUES
(2, 'admin', '$2y$10$ORUmLR1yY8qKd/AL/GuVMecbc4wCQQqYxt39MwdrC/7SBbEubLCf.', 'admin@mufi.com', 'Dio Masafan'),
(3, 'wafa', '$2y$10$75vW18Iv/nO4HkiXRrq9hOrxSR0oEwETfp8r5yxugENs5XyjUy1l.', 'wafa@gmail.com', 'Althof Ali Wafa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addschedule`
--
ALTER TABLE `addschedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `fk_plane_id` (`id_pesawat`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`id_pesawat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addschedule`
--
ALTER TABLE `addschedule`
  MODIFY `id_schedule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addschedule`
--
ALTER TABLE `addschedule`
  ADD CONSTRAINT `fk_plane_id` FOREIGN KEY (`id_pesawat`) REFERENCES `plane` (`id_pesawat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
