-- phpMyAdmin SQL Dump

-- version 5.1.0

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Generation Time: May 28, 2022 at 05:35 AM

-- Server version: 10.4.18-MariaDB

-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `webperpus`

--

-- --------------------------------------------------------

--

-- Table structure for table `anggota`

--

DROP TABLE IF EXISTS `anggota` ;

FLUSH TABLES `anggota` ;

CREATE TABLE
    `anggota` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `jenis_kelamin` enum('LK', 'PR') COLLATE utf8mb4_unicode_ci NOT NULL,
        `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `anggota`

--

INSERT INTO
    `anggota` (
        `id`,
        `nis`,
        `nama`,
        `jenis_kelamin`,
        `alamat`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '18897812763712',
        'Verdiano Santosa',
        'LK',
        'Tunjangan Kulon Buton',
        NULL,
        '2022-05-26 05:03:55'
    ), (
        3,
        '1237878',
        'Hendrik',
        'LK',
        'jogjakarta',
        '2022-05-26 05:19:43',
        '2022-05-26 05:19:43'
    ), (
        4,
        '123887',
        'Hermawah Syahputra',
        'LK',
        'Jakarta Utara',
        '2022-05-26 09:40:48',
        '2022-05-26 09:40:56'
    );

-- --------------------------------------------------------

--

-- Table structure for table `buku`

--

DROP TABLE IF EXISTS `buku` ;

FLUSH TABLES `buku` ;

CREATE TABLE
    `buku` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `kode_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `tahun_terbit` int(11) NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `buku`

--

INSERT INTO
    `buku` (
        `id`,
        `kode_buku`,
        `judul`,
        `pengarang`,
        `penerbit`,
        `tahun_terbit`,
        `created_at`,
        `updated_at`
    )
VALUES (
        3,
        '628f77cc66164',
        'Bintang',
        'tere liye',
        'Gramedia Pustaka Utama (Jakarta)',
        2019,
        '2022-05-26 05:51:35',
        '2022-05-26 05:51:35'
    ), (
        4,
        '628f77d7ebc54',
        'Bulan',
        'tere liye',
        'Gramedia Pustaka Utama (Jakarta)',
        2010,
        '2022-05-26 05:51:50',
        '2022-05-26 05:51:50'
    ), (
        5,
        '628fac62de8cf',
        'Sastra Inggris',
        'Suetomo',
        'Gramedia Pustaka Utama (Jakarta)',
        2010,
        '2022-05-26 09:36:16',
        '2022-05-26 09:40:25'
    ), (
        6,
        '629195a265308',
        'BUKU IPA',
        'sukarno',
        'gramedia',
        2015,
        '2022-05-27 20:23:42',
        '2022-05-27 20:23:42'
    );

-- --------------------------------------------------------

--

-- Table structure for table `failed_jobs`

--

DROP TABLE IF EXISTS `failed_jobs` ;

FLUSH TABLES `failed_jobs` ;

CREATE TABLE
    `failed_jobs` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
        `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
        `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
        `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `log_pinjam`

--

DROP TABLE IF EXISTS `log_pinjam` ;

FLUSH TABLES `log_pinjam` ;

CREATE TABLE
    `log_pinjam` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `id_buku` bigint(20) UNSIGNED NOT NULL,
        `id_anggota` bigint(20) UNSIGNED NOT NULL,
        `tanggal_pinjam` date NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `log_pinjam`

--

INSERT INTO
    `log_pinjam` (
        `id`,
        `id_buku`,
        `id_anggota`,
        `tanggal_pinjam`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        4,
        1,
        '2022-05-26',
        '2022-05-26 07:30:08',
        '2022-05-26 07:30:08'
    ), (
        2,
        5,
        4,
        '2022-05-26',
        '2022-05-26 09:41:09',
        '2022-05-26 09:41:09'
    ), (
        3,
        3,
        1,
        '2022-05-26',
        '2022-05-26 09:45:57',
        '2022-05-26 09:45:57'
    ), (
        4,
        4,
        3,
        '2022-05-26',
        '2022-05-26 09:46:03',
        '2022-05-26 09:46:03'
    ), (
        5,
        5,
        1,
        '2022-05-26',
        '2022-05-26 09:46:10',
        '2022-05-26 09:46:10'
    ), (
        6,
        5,
        3,
        '2022-05-28',
        '2022-05-27 20:25:19',
        '2022-05-27 20:25:19'
    ), (
        7,
        4,
        1,
        '2022-05-10',
        '2022-05-27 20:26:14',
        '2022-05-27 20:26:14'
    );

-- --------------------------------------------------------

--

-- Table structure for table `migrations`

--

DROP TABLE IF EXISTS `migrations` ;

FLUSH TABLES `migrations` ;

CREATE TABLE
    `migrations` (
        `id` int(10) UNSIGNED NOT NULL,
        `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `batch` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `migrations`

