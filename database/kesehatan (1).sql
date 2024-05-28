-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 04.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesehatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`) VALUES
(1, 'Batuk'),
(3, 'Flu'),
(5, 'Anti nyeri & pusing'),
(10, 'Herbal'),
(11, 'Demam'),
(21, 'Alergi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(1000) NOT NULL,
  `stok_obat` varchar(100) NOT NULL,
  `harga_obat` varchar(100) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok_obat`, `harga_obat`, `id_kat`, `img`) VALUES
(46, 'Panadol', '97', '9000', 5, '1371183900_download (1).jpg'),
(47, 'Hufagrip', '5', '27500', 11, '1087353427_a861c8ad-cb73-42b0-b28f-1ebe0db8b1b6.jpg'),
(48, 'Siladex-Batuk Berdahak', '5', '15000', 1, '1446673394_download (2).jpg'),
(49, 'Sanmol', '10', '8000', 11, '583340896_download.jpg'),
(50, 'Cetirizine', '9', '10000', 21, '861182879_images.jpg'),
(51, 'Antangin', '9', '6000', 10, '1941130059_Screenshot 2024-05-27 132746.png'),
(52, 'Intunal', '9', '5000', 3, '156204644_Screenshot 2024-05-27 132832.png'),
(53, 'Demacolin', '10', '8000', 3, '1780630986_Screenshot 2024-05-27 132858.png'),
(54, 'Bodrex', '9', '6000', 5, '1502205343_Screenshot 2024-05-27 133148.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `Jenis` varchar(1000) NOT NULL,
  `Harga_ongkir` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `Jenis`, `Harga_ongkir`) VALUES
(1, 'Cepat', '30000'),
(2, 'Sedang', '20000'),
(3, 'Standar', '15000'),
(4, 'Super Cepat', '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_pay` int(11) NOT NULL,
  `method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_pay`, `method`) VALUES
