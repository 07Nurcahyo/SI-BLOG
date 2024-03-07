-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2024 at 10:53 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-blog-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'root', 'nur', 'L', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint UNSIGNED NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year NOT NULL,
  `penerbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rak` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `isbn`, `judul_buku`, `tahun_terbit`, `penerbit`, `kode_kategori`, `kode_penulis`, `kode_rak`, `stok`, `created_at`, `updated_at`) VALUES
(1, '1111-111-111-x', 'tes tes tes tes tes', 1999, 'testestes', 'tes1', 'ts', 'ts1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`, `created_at`, `updated_at`) VALUES
('PG', 'Pemrograman', NULL, NULL),
('tes1', 'tes', NULL, NULL),
('UIK', 'Umum dan Ilmu Komputer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_rak` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_rak`, `nama_rak`, `nama_ruang`, `lantai`, `created_at`, `updated_at`) VALUES
('R1', 'Rak 1', 'Ruang Baca JTI', 6, NULL, NULL),
('R2', 'Rak 2', 'Ruang Baca JTI', 6, NULL, NULL),
('ts1', 'tes', 'tes', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_22_090427_create_products_table', 1),
(6, '2024_03_02_065915_create_admin_table', 1),
(7, '2024_03_02_071703_create_penulis_table', 2),
(8, '2024_03_02_072007_create_kategori_table', 3),
(9, '2024_03_02_072324_create_lokasi_table', 4),
(10, '2024_03_02_072751_create_buku_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penulis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `created_at`, `updated_at`) VALUES
('AAD', 'Andrea Adelheid', NULL, NULL),
('ADI', 'Adi Nugroho', NULL, NULL),
('AHG', 'Abdul Hadi, Hartati & Getut Pramesti', NULL, NULL),
('AKR', 'Abdul Kadir', NULL, NULL),
('AND', 'Andreas Hery Prasetya', NULL, NULL),
('ASE', 'Andrew Siade', NULL, NULL),
('ASO', 'Andi Sunyoto', NULL, NULL),
('BHS', 'B. Herry Suharto dan Soesilo Wijono', NULL, NULL),
('BUD', 'Budi Raharjo', NULL, NULL),
('DAS', 'Dony Ariyus', NULL, NULL),
('EKN', 'Erick Kurniawan', NULL, NULL),
('ERI', 'Erico Darmawan H. & Laurentius Risal', NULL, NULL),
('ESM', 'Edi S. Mulyanta', NULL, NULL),
('ESR', 'Edison Siregar ', NULL, NULL),
('INM', 'Indrajani & Martin', NULL, NULL),
('IPA', 'I Putu Agus Eka Pratama', NULL, NULL),
('ISA', 'Iwan Sofana', NULL, NULL),
('JEE', 'Jubilee Enterprise', NULL, NULL),
('JGR', 'Jim Geier', NULL, NULL),
('KCA', 'Kang Cahya', NULL, NULL),
('LMA', 'Laksamana Media', NULL, NULL),
('MAN', 'Maman Abdurohman', NULL, NULL),
('MSO', 'Mikael Sugianto', NULL, NULL),
('MZA', 'M. Zainal Abdi', NULL, NULL),
('OWP', 'Onno W. Purbo', NULL, NULL),
('RMR', 'Rinaldi Munir', NULL, NULL),
('RYO', 'Riyanto', NULL, NULL),
('SHL', 'Syahrul', NULL, NULL),
('ts', 'tes', NULL, NULL),
('WKR', 'Wahana Komputer', NULL, NULL),
('WSG', 'Winarno Sugeng', NULL, NULL),
('WTH', 'Westriningsih', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `product_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'tes', '13', '8433056438', 'tes', '2024-03-02 01:21:32', '2024-03-02 01:21:32'),
(2, 'tes', '132', '5369554658', 'tes', '2024-03-02 01:22:24', '2024-03-02 01:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `buku_kode_kategori_index` (`kode_kategori`),
  ADD KEY `buku_kode_penulis_index` (`kode_penulis`),
  ADD KEY `buku_kode_rak_index` (`kode_rak`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_rak`) REFERENCES `lokasi` (`id_rak`),
  ADD CONSTRAINT `buku_kode_kategori_foreign` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `buku_kode_penulis_foreign` FOREIGN KEY (`kode_penulis`) REFERENCES `penulis` (`id_penulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