--

INSERT INTO
    `migrations` (`id`, `migration`, `batch`)
VALUES (
        27,
        '2014_10_12_000000_create_users_table',
        1
    ), (
        28,
        '2014_10_12_100000_create_password_resets_table',
        1
    ), (
        29,
        '2019_08_19_000000_create_failed_jobs_table',
        1
    ), (
        30,
        '2019_12_14_000001_create_personal_access_tokens_table',
        1
    ), (
        31,
        '2022_05_24_123123_create_anggota_table',
        1
    ), (
        32,
        '2022_05_24_123155_create_buku_table',
        1
    ), (
        33,
        '2022_05_24_133514_create_peminjaman_table',
        1
    ), (
        34,
        '2022_05_24_133606_create_log_pinjam_table',
        1
    );

-- --------------------------------------------------------

--

-- Table structure for table `password_resets`

--

DROP TABLE IF EXISTS `password_resets` ;

FLUSH TABLES `password_resets` ;

CREATE TABLE
    `password_resets` (
        `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `peminjaman`

--

DROP TABLE IF EXISTS `peminjaman` ;

FLUSH TABLES `peminjaman` ;

CREATE TABLE
    `peminjaman` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `id_buku` bigint(20) UNSIGNED NOT NULL,
        `id_anggota` bigint(20) UNSIGNED NOT NULL,
        `tanggal_pinjam` date NOT NULL,
        `tanggal_kembali` date NOT NULL,
        `status` enum('PIN', 'KEM') COLLATE utf8mb4_unicode_ci NOT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `peminjaman`

--

INSERT INTO
    `peminjaman` (
        `id`,
        `kode_peminjaman`,
        `id_buku`,
        `id_anggota`,
        `tanggal_pinjam`,
        `tanggal_kembali`,
        `status`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '628f81db00df8',
        3,
        3,
        '2022-05-26',
        '2022-06-02',
        'KEM',
        '2022-05-26 06:34:25',
        '2022-05-26 09:41:54'
    ), (
        2,
        '628f880a11413',
        3,
        3,
        '2022-05-26',
        '2022-06-02',
        'KEM',
        '2022-05-26 07:00:57',
        '2022-05-26 07:24:55'
    ), (
        3,
        '628f8ee32a016',
        4,
        1,
        '2022-05-26',
        '2022-06-02',
        'KEM',
        '2022-05-26 07:30:08',
        '2022-05-26 09:06:54'
    ), (
        4,
        '628fad9bb6ce9',
        5,
        4,
        '2022-05-28',
        '2022-06-04',
        'KEM',
        '2022-05-26 09:41:09',
        '2022-05-27 20:25:58'
    ), (
        5,
        '628faec24c0b9',
        3,
        1,
        '2022-05-26',
        '2022-06-02',
        'PIN',
        '2022-05-26 09:45:57',
        '2022-05-26 09:45:57'
    ), (
        6,
        '628faec547718',
        4,
        3,
        '2022-05-26',
        '2022-06-02',
        'PIN',
        '2022-05-26 09:46:03',
        '2022-05-26 09:46:03'
    ), (
        7,
        '628faecbe71a2',
        5,
        1,
        '2022-05-26',
        '2022-06-02',
        'PIN',
        '2022-05-26 09:46:10',
        '2022-05-26 09:46:10'
    ), (
        8,
        '629195f30c727',
        5,
        3,
        '2022-05-28',
        '2022-06-04',
        'PIN',
        '2022-05-27 20:25:19',
        '2022-05-27 20:25:19'
    ), (
        9,
        '6291964633007',
        4,
        1,
        '2022-05-10',
        '2022-05-17',
        'PIN',
        '2022-05-27 20:26:14',
        '2022-05-27 20:26:14'
    );

-- --------------------------------------------------------

--

-- Table structure for table `personal_access_tokens`

--

DROP TABLE IF EXISTS `personal_access_tokens` ;

FLUSH TABLES `personal_access_tokens` ;

CREATE TABLE
    `personal_access_tokens` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `tokenable_id` bigint(20) UNSIGNED NOT NULL,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
        `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `last_used_at` timestamp NULL DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `users`

--

DROP TABLE IF EXISTS `users` ;

FLUSH TABLES `users` ;

CREATE TABLE
    `users` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email_verified_at` timestamp NULL DEFAULT NULL,
        `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `role` enum('admin', 'petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'petugas',
        `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `created_at` timestamp NULL DEFAULT NULL,
        `updated_at` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Dumping data for table `users`

--

INSERT INTO
    `users` (
        `id`,
        `name`,
        `email`,
        `email_verified_at`,
        `password`,
        `role`,
        `remember_token`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'redha',
        'redha@gmail.com',
        NULL,
        '$2y$10$uSaJEZsTodxlFYdmcHDRgO3vJ.uvIQtJeekFUIe3rkMJVIKFyJGJy',
        'admin',
        NULL,
        '2022-05-24 07:27:21',
        '2022-05-26 08:51:44'
    ), (
        2,
        'admin',
        'admin@gmail.com',
        NULL,
        '$2y$10$qnBBM7dhk6o3NKGRgJugO.Ysj7VNN28tO/SD1ynFjoyANUtdRcp5W',
        'admin',
        NULL,
        '2022-05-26 08:22:13',
        '2022-05-26 08:51:55'
    ), (
        3,
        'petugas A',
        'petugas@gmail.com',
        NULL,
        '$2y$10$HYxVZcbutHJYwZKP1hlXm.uBCF99HQfOJg1Y2JP3idEg.kmSKT/HG',
        'admin',
        NULL,
        '2022-05-26 08:22:44',
        '2022-05-27 20:32:46'
    ), (
        5,
        'user1',
        'user1@gmail.com',
        NULL,
        '$2y$10$bNtrrYvHlc4m9TX8KvoevOC6G19gSbNxNNZGAlsqcCCL80WhFKYHi',
        'petugas',
        NULL,
        '2022-05-26 08:36:47',
        '2022-05-26 08:36:47'
    ), (
        6,
        'baru',
        'baru@gmail.com',
        NULL,
        '$2y$10$h117qi0aibQ7vm3k4Uzzde1aLySvyPTZ45WLdnJ11cxyAGWe.nkYW',
        'petugas',
        NULL,
        '2022-05-26 09:43:40',
        '2022-05-26 09:43:40'
    );

--

-- Indexes for dumped tables

--

--

-- Indexes for table `anggota`

--

ALTER TABLE `anggota` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `buku`

--

ALTER TABLE `buku` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `failed_jobs`

--

ALTER TABLE `failed_jobs`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--

-- Indexes for table `log_pinjam`

--

ALTER TABLE `log_pinjam`
ADD PRIMARY KEY (`id`),
ADD
    KEY `log_pinjam_id_buku_foreign` (`id_buku`),
ADD
    KEY `log_pinjam_id_anggota_foreign` (`id_anggota`);

--

-- Indexes for table `migrations`

--

ALTER TABLE `migrations` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `password_resets`

--

ALTER TABLE `password_resets`
ADD
    KEY `password_resets_email_index` (`email`);

--

-- Indexes for table `peminjaman`

--

ALTER TABLE `peminjaman`
ADD PRIMARY KEY (`id`),
ADD
    KEY `peminjaman_id_buku_foreign` (`id_buku`),
ADD
    KEY `peminjaman_id_anggota_foreign` (`id_anggota`);

--

-- Indexes for table `personal_access_tokens`

--

ALTER TABLE
    `personal_access_tokens`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
ADD
    KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (
        `tokenable_type`,
        `tokenable_id`
    );

--

-- Indexes for table `users`

--

ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `users_email_unique` (`email`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `anggota`

--

ALTER TABLE
    `anggota` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--

-- AUTO_INCREMENT for table `buku`

--

ALTER TABLE
    `buku` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--

-- AUTO_INCREMENT for table `failed_jobs`

--

ALTER TABLE
    `failed_jobs` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `log_pinjam`

--

ALTER TABLE
    `log_pinjam` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 8;

--

-- AUTO_INCREMENT for table `migrations`

--

ALTER TABLE
    `migrations` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 35;

--

-- AUTO_INCREMENT for table `peminjaman`

--

ALTER TABLE
    `peminjaman` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;

--

-- AUTO_INCREMENT for table `personal_access_tokens`

--

ALTER TABLE
    `personal_access_tokens` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `users`

--

ALTER TABLE
    `users` MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `log_pinjam`

--

ALTER TABLE `log_pinjam`
ADD
    CONSTRAINT `log_pinjam_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`),
ADD
    CONSTRAINT `log_pinjam_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--

-- Constraints for table `peminjaman`

--

ALTER TABLE `peminjaman`
ADD
    CONSTRAINT `peminjaman_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`),
ADD
    CONSTRAINT `peminjaman_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;