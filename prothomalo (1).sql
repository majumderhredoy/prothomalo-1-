-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2026 at 05:19 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prothomalo`
--

-- --------------------------------------------------------

--
-- Table structure for table `antorjatik`
--

DROP TABLE IF EXISTS `antorjatik`;
CREATE TABLE IF NOT EXISTS `antorjatik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rank_number` int NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antorjatik`
--

INSERT INTO `antorjatik` (`id`, `rank_number`, `title`, `link`, `created_at`) VALUES
(1, 1, 'বিশ্বকাপে খেলবে পাকিস্তান, তবে খেলবে না ভারতের বিপক্ষে ম্যাচ', 'news5.php', '2026-02-02 10:50:43'),
(2, 2, 'ভারতের বিপক্ষে খেলবে না পাকিস্তান, যা বলছে আইসিসি', 'news6.php', '2026-02-02 10:50:43'),
(3, 3, 'আইসিসিকে ব্যবস্থা নিতে বললেন গাভাস্কার, মদন লাল বললেন পাকিস্তানকে ভুগতে হবে', 'news7.php', '2026-02-02 10:50:43'),
(4, 4, 'এদের হাতে দেশের দায়িত্ব দিলে এই দেশের অস্তিত্বই রাখবে না: জামায়াত আমির', 'news8.php', '2026-02-02 10:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `banijjo`
--

DROP TABLE IF EXISTS `banijjo`;
CREATE TABLE IF NOT EXISTS `banijjo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banijjo`
--

INSERT INTO `banijjo` (`id`, `title`, `description`, `image`, `author`, `published_date`, `status`) VALUES
(1, 'গতকাল দুবার কমার পর আজ বাড়ল সোনার দাম, ভরিতে ৫,৪২৪ টাকা', '২২ ক্যারেট সোনার দাম বেড়ে হয়েছে ভরিতে ২ লাখ ৫১ হাজার ১৮৪ টাকা। দেশে–বিদেশে সোনার দামে নাটকীয়তা দেখা যাচ্ছে।', '31.avif', NULL, '2026-02-03 13:16:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banijjo2`
--

DROP TABLE IF EXISTS `banijjo2`;
CREATE TABLE IF NOT EXISTS `banijjo2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banijjo2`
--

INSERT INTO `banijjo2` (`id`, `title`, `description`, `image`, `author`, `published_date`, `status`) VALUES
(1, 'ছয় মাস ধরে কমছে পণ্য রপ্তানি', 'গত মাসে হিমায়িত খাদ্য, চামড়া ও চামড়াজাত পণ্য, পাট ও পাটজাত পণ্য, হোম টেক্সটাইল, প্রকৌশল পণ্য ও চামড়াবিহীন জুতার রপ্তানি অবশ্য বেড়েছে।\r\n', '32.avif', NULL, '2026-02-03 13:29:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_bn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_bn`, `slug`, `position`, `status`, `created_at`) VALUES
(1, 'সর্বশেষ', 'latest', 1, 1, '2026-02-01 09:32:14'),
(2, 'বাংলাদেশ', 'bangladesh', 2, 1, '2026-02-01 09:32:14'),
(3, 'রাজনীতি', 'politics', 3, 1, '2026-02-01 09:32:14'),
(4, 'বিশ্ব', 'world', 4, 1, '2026-02-01 09:32:14'),
(5, 'বাণিজ্য', 'business', 5, 1, '2026-02-01 09:32:14'),
(6, 'মতামত', 'opinion', 6, 1, '2026-02-01 09:32:14'),
(7, 'খেলা', 'sports', 7, 1, '2026-02-01 09:32:14'),
(8, 'বিনোদন', 'entertainment', 8, 1, '2026-02-01 09:32:14'),
(9, 'চাকরি', 'jobs', 9, 1, '2026-02-01 09:32:14'),
(10, 'জীবনযাপন', 'jibonjappon', 10, 1, '2026-02-01 09:32:14'),
(11, 'ভিডিও', 'video', 11, 1, '2026-02-01 09:32:14'),
(12, 'শিক্ষা', 'shikkha', 0, 0, '2026-02-03 06:51:46'),
(13, 'প্রযুক্তি', 'projukti', 0, 0, '2026-02-03 06:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `chakri`
--

DROP TABLE IF EXISTS `chakri`;
CREATE TABLE IF NOT EXISTS `chakri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Article link/slug',
  `is_main` tinyint(1) DEFAULT '0' COMMENT '1=main article with image, 0=sub article',
  `status` tinyint(1) DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `is_main` (`is_main`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chakri`
--

INSERT INTO `chakri` (`id`, `title`, `description`, `image`, `link`, `is_main`, `status`, `created_at`, `updated_at`) VALUES
(1, '৫০তম বিসিএস প্রিলি: ২০০ প্রশ্নের সমাধান দেখুন এখানে', '৫০তম বিসিএসের প্রিলিমিনিরি পরীক্ষার মধ্যে দিয়ে শুরু হয়েছে ‘এক বিসিএস, এক বছর’-এর যাত্রা। দেশের ৫৪ বছরের ইতিহাসে এটি প্রথমবারের মতো ঘটতে যাচ্ছে।\r\n\r\nগতকাল শুক্রবার সকাল ১০টা থেকে দুপুর ১২টা পর্যন্ত রাজধানী ঢাকাসহ দেশের আটটি বিভাগীয় শহরে একযোগে এই পরীক্ষা অনুষ্ঠিত হয়। ৫০তম বিসিএসে এক হাজার ৭৫৫ জনকে ক্যাডার পদে নিয়োগ দেওয়া হবে। এছাড়া নন-ক্যাডার পদে নিয়োগ পাবেন ৩৯৫ জন।\r\n\r\nবিজ্ঞপ্তিতে আগেই জানানো হয়েছিল, ৫০তম বিসিএসের প্রিলিমিনারি পরীক্ষা ২০২৬ সালের ৩০ জানুয়ারি অনুষ্ঠিত হবে। লিখিত পরীক্ষার শুরু ৯ এপ্রিল ও মৌখিক পরীক্ষা ১০ আগস্ট শুরু হবে। এমসিকিউ পরীক্ষায় অংশ নিতে আবেদন করেন ২ লাখ ৯০ হাজার ৯৫১ জন পরীক্ষার্থী।', 'chakri.avif', NULL, 1, 1, '2026-02-01 12:57:02', '2026-02-02 12:36:26'),
(2, '২৮ শতাংশ শূন্যপদ নিয়ে \"ধুঁকছে\" পরিবার পরিকল্পনা অধিদপ্তর', '৫০তম বিসিএসের প্রিলিমিনিরি পরীক্ষার মধ্যে দিয়ে শুরু হয়েছে ‘এক বিসিএস, এক বছর’-এর যাত্রা। দেশের ৫৪ বছরের ইতিহাসে এটি প্রথমবারের মতো ঘটতে যাচ্ছে।\r\n\r\nগতকাল শুক্রবার সকাল ১০টা থেকে দুপুর ১২টা পর্যন্ত রাজধানী ঢাকাসহ দেশের আটটি বিভাগীয় শহরে একযোগে এই পরীক্ষা অনুষ্ঠিত হয়। ৫০তম বিসিএসে এক হাজার ৭৫৫ জনকে ক্যাডার পদে নিয়োগ দেওয়া হবে। এছাড়া নন-ক্যাডার পদে নিয়োগ পাবেন ৩৯৫ জন।\r\n\r\nবিজ্ঞপ্তিতে আগেই জানানো হয়েছিল, ৫০তম বিসিএসের প্রিলিমিনারি পরীক্ষা ২০২৬ সালের ৩০ জানুয়ারি অনুষ্ঠিত হবে। লিখিত পরীক্ষার শুরু ৯ এপ্রিল ও মৌখিক পরীক্ষা ১০ আগস্ট শুরু হবে। এমসিকিউ পরীক্ষায় অংশ নিতে আবেদন করেন ২ লাখ ৯০ হাজার ৯৫১ জন পরীক্ষার্থী।', NULL, NULL, 0, 1, '2026-02-01 12:57:02', '2026-02-02 12:36:46'),
(3, 'মোবাইল বন্ধের ৩৯ পদে চাকরি, কক্সন আবেদন', NULL, NULL, NULL, 0, 1, '2026-02-01 12:57:02', '2026-02-01 12:57:02'),
(4, 'বিসিএস প্রিলিমিনারি: বানান ভুলের বৃত্ত থেকে বেরোতে পারছে না পিএসসি', NULL, 'chakri.avif', NULL, 0, 1, '2026-02-01 12:58:03', '2026-02-01 12:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `heading`
--

DROP TABLE IF EXISTS `heading`;
CREATE TABLE IF NOT EXISTS `heading` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heading`
--

INSERT INTO `heading` (`id`, `title`, `description`, `image`, `updated_at`) VALUES
(1, 'প্রবাসীদের ভোটে কারচুপির সুযোগ নেই: ইসি মো. সানাউল্লাহ', 'নির্বাচন কমিশনার (ইসি) ব্রিগেডিয়ার জেনারেল (অব.) আবুল ফজল মো. সানাউল্লাহ বলেছেন, প্রবাসীদের ভোট গ্রহণ প্রক্রিয়ায় কোনো ধরনের কারচুপির সুযোগ নেই। ভোট প্রদানের ক্ষেত্রে লাইভ ভেরিফিকেশন বাধ্যতামূলক করা হয়েছে এবং ব্যালটের নিরাপত্তায় গোয়েন্দা সংস্থার সদস্য', '4.avif', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `heading2`
--

DROP TABLE IF EXISTS `heading2`;
CREATE TABLE IF NOT EXISTS `heading2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heading2`
--

INSERT INTO `heading2` (`id`, `title`, `description`, `image`, `updated_at`) VALUES
(1, '৮ ফেব্রুয়ারি বা পরে প্রার্থী তালিকায় পরিবর্তন হলে সংশ্লিষ্ট আসনের পোস্টাল ভোট বাতিল', 'যে যা–ই বলুক, অতীতেও পারেনি, ভবিষ্যতেও কেউ জাতীয় পার্টির কবর রচনা করতে পারবে না বলে মন্তব্য করেছেন জাতীয় পার্টির চেয়ারম্যান জি এম কাদের। তিনি বলেন, অনেক ষড়যন্ত্র হয়েছে, কিন্তু জাতীয় পার্টিকে বাদ দিয়ে কেউ কিছু করতে পারবে না।\r\n\r\nআজ সোমবার দুপুরে রংপুর ', '5.avif', 0),
(2, '৮ ফেব্রুয়ারি প্রার্থী তালিকায় পরিবর্তন ', '', '5.avif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jibonjappon`
--

DROP TABLE IF EXISTS `jibonjappon`;
CREATE TABLE IF NOT EXISTS `jibonjappon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jibonjappon`
--

INSERT INTO `jibonjappon` (`id`, `title`, `description`, `content`, `image`, `author`, `published_date`, `status`) VALUES
(1, 'নলেন গুড়ের হালুয়ার রেসিপি', 'শবে বরাতে বানানো হবে হালুয়া। পুরোনো, নতুন দুই ধরনের স্বাদই আনতে পারেন হালুয়াতে। রেসিপি দিয়েছেন শাহনাজ বেগম', 'প্রণালি\r\n\r\nএকটি ফ্রাই প্যানে ঘি গরম করে নিন। এতে বাদাম দিয়ে হালকা লাল করে ভেজে তুলে রাখুন। একই ঘিতে তেজপাতা, দারুচিনি ও এলাচি দিয়ে নেড়ে দিন। সুগন্ধ বের হলে সুজি দিয়ে দিন। মাঝারি আঁচে অনবরত নেড়ে সুজি ভাজুন। সুঘ্রাণ বের হলে ঘন দুধ ঢেলে নেড়ে দিন। একটু পর নলেন গুড় ও তিন আঙুলে এক চিমটি লবণ যোগ করুন। সব উপকরণ নেড়ে দিন। মিশ্রণটি থকথকে হয়ে প্যানের গা ছেড়ে এলে নামিয়ে নিন। ওপরে ভাজা বাদাম ছড়িয়ে গরম-গরম পরিবেশন করুন।', 'n1.avif', NULL, '2026-02-03 11:49:42', 1),
(2, 'প্যারেন্টিংয়ের নামে ওভারপ্যারেন্টিং করছেন না তো? মিলিয়ে নিন', 'ভালো মা–বাবা হতে কে না চান! সন্তানকে নিরাপদ, সফল ও সুখী দেখতে আমরা অনেক সময় সবকিছু নিজের হাতে তুলে নিতে চাই। এসব অতিরিক্ত যত্ন আর নিয়ন্ত্রণ সন্তানের স্বাভাবিক বিকাশকে বাধাগ্রস্ত করে—নিজে শেখা, ভুল করা ও সিদ্ধান্ত নেওয়ার সুযোগ কেড়ে নেয়। আর তখনই তা হয়ে ওঠে ওভারপ্যারেন্টিং।', 'সব সময় ফোন করা, খোঁজ নেওয়া বা পর্যবেক্ষণ করা সন্তানের মধ্যে নজরদারি থেকে পালানোর ঝোঁক তৈরি করতে পারে। তাতে আপনার আর সন্তানের ভেতর দূরত্ব তৈরি হবে। আর তখন সে যখনই চোখের আড়াল হবে বা সুযোগ পাবে, এমন কিছু করার চেষ্টা করবে, যা আপনি মোটেও করতে দিতে চান না বা যা আপনার থেকে লুকানো আবশ্যক।\r\n\r\n', 'n2.avif', NULL, '2026-02-03 11:50:23', 1),
(3, 'মিষ্টি আলুর হালুয়ার রেসিপি', 'শবে বরাতের দিন বাড়িতে বাড়িতে বানানো হয় হালুয়া। নতুনত্ব আনতে মিষ্টি আলু দিয়েও বানাতে পারেন। রেসিপি দিয়েছেন শাহনাজ বেগম\r\n\r\n', 'চুলায় প্যান বসিয়ে ঘি দিন। এতে তেজপাতা, দারুচিনি ও এলাচ দিয়ে নাড়ুন। সুগন্ধ বের হলে সেদ্ধ মিষ্টি আলুর ক্বাথের সঙ্গে গুঁড়া দুধ ভালোভাবে মিশিয়ে প্যানে দিন। মাঝারি আঁচে নেড়ে কিছুক্ষণ ভাজুন। এরপর চিনি ও লবণ যোগ করে অনবরত নাড়তে থাকুন।', 'n3.avif', NULL, '2026-02-03 11:53:30', 1),
(4, 'গাজরের হালুয়ার রেসিপি', 'শবে বরাতের দিন বাড়িতে বাড়িতে বানানো হবে নানা স্বাদের হালুয়া। গাজরের হালুয়াতে আনতে পারেন ভিন্ন স্বাদ। রেসিপি দিয়েছেন শাহনাজ বেগম', 'চুলায় একটি প্যানে ঘি দিন। ঘি গরম হলে তাতে দারুচিনি, এলাচি ও তেজপাতা যোগ করুন। এবার সেদ্ধ করা গাজরের ক্বাথের সঙ্গে গুঁড়া দুধ ভালো করে মিশিয়ে নিন। প্যানে দিন এবং কিছুক্ষণ নেড়ে ভাজুন। এরপর গ্রেট করা গাজর যোগ করে ভালোভাবে মেশান', 'n4.avif', NULL, '2026-02-03 11:54:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `motamot`
--

DROP TABLE IF EXISTS `motamot`;
CREATE TABLE IF NOT EXISTS `motamot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `badge_text` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motamot`
--

INSERT INTO `motamot` (`id`, `badge_text`, `description`, `author`, `link`, `created_at`) VALUES
(1, 'তালেবানের ‘দাসপ্রথার’ আইনে আসলে যা আছে', '২০২৬ সালের জানুয়ারিতে প্রণীত তালেবানের ফৌজদারি কার্যবিধি নিয়ে সম্প্রতি আন্তর্জাতিক মহলে ব্যাপক উদ্বেগ তৈরি হয়েছে। আফগানিস্তানের সামগ্রিক আইনব্যবস্থা ও মানবাধিকার বাস্তবতার প্রেক্ষাপটে এ উদ্বেগ অনেকটাই স্বাভাবিক। তবে এসব প্রতিবেদনে যে দাবি ঘুরেফিরে আসছে, সেগুলোর সব কটি আইনটির প্রকৃত ভাষা, কাঠামো কিংবা আইনি কার্যকারিতার সঙ্গে পুরোপুরি সামঞ্জস্যপূর্ণ নয়।', 'পল ব্রাউন', '', '2026-02-02 06:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `motamot1`
--

DROP TABLE IF EXISTS `motamot1`;
CREATE TABLE IF NOT EXISTS `motamot1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motamot1`
--

INSERT INTO `motamot1` (`id`, `image`, `title`, `description`, `author`, `link`, `created_at`) VALUES
(1, 'mota mot.webp', 'মাদারীপুরের দালাল চক্রকে ধরুন', 'ভূমধ্যসাগর পাড়ি দিয়ে অবৈধভাবে ইউরোপ, বিশেষত ইতালি যাওয়ার পথে বাংলাদেশি তরুণদের নিখোঁজ ও মৃত্যুর ঘটনা নতুন নয়। সর্বশেষ মাদারীপুরের ১০ জন তরুণের দীর্ঘ প্রায় ১০ মাস ধরে নিখোঁজ থাকার তথ্য যে গভীর মানবিক সংকটের দিকে আমাদের দৃষ্টি আকর্ষণ করছে, তা আর কোনোভাবেই উপেক্ষার সুযোগ রাখে না। পরিবারগুলো আজও জানে না, তাদের সন্তানেরা জীবিত আছেন, নাকি ভূমধ্যসাগরের নীরব অতল গহ্বরে চিরতরে বিলীন হয়ে গেছেন। এই অনিশ্চয়তা কেবল ব্যক্তিগত শোক নয়; এটি একটি রাষ্ট্রের নৈতিক ব্যর্থতার প্রতিচ্ছবি।\r\n\r\nপ্রথম আলোয় প্রকাশিত প্রতিবেদন অনুযায়ী, নিখোঁজ তরুণদের পরিবার দালাল চক্রকে জনপ্রতি ২৮ থেকে ৩০ লাখ টাকা দিয়েছে, যা গ্রামীণ মধ্যবিত্ত ও নিম্নমধ্যবিত্ত পরিবারের জন্য সর্বস্বান্ত হওয়ারই শামিল। তথাকথিত ‘কম খরচে ইতালি’ পৌঁছে দেওয়ার প্রলোভন দেখিয়ে প্রথমে দুবাই, পরে লিবিয়ায় পাচার করা হয় এই তরুণদের। সেখানে তাঁদের বন্দিশালায় আটকে রেখে পরিবারের কাছ থেকে আরও ১৩-১৫ লাখ টাকা করে মুক্তিপণ আদায় করা হয়। এরপর অতি হালকা ও অনিরাপদ নৌযানে ঠেলে দেওয়া হয় ভূমধ্যসাগরের মৃত্যুপথে। এই পথ যে নিছক যাত্রাপথ নয়, বরং এক ভয়াল মৃত্যুফাঁদ, তা প্রমাণিত বহুবার। কারও খোঁজ মেলে না, কারও লাশ ভেসে আসে সাগরে। তবু এই চক্র নির্বিঘ্নে সক্রিয় থাকে।', 'সম্পাদকীয়\r\n', '', '2026-02-02 06:42:57'),
(2, 'kolam.avif', 'এআই ভিডিও নিয়ে সতর্কতা জরুরি', 'এই ভয়াবহ মানব পাচার কেবল দালাল চক্রের অপরাধে সীমাবদ্ধ নয়; এর সমান দায় রাষ্ট্রীয় প্রশাসনের। আরও নির্দিষ্ট করে বললে স্থানীয় প্রশাসন, পুলিশ ও সংশ্লিষ্ট কর্তৃপক্ষের নিষ্ক্রিয়তা এই অপরাধকে দীর্ঘদিন ধরে পুষ্ট করেছে। মাদারীপুরের অতিরিক্ত পুলিশ সুপার জানিয়েছেন, লিখিত অভিযোগ না পেলে আইনগত ব্যবস্থা নেওয়া সম্ভব নয়। এই বক্তব্য প্রশাসনিক প্রক্রিয়ার একটি কাগুজে অজুহাত মাত্র। প্রশ্ন হলো, নিখোঁজের ঘটনা, পরিবারগুলোর আহাজারি, সংবাদমাধ্যমে প্রকাশিত তথ্য—এসব কি রাষ্ট্রকে নড়াচড়া করানোর জন্য যথেষ্ট নয়? প্রশাসন কি কেবল অভিযোগ গ্রহণকারী একটি যান্ত্রিক দপ্তর, নাকি নাগরিকের জীবন ও নিরাপত্তার অভিভাবক?', 'সম্পাদকীয়', '', '2026-02-02 06:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `updated_at`) VALUES
(0, 'সিলেটে বিএনপির ‘বিদ্রোহী’ প্রার্থীর পক্ষে কাজ করায় ৯ নেতাকে বহিষ্কার', 'সিলেট-৫ (জকিগঞ্জ ও কানাইঘাট) আসনে বিএনপির ‘বিদ্রোহী’ প্রার্থী মামুনুর রশীদের পক্ষে কাজ করায় দলটির ৯ নেতাকে বহিষ্কার করা হয়েছে। বহিষ্কৃত নেতাদের মধ্যে জকিগঞ্জ উপজেলা ও পৌর বিএনপির ৪ নেতা এবং কানাইঘাট উপজেলার ৫ নেতা আছেন।', 'bnp2.avif', '2026-02-01 08:24:44'),
(2, 'প্রথম নির্দলীয় সরকার কেমন নির্বাচন দিয়েছিল', 'নির্দলীয় সরকারব্যবস্থার অধীনে দেশে প্রথম জাতীয় সংসদ নির্বাচন অনুষ্ঠিত হয় ১৯৯১ সালের ২৭ ফেব্রুয়ারি। এটি ছিল পঞ্চম জাতীয় সংসদ নির্বাচন', 'firey.avif', '2026-02-01 08:34:28'),
(3, 'চায়ের দোকানে ভোটের উত্তাপ, ত্রিমুখী প্রতিদ্বন্দ্বিতায় কে জিতবে', 'যশোরের মনিরামপুর উপজেলা পরিষদের সামনে একটি চায়ের দোকান। গতকাল শনিবার বেলা ২টা ১০ মিনিট। সেখানে বসে আছেন জনা দশেক লোক। তাঁদের মধ্যে চারজন চা পান করছেন। পাশে বসে কথা বলেছিলেন আরও ছয়জন। তাঁরা চা পান শেষ করেছেন। তাঁরা কথা বলছেন জাতীয় সংসদ নির্বাচন নিয়ে', '3.avif', '2026-02-02 13:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `pothito`
--

DROP TABLE IF EXISTS `pothito`;
CREATE TABLE IF NOT EXISTS `pothito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rank_number` int NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pothito`
--

INSERT INTO `pothito` (`id`, `rank_number`, `title`, `link`, `created_at`) VALUES
(1, 1, 'শাবাজ—নাইম এখন স্বপ্ন—পাওয়ার্তি', 'news1.php', '2026-02-02 10:48:48'),
(2, 2, 'ইতিহাসে দায়িত্বহীনতায় সাংবাদিকদের ভয় ফাঁস', 'news2.php', '2026-02-02 10:48:48'),
(3, 3, 'ইরানের বন্দুর আকবালে বিষ্ফোরণে নিহত ১, আহত ১৪', 'news3.php', '2026-02-02 10:48:48'),
(4, 4, 'জিন্দাল রংমালের সাক্ষালবার নিবাশন যিরে আলো এতগুলো দেশর এত সবৃজপয় দেশে খামিন', 'news4.php', '2026-02-02 10:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `projukti`
--

DROP TABLE IF EXISTS `projukti`;
CREATE TABLE IF NOT EXISTS `projukti` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Article link/slug',
  `is_main` tinyint(1) DEFAULT '0' COMMENT '1=main article with image, 0=sub article',
  `status` tinyint(1) DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `is_main` (`is_main`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projukti`
--

INSERT INTO `projukti` (`id`, `title`, `description`, `image`, `link`, `is_main`, `status`, `created_at`, `updated_at`) VALUES
(1, 'হাঁটা ও সাইকেল চালানোর সময় মুখের কথায় জানা যাবে গুগল ম্যাপের তথ্য', 'গুগল ম্যাপে নতুন ভয়েস কমান্ড ফিচার যোগ হয়েছে যা হাঁটা এবং সাইকেল চালানোর সময় সহায়তা করবে।', 'mobile.avif', NULL, 1, 1, '2026-02-01 13:00:18', '2026-02-01 13:01:33'),
(2, 'গুগলের উইলো কোয়ান্টাম চিপের অসাধ্য জয়', NULL, NULL, NULL, 0, 1, '2026-02-01 13:00:18', '2026-02-01 13:00:18'),
(3, 'ডিজিটাল ডিভাইস আড়ত ইনোভেশন প্রশংসনীতে নজর কেড়েছে যেসব উদ্ভাবন', NULL, NULL, NULL, 0, 1, '2026-02-01 13:00:18', '2026-02-01 13:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `shikkha`
--

DROP TABLE IF EXISTS `shikkha`;
CREATE TABLE IF NOT EXISTS `shikkha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shikkha`
--

INSERT INTO `shikkha` (`id`, `title`, `description`, `image`, `is_main`, `status`, `created_at`) VALUES
(1, 'শিক্ষকদের বাড়তি বেতনসুবিধার নতুন প্রজ্ঞাপন জারি', 'বেসরকারি শিক্ষাপ্রতিষ্ঠানে প্রধান ও সহকারী প্রধান নিয়োগে বিজ্ঞপ্তি এনটিআরসিএর, পদ ১৩৫৯৯\r\n\r\nসপ্তম নিয়োগ বিজ্ঞপ্তির ফল কবে, জানালেন এনটিআরসিএর চেয়ারম্যান', 'shikkha.avif\r\n', 1, 1, '2026-02-01 12:42:57'),
(2, 'বেসরকারি শিক্ষাপ্রতিষ্ঠানে প্রধান ও সহকারী প্রধান নিয়োগে বিজ্ঞপ্তি এনটিআরসিএর, পদ ১৩৫৯৯', 'সরকারি চাকরিজীবীদের প্রশিক্ষণ ও উচ্চশিক্ষা–সংক্রান্ত নীতিমালায় গুরুত্বপূর্ণ সংশোধনী এনেছে সরকার। জনপ্রশাসন মন্ত্রণালয়ের এক প্রজ্ঞাপনের মাধ্যমে জনপ্রশাসন প্রশিক্ষণ ও উচ্চশিক্ষা নীতিমালা, ২০২৩ সংশোধন করে বিভিন্ন ক্ষেত্রে বয়সসীমা, প্রশিক্ষণের মেয়াদ ও বাধ্যবাধকতা নতুনভাবে নির্ধারণ করা হয়েছে।\r\n\r\nপ্রজ্ঞাপন অনুযায়ী, সকল ক্যাডার কর্মকর্তা এবং নবনিয়োগপ্রাপ্ত নন-ক্যাডার ও অন্যান্য কর্মচারীদের চাকরিতে প্রবেশের দুই বছরের মধ্যে বনিয়াদি প্রশিক্ষণ সম্পন্ন করা বাধ্যতামূলক করা হয়েছে। সর্বোচ্চ বয়সসীমা নির্ধারণ করা হয়েছে ৫৫ বছর।', 'shikkha2.avif\r\n', 0, 1, '2026-02-01 12:42:57'),
(3, 'সপ্তম নিয়োগ বিজ্ঞপ্তির ফল কবে, জানালেন এনটিআরসিএর চেয়ারম্যান', '৫০তম বিসিএসের প্রিলিমিনিরি পরীক্ষার মধ্যে দিয়ে শুরু হয়েছে ‘এক বিসিএস, এক বছর’-এর যাত্রা। দেশের ৫৪ বছরের ইতিহাসে এটি প্রথমবারের মতো ঘটতে যাচ্ছে।\r\n\r\nগতকাল শুক্রবার সকাল ১০টা থেকে দুপুর ১২টা পর্যন্ত রাজধানী ঢাকাসহ দেশের আটটি বিভাগীয় শহরে একযোগে এই পরীক্ষা অনুষ্ঠিত হয়। ৫০তম বিসিএসে এক হাজার ৭৫৫ জনকে ক্যাডার পদে নিয়োগ দেওয়া হবে। এছাড়া নন-ক্যাডার পদে নিয়োগ পাবেন ৩৯৫ জন।\r\n\r\nবিজ্ঞপ্তিতে আগেই জানানো হয়েছিল, ৫০তম বিসিএসের প্রিলিমিনারি পরীক্ষা ২০২৬ সালের ৩০ জানুয়ারি অনুষ্ঠিত হবে। লিখিত পরীক্ষার শুরু ৯ এপ্রিল ও মৌখিক পরীক্ষা ১০ আগস্ট শুরু হবে। এমসিকিউ পরীক্ষায় অংশ নিতে আবেদন করেন ২ লাখ ৯০ হাজার ৯৫১ জন পরীক্ষার্থী।', NULL, 0, 1, '2026-02-01 12:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `shongbad1`
--

DROP TABLE IF EXISTS `shongbad1`;
CREATE TABLE IF NOT EXISTS `shongbad1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shongbad1`
--

INSERT INTO `shongbad1` (`id`, `title`, `description`, `link`, `image`, `created_at`) VALUES
(1, '\r\nএপস্টেইন ফাইলে মোদির নাম, ‘ভিত্তিহীন’ বলছে ভারত', 'যুক্তরাষ্ট্রের ফার্স্ট লেডি মেলানিয়া ট্রাম্পকে নিয়ে তৈরি নতুন প্রামাণ্যচিত্রের পরিচালক ব্রেট র‍্যাটনারকে এক তরুণীর সঙ্গে ঘনিষ্ঠ অবস্থায় দেখা গেছে। এ সময় জেফরি এপস্টেইনসহ আরেক তরুণীও ছিলেন। গত শুক্রবার মার্কিন বিচার বিভাগ থেকে প্রকাশিত কিছু ছবিতে এমন দৃশ্য সামনে এসেছে।\r\n\r\n‘রাশ আওয়ার’ এবং ‘এক্স-ম্যান: দ্য লাস্ট স্ট্যান্ড’-এর মতো সিনেমার পরিচালক ব্রেট র‍্যাটনারকে কুখ্যাত যৌন নিপীড়ক প্রয়াত জেফরি এপস্টেইনের পাশে একটি সোফায় বসে থাকতে দেখা যায়। সেখানে থাই দুজন নারীর পরিচয় গোপন রাখা হয়েছে।\r\n\r\nছবিগুলো ঠিক কবে তোলা হয়েছে, তা স্পষ্ট নয়। তবে গত ডিসেম্বরে র‍্যাটনার, এপস্টেইন ও প্রয়াত ফরাসি মডেলিং এজেন্ট জঁ-লুক ব্রুনেলের যেসব ছবি প্রকাশিত হয়েছিল, এসব ছবিও একই জায়গায় তোলা বলে ধারণা করা হচ্ছে।\r\n\r\nনথিপত্রে ব্রেট র‍্যাটনারের সরাসরি কোনো অপরাধের প্রমাণ পাওয়া যায়নি। বিবিসি এ বিষয়ে তাঁর প্রতিনিধির সঙ্গে যোগাযোগের চেষ্টা করেছে।', 'news1.php', 'modi.avif', '2026-02-02 05:45:51'),
(2, 'ভোট দিলে জান্নাতে যাবেন যাঁরা বলেন, তাঁরা মুনাফিক, তাঁদের থেকে দূরে থাকবেন’', 'ভোলা-১ আসনের বিএনপির জোট প্রার্থী আন্দালিব রহমান পার্থ নির্বাচনী সমাবেশে প্রতিশ্রুতি দিয়েছেন, নির্বাচিত হলে ভোলার প্রতিটি জরাজীর্ণ রাস্তা সংস্কার ও পুনঃনির্মাণ করবেন। তিনি সমসাময়িক বিষয়েও তীব্র সমালোচনা করেন এবং ভোটারদের আবেগের বদলে বিবেক দিয়ে ভোট দেওয়ার আহ্বান জানান।', '', 'vote1.avif', '2026-02-02 05:53:57'),
(3, 'নারী প্রার্থীরা ছুটছেন পথে পথে, যাচ্ছেন ভোটারের দুয়ারে', 'ত্রয়োদশ সংসদ নির্বাচনে নারী প্রার্থী শতকরা ৩ দশমিক ৯ ভাগ। অংশগ্রহণকারী ৮০ জন নারী প্রার্থীর মধ্যে ৫৩ জনই কর্মজীবী। এবারের নির্বাচনে কম প্রার্থী, তাদের অংশগ্রহণ, শিক্ষা ও পেশাগত অবস্থান নিয়ে তৈরি হয়েছে এক নতুন সমীকরণ। বিস্তারিত ভিডিও বিশ্লেষণে...', '', 'nari.avif', '2026-02-02 05:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `shukhobor`
--

DROP TABLE IF EXISTS `shukhobor`;
CREATE TABLE IF NOT EXISTS `shukhobor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rank_number` int NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shukhobor`
--

INSERT INTO `shukhobor` (`id`, `rank_number`, `title`, `link`, `created_at`) VALUES
(1, 1, 'জাতিসংঘ শান্তি বিনির্মাণ কমিশনের সহসভাপতি নির্বাচিত বাংলাদেশ', 'news9.php', '2026-02-02 10:53:11'),
(2, 2, 'বৃত্তি নিয়ে যুক্তরাষ্ট্রে আবু সেলিম, বায়ুদূষণের আগাম সতর্কতা উদ্ভাবনে করছেন গবেষণা', 'news10.php', '2026-02-02 10:53:11'),
(3, 3, 'সাংবাদিক থেকে খায়রুল যেভাবে যুক্তরাষ্ট্রের বিশ্ববিদ্যালয়ের শিক্ষক', 'news11.php', '2026-02-02 10:53:11'),
(4, 4, 'ধাপে ধাপে চাষ করেন জাহাঙ্গীর, ১৩ বিঘা জমিতে লেটুস, থাইপাতা, চেরি টমেটো', 'news12.php', '2026-02-02 10:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `sports_news`
--

DROP TABLE IF EXISTS `sports_news`;
CREATE TABLE IF NOT EXISTS `sports_news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tab_type` enum('popular','international','goodnews') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_highlight` tinyint(1) DEFAULT '0',
  `views` int DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_news`
--

INSERT INTO `sports_news` (`id`, `title`, `tab_type`, `is_highlight`, `views`, `status`, `created_at`) VALUES
(1, 'শাবনাজ–নাইম এখন শ্বশুর–শাশুড়ি', 'popular', 0, 120, 1, '2026-02-01 09:39:04'),
(2, 'ইসির ‘দায়িত্বহীনতায়’ সাংবাদিকদের তথ্য ফাঁস', 'popular', 0, 110, 1, '2026-02-01 09:39:04'),
(3, 'ইরানের বন্দর আব্বাসে বিস্ফোরণে নিহত ১, আহত ১৪', 'popular', 0, 100, 1, '2026-02-01 09:39:04'),
(4, 'জিল্লুর রহমানের সাক্ষাৎকার নির্বাচন ঘিরে আগে এতগুলো দেশের এত সক্রিয়তা দেখা যায়নি', 'popular', 1, 90, 1, '2026-02-01 09:39:04'),
(5, '৫০তম বিসিএস প্রিলি : ২০০ প্রশ্নের সমাধান দেখুন এখানে', 'international', 0, 80, 1, '2026-02-01 09:39:04'),
(6, 'আন্তর্জাতিক খেলা ২', 'international', 0, 70, 1, '2026-02-01 09:39:04'),
(7, 'সুখবর খেলা ১', 'goodnews', 0, 60, 1, '2026-02-01 09:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `sports_news1`
--

DROP TABLE IF EXISTS `sports_news1`;
CREATE TABLE IF NOT EXISTS `sports_news1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_news1`
--

INSERT INTO `sports_news1` (`id`, `title`, `description`, `image`, `is_featured`, `created_at`) VALUES
(1, 'ভারত–পাকিস্তান ম্যাচে হিসাব–নিকাশ অনেক', 'এবারের বিশ্বকাপে পাকিস্তানের সব ম্যাচ শ্রীলঙ্কায়। যে কারণে ভারতের বিপক্ষে না খেলা মানে সেদিন মাঠে যাবে না দলটি। কিন্তু ভারতের গ্রুপ পর্বের একটি বাদে বাকি সব ম্যাচ নিজেদের দেশে। শুধু পাকিস্তানের বিপক্ষে খেলার জন্যই শ্রীলঙ্কার যাওয়ার কথা তাদের। এখন পাকিস্তান ম্যাচটি খেলবে না জানিয়ে দেওয়ার পর ভারত কী করবে?\r\n\r\nবার্তা সংস্থা এএনআই প্রশ্নটি করেছিল বিসিসিআইয়ের এক কর্মকর্তাকে। নাম প্রকাশ না করা ওই কর্মকর্তা বলেছেন, ভারত তাদের নির্ধারিত সূচি মেনেই সবকিছু করবে, ‘ভারত ১৫ ফেব্রুয়ারি শ্রীলঙ্কা সফর করবে এবং আইসিসির সব প্রটোকল মেনে চলবে।’ টুর্নামেন্টে অনুশীলন ও সংবাদ সম্মেলনের যে রীতি, সেটিও অনুসরণ করা হবে বলে জানান তিনি, ‘(ভারত) নির্ধারিত সূচি অনুযায়ী অনুশীলন করবে, সংবাদ সম্মেলন করবে এবং সময়মতো স্টেডিয়ামে পৌঁছাবে। এরপর ম্যাচ রেফারি কর্তৃক খেলাটি বাতিল ঘোষণার জন্য অপেক্ষা করবে।’\r\n\r\n২০২৬ টি-টুয়েন্টি বিশ্বকাপে ভারত ও পাকিস্তান ‘এ’ গ্রুপে আছে। একই গ্রুপের অন্য দলগুলো হচ্ছে নেদারল্যান্ডস, যুক্তরাষ্ট্র ও নামিবিয়া। দল তিনটিকে ভারতের বিপক্ষে খেলার জন্য ভারতে এবং পাকিস্তানের বিপক্ষে খেলার জন্য শ্রীলঙ্কায় যাওয়া-আসা করা লাগবে। ভারতের প্রথম ম্যাচ ৭ ফেব্রুয়ারি যুক্তরাষ্ট্রের বিপক্ষে মুম্বাইয়ে। ১২ ফেব্রুয়ারিতে দিল্লিতে নামিবিয়ার বিপক্ষে খেলে পাকিস্তান ম্যাচের জন্য তাদের শ্রীলঙ্কায় যাওয়ার কথা।\r\n\r\n', 'khela.avif', 0, '2026-02-01 15:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `sports_news2`
--

DROP TABLE IF EXISTS `sports_news2`;
CREATE TABLE IF NOT EXISTS `sports_news2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_news2`
--

INSERT INTO `sports_news2` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(1, '৪৯৬ রান ও ৩৬ ছক্কা: রান–উৎসবে রেকর্ডে ওলট–পাল', 'টি-টুয়েন্টি বিশ্বকাপে ভারতের বিপক্ষে পাকিস্তানের না খেলার সিদ্ধান্ত নেওয়াটা কঠিন ছিল, তবে তা দরকার ছিল বলে মনে করেন সাবেক ক্রিকেটার মোহাম্মদ ইউসুফ। তিনি মনে করেন, বিশ্ব ক্রিকেটে ‘সুবিধাবাদী’ প্রভাব কাজ করে থাকে, সেটি বন্ধ হওয়া উচিত।\r\n\r\nরোববার রাতে পাকিস্তান সরকার আসন্ন টি-টুয়েন্টি বিশ্বকাপে ক্রিকেট দলের অংশগ্রহণের কথা নিশ্চিত করলেও ১৫ ফেব্রুয়ারির ভারতের বিপক্ষে ম্যাচ না খেলার কথা জানিয়েছে। সরকারি ঘোষণায় কোনো কারণ উল্লেখ করা না হলেও বিশ্বকাপ থেকে বাংলাদেশকে বাদ দেওয়ার প্রেক্ষাপটে পাকিস্তান এমন কোনো সিদ্ধান্ত নিতে পারে বলে এক সপ্তাহ ধরে গুঞ্জন ছিল।', '21.avif', '2026-02-01 16:00:05'),
(2, 'খেলব না বলেও ৬ মাসে ১০ ম‍্যাচ, ভারত-পাকিস্তানের কেন এই ‘বন্ধুত্ব’', 'পাকিস্তানের হয়ে এক যুগ (১৯৯৮-২০১০) আন্তর্জাতিক ক্রিকেট খেলা ইউসুফ তাঁর দেশের সরকারের সিদ্ধান্তকে সমর্থন জানিয়ে এক্স হ্যান্ডলে লিখেছেন, ‘সরকারের নেওয়া এই অবস্থানটি কঠিন হলেও দরকারি। বাণিজ্যিক স্বার্থের আগে মূল্যবোধকে অগ্রাধিকার দিতে হবে। বিশ্ব ক্রিকেটে যে ‘সুবিধাবাদী’ প্রভাব কাজ করছে, তা বন্ধ না হলে খেলাটি সত্যিকার অর্থে বৈশ্বিক হতে পারবে না। আমরা গর্বের সঙ্গে খেলি, পাশাপাশি খেলাধুলায় সমতা ও ন্যায়ের পক্ষেও দাঁড়াই।’\r\n\r\nলেখার সঙ্গে তিনি আইসিসি, বিসিসিআই, বিসিবি, পাকিস্তান ক্রিকেট, গ্লোবাল ক্রিকেট, ফেয়ারপ্লে ও জাস্টিন ইন ক্রিকেট হ্যাশট্যাগ ব্যবহার করেছেন।\r\n\r\n', '25.avif', '2026-02-01 16:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `video_file`, `thumbnail`, `category`, `views`, `status`, `created_at`) VALUES
(1, 'কুমিল্লার ছেলেদের হাতেই হাসিনা দেশ ছেড়ে পালাতে বাধ্য হয়েছে', '_Hasnat_Abdullah_NCP_Jamuna_TV_144P.mp4', '3.avif', NULL, 0, 1, '2026-02-01 10:14:24'),
(2, 'কুমিল্লার ছেলেদের হাতেই হাসিনা দেশ ছেড়ে পালাতে বাধ্য হয়েছে', '_Hasnat_Abdullah_NCP_Jamuna_TV_144P.mp4', '4.avif', NULL, 0, 1, '2026-02-01 10:21:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
