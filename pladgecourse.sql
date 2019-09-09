-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 09, 2019 alle 14:04
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pladgecourse`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantita` int(11) DEFAULT '0',
  `costo` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `cards`
--

INSERT INTO `cards` (`id`, `nome`, `descrizione`, `quantita`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'Ei-Token EIPASS Unica', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(2, 'Eipass Corsi on-line', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(3, 'UPGRADE', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(4, 'PEKIT', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(5, 'Inglese Token A1', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(6, 'Inglese Token A2', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(7, 'Inglese Token B1', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(8, 'Inglese Token B2', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(9, 'Inglese Token C1', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(10, 'Inglese Token C2', NULL, 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40');

-- --------------------------------------------------------

--
-- Struttura della tabella `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` enum('insede','online') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iscrizione` double(8,2) DEFAULT NULL,
  `esami` int(11) DEFAULT NULL,
  `costo` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesso` enum('maschio','femmina') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codfiscale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellulare` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `provincia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indirizzo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cittadom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinciadom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titolostudio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupazione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `customers`
--

INSERT INTO `customers` (`id`, `nome`, `cognome`, `sesso`, `codfiscale`, `telefono`, `cellulare`, `email`, `password`, `citta`, `data`, `provincia`, `indirizzo`, `cittadom`, `provinciadom`, `cap`, `titolostudio`, `occupazione`, `active`, `type`, `creator`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Cameron Dare Jr.', 'Kuhlman', 'maschio', 'eligendi', '220.831.2396', '+1.309.327.2394', 'ullrich.casper@example.com', 'z\\<3U#e8kY', 'South Berneicemouth', '2011-12-05', 'DE', '62664 McKenzie Spring Apt. 952', 'Port Eldridgefort', 'NC', '47422', 'odit', 'cum', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:38'),
(2, 'Norma Kulas', 'Abbott', 'maschio', 'et', '605-890-4510 x675', '+1-965-753-5685', 'keeling.adan@example.com', 'v}v6:42', 'Janyborough', '1996-10-28', 'CA', '53908 Iliana Knoll', 'Goldnerville', 'AR', '17800', 'distinctio', 'velit', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:38'),
(3, 'Dean Green DVM', 'Quigley', 'maschio', 'quos', '243-284-0927 x4767', '373-984-3609', 'swisozk@example.net', 'h\',iXE}s=505}@6#A{', 'Kaelynburgh', '1990-01-06', 'KY', '5910 Bradtke Junctions', 'North Nella', 'IA', '38125', 'et', 'laboriosam', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:38'),
(4, 'Prof. Erick Dicki', 'Kozey', 'maschio', 'et', '1-674-477-5827', '(543) 818-9123 x0268', 'fritsch.elliott@example.com', 'p%!2p8<9\'rHs/7+=cs', 'North Linnie', '1971-12-21', 'WY', '6883 Wilfredo Mountains', 'New Treva', 'DE', '36245-6072', 'officia', 'eum', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(5, 'Delilah Ankunding', 'Roberts', 'maschio', 'sit', '763.342.1060', '1-257-259-0394 x60265', 'johnson.hope@example.com', 'Qdy_l\"9h9)N', 'Bartolettishire', '2002-11-14', 'OH', '37450 Stanton Street Suite 008', 'West Hillard', 'OR', '81103', 'enim', 'dolorum', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(6, 'Enrique Bednar PhD', 'Wunsch', 'maschio', 'veritatis', '+1 (656) 937-6511', '998-234-4209', 'heaney.elna@example.net', '/]N2SrKh0L67bG', 'Starkburgh', '2009-10-29', 'VA', '54430 Lavon Gardens Suite 934', 'South Norwoodville', 'UT', '55177-9003', 'ut', 'optio', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(7, 'Prof. Devon Grant DDS', 'Monahan', 'maschio', 'voluptas', '1-961-282-1346', '789.677.5028 x9478', 'sterling.langosh@example.com', 'dVs62ggM&sZEx', 'Port Justicehaven', '1998-05-01', 'OH', '7065 Ryan Radial Suite 902', 'Gorczanyland', 'NC', '51257', 'et', 'eum', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(8, 'Georgianna Ortiz', 'Altenwerth', 'maschio', 'libero', '694.499.6761 x684', '(254) 680-8314', 'sterling.spinka@example.org', 'r\\:BKFK', 'Fatimaview', '1983-08-31', 'MN', '97375 Schultz Glen', 'Ervinborough', 'ND', '82587-1630', 'consectetur', 'nobis', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(9, 'Prof. Finn Eichmann III', 'Smith', 'maschio', 'occaecati', '(564) 904-8680', '639.490.8994 x9885', 'nona85@example.com', 'uiw-\\.n\"', 'West Uriahborough', '2012-08-24', 'VA', '146 Jakubowski Ridge', 'Bessieburgh', 'NC', '83865', 'accusantium', 'sit', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(10, 'Brooklyn Pacocha DDS', 'Stamm', 'maschio', 'dolorum', '769.985.1627 x6210', '+19097307395', 'myriam57@example.com', '+mX:r~R?kFNj', 'Port Elfriedafurt', '1971-12-16', 'TN', '2596 Kaylee Locks', 'Lake Careyton', 'NC', '95553-3126', 'placeat', 'cumque', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(11, 'Annie Gerlach DDS', 'Pfannerstill', 'maschio', 'cumque', '913-698-5009 x71700', '(203) 633-0804 x66193', 'sipes.saige@example.org', '^yRWo(nE?4_W', 'Jessikaland', '1975-08-10', 'ME', '5489 Tania Expressway Apt. 383', 'Lake Annamaeberg', 'RI', '90940-3032', 'saepe', 'aut', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(12, 'Prof. Chloe Jast', 'Barton', 'maschio', 'ea', '+1 (843) 612-3033', '1-516-908-6496', 'strosin.cortney@example.org', 'G(&[aNy?y.ck\'~^,s', 'New Fabianmouth', '2016-10-03', 'VT', '440 Kuhic Light', 'North Madie', 'ME', '28277', 'similique', 'sed', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(13, 'Nya Doyle', 'Hahn', 'maschio', 'voluptatem', '1-889-671-6310', '+1 (460) 950-8437', 'cornelius.feil@example.net', '|GfgF!W1{uL3dPOc@J', 'Eliseoport', '1975-11-24', 'KY', '3044 Liana Bridge', 'South Nicoleburgh', 'GA', '40605-3443', 'pariatur', 'dolore', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(14, 'Dr. Glen Rosenbaum', 'Boyle', 'maschio', 'vitae', '595.533.2727 x687', '651.371.7211 x52673', 'caroline.metz@example.net', 'F+iO>^', 'Connellychester', '2007-04-27', 'AL', '165 Millie Hills', 'Hauckmouth', 'MS', '89126', 'minus', 'culpa', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(15, 'Beth Krajcik DVM', 'Bartell', 'maschio', 'ea', '(659) 519-7177 x41767', '221-537-8254', 'braun.maggie@example.net', 'N+V>,S|Kn7dAFd$7L', 'Lubowitzberg', '2000-10-18', 'WI', '4701 Hermann Orchard Apt. 289', 'Cleoraview', 'FL', '08203', 'non', 'est', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(16, 'Lea Bode', 'Dietrich', 'maschio', 'fuga', '+1 (369) 825-1354', '248-421-5870 x84650', 'neha30@example.org', 'nvi/2X[#`\\[S,d\'y', 'New Makenzieland', '1975-05-15', 'GA', '769 Mayert Mountains', 'Schmittfort', 'NV', '99020-1474', 'ullam', 'itaque', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(17, 'Yoshiko Paucek', 'Vandervort', 'maschio', 'beatae', '1-881-432-8771', '852-546-9763', 'jamar.carter@example.net', 'mu\"3XdlJm@z#', 'Douglasland', '2010-02-22', 'LA', '938 Hodkiewicz Roads', 'New Payton', 'MI', '89186-1435', 'expedita', 'laudantium', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(18, 'Justus Monahan III', 'Block', 'maschio', 'corporis', '+1-484-439-4993', '939.483.6422', 'elroy.maggio@example.org', ':B^^(kG', 'Gulgowskiside', '1985-01-16', 'OH', '28296 Jonathon Mission Apt. 837', 'East Ivahburgh', 'MI', '45765-0775', 'ut', 'commodi', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(19, 'Glenna Von', 'O\'Keefe', 'maschio', 'est', '486.350.7953', '865.771.1338', 'lindgren.faustino@example.net', '0O9Pg@r', 'Weimannmouth', '1998-01-13', 'IL', '1696 Kshlerin Tunnel', 'Gerholdside', 'PA', '41544-7646', 'ut', 'magni', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39'),
(20, 'Donald Hagenes', 'Kshlerin', 'maschio', 'cum', '1-662-847-2113', '(996) 658-1002', 'cummerata.althea@example.net', '0A>C#Zl){', 'West Aida', '2009-04-16', 'AK', '17313 Rutherford Mission', 'Angeloton', 'NC', '23233-4895', 'quam', 'praesentium', '0', '0', '1', '2019-09-05 13:49:38', '2019-09-05 13:49:39');

-- --------------------------------------------------------

--
-- Struttura della tabella `eicardcodes`
--

CREATE TABLE `eicardcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attivo` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operatore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `logcards`
--

CREATE TABLE `logcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `operatore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantita` int(11) NOT NULL,
  `costo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_03_141143_create_customers_table', 1),
(4, '2019_08_03_164921_create_companies_table', 1),
(5, '2019_08_28_082618_create_courses_table', 1),
(6, '2019_08_28_123718_create_modules_table', 1),
(7, '2019_08_29_085509_create_cards_table', 1),
(8, '2019_08_29_094637_create_logcards_table', 1),
(9, '2019_08_29_103055_create_proposals_table', 1),
(10, '2019_08_29_103747_create_proposal_items_table', 1),
(11, '2019_08_29_104121_create_settings_table', 1),
(12, '2019_08_30_105728_create_permissions_table', 1),
(13, '2019_08_30_105737_create_roles_table', 1),
(14, '2019_08_30_110033_create_users_permissions_table', 1),
(15, '2019_08_30_110145_create_users_roles_table', 1),
(16, '2019_08_30_110231_create_roles_permissions_table', 1),
(17, '2019_08_30_151402_create_eicardcodes_table', 1),
(18, '2019_08_31_093948_create_transactions_table', 1),
(19, '2019_09_02_123226_create_xsettings_table', 1),
(20, '2019_09_04_164710_create_tokens_table', 1),
(21, '2019_09_05_140424_create_tokenlogs_table', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durata` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costo` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'create-tasks', 'Create Tasks', '2019-09-05 13:49:37', '2019-09-05 13:49:37'),
(2, 'edit-users', 'Edit Users', '2019-09-05 13:49:37', '2019-09-05 13:49:37');

-- --------------------------------------------------------

--
-- Struttura della tabella `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `codice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totale` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `proposal_items`
--

CREATE TABLE `proposal_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Front-end Developer', '2019-09-05 13:49:37', '2019-09-05 13:49:37'),
(2, 'user', 'General User', '2019-09-05 13:49:37', '2019-09-05 13:49:37');

-- --------------------------------------------------------

--
-- Struttura della tabella `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titolo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `settings`
--

INSERT INTO `settings` (`id`, `titolo`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'PladgeCourse', 'info@pladgepeople.it', '/img.png', '2019-09-05 13:49:38', '2019-09-05 13:49:38');

-- --------------------------------------------------------

--
-- Struttura della tabella `tokenlogs`
--

CREATE TABLE `tokenlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `costo` double(8,2) DEFAULT '0.00',
  `totale` double(8,2) DEFAULT '0.00',
  `quantita` int(11) DEFAULT '0',
  `tipomovimento` enum('in','out') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operatore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `tokenlogs`
--

INSERT INTO `tokenlogs` (`id`, `token_id`, `costo`, `totale`, `quantita`, `tipomovimento`, `operatore`, `created_at`, `updated_at`) VALUES
(1, 1, 20.00, 100.00, 5, 'out', '1', '2019-09-05 13:49:59', '2019-09-05 13:49:59'),
(2, 2, 15.00, 45.00, 3, 'out', '1', '2019-09-05 13:50:06', '2019-09-05 13:50:06'),
(3, 3, 5.00, 20.00, 4, 'out', '1', '2019-09-05 13:50:19', '2019-09-05 13:50:19'),
(4, 3, 10.00, 50.00, 5, 'out', '1', '2019-09-05 13:50:29', '2019-09-05 13:50:29'),
(5, 7, 3.00, 6.00, 2, 'out', '1', '2019-09-05 14:02:51', '2019-09-05 14:02:51'),
(6, 9, 5.00, 10.00, 2, 'out', '1', '2019-09-05 14:03:27', '2019-09-05 14:03:27'),
(7, 5, 12.00, 60.00, 5, 'out', '1', '2019-09-05 14:04:05', '2019-09-05 14:04:05'),
(8, 1, 33.00, 726.00, 22, 'out', '1', '2019-09-05 14:04:27', '2019-09-05 14:04:27'),
(9, 1, 44.00, 1452.00, 33, 'out', '1', '2019-09-05 14:05:37', '2019-09-05 14:05:37'),
(10, 1, 44.00, 1452.00, 333, 'out', '1', '2019-09-05 14:06:02', '2019-09-05 14:46:24'),
(11, 1, 44.00, 1452.00, 33, 'out', '1', '2019-09-05 14:06:56', '2019-09-05 14:06:56'),
(12, 6, 3.00, 12.00, 4, 'out', '1', '2019-09-05 14:07:12', '2019-09-05 14:07:12');

-- --------------------------------------------------------

--
-- Struttura della tabella `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantita` int(11) DEFAULT '0',
  `costo` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `tokens`
--

INSERT INTO `tokens` (`id`, `nome`, `quantita`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'Ei-Token EIPASS Unica', 126, 44.00, '2019-09-05 13:49:39', '2019-09-05 14:06:56'),
(2, 'Eipass Corsi on-line', 3, 15.00, '2019-09-05 13:49:39', '2019-09-05 13:50:06'),
(3, 'UPGRADE', 9, 10.00, '2019-09-05 13:49:39', '2019-09-05 13:50:29'),
(4, 'PEKIT', 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(5, 'Inglese Token A1', 5, 12.00, '2019-09-05 13:49:40', '2019-09-05 14:04:05'),
(6, 'Inglese Token A2', 4, 3.00, '2019-09-05 13:49:40', '2019-09-05 14:07:12'),
(7, 'Inglese Token B1', 2, 3.00, '2019-09-05 13:49:40', '2019-09-05 14:02:51'),
(8, 'Inglese Token B2', 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40'),
(9, 'Inglese Token C1', 2, 5.00, '2019-09-05 13:49:40', '2019-09-05 14:03:27'),
(10, 'Inglese Token C2', 0, 0.00, '2019-09-05 13:49:40', '2019-09-05 13:49:40');

-- --------------------------------------------------------

--
-- Struttura della tabella `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` enum('in','out') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ricorrente` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cifra` double(8,2) DEFAULT NULL,
  `operatore` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Riccardo Virgilio', 'riccardo.virgilio@gmail.com', NULL, '$2y$10$rVegkFmcEjMTP9EYhAKLhefasSqKZDJ1pjIqtAzF6EHnYIuj57K9W', NULL, '2019-09-05 13:49:37', '2019-09-05 13:49:37'),
(2, 'Asad Butt', 'asad@thewebtier.com', NULL, '$2y$10$emATsFFbRj3ZOhZjQBVfDe190c9giEFc5mujXYs7szAnk01tNHmpO', NULL, '2019-09-05 13:49:38', '2019-09-05 13:49:38');

-- --------------------------------------------------------

--
-- Struttura della tabella `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `xsettings`
--

CREATE TABLE `xsettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valore` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `eicardcodes`
--
ALTER TABLE `eicardcodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eicardcodes_codice_unique` (`codice`);

--
-- Indici per le tabelle `logcards`
--
ALTER TABLE `logcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logcards_card_id_foreign` (`card_id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_course_id_foreign` (`course_id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_user_id_foreign` (`user_id`),
  ADD KEY `proposals_customer_id_foreign` (`customer_id`);

--
-- Indici per le tabelle `proposal_items`
--
ALTER TABLE `proposal_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_items_proposal_id_foreign` (`proposal_id`);

--
-- Indici per le tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indici per le tabelle `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tokenlogs`
--
ALTER TABLE `tokenlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokenlogs_token_id_foreign` (`token_id`);

--
-- Indici per le tabelle `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indici per le tabelle `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indici per le tabelle `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- Indici per le tabelle `xsettings`
--
ALTER TABLE `xsettings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `eicardcodes`
--
ALTER TABLE `eicardcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `logcards`
--
ALTER TABLE `logcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `proposal_items`
--
ALTER TABLE `proposal_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `tokenlogs`
--
ALTER TABLE `tokenlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `xsettings`
--
ALTER TABLE `xsettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `logcards`
--
ALTER TABLE `logcards`
  ADD CONSTRAINT `logcards_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`);

--
-- Limiti per la tabella `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Limiti per la tabella `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `proposals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `proposal_items`
--
ALTER TABLE `proposal_items`
  ADD CONSTRAINT `proposal_items_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`);

--
-- Limiti per la tabella `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `tokenlogs`
--
ALTER TABLE `tokenlogs`
  ADD CONSTRAINT `tokenlogs_token_id_foreign` FOREIGN KEY (`token_id`) REFERENCES `tokens` (`id`);

--
-- Limiti per la tabella `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
