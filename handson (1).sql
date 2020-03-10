-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 08:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handson`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `bahasa`, `insert_by`, `insert_date`, `last_update`) VALUES
(1, 'wew', 'admin', '2020-03-07 06:41:15', '2020-03-07 12:21:28'),
(3, 'test2', 'admin', '2020-03-07 07:44:25', '2020-03-07 02:00:07'),
(4, 'test', 'admin', '2020-03-07 14:05:34', '2020-03-07 14:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `rwyt_pendidikan` text NOT NULL,
  `rwyt_pekerjaan` text NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `motto` text NOT NULL,
  `rating` int(11) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `rwyt_pendidikan`, `rwyt_pekerjaan`, `spesialis`, `motto`, `rating`, `insert_by`, `insert_date`, `last_update`) VALUES
(1, '1', '1', '1', '1', '1', 0, 'admin', '2020-02-28 11:39:28', '2020-02-28 11:39:28'),
(3, '111', '1', '1', '1', '1', 0, 'admin', '2020-02-28 17:08:59', '2020-02-28 17:08:59'),
(4, '1q', 'q', 'q', '1', 'q', 0, 'admin', '2020-02-29 17:12:59', '2020-02-29 17:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_quiz`
--

CREATE TABLE `jawaban_quiz` (
  `id_jawaban` int(11) NOT NULL,
  `text_jawaban` text NOT NULL,
  `id_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deskripsi`, `insert_by`, `insert_date`, `last_update`) VALUES
(1, 'testss', ' testss', 'admin', '2020-03-07 14:15:54', '2020-03-07 02:23:59'),
(2, 'test2', ' ', 'admin', '2020-03-07 22:52:06', '2020-03-07 22:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_user`
--

CREATE TABLE `kelas_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `kursus` varchar(100) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi_full` text NOT NULL,
  `harga` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `persyaratan` text NOT NULL,
  `dokter` text NOT NULL,
  `gambar` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `id_subtitle` int(11) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `kursus`, `deskripsi_singkat`, `deskripsi_full`, `harga`, `rating`, `persyaratan`, `dokter`, `gambar`, `id_kategori`, `id_bahasa`, `id_subtitle`, `insert_by`, `insert_date`, `last_update`) VALUES
(2, 'test update', ' asasas', ' asasas', 123, 0, ' asasa', ' asasas', '', 1, 1, 1, 'admin', '2020-03-08 06:14:53', '2020-03-08 06:49:18'),
(3, 'judul', ' deskripsi singkat', ' deskripsi full', 123, 0, ' persyaratan', ' dosen pengajar', 'IMG_20170618_092002.jpg', 1, 3, 4, 'admin', '2020-03-08 06:43:06', '2020-03-08 06:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `transaction_id` int(11) NOT NULL,
  `transaction_id_midtrans` varchar(250) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `transaction_time` date NOT NULL,
  `transaction_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id_progres` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal_quiz`
--

CREATE TABLE `soal_quiz` (
  `id_soal` int(11) NOT NULL,
  `text_soal` text NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `emailaddress`, `password`, `insert_by`, `insert_date`, `last_update`) VALUES
(1, 'admin', '', '$2y$10$r9/hVtdbDFyfIEQY5Xq4Q.hayUW92boFaq9TjGKsufjyq3r/EtPbG', '', '2020-02-28 06:36:33', '2020-02-28 06:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id_profile` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `nomor_telepon` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` text NOT NULL,
  `profilepic` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_kelas`
--

CREATE TABLE `video_kelas` (
  `id_video` int(11) NOT NULL,
  `judul_video` varchar(100) NOT NULL,
  `link_video` text NOT NULL,
  `thumbnail` text NOT NULL,
  `durasi` time NOT NULL,
  `section` varchar(100) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `insert_by` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas_user`
--
ALTER TABLE `kelas_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_course` (`id_kursus`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_categories` (`id_kategori`),
  ADD KEY `id_language` (`id_bahasa`),
  ADD KEY `id_subtitle` (`id_subtitle`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_course` (`id_kursus`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_progres`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_video` (`id_video`),
  ADD KEY `id_course` (`id_kursus`);

--
-- Indexes for table `soal_quiz`
--
ALTER TABLE `soal_quiz`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_jawaban` (`id_jawaban`),
  ADD KEY `id_kelas` (`id_kursus`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `emailaddress` (`emailaddress`),
  ADD UNIQUE KEY `username_2` (`username`,`emailaddress`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `video_kelas`
--
ALTER TABLE `video_kelas`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_course` (`id_kursus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_user`
--
ALTER TABLE `kelas_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id_progres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal_quiz`
--
ALTER TABLE `soal_quiz`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_kelas`
--
ALTER TABLE `video_kelas`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  ADD CONSTRAINT `jawaban_quiz_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal_quiz` (`id_soal`);

--
-- Constraints for table `kelas_user`
--
ALTER TABLE `kelas_user`
  ADD CONSTRAINT `kelas_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `kelas_user_ibfk_2` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`);

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kursus_ibfk_2` FOREIGN KEY (`id_bahasa`) REFERENCES `bahasa` (`id_bahasa`),
  ADD CONSTRAINT `kursus_ibfk_3` FOREIGN KEY (`id_subtitle`) REFERENCES `bahasa` (`id_bahasa`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`id_video`) REFERENCES `video_kelas` (`id_video`),
  ADD CONSTRAINT `progress_ibfk_3` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`);

--
-- Constraints for table `soal_quiz`
--
ALTER TABLE `soal_quiz`
  ADD CONSTRAINT `soal_quiz_ibfk_2` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `video_kelas`
--
ALTER TABLE `video_kelas`
  ADD CONSTRAINT `video_kelas_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
