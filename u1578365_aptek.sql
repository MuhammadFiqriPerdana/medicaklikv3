-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2023 pada 17.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1578365_aptek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `toko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inv`
--

CREATE TABLE `inv` (
  `invid` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `tgl_inv` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `toko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inv`
--

INSERT INTO `inv` (`invid`, `invoice`, `tgl_inv`, `pembayaran`, `kembalian`, `status`, `toko`) VALUES
(88, 'AD25123114715', '2023-01-25 04:47:41', 0, 0, 'proses', 'Apotek Hamada Farma'),
(89, 'AD25123114815', '2023-01-25 04:48:08', 0, 0, 'proses', 'Apotek Hamada Farma'),
(107, 'AD25123124024', '2023-01-25 05:40:35', 0, 0, 'proses', 'Apotek Hamada Farma'),
(111, 'AD25123125225', '2023-01-25 05:52:01', 0, 0, 'proses', 'Apotek Hamada Farma'),
(112, 'AD25123125426', '2023-01-25 05:54:22', 0, 0, 'proses', 'Apotek Hamada Farma'),
(126, 'AD25123134435', '2023-01-25 06:44:42', 0, 0, 'proses', 'Apotek Hamada Farma'),
(127, 'AD25123134635', '2023-01-25 06:46:02', 0, 0, 'proses', 'Apotek Hamada Farma'),
(128, 'AD25123134835', '2023-01-25 06:48:52', 0, 0, 'proses', 'Apotek Hamada Farma'),
(129, 'AD25123135035', '2023-01-25 06:50:00', 0, 0, 'proses', 'Apotek Hamada Farma'),
(132, 'AD25123135436', '2023-01-25 06:54:07', 0, 0, 'proses', 'Apotek Hamada Farma'),
(135, 'AD25123141141', '2023-01-25 07:11:34', 0, 0, 'proses', 'Apotek Hamada Farma'),
(136, 'AD25123141242', '2023-01-25 07:12:35', 0, 0, 'proses', 'Apotek Hamada Farma'),
(151, 'AD1132395014', '2023-03-11 02:50:18', 0, 0, 'proses', 'Apotek Hamada Farma'),
(154, 'AD19423123142', '2023-04-19 06:01:54', 100000, 90000, 'selesai', 'Apotek Hamada Farma'),
(155, 'AD19423145442', '2023-04-19 07:54:58', 50000, 11500, 'selesai', 'Apotek Hamada Farma'),
(156, 'AD19423145442', '2023-04-19 07:54:58', 50000, 11500, 'selesai', 'Apotek Hamada Farma'),
(157, 'AD19423145542', '2023-04-19 07:56:00', 50000, 27000, 'selesai', 'Apotek Hamada Farma'),
(158, 'AD19423145642', '2023-04-19 07:56:49', 20000, 10000, 'selesai', 'Apotek Hamada Farma'),
(159, 'AD19423150142', '2023-04-19 08:01:59', 10000, 0, 'selesai', 'Apotek Hamada Farma'),
(160, 'AD19423150142', '2023-04-19 08:01:59', 10000, 0, 'selesai', 'Apotek Hamada Farma'),
(161, 'AD19423150242', '2023-04-19 08:02:19', 12000, 0, 'selesai', 'Apotek Hamada Farma'),
(162, 'AD19423150442', '2023-04-19 08:05:03', 10000, 5000, 'selesai', 'Apotek Hamada Farma'),
(163, 'AD19423150442', '2023-04-19 08:05:03', 10000, 5000, 'selesai', 'Apotek Hamada Farma'),
(165, 'AD1952392642', '2023-05-19 02:26:46', 100000, 23000, 'selesai', 'Apotek Hamada Farma'),
(166, 'AD1952392642', '2023-05-19 02:26:46', 100000, 23000, 'selesai', 'Apotek Hamada Farma'),
(167, 'AD1952393142', '2023-05-19 02:32:01', 20000, 3500, 'selesai', 'Apotek Hamada Farma'),
(168, 'AD3152381042', '2023-05-31 01:10:07', 0, 0, 'proses', 'Apotek Hamada Farma'),
(169, 'AD3152381011', '2023-05-31 01:10:37', 0, 0, 'proses', 'Apotek Hamada Farma'),
(170, 'AD3152381511', '2023-05-31 01:15:49', 0, 0, 'proses', 'Apotek Hamada Farma'),
(171, 'AD3152381716', '2023-05-31 01:17:54', 10000, 0, 'selesai', 'Apotek Hamada Farma'),
(172, 'AD3623113618', '2023-06-03 04:36:55', 10000, 5000, 'selesai', 'Apotek Hamada Farma'),
(173, 'AD3623140737', '2023-06-03 07:07:38', 10000, 5000, 'selesai', 'Apotek Hamada Farma'),
(174, 'AD3623141508', '2023-06-03 07:15:32', 10000, 4000, 'selesai', 'Apotek Hamada Farma'),
(175, 'AD3623190516', '2023-06-03 12:05:59', 20000, 0, 'selesai', 'Apotek Hamada Farma'),
(176, 'AD3623190606', '2023-06-03 12:06:55', 25000, 2000, 'selesai', 'Apotek Hamada Farma'),
(177, 'AD3623190807', '2023-06-03 12:08:26', 30000, 4000, 'selesai', 'Apotek Hamada Farma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `toko` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`idlaporan`, `invoice`, `kode_produk`, `nama_produk`, `harga`, `harga_modal`, `qty`, `subtotal`, `toko`, `user`) VALUES
(23, 'AD1952392642', '8993176110081', 'Minyak Kayu Putih Cap Lang 30 Ml	', 12000, 10000, 1, 12000, 'Apotek Hamada Farma', ''),
(25, 'AD1952393142', '8993176803099', 'Telon Lang 60 Ml', 16500, 12000, 1, 16500, 'Apotek Hamada Farma', ''),
(26, 'AD3152381716', '8993176120035', 'BALSEM LANG 10 G	', 5000, 0, 2, 10000, 'Apotek Hamada Farma', 'admin_toko'),
(27, 'AD3623113618', '8993176120035', 'BALSEM LANG 10 G	', 5000, 0, 1, 5000, 'Apotek Hamada Farma', 'admin_toko'),
(28, 'AD3623140737', '8993176120035', 'BALSEM LANG 10 G	', 5000, 0, 1, 5000, 'Apotek Hamada Farma', 'admin_toko'),
(29, 'AD3623141508', '8993176110098', 'Minyak Kayu Putih Cap Lang 15 Ml	', 6000, 4917, 1, 6000, 'Apotek Hamada Farma', 'admin_toko'),
(30, 'AD3623190516', '8993176120028', 'BALSEM LANG 20 G	', 9000, 0, 1, 9000, 'Apotek Hamada Farma', 'admin_toko'),
(31, 'AD3623190516', '8994472000021', 'Minyak Angin Cap Kapak 5 Ml	', 11000, 8634, 1, 11000, 'Apotek Hamada Farma', 'admin_toko'),
(33, 'AD3623190606', '8999908909305', 'My Baby Minyak Telon 90 Ml Lavender	', 23000, 19000, 1, 23000, 'Apotek Hamada Farma', ''),
(34, 'AD3623190807', '8993176111439', 'GPU CREAM MINYAK SEREH 250 G	', 26000, 0, 1, 26000, 'Apotek Hamada Farma', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `toko`, `alamat`, `telepon`, `logo`, `level`, `role`) VALUES
(1, 'kasir', '$2y$10$WaF091Ie8vpEudi5alKe3e/vjl90dlIaBw/fZphnbxIkUASszG4nu', 'Apotek Hamada Farma', ' Jl. Mistar Cokrokusumo Komp PU RT 015/Rw 003 Kel. Sungai Besar', '082159189645', 'user.png', '3', 'Kasir'),
(5, 'admin_toko', '$2y$10$WaF091Ie8vpEudi5alKe3e/vjl90dlIaBw/fZphnbxIkUASszG4nu', 'Apotek Hamada Farma', ' Jl. Mistar Cokrokusumo Komp PU RT 015/Rw 003 Kel. Sungai Besar', '082159189645', 'user.png', '2', 'Admin Toko'),
(6, 'su', '$2y$10$WaF091Ie8vpEudi5alKe3e/vjl90dlIaBw/fZphnbxIkUASszG4nu', 'Meditec', '', '', 'user.png', '1', 'Super User'),
(7, 'dana', '$2y$10$t//qfE1s3W.sWC4i555pMeSmSPHkxwWpR5OVD.Xd8GLPbOJVXrlEK', 'amanda_pancing', 'Jl. Karamunting No.40', '081252170696', '', '2', 'Admin Toko'),
(8, 'dana1', '$2y$10$LWgTnnmDwHbifqYg9ywsg.Iu6734ZKbK.ofd/9m3QYXpOMc1zID3u', 'amanda_pancing', 'Jl. Karamunting No.40', '081252170696', '', '3', 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_modal` varchar(255) NOT NULL,
  `harga_jual_asal` varchar(255) NOT NULL,
  `diskon` varchar(255) NOT NULL,
  `pajak` varchar(255) NOT NULL,
  `harga_jual_setelah` varchar(255) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `stok` varchar(255) NOT NULL,
  `toko` varchar(255) NOT NULL,
  `id_suplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `kode_produk`, `nama_produk`, `harga_modal`, `harga_jual_asal`, `diskon`, `pajak`, `harga_jual_setelah`, `tgl_input`, `tgl_kadaluarsa`, `stok`, `toko`, `id_suplier`) VALUES
(56, '8993176812039', 'BALSEM OTOT GELIGA	', '0', '5000', '', '', '5000', '2023-03-13', '2027-05-01', '16', 'Apotek Hamada Farma', 1),
(57, '8993176120035', 'BALSEM LANG 10 G	', '0', '5000', '', '', '5000', '2023-03-13', '2027-07-01', '4', 'Apotek Hamada Farma', 1),
(58, '8993176120028', 'BALSEM LANG 20 G	', '0', '9000', '', '', '9000', '2023-03-13', '2027-06-01', '10', 'Apotek Hamada Farma', 1),
(59, '8993176720723', 'GPU CREAM MINYAK PALA 150 G	', '0', '22000', '', '', '22000', '2023-03-13', '2025-07-01', '1', 'Apotek Hamada Farma', 1),
(60, '8993176111439', 'GPU CREAM MINYAK SEREH 250 G	', '0', '26000', '', '', '26000', '2023-03-13', '2024-12-01', '0', 'Apotek Hamada Farma', 1),
(61, '8993176110098', 'Minyak Kayu Putih Cap Lang 15 Ml	', '4917', '6000', '', '', '6000', '2023-03-20', '2028-01-01', '9', 'Apotek Hamada Farma', 1),
(62, '8993176110081', 'Minyak Kayu Putih Cap Lang 30 Ml	', '10000', '12000', '', '', '12000', '2023-03-20', '2027-06-01', '12', 'Apotek Hamada Farma', 1),
(63, '8993176110074', 'Minyak Kayu Putih Cap Lang 60 Ml', '18000', '21000', '', '', '21000', '2023-03-20', '2027-07-31', '6', 'Apotek Hamada Farma', 1),
(64, '8993176110067', 'Minyak Kayu Putih Cap Lang 120 Ml	', '33417', '38500', '', '', '38500', '2023-03-20', '2028-01-01', '0', 'Apotek Hamada Farma', 1),
(65, '8993176120059', 'Balsem Aktiv 40 gr	', '12084', '15500', '', '', '15500', '2023-03-20', '2027-11-01', '1', 'Apotek Hamada Farma', 1),
(66, '8993176120066', 'Balsem Aktiv 20 Gr	', '6750', '8500', '', '', '8500', '2023-03-20', '2027-01-01', '2', 'Apotek Hamada Farma', 1),
(67, '8993176111453', 'Minyak Urut GPU 30 Ml (Minyak Jahe)	', '6750', '8500', '', '', '8500', '2023-03-20', '2027-03-01', '3', 'Apotek Hamada Farma', 1),
(68, '8993176111477', 'Minyak Urut GPU 60 Ml (Minyak Jahe)	', '14834', '18000', '', '', '18000', '2023-03-20', '2027-03-01', '5', 'Apotek Hamada Farma', 1),
(69, '8993176720648', 'Minyak Urut GPU 120 Ml (Minyak Jahe)	', '22250', '25500', '', '', '25500', '2023-03-20', '2027-03-01', '1', 'Apotek Hamada Farma', 1),
(70, '8994472000014', 'Minyak Angin Cap Kapak 3 Ml	', '4955', '7000', '', '', '7000', '2023-03-20', '2027-04-01', '7', 'Apotek Hamada Farma', 1),
(71, '8994472000021', 'Minyak Angin Cap Kapak 5 Ml	', '8634', '11000', '', '', '11000', '2023-03-20', '2023-07-01', '5', 'Apotek Hamada Farma', 1),
(72, '8994472000045	', 'Minyak Angin Cap Kapak 14 Ml	', '18619', '22000', '', '', '22000', '2023-03-20', '2027-09-01', '8', 'Apotek Hamada Farma', 1),
(73, '8994472000052', 'Minyak Angin Cap Kapak 28 Ml	', '31907', '35000', '', '', '35000', '2023-03-20', '2027-11-01', '6', 'Apotek Hamada Farma', 1),
(74, '8994472000069	', 'Minyak Angin Cap Kapak 56 Ml	', '58183', '63500', '', '', '63500', '2023-03-20', '2027-12-01', '3', 'Apotek Hamada Farma', 1),
(75, '8995179100229', 'Minyak Angin Cap Gajah 2 Ml	', '2000', '3500', '', '', '3500', '2023-03-20', '2026-02-01', '22', 'Apotek Hamada Farma', 1),
(76, '8995179100083	', 'Minyak Kayu Putih Cap Gajah 15 Ml	', '4925', '6500', '', '', '6500', '2023-03-20', '2026-10-01', '17', 'Apotek Hamada Farma', 1),
(77, '8995179100090', 'Minyak Kayu Putih Cap Gajah 30 Ml	', '10000', '12000', '', '', '12000', '2023-03-20', '2025-12-01', '12', 'Apotek Hamada Farma', 1),
(78, '8995179100106', 'Minyak Kayu Putih Cap Gajah 60 Ml	', '17045', '20500', '', '', '20500', '2023-03-20', '0001-01-01', '12', 'Apotek Hamada Farma', 1),
(79, '8995179100113', 'Minyak Kayu Putih Cap Gajah 120 Ml	', '37467', '41000', '', '', '41000', '2023-03-20', '2026-10-01', '3', 'Apotek Hamada Farma', 1),
(80, '8993176111255', 'Minyak Kayu Putih Aromatherapy Original 15 Ml	', '5416', '7000', '', '', '7000', '2023-03-20', '2023-05-01', '12', 'Apotek Hamada Farma', 1),
(81, '8993176111262', 'Minyak Kayu Putih Aromatherapy Original 30 Ml	', '9917', '12000', '', '', '12000', '2023-03-20', '2026-10-01', '12', 'Apotek Hamada Farma', 1),
(82, '8993176803198', 'Telon Lang 15 Ml	', '2750', '5500', '', '', '5500', '2023-03-13', '2027-07-01', '2', 'Apotek Hamada Farma', 1),
(83, '8993176110135', 'Telon Lang 30 Ml	', '7000', '10000', '', '', '10000', '2023-03-13', '2027-11-01', '3', 'Apotek Hamada Farma', 1),
(84, '8993176803099', 'Telon Lang 60 Ml', '12000', '16500', '', '', '16500', '2023-03-13', '2027-10-01', '2', 'Apotek Hamada Farma', 1),
(85, '8993176803105', 'Telon Lang 100 Ml	', '23000', '26500', '', '', '26500', '2023-03-13', '2027-10-01', '1', 'Apotek Hamada Farma', 1),
(86, '8999908284907	', 'My Baby Minyak Telon 90 Ml	', '19000', '23000', '', '', '23000', '2023-03-13', '2024-02-29', '10', 'Apotek Hamada Farma', 1),
(88, '8999908204202', 'My Baby Minyak Telon 60 Ml	', '14000', '17000', '', '', '17000', '2023-03-13', '2024-06-30', '11', 'Apotek Hamada Farma', 1),
(89, '8999908909305', 'My Baby Minyak Telon 90 Ml Lavender	', '19000', '23000', '', '', '23000', '2023-03-13', '2024-03-30', '8', 'Apotek Hamada Farma', 1),
(90, '8999908909206', 'My Baby Minyak Telon 60 Ml Lavender	', '14000', '17000', '', '', '17000', '2023-03-13', '2024-07-31', '11', 'Apotek Hamada Farma', 1),
(91, '8993176111354', 'Telon Lang Plus 60 Ml	', '13000', '16500', '', '', '16500', '2023-03-13', '2027-10-30', '2', 'Apotek Hamada Farma', 1),
(92, '6971008024524', '', '', '', '', '', '0', '0000-00-00', '0000-00-00', '', 'Apotek Hamada Farma', 0),
(93, '6971008024524', '', '', '', '', '', '0', '0000-00-00', '0000-00-00', '', 'Apotek Hamada Farma', 0),
(94, '6971008024524', '6971008024524', '', '', '', '', '0', '0000-00-00', '0000-00-00', '', 'Apotek Hamada Farma', 0),
(95, '69710080245246971008024524', '6971008024524', '', '', '', '', '0', '0000-00-00', '0000-00-00', '', 'Apotek Hamada Farma', 0),
(96, '6971008024524', '6971008024524', '', '', '', '', '0', '0000-00-00', '0000-00-00', '', 'Apotek Hamada Farma', 0),
(97, '9789792965568', '6971008024524', '', '', '', '', '0', '0000-00-00', '0000-00-00', '', 'Apotek Hamada Farma', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `idproduk` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `toko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `telepon`, `keterangan`, `toko`) VALUES
(2, '\r\n\r\n\r\n\r\nPT. Isotekindo Intertama', '', '', '', 'Apotek Hamada Farma'),
(3, 'PT. BUANA INTIPRIMA USAHA', '', '', '', 'Apotek Hamada Farma'),
(4, 'TUGU', '', '', '', 'amanda_pancing');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`);

--
-- Indeks untuk tabel `inv`
--
ALTER TABLE `inv`
  ADD PRIMARY KEY (`invid`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `inv`
--
ALTER TABLE `inv`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
