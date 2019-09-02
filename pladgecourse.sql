-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 02, 2019 alle 15:07
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
  `quantita` int(11) DEFAULT NULL,
  `costo` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `cards`
--

INSERT INTO `cards` (`id`, `nome`, `descrizione`, `quantita`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'EICARD', NULL, 10, 50.00, '2019-08-30 14:30:46', '2019-08-30 14:32:50'),
(2, 'PEKIT', NULL, 20, 50.00, '2019-08-30 14:31:04', '2019-08-30 14:35:23'),
(3, 'INGLESE', NULL, 20, 40.00, '2019-08-30 14:31:15', '2019-08-30 14:35:34'),
(4, 'UPGRADE', NULL, NULL, NULL, '2019-09-01 10:58:10', '2019-09-01 10:58:10');

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

--
-- Dump dei dati per la tabella `companies`
--

INSERT INTO `companies` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 're', 'ert', '2019-09-01 07:33:12', '2019-09-01 07:33:12');

-- --------------------------------------------------------

--
-- Struttura della tabella `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esame` text COLLATE utf8mb4_unicode_ci,
  `costo` double(8,2) NOT NULL,
  `iscrizione` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `courses`
--

INSERT INTO `courses` (`id`, `nome`, `descrizione`, `esame`, `costo`, `iscrizione`, `created_at`, `updated_at`) VALUES
(9, 'INGLESE', NULL, '300', 50.00, NULL, '2019-08-31 10:52:47', '2019-09-02 09:23:39'),
(11, 'EIPASS 7 MODULI', NULL, '180', 120.00, NULL, '2019-08-31 12:33:36', '2019-09-02 09:54:38'),
(12, 'CAD', NULL, NULL, 75.00, NULL, '2019-09-01 11:01:31', '2019-09-01 11:01:31');

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
(1, 'Luca', 'Egidio', 'maschio', 'bnpsnl86t27h501n', '3339285000', '3339285000', 'luca@egi.it', 'Vrz021281', 'Andria', '2019-08-27', 'bo', 'Viale Trentino, 47', 'Bellizzi', 'bn', '84092', 'informatico', 'grafico pubblicitario', '1', '0', '1', '2019-08-31 09:39:36', '2019-09-01 11:01:10'),
(2, 'VIEVI S.A.S.DI', 'RICCARDO', 'maschio', 'vrgrcr81t02a285q', '3339285000', '3775347151', 'virzillo@hotmail.com', 'password', 'Andria', '2019-08-06', 'bt', 'VIA BARLETTA 115', 'ANDRIA', 'bt', '76123', 'informatico', 'programmatore', '1', '0', '1', '2019-08-31 12:36:59', '2019-08-31 12:36:59'),
(3, 'Luca', 'Egidio', 'maschio', 'bnpsnl86t27h501n', '3339285000', '3339285000', 'luca@egi.it', 'Vrz021281', 'Andria', '2019-08-27', 'bo', 'Viale Trentino, 47', 'Bellizzi', 'sa', '84092', 'informatico', 'grafico pubblicitario', '1', '0', '1', '2019-09-01 11:00:34', '2019-09-01 11:00:34');

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

--
-- Dump dei dati per la tabella `eicardcodes`
--

INSERT INTO `eicardcodes` (`id`, `codice`, `attivo`, `operatore`, `created_at`, `updated_at`) VALUES
(1, '000123123', '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:34:56'),
(2, '000123124', '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:53:11'),
(3, '000123125', '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:53:15'),
(4, NULL, '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:32:50'),
(5, NULL, '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:32:50'),
(6, NULL, '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:32:50'),
(7, NULL, '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:32:50'),
(8, NULL, '1', NULL, '2019-08-30 14:32:50', '2019-08-30 14:32:50'),
(9, NULL, '1', NULL, '2019-08-30 14:32:51', '2019-08-30 14:32:51'),
(10, NULL, '1', NULL, '2019-08-30 14:32:51', '2019-08-30 14:32:51');

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

--
-- Dump dei dati per la tabella `logcards`
--

