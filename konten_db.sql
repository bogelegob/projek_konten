-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2025 pada 06.17
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konten_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-dokumentasitikim@gmail.com|127.0.0.1', 'i:1;', 1752759674),
('laravel-cache-dokumentasitikim@gmail.com|127.0.0.1:timer', 'i:1752759674;', 1752759674);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_17_134250_create_posts_table', 2),
(5, '2025_07_17_135415_add_new_fields_to_posts_table', 3),
(6, '2025_07_17_140139_change_thumbnail_image_column_type_in_posts_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url_content` varchar(255) DEFAULT NULL,
  `thumbnail_image` text DEFAULT NULL,
  `social_media_platform` enum('youtube','tiktok','instagram','facebook','x','thread','berita') DEFAULT NULL,
  `jenis_social_media` enum('infografis','videografis') DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `url_content`, `thumbnail_image`, `social_media_platform`, `jenis_social_media`, `upload_date`, `created_at`, `updated_at`) VALUES
(1, 'Coba Saja', 'Bagus Sekali Pokoknya Top Deh', 'https://youtu.be/gvunApwKIiY?si=nWMWEV5Q5RMMTwq6', '/storage/thumbnails/RYMuX8MBQhiGWSy7jeTaCPg0Ttx59j7e8ei2tnkm.jpg', 'youtube', NULL, '2025-07-17', '2025-07-17 07:11:10', '2025-07-17 07:11:10'),
(2, 'Kocak Abis', 'Pokoknya Kocak Dah', 'http://localhost:8081/phpmyadmin/', '/storage/thumbnails/O2ZcmIgOkQsE3rICgm9XZkVbmIVrruLcyzb9iSEE.png', 'tiktok', NULL, '2025-07-16', '2025-07-17 07:18:35', '2025-07-17 07:18:35'),
(3, 'Kanwil Ditjen Imigrasi Banten Sosialisasikan Prosedur Visa dan Izin Tinggal Prosedur Penggunaan TKA', 'Cilegon, 24 Juni 2025 – Kantor Wilayah Direktorat Jenderal Imigrasi Banten menyelenggarakan kegiatan Sosialisasi Keimigrasian terkait Prosedur Perizinan Visa dan Izin Tinggal bagi Pengguna Tenaga Kerja Asing (TKA). Acara yang berlangsung di Aston Boutique Hotel Cilegon ini dibuka secara resmi oleh Kepala Kantor Wilayah yang diwakili Kabid Pengawasan dan Penindakan Keimigrasian Kanwil Ditjen Imigrasi Banten, Bapak Eben Rifky Taufan.\r\n\r\nKegiatan dihadiri oleh perwakilan perusahaan, HRD, dan pelaku usaha dari berbagai sektor industri di wilayah Banten. Sosialisasi bertujuan memberikan pemahaman komprehensif mengenai ketentuan keimigrasian dalam pemanfaatan TKA, berdasarkan kebijakan selektif (selective policy) yang menjunjung tinggi nilai Hak Asasi Manusia, diatur masuknya orang asing ke dalam wilayah Indonesia, demikian pula bagi orang asing yang memperoleh izin tinggal di wilayah Indonesia, harus sesuai dengan maksud dan tujuannya berada di Indonesia.', 'https://www.instagram.com/p/DMfIc2dzPLu/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', '/storage/thumbnails/oJYL6txcz1RN7l1qpnUO9NMcOGZ32onvxNu9uFd3.png', 'instagram', NULL, '2025-07-24', '2025-07-24 20:54:04', '2025-07-24 21:19:58'),
(4, 'Kanwil Ditjen Imigrasi Banten Sosialisasikan Prosedur Visa dan Izin Tinggal Prosedur Penggunaan TKA', 'Cilegon, 24 Juni 2025 – Kantor Wilayah Direktorat Jenderal Imigrasi Banten menyelenggarakan kegiatan Sosialisasi Keimigrasian terkait Prosedur Perizinan Visa dan Izin Tinggal bagi Pengguna Tenaga Kerja Asing (TKA). Acara yang berlangsung di Aston Boutique Hotel Cilegon ini dibuka secara resmi oleh Kepala Kantor Wilayah yang diwakili Kabid Pengawasan dan Penindakan Keimigrasian Kanwil Ditjen Imigrasi Banten, Bapak Eben Rifky Taufan.\r\n\r\nKegiatan dihadiri oleh perwakilan perusahaan, HRD, dan pelaku usaha dari berbagai sektor industri di wilayah Banten. Sosialisasi bertujuan memberikan pemahaman komprehensif mengenai ketentuan keimigrasian dalam pemanfaatan TKA, berdasarkan kebijakan selektif (selective policy) yang menjunjung tinggi nilai Hak Asasi Manusia, diatur masuknya orang asing ke dalam wilayah Indonesia, demikian pula bagi orang asing yang memperoleh izin tinggal di wilayah Indonesia, harus sesuai dengan maksud dan tujuannya berada di Indonesia.', 'https://www.facebook.com/share/p/1DyZwtmBsk/', '/storage/thumbnails/QAHkscNcTqjoPryNmvSBsvND8n1xEMwa8xTXH6YP.png', 'facebook', NULL, '2025-07-24', '2025-07-24 21:19:27', '2025-07-24 21:35:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9aYGz82IJjoaKfZF3Vy9Wvr5lOmUBUuMLDPP7gYr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQngxY0hYY3JmbzIxQTZObjE1ZHZLZWJnUHhJWnJ6UUVWaHpDWkFiSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1753414130),
('LHzrmsZ5rCkDUp85FJ1UuKRmRBtw8bTelu9hTLAY', 1, '192.168.200.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS3l5aldZaGVCcVBKazg2S1ZWMDVocTRFY1l6WDFpMnl4MFp5OEdGYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODA6Imh0dHA6Ly8xOTIuMTY4LjIwMC4xMzE6ODE4MS9yZXBvcnRzL2dlbmVyYXRlLXBkZj9tb250aD0mcGxhdGZvcm09aW5zdGFncmFtJnllYXI9Ijt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1753424424),
('p4Vzw5Slt674K3AosDbNdlslUY2lg3VoEergQtkZ', NULL, '192.168.200.118', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/377.0.781279791 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmtMUDJqS1MzRW9oZDJCTDN3MXZFcWJMZTd2ZXVJOW0yZ29pUUdVWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xOTIuMTY4LjIwMC4xMzE6ODE4MS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753414246),
('wczknVh6jHWY3ncqKVdGgfaZPnDNsP0PbMjNA6N2', 1, '192.168.200.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVldNWUlrc1A0a1FXNWN2dVBJeEhYaWd4ZWNtYjZVdGZWUWlCWERzaCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjgwOiJodHRwOi8vMTkyLjE2OC4yMDAuMTMxOjgxODEvcmVwb3J0cy9nZW5lcmF0ZS1wZGY/bW9udGg9JnBsYXRmb3JtPWluc3RhZ3JhbSZ5ZWFyPSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1753441522);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$igYE0BnC13A/gVJccXTLieI9ZabnFdV6SK/yhzi0bOkrfdv0MXZZ2', NULL, '2025-07-17 06:40:52', '2025-07-17 06:40:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
