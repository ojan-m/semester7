-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2026 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semester7`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'tokokue.com', 'tokokue', 'tokokue.com');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_ekspedisi` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_ekspedisi`, `tarif`) VALUES
(1, 'SPX Shopee', 10000),
(2, 'JNE', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(12, 'lina@gmail.com', 'lina', 'lina', '081452786930', 'jakarta'),
(13, 'resti@gmail.com', 'resti', 'resti', '082678543521', 'jl raya 23'),
(14, 'defi@gmail.com', 'defi', 'defi', '081452786930', 'jl raya 12'),
(15, 'dita@gmail.com', 'dita', 'dita', '082678543521', 'jl raya 13'),
(16, 'windi@gmail.com', 'windi', 'windi', '082678543521', 'jakarta'),
(17, 'hani@gmail.com', 'hani', 'hani', '089323789089', 'jl.raya no 23 sunter, tanjung priok, jakarta utara'),
(18, 'putri@gmail.com', 'putri', 'putri', '089323789089', 'jl raya 12 kemayoran jakarta pusat'),
(19, 'kiki@gmail.com', 'kiki', 'kiki', '081452786930', 'jl raya'),
(23, 'sigit@gmail.com', 'sigit', 'sigit', '081623897365', 'jalan raya no 19'),
(24, 'cika@gmail.com', 'cika', 'cika', '081452786930', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 10, 'didi saputra', 'BCA', 95000, '2026-10-21', '20261021182519Brioche.jpeg'),
(4, 10, 'didi saputra', 'BCA', 95000, '2026-10-21', '20261021183005buku1.jpeg'),
(5, 10, 'didi saputra', 'BCA', 95000, '2026-10-21', '20261021183336buku1.jpeg'),
(6, 25, 'gita', 'MANDIRI', 60000, '2026-10-25', '20261025174950buku1.jpeg'),
(7, 26, 'defi', 'MANDIRI', 55000, '2026-10-25', '20261025180257buku2.jpeg'),
(8, 27, 'dita', 'MANDIRI', 60000, '2026-10-25', '20261025182002buku3.jpeg'),
(9, 28, 'didi saputra', 'BCA', 95000, '2026-10-26', '20261026143750buku2.jpeg'),
(10, 29, 'windi', 'BRI', 55000, '2026-10-26', '20261026174602buku3.jpeg'),
(11, 30, 'hani', 'BRI', 760000, '2026-10-29', '20261029175359buku4.jpeg'),
(12, 31, 'putri', 'MANDIRI', 55000, '2026-10-29', '20261029183038buku4.jpeg'),
(13, 32, 'putri', 'BCA', 60000, '2026-10-29', '20261029183255buku4.jpeg'),
(14, 33, 'diki', 'MANDIRI', 955000, '2026-11-01', '20261101164049buku3.jpeg'),
(15, 34, 'fina ', 'BCA', 275000, '2026-11-01', '20261101164743buku4.jpeg'),
(16, 35, 'Fina anggeresta', 'BRI', 55000, '2026-11-01', '20261101173445buku2.jpeg'),
(17, 36, 'gita', 'MANDIRI', 35000, '2026-11-02', '20261102162214foto4.jpeg'),
(18, 37, 'hani', 'MANDIRI', 70000, '2026-11-02', '20261102164002foto4.jpeg'),
(19, 38, 'kiki', 'BCA', 85000, '2026-11-02', '20261102164512'),
(20, 39, 'kiki', 'MANDIRI', 65000, '2026-11-02', '20261102165740buku4.jpeg'),
(21, 40, 'gita', 'MANDIRI', 30000, '2026-11-03', '20261103065113buku3.jpeg'),
(22, 41, 'gita', 'BRI', 30000, '2026-11-04', '20261104154719buku1.jpeg'),
(23, 43, 'sigit', 'BRI', 60000, '2026-11-04', '20261104161643buku1.jpeg'),
(24, 44, 'cika', 'BRI', 80000, '2026-11-04', '20261104164514buku1.jpeg'),
(25, 45, 'hani', 'BNI', 225000, '2026-11-04', '20261104190309buku4.jpeg'),
(26, 46, 'gita', 'BCA', 30000, '2026-11-05', '20261105155835buku1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) DEFAULT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_ekspedisi` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_ekspedisi`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 1, 1, '2026-09-17', 40000, '', 0, '', 'pending', ''),
(2, 1, 1, '2026-09-18', 60000, '', 0, '', 'pending', ''),
(3, 2, 0, '2026-10-16', 210000, '', 0, '', 'pending', ''),
(4, 2, 0, '2026-10-16', 210000, '', 0, '', 'pending', ''),
(5, 2, 0, '2026-10-16', 210000, '', 0, '', 'pending', ''),
(6, 2, 1, '2026-10-16', 220000, '', 0, '', 'pending', ''),
(10, 2, 0, '2026-10-16', 95000, '', 0, '', 'barang dikirim', 'A456'),
(18, 2, 1, '2026-10-17', 60000, '', 10000, 'alamat_pengiriman', 'pending', ''),
(19, 2, 1, '2026-10-17', 130000, '', 10000, 'alamat_pengiriman', 'pending', ''),
(20, 2, 2, '2026-10-17', 65000, '', 15000, 'jl.serayu no 18 bandung', 'pending', ''),
(21, 2, 1, '2026-10-17', 170000, '', 10000, 'jl.sudriman no 12 jakarta utara', 'pending', ''),
(23, 2, 2, '2026-10-23', 250000, '', 15000, 'jl raya no 12', 'pending', ''),
(25, 11, 2, '2026-10-25', 60000, '', 15000, 'jl raya 45', 'sudah kirim pembayaran', ''),
(26, 14, 1, '2026-10-25', 55000, '', 10000, 'jl raya 12', 'sudah kirim pembayaran', ''),
(27, 15, 1, '2026-10-25', 60000, '', 10000, 'dita', 'sudah kirim pembayaran', ''),
(28, 2, 1, '2026-10-26', 55000, '', 10000, 'jl raya blok m', 'sudah kirim pembayaran', ''),
(29, 16, 1, '2026-10-26', 55000, '', 10000, 'jl raya 25', 'barang dikirim', 'A456'),
(30, 17, 1, '2026-10-29', 760000, '', 10000, 'jl.raya no 23 sunter, tanjung priok, jakarta utara', 'sudah kirim pembayaran', ''),
(31, 18, 1, '2026-10-29', 55000, 'SPX Shopee', 10000, 'jl raya 12 kemayoran jakarta pusat', 'sudah kirim pembayaran', ''),
(32, 18, 2, '2026-10-29', 60000, 'JNE', 15000, 'jl raya 12 kemayoran jakarta pusat', 'sudah kirim pembayaran', ''),
(33, 21, 1, '2026-11-01', 955000, 'SPX Shopee', 10000, 'jalan', 'barang dikirim', 'A456'),
(34, 22, 2, '2026-11-01', 275000, 'JNE', 15000, 'jalan raya no 23', 'sudah kirim pembayaran', ''),
(35, 22, 1, '2026-11-01', 55000, 'SPX Shopee', 10000, 'jalan raya no 23', 'sudah kirim pembayaran', ''),
(36, 11, 1, '2026-11-02', 35000, 'SPX Shopee', 10000, 'jl raya 34\r\n', 'sudah kirim pembayaran', ''),
(37, 17, 1, '2026-11-02', 70000, 'SPX Shopee', 10000, 'jl.raya no 23 sunter, tanjung priok, jakarta utara', 'sudah kirim pembayaran', ''),
(38, 19, 1, '2026-11-02', 85000, 'SPX Shopee', 10000, 'jl raya', 'sudah kirim pembayaran', ''),
(39, 19, 2, '2026-11-02', 65000, 'JNE', 15000, 'jl raya', 'sudah kirim pembayaran', ''),
(40, 11, 1, '2026-11-03', 30000, 'SPX Shopee', 10000, 'lkb', 'sudah kirim pembayaran', ''),
(41, 11, 1, '2026-11-04', 30000, 'SPX Shopee', 10000, 'jl raya', 'sudah kirim pembayaran', ''),
(42, 23, 2, '2026-11-04', 35000, 'JNE', 15000, 'jalan raya no 19', 'pending', ''),
(43, 23, 1, '2026-11-04', 60000, 'SPX Shopee', 10000, 'jalan raya no 19', 'sudah kirim pembayaran', ''),
(44, 24, 1, '2026-11-04', 80000, 'SPX Shopee', 10000, 'jakarta', 'sudah kirim pembayaran', ''),
(45, 17, 2, '2026-11-04', 225000, 'JNE', 15000, 'jl.raya no 23 sunter, tanjung priok, jakarta utara', 'sudah kirim pembayaran', ''),
(46, 25, 1, '2026-11-05', 30000, 'SPX Shopee', 10000, 'jakarta', 'sudah kirim pembayaran', ''),
(47, 15, 1, '2026-11-08', 110000, 'SPX Shopee', 10000, 'jl raya 13', 'pending', ''),
(48, 15, 1, '2026-11-08', 60000, 'SPX Shopee', 10000, 'jl raya 13', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 1, 1, '0', 0, 0),
(2, 1, 2, 1, '0', 0, 0),
(3, 4, 3, 2, '0', 0, 0),
(4, 4, 4, 1, '0', 0, 0),
(5, 4, 5, 1, '0', 0, 0),
(6, 5, 3, 2, '0', 0, 0),
(7, 5, 4, 1, '0', 0, 0),
(8, 5, 5, 1, '0', 0, 0),
(9, 6, 3, 2, '0', 0, 0),
(10, 6, 4, 1, '0', 0, 0),
(11, 6, 5, 1, '0', 0, 0),
(19, 10, 3, 1, '0', 0, 0),
(20, 10, 4, 1, '0', 0, 0),
(29, 18, 4, 1, 'Red velvet cake', 50000, 50000),
(30, 19, 3, 1, 'Ciffon cake', 45000, 45000),
(31, 19, 6, 1, 'Biscuit cake', 75000, 75000),
(32, 20, 4, 1, 'Red velvet cake', 50000, 50000),
(33, 21, 3, 2, 'Ciffon cake', 45000, 90000),
(34, 21, 5, 1, 'Cinnamon Roll', 70000, 70000),
(36, 23, 3, 3, 'Ciffon cake', 45000, 135000),
(37, 23, 4, 2, 'Red velvet cake', 50000, 100000),
(39, 25, 3, 1, 'Ciffon cake', 45000, 45000),
(40, 26, 3, 1, 'Ciffon cake', 45000, 45000),
(41, 27, 4, 1, 'Red velvet cake', 50000, 50000),
(42, 28, 3, 1, 'Ciffon cake', 45000, 45000),
(43, 29, 3, 1, 'Ciffon cake', 45000, 45000),
(44, 30, 3, 2, 'Ciffon cake', 45000, 90000),
(45, 30, 4, 3, 'Red velvet cake', 50000, 150000),
(46, 30, 5, 3, 'Cinnamon Roll', 70000, 210000),
(47, 30, 6, 4, 'Biscuit cake', 75000, 300000),
(48, 31, 3, 1, 'Ciffon cake', 45000, 45000),
(49, 32, 3, 1, 'Ciffon cake', 45000, 45000),
(50, 33, 3, 1, 'Ciffon cake', 45000, 45000),
(51, 33, 6, 12, 'Biscuit cake', 75000, 900000),
(52, 34, 4, 1, 'Red velvet cake', 50000, 50000),
(53, 34, 5, 3, 'Cinnamon Roll', 70000, 210000),
(54, 35, 3, 1, 'Ciffon cake', 45000, 45000),
(55, 36, 5, 1, 'Cinnamon Roll', 25000, 25000),
(56, 37, 8, 2, 'Tiramisu', 30000, 60000),
(57, 38, 5, 1, 'Cinnamon Roll', 25000, 25000),
(58, 38, 4, 1, 'Red velvet cake', 50000, 50000),
(59, 39, 4, 1, 'Red velvet cake', 50000, 50000),
(60, 40, 3, 1, 'Ciffon cake', 20000, 20000),
(61, 41, 3, 1, 'Ciffon cake', 20000, 20000),
(62, 42, 3, 1, 'Ciffon cake', 20000, 20000),
(63, 43, 4, 1, 'Red velvet cake', 50000, 50000),
(64, 44, 8, 1, 'Tiramisu', 30000, 30000),
(65, 44, 7, 2, 'Brioche', 20000, 40000),
(66, 45, 3, 1, 'Ciffon cake', 20000, 20000),
(67, 45, 4, 1, 'Red velvet cake', 50000, 50000),
(68, 45, 5, 2, 'Cinnamon Roll', 25000, 50000),
(69, 45, 8, 3, 'Tiramisu', 30000, 90000),
(70, 46, 3, 1, 'Ciffon cake', 20000, 20000),
(71, 47, 4, 1, 'Red velvet cake', 50000, 50000),
(72, 47, 5, 2, 'Cinnamon Roll', 25000, 50000),
(73, 48, 4, 1, 'Red velvet cake', 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(3, 'Ciffon cake', 20000, 'Ciffoncake.jpeg', 'Kue sifon adalah kue sangat ringan yang dibuat dengan minyak sayur, telur, gula, tepung, bubuk pengembang, dan penyedap rasa. Karena dibuat dengan minyak sayur, dibandingkan dengan lemak padat tradisional seperti mentega atau shortening, lebih mudah untuk memasukkan udara ke dalam adonan. Hasilnya, kue sifon (serta kue makanan malaikat dan kue busa lainnya) akan menghasilkan tekstur yang lembut dengan putih telur dikocok secara terpisah hingga kaku lalu dilipat ke dalam adonan kue sebelum dipanggang. Sifat aerasinya bergantung pada kualitas meringue dan bahan kimia ragi.', 49),
(4, 'Red velvet cake', 50000, 'Redvelvetcake.jpeg', 'Red velvet terbuat dari campuran tepung, gula, mentega, telur, sedikit bubuk kakao, buttermilk, cuka, dan ekstrak vanili, dengan tambahan pewarna makanan merah atau jus bit untuk mendapatkan warna khasnya. ', 40),
(5, 'Cinnamon Roll', 25000, 'Cinnamon-Roll.jpg', 'Cinnamon roll berisi campuran mentega (butter), gula palem atau gula merah (brown sugar), serta bubuk kayu manis (cinnamon powder) yang dioleskan di atas adonan roti yang digulung.\r\n\r\nSelain itu, bagian atas roti ini biasanya ditambahkan topping berupa cream cheese frosting (olesan keju krim), glasur gula, atau susu kental manis agar rasanya semakin manis dan lembut.', 48),
(6, 'Roti Tawar', 20000, 'Roti-Tawar.png', 'Roti tawar adalah produk makanan olahan yang dibuat dari adonan tepung terigu yang difermentasikan menggunakan ragi roti (Saccharomyces cerevisiae), air, garam, serta tambahan bahan seperti sedikit gula, susu, atau lemak, kemudian dipanggang.', 54),
(7, 'Brioche', 20000, 'Brioche.jpeg', 'Brioche adalah jenis roti Prancis yang memiliki tekstur lembut dan sedikit manis, berkat kandungan butter, susu, dan telur yang lebih banyak dibandingkan dengan roti biasa. Perpaduan bahan-bahan ini memberikan brioche kelembutan yang hampir menyerupai pastry, dengan bagian luar berwarna cokelat keemasan yang tampak sedikit crunchy, tetapi tetap lembut saat digigit.', 28),
(8, 'Tiramisu', 30000, 'tiramisu.jpg', 'Tiramisù (Tiramesù) adalah kue khas Italia dengan taburan bubuk kakao di atasnya. Kue ini merupakan hidangan penutup yang dimakan dengan sendok, sehingga digolongkan ke dalam hidangan \"al llcucchiaio\" (\"dengan sendok\").', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pembayaran_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkir` (`id_ongkir`),
  ADD KEY `id_ongkir_2` (`id_ongkir`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `fk_pembelian_produk` (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `fk_pembelian_produk` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `pembelian_produk` (`id_pembelian_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