INSERT INTO `logcards` (`id`, `card_id`, `operatore`, `quantita`, `costo`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 10, 50.00, '2019-08-30 14:32:50', '2019-08-30 14:32:50'),
(2, 2, '1', 20, 50.00, '2019-08-30 14:35:23', '2019-08-30 14:35:23'),
(3, 3, '1', 20, 40.00, '2019-08-30 14:35:34', '2019-08-30 14:35:34');

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
(18, '2019_08_31_093948_create_transactions_table', 2),
(19, '2019_09_02_123226_create_xsettings_table', 3);

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

--
-- Dump dei dati per la tabella `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `nome`, `descrizione`, `durata`, `costo`, `created_at`, `updated_at`) VALUES
(1, 9, 'prima fase', 'asd', '12', 150.00, '2019-08-31 10:54:03', '2019-08-31 10:54:03'),
(2, 11, 'esami1', 'dsfsdf', NULL, 200.00, '2019-09-01 10:47:39', '2019-09-01 10:47:39'),
(3, 11, 'esame 2', 'lsfhglsfh', NULL, 150.00, '2019-09-01 10:48:22', '2019-09-01 10:48:22'),
(4, 9, 'seconda fase', 'sòlkjdf', NULL, 300.00, '2019-09-01 10:49:54', '2019-09-01 10:49:54'),
(7, 12, 'esame1', NULL, NULL, 50.00, '2019-09-01 11:01:52', '2019-09-01 11:01:52');

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
(1, 'create-tasks', 'Create Tasks', '2019-08-30 14:28:08', '2019-08-30 14:28:08'),
(2, 'edit-users', 'Edit Users', '2019-08-30 14:28:08', '2019-08-30 14:28:08');

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
(1, 'admin', 'Front-end Developer', '2019-08-30 14:28:08', '2019-08-30 14:28:08'),
(2, 'user', 'General User', '2019-08-30 14:28:08', '2019-08-30 14:28:08');

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
(1, 'PladgeCourse', 'info@pladgepeople.it', '/uploads/images/PladgeCourse_1567428705.png', '2019-08-21 22:00:00', '2019-09-02 10:51:45');

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

--
-- Dump dei dati per la tabella `transactions`
--

INSERT INTO `transactions` (`id`, `nome`, `descrizione`, `tipo`, `ricorrente`, `cifra`, `operatore`, `created_at`, `updated_at`) VALUES
(1, 'Virgilio', 'pagamento mesile', 'in', '0', 122.00, '1', '2019-08-31 08:49:30', '2019-08-31 08:49:30'),
(2, 'pagamento postino', 'postino', 'out', '1', 25.00, '1', '2019-08-31 08:58:42', '2019-08-31 08:58:42'),
(3, 'intervento', 'pagamento lavoro su pc', 'in', '0', 50.00, '1', '2019-08-31 09:04:49', '2019-08-31 09:04:49'),
(4, 'Affitto', 'affito locale', 'out', '0', 600.00, '1', '2019-08-31 11:01:59', '2019-08-31 11:01:59');

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
(1, 'Riccardo Virgilio', 'riccardo.virgilio@gmail.com', NULL, '$2y$10$LnobegE0DrKkwKRdDM0tCOXu9Dg1DfZ.FGR9VbE6rzHDR0uOs6O1e', NULL, '2019-08-30 14:28:09', '2019-08-30 14:28:09'),
(2, 'Asad Butt', 'asad@thewebtier.com', NULL, '$2y$10$unAzen5xZ/dbxQ2Me48r6OmZZCTba1/fXicz8yntNjGsFmVLm9oSu', NULL, '2019-08-30 14:28:09', '2019-08-30 14:28:09');

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
-- Dump dei dati per la tabella `xsettings`
--

INSERT INTO `xsettings` (`id`, `nome`, `valore`, `created_at`, `updated_at`) VALUES
(1, 'TipoPagamento', 'Contati', '2019-09-02 10:46:24', '2019-09-02 10:46:24'),
(2, 'TipoPagamento', 'Rate Mensili', '2019-09-02 10:46:35', '2019-09-02 10:46:35'),
(3, 'TipoPagamento', 'Bonifico', '2019-09-02 10:46:45', '2019-09-02 10:46:45'),
(4, 'TipoPagamento', 'Paypal', '2019-09-02 10:46:53', '2019-09-02 10:46:53');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `eicardcodes`
--
ALTER TABLE `eicardcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `logcards`
--
ALTER TABLE `logcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT per la tabella `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `xsettings`
--
ALTER TABLE `xsettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
