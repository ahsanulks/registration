-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 12:45 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `id` int(11) NOT NULL,
  `nik` text NOT NULL,
  `nama` text NOT NULL,
  `unit` text NOT NULL,
  `unit_kerja` text NOT NULL,
  `file_path` text NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`id`, `nik`, `nama`, `unit`, `unit_kerja`, `file_path`, `action`, `created_at`) VALUES
(1, 'P87232', 'Ahsanul Khuluq S', 'Teknologi Informasi', 'Divisi', 'C:/xampp/htdocs/registrasi/uploads/confirmation-1520768488.pdf', 'registration_confirmation', '2018-03-11 11:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pinjaman`
--

CREATE TABLE `pengajuan_pinjaman` (
  `id` int(11) NOT NULL,
  `nik` text NOT NULL,
  `ktp` text NOT NULL,
  `nama` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `gender` text NOT NULL,
  `pasangan` text NOT NULL,
  `ktp_pasangan` text NOT NULL,
  `alamat_pasangan` text NOT NULL,
  `unit_kerja` text NOT NULL,
  `unit` text NOT NULL,
  `jabatan` text NOT NULL,
  `golongan` text NOT NULL,
  `pinjaman` text NOT NULL,
  `pinjaman_deskripsi` text NOT NULL,
  `waktu` date NOT NULL,
  `jenis_pinjaman` text NOT NULL,
  `keperluan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_pinjaman`
--

INSERT INTO `pengajuan_pinjaman` (`id`, `nik`, `ktp`, `nama`, `tanggal_lahir`, `email`, `alamat`, `gender`, `pasangan`, `ktp_pasangan`, `alamat_pasangan`, `unit_kerja`, `unit`, `jabatan`, `golongan`, `pinjaman`, `pinjaman_deskripsi`, `waktu`, `jenis_pinjaman`, `keperluan`, `created_at`) VALUES
(1, 'P87232', '1301293012930-1', 'AHSANUL KHULUQ S', '1996-07-29', '', 'Jakarata aldkl;a kdl;aksld; kasl; dka;l', 'Pria', 'adlkjaskdjakldjalskdjalsjdlkas', '', '', 'Divisi', 'asdakdkas;', 'akdlakdl;sakdl;sak;l', '8', '100.000.000,00', 'Seratus Juta Rupiah', '0000-00-00', 'barang', 'Usaha', '2018-03-05 15:39:48'),
(2, 'P87232', '1230130-193', 'AHSANUL KHULUQ S', '1956-03-23', '', 'adkasjdklasjdklajkdlajkldsjalk', 'Pria', 'adsjalkdjaljdlasjdlksa', '', '', 'Divisi', 'asdkasjdkasjdl', 'ajdklasjkdlajkdjal', 'klajdlkasjdlksajdlajsldjasl', '15.000.000,00', 'lima belas juta rupiah', '0000-00-00', 'berjangka', 'ada deh', '2018-03-05 15:43:54'),
(3, 'P87232', '12039819381283901', 'AHSANUL KHULUQ S', '2018-03-05', '', 'akdsakdl;askdl;ask', 'Pria', 'adsakldksaldksa;', '', '', 'Divisi', 'adklsakdl;sak;', 'adkaskdlsakdask;l', ';lakdlsa', '13.123.131.231.231,00', 'asdasdsa', '0000-00-00', 'multi guna', 'daskdlaskd;lask', '2018-03-05 15:47:50'),
(4, 'P82371', '1234567', 'EPAFRAS EKAHASTA CHRISTIAN', '1985-05-28', '', 'alamat ku dimana saja ku berada', 'Pria', 'Marissa', '', '', 'Divisi', 'Teknologi Informasi', 'Asisten Manager', '12', '100.000.000,00', 'seratus juta rupiah', '0000-00-00', 'berjangka', 'Modal Bang', '2018-03-06 02:43:39'),
(5, 'P87232', '12312312', 'AHSANUL KHULUQ S', '1963-03-01', 'ahsanulkh996@gmail.com', 'adasdasdasdasdas', 'Pria', 'adasdasdas adasdasdas', '', '', 'Divisi', 'adasdasd', 'aadasdasdas', '123', '120.000.000,00', 'seratus dua puluh juta', '0000-00-00', 'multi guna', 'Usaha', '2018-03-06 02:51:22'),
(6, 'P7790', '321213123123123', 'AHSANUL KHULUQ S', '2018-03-08', 'ahsanulkh996@gmail.com', 'Jl. Kertajaya INdah no 99 Jakarta selatan', 'Pria', 'Siapa Hayo', '', '', 'Kanwil', 'Surabaya', 'Kepala Cabang', '10', '300.000.000,00', 'tiga ratus juta', '0000-00-00', 'berjangka', 'usaha', '2018-03-06 14:31:54'),
(7, 'P82371', '1234567890', 'EPAFRAS E. C', '2018-03-30', 'epafras.e.christian@pegadaian.co.id', 'dadadadada ada', 'Pria', '-', '', '', 'Divisi', 'TI', 'ass manager', '12', '1.000.000,00', 'sesesesese', '0000-00-00', 'multi guna', 'wawawawawaw', '2018-03-06 14:47:11'),
(8, 'P1231231', '1932839010931', 'AHSANUL KHULUQ S', '2018-03-04', 'ahsanulkh996@gmail.com', 'askdljaskdjakl jdklaj dkajskldjaskdjalsk', 'Pria', 'asdkadkas;lkdl;', '', '', 'Divisi', 'asdadas', 'asdlasjdklsajdklsaj', '12', '123.193.811,00', 'asdadsada', '0000-00-00', 'multi guna', 'asdjlkasjdkasjdskla', '2018-03-06 15:08:20'),
(9, 'P123456', '123131231231', 'AHSANUL KHULUQ S', '2018-03-23', 'ahsanulkh996@gmail.com', 'ini alamt saya', 'Pria', 'nama pasangan', '7987878979879', 'ini alamat pasangan', 'Divisi', 'adadsadas', 'akldksajdklasjk', '12', '100.000.000,00', 'seratus juta rupiah', '0000-00-00', 'multi guna', 'ada deh', '2018-03-06 15:18:16'),
(10, 'P789123', '12312312312312', 'INI NAMA LENGKAP', '2018-03-08', 'ahsanulkh996@gmail.com', 'ini alamt saya', 'Pria', 'ini pasangan', '789789789798', 'ini alamt pasangan', 'Divisi', '1231123', 'adkasjdajklaj ljad', '12', '10.000.000,00', 'seratus juta rupiah', '0000-00-00', 'multi guna', 'ada deh', '2018-03-06 15:25:31'),
(11, 'P82371', '1234567890', 'EPAFRAS E. C', '2018-03-06', 'epafras.e.christian@pegadaian.co.id', 'gagagaga', 'Pria', '-', '-', 'hahahahah', 'Divisi', 'Bisnis Gadai', 'Manager', '13', '100.000.000,00', 'seratus juta rupiah', '0000-00-00', 'berjangka', 'Renovasi rumah', '2018-03-06 15:25:46'),
(12, 'P87232', '123123123', 'ADSJKALJDASJDKALSJ', '2018-03-06', 'ahsanulkh996@gmail.com', 'ASJDLKAJDKLASJ KJAKDLJASKL JDKASLJDK ASL', 'Pria', 'ASDJAJDKLSAJDASJL', '12312312312', 'AJSKDLAJKDJSAKDJSAKLDJSKLA', 'Divisi', 'ASDADSADAS', 'ADJSAKDJSAKLJ LKJADKL AJKL', '12312', '12.131.312.312,00', 'ASKDJKLAJDLKSAJDKLASJ KLJADK JASKJDAKSL JDKAJ KLASJDKLA', '0000-00-00', 'multi guna', 'AJDLKASJDKLSAJKDLSA', '2018-03-06 15:28:26'),
(13, 'PINJ123', '123456789', 'FRANS KITIR', '2018-03-23', 'epafras.e.christian@pegadaian.co.id', 'Jalan Surga', 'Pria', 'Nama ku', '987654321', 'Jalan saya kaki', 'Divisi', 'Bisnis Utama', 'Manager', '13', '100.000.000,00', 'seratus juta rupiah', '0000-00-00', 'multi guna', 'Renovasi rumah', '2018-03-06 15:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nik` text NOT NULL,
  `email` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan` text NOT NULL,
  `jabatan` text NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `email`, `tempat_lahir`, `tanggal_lahir`, `golongan`, `jabatan`, `alamat`, `created_at`) VALUES
(1, 'Ahsanul Khuluq S', 'P213332', '', 'Surabaya', '0000-00-00', '8', 'Staff IT', 'Surabaya Jakarta Medan Sumatera Jawa Bali', '2018-03-05 14:41:27'),
(2, 'Ahsanul Khuluq S', 'P87000', '', 'Surabaya', '0000-00-00', '10', 'Staff IT', 'Surabaya jakarta dakdada kalkd askd l;ask dlaskld askl ;dkasl;d kas;lkd', '2018-03-05 14:56:24'),
(3, 'Ahsanul Khuluq S', 'P87232', '', 'Surabaya', '1996-03-20', '9', 'adasdk;askdl;a klka l;dkas', 'ada;lk l;dakl;d kal;d kasl;kdl a;sk dl;askdl;askl;', '2018-03-05 15:04:17'),
(4, 'Ahsanul Khuluq S', 'P213332', '', 'Surabaya', '1953-03-11', '8', '1232131', 'adsadasdada', '2018-03-05 15:09:24'),
(5, 'Ahsanul Khuluq S', 'P97231', '', 'Surabaya', '2018-03-26', '11', 'asdhjasjd jahd jkahsjkhjak', 'asdjahdjhajdjasdjaksdhjka', '2018-03-06 02:22:00'),
(6, 'Evan Christian', 'P82371', '', 'Jawa', '1985-05-28', '12', 'Asisten Manager', 'Jalan Kaki', '2018-03-06 02:31:00'),
(7, 'Ahsanul Khuluq S', 'p9123133', '', 'asdk alkdlakld;ka l;', '2018-03-16', '123', '23', 'assdasdasd', '2018-03-06 11:02:41'),
(8, 'Ahsanul Khuluq S', 'p990', 'ahsanulkh996@gmail.com', 'Surabaya', '1996-07-29', '7', 'Staff IT', 'Jl. Retorika 22 gg 99a asdad k asd aJakarta', '2018-03-06 14:19:55'),
(9, 'Ahsanul Khuluq S', 'p990', 'ahsanulkh996@gmail.com', 'Surabaya', '1996-07-29', '7', 'Staff IT', 'Jl. Retorika 22 gg 99a asdad k asd aJakarta', '2018-03-06 14:24:39'),
(10, 'Epafras E. C', 'P82371', 'epafras.e.christian@gmail.com', 'Jawa', '2018-03-06', '12', 'ass manager', 'afadsafdadsafdadfs', '2018-03-06 14:41:46'),
(11, 'Epafras E. C', 'P82371544', 'epafras.e.christian@pegadaian.co.id', 'Jawa', '2018-03-07', '12', 'ass manager', 'fafachre  iutrfyfh vuyfuk', '2018-03-06 14:43:46'),
(12, 'ajsdka skdjalk jdkasljl', 'P7790', 'ahsanulkh996@gmail.com', 'akdjklasjdklsajdkla', '2018-03-06', '23', 'aldkl;asdkla;skdl;a', 'l;akdl;askdl;as kl;dsal; askl;dkal; ka;s', '2018-03-06 15:30:04'),
(13, 'Epafras E. C', 'REG82371', 'epafras.e.christian@pegadaian.co.id', 'Jawa Tengah', '2018-03-05', '12', 'Manager', 'Jalan Kramat Raya No. 162 - Jakarta Pusat', '2018-03-06 15:31:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
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
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengajuan_pinjaman`
--
ALTER TABLE `pengajuan_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
