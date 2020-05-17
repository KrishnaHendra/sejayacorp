-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2020 at 12:42 PM
-- Server version: 10.2.31-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6481136_db_synchronize`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `aktif` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `aktif`, `created_at`) VALUES
(4, 'Admin Synchronize', 'synchronize@gmail.com', '$2y$10$KSsg16AGoqr0GYn83ViNl.IeOyw4HdAlwSX81jCzHsxypIvkOszVK', 1, 1586533296),
(5, 'Fahmi', 'fahmi@synchronize.com', '$2y$10$fdrKXTTF9v571YGlyZHjge/XnJR9IIWuiKjGyMnsyENyy3NQmYL6C', 1, 1586920898);

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`, `harga`, `stok`, `id_tiket`, `id_event`) VALUES
(1, 'One Day Access', '50000', 70, 3, 2),
(2, 'Full Day Access', '100000', 31, 3, 2),
(3, 'One Day Access', '75000', 8, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_akses`, `qty`, `id_transaksi`) VALUES
(86, 2, 2, 39),
(87, 1, 2, 40);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `TG_UPDATE_TOCK` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	UPDATE akses SET stok = stok - NEW.qty WHERE id_akses = NEW.id_akses;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dj`
--

CREATE TABLE `dj` (
  `id_dj` int(11) NOT NULL,
  `nama_dj` varchar(225) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `birth` varchar(225) NOT NULL,
  `genre` varchar(225) NOT NULL,
  `sosmed` varchar(225) NOT NULL,
  `kota` text NOT NULL,
  `video` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dj`
--

INSERT INTO `dj` (`id_dj`, `nama_dj`, `nickname`, `birth`, `genre`, `sosmed`, `kota`, `video`) VALUES
(7, 'Zainudin Zuchri', 'Mr. Jey', 'Banyuwangi , 04 Oktober 1991', 'All Genre', '', 'Jember', 'IMG-20200327-WA00643.jpg'),
(8, 'Aura Lee', 'Aura Lee', 'Lumajang , 30 April 1994', 'All Genre', '', 'Jember', 'IMG-20200327-WA00652.jpg'),
(9, 'Muhammad Reynaldy Bagaskara', 'Reynaldy', 'Jember , 18 Juli 1998', 'Electro , Twerk, Jungle Dutch, Breakbeat, Rnb', '', 'Jember', 'IMG-20200327-WA00671.jpg'),
(10, 'Mochammad Rizki Saputra', 'Richkey', 'Bondowoso, 19 Juni 1996', 'All Genre', '@mriskisputra', 'Malang', 'IMG-20200328-WA0006.jpg'),
(11, 'Ozzy Wahyu Saputra', 'Ozzy', 'Malang, 05 Februari 1997', 'Original, R&B, Electro, Twerk, Trance, Techno, House, Proghouse, Breaks, EDM, Jungle, Breakbeat ', '@ozzy_saputra', 'Malang', 'IMG-20200328-WA0005.jpg'),
(12, 'Mahend', 'Mahend', 'Malang, 26 Januari 1997', 'All Genre', '', 'Malang', 'IMG-20200328-WA0008.jpg'),
(13, 'Dhimas Fresco', 'Dhimas Fresco', 'Malang, 19 Januari 2000', 'All Genre', '', 'Malang', 'IMG-20200328-WA0007.jpg'),
(15, 'Gadis Setya Keylana', 'Kheyla', '', 'bb, jungle, twerk, trance', '', 'Malang', 'IMG-20200412-WA0003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `about_event` text NOT NULL,
  `venue` text NOT NULL,
  `location_venue` text NOT NULL,
  `tanggal` date NOT NULL,
  `status_event` enum('aktif','selesai') NOT NULL,
  `poster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `about_event`, `venue`, `location_venue`, `tanggal`, `status_event`, `poster`) VALUES
(2, 'Oh! Nais Festival Episode : \"Waytuber\"', 'Festival musik yang dipadukan dengan berbagai rangkaian acara yang dikemas secara seru.', 'Graha Cakrawala - Universitas Negeri Malang', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14262.087279349189!2d112.6110546315304!3d-7.957466273883397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.	1!3m3!1m2!1s0x2e78827f0d7f025b%3A0x92aef5088187b798!2sGraha%20Cakrawala%20UM!5e1!3m2!1sid!2sid!4v1577008694488!5m2!1sid!2sid', '2020-07-30', 'aktif', 'poster.jpg'),
(3, 'Oh! Nais Festival Episode : \"Comingsoon\"', 'Let\'s dance with us', 'UMM Dome', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31611.957596647226!2d112.6440299!3d-7.9477204!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78818b2e1a1555%3A0xbd7b5a20b30efc24!2sUMM%20Dome!5e0!3m2!1sen!2sid!4v1586260347134!5m2!1sen!2sid', '2020-04-17', 'aktif', 'soon.png'),
(4, 'Oh! Nais Festival Episode : \"COme\"', 'event selanjutnya', 'Graha Cakrawala Malang', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14262.087279349189!2d112.6110546315304!3d-7.957466273883397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.	1!3m3!1m2!1s0x2e78827f0d7f025b%3A0x92aef5088187b798!2sGraha%20Cakrawala%20UM!5e1!3m2!1sid!2sid!4v1577008694488!5m2!1sid!2sid', '2020-04-30', 'selesai', 'Group_2.png');

--
-- Triggers `event`
--
DELIMITER $$
CREATE TRIGGER `TG_GANTI_EVENT` AFTER UPDATE ON `event` FOR EACH ROW BEGIN
    UPDATE guest SET status = NEW.status_event WHERE id_event = NEW.id_event;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `pertanyaan`, `jawaban`) VALUES
(1, 'Apa sih Oh! Nais Festival?', 'Oh! Nais Festival merupakan sebuah festival musik disertai bazar dll.'),
(2, 'Bagaimana akses menuju venue acara?', 'Gedung Graha Cakrawala terletak didalam Kampus Universitas Brawijaya dimana akses gerbang dapat melalui depan Malang Town Square'),
(3, 'Synchronize Event Organizer ?', 'Adalah sebuah organizer event yang ..,,');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `gambar`, `id_event`) VALUES
(11, 'DSC00227.jpg', 2),
(12, 'DSC06654.jpg', 2),
(14, 'DSC_5653.jpg', 2),
(15, 'IMG_0404.jpg', 2),
(16, 'about.jpg', 2),
(17, 'IMG_9766.jpg', 2),
(18, 'IMG_0268.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id_guest` int(11) NOT NULL,
  `nama_guest` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `genre` varchar(225) NOT NULL,
  `gambar` text NOT NULL,
  `id_event` int(11) NOT NULL,
  `status` enum('aktif','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id_guest`, `nama_guest`, `deskripsi`, `genre`, `gambar`, `id_event`, `status`) VALUES
(1, 'Arditho Pramono', 'Ardhito Pramono, sebuah musisi yang terkenal dengan parasnya yang tampan. Dengan lagu-lagunya yang kalem dan menyentuh membuat ia digemari para kaum hawa', 'Pop Modern', 'ardhito1.jpg', 2, 'aktif'),
(2, 'Feby Putri', 'Halo semuanya namaku febi putri', 'Women Solo', 'feby1.jpg', 2, 'aktif'),
(4, 'OM PMR', 'Mari Kita Happy Happy an', 'orchestra', 'ompmr12.jpg', 2, 'aktif'),
(9, 'Denny Caknan', 'Sobat ambyarrrrrr', 'dangdut', 'denny12.jpg', 2, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kegiatan` varchar(225) NOT NULL,
  `deskripsi_kegiatan` varchar(225) NOT NULL,
  `waktu` datetime NOT NULL,
  `gambar` text DEFAULT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kegiatan`, `deskripsi_kegiatan`, `waktu`, `gambar`, `id_event`) VALUES
(10, 'Meet Up All Crew', 'Cross Check seluruh kesiapan event', '2020-05-08 15:00:00', NULL, 2),
(12, 'Comingsoon', 'Tunggu Ya,,,,', '2020-04-25 12:30:00', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id_sponsor` int(11) NOT NULL,
  `nama_sponsor` varchar(225) NOT NULL,
  `logo_sponsor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id_sponsor`, `nama_sponsor`, `logo_sponsor`) VALUES
(1, 'Prost Beer', 'ticket-c.png'),
(2, 'Bintang', 'media-square-1.png'),
(4, 'nanak', 'media-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `id_talent` int(11) NOT NULL,
  `nama_talent` varchar(225) NOT NULL,
  `umur` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `kelas`, `id_event`) VALUES
(3, 'Presale 1', 2),
(4, 'Presale 2', 2),
(5, 'VIP', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(128) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` enum('proses','done','batal','selesai') NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `kode_transaksi`, `qty`, `total`, `tanggal`, `status`, `bukti`, `qr_code`) VALUES
(39, 6, 'Synch1589616896', 2, '200000', 1589616896, 'proses', '3.png', '1589616896.png'),
(40, 6, 'Synch1589618734', 2, '100000', 1589618734, 'proses', 'kosong', '1589618734.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telepon` varchar(225) NOT NULL,
  `created_at` int(11) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `telepon`, `created_at`, `tgl_lahir`) VALUES
(5, 'Riski Saputra', 'riskisputra1906@gmail.com', 'emriski123', '081357621186', 1586584370, '1996-06-19'),
(6, 'Krisna Shalsabella', 'krisnahendrawijaya@gmail.com', 'krisna', '082129128467', 1586586978, '2002-10-18'),
(7, 'Anggie Akbar', 'anggieakbar025@gmail.com', 'anggieakbar025', '081236820058', 1586777958, '2020-04-13'),
(8, 'Satrio Wicaksono', 'satriowicakson076@gmail.com', 'satrio', '089652695773', 0, ''),
(9, 'Sabilla Ayu', 'sabilla@gmail.com', 'sabilla', '082129212889', 1589549560, '2001-12-18'),
(10, 'Fahri Ramadhan', 'fahriaqilaramadhan@gmail.com', 'fahri', '081887900121', 1589549648, '2002-10-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_tiket` (`id_tiket`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_tiket` (`id_akses`);

--
-- Indexes for table `dj`
--
ALTER TABLE `dj`
  ADD PRIMARY KEY (`id_dj`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id_guest`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_jadwal` (`id_event`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`id_talent`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_event_2` (`id_event`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `dj`
--
ALTER TABLE `dj`
  MODIFY `id_dj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id_guest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `id_talent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
