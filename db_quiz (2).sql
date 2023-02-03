-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 01:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Joton Sutradhar', 'jotonsutradharjoy@gmail.com', 'Create an interactive quiz to generate leads or engage your audience. Get started with Typeform\'s free and easy online quiz maker, complete with templates.', 1, NULL, '2022-09-25 17:59:04'),
(2, 'Test', 'jotonsutradharjoy@gmail.com', 'test', 1, NULL, '2022-09-25 11:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `exam_candidates`
--

CREATE TABLE `exam_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_candidates`
--

INSERT INTO `exam_candidates` (`id`, `user_id`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2022-09-25 18:01:28', '2022-09-25 18:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_06_01_172545_create_users_table', 1),
(2, '2021_06_01_172609_create_user_roles_table', 1),
(3, '2021_06_20_120021_create_quizzes_table', 2),
(4, '2021_06_20_120035_create_questions_table', 2),
(5, '2021_06_20_120057_create_results_table', 2),
(6, '2021_06_20_235515_create_exam_candidates_table', 2),
(7, '2022_09_25_171712_create_contacts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_b` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_c` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_d` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`, `updated_at`) VALUES
(1, 6, 'What is the latest Laravel version?', 'version is 8.x', 'version is 7.x', 'version is 6.x', 'version is 9.x', 'option_d', '2022-09-25 10:20:04', '2022-09-25 10:31:24'),
(3, 6, 'What is the templating engine used in Laravel?', 'Router', 'Model', 'Blade', 'Controller', 'option_c', '2022-09-25 10:34:43', '2022-09-25 10:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `from_time` datetime NOT NULL,
  `to_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `image`, `description`, `duration`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(1, 'Build a stronger organizational culture', 'quiz-1.jpg', 'Maybe your company experienced a growth spurt that brought an influx of new staff in. Growing too fast could mean values don\'t get transmitted, cultural norms give way to individuality, and organizational culture getting lost in translation.', 60, '2022-09-25 15:34:00', '2022-09-30 15:34:00', '2022-09-25 09:38:12', '2022-09-25 09:38:12'),
(2, 'Quiz to make placement a breeze', 'quiz-2.jpg', 'If you\'re teaching different levels, use an online quiz to make sure your students are placed in the right class. It\'s a great way to introduce new students to your teaching style, making them comfortable and keeping them confident at the same time.', 45, '2022-09-25 15:41:00', '2022-10-08 15:41:00', '2022-09-25 09:41:55', '2022-09-25 09:41:55'),
(3, 'Templates for our online quiz maker', 'quiz-3.jpg', 'This quiz template lets you build your own trivia game. Add some GIFs and modify the questions to launch your online quiz today.', 50, '2022-09-25 15:42:00', '2022-10-06 15:42:00', '2022-09-25 09:42:29', '2022-09-25 09:42:29'),
(4, 'SCIENCE QUIZ', 'quiz-4.jpg', 'A placement test like this is fun, engaging, but takes a little time to edit. When you’re ready to flex its power, our online quiz maker won’t disappoint.', 30, '2022-09-25 15:43:00', '2022-10-15 15:43:00', '2022-09-25 09:43:21', '2022-09-25 10:04:51'),
(5, 'English placement test', 'quiz-5.jpg', 'A placement test like this is fun, engaging, but takes a little time to edit. When you’re ready to flex its power, our online quiz maker won’t disappoint.', 30, '2022-09-25 15:43:00', '2022-10-15 15:43:00', '2022-09-25 09:59:40', '2022-09-25 10:04:15'),
(6, 'VOCABULARY QUIZ', 'quiz-6.jpg', 'This template is ideal for English teachers wishing to make learning more fun. This template is ideal for English teachers wishing to make learning more fun.', 35, '2022-09-25 15:43:00', '2022-10-15 15:43:00', '2022-09-25 10:00:31', '2022-09-25 10:05:10'),
(7, 'Test', 'quiz-7.jpg', 'A Quiz Website Can Help You Gain A Better Understanding Of Your Customers. It Can Strengthen Your Reputation As A Brand And Help You Create Stronger Relationships By Increasing Your Social Media Presence. Because Quizzes And Surveys Can Be Taken From Virtually Anywhere, They Can Be Very Convenient Marketing Tools Beyond Typical Classroom Applications For Students And Teachers.', 40, '2022-09-25 23:58:00', '2022-10-08 23:58:00', '2022-09-25 17:58:49', '2022-09-25 17:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_score` int(11) NOT NULL,
  `achieved_score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'jotonsutradhar', '$2y$10$l0fDmiKnLr3UxoXu9sUu2ezwh6x4xUXhlSJmhzta7ORXmU5bsiccq', '2022-09-11 06:25:30', '2022-09-11 06:25:30'),
(2, 'user', '$2y$10$B4Sin6TPjaEX.CAQIcWhy.ARY5EBF1SuuYeDSwhWfn8jcTcc2wRg.', '2022-09-11 18:16:17', '2022-09-11 18:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '2022-09-11 06:25:30', '2022-09-11 06:25:30'),
(2, 2, 'user', '2022-09-11 18:16:17', '2022-09-11 18:16:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_candidates`
--
ALTER TABLE `exam_candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_candidates_user_id_foreign` (`user_id`),
  ADD KEY `exam_candidates_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_candidates`
--
ALTER TABLE `exam_candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_candidates`
--
ALTER TABLE `exam_candidates`
  ADD CONSTRAINT `exam_candidates_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `exam_candidates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
