-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2024 at 12:40 PM
-- Server version: 8.0.35
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `python-craft2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Apa itu Python', 'pengenalan python', 1, '2024-07-05 05:19:56', '2024-07-05 05:19:56'),
(2, 'Python Sintaks', 'Python Sintaks', 1, '2024-07-05 05:20:15', '2024-07-05 05:20:15'),
(3, 'VARIABEL PYTHON', 'VARIABEL PYTHON', 1, '2024-07-05 05:20:36', '2024-07-05 05:20:36'),
(4, 'TIPE DATA PYTHON', 'TIPE DATA PYTHON', 1, '2024-07-05 05:20:49', '2024-07-05 05:20:49'),
(5, 'IF ELSE PYTHON', 'IF ELSE PYTHON', 1, '2024-07-05 05:21:00', '2024-07-05 05:21:00'),
(6, 'WHILE LOOP', 'WHILE LOOP', 1, '2024-07-05 05:21:13', '2024-07-05 05:21:13'),
(7, 'FOR LOOP', 'FOR LOOP', 1, '2024-07-05 05:21:27', '2024-07-05 05:21:27'),
(8, 'PYTHON FUNCTION', 'PYTHON FUNCTION', 1, '2024-07-05 05:21:40', '2024-07-05 05:21:40'),
(9, 'PYTHON ARRAYS', 'PYTHON ARRAYS', 1, '2024-07-05 05:21:56', '2024-07-05 05:21:56');

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
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `leaderboard_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `course_id`, `lesson_name`, `image_path`, `content`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Python', NULL, 'Python adalah bahasa pemrograman yang populer. Itu dibuat oleh Guido van Rossum, dan dirilis pada tahun 1991.\r\nIni digunakan untuk:\r\n1. Pengembangan web ( sisi server ).\r\n2. Pengembangan perangkat lunak.\r\n3. Matematika.\r\n4. Skrip sistem.', 1, '2024-07-05 05:22:58', '2024-07-05 05:22:58'),
(2, 1, 'Apa yang bisa dilakukan Python', NULL, 'Apa yang bisa dilakukan Python?\r\n1. Python dapat digunakan pada server untuk membuat aplikasi web.\r\n2. Python dapat digunakan bersama perangkat lunak untuk membuat alur kerja.\r\n3. Python dapat terhubung ke sistem basis data. Itu juga dapat membaca dan memodifikasi file.\r\n4. Python dapat digunakan untuk menangani data besar dan melakukan matematika yang kompleks.\r\nPython dapat digunakan untuk prototyping cepat, atau untuk pengembangan perangkat lunak siap produksi.', 1, '2024-07-05 05:23:32', '2024-07-05 05:23:32'),
(3, 1, 'Kenapa Python', NULL, 'Kenapa Python?\r\n1. Python bekerja pada platform yang berbeda ( Windows, Mac, Linux, Raspberry Pi, dll ).\r\n2. Python memiliki sintaks sederhana yang mirip dengan bahasa Inggris.\r\n3. Python memiliki sintaksis yang memungkinkan pengembang untuk menulis program dengan garis yang lebih sedikit daripada beberapa bahasa pemrograman lainnya.\r\n5. Python berjalan pada sistem juru bahasa, yang berarti bahwa kode dapat dieksekusi segera setelah ditulis. Ini berarti bahwa prototyping bisa sangat cepat.\r\n6. Python dapat diperlakukan dengan cara prosedural, cara berorientasi objek atau cara fungsional.', 1, '2024-07-05 05:24:22', '2024-07-05 05:24:22'),
(4, 1, 'Sintaks Python dibandingkan dengan bahasa pemrograman lain', NULL, 'Sintaks Python dibandingkan dengan bahasa pemrograman lain\r\n1. Python dirancang untuk keterbacaan, dan memiliki beberapa kesamaan dengan bahasa Inggris dengan pengaruh dari matematika.\r\n2. Python menggunakan baris baru untuk menyelesaikan perintah, berbeda dengan bahasa pemrograman lain yang sering menggunakan titik koma atau tanda kurung.\r\n3. Python bergantung pada lekukan, menggunakan spasi putih, untuk menentukan ruang lingkup; seperti ruang lingkup loop, fungsi dan kelas. Bahasa pemrograman lain sering menggunakan braket keriting untuk tujuan ini.', 1, '2024-07-05 05:25:26', '2024-07-05 05:25:26'),
(5, 2, 'Jalankan Sintaks Python', 'images/uxSxZxooDudrKChwF3SGUb8DO4GkB52Qf9TxUW0F.png', 'Sintaks Python adalah aturan untuk menulis program dalam bahasa Python. Sintaks ini harus diikuti untuk menjalankan kode dengan benar. Berikut beberapa contoh penggunaan sintaks Python:', 1, '2024-07-05 05:31:13', '2024-07-05 05:31:13'),
(6, 2, 'Variabel Python', 'images/6su9ERzsdn5XuAV50Cj2gdXY4gfPcvUOKljW0UNG.png', 'Variabel adalah tempat untuk menyimpan data. Python tidak memiliki perintah khusus untuk mendeklarasikan variabel. Variabel dibuat saat Anda pertama kali memberikan nilai padanya.', 1, '2024-07-05 05:32:10', '2024-07-05 05:32:10'),
(7, 2, 'Komentar', 'images/aI88zzfpweNljyEKxEE0BPyn9f4O1iv0XC2IFWzh.png', 'Python memiliki kemampuan untuk menambahkan komentar dalam kode. Komentar adalah teks yang diabaikan oleh interpreter Python dan hanya digunakan untuk dokumentasi atau penjelasan. Komentar dimulai dengan tanda pagar #, dan Python akan mengabaikan sisa baris setelahnya', 1, '2024-07-05 05:33:10', '2024-07-05 05:33:10'),
(8, 3, 'Variabel dalam Python', 'images/lsBw7H3feXEvnlvM0MggZdq6gRYILNiXhx8e5lRI.png', 'Variabel dalam Python digunakan untuk menyimpan nilai. Di Python, Anda tidak perlu mendeklarasikan tipe variabel secara eksplisit. Python secara otomatis menetapkan jenis data ke variabel saat Anda memberikan nilai.', 1, '2024-07-05 05:33:57', '2024-07-05 05:33:57'),
(9, 3, 'Penggunaan Variabel', 'images/qpTOi7Io5MjoFx6928Q8lR7rssAXCxlltUf364Jg.png', 'Variabel dapat digunakan dalam ekspresi matematika atau sebagai bagian dari output. Variabel juga dapat digunakan dalam fungsi print() untuk mencetak nilai variabel', 1, '2024-07-05 05:35:14', '2024-07-05 05:35:14'),
(10, 3, 'Penamaan Variabel yang Baik', 'images/tGAgQVWjfNRpVr6X7LAEsETyqUs4oLLtvZDexYEs.png', 'Saat menamai variabel, penting untuk menggunakan nama yang deskriptif dan mudah dimengerti. Nama variabel sebaiknya dimulai dengan huruf atau garis bawah (_) dan hanya mengandung huruf, angka, dan garis bawah. Nama variabel bersifat case-sensitive, artinya nama dan Nama dianggap berbeda dalam Python.', 1, '2024-07-05 05:36:01', '2024-07-05 05:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `log_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_19_093746_create_profiles_table', 1),
(6, '2024_06_19_093856_create_courses_table', 1),
(7, '2024_06_19_093935_create_lessons_table', 1),
(8, '2024_06_19_094009_create_user_progress_table', 1),
(9, '2024_06_19_094042_create_leaderboard_table', 1),
(10, '2024_06_19_094118_create_log_activity_table', 1),
(11, '2024_06_22_140841_create_quizzes_table_v2', 1),
(12, '2024_07_04_160839_create_transactions_table', 1),
(13, '2024_07_05_113607_create_progress_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `user_id` bigint UNSIGNED NOT NULL,
  `courses_id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apa yang dimaksud dengan Python?', 'Sebuah ular', 'Bahasa pemrograman', 'Sistem operasi', 'Sebuah nama merek pakaian', 'b', NULL, '2024-07-05 05:26:18', '2024-07-05 05:26:18'),
(2, 1, 'Apa yang bisa dilakukan Python?', 'Digunakan hanya pada server untuk membuat aplikasi web', 'Hanya digunakan bersama perangkat lunak untuk membuat alur kerja', 'Dapat terhubung ke sistem basis data dan membaca/memodifikasi file', 'Hanya digunakan untuk melakukan operasi matematika sederhana', 'c', NULL, '2024-07-05 05:27:38', '2024-07-05 05:27:38'),
(3, 1, 'Kenapa Python menjadi pilihan yang populer?', 'Karena memiliki sintaksis yang rumit', 'Karena hanya berjalan pada platform Windows', 'Karena memiliki sintaks sederhana yang mirip dengan bahasa Inggris dan dapat bekerja pada platform yang berbeda', 'Karena Python hanya digunakan untuk prototyping', 'c', NULL, '2024-07-05 05:28:33', '2024-07-05 05:28:33'),
(4, 1, 'Apa versi utama terbaru dari Python yang akan digunakan dalam tutorial ini?', 'Python 1', 'Python 2', 'Python 3', 'Python 4', 'c', NULL, '2024-07-05 05:29:01', '2024-07-05 05:29:01'),
(5, 1, 'Bagaimana Python menentukan ruang lingkup?', 'Menggunakan braket keriting', 'Menggunakan titik koma', 'Menggunakan spasi putih atau lekukan', 'Tidak menentukan ruang lingkup', 'c', NULL, '2024-07-05 05:29:38', '2024-07-05 05:29:38'),
(6, 3, 'Apa yang dimaksud dengan variabel dalam Python?', 'Sebuah nilai tetap yang tidak dapat diubah', 'Sebuah pernyataan untuk memulai program Python', 'Sebuah tempat untuk menyimpan nilai', 'Sebuah tipe data dalam Python', 'c', NULL, '2024-07-05 05:37:29', '2024-07-05 05:37:29'),
(7, 3, 'Bagaimana cara menetapkan nilai pada variabel dalam Python?', 'Dengan mendeklarasikan tipe variabel terlebih dahulu', 'Dengan memberikan tanda \"=\" diikuti dengan nilai yang ingin disimpan', 'Dengan menggunakan kata kunci \"value\"', 'Dengan mengetikkan nama variabel diikuti dengan nilai', 'b', NULL, '2024-07-05 05:38:03', '2024-07-05 05:38:03'),
(8, 3, 'Apa yang dimaksud dengan tipe data string dalam Python?', 'Tipe data yang hanya bisa berisi angka bulat', 'Tipe data yang hanya bisa berisi karakter teks', 'Tipe data yang hanya bisa berisi angka desimal', 'Tipe data yang hanya bisa berisi nilai boolean', 'b', NULL, '2024-07-05 05:38:55', '2024-07-05 05:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `no_transaksi` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_hati` int NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `hearts` int NOT NULL DEFAULT '3',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `hearts`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$NCMr9lj2nRRgPavSnjAyi.51.bpNHBFNmhxQmxZNOUeUWxgT8sADS', 'admin', 3, NULL, NULL, '2024-07-05 05:17:45', '2024-07-05 05:17:45'),
(2, 'Admin', 'admin@mail.com', '$2y$10$oKfy6wuClC8pScP7/e1J8ek2w9WfSzch7AHPwWQEKPu.kKbhwXRBu', 'admin', 3, NULL, NULL, '2024-07-05 05:17:45', '2024-07-05 05:17:45'),
(3, 'Elyssa Barrows', 'manuel.hills@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 3, '2024-07-05 05:17:45', 'De5eWIjOVj', '2024-07-05 05:17:45', '2024-07-05 05:17:45'),
(4, 'Kelley Labadie DVM', 'mrau@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 3, '2024-07-05 05:17:45', 'WYjUP3DCAn', '2024-07-05 05:17:45', '2024-07-05 05:17:45'),
(5, 'Waylon Nikolaus', 'tatyana44@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', 3, '2024-07-05 05:17:45', 'YJzESGbtKR', '2024-07-05 05:17:45', '2024-07-05 05:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `progress_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `courses_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `leaderboard_user_id_foreign` (`user_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`),
  ADD KEY `lessons_created_by_foreign` (`created_by`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_activity_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`user_id`,`courses_id`,`quiz_id`),
  ADD KEY `progress_courses_id_foreign` (`courses_id`),
  ADD KEY `progress_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `user_progress_user_id_foreign` (`user_id`),
  ADD KEY `user_progress_lesson_id_foreign` (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `leaderboard_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `log_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `no_transaksi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `progress_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD CONSTRAINT `log_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_courses_id_foreign` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `progress_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
