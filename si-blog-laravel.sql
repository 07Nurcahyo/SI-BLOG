-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 12:52 AM
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
(2, 'admin', '$2y$12$mMr4ziBTJoQyx1V5tqVKZOc40Iqsg3QnvdeXJTvKBwVfVo9zebJyS', 'yanto', 'L', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` bigint UNSIGNED NOT NULL,
  `isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year NOT NULL,
  `kode_penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `isbn`, `judul_buku`, `tahun_terbit`, `kode_penerbit`, `kode_kategori`, `penulis`, `kode_rak`, `stok`, `created_at`, `updated_at`, `gambar`) VALUES
(1, '978-602-8758-27-7', 'Pemrograman Brorientasi Objek C#', 2011, 'INB', 'PG', 'Erico Darmawan H. & Laurentius Risal', 'R1', 1, NULL, '2024-05-26 05:17:17', ''),
(2, '978-979-29-1664-5', 'Cepat Kuasai PHP & MySQL', 2010, 'AND', 'PG', 'Andreas Hery Prasetya', 'R1', 1, NULL, NULL, ''),
(3, '978-602-8758-44-4', 'Belajar Otodidak Pemrograman Web dengan PHP +Oracle', 2011, 'INB', 'PG', 'Budi Raharjo', 'R1', 2, NULL, NULL, ''),
(4, '978-979-29-1301-9', 'Mengembangkan Aplikasi Basis Data Menggunakan C# +SQLServer', 2010, 'AND', 'PG', 'Adi Nugroho', 'R1', 2, NULL, NULL, ''),
(5, '978-979-29-1388-0', 'Adobe Flash + XML = Rich Multimedia Application', 2010, 'AND', 'PG', 'Andi Sunyoto', 'R1', 2, NULL, NULL, ''),
(6, '978-979-29-0447-5', 'Tuntutan Praktis Belajar Database Menggunakan MySQL', 2008, 'AND', 'UIK', 'Abdul Kadir', 'R1', 2, NULL, NULL, ''),
(7, '978-979-27-1848-5', 'Pemrograman Berbasis Objek dengan Bahasa Java', 2007, 'EMK', 'UIK', 'Indrajani & Martin', 'R1', 1, NULL, NULL, ''),
(8, '978-602-00-1770-9', 'Aplikasi SPSS dalam Saham', 2012, 'EMK', 'UIK', 'Abdul Hadi, Hartati & Getut Pramesti', 'R1', 1, NULL, NULL, ''),
(9, '978-602-1514-40-5', 'Smart City Beserta Cloud Computing', 2014, 'INB', 'UIK', 'I Putu Agus Eka Pratama', 'R1', 2, NULL, NULL, ''),
(10, '978-602-6232-37-3', 'Jaringan Komputer Berbasis Mikrotik', 2017, 'INB', 'UIK', 'Iwan Sofana', 'R1', 2, NULL, NULL, ''),
(11, '979-763-666-6', 'Membangun Aplikasi Berbasis Web dengan ASP.NET 2.0', 2007, 'AND', 'UIK', 'Edison Siregar', 'R1', 2, NULL, NULL, ''),
(12, '979-3338-50-4', 'Instalasi Wireless Lan', 2005, 'INB', 'UIK', 'Winarno Sugeng', 'R1', 1, NULL, NULL, ''),
(13, '978-979-29-3361-1', 'Tips Buka Toko di Website Tanpa Modal', 2012, 'AND', 'UIK', 'Andrea Adelheid', 'R1', 2, NULL, NULL, ''),
(14, '978-979-29-4094-7', 'Membangun Mobile Web Store dengn CodeIgniter, MySQL & jQuery Mobile', 2013, 'AND', 'UIK', 'Riyanto', 'R1', 1, NULL, NULL, ''),
(15, '979-763-073-0', 'Wireless Networks First-Step', 2005, 'AND', 'UIK', 'Jim Geier', 'R1', 1, NULL, NULL, ''),
(16, '978-979-756-903-7', 'Simulasi Jaringan', 2013, 'GRA', 'UIK', 'Andrew Siade', 'R1', 1, NULL, NULL, ''),
(17, '978-602-8758-08-6', 'Metode Numerik', 2013, 'INB', 'UIK', 'Rinaldi Munir', 'R1', 1, NULL, NULL, ''),
(18, '979-763-163-X', 'Computer Security', 2006, 'AND', 'UIK', 'Dony Ariyus', 'R1', 1, NULL, NULL, ''),
(19, '978-979-29-3429-8', 'Jaringan MESH', 2013, 'AND', 'UIK', 'Onno W. Purbo', 'R1', 2, NULL, NULL, ''),
(20, '978-602-8759-19-9', 'Autocad untuk Desain Rumah', 2014, 'MOD', 'UIK', 'M. Zainal Abdi', 'R1', 3, NULL, NULL, ''),
(21, '978-979-29-2555-5', 'Adobe After Effects CS5', 2012, 'AND', 'UIK', 'Mikael Sugianto', 'R1', 2, NULL, NULL, ''),
(22, '978-979-29-3931-6', 'Presentasi Multimedia dengan Adobe Photoshop CS6 dan Flash CS6', 2013, 'ANW', 'UIK', 'WTH', 'R1', 2, NULL, NULL, ''),
(23, '978-979-29-1546-4', 'Organisasi dan Arsitektur Komputer', 2010, 'AND', 'UIK', 'Syahrul', 'R1', 2, NULL, NULL, ''),
(24, '979-763-145-1', 'Membangun Aplikasi Menggunakan Qt Designer dengan Database Postgre SQL/MySQL', 2006, 'AND', 'UIK', 'B. Herry Suharto dan Soesilo Wijono', 'R1', 2, NULL, NULL, ''),
(25, '978-979-1153-27-0', 'Organisasi dan Arsitektur Komputer', 2008, 'INB', 'UIK', 'Maman Abdurohman', 'R1', 2, NULL, NULL, ''),
(26, '978-979-29-1417-7', 'Mudah Menjadi Programmer C++', 2010, 'AND', 'PG', 'Abdul Kadir', 'R2', 1, NULL, NULL, ''),
(27, '978-979-29-2721-4', 'Membangun Aplikasi Mobile dengan Qt SDK', 2011, 'AND', 'PG', 'Erick Kurniawan', 'R2', 1, NULL, NULL, ''),
(28, '978-979-29-0655-4', 'Sulap Foto Sederhana Menjadi Tampak Pro dengan Pluggin Photoshop', 2009, 'AND', 'PG', 'Laksamana Media', 'R2', 1, NULL, NULL, ''),
(29, '978-602-02-6319-9', 'Sistem Informasi Geografis dengan MapInfo', 2015, 'EMK', 'PG', 'Wahana Komputer', 'R2', 1, NULL, NULL, ''),
(30, '978-979-29-0872-5', 'Membuat Aplikasi Web dengan PHP dan Database MySQL', 2009, 'AND', 'PG', 'Abdul Kadir', 'R2', 2, NULL, NULL, ''),
(31, '978-979-29-0824-4', 'Aplikasi Cerdas Menggunakan DELPHI', 2009, 'AND', 'UIK', 'Wahana Komputer', 'R2', 2, NULL, NULL, ''),
(32, '978-602-62311-7-8', 'Membuat Aplikasi Mobile Native dengan JAVA SCRIPT by NATIVE SCRIPT', 2018, 'LOK', 'UIK', 'Kang Cahya', 'R2', 2, NULL, NULL, ''),
(33, '978-602-02-5872-0', 'Kumpulan Aplikasi PHP untuk Pemula', 2015, 'EMK', 'UIK', 'Jubilee Enterprise', 'R2', 1, NULL, NULL, ''),
(34, '978-979-29-0007-1', 'Pengolahan Digital Image dengan Photoshop CS3', 2007, 'AND', 'UIK', 'Edi S. Mulyanta', 'R2', 1, NULL, NULL, ''),
(35, '978-002-02-8847-5', 'Belajar Java, Database, dan Netbeans dari Nol', 2016, 'EMK', 'UIK', 'Jubilee Enterprise', 'R2', 1, NULL, NULL, ''),
(36, '978-979-3827-88-9', 'Windows Server 2008 Panduang Praktis Administrator', 2007, 'INK', 'UIK', 'MIC', 'R3', 1, NULL, NULL, ''),
(37, '979-3469-44-7', 'Aplikasi Pemorgraman Web Dinamis dengan PHP dan MySQL', 2013, 'GAM', 'UIK', 'BUN', 'R3', 1, NULL, NULL, ''),
(38, '979-877-040-4/1', 'Membuat Model dan Animasi Transformer dengan 3D Max', 2009, 'MED', 'KHO', 'IVA', 'R6', 2, NULL, NULL, ''),
(39, '979-8146-58-1', 'Dasar-Dasar Akuntansi', 2005, 'BSY', 'IIN', 'Haryanto Jusup', 'R6', 2, NULL, NULL, ''),
(40, '978-979-518-998-5', 'Prosedur Penelitian suatu Pendekatan Praktik', 2013, 'PRC', 'IIN', 'Suharsimi Arikunto', 'R6', 1, NULL, NULL, ''),
(41, '979-8433-08-4', 'Dasar-Dasar Statistika', 2005, 'AND', 'IIN', 'Riduwan', 'R6', 1, NULL, NULL, ''),
(42, '979-731-606-8', 'Sistem Informasi Geografi dengan AutoCAD MAP', 2005, 'AND', 'IIN', 'Riduwan', 'R6', 1, NULL, NULL, ''),
(43, '798-602-1514-68-9', 'Pemrograman Javascript Teori dan Implementasi', 2015, 'INB', 'KHO', 'R. H Sianipar', 'R8', 1, NULL, NULL, ''),
(44, '978-602-1514-41-2', 'Sistem Informasi dan Implementasinya', 2014, 'INB', 'IIN', 'PUT', 'R6', 1, NULL, NULL, ''),
(45, '979-3323-68', 'Esensi Pemrograman Berorientasi Objek Dengan Visual C++ 6', 2004, 'BAP', 'KHO', 'Edwin Tjahjadi', 'R8', 1, NULL, NULL, ''),
(46, '978-602-00-1984-0', '62 Trik dan Plugin Terbaik jQuery', 2012, 'EMK', 'KHO', 'Agus Saputa', 'R8', 1, NULL, NULL, ''),
(47, '978-979-29-0678-3', 'Algoritma & Struktur Data dengan C#', 2009, 'CAO', 'ITT', 'Adi Nugroho', 'R8', 1, NULL, NULL, ''),
(48, '0-321-442-63-6', 'Problem Solving With C++ Sixth Edition', 2006, 'GET', 'ITT', 'Adison Weasley', 'R8', 1, NULL, NULL, ''),
(49, '978-979-29-1568-6', 'Mengembangkan Aplikasi Basis Data Menggunakan Visual Basic.net dan Oracle', 2010, 'CAO', 'ITT', 'Adi Nugroho', 'R8', 1, NULL, NULL, ''),
(50, '978-602-6232-21-2', 'Pemrograman Web dengan PHP 7', 2017, 'INB', 'KHO', 'Beta Sidik', 'R8', 1, NULL, NULL, ''),
(51, '979-3338-33-4', 'Sistem Manajemen Basis Data Pemodelan, Perancangan, dan Terapanya', 2004, 'INB', 'LSG', 'Bambang Harianto', 'R8', 1, NULL, NULL, ''),
(54, '1', 'tes', 2000, 'AND', 'IIN', 'tes', 'R1', 1, '2024-04-29 21:41:51', '2024-06-03 06:52:23', 'images/$2y$12$MBudlN5SbZBT6zKM5QvN0ee6lkdmf6Yr8Rgyg3rgFH26gHI3AghEW.png'),
(55, '1', 'Tes skripsi dan ta', 2000, 'POL', 'STA', 'Mahasiswa', 'R1', 1, '2024-04-30 20:22:05', '2024-04-30 20:22:05', ''),
(56, '1', 'Tes Manual Book', 2000, 'AND', 'MB', 'Wahyu', 'R6', 1, NULL, NULL, ''),
(57, '1', 'Buku Manual Pengembangan Sistem Informasi FIDS(Flight Information Display System) Abdulrachman Saleh Berbasis Andorid', 2017, 'POL', 'MB', 'Annisa Noviana, Dindha Maria Ulfa', 'R4', 1, NULL, NULL, ''),
(58, '1', 'Impelementasi Web Crawler dan Perangkingan Data Hotel Menggunakan Metode ANP ', 2017, 'POL', 'MB', 'Sabilah Faza', 'R4', 1, NULL, NULL, ''),
(59, '1', 'Implementasi K-Means Clustering untuk Pengolahan Sistem Persediaan Obat', 2017, 'POL', 'MB', 'Dadid Okta Pramudiyanto', 'R4', 1, NULL, NULL, ''),
(60, '1', 'Simulasi Pembelajaran Beternak Burung Puyuh Menggunakan Metode Finite State Machine Berbasis Android', 2017, 'POL', 'MB', 'Nindy Alvi Fajarina', 'R4', 1, NULL, NULL, ''),
(61, '1', 'Implementasi Steganografi Menggunakan Metode Bit Plane Complexity Segmentation pada Citra Digital', 2017, 'POL', 'MB', 'Rachmad Jibril Al Kautsar', 'R4', 1, NULL, NULL, ''),
(62, '1', 'Rancang Bangun Aplikasi Pencarian Guru Les Privat di Kota Malang Berbasis Android (Studi Kasus: Sandi Privat-Malang)', 2019, 'POL', 'MB', 'Budi Purwanto', 'R4', 1, NULL, NULL, ''),
(63, '1', 'Pengembangan Aplikasi Peramalan Penjualan Barang Menggunakan Metode Double Exponential Smoothing pada KP-RI Harapan Plumpang', 2017, 'POL', 'MB', 'Adix Mukhib Zulis Saputra', 'R4', 1, NULL, NULL, ''),
(64, '1', 'Pengembangan Sistem Peramalan Stok Obat di Puskesmas Gending Probolinggo Menggunakan Metode Winters Exponential Smoothing', 2017, 'POL', 'MB', 'Muhammad Ishaq Habibi', 'R4', 1, NULL, NULL, ''),
(65, '1', 'Aplikasi Penetuan Prioritas Belanja Barang atau Jasa Menggunakan Metode Moora di Politeknik Kesehatan Kemenkes Malang', 2017, 'POL', 'MB', 'Afif Ashar Pambudi', 'R4', 1, NULL, NULL, ''),
(66, '1', 'Aplikasi Pengenalan Hewan Laut Dalam DESEA-ENS Berbasis Augmented Reality', 2017, 'POL', 'MB', 'Deni Aprianto , Nurcahyo Aswin Damasworo', 'R4', 1, NULL, NULL, ''),
(67, '1', 'Sistem Pendukung Keputusan untuk Menentukan Kelayakan Penerimaan Raskin di Karangsari Kota Blitar', 2018, 'POL', 'MB', 'Muhammad Syafi\'i', 'R5', 1, NULL, NULL, ''),
(68, '1', 'Pengolahan Citra Digital Identifikasi Jenis Tanah Menggunakan Metode Naive Bayes Classifier', 2018, 'POL', 'MB', 'Rohmad Wahyu Syaifi A', 'R5', 1, NULL, NULL, ''),
(69, '1', 'Apikasi Pengolahan Citra untuk Pengenalan Tingkat Kematangan Tomat Menggunakan Konversi Warna HSV dan Klasifikasi Naif Bayes', 2018, 'POL', 'MB', 'Muhammad Firman Aulia Syah Putra', 'R5', 1, NULL, NULL, ''),
(70, '1', 'Implementasi Analisis Clustering dan Sentimen Data Twitter pada Opini Wisata Pantai Menggunakan Metode K-Means', 2017, 'POL', 'MB', 'Rizki Andi Irawan', 'R5', 1, NULL, NULL, ''),
(71, '1', 'Implementasi Game Herbs Rescue pada Aplikasi Ensiklopedia Tanaman Obat Tradisional Indoenesia (HerbAR)', 2017, 'POL', 'MB', 'Sari Anggraeni', 'R5', 1, NULL, NULL, ''),
(72, '1', 'Pengembangan SIstem Informasi Pemilihan Objek Wisata Berdasarkan Kriteria Destinasi Pariwisata Unggulan Menggunakan Metode TOPSIS (Studi Kasus: Kabupaten Tulungagung', 2017, 'POL', 'MB', 'Yuda Krisna Wijaya', 'R5', 1, NULL, NULL, ''),
(73, '1', 'Sistem Pendukung Keputusan Penerima Bantuan Beras Bersubsidi Menggunakan Metode TOPSIS Berbasis Web (Studi Kasus: Kantor Desa Dringu Kabupaten Probolinggo)', 2019, 'POL', 'MB', 'Bhaktiar Adi Nugraha, Hanif Hidayatturrohim', 'R5', 1, NULL, NULL, ''),
(74, '1', 'Implementasi Pencarian Rute Perjalanan Terpendek untuk Distribusi Kopi Berbasis Android dengan Menggunakan Metode GREEDY (Studi Kasus: Kecamatan Kota Gresik)', 2017, 'POL', 'MB', 'M. Rizki Ananda', 'R5', 1, NULL, NULL, ''),
(75, '1', 'Implementasi Augmented Reality untuk Pengenalan Energi Terbarukan', 2017, 'POL', 'MB', 'Damon Satya As Sabili, Rama Adi Nugroho', 'R5', 1, NULL, NULL, ''),
(76, '1', 'Identifikasi Kecerdasan Majemuk Siswa untuk Pertimbangan Studi Lebih Lanjut dengan Metode FUZZY TOPSIS', 2019, 'POL', 'MB', 'Nuansa Fitri Sukma', 'R5', 1, NULL, NULL, ''),
(77, '1', 'Pengembangan Sistem Pembelajaran Logika Berbasis Komponen Visual Dengan Memanfaatkan Perangkat IOT Development Board', 2023, 'POL', 'SK', 'Muhammad Tyone Noor Satria', 'R6', 1, NULL, NULL, ''),
(78, '1', 'Penetuan Penempatan Posisi Pemain Inti Futsal Berbasis Group Decision Support System Dengan Menggunakan Metode Profile Matching dan BORDA (Studi Kasus: PORPROV Kab. Dompu)', 2023, 'POL', 'SK', 'M. Fajrin', 'R6', 1, NULL, NULL, ''),
(79, '1', 'Sistem Rekomendasi Dosen Penguji Skripsi Dengan Algoritma Intuitionistic-Fuzzy (IF) Dematel dan IF-VIKOR', 2022, 'POL', 'SK', 'Alan Perdhana Timor', 'R6', 1, NULL, NULL, ''),
(80, '1', 'Metode Random Forest untuk Klasifikasi Kerusakan Transformator Daya Berdasarkan Gas Terlarut pada Duval Triangle dan Duval Pentagon', 2022, 'POL', 'SK', 'Hunayn Risatayn', 'R6', 1, NULL, NULL, ''),
(81, '1', 'Rancang Bangun Sistem Informasi Pengarsipan Pada KB/TK Ceria Mandiri', 2022, 'POL', 'LA', 'Abiyan Fawwaz, Erni Srihartini', 'R6', 1, NULL, NULL, ''),
(82, '1', 'Sistem Temu Kembali Informasi Pesawat Udara Militer Menggunakan Jaringan Syaraf Tiruan Back Propagation Network', 2022, 'POL', 'SK', 'Ardyansyah Vira Bahrudin', 'R6', 1, NULL, NULL, ''),
(83, '1', 'Sistem Alokasi Air Berbasis Sistem Informasi Geografis (Studi Kasus : Perusahaan Umum Jasa Tirta 1)', 2022, 'POL', 'SK', 'Muhammad Yuki Miftakhurrizqi', 'R6', 1, NULL, NULL, ''),
(84, '1', 'Development of Abdullah Permata Jingga Mosque Website Interface With User Centered Design Method', 2022, 'POL', 'SK', 'Salsabila Firdausy', 'R6', 1, NULL, NULL, ''),
(85, '1', 'Pengembangan Topik Data Service untuk Pembelajaran Aplikasi Berbasis Android pada Platform Intelligent Computer-Assisted Programming Learning Platform (iCLOP)', 2022, 'POL', 'SK', 'Muhammad Afandi', 'R6', 1, NULL, NULL, ''),
(86, '1', 'Sistem E-Learning Sebagai Media Pembelajaran pada Bimbingan Belajar Privat Juara', 2022, 'POL', 'LA', 'Falya Charismatul Ayza, Novelya Asis Sholikha', 'R6', 1, NULL, NULL, ''),
(87, '123', 'testes', 2000, 'INK', 'TES', 'tes', 'R2', 1, '2024-05-29 07:24:34', '2024-06-03 06:53:18', 'images/$2y$12$gR6onq47/TQVFFkJgJMT3e/28i7lj/kGIGLlkLpww96TaZII6Drii.jpg'),
(88, '123', 'tesgambar', 2000, 'MHS', 'TES', 'tes', 'R1', 3, '2024-06-01 01:05:58', '2024-06-02 21:18:50', 'images/$2y$12$Js7YUpugkATp1JCisphXxOjdkJoYoJE2bXi.s4RbYpVwgwOmmdDW2.png'),
(89, '1233', 'tesgambar2', 2000, 'MED', 'TES', 'tes2', 'R2', 2, '2024-06-01 02:12:18', '2024-06-01 02:12:18', 'images/$2y$12$AsH0Roemihc0CT0WXBqCKetfUj2fMNCK8ZE/0f44FWJfudwczPA6C.png'),
(90, '12333', 'tesgambar3', 2000, 'MHS', 'TES', 'tes3', 'R3', 3, '2024-06-01 02:14:19', '2024-06-01 02:14:19', 'images/$2y$12$FwP.ktkolaspgnulQz.M/uu0CAYxV7f9hZR3RzKkacrfqUeLS5GqG.jpg');

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
('IIN', 'Ilmu Informasi', NULL, '2024-04-29 21:38:43'),
('ITT', 'Ilmu Terapan dan Teknologi', NULL, NULL),
('KHO', 'Kesenian, Hiburan, dan Olahraga', NULL, NULL),
('LA', 'Laporan Akhir', NULL, NULL),
('LSG', 'Literatur, Sejarah, Geografi', NULL, NULL),
('MB', 'Manual Book', NULL, NULL),
('PG', 'Pemrograman', NULL, NULL),
('SK', 'Skripsi', '2024-05-02 06:33:40', '2024-05-02 06:33:40'),
('STA', 'Skripsi & TA', '2024-04-30 20:16:47', '2024-04-30 20:16:47'),
('TES', 'tes', '2024-04-29 21:37:32', '2024-04-29 21:37:32'),
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
('R3', 'Rak 3', 'Ruang Baca JTI', 6, NULL, NULL),
('R4', 'Rak 4', 'Ruang Baca JTI', 6, NULL, NULL),
('R5', 'Rak 5', 'Ruang Baca JTI', 6, NULL, NULL),
('R6', 'Rak 6', 'Ruang Baca JTI', 6, NULL, NULL),
('R8', 'Rak 8', 'Ruang Baca JTI', 6, NULL, '2024-04-22 06:19:33');

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
(7, '2024_03_02_071703_create_penulis_table', 1),
(8, '2024_03_02_072007_create_kategori_table', 1),
(9, '2024_03_02_072324_create_lokasi_table', 1),
(10, '2024_03_02_072325_create_penerbit_table', 1),
(11, '2024_03_02_072751_create_buku_table', 1),
(12, '2024_06_01_061209_add_gambar_to_buku_table', 2);

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
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerbit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `created_at`, `updated_at`) VALUES
('AND', 'ANDI', NULL, '2024-04-22 05:46:56'),
('ANW', 'ANDI dan Wahana Komputer', NULL, NULL),
('BAP', 'Bayumedia Publishing', NULL, NULL),
('BSY', 'Bagian Penerbitan STIE YKPN', NULL, NULL),
('CAO', 'CV Andi Offset', NULL, NULL),
('EMK', 'PT. Elex Media Komputindo', NULL, NULL),
('GAM', 'GAYA MEDIA', NULL, NULL),
('GET', 'Greg Tobin', NULL, NULL),
('GRA', 'Graha Ilmu', NULL, NULL),
('INB', 'Informatika Bandung', NULL, NULL),
('INK', 'INFOKOMPUTER', NULL, NULL),
('LOK', 'LOKOMEDIA', NULL, NULL),
('MED', 'MediaKom', NULL, NULL),
('MHS', 'Mahasiswa', '2024-04-30 20:19:22', '2024-04-30 20:19:22'),
('MOD', 'Modul', NULL, NULL),
('POL', 'Polinema', NULL, NULL),
('PRC', 'PT. Rineka Cipta', NULL, NULL);

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
  ADD KEY `buku_kode_penerbit_index` (`kode_penerbit`),
  ADD KEY `buku_kode_kategori_index` (`kode_kategori`),
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
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

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
  MODIFY `id_admin` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `buku_kode_kategori_foreign` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `buku_kode_penerbit_foreign` FOREIGN KEY (`kode_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `buku_kode_rak_foreign` FOREIGN KEY (`kode_rak`) REFERENCES `lokasi` (`id_rak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
