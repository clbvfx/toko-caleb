-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2024 pada 05.56
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko-caleb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` enum('makanan','minuman') NOT NULL,
  `stok` int(10) UNSIGNED NOT NULL,
  `harga_beli` int(10) UNSIGNED NOT NULL,
  `harga_jual` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `kategori`, `stok`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(6, 'dawet', 'minuman', 90, 10000, 15000, '2024-03-20 02:48:42', '2024-03-20 02:52:56'),
(7, 'Ote-Ote', 'makanan', 55, 5000, 8000, '2024-03-20 02:49:51', '2024-03-20 02:53:32'),
(8, 'Rawon', 'makanan', 30, 12000, 15000, '2024-03-20 02:51:55', NULL),
(9, 'Tahu Tek', 'makanan', 20, 15000, 20000, '2024-03-20 02:55:14', NULL),
(10, 'Wedang Uwuh', 'minuman', 50, 10000, 15000, '2024-03-20 02:56:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_harga` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_barang`, `jumlah`, `total_harga`, `id_staff`, `created_at`, `updated_at`) VALUES
(11, 7, 5, 25000, 9, '2024-03-20 02:53:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_harga` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_barang`, `jumlah`, `total_harga`, `id_staff`, `created_at`, `updated_at`) VALUES
(8, 6, 9, 135000, 9, '2024-03-20 02:52:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('BOS','admin','keuangan','logistik') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(2, 'koco', '$2a$12$x9HmMZa/EejYxOewF.r06eFMt3ZQt4S3V7Cof3bFOXGERatKJU12G', 'admin', '2024-02-02 02:27:16', '2024-03-15 03:42:31'),
(4, 'kucinglangka', '$2y$10$PK62bAazPQnWp.BRAC8bseGT8b44jVR8Zy0uYm5/B7rs8T7.73ITG', 'logistik', '2024-02-02 02:59:17', '2024-02-15 02:11:41'),
(5, 'ADI', '$2y$10$PANfq6O4AEkOXcTRXgrnWed9TfGted1iH4oU.Jc0A8IcoKNfd25/a', 'keuangan', '2024-02-02 05:04:22', '2024-02-15 02:13:11'),
(6, 'KONCO', '$2a$12$2dBbyCz0zCbIFurAq73qxemJg50GYGn8TmykLsz6EHwboLdwTtLEu\r\n', 'admin', '2024-02-23 03:09:47', '2024-02-23 03:11:57'),
(8, 'mangunkusumo', '$2y$10$yqdVu46eUQV.e8OPHYI/jOT/7qVA3PDcYeXTdEjEiGNLuyEtTg8LG', 'admin', '2024-03-15 05:15:20', NULL),
(9, 'CALEB', '$2a$12$mNHCGvyP4wyyqCACSO45eOUVH6Iww5iEMhNgEtBGIBj8.IYkxStKW', 'BOS', '2024-03-19 04:50:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
