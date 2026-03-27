-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2026 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stagepassapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_highlights`
--

CREATE TABLE `about_highlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_section_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `about_pages`
--

CREATE TABLE `about_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_pages`
--

INSERT INTO `about_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'About Us - StagePass Audio Visual | Professional AV Solutions in Kenya', 'Learn about StagePass Audio Visual, Kenya\'s leading provider of professional audio-visual solutions, event production services, and technical excellence since our founding.', 'about stagepass, audio visual company kenya, av solutions nairobi, event production kenya, professional av services, stagepass team, av technology kenya, sound systems kenya, lighting solutions nairobi', '/uploads/og-about.jpg', 'About StagePass Audio Visual', 'Delivering exceptional audio-visual experiences with cutting-edge technology and unmatched expertise across Kenya and East Africa.', '<p>StagePass Audio Visual is a premier provider of professional audio-visual solutions, serving clients across Kenya and East Africa. With years of experience in event production, corporate presentations, and technical installations, we bring creativity and technical excellence to every project.</p><p>Our team of skilled professionals is dedicated to delivering exceptional results that exceed expectations. From intimate corporate gatherings to large-scale events, we have the expertise and equipment to make your vision a reality.</p>', '/uploads/about-image.jpg', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge_label` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description_primary` text NOT NULL,
  `description_secondary` text DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `stat_value` varchar(255) DEFAULT NULL,
  `stat_label` varchar(255) DEFAULT NULL,
  `button_label` varchar(255) DEFAULT NULL,
  `vision_title` varchar(255) DEFAULT NULL,
  `vision_text` text DEFAULT NULL,
  `people_title` varchar(255) DEFAULT NULL,
  `people_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `badge_label`, `title`, `description_primary`, `description_secondary`, `image_url`, `stat_value`, `stat_label`, `button_label`, `vision_title`, `vision_text`, `people_title`, `people_description`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'Who We Are', 'StagePass Audio-Visual Limited is an integrated technical, consulting, planning, design and implementation provider for professional event planning and design based in Nairobi and operating within Africa. <br><br> We specialize in rentals of audio-visual technology including sound, screens, lighting, content management, digital and Interactive technology and scenic design.', NULL, 'uploads/1770219282_6983671296d2b.jpg', '2362+', 'Successful Events', 'Learn More About Us', 'Our Vision', 'TO BE AFRICA\'S REVOLUTIONARY EVENTS TECHNOLOGY EXPERTS', NULL, NULL, '2026-02-07 20:56:23', '2026-02-07 20:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `bottom_nav_links`
--

CREATE TABLE `bottom_nav_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bottom_nav_links`
--

INSERT INTO `bottom_nav_links` (`id`, `label`, `href`, `icon`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Home', '#home', 'Home', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 'About', '#about', 'Info', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 'Services', '#services', 'Briefcase', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 'Work', '#portfolio', 'Camera', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(5, 'Contact', '#contact', 'Mail', 5, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients_sections`
--

CREATE TABLE `clients_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge_label` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_sections`
--

INSERT INTO `clients_sections` (`id`, `badge_label`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'The Power Behind Us', 'Our Clients', 'With forward-thinking brands and organizations that demand reliability, creativity, and flawless execution. From corporate leaders to global innovators, our clients trust us to elevate their events.', '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_section_id` bigint(20) UNSIGNED NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`id`, `clients_section_id`, `logo_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/Y5bPgBH6xu5tS5ORcupRBHK0UbEU2joeOnh15HEW.png', 'Client 1', 1, '2026-02-04 20:09:33', '2026-02-05 18:44:07'),
(2, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/tf8iuGtgkYJFBVbTYadYCYZ9vGjFrEHYWBRU4ley.png', 'Client 2', 2, '2026-02-04 20:09:33', '2026-02-05 20:23:50'),
(3, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/808nXXBL1SbRPBssAqMhrhsCx1WUmB4QPmb6BiJ0.png', 'Client 3', 3, '2026-02-04 20:09:33', '2026-02-05 20:24:25'),
(4, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/B9GE3rHB3z5kgU8EjqK8IACzWWZ4i16MSBzLmTfR.png', 'Client 4', 4, '2026-02-04 20:09:33', '2026-02-05 20:24:58'),
(5, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/VSUp7ZYRp104VW4wHmbhbeMFB3RH0yyUJlXsnJ9t.png', 'Client 5', 5, '2026-02-04 20:09:33', '2026-02-05 20:25:25'),
(6, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/LjXW7zCA3J9GYvLt5Tu1sBFlJUAW1dugv67W6KiC.png', 'Client 6', 6, '2026-02-04 20:09:33', '2026-02-05 20:25:43'),
(7, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/MsRXFCd2QUifM1mHgUHYBJXNnBEhqxkLLVRV9Y7h.png', 'Client 7', 7, '2026-02-04 20:09:33', '2026-02-05 20:26:01'),
(8, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/nusEbmXvAuQMPx1l4jtTMXVWUMxjueC9FaCrcjZ1.png', 'Client 8', 8, '2026-02-04 20:09:33', '2026-02-05 20:27:26'),
(9, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/E6YZvi0FpUTrxKhItGADJkLkYCAbydB6qpt2VR7P.png', 'Client 9', 9, '2026-02-04 20:09:33', '2026-02-05 20:27:45'),
(10, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/t8rN1njoHyAXJC8fq6fcQYnJO47h1iDML2pGD5do.png', 'Client 10', 10, '2026-02-04 20:09:33', '2026-02-05 20:28:15'),
(11, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/dWIs5iDIWhVUUXMM1A7UlqwHR8Jew47vv5DRllkj.png', 'Client 11', 11, '2026-02-04 20:09:33', '2026-02-05 20:28:48'),
(12, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/hKqeg6mos38dmyqAoiqYW33TUAlqHeMNnEUFYk3T.png', 'Client 12', 12, '2026-02-04 20:09:33', '2026-02-05 20:30:37'),
(13, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/IKfCWzNikGeuQjJloQNBSWoKGn2NqvGBSiAxq6av.png', 'Client 13', 13, '2026-02-04 20:09:33', '2026-02-05 20:31:28'),
(14, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/PZlrzu5jK43oBvqrubLQ4FYLI1L0qabvnno0bujP.png', 'Client 14', 14, '2026-02-04 20:09:33', '2026-02-05 20:31:52'),
(15, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/UyysjVoV44dCaFiteJGxkybdYS4ahuXUBtgWUQXg.png', 'Client 15', 15, '2026-02-04 20:09:33', '2026-02-05 20:32:12'),
(16, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/IQAyywDjkCq9rUFcfVhrnWpqyQ38DTxtd9hkBk5R.png', 'Client 16', 16, '2026-02-04 20:09:33', '2026-02-05 20:32:30'),
(17, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/bx49tNCId8z2bhkV8lPFpqBYP0cKMkSizghAdOpi.png', 'Client 17', 17, '2026-02-04 20:09:33', '2026-02-05 20:32:48'),
(18, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/vZSM3fYYqK3qQrNMTfqd11uRK4tGLE6MR4m2vjzO.png', 'Client 18', 18, '2026-02-04 20:09:33', '2026-02-05 20:33:18'),
(19, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/4vcdeMydf73Bh4IZhWJ4hGfTDMZyJBHzHo8MfiNt.png', 'Client 19', 19, '2026-02-04 20:09:33', '2026-02-05 20:33:49'),
(20, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/DSvdJSKVidATBciZUUMJIctaxoWdGp5fri9lU0Ds.png', 'Client 20', 20, '2026-02-04 20:09:33', '2026-02-05 20:34:08'),
(22, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/x6sroKL05w2cd6vs4B1a037iXNyZ1G0wQpnFuE5G.png', NULL, 0, '2026-02-05 20:39:09', '2026-02-05 20:39:09'),
(23, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/2HtnVHPoOGPtNP6kOEYhVaf2L1CIfPBy7Zriyz9M.png', NULL, 0, '2026-02-05 20:40:18', '2026-02-05 20:40:18'),
(24, 1, 'https://api.stagepass.co.ke/storage/admin/client_logos/i37jGItefRdQS7dvCuMv0KjEr5xxSGywXavOa6z9.png', NULL, 0, '2026-02-05 20:41:58', '2026-02-05 20:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_section_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `contact_section_id`, `label`, `value`, `icon`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Location', 'Jacaranda Close, Ridgeways, Nairobi, Kenya', 'MapPin', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'Phone', '+254 729 171 351', 'Phone', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'Email', 'info@stagepass.co.ke', 'Mail', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'Business Hours', 'Mon - Fri: 9:00 AM - 6:00 PM\nSat: 10:00 AM - 4:00 PM', 'Clock', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Albert Muhatia', 'albertmuhatia@gmail.com', '+254723014032', 'Test has text limiter', '2026-02-05 16:42:51', '2026-02-05 16:42:51'),
(2, 'Albert', 'albertmuhatia@gmail.com', '+254723014032', 'Test on remote server', '2026-02-05 16:49:00', '2026-02-05 16:49:00'),
(3, 'Albert Muhatia', 'albertmuhatia@gmail.com', '+254723014032', 'Test Messag Cleared Configs test spam arithmentics and the honeypot', '2026-02-09 23:35:23', '2026-02-09 23:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_pages`
--

CREATE TABLE `contact_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `form_title` text DEFAULT NULL,
  `form_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_pages`
--

INSERT INTO `contact_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `form_title`, `form_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact Us - Get in Touch | StagePass Audio Visual Kenya', 'Contact StagePass Audio Visual for professional AV solutions in Kenya. Reach us via phone, email, or visit our Nairobi office. Get a free quote for your next event.', 'contact stagepass, av company nairobi, stagepass contact, av services kenya contact, event production quote, av consultation kenya, stagepass phone number, av company email, nairobi av services', '/uploads/og-contact.jpg', 'Get in Touch', 'Ready to bring your event to life? Contact our team for professional audio-visual solutions and expert consultation.', '<p>We\'d love to hear from you! Whether you\'re planning an event, need technical consultation, or have questions about our services, our team is here to help.</p><p>Reach out to us through any of the contact methods below, and we\'ll get back to you promptly.</p>', 'Send Us a Message', 'Fill out the form below and we\'ll respond within 24 hours. For urgent inquiries, please call us directly.', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_sections`
--

CREATE TABLE `contact_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge_label` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_sections`
--

INSERT INTO `contact_sections` (`id`, `badge_label`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Get In Touch', 'Let\'s Create Something Amazing Together', NULL, 'Ready to elevate your next event? Contact us today for a quote or consultation.', '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `cron_jobs`
--

CREATE TABLE `cron_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `command` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('success','failed','running') NOT NULL DEFAULT 'running',
  `output` text DEFAULT NULL,
  `error` text DEFAULT NULL,
  `exit_code` int(11) DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `duration_ms` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cron_jobs`
--

INSERT INTO `cron_jobs` (`id`, `command`, `description`, `status`, `output`, `error`, `exit_code`, `started_at`, `finished_at`, `duration_ms`, `created_at`, `updated_at`) VALUES
(1, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 00:00:02', '2026-02-05 00:00:03', 872, '2026-02-05 00:00:02', '2026-02-05 00:00:03'),
(2, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 01:00:02', '2026-02-05 01:00:03', 1473, '2026-02-05 01:00:02', '2026-02-05 01:00:03'),
(3, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 02:00:02', '2026-02-05 02:00:03', 813, '2026-02-05 02:00:02', '2026-02-05 02:00:03'),
(4, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 03:00:03', '2026-02-05 03:00:03', 700, '2026-02-05 03:00:03', '2026-02-05 03:00:03'),
(5, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 04:00:02', '2026-02-05 04:00:03', 972, '2026-02-05 04:00:02', '2026-02-05 04:00:03'),
(6, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 05:00:02', '2026-02-05 05:00:04', 2042, '2026-02-05 05:00:02', '2026-02-05 05:00:04'),
(7, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 06:00:02', '2026-02-05 06:00:05', 2336, '2026-02-05 06:00:02', '2026-02-05 06:00:05'),
(8, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 07:00:02', '2026-02-05 07:00:03', 756, '2026-02-05 07:00:02', '2026-02-05 07:00:03'),
(9, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 08:00:02', '2026-02-05 08:00:03', 638, '2026-02-05 08:00:02', '2026-02-05 08:00:03'),
(10, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 09:00:02', '2026-02-05 09:00:03', 797, '2026-02-05 09:00:02', '2026-02-05 09:00:03'),
(11, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 10:00:02', '2026-02-05 10:00:03', 597, '2026-02-05 10:00:02', '2026-02-05 10:00:03'),
(12, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-05 10:00:02', '2026-02-05 10:00:03', 51, '2026-02-05 10:00:02', '2026-02-05 10:00:03'),
(13, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 11:00:02', '2026-02-05 11:00:03', 892, '2026-02-05 11:00:02', '2026-02-05 11:00:03'),
(14, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 12:00:02', '2026-02-05 12:00:03', 723, '2026-02-05 12:00:02', '2026-02-05 12:00:03'),
(15, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 13:00:02', '2026-02-05 13:00:02', 738, '2026-02-05 13:00:02', '2026-02-05 13:00:02'),
(16, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 14:00:03', '2026-02-05 14:00:04', 1343, '2026-02-05 14:00:03', '2026-02-05 14:00:04'),
(17, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 15:00:02', '2026-02-05 15:00:03', 817, '2026-02-05 15:00:02', '2026-02-05 15:00:03'),
(18, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 16:00:03', '2026-02-05 16:00:03', 794, '2026-02-05 16:00:03', '2026-02-05 16:00:03'),
(19, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 17:00:02', '2026-02-05 17:00:03', 907, '2026-02-05 17:00:02', '2026-02-05 17:00:03'),
(20, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 18:00:02', '2026-02-05 18:00:03', 596, '2026-02-05 18:00:02', '2026-02-05 18:00:03'),
(21, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 19:00:02', '2026-02-05 19:00:03', 1038, '2026-02-05 19:00:02', '2026-02-05 19:00:03'),
(22, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 20:00:02', '2026-02-05 20:00:03', 667, '2026-02-05 20:00:02', '2026-02-05 20:00:03'),
(23, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 21:00:02', '2026-02-05 21:00:03', 959, '2026-02-05 21:00:02', '2026-02-05 21:00:03'),
(24, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 22:00:02', '2026-02-05 22:00:04', 1133, '2026-02-05 22:00:02', '2026-02-05 22:00:04'),
(25, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-05 23:00:02', '2026-02-05 23:00:03', 1281, '2026-02-05 23:00:02', '2026-02-05 23:00:03'),
(26, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 00:00:02', '2026-02-06 00:00:03', 936, '2026-02-06 00:00:02', '2026-02-06 00:00:03'),
(27, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 01:00:03', '2026-02-06 01:00:04', 1639, '2026-02-06 01:00:03', '2026-02-06 01:00:04'),
(28, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 02:00:02', '2026-02-06 02:00:03', 751, '2026-02-06 02:00:02', '2026-02-06 02:00:03'),
(29, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 03:00:02', '2026-02-06 03:00:03', 1124, '2026-02-06 03:00:02', '2026-02-06 03:00:03'),
(30, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 04:00:02', '2026-02-06 04:00:03', 586, '2026-02-06 04:00:02', '2026-02-06 04:00:03'),
(31, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 05:00:01', '2026-02-06 05:00:04', 2607, '2026-02-06 05:00:01', '2026-02-06 05:00:04'),
(32, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 06:00:03', '2026-02-06 06:00:04', 964, '2026-02-06 06:00:03', '2026-02-06 06:00:04'),
(33, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 07:00:03', '2026-02-06 07:00:04', 658, '2026-02-06 07:00:03', '2026-02-06 07:00:04'),
(34, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 08:00:02', '2026-02-06 08:00:03', 969, '2026-02-06 08:00:02', '2026-02-06 08:00:03'),
(35, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 09:00:03', '2026-02-06 09:00:04', 788, '2026-02-06 09:00:03', '2026-02-06 09:00:04'),
(36, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 10:00:03', '2026-02-06 10:00:04', 801, '2026-02-06 10:00:03', '2026-02-06 10:00:04'),
(37, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-06 10:00:03', '2026-02-06 10:00:03', 411, '2026-02-06 10:00:03', '2026-02-06 10:00:03'),
(38, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 11:00:02', '2026-02-06 11:00:03', 1054, '2026-02-06 11:00:02', '2026-02-06 11:00:03'),
(39, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 12:00:02', '2026-02-06 12:00:03', 738, '2026-02-06 12:00:02', '2026-02-06 12:00:03'),
(40, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 13:00:02', '2026-02-06 13:00:02', 730, '2026-02-06 13:00:02', '2026-02-06 13:00:02'),
(41, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 14:00:02', '2026-02-06 14:00:04', 1402, '2026-02-06 14:00:02', '2026-02-06 14:00:04'),
(42, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 15:00:02', '2026-02-06 15:00:03', 762, '2026-02-06 15:00:02', '2026-02-06 15:00:03'),
(43, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 16:00:02', '2026-02-06 16:00:03', 838, '2026-02-06 16:00:02', '2026-02-06 16:00:03'),
(44, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 17:00:02', '2026-02-06 17:00:03', 819, '2026-02-06 17:00:02', '2026-02-06 17:00:03'),
(45, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 18:00:02', '2026-02-06 18:00:03', 661, '2026-02-06 18:00:02', '2026-02-06 18:00:03'),
(46, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 19:00:02', '2026-02-06 19:00:05', 2142, '2026-02-06 19:00:02', '2026-02-06 19:00:05'),
(47, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 20:00:02', '2026-02-06 20:00:03', 1030, '2026-02-06 20:00:02', '2026-02-06 20:00:03'),
(48, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 21:00:01', '2026-02-06 21:00:03', 1222, '2026-02-06 21:00:01', '2026-02-06 21:00:03'),
(49, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 22:00:02', '2026-02-06 22:00:03', 695, '2026-02-06 22:00:02', '2026-02-06 22:00:03'),
(50, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-06 23:00:03', '2026-02-06 23:00:03', 699, '2026-02-06 23:00:03', '2026-02-06 23:00:03'),
(51, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 00:00:02', '2026-02-07 00:00:03', 1037, '2026-02-07 00:00:02', '2026-02-07 00:00:03'),
(52, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 01:00:02', '2026-02-07 01:00:03', 1125, '2026-02-07 01:00:02', '2026-02-07 01:00:03'),
(53, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 02:00:03', '2026-02-07 02:00:04', 1052, '2026-02-07 02:00:03', '2026-02-07 02:00:04'),
(54, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 03:00:02', '2026-02-07 03:00:03', 714, '2026-02-07 03:00:02', '2026-02-07 03:00:03'),
(55, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 04:00:02', '2026-02-07 04:00:03', 1375, '2026-02-07 04:00:02', '2026-02-07 04:00:03'),
(56, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 05:00:02', '2026-02-07 05:00:04', 1995, '2026-02-07 05:00:02', '2026-02-07 05:00:04'),
(57, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 06:00:02', '2026-02-07 06:00:02', 756, '2026-02-07 06:00:02', '2026-02-07 06:00:02'),
(58, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 07:00:02', '2026-02-07 07:00:03', 681, '2026-02-07 07:00:02', '2026-02-07 07:00:03'),
(59, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 08:00:02', '2026-02-07 08:00:03', 808, '2026-02-07 08:00:02', '2026-02-07 08:00:03'),
(60, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 09:00:02', '2026-02-07 09:00:03', 680, '2026-02-07 09:00:02', '2026-02-07 09:00:03'),
(61, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 10:00:02', '2026-02-07 10:00:03', 967, '2026-02-07 10:00:02', '2026-02-07 10:00:03'),
(62, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-07 10:00:03', '2026-02-07 10:00:03', 439, '2026-02-07 10:00:03', '2026-02-07 10:00:03'),
(63, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 11:00:02', '2026-02-07 11:00:02', 703, '2026-02-07 11:00:02', '2026-02-07 11:00:02'),
(64, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 12:00:02', '2026-02-07 12:00:03', 879, '2026-02-07 12:00:02', '2026-02-07 12:00:03'),
(65, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 13:00:01', '2026-02-07 13:00:02', 744, '2026-02-07 13:00:01', '2026-02-07 13:00:02'),
(66, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 14:00:02', '2026-02-07 14:00:02', 692, '2026-02-07 14:00:02', '2026-02-07 14:00:02'),
(67, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 15:00:02', '2026-02-07 15:00:03', 1664, '2026-02-07 15:00:02', '2026-02-07 15:00:03'),
(68, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 16:00:02', '2026-02-07 16:00:03', 716, '2026-02-07 16:00:02', '2026-02-07 16:00:03'),
(69, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'failed', NULL, 'cURL error 56: Recv failure: Connection reset by peer (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://graph.facebook.com/v20.0/17841403996469818/media?fields=id%2Ccaption%2Cmedia_type%2Cmedia_url%2Cthumbnail_url%2Cpermalink%2Ctimestamp&access_token=EAARQZCEY3Hp0BQv5JDn7tG1KZAL00sAbOGF764R2TqOh1VvLA6I2No5vAgBrpcE9RQDOcN2o9x2Pow4NUaOwiDDkTuYa1vNitNZCNZBd9hKSvZAwftdXaoHqZBX4qwmRrEmQJORpRUzCl9BuO2BtUK3dIvKuzXycH61QCWvtkNJcxZCn3yeHK5MxkUtFBYp4WI9N5DaqRlufR5u&limit=50\n#0 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Http/Client/PendingRequest.php(1075): Illuminate\\Http\\Client\\PendingRequest->marshalRequestExceptionWithResponse()\n#1 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Support/helpers.php(329): Illuminate\\Http\\Client\\PendingRequest->Illuminate\\Http\\Client\\{closure}()\n#2 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Http/Client/PendingRequest.php(1027): retry()\n#3 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Http/Client/PendingRequest.php(847): Illuminate\\Http\\Client\\PendingRequest->send()\n#4 /home/stagepassco/public_html/api.stagepass.co.ke/app/Console/Commands/FetchInstagramMedia.php(59): Illuminate\\Http\\Client\\PendingRequest->get()\n#5 /home/stagepassco/public_html/api.stagepass.co.ke/app/Console/Commands/FetchInstagramMedia.php(26): App\\Console\\Commands\\FetchInstagramMedia->performTask()\n#6 /home/stagepassco/public_html/api.stagepass.co.ke/app/Console/Commands/Traits/LogsExecution.php(30): App\\Console\\Commands\\FetchInstagramMedia->App\\Console\\Commands\\{closure}()\n#7 /home/stagepassco/public_html/api.stagepass.co.ke/app/Console/Commands/FetchInstagramMedia.php(22): App\\Console\\Commands\\FetchInstagramMedia->logExecution()\n#8 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): App\\Console\\Commands\\FetchInstagramMedia->handle()\n#9 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Container/Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#10 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure()\n#11 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#12 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Container/Container.php(799): Illuminate\\Container\\BoundMethod::call()\n#13 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Console/Command.php(211): Illuminate\\Container\\Container->call()\n#14 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/symfony/console/Command/Command.php(341): Illuminate\\Console\\Command->execute()\n#15 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Console/Command.php(180): Symfony\\Component\\Console\\Command\\Command->run()\n#16 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/symfony/console/Application.php(1102): Illuminate\\Console\\Command->run()\n#17 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/symfony/console/Application.php(356): Symfony\\Component\\Console\\Application->doRunCommand()\n#18 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/symfony/console/Application.php(195): Symfony\\Component\\Console\\Application->doRun()\n#19 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(198): Symfony\\Component\\Console\\Application->run()\n#20 /home/stagepassco/public_html/api.stagepass.co.ke/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(1235): Illuminate\\Foundation\\Console\\Kernel->handle()\n#21 /home/stagepassco/public_html/api.stagepass.co.ke/artisan(16): Illuminate\\Foundation\\Application->handleCommand()\n#22 {main}', 1, '2026-02-07 17:00:02', '2026-02-07 17:00:03', 663, '2026-02-07 17:00:02', '2026-02-07 17:00:03'),
(70, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 18:00:02', '2026-02-07 18:00:03', 750, '2026-02-07 18:00:02', '2026-02-07 18:00:03'),
(71, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 19:00:01', '2026-02-07 19:00:02', 724, '2026-02-07 19:00:01', '2026-02-07 19:00:02'),
(72, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 20:00:02', '2026-02-07 20:00:04', 2292, '2026-02-07 20:00:02', '2026-02-07 20:00:04'),
(73, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 21:00:01', '2026-02-07 21:00:03', 1262, '2026-02-07 21:00:01', '2026-02-07 21:00:03'),
(74, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 22:00:02', '2026-02-07 22:00:03', 941, '2026-02-07 22:00:02', '2026-02-07 22:00:03'),
(75, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-07 23:00:03', '2026-02-07 23:00:06', 2964, '2026-02-07 23:00:03', '2026-02-07 23:00:06'),
(76, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 00:00:02', '2026-02-08 00:00:02', 646, '2026-02-08 00:00:02', '2026-02-08 00:00:02'),
(77, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 01:00:02', '2026-02-08 01:00:03', 972, '2026-02-08 01:00:02', '2026-02-08 01:00:03'),
(78, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 02:00:03', '2026-02-08 02:00:03', 760, '2026-02-08 02:00:03', '2026-02-08 02:00:03'),
(79, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 03:00:02', '2026-02-08 03:00:03', 669, '2026-02-08 03:00:02', '2026-02-08 03:00:03'),
(80, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 04:00:02', '2026-02-08 04:00:03', 1070, '2026-02-08 04:00:02', '2026-02-08 04:00:03'),
(81, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 05:00:02', '2026-02-08 05:00:03', 942, '2026-02-08 05:00:02', '2026-02-08 05:00:03'),
(82, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 06:00:02', '2026-02-08 06:00:07', 4921, '2026-02-08 06:00:02', '2026-02-08 06:00:07'),
(83, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 07:00:02', '2026-02-08 07:00:05', 2695, '2026-02-08 07:00:02', '2026-02-08 07:00:05'),
(84, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 08:00:02', '2026-02-08 08:00:03', 948, '2026-02-08 08:00:02', '2026-02-08 08:00:03'),
(85, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 09:00:01', '2026-02-08 09:00:03', 1338, '2026-02-08 09:00:01', '2026-02-08 09:00:03'),
(86, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 10:00:03', '2026-02-08 10:00:04', 819, '2026-02-08 10:00:03', '2026-02-08 10:00:04'),
(87, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-08 10:00:03', '2026-02-08 10:00:03', 468, '2026-02-08 10:00:03', '2026-02-08 10:00:03'),
(88, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 11:00:02', '2026-02-08 11:00:03', 960, '2026-02-08 11:00:02', '2026-02-08 11:00:03'),
(89, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 12:00:02', '2026-02-08 12:00:03', 813, '2026-02-08 12:00:02', '2026-02-08 12:00:03'),
(90, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 13:00:01', '2026-02-08 13:00:03', 1100, '2026-02-08 13:00:01', '2026-02-08 13:00:03'),
(91, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 14:00:02', '2026-02-08 14:00:03', 923, '2026-02-08 14:00:02', '2026-02-08 14:00:03'),
(92, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 15:00:02', '2026-02-08 15:00:03', 685, '2026-02-08 15:00:02', '2026-02-08 15:00:03'),
(93, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 16:00:02', '2026-02-08 16:00:03', 631, '2026-02-08 16:00:02', '2026-02-08 16:00:03'),
(94, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 17:00:02', '2026-02-08 17:00:03', 647, '2026-02-08 17:00:02', '2026-02-08 17:00:03'),
(95, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 18:00:02', '2026-02-08 18:00:02', 673, '2026-02-08 18:00:02', '2026-02-08 18:00:02'),
(96, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 19:00:02', '2026-02-08 19:00:04', 1935, '2026-02-08 19:00:02', '2026-02-08 19:00:04'),
(97, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 20:00:02', '2026-02-08 20:00:02', 733, '2026-02-08 20:00:02', '2026-02-08 20:00:02'),
(98, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 21:00:02', '2026-02-08 21:00:03', 1120, '2026-02-08 21:00:02', '2026-02-08 21:00:03'),
(99, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 22:00:03', '2026-02-08 22:00:03', 668, '2026-02-08 22:00:03', '2026-02-08 22:00:03'),
(100, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-08 23:00:02', '2026-02-08 23:00:04', 1060, '2026-02-08 23:00:02', '2026-02-08 23:00:04'),
(101, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 00:00:02', '2026-02-09 00:00:03', 933, '2026-02-09 00:00:02', '2026-02-09 00:00:03'),
(102, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 01:00:02', '2026-02-09 01:00:03', 757, '2026-02-09 01:00:02', '2026-02-09 01:00:03'),
(103, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 02:00:02', '2026-02-09 02:00:03', 659, '2026-02-09 02:00:02', '2026-02-09 02:00:03'),
(104, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 03:00:02', '2026-02-09 03:00:03', 918, '2026-02-09 03:00:02', '2026-02-09 03:00:03'),
(105, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 04:00:02', '2026-02-09 04:00:03', 753, '2026-02-09 04:00:02', '2026-02-09 04:00:03'),
(106, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 05:00:02', '2026-02-09 05:00:04', 1728, '2026-02-09 05:00:02', '2026-02-09 05:00:04'),
(107, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 06:00:02', '2026-02-09 06:00:02', 636, '2026-02-09 06:00:02', '2026-02-09 06:00:02'),
(108, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 07:00:02', '2026-02-09 07:00:04', 1090, '2026-02-09 07:00:02', '2026-02-09 07:00:04'),
(109, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 08:00:03', '2026-02-09 08:00:04', 901, '2026-02-09 08:00:03', '2026-02-09 08:00:04'),
(110, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 09:00:02', '2026-02-09 09:00:03', 700, '2026-02-09 09:00:02', '2026-02-09 09:00:03'),
(111, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 10:00:02', '2026-02-09 10:00:03', 847, '2026-02-09 10:00:02', '2026-02-09 10:00:03'),
(112, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-09 10:00:02', '2026-02-09 10:00:02', 418, '2026-02-09 10:00:02', '2026-02-09 10:00:02'),
(113, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 11:00:02', '2026-02-09 11:00:03', 856, '2026-02-09 11:00:02', '2026-02-09 11:00:03'),
(114, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 12:00:02', '2026-02-09 12:00:03', 819, '2026-02-09 12:00:02', '2026-02-09 12:00:03'),
(115, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 13:00:02', '2026-02-09 13:00:03', 913, '2026-02-09 13:00:02', '2026-02-09 13:00:03'),
(116, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 14:00:02', '2026-02-09 14:00:02', 688, '2026-02-09 14:00:02', '2026-02-09 14:00:02'),
(117, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 15:00:02', '2026-02-09 15:00:03', 676, '2026-02-09 15:00:02', '2026-02-09 15:00:03'),
(118, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 16:00:03', '2026-02-09 16:00:03', 811, '2026-02-09 16:00:03', '2026-02-09 16:00:03'),
(119, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 17:00:02', '2026-02-09 17:00:03', 1277, '2026-02-09 17:00:02', '2026-02-09 17:00:03'),
(120, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 18:00:02', '2026-02-09 18:00:02', 878, '2026-02-09 18:00:02', '2026-02-09 18:00:02'),
(121, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 19:00:02', '2026-02-09 19:00:03', 878, '2026-02-09 19:00:02', '2026-02-09 19:00:03'),
(122, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 20:00:02', '2026-02-09 20:00:02', 740, '2026-02-09 20:00:02', '2026-02-09 20:00:02'),
(123, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 21:00:02', '2026-02-09 21:00:03', 672, '2026-02-09 21:00:02', '2026-02-09 21:00:03'),
(124, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 22:00:02', '2026-02-09 22:00:04', 1682, '2026-02-09 22:00:02', '2026-02-09 22:00:04'),
(125, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-09 23:00:02', '2026-02-09 23:00:03', 1194, '2026-02-09 23:00:02', '2026-02-09 23:00:03'),
(126, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 00:00:02', '2026-02-10 00:00:03', 911, '2026-02-10 00:00:02', '2026-02-10 00:00:03'),
(127, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 01:00:01', '2026-02-10 01:00:02', 835, '2026-02-10 01:00:01', '2026-02-10 01:00:02'),
(128, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 02:00:02', '2026-02-10 02:00:02', 671, '2026-02-10 02:00:02', '2026-02-10 02:00:02'),
(129, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 03:00:03', '2026-02-10 03:00:04', 1162, '2026-02-10 03:00:03', '2026-02-10 03:00:04'),
(130, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 04:00:02', '2026-02-10 04:00:03', 916, '2026-02-10 04:00:02', '2026-02-10 04:00:03'),
(131, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 05:00:02', '2026-02-10 05:00:03', 1545, '2026-02-10 05:00:02', '2026-02-10 05:00:03'),
(132, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 06:00:02', '2026-02-10 06:00:03', 775, '2026-02-10 06:00:02', '2026-02-10 06:00:03'),
(133, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 07:00:02', '2026-02-10 07:00:03', 940, '2026-02-10 07:00:02', '2026-02-10 07:00:03'),
(134, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 08:00:02', '2026-02-10 08:00:05', 2537, '2026-02-10 08:00:02', '2026-02-10 08:00:05'),
(135, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 09:00:03', '2026-02-10 09:00:03', 646, '2026-02-10 09:00:03', '2026-02-10 09:00:03'),
(136, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-10 10:00:02', '2026-02-10 10:00:03', 405, '2026-02-10 10:00:02', '2026-02-10 10:00:03'),
(137, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 10:00:03', '2026-02-10 10:00:03', 919, '2026-02-10 10:00:03', '2026-02-10 10:00:03'),
(138, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 11:00:02', '2026-02-10 11:00:04', 1282, '2026-02-10 11:00:02', '2026-02-10 11:00:04'),
(139, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 12:00:02', '2026-02-10 12:00:03', 630, '2026-02-10 12:00:02', '2026-02-10 12:00:03'),
(140, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 13:00:02', '2026-02-10 13:00:04', 1835, '2026-02-10 13:00:02', '2026-02-10 13:00:04'),
(141, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 14:00:02', '2026-02-10 14:00:03', 767, '2026-02-10 14:00:02', '2026-02-10 14:00:03'),
(142, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 15:00:02', '2026-02-10 15:00:02', 543, '2026-02-10 15:00:02', '2026-02-10 15:00:02'),
(143, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 16:00:02', '2026-02-10 16:00:03', 752, '2026-02-10 16:00:02', '2026-02-10 16:00:03'),
(144, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 17:00:02', '2026-02-10 17:00:03', 547, '2026-02-10 17:00:02', '2026-02-10 17:00:03'),
(145, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 18:00:02', '2026-02-10 18:00:03', 923, '2026-02-10 18:00:02', '2026-02-10 18:00:03'),
(146, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 19:00:02', '2026-02-10 19:00:03', 771, '2026-02-10 19:00:02', '2026-02-10 19:00:03'),
(147, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 20:00:02', '2026-02-10 20:00:03', 652, '2026-02-10 20:00:02', '2026-02-10 20:00:03'),
(148, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 21:00:02', '2026-02-10 21:00:02', 903, '2026-02-10 21:00:02', '2026-02-10 21:00:02'),
(149, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 22:00:02', '2026-02-10 22:00:03', 554, '2026-02-10 22:00:02', '2026-02-10 22:00:03'),
(150, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-10 23:00:02', '2026-02-10 23:00:04', 1372, '2026-02-10 23:00:02', '2026-02-10 23:00:04'),
(151, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 00:00:03', '2026-02-11 00:00:04', 851, '2026-02-11 00:00:03', '2026-02-11 00:00:04'),
(152, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 01:00:02', '2026-02-11 01:00:03', 742, '2026-02-11 01:00:02', '2026-02-11 01:00:03'),
(153, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 02:00:02', '2026-02-11 02:00:09', 6777, '2026-02-11 02:00:02', '2026-02-11 02:00:09'),
(154, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 03:00:02', '2026-02-11 03:00:03', 530, '2026-02-11 03:00:02', '2026-02-11 03:00:03'),
(155, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 04:00:02', '2026-02-11 04:00:03', 1062, '2026-02-11 04:00:02', '2026-02-11 04:00:03'),
(156, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 05:00:02', '2026-02-11 05:00:03', 1333, '2026-02-11 05:00:02', '2026-02-11 05:00:03'),
(157, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 06:00:02', '2026-02-11 06:00:03', 716, '2026-02-11 06:00:02', '2026-02-11 06:00:03'),
(158, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 07:00:02', '2026-02-11 07:00:03', 890, '2026-02-11 07:00:02', '2026-02-11 07:00:03'),
(159, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 08:00:02', '2026-02-11 08:00:02', 643, '2026-02-11 08:00:02', '2026-02-11 08:00:02'),
(160, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 09:00:02', '2026-02-11 09:00:03', 609, '2026-02-11 09:00:02', '2026-02-11 09:00:03'),
(161, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 10:00:03', '2026-02-11 10:00:04', 1373, '2026-02-11 10:00:03', '2026-02-11 10:00:04'),
(162, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-11 10:00:03', '2026-02-11 10:00:04', 410, '2026-02-11 10:00:03', '2026-02-11 10:00:04'),
(163, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 11:00:02', '2026-02-11 11:00:04', 1320, '2026-02-11 11:00:02', '2026-02-11 11:00:04'),
(164, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 12:00:02', '2026-02-11 12:00:02', 717, '2026-02-11 12:00:02', '2026-02-11 12:00:02'),
(165, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 13:00:02', '2026-02-11 13:00:03', 956, '2026-02-11 13:00:02', '2026-02-11 13:00:03'),
(166, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 14:00:02', '2026-02-11 14:00:03', 1123, '2026-02-11 14:00:02', '2026-02-11 14:00:03'),
(167, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 15:00:02', '2026-02-11 15:00:03', 854, '2026-02-11 15:00:02', '2026-02-11 15:00:03'),
(168, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 16:00:02', '2026-02-11 16:00:03', 658, '2026-02-11 16:00:02', '2026-02-11 16:00:03'),
(169, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 17:00:02', '2026-02-11 17:00:03', 669, '2026-02-11 17:00:02', '2026-02-11 17:00:03'),
(170, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 18:00:02', '2026-02-11 18:00:03', 868, '2026-02-11 18:00:02', '2026-02-11 18:00:03'),
(171, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 19:00:02', '2026-02-11 19:00:02', 669, '2026-02-11 19:00:02', '2026-02-11 19:00:02'),
(172, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 20:00:02', '2026-02-11 20:00:03', 1373, '2026-02-11 20:00:02', '2026-02-11 20:00:03'),
(173, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 21:00:02', '2026-02-11 21:00:03', 734, '2026-02-11 21:00:02', '2026-02-11 21:00:03'),
(174, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 22:00:02', '2026-02-11 22:00:04', 1111, '2026-02-11 22:00:02', '2026-02-11 22:00:04'),
(175, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-11 23:00:02', '2026-02-11 23:00:03', 1038, '2026-02-11 23:00:02', '2026-02-11 23:00:03'),
(176, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 00:00:02', '2026-02-12 00:00:03', 1100, '2026-02-12 00:00:02', '2026-02-12 00:00:03'),
(177, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 01:00:02', '2026-02-12 01:00:05', 3316, '2026-02-12 01:00:02', '2026-02-12 01:00:05'),
(178, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 02:00:02', '2026-02-12 02:00:03', 704, '2026-02-12 02:00:02', '2026-02-12 02:00:03'),
(179, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 03:00:02', '2026-02-12 03:00:03', 704, '2026-02-12 03:00:02', '2026-02-12 03:00:03'),
(180, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 04:00:01', '2026-02-12 04:00:02', 755, '2026-02-12 04:00:01', '2026-02-12 04:00:02'),
(181, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 05:00:02', '2026-02-12 05:00:04', 2398, '2026-02-12 05:00:02', '2026-02-12 05:00:04'),
(182, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 06:00:02', '2026-02-12 06:00:03', 806, '2026-02-12 06:00:02', '2026-02-12 06:00:03'),
(183, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 07:00:02', '2026-02-12 07:00:03', 1154, '2026-02-12 07:00:02', '2026-02-12 07:00:03'),
(184, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 08:00:02', '2026-02-12 08:00:03', 583, '2026-02-12 08:00:02', '2026-02-12 08:00:03'),
(185, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 09:00:02', '2026-02-12 09:00:02', 569, '2026-02-12 09:00:02', '2026-02-12 09:00:02'),
(186, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 10:00:02', '2026-02-12 10:00:03', 754, '2026-02-12 10:00:02', '2026-02-12 10:00:03'),
(187, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-12 10:00:02', '2026-02-12 10:00:03', 347, '2026-02-12 10:00:02', '2026-02-12 10:00:03'),
(188, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 11:00:02', '2026-02-12 11:00:03', 833, '2026-02-12 11:00:02', '2026-02-12 11:00:03'),
(189, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 12:00:02', '2026-02-12 12:00:03', 945, '2026-02-12 12:00:02', '2026-02-12 12:00:03'),
(190, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 13:00:03', '2026-02-12 13:00:04', 1292, '2026-02-12 13:00:03', '2026-02-12 13:00:04'),
(191, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 14:00:02', '2026-02-12 14:00:02', 802, '2026-02-12 14:00:02', '2026-02-12 14:00:02'),
(192, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 15:00:02', '2026-02-12 15:00:03', 785, '2026-02-12 15:00:02', '2026-02-12 15:00:03'),
(193, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 16:00:02', '2026-02-12 16:00:03', 970, '2026-02-12 16:00:02', '2026-02-12 16:00:03'),
(194, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 17:00:02', '2026-02-12 17:00:02', 880, '2026-02-12 17:00:02', '2026-02-12 17:00:02'),
(195, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 18:00:02', '2026-02-12 18:00:03', 711, '2026-02-12 18:00:02', '2026-02-12 18:00:03'),
(196, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 19:00:02', '2026-02-12 19:00:03', 1104, '2026-02-12 19:00:02', '2026-02-12 19:00:03'),
(197, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 20:00:02', '2026-02-12 20:00:03', 795, '2026-02-12 20:00:02', '2026-02-12 20:00:03'),
(198, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 21:00:02', '2026-02-12 21:00:03', 718, '2026-02-12 21:00:02', '2026-02-12 21:00:03'),
(199, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 22:00:02', '2026-02-12 22:00:03', 629, '2026-02-12 22:00:02', '2026-02-12 22:00:03'),
(200, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-12 23:00:01', '2026-02-12 23:00:03', 1919, '2026-02-12 23:00:01', '2026-02-12 23:00:03'),
(201, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 00:00:02', '2026-02-13 00:00:04', 1453, '2026-02-13 00:00:02', '2026-02-13 00:00:04'),
(202, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 01:00:02', '2026-02-13 01:00:03', 748, '2026-02-13 01:00:02', '2026-02-13 01:00:03'),
(203, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 02:00:02', '2026-02-13 02:00:03', 1306, '2026-02-13 02:00:02', '2026-02-13 02:00:03'),
(204, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 03:00:01', '2026-02-13 03:00:02', 916, '2026-02-13 03:00:01', '2026-02-13 03:00:02'),
(205, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 04:00:02', '2026-02-13 04:00:03', 986, '2026-02-13 04:00:02', '2026-02-13 04:00:03'),
(206, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 05:00:02', '2026-02-13 05:00:05', 2907, '2026-02-13 05:00:02', '2026-02-13 05:00:05'),
(207, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 06:00:02', '2026-02-13 06:00:03', 875, '2026-02-13 06:00:02', '2026-02-13 06:00:03'),
(208, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 07:00:03', '2026-02-13 07:00:04', 1111, '2026-02-13 07:00:03', '2026-02-13 07:00:04'),
(209, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 08:00:02', '2026-02-13 08:00:03', 991, '2026-02-13 08:00:02', '2026-02-13 08:00:03'),
(210, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 09:00:01', '2026-02-13 09:00:03', 1547, '2026-02-13 09:00:01', '2026-02-13 09:00:03'),
(211, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 10:00:02', '2026-02-13 10:00:03', 1003, '2026-02-13 10:00:02', '2026-02-13 10:00:03'),
(212, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-13 10:00:02', '2026-02-13 10:00:03', 436, '2026-02-13 10:00:02', '2026-02-13 10:00:03'),
(213, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 11:00:03', '2026-02-13 11:00:04', 831, '2026-02-13 11:00:03', '2026-02-13 11:00:04'),
(214, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 12:00:02', '2026-02-13 12:00:03', 899, '2026-02-13 12:00:02', '2026-02-13 12:00:03'),
(215, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 13:00:02', '2026-02-13 13:00:03', 892, '2026-02-13 13:00:02', '2026-02-13 13:00:03'),
(216, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 14:00:02', '2026-02-13 14:00:03', 858, '2026-02-13 14:00:02', '2026-02-13 14:00:03'),
(217, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 15:00:02', '2026-02-13 15:00:03', 726, '2026-02-13 15:00:02', '2026-02-13 15:00:03'),
(218, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 16:00:02', '2026-02-13 16:00:06', 3101, '2026-02-13 16:00:02', '2026-02-13 16:00:06');
INSERT INTO `cron_jobs` (`id`, `command`, `description`, `status`, `output`, `error`, `exit_code`, `started_at`, `finished_at`, `duration_ms`, `created_at`, `updated_at`) VALUES
(219, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 17:00:02', '2026-02-13 17:00:03', 999, '2026-02-13 17:00:02', '2026-02-13 17:00:03'),
(220, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 18:00:02', '2026-02-13 18:00:03', 851, '2026-02-13 18:00:02', '2026-02-13 18:00:03'),
(221, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 19:00:02', '2026-02-13 19:00:03', 755, '2026-02-13 19:00:02', '2026-02-13 19:00:03'),
(222, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 20:00:02', '2026-02-13 20:00:03', 746, '2026-02-13 20:00:02', '2026-02-13 20:00:03'),
(223, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 21:00:02', '2026-02-13 21:00:03', 732, '2026-02-13 21:00:02', '2026-02-13 21:00:03'),
(224, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 22:00:02', '2026-02-13 22:00:03', 652, '2026-02-13 22:00:02', '2026-02-13 22:00:03'),
(225, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-13 23:00:03', '2026-02-13 23:00:04', 751, '2026-02-13 23:00:03', '2026-02-13 23:00:04'),
(226, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 00:00:02', '2026-02-14 00:00:02', 839, '2026-02-14 00:00:02', '2026-02-14 00:00:02'),
(227, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 01:00:02', '2026-02-14 01:00:03', 1027, '2026-02-14 01:00:02', '2026-02-14 01:00:03'),
(228, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 02:00:02', '2026-02-14 02:00:03', 748, '2026-02-14 02:00:02', '2026-02-14 02:00:03'),
(229, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 03:00:02', '2026-02-14 03:00:03', 735, '2026-02-14 03:00:02', '2026-02-14 03:00:03'),
(230, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 04:00:02', '2026-02-14 04:00:05', 3148, '2026-02-14 04:00:02', '2026-02-14 04:00:05'),
(231, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 05:00:02', '2026-02-14 05:00:05', 2418, '2026-02-14 05:00:02', '2026-02-14 05:00:05'),
(232, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 06:00:02', '2026-02-14 06:00:03', 689, '2026-02-14 06:00:02', '2026-02-14 06:00:03'),
(233, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 07:00:02', '2026-02-14 07:00:02', 647, '2026-02-14 07:00:02', '2026-02-14 07:00:02'),
(234, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 08:00:02', '2026-02-14 08:00:03', 1088, '2026-02-14 08:00:02', '2026-02-14 08:00:03'),
(235, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 09:00:02', '2026-02-14 09:00:03', 691, '2026-02-14 09:00:02', '2026-02-14 09:00:03'),
(236, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 10:00:02', '2026-02-14 10:00:03', 729, '2026-02-14 10:00:02', '2026-02-14 10:00:03'),
(237, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-14 10:00:02', '2026-02-14 10:00:03', 548, '2026-02-14 10:00:02', '2026-02-14 10:00:03'),
(238, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 11:00:02', '2026-02-14 11:00:03', 1056, '2026-02-14 11:00:02', '2026-02-14 11:00:03'),
(239, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 12:00:02', '2026-02-14 12:00:03', 1104, '2026-02-14 12:00:02', '2026-02-14 12:00:03'),
(240, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 13:00:02', '2026-02-14 13:00:03', 938, '2026-02-14 13:00:02', '2026-02-14 13:00:03'),
(241, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 14:00:02', '2026-02-14 14:00:03', 1088, '2026-02-14 14:00:02', '2026-02-14 14:00:03'),
(242, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 15:00:01', '2026-02-14 15:00:02', 762, '2026-02-14 15:00:01', '2026-02-14 15:00:02'),
(243, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 16:00:02', '2026-02-14 16:00:02', 763, '2026-02-14 16:00:02', '2026-02-14 16:00:02'),
(244, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 17:00:02', '2026-02-14 17:00:03', 629, '2026-02-14 17:00:02', '2026-02-14 17:00:03'),
(245, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 18:00:02', '2026-02-14 18:00:04', 1557, '2026-02-14 18:00:02', '2026-02-14 18:00:04'),
(246, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 19:00:02', '2026-02-14 19:00:02', 747, '2026-02-14 19:00:02', '2026-02-14 19:00:02'),
(247, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 20:00:02', '2026-02-14 20:00:03', 1094, '2026-02-14 20:00:02', '2026-02-14 20:00:03'),
(248, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 21:00:02', '2026-02-14 21:00:02', 778, '2026-02-14 21:00:02', '2026-02-14 21:00:02'),
(249, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 22:00:02', '2026-02-14 22:00:03', 688, '2026-02-14 22:00:02', '2026-02-14 22:00:03'),
(250, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-14 23:00:02', '2026-02-14 23:00:03', 955, '2026-02-14 23:00:02', '2026-02-14 23:00:03'),
(251, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 00:00:02', '2026-02-15 00:00:03', 818, '2026-02-15 00:00:02', '2026-02-15 00:00:03'),
(252, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 01:00:02', '2026-02-15 01:00:03', 982, '2026-02-15 01:00:02', '2026-02-15 01:00:03'),
(253, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 02:00:02', '2026-02-15 02:00:03', 737, '2026-02-15 02:00:02', '2026-02-15 02:00:03'),
(254, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 03:00:02', '2026-02-15 03:00:02', 676, '2026-02-15 03:00:02', '2026-02-15 03:00:02'),
(255, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 04:00:02', '2026-02-15 04:00:03', 826, '2026-02-15 04:00:02', '2026-02-15 04:00:03'),
(256, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 05:00:02', '2026-02-15 05:00:03', 1738, '2026-02-15 05:00:02', '2026-02-15 05:00:03'),
(257, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 06:00:02', '2026-02-15 06:00:03', 546, '2026-02-15 06:00:02', '2026-02-15 06:00:03'),
(258, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 07:00:02', '2026-02-15 07:00:02', 688, '2026-02-15 07:00:02', '2026-02-15 07:00:02'),
(259, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 08:00:02', '2026-02-15 08:00:03', 745, '2026-02-15 08:00:02', '2026-02-15 08:00:03'),
(260, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 09:00:02', '2026-02-15 09:00:03', 1005, '2026-02-15 09:00:02', '2026-02-15 09:00:03'),
(261, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-15 10:00:02', '2026-02-15 10:00:03', 401, '2026-02-15 10:00:02', '2026-02-15 10:00:03'),
(262, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 10:00:02', '2026-02-15 10:00:03', 650, '2026-02-15 10:00:02', '2026-02-15 10:00:03'),
(263, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 11:00:02', '2026-02-15 11:00:03', 978, '2026-02-15 11:00:02', '2026-02-15 11:00:03'),
(264, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 12:00:01', '2026-02-15 12:00:02', 632, '2026-02-15 12:00:01', '2026-02-15 12:00:02'),
(265, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 13:00:02', '2026-02-15 13:00:03', 819, '2026-02-15 13:00:02', '2026-02-15 13:00:03'),
(266, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 14:00:03', '2026-02-15 14:00:06', 3230, '2026-02-15 14:00:03', '2026-02-15 14:00:06'),
(267, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 15:00:02', '2026-02-15 15:00:03', 734, '2026-02-15 15:00:02', '2026-02-15 15:00:03'),
(268, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 16:00:02', '2026-02-15 16:00:03', 692, '2026-02-15 16:00:02', '2026-02-15 16:00:03'),
(269, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 17:00:02', '2026-02-15 17:00:03', 860, '2026-02-15 17:00:02', '2026-02-15 17:00:03'),
(270, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 18:00:02', '2026-02-15 18:00:03', 835, '2026-02-15 18:00:02', '2026-02-15 18:00:03'),
(271, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 19:00:02', '2026-02-15 19:00:03', 1053, '2026-02-15 19:00:02', '2026-02-15 19:00:03'),
(272, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 20:00:03', '2026-02-15 20:00:03', 752, '2026-02-15 20:00:03', '2026-02-15 20:00:03'),
(273, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 21:00:02', '2026-02-15 21:00:03', 607, '2026-02-15 21:00:02', '2026-02-15 21:00:03'),
(274, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 22:00:02', '2026-02-15 22:00:02', 866, '2026-02-15 22:00:02', '2026-02-15 22:00:02'),
(275, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-15 23:00:01', '2026-02-15 23:00:02', 657, '2026-02-15 23:00:01', '2026-02-15 23:00:02'),
(276, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 00:00:02', '2026-02-16 00:00:03', 865, '2026-02-16 00:00:02', '2026-02-16 00:00:03'),
(277, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 01:00:02', '2026-02-16 01:00:05', 2187, '2026-02-16 01:00:02', '2026-02-16 01:00:05'),
(278, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 02:00:02', '2026-02-16 02:00:03', 947, '2026-02-16 02:00:02', '2026-02-16 02:00:03'),
(279, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 03:00:02', '2026-02-16 03:00:03', 879, '2026-02-16 03:00:02', '2026-02-16 03:00:03'),
(280, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 04:00:02', '2026-02-16 04:00:03', 922, '2026-02-16 04:00:02', '2026-02-16 04:00:03'),
(281, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 05:00:02', '2026-02-16 05:00:04', 2477, '2026-02-16 05:00:02', '2026-02-16 05:00:04'),
(282, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 06:00:02', '2026-02-16 06:00:02', 856, '2026-02-16 06:00:02', '2026-02-16 06:00:02'),
(283, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 07:00:02', '2026-02-16 07:00:03', 987, '2026-02-16 07:00:02', '2026-02-16 07:00:03'),
(284, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 08:00:03', '2026-02-16 08:00:03', 742, '2026-02-16 08:00:03', '2026-02-16 08:00:03'),
(285, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 09:00:02', '2026-02-16 09:00:03', 611, '2026-02-16 09:00:02', '2026-02-16 09:00:03'),
(286, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 10:00:02', '2026-02-16 10:00:04', 1338, '2026-02-16 10:00:02', '2026-02-16 10:00:04'),
(287, 'instagram:send-status-email', 'Send daily email notification if Instagram fetching is working correctly', 'success', NULL, NULL, 0, '2026-02-16 10:00:02', '2026-02-16 10:00:03', 648, '2026-02-16 10:00:02', '2026-02-16 10:00:03'),
(288, 'instagram:fetch-media', 'Fetch Instagram media and store it in the database.', 'success', NULL, NULL, 0, '2026-02-16 11:00:02', '2026-02-16 11:00:03', 928, '2026-02-16 11:00:02', '2026-02-16 11:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `footer_more_links`
--

CREATE TABLE `footer_more_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_settings_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_more_links`
--

INSERT INTO `footer_more_links` (`id`, `footer_settings_id`, `label`, `href`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Terms & Conditions', '/terms-and-conditions', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'Privacy Policy', '/privacy', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'Sitemap', '/sitemap', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'Get AV Quote', '#quote', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `footer_quick_links`
--

CREATE TABLE `footer_quick_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_settings_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_quick_links`
--

INSERT INTO `footer_quick_links` (`id`, `footer_settings_id`, `label`, `href`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'About Us', '/about', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'Services', '/services', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'Our Work', '/our-work', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'Industries', '/industries', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(5, 1, 'Contact', '/contact', 5, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `footer_service_items`
--

CREATE TABLE `footer_service_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_settings_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_service_items`
--

INSERT INTO `footer_service_items` (`id`, `footer_settings_id`, `label`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full Production', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'Visual & Screens', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'Staging Services', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'Lighting Design', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(5, 1, 'Audio Systems', 5, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(6, 1, 'Equipment Rentals', 6, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `copyright` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `logo_url`, `description`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'https://stagepass.nuhiluxurytravel.com/uploads/StagePass-LOGO-y.png', 'Africa\'s premier audio-visual and event technology provider, delivering excellence through innovation and expertise.', '© 2025 StagePass Audio Visual Limited. All rights reserved. | Creative Solutions | Technical Excellence', '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `footer_social_links`
--

CREATE TABLE `footer_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `footer_settings_id` bigint(20) UNSIGNED NOT NULL,
  `platform` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_social_links`
--

INSERT INTO `footer_social_links` (`id`, `footer_settings_id`, `platform`, `url`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Facebook', '#', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'Twitter', '#', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'Instagram', '#', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'Linkedin', '#', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(5, 1, 'Youtube', '#', 5, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline` text NOT NULL,
  `background_video_url` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `headline`, `background_video_url`, `thumbnail_url`, `created_at`, `updated_at`) VALUES
(1, 'We Create the Most Engaging Events in the World Using Technology', 'https://api.stagepass.co.ke/uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4', 'uploads/1770555897_698889f967b11.png', '2026-02-04 20:09:33', '2026-02-08 18:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `industries_section_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `overlay_description` text DEFAULT NULL,
  `icon_name` varchar(255) DEFAULT NULL,
  `icon_url` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industries_section_id`, `title`, `description`, `overlay_description`, `icon_name`, `icon_url`, `image_url`, `video_url`, `link_url`, `sort_order`, `created_at`, `updated_at`) VALUES
(79, 1, 'Corporate & Business Events', 'Professional audio-visual solutions for corporate gatherings, conferences, and business events.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Conferences & summits</li><li>Product launches</li><li>AGMs & shareholder meetings</li><li>Award ceremonies</li><li>Team-building events</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Sound systems, LED screens, stage lighting, live streaming, interpretation systems</p></div>', 'Building2', NULL, NULL, NULL, NULL, 1, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(80, 1, 'Entertainment & Live Shows', 'Immersive audio-visual experiences for concerts, festivals, and live performances.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Concerts & music festivals</li><li>Comedy shows</li><li>Theatre productions</li><li>Cultural performances</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Line array sound systems, moving lights, LED backdrops, special effects, stage design</p></div>', 'Music', NULL, NULL, NULL, NULL, 2, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(81, 1, 'Exhibitions & Trade Shows', 'Engaging displays and interactive solutions for exhibitions and trade shows.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Exhibition stands</li><li>Product demo booths</li><li>Brand activations</li><li>Expo pavilions</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Touch screens, video walls, digital signage, interactive displays, booth lighting</p></div>', 'Clapperboard', NULL, NULL, NULL, NULL, 3, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(82, 1, 'Education & Training', 'Comprehensive AV solutions for educational institutions and training centers.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>University lecture halls</li><li>Training centers</li><li>E-learning environments</li><li>Graduation ceremonies</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Projectors, smart boards, recording systems, lecture capture, hybrid learning setups</p></div>', 'Building2', NULL, NULL, NULL, NULL, 4, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(83, 1, 'Religious Institutions', 'Professional AV systems for worship services, conferences, and religious events.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Weekly worship services</li><li>Conferences & crusades</li><li>Religious festivals</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Installed sound systems, IMAG screens, stage lighting, live broadcast systems</p></div>', 'Building2', NULL, NULL, NULL, NULL, 5, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(84, 1, 'Hospitality & Tourism', 'Elegant AV solutions for hotels, resorts, and destination events.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Hotel conferences</li><li>Destination weddings</li><li>Gala dinners</li><li>Resort entertainment</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Ballroom AV, ambient lighting, outdoor sound systems, projection mapping</p></div>', 'Gem', NULL, NULL, NULL, NULL, 6, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(85, 1, 'Healthcare & Medical', 'Specialized AV solutions for medical conferences and healthcare facilities.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Medical conferences</li><li>Hospital auditoriums</li><li>Surgical training broadcasts</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Presentation systems, live surgery streaming, recording systems, interpretation systems</p></div>', 'Building2', NULL, NULL, NULL, NULL, 7, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(86, 1, 'Government & Public Sector', 'Large-scale AV solutions for government functions and public events.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>National celebrations</li><li>Policy summits</li><li>State functions</li><li>Public forums</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Large-scale sound systems, LED screens, live broadcasting, security-compliant AV solutions</p></div>', 'Building2', NULL, NULL, NULL, NULL, 8, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(87, 1, 'Retail & Brand Experiences', 'Dynamic displays and interactive experiences for retail and brand activations.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>Store launches</li><li>Mall activations</li><li>Pop-up brand experiences</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Digital signage, LED displays, interactive screens, ambient lighting</p></div>', 'Palette', NULL, NULL, NULL, NULL, 9, '2026-02-08 19:34:24', '2026-02-08 19:34:24'),
(88, 1, 'Media, Film & Broadcasting', 'Professional studio and broadcast solutions for media production.', '<div class=\\\"text-left\\\"><p class=\\\"services-label mb-1.5 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">Services include:</p><ul class=\\\"list-disc list-inside mb-2 space-y-0.5 text-xs\\\"><li>TV studios</li><li>Podcast studios</li><li>Film premieres</li><li>Live broadcasts</li></ul><p class=\\\"av-needs-label mb-1 text-xs\\\" style=\\\"font-weight: 700 !important; color: #172455 !important; text-decoration: underline !important;\\\">AV Needs:</p><p class=\\\"text-xs\\\">Studio lighting, broadcast cameras, control rooms, virtual sets, streaming systems</p></div>', 'Clapperboard', NULL, NULL, NULL, NULL, 10, '2026-02-08 19:34:24', '2026-02-08 19:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `industries_pages`
--

CREATE TABLE `industries_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_pages`
--

INSERT INTO `industries_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Industries We Serve - AV Solutions for Every Sector | StagePass', 'StagePass provides specialized audio-visual solutions for corporate, entertainment, education, healthcare, hospitality, and government sectors across Kenya.', 'corporate av solutions, entertainment industry kenya, education technology, healthcare av systems, hospitality av services, government events kenya, sector-specific av solutions, industry av services nairobi', '/uploads/og-industries.jpg', 'Industries We Serve', 'Specialized audio-visual solutions tailored to the unique needs of different industries and sectors.', '<p>StagePass serves a diverse range of industries, each with unique audio-visual requirements. From corporate boardrooms to entertainment venues, educational institutions to healthcare facilities, we understand the specific needs of each sector.</p><p>Our industry expertise allows us to deliver solutions that not only meet technical requirements but also align with industry standards and best practices.</p>', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `industries_sections`
--

CREATE TABLE `industries_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries_sections`
--

INSERT INTO `industries_sections` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Industries We Serve', 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.', '2026-02-04 20:09:33', '2026-02-07 20:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `industry_pages`
--

CREATE TABLE `industry_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industry_pages`
--

INSERT INTO `industry_pages` (`id`, `slug`, `title`, `description`, `content`, `meta_description`, `meta_keywords`, `og_image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, '4', 'Theater & Dance', 'StagePass Audio visual has a long history providing technical support for theater and dance events. Success of these performances is all about preparation and full knowledge of the venue space and audience expectations. At StagePass Audio visual, we guarantee that all the services we provide for theater and dance events will exceed your expectations. Working with live performances, we pride ourselves on our ability to be flexible and adapt to the dynamic nature of theatrical productions.', '<p>Theater and dance performances require a deep understanding of artistic vision and technical precision. Our team works closely with directors, choreographers, and performers to bring their creative vision to life through expertly designed lighting, crystal-clear audio, and seamless technical execution.</p><p>We understand the unique challenges of live theater and dance, from quick scene changes to complex lighting cues that enhance the emotional impact of performances. Our services include theatrical lighting design, sound reinforcement for dialogue and music, video projection for set design, and technical support that ensures every performance runs smoothly.</p>', 'Professional AV services for theater and dance performances. Theatrical lighting, sound, and technical support for live performances.', NULL, NULL, 4, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(2, '1', 'Concerts', 'StagePass Audio visual has a long history in this industry, affording us a level of knowledge that can help you every step along the way. We maintain a vast inventory of equipment including the latest technology and our personnel have years of experience to know how to handle even the most complex setup. We understand that success is all about the preparation. We move in fast (and always accurately), set up efficiently, and ensure every detail is perfect for your concert event.', '<p>From intimate acoustic performances to large-scale arena concerts, StagePass Audio Visual has the expertise and equipment to make your event unforgettable. Our team understands the unique demands of live music events, from sound reinforcement that reaches every corner of the venue to lighting that enhances the performance and creates the perfect atmosphere.</p><p>We work closely with artists, promoters, and venue managers to deliver seamless audio-visual experiences that elevate every performance. Our comprehensive concert services include audio systems, lighting design, video displays, staging, and rigging – all executed with precision and professionalism.</p>', 'Professional AV services for concerts and live music events. Expert audio, lighting, and staging solutions for concerts of all sizes.', NULL, NULL, 1, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(3, '2', 'Corporate Events', 'Where matters of business are concerned, tact and a respect for privacy are paramount. We know that you expect both discretion and confidentiality. With StagePass Audio visual, those considerations come guaranteed. We also pledge that all personnel are well-organized and handle all hardware and equipment in a neat and clean manner. We fully appreciate the need to present a professional overall aesthetic, so you can be assured that everything is handled with the utmost professionalism.', '<p>Corporate events require a different approach than entertainment events. We understand the importance of clear communication, professional presentation, and seamless execution. Whether you\'re hosting a product launch, annual conference, board meeting, or corporate gala, our team ensures your message is delivered with clarity and impact.</p><p>Our corporate event services include professional audio systems for presentations, video displays for content sharing, lighting that enhances the professional atmosphere, and staging that reflects your company\'s brand and values. We work discreetly and efficiently, ensuring minimal disruption to your business operations.</p>', 'Professional AV services for corporate events. Discreet, reliable audio-visual solutions for business meetings, conferences, and corporate gatherings.', NULL, NULL, 2, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(4, '3', 'Fashion', 'The fashion industry is a fast-paced and ever-evolving universe. To ensure success at every fashion show, with every step a model takes on the catwalk, you need a partner you can rely on. StagePass Audio visual is that partner. Our vast experience with fashion events has given us the knowledge and the skill to work quickly and with precision. There\'s only one chance to get it right, and at StagePass, we make sure we get it right every time.', '<p>Fashion shows demand perfection. Every detail matters, from the lighting that highlights the garments to the audio that sets the mood and pace. Our team understands the unique requirements of fashion events and works closely with designers and event coordinators to create stunning runway experiences.</p><p>We provide specialized lighting design that showcases fabrics, colors, and textures beautifully, professional audio systems for music and commentary, video displays for brand presentations, and staging solutions that complement the fashion aesthetic. Our experience in the fashion industry ensures flawless execution for your runway shows, presentations, and fashion events.</p>', 'Professional AV services for fashion shows and events. Specialized lighting, audio, and staging solutions for the fashion industry.', NULL, NULL, 3, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(5, '5', 'Gala Dinners', 'At Stagepass Audio Visual, we specialize in large gatherings and properly prepared for any size of the audience. We employ creative solutions to manage big audiences, quickly and efficiently adapt to the changing needs of your event and guarantee the safety and satisfaction of all in attendance.', '<p>Gala dinners and formal events require elegance, sophistication, and flawless execution. Our team creates beautiful atmospheres that enhance the dining experience while ensuring clear audio for speeches, presentations, and entertainment. We understand that gala events are often fundraising or recognition events where every detail contributes to the overall success.</p><p>Our gala dinner services include elegant lighting design that creates the perfect ambiance, professional audio systems for speeches and entertainment, video displays for presentations and recognition, staging for speakers and performers, and comprehensive technical support throughout your event. We work with event planners to ensure seamless coordination and execution.</p>', 'Professional AV services for gala dinners and formal events. Elegant lighting, audio, and staging solutions for sophisticated gatherings.', NULL, NULL, 5, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(6, '6', 'Trade Shows', 'We are proud of our extensive history of providing production support for trade shows. This allows us to understand and navigate the complex – and usually unique – logistics of convention centers around the country to provide the very best for our clients every single time.', '<p>Trade shows present unique challenges with tight timelines, complex logistics, and the need to make a strong impression in a competitive environment. Our extensive experience with trade shows and exhibitions means we understand convention center logistics, power distribution requirements, and the fast-paced nature of these events.</p><p>We provide comprehensive trade show services including booth lighting, audio systems for presentations, video displays and LED walls, staging and platform solutions, power distribution, and full production support. Whether you need services for a single booth or full exhibition production, our team delivers reliable, professional solutions that help your business stand out.</p>', 'Professional AV services for trade shows and exhibitions. Booth lighting, audio, video displays, and full production support for trade shows.', NULL, NULL, 6, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(7, '7', 'Sporting Events', 'StagePass Audio visual has provided services for halftime shows, rallies and promotional events, often in very alternative venues. Events like these usually call for a fast turnaround. Impeccable preparation and planning allow us to be in place and on time at each and every sporting event.', '<p>Sporting events require robust audio systems that can rise above the roar of cheering fans, dynamic lighting that enhances the excitement, and reliable technical support that can handle the fast-paced nature of sports entertainment. Our team has extensive experience with stadium events, halftime shows, and sporting event productions.</p><p>We provide powerful audio systems designed for large venues, dynamic lighting for halftime shows and entertainment, video displays and scoreboards, staging for presentations and performances, and rapid setup and teardown services. Our expertise in alternative venues and fast turnarounds ensures your sporting event runs smoothly from start to finish.</p>', 'Professional AV services for sporting events. Stadium audio, halftime show lighting, and technical support for sports venues.', NULL, NULL, 7, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(8, '8', 'Nonprofit Events', 'Nonprofit organizations typically have to work within limited budgets. We understand that it can be overwhelming, but our experts are here to work with you to find a solution that meets your expectations (and your budget). Our project managers are dedicated to providing a neat, clean and organized look for every aspect of your event while delivering professional-quality results.', '<p>We believe that nonprofit organizations deserve the same high-quality audio-visual services as any other client, regardless of budget constraints. Our team works closely with nonprofit event organizers to create cost-effective solutions that don\'t compromise on quality or professionalism.</p><p>Our nonprofit event services include affordable audio systems for presentations and entertainment, professional lighting, video displays for content sharing, staging solutions, and comprehensive technical support. We understand the importance of your mission and work to ensure your events are successful in achieving your goals, whether that\'s fundraising, awareness, or community engagement.</p>', 'Affordable professional AV services for nonprofit events. Cost-effective audio-visual solutions for nonprofit organizations.', NULL, NULL, 8, '2026-02-04 19:52:32', '2026-02-04 19:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `instagram_media`
--

CREATE TABLE `instagram_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instagram_id` varchar(255) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `media_url` text NOT NULL,
  `thumbnail_url` text DEFAULT NULL,
  `permalink` text DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `posted_at` timestamp NULL DEFAULT NULL,
  `fetched_at` timestamp NULL DEFAULT NULL,
  `raw_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_payload`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagram_media`
--

INSERT INTO `instagram_media` (`id`, `instagram_id`, `media_type`, `media_url`, `thumbnail_url`, `permalink`, `caption`, `posted_at`, `fetched_at`, `raw_payload`, `created_at`, `updated_at`) VALUES
(1, '17871764298518126', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQO_YY5532vSNwr55lcI1vLLgOZ8ag_uGyZdgZcIdQYfBvT15ekZ2z6I3WvGmruMH4pCndg9ICMq7vbrzkVHHwBCjyO_u09uj0IT_rc.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=aU5o-pA9YIUQ7kNvwFBAxX6&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2NjY4MjY4MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTUsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=d95e7db94120678a&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85MzRDMTFFRTAzMjEwQkIzNjM1MjBEOUFENUY0QzA5OV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0FENDhCQ0NDQkRBMTU5ODI3MjQxODRBQ0UxNjcyMUE5X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO-KywypnhPxUCKAJDMywXQDaqfvnbItEYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFqQbQhDi_CMJUmGF-Tu1d33nWIydHQk9bedYjJ0dCT1q7M3wcoq5ZF61yHzlr3eumaBhEt081tLD2C7vB6-rZA&oh=00_AfskjWX7lGymvwFd5v6SiTqZKYVibgoM6bbOXp8Oj6iarw&oe=69949519', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/626505600_910769041484697_4046930690488448053_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEduQxfzE5xJwFupvJaAAZ2dFFuwwYzUuR0UW7DBjNS5L165memDbibGjBFKluSznyBKR2QHu67fJW6OFMOfAun&_nc_ohc=9fVWBGrrk9kQ7kNvwEBawma&_nc_oc=AdmrP2mgnAYS-6jBar8aF6noVlQHOGWnngosZuKX9S5W4Vn7LJir_Ok-zb90IHqiqco&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHcnZ-0MvYHXpQ-NaPmFqXrKvIvNW0uD2pBV7Aeq8cgEjOUU6Vn0ZtP33I6J_jxXqEtV30h3H6IbA&oh=00_Afu42tm2UIsMMUIT1TxAU2tth1lhBtKOMjEA9LoATVWz_Q&oe=69988755', 'https://www.instagram.com/reel/DUL6DKQAVnM/', '@safaricomplc_ CEO awards', '2026-02-01 00:02:27', '2026-02-16 11:00:03', '{\"id\": \"17871764298518126\", \"caption\": \"@safaricomplc_ CEO awards\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQO_YY5532vSNwr55lcI1vLLgOZ8ag_uGyZdgZcIdQYfBvT15ekZ2z6I3WvGmruMH4pCndg9ICMq7vbrzkVHHwBCjyO_u09uj0IT_rc.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=aU5o-pA9YIUQ7kNvwFBAxX6&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2NjY4MjY4MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTUsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=d95e7db94120678a&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85MzRDMTFFRTAzMjEwQkIzNjM1MjBEOUFENUY0QzA5OV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0FENDhCQ0NDQkRBMTU5ODI3MjQxODRBQ0UxNjcyMUE5X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO-KywypnhPxUCKAJDMywXQDaqfvnbItEYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFqQbQhDi_CMJUmGF-Tu1d33nWIydHQk9bedYjJ0dCT1q7M3wcoq5ZF61yHzlr3eumaBhEt081tLD2C7vB6-rZA&oh=00_AfskjWX7lGymvwFd5v6SiTqZKYVibgoM6bbOXp8Oj6iarw&oe=69949519\", \"permalink\": \"https://www.instagram.com/reel/DUL6DKQAVnM/\", \"timestamp\": \"2026-01-31T19:02:27+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/626505600_910769041484697_4046930690488448053_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEduQxfzE5xJwFupvJaAAZ2dFFuwwYzUuR0UW7DBjNS5L165memDbibGjBFKluSznyBKR2QHu67fJW6OFMOfAun&_nc_ohc=9fVWBGrrk9kQ7kNvwEBawma&_nc_oc=AdmrP2mgnAYS-6jBar8aF6noVlQHOGWnngosZuKX9S5W4Vn7LJir_Ok-zb90IHqiqco&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHcnZ-0MvYHXpQ-NaPmFqXrKvIvNW0uD2pBV7Aeq8cgEjOUU6Vn0ZtP33I6J_jxXqEtV30h3H6IbA&oh=00_Afu42tm2UIsMMUIT1TxAU2tth1lhBtKOMjEA9LoATVWz_Q&oe=69988755\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(2, '18558620716003530', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMgwtlFDXh-ZBuUQNVuqWJfTSxg1cKizAAS2KCYeq_ghIYB2aUPQyPp2R-0KlbrOoOr47-58uuF0-MKnQYEM5JxV6UmmXnsYW6xVes.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=NzkJrVDyG2cQ7kNvwE1DUt-&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2NTc2MTE3MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTUsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyNiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=f16d7cd373e9f9b0&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82OTQ5RkVBODRFODM0RkQ2MjU2RjQyQUQ5REIzOEE5Ql92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0I1NEEzRjVENjFGMjlBRDRBNEVEQkE2NDc4NUVDNTkwX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOyafmm5ThPxUCKAJDMywXQDqzMzMzMzMYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeG25MwsLRfV-EAYctQL-JcDpI7FhCwX3sakjsWELBfexlNJoZG3Llt8MoA5KN2RAUIMHLX50Fm865vOQWSx0hwV&oh=00_Aftj9df2Qp5Ll9mMstNzMJVIYjm_rmPuF7WTsaN9i1RH0A&oe=69947906', 'https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/624661475_918617094003392_1796348862221680067_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=105&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEDxpSRG01cT5TcnRgMicmEjU6FptxKUZmNToWm3EpRmQ_idHlKrisi2cliLuVyVWTMPYxc9vrwdkXMsavYxrHG&_nc_ohc=KwQS5KCpXQYQ7kNvwFk5riF&_nc_oc=AdmwpkG--UkwZq7RD0W6uq-d-awTWkh0xzYMU4QXPYOiQ78g7_33xy4ThiVWZ8ZxILY&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGZ-namlgc_hC7VIujcdl8plRaovJCChhZgwPgf2bgF2Kl7o0WAMjvjt9dIo9xWLbfrZWC8qRnKGg&oh=00_Afs2c42WbWgklS0a7amDxlr2_iEkuXlAXHpLNpfoWTe_zA&oe=699869D8', 'https://www.instagram.com/reel/DUKvx6sjuV6/', 'SAFARICOM CEO AWARDS \n\nNow this is how you command a stage. 🔥🎤\n\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\n\nAt Stagepass Audio Visual, we don’t just build stages…\nwe engineer experiences that captivate every seat in the room.\n\nMassive LED storytelling ✔️\nDynamic lighting atmosphere ✔️\nSeamless technical execution ✔️\nAudience impact? Guaranteed.\n\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\n\nReady to transform your next event into a full-scale production experience?\nLet’s make magic happen. ✨\n\n📩 info@stagepass.co.ke\n\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision', '2026-01-31 13:14:36', '2026-02-16 11:00:03', '{\"id\": \"18558620716003530\", \"caption\": \"SAFARICOM CEO AWARDS \\n\\nNow this is how you command a stage. 🔥🎤\\n\\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\\n\\nAt Stagepass Audio Visual, we don’t just build stages…\\nwe engineer experiences that captivate every seat in the room.\\n\\nMassive LED storytelling ✔️\\nDynamic lighting atmosphere ✔️\\nSeamless technical execution ✔️\\nAudience impact? Guaranteed.\\n\\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\\n\\nReady to transform your next event into a full-scale production experience?\\nLet’s make magic happen. ✨\\n\\n📩 info@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMgwtlFDXh-ZBuUQNVuqWJfTSxg1cKizAAS2KCYeq_ghIYB2aUPQyPp2R-0KlbrOoOr47-58uuF0-MKnQYEM5JxV6UmmXnsYW6xVes.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=NzkJrVDyG2cQ7kNvwE1DUt-&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2NTc2MTE3MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTUsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyNiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=f16d7cd373e9f9b0&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82OTQ5RkVBODRFODM0RkQ2MjU2RjQyQUQ5REIzOEE5Ql92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0I1NEEzRjVENjFGMjlBRDRBNEVEQkE2NDc4NUVDNTkwX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOyafmm5ThPxUCKAJDMywXQDqzMzMzMzMYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeG25MwsLRfV-EAYctQL-JcDpI7FhCwX3sakjsWELBfexlNJoZG3Llt8MoA5KN2RAUIMHLX50Fm865vOQWSx0hwV&oh=00_Aftj9df2Qp5Ll9mMstNzMJVIYjm_rmPuF7WTsaN9i1RH0A&oe=69947906\", \"permalink\": \"https://www.instagram.com/reel/DUKvx6sjuV6/\", \"timestamp\": \"2026-01-31T08:14:36+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/624661475_918617094003392_1796348862221680067_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=105&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEDxpSRG01cT5TcnRgMicmEjU6FptxKUZmNToWm3EpRmQ_idHlKrisi2cliLuVyVWTMPYxc9vrwdkXMsavYxrHG&_nc_ohc=KwQS5KCpXQYQ7kNvwFk5riF&_nc_oc=AdmwpkG--UkwZq7RD0W6uq-d-awTWkh0xzYMU4QXPYOiQ78g7_33xy4ThiVWZ8ZxILY&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGZ-namlgc_hC7VIujcdl8plRaovJCChhZgwPgf2bgF2Kl7o0WAMjvjt9dIo9xWLbfrZWC8qRnKGg&oh=00_Afs2c42WbWgklS0a7amDxlr2_iEkuXlAXHpLNpfoWTe_zA&oe=699869D8\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(3, '18028181159788116', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMEcGSUo3S1bFJvsDQDJBIDjpiupXYtznmBzLHYHMDWmivX61CUwTZB8CwsU-QadtbxPMqIwub2pGFQwnxzx1NctVTUmUVbawq4V5M.mp4?_nc_cat=107&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=s_R9FnugzOIQ7kNvwHxIntJ&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2NTc1NzYzMTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTUsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMSwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=4f138ad9aa132c3&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9DNDQzOUY2N0UyRkY0RUI0Njg2QzZCNUU0QkNGMDhCRF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0Q5NDY5QUI1OTc4MEE4NURDQTM2RTk0NjY1MUQyOTkxX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO19qUmZThPxUCKAJDMywXQDV3S8an754YEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeF2Dr_n6RsQ3Rogqu-0XoSKPx22KHRlguo_HbYodGWC6vdBZZN6jPGjFA6NwsBBRf4K3Q3Iw1iPZX0fyt9N8g3d&oh=00_AftRLt4G7PadzCNWE1Mfe4x1wmgb0BQBBVY8e-ZakUYMgQ&oe=69948AC4', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/626043376_1370696134798514_5782811944121966681_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHcXD1wKUkH7j2VABuCJbeYv2x_QTX_-xO_bH9BNf_7EzSe62drxeDEtRP0QJfiGa2GwOD6H4U8GF1MUHu6Zsdu&_nc_ohc=MCCmGCQdBzYQ7kNvwEMv1-x&_nc_oc=Adnt2zeIIkkZGYk6NBWgfYvoFxQDZAmjXWFSqhZE3BMwUeTAS070F9VOxFNbWGi9puY&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGUv-ML-J8pU5RS-lJ24zYN9MNiSu8pi5FGINrPlJXI1MU9DAF5NWypj9U_j89cqfoYpaivbqYH0w&oh=00_AftXdYJPY3TNnhVkb57bLAznk-Bgl1jz2z08lUiFaLiztg&oe=69988BD2', 'https://www.instagram.com/reel/DUKvZl7jgRo/', 'SAFARICOM CEO AWARDS \n\nNow this is how you command a stage. 🔥🎤\n\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\n\nAt Stagepass Audio Visual, we don’t just build stages…\nwe engineer experiences that captivate every seat in the room.\n\nMassive LED storytelling ✔️\nDynamic lighting atmosphere ✔️\nSeamless technical execution ✔️\nAudience impact? Guaranteed.\n\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\n\nReady to transform your next event into a full-scale production experience?\nLet’s make magic happen. ✨\n\n📩 info@stagepass.co.ke\n\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision', '2026-01-31 13:09:25', '2026-02-16 11:00:03', '{\"id\": \"18028181159788116\", \"caption\": \"SAFARICOM CEO AWARDS \\n\\nNow this is how you command a stage. 🔥🎤\\n\\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\\n\\nAt Stagepass Audio Visual, we don’t just build stages…\\nwe engineer experiences that captivate every seat in the room.\\n\\nMassive LED storytelling ✔️\\nDynamic lighting atmosphere ✔️\\nSeamless technical execution ✔️\\nAudience impact? Guaranteed.\\n\\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\\n\\nReady to transform your next event into a full-scale production experience?\\nLet’s make magic happen. ✨\\n\\n📩 info@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMEcGSUo3S1bFJvsDQDJBIDjpiupXYtznmBzLHYHMDWmivX61CUwTZB8CwsU-QadtbxPMqIwub2pGFQwnxzx1NctVTUmUVbawq4V5M.mp4?_nc_cat=107&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=s_R9FnugzOIQ7kNvwHxIntJ&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2NTc1NzYzMTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTUsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMSwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=4f138ad9aa132c3&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9DNDQzOUY2N0UyRkY0RUI0Njg2QzZCNUU0QkNGMDhCRF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0Q5NDY5QUI1OTc4MEE4NURDQTM2RTk0NjY1MUQyOTkxX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO19qUmZThPxUCKAJDMywXQDV3S8an754YEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeF2Dr_n6RsQ3Rogqu-0XoSKPx22KHRlguo_HbYodGWC6vdBZZN6jPGjFA6NwsBBRf4K3Q3Iw1iPZX0fyt9N8g3d&oh=00_AftRLt4G7PadzCNWE1Mfe4x1wmgb0BQBBVY8e-ZakUYMgQ&oe=69948AC4\", \"permalink\": \"https://www.instagram.com/reel/DUKvZl7jgRo/\", \"timestamp\": \"2026-01-31T08:09:25+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/626043376_1370696134798514_5782811944121966681_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHcXD1wKUkH7j2VABuCJbeYv2x_QTX_-xO_bH9BNf_7EzSe62drxeDEtRP0QJfiGa2GwOD6H4U8GF1MUHu6Zsdu&_nc_ohc=MCCmGCQdBzYQ7kNvwEMv1-x&_nc_oc=Adnt2zeIIkkZGYk6NBWgfYvoFxQDZAmjXWFSqhZE3BMwUeTAS070F9VOxFNbWGi9puY&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGUv-ML-J8pU5RS-lJ24zYN9MNiSu8pi5FGINrPlJXI1MU9DAF5NWypj9U_j89cqfoYpaivbqYH0w&oh=00_AftXdYJPY3TNnhVkb57bLAznk-Bgl1jz2z08lUiFaLiztg&oe=69988BD2\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(4, '18558077971001317', 'CAROUSEL_ALBUM', 'https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/624708881_18403808161133216_3580701760631956229_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeG5DGHfrrJi9W_pU_hoFBPKmc-QwGXoJViZz5DAZeglWLp406vAy_U9jrajADNIqLS5y_rEGwh3AVemQk0RCkwL&_nc_ohc=PKnZnQVsSdQQ7kNvwHn4hGh&_nc_oc=AdkB_FV0O9lDZjbMPBSyWpYlookLaVAkoR2R_ZX6VnQ7IvKMQV80Ub_zMMzTIpzpC1g&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfthEyHrhznVXUg6XKdPHzggQ77EdvrS10O7Mnz9397D8w&oe=6998913D', NULL, 'https://www.instagram.com/p/DUKvQiFDrfR/', 'SAFARICOM CEO AWARDS \n\nNow this is how you command a stage. 🔥🎤\n\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\n\nAt Stagepass Audio Visual, we don’t just build stages…\nwe engineer experiences that captivate every seat in the room.\n\nMassive LED storytelling ✔️\nDynamic lighting atmosphere ✔️\nSeamless technical execution ✔️\nAudience impact? Guaranteed.\n\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\n\nReady to transform your next event into a full-scale production experience?\nLet’s make magic happen. ✨\n\n📩 info@stagepass.co.ke\n\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision', '2026-01-31 13:07:56', '2026-02-16 11:00:03', '{\"id\": \"18558077971001317\", \"caption\": \"SAFARICOM CEO AWARDS \\n\\nNow this is how you command a stage. 🔥🎤\\n\\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\\n\\nAt Stagepass Audio Visual, we don’t just build stages…\\nwe engineer experiences that captivate every seat in the room.\\n\\nMassive LED storytelling ✔️\\nDynamic lighting atmosphere ✔️\\nSeamless technical execution ✔️\\nAudience impact? Guaranteed.\\n\\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\\n\\nReady to transform your next event into a full-scale production experience?\\nLet’s make magic happen. ✨\\n\\n📩 info@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/624708881_18403808161133216_3580701760631956229_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeG5DGHfrrJi9W_pU_hoFBPKmc-QwGXoJViZz5DAZeglWLp406vAy_U9jrajADNIqLS5y_rEGwh3AVemQk0RCkwL&_nc_ohc=PKnZnQVsSdQQ7kNvwHn4hGh&_nc_oc=AdkB_FV0O9lDZjbMPBSyWpYlookLaVAkoR2R_ZX6VnQ7IvKMQV80Ub_zMMzTIpzpC1g&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfthEyHrhznVXUg6XKdPHzggQ77EdvrS10O7Mnz9397D8w&oe=6998913D\", \"permalink\": \"https://www.instagram.com/p/DUKvQiFDrfR/\", \"timestamp\": \"2026-01-31T08:07:56+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(5, '18050147951420757', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQM-HqdP7usaBLTLTOH8qP7EVxTbvmQdOwg8zm9mSpVl36-fG9yZotILKm9AnpyxUsNQ3SvIRxZt-2qPxMOvyhZ5PBPjuxI2jYBEFYY.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=B3Y1McdVl0QQ7kNvwHCZFwc&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjIzMzE1OTE1ODczMDc1MzEsImFzc2V0X2FnZV9kYXlzIjo2NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjU5LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=bc08794e5bc4c587&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9GODRFOEJBNjE4QURERjdGN0Q0MEQxMzdBOTI0NjE5M192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HQkk0b1NNVjdmR3VlRTRIQUpmaU1XZG5YLUVlYnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmloCVhb-kpAgVAigCQzMsF0BNt2yLQ5WBGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFMEBw7Qm3FFT2j2XhACrLN_mii53bzWG3-aKLndvNYbRVZaqu0xArXtlC4y6zQ7PM6BWnrClhLy6MeGd6F_sbW&oh=00_Aft5g8PcQqlvjVElbnQkLsH2nMCNBqrHDTEmyIs9yFc1SQ&oe=6994AAD2', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/589202328_18397517509133216_4679357475590631355_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=105&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFlonr84tRyaMC0EOQIOXEPizOHdz-o9qeLM4d3P6j2py3hYyz91-fyRDMjNETeeaEs9pplaYYLzHTUy21Ygjf5&_nc_ohc=0tYDkzUOKoYQ7kNvwHyg4JC&_nc_oc=AdlWnHjAiquYYDlcoXlsjt2WN39js0ZFh3Vv98vTmizzFB-QTVmZnch93ParuYC6_GY&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQF3GGoIRkTsd3Xc_DttkN_NXA3MNT8wVO9tUOEdH6zTHb5C_haEmxx3ZHfYxnlXyXX3udFwSyvrmw&oh=00_AftJbPtqpmjk-IPFqUwah2Y1nMeeRXLOooK5XEvlrjz55A&oe=699886EA', 'https://www.instagram.com/reel/DSGJn70gUkF/', 'Behind every successful vision is a relentless team driven by excellence and purpose. The StagepassAV family continues to show up, deliver, and exceed expectations with heart and precision. Thank you for always raising the standard.\n\nStagepassAV-Your end to end events partner of choice.', '2025-12-11 01:20:53', '2026-02-16 11:00:03', '{\"id\": \"18050147951420757\", \"caption\": \"Behind every successful vision is a relentless team driven by excellence and purpose. The StagepassAV family continues to show up, deliver, and exceed expectations with heart and precision. Thank you for always raising the standard.\\n\\nStagepassAV-Your end to end events partner of choice.\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQM-HqdP7usaBLTLTOH8qP7EVxTbvmQdOwg8zm9mSpVl36-fG9yZotILKm9AnpyxUsNQ3SvIRxZt-2qPxMOvyhZ5PBPjuxI2jYBEFYY.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=B3Y1McdVl0QQ7kNvwHCZFwc&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjIzMzE1OTE1ODczMDc1MzEsImFzc2V0X2FnZV9kYXlzIjo2NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjU5LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=bc08794e5bc4c587&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9GODRFOEJBNjE4QURERjdGN0Q0MEQxMzdBOTI0NjE5M192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HQkk0b1NNVjdmR3VlRTRIQUpmaU1XZG5YLUVlYnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmloCVhb-kpAgVAigCQzMsF0BNt2yLQ5WBGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFMEBw7Qm3FFT2j2XhACrLN_mii53bzWG3-aKLndvNYbRVZaqu0xArXtlC4y6zQ7PM6BWnrClhLy6MeGd6F_sbW&oh=00_Aft5g8PcQqlvjVElbnQkLsH2nMCNBqrHDTEmyIs9yFc1SQ&oe=6994AAD2\", \"permalink\": \"https://www.instagram.com/reel/DSGJn70gUkF/\", \"timestamp\": \"2025-12-10T20:20:53+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/589202328_18397517509133216_4679357475590631355_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=105&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFlonr84tRyaMC0EOQIOXEPizOHdz-o9qeLM4d3P6j2py3hYyz91-fyRDMjNETeeaEs9pplaYYLzHTUy21Ygjf5&_nc_ohc=0tYDkzUOKoYQ7kNvwHyg4JC&_nc_oc=AdlWnHjAiquYYDlcoXlsjt2WN39js0ZFh3Vv98vTmizzFB-QTVmZnch93ParuYC6_GY&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQF3GGoIRkTsd3Xc_DttkN_NXA3MNT8wVO9tUOEdH6zTHb5C_haEmxx3ZHfYxnlXyXX3udFwSyvrmw&oh=00_AftJbPtqpmjk-IPFqUwah2Y1nMeeRXLOooK5XEvlrjz55A&oe=699886EA\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(6, '17859760983556877', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMEadeEydw5hnK8gZjWMuobyRBX6QYjdy1GwAV3NviMNoEn0fx_kQn2u9OuaBtfmEAZKsw_W-J3RrIcDkiU3M8JnpH59dzOndqXkqY.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=xd6i6Fd_93cQ7kNvwFmAZ_T&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjIwNjM5OTIwODEwMjM4MzQsImFzc2V0X2FnZV9kYXlzIjo3MywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE0NiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=86469fb5151c53e9&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82MjRDNkIyMjU4MkM4OTU3NUYxRDhEQzI4NDM1Mjk5NV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMjA1NjQ0NDA0ODI2NTgyXzgxNTMwMDEzODY1OTEyMTE0MzEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJrSN-KyTzKoHFQIoAkMzLBdAYlRBiTdLxxgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFITLmgSAiy-qqyj1bZz56L8OznpWIvlvfw7OelYi-W99irxf9Zqpcm-Hzc-diMhIgLvqPReg0Y-vmuiFlq-cJy&oh=00_Aftqfg4iottdTJOB-u9MIUerx62ipTQyHvIphILpXE8AuQ&oe=69948C47', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/589902228_1578856416590252_1755295903149086924_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeGwYmQDd9EkegA6qPS5ekhnzRMnUYTzYyfNEydRhPNjJzMMlu9zpcDyfEJJHrmXUQcwo8JS-_7cls6mEQWicaKj&_nc_ohc=X3mJigcyUhkQ7kNvwFRLsij&_nc_oc=AdkeYiGnvtYRF4wMJzpZUJ2BxiyTV93ARL4tkvJHtDgHTpdGBStvUkbtqXMMkd_xKuo&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEBcmr4KdvUSAfKh6ek2h0WXbMxobVRUUWktJfRp7H7nzWkR2EmkFKucFWcbmqlcGXylxChAh1P8g&oh=00_AfsfbdC5I4RZUTzd1MtvyOfkkzDHoTcy8Nw0HLjB--Og7A&oe=6998882B', 'https://www.instagram.com/reel/DR1fyqQjYpQ/', 'Sanlam Alliance launch-Powered by #stagepassav.\nYour trusted end-to-end partner of choice.\nCheckout our work and feel free to contact us;\nInfo@stagepass.co.ke', '2025-12-04 14:14:30', '2026-02-16 11:00:03', '{\"id\": \"17859760983556877\", \"caption\": \"Sanlam Alliance launch-Powered by #stagepassav.\\nYour trusted end-to-end partner of choice.\\nCheckout our work and feel free to contact us;\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMEadeEydw5hnK8gZjWMuobyRBX6QYjdy1GwAV3NviMNoEn0fx_kQn2u9OuaBtfmEAZKsw_W-J3RrIcDkiU3M8JnpH59dzOndqXkqY.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=xd6i6Fd_93cQ7kNvwFmAZ_T&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjIwNjM5OTIwODEwMjM4MzQsImFzc2V0X2FnZV9kYXlzIjo3MywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE0NiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=86469fb5151c53e9&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82MjRDNkIyMjU4MkM4OTU3NUYxRDhEQzI4NDM1Mjk5NV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMjA1NjQ0NDA0ODI2NTgyXzgxNTMwMDEzODY1OTEyMTE0MzEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJrSN-KyTzKoHFQIoAkMzLBdAYlRBiTdLxxgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFITLmgSAiy-qqyj1bZz56L8OznpWIvlvfw7OelYi-W99irxf9Zqpcm-Hzc-diMhIgLvqPReg0Y-vmuiFlq-cJy&oh=00_Aftqfg4iottdTJOB-u9MIUerx62ipTQyHvIphILpXE8AuQ&oe=69948C47\", \"permalink\": \"https://www.instagram.com/reel/DR1fyqQjYpQ/\", \"timestamp\": \"2025-12-04T09:14:30+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/589902228_1578856416590252_1755295903149086924_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeGwYmQDd9EkegA6qPS5ekhnzRMnUYTzYyfNEydRhPNjJzMMlu9zpcDyfEJJHrmXUQcwo8JS-_7cls6mEQWicaKj&_nc_ohc=X3mJigcyUhkQ7kNvwFRLsij&_nc_oc=AdkeYiGnvtYRF4wMJzpZUJ2BxiyTV93ARL4tkvJHtDgHTpdGBStvUkbtqXMMkd_xKuo&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEBcmr4KdvUSAfKh6ek2h0WXbMxobVRUUWktJfRp7H7nzWkR2EmkFKucFWcbmqlcGXylxChAh1P8g&oh=00_AfsfbdC5I4RZUTzd1MtvyOfkkzDHoTcy8Nw0HLjB--Og7A&oe=6998882B\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(7, '18440630413098181', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOClijcFiTkmF3iPn1HlMCWTl_shev5q9PZDZdqZPhquglhaXuOvpy81JcbqqTrOk4Kyp5DnKKjePIjEjVUcqJVhlDLFwcglAn76YI.mp4?_nc_cat=108&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=_-92dTVu7L8Q7kNvwHxQtS0&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNDgwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6ODExNjcxNTk1MDY5NjMyLCJhc3NldF9hZ2VfZGF5cyI6ODAsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMywidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=8249e91ab37b39bf&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9CMzQ4RDY0QkUyNTVFODNERUFEQTlDQTg2QkQ5MzE4RF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HQ0x1R1NPV1IyeGFvMVFFQUpWLVlic0FVVDhMYnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmgMPJ0cCN8QIVAigCQzMsF0A3j1wo9cKPGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeGiCkXad9lE4rL0EbtpHNpOlVrn2q4Hv5CVWufarge_kIozOMe1Ur8YaRFWPho2zeK0nazMaGsOQD_hMGbQTGPU&oh=00_Afvyc0YWB-JgyLv3l26tpWJ7XMRDy0rL6C79fAAaT99fyQ&oe=69949EE5', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/588629540_18396127291133216_2732806623651173122_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHSSZAMv33Skj-MIs88jlzJY3h5c-5AVBdjeHlz7kBUF9RWQBMnH8HA7xsFncmFP6btJjgx6vxZtkxsgthLUuIu&_nc_ohc=b541ZcFdtQYQ7kNvwHsr5e_&_nc_oc=AdlxQIhYfFLzcpp-HUjDOTk10f74KmTs9zUEGNLf5xejP1l57o0-xbF4cIAJej5V3Bc&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEbdtuXpRTilX_tPQj9iEpjzn0P9bQdFjF12EdFMHdt8CMngr0IhObqt6Lf0ks4uepwXw62lCdu7Q&oh=00_AfvrA5uwDmq_oxDlt-_m3J_tz-pxs707CjoOLRuaoQSqhg&oe=69988331', 'https://www.instagram.com/reel/DRlkT3JDY84/', 'Office for the day @equitygroup Kenya Trade & Investment Roadshow 2025.\n#stagepassav your trusted events partner of choice \nVenue- @radissonbluupperhill', '2025-11-28 09:38:03', '2026-02-16 11:00:03', '{\"id\": \"18440630413098181\", \"caption\": \"Office for the day @equitygroup Kenya Trade & Investment Roadshow 2025.\\n#stagepassav your trusted events partner of choice \\nVenue- @radissonbluupperhill\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOClijcFiTkmF3iPn1HlMCWTl_shev5q9PZDZdqZPhquglhaXuOvpy81JcbqqTrOk4Kyp5DnKKjePIjEjVUcqJVhlDLFwcglAn76YI.mp4?_nc_cat=108&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=_-92dTVu7L8Q7kNvwHxQtS0&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNDgwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6ODExNjcxNTk1MDY5NjMyLCJhc3NldF9hZ2VfZGF5cyI6ODAsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMywidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=8249e91ab37b39bf&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9CMzQ4RDY0QkUyNTVFODNERUFEQTlDQTg2QkQ5MzE4RF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HQ0x1R1NPV1IyeGFvMVFFQUpWLVlic0FVVDhMYnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmgMPJ0cCN8QIVAigCQzMsF0A3j1wo9cKPGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeGiCkXad9lE4rL0EbtpHNpOlVrn2q4Hv5CVWufarge_kIozOMe1Ur8YaRFWPho2zeK0nazMaGsOQD_hMGbQTGPU&oh=00_Afvyc0YWB-JgyLv3l26tpWJ7XMRDy0rL6C79fAAaT99fyQ&oe=69949EE5\", \"permalink\": \"https://www.instagram.com/reel/DRlkT3JDY84/\", \"timestamp\": \"2025-11-28T04:38:03+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/588629540_18396127291133216_2732806623651173122_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHSSZAMv33Skj-MIs88jlzJY3h5c-5AVBdjeHlz7kBUF9RWQBMnH8HA7xsFncmFP6btJjgx6vxZtkxsgthLUuIu&_nc_ohc=b541ZcFdtQYQ7kNvwHsr5e_&_nc_oc=AdlxQIhYfFLzcpp-HUjDOTk10f74KmTs9zUEGNLf5xejP1l57o0-xbF4cIAJej5V3Bc&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEbdtuXpRTilX_tPQj9iEpjzn0P9bQdFjF12EdFMHdt8CMngr0IhObqt6Lf0ks4uepwXw62lCdu7Q&oh=00_AfvrA5uwDmq_oxDlt-_m3J_tz-pxs707CjoOLRuaoQSqhg&oe=69988331\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(8, '18081934781028540', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMKjTFCq5nBhuu8x9zTW_i83kKOcDxOACg19NyXqtD0kvNVOYugXpcJPx3VRfUxv28JDHSEZA9mllcz8ntXI2vVLP_pECazDpn8FJ0.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=ma0rwOtOXNsQ7kNvwFKptfM&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNDgwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6ODUxODk1NjY0NDU5OTQ4LCJhc3NldF9hZ2VfZGF5cyI6ODAsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyNSwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=8c0c1f9ed7030482&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84OTQ2MEI4MUFGNzlBMzhBMUJCNzhDMTg1REMyNjNCOF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HUFlMTmlNejR3Wkl6VnNJQUZRZGNwZldkeVI2YnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm2IK6p-2ygwMVAigCQzMsF0A59T987ZFoGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHuPbs5H2Kl3OkZK4nzbr_l4LNxse1loXLgs3Gx7WWhctWoj3Is5tYhnKsSiOmAzy7xO9jwOoriFddFdejRxXH7&oh=00_Afu-BwgmGc8auHEF0mAQ-Z-lX7mXkBpslOc4mVpasebShg&oe=699486E1', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/584973292_1318971389918355_7694062408247243321_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHurXUy3dWBMYWe3o5TSfYbTtOgTRIQcQ5O06BNEhBxDpy2GNPWLVPyxc_PqOkb1uVmzfDpGezDTA-x_DtpmREC&_nc_ohc=n6cHbN2zYscQ7kNvwH2xO29&_nc_oc=Adnth_51oV2N2VUWaiLMBYWkmcrBdv1Ly1_j-cAqo0mXR5OgErvj6yeoVLEI-50-0Lo&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEaj0Bfj0dOgelauKHEe25_dqBP4DQ4QJfCykXxpCy4iJ5sj6785-a3g7od_femyw1T79rrqNgObg&oh=00_Aft4sgwIuiyvkII8aa1IMX2LsuSGXY9sOTeBR0O0svZilg&oe=69987B96', 'https://www.instagram.com/reel/DRljnO7jR0I/', 'Office for the day @equitygroup Kenya Trade & Investment Roadshow 2025.\n#stagepassav your trusted events partner of choice \nVenue- @radissonbluupperhill', '2025-11-28 09:34:10', '2026-02-16 11:00:03', '{\"id\": \"18081934781028540\", \"caption\": \"Office for the day @equitygroup Kenya Trade & Investment Roadshow 2025.\\n#stagepassav your trusted events partner of choice \\nVenue- @radissonbluupperhill\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMKjTFCq5nBhuu8x9zTW_i83kKOcDxOACg19NyXqtD0kvNVOYugXpcJPx3VRfUxv28JDHSEZA9mllcz8ntXI2vVLP_pECazDpn8FJ0.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=ma0rwOtOXNsQ7kNvwFKptfM&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNDgwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6ODUxODk1NjY0NDU5OTQ4LCJhc3NldF9hZ2VfZGF5cyI6ODAsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyNSwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=8c0c1f9ed7030482&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84OTQ2MEI4MUFGNzlBMzhBMUJCNzhDMTg1REMyNjNCOF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HUFlMTmlNejR3Wkl6VnNJQUZRZGNwZldkeVI2YnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm2IK6p-2ygwMVAigCQzMsF0A59T987ZFoGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHuPbs5H2Kl3OkZK4nzbr_l4LNxse1loXLgs3Gx7WWhctWoj3Is5tYhnKsSiOmAzy7xO9jwOoriFddFdejRxXH7&oh=00_Afu-BwgmGc8auHEF0mAQ-Z-lX7mXkBpslOc4mVpasebShg&oe=699486E1\", \"permalink\": \"https://www.instagram.com/reel/DRljnO7jR0I/\", \"timestamp\": \"2025-11-28T04:34:10+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/584973292_1318971389918355_7694062408247243321_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHurXUy3dWBMYWe3o5TSfYbTtOgTRIQcQ5O06BNEhBxDpy2GNPWLVPyxc_PqOkb1uVmzfDpGezDTA-x_DtpmREC&_nc_ohc=n6cHbN2zYscQ7kNvwH2xO29&_nc_oc=Adnth_51oV2N2VUWaiLMBYWkmcrBdv1Ly1_j-cAqo0mXR5OgErvj6yeoVLEI-50-0Lo&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEaj0Bfj0dOgelauKHEe25_dqBP4DQ4QJfCykXxpCy4iJ5sj6785-a3g7od_femyw1T79rrqNgObg&oh=00_Aft4sgwIuiyvkII8aa1IMX2LsuSGXY9sOTeBR0O0svZilg&oe=69987B96\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(9, '18184590562354300', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMKk9Bh8VfF3NkjzQ0VK8FK5hIQYoJAaXdBVB8K5nGHVrcMIEvhe2AJUiXypWn4j_K1wYNQxSTgGUql8lRCz7jKS-ThpglnHyif4IU.mp4?_nc_cat=109&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=1eReVRvfN6wQ7kNvwG6ih05&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEyMTk3NzkzNDY2OTAxMTIsImFzc2V0X2FnZV9kYXlzIjo4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjI0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=757929743314de6a&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC81NzQ4MkY1QjJGM0Y3NEE5RTFBNEI3Njc5QzNBNEFBRF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HTkZTSFNQNGhlQldDZ0FGQUJkb1NHYzU3TndOYnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmgMHPqsDYqgQVAigCQzMsF0A4btkWhysCGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFXM0nmZHQ-Y8pd6uF9MZBnF2IZwj7KzVIXYhnCPsrNUqvcafsCjciw6ritEElzEvtcANxUf7HBZJol5dDw70ZD&oh=00_AftoP5vuLIim7xmRHd3K6n3pov-QgPwx4Nqs5EpttGYOwQ&oe=6994909A', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/586715102_827123603502182_2360733999401164379_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFga-TxrXUxop5eEl-ffwrHbpMZdjYWRvNukxl2NhZG82V7XIIwQJUUiQSGDzbTsZGce_uMwcXYtDls5PtVxqzf&_nc_ohc=7pX3OnPg3x8Q7kNvwGu0dPR&_nc_oc=Adk1GVRiSb7DwMxQYi2_0N7y5_LqpUQxmd9-Z2ZcmqipjuSRiM04KopkTqrEzAvkJgE&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQH58Q057Ov2jf5eEA3qeevk0ZScHeXCC-dSM7jtoAEzg9DRDLwvXE1euN1DsoRVIqmEdTgK34d0gA&oh=00_AftQOng4AlTjxk6jIZlykCVervcvJH8uftI7MkeWNm0fZw&oe=69989408', 'https://www.instagram.com/reel/DRjMW5vjSui/', '@sanlamallianzkenya_ launch fully powered by @stagepassav \nOur Deco partner @etude.africa', '2025-11-27 11:30:08', '2026-02-16 11:00:03', '{\"id\": \"18184590562354300\", \"caption\": \"@sanlamallianzkenya_ launch fully powered by @stagepassav \\nOur Deco partner @etude.africa\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMKk9Bh8VfF3NkjzQ0VK8FK5hIQYoJAaXdBVB8K5nGHVrcMIEvhe2AJUiXypWn4j_K1wYNQxSTgGUql8lRCz7jKS-ThpglnHyif4IU.mp4?_nc_cat=109&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=1eReVRvfN6wQ7kNvwG6ih05&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEyMTk3NzkzNDY2OTAxMTIsImFzc2V0X2FnZV9kYXlzIjo4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjI0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=757929743314de6a&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC81NzQ4MkY1QjJGM0Y3NEE5RTFBNEI3Njc5QzNBNEFBRF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HTkZTSFNQNGhlQldDZ0FGQUJkb1NHYzU3TndOYnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmgMHPqsDYqgQVAigCQzMsF0A4btkWhysCGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFXM0nmZHQ-Y8pd6uF9MZBnF2IZwj7KzVIXYhnCPsrNUqvcafsCjciw6ritEElzEvtcANxUf7HBZJol5dDw70ZD&oh=00_AftoP5vuLIim7xmRHd3K6n3pov-QgPwx4Nqs5EpttGYOwQ&oe=6994909A\", \"permalink\": \"https://www.instagram.com/reel/DRjMW5vjSui/\", \"timestamp\": \"2025-11-27T06:30:08+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/586715102_827123603502182_2360733999401164379_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFga-TxrXUxop5eEl-ffwrHbpMZdjYWRvNukxl2NhZG82V7XIIwQJUUiQSGDzbTsZGce_uMwcXYtDls5PtVxqzf&_nc_ohc=7pX3OnPg3x8Q7kNvwGu0dPR&_nc_oc=Adk1GVRiSb7DwMxQYi2_0N7y5_LqpUQxmd9-Z2ZcmqipjuSRiM04KopkTqrEzAvkJgE&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQH58Q057Ov2jf5eEA3qeevk0ZScHeXCC-dSM7jtoAEzg9DRDLwvXE1euN1DsoRVIqmEdTgK34d0gA&oh=00_AftQOng4AlTjxk6jIZlykCVervcvJH8uftI7MkeWNm0fZw&oe=69989408\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(10, '18061373321230168', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQNvGjqCDkRN2uu_tFR_5JCdt0tKYh5yICVEXQ7YEv48NjsgYmPsAsrSoB2xAXZTIdF99bZBmZDdFw4Zhy67MQLZMAvN3a7MZETTPEk.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=MP23ThW6hNkQ7kNvwEKP-hX&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjIzMDc2NDg5MTMwNDQ1ODIsImFzc2V0X2FnZV9kYXlzIjo4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjIyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=3c39a8dede4ba0ce&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FQTRDREMxOUY3MzBDMkE1RDQ4QTEwMTlERjA5NkVCQ192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HUHotQlNPcVk4TElScG9GQU9OU1BrdGJWNkZ5YnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmzNHTm-yymQgVAigCQzMsF0A2VT987ZFoGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeHulxpWlPX-juZklij5bg47oxozLY5ijtyjGjMtjmKO3OBpPmVlCYdynsSDiZxzTbZxUNoVMli5X0y7rFtlgA14&oh=00_AftywKwcxeSAofBV5MWVXyoDfGWfvdbs9PwHtKNZpLko7Q&oe=69947A65', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/588957801_2636334930078878_4451083546345557582_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFyUcl_C0K7J_icOWxbiePAQdwww-SmO8FB3DDD5KY7wQTPGOBDKfjA8zlCOIbhsc5lA919UVjHc5qmpY7B22rh&_nc_ohc=p2iJJkXVpsMQ7kNvwHvLWRX&_nc_oc=Adn40vZAs0G86XefCKoXeN9jtqgP4Wek3-blH0d3X7WtPAgxLz3L1VUq8JxOSLE_ik8&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQF28LHsmAz85BdPEBB-y-0pfYKjCwHxDuc4b7SXJaTGjls384a4z3Pumqq9T-IzzRdhFgNKpTg_MA&oh=00_AfuwB1y2JDYnpI7surCEjxQqnWHoO4cZdOt0UlxFTQeN8w&oe=69989E25', 'https://www.instagram.com/reel/DRjMGavjd3I/', '@sanlamallianzkenya_ launch fully powered by @stagepassav', '2025-11-27 11:27:53', '2026-02-16 11:00:03', '{\"id\": \"18061373321230168\", \"caption\": \"@sanlamallianzkenya_ launch fully powered by @stagepassav\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQNvGjqCDkRN2uu_tFR_5JCdt0tKYh5yICVEXQ7YEv48NjsgYmPsAsrSoB2xAXZTIdF99bZBmZDdFw4Zhy67MQLZMAvN3a7MZETTPEk.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=MP23ThW6hNkQ7kNvwEKP-hX&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjIzMDc2NDg5MTMwNDQ1ODIsImFzc2V0X2FnZV9kYXlzIjo4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjIyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=3c39a8dede4ba0ce&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FQTRDREMxOUY3MzBDMkE1RDQ4QTEwMTlERjA5NkVCQ192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HUHotQlNPcVk4TElScG9GQU9OU1BrdGJWNkZ5YnN0VEFRQUYVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmzNHTm-yymQgVAigCQzMsF0A2VT987ZFoGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeHulxpWlPX-juZklij5bg47oxozLY5ijtyjGjMtjmKO3OBpPmVlCYdynsSDiZxzTbZxUNoVMli5X0y7rFtlgA14&oh=00_AftywKwcxeSAofBV5MWVXyoDfGWfvdbs9PwHtKNZpLko7Q&oe=69947A65\", \"permalink\": \"https://www.instagram.com/reel/DRjMGavjd3I/\", \"timestamp\": \"2025-11-27T06:27:53+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/588957801_2636334930078878_4451083546345557582_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFyUcl_C0K7J_icOWxbiePAQdwww-SmO8FB3DDD5KY7wQTPGOBDKfjA8zlCOIbhsc5lA919UVjHc5qmpY7B22rh&_nc_ohc=p2iJJkXVpsMQ7kNvwHvLWRX&_nc_oc=Adn40vZAs0G86XefCKoXeN9jtqgP4Wek3-blH0d3X7WtPAgxLz3L1VUq8JxOSLE_ik8&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQF28LHsmAz85BdPEBB-y-0pfYKjCwHxDuc4b7SXJaTGjls384a4z3Pumqq9T-IzzRdhFgNKpTg_MA&oh=00_AfuwB1y2JDYnpI7surCEjxQqnWHoO4cZdOt0UlxFTQeN8w&oe=69989E25\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(11, '17905371216144023', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMTvYyxFhYH8cFhHQ_c3NYbGmYgNjxAyCAbYimEI1OLTKENwGp7YG4cbGjn40nHyh-GFbDEC-IpBjHzW-ZbbZvXz0Tv1ft5asJ13QI.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=ipAAz-YM3IEQ7kNvwHKDcDd&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjExMzc3MjM2MzE2ODQyNDUsImFzc2V0X2FnZV9kYXlzIjo4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjUxLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=a4d932b53b9eaf7&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9BNzQ0MkEyQ0ZBRDU5OEFGRjg3MjQ1NjI2NjI3NTU5RV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84NDYxODE0NjEyOTY5NTZfMTIyNDY3NjM5Njc2Mjc2MDQ2NC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmqqrazp2whQQVAigCQzMsF0BJ0QYk3S8bGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeHc7zWVPcEtJQR26HCN79rlSk0FaBSfYWRKTQVoFJ9hZHdX3N9NFUHEoQpHd1wGG4QnaPAQOUpTXyAyn-JLoTdt&oh=00_AfsiGjCwEOzuv5m_IcDqgiFSeUX1rW_1wbckjXphptexZQ&oe=6994A9CD', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/587014043_1617962392519578_9138853035898839963_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFBun80oO1PDjueOZeMpTvH3G4SJMwAxVjcbhIkzADFWMC64_Bfn9zr98yEb0OKU_rO9dNQnBp038DPhskRHtGq&_nc_ohc=KNCnIcTHvTgQ7kNvwEbMAM4&_nc_oc=Adn3GHGJutRphuOXdJ_zyDxtPGAs9cL44y0-9SgBqDwE2emTDR9uNHzZMqTjPhCkhoI&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEBeoF-rgZNLhWB_kZcWpwFBClXTp9XmompcC5WisOTYKHveCFjdK9zPpJKwZBpuk2h12YRUe7gUg&oh=00_AfsrnKQKZ7-6lAMaD75bfYJq_H2uiOhvu3VfBCG8Bxw1Zg&oe=6998761F', 'https://www.instagram.com/reel/DRjL4n-jVQ0/', '@sanlamallianzkenya_ launch fully powered by @stagepassav \nOur Deco partner @etude.africa', '2025-11-27 11:26:34', '2026-02-16 11:00:03', '{\"id\": \"17905371216144023\", \"caption\": \"@sanlamallianzkenya_ launch fully powered by @stagepassav \\nOur Deco partner @etude.africa\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMTvYyxFhYH8cFhHQ_c3NYbGmYgNjxAyCAbYimEI1OLTKENwGp7YG4cbGjn40nHyh-GFbDEC-IpBjHzW-ZbbZvXz0Tv1ft5asJ13QI.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=ipAAz-YM3IEQ7kNvwHKDcDd&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjExMzc3MjM2MzE2ODQyNDUsImFzc2V0X2FnZV9kYXlzIjo4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjUxLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=a4d932b53b9eaf7&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9BNzQ0MkEyQ0ZBRDU5OEFGRjg3MjQ1NjI2NjI3NTU5RV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84NDYxODE0NjEyOTY5NTZfMTIyNDY3NjM5Njc2Mjc2MDQ2NC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmqqrazp2whQQVAigCQzMsF0BJ0QYk3S8bGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeHc7zWVPcEtJQR26HCN79rlSk0FaBSfYWRKTQVoFJ9hZHdX3N9NFUHEoQpHd1wGG4QnaPAQOUpTXyAyn-JLoTdt&oh=00_AfsiGjCwEOzuv5m_IcDqgiFSeUX1rW_1wbckjXphptexZQ&oe=6994A9CD\", \"permalink\": \"https://www.instagram.com/reel/DRjL4n-jVQ0/\", \"timestamp\": \"2025-11-27T06:26:34+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/587014043_1617962392519578_9138853035898839963_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFBun80oO1PDjueOZeMpTvH3G4SJMwAxVjcbhIkzADFWMC64_Bfn9zr98yEb0OKU_rO9dNQnBp038DPhskRHtGq&_nc_ohc=KNCnIcTHvTgQ7kNvwEbMAM4&_nc_oc=Adn3GHGJutRphuOXdJ_zyDxtPGAs9cL44y0-9SgBqDwE2emTDR9uNHzZMqTjPhCkhoI&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEBeoF-rgZNLhWB_kZcWpwFBClXTp9XmompcC5WisOTYKHveCFjdK9zPpJKwZBpuk2h12YRUe7gUg&oh=00_AfsrnKQKZ7-6lAMaD75bfYJq_H2uiOhvu3VfBCG8Bxw1Zg&oe=6998761F\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03');
INSERT INTO `instagram_media` (`id`, `instagram_id`, `media_type`, `media_url`, `thumbnail_url`, `permalink`, `caption`, `posted_at`, `fetched_at`, `raw_payload`, `created_at`, `updated_at`) VALUES
(12, '18122091028521489', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQM65kWkeCeBluyeKBVa-94PIBjwDHAR_EmKj67d-MUZ7-jf4gXNsIy4MGrROczMhWpnmDlNPSYXE8YeLOSG10QlcjGmlJEGeKQm-a0.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=Fb5bxE6MetsQ7kNvwF0kWfC&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEyNTgwMTI1NTI4MDAwOTcsImFzc2V0X2FnZV9kYXlzIjo5MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjU1LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=b277643482bc3320&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85QTQ2N0MxRDkzMEIzQTY1REI4NzAxM0Y5MERDODM5OV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTgzOTc2NDAzNjc5MTI4XzYyNDE1NDcyMDQ0MTA1NDY2NTEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJsKdqfX7ibwEFQIoAkMzLBdAS8zMzMzMzRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEqeRToNen-FiN7N1OrP6ASCWCFZPfJ4_MJYIVk98nj87VcAuIicbLJnZNxsEePzO1ahYctCajXGnzW8RRAavku&oh=00_AfsHNCuP6hEErHhjw_U3xp7oExWDRGyG9rTf8OiwfIu0KA&oe=6994A1DB', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/581446558_1905096793739415_1101694190673019578_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFdGCo8l7w_gJKopk_YW7LW3QIwE-xGTuPdAjAT7EZO42uCDR8xbdOUujKiFgbWiX7ByOyMrd0OfwRUhEFRzTqi&_nc_ohc=kWhotbG9IqYQ7kNvwGk0CoE&_nc_oc=AdlfV1QYpIALaSxgwQJQVmD-MqNutlwLbTzxXln4vgCFAG9H_VoB8SsR_v_xCvRWeA8&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEhTb3YBN5BolrB-jUI9W3uyVh8keSVL7TdCk9yICml-P7qtouVucXxPGXDNoFbdB58S8-0w-IyQA&oh=00_AfvieqOWW3I2bCvA4B46ul6p1cxfufCvmv1skt8Rr5Jk-g&oe=69987C67', 'https://www.instagram.com/reel/DRKZhNrjcxH/', 'Another event successfully and seamlessly executed for @vaalkenya by Stagepass AV, your trusted partner for comprehensive event solutions.\n\nOur scope of work included:\n	•	Large-format LED screens\n	•	Professional sound systems\n	•	Intelligent lighting\n	•	Event branding\n	•	Full fabrication and installation services\n\nFor reliable, end-to-end event production support, contact us at info@stagepass.co.ke.', '2025-11-17 20:29:10', '2026-02-16 11:00:03', '{\"id\": \"18122091028521489\", \"caption\": \"Another event successfully and seamlessly executed for @vaalkenya by Stagepass AV, your trusted partner for comprehensive event solutions.\\n\\nOur scope of work included:\\n\\t•\\tLarge-format LED screens\\n\\t•\\tProfessional sound systems\\n\\t•\\tIntelligent lighting\\n\\t•\\tEvent branding\\n\\t•\\tFull fabrication and installation services\\n\\nFor reliable, end-to-end event production support, contact us at info@stagepass.co.ke.\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQM65kWkeCeBluyeKBVa-94PIBjwDHAR_EmKj67d-MUZ7-jf4gXNsIy4MGrROczMhWpnmDlNPSYXE8YeLOSG10QlcjGmlJEGeKQm-a0.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=Fb5bxE6MetsQ7kNvwF0kWfC&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEyNTgwMTI1NTI4MDAwOTcsImFzc2V0X2FnZV9kYXlzIjo5MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjU1LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=b277643482bc3320&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85QTQ2N0MxRDkzMEIzQTY1REI4NzAxM0Y5MERDODM5OV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTgzOTc2NDAzNjc5MTI4XzYyNDE1NDcyMDQ0MTA1NDY2NTEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJsKdqfX7ibwEFQIoAkMzLBdAS8zMzMzMzRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEqeRToNen-FiN7N1OrP6ASCWCFZPfJ4_MJYIVk98nj87VcAuIicbLJnZNxsEePzO1ahYctCajXGnzW8RRAavku&oh=00_AfsHNCuP6hEErHhjw_U3xp7oExWDRGyG9rTf8OiwfIu0KA&oe=6994A1DB\", \"permalink\": \"https://www.instagram.com/reel/DRKZhNrjcxH/\", \"timestamp\": \"2025-11-17T15:29:10+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/581446558_1905096793739415_1101694190673019578_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFdGCo8l7w_gJKopk_YW7LW3QIwE-xGTuPdAjAT7EZO42uCDR8xbdOUujKiFgbWiX7ByOyMrd0OfwRUhEFRzTqi&_nc_ohc=kWhotbG9IqYQ7kNvwGk0CoE&_nc_oc=AdlfV1QYpIALaSxgwQJQVmD-MqNutlwLbTzxXln4vgCFAG9H_VoB8SsR_v_xCvRWeA8&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEhTb3YBN5BolrB-jUI9W3uyVh8keSVL7TdCk9yICml-P7qtouVucXxPGXDNoFbdB58S8-0w-IyQA&oh=00_AfvieqOWW3I2bCvA4B46ul6p1cxfufCvmv1skt8Rr5Jk-g&oe=69987C67\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(13, '18301496812250148', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQOZlXBPCBraDIQzpkAlyNGokBZZoOeEHq6uDPjGE3JwuSzV-kkECBxKXo3q3o64l6KzPeD6Bw-CCMomMTYq2bcJ4Vw_EqEkN8RJopY.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=-uk2MkTRoDQQ7kNvwHLFrjZ&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6NDA4ODA2NDIzNDg1Njc1MSwiYXNzZXRfYWdlX2RheXMiOjkyLCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6MTQsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=6f426c46d40d978d&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85NTQ4N0E0OUU5QTM2REMyMjZERDA2MjBDRkJEOTBBNV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xOTM1MzQ1MDkzOTk4NzA2XzE1OTk5MjAwOTM0NDA2ODcxMTAubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJt6EzYjUhMMOFQIoAkMzLBdALEQYk3S8ahgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGggZhS5fxfKenPdhiJW7pOqjm0TwDXWI6qObRPANdYjgcaCe0HXyWO9o6hnAptdDeMR5Sy1APtoQWMYUzE-8sa&oh=00_AfuNZ6KNRX1KbuC4jnkZtGpbVVItdsiga8r9LO12YwOl1w&oe=69948BF5', 'https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/583518851_678971908373828_8360091010241296175_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=105&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEgWreGE6XkZdb5Ubq1nd7U8aR7x4Vi6UrxpHvHhWLpSmItxFytlWUmeKBP4OZyXF7Pgsad_t9OWbcE4LVbyIHG&_nc_ohc=xG3K1nq0-akQ7kNvwFfKw_t&_nc_oc=Adk3g57FWKpSEiGVqJEPuormsTISvUNNGJGS8IATKTm-cSDhD36YQ3-TR4iAzLAES2Q&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHNwDFkeHigsZKgXPTKX2IWGiwP6ekjyjwbBF2pPDjX3ja32YQTiPwYfbq8RSZCtFfs7lnPwuTmDQ&oh=00_Aftz1vDiQjK36Uf5FTq1I8L-gl_XolSMjI9HVC9TnbTc_Q&oe=69988A5D', 'https://www.instagram.com/reel/DREcqyRjaaD/', '@stagepassav @vaalkenya', '2025-11-15 12:56:26', '2026-02-16 11:00:03', '{\"id\": \"18301496812250148\", \"caption\": \"@stagepassav @vaalkenya\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQOZlXBPCBraDIQzpkAlyNGokBZZoOeEHq6uDPjGE3JwuSzV-kkECBxKXo3q3o64l6KzPeD6Bw-CCMomMTYq2bcJ4Vw_EqEkN8RJopY.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=-uk2MkTRoDQQ7kNvwHLFrjZ&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6NDA4ODA2NDIzNDg1Njc1MSwiYXNzZXRfYWdlX2RheXMiOjkyLCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6MTQsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=6f426c46d40d978d&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85NTQ4N0E0OUU5QTM2REMyMjZERDA2MjBDRkJEOTBBNV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xOTM1MzQ1MDkzOTk4NzA2XzE1OTk5MjAwOTM0NDA2ODcxMTAubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJt6EzYjUhMMOFQIoAkMzLBdALEQYk3S8ahgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGggZhS5fxfKenPdhiJW7pOqjm0TwDXWI6qObRPANdYjgcaCe0HXyWO9o6hnAptdDeMR5Sy1APtoQWMYUzE-8sa&oh=00_AfuNZ6KNRX1KbuC4jnkZtGpbVVItdsiga8r9LO12YwOl1w&oe=69948BF5\", \"permalink\": \"https://www.instagram.com/reel/DREcqyRjaaD/\", \"timestamp\": \"2025-11-15T07:56:26+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/583518851_678971908373828_8360091010241296175_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=105&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEgWreGE6XkZdb5Ubq1nd7U8aR7x4Vi6UrxpHvHhWLpSmItxFytlWUmeKBP4OZyXF7Pgsad_t9OWbcE4LVbyIHG&_nc_ohc=xG3K1nq0-akQ7kNvwFfKw_t&_nc_oc=Adk3g57FWKpSEiGVqJEPuormsTISvUNNGJGS8IATKTm-cSDhD36YQ3-TR4iAzLAES2Q&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHNwDFkeHigsZKgXPTKX2IWGiwP6ekjyjwbBF2pPDjX3ja32YQTiPwYfbq8RSZCtFfs7lnPwuTmDQ&oh=00_Aftz1vDiQjK36Uf5FTq1I8L-gl_XolSMjI9HVC9TnbTc_Q&oe=69988A5D\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(14, '18053653031638778', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQPTXtNjJ2FT_TWOJX6WhmUhPGbt2_UWdqy8ZmBLSN7cd5oxWuulD43e7Tqi0IeP2TnbwGsBdghuZ1P--kzC7bcnNOUr_4Rv2XcKiUg.mp4?_nc_cat=102&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=4ynuMKO87vgQ7kNvwEe658L&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjk4ODUyMDE2MzQ4OTE2MCwiYXNzZXRfYWdlX2RheXMiOjk2LCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6NjEsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=2b61e3018e0b5242&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83MjQ0RTk1MDkyRDQyODNEODQ5Nzc1RjE1MDMzNjk5Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTU3ODIyODg5ODMyODMwXzYyNjc3OTQyMjY5ODI1NjA1NTMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJpDWlZO5w8EDFQIoAkMzLBdATsAAAAAAABgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGhAirhPoJQSB7wua-64G6QszHWIhkcXIezMdYiGRxch57XqoJ91Sk8MFsThfr0qgOMW3YKIuqRdQOgEZwiIFDX&oh=00_Afuq0b2FgLG1S_5ICfkao9vRq6eHACQww9elWwwyK4pVUA&oe=69949AEB', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/581224858_1891128111614485_4756087823185560349_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeENCU1z9SCVBTRzIW4rFrQ6gUxunnGqN2GBTG6ecao3YWEJ_B8bU_LZkQWOaAThBf7gG2Z7mOFCF1saL4GL4gYk&_nc_ohc=1AyZz8gbiUkQ7kNvwHyCdhf&_nc_oc=AdlZcL0gRmCVGIZ9vfuX4L4dxNrP0ckyRHdybM0uvNvql-mlA4JhsFxxBu30QAO1xI4&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFH-uu1tECT3TO2FWHBYg8frThmNxmVSsvB_Y2N9RvX1Oa8ADi1HcHmIKFHh0SLRFdhOTzcsnpPEg&oh=00_Afuv07UsZ0JnAuj7rromvIVK60zEkKwnMadxnwxnifApJw&oe=69987F52', 'https://www.instagram.com/reel/DQ7IJ1NDVk8/', 'Stagepass Audio Visual LTD . We came. We saw. We conquered. 💥\nWhat an unforgettable experience celebrating @safaricomplc_ #SafaricomAt25! 🎉\n\nOur incredible StagepassAV team went all out to deliver extraordinary moments — powered by cutting-edge audio-visual technology, stunning scenic design, and top-tier fabrication.\n\nOur scope of work included:\n🎧 Audiovisual Production\n🚪 Entry Tunnel\n🖋 Registration Area Build & Branding\n⚡ Generators\n💡 Venue Lighting Towers\n🎤 Main Stage Fabrication & Branding\n\nFrom concept to execution, we made it unforgettable. 🙌\n@steverogerskenya\n\n📩 Planning your next big event?\nLet’s make magic together → info@stagepass.co.ke', '2025-11-11 22:06:46', '2026-02-16 11:00:03', '{\"id\": \"18053653031638778\", \"caption\": \"Stagepass Audio Visual LTD . We came. We saw. We conquered. 💥\\nWhat an unforgettable experience celebrating @safaricomplc_ #SafaricomAt25! 🎉\\n\\nOur incredible StagepassAV team went all out to deliver extraordinary moments — powered by cutting-edge audio-visual technology, stunning scenic design, and top-tier fabrication.\\n\\nOur scope of work included:\\n🎧 Audiovisual Production\\n🚪 Entry Tunnel\\n🖋 Registration Area Build & Branding\\n⚡ Generators\\n💡 Venue Lighting Towers\\n🎤 Main Stage Fabrication & Branding\\n\\nFrom concept to execution, we made it unforgettable. 🙌\\n@steverogerskenya\\n\\n📩 Planning your next big event?\\nLet’s make magic together → info@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQPTXtNjJ2FT_TWOJX6WhmUhPGbt2_UWdqy8ZmBLSN7cd5oxWuulD43e7Tqi0IeP2TnbwGsBdghuZ1P--kzC7bcnNOUr_4Rv2XcKiUg.mp4?_nc_cat=102&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=4ynuMKO87vgQ7kNvwEe658L&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjk4ODUyMDE2MzQ4OTE2MCwiYXNzZXRfYWdlX2RheXMiOjk2LCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6NjEsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=2b61e3018e0b5242&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83MjQ0RTk1MDkyRDQyODNEODQ5Nzc1RjE1MDMzNjk5Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTU3ODIyODg5ODMyODMwXzYyNjc3OTQyMjY5ODI1NjA1NTMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJpDWlZO5w8EDFQIoAkMzLBdATsAAAAAAABgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGhAirhPoJQSB7wua-64G6QszHWIhkcXIezMdYiGRxch57XqoJ91Sk8MFsThfr0qgOMW3YKIuqRdQOgEZwiIFDX&oh=00_Afuq0b2FgLG1S_5ICfkao9vRq6eHACQww9elWwwyK4pVUA&oe=69949AEB\", \"permalink\": \"https://www.instagram.com/reel/DQ7IJ1NDVk8/\", \"timestamp\": \"2025-11-11T17:06:46+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/581224858_1891128111614485_4756087823185560349_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeENCU1z9SCVBTRzIW4rFrQ6gUxunnGqN2GBTG6ecao3YWEJ_B8bU_LZkQWOaAThBf7gG2Z7mOFCF1saL4GL4gYk&_nc_ohc=1AyZz8gbiUkQ7kNvwHyCdhf&_nc_oc=AdlZcL0gRmCVGIZ9vfuX4L4dxNrP0ckyRHdybM0uvNvql-mlA4JhsFxxBu30QAO1xI4&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFH-uu1tECT3TO2FWHBYg8frThmNxmVSsvB_Y2N9RvX1Oa8ADi1HcHmIKFHh0SLRFdhOTzcsnpPEg&oh=00_Afuv07UsZ0JnAuj7rromvIVK60zEkKwnMadxnwxnifApJw&oe=69987F52\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(15, '17865801780491878', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMDXNif_XmaCWpvUZrnAbQzKV-YRIfFI1LgfEs91b9afq74V30a6uz-Ilkbi4DGc3g7BiClGbD5qbsbxQrS5AS6X4FQNAkpOK3NCjM.mp4?_nc_cat=106&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=5niFLKdqQTMQ7kNvwHuzzZr&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjQxMTA3ODMyNTI0NzgyMDMsImFzc2V0X2FnZV9kYXlzIjo5OCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=862adae2413030a4&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8zNDRCQUVDODFEMzgyRjZBOUQ0NDMzQzJBM0Y1RjhCN192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMzUzMTgxMTcyODY1NDg1XzQ3MDU0NDgxMDc5MTI0MDUzOTYubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJvbjmfiJr80OFQIoAkMzLBdALAAAAAAAABgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGJb7FMVI3Kv9dQjKAd5T3a6cP7OqfVOSDpw_s6p9U5IEP38t2th0V6dyJxY9X2T4IJeg3Xdcjo5JZy1RxrX50N&oh=00_Afu_zHRsuxIY7WsdvQzPvkTJZquRiTbj6Z-oOrtoN92Drw&oe=69947DA3', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/575656063_1218306043495412_8327011037020114132_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=110&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEtWwARshO5xj4aUZOuHHPEZ8uiOgfhk_Nny6I6B-GT88_nVQlS8mSolKDX4ntjeqd4wmHt195aQ9uD3vqlsJp7&_nc_ohc=9YgR6SzqeHYQ7kNvwHkz7VH&_nc_oc=AdmXOwpWqPZeeKfYt3fd4Egh-aUbzO4qy7eEypv87GC85u5f64CeU3y-WXjR6IZrkcY&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGdZdFh49qZYCANKe5ZC9GR75wEYyaYbddKBeIPX0jM3lhtcAYRhzZY0f9KUbL9WaxEMOb7pEABkA&oh=00_Afvh8By3YmH0I7W7lNOPIQhx6-_smaawQh67PMOHcjwbYg&oe=69988CD6', 'https://www.instagram.com/reel/DQ1s9cgCDgk/', '#Stagepassav \n\nTrusted. Innovative. Exceptional. Your go-to event audiovisual partner.', '2025-11-09 19:30:06', '2026-02-16 11:00:03', '{\"id\": \"17865801780491878\", \"caption\": \"#Stagepassav \\n\\nTrusted. Innovative. Exceptional. Your go-to event audiovisual partner.\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMDXNif_XmaCWpvUZrnAbQzKV-YRIfFI1LgfEs91b9afq74V30a6uz-Ilkbi4DGc3g7BiClGbD5qbsbxQrS5AS6X4FQNAkpOK3NCjM.mp4?_nc_cat=106&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=5niFLKdqQTMQ7kNvwHuzzZr&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjQxMTA3ODMyNTI0NzgyMDMsImFzc2V0X2FnZV9kYXlzIjo5OCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=862adae2413030a4&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8zNDRCQUVDODFEMzgyRjZBOUQ0NDMzQzJBM0Y1RjhCN192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMzUzMTgxMTcyODY1NDg1XzQ3MDU0NDgxMDc5MTI0MDUzOTYubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJvbjmfiJr80OFQIoAkMzLBdALAAAAAAAABgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGJb7FMVI3Kv9dQjKAd5T3a6cP7OqfVOSDpw_s6p9U5IEP38t2th0V6dyJxY9X2T4IJeg3Xdcjo5JZy1RxrX50N&oh=00_Afu_zHRsuxIY7WsdvQzPvkTJZquRiTbj6Z-oOrtoN92Drw&oe=69947DA3\", \"permalink\": \"https://www.instagram.com/reel/DQ1s9cgCDgk/\", \"timestamp\": \"2025-11-09T14:30:06+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/575656063_1218306043495412_8327011037020114132_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=110&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEtWwARshO5xj4aUZOuHHPEZ8uiOgfhk_Nny6I6B-GT88_nVQlS8mSolKDX4ntjeqd4wmHt195aQ9uD3vqlsJp7&_nc_ohc=9YgR6SzqeHYQ7kNvwHkz7VH&_nc_oc=AdmXOwpWqPZeeKfYt3fd4Egh-aUbzO4qy7eEypv87GC85u5f64CeU3y-WXjR6IZrkcY&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGdZdFh49qZYCANKe5ZC9GR75wEYyaYbddKBeIPX0jM3lhtcAYRhzZY0f9KUbL9WaxEMOb7pEABkA&oh=00_Afvh8By3YmH0I7W7lNOPIQhx6-_smaawQh67PMOHcjwbYg&oe=69988CD6\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(16, '18117321994541024', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOAfDFfBGuAFQ9s9EPl1XnS6TjOJ8XogwoE8Z2dpgY5y0ZfRcFP_E2-aH4KwKKzjYxc5_FKhvRWe-COajaTSxYCGjhMLvTbwEMgMEk.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=dn2Yp2DCHZQQ7kNvwHLqvZX&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTA4MC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjg1MzQ0MzM3Mzg2MjIyMCwiYXNzZXRfYWdlX2RheXMiOjk5LCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6MzEsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&vs=b18be6a2978fce9f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8wMTQ4NEUzRkQ0NDk3QjE2Q0NEQTAxRTIyQ0FDNzdBOF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84NjIwNTYwNDk0OTIwNjlfMzc1NTc1NTk2NjI3ODY1NTM0NC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmmLWU0viMhAMVAigCQzMsF0A_5mZmZmZmGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEK8NsB24ThHMZPRnRDAAmaRZE_yIxgzQpFkT_IjGDNCi_maH2Xn9fBLERjph9KFJVIhagHCo8c3kjl5vW-XDxA&oh=00_AfszGK-IbyKBFPyGheBucUGGfEicFDzHu8bYDXgvUCMy8g&oe=6994984F', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/575500748_18393618775133216_5776025592834859226_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHq5PpZZ_1N1pGxWTp33QBrV3nxGXhadMlXefEZeFp0yW5VcicLZX8eRoFss7OwsTJv0bHlRrgFBT6qGVZi3fiz&_nc_ohc=KNHbXOcm6xsQ7kNvwGWbaAm&_nc_oc=Adn8DScQYAvJjLhoBr5Pp565ILinaB157z5MvW2CYD_IBXrDAQ4hU89UVBtINdCqko4&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGvd4BRRBPNJM8aeOGRxaWcui-Z5dS8dQmYb8-Tdi73MIqfQjoO6mS03D9vbA79xuQhL8-xsl8PNg&oh=00_Afsh8TIRD9KUlAK2w_5a1hnGEBB9lIeKGuk3m9rAdkOlhQ&oe=69987E68', 'https://www.instagram.com/reel/DQziDZBjV8e/', 'We came. We saw. We conquered. 💥\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\n\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\n\nFrom concept to execution, we made it unforgettable. 🙌\n@steverogerskenya \n\n📩 Need us for your next event?\nLet’s make magic together → info@stagepass.co.ke\n\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction', '2025-11-08 23:16:30', '2026-02-16 11:00:03', '{\"id\": \"18117321994541024\", \"caption\": \"We came. We saw. We conquered. 💥\\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\\n\\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\\n\\nFrom concept to execution, we made it unforgettable. 🙌\\n@steverogerskenya \\n\\n📩 Need us for your next event?\\nLet’s make magic together → info@stagepass.co.ke\\n\\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOAfDFfBGuAFQ9s9EPl1XnS6TjOJ8XogwoE8Z2dpgY5y0ZfRcFP_E2-aH4KwKKzjYxc5_FKhvRWe-COajaTSxYCGjhMLvTbwEMgMEk.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=dn2Yp2DCHZQQ7kNvwHLqvZX&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTA4MC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjg1MzQ0MzM3Mzg2MjIyMCwiYXNzZXRfYWdlX2RheXMiOjk5LCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6MzEsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&vs=b18be6a2978fce9f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8wMTQ4NEUzRkQ0NDk3QjE2Q0NEQTAxRTIyQ0FDNzdBOF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84NjIwNTYwNDk0OTIwNjlfMzc1NTc1NTk2NjI3ODY1NTM0NC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmmLWU0viMhAMVAigCQzMsF0A_5mZmZmZmGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEK8NsB24ThHMZPRnRDAAmaRZE_yIxgzQpFkT_IjGDNCi_maH2Xn9fBLERjph9KFJVIhagHCo8c3kjl5vW-XDxA&oh=00_AfszGK-IbyKBFPyGheBucUGGfEicFDzHu8bYDXgvUCMy8g&oe=6994984F\", \"permalink\": \"https://www.instagram.com/reel/DQziDZBjV8e/\", \"timestamp\": \"2025-11-08T18:16:30+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/575500748_18393618775133216_5776025592834859226_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHq5PpZZ_1N1pGxWTp33QBrV3nxGXhadMlXefEZeFp0yW5VcicLZX8eRoFss7OwsTJv0bHlRrgFBT6qGVZi3fiz&_nc_ohc=KNHbXOcm6xsQ7kNvwGWbaAm&_nc_oc=Adn8DScQYAvJjLhoBr5Pp565ILinaB157z5MvW2CYD_IBXrDAQ4hU89UVBtINdCqko4&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGvd4BRRBPNJM8aeOGRxaWcui-Z5dS8dQmYb8-Tdi73MIqfQjoO6mS03D9vbA79xuQhL8-xsl8PNg&oh=00_Afsh8TIRD9KUlAK2w_5a1hnGEBB9lIeKGuk3m9rAdkOlhQ&oe=69987E68\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(17, '18067434095381636', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMeQjgHhyWYHKmNyWAP4NfZk5xsFe7u4RRw9GS57WKC6Ov170Gnc-zMgZTMXAEKnjh9ypjyajED0_xGb2qjiswtAgHU3JSJZUWThEs.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=OImCcGlVjl0Q7kNvwFrNiSN&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjI1MDU5Mzc0NzgzNjczMzE4LCJhc3NldF9hZ2VfZGF5cyI6OTksInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo2MCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=3718c8f93c2da62b&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9EODREQTI1RTRGOUI0M0Q3MjBCN0I0RkJGRDUwQ0JBRl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8zNzEyNjk2MjMyNDQxMzY4XzQ2Nzk4OTk5NTY4MDI0OTA4NDMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJszPscTL14NZFQIoAkMzLBdAThU_fO2RaBgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHfxN_mGrxc0Ba5ZhWV3y0jfhBOdcXudzt-EE51xe53O2QKFg_8c9Ux4VGENnnehH1jCiz8-zrAdFUyfeNcbfir&oh=00_AfuCBYmQFzuWHiVwyniQjOSE4Kw3OARKNjU3-cZX6uWRwg&oe=69947C91', 'https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/574859594_2190832111438681_2146931566180155007_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEnPbhkkPnfepdRVqIZPUXRf5MqdPy3aHh_kyp0_LdoeHTS84wqs7mKcWslz9OSgHIlUXHr3w8Glawyk0TGOjTf&_nc_ohc=wraR_3b60HMQ7kNvwGSZo6q&_nc_oc=Adlx4ka8og2CpDo09habllvLaST3V6eMdkKX8Rsw3-Qhv5BuYf8paeNqDN77RQOwkdo&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFM0QlAXCpL1U1h9LtaWFD5jyBy2MyRFs-3UDyd7RlkSu9r0z8PkYLABVcvADPn8m6HTm6Q1Vstgg&oh=00_Afsz2bApa4rTMRKJRH4VEr2QHESp7wwkxs-STOMrd5-NJw&oe=69989725', 'https://www.instagram.com/reel/DQy5KP1jSX2/', 'We came. We saw. We conquered. 💥\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\n\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\n\nFrom concept to execution, we made it unforgettable. 🙌\n\n📩 Need us for your next event?\nLet’s make magic together → info@stagepass.co.ke\n\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction', '2025-11-08 17:19:53', '2026-02-16 11:00:03', '{\"id\": \"18067434095381636\", \"caption\": \"We came. We saw. We conquered. 💥\\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\\n\\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\\n\\nFrom concept to execution, we made it unforgettable. 🙌\\n\\n📩 Need us for your next event?\\nLet’s make magic together → info@stagepass.co.ke\\n\\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMeQjgHhyWYHKmNyWAP4NfZk5xsFe7u4RRw9GS57WKC6Ov170Gnc-zMgZTMXAEKnjh9ypjyajED0_xGb2qjiswtAgHU3JSJZUWThEs.mp4?_nc_cat=104&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=OImCcGlVjl0Q7kNvwFrNiSN&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjI1MDU5Mzc0NzgzNjczMzE4LCJhc3NldF9hZ2VfZGF5cyI6OTksInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo2MCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=3718c8f93c2da62b&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9EODREQTI1RTRGOUI0M0Q3MjBCN0I0RkJGRDUwQ0JBRl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8zNzEyNjk2MjMyNDQxMzY4XzQ2Nzk4OTk5NTY4MDI0OTA4NDMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJszPscTL14NZFQIoAkMzLBdAThU_fO2RaBgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHfxN_mGrxc0Ba5ZhWV3y0jfhBOdcXudzt-EE51xe53O2QKFg_8c9Ux4VGENnnehH1jCiz8-zrAdFUyfeNcbfir&oh=00_AfuCBYmQFzuWHiVwyniQjOSE4Kw3OARKNjU3-cZX6uWRwg&oe=69947C91\", \"permalink\": \"https://www.instagram.com/reel/DQy5KP1jSX2/\", \"timestamp\": \"2025-11-08T12:19:53+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/574859594_2190832111438681_2146931566180155007_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEnPbhkkPnfepdRVqIZPUXRf5MqdPy3aHh_kyp0_LdoeHTS84wqs7mKcWslz9OSgHIlUXHr3w8Glawyk0TGOjTf&_nc_ohc=wraR_3b60HMQ7kNvwGSZo6q&_nc_oc=Adlx4ka8og2CpDo09habllvLaST3V6eMdkKX8Rsw3-Qhv5BuYf8paeNqDN77RQOwkdo&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFM0QlAXCpL1U1h9LtaWFD5jyBy2MyRFs-3UDyd7RlkSu9r0z8PkYLABVcvADPn8m6HTm6Q1Vstgg&oh=00_Afsz2bApa4rTMRKJRH4VEr2QHESp7wwkxs-STOMrd5-NJw&oe=69989725\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(18, '18109868671514302', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMeEi171puHSzW6LE5Y98eZz_8b-8Afij6LzTZGr6KHPfC_p7cPCu92Lpiw1Sbwlmpd8N3CUzfZZVDnX9gBgEoY9_pfEDxeFYcmpu8.mp4?_nc_cat=101&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=wORAVSX8tsIQ7kNvwFGkNUW&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE4MjE4NjMzMTUxMjc0MTksImFzc2V0X2FnZV9kYXlzIjo5OSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjQ3LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=39047c1cde580b1e&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9DQzQwODE3MzdBRURCMDBBNTNGMTFGNDM1MkRFMDhCRl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTQyMzYxNDcxMzc4NTQ5XzgzOTg3NzgyNTMwNDU3NTQ0NzUubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJvbx0buzvrwGFQIoAkMzLBdAR4zMzMzMzRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHR1zcXG-kZT2Rciy_5fA3NXQ_zT0fz1KBdD_NPR_PUoIiOAp_CSb3zP25NQqURA8SjCqmbMWobpXydP_9TCObn&oh=00_AfscP9dwIm9dqOP5-myyLGAIMnj_b6QyhTitnnqpSk96BQ&oe=6994A90A', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/579683173_4254900981421988_8184932564181510844_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEfTAhqslblrXD-XSuk2TWWcRCCa4_7STBxEIJrj_tJMG7d9UnX8gX7UzCtXHBhRGLP5RIHy2Zaa6dBnqwHyV94&_nc_ohc=WQSi8q5CitAQ7kNvwFwSt2s&_nc_oc=AdmpjV5CYD_Gcsz8RVqwcNqxq2xP3AfrVDO3_Ri-_sBZVzHatapH00cDjTTrgg_Y_kc&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGRHS1wdgvYywKpSt3FX4S3b5WMDmhuZpWHX67fPgLxGaG8EMm1L4HxxdPtPgb3_ypScFT5GwwwQA&oh=00_Aftrk2nk7uWi7OD8JSbppz7DnirNw2BX3aGpl4XA17diUw&oe=6998751A', 'https://www.instagram.com/reel/DQy4tP4jfCr/', 'We came. We saw. We conquered. 💥\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\n\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\n\nFrom concept to execution, we made it unforgettable. 🙌\n@mercymasikamuguro \n\n📩 Need us for your next event?\nLet’s make magic together → info@stagepass.co.ke\n\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction', '2025-11-08 17:15:29', '2026-02-16 11:00:03', '{\"id\": \"18109868671514302\", \"caption\": \"We came. We saw. We conquered. 💥\\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\\n\\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\\n\\nFrom concept to execution, we made it unforgettable. 🙌\\n@mercymasikamuguro \\n\\n📩 Need us for your next event?\\nLet’s make magic together → info@stagepass.co.ke\\n\\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQMeEi171puHSzW6LE5Y98eZz_8b-8Afij6LzTZGr6KHPfC_p7cPCu92Lpiw1Sbwlmpd8N3CUzfZZVDnX9gBgEoY9_pfEDxeFYcmpu8.mp4?_nc_cat=101&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=wORAVSX8tsIQ7kNvwFGkNUW&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE4MjE4NjMzMTUxMjc0MTksImFzc2V0X2FnZV9kYXlzIjo5OSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjQ3LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=39047c1cde580b1e&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9DQzQwODE3MzdBRURCMDBBNTNGMTFGNDM1MkRFMDhCRl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTQyMzYxNDcxMzc4NTQ5XzgzOTg3NzgyNTMwNDU3NTQ0NzUubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJvbx0buzvrwGFQIoAkMzLBdAR4zMzMzMzRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHR1zcXG-kZT2Rciy_5fA3NXQ_zT0fz1KBdD_NPR_PUoIiOAp_CSb3zP25NQqURA8SjCqmbMWobpXydP_9TCObn&oh=00_AfscP9dwIm9dqOP5-myyLGAIMnj_b6QyhTitnnqpSk96BQ&oe=6994A90A\", \"permalink\": \"https://www.instagram.com/reel/DQy4tP4jfCr/\", \"timestamp\": \"2025-11-08T12:15:29+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/579683173_4254900981421988_8184932564181510844_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEfTAhqslblrXD-XSuk2TWWcRCCa4_7STBxEIJrj_tJMG7d9UnX8gX7UzCtXHBhRGLP5RIHy2Zaa6dBnqwHyV94&_nc_ohc=WQSi8q5CitAQ7kNvwFwSt2s&_nc_oc=AdmpjV5CYD_Gcsz8RVqwcNqxq2xP3AfrVDO3_Ri-_sBZVzHatapH00cDjTTrgg_Y_kc&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGRHS1wdgvYywKpSt3FX4S3b5WMDmhuZpWHX67fPgLxGaG8EMm1L4HxxdPtPgb3_ypScFT5GwwwQA&oh=00_Aftrk2nk7uWi7OD8JSbppz7DnirNw2BX3aGpl4XA17diUw&oe=6998751A\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(19, '18106953064611401', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMVnUzg6Dj9-h-auDgX2NfN7I9GOVugZcCWeb2-pYB8bBvwsQQNBWqOqC4nmcQO5MJzmOSaaC8-iU-tIsQS7NQDwLZWLUYiJg4yUjU.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=xlQgkMcinpAQ7kNvwEl4UI8&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjI1ODgzODgyNDE1MzYyNjAsImFzc2V0X2FnZV9kYXlzIjo5OSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjQ3LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=f387bcb1411df5c5&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC80ODQ4RjU3QUFGNDEwQjlDNjcxOUVERTBDQUJFMDM4Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTk3ODYzMTAyNDQyOTM1XzUwMzkwNzQ4MDY1MjYwMDMzMTcubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJojU65qDiJkJFQIoAkMzLBdAR9EGJN0vGxgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFQQOmzQk_B2y9YtVRt3yHQG-N63ZTWSC8b43rdlNZIL6xCloAd6QjxGmp1KpvsF-FAYnZU0SXxkVkyEx9QrA_5&oh=00_Afu8X1Rkb-ZbaleHrkdst46tjFgRcJeYIjFouh9-n7qUcg&oe=69948E05', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/573526346_1257111573110801_4665521774841972612_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEQL-aMx7DM6xO-3Gn7NB5bwXSDqy7_uL7BdIOrLv-4vonwIyuJpD5fdKLid1X1vRLMtYz2tDxX5Hbc3GoLq9mn&_nc_ohc=paMaU0M4XOIQ7kNvwE52kEv&_nc_oc=Adm_AXUfAY7AKoSOi5-YRMUpqV3R5OVuXWiI2QD30XytheugEvlTahsbk1HGUKbyg2s&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGT62qrnsEiwC6HllF-MhgPt-KLu64hEX7nP0pZWrg_cj2Edmb2RBVViKfyd1M1ecyuOcDKotvr7Q&oh=00_Afuu61KPaom9MwKu7qP9p9cA7LW0buJrc6PZU9e4YuvdLw&oe=69987079', 'https://www.instagram.com/reel/DQy4O1DjYoW/', 'We came. We saw. We conquered. 💥\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\n@daddyowen \nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\n\nFrom concept to execution, we made it unforgettable. 🙌\n\n📩 Need us for your next event?\nLet’s make magic together → info@stagepass.co.ke\n\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction', '2025-11-08 17:11:23', '2026-02-16 11:00:03', '{\"id\": \"18106953064611401\", \"caption\": \"We came. We saw. We conquered. 💥\\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\\n@daddyowen \\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\\n\\nFrom concept to execution, we made it unforgettable. 🙌\\n\\n📩 Need us for your next event?\\nLet’s make magic together → info@stagepass.co.ke\\n\\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMVnUzg6Dj9-h-auDgX2NfN7I9GOVugZcCWeb2-pYB8bBvwsQQNBWqOqC4nmcQO5MJzmOSaaC8-iU-tIsQS7NQDwLZWLUYiJg4yUjU.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=xlQgkMcinpAQ7kNvwEl4UI8&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjI1ODgzODgyNDE1MzYyNjAsImFzc2V0X2FnZV9kYXlzIjo5OSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjQ3LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=f387bcb1411df5c5&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC80ODQ4RjU3QUFGNDEwQjlDNjcxOUVERTBDQUJFMDM4Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTk3ODYzMTAyNDQyOTM1XzUwMzkwNzQ4MDY1MjYwMDMzMTcubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJojU65qDiJkJFQIoAkMzLBdAR9EGJN0vGxgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeFQQOmzQk_B2y9YtVRt3yHQG-N63ZTWSC8b43rdlNZIL6xCloAd6QjxGmp1KpvsF-FAYnZU0SXxkVkyEx9QrA_5&oh=00_Afu8X1Rkb-ZbaleHrkdst46tjFgRcJeYIjFouh9-n7qUcg&oe=69948E05\", \"permalink\": \"https://www.instagram.com/reel/DQy4O1DjYoW/\", \"timestamp\": \"2025-11-08T12:11:23+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/573526346_1257111573110801_4665521774841972612_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEQL-aMx7DM6xO-3Gn7NB5bwXSDqy7_uL7BdIOrLv-4vonwIyuJpD5fdKLid1X1vRLMtYz2tDxX5Hbc3GoLq9mn&_nc_ohc=paMaU0M4XOIQ7kNvwE52kEv&_nc_oc=Adm_AXUfAY7AKoSOi5-YRMUpqV3R5OVuXWiI2QD30XytheugEvlTahsbk1HGUKbyg2s&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGT62qrnsEiwC6HllF-MhgPt-KLu64hEX7nP0pZWrg_cj2Edmb2RBVViKfyd1M1ecyuOcDKotvr7Q&oh=00_Afuu61KPaom9MwKu7qP9p9cA7LW0buJrc6PZU9e4YuvdLw&oe=69987079\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(20, '18082854089020233', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOtkaaX6yZvmNWBzHQt0I9b2FoYuta46T2hjveqdi60xESskNa0GjNDGTIGy6SjrquDb1Wfi8JeOYOZ7dQDeXto_fSL7HpR5uZqWnk.mp4?_nc_cat=111&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=LKIOgFh9MMQQ7kNvwGkbtK3&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE5MDEyOTA0MzQxMTY1NTEsImFzc2V0X2FnZV9kYXlzIjo5OSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjQxLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=61a522bdc2f9125f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85RjQ4OEJFOUE0QzdBNDNCMTJBN0JERkQ5MjdBOTJCN192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82MTQ3NzA3MjE2NTczMTBfMzU4NjY0MDU2OTg1MTA3NzA5OC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmju-Fz9XN4AYVAigCQzMsF0BE5mZmZmZmGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeF7osfuWMDAA4OLvxeCMS3YbIfDjTi5Lz1sh8ONOLkvPVp7Vndv6BT0O_IZQjw29xkC3xsDt5sMurJa9w0KhHrc&oh=00_AfvkJfFEvBr6HEWY_YzDJSZ2POS1fRi07itt3OiYBa2J6g&oe=69949EF0', 'https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/573706751_852433150580160_9010106470734145538_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFDbt-eXBEpjYEzKfnP9akl1t1jpOgZd4TW3WOk6Bl3hHIdUJnpn1umt87MD-3RNPtz9RL2eTmiwvey9CUsFBiR&_nc_ohc=FATBOVKHJ58Q7kNvwEs05s3&_nc_oc=AdmUhJlavtXsuk9AHZXSaKzYIK-D2VzR3yG8qeinx5NYyF10drclAfRYJfC8KcTwAEs&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQETUwR5s2ZQPR9Zo3ZchXcCTP5-CRpPu4EBAN1n6bUttffGEPQfXqaSmOda5A8PE3vMrniRz7jePA&oh=00_Afs4icoEMvP4UV2phr4TlXHkYpqvlPNXmMwgzz8bUZ973g&oe=69987BB2', 'https://www.instagram.com/reel/DQy3dcZDRts/', 'We came. We saw. We conquered. 💥\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\n\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\n\nFrom concept to execution, we made it unforgettable. 🙌\n@steverogerskenya \n📩 Need us for your next event?\nLet’s make magic together → info@stagepass.co.ke\n\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction', '2025-11-08 17:08:45', '2026-02-16 11:00:03', '{\"id\": \"18082854089020233\", \"caption\": \"We came. We saw. We conquered. 💥\\nWhat an unforgettable experience celebrating @safaricomplc_ Safaricom 25! 🎉\\n\\nOur amazing team went all out to deliver extraordinary moments — powered by innovative audio-visual tech, stunning scenic design, and top-tier fabrication.\\n\\nFrom concept to execution, we made it unforgettable. 🙌\\n@steverogerskenya \\n📩 Need us for your next event?\\nLet’s make magic together → info@stagepass.co.ke\\n\\n#StagepassAV #SafaricomAt25 #EventProduction #AVTechnology #ScenicDesign #EventExperts #TeamStagepass #ExperienceMatters #InnovationInAction\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOtkaaX6yZvmNWBzHQt0I9b2FoYuta46T2hjveqdi60xESskNa0GjNDGTIGy6SjrquDb1Wfi8JeOYOZ7dQDeXto_fSL7HpR5uZqWnk.mp4?_nc_cat=111&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=LKIOgFh9MMQQ7kNvwGkbtK3&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE5MDEyOTA0MzQxMTY1NTEsImFzc2V0X2FnZV9kYXlzIjo5OSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjQxLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=61a522bdc2f9125f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85RjQ4OEJFOUE0QzdBNDNCMTJBN0JERkQ5MjdBOTJCN192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82MTQ3NzA3MjE2NTczMTBfMzU4NjY0MDU2OTg1MTA3NzA5OC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmju-Fz9XN4AYVAigCQzMsF0BE5mZmZmZmGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeF7osfuWMDAA4OLvxeCMS3YbIfDjTi5Lz1sh8ONOLkvPVp7Vndv6BT0O_IZQjw29xkC3xsDt5sMurJa9w0KhHrc&oh=00_AfvkJfFEvBr6HEWY_YzDJSZ2POS1fRi07itt3OiYBa2J6g&oe=69949EF0\", \"permalink\": \"https://www.instagram.com/reel/DQy3dcZDRts/\", \"timestamp\": \"2025-11-08T12:08:45+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/573706751_852433150580160_9010106470734145538_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFDbt-eXBEpjYEzKfnP9akl1t1jpOgZd4TW3WOk6Bl3hHIdUJnpn1umt87MD-3RNPtz9RL2eTmiwvey9CUsFBiR&_nc_ohc=FATBOVKHJ58Q7kNvwEs05s3&_nc_oc=AdmUhJlavtXsuk9AHZXSaKzYIK-D2VzR3yG8qeinx5NYyF10drclAfRYJfC8KcTwAEs&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQETUwR5s2ZQPR9Zo3ZchXcCTP5-CRpPu4EBAN1n6bUttffGEPQfXqaSmOda5A8PE3vMrniRz7jePA&oh=00_Afs4icoEMvP4UV2phr4TlXHkYpqvlPNXmMwgzz8bUZ973g&oe=69987BB2\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(21, '18063009971630227', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQPkMkofnVdZyY8MCAd1DXNZYhey9NEXI7b8clIHCYpMcybTvzBVz3zAUmW_OWmwOBTDqAqjJxlw-mBNf6lsww5z7Jk1S1D9HMRqiTA.mp4?_nc_cat=108&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=n1zO2Y0kPvcQ7kNvwHl0lbW&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjcyMDM3OTIyNDQyMTUzNCwiYXNzZXRfYWdlX2RheXMiOjEwNywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjUyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=d747ced4a5252b66&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9CRDQ1MTZGQzIyNDkyQUNBNDFFMzYxRUUxOTE2ODM5M192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTY2OTE1MjE4ODc3ODE3XzEzNTI0NjM2NDgwNDA4MzE0NDEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJrzSs7zLy8cCFQIoAkMzLBdASlcKPXCj1xgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGFVlp8Gu1VPcoL_fiX_s4yt8IEhDet8re3wgSEN63yt-pbNdMqrzqEgWGFySv3BTAEtcaFv7H3mZdysVTqJ2Zm&oh=00_AfuyHl5fMQfrOJagCNGg7rKCJNOrgNTrx4v3NHCxvMiOQA&oe=69949B71', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/572002875_812424538319586_8405311026760603306_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHdWF_B9UFl8uAptXMh9YJeTUDH6tHytcRNQMfq0fK1xAqDNn-gJSarXSqzeC0ofZfrTs16kHEBrEke1WVoJWAn&_nc_ohc=8LtaNrVOjy4Q7kNvwFM_fs5&_nc_oc=AdmIEdEuGxhM4uAVJsZg-yWYDhf3euD-bivyqS_ZKM1pTmYS5kkiAf4g-7scqnu-nys&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGJr9d9D-gjHxX24DRJTgb_IoVwDjaNOE-226qy8yGOhx6c2NJbtSt7relofdyYuTQ-LnHpfULAAQ&oh=00_AfsGgwrPITu2xSAU-pZY8NjFrdq5iPUQ33MaNys6vxAXsw&oe=699875B5', 'https://www.instagram.com/reel/DQeqEuqCG4r/', '🎯 With precision, attention to detail, and an A1 team, Team StagepassAV delivers nothing but the best in event solutions and seamless execution!\n\n✨ Check out our incredible work at the Safaricom Citizen of the Future Launch — where innovation met flawless production.\n\n📩 Have an event coming up? Let’s make it unforgettable!\nReach us at info@stagepass.co.ke', '2025-10-31 19:43:40', '2026-02-16 11:00:03', '{\"id\": \"18063009971630227\", \"caption\": \"🎯 With precision, attention to detail, and an A1 team, Team StagepassAV delivers nothing but the best in event solutions and seamless execution!\\n\\n✨ Check out our incredible work at the Safaricom Citizen of the Future Launch — where innovation met flawless production.\\n\\n📩 Have an event coming up? Let’s make it unforgettable!\\nReach us at info@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQPkMkofnVdZyY8MCAd1DXNZYhey9NEXI7b8clIHCYpMcybTvzBVz3zAUmW_OWmwOBTDqAqjJxlw-mBNf6lsww5z7Jk1S1D9HMRqiTA.mp4?_nc_cat=108&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=n1zO2Y0kPvcQ7kNvwHl0lbW&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjcyMDM3OTIyNDQyMTUzNCwiYXNzZXRfYWdlX2RheXMiOjEwNywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjUyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=d747ced4a5252b66&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9CRDQ1MTZGQzIyNDkyQUNBNDFFMzYxRUUxOTE2ODM5M192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMTY2OTE1MjE4ODc3ODE3XzEzNTI0NjM2NDgwNDA4MzE0NDEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJrzSs7zLy8cCFQIoAkMzLBdASlcKPXCj1xgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeGFVlp8Gu1VPcoL_fiX_s4yt8IEhDet8re3wgSEN63yt-pbNdMqrzqEgWGFySv3BTAEtcaFv7H3mZdysVTqJ2Zm&oh=00_AfuyHl5fMQfrOJagCNGg7rKCJNOrgNTrx4v3NHCxvMiOQA&oe=69949B71\", \"permalink\": \"https://www.instagram.com/reel/DQeqEuqCG4r/\", \"timestamp\": \"2025-10-31T15:43:40+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/572002875_812424538319586_8405311026760603306_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHdWF_B9UFl8uAptXMh9YJeTUDH6tHytcRNQMfq0fK1xAqDNn-gJSarXSqzeC0ofZfrTs16kHEBrEke1WVoJWAn&_nc_ohc=8LtaNrVOjy4Q7kNvwFM_fs5&_nc_oc=AdmIEdEuGxhM4uAVJsZg-yWYDhf3euD-bivyqS_ZKM1pTmYS5kkiAf4g-7scqnu-nys&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGJr9d9D-gjHxX24DRJTgb_IoVwDjaNOE-226qy8yGOhx6c2NJbtSt7relofdyYuTQ-LnHpfULAAQ&oh=00_AfsGgwrPITu2xSAU-pZY8NjFrdq5iPUQ33MaNys6vxAXsw&oe=699875B5\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03');
INSERT INTO `instagram_media` (`id`, `instagram_id`, `media_type`, `media_url`, `thumbnail_url`, `permalink`, `caption`, `posted_at`, `fetched_at`, `raw_payload`, `created_at`, `updated_at`) VALUES
(22, '17971582598954715', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQNPGWGdwmt41-WyVpebrjJRGh6s90_Va7Wx20VuPtOdTOfyp6U1sapvYK2JMHvUCSN-Y6VGcPdkTcApuvPqqjp_SfIGpryIiyMQgcg.mp4?_nc_cat=103&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=UFh7TdoqhogQ7kNvwFEfu58&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6NDQ4MDY3OTE5NTU0NzA1NiwiYXNzZXRfYWdlX2RheXMiOjEyNiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjM1LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=107c64cca30aef6f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FQTQ5RTUwOUE5RjEwOUIzM0U5MDhEQzFFMTQ0Mzg5Ql92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xODczNTAyNzI2NTM2ODAxXzM3NjQ1NjAxNjIzNzMxODc1NDMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJuDW7LztyfUPFQIoAkMzLBdAQczMzMzMzRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEu3_2zUjEurNWbOdJ41MOVKnE74F-ZbGEqcTvgX5lsYSwbk0FbDMaoaS8KL36iL_ahTmXw6580GIDpzFzFW2A9&oh=00_AfuDNua691rIyMkKoZ_T3filthogeT1OPdI8stuxJUfWUg&oe=69948334', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/563010903_1525496002204732_8568548767229412920_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEHyfnRovmF-_7-Xx2UW9OH8yvoVWeQyUfzK-hVZ5DJRzvZWK6W-Y4nMQQWmisPc2MQX3JHbMoUcrrdJTExhoa3&_nc_ohc=Oatoi8OFV3sQ7kNvwGn-rzN&_nc_oc=Admxw-tPPhCmXyO79rYjSdaGX7Y--YY7cxLsJegktzK57KRIIJEkoMngwjOgmnS8sUs&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQH44KDkQNWn0auxLrPRslVmvqw7mMKgRe4Tt1g_2dKqGAIyo17e6T6ABAU84ETVfVqtkWs43bmpjw&oh=00_Afv6indD8NpnkiGzkYzzHih68aoawC96CydCK3vg24xb4w&oe=69989EFF', 'https://www.instagram.com/reel/DPtQwqpjYli/', 'From the vibrant sights and sounds to the incredible community spirit, this is precisely what #oktobafest2025 is all about.\nFully powered by #stagepassav', '2025-10-12 15:19:27', '2026-02-16 11:00:03', '{\"id\": \"17971582598954715\", \"caption\": \"From the vibrant sights and sounds to the incredible community spirit, this is precisely what #oktobafest2025 is all about.\\nFully powered by #stagepassav\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQNPGWGdwmt41-WyVpebrjJRGh6s90_Va7Wx20VuPtOdTOfyp6U1sapvYK2JMHvUCSN-Y6VGcPdkTcApuvPqqjp_SfIGpryIiyMQgcg.mp4?_nc_cat=103&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=UFh7TdoqhogQ7kNvwFEfu58&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6NDQ4MDY3OTE5NTU0NzA1NiwiYXNzZXRfYWdlX2RheXMiOjEyNiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjM1LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=107c64cca30aef6f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FQTQ5RTUwOUE5RjEwOUIzM0U5MDhEQzFFMTQ0Mzg5Ql92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xODczNTAyNzI2NTM2ODAxXzM3NjQ1NjAxNjIzNzMxODc1NDMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJuDW7LztyfUPFQIoAkMzLBdAQczMzMzMzRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEu3_2zUjEurNWbOdJ41MOVKnE74F-ZbGEqcTvgX5lsYSwbk0FbDMaoaS8KL36iL_ahTmXw6580GIDpzFzFW2A9&oh=00_AfuDNua691rIyMkKoZ_T3filthogeT1OPdI8stuxJUfWUg&oe=69948334\", \"permalink\": \"https://www.instagram.com/reel/DPtQwqpjYli/\", \"timestamp\": \"2025-10-12T11:19:27+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/563010903_1525496002204732_8568548767229412920_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEHyfnRovmF-_7-Xx2UW9OH8yvoVWeQyUfzK-hVZ5DJRzvZWK6W-Y4nMQQWmisPc2MQX3JHbMoUcrrdJTExhoa3&_nc_ohc=Oatoi8OFV3sQ7kNvwGn-rzN&_nc_oc=Admxw-tPPhCmXyO79rYjSdaGX7Y--YY7cxLsJegktzK57KRIIJEkoMngwjOgmnS8sUs&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQH44KDkQNWn0auxLrPRslVmvqw7mMKgRe4Tt1g_2dKqGAIyo17e6T6ABAU84ETVfVqtkWs43bmpjw&oh=00_Afv6indD8NpnkiGzkYzzHih68aoawC96CydCK3vg24xb4w&oe=69989EFF\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(23, '17874775074425621', 'CAROUSEL_ALBUM', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/563610262_18388974646133216_4162201776265428033_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=101&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeG1EIt0QZ53ekLpMpjTSpV56e1MXxBINe3p7UxfEEg17eyNs5L7hOD8abamZtIFDyIq8LyIapacv34sWx3nj_5z&_nc_ohc=uSBvoX2nHzgQ7kNvwEgaAPK&_nc_oc=Adm6WnncjeW_PX7jP894yxvODHUzLBZ4X5C2eoNBLDn6hfoMws_QaenL7SZdB9rkymQ&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfsHN_Bg4yBPwaEKkzzRdNi28oWg1-rN21E3nH81xX8Frg&oe=699898B0', NULL, 'https://www.instagram.com/p/DPtQV8sjYt1/', 'From the vibrant sights and sounds to the incredible community spirit, this is precisely what #oktobafest2025 is all about.\nFully powered by #stagepassav', '2025-10-12 15:14:14', '2026-02-16 11:00:03', '{\"id\": \"17874775074425621\", \"caption\": \"From the vibrant sights and sounds to the incredible community spirit, this is precisely what #oktobafest2025 is all about.\\nFully powered by #stagepassav\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/563610262_18388974646133216_4162201776265428033_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=101&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeG1EIt0QZ53ekLpMpjTSpV56e1MXxBINe3p7UxfEEg17eyNs5L7hOD8abamZtIFDyIq8LyIapacv34sWx3nj_5z&_nc_ohc=uSBvoX2nHzgQ7kNvwEgaAPK&_nc_oc=Adm6WnncjeW_PX7jP894yxvODHUzLBZ4X5C2eoNBLDn6hfoMws_QaenL7SZdB9rkymQ&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfsHN_Bg4yBPwaEKkzzRdNi28oWg1-rN21E3nH81xX8Frg&oe=699898B0\", \"permalink\": \"https://www.instagram.com/p/DPtQV8sjYt1/\", \"timestamp\": \"2025-10-12T11:14:14+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(24, '18053890412293190', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQNVaqhQylBpCIlvdT3YeSa0eqDkyKcRpMj6OrJRDCR-xSN4hE1lRcl8jpv4H3h5-uJqHxLArPwSmXyKc6d1ybHC--l1q-D_v9Nzvb4.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=E5E51d6-aq4Q7kNvwFH9Z48&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNDgwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTM5MjIyNjA4OTI2MzEwMywiYXNzZXRfYWdlX2RheXMiOjEyNiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjEyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=1f3055bac72ddd55&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82MTQ0NzA3NjQyQjdFRTM5NDBGQzkyQjg5QzdDMjFBQ192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xOTY3MzI1MjY3NDIwOTU3XzYyNDk2NDc5Nzg1NzU4MTIwNzQubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJv7_-tecjvkEFQIoAkMzLBdAKSp--dsi0RgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEigbpbMAIcFpq1QXDzf9AeLzLooXsMp6kvMuihewynqc54aBDMRHcmqAR5xA130EQCfZjo2XAaycnl-OSzSvK4&oh=00_Afs6_CWFRpvM_cx8P7ODtyeK48CCKgzTu5EazKQ9hPWSaA&oe=699486B1', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/563446442_798622122775251_1686986755822906960_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEH-cAnevXL7qekx_3_ibbRMucnlzMwq-My5yeXMzCr47i7pADklhMfU97Q4wd0vN0tWndUWzwTxnZdBORhTAi4&_nc_ohc=bnPXvABdJO0Q7kNvwF0BUKl&_nc_oc=AdnXlX3ADwVGIAWSevKkzu9a3yj0m2lrSODKsGxiFY_CDd1SJUsrPmfr52XJPSU0lOg&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGykkzQqKLxbWBX3bulq-WdTUBsQPwHYsrE1vKuEU1HscqIWGHxblQktAIS3DlDYXexC1J9gy8ruQ&oh=00_AfuPwivtugG-Ev1-mo_MLv09-62swNXp5AVGMIFl8ODzYw&oe=69987C06', 'https://www.instagram.com/reel/DPtJpNKDZzz/', 'From the vibrant sights and sounds to the incredible community spirit, this is precisely what #OktobaFest2025 is all about.\nFully powered by #stagepassav', '2025-10-12 14:16:17', '2026-02-16 11:00:03', '{\"id\": \"18053890412293190\", \"caption\": \"From the vibrant sights and sounds to the incredible community spirit, this is precisely what #OktobaFest2025 is all about.\\nFully powered by #stagepassav\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQNVaqhQylBpCIlvdT3YeSa0eqDkyKcRpMj6OrJRDCR-xSN4hE1lRcl8jpv4H3h5-uJqHxLArPwSmXyKc6d1ybHC--l1q-D_v9Nzvb4.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=E5E51d6-aq4Q7kNvwFH9Z48&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNDgwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTM5MjIyNjA4OTI2MzEwMywiYXNzZXRfYWdlX2RheXMiOjEyNiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjEyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=1f3055bac72ddd55&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC82MTQ0NzA3NjQyQjdFRTM5NDBGQzkyQjg5QzdDMjFBQ192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xOTY3MzI1MjY3NDIwOTU3XzYyNDk2NDc5Nzg1NzU4MTIwNzQubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJv7_-tecjvkEFQIoAkMzLBdAKSp--dsi0RgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEigbpbMAIcFpq1QXDzf9AeLzLooXsMp6kvMuihewynqc54aBDMRHcmqAR5xA130EQCfZjo2XAaycnl-OSzSvK4&oh=00_Afs6_CWFRpvM_cx8P7ODtyeK48CCKgzTu5EazKQ9hPWSaA&oe=699486B1\", \"permalink\": \"https://www.instagram.com/reel/DPtJpNKDZzz/\", \"timestamp\": \"2025-10-12T10:16:17+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/563446442_798622122775251_1686986755822906960_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEH-cAnevXL7qekx_3_ibbRMucnlzMwq-My5yeXMzCr47i7pADklhMfU97Q4wd0vN0tWndUWzwTxnZdBORhTAi4&_nc_ohc=bnPXvABdJO0Q7kNvwF0BUKl&_nc_oc=AdnXlX3ADwVGIAWSevKkzu9a3yj0m2lrSODKsGxiFY_CDd1SJUsrPmfr52XJPSU0lOg&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGykkzQqKLxbWBX3bulq-WdTUBsQPwHYsrE1vKuEU1HscqIWGHxblQktAIS3DlDYXexC1J9gy8ruQ&oh=00_AfuPwivtugG-Ev1-mo_MLv09-62swNXp5AVGMIFl8ODzYw&oe=69987C06\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(25, '17896581750313497', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMxxS_I3IyZDr_CjPJE6eyVNoLsfzNu_5frOHPaw-xs_SK2z8Vf76TWbpTr4GdjVcm_H1r3q_twQHtWI_AgCZQgiZAQW_CeQZ5DDso.mp4?_nc_cat=103&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=XcjUU0ygxpkQ7kNvwGvIc1E&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEzMjA2MzM1MjYwNzM2NzQsImFzc2V0X2FnZV9kYXlzIjoxMzksInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo0NiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=7b8bda542be25baf&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yQzQyMTJDMzUxRTUzRjYxMTUxRDNGQjdDM0JDMEVCOF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yMzM4Mzg1MzA5OTUwODAyXzUyNTk1MjkzNzI3MjIyNTcwNzUubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJpTlmcP-xtgEFQIoAkMzLBdARzdsi0OVgRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEe8NQHTfgIlpOWiL7fkulunKp4ZkyRFNGcqnhmTJEU0T_pdKU_OFXZqbg7JVz6ElTCew1HZ-RRM3VH5_H5SOL1&oh=00_AfvIyPHjNa3faDgs241KSYWNgY8uhf3uh89GxUt8kcqHtg&oe=69947E40', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/556404596_18386466931133216_8646536502981054604_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEVw_r99P6JWLGL6R4snFE4rKMHry7v0gWsowevLu_SBa3gUMuBsI9lRydHL4qzzzx6pgXxCZQHrxZUf2QV4NYe&_nc_ohc=wn-r299nDfQQ7kNvwHkuncU&_nc_oc=AdmH9TpEo8nvNy570NG6JAlXh4u-_mfbtxluoZTgWaZTVeQWS0rM0CzhaT_uBNbB5Tc&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFKHaP0aphPT5WhD5JwvP7g-JQsXYNYfMYJzf7rZXXPSy36UYFlngukiOeEOC9_jGB0k8SNSbHqrA&oh=00_AftzkZe8tLP9SkLGKO4vOvK2C7csmKNj0Q4_NPvoN-mVtg&oe=699879E6', 'https://www.instagram.com/reel/DPLw8M2CD68/', 'Kudos to the StagepassAV team and team @etude.africa for bringing the @stanbicke experiential zone to life during the @kennyg concert in Nairobi, Kenya.\nCheck out our work and feel free to contact us.\nInfo@stagepass.co.ke', '2025-09-29 15:23:42', '2026-02-16 11:00:03', '{\"id\": \"17896581750313497\", \"caption\": \"Kudos to the StagepassAV team and team @etude.africa for bringing the @stanbicke experiential zone to life during the @kennyg concert in Nairobi, Kenya.\\nCheck out our work and feel free to contact us.\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMxxS_I3IyZDr_CjPJE6eyVNoLsfzNu_5frOHPaw-xs_SK2z8Vf76TWbpTr4GdjVcm_H1r3q_twQHtWI_AgCZQgiZAQW_CeQZ5DDso.mp4?_nc_cat=103&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=XcjUU0ygxpkQ7kNvwGvIc1E&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEzMjA2MzM1MjYwNzM2NzQsImFzc2V0X2FnZV9kYXlzIjoxMzksInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo0NiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=7b8bda542be25baf&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yQzQyMTJDMzUxRTUzRjYxMTUxRDNGQjdDM0JDMEVCOF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yMzM4Mzg1MzA5OTUwODAyXzUyNTk1MjkzNzI3MjIyNTcwNzUubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJpTlmcP-xtgEFQIoAkMzLBdARzdsi0OVgRgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEe8NQHTfgIlpOWiL7fkulunKp4ZkyRFNGcqnhmTJEU0T_pdKU_OFXZqbg7JVz6ElTCew1HZ-RRM3VH5_H5SOL1&oh=00_AfvIyPHjNa3faDgs241KSYWNgY8uhf3uh89GxUt8kcqHtg&oe=69947E40\", \"permalink\": \"https://www.instagram.com/reel/DPLw8M2CD68/\", \"timestamp\": \"2025-09-29T11:23:42+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/556404596_18386466931133216_8646536502981054604_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEVw_r99P6JWLGL6R4snFE4rKMHry7v0gWsowevLu_SBa3gUMuBsI9lRydHL4qzzzx6pgXxCZQHrxZUf2QV4NYe&_nc_ohc=wn-r299nDfQQ7kNvwHkuncU&_nc_oc=AdmH9TpEo8nvNy570NG6JAlXh4u-_mfbtxluoZTgWaZTVeQWS0rM0CzhaT_uBNbB5Tc&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFKHaP0aphPT5WhD5JwvP7g-JQsXYNYfMYJzf7rZXXPSy36UYFlngukiOeEOC9_jGB0k8SNSbHqrA&oh=00_AftzkZe8tLP9SkLGKO4vOvK2C7csmKNj0Q4_NPvoN-mVtg&oe=699879E6\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(26, '17941799738938101', 'CAROUSEL_ALBUM', 'https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/554481653_18385958965133216_1305695019704173146_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHtH7AfpPMUOZkZAHQcUkVA3wL3kKxZHr3fAveQrFkevSEiDVL08v1GXA1uiZnJrTDCk3Tq48-IwYXWKYiOrn4H&_nc_ohc=0mfueWGsK6YQ7kNvwE3uM_h&_nc_oc=AdkQpcDlCHoayZnWPpwyc8x9Z1sPJy_3IbIV7zH-58MoRLTFWmRSJ4WKjoCZrR6iF2g&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvFXihs_y8Mn9BR3VcqAf7ukpKzbZA7lo1OpcPenPe_Aw&oe=69988FC2', NULL, 'https://www.instagram.com/p/DPDygvWjfKX/', 'Visa Cemeo Business powered by #stagepassav\nStagepass AV is your trusted partner for small to medium to large-scale events.\nFeel free to contact us.\nInfo@stagepass.co.ke', '2025-09-26 12:44:42', '2026-02-16 11:00:03', '{\"id\": \"17941799738938101\", \"caption\": \"Visa Cemeo Business powered by #stagepassav\\nStagepass AV is your trusted partner for small to medium to large-scale events.\\nFeel free to contact us.\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/554481653_18385958965133216_1305695019704173146_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHtH7AfpPMUOZkZAHQcUkVA3wL3kKxZHr3fAveQrFkevSEiDVL08v1GXA1uiZnJrTDCk3Tq48-IwYXWKYiOrn4H&_nc_ohc=0mfueWGsK6YQ7kNvwE3uM_h&_nc_oc=AdkQpcDlCHoayZnWPpwyc8x9Z1sPJy_3IbIV7zH-58MoRLTFWmRSJ4WKjoCZrR6iF2g&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvFXihs_y8Mn9BR3VcqAf7ukpKzbZA7lo1OpcPenPe_Aw&oe=69988FC2\", \"permalink\": \"https://www.instagram.com/p/DPDygvWjfKX/\", \"timestamp\": \"2025-09-26T08:44:42+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(27, '18004004021646104', 'CAROUSEL_ALBUM', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/553320990_18385958761133216_5185979699307929945_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=101&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeFLRXfFwW98JkdcT9kxrE52tu0gI9idHQ-27SAj2J0dDz4NkcPeT1yH2tGOuke92urDYq1XGB2_CHUbdJqeLvth&_nc_ohc=3xLq9nhqwVAQ7kNvwE44RyC&_nc_oc=Adm9Io9c0wtIBD1HbdXhMPTorCq0g6Ruf7aWKXVNEf3yQME_E4AIiKPNL_KYxarRSyw&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AftDDi3C3PbCr2bOyRHHp8em-LB_WZMSFjGQi0BhK3-Kqg&oe=699869DA', NULL, 'https://www.instagram.com/p/DPDyR2Ajcar/', 'Visa Cemeo Business powered by #stagepassav\nStagepass AV is your trusted partner for small to medium to large-scale events.\nFeel free to contact us.\nInfo@stagepass.co.ke', '2025-09-26 12:42:40', '2026-02-16 11:00:03', '{\"id\": \"18004004021646104\", \"caption\": \"Visa Cemeo Business powered by #stagepassav\\nStagepass AV is your trusted partner for small to medium to large-scale events.\\nFeel free to contact us.\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/553320990_18385958761133216_5185979699307929945_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=101&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeFLRXfFwW98JkdcT9kxrE52tu0gI9idHQ-27SAj2J0dDz4NkcPeT1yH2tGOuke92urDYq1XGB2_CHUbdJqeLvth&_nc_ohc=3xLq9nhqwVAQ7kNvwE44RyC&_nc_oc=Adm9Io9c0wtIBD1HbdXhMPTorCq0g6Ruf7aWKXVNEf3yQME_E4AIiKPNL_KYxarRSyw&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AftDDi3C3PbCr2bOyRHHp8em-LB_WZMSFjGQi0BhK3-Kqg&oe=699869DA\", \"permalink\": \"https://www.instagram.com/p/DPDyR2Ajcar/\", \"timestamp\": \"2025-09-26T08:42:40+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(28, '18428283193101083', 'CAROUSEL_ALBUM', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/553328162_18385958239133216_6433121460966618618_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeFanhpBMn_ukKbgRHy4hDfOkvbBSo0cw8OS9sFKjRzDwwNFu4QUb9_F7owFAVQW6qAU8dwDNExn68RdB8IP713q&_nc_ohc=VnNu_RdhW34Q7kNvwFTUmdA&_nc_oc=Adm1DT0SqwBLiggAs2_ZmGfj01gZxLC_mj8WAtlyEQqU_J486i2cze-b8NOzhnjW_hI&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AftqytLTY4qaRI5ST0gdxqHiuty4Fw2tgvMV7DpQCQeJKg&oe=6998953F', NULL, 'https://www.instagram.com/p/DPDxpoPjXEG/', 'Visa Direct powered by #stagepassav\nStagepass AV is your trusted partner for small to medium to large-scale events.\nFeel free to contact us.\nInfo@stagepass.co.ke', '2025-09-26 12:37:11', '2026-02-16 11:00:03', '{\"id\": \"18428283193101083\", \"caption\": \"Visa Direct powered by #stagepassav\\nStagepass AV is your trusted partner for small to medium to large-scale events.\\nFeel free to contact us.\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/553328162_18385958239133216_6433121460966618618_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeFanhpBMn_ukKbgRHy4hDfOkvbBSo0cw8OS9sFKjRzDwwNFu4QUb9_F7owFAVQW6qAU8dwDNExn68RdB8IP713q&_nc_ohc=VnNu_RdhW34Q7kNvwFTUmdA&_nc_oc=Adm1DT0SqwBLiggAs2_ZmGfj01gZxLC_mj8WAtlyEQqU_J486i2cze-b8NOzhnjW_hI&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AftqytLTY4qaRI5ST0gdxqHiuty4Fw2tgvMV7DpQCQeJKg&oe=6998953F\", \"permalink\": \"https://www.instagram.com/p/DPDxpoPjXEG/\", \"timestamp\": \"2025-09-26T08:37:11+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(29, '18238564393294959', 'CAROUSEL_ALBUM', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/554144803_18385958152133216_2512814780304182243_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHUMvaON1sykO6HAaClfRDKIwEdSkRsvLkjAR1KRGy8ue9q8WoQs4vLYNJtXNRReKal_NckarqnOwNmuGvxOhyS&_nc_ohc=ElcC68G1s7QQ7kNvwE3INA4&_nc_oc=Adli--Vui-UM2VHO01NHYgbOeN0Oikg-tudtd6xZNj8wuRY8J3ATSWJk1-AGYk1RKP8&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfsTAzLKkpXJwBcnVpSxsOmxh6WGgFV_o1N-SvutDxwqmw&oe=69987BF5', NULL, 'https://www.instagram.com/p/DPDxjGfjWCK/', 'Visa Direct powered by #stagepassav\nStagepass AV is your trusted partner for small to medium to large-scale events.\nFeel free to contact us.\nInfo@stagepass.co.ke', '2025-09-26 12:36:17', '2026-02-16 11:00:03', '{\"id\": \"18238564393294959\", \"caption\": \"Visa Direct powered by #stagepassav\\nStagepass AV is your trusted partner for small to medium to large-scale events.\\nFeel free to contact us.\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/554144803_18385958152133216_2512814780304182243_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHUMvaON1sykO6HAaClfRDKIwEdSkRsvLkjAR1KRGy8ue9q8WoQs4vLYNJtXNRReKal_NckarqnOwNmuGvxOhyS&_nc_ohc=ElcC68G1s7QQ7kNvwE3INA4&_nc_oc=Adli--Vui-UM2VHO01NHYgbOeN0Oikg-tudtd6xZNj8wuRY8J3ATSWJk1-AGYk1RKP8&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfsTAzLKkpXJwBcnVpSxsOmxh6WGgFV_o1N-SvutDxwqmw&oe=69987BF5\", \"permalink\": \"https://www.instagram.com/p/DPDxjGfjWCK/\", \"timestamp\": \"2025-09-26T08:36:17+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(30, '17854444395477411', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOTgkmP846SvPj8tDEBf2Gm6vB9_UKuHiS7Pv9CiHzbyXDq-cCPGiekUqciWpwsnX1o_JdWxRw3jt02F-i-FrqeA9TH-XwxT-v4-s0.mp4?_nc_cat=107&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=ODV3TMB3kv8Q7kNvwELSBLh&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE0NjM5MDQzNTgxNjUzNjksImFzc2V0X2FnZV9kYXlzIjoxNTQsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjozMCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=652cd8110fb96e18&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC81NjQxREE4MUFBRUY0MDUwMDQ1RENEMkQ3OEJGQjBBMF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRWlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84MDY2MTMwNzg1NDQ3NzhfOTYwNzQzNjQ2MzkzMzE4MjczLm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACbyrYe0udqZBRUCKAJDMywXQD4Q5WBBiTcYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEG2uv4WJnvHrvlEhA6cnNoMgVGFfZChycyBUYV9kKHJ8mHYTsOUiy4Awomw_NP8Jp16fJcStH3t7TnjkGHaMx_&oh=00_AftpMzZJuwqhiF0KuRq7vLURkl529VwF0EUytjU-kIP4bA&oe=69949F3C', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/548914897_18384252640133216_4457693797834200932_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeG2ctkFTV9p5LJIl72ZkzGGQM1S4J1RI35AzVLgnVEjflwf0MVI6ULAEgv_nGCN67E0PiFl0tzhNwrkQO6VpCKy&_nc_ohc=MJbhKH1UMP8Q7kNvwE1IczX&_nc_oc=AdnrRNzIFzMIXdbC_bkjDtXdN0KOHh7Q-iBlbmJSUMvaTBo8-hI3qLxY9CQo9z5rCzI&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEOZ3pN7-us_4ZxUfvnJCuEW8kEj6YbCMMfuMPz2cYo2MpAlhGP3q6y2eGEHfGvCTzFkAjOKLtRDw&oh=00_Afvw6qvcwXvFytK5gDWoYQ7AhrdX6gA8-ElN0x9wr0vhdA&oe=69989E45', 'https://www.instagram.com/reel/DOmALyDjSHJ/', 'StagepassAV is the premier provider of comprehensive event technology, scenic design, and fabrication services.\nPlease take a moment to review our recent projects at the recently concluded Daikins partners conference.\n\nShould you require our services,feel free to contact us;\ninfo@stagepass.co.ke', '2025-09-14 23:07:40', '2026-02-16 11:00:03', '{\"id\": \"17854444395477411\", \"caption\": \"StagepassAV is the premier provider of comprehensive event technology, scenic design, and fabrication services.\\nPlease take a moment to review our recent projects at the recently concluded Daikins partners conference.\\n\\nShould you require our services,feel free to contact us;\\ninfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOTgkmP846SvPj8tDEBf2Gm6vB9_UKuHiS7Pv9CiHzbyXDq-cCPGiekUqciWpwsnX1o_JdWxRw3jt02F-i-FrqeA9TH-XwxT-v4-s0.mp4?_nc_cat=107&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=ODV3TMB3kv8Q7kNvwELSBLh&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE0NjM5MDQzNTgxNjUzNjksImFzc2V0X2FnZV9kYXlzIjoxNTQsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjozMCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=652cd8110fb96e18&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC81NjQxREE4MUFBRUY0MDUwMDQ1RENEMkQ3OEJGQjBBMF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRWlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84MDY2MTMwNzg1NDQ3NzhfOTYwNzQzNjQ2MzkzMzE4MjczLm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACbyrYe0udqZBRUCKAJDMywXQD4Q5WBBiTcYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEG2uv4WJnvHrvlEhA6cnNoMgVGFfZChycyBUYV9kKHJ8mHYTsOUiy4Awomw_NP8Jp16fJcStH3t7TnjkGHaMx_&oh=00_AftpMzZJuwqhiF0KuRq7vLURkl529VwF0EUytjU-kIP4bA&oe=69949F3C\", \"permalink\": \"https://www.instagram.com/reel/DOmALyDjSHJ/\", \"timestamp\": \"2025-09-14T19:07:40+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/548914897_18384252640133216_4457693797834200932_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeG2ctkFTV9p5LJIl72ZkzGGQM1S4J1RI35AzVLgnVEjflwf0MVI6ULAEgv_nGCN67E0PiFl0tzhNwrkQO6VpCKy&_nc_ohc=MJbhKH1UMP8Q7kNvwE1IczX&_nc_oc=AdnrRNzIFzMIXdbC_bkjDtXdN0KOHh7Q-iBlbmJSUMvaTBo8-hI3qLxY9CQo9z5rCzI&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEOZ3pN7-us_4ZxUfvnJCuEW8kEj6YbCMMfuMPz2cYo2MpAlhGP3q6y2eGEHfGvCTzFkAjOKLtRDw&oh=00_Afvw6qvcwXvFytK5gDWoYQ7AhrdX6gA8-ElN0x9wr0vhdA&oe=69989E45\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(31, '18110193889554574', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMHjLh4s70F5YrL_a00buYle3JyLCg7mlua94sBoNCEQrz5I8twQNyUsrhsD9beOAyF8lNltP-fdFJK67UIA0PaFJmJkVJAN0uCsNY.mp4?_nc_cat=103&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=rkwYcEGwfAoQ7kNvwF3pg6f&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI4MC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE4NTU2NTM5MjgzNTExODksImFzc2V0X2FnZV9kYXlzIjoxNTQsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo2MiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=4c1af389dca3ff5b&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84OTQ5QUQzODhBQkEwQTFEMEE2QTdFOUUxMjI5RTJBQ192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xOTczNzI4MzkwMDgyMTAxXzgyNDUwMDAzMDUwNzk4NjgzNjUubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJqrXzZOj7csGFQIoAkMzLBdAT3KwIMSbphgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeE9nX1qfy06ydnChu9uUgxCuTqHY9F_nl65Oodj0X-eXp_5_n6w-d8JDRz3I3ufGph9853ttfi8bypBkX52bfYM&oh=00_AfvBbulCrAZO8kywBdFHZNtnO2SDS3tIA3pFwgSkfX9B0A&oe=69947920', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/548174606_18384249814133216_2410571567984540848_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeF1OCIZH5AM6vdp4nAintXPefVvKs6FZ7Z59W8qzoVntl3cA377917n2eBJDjOm4KR6gNXGMXoy2ChQg0JEPBvO&_nc_ohc=YXsbzLoZAEYQ7kNvwGinyZQ&_nc_oc=AdmAutUVfs_s76m1koX0RKn3dmqIqcPo8Jbi0L0bkZk9GN-DbB8AOjwwIRvpfYSlO-w&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEdSpWfVDN139L0-Lci442TBuL5eVBEPtc6-WwByKOtsN0U0RDO8kz1vSmgtgbDk_XbzDDn55XKuA&oh=00_AfssXtJDaxsExKK0XHfNg7d91WSOInv6lfG2NF1td-6Mpw&oe=69989AC4', 'https://www.instagram.com/reel/DOl8DMKjAim/', 'StagepassAV is the premier provider of comprehensive event technology, scenic design, and fabrication services.\nPlease take a moment to review our recent projects at the recently concluded Daikins partners conference.\n\nShould you require our services,feel free to contact us;\ninfo@stagepass.co.ke', '2025-09-14 22:31:30', '2026-02-16 11:00:03', '{\"id\": \"18110193889554574\", \"caption\": \"StagepassAV is the premier provider of comprehensive event technology, scenic design, and fabrication services.\\nPlease take a moment to review our recent projects at the recently concluded Daikins partners conference.\\n\\nShould you require our services,feel free to contact us;\\ninfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMHjLh4s70F5YrL_a00buYle3JyLCg7mlua94sBoNCEQrz5I8twQNyUsrhsD9beOAyF8lNltP-fdFJK67UIA0PaFJmJkVJAN0uCsNY.mp4?_nc_cat=103&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=rkwYcEGwfAoQ7kNvwF3pg6f&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI4MC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE4NTU2NTM5MjgzNTExODksImFzc2V0X2FnZV9kYXlzIjoxNTQsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo2MiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=4c1af389dca3ff5b&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84OTQ5QUQzODhBQkEwQTFEMEE2QTdFOUUxMjI5RTJBQ192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xOTczNzI4MzkwMDgyMTAxXzgyNDUwMDAzMDUwNzk4NjgzNjUubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJqrXzZOj7csGFQIoAkMzLBdAT3KwIMSbphgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeE9nX1qfy06ydnChu9uUgxCuTqHY9F_nl65Oodj0X-eXp_5_n6w-d8JDRz3I3ufGph9853ttfi8bypBkX52bfYM&oh=00_AfvBbulCrAZO8kywBdFHZNtnO2SDS3tIA3pFwgSkfX9B0A&oe=69947920\", \"permalink\": \"https://www.instagram.com/reel/DOl8DMKjAim/\", \"timestamp\": \"2025-09-14T18:31:30+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/548174606_18384249814133216_2410571567984540848_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeF1OCIZH5AM6vdp4nAintXPefVvKs6FZ7Z59W8qzoVntl3cA377917n2eBJDjOm4KR6gNXGMXoy2ChQg0JEPBvO&_nc_ohc=YXsbzLoZAEYQ7kNvwGinyZQ&_nc_oc=AdmAutUVfs_s76m1koX0RKn3dmqIqcPo8Jbi0L0bkZk9GN-DbB8AOjwwIRvpfYSlO-w&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEdSpWfVDN139L0-Lci442TBuL5eVBEPtc6-WwByKOtsN0U0RDO8kz1vSmgtgbDk_XbzDDn55XKuA&oh=00_AfssXtJDaxsExKK0XHfNg7d91WSOInv6lfG2NF1td-6Mpw&oe=69989AC4\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(32, '17959322726979644', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQNb5Qo1EN6V83b-zVv-Rg_c4stfw9IUpq-PPmtD44AkkZejr_oQkbs3HFT7LOfILLpCY2esqkxucRzA7pCh4pGED3sl-gonVdBjNjg.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=Ql4lXpYpvWgQ7kNvwEPTkXH&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjc5Mjk5MDQyMDA4Mjg5MCwiYXNzZXRfYWdlX2RheXMiOjE2OCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjI4OCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=8dbee72fb8581f2f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yNDREODI2MjhGNkM4MEMyQUI0M0JDQzZBOEU3M0ZBM192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xNTQwNjk0Njk3MDk0MDc3Xzg5MzUxNDMyMTY0NzExNzExODQubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJpSD5YSPzugCFQIoAkMzLBdAcgrhR64UexgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeHU3MXtyjPkLXIdvSi0n8vC7ePeow371QPt496jDfvVA_k_ZZqNfHgJWgYZtAM_jGKiPFspCfBeO3XiIImN7PZ6&oh=00_AfsxZ2Y3kG31dBA40Res21_TE_oVAiDUxh0oHRbRt6CIvw&oe=69947AE6', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/541208221_18382520650133216_2551092854093812321_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHu1bc00XpyIJpN2zBA1LRi_Yi5BDy5iGv9iLkEPLmIaxlY7sl4NAh7vvIOOIBkX0qo_FN9x5mCJI0SINag0Osj&_nc_ohc=YF1d-1eEvecQ7kNvwGSlexh&_nc_oc=AdnpBokkky2rFaScep-umkYPvabretKRwwYqAIVE0zugvSm7jTex9zrXPxoJlbsyLIM&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEbdq2xCUDQmPAB3XFeQf5C3UMPPvlFZxGls5Wa2yjhCfStXHks9Ii3C1GuGTbFYVZ7d6X4pVCdGw&oh=00_Aful6mUnvHxt4V4-HjcmZ9VtITr2VAWCOuE5Gu0lxH7Pyg&oe=699882BA', 'https://www.instagram.com/reel/DODGOGKCMSS/', 'Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV.\n@savarafrica', '2025-09-01 09:49:26', '2026-02-16 11:00:03', '{\"id\": \"17959322726979644\", \"caption\": \"Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV.\\n@savarafrica\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m86/AQNb5Qo1EN6V83b-zVv-Rg_c4stfw9IUpq-PPmtD44AkkZejr_oQkbs3HFT7LOfILLpCY2esqkxucRzA7pCh4pGED3sl-gonVdBjNjg.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=Ql4lXpYpvWgQ7kNvwEPTkXH&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjc5Mjk5MDQyMDA4Mjg5MCwiYXNzZXRfYWdlX2RheXMiOjE2OCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjI4OCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=8dbee72fb8581f2f&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yNDREODI2MjhGNkM4MEMyQUI0M0JDQzZBOEU3M0ZBM192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xNTQwNjk0Njk3MDk0MDc3Xzg5MzUxNDMyMTY0NzExNzExODQubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJpSD5YSPzugCFQIoAkMzLBdAcgrhR64UexgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeHU3MXtyjPkLXIdvSi0n8vC7ePeow371QPt496jDfvVA_k_ZZqNfHgJWgYZtAM_jGKiPFspCfBeO3XiIImN7PZ6&oh=00_AfsxZ2Y3kG31dBA40Res21_TE_oVAiDUxh0oHRbRt6CIvw&oe=69947AE6\", \"permalink\": \"https://www.instagram.com/reel/DODGOGKCMSS/\", \"timestamp\": \"2025-09-01T05:49:26+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/541208221_18382520650133216_2551092854093812321_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHu1bc00XpyIJpN2zBA1LRi_Yi5BDy5iGv9iLkEPLmIaxlY7sl4NAh7vvIOOIBkX0qo_FN9x5mCJI0SINag0Osj&_nc_ohc=YF1d-1eEvecQ7kNvwGSlexh&_nc_oc=AdnpBokkky2rFaScep-umkYPvabretKRwwYqAIVE0zugvSm7jTex9zrXPxoJlbsyLIM&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQEbdq2xCUDQmPAB3XFeQf5C3UMPPvlFZxGls5Wa2yjhCfStXHks9Ii3C1GuGTbFYVZ7d6X4pVCdGw&oh=00_Aful6mUnvHxt4V4-HjcmZ9VtITr2VAWCOuE5Gu0lxH7Pyg&oe=699882BA\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(33, '18059863424081269', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m367/AQMAApXxUI9Xpe3zsGWvMed0FVcPL7xOIV6ZtxqHwnm7dRLX7wvhxfr3lfIjIUadimI8KaglgQ3_J__IvdpNJOKNEsoPyxKdxMZnin4.mp4?_nc_cat=102&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=8GAR1_Mm3OgQ7kNvwGyu7SX&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjQyMDU2MjA3MzMwNTE2OTksImFzc2V0X2FnZV9kYXlzIjoxNjgsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMjIsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=59477d873889b084&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC81NjQwN0ZFOEY0MEI2MTU3OUFBMDE5MEMyNjUxRjNBMV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85OTY1MzI2MjU4NTYzMTlfNjYzODg0MDk3MTc2MDExNDkzNi5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm5ozUnay_-A4VAigCQzMsF0Brw64UeuFIGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeGQ6gy-MYmgE4cOGkFlvkXqoWzg2lghVU2hbODaWCFVTdONfjiEbgWiHK1SetucXRgwTp52LX2feCy6negf8L6V&oh=00_Afvox4zeGTDbS7N9KV9yk-f7Iw20pgPaddoOXPNSLb06pw&oe=699870BF', 'https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/540566424_3067715953397136_929982206885796226_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeGmYarBtJ7AP4-dTBG03UKdhU4ruZx26MSFTiu5nHboxIWKm1ShUASghrycfZWnOfG2JWZrs93tXL2tT_LO5B4f&_nc_ohc=lPlhaCkN3zkQ7kNvwGaxHU0&_nc_oc=AdlnzjgmWciU8LuSUP2aOegkEGmaR64_SRJSSZUge8xTJQlSVvkTzL7f6K258pXVSQo&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHSJjZns7A5J9cfux9Qt7aObJgGWK7R4Gja49uBiPIMj1sh50vL24_K4l52WlpEFyF7b6cCt3ci6Q&oh=00_AfvHm4CZb78aqicd4_uJH69P8RHqV9uEz4B2zzCOClV21w&oe=69989C45', 'https://www.instagram.com/reel/DODFv8fCFbi/', 'Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV.\n@officialzuchu', '2025-09-01 09:49:09', '2026-02-16 11:00:03', '{\"id\": \"18059863424081269\", \"caption\": \"Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV.\\n@officialzuchu\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t2/f2/m367/AQMAApXxUI9Xpe3zsGWvMed0FVcPL7xOIV6ZtxqHwnm7dRLX7wvhxfr3lfIjIUadimI8KaglgQ3_J__IvdpNJOKNEsoPyxKdxMZnin4.mp4?_nc_cat=102&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=8GAR1_Mm3OgQ7kNvwGyu7SX&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjQyMDU2MjA3MzMwNTE2OTksImFzc2V0X2FnZV9kYXlzIjoxNjgsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMjIsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=59477d873889b084&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC81NjQwN0ZFOEY0MEI2MTU3OUFBMDE5MEMyNjUxRjNBMV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC85OTY1MzI2MjU4NTYzMTlfNjYzODg0MDk3MTc2MDExNDkzNi5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm5ozUnay_-A4VAigCQzMsF0Brw64UeuFIGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_eui2=AeGQ6gy-MYmgE4cOGkFlvkXqoWzg2lghVU2hbODaWCFVTdONfjiEbgWiHK1SetucXRgwTp52LX2feCy6negf8L6V&oh=00_Afvox4zeGTDbS7N9KV9yk-f7Iw20pgPaddoOXPNSLb06pw&oe=699870BF\", \"permalink\": \"https://www.instagram.com/reel/DODFv8fCFbi/\", \"timestamp\": \"2025-09-01T05:49:09+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/540566424_3067715953397136_929982206885796226_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeGmYarBtJ7AP4-dTBG03UKdhU4ruZx26MSFTiu5nHboxIWKm1ShUASghrycfZWnOfG2JWZrs93tXL2tT_LO5B4f&_nc_ohc=lPlhaCkN3zkQ7kNvwGaxHU0&_nc_oc=AdlnzjgmWciU8LuSUP2aOegkEGmaR64_SRJSSZUge8xTJQlSVvkTzL7f6K258pXVSQo&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHSJjZns7A5J9cfux9Qt7aObJgGWK7R4Gja49uBiPIMj1sh50vL24_K4l52WlpEFyF7b6cCt3ci6Q&oh=00_AfvHm4CZb78aqicd4_uJH69P8RHqV9uEz4B2zzCOClV21w&oe=69989C45\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(34, '17965379357954227', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOidQKop3lZXJNKV86oT2Cd2z3SS6uugmNwsbSlm813EoC8ZbKB7CY3LDFl8u9nVTaGgA2Z3IOyVk5zAApJQ7l5xYYisXYe00XhbXI.mp4?_nc_cat=111&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=1YqtTiMS5UAQ7kNvwGvDJXY&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTA4MC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEyNDUwODQ5MDQwMzIyMzgsImFzc2V0X2FnZV9kYXlzIjoxNjgsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyNTUsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=abd22fe4459ebf69&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8wOTQ1NDJGOEJFMjZENjFDREFFQjc1MTIzMEQ3OEY5Ql92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMjY2NDA0NTYxNDM0NDY5XzM4Njk5NzgwMTQzODYxODQxMTEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJtyf3La9mbYEFQIoAkMzLBdAb_3bItDlYBgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEY61nfq-sJjhlR-CwiqcItEtaHCcXvh3MS1ocJxe-HcxGBLfvGGjWzVnZBP3r5zWnsL7CTuMTyx5MBYixSi2l8&oh=00_AfvvgK6fREwUKdycRWJ8wwHXWYxiEmcwS8Ons1QFuN1cvA&oe=69948270', 'https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/541299371_18382519987133216_13589445662408040_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeE7dr2YAhu_w1ZncYrTcyVfvN89UXEsFe683z1RcSwV7muwGNzlSCrnXLl3zJW3A_2fvMe9-DzjTzvHI-E0dyiO&_nc_ohc=PcXy6ASYCloQ7kNvwFJAxMF&_nc_oc=AdmdAyNcwuDFlhnmsqNlW2DB0Ev3jmvKFpAlIkwgbhcKm_wOAVnh7aI8_FxCUs0j4vI&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGkLk8f1emJk9hGfLwQkFezlfz1QhtDpDIGL6GNacETMIq59TmYYTyA9DfmezmavdQH8X8PQgpGXw&oh=00_AfvPTP3Re9a1bKo5QSCp3Y0k3xKmfqAw2JdCRTYhMbaQJQ&oe=69987457', 'https://www.instagram.com/reel/DODFQIJDY0L/', 'Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV.\n@eddykenzo', '2025-09-01 09:38:53', '2026-02-16 11:00:03', '{\"id\": \"17965379357954227\", \"caption\": \"Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV.\\n@eddykenzo\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQOidQKop3lZXJNKV86oT2Cd2z3SS6uugmNwsbSlm813EoC8ZbKB7CY3LDFl8u9nVTaGgA2Z3IOyVk5zAApJQ7l5xYYisXYe00XhbXI.mp4?_nc_cat=111&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=1YqtTiMS5UAQ7kNvwGvDJXY&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTA4MC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjEyNDUwODQ5MDQwMzIyMzgsImFzc2V0X2FnZV9kYXlzIjoxNjgsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyNTUsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=abd22fe4459ebf69&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8wOTQ1NDJGOEJFMjZENjFDREFFQjc1MTIzMEQ3OEY5Ql92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMjY2NDA0NTYxNDM0NDY5XzM4Njk5NzgwMTQzODYxODQxMTEubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJtyf3La9mbYEFQIoAkMzLBdAb_3bItDlYBgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_eui2=AeEY61nfq-sJjhlR-CwiqcItEtaHCcXvh3MS1ocJxe-HcxGBLfvGGjWzVnZBP3r5zWnsL7CTuMTyx5MBYixSi2l8&oh=00_AfvvgK6fREwUKdycRWJ8wwHXWYxiEmcwS8Ons1QFuN1cvA&oe=69948270\", \"permalink\": \"https://www.instagram.com/reel/DODFQIJDY0L/\", \"timestamp\": \"2025-09-01T05:38:53+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/541299371_18382519987133216_13589445662408040_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeE7dr2YAhu_w1ZncYrTcyVfvN89UXEsFe683z1RcSwV7muwGNzlSCrnXLl3zJW3A_2fvMe9-DzjTzvHI-E0dyiO&_nc_ohc=PcXy6ASYCloQ7kNvwFJAxMF&_nc_oc=AdmdAyNcwuDFlhnmsqNlW2DB0Ev3jmvKFpAlIkwgbhcKm_wOAVnh7aI8_FxCUs0j4vI&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQGkLk8f1emJk9hGfLwQkFezlfz1QhtDpDIGL6GNacETMIq59TmYYTyA9DfmezmavdQH8X8PQgpGXw&oh=00_AfvPTP3Re9a1bKo5QSCp3Y0k3xKmfqAw2JdCRTYhMbaQJQ&oe=69987457\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(35, '17949756380991808', 'CAROUSEL_ALBUM', 'https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/541910006_18382519897133216_6341781423669865036_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeH41Qo5DFDB4VBmoLeOyNx0_F_aNTAtQxb8X9o1MC1DFscGQnS33HQ06DhIS1NW5vyPZfWZfzb_dCveILNov4J8&_nc_ohc=Syf4NPkYF50Q7kNvwFqVCjC&_nc_oc=AdmGXFRPnPPLweCGMCyOfwXyju44xtGJioxbopvm1an-KeaNhLvkF0LPWxGDVC4ekTE&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_Afst6syqXVBGQWjBdXe1zSN3N0bRTNX6Q9xTTT85Njs1jw&oe=699875F2', NULL, 'https://www.instagram.com/p/DODFKZmDeyq/', 'Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV @leapcreativestudio', '2025-09-01 09:37:03', '2026-02-16 11:00:03', '{\"id\": \"17949756380991808\", \"caption\": \"Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV @leapcreativestudio\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/541910006_18382519897133216_6341781423669865036_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeH41Qo5DFDB4VBmoLeOyNx0_F_aNTAtQxb8X9o1MC1DFscGQnS33HQ06DhIS1NW5vyPZfWZfzb_dCveILNov4J8&_nc_ohc=Syf4NPkYF50Q7kNvwFqVCjC&_nc_oc=AdmGXFRPnPPLweCGMCyOfwXyju44xtGJioxbopvm1an-KeaNhLvkF0LPWxGDVC4ekTE&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_Afst6syqXVBGQWjBdXe1zSN3N0bRTNX6Q9xTTT85Njs1jw&oe=699875F2\", \"permalink\": \"https://www.instagram.com/p/DODFKZmDeyq/\", \"timestamp\": \"2025-09-01T05:37:03+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(36, '18070226354131491', 'CAROUSEL_ALBUM', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/541618896_18382519645133216_132638379209580745_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeE9Q-7pND4FmMMqFmEWr4CXlogSd0CaEfeWiBJ3QJoR93jShXvwgvFyr0yVcIwaPhf4MKnxsVmJgfeIfEW0xU8w&_nc_ohc=kL7dg-4oa0YQ7kNvwG2L_G5&_nc_oc=AdnGxhVqHKoZRMZn-OeCYIWn_1yD-BwJk8f3ZK05D9GSBowWEXCmtfOlXo8oXwq0Fxg&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvhT-De9Zqf6aQfwNVQJJh-46c_7xKExZa60ZQSQQstTg&oe=69989C49', NULL, 'https://www.instagram.com/p/DODE4y6DfPG/', 'Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV', '2025-09-01 09:34:38', '2026-02-16 11:00:03', '{\"id\": \"18070226354131491\", \"caption\": \"Making history - The 2024 CHAN Closing Ceremony was flawlessly executed by Stagepass AV\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/541618896_18382519645133216_132638379209580745_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=111&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeE9Q-7pND4FmMMqFmEWr4CXlogSd0CaEfeWiBJ3QJoR93jShXvwgvFyr0yVcIwaPhf4MKnxsVmJgfeIfEW0xU8w&_nc_ohc=kL7dg-4oa0YQ7kNvwG2L_G5&_nc_oc=AdnGxhVqHKoZRMZn-OeCYIWn_1yD-BwJk8f3ZK05D9GSBowWEXCmtfOlXo8oXwq0Fxg&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvhT-De9Zqf6aQfwNVQJJh-46c_7xKExZa60ZQSQQstTg&oe=69989C49\", \"permalink\": \"https://www.instagram.com/p/DODE4y6DfPG/\", \"timestamp\": \"2025-09-01T05:34:38+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03');
INSERT INTO `instagram_media` (`id`, `instagram_id`, `media_type`, `media_url`, `thumbnail_url`, `permalink`, `caption`, `posted_at`, `fetched_at`, `raw_payload`, `created_at`, `updated_at`) VALUES
(37, '18100285552522161', 'CAROUSEL_ALBUM', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/530548101_18379766119133216_8845046458027292961_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeFQzSW7TJYjKOfunnNQxp7l556aXCrjeCLnnppcKuN4IoUO1waJ1vQJnbYQ5-QTqjb_gBqOgaNw8F_3HzdOAsUR&_nc_ohc=I07BX63Wn6AQ7kNvwHo4CKT&_nc_oc=Adn7ZUXN11v55PSVC1Xt8fQkGh-1W4J1nCMGQnI21ZcGFGi9rEn52X_e4FF0MUScJ_0&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvFJJhtRwmjr5OH3iJTr6I-0MljGq59UcWtjO5NZOp7Eg&oe=69989203', NULL, 'https://www.instagram.com/p/DNG3S0fIrv_/', 'Stagepass Audio Visual LTD  It’s all about perfection and seamless execution 🙌🏽\nCheck out our work during @kcbkenya AGM', '2025-08-09 00:21:26', '2026-02-16 11:00:03', '{\"id\": \"18100285552522161\", \"caption\": \"Stagepass Audio Visual LTD  It’s all about perfection and seamless execution 🙌🏽\\nCheck out our work during @kcbkenya AGM\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/530548101_18379766119133216_8845046458027292961_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeFQzSW7TJYjKOfunnNQxp7l556aXCrjeCLnnppcKuN4IoUO1waJ1vQJnbYQ5-QTqjb_gBqOgaNw8F_3HzdOAsUR&_nc_ohc=I07BX63Wn6AQ7kNvwHo4CKT&_nc_oc=Adn7ZUXN11v55PSVC1Xt8fQkGh-1W4J1nCMGQnI21ZcGFGi9rEn52X_e4FF0MUScJ_0&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvFJJhtRwmjr5OH3iJTr6I-0MljGq59UcWtjO5NZOp7Eg&oe=69989203\", \"permalink\": \"https://www.instagram.com/p/DNG3S0fIrv_/\", \"timestamp\": \"2025-08-08T20:21:26+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(38, '17862323838449847', 'CAROUSEL_ALBUM', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/528672844_18379703692133216_4669556390569412407_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHkuHce9Q2krsj6MRTyFBrBnsb8dHLmLc-exvx0cuYtz73Vhm1Sw1vPtcfonnGIdCtr4sN-pPRY0ZMdPl23LDwz&_nc_ohc=Ta-OCozd7yoQ7kNvwFVyhvs&_nc_oc=AdmqUKxWewGWN0ammwRYtr71aGXImDDtgVcrQ4_5nt83yVhArFIvITFJEplsM7invAU&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfsFivVWQ3KddBHwb-O39kjDN6oKQ3Tyue9vikVID6aD8Q&oe=69987D2A', NULL, 'https://www.instagram.com/p/DNFuU4NoeNq/', 'Looking for a sturdy outdoor roofing structure? Look no further! Our 23m x 50m heavy-duty option is perfect for all your outdoor events. \n\nContact us at info@stagepass.co.ke for more information.', '2025-08-08 13:43:50', '2026-02-16 11:00:03', '{\"id\": \"17862323838449847\", \"caption\": \"Looking for a sturdy outdoor roofing structure? Look no further! Our 23m x 50m heavy-duty option is perfect for all your outdoor events. \\n\\nContact us at info@stagepass.co.ke for more information.\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/528672844_18379703692133216_4669556390569412407_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHkuHce9Q2krsj6MRTyFBrBnsb8dHLmLc-exvx0cuYtz73Vhm1Sw1vPtcfonnGIdCtr4sN-pPRY0ZMdPl23LDwz&_nc_ohc=Ta-OCozd7yoQ7kNvwFVyhvs&_nc_oc=AdmqUKxWewGWN0ammwRYtr71aGXImDDtgVcrQ4_5nt83yVhArFIvITFJEplsM7invAU&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfsFivVWQ3KddBHwb-O39kjDN6oKQ3Tyue9vikVID6aD8Q&oe=69987D2A\", \"permalink\": \"https://www.instagram.com/p/DNFuU4NoeNq/\", \"timestamp\": \"2025-08-08T09:43:50+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(39, '17897021826266586', 'IMAGE', 'https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/527650852_18379703320133216_3418401770429490710_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiRkVFRC5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeGoe7h9RaPE_Kfb7f9NZkeGfF-C113P8zl8X4LXXc_zOTu-awXsp_Sb7k1ZNVAjs357vvAtZ75raa9qRH8qefv-&_nc_ohc=jPSZWCCBfcgQ7kNvwFSKrWu&_nc_oc=Adn53DMVbpcL0J8KVSqRR-C0TgiNtJAU7Ruh1oJCesiYWA4H39ZJJQ8y_6KWU_i096c&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_Afsgdjm55Y3_yrSJ296OXa5ykIakv6KG8HkiD_s26zrZVA&oe=69987103', NULL, 'https://www.instagram.com/p/DNFth68IPuv/', 'Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke', '2025-08-08 13:36:52', '2026-02-16 11:00:03', '{\"id\": \"17897021826266586\", \"caption\": \"Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/527650852_18379703320133216_3418401770429490710_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiRkVFRC5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeGoe7h9RaPE_Kfb7f9NZkeGfF-C113P8zl8X4LXXc_zOTu-awXsp_Sb7k1ZNVAjs357vvAtZ75raa9qRH8qefv-&_nc_ohc=jPSZWCCBfcgQ7kNvwFSKrWu&_nc_oc=Adn53DMVbpcL0J8KVSqRR-C0TgiNtJAU7Ruh1oJCesiYWA4H39ZJJQ8y_6KWU_i096c&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_Afsgdjm55Y3_yrSJ296OXa5ykIakv6KG8HkiD_s26zrZVA&oe=69987103\", \"permalink\": \"https://www.instagram.com/p/DNFth68IPuv/\", \"timestamp\": \"2025-08-08T09:36:52+0000\", \"media_type\": \"IMAGE\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(40, '17899263384126605', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m367/AQOBYioGhpAFkDl6FUek41trqP-egsKKuW49h5jJTCM-UM5_Udqpf2ZbUEgOgrdHeRUCoFWCUY09qwtCjyj_Whm0jo2kEs2cp-D9wT8.mp4?_nc_cat=106&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=dmtRICDwrL8Q7kNvwGMdkK9&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjc3MjA5MTE4NTIyMDI3MSwiYXNzZXRfYWdlX2RheXMiOjE5MSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE1LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=350812939fc19b4c&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC9BNzRBRkVBRDYzMUUwMjE4MzRENjA5QTM3NEIwOEM4N192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83ODg3MzA3NDM2NDExNTFfNzYyMzE5NTgxNTAyMjMyMDA5MS5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm3qqizc-N3wIVAigCQzMsF0AuAAAAAAAAGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEDcV_46UzLwa--0mGl_nIMQArWdsVG0oJACtZ2xUbSghu4QIKuvqyj334qJiv2u-Gj7RD_vpHZX3-onpC4grYb&oh=00_Aftjl4Br01QicCHsyM3n5L0K9VaClJfRWHEQPlNTaZgpFA&oe=6998A07F', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/529970646_18379702828133216_394051656436980818_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFnn_9fWY9GXsnsclcCsqrUiU8Ibzue3q2JTwhvO57erUjQA53w0p9GLIdhDUDC8VMOtQTvcoz08YQSZ_RUdTLt&_nc_ohc=zdm5g8gN-t8Q7kNvwHTCiMq&_nc_oc=Adm7gq5ryqxEGhfVXW7uU1RGcyHcqjeoAP1m28D31cU9-67cfiv7OKG6-FisRFoZm28&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFSMryn-VDsxYlRuj4QriaYKOAjz1okGIuPpcwGdcBYmNZGgAw96mcFS97j9aIr2FHXnDElS6xhUA&oh=00_AfuuNPlRMWwFj7MB2DHxvmBIRek3bvC7HpOQhoK7sU55rQ&oe=69988B55', 'https://www.instagram.com/reel/DNFtAwCoaSR/', 'Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke', '2025-08-08 13:32:51', '2026-02-16 11:00:03', '{\"id\": \"17899263384126605\", \"caption\": \"Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m367/AQOBYioGhpAFkDl6FUek41trqP-egsKKuW49h5jJTCM-UM5_Udqpf2ZbUEgOgrdHeRUCoFWCUY09qwtCjyj_Whm0jo2kEs2cp-D9wT8.mp4?_nc_cat=106&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=dmtRICDwrL8Q7kNvwGMdkK9&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjc3MjA5MTE4NTIyMDI3MSwiYXNzZXRfYWdlX2RheXMiOjE5MSwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE1LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=350812939fc19b4c&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC9BNzRBRkVBRDYzMUUwMjE4MzRENjA5QTM3NEIwOEM4N192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83ODg3MzA3NDM2NDExNTFfNzYyMzE5NTgxNTAyMjMyMDA5MS5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm3qqizc-N3wIVAigCQzMsF0AuAAAAAAAAGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEDcV_46UzLwa--0mGl_nIMQArWdsVG0oJACtZ2xUbSghu4QIKuvqyj334qJiv2u-Gj7RD_vpHZX3-onpC4grYb&oh=00_Aftjl4Br01QicCHsyM3n5L0K9VaClJfRWHEQPlNTaZgpFA&oe=6998A07F\", \"permalink\": \"https://www.instagram.com/reel/DNFtAwCoaSR/\", \"timestamp\": \"2025-08-08T09:32:51+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/529970646_18379702828133216_394051656436980818_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFnn_9fWY9GXsnsclcCsqrUiU8Ibzue3q2JTwhvO57erUjQA53w0p9GLIdhDUDC8VMOtQTvcoz08YQSZ_RUdTLt&_nc_ohc=zdm5g8gN-t8Q7kNvwHTCiMq&_nc_oc=Adm7gq5ryqxEGhfVXW7uU1RGcyHcqjeoAP1m28D31cU9-67cfiv7OKG6-FisRFoZm28&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFSMryn-VDsxYlRuj4QriaYKOAjz1okGIuPpcwGdcBYmNZGgAw96mcFS97j9aIr2FHXnDElS6xhUA&oh=00_AfuuNPlRMWwFj7MB2DHxvmBIRek3bvC7HpOQhoK7sU55rQ&oe=69988B55\"}', '2026-02-01 21:46:54', '2026-02-16 11:00:03'),
(41, '18078212438497079', 'CAROUSEL_ALBUM', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/527217721_18379702576133216_6601749800350996437_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=Yg87MMJl8nwQ7kNvwFei1iZ&_nc_oc=AdntPGBtuM4u4j8tLkm9B3990Z9iw7RRCcG1QlfStf5eGDblBklO-JlJUOWEqYwJXS0&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=jn7RobNywLecD7pNLVCC_g&oh=00_AfsV2HMVj6NEcwE9WzVzB3dkXg8Z9nhwyb8vkD8TkPz1aQ&oe=6996A7DF', NULL, 'https://www.instagram.com/p/DNFsi5qIabK/', 'Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke', '2025-08-08 13:28:16', '2026-02-15 01:00:03', '{\"id\": \"18078212438497079\", \"caption\": \"Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/527217721_18379702576133216_6601749800350996437_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=Yg87MMJl8nwQ7kNvwFei1iZ&_nc_oc=AdntPGBtuM4u4j8tLkm9B3990Z9iw7RRCcG1QlfStf5eGDblBklO-JlJUOWEqYwJXS0&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=jn7RobNywLecD7pNLVCC_g&oh=00_AfsV2HMVj6NEcwE9WzVzB3dkXg8Z9nhwyb8vkD8TkPz1aQ&oe=6996A7DF\", \"permalink\": \"https://www.instagram.com/p/DNFsi5qIabK/\", \"timestamp\": \"2025-08-08T09:28:16+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-15 01:00:03'),
(42, '18040317053365259', 'IMAGE', 'https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/528986575_18379701832133216_3684892095102015900_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=110&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiRkVFRC5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=5nAcVq68pr0Q7kNvwEYlzDt&_nc_oc=Adl9DFZPWWFi7ZLiAI1FwF8Pza3epdp67iuuiLVMZsKNBMD34hELg18wtqlYqVmfsQo&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=mQPqvnayalq82IUA7rqVmQ&oh=00_Afvvwb2ydPZV8lEizLhmTuvvbYxV9qo2uDK83KNcJmXXuA&oe=6996A638', NULL, 'https://www.instagram.com/p/DNFscfYovv4/', 'Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke', '2025-08-08 13:27:23', '2026-02-15 00:00:03', '{\"id\": \"18040317053365259\", \"caption\": \"Stagepass AV is dedicated to producing exceptional events through innovative technology, stunning scenic design, and a skilled team committed to fulfilling our mission. For inquiries, please contact us at info@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.82787-15/528986575_18379701832133216_3684892095102015900_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=110&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiRkVFRC5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=5nAcVq68pr0Q7kNvwEYlzDt&_nc_oc=Adl9DFZPWWFi7ZLiAI1FwF8Pza3epdp67iuuiLVMZsKNBMD34hELg18wtqlYqVmfsQo&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=mQPqvnayalq82IUA7rqVmQ&oh=00_Afvvwb2ydPZV8lEizLhmTuvvbYxV9qo2uDK83KNcJmXXuA&oe=6996A638\", \"permalink\": \"https://www.instagram.com/p/DNFscfYovv4/\", \"timestamp\": \"2025-08-08T09:27:23+0000\", \"media_type\": \"IMAGE\"}', '2026-02-01 21:46:54', '2026-02-15 00:00:03'),
(43, '17987905106697296', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQPMFx2tkVPq0WdBQwXLax7TSLDHcKUxqI7A79eR70tVgP6aSuek9xZdcnHNJvfqKyniqCXsoGy_FmMPWM9Cf4aeXFvL-Yhf7s3-m6g.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=VUkXNlFkuScQ7kNvwEqT9ck&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuODQ4LmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5MDcxODcwMTUyMDYzNiwiYXNzZXRfYWdlX2RheXMiOjE5MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjM0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=498ea3f214662e6b&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8zNzQxNTdCNTE1MDcxMjc2MjY0NkNDMzQ0M0JFRTQ5Q192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMjU2MDY1ODE5MDg3ODgxXzU2NTU5ODg1NTcxNzcxMDMwMzMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJvibxoHGqa4GFQIoAkMzLBdAQV--dsi0ORgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=mQPqvnayalq82IUA7rqVmQ&edm=AM6HXa8EAAAA&_nc_zt=28&oh=00_AfvqzXbX27tZlTmVQYtLNmXcQ1D-gaWeRtsQm9aV2j9Dvw&oe=69929059', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/528713588_1279052197282213_8213111080186743024_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=S93KUG3oWJMQ7kNvwHOgFf2&_nc_oc=AdkdY_c3wVDNQnMLIDeAle6F7r2K6SDt0d6HLITv-wfV4kOwWmHcHaGtJ3ubaBK5Vaw&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=mQPqvnayalq82IUA7rqVmQ&_nc_tpa=Q5bMBQGVoH7Qk6UrWnRiNQu8FI2FxPEjgYZ1tHRTnk5c8TpVbYLs5JVBlAt93ieyZL3QSDU2DENPhPhiFQ&oh=00_AfsV_0RMUYzncICJpCNG1BKpEpAEL8C2H-eWz8y17opzqw&oe=69968043', 'https://www.instagram.com/reel/DNFnB4TA3jN/', '@safaricomplc_ Agent awards fully powered by @stagepassav', '2025-08-08 12:40:30', '2026-02-15 00:00:03', '{\"id\": \"17987905106697296\", \"caption\": \"@safaricomplc_ Agent awards fully powered by @stagepassav\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQPMFx2tkVPq0WdBQwXLax7TSLDHcKUxqI7A79eR70tVgP6aSuek9xZdcnHNJvfqKyniqCXsoGy_FmMPWM9Cf4aeXFvL-Yhf7s3-m6g.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=VUkXNlFkuScQ7kNvwEqT9ck&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuODQ4LmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5MDcxODcwMTUyMDYzNiwiYXNzZXRfYWdlX2RheXMiOjE5MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjM0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=498ea3f214662e6b&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8zNzQxNTdCNTE1MDcxMjc2MjY0NkNDMzQ0M0JFRTQ5Q192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMjU2MDY1ODE5MDg3ODgxXzU2NTU5ODg1NTcxNzcxMDMwMzMubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJvibxoHGqa4GFQIoAkMzLBdAQV--dsi0ORgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=mQPqvnayalq82IUA7rqVmQ&edm=AM6HXa8EAAAA&_nc_zt=28&oh=00_AfvqzXbX27tZlTmVQYtLNmXcQ1D-gaWeRtsQm9aV2j9Dvw&oe=69929059\", \"permalink\": \"https://www.instagram.com/reel/DNFnB4TA3jN/\", \"timestamp\": \"2025-08-08T08:40:30+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/528713588_1279052197282213_8213111080186743024_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=S93KUG3oWJMQ7kNvwHOgFf2&_nc_oc=AdkdY_c3wVDNQnMLIDeAle6F7r2K6SDt0d6HLITv-wfV4kOwWmHcHaGtJ3ubaBK5Vaw&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=mQPqvnayalq82IUA7rqVmQ&_nc_tpa=Q5bMBQGVoH7Qk6UrWnRiNQu8FI2FxPEjgYZ1tHRTnk5c8TpVbYLs5JVBlAt93ieyZL3QSDU2DENPhPhiFQ&oh=00_AfsV_0RMUYzncICJpCNG1BKpEpAEL8C2H-eWz8y17opzqw&oe=69968043\"}', '2026-02-01 21:46:54', '2026-02-15 00:00:03'),
(44, '17940061212029311', 'CAROUSEL_ALBUM', 'https://scontent-iad3-1.cdninstagram.com/v/t51.82787-15/529013689_18379697413133216_5749886663935950791_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=m8r-xS6uR_QQ7kNvwEPFdYe&_nc_oc=Adm2eDad-Zt2CMDdhTV7r6eEk4mUJdwSQR-rrAD7tNloDqXwS5EMtEJ1gsXocEXg-WU&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfuARezpurusCBHj-lLX9yeyZvjKOf7oj8_0-OG5GNto-g&oe=69856EDF', NULL, 'https://www.instagram.com/p/DNFmpBcgiXq/', '@safaricomplc_ Agent awards fully powered by @stagepassav', '2025-08-08 12:36:40', '2026-02-01 21:49:16', '{\"id\": \"17940061212029311\", \"caption\": \"@safaricomplc_ Agent awards fully powered by @stagepassav\", \"media_url\": \"https://scontent-iad3-1.cdninstagram.com/v/t51.82787-15/529013689_18379697413133216_5749886663935950791_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=104&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=m8r-xS6uR_QQ7kNvwEPFdYe&_nc_oc=Adm2eDad-Zt2CMDdhTV7r6eEk4mUJdwSQR-rrAD7tNloDqXwS5EMtEJ1gsXocEXg-WU&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfuARezpurusCBHj-lLX9yeyZvjKOf7oj8_0-OG5GNto-g&oe=69856EDF\", \"permalink\": \"https://www.instagram.com/p/DNFmpBcgiXq/\", \"timestamp\": \"2025-08-08T08:36:40+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(45, '18040398776360197', 'VIDEO', 'https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m367/AQNQAVW3BxxnIdVv8j_NsrQxPygqEQjAOD9PN1BkqnA9nqS1UJ8E0sEjbcegJXhx8PtysNkApc0eRHlq90xJb2aKyhBQHmV6oKsSIkQ.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=wNVblt1CGRAQ7kNvwG10dI8&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MjAxMzM0MTM3OTQwNDA1NSwiYXNzZXRfYWdlX2RheXMiOjE3NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=37d36174e4abe9dc&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC85QzQ1RjUzOEI0OUY3OUE3RkFFREI4RkEzN0FFOTg5Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xNzgyNzkzODUyMzQ3Mzk1XzI4NDEyMTEyODIwNjMzNzE3ODYubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJq6E2Zvyx5MHFQIoAkMzLBdALXdLxqfvnhgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&oh=00_AfuenQ8oxF87N0k-e1FFXl0BMMG4rJR6a3e41wFmqW5XNw&oe=69854C12', 'https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/530081015_1089635479375713_5103460694881553791_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=kxDFYCL-eOkQ7kNvwEw9AZN&_nc_oc=AdlhrxObzRwzkAxYD9DELVsK3bRSq5Qp0SeeX8VOcDvaps3oCoOVE6OhaHZWrGrJ9go&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_Afu8iPy951w-udtSq2gQ_Vc3vxLYeS046Qwoe-M_EGsdKQ&oe=69856895', 'https://www.instagram.com/reel/DNFmgcAgbKe/', '@safaricomplc_ Agent awards fully powered by @stagepassav', '2025-08-08 12:35:49', '2026-02-01 21:49:16', '{\"id\": \"18040398776360197\", \"caption\": \"@safaricomplc_ Agent awards fully powered by @stagepassav\", \"media_url\": \"https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m367/AQNQAVW3BxxnIdVv8j_NsrQxPygqEQjAOD9PN1BkqnA9nqS1UJ8E0sEjbcegJXhx8PtysNkApc0eRHlq90xJb2aKyhBQHmV6oKsSIkQ.mp4?_nc_cat=105&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=wNVblt1CGRAQ7kNvwG10dI8&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MjAxMzM0MTM3OTQwNDA1NSwiYXNzZXRfYWdlX2RheXMiOjE3NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjE0LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=37d36174e4abe9dc&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC85QzQ1RjUzOEI0OUY3OUE3RkFFREI4RkEzN0FFOTg5Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xNzgyNzkzODUyMzQ3Mzk1XzI4NDEyMTEyODIwNjMzNzE3ODYubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJq6E2Zvyx5MHFQIoAkMzLBdALXdLxqfvnhgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&oh=00_AfuenQ8oxF87N0k-e1FFXl0BMMG4rJR6a3e41wFmqW5XNw&oe=69854C12\", \"permalink\": \"https://www.instagram.com/reel/DNFmgcAgbKe/\", \"timestamp\": \"2025-08-08T08:35:49+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/530081015_1089635479375713_5103460694881553791_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=kxDFYCL-eOkQ7kNvwEw9AZN&_nc_oc=AdlhrxObzRwzkAxYD9DELVsK3bRSq5Qp0SeeX8VOcDvaps3oCoOVE6OhaHZWrGrJ9go&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_Afu8iPy951w-udtSq2gQ_Vc3vxLYeS046Qwoe-M_EGsdKQ&oe=69856895\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(46, '18021997994736249', 'VIDEO', 'https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m86/AQOZxS3dX5s7G_diIzZ6Bg7_DF8SdiIbX69Aa8WQYwMeWrFSecXNzppmYNnW9jni4r7njd6fHHCRiNg8S5posQMJu_jUgqqLrrJX1Aw.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=YGySIHe__hcQ7kNvwFogFvO&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MjE0OTI5NTMxODgxNTYxMiwiYXNzZXRfYWdlX2RheXMiOjE3NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjEyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=dc51cedec7572f6d&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9BODRCMzVFRDE2MTVGOTA1MEQxQ0QwMjYyOUYzRDhBQl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83MzQ3NDk2NjYzMTYzMzJfNjgxMjc0MTY3NTY5NzI3Mjk5My5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm-M32_7mx0QcVAigCQzMsF0ApIcrAgxJvGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&oh=00_Afs4YiYIYnQHBODOO8FPmWkIQkgbz_D8rx8El8F_dasYkQ&oe=698150B1', 'https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/529477765_1825049708075685_6616134315707135326_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=y7E9MJJV82AQ7kNvwG8j7GQ&_nc_oc=AdlpcU_GgO9z_pFhNIHe_WtQOCxchz-Jog8ha5xeHReFL2Cj9SwILx9ftIwI-Lxntt0&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfsTLzaRqNZHiT97jwheMzBcQnHWCcQBLfsdvFmXg3wixA&oe=69856862', 'https://www.instagram.com/reel/DNFmVd4AqSk/', '@safaricomplc_ Agent awards fully powered by @stagepassav', '2025-08-08 12:34:26', '2026-02-01 21:49:16', '{\"id\": \"18021997994736249\", \"caption\": \"@safaricomplc_ Agent awards fully powered by @stagepassav\", \"media_url\": \"https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m86/AQOZxS3dX5s7G_diIzZ6Bg7_DF8SdiIbX69Aa8WQYwMeWrFSecXNzppmYNnW9jni4r7njd6fHHCRiNg8S5posQMJu_jUgqqLrrJX1Aw.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=YGySIHe__hcQ7kNvwFogFvO&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MjE0OTI5NTMxODgxNTYxMiwiYXNzZXRfYWdlX2RheXMiOjE3NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjEyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=dc51cedec7572f6d&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9BODRCMzVFRDE2MTVGOTA1MEQxQ0QwMjYyOUYzRDhBQl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83MzQ3NDk2NjYzMTYzMzJfNjgxMjc0MTY3NTY5NzI3Mjk5My5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm-M32_7mx0QcVAigCQzMsF0ApIcrAgxJvGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&oh=00_Afs4YiYIYnQHBODOO8FPmWkIQkgbz_D8rx8El8F_dasYkQ&oe=698150B1\", \"permalink\": \"https://www.instagram.com/reel/DNFmVd4AqSk/\", \"timestamp\": \"2025-08-08T08:34:26+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/529477765_1825049708075685_6616134315707135326_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=y7E9MJJV82AQ7kNvwG8j7GQ&_nc_oc=AdlpcU_GgO9z_pFhNIHe_WtQOCxchz-Jog8ha5xeHReFL2Cj9SwILx9ftIwI-Lxntt0&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfsTLzaRqNZHiT97jwheMzBcQnHWCcQBLfsdvFmXg3wixA&oe=69856862\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(47, '18053651147159078', 'VIDEO', 'https://scontent-iad3-1.cdninstagram.com/o1/v/t2/f2/m86/AQOpQtEWT2KX9Liaa_qfeOEtargBBvDGuI6Jp5h5NEjIvhrPOvgYutUk7G35Rxh1uSrnHjh2ytUJwqT5vHMyxliyESPPLRpPmVdeTX0.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-iad3-1.cdninstagram.com&_nc_ohc=ohncma2tp2cQ7kNvwGxYecO&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTU5MDE1NjMzMjM4OTc3OCwiYXNzZXRfYWdlX2RheXMiOjE3NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjExLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=32a6d897d96df8a0&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9BRjRDQzZBRjg2MTE0MDBBQTkwOTM5MDgzNUNCN0M4Ml92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83NTcyNTQ0MTcwMzg1NzdfNDAxMzE4NzQwMDU4MTM4ODU3NC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmpNai9aOP0wUVAigCQzMsF0Anu2RaHKwIGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&oh=00_Aftdubuetc8bEHxaUzqbKTkMMhFWOira3l5KwnN5LFgcqw&oe=698160D3', 'https://scontent-iad3-2.cdninstagram.com/v/t51.71878-15/528295042_758800866554002_1019898633767805619_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=liRNm7EKr2MQ7kNvwF78oXd&_nc_oc=AdlGSrQlBHCFjLUccKRs1SrO5bXsN59NoLBW-inGEBmKoByNpw4uPrpeXep69EJ6o0E&_nc_zt=23&_nc_ht=scontent-iad3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfsMoOxEvJsvB3Ic4gNvK6ZFWWE1jV7iR3yMGBMwjUwz-Q&oe=698561D8', 'https://www.instagram.com/reel/DNFmIvSgQGi/', '@safaricomplc_  Agent awards fully powered by @stagepassav', '2025-08-08 12:33:19', '2026-02-01 21:49:16', '{\"id\": \"18053651147159078\", \"caption\": \"@safaricomplc_  Agent awards fully powered by @stagepassav\", \"media_url\": \"https://scontent-iad3-1.cdninstagram.com/o1/v/t2/f2/m86/AQOpQtEWT2KX9Liaa_qfeOEtargBBvDGuI6Jp5h5NEjIvhrPOvgYutUk7G35Rxh1uSrnHjh2ytUJwqT5vHMyxliyESPPLRpPmVdeTX0.mp4?_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-iad3-1.cdninstagram.com&_nc_ohc=ohncma2tp2cQ7kNvwGxYecO&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTU5MDE1NjMzMjM4OTc3OCwiYXNzZXRfYWdlX2RheXMiOjE3NywidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjExLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=32a6d897d96df8a0&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9BRjRDQzZBRjg2MTE0MDBBQTkwOTM5MDgzNUNCN0M4Ml92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83NTcyNTQ0MTcwMzg1NzdfNDAxMzE4NzQwMDU4MTM4ODU3NC5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAmpNai9aOP0wUVAigCQzMsF0Anu2RaHKwIGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&oh=00_Aftdubuetc8bEHxaUzqbKTkMMhFWOira3l5KwnN5LFgcqw&oe=698160D3\", \"permalink\": \"https://www.instagram.com/reel/DNFmIvSgQGi/\", \"timestamp\": \"2025-08-08T08:33:19+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-iad3-2.cdninstagram.com/v/t51.71878-15/528295042_758800866554002_1019898633767805619_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=liRNm7EKr2MQ7kNvwF78oXd&_nc_oc=AdlGSrQlBHCFjLUccKRs1SrO5bXsN59NoLBW-inGEBmKoByNpw4uPrpeXep69EJ6o0E&_nc_zt=23&_nc_ht=scontent-iad3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfsMoOxEvJsvB3Ic4gNvK6ZFWWE1jV7iR3yMGBMwjUwz-Q&oe=698561D8\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(48, '17862249141448064', 'CAROUSEL_ALBUM', 'https://scontent-iad3-2.cdninstagram.com/v/t51.82787-15/527618222_18379391005133216_7995627188413817192_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=khN40SO5VW0Q7kNvwF-b-kL&_nc_oc=AdlxkyAm7TI8g1Yjv8l9Ku-pvp_oJkhyfieQen8nPL5w3e9mxSYbzDfN-IwoEoZIdbc&_nc_zt=23&_nc_ht=scontent-iad3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfvPIeFKijXXe9l7wf6cmG29Wx2c58QmbDQB_ACFukcrOQ&oe=69856690', NULL, 'https://www.instagram.com/p/DM-offBoHZk/', 'The Atlas 2025 exclusive 2-day conference was flawlessly supported by #stagepassav.\nRest assured, our team’s proficiency and top-notch gear are more than capable of fulfilling all your event requirements.\n\nFor further inquiries or to deliberate about your upcoming event, please do not hesitate to contact us at info@stagepass.co.ke.', '2025-08-05 19:38:10', '2026-02-01 21:49:16', '{\"id\": \"17862249141448064\", \"caption\": \"The Atlas 2025 exclusive 2-day conference was flawlessly supported by #stagepassav.\\nRest assured, our team’s proficiency and top-notch gear are more than capable of fulfilling all your event requirements.\\n\\nFor further inquiries or to deliberate about your upcoming event, please do not hesitate to contact us at info@stagepass.co.ke.\", \"media_url\": \"https://scontent-iad3-2.cdninstagram.com/v/t51.82787-15/527618222_18379391005133216_7995627188413817192_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=khN40SO5VW0Q7kNvwF-b-kL&_nc_oc=AdlxkyAm7TI8g1Yjv8l9Ku-pvp_oJkhyfieQen8nPL5w3e9mxSYbzDfN-IwoEoZIdbc&_nc_zt=23&_nc_ht=scontent-iad3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AfvPIeFKijXXe9l7wf6cmG29Wx2c58QmbDQB_ACFukcrOQ&oe=69856690\", \"permalink\": \"https://www.instagram.com/p/DM-offBoHZk/\", \"timestamp\": \"2025-08-05T15:38:10+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(49, '18065556773193700', 'VIDEO', 'https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m86/AQNw9sRKmOu8n-I_YH4tk1fvyAEkphPRy6ujnuZy63BZsslUgOWX51wLV9z8BBEBda-X7hgmR2UNAtPOO7Ed2Vzyx-FG82vbgDTciDA.mp4?_nc_cat=111&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=hMFOKllFW20Q7kNvwGLlePb&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjMxODI2NDMyMzUyMDc1OTYsImFzc2V0X2FnZV9kYXlzIjoxODAsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoxOSwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=e9aa5098933aa268&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FMTQ4QTk0OUJENDAyRUU4OUNFQTU5NDMyNDFEMDlBQl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMDI3NDQwMjM2MjY2MzM2Xzc2MTU3NzQ0NDM3MjY4Nzc3ODAubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJtjm2febpqcLFQIoAkMzLBdAMwAAAAAAABgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&oh=00_AftttuT1JW2coMktD_cUXhGbS4zHrD_fmrVUoro4DwXYng&oe=69815010', 'https://scontent-iad3-1.cdninstagram.com/v/t51.82787-15/527490014_18379390909133216_7446291284913696482_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=m4mOkyR5opYQ7kNvwHcSnE8&_nc_oc=Adms8MPshRvW6rCZfvs22L8hYillgTQVk_gfFV37Y_AVcuaRZEJQItMU2pPmQ2p4fNc&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AftRuxWTiAKXSOz3aLREE-jUvDWbXrIoNp_GnPXlF8VlfA&oe=698569AF', 'https://www.instagram.com/reel/DM-oR1CoMkN/', 'The Atlas 2025 exclusive 2-day conference was flawlessly supported by #stagepassav.\nRest assured, our team’s proficiency and top-notch gear are more than capable of fulfilling all your event requirements.\n\nFor further inquiries or to deliberate about your upcoming event, please do not hesitate to contact us at info@stagepass.co.ke.', '2025-08-05 19:36:58', '2026-02-01 21:49:16', '{\"id\": \"18065556773193700\", \"caption\": \"The Atlas 2025 exclusive 2-day conference was flawlessly supported by #stagepassav.\\nRest assured, our team’s proficiency and top-notch gear are more than capable of fulfilling all your event requirements.\\n\\nFor further inquiries or to deliberate about your upcoming event, please do not hesitate to contact us at info@stagepass.co.ke.\", \"media_url\": \"https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m86/AQNw9sRKmOu8n-I_YH4tk1fvyAEkphPRy6ujnuZy63BZsslUgOWX51wLV9z8BBEBda-X7hgmR2UNAtPOO7Ed2Vzyx-FG82vbgDTciDA.mp4?_nc_cat=111&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=hMFOKllFW20Q7kNvwGLlePb&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3OC5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjMxODI2NDMyMzUyMDc1OTYsImFzc2V0X2FnZV9kYXlzIjoxODAsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoxOSwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=e9aa5098933aa268&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FMTQ4QTk0OUJENDAyRUU4OUNFQTU5NDMyNDFEMDlBQl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYR2lnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8xMDI3NDQwMjM2MjY2MzM2Xzc2MTU3NzQ0NDM3MjY4Nzc3ODAubXA0FQICyAESACgAGAAbAogHdXNlX29pbAExEnByb2dyZXNzaXZlX3JlY2lwZQExFQAAJtjm2febpqcLFQIoAkMzLBdAMwAAAAAAABgSZGFzaF9iYXNlbGluZV8xX3YxEQB1_gdl5p0BAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&oh=00_AftttuT1JW2coMktD_cUXhGbS4zHrD_fmrVUoro4DwXYng&oe=69815010\", \"permalink\": \"https://www.instagram.com/reel/DM-oR1CoMkN/\", \"timestamp\": \"2025-08-05T15:36:58+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-iad3-1.cdninstagram.com/v/t51.82787-15/527490014_18379390909133216_7446291284913696482_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=m4mOkyR5opYQ7kNvwHcSnE8&_nc_oc=Adms8MPshRvW6rCZfvs22L8hYillgTQVk_gfFV37Y_AVcuaRZEJQItMU2pPmQ2p4fNc&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_AftRuxWTiAKXSOz3aLREE-jUvDWbXrIoNp_GnPXlF8VlfA&oe=698569AF\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(50, '18321985591227296', 'VIDEO', 'https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m367/AQNwygVb7G1Sa2XvWblGvY_FjC3IoGpzUCDhnhzcfWQzsqVM_1bNCe7pc6TvMNzqC_hCc4RlE4C0bVKe83OEgaKGGh9F0Io8i8Ao3Qs.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=TcLxzVkxw6YQ7kNvwFi0hZD&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjc0NDc1MDI4MTgyMTYyNCwiYXNzZXRfYWdlX2RheXMiOjE4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjU2LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=3f12258a9178e03e&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC9GRjQ2MUFDNEYyNUVDNUUyMkZFNDU4QUQ3MkM2N0RBMV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83NDg2NjgxMjc3NTc4NDNfNDk2MzExNjU5NDg1NDY2MjczMS5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm8Lb0_5XW0gIVAigCQzMsF0BMEzMzMzMzGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&oh=00_Aftw-icmJoTdZqSsL3Oyv6ZM2Verey-4YZLVlfb1IuUOjg&oe=69854179', 'https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/527456439_1116096237088244_1824049689027141196_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=oupA4Uq9KY8Q7kNvwEg9Wsz&_nc_oc=AdnT8l7qezJ8wGIxV0jpGTOr1VjBOSpTWOCQpLi0N7ZBmKE_eBvzfrXD6PmBnn42Ux0&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_Afuq0GXvAWdhKTNARoGBQnBtm7nFDxBGWKnGgaTm8zzZUg&oe=6985550E', 'https://www.instagram.com/reel/DM-nzf-Im7g/', 'The Atlas 2025 exclusive 2-day conference was flawlessly supported by #stagepassav.\nRest assured, our team\'s proficiency and top-notch gear are more than capable of fulfilling all your event requirements.\n\nFor further inquiries or to deliberate about your upcoming event, please do not hesitate to contact us at info@stagepass.co.ke.', '2025-08-05 19:34:47', '2026-02-01 21:49:16', '{\"id\": \"18321985591227296\", \"caption\": \"The Atlas 2025 exclusive 2-day conference was flawlessly supported by #stagepassav.\\nRest assured, our team\'s proficiency and top-notch gear are more than capable of fulfilling all your event requirements.\\n\\nFor further inquiries or to deliberate about your upcoming event, please do not hesitate to contact us at info@stagepass.co.ke.\", \"media_url\": \"https://scontent-iad3-2.cdninstagram.com/o1/v/t2/f2/m367/AQNwygVb7G1Sa2XvWblGvY_FjC3IoGpzUCDhnhzcfWQzsqVM_1bNCe7pc6TvMNzqC_hCc4RlE4C0bVKe83OEgaKGGh9F0Io8i8Ao3Qs.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-iad3-2.cdninstagram.com&_nc_ohc=TcLxzVkxw6YQ7kNvwFi0hZD&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjc0NDc1MDI4MTgyMTYyNCwiYXNzZXRfYWdlX2RheXMiOjE4MCwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjU2LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&edm=AM6HXa8EAAAA&_nc_zt=28&vs=3f12258a9178e03e&_nc_vs=HBksFQIYQGlnX2VwaGVtZXJhbC9GRjQ2MUFDNEYyNUVDNUUyMkZFNDU4QUQ3MkM2N0RBMV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYRmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC83NDg2NjgxMjc3NTc4NDNfNDk2MzExNjU5NDg1NDY2MjczMS5tcDQVAgLIARIAKAAYABsCiAd1c2Vfb2lsATEScHJvZ3Jlc3NpdmVfcmVjaXBlATEVAAAm8Lb0_5XW0gIVAigCQzMsF0BMEzMzMzMzGBJkYXNoX2Jhc2VsaW5lXzFfdjERAHX-B2XmnQEA&oh=00_Aftw-icmJoTdZqSsL3Oyv6ZM2Verey-4YZLVlfb1IuUOjg&oe=69854179\", \"permalink\": \"https://www.instagram.com/reel/DM-nzf-Im7g/\", \"timestamp\": \"2025-08-05T15:34:47+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-iad3-1.cdninstagram.com/v/t51.71878-15/527456439_1116096237088244_1824049689027141196_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=oupA4Uq9KY8Q7kNvwEg9Wsz&_nc_oc=AdnT8l7qezJ8wGIxV0jpGTOr1VjBOSpTWOCQpLi0N7ZBmKE_eBvzfrXD6PmBnn42Ux0&_nc_zt=23&_nc_ht=scontent-iad3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=Cv1sBsBD5Cl0_nAYkVxfOw&oh=00_Afuq0GXvAWdhKTNARoGBQnBtm7nFDxBGWKnGgaTm8zzZUg&oe=6985550E\"}', '2026-02-01 21:46:54', '2026-02-01 21:49:16'),
(52, '17860683501527442', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMzOp9cpWp9cFiBEDTQ62RbOQAQthHHkjWLHyIrYEvBE5TiaxcqaKR83r87jFFByoOwpsAHjLTPwoYGIG-xZHDvsjKu-qlLV9wF90g.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=ObASKE1vEQ8Q7kNvwGAb9n_&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuODQ4LmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDcwNzc5MDAxMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxMiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjIyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=66aace5bd49dd817&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yRDQ5NDlGMjdFODZDNDkxNUFDNjQ3QUI5NjI4RDE5Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzg0NEFENUMzNzdBNkMxQkNBNEQwRDBDMDk4RDkxNUE2X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOmO-vtrHhPxUCKAJDMywXQDa4UeuFHrgYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_eui2=AeEsjhfTnyAKvTvaXpUuue3-5rJtVMkIrVrmsm1UyQitWl8xoMALKCekMpbKK5f1Hdd5CrnKtvpt33a7aDoYefCz&oh=00_Aful-pWqKVJNsoCCSWmx7UqRnxkD8jVABX_gmoUJvpjvjQ&oe=6994A605', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/626555404_25330495973300360_6970736756535029162_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHbzko7gV5AVdDNobthWs3hQpESaZx7ZwlCkRJpnHtnCX7iL25TKJbNVIt9imdr4E4d5iroE3S6KkjCwWA8sznR&_nc_ohc=2jKE7x4uEBYQ7kNvwHmd_N_&_nc_oc=Adn8TznAR5IMIwwtnPSzTXbHVtRwetuItimPMmEvvewt8tbeWFCWLAmnRcMmd0mnqRc&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQG5du-WG5oHU_cQ1mBmiPm9I-XURFIjOz_GyYzDcmYhCQhw-z3yB_3qhsBUQRxQGcBBRNY1UgHoGg&oh=00_AftgdeKBt7qu2xzuFt87nBurk5gxLrTZYLO0OxiVIdEVOA&oe=69988D31', 'https://www.instagram.com/reel/DUSS0jMDTqY/', 'From bold photowalls setups to striking main stage design, fabrication, branding, and flawless audiovisual production — Stagepass AV delivers complete event experiences from start to finish.\n\nWe were proud to bring this vision to life with @visa_kenya , creating a space where brand, technology, and creativity came together seamlessly.\n\nGot an event coming up? Let’s make it unforgettable:\nInfo@stagepass.co.ke\n\n#StagepassAV #EventProduction #Audiovisual #StageDesign #BrandExperience CorporateEvents', '2026-02-03 11:33:41', '2026-02-16 11:00:03', '{\"id\": \"17860683501527442\", \"caption\": \"From bold photowalls setups to striking main stage design, fabrication, branding, and flawless audiovisual production — Stagepass AV delivers complete event experiences from start to finish.\\n\\nWe were proud to bring this vision to life with @visa_kenya , creating a space where brand, technology, and creativity came together seamlessly.\\n\\nGot an event coming up? Let’s make it unforgettable:\\nInfo@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #Audiovisual #StageDesign #BrandExperience CorporateEvents\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQMzOp9cpWp9cFiBEDTQ62RbOQAQthHHkjWLHyIrYEvBE5TiaxcqaKR83r87jFFByoOwpsAHjLTPwoYGIG-xZHDvsjKu-qlLV9wF90g.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=ObASKE1vEQ8Q7kNvwGAb9n_&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuODQ4LmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDcwNzc5MDAxMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxMiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjIyLCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=66aace5bd49dd817&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC8yRDQ5NDlGMjdFODZDNDkxNUFDNjQ3QUI5NjI4RDE5Rl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzg0NEFENUMzNzdBNkMxQkNBNEQwRDBDMDk4RDkxNUE2X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOmO-vtrHhPxUCKAJDMywXQDa4UeuFHrgYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_eui2=AeEsjhfTnyAKvTvaXpUuue3-5rJtVMkIrVrmsm1UyQitWl8xoMALKCekMpbKK5f1Hdd5CrnKtvpt33a7aDoYefCz&oh=00_Aful-pWqKVJNsoCCSWmx7UqRnxkD8jVABX_gmoUJvpjvjQ&oe=6994A605\", \"permalink\": \"https://www.instagram.com/reel/DUSS0jMDTqY/\", \"timestamp\": \"2026-02-03T06:33:41+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/626555404_25330495973300360_6970736756535029162_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHbzko7gV5AVdDNobthWs3hQpESaZx7ZwlCkRJpnHtnCX7iL25TKJbNVIt9imdr4E4d5iroE3S6KkjCwWA8sznR&_nc_ohc=2jKE7x4uEBYQ7kNvwHmd_N_&_nc_oc=Adn8TznAR5IMIwwtnPSzTXbHVtRwetuItimPMmEvvewt8tbeWFCWLAmnRcMmd0mnqRc&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQG5du-WG5oHU_cQ1mBmiPm9I-XURFIjOz_GyYzDcmYhCQhw-z3yB_3qhsBUQRxQGcBBRNY1UgHoGg&oh=00_AftgdeKBt7qu2xzuFt87nBurk5gxLrTZYLO0OxiVIdEVOA&oe=69988D31\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03'),
(53, '17962435416020470', 'CAROUSEL_ALBUM', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/627420956_18404496175133216_6532509236306043108_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=101&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHFyJxTPOc4EYJZhinRV2V051-uKzjV-VjnX64rONX5WEkObXR32LIxOUUGNItCLjFkIvwLIXfTZWlIEiCuGlKX&_nc_ohc=uGjmu-rgUBYQ7kNvwGDUO66&_nc_oc=Adn6F29l_Lsmj2vrgFVv_fMD-yxKrHOiHNWWoIloEbW-qQSf2yFU3IO5Y5JuANM2pSo&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvprM8nh_YZCEw4FfaRx8nMYW0neGasNx0IQ5OSBK1hJQ&oe=69989A1A', NULL, 'https://www.instagram.com/p/DUSShr8DYOO/', 'From bold photowalls setups to striking main stage design, fabrication, branding, and flawless audiovisual production — Stagepass AV delivers complete event experiences from start to finish.\n\nWe were proud to bring this vision to life with @visa_kenya , creating a space where brand, technology, and creativity came together seamlessly.\n\nGot an event coming up? Let’s make it unforgettable:\nInfo@stagepass.co.ke\n\n#StagepassAV #EventProduction #Audiovisual #StageDesign #BrandExperience CorporateEvents', '2026-02-03 11:30:48', '2026-02-16 11:00:03', '{\"id\": \"17962435416020470\", \"caption\": \"From bold photowalls setups to striking main stage design, fabrication, branding, and flawless audiovisual production — Stagepass AV delivers complete event experiences from start to finish.\\n\\nWe were proud to bring this vision to life with @visa_kenya , creating a space where brand, technology, and creativity came together seamlessly.\\n\\nGot an event coming up? Let’s make it unforgettable:\\nInfo@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #Audiovisual #StageDesign #BrandExperience CorporateEvents\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/627420956_18404496175133216_6532509236306043108_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=101&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeHFyJxTPOc4EYJZhinRV2V051-uKzjV-VjnX64rONX5WEkObXR32LIxOUUGNItCLjFkIvwLIXfTZWlIEiCuGlKX&_nc_ohc=uGjmu-rgUBYQ7kNvwGDUO66&_nc_oc=Adn6F29l_Lsmj2vrgFVv_fMD-yxKrHOiHNWWoIloEbW-qQSf2yFU3IO5Y5JuANM2pSo&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfvprM8nh_YZCEw4FfaRx8nMYW0neGasNx0IQ5OSBK1hJQ&oe=69989A1A\", \"permalink\": \"https://www.instagram.com/p/DUSShr8DYOO/\", \"timestamp\": \"2026-02-03T06:30:48+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03');
INSERT INTO `instagram_media` (`id`, `instagram_id`, `media_type`, `media_url`, `thumbnail_url`, `permalink`, `caption`, `posted_at`, `fetched_at`, `raw_payload`, `created_at`, `updated_at`) VALUES
(54, '17854635372574083', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQPUzAyCkLUJLRuGdeyTwm2g7Ei6us3APARwUr2fjSRHnrz3B1YIc73X9DL_CXAC5KDl3-jtgqRa4R7bhDk9TGS3xxkFuThwEcFVWC4.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=bL9RgdgCbc8Q7kNvwFwen5j&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNTc2LmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDcwNzczMTIxMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxMiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjI3LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=2a57ab0f6528135&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FOTQxMTVGODZBM0E0NDkxQUE2QkQ3NUY0ODI2RDk4M192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzE0NEFFQTQ4Rjc3QThENENCRjJENzMyMzUxQUZGQTg3X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO7I3_sbHhPxUCKAJDMywXQDuZmZmZmZoYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeGd-J0AX7d5KQWYH0kF1NBHU0f-mbALbL1TR_6ZsAtsvTkjmedSh2MJ0wTwcQoItSyWspVtt1xgZCIRYhQIvKaS&oh=00_AftJvlD30K1vun7f2p5HzNx0MWrZfBzz6ZdNDp35GrqWVQ&oe=6994779D', 'https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/625021599_894143393338421_5610479172936721980_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEm7ubxpVP7gG3jPKRh-RKCxPZ4Hbw6vO3E9ngdvDq87ZUMdFRto7mioANo02qLWPiULbPaFKEhLADCYFjnygRJ&_nc_ohc=y93tg-2n7QsQ7kNvwEt4oj3&_nc_oc=Adlu3J8ESzLka2Aff06dB9WCcsSFDNt1c0cj8K5-anzYOyvZnrObwy6ckoUthO6M6u8&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHQderf9EvadUW53vAQAeW_zb171gadb2jwOk5h8wd62d3iZKk5h3YoG8__G6cxeSSNH5QnSg0E6g&oh=00_AfufoIbHNEkjZVC90XcOxXt1Y9mq2dP68ODYfUJW8tZj8Q&oe=69988D8E', 'https://www.instagram.com/reel/DUSSDP0DcgG/', 'From bold photowalls setups to striking main stage design, fabrication, branding, and flawless audiovisual production — Stagepass AV delivers complete event experiences from start to finish.\n\nWe were proud to bring this vision to life with @visa_kenya , creating a space where brand, technology, and creativity came together seamlessly.\n\nGot an event coming up? Let’s make it unforgettable:\nInfo@stagepass.co.ke\n\n#StagepassAV #EventProduction #Audiovisual #StageDesign #BrandExperience CorporateEvents', '2026-02-03 11:28:34', '2026-02-16 11:00:03', '{\"id\": \"17854635372574083\", \"caption\": \"From bold photowalls setups to striking main stage design, fabrication, branding, and flawless audiovisual production — Stagepass AV delivers complete event experiences from start to finish.\\n\\nWe were proud to bring this vision to life with @visa_kenya , creating a space where brand, technology, and creativity came together seamlessly.\\n\\nGot an event coming up? Let’s make it unforgettable:\\nInfo@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #Audiovisual #StageDesign #BrandExperience CorporateEvents\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQPUzAyCkLUJLRuGdeyTwm2g7Ei6us3APARwUr2fjSRHnrz3B1YIc73X9DL_CXAC5KDl3-jtgqRa4R7bhDk9TGS3xxkFuThwEcFVWC4.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=bL9RgdgCbc8Q7kNvwFwen5j&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNTc2LmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDcwNzczMTIxMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxMiwidmlfdXNlY2FzZV9pZCI6MTAwOTksImR1cmF0aW9uX3MiOjI3LCJ1cmxnZW5fc291cmNlIjoid3d3In0%3D&ccb=17-1&vs=2a57ab0f6528135&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FOTQxMTVGODZBM0E0NDkxQUE2QkQ3NUY0ODI2RDk4M192aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzE0NEFFQTQ4Rjc3QThENENCRjJENzMyMzUxQUZGQTg3X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO7I3_sbHhPxUCKAJDMywXQDuZmZmZmZoYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeGd-J0AX7d5KQWYH0kF1NBHU0f-mbALbL1TR_6ZsAtsvTkjmedSh2MJ0wTwcQoItSyWspVtt1xgZCIRYhQIvKaS&oh=00_AftJvlD30K1vun7f2p5HzNx0MWrZfBzz6ZdNDp35GrqWVQ&oe=6994779D\", \"permalink\": \"https://www.instagram.com/reel/DUSSDP0DcgG/\", \"timestamp\": \"2026-02-03T06:28:34+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.71878-15/625021599_894143393338421_5610479172936721980_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeEm7ubxpVP7gG3jPKRh-RKCxPZ4Hbw6vO3E9ngdvDq87ZUMdFRto7mioANo02qLWPiULbPaFKEhLADCYFjnygRJ&_nc_ohc=y93tg-2n7QsQ7kNvwEt4oj3&_nc_oc=Adlu3J8ESzLka2Aff06dB9WCcsSFDNt1c0cj8K5-anzYOyvZnrObwy6ckoUthO6M6u8&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHQderf9EvadUW53vAQAeW_zb171gadb2jwOk5h8wd62d3iZKk5h3YoG8__G6cxeSSNH5QnSg0E6g&oh=00_AfufoIbHNEkjZVC90XcOxXt1Y9mq2dP68ODYfUJW8tZj8Q&oe=69988D8E\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03'),
(55, '18119574133588731', 'CAROUSEL_ALBUM', 'https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/627478725_18404360575133216_4690050124043307367_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeGC48StTlkaHfMDQ5EBQeN2P2TpPu48vYI_ZOk-7jy9grfsncfSgYPJD0bUrkfxHd8wWjzg4KXu28nQnkjeloqX&_nc_ohc=GHp0aAubLdcQ7kNvwGLCB7m&_nc_oc=Adm4fpa_p-XBTU5nFqtD724z6sA8stpxQnBYBcXJE8GJyK4zXMtdnsOq3_8blOKokLs&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_Afv3pEozMZquHPiYcQ-V-eb2Ss0ccfdIGYyQ653PCD3Elw&oe=69989F62', NULL, 'https://www.instagram.com/p/DUQuPx-DaD6/', 'Every event is a partnership. We listen, design, refine, and execute with a clear goal:\nto make your brand look powerful, polished, and unforgettable on stage.\n\nWhether it’s a global forum, executive summit, product launch, or awards gala — Stagepass ensures the production quality matches the importance of the moment.\n\n⸻\n\nStagepass Audio Visual\nYour trusted partner in  event production.\n\nContact us;\nInfo@stagepass.co.ke', '2026-02-02 20:54:32', '2026-02-16 11:00:03', '{\"id\": \"18119574133588731\", \"caption\": \"Every event is a partnership. We listen, design, refine, and execute with a clear goal:\\nto make your brand look powerful, polished, and unforgettable on stage.\\n\\nWhether it’s a global forum, executive summit, product launch, or awards gala — Stagepass ensures the production quality matches the importance of the moment.\\n\\n⸻\\n\\nStagepass Audio Visual\\nYour trusted partner in  event production.\\n\\nContact us;\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/v/t51.82787-15/627478725_18404360575133216_4690050124043307367_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=102&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeGC48StTlkaHfMDQ5EBQeN2P2TpPu48vYI_ZOk-7jy9grfsncfSgYPJD0bUrkfxHd8wWjzg4KXu28nQnkjeloqX&_nc_ohc=GHp0aAubLdcQ7kNvwGLCB7m&_nc_oc=Adm4fpa_p-XBTU5nFqtD724z6sA8stpxQnBYBcXJE8GJyK4zXMtdnsOq3_8blOKokLs&_nc_zt=23&_nc_ht=scontent-atl3-2.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_Afv3pEozMZquHPiYcQ-V-eb2Ss0ccfdIGYyQ653PCD3Elw&oe=69989F62\", \"permalink\": \"https://www.instagram.com/p/DUQuPx-DaD6/\", \"timestamp\": \"2026-02-02T15:54:32+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03'),
(56, '18555902509054372', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMzcQRbgHCoChc2VZtOJ06sUFFb6Ag4USssfIqBHm7BiR6wpqLuFgcEOG5n8poe82UJQa9xeQ-7Gsij7XjWKecEe6FXdbgBC-DB8vY.mp4?_nc_cat=107&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=2eshQOze_ssQ7kNvwFasmUs&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2OTc5MTY0MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTMsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyOCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=709bdd207adb72c&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FMzRCRTMyMzVGQzdDQUJBNEUwRUE4MDNFQjEzRTVBNl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzY4NDg5MjUyQkQ2MUZEQjVDQ0ZDQ0Q2NUNGMkMyRUEwX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO6PDd1qvhPxUCKAJDMywXQDxEGJN0vGoYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEBNGU_H2iYW_6hTbWKnC_A1JvAesJvkULUm8B6wm-RQiWoE8-v6NHwdVeeytJ6bOeBltLLa1CIJxo8qEHZnt2X&oh=00_AftnW-VthlgM18jr9XBnWAUmgftc1u2dcGixYDlhp4fsPA&oe=699494E4', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/626778116_1422068096289948_2815394194922477081_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHESy93PSrHm6VUHjjq9iFG285-Cr5T3O_bzn4KvlPc750Gjcihd_FYJsQIszqTzbHs8mu8zt1idVsu9GjtrZbk&_nc_ohc=wUqqc89uddcQ7kNvwF09mdf&_nc_oc=AdnoGsrYswUkPYjU2Q8SaP8gbkckxFdrvfBB5CxHMLMjEe0ERUB2BfkM6EbuJs0m2sg&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQF301dF0NygPoGaYgy3huFxEMz2uE8Iflk4H5C3Njo7T0Jr7mAlmRIhvWRfOfdHbJx2LHHaLAK55Q&oh=00_AfuNoogfqGrziwUu7qt2JTT2mcbhlj9bdvgk0nMrUL233A&oe=699897A9', 'https://www.instagram.com/reel/DUQtWikCLLp/', 'Every event is a partnership. We listen, design, refine, and execute with a clear goal:\nto make your brand look powerful, polished, and unforgettable on stage.\n\nWhether it’s a global forum, executive summit, product launch, or awards gala — Stagepass ensures the production quality matches the importance of the moment.\n\n⸻\n\nStagepass Audio Visual\nYour trusted partner in  event production.\n\nContact us;\nInfo@stagepass.co.ke', '2026-02-02 20:47:26', '2026-02-16 11:00:03', '{\"id\": \"18555902509054372\", \"caption\": \"Every event is a partnership. We listen, design, refine, and execute with a clear goal:\\nto make your brand look powerful, polished, and unforgettable on stage.\\n\\nWhether it’s a global forum, executive summit, product launch, or awards gala — Stagepass ensures the production quality matches the importance of the moment.\\n\\n⸻\\n\\nStagepass Audio Visual\\nYour trusted partner in  event production.\\n\\nContact us;\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQMzcQRbgHCoChc2VZtOJ06sUFFb6Ag4USssfIqBHm7BiR6wpqLuFgcEOG5n8poe82UJQa9xeQ-7Gsij7XjWKecEe6FXdbgBC-DB8vY.mp4?_nc_cat=107&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=2eshQOze_ssQ7kNvwFasmUs&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2OTc5MTY0MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTMsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyOCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=709bdd207adb72c&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC9FMzRCRTMyMzVGQzdDQUJBNEUwRUE4MDNFQjEzRTVBNl92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzY4NDg5MjUyQkQ2MUZEQjVDQ0ZDQ0Q2NUNGMkMyRUEwX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaO6PDd1qvhPxUCKAJDMywXQDxEGJN0vGoYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeEBNGU_H2iYW_6hTbWKnC_A1JvAesJvkULUm8B6wm-RQiWoE8-v6NHwdVeeytJ6bOeBltLLa1CIJxo8qEHZnt2X&oh=00_AftnW-VthlgM18jr9XBnWAUmgftc1u2dcGixYDlhp4fsPA&oe=699494E4\", \"permalink\": \"https://www.instagram.com/reel/DUQtWikCLLp/\", \"timestamp\": \"2026-02-02T15:47:26+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/626778116_1422068096289948_2815394194922477081_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeHESy93PSrHm6VUHjjq9iFG285-Cr5T3O_bzn4KvlPc750Gjcihd_FYJsQIszqTzbHs8mu8zt1idVsu9GjtrZbk&_nc_ohc=wUqqc89uddcQ7kNvwF09mdf&_nc_oc=AdnoGsrYswUkPYjU2Q8SaP8gbkckxFdrvfBB5CxHMLMjEe0ERUB2BfkM6EbuJs0m2sg&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQF301dF0NygPoGaYgy3huFxEMz2uE8Iflk4H5C3Njo7T0Jr7mAlmRIhvWRfOfdHbJx2LHHaLAK55Q&oh=00_AfuNoogfqGrziwUu7qt2JTT2mcbhlj9bdvgk0nMrUL233A&oe=699897A9\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03'),
(57, '18362070769166941', 'VIDEO', 'https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQNoqIY5JederpIfYRzIIiLivP-Z0zfR_LJ1PklfRFNUjlW-hcdKLaQIfi72oi5chufUlDwlgylVn1Gg_lOfOmTlKthdK5Sm_M5nibw.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=wBaD94IkmKAQ7kNvwFMWOmS&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2OTc4Njg3MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTMsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=d96ccfeeba173286&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84MjQyQTU2N0NENEYwQ0E4Q0I5QTVDMDg0NzBCRjU4MV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzNDNDgyOEMwRTdFOEU1RUZCQjNERUExNDEyMzlENzgyX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOo_2W06vhPxUCKAJDMywXQDTMzMzMzM0YEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeE257Z4uGmEZ9YqvHYzyZsR56RZBL3QPUXnpFkEvdA9Rd9wQCr6WqjblPMEJu-qBW9D_ZbEaizAKio9dsucrAcb&oh=00_Aft6NB8b1qlpT6PE1rUb5sZkJ0wjtC4q8GYo-HmN33y8ow&oe=6994A6B1', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/626263453_26814326838167211_3621821014473389471_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=110&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFm36-LQSWJBKmTnZ6s_PF8I-bi58zURoAj5uLnzNRGgOBHsO5urutyL4IGl9mYXcg_QR-vtCM7ET0H9jpNaSUM&_nc_ohc=KqyssThPQcUQ7kNvwH94I8y&_nc_oc=AdmqSWlAZU63D7MtqcoT4mKwX3DMNZGupMFssgDMAEg6am4yBEqTjAm6v4PTOY5cyo8&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFHrcnHazc3guwAGOJUJVc24-eDdrRxaH3UwAh-9tr1jTyNgOBfcGM9La0b4A5a_AmNWg3N1VsL3w&oh=00_AfuH8gg5aQQKWo7BdndC_MTHxR63iMvMTYdvaL6Nw2c-mQ&oe=69988ABE', 'https://www.instagram.com/reel/DUQtHwgiIKM/', 'Every event is a partnership. We listen, design, refine, and execute with a clear goal:\nto make your brand look powerful, polished, and unforgettable on stage.\n\nWhether it’s a global forum, executive summit, product launch, or awards gala — Stagepass ensures the production quality matches the importance of the moment.\n\n⸻\n\nStagepass Audio Visual\nYour trusted partner in  event production.\n\nContact us;\nInfo@stagepass.co.ke', '2026-02-02 20:46:00', '2026-02-16 11:00:03', '{\"id\": \"18362070769166941\", \"caption\": \"Every event is a partnership. We listen, design, refine, and execute with a clear goal:\\nto make your brand look powerful, polished, and unforgettable on stage.\\n\\nWhether it’s a global forum, executive summit, product launch, or awards gala — Stagepass ensures the production quality matches the importance of the moment.\\n\\n⸻\\n\\nStagepass Audio Visual\\nYour trusted partner in  event production.\\n\\nContact us;\\nInfo@stagepass.co.ke\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/o1/v/t2/f2/m86/AQNoqIY5JederpIfYRzIIiLivP-Z0zfR_LJ1PklfRFNUjlW-hcdKLaQIfi72oi5chufUlDwlgylVn1Gg_lOfOmTlKthdK5Sm_M5nibw.mp4?_nc_cat=100&_nc_sid=5e9851&_nc_ht=scontent-atl3-1.cdninstagram.com&_nc_ohc=wBaD94IkmKAQ7kNvwFMWOmS&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2OTc4Njg3MTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTMsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjoyMCwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=d96ccfeeba173286&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC84MjQyQTU2N0NENEYwQ0E4Q0I5QTVDMDg0NzBCRjU4MV92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzNDNDgyOEMwRTdFOEU1RUZCQjNERUExNDEyMzlENzgyX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOo_2W06vhPxUCKAJDMywXQDTMzMzMzM0YEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeE257Z4uGmEZ9YqvHYzyZsR56RZBL3QPUXnpFkEvdA9Rd9wQCr6WqjblPMEJu-qBW9D_ZbEaizAKio9dsucrAcb&oh=00_Aft6NB8b1qlpT6PE1rUb5sZkJ0wjtC4q8GYo-HmN33y8ow&oe=6994A6B1\", \"permalink\": \"https://www.instagram.com/reel/DUQtHwgiIKM/\", \"timestamp\": \"2026-02-02T15:46:00+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/626263453_26814326838167211_3621821014473389471_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=110&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFm36-LQSWJBKmTnZ6s_PF8I-bi58zURoAj5uLnzNRGgOBHsO5urutyL4IGl9mYXcg_QR-vtCM7ET0H9jpNaSUM&_nc_ohc=KqyssThPQcUQ7kNvwH94I8y&_nc_oc=AdmqSWlAZU63D7MtqcoT4mKwX3DMNZGupMFssgDMAEg6am4yBEqTjAm6v4PTOY5cyo8&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQFHrcnHazc3guwAGOJUJVc24-eDdrRxaH3UwAh-9tr1jTyNgOBfcGM9La0b4A5a_AmNWg3N1VsL3w&oh=00_AfuH8gg5aQQKWo7BdndC_MTHxR63iMvMTYdvaL6Nw2c-mQ&oe=69988ABE\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03'),
(58, '17887700742426480', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQPCQqTK1ajxslh2KeZgDpj1ak0eaEFY9zaOEPdxpyjOzx92dHdk3TgMrovB06j3KvJ_d_jZjarP5BouId9CeyFHWuOEJK0hFF0OO-g.mp4?_nc_cat=109&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=V7bztMf35JQQ7kNvwFY-DEe&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2OTAwNTkxMTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTQsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo1MiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=f810f045deb808d9&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC80NjQ2Q0ZGNzYyQTdFNkRFQjFBMTdGRURBQUMxMUVCNF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0Q1NENFOEM3QzE5QjhBMzhFOTFFOUVFNDE4M0JGMUIxX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOk-qojafhPxUCKAJDMywXQEo3bItDlYEYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHZXbROJ1kXAGaY34bc7h-fWZRb2LxLjrdZlFvYvEuOt1etL0IPRcpHgKHwPftICW_wruaV-Ah86GvDYFxJiGi1&oh=00_AfvEBZCTLXFzsqpMv-Q6wAi9fIOqDDmKL_hY2S-iPNQGVg&oe=699488C6', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/624998042_1413188353916922_2737322838464475552_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFx4QNrb5KMWc2R52QnNCDL4Wh8mKQNKHLhaHyYpA0ocmf5W_ZcIN6IXIrpobfLS8m0EMkpv7kg-bX2r9MvkheM&_nc_ohc=lSefT7YZFBIQ7kNvwEoRQ5v&_nc_oc=AdlHQU7pJChl4Ht8hNJXvVa2K85Z-G5Z5sfM0n6I_SpZj0V3PO9adn7TQPeQ4bmkpck&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQG6vISmqPIAGt8ntPOUSJEKQkTcZdqCq6PgRFkiyBVP2v3fhmjzB4CoaLpTRbQnDiBchRKthXdClw&oh=00_AftoizGWMPaWPi5SSLo4NEFijA5qoNiZ6_BugG4EjZvu0A&oe=6998948D', 'https://www.instagram.com/reel/DUPc6wYjcf6/', 'SAFARICOM CEO AWARDS \n\nNow this is how you command a stage. 🔥🎤\n\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\n\nAt Stagepass Audio Visual, we don’t just build stages…\nwe engineer experiences that captivate every seat in the room.\n\nMassive LED storytelling ✔️\nDynamic lighting atmosphere ✔️\nSeamless technical execution ✔️\nAudience impact? Guaranteed.\n\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\n\nReady to transform your next event into a full-scale production experience?\nLet’s make magic happen. ✨\n\n📩 info@stagepass.co.ke\n\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision', '2026-02-02 09:06:00', '2026-02-16 11:00:03', '{\"id\": \"17887700742426480\", \"caption\": \"SAFARICOM CEO AWARDS \\n\\nNow this is how you command a stage. 🔥🎤\\n\\nFrom concept to showtime, this setup says it all — bold visuals, immersive lighting, and precision technical delivery.\\n\\nAt Stagepass Audio Visual, we don’t just build stages…\\nwe engineer experiences that captivate every seat in the room.\\n\\nMassive LED storytelling ✔️\\nDynamic lighting atmosphere ✔️\\nSeamless technical execution ✔️\\nAudience impact? Guaranteed.\\n\\nProud to power moments where creativity meets technical excellence — and the results speak louder than words.\\n\\nReady to transform your next event into a full-scale production experience?\\nLet’s make magic happen. ✨\\n\\n📩 info@stagepass.co.ke\\n\\n#StagepassAV #EventProduction #LiveExperience #AVExcellence #CreativeTechnology TechnicalPrecision\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t2/f2/m86/AQPCQqTK1ajxslh2KeZgDpj1ak0eaEFY9zaOEPdxpyjOzx92dHdk3TgMrovB06j3KvJ_d_jZjarP5BouId9CeyFHWuOEJK0hFF0OO-g.mp4?_nc_cat=109&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=V7bztMf35JQQ7kNvwFY-DEe&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuMTI3Ni5kYXNoX2Jhc2VsaW5lXzFfdjEiLCJ4cHZfYXNzZXRfaWQiOjE3OTQ2OTAwNTkxMTAxMTI3LCJhc3NldF9hZ2VfZGF5cyI6MTQsInZpX3VzZWNhc2VfaWQiOjEwMDk5LCJkdXJhdGlvbl9zIjo1MiwidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&vs=f810f045deb808d9&_nc_vs=HBksFQIYUmlnX3hwdl9yZWVsc19wZXJtYW5lbnRfc3JfcHJvZC80NjQ2Q0ZGNzYyQTdFNkRFQjFBMTdGRURBQUMxMUVCNF92aWRlb19kYXNoaW5pdC5tcDQVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyL0Q1NENFOEM3QzE5QjhBMzhFOTFFOUVFNDE4M0JGMUIxX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOk-qojafhPxUCKAJDMywXQEo3bItDlYEYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&_nc_eui2=AeHZXbROJ1kXAGaY34bc7h-fWZRb2LxLjrdZlFvYvEuOt1etL0IPRcpHgKHwPftICW_wruaV-Ah86GvDYFxJiGi1&oh=00_AfvEBZCTLXFzsqpMv-Q6wAi9fIOqDDmKL_hY2S-iPNQGVg&oe=699488C6\", \"permalink\": \"https://www.instagram.com/reel/DUPc6wYjcf6/\", \"timestamp\": \"2026-02-02T04:06:00+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/624998042_1413188353916922_2737322838464475552_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFx4QNrb5KMWc2R52QnNCDL4Wh8mKQNKHLhaHyYpA0ocmf5W_ZcIN6IXIrpobfLS8m0EMkpv7kg-bX2r9MvkheM&_nc_ohc=lSefT7YZFBIQ7kNvwEoRQ5v&_nc_oc=AdlHQU7pJChl4Ht8hNJXvVa2K85Z-G5Z5sfM0n6I_SpZj0V3PO9adn7TQPeQ4bmkpck&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQG6vISmqPIAGt8ntPOUSJEKQkTcZdqCq6PgRFkiyBVP2v3fhmjzB4CoaLpTRbQnDiBchRKthXdClw&oh=00_AftoizGWMPaWPi5SSLo4NEFijA5qoNiZ6_BugG4EjZvu0A&oe=6998948D\"}', '2026-02-04 11:25:35', '2026-02-16 11:00:03'),
(11274, '18210899317320837', 'CAROUSEL_ALBUM', 'https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/633740296_18407114821133216_5967676850850086313_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeEylbgtFCAvF3UCWb-dEKBzdXdaKWm-eZp1d1opab55mlx9UFrEQBrlZwnfLiPixQ0LEDzJs-mREkV3B2M2eUmT&_nc_ohc=xeY5BcjqcX4Q7kNvwESFVoi&_nc_oc=Adm5lvuZP_gTWEduGNglJ1olJWgPehORmm80NJTJfv5QKcE7FT6ud8znkxIdKnmdfU4&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfufeXohiWrlC6KH1Ee7kfgJBvQPGO-U2N-rrGKosjlkVg&oe=6998961E', NULL, 'https://www.instagram.com/p/DUwDvTqjfkp/', '#stagepassav your end-to-end events partner of choice.', '2026-02-15 00:58:48', '2026-02-16 11:00:03', '{\"id\": \"18210899317320837\", \"caption\": \"#stagepassav your end-to-end events partner of choice.\", \"media_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.82787-15/633740296_18407114821133216_5967676850850086313_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=100&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_eui2=AeEylbgtFCAvF3UCWb-dEKBzdXdaKWm-eZp1d1opab55mlx9UFrEQBrlZwnfLiPixQ0LEDzJs-mREkV3B2M2eUmT&_nc_ohc=xeY5BcjqcX4Q7kNvwESFVoi&_nc_oc=Adm5lvuZP_gTWEduGNglJ1olJWgPehORmm80NJTJfv5QKcE7FT6ud8znkxIdKnmdfU4&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&oh=00_AfufeXohiWrlC6KH1Ee7kfgJBvQPGO-U2N-rrGKosjlkVg&oe=6998961E\", \"permalink\": \"https://www.instagram.com/p/DUwDvTqjfkp/\", \"timestamp\": \"2026-02-14T19:58:48+0000\", \"media_type\": \"CAROUSEL_ALBUM\"}', '2026-02-15 01:00:03', '2026-02-16 11:00:03'),
(11275, '18077495648071719', 'VIDEO', 'https://scontent-atl3-3.cdninstagram.com/o1/v/t16/f2/m69/AQOaHdDRHFcnkkm-x4qtwbHMsPhvKCgc0OD3Ku_kMlhHDHz9UrFAFx03OvDCFlQQWyVBiC_MTYPWd_CVMVMh9Keb.mp4?strext=1&_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=E4wdaJeCW3YQ7kNvwEUr4BM&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDkxNDIzNDExMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxLCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6MTUsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=9404829316145b5f&_nc_vs=HBksFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HQWJibENVSVJUdTJIaE5jQUtaejFocUVJUE42YnNwVEFRQUYVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzlGNDFGMTM1Njk2RjZEOUY1MUFCNzkzOUU0MDlBOEFFX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOmZ3Uy6niPxUCKAJDMywXQC-7ZFocrAgYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_eui2=AeEOn5dZ56ZhnRNfuMe3BE40RHQZO0lGt5NEdBk7SUa3kzwaINKib7v_OLzXaep7CrX_UHZi1p5oF5qfgzgksTwl&oh=00_AfvQCn6HmhwN8pwF9Pq_n1nES-n5lHGD6vKhKJaAEY6KuQ&oe=69989FFE', 'https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/632539881_4391093937801879_3897543539559678556_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeGdiG10-_LWJUWKtCAsBA71mQWsZpD2VhaZBaxmkPZWFltRJRUQW__uZ6oXREwfGCzo3BO5gbHdQLn9tEBUKpaW&_nc_ohc=oQhCqIsgbfkQ7kNvwH9lKnl&_nc_oc=AdknLO4ThmhIT4_bs_hm2aKifuv0xZSK8sek2ID_DBII4zNJ_bCr8ngbNJaR7ELhFz8&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHltdCRZ8ohwJjELVZvgoMq7WDJbcThrxjrv7h9otj9txNIhk8LMXzIM-vCBaXpMBXgsjhDkMN6yA&oh=00_AfudfbCo_8KKz4gojwDfkTF98VlndCkp9HJ3NZ_oWZJF7w&oe=699880AD', 'https://www.instagram.com/reel/DUwDYd2jcU7/', '#stagepassav your end-to-end events partner of choice.', '2026-02-15 00:57:12', '2026-02-16 11:00:03', '{\"id\": \"18077495648071719\", \"caption\": \"#stagepassav your end-to-end events partner of choice.\", \"media_url\": \"https://scontent-atl3-3.cdninstagram.com/o1/v/t16/f2/m69/AQOaHdDRHFcnkkm-x4qtwbHMsPhvKCgc0OD3Ku_kMlhHDHz9UrFAFx03OvDCFlQQWyVBiC_MTYPWd_CVMVMh9Keb.mp4?strext=1&_nc_cat=110&_nc_sid=5e9851&_nc_ht=scontent-atl3-3.cdninstagram.com&_nc_ohc=E4wdaJeCW3YQ7kNvwEUr4BM&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDkxNDIzNDExMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxLCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6MTUsInVybGdlbl9zb3VyY2UiOiJ3d3cifQ%3D%3D&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=9404829316145b5f&_nc_vs=HBksFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HQWJibENVSVJUdTJIaE5jQUtaejFocUVJUE42YnNwVEFRQUYVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzlGNDFGMTM1Njk2RjZEOUY1MUFCNzkzOUU0MDlBOEFFX2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOmZ3Uy6niPxUCKAJDMywXQC-7ZFocrAgYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_eui2=AeEOn5dZ56ZhnRNfuMe3BE40RHQZO0lGt5NEdBk7SUa3kzwaINKib7v_OLzXaep7CrX_UHZi1p5oF5qfgzgksTwl&oh=00_AfvQCn6HmhwN8pwF9Pq_n1nES-n5lHGD6vKhKJaAEY6KuQ&oe=69989FFE\", \"permalink\": \"https://www.instagram.com/reel/DUwDYd2jcU7/\", \"timestamp\": \"2026-02-14T19:57:12+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-1.cdninstagram.com/v/t51.71878-15/632539881_4391093937801879_3897543539559678556_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=106&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeGdiG10-_LWJUWKtCAsBA71mQWsZpD2VhaZBaxmkPZWFltRJRUQW__uZ6oXREwfGCzo3BO5gbHdQLn9tEBUKpaW&_nc_ohc=oQhCqIsgbfkQ7kNvwH9lKnl&_nc_oc=AdknLO4ThmhIT4_bs_hm2aKifuv0xZSK8sek2ID_DBII4zNJ_bCr8ngbNJaR7ELhFz8&_nc_zt=23&_nc_ht=scontent-atl3-1.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQHltdCRZ8ohwJjELVZvgoMq7WDJbcThrxjrv7h9otj9txNIhk8LMXzIM-vCBaXpMBXgsjhDkMN6yA&oh=00_AfudfbCo_8KKz4gojwDfkTF98VlndCkp9HJ3NZ_oWZJF7w&oe=699880AD\"}', '2026-02-15 01:00:03', '2026-02-16 11:00:03'),
(11324, '18090452692865617', 'VIDEO', 'https://scontent-atl3-2.cdninstagram.com/o1/v/t16/f2/m69/AQP0ulWOqzyDJZzj0Hq-GnL8GjS5Zc_95x11ML3V62MMqf3taGrUFzVh_zvgloQJkoZXC0HIY5iadd8XRIMleOTy.mp4?strext=1&_nc_cat=102&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=gvePvbU4UIwQ7kNvwGdRis_&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDkxNDM5MDQxMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxLCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6NywidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=a5e8c184fdbd0642&_nc_vs=HBksFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HS2VndVNVeHc3SzQwb1VIQU5aQkR1TkRES1lNYnNwVEFRQUYVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzUzNDhGNDEwNTA3RDU4OTFCRDM3QTZENTMxQTRBRjk4X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOjOmm16niPxUCKAJDMywXQB8QYk3S8aoYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_eui2=AeFe_OJd4A6jTcfKYEB2ZHVkCSx7wNwP5NEJLHvA3A_k0YIH1GqW-365FPPAlfAJ-RJKIDmBbzi-917n_KqIh5AR&oh=00_Aft1KAz8S3ilhh69ocyencfDdquvMAvXbhcukwOgwQ5pNA&oe=69986CA6', 'https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/628695664_1867246934155442_7154712059000750358_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFmNHM0dO4vk6ZvJDdrdKr-hpH4Np4SKyOGkfg2nhIrIxqvNuYKLu0aQ6En62INKdiLywr83hoJNFUSl1cPuwaY&_nc_ohc=2Sdxve-y1GkQ7kNvwG6_qY_&_nc_oc=AdmfH__3qePriCa9JIg0V18AGCp_NmDRnkoPGdPYsxn247Fnxh1m1EQ4_YvFmUNxNCw&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQG3hEE1lPKTArWhRsts-OfokwSsJPiJ2Uiukir12F1Od7p4VdZvX1z-Q4scwBKfSC8nnjshmPPEFA&oh=00_AftNR5Lsah-5rW1M2TMnVDEufB7PC80notVYISDdHhzM6Q&oe=69988FAA', 'https://www.instagram.com/reel/DUwEl_WDVGj/', '#stagepassav your end-to-end events partner of choice.', '2026-02-15 01:06:32', '2026-02-16 11:00:03', '{\"id\": \"18090452692865617\", \"caption\": \"#stagepassav your end-to-end events partner of choice.\", \"media_url\": \"https://scontent-atl3-2.cdninstagram.com/o1/v/t16/f2/m69/AQP0ulWOqzyDJZzj0Hq-GnL8GjS5Zc_95x11ML3V62MMqf3taGrUFzVh_zvgloQJkoZXC0HIY5iadd8XRIMleOTy.mp4?strext=1&_nc_cat=102&_nc_sid=5e9851&_nc_ht=scontent-atl3-2.cdninstagram.com&_nc_ohc=gvePvbU4UIwQ7kNvwGdRis_&efg=eyJ2ZW5jb2RlX3RhZyI6Inhwdl9wcm9ncmVzc2l2ZS5JTlNUQUdSQU0uQ0xJUFMuQzMuNzIwLmRhc2hfYmFzZWxpbmVfMV92MSIsInhwdl9hc3NldF9pZCI6MTc5NDkxNDM5MDQxMDExMjcsImFzc2V0X2FnZV9kYXlzIjoxLCJ2aV91c2VjYXNlX2lkIjoxMDA5OSwiZHVyYXRpb25fcyI6NywidXJsZ2VuX3NvdXJjZSI6Ind3dyJ9&ccb=17-1&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&edm=AM6HXa8EAAAA&_nc_zt=28&vs=a5e8c184fdbd0642&_nc_vs=HBksFQIYOnBhc3N0aHJvdWdoX2V2ZXJzdG9yZS9HS2VndVNVeHc3SzQwb1VIQU5aQkR1TkRES1lNYnNwVEFRQUYVAALIARIAFQIYUWlnX3hwdl9wbGFjZW1lbnRfcGVybWFuZW50X3YyLzUzNDhGNDEwNTA3RDU4OTFCRDM3QTZENTMxQTRBRjk4X2F1ZGlvX2Rhc2hpbml0Lm1wNBUCAsgBEgAoABgAGwKIB3VzZV9vaWwBMRJwcm9ncmVzc2l2ZV9yZWNpcGUBMRUAACaOjOmm16niPxUCKAJDMywXQB8QYk3S8aoYEmRhc2hfYmFzZWxpbmVfMV92MREAdf4HZeadAQA&_nc_eui2=AeFe_OJd4A6jTcfKYEB2ZHVkCSx7wNwP5NEJLHvA3A_k0YIH1GqW-365FPPAlfAJ-RJKIDmBbzi-917n_KqIh5AR&oh=00_Aft1KAz8S3ilhh69ocyencfDdquvMAvXbhcukwOgwQ5pNA&oe=69986CA6\", \"permalink\": \"https://www.instagram.com/reel/DUwEl_WDVGj/\", \"timestamp\": \"2026-02-14T20:06:32+0000\", \"media_type\": \"VIDEO\", \"thumbnail_url\": \"https://scontent-atl3-3.cdninstagram.com/v/t51.71878-15/628695664_1867246934155442_7154712059000750358_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_eui2=AeFmNHM0dO4vk6ZvJDdrdKr-hpH4Np4SKyOGkfg2nhIrIxqvNuYKLu0aQ6En62INKdiLywr83hoJNFUSl1cPuwaY&_nc_ohc=2Sdxve-y1GkQ7kNvwG6_qY_&_nc_oc=AdmfH__3qePriCa9JIg0V18AGCp_NmDRnkoPGdPYsxn247Fnxh1m1EQ4_YvFmUNxNCw&_nc_zt=23&_nc_ht=scontent-atl3-3.cdninstagram.com&edm=AM6HXa8EAAAA&_nc_gid=JZfcjTafmnV5bpixGUR1BQ&_nc_tpa=Q5bMBQG3hEE1lPKTArWhRsts-OfokwSsJPiJ2Uiukir12F1Od7p4VdZvX1z-Q4scwBKfSC8nnjshmPPEFA&oh=00_AftNR5Lsah-5rW1M2TMnVDEufB7PC80notVYISDdHhzM6Q&oe=69988FAA\"}', '2026-02-15 02:00:03', '2026-02-16 11:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_29_000000_create_contact_messages_table', 1),
(5, '2026_01_29_000001_create_quote_requests_table', 1),
(6, '2026_01_29_000002_create_navigation_tables', 1),
(7, '2026_01_29_000003_create_homepage_content_tables', 1),
(8, '2026_01_29_000004_create_footer_content_tables', 1),
(9, '2026_01_29_000005_create_instagram_media_table', 1),
(10, '2026_01_29_000006_create_site_settings_table', 1),
(11, '2026_01_29_000007_add_favicon_to_navbar_settings', 1),
(12, '2026_01_29_000007_add_icon_fields_to_industries_table', 1),
(13, '2026_01_29_000008_create_page_content_tables', 1),
(14, '2026_01_29_000009_create_service_and_industry_pages_tables', 2),
(15, '2026_02_04_174626_create_cron_jobs_table', 3),
(16, '2026_02_05_040643_add_thumbnail_url_to_hero_sections_table', 4),
(17, '2026_02_05_040958_add_phone_to_quote_requests_table', 5),
(18, '2026_02_05_170023_add_overlay_description_to_industries_table', 6),
(19, '2026_02_07_153734_add_people_fields_to_about_sections_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `navbar_links`
--

CREATE TABLE `navbar_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navbar_settings_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbar_links`
--

INSERT INTO `navbar_links` (`id`, `navbar_settings_id`, `label`, `href`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', '#home', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'About Us', '#about', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'Services', '#services', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'Our Work', '#portfolio', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(5, 1, 'Industries', '#industries', 5, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(6, 1, 'Contact Us', '#contact', 6, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `navbar_settings`
--

CREATE TABLE `navbar_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `favicon_url` varchar(255) DEFAULT NULL,
  `cta_label` varchar(255) NOT NULL,
  `cta_href` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbar_settings`
--

INSERT INTO `navbar_settings` (`id`, `logo_url`, `favicon_url`, `cta_label`, `cta_href`, `created_at`, `updated_at`) VALUES
(1, 'https://stagepass.nuhiluxurytravel.com/uploads/StagePass-LOGO-y.png', NULL, 'Get AV Quote', NULL, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `our_work_pages`
--

CREATE TABLE `our_work_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_work_pages`
--

INSERT INTO `our_work_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Our Work - Portfolio | StagePass Audio Visual Projects', 'Explore StagePass Audio Visual\'s portfolio of successful events, corporate productions, and technical installations across Kenya. See our work in action.', 'stagepass portfolio, av projects kenya, event case studies, corporate events nairobi, successful av installations, event production examples, stagepass work, av projects showcase, event photography kenya', '/uploads/og-portfolio.jpg', 'Our Work & Portfolio', 'Showcasing our successful projects and the exceptional audio-visual experiences we\'ve created for clients across various industries.', '<p>Our portfolio represents a diverse range of successful projects, from intimate corporate gatherings to large-scale public events. Each project showcases our commitment to excellence and attention to detail.</p><p>Browse through our gallery to see how we\'ve helped clients achieve their vision through innovative audio-visual solutions and professional event production.</p>', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_items`
--

CREATE TABLE `portfolio_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_section_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `youtube_id` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_items`
--

INSERT INTO `portfolio_items` (`id`, `portfolio_section_id`, `type`, `thumbnail`, `title`, `youtube_id`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'image', 'uploads/portfolio/1.jpg', 'Corporate Event 2024', NULL, 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, 'image', 'uploads/portfolio/2.jpg', 'Concert Production', NULL, 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, 'image', 'uploads/portfolio/3.jpg', 'Festival Setup', NULL, 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(4, 1, 'video', 'uploads/portfolio/4.jpg', 'Stage Lighting Design', 'sJSNvegZDoI', 4, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(5, 1, 'image', 'uploads/portfolio/5.jpg', 'Audio Visual Setup', NULL, 5, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(6, 1, 'image', 'uploads/portfolio/6.jpg', 'Conference Production', NULL, 6, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(7, 1, 'image', 'uploads/portfolio/7.jpg', 'Exhibition Event', NULL, 7, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(8, 1, 'image', 'uploads/portfolio/8.jpg', 'Gala Dinner Setup', NULL, 8, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(9, 1, 'image', 'uploads/portfolio/9.jpg', 'New Portfolio Item 1', NULL, 9, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(10, 1, 'image', 'uploads/portfolio/10.jpg', 'New Portfolio Item 2', NULL, 10, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(11, 1, 'image', 'uploads/portfolio/11.jpg', 'New Portfolio Item 3', NULL, 11, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(12, 1, 'image', 'uploads/portfolio/12.jpg', 'New Portfolio Item 4', NULL, 12, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_sections`
--

CREATE TABLE `portfolio_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge_label` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_sections`
--

INSERT INTO `portfolio_sections` (`id`, `badge_label`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Our Work', 'Portfolio Gallery', 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.', '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_pages`
--

CREATE TABLE `privacy_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_pages`
--

INSERT INTO `privacy_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `last_updated`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy - StagePass Audio Visual Data Protection', 'StagePass Audio Visual privacy policy outlining how we collect, use, and protect your personal information in compliance with data protection regulations.', 'stagepass privacy policy, data protection kenya, personal information protection, privacy statement, data security, gdpr compliance, client data privacy, information security', '/uploads/og-privacy.jpg', 'Privacy Policy', 'Your privacy is important to us. Learn how we collect, use, and protect your personal information.', '<h2>1. Information We Collect</h2><p>We collect information that you provide directly to us, including name, contact details, and event requirements when you request our services.</p><h2>2. How We Use Your Information</h2><p>We use your information to provide services, communicate with you, process payments, and improve our services. We do not sell your personal information to third parties.</p><h2>3. Data Security</h2><p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p><h2>4. Your Rights</h2><p>You have the right to access, update, or delete your personal information. Contact us to exercise these rights.</p><h2>5. Cookies and Tracking</h2><p>Our website may use cookies to enhance user experience. You can control cookie settings through your browser preferences.</p><h2>6. Changes to This Policy</h2><p>We may update this privacy policy from time to time. We will notify you of any significant changes.</p>', '2026-02-01', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `quote_requests`
--

CREATE TABLE `quote_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quote_requests`
--

INSERT INTO `quote_requests` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Albert', 'albertmuhatia@gmail.com', '+254723014032', 'albertmuhatia@gmail.com', '2026-02-05 15:58:31', '2026-02-05 15:58:31'),
(2, 'Albert', 'albertmuhatia@gmail.com', '+254723014032', 'albertmuhatia@gmail.com', '2026-02-05 15:58:39', '2026-02-05 15:58:39'),
(3, 'Albert', 'albertmuhatia@gmail.com', '+254723014032', 'albertmuhatia@gmail.com', '2026-02-05 15:59:53', '2026-02-05 15:59:53'),
(4, 'Albert', 'albertmuhatia@gmail.com', '+254723014032', 'albertmuhatia@gmail.com', '2026-02-05 16:03:55', '2026-02-05 16:03:55'),
(5, 'albertmuhatia@gmail.com', 'albertmuhatia@gmail.com', '+254723014032', 'albertmuhatia@gmail.com', '2026-02-05 16:09:04', '2026-02-05 16:09:04'),
(6, 'Albert', 'albertmuhatia@gmail.com', '+254723014032', 'albertmuhatia@gmail.com', '2026-02-05 16:15:20', '2026-02-05 16:15:20'),
(7, 'test', 'asasahsa@gjdgada.com', '+254723014032', '+254723014032', '2026-02-05 16:18:40', '2026-02-05 16:18:40'),
(8, 'test', 'asasahsa@gjdgada.com', '+254723014032', '+254723014032', '2026-02-05 16:20:22', '2026-02-05 16:20:22'),
(9, 'test', 'asasahsa@gjdgada.com', '+254723014032', '+254723014032', '2026-02-05 16:20:59', '2026-02-05 16:20:59'),
(10, 'test', 'asasahsa@gjdgada.com', '+254723014032', '+254723014032', '2026-02-05 16:24:15', '2026-02-05 16:24:15'),
(11, 'test', 'asasahsa@gjdgada.com', '+254723014032', '+254723014032', '2026-02-05 16:28:33', '2026-02-05 16:28:33'),
(12, 'Albert', 'albertmuhtati@gmail.com', '+254723014032', 'Test characters here adnda aaa', '2026-02-05 16:34:08', '2026-02-05 16:34:08'),
(13, 'Albert', 'albertmuhatia@gmail.com', '+25490841987', 'This is another test same ip with rate limiter', '2026-02-05 16:44:05', '2026-02-05 16:44:05'),
(14, 'Albert Muhatia', 'albertmuhatia@gmail.com', '+254723014032', 'Test RFQ Popup form calling api endpoint', '2026-02-09 23:36:28', '2026-02-09 23:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `services_section_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `gradient` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_section_id`, `title`, `description`, `icon`, `gradient`, `sort_order`, `created_at`, `updated_at`) VALUES
(10, 1, 'Full Production and  Event Packages', 'Complete event production services from start to finish, handling all technical needs.', 'Box', 'from-yellow-400 to-yellow-600', 1, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(11, 1, 'Visual', 'Stunning visual displays with cutting-edge screen technology and sharp imagery.', 'Monitor', 'from-[#172455] to-[#1e3a8a]', 2, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(12, 1, 'Staging Services', 'Safe and creative staging solutions for any event requirement.', 'Stage', 'from-yellow-400 to-yellow-600', 3, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(13, 1, 'Lighting', 'Intelligent lighting design that creates emotion through color, texture and movement.', 'Lightbulb', 'from-[#172455] to-[#1e3a8a]', 4, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(14, 1, 'Rigging & Truss Services', 'Professional rigging and truss services with legal and technical compliance.', 'Grid3x3', 'from-yellow-400 to-yellow-600', 5, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(15, 1, 'Graphics', 'Eye-catching visual content including signs, posters, and printed materials.', 'Palette', 'from-[#172455] to-[#1e3a8a]', 6, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(16, 1, 'Audio', 'Crystal clear sound systems with complex control and diverse inputs.', 'Volume2', 'from-yellow-400 to-yellow-600', 7, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(17, 1, 'Design Services', 'Flawless design planning for lighting, staging, audio and overall event aesthetics.', 'PenTool', 'from-[#172455] to-[#1e3a8a]', 8, '2026-02-20 11:20:48', '2026-02-20 11:20:48'),
(18, 1, 'Equipment Rentals & Sales', 'Massive inventory of the best audiovisual technology available for rent or purchase.', 'Package', 'from-yellow-400 to-yellow-600', 9, '2026-02-20 11:20:48', '2026-02-20 11:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `services_pages`
--

CREATE TABLE `services_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_pages`
--

INSERT INTO `services_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Our Services - Professional AV Solutions | StagePass Audio Visual', 'Comprehensive audio-visual services including sound systems, lighting, video production, event staging, and technical support for corporate events, conferences, and live productions in Kenya.', 'av services kenya, sound systems nairobi, event lighting kenya, video production services, corporate av solutions, live event production, stage setup kenya, audio visual rental, av equipment kenya, event technology services', '/uploads/og-services.jpg', 'Our Professional AV Services', 'Comprehensive audio-visual solutions tailored to your event needs, from corporate presentations to large-scale productions.', '<p>StagePass offers a complete range of audio-visual services designed to elevate your events. Our services include professional sound systems, state-of-the-art lighting solutions, high-definition video production, and comprehensive event staging.</p><p>Whether you\'re hosting a corporate conference, product launch, concert, or private event, we provide the technology and expertise to ensure flawless execution.</p>', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `services_sections`
--

CREATE TABLE `services_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `badge_label` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `people_title` varchar(255) DEFAULT NULL,
  `people_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_sections`
--

INSERT INTO `services_sections` (`id`, `badge_label`, `title`, `description`, `people_title`, `people_description`, `created_at`, `updated_at`) VALUES
(1, 'Our Capabilities', 'One-Stop Solution For All Your AV Services', 'From concept to set-up to on-site support, we\'re here every step of the way to deliver the exceptional product and service you deserve.', 'Our People', 'While we\'ve got the most trusted audiovisual, staging and lighting brands available to you, it is our unparalleled team that will exceed your expectations.', '2026-02-04 20:09:33', '2026-02-04 22:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `service_pages`
--

CREATE TABLE `service_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_pages`
--

INSERT INTO `service_pages` (`id`, `slug`, `title`, `description`, `content`, `meta_description`, `meta_keywords`, `og_image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'rigging-truss-services', 'Rigging & Truss Services', 'When you hire a firm to suspend thousands of pounds above the heads of a plethora of people – at a rock concert or industry conference, for example – then you need to be certain you\'re doing business with the best. Whatever size or type of event you are organizing, Stagepass Audio Visual Limited is here to help with all your rigging equipment needs. Safety is our number one concern, and we do not make mistakes.', '<p>It\'s what\'s on the inside that counts, right? We understand that all great events start with an even greater foundation. After careful planning in accordance to legal and technical specifications, our rigging specialists provide on-site service to ensure the proper and safe installation of all necessary hardware to prepare your venue for its transformation. Regardless of event size or scope, we\'re ready to tackle your project head-on.</p>', 'Professional rigging and truss services for safe and secure event installations. StagePass Audio Visual provides expert rigging solutions.', NULL, NULL, 1, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(2, 'staging-services', 'Staging Services', 'When it comes to staging, safety is key. Got a wild idea that you want a car on stage? Yeah, we can take care of that. Our stages can (and have) withstood automobiles at multiple events, and all of our equipment is properly rated for safety and our staff is expert trained. We take the responsibility of our clients\' and performers\' safety very seriously.', NULL, 'Professional staging services for events of all sizes. Safe, reliable staging solutions from StagePass Audio Visual.', NULL, NULL, 2, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(3, 'graphics', 'Graphics', 'No event is complete without eye-catching visual content. Whether your visual story is told through signs, posters, printed back panels, or totems, we\'ll make sure it\'s told right. From concept to completion, our graphics team will work with you to create stunning visual elements that enhance your event.', NULL, 'Professional graphics and visual design services for events. Custom signage, posters, and visual elements.', NULL, NULL, 3, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(4, 'equipment-rentals-sales', 'Equipment Rentals & Sales', 'Our well sized warehouse in Nairobi is home to a massive inventory of some of the best technology available. We take great pride in making this equipment available for rental or purchase, ensuring you have access to top-quality AV equipment for your events.', NULL, 'AV equipment rentals and sales in Nairobi. Professional audio-visual equipment for your events.', NULL, NULL, 4, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(5, 'design-services', 'Design Services', 'When organizing an intimate celebration or an arena concert, the objective is always flawless design. Lighting placement, staging, audio – the overall design of your event must be top-of-mind from the very beginning. Our design team works with you to create cohesive, stunning event designs.', NULL, 'Professional event design services. Lighting, staging, and audio design for memorable events.', NULL, NULL, 5, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(6, 'audio', 'Audio', 'The right sound in any venue requires pre-show planning, signal distribution, diverse inputs and complex control. When your message, whether entertaining or inspiring, is felt and understood from the first row to the last, you know you\'ve got the right audio production team.', NULL, 'Professional audio services for events. Sound reinforcement, mixing, and audio production.', NULL, NULL, 6, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(7, 'visual', 'Visual', 'Size matters and we get that. Whatever your event calls for, we\'re ready to scale it up and keep it sharp! No event is complete without stunning imagery. Displayed on LED walls, projection screens, or interactive displays, we bring your visual content to life.', NULL, 'Professional visual services for events. LED displays, projection, and video production.', NULL, NULL, 7, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(8, 'lighting', 'Lighting', 'Event lighting is a critical part of any show or performance, and StagePass Audio Visual\'s team is extremely skilled at lighting even the most intricate productions. Special event coordinators, marketing managers, and producers rely on the experts at StagePass Audio Visual, the behind-the-scenes boys and girls who bring it all together. We\'ll illuminate your event, beautifully.', '<p>Stagepass lighting designers and technicians pull together to deliver that extraordinary experience, finding that edge, drawing forth emotion with color, texture and movement. With our large inventory of intelligent lighting, they set the mood, paint the room and deliver the \"eye candy\" that draws the audience in and keeps them engaged. We understand lighting to mean much more than illumination. Choose from our wide array of solutions to communicate emotions, vigor and impact.</p>', 'Professional event lighting services. Intelligent lighting, design, and production for memorable events.', NULL, NULL, 8, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(9, 'lighting/trade-show-lighting', 'Trade Show Lighting', 'Stagepass Audio Visual Limited\'s vast experience has made us intimately familiar with convention center logistics. The day of a trade show can be a hectic time and it\'s probable that the last thing on your mind is the quality of the lighting in your booth, or the power distribution needed to make it all happen.', '<p>We can manage everything from individual booth lighting, right up to full exhibition production for event organizers. That includes the power distribution, labor, trucking, design and equipment, so you\'re left with more time to focus on showing off your business.</p>', 'Trade show lighting services. Professional booth lighting and exhibition production.', NULL, NULL, 9, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(10, 'lighting/corporate-event-lighting', 'Corporate Event Lighting', 'When choosing Stagepass Audio Visual Limited to light your corporate event, rest assured that we understand its importance and the setup it requires.', '<p>We understand how crucial the overall look is to any occasion or show, and reflect that in both equipment and personnel. The infrastructure required to create a fabulous looking event is not always fabulous looking itself. Technology is sometimes messy, but our crews know that you don\'t want to see the pieces needed to make it work – just the polished end product. We are experts at making the behind the scenes disappear. Our technicians also understand that discretion and privacy are hugely important, so confidentiality is always assured.</p>', 'Corporate event lighting services. Professional lighting design for corporate events.', NULL, NULL, 10, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(11, 'lighting/festivals', 'Festivals', 'We also specialize in the unique demands of outdoor shows. Our company knows how to best prepare for the elements, while our innate flexibility and adaptability allow us to design creative solutions for the most difficult terrain. So you can put your fears to rest – we can and will adapt to your immediate needs and challenges in real time.', NULL, 'Festival lighting services. Outdoor event lighting solutions for festivals and concerts.', NULL, NULL, 11, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(12, 'audio/sporting-events', 'Sporting Events', 'Sporting events and rallies are quite clearly loud by nature, so it\'s our duty to provide top-of-the-line audio equipment to rise above the roars of cheering fans.', '<p>These events are also often presented in very alternative venues, a challenge which requires equally creative solutions that some audio production companies simply can\'t handle. But at Stagepass Audio Visual Limited, we know we can. Halftime shows and promotional events mandate fast turnarounds, and our teams are masters at the impeccable planning and preparation needed to pull them off without a hitch.</p>', 'Audio services for sporting events. Professional sound reinforcement for sports venues.', NULL, NULL, 12, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(13, 'audio/audio-equipment-rentals', 'Audio Equipment Rentals', 'We maintain a large inventory of audio equipment in our warehouse. When you\'re searching for a simple solution of renting audio equipment, we\'re here to help.', NULL, 'Audio equipment rentals. Professional sound equipment for rent in Nairobi.', NULL, NULL, 13, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(14, 'audio/fashion-audio', 'Fashion Audio', 'Great fashion shows require great audio. Our audio solutions for fashion events ensure that every word, every note, and every sound is delivered with precision and clarity.', NULL, 'Audio services for fashion shows. Professional sound for fashion events.', NULL, NULL, 14, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(15, 'audio/nonprofit-events', 'Nonprofit Events', 'For the nonprofit industry, Stagepass Audio Visual Limited is skilled in delivering value-conscious engineering solutions for those working within limited budgets, but this doesn\'t mean you\'ll have to do without the best.', NULL, 'Audio services for nonprofit events. Affordable professional audio solutions.', NULL, NULL, 15, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(16, 'audio/corporate-event-audio', 'Corporate Event Audio', 'Corporate events require professional audio solutions that deliver clear, crisp sound for presentations, speeches, and entertainment. Our team ensures your message is heard clearly by every attendee.', NULL, 'Corporate event audio services. Professional sound for corporate presentations and events.', NULL, NULL, 16, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(17, 'audio/full-service-audio-packages', 'Full-Service Audio Packages', 'At Stagepass Audio Visual Limited, we offer comprehensive audio packages that include everything from planning and design to setup, operation, and teardown. Our full-service approach ensures a seamless audio experience for your event.', NULL, 'Full-service audio packages. Complete audio production services for events.', NULL, NULL, 17, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(18, 'visual/fashion', 'Fashion Visual', 'Great designs mandate great showcase presentations, and visual displays affect everything the audience perceives. The seasoned specialists at Stagepass Audio Visual Limited have been answering to high expectations for more than three decades and will bring that experience to your fashion event.', NULL, 'Visual services for fashion shows. Professional video and display solutions for fashion events.', NULL, NULL, 18, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(19, 'visual/corporate-event-video', 'Corporate Event Video', 'Corporate events require professional video solutions for presentations, live streaming, and content display. Our video services ensure your corporate message is delivered with clarity and impact.', NULL, 'Corporate event video services. Professional video production for corporate events.', NULL, NULL, 19, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(20, 'visual/trade-shows', 'Trade Shows', 'Trade shows require dynamic visual displays to capture attention and communicate your message effectively. Our visual solutions for trade shows include LED displays, projection mapping, and interactive displays.', NULL, 'Visual services for trade shows. LED displays and video solutions for exhibitions.', NULL, NULL, 20, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(21, 'visual/full-service-video-packages', 'Full-Service Video Packages', 'Our comprehensive video packages include everything from content creation and display design to setup, operation, and teardown. We handle all aspects of video production for your event.', NULL, 'Full-service video packages. Complete video production services for events.', NULL, NULL, 21, '2026-02-04 19:52:32', '2026-02-04 19:52:32'),
(22, 'design-services/lighting-design', 'Lighting Design', 'If you\'re working with Stagepass Audio Visual Limited to secure the perfect lighting for your event, we\'re happy to provide for any design services you need. Our project managers work with designers every day, both our trusted creative professionals and those appointed by our clients.', '<p>Together, we create production drawings and lighting plots. By taking the time to invest in proper lighting design from the early planning stages, a cohesive overall aesthetic is assured, so every ambition for the event or show is sure to be met. Whether you are organizing a charity event in Nairobi or a weekend festival in Mombasa, Stagepass Audio Visual Limited is the partner you need.</p>', 'Professional lighting design services. Custom lighting design and production drawings.', NULL, NULL, 22, '2026-02-04 19:52:32', '2026-02-04 19:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4BJvfKdrl6sKpucmL7yBhQwaOmmimtr6xylffLqi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXZjbTJObzdIcWVnanROSXk1NmxVQWNoYXphdDNZQ1B1OU40akw1RCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774547654),
('4BRwAOPsy8BhoyrDCR6OIcsOk2JrWvw8pC2JrdLu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUdMVmNtZjFzWDlJM0ZtM25jUGwyYlN5NFdYMkxDajlsYmoxRFVwYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546507),
('6r2n5chzEvUsMzcfngAPVeGyYcCqRFnObCPSRGtS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZktFNVhVNzRIQVlUb0xrZUNXdDRjRkw3SmV5SkxXVkdDWWNOMjF5SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774547449),
('7kjp0d6tqrmYPjAxVi4JRGflvZFbdFI9J3plvNWF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUlMenJYZjV4SmFLbXBwTktvdHFwMm1Fck4yN1BuYVUxdmswamlXMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545899),
('91GWTDLlmgeVXscqsNZyPJq3t9LwnEVRZ5mdGAYz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZW5KYmhxM2FadGNKbWdUMFN1Y0FJUWVYNUJIaW1wN3FTVFp3bEx3RyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546493),
('9y2kFvh4vceTWQYAoXTEgzok2VTQ0joS7p5pgIiv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFI0YkVxcE5WU0J4Z3VVUnRiOTRDbHlXb2ltRU82Z2p2WnY1cnpMZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcG9ydGZvbGlvL2luc3RhZ3JhbT9saW1pdD01MCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774553903),
('asI4ROH8qk1RCHwVBiLozfiTmuANxiwQEE2eVEXA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaG00VnBpZU9FRDE5QW1Mc2Uwd3VqTm8wZUJScW1QdlJianZnUGFXWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcG9ydGZvbGlvL2luc3RhZ3JhbT9saW1pdD01MCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774592914),
('bGI8gudi61t4EOoowy5LUzVOtONpOVDk5GTGzlHq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3c3RGREbUlJcXNEaXlBSGg2MlBVak81bUs0cUdkd0JCTXNOZ0UxRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545287),
('hix0TIdbPjF4CRbUixwybrksfBHq4BKn1S5FHQTK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicUhyTkhRNzI3RDVGejMyZ2xqdkpyMEJMYVY0dHZnMVlyMUFFam82eSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545626),
('IjrLkQiV7EbtxQqAKN5sb6f3sXmKfhcTGXYb7qyZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYm5nUWk5ZENBZWk5ZTBrOERUaVNJaXplZTg4RldacUxsdnVTSno4YSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774551408),
('JaibsqbpXzsmEez75BUPLFWU2Sec08OWcyJxZ56K', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjJzVGROVTZwbTh2bmZZSlB2Q0FzSUZQU1U4OWhGZnVPMUM4TzM1WiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545666),
('jdqdKwXYi7M5T6XMkl2UflKGZmFoGCOmWnBnpEEt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1pJOFhXMHIwWGJzOHZUVkJEa0tyVWljRWdCc005bXA2VXRnVHZ3RiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774553087),
('LoPNFGuADFwPwsLvthdgkIfsheYZg2TDfU774Rmk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME40dERZR05sV2kydHUwQk82YW5yeU5PZXpqdlY0bXdxQWpCV2daMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546900),
('LQDIr8jkbedQShnmw35vY9BsSZMJFwGF2suQa0rp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0NXNUl0Tkc0WFFVaEEzV3RnTnFxTHRCNDBxQ2ZTemFWTmNKR1FZaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546739),
('Ma8O5menyktOqxM3lIcSRnn6mupjfRY790I2NqPG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWNhQmVOYXBWdnNFSWhrVkxVcDJ6Y2VvVzFkbzE5THNCNkZVdWdFQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545639),
('mtuclpHy08cSPgrdwmTWlvu331KFuvFzOwGyeaWB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEZ0eUpRR25nZFRhTWh4UFFBazdGZERKcjcyRVlUZHIzZDBsUUdoUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546529),
('n5UfQWVVOrgq2SC4NdYxgzkiaQM0kLRH9iGmGcWB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTg1SWpDVVQ5V3RqR2dNU0VKc2FwQnFiWE5yVFQ0MjFzeXVTZ3dEdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545804),
('sZ5LH6mBY1F9UnTul4YiRuw80zpl1TnC5pwNFUlV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFJRdFI4RjNRYk9FbmFTUTVLbTRFd2JEWlJ0VE9nbURGT3JGV1dDMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545981),
('TEroLjIKnslmG9Q3EiAiVHeEzNT8zDvrqYCVIuGE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXg2cnB5WmhlTE9uWnV0WEh3NVd3WXZhWUNsRDF4MndiWXQ2R256TiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774552949),
('U2ldegs0vjhia5JekS8MDneBUyXTL9s3PCQnEpAC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjEzNTVnMm1hdFU5U2tDOVY5Z2lGQkFpNERHWXdUM2tZWkdDc2V1bSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546674),
('uGgSxFPMvmN6xiyhpvP2yEVNLck5RDbC4epYibv5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVg4eEhPOTlPSHFCSzRBQmRGMEVSenZyOFVOMThzOTdNZzdubVY5QyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546135),
('uKPx9na1mdCBDpK0QUeUeKYTlIAGdjUlMBoQqBkj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazdCbmlXQXlyQ0JjQmg5YlBEWjZ6aE9mRHZSejQ3dFozMUVtd2trOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546661),
('vovQLTxyD7tgaNRNdHkPtUv124Aqgc47yuqs2Bvv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnp4VEViZ2dxYm9zcnVIY2J1UnZKRGkzMzVxWXFkZnZkdnJiRVNCSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546889),
('xaqiM39oseKqDXv9Mz8pQ2S83NMYyO2tQdKPYqVK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmxid21EaVdxQUNNNWZ6RFhXRktua3R1WUpuZUZCRTdUU21YekRDdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545068),
('xeWx5BSdFpcwt5wE9vyn3JIwmMUGm297UrNYFmFd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMW9Sdm5obDJtNnprWTVzTVMzMjVnNkRkbU82SHpEQ3poeEd2TTFKZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774541410),
('YRq925Wu9Wqv6W1AD0D4dO9qm7MLLJu0VzXTIZsg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME55enFTMVUwNnExWG1Ub2FuOUQ0b1pZUFZyN3lWM2pETEJaTEZJbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774591882),
('yugu4gPlqNoERPLExyVaojaKl6ZAEYHN3u4cL7fN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnpUd1I0SGdOUlZXbjBLNnFpVTZRVERLWXpHcm8yUWhZYnE4aUlPdyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774546754),
('Zn43EH0ybFnYmj66g0s9dgt3zw31nt87l34T8Xe8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2pjZ3hXZ0d6bDN4eEgxamVhM3I0ZER3TEVQdVY5eFRLbTRoWGs2ZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYW5pZmVzdC5qc29uIjtzOjU6InJvdXRlIjtzOjg6Im1hbmlmZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1774545920);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'portfolio_source', 'instagram', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(2, 'site_name', 'StagePass Audio Visual', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(3, 'site_tagline', 'Creative Solutions • Technical Excellence', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(4, 'website_url', 'https://stagepass.co.ke', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(5, 'contact_email', 'info@stagepass.co.ke', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(6, 'support_email', 'info@stagepass.co.ke', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(7, 'contact_phone_primary', '+254 729 171 351', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(8, 'contact_phone_secondary', NULL, '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(9, 'whatsapp_number', NULL, '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(10, 'contact_address', 'Jacaranda Close, Ridgeways,\r\nNairobi, Kenya', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(11, 'business_hours', 'Mon - Fri: 9:00 AM - 6:00 PM\r\nSat: 10:00 AM - 4:00 PM', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(12, 'facebook_url', 'https://www.facebook.com/stagepassAv/', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(13, 'twitter_url', 'https://twitter.com/stagepassav', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(14, 'instagram_url', 'https://www.instagram.com/stagepassav/', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(15, 'linkedin_url', 'https://www.linkedin.com/company/stagepass-audio-visual-limited/', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(16, 'youtube_url', 'https://youtube.com/@stagepassav-ke', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(17, 'seo_meta_description', NULL, '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(18, 'seo_meta_keywords', NULL, '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(19, 'instagram_access_token', 'EAARQZCEY3Hp0BQv5JDn7tG1KZAL00sAbOGF764R2TqOh1VvLA6I2No5vAgBrpcE9RQDOcN2o9x2Pow4NUaOwiDDkTuYa1vNitNZCNZBd9hKSvZAwftdXaoHqZBX4qwmRrEmQJORpRUzCl9BuO2BtUK3dIvKuzXycH61QCWvtkNJcxZCn3yeHK5MxkUtFBYp4WI9N5DaqRlufR5u', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(20, 'instagram_app_id', NULL, '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(21, 'instagram_app_secret', NULL, '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(22, 'instagram_graph_user_id', '17841403996469818', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(23, 'instagram_graph_api_version', 'v20.0', '2026-02-02 23:31:30', '2026-02-09 23:29:32'),
(24, 'site_logo_url', 'uploads/1770221831_6983710720720.png', NULL, '2026-02-09 23:29:32'),
(25, 'favicon_url', 'uploads/favicon_1770661772_698a278c066f6.png', NULL, '2026-02-09 23:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stats_section_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `stats_section_id`, `value`, `label`, `icon`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, '43,234', 'AV Equipment', 'Package', 1, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(2, 1, '421', 'Happy Clients', 'Users', 2, '2026-02-04 20:09:33', '2026-02-04 20:09:33'),
(3, 1, '2,362', 'Events', 'Calendar', 3, '2026-02-04 20:09:33', '2026-02-04 20:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `stats_sections`
--

CREATE TABLE `stats_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline` varchar(255) NOT NULL,
  `subheadline` varchar(255) DEFAULT NULL,
  `background_video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats_sections`
--

INSERT INTO `stats_sections` (`id`, `headline`, `subheadline`, `background_video_url`, `created_at`, `updated_at`) VALUES
(1, 'Sound reinforcement for 70,000 pax during', 'EVERTON VS KARIOBANGI SHARKS Football Match', 'https://api.stagepass.co.ke/uploads/video/zuchu.mp4', '2026-02-04 20:09:33', '2026-02-05 15:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `terms_pages`
--

CREATE TABLE `terms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_pages`
--

INSERT INTO `terms_pages` (`id`, `title`, `meta_description`, `meta_keywords`, `og_image`, `hero_title`, `hero_subtitle`, `content`, `last_updated`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions - StagePass Audio Visual', 'Read StagePass Audio Visual\'s terms and conditions for service agreements, equipment rental, event production services, and client responsibilities.', 'stagepass terms, av service terms, equipment rental terms, event production agreement, service conditions, av company terms kenya, client agreement, terms of service', '/uploads/og-terms.jpg', 'Terms and Conditions', 'Please read our terms and conditions carefully before using our services or equipment.', '<h2>1. Service Agreement</h2><p>By engaging StagePass Audio Visual services, you agree to these terms and conditions. All services are subject to availability and confirmation.</p><h2>2. Payment Terms</h2><p>Payment terms will be specified in your service agreement. A deposit may be required to secure your booking.</p><h2>3. Equipment Rental</h2><p>All equipment remains the property of StagePass Audio Visual. Clients are responsible for any damage or loss during the rental period.</p><h2>4. Cancellation Policy</h2><p>Cancellation terms will be outlined in your specific service agreement. Please refer to your contract for details.</p><h2>5. Liability</h2><p>StagePass Audio Visual carries appropriate insurance coverage. Our liability is limited as specified in your service agreement.</p>', '2026-02-01', '2026-02-01 21:10:21', '2026-02-01 21:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', NULL, '$2y$12$c4fgdaL7SiGvA8xonIrCBe76UCQBbhxrjppnlH9pfXpNOIuy2uqQC', NULL, '2026-02-01 21:10:12', '2026-02-01 21:10:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_highlights`
--
ALTER TABLE `about_highlights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_highlights_about_section_id_foreign` (`about_section_id`);

--
-- Indexes for table `about_pages`
--
ALTER TABLE `about_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bottom_nav_links`
--
ALTER TABLE `bottom_nav_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `clients_sections`
--
ALTER TABLE `clients_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_logos_clients_section_id_foreign` (`clients_section_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_details_contact_section_id_foreign` (`contact_section_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_pages`
--
ALTER TABLE `contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_sections`
--
ALTER TABLE `contact_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cron_jobs_command_created_at_index` (`command`,`created_at`),
  ADD KEY `cron_jobs_status_index` (`status`),
  ADD KEY `cron_jobs_command_index` (`command`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_more_links`
--
ALTER TABLE `footer_more_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_more_links_footer_settings_id_foreign` (`footer_settings_id`);

--
-- Indexes for table `footer_quick_links`
--
ALTER TABLE `footer_quick_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_quick_links_footer_settings_id_foreign` (`footer_settings_id`);

--
-- Indexes for table `footer_service_items`
--
ALTER TABLE `footer_service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_service_items_footer_settings_id_foreign` (`footer_settings_id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_social_links_footer_settings_id_foreign` (`footer_settings_id`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industries_industries_section_id_foreign` (`industries_section_id`);

--
-- Indexes for table `industries_pages`
--
ALTER TABLE `industries_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_sections`
--
ALTER TABLE `industries_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_pages`
--
ALTER TABLE `industry_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industry_pages_slug_unique` (`slug`);

--
-- Indexes for table `instagram_media`
--
ALTER TABLE `instagram_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instagram_media_instagram_id_unique` (`instagram_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar_links`
--
ALTER TABLE `navbar_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navbar_links_navbar_settings_id_foreign` (`navbar_settings_id`);

--
-- Indexes for table `navbar_settings`
--
ALTER TABLE `navbar_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_work_pages`
--
ALTER TABLE `our_work_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_items_portfolio_section_id_foreign` (`portfolio_section_id`);

--
-- Indexes for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_pages`
--
ALTER TABLE `privacy_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_requests`
--
ALTER TABLE `quote_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_services_section_id_foreign` (`services_section_id`);

--
-- Indexes for table `services_pages`
--
ALTER TABLE `services_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_sections`
--
ALTER TABLE `services_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_pages`
--
ALTER TABLE `service_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_pages_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stats_stats_section_id_foreign` (`stats_section_id`);

--
-- Indexes for table `stats_sections`
--
ALTER TABLE `stats_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_pages`
--
ALTER TABLE `terms_pages`
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
-- AUTO_INCREMENT for table `about_highlights`
--
ALTER TABLE `about_highlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_pages`
--
ALTER TABLE `about_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bottom_nav_links`
--
ALTER TABLE `bottom_nav_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients_sections`
--
ALTER TABLE `clients_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_pages`
--
ALTER TABLE `contact_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_sections`
--
ALTER TABLE `contact_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_more_links`
--
ALTER TABLE `footer_more_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `footer_quick_links`
--
ALTER TABLE `footer_quick_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footer_service_items`
--
ALTER TABLE `footer_service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `industries_pages`
--
ALTER TABLE `industries_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries_sections`
--
ALTER TABLE `industries_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_pages`
--
ALTER TABLE `industry_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `instagram_media`
--
ALTER TABLE `instagram_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12828;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `navbar_links`
--
ALTER TABLE `navbar_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navbar_settings`
--
ALTER TABLE `navbar_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_work_pages`
--
ALTER TABLE `our_work_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privacy_pages`
--
ALTER TABLE `privacy_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quote_requests`
--
ALTER TABLE `quote_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services_pages`
--
ALTER TABLE `services_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_sections`
--
ALTER TABLE `services_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_pages`
--
ALTER TABLE `service_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stats_sections`
--
ALTER TABLE `stats_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_pages`
--
ALTER TABLE `terms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_highlights`
--
ALTER TABLE `about_highlights`
  ADD CONSTRAINT `about_highlights_about_section_id_foreign` FOREIGN KEY (`about_section_id`) REFERENCES `about_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD CONSTRAINT `client_logos_clients_section_id_foreign` FOREIGN KEY (`clients_section_id`) REFERENCES `clients_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `contact_details_contact_section_id_foreign` FOREIGN KEY (`contact_section_id`) REFERENCES `contact_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_more_links`
--
ALTER TABLE `footer_more_links`
  ADD CONSTRAINT `footer_more_links_footer_settings_id_foreign` FOREIGN KEY (`footer_settings_id`) REFERENCES `footer_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_quick_links`
--
ALTER TABLE `footer_quick_links`
  ADD CONSTRAINT `footer_quick_links_footer_settings_id_foreign` FOREIGN KEY (`footer_settings_id`) REFERENCES `footer_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_service_items`
--
ALTER TABLE `footer_service_items`
  ADD CONSTRAINT `footer_service_items_footer_settings_id_foreign` FOREIGN KEY (`footer_settings_id`) REFERENCES `footer_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  ADD CONSTRAINT `footer_social_links_footer_settings_id_foreign` FOREIGN KEY (`footer_settings_id`) REFERENCES `footer_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `industries`
--
ALTER TABLE `industries`
  ADD CONSTRAINT `industries_industries_section_id_foreign` FOREIGN KEY (`industries_section_id`) REFERENCES `industries_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `navbar_links`
--
ALTER TABLE `navbar_links`
  ADD CONSTRAINT `navbar_links_navbar_settings_id_foreign` FOREIGN KEY (`navbar_settings_id`) REFERENCES `navbar_settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD CONSTRAINT `portfolio_items_portfolio_section_id_foreign` FOREIGN KEY (`portfolio_section_id`) REFERENCES `portfolio_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_services_section_id_foreign` FOREIGN KEY (`services_section_id`) REFERENCES `services_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_stats_section_id_foreign` FOREIGN KEY (`stats_section_id`) REFERENCES `stats_sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
