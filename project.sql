-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Des 2018 pada 11.13
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `employe`
--

CREATE TABLE `employe` (
  `id` int(6) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `provinsi` int(5) NOT NULL,
  `kota` int(5) NOT NULL,
  `address` text NOT NULL,
  `zip` int(6) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `ktpfname` varchar(50) NOT NULL,
  `pathktp` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `n_bank` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employe`
--

INSERT INTO `employe` (`id`, `first`, `last`, `birth`, `phone`, `email`, `provinsi`, `kota`, `address`, `zip`, `ktp`, `ktpfname`, `pathktp`, `position`, `bank`, `n_bank`, `date`) VALUES
(8, 'Taofik', 'Rochman', '1989-02-02', '085887337339', 'taofik.rochman@yahoo.com', 13, 26, 'Jalan RA Kosasih Rt.04 Rw.03', 43116, '099887683234324324324', '1f9223741fabbad081058a1b169e7ff6.jpg', 'C:/xampp/htdocs/project/ktp/', 'Staff SOC', 'Bukopin', '6747423712333123233', '2018-12-29 11:05:48'),
(9, 'Rochman', 'Manman', '2018-12-18', '08683537338', 'rochman@yahoo.com', 1, 29, 'kebon jeruk', 0, '2342343243434234', '337e42419e099e7a995c0ee8a24af5d1.jpg', 'C:/xampp/htdocs/project/ktp/', 'Supervisor', 'BNI', '324243432423434', '2018-12-29 11:05:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota_kab`
--

CREATE TABLE `kota_kab` (
  `id_kota_kab` int(6) NOT NULL,
  `id_prov` int(6) NOT NULL,
  `kota_kab` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota_kab`
--

INSERT INTO `kota_kab` (`id_kota_kab`, `id_prov`, `kota_kab`) VALUES
(1, 13, 'Kab. Bandung'),
(2, 13, 'Kab. Bandung Barat'),
(3, 13, 'Kab. Bekasi'),
(4, 13, 'Kab. Bogor'),
(5, 13, 'Kab. Ciamis'),
(6, 13, 'Kab. Cianjur'),
(7, 13, 'Kab. Cirebon'),
(8, 13, 'Kab. Garut'),
(9, 13, 'Kab. Indramayu'),
(10, 13, 'Kab. Karawang'),
(11, 13, 'Kab. Kuningan'),
(12, 13, 'Kab. Majalengka'),
(13, 13, 'Kab. Pangandaran'),
(14, 13, ' Kab. Purwakarta'),
(15, 13, 'Kab. Subang'),
(16, 13, 'Kab. Sukabumi'),
(17, 13, 'Kab. Sumedang'),
(18, 13, 'Kab. Tasikmalaya'),
(19, 13, 'Kota Bandung'),
(20, 13, 'Kota Banjar'),
(21, 13, 'Kota Bekasi'),
(22, 13, 'Kota Bogor'),
(23, 13, 'Kota Cimahi'),
(24, 13, 'Kota Cirebon'),
(25, 13, 'Kota Depok'),
(26, 13, 'Kota Sukabumi'),
(27, 13, 'Kota Tasikmalaya'),
(28, 1, 'Administrasi Kepulauan Seribu'),
(29, 1, 'Kota Administrasi Jakarta Barat'),
(30, 1, 'Kota Administrasi Jakarta Pusat'),
(31, 1, 'Kota Administrasi Jakarta Selatan'),
(32, 1, 'Kota Administrasi Jakarta Timur'),
(33, 1, 'Kota Administrasi Jakarta Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` int(6) NOT NULL,
  `provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `provinsi`) VALUES
(1, 'DKI Jakarta'),
(2, 'Nanggroe Aceh Darussalam'),
(3, 'Sumatera Utara'),
(4, 'Sumatera Barat'),
(5, 'Riau'),
(6, 'Jambi'),
(7, 'Sumatera Selatan'),
(8, 'Bengkulu'),
(9, 'Lampung'),
(10, 'Kepulauan Bangka Belitung'),
(11, 'Kepulauan Riau'),
(12, 'Yogyakarta'),
(13, 'Jawa Barat'),
(14, 'Jawa Tengah'),
(15, 'Jawa Timur'),
(16, 'Banten'),
(17, 'Bali'),
(18, 'Nusa Tenggara Timur'),
(19, 'Nusa Tenggara Barat'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Tengah'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tenggara'),
(29, 'Sulawesi Barat'),
(30, 'Gorontalo'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat'),
(35, 'Sumbawa'),
(36, 'Papua Selatan'),
(37, 'Papua Tengah'),
(38, 'Papua Barat Daya'),
(39, 'Tapanuli'),
(40, 'Kepulauan Nias'),
(41, 'Kapuas Raya'),
(42, 'Bolang Mogondow Raya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota_kab`
--
ALTER TABLE `kota_kab`
  ADD PRIMARY KEY (`id_kota_kab`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kota_kab`
--
ALTER TABLE `kota_kab`
  MODIFY `id_kota_kab` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
