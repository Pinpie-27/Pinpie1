-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 01:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `maGV` varchar(20) NOT NULL,
  `tenGV` varchar(100) NOT NULL,
  `sdt` text NOT NULL,
  `ngaySinh` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `maKhoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`maGV`, `tenGV`, `sdt`, `ngaySinh`, `email`, `maKhoa`) VALUES
('gv001', 'Hồng', '0387586203', '2024-03-01', 'gv1@gmail.com', 'k002'),
('gv002', 'Hồng', '0387586203', '2024-03-07', 'gv1@gmail.com', 'k003');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `maHP` varchar(20) NOT NULL,
  `tenHP` varchar(100) NOT NULL,
  `kiHoc` int(20) NOT NULL,
  `diemHP` float NOT NULL,
  `maSV` varchar(20) NOT NULL,
  `maGV` varchar(20) NOT NULL,
  `maNganh` varchar(20) NOT NULL,
  `maKhoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `maKhoa` varchar(20) NOT NULL,
  `tenKhoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`maKhoa`, `tenKhoa`) VALUES
('k001', 'hệ thống thông tin'),
('k002', 'cntt'),
('k003', 'httt'),
('k004', 'cntt');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `maLop` varchar(20) NOT NULL,
  `tenLop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`maLop`, `tenLop`) VALUES
('ht21', 'httt'),
('ht22', 'httt');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `maNganh` varchar(20) NOT NULL,
  `tenNganh` varchar(100) NOT NULL,
  `maKhoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`maNganh`, `tenNganh`, `maKhoa`) VALUES
('n001', 'Hệ thống thông tin', 'k001');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` varchar(20) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `tenSV` varchar(100) NOT NULL,
  `ngaySinh` date NOT NULL,
  `email` text NOT NULL,
  `diaChi` varchar(100) NOT NULL,
  `maLop` varchar(20) NOT NULL,
  `maNganh` varchar(20) NOT NULL,
  `maKhoa` varchar(20) NOT NULL,
  `idTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `anh`, `tenSV`, `ngaySinh`, `email`, `diaChi`, `maLop`, `maNganh`, `maKhoa`, `idTaiKhoan`) VALUES
('sv001', '1709736961_Jennie_png.png', 'ABC', '2024-02-28', 'sv1@gmail.com', 'abc', 'ht21', 'n001', 'k002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(20) NOT NULL,
  `tenDN` varchar(100) NOT NULL,
  `matKhau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `tenDN`, `matKhau`) VALUES
(1, 'admin', '123qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`maGV`),
  ADD KEY `maKhoa1` (`maKhoa`);

--
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`maHP`),
  ADD KEY `masv` (`maSV`),
  ADD KEY `maKhoa2` (`maKhoa`),
  ADD KEY `maGianVien` (`maGV`),
  ADD KEY `maNganh1` (`maNganh`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`maKhoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`maLop`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`maNganh`),
  ADD KEY `maKhoa4` (`maKhoa`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `maKhoa` (`maKhoa`),
  ADD KEY `maLop` (`maLop`),
  ADD KEY `maNganh` (`maNganh`),
  ADD KEY `idTaiKhoan` (`idTaiKhoan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `maKhoa1` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`);

--
-- Constraints for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `maGianVien` FOREIGN KEY (`maGV`) REFERENCES `giangvien` (`maGV`),
  ADD CONSTRAINT `maKhoa2` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`),
  ADD CONSTRAINT `maNganh1` FOREIGN KEY (`maNganh`) REFERENCES `nganh` (`maNganh`),
  ADD CONSTRAINT `masv` FOREIGN KEY (`maSV`) REFERENCES `sinhvien` (`masv`);

--
-- Constraints for table `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `maKhoa4` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `idTaiKhoan` FOREIGN KEY (`idTaiKhoan`) REFERENCES `taikhoan` (`id`),
  ADD CONSTRAINT `maKhoa` FOREIGN KEY (`maKhoa`) REFERENCES `khoa` (`maKhoa`),
  ADD CONSTRAINT `maLop` FOREIGN KEY (`maLop`) REFERENCES `lop` (`maLop`),
  ADD CONSTRAINT `maNganh` FOREIGN KEY (`maNganh`) REFERENCES `nganh` (`maNganh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