(1, 'Qris'),
(2, 'Gopay'),
(3, 'Transfer'),
(4, 'Shoppepay');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `id_pay` int(11) NOT NULL,
  `nama_pembeli` varchar(1000) NOT NULL,
  `Alamat` varchar(1000) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga` varchar(1000) NOT NULL,
  `qty` varchar(1000) NOT NULL,
  `total` varchar(10000) NOT NULL,
  `payment` varchar(1000) NOT NULL,
  `Jenis` varchar(1000) NOT NULL,
  `Harga_ongkir` varchar(100) NOT NULL,
  `tanggal_pembelian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_user`, `id_obat`, `id_ongkir`, `id_pay`, `nama_pembeli`, `Alamat`, `nama_obat`, `harga`, `qty`, `total`, `payment`, `Jenis`, `Harga_ongkir`, `tanggal_pembelian`) VALUES
(81, 51, 54, 4, 3, 'akbar', 'Ngerti dewe', 'Bodrex', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(82, 51, 52, 4, 3, 'akbar', 'Ngerti dewe', 'Intunal', '5000', '1', '5000', '3', 'Super Cepat', '50000', '2024-05-27'),
(83, 51, 51, 4, 3, 'akbar', 'Ngerti dewe', 'Antangin', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(84, 51, 48, 4, 3, 'akbar', 'Ngerti dewe', 'Siladex-Batuk Berdahak', '15000', '2', '30000', '3', 'Super Cepat', '50000', '2024-05-27'),
(85, 51, 47, 4, 3, 'akbar', 'Ngerti dewe', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-27'),
(86, 51, 46, 4, 3, 'akbar', 'Ngerti dewe', 'Panadol', '9000', '1', '9000', '3', 'Super Cepat', '50000', '2024-05-27'),
(87, 51, 54, 4, 3, 'akbar', 'Ngerti dewe', 'Bodrex', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(88, 51, 52, 4, 3, 'akbar', 'Ngerti dewe', 'Intunal', '5000', '1', '5000', '3', 'Super Cepat', '50000', '2024-05-27'),
(89, 51, 51, 4, 3, 'akbar', 'Ngerti dewe', 'Antangin', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(90, 51, 48, 4, 3, 'akbar', 'Ngerti dewe', 'Siladex-Batuk Berdahak', '15000', '2', '30000', '3', 'Super Cepat', '50000', '2024-05-27'),
(91, 51, 47, 4, 3, 'akbar', 'Ngerti dewe', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-27'),
(92, 51, 46, 4, 3, 'akbar', 'Ngerti dewe', 'Panadol', '9000', '1', '9000', '3', 'Super Cepat', '50000', '2024-05-27'),
(93, 51, 54, 4, 3, 'akbar', 'Ngerti dewe', 'Bodrex', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(94, 51, 52, 4, 3, 'akbar', 'Ngerti dewe', 'Intunal', '5000', '1', '5000', '3', 'Super Cepat', '50000', '2024-05-27'),
(95, 51, 51, 4, 3, 'akbar', 'Ngerti dewe', 'Antangin', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(96, 51, 48, 4, 3, 'akbar', 'Ngerti dewe', 'Siladex-Batuk Berdahak', '15000', '2', '30000', '3', 'Super Cepat', '50000', '2024-05-27'),
(97, 51, 47, 4, 3, 'akbar', 'Ngerti dewe', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-27'),
(98, 51, 46, 4, 3, 'akbar', 'Ngerti dewe', 'Panadol', '9000', '1', '9000', '3', 'Super Cepat', '50000', '2024-05-27'),
(99, 51, 54, 4, 3, 'akbar', 'Ngerti dewe', 'Bodrex', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(100, 51, 52, 4, 3, 'akbar', 'Ngerti dewe', 'Intunal', '5000', '1', '5000', '3', 'Super Cepat', '50000', '2024-05-27'),
(101, 51, 51, 4, 3, 'akbar', 'Ngerti dewe', 'Antangin', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(102, 51, 48, 4, 3, 'akbar', 'Ngerti dewe', 'Siladex-Batuk Berdahak', '15000', '2', '30000', '3', 'Super Cepat', '50000', '2024-05-27'),
(103, 51, 47, 4, 3, 'akbar', 'Ngerti dewe', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-27'),
(104, 51, 46, 4, 3, 'akbar', 'Ngerti dewe', 'Panadol', '9000', '1', '9000', '3', 'Super Cepat', '50000', '2024-05-27'),
(105, 51, 54, 4, 3, 'akbar', 'Ngerti dewe', 'Bodrex', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(106, 51, 52, 4, 3, 'akbar', 'Ngerti dewe', 'Intunal', '5000', '1', '5000', '3', 'Super Cepat', '50000', '2024-05-27'),
(107, 51, 51, 4, 3, 'akbar', 'Ngerti dewe', 'Antangin', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(108, 51, 48, 4, 3, 'akbar', 'Ngerti dewe', 'Siladex-Batuk Berdahak', '15000', '2', '30000', '3', 'Super Cepat', '50000', '2024-05-27'),
(109, 51, 47, 4, 3, 'akbar', 'Ngerti dewe', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-27'),
(110, 51, 46, 4, 3, 'akbar', 'Ngerti dewe', 'Panadol', '9000', '1', '9000', '3', 'Super Cepat', '50000', '2024-05-27'),
(111, 51, 54, 4, 3, 'akbar', 'Ngerti dewe', 'Bodrex', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(112, 51, 52, 4, 3, 'akbar', 'Ngerti dewe', 'Intunal', '5000', '1', '5000', '3', 'Super Cepat', '50000', '2024-05-27'),
(113, 51, 51, 4, 3, 'akbar', 'Ngerti dewe', 'Antangin', '6000', '1', '6000', '3', 'Super Cepat', '50000', '2024-05-27'),
(114, 51, 48, 4, 3, 'akbar', 'Ngerti dewe', 'Siladex-Batuk Berdahak', '15000', '2', '30000', '3', 'Super Cepat', '50000', '2024-05-27'),
(115, 51, 47, 4, 3, 'akbar', 'Ngerti dewe', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-27'),
(116, 51, 46, 4, 3, 'akbar', 'Ngerti dewe', 'Panadol', '9000', '1', '9000', '3', 'Super Cepat', '50000', '2024-05-27'),
(117, 58, 46, 4, 4, 'Muhammad Arga', 'pecantingan', 'Panadol', '9000', '2', '18000', '4', 'Super Cepat', '50000', '2024-05-27'),
(118, 58, 47, 4, 4, 'Muhammad Arga', 'pecantingan', 'Hufagrip', '27500', '1', '27500', '4', 'Super Cepat', '50000', '2024-05-27'),
(119, 58, 48, 4, 4, 'Muhammad Arga', 'pecantingan', 'Siladex-Batuk Berdahak', '15000', '1', '15000', '4', 'Super Cepat', '50000', '2024-05-27'),
(120, 58, 50, 4, 4, 'Muhammad Arga', 'pecantingan', 'Cetirizine', '10000', '1', '10000', '4', 'Super Cepat', '50000', '2024-05-27'),
(121, 58, 46, 4, 4, 'Muhammad Arga', 'pecantingan', 'Panadol', '9000', '2', '18000', '4', 'Super Cepat', '50000', '2024-05-27'),
(122, 58, 47, 4, 4, 'Muhammad Arga', 'pecantingan', 'Hufagrip', '27500', '1', '27500', '4', 'Super Cepat', '50000', '2024-05-27'),
(123, 58, 48, 4, 4, 'Muhammad Arga', 'pecantingan', 'Siladex-Batuk Berdahak', '15000', '1', '15000', '4', 'Super Cepat', '50000', '2024-05-27'),
(124, 58, 50, 4, 4, 'Muhammad Arga', 'pecantingan', 'Cetirizine', '10000', '1', '10000', '4', 'Super Cepat', '50000', '2024-05-27'),
(125, 58, 46, 4, 4, 'Muhammad Arga', 'pecantingan', 'Panadol', '9000', '2', '18000', '4', 'Super Cepat', '50000', '2024-05-27'),
(126, 58, 47, 4, 4, 'Muhammad Arga', 'pecantingan', 'Hufagrip', '27500', '1', '27500', '4', 'Super Cepat', '50000', '2024-05-27'),
(127, 58, 48, 4, 4, 'Muhammad Arga', 'pecantingan', 'Siladex-Batuk Berdahak', '15000', '1', '15000', '4', 'Super Cepat', '50000', '2024-05-27'),
(128, 58, 50, 4, 4, 'Muhammad Arga', 'pecantingan', 'Cetirizine', '10000', '1', '10000', '4', 'Super Cepat', '50000', '2024-05-27'),
(129, 58, 46, 4, 4, 'Muhammad Arga', 'pecantingan', 'Panadol', '9000', '2', '18000', '4', 'Super Cepat', '50000', '2024-05-27'),
(130, 58, 47, 4, 4, 'Muhammad Arga', 'pecantingan', 'Hufagrip', '27500', '1', '27500', '4', 'Super Cepat', '50000', '2024-05-27'),
(131, 58, 48, 4, 4, 'Muhammad Arga', 'pecantingan', 'Siladex-Batuk Berdahak', '15000', '1', '15000', '4', 'Super Cepat', '50000', '2024-05-27'),
(132, 58, 50, 4, 4, 'Muhammad Arga', 'pecantingan', 'Cetirizine', '10000', '1', '10000', '4', 'Super Cepat', '50000', '2024-05-27'),
(133, 58, 47, 1, 4, 'Muhammad Arga', 'SMK TELKOM SIDOARJO', 'Hufagrip', '27500', '1', '27500', '4', 'Cepat', '30000', '2024-05-27'),
(135, 59, 48, 4, 2, 'now', 'SMK TELKOM SIDOARJO', 'Siladex-Batuk Berdahak', '15000', '1', '15000', '2', 'Super Cepat', '50000', '2024-05-27'),
(136, 56, 47, 4, 3, 'nanda', 'SMK TELKOM SIDOARJO', 'Hufagrip', '27500', '1', '27500', '3', 'Super Cepat', '50000', '2024-05-28'),
(137, 51, 47, 4, 1, 'akbar', 'rumah gladys', 'Hufagrip', '27500', '1', '27500', '1', 'Super Cepat', '50000', '2024-05-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(39, 'admin', 'admin123@gmail.com', '90', 'admin'),
(40, 'louis', 'lois@g.j', '1234', 'user'),
(41, 'nabil12', 'nabil@h.k', '45', 'user'),
(43, 'louisgay', 'gay@g.c', '12', 'user'),
(44, 'arga', 'arga@gmail.c', '1', 'user'),
(45, 'u', 'u@i', '0', 'user'),
(46, 'keren', 'keren@g.c', '1', 'user'),
(47, 'Nabil ganz', 'nabilganz@gmail.com', '111', 'user'),
(48, 'jawa', 'jawa@f.c', '34', 'user'),
(50, 'Nabil', 'nabil@g.c', '7', 'user'),
(51, 'akbar', 'akbar@f.a', '89', 'user'),
(52, 'Arga', 'arga9@g.c', '34', 'user'),
(53, 'Febri', 'febri@gmail.com', '12345', 'user'),
(54, 'Rajindra', 'Rajin@g.c', '5', 'user'),
(55, 'nabil', 'nabilqw@g.c', '45', 'user'),
(56, 'nanda', 'nandaps@g.c', '89', 'user'),
(57, 'nanda2', 'nanda@gmail.com', '1234', 'user'),
(58, 'Muhammad Arga', 'arga12.@gmail.c', '1245', 'user'),
(59, 'now', 'now@gmai.c', '123', 'user'),
(60, 'iloveyou', 'iloveyou@g.c', '897', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `fk_id_kat` (`id_kat`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_pay`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `idx_id_user` (`id_user`),
  ADD KEY `idx_id_obat` (`id_obat`),
  ADD KEY `id_ongkir` (`id_ongkir`),
  ADD KEY `id_pay` (`id_pay`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_pay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_id_kat` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`),
  ADD CONSTRAINT `pembelian_ibfk_4` FOREIGN KEY (`id_pay`) REFERENCES `payment` (`id_pay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
