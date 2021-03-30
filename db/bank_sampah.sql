-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Mar 2021 pada 12.18
-- Versi server: 5.7.33-0ubuntu0.18.04.1
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_sampah` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_sampah`, `berat`, `harga`, `harga_total`, `ket`, `created_at`, `updated_at`) VALUES
(6, 12, 1, 5, 1001, 5005, NULL, '2021-03-21 03:08:05', '2021-03-21 03:08:05'),
(7, 12, 2, 1, 4000, 4000, NULL, '2021-03-21 03:08:05', '2021-03-21 03:08:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-02-25-180650', 'App\\Database\\Migrations\\Users', 'default', 'App', 1614279057, 1),
(2, '2021-02-25-181838', 'App\\Database\\Migrations\\Sampah', 'default', 'App', 1614279057, 1),
(3, '2021-02-25-182427', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1614279058, 1),
(4, '2021-02-25-183434', 'App\\Database\\Migrations\\DetailTransaksi', 'default', 'App', 1614279059, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `des` varchar(255) DEFAULT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`id`, `jenis`, `slug`, `harga`, `des`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'buku', 'buku', 1001, 'botol plastik', '1614352909_91978bf0858cd099b018.png', '2021-02-25 12:56:14', '2021-03-20 01:37:03'),
(2, 'Besi', 'besi', 4000, 'potongan besi / logam', '1616239469_4fb0fa7be495235f3c82.png', '2021-03-20 06:24:29', '2021-03-20 06:24:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_transaksi` varchar(25) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_admin`, `id_user`, `jenis_transaksi`, `total_harga`, `created_at`, `updated_at`) VALUES
(12, 1, 23, 'masuk', 9005, '2021-03-21 03:08:05', '2021-03-21 03:08:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `saldo` int(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `rt`, `rw`, `sampul`, `level`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'Bayu Setiaji, S.Kom', 'admin', '$2y$10$URJ0NXWyY.EMz/DYqzRC6O8XSrI4h/Z7gtGSnKxDjYrRQFNgTCbpW', '1', '1', '1616433725_859d92185a4b7f280f8a.jpg', 'admin', 44004, '2021-02-26 01:53:28', '2021-03-24 08:14:10'),
(23, 'sasa', 'sasa', '$2y$10$WfHW48AEKG5Hfo5qUrvZ0.Q0QCqYgGRHH6Io0GtglvOzDswhroTuu', '1', '1', 'profil.svg', 'user', 9005, '2021-03-09 17:19:12', '2021-03-21 03:08:05'),
(34, 'mamat', 'mamat', '$2y$10$uT6LmJpfm0iw8KOpUayQYuAJ0g6fNU9skXMAhW1phCYDoU2LWKvxO', '1', '2', 'profil.svg', 'user', 5000, '2021-03-10 01:53:16', '2021-03-10 02:32:21'),
(38, 'Rahmat', 'Rahmat', '$2y$10$5YSY1jikHcT2gB3MGL.rj.rmk31bEcdrW7HErSu6w5SQ/IiOkICG2', '2', '2', '1615533145_0548c092fa5d17a49ac4.png', 'user', 0, '2021-03-12 01:11:52', '2021-03-12 01:27:47'),
(39, 'coba', 'coba', '$2y$10$dxyIE4dgQTHz9KgwMM2qSuYQ.c.tNvL5y/NoCJKoQ/RGiZtyPgD5G', '1', '1', 'profil.svg', 'user', 0, '2021-03-12 01:58:19', '2021-03-12 01:58:19'),
(40, 'coba2', 'coba2', '$2y$10$oj7OL7VZfZqHCjCt9laQpuo7Td5cs/MXUdUiL8f2f9eNhW4kJQ9iK', '1', '1', 'profil.svg', 'user', 0, '2021-03-12 01:58:37', '2021-03-12 01:58:37'),
(41, 'coba3', 'coba3', '$2y$10$RmfZZixqYqamu.mEBTuaOev/39gIUhcbXHP50MX2Nn0d3XDFQNh/u', '1', '1', 'profil.svg', 'user', 0, '2021-03-12 01:58:55', '2021-03-12 01:58:55'),
(42, 'coba4', 'coba4', '$2y$10$XRh4dgOByUEq4eK2ashgjeKIYNtZlvYipWm.PCzKwrqrZtYs8y26K', '1', '1', 'profil.svg', 'user', 0, '2021-03-12 01:59:17', '2021-03-12 01:59:17'),
(43, 'dono', 'dono', '$2y$10$6ARF5rzXi3vHAtNhERRY9.JnhjvwZ1iZ47botNsbdX8DBxGtFDxXG', '3', '2', 'profil.svg', 'user', 0, '2021-03-12 02:23:08', '2021-03-12 02:23:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `detail_transaksi_id_sampah_foreign` (`id_sampah`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id_admin_foreign` (`id_admin`),
  ADD KEY `transaksi_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_id_sampah_foreign` FOREIGN KEY (`id_sampah`) REFERENCES `sampah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
