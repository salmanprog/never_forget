-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2025 at 07:30 AM
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
-- Database: `never-forget`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `first_title` varchar(255) DEFAULT NULL,
  `second_title` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `first_image` varchar(255) DEFAULT NULL,
  `second_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `created_by`, `first_title`, `second_title`, `heading`, `description`, `first_image`, `second_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Best Restaurant', 'Rajani’s Kitchen', 'Great taste for satisfaction!', '<p>In half a decade&rsquo;s history, Rajani&rsquo;s Kitchen has consistently strived to be more than just another Indian restaurant.<br /><br />Rajani&rsquo;s Kitchen is established in 2017 by Mrs. Rajani Bondugula&rsquo;s family, Rajani&rsquo;s Kitchen started out as a &ldquo;Best Kept Secret&rdquo; restaurant that has turned into a regionally celebrated foodie destination for Indian / Telugu community for homemade food in Chantilly, Fairfax County, Virginia &amp; Washington DC metropolitan area. People consider Rajani&rsquo;s Kitchen as their second kitchen at home far away from their home in India.</p>', '20240205183048.jpg', '20240205183048.png', '1', NULL, '2024-02-05 13:22:29', '2024-02-05 13:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_addresses`
--

INSERT INTO `billing_addresses` (`id`, `customer_id`, `first_name`, `last_name`, `company`, `country`, `street`, `town`, `postcode`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Haviva', 'Chavez', 'Burris and Stephens Trading', 'Iraq', 'Esse quod magni id', 'Cum sunt occaecat en', '84', '577', 'rokovahe@mailinator.com', '1', '2022-07-12 13:25:24', '2022-07-12 13:25:24'),
(2, '1', 'Reuben', 'Bernard', 'Vang Dennis Associates', 'Kazakhstan', 'Eius aperiam ipsa e', 'Quas nesciunt atque', '82', '565', 'lusef@mailinator.com', '1', '2022-07-12 13:27:15', '2022-07-12 13:27:15'),
(3, '65', 'Roanna', 'Malone', 'George Miller Plc', 'Dominican Republic', 'Hic eius consequuntu', 'Excepturi sit volupt', '97', '182', 'fypufaf@mailinator.com', '1', '2022-07-12 13:29:55', '2022-07-12 13:29:55'),
(4, '66', 'Kaden', 'Clemons', 'Curtis Wolfe Inc', 'Antigua & Barbuda', 'Odio rerum qui cupid', 'Fuga Consequatur q', '84', '147', 'zivezih@mailinator.com', '1', '2022-07-13 11:41:40', '2022-07-13 11:41:40'),
(5, '71', 'Raja', 'Test', 'Test', 'Benin', '12312312c', 'test123', '1232', '1231231231', 'test@test.com', '1', '2023-10-16 22:21:35', '2023-10-16 22:21:35'),
(6, '71', 'Raja', 'Test', 'Test', 'Pakistan', 'test123', 'test123', '12345', '123456789', 'raja@madmindscreative.com', '1', '2023-10-27 16:02:23', '2023-10-27 16:02:23'),
(7, '73', 'Muhammad', 'Azeem', 'MMC', 'Pakistan', '292', 'karachi', '74800', '03433399897', 'azeemdawn@gmail.com', '1', '2023-10-27 17:37:54', '2023-10-27 17:37:54'),
(9, '75', 'Jhon', 'Doe', 'test', 'Afganistan', 'test', 'ToCity', '90011', '1231231231', 'test@123test.com', '1', '2024-02-01 11:19:39', '2024-02-01 12:01:49'),
(11, '76', 'Test', 'Test', 'Test', 'United States of America', 'Test', 'Test', '90001', '1231231231', 'email.@gmail.com', '1', '2024-02-02 13:47:58', '2024-02-02 13:47:58'),
(12, '77', 'Christopher', 'Gallegos', 'Pittman Hunt Associates', 'South Africa', 'Non et accusantium c', 'Sint aperiam incidu', '7', '622', 'kidewabyj@mailinator.com', '1', '2024-02-07 15:23:11', '2024-02-07 15:23:11'),
(19, '81', 'Rhonda', 'Sigourney', 'Raymond', 'Craig', 'Nigel', 'Deanna', 'Cheyenne', 'Madeson', 'Peter', '1', '2025-05-20 15:39:08', '2025-05-20 15:39:08'),
(20, '0', 'Robin', 'Marsh', 'Giles Alston Trading', 'Ipsum eos culpa n', 'At quod fugiat sint', 'Quibusdam proident', 'Enim irure voluptas', '+1 (845) 228-8791', 'bolax@mailinator.com', '1', '2025-10-02 16:10:31', '2025-10-02 16:10:31'),
(21, '0', 'Nayda', 'Mack', 'Wilder Walsh Associates', 'Fugit molestias sun', 'Excepteur tempora eo', 'Quasi delectus cum', '56453', '+1 (793) 957-6483', 'xasetuqy@mailinator.com', '1', '2025-10-02 16:15:26', '2025-10-02 16:15:26'),
(22, '0', 'Rhona', 'Hickman', 'Johnson and Guerrero LLC', 'Non animi exercitat', 'Do sit enim in dolo', 'Corrupti tempora vo', '6546545', '+1 (787) 647-9584', 'jajelyt@mailinator.com', '1', '2025-10-02 16:18:40', '2025-10-02 16:18:40'),
(23, '0', 'Rhea', 'Mendez', 'Petty Valencia Plc', 'Aut magna distinctio', 'Culpa earum tenetur', 'Officia est voluptat', '5465', '+1 (748) 634-4919', 'farode@mailinator.com', '1', '2025-10-02 16:23:11', '2025-10-02 16:23:11'),
(24, '0', 'Keely', 'Tanner', 'Nieves and Carrillo LLC', 'Quia inventore iure', 'Sint autem exercitat', 'Accusamus sit ut in', '65454', '+1 (461) 331-6654', 'viruw@mailinator.com', '1', '2025-10-02 16:43:34', '2025-10-02 16:43:34'),
(25, '0', 'Hayden', 'Browning', 'Vasquez and Blankenship Associates', 'Recusandae Eum mini', 'Omnis qui ea eaque a', 'Adipisicing aliquam', '54545', '+1 (204) 547-7269', 'dimuhob@mailinator.com', '1', '2025-10-02 16:48:04', '2025-10-02 16:48:04'),
(26, '0', 'Eliana', 'Bird', 'Gordon and Rowland Traders', 'In eveniet ipsum ob', 'Dolor neque saepe qu', 'Incididunt dolor acc', '654656', '+1 (421) 962-1263', 'jeqyloq@mailinator.com', '1', '2025-10-02 16:54:45', '2025-10-02 16:54:45'),
(27, '0', 'Roary', 'Harper', 'Floyd Merrill Traders', 'Alias irure sed odio', 'Perferendis enim in', 'Sunt excepteur optio', '3222121', '+1 (617) 762-4954', 'asjadmmc67@gmail.com', '1', '2025-10-02 17:07:16', '2025-10-02 17:07:16'),
(30, '0', 'Desirae', 'Griffith', 'James and Collins Plc', 'Nesciunt aut porro', 'Ipsa qui voluptatem', 'Saepe sint ad volup', '565465', '+1 (249) 654-2549', 'asjadmmc67@gmail.com', '1', '2025-10-02 17:21:40', '2025-10-02 17:21:40'),
(31, '0', 'George', 'Mercer', 'Britt Mayo Associates', 'Odit in nobis volupt', 'Similique molestias', 'Tenetur nemo Nam vol', '545454', '+1 (358) 788-4618', 'asjadmmc67@gmail.com', '1', '2025-10-02 17:26:12', '2025-10-02 17:26:12'),
(32, '0', 'Kylee', 'Stephenson', 'Simmons and Norris Trading', 'Similique dicta eos', 'Tempor tempore est', 'Aliqua Qui fugit i', '654654', '+1 (266) 315-7639', 'asjadmmc67@gmail.com', '1', '2025-10-02 17:31:10', '2025-10-02 17:31:10'),
(33, '0', 'Sarah', 'Cleveland', 'Aguirre Oneil Inc', 'Maiores cupidatat et', 'Nam proident vel di', 'Ex ullam praesentium', '745425', '+1 (863) 687-5829', 'asjadmmc67@gmail.com', '1', '2025-10-02 17:35:30', '2025-10-02 17:35:30'),
(34, '0', 'Peter', 'Caldwell', 'Guy Bradford LLC', 'Est facilis ad labor', 'Suscipit nisi laboru', 'Facilis obcaecati qu', '5454654', '+1 (847) 197-4213', 'asjadmmc67@gmail.com', '1', '2025-10-02 17:38:16', '2025-10-02 17:38:16'),
(35, '82', 'Tanya', 'Ronan', 'Nehru', 'Flynn', 'Risa', 'Logan', '5155454', '+1 (766) 464-8043', 'dufecysydy@mailinator.com', '1', '2025-10-02 17:50:30', '2025-10-02 17:50:30'),
(36, '0', 'Cassidy', 'Prince', 'Sanford Neal Inc', 'Ipsa dolor ducimus', 'Et quis et sit non a', 'In possimus fugit', 'Sit est beatae conse', '+1 (714) 834-4902', 'waxydap@mailinator.com', '1', '2025-10-13 19:05:37', '2025-10-13 19:05:37'),
(37, '0', 'Alex', 'Youn', '', 'USA', 'street 123', 'albama', '12546', '1231231234', 'alex@yopmail.com', '1', '2025-10-17 09:49:39', '2025-10-17 09:49:39'),
(38, '101', 'Kirby', 'Ortega', 'Monroe and Neal Inc', 'Ut magnam rem dolore', 'Molestiae suscipit a', 'Voluptas eum eu cons', 'Aut sunt dolor in id', '+1 (607) 936-9249', 'gajoqymur@mailinator.com', '1', '2025-10-17 15:00:43', '2025-10-17 15:00:43'),
(39, '102', 'Owen', 'Brock', 'Sweet and Gates Plc', 'Perferendis omnis la', 'Voluptatem amet la', 'Qui reprehenderit mo', 'Odio vero velit lore', '+1 (728) 688-4032', 'liwivesu@mailinator.com', '1', '2025-10-17 15:06:25', '2025-10-17 15:06:25'),
(40, '103', 'Amos', 'Hendricks', 'Sykes and Blackburn Inc', 'Sequi ratione sed ex', 'Et nisi voluptatibus', 'Est soluta nulla dol', 'Ratione qui proident', '+1 (285) 503-4806', 'jeluses@mailinator.com', '1', '2025-10-17 15:10:15', '2025-10-17 15:10:15'),
(41, '104', 'Eaton', 'Giles', 'Meyer and Gordon Plc', 'Commodi labore quis', 'Nihil est dolorem no', 'Dicta facere sunt ul', 'Itaque ad sint sed p', '+1 (716) 492-5706', 'lajef@mailinator.com', '1', '2025-10-17 15:13:46', '2025-10-17 15:13:46'),
(42, '105', 'Richard', 'Woods', 'Howard Bullock Traders', 'Et laboris illo aut', 'Ad autem aliqua Rat', 'Cillum animi quae o', 'Id commodo tempor al', '+1 (884) 485-7176', 'qecycekoli@mailinator.com', '1', '2025-10-17 15:16:14', '2025-10-17 15:16:14'),
(43, '106', 'Inga', 'Snow', 'Cabrera Bailey LLC', 'Quis sequi voluptas', 'Aut ipsum sed ration', 'In voluptas accusamu', 'Qui obcaecati praese', '+1 (814) 965-3016', 'rydac@mailinator.com', '1', '2025-10-17 15:18:33', '2025-10-17 15:18:33'),
(44, '107', 'Nissim', 'Jacobs', 'Oconnor Schwartz Inc', 'Adipisicing aut inci', 'Incidunt quo conseq', 'Lorem mollitia neque', 'Aliquip amet volupt', '+1 (168) 506-1923', 'natumo@mailinator.com', '1', '2025-10-17 15:21:20', '2025-10-17 15:21:20'),
(45, '108', 'Hop', 'Knight', 'Franco and Baxter Trading', 'Sed in aut enim enim', 'Qui numquam rem cupi', 'Quasi in in voluptat', 'Rerum esse quam qui', '+1 (779) 189-2972', 'vyvojivuf@mailinator.com', '1', '2025-10-17 15:24:50', '2025-10-17 15:24:50'),
(46, '109', 'Kadeem', 'Banks', 'Barron Powers Plc', 'Harum aliquip sint e', 'Fugiat sequi ad rep', 'Unde architecto vel', 'Deserunt nisi veniam', '+1 (976) 851-9094', 'pedigedyj@mailinator.com', '1', '2025-10-17 15:30:16', '2025-10-17 15:30:16'),
(47, '110', 'Brenden', 'Stephenson', 'Baldwin and Santana Inc', 'Quasi ullam ullam qu', 'Cumque sunt officia', 'Et esse labore eum c', 'Consectetur fugiat v', '+1 (727) 854-4814', 'puhonuny@mailinator.com', '1', '2025-10-17 15:49:05', '2025-10-17 15:49:05'),
(48, '111', 'Alden', 'Dudley', 'Neal Ferrell Co', 'Dolore est temporib', 'Minim possimus labo', 'Ratione rem obcaecat', 'Ut officia nostrud v', '+1 (836) 234-6071', 'mija@mailinator.com', '1', '2025-10-17 15:52:47', '2025-10-17 15:52:47'),
(49, '112', 'Hilary', 'Hardy', 'Franks and Berry Traders', 'Nulla officia proide', 'Rem lorem quam quia', 'Non exercitationem d', 'Eos dignissimos rep', '+1 (417) 623-6936', 'buruvyzyp@mailinator.com', '1', '2025-10-17 15:57:57', '2025-10-17 15:57:57'),
(50, '116', 'Davis', 'Schultz', 'Bradshaw Houston LLC', 'Occaecat qui quaerat', 'Excepturi quam magna', 'Numquam dicta volupt', 'Voluptatem est labor', '+1 (223) 202-5115', 'vojucu@mailinator.com', '1', '2025-10-18 09:27:37', '2025-10-18 09:27:37'),
(51, '117', 'Zahir', 'Terry', 'Fulton Gaines Co', 'Tempore dolore volu', 'Iure ex omnis ut sol', 'Quod alias alias et', 'Deleniti ipsam volup', '+1 (863) 704-4773', 'ryxy@mailinator.com', '1', '2025-10-18 09:30:33', '2025-10-18 09:30:33'),
(52, '118', 'Zachery', 'York', 'Duran and Albert Traders', 'Enim consequatur al', 'Atque harum quis quo', 'Nemo temporibus dese', 'Aliqua Et sed sint', '+1 (938) 171-8305', 'kyfu@mailinator.com', '1', '2025-10-18 09:51:56', '2025-10-18 09:51:56'),
(53, '119', 'Tamekah', 'Baxter', 'Talley and Hall Inc', 'Recusandae Et cillu', 'Autem et odit alias', 'Nihil ut eius rerum', 'Aut illum repellend', '+1 (221) 108-9074', 'gycicyhi@mailinator.com', '1', '2025-10-18 10:00:36', '2025-10-18 10:00:36'),
(54, '120', 'Eric', 'Fields', 'Conner Bradley Co', 'Optio aliquam molli', 'Est beatae ratione s', 'Est pariatur Eum ve', 'Sint accusamus et e', '+1 (766) 838-2289', 'tipelet@mailinator.com', '1', '2025-10-18 10:04:19', '2025-10-18 10:04:19'),
(55, '121', 'Charissa', 'Baxter', 'Shannon Skinner Inc', 'Itaque iusto dolorum', 'Ea nesciunt tempor', 'Est nostrud dolorum', 'Esse ducimus quasi', '+1 (436) 464-4145', 'fuvusar@mailinator.com', '1', '2025-10-18 10:09:19', '2025-10-18 10:09:19'),
(56, '122', 'Kiayada', 'Crawford', 'Lang Fowler Traders', 'Non eaque commodo ma', 'Assumenda aut quisqu', 'Nam vero sed illo co', 'Ipsa at dignissimos', '+1 (438) 818-4517', 'dukul@mailinator.com', '1', '2025-10-18 10:13:18', '2025-10-18 10:13:18'),
(57, '123', 'Mufutau', 'Saunders', 'Nunez and Compton Inc', 'Tempora distinctio', 'Ab voluptas veniam', 'Ipsum totam id sed', 'Distinctio Vero nul', '+1 (361) 901-7101', 'kudejywec@mailinator.com', '1', '2025-10-18 10:15:59', '2025-10-18 10:15:59'),
(58, '124', 'Trevor', 'Ryan', 'Gonzalez Maddox Inc', 'Mollit excepturi ani', 'Et cupidatat laboris', 'Modi et ex quis enim', 'Odio blanditiis quid', '+1 (235) 359-5806', 'hiceku@mailinator.com', '1', '2025-10-18 10:18:03', '2025-10-18 10:18:03'),
(59, '125', 'Raya', 'Savage', 'Hebert Wilson Trading', 'Aut elit labore et', 'Esse doloremque recu', 'Nostrum deserunt aut', 'A cillum eaque duis', '+1 (167) 665-4581', 'forok@mailinator.com', '1', '2025-10-18 10:21:11', '2025-10-18 10:21:11'),
(60, '126', 'Brianna', 'Lawrence', 'Emerson and Mccormick Inc', 'Fugiat fugiat culp', 'In et praesentium ea', 'Minus voluptatum qui', 'Et sit mollit assume', '+1 (458) 563-5082', 'vunaga@mailinator.com', '1', '2025-10-18 10:26:52', '2025-10-18 10:26:52'),
(61, '127', 'Gay', 'Bennett', 'Gross and Castaneda LLC', 'Ullam maiores irure', 'Sequi magnam eos ita', 'Aliquid velit dolore', 'In obcaecati natus d', '+1 (741) 512-7866', 'duhanaler@mailinator.com', '1', '2025-10-21 08:55:48', '2025-10-21 08:55:48'),
(62, '128', 'Chaney', 'Myers', 'Carson and Robinson Associates', 'Non exercitation eiu', 'Aut quos facere plac', 'Eos rerum esse volu', 'Dolores molestias li', '+1 (716) 327-8831', 'gesimuvoj@mailinator.com', '1', '2025-10-21 09:11:11', '2025-10-21 09:11:11'),
(63, '129', 'Nissim', 'Campbell', 'Mccoy and Sloan Traders', 'Ab quos officia non', 'Repellendus Cillum', 'Magni mollit cillum', 'Officiis veritatis a', '+1 (516) 805-6346', 'qodura@mailinator.com', '1', '2025-10-21 09:17:54', '2025-10-21 09:17:54'),
(64, '130', 'Breanna', 'Jacobs', 'Sparks Carson Trading', 'Vel sunt sit aperia', 'Quos officiis dolore', 'Eius odit quis offic', 'Dignissimos soluta e', '+1 (873) 913-6776', 'lyna@mailinator.com', '1', '2025-10-21 09:38:11', '2025-10-21 09:38:11'),
(65, '131', 'Amber', 'Dyer', 'Gallegos and Potter Associates', 'Consequatur officii', 'Illo aspernatur aut', 'Vero nobis animi no', 'Vitae sed ipsum vel', '+1 (312) 437-3526', 'synysoj@mailinator.com', '1', '2025-10-21 11:41:19', '2025-10-21 11:41:19'),
(66, '132', 'Arden', 'Sloan', 'Cole Monroe LLC', 'Maiores vel aliqua', 'Expedita molestiae n', 'Distinctio Omnis au', 'Quia vitae expedita', '+1 (644) 905-5269', 'melokit@mailinator.com', '1', '2025-10-21 11:46:47', '2025-10-21 11:46:47'),
(67, '133', 'Duncan', 'Mcfadden', 'Hendricks and Pruitt Traders', 'Perspiciatis veniam', 'Et rerum iste quia d', 'Possimus id dolore', 'Unde aliquip non vol', '+1 (464) 168-2166', 'ficazeni@mailinator.com', '1', '2025-10-21 11:49:50', '2025-10-21 11:49:50'),
(68, '134', 'Josephine', 'Mendez', 'Nielsen Alvarez Traders', 'Aut iste quis consec', 'Aliquid id fugit vo', 'Lorem ex in iusto te', 'Veritatis quibusdam', '+1 (178) 486-7893', 'production8421@gmail.com', '1', '2025-10-21 13:45:02', '2025-10-21 13:45:02'),
(69, '134', 'Herrod', 'Barnes', 'Haley Francis Trading', 'Nisi laudantium omn', 'Quos debitis amet p', 'Voluptas consequatur', 'Aut facere magna omn', '+1 (143) 279-9083', 'production8421@gmail.com', '1', '2025-10-21 14:33:20', '2025-10-21 14:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `business_cards`
--

CREATE TABLE `business_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `design_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`design_data`)),
  `text_font` varchar(255) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `card_shape` varchar(255) DEFAULT NULL,
  `card_orientation` varchar(255) DEFAULT NULL,
  `card_weight` varchar(255) DEFAULT NULL,
  `text_alignment` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `background_front_image` varchar(255) DEFAULT NULL,
  `background_back_image` varchar(255) DEFAULT NULL,
  `corner_style` enum('standard','rounded') NOT NULL DEFAULT 'standard',
  `is_front_design` tinyint(1) NOT NULL DEFAULT 1,
  `card_front_image` varchar(255) DEFAULT NULL,
  `is_back_design` tinyint(1) NOT NULL DEFAULT 0,
  `card_back_image` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_cards`
--

INSERT INTO `business_cards` (`id`, `user_id`, `template_id`, `name`, `job_title`, `company`, `phone`, `email`, `website`, `address`, `logo_path`, `design_data`, `text_font`, `text_color`, `card_shape`, `card_orientation`, `card_weight`, `text_alignment`, `background_color`, `background_front_image`, `background_back_image`, `corner_style`, `is_front_design`, `card_front_image`, `is_back_design`, `card_back_image`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Justin Morales', 'Ut quidem est conse', 'Mcknight and Sanford Trading', '+1 (606) 946-7288', 'qecu@mailinator.com', NULL, 'Dolore do in ea fugi', '20251013235435.jpeg', '\"{\\\"upload_files\\\":[\\\"20251013235435.jpeg\\\",\\\"20251013235435.jpeg\\\"],\\\"notes\\\":\\\"Ea laborum occaecat\\\"}\"', NULL, '#4db800', NULL, NULL, NULL, NULL, '#532f20', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-13 18:54:35', '2025-10-13 18:54:35'),
(2, NULL, NULL, 'Ayanna Rosales', 'Quo est ratione inci', 'Strickland Whitfield Plc', '+1 (309) 298-5037', 'dygiba@mailinator.com', NULL, 'Iure vitae consequat', '20251014000433.jpeg', '\"{\\\"upload_files\\\":[\\\"20251014000433.jpeg\\\",\\\"20251014000433.jpeg\\\"],\\\"notes\\\":\\\"Veniam tempore par\\\"}\"', NULL, '#0e477d', NULL, NULL, NULL, NULL, '#0bfc8d', NULL, NULL, 'standard', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-13 19:04:33', '2025-10-13 19:04:33'),
(3, NULL, NULL, 'Liberty Le', 'Dolore voluptas aliq', 'Brooks Lane Traders', '+1 (508) 619-8647', 'jywos@mailinator.com', NULL, 'Totam consequat Con', '20251014003938_front.jpg', '\"{\\\"front_upload_files\\\":[\\\"20251014003938_front.jpg\\\",\\\"20251014003938_front.jpg\\\"],\\\"back_upload_files\\\":[\\\"20251014003938_back.jpeg\\\",\\\"20251014003938_back.jpeg\\\"],\\\"notes\\\":\\\"Labore aut qui dolor\\\"}\"', NULL, '#030244', NULL, NULL, NULL, NULL, '#ea0f16', NULL, NULL, 'rounded', 1, NULL, 1, NULL, NULL, 'order_placed', '2025-10-13 19:39:38', '2025-10-13 19:39:38'),
(4, NULL, NULL, 'Davis Alvarado', 'Pariatur Inventore', 'Willis and Hartman Co', '+1 (107) 829-2763', 'ganu@mailinator.com', NULL, 'Eligendi eiusmod asp', '20251014010218_front.jpg', '\"{\\\"front_upload_files\\\":[\\\"20251014010218_front.jpg\\\",\\\"20251014010218_front.jpg\\\"],\\\"back_upload_files\\\":[\\\"20251014010218_back.jpeg\\\",\\\"20251014010218_back.jpeg\\\"],\\\"notes\\\":\\\"Lorem voluptas commo\\\",\\\"paper_stock\\\":\\\"matte\\\",\\\"quantity\\\":\\\"100\\\"}\"', NULL, '#896fc4', NULL, NULL, NULL, NULL, '#c26600', NULL, NULL, 'standard', 1, NULL, 1, NULL, NULL, 'order_placed', '2025-10-13 20:02:18', '2025-10-14 11:14:32'),
(5, NULL, NULL, 'Cyrus Sherman', 'Culpa aperiam sit so', 'Macdonald and Cervantes LLC', '+1 (773) 291-6293', 'vatuvenef@mailinator.com', NULL, 'Eos autem voluptate', '20251014155953_0_front.jpg', '\"{\\\"front_upload_files\\\":[\\\"20251014155953_0_front.jpg\\\",\\\"20251014155953_1_front.jpg\\\"],\\\"back_upload_files\\\":[\\\"20251014155953_100_back.png\\\",\\\"20251014155953_101_back.png\\\"]}\"', NULL, '#cf49d6', NULL, NULL, NULL, NULL, '#b8a959', NULL, NULL, 'rounded', 1, NULL, 1, NULL, NULL, 'order_placed', '2025-10-14 10:59:53', '2025-10-14 10:59:53'),
(6, NULL, NULL, 'Jordan Morin', 'Expedita velit cupi', 'Edwards Shannon Co', '+1 (822) 158-6804', 'zujarabezy@mailinator.com', NULL, 'Assumenda culpa iure', '20251014160437_0_front.jpg', '\"{\\\"front_upload_files\\\":[\\\"20251014160437_0_front.jpg\\\",\\\"20251014160437_1_front.jpg\\\"],\\\"back_upload_files\\\":[\\\"20251014160437_100_back.jpeg\\\",\\\"20251014160437_101_back.jpeg\\\"]}\"', NULL, '#a1aa65', NULL, NULL, NULL, NULL, '#384cac', NULL, NULL, 'rounded', 1, NULL, 1, NULL, NULL, 'order_placed', '2025-10-14 11:04:37', '2025-10-14 11:04:37'),
(7, NULL, NULL, 'Warren Heath', 'Reiciendis est quasi', 'Bass and Terrell Co', '+1 (348) 127-8471', 'mofihe@mailinator.com', NULL, 'Delectus autem plac', '20251014162157_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251014162157_0_front.png\\\",\\\"20251014162157_1_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251014162157_100_back.jpg\\\",\\\"20251014162157_101_back.jpg\\\"]}\"', NULL, '#d2835f', NULL, NULL, NULL, NULL, '#a6f1ba', NULL, NULL, 'rounded', 1, NULL, 1, NULL, NULL, 'order_placed', '2025-10-14 11:21:57', '2025-10-14 11:21:57'),
(8, NULL, NULL, 'Lynn Mayo', 'Esse non eligendi q', 'Cortez Snider Associates', '+1 (117) 333-5064', 'hyrev@mailinator.com', NULL, 'Voluptate hic optio', '20251015042022_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251015042022_0_front.png\\\",\\\"20251015042022_1_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251015042022_100_back.png\\\",\\\"20251015042022_101_back.png\\\"]}\"', NULL, '#ededed', NULL, NULL, NULL, NULL, '#201bef', NULL, NULL, 'rounded', 1, NULL, 1, NULL, NULL, 'order_placed', '2025-10-15 10:20:22', '2025-10-15 10:20:22'),
(9, NULL, NULL, 'Sybil Forbes', 'Elit qui non aut re', 'Owens Diaz Trading', '+1 (293) 134-9251', 'puxim@mailinator.com', NULL, 'Duis voluptatum poss', '20251016023523_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016023523_0_front.png\\\",\\\"20251016023523_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#f2f2f2', NULL, NULL, NULL, NULL, '#b1efb1', NULL, NULL, 'standard', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:35:23', '2025-10-16 08:35:23'),
(10, NULL, NULL, 'Tanek Buck', 'Vel voluptate mollit', 'Ramirez Oneal Plc', '+1 (443) 795-6935', 'delotako@mailinator.com', NULL, 'Expedita expedita ne', '20251016023947_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016023947_0_front.png\\\",\\\"20251016023947_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#111563', NULL, NULL, NULL, NULL, '#2336df', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:39:47', '2025-10-16 08:39:47'),
(11, NULL, NULL, 'Cynthia Gay', 'Qui porro in aute se', 'Dale and Donovan LLC', '+1 (849) 221-7395', 'rywelov@mailinator.com', NULL, 'Adipisicing temporib', '20251016024533_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016024533_0_front.png\\\",\\\"20251016024533_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#c9e8fa', NULL, NULL, NULL, NULL, '#85437e', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:45:33', '2025-10-16 08:45:33'),
(12, NULL, NULL, 'Cynthia Gay', 'Qui porro in aute se', 'Dale and Donovan LLC', '+1 (849) 221-7395', 'rywelov@mailinator.com', NULL, 'Adipisicing temporib', '20251016024547_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016024547_0_front.png\\\",\\\"20251016024547_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#c9e8fa', NULL, NULL, NULL, NULL, '#85437e', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:45:47', '2025-10-16 08:45:47'),
(13, NULL, NULL, 'Hollee Pace', 'Molestias qui non im', 'Spencer and Blevins Traders', '+1 (321) 987-3701', 'sozuzafasa@mailinator.com', NULL, 'Quae reprehenderit l', '20251016024617_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016024617_0_front.png\\\",\\\"20251016024617_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#fded58', NULL, NULL, NULL, NULL, '#e19347', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:46:17', '2025-10-16 08:46:17'),
(14, NULL, NULL, 'Hollee Pace', 'Molestias qui non im', 'Spencer and Blevins Traders', '+1 (321) 987-3701', 'sozuzafasa@mailinator.com', NULL, 'Quae reprehenderit l', '20251016024642_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016024642_0_front.png\\\",\\\"20251016024642_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#fded58', NULL, NULL, NULL, NULL, '#e19347', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:46:42', '2025-10-16 08:46:42'),
(15, NULL, NULL, 'Shad Austin', 'Atque elit sint ne', 'Branch Porter Co', '+1 (428) 946-6717', 'pabi@mailinator.com', NULL, 'Eos est est consequa', '20251016024735_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016024735_0_front.png\\\",\\\"20251016024735_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#0b98df', NULL, NULL, NULL, NULL, '#153bb5', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 08:47:35', '2025-10-16 08:47:35'),
(16, NULL, NULL, 'Mark Lowery', 'Et in aliquip sit ut', 'Newton and Bean Co', '+1 (293) 763-5373', 'qevaf@mailinator.com', NULL, 'Ut velit doloribus v', '20251016031022_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016031022_0_front.png\\\",\\\"20251016031022_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#eae7ee', NULL, NULL, NULL, NULL, '#500cd0', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 09:10:22', '2025-10-16 09:10:22'),
(17, NULL, NULL, 'Thaddeus Downs', 'Quia commodi excepte', 'Walls Beck Cosdas', '+1 (307) 724-2363', 'mepi@mailinator.com', NULL, 'Eos numquam sunt ve', '20251016031103_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016031213_front.png\\\",\\\"20251016031213_front.png\\\"],\\\"back_upload_files\\\":[],\\\"paper_stock\\\":\\\"premium\\\",\\\"quantity\\\":\\\"1000\\\",\\\"text_color\\\":\\\"#8b1305\\\",\\\"background_color\\\":\\\"#8a9d8f\\\",\\\"notes\\\":\\\"Irure omnis animi n\\\"}\"', NULL, '#8b1305', NULL, NULL, NULL, NULL, '#8a9d8f', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 09:11:03', '2025-10-16 09:12:13'),
(18, NULL, NULL, 'Chaney Whitaker', 'Vitae recusandae Du', 'Shepard Rodriguez Traders', '+1 (209) 822-7715', 'tizilej@mailinator.com', NULL, 'Ab dolor inventore v', '20251016041041_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016041041_0_front.png\\\",\\\"20251016041041_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#930771', NULL, NULL, NULL, NULL, '#a086b5', NULL, NULL, 'standard', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:10:41', '2025-10-16 10:10:41'),
(19, NULL, NULL, 'Raven Peck', 'Adipisicing voluptat', 'Snyder Ramos Trading', '+1 (744) 537-8987', 'cosegamic@mailinator.com', NULL, 'Rerum eos accusamus', '20251016044225_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016044225_0_front.png\\\",\\\"20251016044225_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#cb6c96', NULL, NULL, NULL, NULL, '#a4b1d5', NULL, NULL, 'standard', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:42:25', '2025-10-16 10:42:25'),
(20, NULL, NULL, 'Cedric Burton', 'Ut nostrum excepteur', 'Atkinson and Duffy Co', '+1 (283) 195-7536', 'lurewupiky@mailinator.com', NULL, 'Cillum necessitatibu', '20251016044326_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016044326_0_front.png\\\",\\\"20251016044326_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#5863d3', NULL, NULL, NULL, NULL, '#9cfd02', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:43:26', '2025-10-16 10:43:26'),
(21, NULL, NULL, 'Charde Anderson', 'Consectetur eaque eo', 'Lamb and Ball Traders', '+1 (595) 244-1196', 'nawuxici@mailinator.com', NULL, 'Voluptatem dolore ul', '20251016044521_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016044521_0_front.png\\\",\\\"20251016044521_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#d1d8cc', NULL, NULL, NULL, NULL, '#bcd159', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:45:21', '2025-10-16 10:45:21'),
(22, NULL, NULL, 'Medge Thompson', 'Aut reprehenderit u', 'Vargas and Rodriguez Plc', '+1 (263) 649-1359', 'pyjerilaru@mailinator.com', NULL, 'Sunt sint aspernatur', '20251016044741_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016044741_0_front.png\\\",\\\"20251016044741_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', NULL, '#4cceda', NULL, NULL, NULL, NULL, '#bfd3c3', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:47:41', '2025-10-16 10:47:41'),
(23, NULL, NULL, 'Haviva Pitts', 'Illum aut voluptate', 'Howell and Vincent LLC', '+1 (919) 398-8492', 'hosunabif@mailinator.com', NULL, 'Quos quas elit illo', '20251016045727_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016045727_0_front.png\\\",\\\"20251016045727_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Georgia', '#1172b7', 'standard', 'horizontal', '16pt', '[object HTMLInputElement]', '#515883', NULL, NULL, 'rounded', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:57:27', '2025-10-16 10:57:27'),
(24, NULL, NULL, 'Noble Roman', 'Ex eu repellendus T', 'Mckinney Rhodes Traders', '+1 (955) 968-9931', 'nazotohoso@mailinator.com', NULL, 'Harum commodi velit', '20251016045929_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016045929_0_front.png\\\",\\\"20251016045929_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Garamond', '#68e41e', 'standard', 'vertical', '16pt', 'left', '#a837ec', NULL, NULL, 'standard', 1, NULL, 0, NULL, NULL, 'order_placed', '2025-10-16 10:59:29', '2025-10-16 10:59:29'),
(25, NULL, NULL, 'Denise Orr', 'Velit rerum cupidit', 'Ray Frank Traders', '+1 (889) 686-8753', 'ropoke@mailinator.com', NULL, 'Nulla id sunt dolore', '20251016054959_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016054959_0_front.png\\\",\\\"20251016054959_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Times New Roman', '#021702', 'standard', 'vertical', '14pt', 'left', '#1f3c4d', NULL, NULL, 'standard', 1, 'business_cards/card_1760593800.png', 0, NULL, NULL, 'order_placed', '2025-10-16 11:50:00', '2025-10-16 11:50:00'),
(26, NULL, NULL, 'Carissa Lancaster', 'Amet possimus modi', 'Preston Dejesus Associates', '+1 (443) 904-4198', 'luqaro@mailinator.com', NULL, 'Sapiente in dolorem', '20251016075023_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016075023_0_front.png\\\",\\\"20251016075023_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Comic Sans MS', '#465931', 'standard', 'horizontal', '16pt', 'left', '#e67784', NULL, NULL, 'rounded', 1, 'business_cards/card_1760601023.png', 0, 'business_cards/card_1760601023.png', NULL, 'order_placed', '2025-10-16 13:50:23', '2025-10-16 13:50:23'),
(27, NULL, NULL, 'Marvin Mosley', 'Nisi ut ullamco a vo', 'Mckenzie Booker LLC', '+1 (368) 423-5526', 'polizy@mailinator.com', NULL, 'Et distinctio Exerc', '20251016075258_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016075258_0_front.png\\\",\\\"20251016075258_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Comic Sans MS', '#d12689', 'square', 'horizontal', '16pt', 'left', '#10bb1f', NULL, NULL, 'standard', 1, 'business_cards/card_front1760601178.png', 0, 'business_cards/card_back1760601178.png', NULL, 'order_placed', '2025-10-16 13:52:58', '2025-10-16 13:52:58'),
(28, NULL, NULL, 'Tiger Pratt', 'Occaecat temporibus', 'Hinton Franco Traders', '+1 (342) 625-5996', 'sopel@mailinator.com', NULL, 'Temporibus velit ex', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251016075447_100_back.png\\\",\\\"20251016075447_101_back.png\\\"]}\"', 'Courier New', '#0e0d97', 'standard', 'vertical', '14pt', 'left', '#ffffff', NULL, NULL, 'standard', 0, 'business_cards/card_front1760601287.png', 1, 'business_cards/card_back1760601287.png', NULL, 'order_placed', '2025-10-16 13:54:47', '2025-10-16 13:54:47'),
(29, NULL, NULL, 'Janna Alston', 'Sit ratione voluptat', 'Martinez and Willis Plc', '+1 (715) 619-9941', 'kafezebura@mailinator.com', NULL, 'Adipisicing error ip', '20251016080011_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016080011_0_front.png\\\",\\\"20251016080011_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Times New Roman', '#8e8a2d', 'square', 'vertical', '16pt', 'left', '#09e656', NULL, NULL, 'standard', 1, 'business_cards/card_front1760601611.png', 0, 'business_cards/card_back1760601611.png', NULL, 'order_placed', '2025-10-16 14:00:11', '2025-10-16 14:00:11'),
(30, NULL, NULL, 'Christian Holt', 'Exercitation exceptu', 'Davis Quinn Trading', '+1 (678) 128-8871', 'colomawy@mailinator.com', NULL, 'Eos possimus optio', '20251016080103_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016080103_0_front.png\\\",\\\"20251016080103_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Trebuchet MS', '#14f749', 'square', 'vertical', '16pt', 'left', '#af821d', NULL, NULL, 'standard', 1, 'business_cards/card_front1760601663.png', 0, 'business_cards/card_back1760601663.png', NULL, 'order_placed', '2025-10-16 14:01:03', '2025-10-16 14:01:03'),
(31, NULL, NULL, 'Cameron Rivas', 'Nihil ex et quisquam', 'Berry Henry Trading', '+1 (971) 257-6542', 'vaka@mailinator.com', NULL, 'Dolorem sit eiusmod', '20251016090126_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016090126_0_front.png\\\",\\\"20251016090126_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Comic Sans MS', '#60cf49', 'standard', 'horizontal', '16pt', 'left', '#685b25', NULL, NULL, 'standard', 1, 'business_cards/card_front1760605286.png', 0, 'business_cards/card_back1760605286.png', NULL, 'order_placed', '2025-10-16 15:01:26', '2025-10-16 15:01:26'),
(32, NULL, NULL, 'Beau Blankenship', 'Accusantium vero odi', 'Hutchinson and Stark Trading', '+1 (462) 717-5152', 'nufilomuh@mailinator.com', NULL, 'Repudiandae quis deb', '20251016090700_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016090700_0_front.png\\\",\\\"20251016090700_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Times New Roman', '#ffddb2', 'standard', 'vertical', '16pt', 'left', '#ed7257', NULL, NULL, 'standard', 1, 'business_cards/card_front1760605620.png', 0, 'business_cards/card_back1760605620.png', NULL, 'order_placed', '2025-10-16 15:07:00', '2025-10-16 15:07:00'),
(33, NULL, NULL, 'Drake Roth', 'Soluta et optio rep', 'Nelson Raymond Inc', '+1 (881) 964-8967', 'gutazyty@mailinator.com', NULL, 'Ex ut assumenda volu', '20251016090754_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016090754_0_front.png\\\",\\\"20251016090754_1_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251016090754_100_back.png\\\",\\\"20251016090754_101_back.png\\\"]}\"', 'Palatino Linotype', '#e69c3c', 'standard', 'vertical', '16pt', 'left', '#719c7e', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760605674.png', 1, 'business_cards/card_back1760605674.png', NULL, 'order_placed', '2025-10-16 15:07:54', '2025-10-16 15:07:54'),
(34, NULL, NULL, 'Natalie Berry', 'Tempore rerum quae', 'Ware and Herring Traders', '+1 (575) 162-9225', 'cegamipawy@mailinator.com', NULL, 'Non assumenda et vol', '20251016091415_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016091415_0_front.png\\\",\\\"20251016091415_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Courier New', '#b5bd7e', 'standard', 'horizontal', '16pt', 'left', '#5d8fee', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760606055.png', 0, 'business_cards/card_back1760606055.png', NULL, 'order_placed', '2025-10-16 15:14:15', '2025-10-16 15:14:15'),
(35, NULL, NULL, 'Mira Pratt', 'Ut lorem ducimus as', 'Morrow and Wood Plc', '+1 (374) 869-4473', 'samymoj@mailinator.com', NULL, 'Et distinctio Fugia', NULL, '\"{\\\"front_upload_files\\\":[\\\"20251016094410_front.png\\\",\\\"20251016094410_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251016094233_100_back.png\\\",\\\"20251016094233_101_back.png\\\"],\\\"paper_stock\\\":\\\"matte\\\",\\\"quantity\\\":\\\"200\\\",\\\"text_color\\\":\\\"#6e6f6a\\\",\\\"background_color\\\":\\\"#eda441\\\",\\\"notes\\\":\\\"Ratione accusamus ve\\\"}\"', 'Palatino Linotype', '#6e6f6a', 'square', 'vertical', '14pt', 'left', '#eda441', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760607753.png', 1, 'business_cards/card_back1760607753.png', NULL, 'order_placed', '2025-10-16 15:42:33', '2025-10-16 15:44:10'),
(36, NULL, NULL, 'Michelle Cervantes', 'Dolorem labore minus', 'West Burton Co', '+1 (909) 486-5358', 'pypaxeqabi@mailinator.com', NULL, 'Eum quaerat eum ut p', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251016094537_100_back.png\\\",\\\"20251016094537_101_back.png\\\"]}\"', 'Verdana', '#c9c90d', 'square', 'horizontal', '16pt', 'left', '#a35087', NULL, NULL, 'standard', 0, 'business_cards/card_front1760607937.png', 1, 'business_cards/card_back1760607937.png', NULL, 'order_placed', '2025-10-16 15:45:37', '2025-10-16 15:45:37'),
(37, NULL, NULL, 'Tallulah Ramsey', 'Aperiam quo sit ius', 'Buck Lawson Plc', '+1 (865) 534-7323', 'sidoc@mailinator.com', NULL, 'Voluptatibus tenetur', '20251016100053_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251016100053_0_front.png\\\",\\\"20251016100053_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Times New Roman', '#321b4d', 'standard', 'horizontal', '14pt', 'center', '#24b089', NULL, NULL, 'standard', 1, 'business_cards/card_front1760608853.png', 0, 'business_cards/card_back1760608853.png', NULL, 'order_placed', '2025-10-16 16:00:53', '2025-10-16 16:00:53'),
(38, NULL, NULL, 'Ignacia Hendricks', 'Qui facilis et vero', 'Case Mason LLC', '+1 (606) 608-8119', 'fominymil@mailinator.com', NULL, 'Libero eum quia earu', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251016100205_100_back.png\\\",\\\"20251016100205_101_back.png\\\"]}\"', 'Garamond', '#19cb5d', 'standard', 'vertical', '16pt', 'left', '#bb031f', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760608925.png', 1, 'business_cards/card_back1760608925.png', NULL, 'order_placed', '2025-10-16 16:02:05', '2025-10-16 16:02:05'),
(39, NULL, NULL, 'Sonya Skinner', 'Fugiat velit dolor', 'Hill and Orr Co', '+1 (959) 612-2657', 'jekyl@mailinator.com', NULL, 'Consequatur tenetur', '20251017025116_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017025116_0_front.png\\\",\\\"20251017025116_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Courier New', '#6cc2c4', 'square', 'horizontal', '16pt', 'left', '#f3e51a', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760669476.png', 0, 'business_cards/card_back1760669477.png', NULL, 'order_placed', '2025-10-17 08:51:17', '2025-10-17 08:51:17'),
(40, NULL, NULL, 'Sharon Delacruz', 'Hic ut aliquam est n', 'Kim and Grant Associates', '+1 (974) 474-1785', 'qopawelufy@mailinator.com', NULL, 'Sint pariatur Inven', '20251017025919_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017025919_0_front.png\\\",\\\"20251017025919_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Garamond', '#89720c', 'square', 'vertical', '16pt', 'left', '#23e93a', NULL, NULL, 'standard', 1, 'business_cards/card_front1760669959.png', 0, 'business_cards/card_back1760669959.png', NULL, 'order_placed', '2025-10-17 08:59:19', '2025-10-17 08:59:19'),
(41, NULL, NULL, 'Conan Coleman', 'Quia id recusandae', 'Eaton and Nash Traders', '+1 (291) 656-5211', 'dexazuxugo@mailinator.com', NULL, 'Voluptatem neque an', '20251017034047_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017034047_0_front.png\\\",\\\"20251017034047_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Arial', '#426b03', 'square', 'vertical', '14pt', 'left', '#79fad6', NULL, NULL, 'standard', 1, 'business_cards/card_front1760672447.png', 0, 'business_cards/card_back1760672447.png', NULL, 'order_placed', '2025-10-17 09:40:47', '2025-10-17 09:40:47'),
(42, NULL, NULL, 'Urielle Madden', 'Dolore voluptate qui', 'Wooten Bowers Traders', '+1 (985) 487-3639', 'nanixuwu@mailinator.com', NULL, 'Sit occaecat aut ha', '20251017051939_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017051939_0_front.png\\\",\\\"20251017051939_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Georgia', '#b76e19', 'standard', 'vertical', '16pt', 'left', '#5281fb', NULL, NULL, 'standard', 1, 'business_cards/card_front1760678379.png', 0, 'business_cards/card_back1760678379.png', NULL, 'order_placed', '2025-10-17 11:19:39', '2025-10-17 11:19:39'),
(43, NULL, NULL, 'Sybill Lindsay', 'Qui quod voluptatem', 'Peterson and Duffy Traders', '+1 (574) 463-3179', 'gilujagele@mailinator.com', NULL, 'Rerum quod ut except', '20251017085633_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017085633_0_front.png\\\",\\\"20251017085633_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Arial', '#267491', 'square', 'horizontal', '16pt', 'left', '#5e9173', NULL, NULL, 'standard', 1, 'business_cards/card_front1760691393.png', 0, 'business_cards/card_back1760691393.png', NULL, 'order_placed', '2025-10-17 14:56:33', '2025-10-17 14:56:33'),
(44, NULL, NULL, 'Lillian Nicholson', 'Et tenetur nostrud r', 'Atkinson and Hebert Co', '+1 (546) 532-6145', 'lorekihun@mailinator.com', NULL, 'Tempor iure sint fu', '20251017090604_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017090604_0_front.png\\\",\\\"20251017090604_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Courier New', '#279fe0', 'square', 'horizontal', '14pt', 'left', '#95aa15', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760691964.png', 0, 'business_cards/card_back1760691964.png', NULL, 'order_placed', '2025-10-17 15:06:04', '2025-10-17 15:06:04'),
(45, NULL, NULL, 'Rhiannon Rollins', 'Placeat fuga Elige', 'Bishop and Banks Traders', '+1 (624) 238-8799', 'zacycakoro@mailinator.com', NULL, 'Pariatur Tempor qui', '20251017090951_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017090951_0_front.png\\\",\\\"20251017090951_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Palatino Linotype', '#e35c2a', 'square', 'vertical', '16pt', 'left', '#d01b26', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760692191.png', 0, 'business_cards/card_back1760692191.png', NULL, 'order_placed', '2025-10-17 15:09:51', '2025-10-17 15:09:51'),
(46, NULL, NULL, 'Charlotte George', 'Autem voluptates par', 'Gardner and Wolf Trading', '+1 (499) 547-1167', 'xezo@mailinator.com', NULL, 'Eveniet alias volup', '20251017091324_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017091324_0_front.png\\\",\\\"20251017091324_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Segoe UI', '#105260', 'standard', 'horizontal', '16pt', 'left', '#20c11a', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760692404.png', 0, 'business_cards/card_back1760692404.png', NULL, 'order_placed', '2025-10-17 15:13:24', '2025-10-17 15:13:24'),
(47, NULL, NULL, 'Nathaniel Hoffman', 'Odit amet fugiat q', 'Floyd and Jacobson Plc', '+1 (918) 289-3621', 'zalibuw@mailinator.com', NULL, 'Id eligendi incididu', '20251017091553_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017091553_0_front.png\\\",\\\"20251017091553_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Arial', '#5e081e', 'square', 'vertical', '16pt', 'left', '#e5ffdc', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760692553.png', 0, 'business_cards/card_back1760692553.png', NULL, 'order_placed', '2025-10-17 15:15:53', '2025-10-17 15:15:53'),
(48, NULL, NULL, 'Macy Kramer', 'Commodi ad iure dict', 'Terrell and Dillon Inc', '+1 (793) 995-6394', 'gimazim@mailinator.com', NULL, 'Deleniti ex similiqu', '20251017091813_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017091813_0_front.png\\\",\\\"20251017091813_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Verdana', '#05f1e8', 'standard', 'horizontal', '14pt', 'left', '#ef15e0', NULL, NULL, 'standard', 1, 'business_cards/card_front1760692693.png', 0, 'business_cards/card_back1760692693.png', NULL, 'order_placed', '2025-10-17 15:18:13', '2025-10-17 15:18:13'),
(49, NULL, NULL, 'Keiko Bradford', 'Mollitia architecto', 'Cole and Randall Co', '+1 (535) 413-6061', 'tobakuj@mailinator.com', NULL, 'Dolore voluptate mol', '20251017092100_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017092100_0_front.png\\\",\\\"20251017092100_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Palatino Linotype', '#521ec1', 'standard', 'vertical', '16pt', 'left', '#3f200c', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760692860.png', 0, 'business_cards/card_back1760692860.png', NULL, 'order_placed', '2025-10-17 15:21:00', '2025-10-17 15:21:00'),
(50, NULL, NULL, 'Tarik Alexander', 'Sint magna delectus', 'Mcconnell Tanner Traders', '+1 (573) 497-7045', 'hifopa@mailinator.com', NULL, 'Rerum et eligendi te', '20251017092431_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017092431_0_front.png\\\",\\\"20251017092431_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Courier New', '#a56ac4', 'square', 'horizontal', '14pt', 'left', '#86dc15', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760693071.png', 0, 'business_cards/card_back1760693071.png', NULL, 'order_placed', '2025-10-17 15:24:31', '2025-10-17 15:24:31'),
(51, NULL, NULL, 'Evelyn Donaldson', 'Veniam et sed adipi', 'Rivers and Barr Co', '+1 (397) 706-9399', 'mujec@mailinator.com', NULL, 'Officia cumque quod', '20251017092949_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017092949_0_front.png\\\",\\\"20251017092949_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Trebuchet MS', '#a0e9b6', 'square', 'vertical', '16pt', 'left', '#617211', NULL, NULL, 'standard', 1, 'business_cards/card_front1760693389.png', 0, 'business_cards/card_back1760693389.png', NULL, 'order_placed', '2025-10-17 15:29:49', '2025-10-17 15:29:49'),
(52, NULL, NULL, 'Evelyn Donaldson', 'Veniam et sed adipi', 'Rivers and Barr Co', '+1 (397) 706-9399', 'mujec@mailinator.com', NULL, 'Officia cumque quod', '20251017092950_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017092950_0_front.png\\\",\\\"20251017092950_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Trebuchet MS', '#a0e9b6', 'square', 'vertical', '16pt', 'left', '#617211', NULL, NULL, 'standard', 1, 'business_cards/card_front1760693390.png', 0, 'business_cards/card_back1760693390.png', NULL, 'order_placed', '2025-10-17 15:29:50', '2025-10-17 15:29:50'),
(53, NULL, NULL, 'Oprah Mendez', 'Quidem delectus per', 'Mclean and Cote Associates', '+1 (922) 852-7462', 'geginoli@mailinator.com', NULL, 'Quas qui voluptas do', '20251017094843_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017094843_0_front.png\\\",\\\"20251017094843_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Garamond', '#5b314f', 'square', 'vertical', '14pt', 'left', '#e5e6d9', NULL, NULL, 'standard', 1, 'business_cards/card_front1760694523.png', 0, 'business_cards/card_back1760694523.png', NULL, 'order_placed', '2025-10-17 15:48:43', '2025-10-17 15:48:43'),
(54, NULL, NULL, 'Victoria Noel', 'Dolores maiores qui', 'Burris Clements Plc', '+1 (778) 212-3307', 'webe@mailinator.com', NULL, 'Sit quo voluptas cum', '20251017095225_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017095225_0_front.png\\\",\\\"20251017095225_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Palatino Linotype', '#10b9c8', 'standard', 'vertical', '14pt', 'left', '#8e391d', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760694745.png', 0, 'business_cards/card_back1760694745.png', NULL, 'order_placed', '2025-10-17 15:52:25', '2025-10-17 15:52:25'),
(55, NULL, NULL, 'Illana Schroeder', 'Sunt facilis fugiat', 'Guerra Soto Traders', '+1 (129) 894-4725', 'mukaha@mailinator.com', NULL, 'Earum necessitatibus', '20251017095731_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251017095731_0_front.png\\\",\\\"20251017095731_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Palatino Linotype', '#b7a15d', 'standard', 'horizontal', '16pt', 'left', '#80319d', NULL, NULL, 'standard', 1, 'business_cards/card_front1760695051.png', 0, 'business_cards/card_back1760695051.png', NULL, 'order_placed', '2025-10-17 15:57:31', '2025-10-17 15:57:31'),
(56, NULL, NULL, 'Grant Doyle', 'Ut commodo sunt adip', 'Wilder Tillman Trading', '+1 (586) 334-7964', 'lopim@mailinator.com', NULL, 'Laboris amet ad quo', '20251018031142_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251018031142_0_front.png\\\",\\\"20251018031142_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Candara', '#bd2f36', 'square', 'horizontal', '14pt', 'left', '#4b7af7', NULL, NULL, 'standard', 1, 'business_cards/card_front1760757102.png', 0, 'business_cards/card_back1760757102.png', NULL, 'order_placed', '2025-10-18 09:11:42', '2025-10-18 09:11:42'),
(57, NULL, NULL, 'Quentin Barnett', 'Quod ullam qui harum', 'Reed and Avila Plc', '+1 (439) 565-1494', 'cefo@mailinator.com', NULL, 'Explicabo Consequat', '20251018033005_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251018033005_0_front.png\\\",\\\"20251018033005_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Palatino Linotype', '#e33d3f', 'standard', 'vertical', '16pt', 'left', '#7d26e1', NULL, NULL, 'rounded', 1, 'business_cards/card_front1760758205.png', 0, 'business_cards/card_back1760758205.png', NULL, 'order_placed', '2025-10-18 09:30:05', '2025-10-18 09:30:05'),
(58, NULL, NULL, 'Gareth Decker', 'Dolor incidunt aliq', 'Valentine Lloyd Co', '+1 (281) 493-3225', 'vugiros@mailinator.com', NULL, 'Fuga Culpa tempore', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018035121_100_back.png\\\",\\\"20251018035121_101_back.png\\\"]}\"', 'Segoe UI', '#2fbb58', 'square', 'vertical', '14pt', 'left', '#bc42f2', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760759481.png', 1, 'business_cards/card_back1760759481.png', NULL, 'order_placed', '2025-10-18 09:51:21', '2025-10-18 09:51:21'),
(59, NULL, NULL, 'Rudyard Anderson', 'Obcaecati ut non qua', 'Huber Joyce Traders', '+1 (688) 591-4295', 'mepypipiz@mailinator.com', NULL, 'Esse error et dolor', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018040006_100_back.png\\\",\\\"20251018040006_101_back.png\\\"]}\"', 'Impact', '#fb8f1d', 'square', 'vertical', '16pt', 'center', '#2a1d1d', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760760006.png', 1, 'business_cards/card_back1760760006.png', NULL, 'order_placed', '2025-10-18 10:00:06', '2025-10-18 10:00:06'),
(60, NULL, NULL, 'Yasir Gilbert', 'Et dolore rerum aspe', 'Martin Macias Plc', '+1 (641) 117-6183', 'zebehise@mailinator.com', NULL, 'Lorem tempore paria', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018040357_100_back.png\\\",\\\"20251018040357_101_back.png\\\"]}\"', 'Garamond', '#571e95', 'square', 'vertical', '14pt', 'left', '#48b252', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760760237.png', 1, 'business_cards/card_back1760760237.png', NULL, 'order_placed', '2025-10-18 10:03:57', '2025-10-18 10:03:57'),
(61, NULL, NULL, 'Cara Wilkerson', 'Optio nostrum minus', 'Gibbs and Tanner Associates', '+1 (534) 915-3241', 'duhym@mailinator.com', NULL, 'Dolor a excepturi ex', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018040859_100_back.png\\\",\\\"20251018040859_101_back.png\\\"]}\"', 'Palatino Linotype', '#c3a89c', 'standard', 'horizontal', '14pt', 'left', '#7f8393', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760760539.png', 1, 'business_cards/card_back1760760539.png', NULL, 'order_placed', '2025-10-18 10:08:59', '2025-10-18 10:08:59'),
(62, NULL, NULL, 'Veda Chase', 'Facilis ut temporibu', 'Sheppard Frederick Co', '+1 (475) 327-4282', 'nybidab@mailinator.com', NULL, 'Mollitia aspernatur', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018041256_100_back.jpg\\\",\\\"20251018041256_101_back.jpg\\\"]}\"', 'Verdana', '#ab486b', 'standard', 'horizontal', '16pt', 'center', '#1d2f36', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760760776.png', 1, 'business_cards/card_back1760760776.png', NULL, 'order_placed', '2025-10-18 10:12:56', '2025-10-18 10:12:56'),
(63, NULL, NULL, 'Stewart Joyce', 'Nostrum nisi provide', 'Beck Erickson Traders', '+1 (623) 624-2908', 'tisanube@mailinator.com', NULL, 'Consectetur libero e', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018041533_100_back.png\\\",\\\"20251018041533_101_back.png\\\"]}\"', 'Times New Roman', '#9896cf', 'square', 'vertical', '14pt', 'center', '#38007f', NULL, NULL, 'standard', 0, 'business_cards/card_front1760760933.png', 1, 'business_cards/card_back1760760933.png', NULL, 'order_placed', '2025-10-18 10:15:33', '2025-10-18 10:15:33'),
(64, NULL, NULL, 'Macaulay Decker', 'Aliqua Quia sit vo', 'Abbott and Martinez Trading', '+1 (452) 439-7598', 'bohykelij@mailinator.com', NULL, 'Voluptatem ipsum ve', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018041740_100_back.png\\\",\\\"20251018041740_101_back.png\\\"]}\"', 'Tahoma', '#fa0c2b', 'square', 'vertical', '14pt', 'left', '#069670', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760761060.png', 1, 'business_cards/card_back1760761060.png', NULL, 'order_placed', '2025-10-18 10:17:40', '2025-10-18 10:17:40'),
(65, NULL, NULL, 'Hector Sanders', 'Et enim consequatur', 'Harrington and Emerson Inc', '+1 (275) 803-6528', 'raruk@mailinator.com', NULL, 'Veritatis magna volu', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018042045_100_back.png\\\",\\\"20251018042045_101_back.png\\\"]}\"', 'Candara', '#5a395c', 'standard', 'vertical', '14pt', 'center', '#c79cd7', NULL, NULL, 'standard', 0, 'business_cards/card_front1760761245.png', 1, 'business_cards/card_back1760761245.png', NULL, 'order_placed', '2025-10-18 10:20:45', '2025-10-18 10:20:45'),
(66, NULL, NULL, 'September Vaughn', 'Ex reiciendis fugiat', 'Underwood and Carey LLC', '+1 (782) 476-4899', 'mijidygi@mailinator.com', NULL, 'Lorem repellendus E', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018042630_100_back.png\\\",\\\"20251018042630_101_back.png\\\"]}\"', 'Tahoma', '#c4ff15', 'standard', 'vertical', '14pt', 'left', '#5696f3', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760761590.png', 1, 'business_cards/card_back1760761590.png', NULL, 'order_placed', '2025-10-18 10:26:30', '2025-10-18 10:26:30'),
(67, NULL, NULL, 'Denise Castaneda', 'Quia nostrum praesen', 'Carrillo Stone Co', '+1 (424) 597-5364', 'cacytu@mailinator.com', NULL, 'Qui perspiciatis es', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018042851_100_back.png\\\",\\\"20251018042851_101_back.png\\\"]}\"', 'Courier New', '#6122d7', 'standard', 'vertical', '14pt', 'left', '#05b92a', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760761731.png', 1, 'business_cards/card_back1760761731.png', NULL, 'order_placed', '2025-10-18 10:28:51', '2025-10-18 10:28:51'),
(68, NULL, NULL, 'Clark Koch', 'Aut officia reprehen', 'Cantrell and Shaffer Trading', '+1 (698) 582-1939', 'sadacu@mailinator.com', NULL, 'Rem deleniti non eum', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251018083100_100_back.png\\\",\\\"20251018083100_101_back.png\\\"]}\"', 'Courier New', '#2c1d49', 'standard', 'vertical', '14pt', 'center', '#90abde', NULL, NULL, 'rounded', 0, 'business_cards/card_front1760776260.png', 1, 'business_cards/card_back1760776260.png', NULL, 'order_placed', '2025-10-18 14:31:00', '2025-10-18 14:31:00'),
(69, NULL, NULL, 'Montana Witt', 'Officiis est labore', 'Gregory Lott Traders', '+1 (535) 197-7879', 'kyjivexer@mailinator.com', NULL, 'Ex enim quod et recu', '20251018093743_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251018093743_0_front.png\\\",\\\"20251018093743_1_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251018093743_100_back.png\\\",\\\"20251018093743_101_back.png\\\"]}\"', 'Impact', '#1f898b', 'standard', 'horizontal', '14pt', 'center', '#3eec7e', '20251018093743_0_front.png', '20251018093743_100_back.png', 'rounded', 1, 'business_cards/card_front1760780263.png', 1, 'business_cards/card_back1760780263.png', NULL, 'order_placed', '2025-10-18 15:37:43', '2025-10-18 15:37:43'),
(70, NULL, NULL, 'Farrah Santos', 'Accusamus laboriosam', 'Hammond and Cannon Co', '+1 (438) 266-3038', 'lerakyq@mailinator.com', NULL, 'Veritatis sint molli', '20251018100720_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251018100720_0_front.png\\\",\\\"20251018100720_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Comic Sans MS', '#207b70', 'square', 'vertical', '16pt', 'left', '#d6c3bc', NULL, NULL, 'standard', 1, 'business_cards/card_front1760782040.png', 0, 'business_cards/card_back1760782040.png', NULL, 'order_placed', '2025-10-18 16:07:20', '2025-10-18 16:07:20'),
(71, NULL, NULL, 'Raya Melton', 'Eligendi consequatur', 'Pearson Madden Trading', '+1 (876) 606-7322', 'cykic@mailinator.com', NULL, 'Recusandae Anim qui', '20251018101425_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251018101425_0_front.png\\\",\\\"20251018101425_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Trebuchet MS', '#815c9e', 'standard', 'horizontal', '16pt', 'left', '#c593e0', '20251018101425_0_front.png', NULL, 'standard', 1, 'business_cards/card_front1760782465.png', 0, 'business_cards/card_back1760782465.png', NULL, 'order_placed', '2025-10-18 16:14:25', '2025-10-18 16:14:25'),
(72, NULL, NULL, 'Jane Clarke', 'Perferendis ratione', 'Mays Meyers Inc', '+1 (596) 924-6439', 'qita@mailinator.com', NULL, 'Qui nesciunt nihil', '20251018101617_0_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251018101617_0_front.png\\\",\\\"20251018101617_1_front.png\\\"],\\\"back_upload_files\\\":[]}\"', 'Segoe UI', '#06013c', 'square', 'horizontal', '14pt', 'left', '#162456', '20251018101617_0_front.png', '', 'rounded', 1, 'business_cards/card_front1760782577.png', 0, 'business_cards/card_back1760782577.png', NULL, 'order_placed', '2025-10-18 16:16:17', '2025-10-18 16:16:17'),
(73, NULL, NULL, 'Walter Hutchinson', 'Blanditiis magni quo', 'House and Horton Inc', '+1 (824) 138-1072', 'nyjyxil@mailinator.com', NULL, 'Cumque voluptate nul', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021025321_100_back.png\\\",\\\"20251021025321_101_back.png\\\"]}\"', 'Lucida Console', '#1875c2', 'standard', 'vertical', '16pt', 'left', '#76fa8f', '', '20251021025321_100_back.png', 'rounded', 0, 'business_cards/card_front1761015201.png', 1, 'business_cards/card_back1761015201.png', NULL, 'order_placed', '2025-10-21 08:53:21', '2025-10-21 08:53:21'),
(74, NULL, NULL, 'Ori Battle', 'Inventore sed quia n', 'Fischer and Horton Plc', '+1 (651) 871-9901', 'wicizobob@mailinator.com', NULL, 'Repudiandae similiqu', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021030949_100_back.png\\\",\\\"20251021030949_101_back.png\\\"]}\"', 'Lucida Console', '#a3564d', 'square', 'vertical', '16pt', 'left', '#338010', '', '20251021030949_100_back.png', 'rounded', 0, 'business_cards/card_front1761016189.png', 1, 'business_cards/card_back1761016189.png', NULL, 'order_placed', '2025-10-21 09:09:49', '2025-10-21 09:09:49'),
(75, NULL, NULL, 'Oren Summers', 'Commodo est rerum s', 'Woodard Gross Co', '+1 (771) 254-2769', 'gisive@mailinator.com', NULL, 'Consequatur veritati', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021031514_100_back.png\\\",\\\"20251021031514_101_back.png\\\"]}\"', 'Lucida Console', '#14edd1', 'square', 'horizontal', '14pt', 'left', '#cca80b', '', '20251021031514_100_back.png', 'rounded', 0, 'business_cards/card_front1761016514.png', 1, 'business_cards/card_back1761016514.png', NULL, 'order_placed', '2025-10-21 09:15:14', '2025-10-21 09:15:14'),
(76, NULL, NULL, 'Jelani Caldwell', 'Placeat aliqua Vol', 'Goff and Beard LLC', '+1 (557) 168-1736', 'jywafeqese@mailinator.com', NULL, 'Odit animi saepe ve', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021031715_100_back.jpg\\\",\\\"20251021031715_101_back.jpg\\\"]}\"', 'Georgia', '#3b28a6', 'standard', 'vertical', '14pt', 'left', '#c584cc', '', '20251021031715_100_back.jpg', 'standard', 0, 'business_cards/card_front1761016635.png', 1, 'business_cards/card_back1761016635.png', NULL, 'order_placed', '2025-10-21 09:17:15', '2025-10-21 09:17:15'),
(77, NULL, NULL, 'Ulric Pace', 'Ea sunt nulla sit re', 'Holcomb Hensley LLC', '+1 (442) 375-9313', 'rygozi@mailinator.com', NULL, 'Commodi mollitia qui', '20251021043849_1_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251021043849_1_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251021043849_101_back.png\\\"]}\"', 'Arial', '#b32ebc', 'square', 'vertical', NULL, 'left', '#f8d521', '20251021043849_1_front.png', '20251021043849_101_back.png', 'standard', 1, 'business_cards/20251021043849_1_front.png', 1, 'business_cards/20251021043849_101_back.png', NULL, 'order_placed', '2025-10-21 09:37:24', '2025-10-21 10:38:49'),
(78, NULL, NULL, 'Mason Booth', 'Nihil dolore quasi e', 'Ortiz and York Inc', '+1 (144) 979-6016', 'hireg@mailinator.com', NULL, 'A aut aut autem inve', '20251021053018_1_front.png', '\"{\\\"front_upload_files\\\":[\\\"20251021053018_1_front.png\\\"],\\\"back_upload_files\\\":[\\\"20251021053018_101_back.png\\\"]}\"', 'Segoe UI', '#b68072', 'square', 'vertical', '14pt', 'right', '#818af1', '20251021053018_1_front.png', '20251021053018_101_back.png', 'standard', 1, 'business_cards/20251021053018_1_front.png', 1, 'business_cards/20251021053018_101_back.png', NULL, 'order_placed', '2025-10-21 10:53:59', '2025-10-21 11:30:18'),
(79, NULL, NULL, 'Randall Barrera', 'Maxime cupidatat lab', 'Dennis and Sellers Traders', '+1 (787) 497-6466', 'kosikahaq@mailinator.com', NULL, 'Aliquid labore et ip', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021053137_100_back.png\\\",\\\"20251021053137_101_back.png\\\"]}\"', 'Segoe UI', '#684a05', 'standard', 'vertical', '14pt', 'left', '#7af5b9', '', '20251021053137_100_back.png', 'rounded', 0, 'business_cards/card_front1761024697.png', 1, 'business_cards/card_back1761024697.png', NULL, 'order_placed', '2025-10-21 11:31:37', '2025-10-21 11:31:37'),
(80, NULL, NULL, 'Davis Mitchell', 'Voluptatibus volupta', 'Russell Fisher Plc', '+1 (811) 327-3306', 'guxec@mailinator.com', NULL, 'Aspernatur aliquam f', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021054607_100_back.png\\\",\\\"20251021054607_101_back.png\\\"]}\"', 'Courier New', '#0cb56f', 'square', 'vertical', '14pt', 'left', '#d2b8b5', '', '20251021054607_100_back.png', 'standard', 0, 'business_cards/card_front1761025567.png', 1, 'business_cards/card_back1761025567.png', NULL, 'order_placed', '2025-10-21 11:46:07', '2025-10-21 11:46:07'),
(81, NULL, NULL, 'Cameran Haynes', 'Culpa minus natus c', 'Vaughn and Skinner Inc', '+1 (105) 239-4826', 'rexocom@mailinator.com', NULL, 'Eligendi iure facili', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021054846_101_back.png\\\"]}\"', 'Segoe UI', '#cc2f3a', 'square', 'vertical', '16pt', 'center', '#52e974', '', '20251021054846_101_back.png', 'standard', 0, 'business_cards/card_front1761025671.png', 1, 'business_cards/20251021054846_101_back.png', NULL, 'order_placed', '2025-10-21 11:47:51', '2025-10-21 11:48:46'),
(82, NULL, NULL, 'Aaron Cruz', 'Explicabo Id volup', 'Rivers and Thomas LLC', '+1 (508) 946-6043', 'production8421@gmail.com', NULL, 'Accusamus velit aliq', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021074418_100_back.png\\\",\\\"20251021074418_101_back.png\\\"]}\"', 'Arial', '#69ad52', 'square', 'horizontal', '14pt', 'center', '#9bac54', '', '20251021074418_100_back.png', 'standard', 0, 'business_cards/card_front1761032658.png', 1, 'business_cards/card_back1761032658.png', NULL, 'order_placed', '2025-10-21 13:44:18', '2025-10-21 13:44:18'),
(83, NULL, NULL, 'Kieran Olson', 'Explicabo Vel natus', 'Browning and Lawrence LLC', '+1 (897) 644-4199', 'radaxip@mailinator.com', NULL, 'Voluptates veritatis', NULL, '\"{\\\"front_upload_files\\\":[],\\\"back_upload_files\\\":[\\\"20251021083100_101_back.png\\\"]}\"', 'Courier New', '#33d0d9', 'square', 'horizontal', '16pt', 'center', '#617b9e', '', '20251021083100_101_back.png', 'rounded', 0, 'business_cards/card_front1761035409.png', 1, 'business_cards/20251021083100_101_back.png', NULL, 'order_placed', '2025-10-21 14:30:09', '2025-10-21 14:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `business_card_categories`
--

CREATE TABLE `business_card_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL COMMENT '0=no parent',
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_card_categories`
--

INSERT INTO `business_card_categories` (`id`, `created_by`, `parent_id`, `title`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 'Standard', '20251003204007.webp', '1', NULL, '2025-10-03 15:40:07', '2025-10-03 15:40:07'),
(2, 1, '0', 'Premium', NULL, '1', NULL, '2025-10-03 15:43:02', '2025-10-03 15:43:02'),
(3, 1, '0', 'Deluxe', NULL, '1', NULL, '2025-10-03 15:43:48', '2025-10-03 15:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `business_card_elements`
--

CREATE TABLE `business_card_elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `element_type` varchar(255) NOT NULL,
  `element_name` varchar(255) NOT NULL,
  `position` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`position`)),
  `size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`size`)),
  `style` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`style`)),
  `default_text` text DEFAULT NULL,
  `is_editable` tinyint(1) NOT NULL DEFAULT 1,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `z_index` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_card_elements`
--

INSERT INTO `business_card_elements` (`id`, `template_id`, `element_type`, `element_name`, `position`, `size`, `style`, `default_text`, `is_editable`, `is_required`, `z_index`, `created_at`, `updated_at`) VALUES
(1, 1, 'text', 'name', '{\"x\":50,\"y\":30}', '{\"width\":200,\"height\":30}', '{\"fontSize\":18,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Your Name', 1, 1, 10, '2025-10-03 11:35:48', '2025-10-03 11:35:48'),
(2, 1, 'text', 'job_title', '{\"x\":50,\"y\":60}', '{\"width\":200,\"height\":25}', '{\"fontSize\":14,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Job Title', 1, 0, 9, '2025-10-03 11:35:48', '2025-10-03 11:35:48'),
(3, 1, 'text', 'company', '{\"x\":50,\"y\":90}', '{\"width\":200,\"height\":25}', '{\"fontSize\":16,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Company Name', 1, 0, 8, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(4, 1, 'text', 'phone', '{\"x\":50,\"y\":120}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Phone Number', 1, 0, 7, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(5, 1, 'text', 'email', '{\"x\":50,\"y\":140}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Email Address', 1, 0, 6, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(6, 1, 'text', 'website', '{\"x\":50,\"y\":160}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Website', 1, 0, 5, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(7, 1, 'image', 'logo', '{\"x\":250,\"y\":30}', '{\"width\":80,\"height\":80}', '{\"borderRadius\":0,\"opacity\":1}', NULL, 1, 0, 15, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(8, 2, 'text', 'name', '{\"x\":50,\"y\":30}', '{\"width\":200,\"height\":30}', '{\"fontSize\":18,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Your Name', 1, 1, 10, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(9, 2, 'text', 'job_title', '{\"x\":50,\"y\":60}', '{\"width\":200,\"height\":25}', '{\"fontSize\":14,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Job Title', 1, 0, 9, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(10, 2, 'text', 'company', '{\"x\":50,\"y\":90}', '{\"width\":200,\"height\":25}', '{\"fontSize\":16,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Company Name', 1, 0, 8, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(11, 2, 'text', 'phone', '{\"x\":50,\"y\":120}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Phone Number', 1, 0, 7, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(12, 2, 'text', 'email', '{\"x\":50,\"y\":140}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Email Address', 1, 0, 6, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(13, 2, 'text', 'website', '{\"x\":50,\"y\":160}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Website', 1, 0, 5, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(14, 2, 'image', 'logo', '{\"x\":250,\"y\":30}', '{\"width\":80,\"height\":80}', '{\"borderRadius\":0,\"opacity\":1}', NULL, 1, 0, 15, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(15, 3, 'text', 'name', '{\"x\":50,\"y\":30}', '{\"width\":200,\"height\":30}', '{\"fontSize\":18,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Your Name', 1, 1, 10, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(16, 3, 'text', 'job_title', '{\"x\":50,\"y\":60}', '{\"width\":200,\"height\":25}', '{\"fontSize\":14,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Job Title', 1, 0, 9, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(17, 3, 'text', 'company', '{\"x\":50,\"y\":90}', '{\"width\":200,\"height\":25}', '{\"fontSize\":16,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Company Name', 1, 0, 8, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(18, 3, 'text', 'phone', '{\"x\":50,\"y\":120}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Phone Number', 1, 0, 7, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(19, 3, 'text', 'email', '{\"x\":50,\"y\":140}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Email Address', 1, 0, 6, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(20, 3, 'text', 'website', '{\"x\":50,\"y\":160}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Website', 1, 0, 5, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(21, 3, 'image', 'logo', '{\"x\":250,\"y\":30}', '{\"width\":80,\"height\":80}', '{\"borderRadius\":0,\"opacity\":1}', NULL, 1, 0, 15, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(22, 4, 'text', 'name', '{\"x\":50,\"y\":30}', '{\"width\":200,\"height\":30}', '{\"fontSize\":18,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Your Name', 1, 1, 10, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(23, 4, 'text', 'job_title', '{\"x\":50,\"y\":60}', '{\"width\":200,\"height\":25}', '{\"fontSize\":14,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Job Title', 1, 0, 9, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(24, 4, 'text', 'company', '{\"x\":50,\"y\":90}', '{\"width\":200,\"height\":25}', '{\"fontSize\":16,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Company Name', 1, 0, 8, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(25, 4, 'text', 'phone', '{\"x\":50,\"y\":120}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Phone Number', 1, 0, 7, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(26, 4, 'text', 'email', '{\"x\":50,\"y\":140}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Email Address', 1, 0, 6, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(27, 4, 'text', 'website', '{\"x\":50,\"y\":160}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Website', 1, 0, 5, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(28, 4, 'image', 'logo', '{\"x\":250,\"y\":30}', '{\"width\":80,\"height\":80}', '{\"borderRadius\":0,\"opacity\":1}', NULL, 1, 0, 15, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(29, 5, 'text', 'name', '{\"x\":50,\"y\":30}', '{\"width\":200,\"height\":30}', '{\"fontSize\":18,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Your Name', 1, 1, 10, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(30, 5, 'text', 'job_title', '{\"x\":50,\"y\":60}', '{\"width\":200,\"height\":25}', '{\"fontSize\":14,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Job Title', 1, 0, 9, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(31, 5, 'text', 'company', '{\"x\":50,\"y\":90}', '{\"width\":200,\"height\":25}', '{\"fontSize\":16,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Company Name', 1, 0, 8, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(32, 5, 'text', 'phone', '{\"x\":50,\"y\":120}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Phone Number', 1, 0, 7, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(33, 5, 'text', 'email', '{\"x\":50,\"y\":140}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Email Address', 1, 0, 6, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(34, 5, 'text', 'website', '{\"x\":50,\"y\":160}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Website', 1, 0, 5, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(35, 5, 'image', 'logo', '{\"x\":250,\"y\":30}', '{\"width\":80,\"height\":80}', '{\"borderRadius\":0,\"opacity\":1}', NULL, 1, 0, 15, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(36, 6, 'text', 'name', '{\"x\":50,\"y\":30}', '{\"width\":200,\"height\":30}', '{\"fontSize\":18,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Your Name', 1, 1, 10, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(37, 6, 'text', 'job_title', '{\"x\":50,\"y\":60}', '{\"width\":200,\"height\":25}', '{\"fontSize\":14,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Job Title', 1, 0, 9, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(38, 6, 'text', 'company', '{\"x\":50,\"y\":90}', '{\"width\":200,\"height\":25}', '{\"fontSize\":16,\"fontFamily\":\"Arial\",\"color\":\"#333333\",\"fontWeight\":\"bold\",\"alignment\":\"left\"}', 'Company Name', 1, 0, 8, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(39, 6, 'text', 'phone', '{\"x\":50,\"y\":120}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Phone Number', 1, 0, 7, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(40, 6, 'text', 'email', '{\"x\":50,\"y\":140}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Email Address', 1, 0, 6, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(41, 6, 'text', 'website', '{\"x\":50,\"y\":160}', '{\"width\":200,\"height\":20}', '{\"fontSize\":12,\"fontFamily\":\"Arial\",\"color\":\"#666666\",\"fontWeight\":\"normal\",\"alignment\":\"left\"}', 'Website', 1, 0, 5, '2025-10-03 11:35:51', '2025-10-03 11:35:51'),
(42, 6, 'image', 'logo', '{\"x\":250,\"y\":30}', '{\"width\":80,\"height\":80}', '{\"borderRadius\":0,\"opacity\":1}', NULL, 1, 0, 15, '2025-10-03 11:35:51', '2025-10-03 11:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `business_card_options`
--

CREATE TABLE `business_card_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `option_key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price_modifier` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_card_options`
--

INSERT INTO `business_card_options` (`id`, `option_type`, `option_key`, `name`, `description`, `price_modifier`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'paper_stock', 'matte', 'Matte Finish', 'Professional matte finish perfect for business cards', 0.00, 1, 1, '2025-10-03 13:32:08', '2025-10-03 13:32:08'),
(2, 'paper_stock', 'glossy', 'Glossy Finish', 'High-gloss finish for vibrant colors and sharp images', 0.05, 1, 2, '2025-10-03 13:32:08', '2025-10-03 13:32:08'),
(3, 'paper_stock', 'premium', 'Premium Cardstock', 'Premium 350gsm cardstock for luxury feel', 0.15, 1, 3, '2025-10-03 13:32:08', '2025-10-03 13:32:08'),
(4, 'paper_stock', 'kraft', 'Kraft Paper', 'Eco-friendly kraft paper with natural texture', 0.10, 1, 4, '2025-10-03 13:32:08', '2025-10-03 13:32:08'),
(5, 'paper_stock', 'linen', 'Linen Finish', 'Textured linen finish for a classic look', 0.08, 1, 5, '2025-10-03 13:32:09', '2025-10-03 13:32:09'),
(6, 'corner_style', 'standard', 'Standard (Square)', 'Traditional square corners', 0.00, 1, 1, '2025-10-03 13:32:09', '2025-10-03 13:32:09'),
(7, 'corner_style', 'rounded', 'Rounded Corners', 'Modern rounded corners', 0.02, 1, 2, '2025-10-03 13:32:09', '2025-10-03 13:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `business_card_orders`
--

CREATE TABLE `business_card_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_card_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_number` varchar(255) NOT NULL,
  `paper_stock` varchar(255) NOT NULL,
  `corner_style` varchar(255) NOT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `upload_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`upload_files`)),
  `options_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options_data`)),
  `base_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_card_orders`
--

INSERT INTO `business_card_orders` (`id`, `business_card_id`, `user_id`, `order_number`, `paper_stock`, `corner_style`, `text_color`, `background_color`, `quantity`, `upload_files`, `options_data`, `base_price`, `total_price`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'BC-2025-624906', 'premium', 'standard', '#0e477d', '#0bfc8d', 15000, '[\"20251014000433.jpeg\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 2700.00, 2700.00, 'pending', 'Veniam tempore par', '2025-10-13 19:04:33', '2025-10-13 20:09:22'),
(2, 3, NULL, 'BC-2025-108387', 'premium', 'rounded', '#030244', '#ea0f16', 10000, '[\"20251014003938_front.jpg\",\"20251014003938_back.jpeg\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 2000.00, 2000.00, 'pending', 'Labore aut qui dolor', '2025-10-13 19:39:38', '2025-10-13 20:09:22'),
(3, 4, NULL, 'BC-2025-051576', 'glossy', 'standard', '#896fc4', '#c26600', 15000, '[\"20251014010218_front.jpg\",\"20251014010218_back.jpeg\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 1800.00, 1800.00, 'pending', 'Lorem voluptas commo', '2025-10-13 20:02:18', '2025-10-13 20:09:22'),
(4, 5, NULL, 'BC-2025-663100', 'matte', 'rounded', '#cf49d6', '#b8a959', 1000, '[\"20251014155953_0_front.jpg\",\"20251014155953_1_front.jpg\",\"20251014155953_100_back.png\",\"20251014155953_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 195.00, 195.00, 'pending', 'Sint consectetur ad', '2025-10-14 10:59:54', '2025-10-14 10:59:54'),
(5, 6, NULL, 'BC-2025-014072', 'glossy', 'rounded', '#a1aa65', '#384cac', 200, '[\"20251014160437_0_front.jpg\",\"20251014160437_1_front.jpg\",\"20251014160437_100_back.jpeg\",\"20251014160437_101_back.jpeg\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 52.00, 52.00, 'pending', 'Et aperiam expedita testttt', '2025-10-14 11:04:38', '2025-10-14 11:04:38'),
(6, 7, NULL, 'BC-2025-620069', 'glossy', 'rounded', '#d2835f', '#a6f1ba', 200, '[\"20251014162157_0_front.png\",\"20251014162157_1_front.png\",\"20251014162157_100_back.jpg\",\"20251014162157_101_back.jpg\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 52.00, 52.00, 'pending', 'Ab consequatur Odit', '2025-10-14 11:21:57', '2025-10-14 11:21:57'),
(7, 8, NULL, 'BC-2025-231706', 'premium', 'rounded', '#ededed', '#201bef', 15000, '[\"20251015042022_0_front.png\",\"20251015042022_1_front.png\",\"20251015042022_100_back.png\",\"20251015042022_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 3000.00, 3000.00, 'pending', 'Sit sunt obcaecati', '2025-10-15 10:20:22', '2025-10-15 10:20:22'),
(8, 9, NULL, 'BC-2025-805112', 'matte', 'standard', '#f2f2f2', '#b1efb1', 100, '[\"20251016023523_0_front.png\",\"20251016023523_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 50.00, 50.00, 'pending', 'Et dolore dolor rem', '2025-10-16 08:35:23', '2025-10-16 08:35:23'),
(9, 10, NULL, 'BC-2025-044064', 'kraft', 'rounded', '#111563', '#2336df', 10000, '[\"20251016023947_0_front.png\",\"20251016023947_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 1600.00, 1600.00, 'pending', 'Proident ut volupta', '2025-10-16 08:39:47', '2025-10-16 08:39:47'),
(10, 11, NULL, 'BC-2025-654003', 'glossy', 'rounded', '#c9e8fa', '#85437e', 50, '[\"20251016024533_0_front.png\",\"20251016024533_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 16.00, 16.00, 'pending', 'Iusto officiis et in', '2025-10-16 08:45:33', '2025-10-16 08:45:33'),
(11, 12, NULL, 'BC-2025-048276', 'glossy', 'rounded', '#c9e8fa', '#85437e', 50, '[\"20251016024547_0_front.png\",\"20251016024547_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 16.00, 16.00, 'pending', 'Iusto officiis et in', '2025-10-16 08:45:47', '2025-10-16 08:45:47'),
(12, 13, NULL, 'BC-2025-319952', 'premium', 'rounded', '#fded58', '#e19347', 100, '[\"20251016024617_0_front.png\",\"20251016024617_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 47.00, 47.00, 'pending', 'Dolore iure at quae', '2025-10-16 08:46:17', '2025-10-16 08:46:17'),
(13, 14, NULL, 'BC-2025-085467', 'premium', 'rounded', '#fded58', '#e19347', 100, '[\"20251016024642_0_front.png\",\"20251016024642_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 47.00, 47.00, 'pending', 'Dolore iure at quae', '2025-10-16 08:46:42', '2025-10-16 08:46:42'),
(14, 15, NULL, 'BC-2025-060027', 'kraft', 'rounded', '#0b98df', '#153bb5', 15000, '[\"20251016024735_0_front.png\",\"20251016024735_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 2400.00, 2400.00, 'pending', 'Autem rerum ducimus', '2025-10-16 08:47:35', '2025-10-16 08:47:35'),
(15, 16, NULL, 'BC-2025-763037', 'premium', 'rounded', '#eae7ee', '#500cd0', 2000, '[\"20251016031022_0_front.png\",\"20251016031022_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 580.00, 580.00, 'pending', 'Dolores officiis eum', '2025-10-16 09:10:22', '2025-10-16 09:10:22'),
(16, 17, NULL, 'BC-2025-430325', 'premium', 'rounded', '#8b1305', '#8a9d8f', 1000, '[\"20251016031103_0_front.png\",\"20251016031103_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 335.00, 335.00, 'pending', 'Irure omnis animi n', '2025-10-16 09:11:03', '2025-10-16 09:11:03'),
(17, 18, NULL, 'BC-2025-582705', 'premium', 'standard', '#930771', '#a086b5', 1000, '[\"20251016041041_0_front.png\",\"20251016041041_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 315.00, 315.00, 'pending', 'Reprehenderit offici', '2025-10-16 10:10:41', '2025-10-16 10:10:41'),
(18, 19, NULL, 'BC-2025-976986', 'matte', 'standard', '#cb6c96', '#a4b1d5', 1000, '[\"20251016044225_0_front.png\",\"20251016044225_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 175.00, 175.00, 'pending', 'Incidunt non sunt b', '2025-10-16 10:42:25', '2025-10-16 10:42:25'),
(19, 20, NULL, 'BC-2025-102497', 'premium', 'rounded', '#5863d3', '#9cfd02', 5000, '[\"20251016044326_0_front.png\",\"20251016044326_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 1225.00, 1225.00, 'pending', 'Proident nostrud do', '2025-10-16 10:43:26', '2025-10-16 10:43:26'),
(20, 21, NULL, 'BC-2025-597306', 'plastic', 'rounded', '#d1d8cc', '#bcd159', 10000, '[\"20251016044521_0_front.png\",\"20251016044521_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 2320.00, 2320.00, 'pending', 'Hic reprehenderit c', '2025-10-16 10:45:21', '2025-10-16 10:45:21'),
(21, 22, NULL, 'BC-2025-637990', 'matte', 'rounded', '#4cceda', '#bfd3c3', 1000, '[\"20251016044741_0_front.png\",\"20251016044741_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 195.00, 195.00, 'pending', 'Tempora accusamus el', '2025-10-16 10:47:41', '2025-10-16 10:47:41'),
(22, 23, NULL, 'BC-2025-899494', 'glossy', 'rounded', '#1172b7', '#515883', 1000, '[\"20251016045727_0_front.png\",\"20251016045727_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 230.00, 230.00, 'pending', 'Amet repellendus C', '2025-10-16 10:57:27', '2025-10-16 10:57:27'),
(23, 24, NULL, 'BC-2025-697597', 'plastic', 'standard', '#68e41e', '#a837ec', 2000, '[\"20251016045929_0_front.png\",\"20251016045929_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 636.00, 636.00, 'pending', 'Et nostrum dolore hi', '2025-10-16 10:59:29', '2025-10-16 10:59:29'),
(24, 25, NULL, 'BC-2025-621721', 'matte', 'standard', '#021702', '#1f3c4d', 5000, '[\"20251016054959_0_front.png\",\"20251016054959_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 625.00, 625.00, 'pending', 'Laboriosam Nam est', '2025-10-16 11:50:00', '2025-10-16 11:50:00'),
(25, 26, NULL, 'BC-2025-193502', 'kraft', 'rounded', '#465931', '#e67784', 1000, '[\"20251016075023_0_front.png\",\"20251016075023_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 265.00, 265.00, 'pending', 'Illum qui perspicia', '2025-10-16 13:50:23', '2025-10-16 13:50:23'),
(26, 27, NULL, 'BC-2025-828964', 'matte', 'standard', '#d12689', '#10bb1f', 45000, '[\"20251016075258_0_front.png\",\"20251016075258_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 4500.00, 4500.00, 'pending', 'Dolores voluptatem a', '2025-10-16 13:52:58', '2025-10-16 13:52:58'),
(27, 28, NULL, 'BC-2025-889364', 'glossy', 'standard', '#0e0d97', '#ffffff', 5000, '[\"20251016075447_100_back.png\",\"20251016075447_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 750.00, 750.00, 'pending', 'Ullam in id necessi', '2025-10-16 13:54:47', '2025-10-16 13:54:47'),
(28, 29, NULL, 'BC-2025-508041', 'plastic', 'standard', '#8e8a2d', '#09e656', 15000, '[\"20251016080011_0_front.png\",\"20251016080011_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 3180.00, 3180.00, 'pending', 'Qui nemo labore id', '2025-10-16 14:00:11', '2025-10-16 14:00:11'),
(29, 30, NULL, 'BC-2025-746791', 'matte', 'standard', '#14f749', '#af821d', 40000, '[\"20251016080103_0_front.png\",\"20251016080103_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 4000.00, 4000.00, 'pending', 'Sed sunt omnis tempo', '2025-10-16 14:01:03', '2025-10-16 14:01:03'),
(30, 31, NULL, 'BC-2025-071031', 'matte', 'standard', '#60cf49', '#685b25', 200, '[\"20251016090126_0_front.png\",\"20251016090126_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 40.00, 40.00, 'pending', 'Temporibus ab sed no', '2025-10-16 15:01:26', '2025-10-16 15:01:26'),
(31, 32, NULL, 'BC-2025-804835', 'plastic', 'standard', '#ffddb2', '#ed7257', 50, '[\"20251016090700_0_front.png\",\"20251016090700_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 26.50, 26.50, 'pending', 'Ut iusto adipisicing', '2025-10-16 15:07:00', '2025-10-16 15:07:00'),
(32, 33, NULL, 'BC-2025-819267', 'plastic', 'rounded', '#e69c3c', '#719c7e', 50, '[\"20251016090754_0_front.png\",\"20251016090754_1_front.png\",\"20251016090754_100_back.png\",\"20251016090754_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 27.50, 27.50, 'pending', 'Expedita laborum Fa', '2025-10-16 15:07:54', '2025-10-16 15:07:54'),
(33, 34, NULL, 'BC-2025-710119', 'premium', 'rounded', '#b5bd7e', '#5d8fee', 10000, '[\"20251016091415_0_front.png\",\"20251016091415_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 2000.00, 2000.00, 'pending', 'Ad aut commodi velit', '2025-10-16 15:14:15', '2025-10-16 15:14:15'),
(34, 35, NULL, 'BC-2025-936965', 'matte', 'rounded', '#6e6f6a', '#eda441', 200, '[\"20251016094233_100_back.png\",\"20251016094233_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 44.00, 44.00, 'pending', 'Ratione accusamus ve', '2025-10-16 15:42:33', '2025-10-16 15:42:33'),
(35, 36, NULL, 'BC-2025-665236', 'premium', 'standard', '#c9c90d', '#a35087', 5000, '[\"20251016094537_100_back.png\",\"20251016094537_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 1125.00, 1125.00, 'pending', 'Aliqua Nesciunt in', '2025-10-16 15:45:37', '2025-10-16 15:45:37'),
(36, 37, NULL, 'BC-2025-963752', 'kraft', 'standard', '#321b4d', '#24b089', 10000, '[\"20251016100053_0_front.png\",\"20251016100053_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 1400.00, 1400.00, 'pending', 'Dolor dignissimos do', '2025-10-16 16:00:53', '2025-10-16 16:00:53'),
(37, 38, NULL, 'BC-2025-012908', 'kraft', 'rounded', '#19cb5d', '#bb031f', 200, '[\"20251016100205_100_back.png\",\"20251016100205_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 60.00, 60.00, 'pending', 'Nostrud magnam neque', '2025-10-16 16:02:05', '2025-10-16 16:02:05'),
(38, 39, NULL, 'BC-2025-551558', 'kraft', 'rounded', '#6cc2c4', '#f3e51a', 200, '[\"20251017025116_0_front.png\",\"20251017025116_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 60.00, 60.00, 'pending', 'Autem quam at nisi a', '2025-10-17 08:51:17', '2025-10-17 08:51:17'),
(39, 40, NULL, 'BC-2025-883352', 'premium', 'standard', '#89720c', '#23e93a', 100, '[\"20251017025919_0_front.png\",\"20251017025919_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 45.00, 45.00, 'pending', 'Irure sed eum eiusmo', '2025-10-17 08:59:19', '2025-10-17 08:59:19'),
(40, 41, NULL, 'BC-2025-980509', 'plastic', 'standard', '#426b03', '#79fad6', 100, '[\"20251017034047_0_front.png\",\"20251017034047_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 53.00, 53.00, 'pending', 'Tenetur expedita num', '2025-10-17 09:40:47', '2025-10-17 09:40:47'),
(41, 42, NULL, 'BC-2025-300703', 'kraft', 'standard', '#b76e19', '#5281fb', 200, '[\"20251017051939_0_front.png\",\"20251017051939_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 56.00, 56.00, 'pending', 'Repellendus Ratione', '2025-10-17 11:19:39', '2025-10-17 11:19:39'),
(42, 43, NULL, 'BC-2025-738375', 'matte', 'standard', '#267491', '#5e9173', 10000, '[\"20251017085633_0_front.png\",\"20251017085633_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 1000.00, 1000.00, 'pending', 'Amet nulla nisi ex', '2025-10-17 14:56:33', '2025-10-17 14:56:33'),
(43, 44, NULL, 'BC-2025-138542', 'premium', 'rounded', '#279fe0', '#95aa15', 15000, '[\"20251017090604_0_front.png\",\"20251017090604_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 3000.00, 3000.00, 'pending', 'Impedit quis facere', '2025-10-17 15:06:04', '2025-10-17 15:06:04'),
(44, 45, NULL, 'BC-2025-792622', 'glossy', 'rounded', '#e35c2a', '#d01b26', 500, '[\"20251017090951_0_front.png\",\"20251017090951_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 130.00, 130.00, 'pending', 'Aliquam et aute est', '2025-10-17 15:09:51', '2025-10-17 15:09:51'),
(45, 46, NULL, 'BC-2025-225435', 'glossy', 'rounded', '#105260', '#20c11a', 100, '[\"20251017091324_0_front.png\",\"20251017091324_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 32.00, 32.00, 'pending', 'Minima dolores qui n', '2025-10-17 15:13:24', '2025-10-17 15:13:24'),
(46, 47, NULL, 'BC-2025-959148', 'premium', 'rounded', '#5e081e', '#e5ffdc', 30000, '[\"20251017091553_0_front.png\",\"20251017091553_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 6000.00, 6000.00, 'pending', 'Voluptas et at eos', '2025-10-17 15:15:53', '2025-10-17 15:15:53'),
(47, 48, NULL, 'BC-2025-677318', 'kraft', 'standard', '#05f1e8', '#ef15e0', 5000, '[\"20251017091813_0_front.png\",\"20251017091813_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 875.00, 875.00, 'pending', 'Dolorem pariatur Om', '2025-10-17 15:18:13', '2025-10-17 15:18:13'),
(48, 49, NULL, 'BC-2025-771379', 'glossy', 'rounded', '#521ec1', '#3f200c', 20000, '[\"20251017092100_0_front.png\",\"20251017092100_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 2800.00, 2800.00, 'pending', 'Enim mollit inventor', '2025-10-17 15:21:00', '2025-10-17 15:21:00'),
(49, 50, NULL, 'BC-2025-825677', 'matte', 'rounded', '#a56ac4', '#86dc15', 2000, '[\"20251017092431_0_front.png\",\"20251017092431_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 340.00, 340.00, 'pending', 'Nulla elit assumend', '2025-10-17 15:24:31', '2025-10-17 15:24:31'),
(50, 51, NULL, 'BC-2025-299833', 'glossy', 'standard', '#a0e9b6', '#617211', 15000, '[\"20251017092949_0_front.png\",\"20251017092949_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 1800.00, 1800.00, 'pending', 'Enim facilis officia', '2025-10-17 15:29:50', '2025-10-17 15:29:50'),
(51, 52, NULL, 'BC-2025-520883', 'glossy', 'standard', '#a0e9b6', '#617211', 15000, '[\"20251017092950_0_front.png\",\"20251017092950_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 1800.00, 1800.00, 'pending', 'Enim facilis officia', '2025-10-17 15:29:50', '2025-10-17 15:29:50'),
(52, 53, NULL, 'BC-2025-988133', 'glossy', 'standard', '#5b314f', '#e5e6d9', 2000, '[\"20251017094843_0_front.png\",\"20251017094843_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 360.00, 360.00, 'pending', 'Et proident tempor', '2025-10-17 15:48:43', '2025-10-17 15:48:43'),
(53, 54, NULL, 'BC-2025-949853', 'premium', 'rounded', '#10b9c8', '#8e391d', 1000, '[\"20251017095225_0_front.png\",\"20251017095225_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 335.00, 335.00, 'pending', 'Aut distinctio Sunt', '2025-10-17 15:52:25', '2025-10-17 15:52:25'),
(54, 55, NULL, 'BC-2025-047380', 'glossy', 'standard', '#b7a15d', '#80319d', 100, '[\"20251017095731_0_front.png\",\"20251017095731_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 30.00, 30.00, 'pending', 'Quibusdam voluptas u', '2025-10-17 15:57:31', '2025-10-17 15:57:31'),
(55, 56, NULL, 'BC-2025-476055', 'kraft', 'standard', '#bd2f36', '#4b7af7', 200, '[\"20251018031142_0_front.png\",\"20251018031142_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 56.00, 56.00, 'pending', 'Sed iste ad ullam ne', '2025-10-18 09:11:42', '2025-10-18 09:11:42'),
(56, 57, NULL, 'BC-2025-423126', 'plastic', 'rounded', '#e33d3f', '#7d26e1', 200, '[\"20251018033005_0_front.png\",\"20251018033005_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 88.80, 88.80, 'pending', 'Deleniti sunt recusa', '2025-10-18 09:30:05', '2025-10-18 09:30:05'),
(57, 58, NULL, 'BC-2025-722246', 'kraft', 'rounded', '#2fbb58', '#bc42f2', 100, '[\"20251018035121_100_back.png\",\"20251018035121_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 37.00, 37.00, 'pending', 'Nulla aut qui fuga', '2025-10-18 09:51:21', '2025-10-18 09:51:21'),
(58, 59, NULL, 'BC-2025-197805', 'matte', 'rounded', '#fb8f1d', '#2a1d1d', 15000, '[\"20251018040006_100_back.png\",\"20251018040006_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 1800.00, 1800.00, 'pending', 'Aut cumque veritatis', '2025-10-18 10:00:06', '2025-10-18 10:00:06'),
(59, 60, NULL, 'BC-2025-716974', 'kraft', 'rounded', '#571e95', '#48b252', 1000, '[\"20251018040357_100_back.png\",\"20251018040357_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 265.00, 265.00, 'pending', 'Dolor qui non quasi', '2025-10-18 10:03:57', '2025-10-18 10:03:57'),
(60, 61, NULL, 'BC-2025-514879', 'glossy', 'rounded', '#c3a89c', '#7f8393', 5000, '[\"20251018040859_100_back.png\",\"20251018040859_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 850.00, 850.00, 'pending', 'Commodi consequatur', '2025-10-18 10:08:59', '2025-10-18 10:08:59'),
(61, 62, NULL, 'BC-2025-562096', 'premium', 'rounded', '#ab486b', '#1d2f36', 10000, '[\"20251018041256_100_back.jpg\",\"20251018041256_101_back.jpg\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 2000.00, 2000.00, 'pending', 'Lorem molestiae cons', '2025-10-18 10:12:56', '2025-10-18 10:12:56'),
(62, 63, NULL, 'BC-2025-728148', 'glossy', 'standard', '#9896cf', '#38007f', 15000, '[\"20251018041533_100_back.png\",\"20251018041533_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 1800.00, 1800.00, 'pending', 'Suscipit nemo sint t', '2025-10-18 10:15:34', '2025-10-18 10:15:34'),
(63, 64, NULL, 'BC-2025-335031', 'plastic', 'rounded', '#fa0c2b', '#069670', 5000, '[\"20251018041740_100_back.png\",\"20251018041740_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 1425.00, 1425.00, 'pending', 'Laudantium necessit', '2025-10-18 10:17:40', '2025-10-18 10:17:40'),
(64, 65, NULL, 'BC-2025-492122', 'plastic', 'standard', '#5a395c', '#c79cd7', 10000, '[\"20251018042045_100_back.png\",\"20251018042045_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 2120.00, 2120.00, 'pending', 'Odio ut nihil conseq', '2025-10-18 10:20:45', '2025-10-18 10:20:45'),
(65, 66, NULL, 'BC-2025-967746', 'plastic', 'rounded', '#c4ff15', '#5696f3', 100, '[\"20251018042630_100_back.png\",\"20251018042630_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 55.00, 55.00, 'pending', 'Facilis nostrum obca', '2025-10-18 10:26:30', '2025-10-18 10:26:30'),
(66, 67, NULL, 'BC-2025-289679', 'matte', 'rounded', '#6122d7', '#05b92a', 5000, '[\"20251018042851_100_back.png\",\"20251018042851_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 725.00, 725.00, 'pending', 'Similique voluptatib', '2025-10-18 10:28:51', '2025-10-18 10:28:51'),
(67, 68, NULL, 'BC-2025-186316', 'matte', 'rounded', '#2c1d49', '#90abde', 15000, '[\"20251018083100_100_back.png\",\"20251018083100_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 1800.00, 1800.00, 'pending', 'Aperiam necessitatib', '2025-10-18 14:31:00', '2025-10-18 14:31:00'),
(68, 69, NULL, 'BC-2025-268335', 'matte', 'rounded', '#1f898b', '#3eec7e', 200, '[\"20251018093743_0_front.png\",\"20251018093743_1_front.png\",\"20251018093743_100_back.png\",\"20251018093743_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 44.00, 44.00, 'pending', 'Reiciendis perferend', '2025-10-18 15:37:43', '2025-10-18 15:37:43'),
(69, 70, NULL, 'BC-2025-955938', 'glossy', 'standard', '#207b70', '#d6c3bc', 200, '[\"20251018100720_0_front.png\",\"20251018100720_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 48.00, 48.00, 'pending', 'Doloremque aperiam a', '2025-10-18 16:07:20', '2025-10-18 16:07:20'),
(70, 71, NULL, 'BC-2025-700647', 'premium', 'standard', '#815c9e', '#c593e0', 35000, '[\"20251018101425_0_front.png\",\"20251018101425_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 6300.00, 6300.00, 'pending', 'Officia obcaecati do', '2025-10-18 16:14:25', '2025-10-18 16:14:25'),
(71, 72, NULL, 'BC-2025-085243', 'premium', 'rounded', '#06013c', '#162456', 1000, '[\"20251018101617_0_front.png\",\"20251018101617_1_front.png\"]', '\"{\\\"paper_display\\\":\\\"Premium Cardstock\\\"}\"', 335.00, 335.00, 'pending', 'Qui ut et officiis t', '2025-10-18 16:16:17', '2025-10-18 16:16:17'),
(72, 73, NULL, 'BC-2025-893381', 'glossy', 'rounded', '#1875c2', '#76fa8f', 10000, '[\"20251021025321_100_back.png\",\"20251021025321_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 1400.00, 1400.00, 'pending', 'Aliquip sint incidu', '2025-10-21 08:53:21', '2025-10-21 08:53:21'),
(73, 74, NULL, 'BC-2025-098865', 'matte', 'rounded', '#a3564d', '#338010', 10000, '[\"20251021030949_100_back.png\",\"20251021030949_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 1200.00, 1200.00, 'pending', 'Incidunt autem esse', '2025-10-21 09:09:49', '2025-10-21 09:09:49'),
(74, 75, NULL, 'BC-2025-631003', 'glossy', 'rounded', '#14edd1', '#cca80b', 2000, '[\"20251021031514_100_back.png\",\"20251021031514_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 400.00, 400.00, 'pending', 'Omnis excepturi et a', '2025-10-21 09:15:14', '2025-10-21 09:15:14'),
(75, 76, NULL, 'BC-2025-104297', 'matte', 'standard', '#3b28a6', '#c584cc', 1000, '[\"20251021031715_100_back.jpg\",\"20251021031715_101_back.jpg\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 175.00, 175.00, 'pending', 'Tenetur modi esse q', '2025-10-21 09:17:15', '2025-10-21 09:17:15'),
(76, 77, NULL, 'BC-2025-836402', 'matte', 'standard', '#b32ebc', '#f8d521', 1000, '[\"20251021033724_0_front.jpg\",\"20251021033724_1_front.jpg\",\"20251021033724_100_back.png\",\"20251021033724_101_back.png\",\"20251021043849_1_front.png\",\"20251021043849_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 25.00, 25.00, 'pending', 'Laboris Nam ea odit', '2025-10-21 09:37:24', '2025-10-21 10:38:49'),
(77, 78, NULL, 'BC-2025-900450', 'kraft', 'standard', '#b68072', '#818af1', 100, '[\"20251021045359_100_back.png\",\"20251021045359_101_back.png\",\"20251021050542_101_back.png\",\"20251021050552_101_back.png\",\"20251021050603_101_back.png\",\"20251021051045_101_back.png\",\"20251021051141_0_front.png\",\"20251021051141_1_front.png\",\"20251021051141_101_back.png\",\"20251021051517_0_front.png\",\"20251021051517_1_front.png\",\"20251021051517_100_back.png\",\"20251021051517_101_back.png\",\"20251021052229_1_front.png\",\"20251021052229_101_back.png\",\"20251021052635_1_front.png\",\"20251021052635_101_back.png\",\"20251021052700_1_front.png\",\"20251021052700_101_back.png\",\"20251021052831_1_front.png\",\"20251021052831_101_back.png\",\"20251021053018_1_front.png\",\"20251021053018_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 35.00, 35.00, 'pending', 'Voluptas sint dolor', '2025-10-21 10:53:59', '2025-10-21 11:30:18'),
(78, 79, NULL, 'BC-2025-241655', 'plastic', 'rounded', '#684a05', '#7af5b9', 200, '[\"20251021053137_100_back.png\",\"20251021053137_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 88.80, 88.80, 'pending', 'Ex iure eius facilis', '2025-10-21 11:31:37', '2025-10-21 11:31:37'),
(79, 80, NULL, 'BC-2025-404013', 'kraft', 'standard', '#0cb56f', '#d2b8b5', 200, '[\"20251021054607_100_back.png\",\"20251021054607_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Kraft Paper\\\"}\"', 56.00, 56.00, 'pending', 'Cupiditate sit ea do', '2025-10-21 11:46:07', '2025-10-21 11:46:07'),
(80, 81, NULL, 'BC-2025-070667', 'glossy', 'standard', '#cc2f3a', '#52e974', 2000, '[\"20251021054751_100_back.png\",\"20251021054751_101_back.png\",\"20251021054846_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Glossy Finish\\\"}\"', 636.00, 636.00, 'pending', 'Doloribus facilis en', '2025-10-21 11:47:51', '2025-10-21 11:48:46'),
(81, 82, NULL, 'BC-2025-126907', 'plastic', 'standard', '#69ad52', '#9bac54', 5000, '[\"20251021074418_100_back.png\",\"20251021074418_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"plastic\\\"}\"', 1325.00, 1325.00, 'pending', 'Aliquam amet et omn', '2025-10-21 13:44:18', '2025-10-21 13:44:18'),
(82, 83, NULL, 'BC-2025-674715', 'matte', 'rounded', '#33d0d9', '#617b9e', 200, '[\"20251021083009_100_back.png\",\"20251021083009_101_back.png\",\"20251021083100_101_back.png\"]', '\"{\\\"paper_display\\\":\\\"Matte Finish\\\"}\"', 44.00, 44.00, 'pending', 'Duis provident mole', '2025-10-21 14:30:09', '2025-10-21 14:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `business_card_templates`
--

CREATE TABLE `business_card_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'general',
  `preview_image` varchar(255) NOT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `template_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`template_data`)),
  `available_colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`available_colors`)),
  `available_fonts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`available_fonts`)),
  `is_premium` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_card_templates`
--

INSERT INTO `business_card_templates` (`id`, `name`, `description`, `category`, `preview_image`, `background_image`, `background_color`, `template_data`, `available_colors`, `available_fonts`, `is_premium`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Corporate Classic', 'Professional and clean design perfect for corporate environments', 'corporate', 'templates/corporate-classic-preview.jpg', NULL, '#ffffff', '{\"background_color\":\"#ffffff\",\"text_color\":\"#333333\",\"accent_color\":\"#2563eb\"}', '[\"#ffffff\",\"#f8fafc\",\"#1e293b\",\"#2563eb\"]', '[\"Arial\",\"Helvetica\",\"Times New Roman\",\"Georgia\"]', 0, 1, 1, '2025-10-03 11:35:48', '2025-10-03 11:35:48'),
(2, 'Modern Minimalist', 'Clean and modern design with plenty of white space', 'minimal', 'templates/modern-minimalist-preview.jpg', NULL, '#ffffff', '{\"background_color\":\"#ffffff\",\"text_color\":\"#1f2937\",\"accent_color\":\"#10b981\"}', '[\"#ffffff\",\"#f9fafb\",\"#1f2937\",\"#10b981\"]', '[\"Roboto\",\"Open Sans\",\"Lato\",\"Arial\"]', 0, 1, 2, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(3, 'Creative Bold', 'Eye-catching design with bold colors and creative layout', 'creative', 'templates/creative-bold-preview.jpg', NULL, '#7c3aed', '{\"background_color\":\"#7c3aed\",\"text_color\":\"#ffffff\",\"accent_color\":\"#fbbf24\"}', '[\"#7c3aed\",\"#ec4899\",\"#f59e0b\",\"#10b981\"]', '[\"Montserrat\",\"Poppins\",\"Roboto\",\"Open Sans\"]', 1, 1, 3, '2025-10-03 11:35:49', '2025-10-03 11:35:49'),
(4, 'Elegant Gold', 'Sophisticated design with gold accents and elegant typography', 'elegant', 'templates/elegant-gold-preview.jpg', NULL, '#1f2937', '{\"background_color\":\"#1f2937\",\"text_color\":\"#ffffff\",\"accent_color\":\"#fbbf24\"}', '[\"#1f2937\",\"#374151\",\"#fbbf24\",\"#f59e0b\"]', '[\"Playfair Display\",\"Georgia\",\"Times New Roman\",\"Merriweather\"]', 1, 1, 4, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(5, 'Tech Modern', 'Sleek design perfect for tech companies and startups', 'modern', 'templates/tech-modern-preview.jpg', NULL, '#0f172a', '{\"background_color\":\"#0f172a\",\"text_color\":\"#ffffff\",\"accent_color\":\"#06b6d4\"}', '[\"#0f172a\",\"#1e293b\",\"#06b6d4\",\"#3b82f6\"]', '[\"Inter\",\"Roboto\",\"Open Sans\",\"Lato\"]', 0, 1, 5, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(6, 'Healthcare Professional', 'Clean and trustworthy design for healthcare professionals', 'corporate', 'templates/healthcare-professional-preview.jpg', NULL, '#ffffff', '{\"background_color\":\"#ffffff\",\"text_color\":\"#1e40af\",\"accent_color\":\"#059669\"}', '[\"#ffffff\",\"#f0f9ff\",\"#1e40af\",\"#059669\"]', '[\"Arial\",\"Helvetica\",\"Roboto\",\"Open Sans\"]', 0, 1, 6, '2025-10-03 11:35:51', '2025-10-03 11:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `career_category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `created_by`, `career_category_id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Test career', '20250903172522.jpg', '<p>Testing description</p>', '1', '2025-09-03 12:25:22', '2025-09-03 15:54:37'),
(2, 1, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '20250903211933.png', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><br /><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><br /><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1', '2025-09-03 16:03:38', '2025-09-03 16:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `career_applications`
--

CREATE TABLE `career_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0=rejected, 1=accepted, null=pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_applications`
--

INSERT INTO `career_applications` (`id`, `career_id`, `name`, `email`, `phone`, `resume`, `cover_letter`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Asjad', 'asjadmmc67@gmail.com', '5574475582', '20250903201515.docx', 'testing cover letter', 1, '2025-09-03 15:15:15', '2025-09-03 15:40:28'),
(2, 1, 'Hilel Riddle', 'asjadmmc67@gmail.com', '5574475582', '20250903205513.docx', 'asdsadasdfsaf sadsaf', 1, '2025-09-03 15:55:13', '2025-09-03 15:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `career_categories`
--

CREATE TABLE `career_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_categories`
--

INSERT INTO `career_categories` (`id`, `created_by`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', '1', NULL, '2025-09-03 12:09:03', '2025-09-03 12:09:03'),
(2, 1, 'Test 2', '1', NULL, '2025-09-03 12:09:13', '2025-09-03 12:09:13'),
(3, 1, 'Test 3', '1', NULL, '2025-09-03 12:09:21', '2025-09-03 12:09:21'),
(4, 1, 'Test 4', '1', NULL, '2025-09-03 12:09:31', '2025-09-03 12:09:31'),
(5, 1, 'Test 5', '1', NULL, '2025-09-03 12:09:39', '2025-09-03 12:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL COMMENT '0=no parent',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `parent_id`, `title`, `slug`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 'Cakes, Cookies & Bakery', 'cakes-cookies-bakery', '20250416221316.webp', '1', NULL, '2025-04-16 17:13:16', '2025-04-22 14:31:12'),
(2, 1, '0', 'Flowers', 'flowers', '20250416221415.webp', '1', NULL, '2025-04-16 17:14:15', '2025-04-22 11:36:31'),
(3, 1, '0', 'Fruit Bouquets', 'fruit-bouquets', '20250416221514.webp', '1', NULL, '2025-04-16 17:15:14', '2025-04-16 17:15:14'),
(4, 1, '0', 'Gift Baskets', 'gift-baskets', '20250416221558.webp', '1', NULL, '2025-04-16 17:15:58', '2025-04-16 17:15:58'),
(5, 1, '0', 'Plants', 'plants', '20250416221650.webp', '1', NULL, '2025-04-16 17:16:50', '2025-04-22 11:36:41'),
(6, 1, '0', 'Personalized Business Gifts', 'personalized-business-gifts', '20250416221754.webp', '1', NULL, '2025-04-16 17:17:54', '2025-04-22 11:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `time_zone` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country`, `city`, `time_zone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USA', 'New York', 'Eastern Time Zone', 1, '2022-05-19 12:26:17', '2022-05-19 12:26:17'),
(2, 'USA', 'California', 'Pacific Time Zone', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(3, 'USA', 'Illinois', 'Central Time Zone', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(4, 'USA', 'Texas', 'Central Time Zone, Mountain Time Zone', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(5, 'USA', 'Pennsylvania', 'Eastern Time Zone', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(6, 'USA', 'Arizona', 'Mountain Time Zone', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(7, 'USA', 'Florida', 'Eastern Time Zone, Central Time Zone', 1, '2022-05-19 12:26:44', '2022-05-19 12:26:44'),
(8, 'USA', 'Indiana', 'Eastern Time Zone, Central Time Zone', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(9, 'USA', 'Ohio', 'Eastern Time Zone', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(10, 'USA', 'North Carolina', 'Eastern Time Zone', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(11, 'USA', 'Michigan', 'Eastern Time Zone, Central Time Zone', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(12, 'USA', 'Tennessee', 'Eastern Time Zone, Central Time Zone', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(13, 'USA', 'Massachusetts', 'Eastern Time Zone', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(14, 'USA', 'Washington', 'Pacific Time Zone', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(15, 'USA', 'Colorado', 'Mountain Time Zone', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(16, 'USA', 'District of Columbia', NULL, 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(17, 'USA', 'Maryland', 'Eastern Time Zone', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(18, 'USA', 'Kentucky', 'Eastern Time Zone, Central Time Zone', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(19, 'USA', 'Oregon', 'Pacific Time Zone, Mountain Time Zone', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(20, 'USA', 'Oklahoma', 'Central Time Zone', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(21, 'USA', 'Wisconsin', 'Central Time Zone', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(22, 'USA', 'Nevada', 'Pacific Time Zone, Mountain Time Zone', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(23, 'USA', 'New Mexico', 'Mountain Time Zone', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(24, 'USA', 'Missouri', 'Central Time Zone', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(25, 'USA', 'Virginia', 'Eastern Time Zone', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(26, 'USA', 'Georgia', 'Eastern Time Zone', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(27, 'USA', 'Nebraska', 'Central Time Zone, Mountain Time Zone', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(28, 'USA', 'Minnesota', 'Central Time Zone', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(29, 'USA', 'Kansas', 'Central Time Zone, Mountain Time Zone', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(30, 'USA', 'Louisiana', 'Central Time Zone', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(31, 'USA', 'Hawaii', 'Hawaii-Aleutian Time Zone', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(32, 'USA', 'Alaska', 'Alaska Time Zone, Hawaii-Aleutian Time Zone', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(33, 'USA', 'New Jersey', 'Eastern Time Zone', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(34, 'USA', 'Idaho', 'Mountain Time Zone, Pacific Time Zone', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(35, 'USA', 'Alabama', 'Central Time Zone', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(36, 'USA', 'Iowa', 'Central Time Zone', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(37, 'USA', 'Arkansas', 'Central Time Zone', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(38, 'USA', 'Utah', 'Mountain Time Zone', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(39, 'USA', 'Rhode Island', 'Eastern Time Zone', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(40, 'USA', 'Mississippi', 'Central Time Zone', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(41, 'USA', 'South Dakota', 'Central Time Zone, Mountain Time Zone', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(42, 'USA', 'Bristol', 'Eastern Time Zone', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(43, 'USA', 'South Carolina', 'Eastern Time Zone', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(44, 'USA', 'New Hampshire', 'Eastern Time Zone', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(45, 'USA', 'North Dakota', 'Central Time Zone, Mountain Time Zone', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(46, 'USA', 'Montana', 'Mountain Time Zone', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(47, 'USA', 'Delaware', 'Eastern Time Zone', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(48, 'USA', 'Maine', 'Eastern Time Zone', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(49, 'USA', 'Wyoming', 'Mountain Time Zone', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(50, 'USA', 'West Virginia', 'Eastern Time Zone', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(51, 'USA', 'Vermont', 'Eastern Time Zone', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collaborators`
--

INSERT INTO `collaborators` (`id`, `created_by`, `title`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vital Choice', '20250822182814.svg', '1', NULL, '2025-08-22 13:28:14', '2025-08-22 15:09:04'),
(2, 1, 'Wolferman\'s Bakery', '20250822201026.svg', '1', NULL, '2025-08-22 15:10:26', '2025-08-22 15:10:26'),
(3, 1, '1-800 Baskets', '20250822201112.svg', '1', NULL, '2025-08-22 15:11:12', '2025-08-22 15:11:27'),
(4, 1, 'Personalization Mall', '20250822201215.svg', '1', NULL, '2025-08-22 15:12:15', '2025-08-22 15:12:15'),
(5, 1, 'Simply Chocolate', '20250822201328.svg', '1', NULL, '2025-08-22 15:13:28', '2025-08-22 15:13:37'),
(6, 1, 'Sharis Berries', '20250822202041.svg', '1', NULL, '2025-08-22 15:20:41', '2025-08-22 15:20:41'),
(7, 1, '1-800 Flowers', '20250822202138.webp', '1', NULL, '2025-08-22 15:21:38', '2025-08-22 15:21:38'),
(8, 1, 'Vista Print', '20250822215550.png', '1', NULL, '2025-08-22 15:22:17', '2025-08-22 16:55:50'),
(9, 1, 'Amazon Associate', '20250822202259.webp', '1', NULL, '2025-08-22 15:22:59', '2025-08-22 15:22:59'),
(10, 1, 'Quality Logo Products', '20250822202548.webp', '1', NULL, '2025-08-22 15:25:48', '2025-08-22 15:25:48'),
(11, 1, 'Cheryl\'s Cookies', '20250822202723.svg', '1', NULL, '2025-08-22 15:27:23', '2025-08-22 15:27:23'),
(12, 1, 'Fruit Bouquets', '20250822202923.svg', '1', NULL, '2025-08-22 15:29:23', '2025-08-22 15:29:23'),
(13, 1, 'Harry & David', '20250822203008.svg', '1', NULL, '2025-08-22 15:30:08', '2025-08-22 15:30:08'),
(14, 1, 'The Popcorn Factory', '20250822203123.svg', '1', NULL, '2025-08-22 15:31:23', '2025-08-22 17:15:34'),
(15, 1, 'AMERICAN DIGITAL AGENCY LLC', '20251021095313.png', '1', NULL, '2025-10-21 15:53:13', '2025-10-21 15:53:13'),
(16, 1, 'Partner of the year', '20251024041032.png', '1', '2025-10-24 04:13:00', '2025-10-24 10:10:32', '2025-10-24 10:13:00'),
(17, 1, 'universaltravelagency', '20251024042422.png', '1', NULL, '2025-10-24 10:24:22', '2025-10-24 10:24:22'),
(18, 1, 'curiseconsuerclub', '20251024042453.png', '1', NULL, '2025-10-24 10:24:53', '2025-10-24 10:24:53'),
(19, 1, 'disney', '20251024042505.png', '1', NULL, '2025-10-24 10:25:05', '2025-10-24 10:25:05'),
(20, 1, 'viking', '20251024042516.png', '1', NULL, '2025-10-24 10:25:16', '2025-10-24 10:25:16'),
(21, 1, 'xpartner', '20251024042529.png', '1', NULL, '2025-10-24 10:25:29', '2025-10-24 10:25:29'),
(22, 1, 'cruis_line_presedent', '20251024042543.png', '1', NULL, '2025-10-24 10:25:43', '2025-10-24 10:25:43'),
(23, 1, 'sandal', '20251024042555.png', '1', NULL, '2025-10-24 10:25:55', '2025-10-24 10:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `plan` enum('Basic','Standard','Enterprise') NOT NULL DEFAULT 'Basic',
  `options` enum('Clientele','Employees','Both') NOT NULL DEFAULT 'Both',
  `description` text DEFAULT NULL,
  `admin_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_employees`
--

CREATE TABLE `company_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `type` enum('employee','client') NOT NULL DEFAULT 'employee',
  `invite_token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `invited_at` timestamp NULL DEFAULT NULL,
  `joined_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `plans` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive , 1=active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `company`, `plans`, `quantity`, `message`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Burke', 'Hopper', 'nevenijud@mailinator.com', '+1 (398) 974-4266', 'Langley and Butler Plc', 'Enterprise Plan', '150', 'Molestiae excepteur', '1', NULL, '2025-04-16 12:25:39', '2025-04-16 12:25:39'),
(2, 'Hilel', 'Riddle', 'dj@sam.com', '5574475582', 'Strickland Ortiz Co', 'Enterprise Plan', '1', 'Duis voluptatem Arc', '1', '2025-07-22 20:20:34', '2025-07-22 15:20:12', '2025-07-22 15:20:34'),
(3, 'Zoe', 'Gibbs', 'hasuryk@mailinator.com', '+1 (705) 465-7443', 'Dean Haney Co', 'Enterprise Plan', 'Employees', 'Reprehenderit asper', '1', NULL, '2025-09-11 16:38:07', '2025-09-11 16:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `discount` bigint(20) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `max_purchase` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `title`, `slug`, `coupon_type`, `discount`, `coupon_code`, `max_purchase`, `start_date`, `expire_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 'New Coupon', 'new-coupon', 'fix', 50, 'UuaeXr', 2, '2022-04-15', '2022-06-30', '1', NULL, '2022-04-13 15:37:02', '2022-06-01 15:28:45'),
(4, 1, 'New Data', 'new-data', 'percent', 20, 'Uuaejh', 30, '2025-05-01', '2025-05-25', '1', NULL, '2022-04-13 15:38:56', '2025-05-19 12:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `usages` bigint(20) NOT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `user_id`, `coupon_code`, `usages`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '7gezfd', 1, '2023-10-26 20:18:19', '2023-10-26 20:16:08', '2023-10-26 20:18:19'),
(2, 1, '7gezfd', 1, NULL, '2023-10-26 20:18:30', '2023-10-26 20:18:30'),
(3, 71, '7gezfd', 1, '2023-10-26 23:07:51', '2023-10-26 20:40:39', '2023-10-26 23:07:51'),
(4, 71, '7gezfd', 1, NULL, '2023-10-27 16:40:02', '2023-10-27 16:40:02'),
(5, 73, '7gezfd', 1, NULL, '2023-10-27 17:37:19', '2023-10-27 17:37:19'),
(6, 1, 'Uuaejh', 1, '2025-05-19 17:25:51', '2025-05-19 12:25:41', '2025-05-19 12:25:51'),
(7, 1, 'Uuaejh', 1, '2025-05-19 17:26:44', '2025-05-19 12:25:54', '2025-05-19 12:26:44'),
(8, 1, 'Uuaejh', 1, NULL, '2025-05-19 12:26:47', '2025-05-19 12:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `created_by`, `question`, `answer`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1, 'Q1: What does NEVER FORGET do exactly?', 'We help companies show appreciation to their employees and clients through personalized gifts, cards, and milestone celebrations — boosting loyalty and morale.', '1', NULL, '2022-04-12 20:11:14', '2025-06-05 14:15:15'),
(8, 1, 'Q2: Do I need to manage the gifting process myself?', 'Nope! We handle everything — from reminders and packaging to delivery. Just provide the dates and preferences, and we take care of the rest.', '1', NULL, '2022-04-12 20:28:43', '2025-06-05 14:15:52'),
(9, 1, 'Q3: Can I send gifts to both clients and employees?', 'Absolutely. You can send appreciation gifts to clients, employees, vendors, or even departments — with custom branding if you’d like.', '1', NULL, '2022-04-12 20:29:50', '2025-06-05 14:16:10'),
(12, 1, 'Q4: Is there a contract required?', 'No long-term contract is required for most plans. However, our Enterprise Plan offers unlimited gifting under a custom agreement.', '1', NULL, '2023-10-27 21:36:24', '2025-06-05 14:16:29'),
(13, 1, 'Q5: Can I integrate your service with my CRM (like Salesforce or HubSpot)?', 'Yes! Our Enterprise Plan includes full CRM integration and automated milestone reminders for seamless management.', '1', NULL, '2025-06-05 14:16:47', '2025-06-05 14:16:47'),
(14, 1, 'Q6: What if I want something that’s not listed?', 'No problem. We offer fully customized gifting solutions. Just reach out for a quote, and we’ll tailor a plan that fits your needs.', '1', NULL, '2025-06-05 14:17:03', '2025-06-05 14:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '71', 1, '1', '2023-10-30 21:57:28', '2023-10-30 21:09:14', '2023-10-30 21:57:28'),
(2, '71', 0, '1', '2023-10-30 21:57:33', '2023-10-30 21:10:04', '2023-10-30 21:57:33'),
(3, '71', 0, '1', '2023-10-30 21:52:46', '2023-10-30 21:27:50', '2023-10-30 21:52:46'),
(4, '71', 0, '1', '2023-10-30 21:48:20', '2023-10-30 21:28:17', '2023-10-30 21:48:20'),
(5, '71', 0, '1', '2023-10-30 21:47:39', '2023-10-30 21:28:43', '2023-10-30 21:47:39'),
(6, '71', 0, '1', '2023-10-30 21:52:38', '2023-10-30 21:48:32', '2023-10-30 21:52:38'),
(7, '71', 0, '1', '2023-10-30 21:52:02', '2023-10-30 21:49:49', '2023-10-30 21:52:02'),
(8, '71', 0, '1', '2023-10-30 21:52:10', '2023-10-30 21:51:48', '2023-10-30 21:52:10'),
(9, '71', 0, '1', NULL, '2023-10-30 21:57:52', '2023-10-30 21:57:52'),
(10, '71', 0, '1', NULL, '2023-10-31 22:56:29', '2023-10-31 22:56:29'),
(11, '74', 0, '1', NULL, '2023-11-01 23:10:54', '2023-11-01 23:10:54');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_06_183800_create_permission_tables', 1),
(10, '2022_04_11_172013_create_options_table', 5),
(15, '2022_04_11_171933_create_questions_table', 9),
(16, '2022_04_12_203003_create_faqs_table', 10),
(20, '2022_04_13_171413_create_coupons_table', 13),
(21, '2022_04_15_173238_create_newsletters_table', 14),
(22, '2022_03_14_084656_create_pages_table', 15),
(24, '2022_03_14_143426_create_page_settings_table', 16),
(25, '2022_04_15_232111_create_sliders_table', 17),
(26, '2022_04_15_232323_create_how_to_plays_table', 18),
(28, '2014_10_12_000000_create_users_table', 19),
(29, '2022_04_22_221040_create_shipping_addresses_table', 20),
(33, '2022_04_13_174758_create_coupon_usages_table', 24),
(37, '2021_05_25_194002_create_payments_table', 28),
(38, '2021_05_25_193711_create_order_details', 29),
(39, '2022_05_13_172133_create_tickets_table', 30),
(40, '2022_04_22_220858_create_billing_addresses_table', 31),
(44, '2021_05_25_182731_create_orders_table', 32),
(46, '2022_05_16_154943_create_winners_table', 33),
(51, '2022_04_11_172137_create_categories_table', 34),
(59, '2023_09_18_183949_create_medium_table', 35),
(62, '2023_09_22_155634_create_sizes_table', 36),
(66, '2023_09_25_163220_create_styles_table', 37),
(76, '2022_04_25_191816_create_about_us_table', 43),
(78, '2022_02_03_082236_create_testimonials_table', 44),
(79, '2024_02_05_225446_create_caterings_table', 45),
(80, '2023_10_13_170550_create_contact_us_table', 46),
(81, '2024_03_19_create_product_images_table', 47),
(83, '2023_10_04_170328_create_variations_table', 48),
(84, '2022_04_07_181713_create_products_table', 49),
(85, '2022_05_18_192740_create_cities_table', 50),
(86, '2022_05_18_193028_create_states_table', 51),
(87, '2022_04_26_170940_create_why_choose_us_table', 52),
(88, '2025_08_22_174856_create_collaborators_table', 53),
(93, '2025_09_03_163038_create_career_categories_table', 56),
(94, '2025_09_02_221731_create_careers_table', 57),
(95, '2025_09_03_153141_create_career_applications_table', 58),
(96, '2025_09_04_213917_create_companies_table', 59),
(97, '2025_09_04_213926_create_company_employees_table', 60),
(98, '2025_09_04_213935_create_occasions_table', 61),
(99, '2025_10_02_205902_add_guest_fields_to_orders_table', 62),
(100, '2025_10_02_221757_remove_unique_email_from_billing_addresses_table', 63),
(101, '2025_10_03_162934_create_business_card_templates_table', 64),
(102, '2025_10_03_162955_create_business_card_elements_table', 65),
(103, '2025_10_02_201433_create_business_cards_table', 66),
(104, '2025_10_03_182456_create_business_card_orders_table', 67),
(105, '2025_10_03_182906_create_business_card_options_table', 68),
(106, '2025_10_03_193616_create_business_card_catagories_table', 69),
(107, '2025_10_03_193616_create_business_card_categories_table', 70),
(108, '2025_10_06_204142_add_text_color_and_background_color_to_business_cards_table', 71),
(109, '2025_10_06_205519_add_color_columns_to_business_card_orders_table', 72),
(110, '2025_10_14_002111_add_front_back_design_fields_to_business_cards_table', 73),
(111, '2025_10_23_201433_create_travel_type_table', 74);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36),
(2, 'App\\Models\\User', 37),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 44),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 46),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48),
(2, 'App\\Models\\User', 49),
(2, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 52),
(2, 'App\\Models\\User', 53),
(2, 'App\\Models\\User', 54),
(2, 'App\\Models\\User', 55),
(2, 'App\\Models\\User', 56),
(2, 'App\\Models\\User', 57),
(2, 'App\\Models\\User', 58),
(2, 'App\\Models\\User', 59),
(2, 'App\\Models\\User', 60),
(2, 'App\\Models\\User', 61),
(2, 'App\\Models\\User', 62),
(2, 'App\\Models\\User', 63),
(2, 'App\\Models\\User', 64),
(2, 'App\\Models\\User', 65),
(2, 'App\\Models\\User', 66),
(2, 'App\\Models\\User', 67),
(2, 'App\\Models\\User', 68),
(2, 'App\\Models\\User', 69),
(2, 'App\\Models\\User', 70),
(2, 'App\\Models\\User', 71),
(2, 'App\\Models\\User', 72),
(2, 'App\\Models\\User', 73),
(2, 'App\\Models\\User', 74),
(2, 'App\\Models\\User', 75),
(2, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 77),
(2, 'App\\Models\\User', 78),
(2, 'App\\Models\\User', 79),
(2, 'App\\Models\\User', 80),
(2, 'App\\Models\\User', 81),
(2, 'App\\Models\\User', 82),
(2, 'App\\Models\\User', 84),
(2, 'App\\Models\\User', 85),
(2, 'App\\Models\\User', 87),
(2, 'App\\Models\\User', 88),
(2, 'App\\Models\\User', 90),
(2, 'App\\Models\\User', 92),
(2, 'App\\Models\\User', 94),
(2, 'App\\Models\\User', 96),
(2, 'App\\Models\\User', 98),
(5, 'App\\Models\\User', 83),
(5, 'App\\Models\\User', 86),
(5, 'App\\Models\\User', 89),
(5, 'App\\Models\\User', 91),
(5, 'App\\Models\\User', 93),
(5, 'App\\Models\\User', 95),
(5, 'App\\Models\\User', 97);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive , 1=active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `name`, `email`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'boge@mailinator.com', '0', '2023-10-13 16:01:00', '2023-10-13 10:54:09', '2023-10-13 11:01:00'),
(2, NULL, 'admin@admin.com', '1', '2023-10-13 16:07:49', '2023-10-13 11:01:18', '2023-10-13 11:07:49'),
(3, NULL, 'boge@mailinator.com', '1', '2024-02-05 21:29:14', '2023-10-13 11:08:01', '2024-02-05 16:29:14'),
(4, NULL, 'admin@gmail.com', '1', '2024-02-05 21:29:19', '2023-10-13 13:12:44', '2024-02-05 16:29:19'),
(5, NULL, 'test@test.com', '1', NULL, '2023-10-13 13:23:25', '2024-02-05 16:29:55'),
(6, NULL, 'admin@gmail.com', '1', '2024-02-05 21:29:28', '2023-10-13 13:25:23', '2024-02-05 16:29:28'),
(7, NULL, 'admin@admin.com', '1', '2024-02-05 21:29:24', '2023-10-13 13:26:41', '2024-02-05 16:29:24'),
(8, NULL, NULL, '1', '2023-10-17 17:07:53', '2023-10-13 13:27:41', '2023-10-17 17:07:53'),
(9, NULL, 'admin@admin.com', '1', '2024-02-05 21:29:09', '2023-10-13 13:31:10', '2024-02-05 16:29:09'),
(10, NULL, 'pyxiqa@mailinator.com', '1', '2024-02-05 21:28:59', '2023-10-16 12:00:46', '2024-02-05 16:28:59'),
(11, NULL, 'test@test.com', '1', '2024-02-05 21:29:05', '2023-10-16 19:26:38', '2024-02-05 16:29:05'),
(12, NULL, 'test@test.com', '1', '2024-02-05 21:28:48', '2023-10-16 19:52:58', '2024-02-05 16:28:48'),
(13, NULL, 'test@test.com', '1', '2024-02-05 21:28:44', '2023-10-16 19:53:08', '2024-02-05 16:28:44'),
(14, NULL, 'test@test.com', '1', '2024-02-05 21:28:39', '2023-10-16 19:53:59', '2024-02-05 16:28:39'),
(15, NULL, 'test@test.com', '1', '2024-02-05 21:28:34', '2023-10-16 19:54:13', '2024-02-05 16:28:34'),
(16, NULL, 'qacociw@mailinator.com', '1', '2024-02-05 21:28:29', '2023-10-27 00:01:01', '2024-02-05 16:28:29'),
(17, NULL, 'tessssssssttt@gamil.com', '1', '2024-02-05 21:28:23', '2024-02-05 16:06:13', '2024-02-05 16:28:23'),
(18, NULL, 'boge@mailinator.com', '1', '2024-02-05 21:28:19', '2024-02-05 16:07:06', '2024-02-05 16:28:19'),
(19, NULL, 'admin@gmail.com', '1', '2024-02-05 21:28:13', '2024-02-05 16:08:14', '2024-02-05 16:28:13'),
(20, NULL, 'test@test.com', '1', '2024-02-05 21:28:08', '2024-02-05 16:23:55', '2024-02-05 16:28:08'),
(21, NULL, 'asjadmmc67@gmail.com', '1', '2024-02-05 21:28:02', '2024-02-05 16:26:53', '2024-02-05 16:28:02'),
(22, NULL, 'sdfsadf@gmail.com', '1', '2025-04-14 19:53:12', '2025-04-07 11:32:34', '2025-04-14 14:53:12'),
(23, NULL, 'Ad@gmail.com', '1', '2025-04-14 19:53:07', '2025-04-07 16:12:52', '2025-04-14 14:53:07'),
(24, NULL, 'dj@sam.com', '1', '2025-07-22 20:21:23', '2025-04-07 16:46:09', '2025-07-22 15:21:23'),
(25, NULL, 'cole@gamil.com', '1', NULL, '2025-04-07 16:55:34', '2025-04-07 16:55:34'),
(26, NULL, 'cole@gamil.com', '1', NULL, '2025-04-07 16:56:47', '2025-04-07 16:56:47'),
(27, NULL, 'newuser@gmail.com', '1', NULL, '2025-04-14 14:49:11', '2025-04-14 14:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('personal','professional') NOT NULL DEFAULT 'personal',
  `title` varchar(255) NOT NULL,
  `occasion_date` date NOT NULL,
  `notes` text DEFAULT NULL,
  `is_recurring` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL COMMENT 'customer id',
  `guest_email` varchar(255) DEFAULT NULL,
  `guest_first_name` varchar(255) DEFAULT NULL,
  `guest_last_name` varchar(255) DEFAULT NULL,
  `guest_phone` varchar(255) DEFAULT NULL,
  `billing_address_id` bigint(20) NOT NULL COMMENT 'customer billing address id',
  `order_number` bigint(20) DEFAULT NULL COMMENT 'Generate 6 digits random number as a order number',
  `coupon_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL COMMENT 'Paytroit Payment',
  `total_amount` bigint(20) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `net_amount` varchar(255) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_note` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL COMMENT '1=Pending, 2=Delivered, 3=Completed, 4=Canceled',
  `payment_status` varchar(255) DEFAULT 'unpaid' COMMENT 'Paid and unpaid',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `guest_email`, `guest_first_name`, `guest_last_name`, `guest_phone`, `billing_address_id`, `order_number`, `coupon_id`, `payment_id`, `payment_method`, `total_amount`, `discount_type`, `discount_amount`, `net_amount`, `order_date`, `order_note`, `order_status`, `payment_status`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 'jajelyt@mailinator.com', 'Rhona', 'Hickman', '+1 (787) 647-9584', 22, 327686, NULL, 'pi_3SDttcLXqt7gmBJh0NTpKPOU', NULL, 67, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 16:18:40', '2025-10-02 16:18:40'),
(2, 0, 'farode@mailinator.com', 'Rhea', 'Mendez', '+1 (748) 634-4919', 23, 417342, NULL, 'pi_3SDtxzLXqt7gmBJh0v6rGfWx', NULL, 57, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 16:23:11', '2025-10-02 16:23:11'),
(3, 0, 'viruw@mailinator.com', 'Keely', 'Tanner', '+1 (461) 331-6654', 24, 144676, NULL, 'pi_3SDuHhLXqt7gmBJh1WNA159k', NULL, 52, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 16:43:34', '2025-10-02 16:43:34'),
(4, 0, 'dimuhob@mailinator.com', 'Hayden', 'Browning', '+1 (204) 547-7269', 25, 679818, NULL, 'pi_3SDuM4LXqt7gmBJh0ekBkJLM', NULL, 29, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 16:48:04', '2025-10-02 16:48:04'),
(5, 0, 'jeqyloq@mailinator.com', 'Eliana', 'Bird', '+1 (421) 962-1263', 26, 911381, NULL, 'pi_3SDuSXLXqt7gmBJh1VuznOVw', NULL, 106, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 16:54:45', '2025-10-02 16:54:45'),
(6, 0, 'asjadmmc67@gmail.com', 'Roary', 'Harper', '+1 (617) 762-4954', 27, 322341, NULL, 'pi_3SDuedLXqt7gmBJh0bGd0AJF', NULL, 32, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:07:16', '2025-10-02 17:07:16'),
(7, 0, 'asjadmmc67@gmail.com', 'Desirae', 'Griffith', '+1 (249) 654-2549', 30, 634099, NULL, 'pi_3SDusaLXqt7gmBJh12TvbC2a', NULL, 37, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:21:40', '2025-10-02 17:21:40'),
(8, 0, 'asjadmmc67@gmail.com', 'George', 'Mercer', '+1 (358) 788-4618', 31, 674910, NULL, 'pi_3SDuwyLXqt7gmBJh0A4AHpHg', NULL, 67, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:26:12', '2025-10-02 17:26:12'),
(9, 0, 'asjadmmc67@gmail.com', 'Kylee', 'Stephenson', '+1 (266) 315-7639', 32, 752884, NULL, 'pi_3SDv1jLXqt7gmBJh0uT8hHpG', NULL, 67, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:31:10', '2025-10-02 17:31:10'),
(10, 0, 'asjadmmc67@gmail.com', 'Sarah', 'Cleveland', '+1 (863) 687-5829', 33, 129587, NULL, 'pi_3SDv5yLXqt7gmBJh07bqn2RB', NULL, 42, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:35:30', '2025-10-02 17:35:30'),
(11, 0, 'asjadmmc67@gmail.com', 'Peter', 'Caldwell', '+1 (847) 197-4213', 34, 700371, NULL, 'pi_3SDv8eLXqt7gmBJh1gJ8UDFc', NULL, 78, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:38:16', '2025-10-02 17:38:16'),
(12, 82, NULL, NULL, NULL, NULL, 35, 446260, NULL, 'pi_3SDvL7LXqt7gmBJh03GwsuHd', NULL, 84, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 17:51:09', '2025-10-02 17:51:09'),
(13, 82, NULL, NULL, NULL, NULL, 35, 257047, NULL, 'pi_3SDvdILXqt7gmBJh0NLieM9b', NULL, 62, NULL, NULL, NULL, '2025-10-02', NULL, 'Pending', 'paid', 1, NULL, '2025-10-02 18:09:56', '2025-10-02 18:09:56'),
(14, 0, 'waxydap@mailinator.com', 'Cassidy', 'Prince', '+1 (714) 834-4902', 36, 484584, NULL, 'pi_3SHvk7LXqt7gmBJh1T70Zt53', NULL, 2700, NULL, NULL, NULL, '2025-10-14', NULL, 'Pending', 'paid', 1, NULL, '2025-10-13 19:05:37', '2025-10-13 19:05:37'),
(15, 0, 'alex@yopmail.com', 'Alex', 'Youn', '1231231234', 37, 558915, NULL, 'pi_3SIuLfLXqt7gmBJh1QED3uup', NULL, 106, NULL, NULL, NULL, '2025-10-17', NULL, 'Completed', 'paid', 1, NULL, '2025-10-17 09:49:39', '2025-10-17 09:52:05'),
(16, 101, 'gajoqymur@mailinator.com', 'Kirby', 'Ortega', '+1 (607) 936-9249', 38, 429234, NULL, 'pi_3SIzChLXqt7gmBJh0edzqYOc', NULL, 1000, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:00:43', '2025-10-17 15:00:43'),
(17, 102, 'liwivesu@mailinator.com', 'Owen', 'Brock', '+1 (728) 688-4032', 39, 884428, NULL, 'pi_3SIzIILXqt7gmBJh1P7JNFA9', NULL, 3000, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:06:25', '2025-10-17 15:06:25'),
(18, 103, 'jeluses@mailinator.com', 'Amos', 'Hendricks', '+1 (285) 503-4806', 40, 746474, NULL, 'pi_3SIzLzLXqt7gmBJh0XgG0LwR', NULL, 130, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:10:15', '2025-10-17 15:10:15'),
(19, 104, 'lajef@mailinator.com', 'Eaton', 'Giles', '+1 (716) 492-5706', 41, 138904, NULL, 'pi_3SIzPPLXqt7gmBJh0wC4cG0e', NULL, 32, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:13:46', '2025-10-17 15:13:46'),
(20, 105, 'qecycekoli@mailinator.com', 'Richard', 'Woods', '+1 (884) 485-7176', 42, 649661, NULL, 'pi_3SIzRmLXqt7gmBJh0adSTRE6', NULL, 6000, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:16:14', '2025-10-17 15:16:14'),
(21, 106, 'rydac@mailinator.com', 'Inga', 'Snow', '+1 (814) 965-3016', 43, 586285, NULL, 'pi_3SIzU1LXqt7gmBJh1AUp9E7y', NULL, 875, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:18:33', '2025-10-17 15:18:33'),
(22, 107, 'natumo@mailinator.com', 'Nissim', 'Jacobs', '+1 (168) 506-1923', 44, 824966, NULL, 'pi_3SIzWiLXqt7gmBJh1e1ulh6e', NULL, 2800, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:21:20', '2025-10-17 15:21:20'),
(23, 108, 'vyvojivuf@mailinator.com', 'Hop', 'Knight', '+1 (779) 189-2972', 45, 321863, NULL, 'pi_3SIza7LXqt7gmBJh09XzqnuT', NULL, 340, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:24:50', '2025-10-17 15:24:50'),
(24, 109, 'pedigedyj@mailinator.com', 'Kadeem', 'Banks', '+1 (976) 851-9094', 46, 109291, NULL, 'pi_3SIzfMLXqt7gmBJh05rN9L0f', NULL, 1800, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:30:16', '2025-10-17 15:30:16'),
(25, 110, 'puhonuny@mailinator.com', 'Brenden', 'Stephenson', '+1 (727) 854-4814', 47, 634460, NULL, 'pi_3SIzxaLXqt7gmBJh1i7P3EMg', NULL, 360, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:49:05', '2025-10-17 15:49:05'),
(26, 111, 'mija@mailinator.com', 'Alden', 'Dudley', '+1 (836) 234-6071', 48, 233193, NULL, 'pi_3SJ019LXqt7gmBJh1YZ106Zu', NULL, 335, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:52:47', '2025-10-17 15:52:47'),
(27, 112, 'buruvyzyp@mailinator.com', 'Hilary', 'Hardy', '+1 (417) 623-6936', 49, 962287, NULL, 'pi_3SJ06ALXqt7gmBJh0aKzmrDD', NULL, 30, NULL, NULL, NULL, '2025-10-17', NULL, 'Pending', 'paid', 1, NULL, '2025-10-17 15:57:57', '2025-10-17 15:57:57'),
(28, 116, 'vojucu@mailinator.com', 'Davis', 'Schultz', '+1 (223) 202-5115', 50, 992688, NULL, 'pi_3SJGTtLXqt7gmBJh01qk3O2U', NULL, 56, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 09:27:37', '2025-10-18 09:27:37'),
(29, 117, 'ryxy@mailinator.com', 'Zahir', 'Terry', '+1 (863) 704-4773', 51, 360168, NULL, 'pi_3SJGWnLXqt7gmBJh1PpC0OEP', NULL, 89, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 09:30:33', '2025-10-18 09:30:33'),
(30, 118, 'kyfu@mailinator.com', 'Zachery', 'York', '+1 (938) 171-8305', 52, 188162, NULL, 'pi_3SJGrULXqt7gmBJh0xY0aFLT', NULL, 37, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 09:51:56', '2025-10-18 09:51:56'),
(31, 119, 'gycicyhi@mailinator.com', 'Tamekah', 'Baxter', '+1 (221) 108-9074', 53, 306078, NULL, 'pi_3SJGztLXqt7gmBJh1yt8BrBU', NULL, 1800, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:00:36', '2025-10-18 10:00:36'),
(32, 120, 'tipelet@mailinator.com', 'Eric', 'Fields', '+1 (766) 838-2289', 54, 227614, NULL, 'pi_3SJH3TLXqt7gmBJh0Fgqn4Qs', NULL, 265, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:04:19', '2025-10-18 10:04:19'),
(33, 121, 'fuvusar@mailinator.com', 'Charissa', 'Baxter', '+1 (436) 464-4145', 55, 189421, NULL, 'pi_3SJH8JLXqt7gmBJh1bzHJ1qr', NULL, 850, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:09:19', '2025-10-18 10:09:19'),
(34, 122, 'dukul@mailinator.com', 'Kiayada', 'Crawford', '+1 (438) 818-4517', 56, 454271, NULL, 'pi_3SJHCALXqt7gmBJh0K447qv3', NULL, 2000, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:13:18', '2025-10-18 10:13:18'),
(35, 123, 'kudejywec@mailinator.com', 'Mufutau', 'Saunders', '+1 (361) 901-7101', 57, 648107, NULL, 'pi_3SJHElLXqt7gmBJh17h43F4Z', NULL, 1800, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:15:59', '2025-10-18 10:15:59'),
(36, 124, 'hiceku@mailinator.com', 'Trevor', 'Ryan', '+1 (235) 359-5806', 58, 628006, NULL, 'pi_3SJHGlLXqt7gmBJh0ohCoSom', NULL, 1425, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:18:03', '2025-10-18 10:18:03'),
(37, 125, 'forok@mailinator.com', 'Raya', 'Savage', '+1 (167) 665-4581', 59, 202801, NULL, 'pi_3SJHJnLXqt7gmBJh1hX6h4QR', NULL, 2120, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:21:11', '2025-10-18 10:21:11'),
(38, 126, 'vunaga@mailinator.com', 'Brianna', 'Lawrence', '+1 (458) 563-5082', 60, 804412, NULL, 'pi_3SJHPILXqt7gmBJh1fYr25mT', NULL, 55, NULL, NULL, NULL, '2025-10-18', NULL, 'Pending', 'paid', 1, NULL, '2025-10-18 10:26:52', '2025-10-18 10:26:52'),
(39, 127, 'duhanaler@mailinator.com', 'Gay', 'Bennett', '+1 (741) 512-7866', 61, 905371, NULL, 'pi_3SKLPiLXqt7gmBJh1Ozjnv7S', NULL, 1400, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 08:55:48', '2025-10-21 08:55:48'),
(40, 128, 'gesimuvoj@mailinator.com', 'Chaney', 'Myers', '+1 (716) 327-8831', 62, 941442, NULL, 'pi_3SKLefLXqt7gmBJh1enegWm4', NULL, 1200, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 09:11:11', '2025-10-21 09:11:11'),
(41, 129, 'qodura@mailinator.com', 'Nissim', 'Campbell', '+1 (516) 805-6346', 63, 813120, NULL, 'pi_3SKLlALXqt7gmBJh1yTTFGPI', NULL, 175, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 09:17:54', '2025-10-21 09:17:54'),
(42, 130, 'lyna@mailinator.com', 'Breanna', 'Jacobs', '+1 (873) 913-6776', 64, 645288, NULL, 'pi_3SKM4nLXqt7gmBJh0mrUGH0U', NULL, 25, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 09:38:11', '2025-10-21 09:38:11'),
(43, 131, 'synysoj@mailinator.com', 'Amber', 'Dyer', '+1 (312) 437-3526', 65, 503164, NULL, 'pi_3SKNzxLXqt7gmBJh0ZWzJp6W', NULL, 89, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 11:41:19', '2025-10-21 11:41:19'),
(44, 132, 'melokit@mailinator.com', 'Arden', 'Sloan', '+1 (644) 905-5269', 66, 611665, NULL, 'pi_3SKO5GLXqt7gmBJh0TYeBSap', NULL, 56, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 11:46:47', '2025-10-21 11:46:47'),
(45, 133, 'ficazeni@mailinator.com', 'Duncan', 'Mcfadden', '+1 (464) 168-2166', 67, 769744, NULL, 'pi_3SKO8CLXqt7gmBJh1u6Lw7cx', NULL, 1272, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 11:49:50', '2025-10-21 11:49:50'),
(46, 134, 'production8421@gmail.com', 'Josephine', 'Mendez', '+1 (178) 486-7893', 68, 855200, NULL, 'pi_3SKPvgLXqt7gmBJh1AInD2mg', NULL, 1325, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 13:45:02', '2025-10-21 13:45:02'),
(47, 134, 'production8421@gmail.com', 'Herrod', 'Barnes', '+1 (143) 279-9083', 69, 604091, NULL, 'pi_3SKQgRLXqt7gmBJh1EVLzwhk', NULL, 88, NULL, NULL, NULL, '2025-10-21', NULL, 'Pending', 'paid', 1, NULL, '2025-10-21 14:33:20', '2025-10-21 14:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `variation_id` int(11) DEFAULT NULL,
  `product_type` varchar(255) NOT NULL DEFAULT 'product',
  `product_id` int(10) NOT NULL DEFAULT 0,
  `product_slug` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `sub_total` double(8,2) NOT NULL,
  `order_status` varchar(255) NOT NULL COMMENT 'succeeded, failed',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `order_date` date DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `category_id`, `sub_category_id`, `variation_id`, `product_type`, `product_id`, `product_slug`, `price`, `quantity`, `message`, `discount_type`, `discount_amount`, `tax`, `sub_total`, `order_status`, `status`, `order_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 16, 19, 'product', 0, 'koftay', 10, 1, 'Regular order', NULL, NULL, NULL, 10.00, 'succeeded', 1, '2024-02-01', NULL, '2024-02-01 11:52:35', '2024-02-01 11:52:35'),
(2, 1, '1', 16, 20, 'product', 0, 'koftay', 20, 1, 'Family order', NULL, NULL, NULL, 20.00, 'succeeded', 1, '2024-02-01', NULL, '2024-02-01 11:52:35', '2024-02-01 11:52:35'),
(3, 1, '1', 15, 21, 'product', 0, 'sambar', 10, 1, 'Sambar 2pcs', NULL, NULL, NULL, 10.00, 'succeeded', 1, '2024-02-01', NULL, '2024-02-01 11:52:35', '2024-02-01 11:52:35'),
(4, 1, '2', 0, NULL, 'product', 0, 'test', 20, 1, 'Test', NULL, NULL, NULL, 20.00, 'succeeded', 1, '2024-02-01', NULL, '2024-02-01 11:52:36', '2024-02-01 11:52:36'),
(5, 2, '1', 16, 19, 'product', 0, 'koftay', 10, 1, NULL, NULL, NULL, NULL, 10.00, 'succeeded', 1, '2024-02-01', NULL, '2024-02-01 12:06:25', '2024-02-01 12:06:25'),
(6, 3, '3', 17, 14, 'product', 0, 'chicken-biryani', 12, 1, 'tesf', NULL, NULL, NULL, 12.00, 'succeeded', 1, '2024-02-02', NULL, '2024-02-02 11:07:10', '2024-02-02 11:07:10'),
(7, 4, '1', 15, 22, 'product', 0, 'sambar', 20, 2, 'tetst', NULL, NULL, NULL, 40.00, 'succeeded', 1, '2024-02-02', NULL, '2024-02-02 13:47:59', '2024-02-02 13:47:59'),
(8, 5, '14', 0, NULL, 'product', 0, 'palak-panner', 16, 1, NULL, NULL, NULL, NULL, 15.99, 'succeeded', 1, '2024-02-07', NULL, '2024-02-07 15:23:11', '2024-02-07 15:23:11'),
(9, 7, NULL, NULL, 2, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 57, 2, NULL, NULL, NULL, NULL, 113.98, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:05:16', '2025-05-20 16:05:16'),
(10, 8, NULL, NULL, NULL, 'product', 0, 'Birthday Belgian Chocolate Dipped Cupcakes', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:09:28', '2025-05-20 16:09:28'),
(11, 9, NULL, NULL, NULL, 'product', 0, 'Birthday Cake Pops & Cookies', 42, 1, NULL, NULL, NULL, NULL, 41.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:19:34', '2025-05-20 16:19:34'),
(12, 10, NULL, NULL, NULL, 'product', 0, 'Cinnamon Sour Cream Coffee Cake', 32, 1, NULL, NULL, NULL, NULL, 31.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:34:57', '2025-05-20 16:34:57'),
(13, 11, NULL, NULL, NULL, 'product', 0, 'Buttercream-Frosted Celebration Sprinkles Cupcakes – 12 cupcakes', 32, 1, NULL, NULL, NULL, NULL, 31.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:36:19', '2025-05-20 16:36:19'),
(14, 12, NULL, NULL, 4, 'product', 0, 'Cheryl’s Signature Bakery Sampler', 83, 1, NULL, NULL, NULL, NULL, 82.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:53:06', '2025-05-20 16:53:06'),
(15, 12, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:53:06', '2025-05-20 16:53:06'),
(16, 13, NULL, NULL, 2, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:55:50', '2025-05-20 16:55:50'),
(17, 14, NULL, NULL, NULL, 'product', 0, 'Buttercream-Frosted Celebration Sprinkles Cupcakes – 6 cupcakes', 42, 1, NULL, NULL, NULL, NULL, 41.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 16:56:32', '2025-05-20 16:56:32'),
(18, 15, NULL, NULL, 9, 'product', 0, 'Magical Unicorn Truffle Cake Pops', 62, 1, NULL, NULL, NULL, NULL, 61.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 17:04:47', '2025-05-20 17:04:47'),
(19, 16, NULL, NULL, NULL, 'product', 0, 'Signature Tea Cakes Assortment', 37, 1, NULL, NULL, NULL, NULL, 36.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 17:07:49', '2025-05-20 17:07:49'),
(20, 18, NULL, NULL, NULL, 'product', 0, 'Classic Signature Cookie Gift Basket', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 17:33:06', '2025-05-20 17:33:06'),
(21, 19, NULL, NULL, 2, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 18:33:09', '2025-05-20 18:33:09'),
(22, 20, NULL, NULL, 38, 'product', 0, 'Perfectly Plated™ Birthday Fruit Platter', 103, 1, NULL, NULL, NULL, NULL, 102.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 18:40:07', '2025-05-20 18:40:07'),
(23, 21, NULL, NULL, 49, 'product', 0, 'Money Tree', 88, 1, NULL, NULL, NULL, NULL, 87.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 18:42:53', '2025-05-20 18:42:53'),
(24, 22, NULL, NULL, 16, 'product', 0, 'Cherished Blooms Bouquet', 62, 1, NULL, NULL, NULL, NULL, 61.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 18:44:08', '2025-05-20 18:44:08'),
(25, 23, NULL, NULL, 1, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 37, 1, NULL, NULL, NULL, NULL, 36.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 18:53:24', '2025-05-20 18:53:24'),
(26, 23, NULL, NULL, NULL, 'product', 0, 'Buttercream-Frosted Assorted Cupcakes – 6 cupcakes', 42, 1, NULL, NULL, NULL, NULL, 41.99, 'Succeeded', 1, '2025-05-20', NULL, '2025-05-20 18:53:24', '2025-05-20 18:53:24'),
(27, 24, NULL, NULL, 1, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 37, 1, NULL, NULL, NULL, NULL, 36.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-20 19:00:43', '2025-05-20 19:00:43'),
(28, 25, NULL, NULL, 39, 'product', 0, 'Distinctive Fruit Basket & Sweets Gift', 103, 1, NULL, NULL, NULL, NULL, 102.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-20 19:05:56', '2025-05-20 19:05:56'),
(29, 26, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 12:13:40', '2025-05-21 12:13:40'),
(30, 26, NULL, NULL, NULL, 'product', 0, 'Birthday Belgian Chocolate Dipped Cupcakes', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 12:13:40', '2025-05-21 12:13:40'),
(31, 27, NULL, NULL, 2, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 16:06:33', '2025-05-21 16:06:33'),
(32, 27, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 16:06:33', '2025-05-21 16:06:33'),
(33, 28, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 16:09:27', '2025-05-21 16:09:27'),
(34, 29, NULL, NULL, 1, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 37, 1, NULL, NULL, NULL, NULL, 36.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 16:10:31', '2025-05-21 16:10:31'),
(35, 30, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 16:14:28', '2025-05-21 16:14:28'),
(36, 31, NULL, NULL, 15, 'product', 0, 'Assorted Roses & Peruvian Lilies', 42, 1, NULL, NULL, NULL, NULL, 41.99, 'Succeeded', 1, '2025-05-21', NULL, '2025-05-21 16:16:42', '2025-05-21 16:16:42'),
(37, 32, NULL, NULL, 1, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 37, 1, NULL, NULL, NULL, NULL, 36.99, 'Succeeded', 1, '2025-06-04', NULL, '2025-06-04 16:33:23', '2025-06-04 16:33:23'),
(38, 33, NULL, NULL, 44, 'product', 0, 'Grand Gardenia™', 47, 2, NULL, NULL, NULL, NULL, 93.98, 'Succeeded', 1, '2025-06-30', NULL, '2025-06-30 15:13:54', '2025-06-30 15:13:54'),
(39, 1, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 16:18:40', '2025-10-02 16:18:40'),
(40, 2, NULL, NULL, NULL, 'product', 0, 'Birthday Belgian Chocolate Dipped Cupcakes', 57, 1, NULL, NULL, NULL, NULL, 56.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 16:23:11', '2025-10-02 16:23:11'),
(41, 3, NULL, NULL, 3, 'product', 0, 'Cheryl’s Signature Bakery Sampler', 52, 1, NULL, NULL, NULL, NULL, 51.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 16:43:34', '2025-10-02 16:43:34'),
(42, 4, NULL, NULL, NULL, 'product', 0, 'Classic Chocolate Chip Cookie Flavor Box', 29, 1, NULL, NULL, NULL, NULL, 28.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 16:48:04', '2025-10-02 16:48:04'),
(43, 5, NULL, NULL, NULL, 'product', 0, 'Cinnamon Sour Cream Coffee Cake', 32, 2, NULL, NULL, NULL, NULL, 63.98, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 16:54:45', '2025-10-02 16:54:45'),
(44, 5, NULL, NULL, NULL, 'product', 0, 'Buttercream-Frosted Assorted Cupcakes – 6 cupcakes', 42, 1, NULL, NULL, NULL, NULL, 41.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 16:54:45', '2025-10-02 16:54:45'),
(45, 6, NULL, NULL, NULL, 'product', 0, 'Buttercream-Frosted Celebration Sprinkles Cupcakes – 12 cupcakes', 32, 1, NULL, NULL, NULL, NULL, 31.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:07:16', '2025-10-02 17:07:16'),
(46, 7, NULL, NULL, 1, 'product', 0, 'Best Birthday Ever! Truffle Cake Pops', 37, 1, NULL, NULL, NULL, NULL, 36.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:21:40', '2025-10-02 17:21:40'),
(47, 8, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:26:12', '2025-10-02 17:26:12'),
(48, 9, NULL, NULL, NULL, 'product', 0, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 67, 1, NULL, NULL, NULL, NULL, 66.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:31:10', '2025-10-02 17:31:10'),
(49, 10, NULL, NULL, NULL, 'product', 0, 'Birthday Cake Pops & Cookies', 42, 1, NULL, NULL, NULL, NULL, 41.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:35:30', '2025-10-02 17:35:30'),
(50, 11, NULL, NULL, NULL, 'product', 0, 'Mix & Match Bakery Gift – Pick 12', 78, 1, NULL, NULL, NULL, NULL, 77.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:38:16', '2025-10-02 17:38:16'),
(51, 12, NULL, NULL, NULL, 'product', 0, 'Buttercream-Frosted Assorted Cupcakes – 6 cupcakes', 42, 2, NULL, NULL, NULL, NULL, 83.98, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 17:51:09', '2025-10-02 17:51:09'),
(52, 13, NULL, NULL, NULL, 'product', 0, 'Cheesecake Party Wheel', 62, 1, NULL, NULL, NULL, NULL, 61.99, 'Succeeded', 1, '2025-10-02', NULL, '2025-10-02 18:09:56', '2025-10-02 18:09:56'),
(53, 14, NULL, NULL, NULL, 'product', 0, 'Business Card Order - premium (15000 cards)', 2700, 1, NULL, NULL, NULL, NULL, 2700.00, 'Succeeded', 1, '2025-10-14', NULL, '2025-10-13 19:05:38', '2025-10-13 19:05:38'),
(54, 15, NULL, NULL, NULL, 'product', 0, 'Business Card Order - plastic (100 cards)', 53, 2, NULL, NULL, NULL, NULL, 106.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 09:49:39', '2025-10-17 09:49:39'),
(55, 16, NULL, NULL, NULL, 'product', 0, 'Business Card Order - matte (10000 cards)', 1000, 1, NULL, NULL, NULL, NULL, 1000.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:00:43', '2025-10-17 15:00:43'),
(56, 17, NULL, NULL, NULL, 'business_card', 44, 'Business Card Order - premium (15000 cards)', 3000, 1, NULL, NULL, NULL, NULL, 3000.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:06:25', '2025-10-17 15:06:25'),
(57, 18, NULL, NULL, NULL, 'business_card', 45, 'Business Card Order - glossy (500 cards)', 130, 1, NULL, NULL, NULL, NULL, 130.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:10:15', '2025-10-17 15:10:15'),
(58, 19, NULL, NULL, NULL, 'business_card', 46, 'Business Card Order - glossy (100 cards)', 32, 1, NULL, NULL, NULL, NULL, 32.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:13:46', '2025-10-17 15:13:46'),
(59, 20, NULL, NULL, NULL, 'business_card', 47, 'Business Card Order - premium (30000 cards)', 6000, 1, NULL, NULL, NULL, NULL, 6000.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:16:14', '2025-10-17 15:16:14'),
(60, 21, NULL, NULL, NULL, 'business_card', 48, 'Business Card Order - kraft (5000 cards)', 875, 1, NULL, NULL, NULL, NULL, 875.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:18:33', '2025-10-17 15:18:33'),
(61, 22, NULL, NULL, NULL, 'business_card', 49, 'Business Card Order - glossy (20000 cards)', 2800, 1, NULL, NULL, NULL, NULL, 2800.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:21:20', '2025-10-17 15:21:20'),
(62, 23, NULL, NULL, NULL, 'business_card', 50, 'Business Card Order - matte (2000 cards)', 340, 1, NULL, NULL, NULL, NULL, 340.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:24:50', '2025-10-17 15:24:50'),
(63, 24, NULL, NULL, NULL, 'business_card', 52, 'Business Card Order - glossy (15000 cards)', 1800, 1, NULL, NULL, NULL, NULL, 1800.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:30:16', '2025-10-17 15:30:16'),
(64, 25, NULL, NULL, NULL, 'business_card', 53, 'Business Card Order - glossy (2000 cards)', 360, 1, NULL, NULL, NULL, NULL, 360.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:49:05', '2025-10-17 15:49:05'),
(65, 26, NULL, NULL, NULL, 'business_card', 54, 'Business Card Order - premium (1000 cards)', 335, 1, NULL, NULL, NULL, NULL, 335.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:52:47', '2025-10-17 15:52:47'),
(66, 27, NULL, NULL, NULL, 'business_card', 55, 'Business Card Order - glossy (100 cards)', 30, 1, NULL, NULL, NULL, NULL, 30.00, 'Succeeded', 1, '2025-10-17', NULL, '2025-10-17 15:57:57', '2025-10-17 15:57:57'),
(67, 28, NULL, NULL, NULL, 'business_card', 56, 'Business Card Order - kraft (200 cards)', 56, 1, NULL, NULL, NULL, NULL, 56.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 09:27:37', '2025-10-18 09:27:37'),
(68, 29, NULL, NULL, NULL, 'business_card', 57, 'Business Card Order - plastic (200 cards)', 89, 1, NULL, NULL, NULL, NULL, 88.80, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 09:30:33', '2025-10-18 09:30:33'),
(69, 30, NULL, NULL, NULL, 'business_card', 58, 'Business Card Order - kraft (100 cards)', 37, 1, NULL, NULL, NULL, NULL, 37.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 09:51:56', '2025-10-18 09:51:56'),
(70, 31, NULL, NULL, NULL, 'business_card', 59, 'Business Card Order - matte (15000 cards)', 1800, 1, NULL, NULL, NULL, NULL, 1800.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:00:36', '2025-10-18 10:00:36'),
(71, 32, NULL, NULL, NULL, 'business_card', 60, 'Business Card Order - kraft (1000 cards)', 265, 1, NULL, NULL, NULL, NULL, 265.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:04:19', '2025-10-18 10:04:19'),
(72, 33, NULL, NULL, NULL, 'business_card', 61, 'Business Card Order - glossy (5000 cards)', 850, 1, NULL, NULL, NULL, NULL, 850.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:09:19', '2025-10-18 10:09:19'),
(73, 34, NULL, NULL, NULL, 'business_card', 62, 'Business Card Order - premium (10000 cards)', 2000, 1, NULL, NULL, NULL, NULL, 2000.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:13:18', '2025-10-18 10:13:18'),
(74, 35, NULL, NULL, NULL, 'business_card', 63, 'Business Card Order - glossy (15000 cards)', 1800, 1, NULL, NULL, NULL, NULL, 1800.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:15:59', '2025-10-18 10:15:59'),
(75, 36, NULL, NULL, NULL, 'business_card', 64, 'Business Card Order - plastic (5000 cards)', 1425, 1, NULL, NULL, NULL, NULL, 1425.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:18:03', '2025-10-18 10:18:03'),
(76, 37, NULL, NULL, NULL, 'business_card', 65, 'Business Card Order - plastic (10000 cards)', 2120, 1, NULL, NULL, NULL, NULL, 2120.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:21:11', '2025-10-18 10:21:11'),
(77, 38, NULL, NULL, NULL, 'business_card', 66, 'Business Card Order - plastic (100 cards)', 55, 1, NULL, NULL, NULL, NULL, 55.00, 'Succeeded', 1, '2025-10-18', NULL, '2025-10-18 10:26:52', '2025-10-18 10:26:52'),
(78, 39, NULL, NULL, NULL, 'business_card', 73, 'Business Card Order - glossy (10000 cards)', 1400, 1, NULL, NULL, NULL, NULL, 1400.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 08:55:48', '2025-10-21 08:55:48'),
(79, 40, NULL, NULL, NULL, 'business_card', 74, 'Business Card Order - matte (10000 cards)', 1200, 1, NULL, NULL, NULL, NULL, 1200.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 09:11:11', '2025-10-21 09:11:11'),
(80, 41, NULL, NULL, NULL, 'business_card', 76, 'Business Card Order - matte (1000 cards)', 175, 1, NULL, NULL, NULL, NULL, 175.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 09:17:54', '2025-10-21 09:17:54'),
(81, 42, NULL, NULL, NULL, 'business_card', 77, 'Business Card Order - matte (100 cards)', 25, 1, NULL, NULL, NULL, NULL, 25.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 09:38:11', '2025-10-21 09:38:11'),
(82, 43, NULL, NULL, NULL, 'business_card', 79, 'Business Card Order - plastic (200 cards)', 89, 1, NULL, NULL, NULL, NULL, 88.80, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 11:41:19', '2025-10-21 11:41:19'),
(83, 44, NULL, NULL, NULL, 'business_card', 80, 'Business Card Order - kraft (200 cards)', 56, 1, NULL, NULL, NULL, NULL, 56.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 11:46:47', '2025-10-21 11:46:47'),
(84, 45, NULL, NULL, NULL, 'business_card', 81, 'Business Card Order - glossy (2000 cards)', 636, 2, NULL, NULL, NULL, NULL, 1272.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 11:49:50', '2025-10-21 11:49:50'),
(85, 46, NULL, NULL, NULL, 'business_card', 82, 'Business Card Order - plastic (5000 cards)', 1325, 1, NULL, NULL, NULL, NULL, 1325.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 13:45:02', '2025-10-21 13:45:02'),
(86, 47, NULL, NULL, NULL, 'business_card', 83, 'Business Card Order - matte (200 cards)', 44, 2, NULL, NULL, NULL, NULL, 88.00, 'Succeeded', 1, '2025-10-21', NULL, '2025-10-21 14:33:20', '2025-10-21 14:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_by`, `title`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Home', 'home', NULL, NULL, NULL, NULL, 1, '2024-02-07 18:07:27', '2022-04-15 14:59:54', '2024-02-07 13:07:27'),
(2, 1, 'About', 'about', NULL, NULL, NULL, NULL, 1, '2024-02-07 18:07:33', '2022-04-15 15:05:47', '2024-02-07 13:07:33'),
(3, 1, 'Header', 'header', '<p>Header</p>', NULL, NULL, NULL, 1, NULL, '2022-04-18 19:38:45', '2024-02-07 13:06:13'),
(4, 1, 'Footer', 'footer', '<p>Footer</p>', NULL, NULL, NULL, 1, NULL, '2022-04-18 19:39:19', '2024-02-07 13:05:56'),
(5, 1, 'Contact Us', 'contact', '<p>Contact Us Page</p>', NULL, NULL, NULL, 1, NULL, '2024-02-05 19:22:52', '2025-04-10 12:32:09'),
(6, 1, 'Why Contact Us?', 'why-contact-us', '<p>Why Contact Us? on Contact us page</p>', NULL, NULL, NULL, 1, NULL, '2025-04-10 12:31:47', '2025-04-10 12:35:50'),
(7, 1, 'How it works', 'how-it-works', NULL, NULL, NULL, NULL, 1, NULL, '2025-07-14 14:25:45', '2025-07-14 14:25:45'),
(8, 1, 'Careers', 'careers', NULL, NULL, NULL, NULL, 1, NULL, '2025-09-02 18:25:54', '2025-09-02 18:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `parent_slug`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'about', '_token', 'CQsPrHIUwW3nc83qiIZ4VtmiH5coAY7VY8ZD9u8T', NULL, '2022-04-15 15:19:32', '2024-02-05 17:47:43'),
(2, 'about', 'parent_slug', 'about', NULL, '2022-04-15 15:19:32', '2022-04-15 15:19:32'),
(3, 'about', 'mt_about', NULL, NULL, '2022-04-15 15:19:32', '2023-09-13 14:32:57'),
(4, 'about', 'about_heading', 'About Us', NULL, '2022-04-15 15:19:32', '2023-10-12 12:40:10'),
(5, 'about', 'about_content', NULL, NULL, '2022-04-15 15:19:32', '2024-02-05 17:47:43'),
(6, 'about', 'about_status', '1', NULL, '2022-04-15 15:19:32', '2022-04-15 15:20:41'),
(7, 'about', 'form_about', NULL, NULL, '2022-04-15 15:19:32', '2022-04-15 15:19:32'),
(8, 'about', 'image', '12102023174010.png', NULL, '2022-04-15 15:19:32', '2023-10-12 12:40:10'),
(9, 'header', '_token', '4ONWremsFXzULtZCKz9D3fCkpJXt8GBgs9brvXRp', NULL, '2022-04-18 19:49:12', '2025-09-26 18:41:13'),
(10, 'header', 'parent_slug', 'header', NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(11, 'header', 'header_email', 'info@neverforgetappreciation.com', NULL, '2022-04-18 19:49:12', '2025-09-26 18:41:13'),
(12, 'header', 'header_phone', '(843) 900-3876 | (843) 998-9900', NULL, '2022-04-18 19:49:12', '2025-09-02 16:58:06'),
(13, 'header', 'form_blog', NULL, NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(14, 'header', 'header_logo', '26082025173616.webp', NULL, '2022-04-18 19:49:12', '2025-08-26 12:36:16'),
(15, 'header', 'header_favicon', '10042025161538.png', NULL, '2022-04-18 19:51:50', '2025-04-10 11:15:38'),
(16, 'footer', '_token', 'Gsb8jKUgx7CMaBocqXS1ewR6Z4vSYaFAhkfvb4PE', NULL, '2022-04-18 20:15:08', '2025-09-08 11:53:03'),
(17, 'footer', 'parent_slug', 'footer', NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(18, 'footer', 'footer_description', '<p>Welcome to customer, employee, and individual connections &amp; appreciation, where we believe that business is built on more than just transactions &ndash; it&rsquo;s built on genuine connections and heartfelt appreciation.</p>', NULL, '2022-04-18 20:15:08', '2025-04-07 16:11:48'),
(19, 'footer', 'footer_email', 'raymond@neverforgetappreciation.com', NULL, '2022-04-18 20:15:08', '2025-04-14 14:47:36'),
(21, 'footer', 'footer_facebook', 'https://www.facebook.com/neverforgetappreciations', NULL, '2022-04-18 20:15:08', '2025-09-08 11:53:03'),
(22, 'footer', 'footer_instagram', 'https://www.instagram.com/neverforgetappreciation/', NULL, '2022-04-18 20:15:08', '2025-09-08 11:53:03'),
(23, 'footer', 'form_blog', NULL, NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(24, 'footer', 'footer_copy_right_right_side', 'All Rights Reserved Designed by <a href=\"https://americandigitalagency.us/\">American Digital Agency</a>', NULL, '2022-04-19 11:45:30', '2025-04-07 15:00:11'),
(25, 'footer', 'footer_copy_right_left_side', '© Copyright 2025 <strong><span>Never Forget Showing Appreciation</span></strong>.', NULL, '2022-04-19 11:45:30', '2025-04-07 15:00:11'),
(26, 'footer', 'footer_image', '07042025200011.png', NULL, '2022-04-19 11:45:30', '2025-04-07 15:00:11'),
(27, 'home', '_token', 'CQsPrHIUwW3nc83qiIZ4VtmiH5coAY7VY8ZD9u8T', NULL, '2022-04-20 00:42:18', '2024-02-05 17:48:08'),
(28, 'home', 'parent_slug', 'home', NULL, '2022-04-20 00:42:18', '2022-04-20 00:42:18'),
(29, 'home', 'banner_heading', NULL, NULL, '2022-04-20 00:42:18', '2024-02-05 17:48:08'),
(30, 'home', 'form_home_blog', NULL, NULL, '2022-04-20 00:42:18', '2022-04-20 00:42:18'),
(31, 'footer', 'footer_phone', '(843) 900-3876 | (843) 998-9900', NULL, '2024-02-05 16:51:31', '2025-09-02 16:57:27'),
(32, 'contact', '_token', '9G9YEqFUlzukrG101SlwV3LWVs1WRwSZR4RDJs3q', NULL, '2024-02-05 19:26:34', '2025-09-11 15:03:09'),
(33, 'contact', 'parent_slug', 'contact', NULL, '2024-02-05 19:26:34', '2024-02-05 19:26:34'),
(34, 'contact', 'contact_heading', 'Fill out the form below, and we’ll get back to you as soon as possible.', NULL, '2024-02-05 19:26:34', '2025-04-10 11:53:56'),
(35, 'contact', 'contact_address', NULL, NULL, '2024-02-05 19:26:34', '2025-04-07 18:49:04'),
(36, 'contact', 'contact_email', 'raymond@neverforgetappreciation.com', NULL, '2024-02-05 19:26:34', '2025-04-14 14:47:22'),
(37, 'contact', 'contact_phone', '(843) 900-3876 | (843) 998-9900', NULL, '2024-02-05 19:26:34', '2025-09-11 15:03:09'),
(38, 'contact', 'contact_map', NULL, NULL, '2024-02-05 19:26:34', '2025-04-07 18:49:04'),
(39, 'contact', 'form_contact', NULL, NULL, '2024-02-05 19:26:34', '2024-02-05 19:26:34'),
(40, 'footer', 'newsletter_title', 'Subscribe To Our <span>Newsletter</span>', NULL, '2024-02-07 12:01:03', '2025-04-07 16:02:47'),
(41, 'footer', 'newsletter_description', '<p>Premium corporate gifts and exclusive deals for your business needs!</p>', NULL, '2024-02-07 12:01:03', '2025-07-11 16:41:43'),
(42, 'contact', 'winter', NULL, NULL, '2024-02-07 12:12:43', '2025-04-07 18:49:04'),
(43, 'contact', 'summer', NULL, NULL, '2024-02-07 12:12:43', '2025-04-07 18:49:04'),
(44, 'footer', 'footer_copy_right', 'Copyright © 2025 Never Forget Showing Appreciation', NULL, '2025-04-07 16:45:10', '2025-09-08 14:01:36'),
(45, 'header', 'admin_header_logo', '10042025162754.png', NULL, '2025-04-10 11:27:54', '2025-04-10 11:27:54'),
(46, 'contact', 'contact_facebook', 'https://www.facebook.com/neverforgetappreciations', NULL, '2025-04-10 12:18:43', '2025-09-08 11:41:31'),
(47, 'contact', 'contact_instagram', 'https://www.instagram.com/neverforgetappreciation/', NULL, '2025-04-10 12:18:43', '2025-09-08 11:41:31'),
(48, 'contact', 'contact_twitter', 'https://x.com/raymond22816940', NULL, '2025-04-10 12:18:43', '2025-09-08 11:41:32'),
(49, 'contact', 'contact_linkedin', 'https://www.linkedin.com/in/raymond-bowman-00745432b/', NULL, '2025-04-10 12:18:43', '2025-09-08 11:41:32'),
(50, 'why-contact-us', '_token', '0JzRC88BMGXbtgeCGTXDGFRARUWkbzss0irQt0mf', NULL, '2025-04-10 12:48:38', '2025-04-10 12:48:38'),
(51, 'why-contact-us', 'parent_slug', 'why-contact-us', NULL, '2025-04-10 12:48:38', '2025-04-10 12:48:38'),
(52, 'why-contact-us', 'why_contact_us_heading', 'Why <span>Contact</span> Us?', NULL, '2025-04-10 12:48:38', '2025-04-10 12:51:41'),
(53, 'why-contact-us', 'title_one', 'Tailored Corporate Gifting Solutions', NULL, '2025-04-10 12:48:38', '2025-04-10 12:48:38'),
(54, 'why-contact-us', 'description_one', 'We create personalized gifting strategies that align with <br> your brand and budget.', NULL, '2025-04-10 12:48:38', '2025-04-10 12:58:48'),
(55, 'why-contact-us', 'title_two', 'Seamless & Hassle-Free Process', NULL, '2025-04-10 12:48:39', '2025-04-10 12:48:39'),
(56, 'why-contact-us', 'description_two', 'From curation to delivery, we handle everything, so you can <br> focus on your business.', NULL, '2025-04-10 12:48:39', '2025-04-10 13:00:20'),
(57, 'why-contact-us', 'title_three', 'Trusted by Leading Companies', NULL, '2025-04-10 12:48:39', '2025-04-10 12:48:39'),
(58, 'why-contact-us', 'title_four', 'Dedicated Support Team', NULL, '2025-04-10 12:48:39', '2025-04-10 12:48:39'),
(59, 'why-contact-us', 'description_four', 'Our experts are here to assist you every step of the way, ensuring <br> a smooth and enjoyable\r\n                            experience.', NULL, '2025-04-10 12:48:39', '2025-04-10 13:01:40'),
(60, 'why-contact-us', 'form_blog', NULL, NULL, '2025-04-10 12:48:39', '2025-04-10 12:48:39'),
(61, 'why-contact-us', 'why_contact_us_image', '10042025174839.png', NULL, '2025-04-10 12:48:39', '2025-04-10 12:48:39'),
(62, 'why-contact-us', 'description_three', 'Businesses rely on us for high-quality, meaningful gifts that <br> strengthen relationships.', NULL, '2025-04-10 12:58:48', '2025-04-10 13:01:27'),
(63, 'contact', 'contact_us_image', '10042025180510.png', NULL, '2025-04-10 13:05:10', '2025-04-10 13:05:10'),
(64, 'how-it-works', '_token', 'cvxlA1mr8Av0WwOus21k0TRKPurQSPHV0QCWuPcz', NULL, '2025-07-14 15:15:15', '2025-08-22 14:32:30'),
(65, 'how-it-works', 'parent_slug', 'how-it-works', NULL, '2025-07-14 15:15:16', '2025-07-14 15:15:16'),
(66, 'how-it-works', 'form_blog', NULL, NULL, '2025-07-14 15:15:16', '2025-07-14 15:15:16'),
(67, 'how-it-works', 'how_it_works_video', '22082025193231.mp4', NULL, '2025-07-14 15:15:16', '2025-08-22 14:32:31'),
(68, 'how-it-works', 'how_it_works_status', '1', NULL, '2025-07-14 15:18:30', '2025-07-14 16:24:32'),
(69, 'careers', '_token', 'KfIcagV7DQoTKv2lJyfMhWf9BgKVHXNgHL2ielyx', NULL, '2025-09-02 18:33:32', '2025-09-03 15:53:44'),
(70, 'careers', 'parent_slug', 'careers', NULL, '2025-09-02 18:33:32', '2025-09-02 18:33:32'),
(71, 'careers', 'career_status', '1', NULL, '2025-09-02 18:33:32', '2025-09-03 15:54:03'),
(72, 'careers', 'form_about', NULL, NULL, '2025-09-02 18:33:32', '2025-09-02 18:33:32'),
(73, 'contact', 'contact_tiktok', 'https://www.tiktok.com/@raymondbowman321', NULL, '2025-09-08 11:43:53', '2025-09-08 11:43:53'),
(74, 'contact', 'contact_pinterest', 'https://www.pinterest.com/', NULL, '2025-09-08 11:43:54', '2025-09-08 11:43:54'),
(75, 'footer', 'footer_disclaimer', '<div>&ldquo;Never Forget Showing Appreciation does not manufacture the products featured on this website. We collaborate with trusted partners to provide these items to help you express appreciation. Any product warranties or guarantees are the responsibility of the manufacturer.&rdquo;</div>', NULL, '2025-09-08 11:53:03', '2025-09-08 12:53:39'),
(76, 'footer', 'footer_twitter', 'https://x.com/raymond22816940', NULL, '2025-09-08 11:53:03', '2025-09-08 11:53:03'),
(77, 'footer', 'footer_linkedin', 'https://www.linkedin.com/in/raymond-bowman-00745432b/', NULL, '2025-09-08 11:53:03', '2025-09-08 11:53:03'),
(78, 'footer', 'footer_tiktok', 'https://www.tiktok.com/@raymondbowman321', NULL, '2025-09-08 11:53:03', '2025-09-08 11:53:03'),
(79, 'footer', 'footer_pinterest', 'https://www.pinterest.com/', NULL, '2025-09-08 11:53:03', '2025-09-08 11:53:03'),
(80, 'footer', 'footer_copy_left', 'Design & Developed by  <a href=\"https://americandigitalagency.com\" target=\"_blank\"> American Digital Agency</a>', NULL, '2025-09-08 14:01:36', '2025-09-08 14:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `transaction_status` int(11) NOT NULL COMMENT '1=Completed, 0=Failed',
  `transaction_date` date NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `cvc` varchar(255) NOT NULL,
  `expiration_month` varchar(255) NOT NULL,
  `expiration_year` varchar(255) NOT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `permission`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'permission-list', 'web', 'list', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(10, 'permission-create', 'web', 'create', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(11, 'permission-edit', 'web', 'edit', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(12, 'permission-delete', 'web', 'delete', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(13, 'role-list', 'web', 'list', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(14, 'role-create', 'web', 'create', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(15, 'role-edit', 'web', 'edit', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(16, 'role-delete', 'web', 'delete', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(17, 'product-list', 'web', 'list', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(18, 'product-create', 'web', 'create', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(19, 'product-edit', 'web', 'edit', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(20, 'product-delete', 'web', 'delete', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(21, 'category-list', 'web', 'list', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(22, 'category-create', 'web', 'create', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(23, 'category-edit', 'web', 'edit', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(24, 'category-delete', 'web', 'delete', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(37, 'faq-list', 'web', 'list', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(38, 'faq-create', 'web', 'create', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(39, 'faq-edit', 'web', 'edit', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(40, 'faq-delete', 'web', 'delete', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(41, 'coupon-list', 'web', 'list', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(42, 'coupon-create', 'web', 'create', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(43, 'coupon-edit', 'web', 'edit', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(44, 'coupon-delete', 'web', 'delete', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(45, 'page-list', 'web', 'list', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(46, 'page-create', 'web', 'create', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(47, 'page-edit', 'web', 'edit', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(48, 'page-delete', 'web', 'delete', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(49, 'setting-list', 'web', 'list', NULL, '2022-04-15 14:29:48', '2022-04-15 14:29:48'),
(50, 'slider-list', 'web', 'list', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(51, 'slider-create', 'web', 'create', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(52, 'slider-edit', 'web', 'edit', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(53, 'slider-delete', 'web', 'delete', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(62, 'user-list', 'web', 'list', NULL, '2022-04-21 17:10:44', '2022-04-21 17:10:44'),
(63, 'user-create', 'web', 'create', NULL, '2022-04-21 17:10:44', '2022-04-21 17:10:44'),
(64, 'user-edit', 'web', 'edit', NULL, '2022-04-21 17:10:44', '2022-04-21 17:10:44'),
(65, 'user-delete', 'web', 'delete', NULL, '2022-04-21 17:10:44', '2022-04-21 17:10:44'),
(78, 'about_us-list', 'web', 'list', NULL, '2022-04-25 14:53:50', '2022-04-25 14:53:50'),
(79, 'about_us-create', 'web', 'create', NULL, '2022-04-25 14:53:50', '2022-04-25 14:53:50'),
(80, 'about_us-edit', 'web', 'edit', NULL, '2022-04-25 14:53:50', '2022-04-25 14:53:50'),
(81, 'about_us-delete', 'web', 'delete', NULL, '2022-04-25 14:53:50', '2022-04-25 14:53:50'),
(82, 'why_choose_us-list', 'web', 'list', NULL, '2022-04-26 12:42:31', '2022-04-26 12:42:31'),
(83, 'why_choose_us-create', 'web', 'create', NULL, '2022-04-26 12:42:31', '2022-04-26 12:42:31'),
(84, 'why_choose_us-edit', 'web', 'edit', NULL, '2022-04-26 12:42:31', '2022-04-26 12:42:31'),
(85, 'why_choose_us-delete', 'web', 'delete', NULL, '2022-04-26 12:42:31', '2022-04-26 12:42:31'),
(86, 'order-list', 'web', 'list', NULL, '2022-05-11 17:24:52', '2022-05-11 17:24:52'),
(87, 'order-create', 'web', 'create', NULL, '2022-05-11 17:24:52', '2022-05-11 17:24:52'),
(88, 'order-edit', 'web', 'edit', NULL, '2022-05-11 17:24:52', '2022-05-11 17:24:52'),
(89, 'order-delete', 'web', 'delete', NULL, '2022-05-11 17:24:52', '2022-05-11 17:24:52'),
(110, 'variations-list', 'web', 'list', NULL, '2023-10-04 12:40:30', '2023-10-04 12:40:30'),
(111, 'variations-create', 'web', 'create', NULL, '2023-10-04 12:40:30', '2023-10-04 12:40:30'),
(112, 'variations-edit', 'web', 'edit', NULL, '2023-10-04 12:40:30', '2023-10-04 12:40:30'),
(113, 'variations-delete', 'web', 'delete', NULL, '2023-10-04 12:40:30', '2023-10-04 12:40:30'),
(114, 'newsletter-list', 'web', 'list', NULL, '2023-10-12 19:40:56', '2023-10-12 19:40:56'),
(115, 'newsletter-create', 'web', 'create', NULL, '2023-10-12 19:40:56', '2023-10-12 19:40:56'),
(116, 'newsletter-edit', 'web', 'edit', NULL, '2023-10-12 19:40:56', '2023-10-12 19:40:56'),
(117, 'newsletter-delete', 'web', 'delete', NULL, '2023-10-12 19:40:56', '2023-10-12 19:40:56'),
(118, 'contactus-list', 'web', 'list', NULL, '2023-10-13 12:15:24', '2023-10-13 12:15:24'),
(119, 'contactus-create', 'web', 'create', NULL, '2023-10-13 12:15:24', '2023-10-13 12:15:24'),
(120, 'contactus-edit', 'web', 'edit', NULL, '2023-10-13 12:15:24', '2023-10-13 12:15:24'),
(121, 'contactus-delete', 'web', 'delete', NULL, '2023-10-13 12:15:24', '2023-10-13 12:15:24'),
(174, 'testimonial-list', 'web', 'list', NULL, '2024-02-05 13:52:05', '2024-02-05 13:52:05'),
(175, 'testimonial-create', 'web', 'create', NULL, '2024-02-05 13:52:05', '2024-02-05 13:52:05'),
(176, 'testimonial-edit', 'web', 'edit', NULL, '2024-02-05 13:52:05', '2024-02-05 13:52:05'),
(177, 'testimonial-delete', 'web', 'delete', NULL, '2024-02-05 13:52:05', '2024-02-05 13:52:05'),
(186, 'collaborator-list', 'web', 'list', NULL, '2025-08-22 13:09:44', '2025-08-22 13:09:44'),
(187, 'collaborator-create', 'web', 'create', NULL, '2025-08-22 13:09:44', '2025-08-22 13:09:44'),
(188, 'collaborator-edit', 'web', 'edit', NULL, '2025-08-22 13:09:44', '2025-08-22 13:09:44'),
(189, 'collaborator-delete', 'web', 'delete', NULL, '2025-08-22 13:09:44', '2025-08-22 13:09:44'),
(190, 'careers-list', 'web', 'list', NULL, '2025-09-02 17:56:21', '2025-09-02 17:56:21'),
(191, 'careers-create', 'web', 'create', NULL, '2025-09-02 17:56:21', '2025-09-02 17:56:21'),
(192, 'careers-edit', 'web', 'edit', NULL, '2025-09-02 17:56:21', '2025-09-02 17:56:21'),
(193, 'careers-delete', 'web', 'delete', NULL, '2025-09-02 17:56:21', '2025-09-02 17:56:21'),
(194, 'career_category-list', 'web', 'list', NULL, '2025-09-03 11:44:37', '2025-09-03 11:44:37'),
(195, 'career_category-create', 'web', 'create', NULL, '2025-09-03 11:44:37', '2025-09-03 11:44:37'),
(196, 'career_category-edit', 'web', 'edit', NULL, '2025-09-03 11:44:37', '2025-09-03 11:44:37'),
(197, 'career_category-delete', 'web', 'delete', NULL, '2025-09-03 11:44:37', '2025-09-03 11:44:37'),
(198, 'business_cards-list', 'web', 'list', NULL, '2025-10-03 12:17:40', '2025-10-03 12:17:40'),
(199, 'business_cards-create', 'web', 'create', NULL, '2025-10-03 12:17:40', '2025-10-03 12:17:40'),
(200, 'business_cards-edit', 'web', 'edit', NULL, '2025-10-03 12:17:40', '2025-10-03 12:17:40'),
(201, 'business_cards-delete', 'web', 'delete', NULL, '2025-10-03 12:17:40', '2025-10-03 12:17:40'),
(202, 'business_card_categories-list', 'web', 'list', NULL, '2025-10-03 12:18:27', '2025-10-03 12:18:27'),
(203, 'business_card_categories-create', 'web', 'create', NULL, '2025-10-03 12:18:27', '2025-10-03 12:18:27'),
(204, 'business_card_categories-edit', 'web', 'edit', NULL, '2025-10-03 12:18:27', '2025-10-03 12:18:27'),
(205, 'business_card_categories-delete', 'web', 'delete', NULL, '2025-10-03 12:18:27', '2025-10-03 12:18:27'),
(206, 'view users', 'web', NULL, NULL, '2025-10-08 17:44:56', '2025-10-08 17:44:56'),
(207, 'create users', 'web', NULL, NULL, '2025-10-08 17:44:57', '2025-10-08 17:44:57'),
(208, 'edit users', 'web', NULL, NULL, '2025-10-08 17:44:57', '2025-10-08 17:44:57'),
(209, 'delete users', 'web', NULL, NULL, '2025-10-08 17:44:57', '2025-10-08 17:44:57'),
(210, 'assign roles', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(211, 'manage roles', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(212, 'manage permissions', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(213, 'view companies', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(214, 'create companies', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(215, 'edit companies', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(216, 'delete companies', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(217, 'manage company employees', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(218, 'view company employees', 'web', NULL, NULL, '2025-10-08 17:44:58', '2025-10-08 17:44:58'),
(219, 'create company employees', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(220, 'edit company employees', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(221, 'delete company employees', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(222, 'bulk upload employees', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(223, 'resend invitations', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(224, 'view products', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(225, 'create products', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(226, 'edit products', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(227, 'delete products', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(228, 'manage categories', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(229, 'manage variations', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(230, 'manage sizes', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(231, 'view orders', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(232, 'manage orders', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(233, 'view order details', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(234, 'update order status', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(235, 'view business cards', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(236, 'create business cards', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(237, 'edit business cards', 'web', NULL, NULL, '2025-10-08 17:44:59', '2025-10-08 17:44:59'),
(238, 'delete business cards', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(239, 'manage business card templates', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(240, 'manage business card categories', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(241, 'manage business card options', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(242, 'view business card orders', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(243, 'manage business card orders', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(244, 'manage pages', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(245, 'manage testimonials', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(246, 'manage faqs', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(247, 'manage about us', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(248, 'manage why choose us', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(249, 'manage careers', 'web', NULL, NULL, '2025-10-08 17:45:00', '2025-10-08 17:45:00'),
(250, 'manage career applications', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(251, 'manage collaborators', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(252, 'manage catering services', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(253, 'view dashboard', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(254, 'manage settings', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(255, 'view reports', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(256, 'manage translations', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(257, 'manage coupons', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(258, 'manage billing addresses', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(259, 'manage shipping addresses', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(260, 'view own profile', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(261, 'edit own profile', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(262, 'view own orders', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(263, 'view own business cards', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(264, 'create own business cards', 'web', NULL, NULL, '2025-10-08 17:45:01', '2025-10-08 17:45:01'),
(265, 'edit own business cards', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(266, 'delete own business cards', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(267, 'view own occasions', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(268, 'create own occasions', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(269, 'edit own occasions', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(270, 'delete own occasions', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(271, 'view company profile', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(272, 'edit company profile', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(273, 'view company orders', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(274, 'view company business cards', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(275, 'manage company business cards', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(276, 'view company occasions', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(277, 'manage company occasions', 'web', NULL, NULL, '2025-10-08 17:45:02', '2025-10-08 17:45:02'),
(278, 'company-list', 'web', 'list', NULL, '2025-10-08 17:53:40', '2025-10-08 17:53:40'),
(279, 'company-create', 'web', 'create', NULL, '2025-10-08 17:53:40', '2025-10-08 17:53:40'),
(280, 'company-edit', 'web', 'edit', NULL, '2025-10-08 17:53:40', '2025-10-08 17:53:40'),
(281, 'company-delete', 'web', 'delete', NULL, '2025-10-08 17:53:40', '2025-10-08 17:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `variations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`variations`)),
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL DEFAULT '0' COMMENT '0=Simple Product, 1= Variable Product',
  `product_price` varchar(255) DEFAULT NULL,
  `variation_price` varchar(255) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_special` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `related_images` longtext DEFAULT NULL,
  `related_product` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive,1= active,2= sold out',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_by`, `category_id`, `variations`, `name`, `slug`, `product_type`, `product_price`, `variation_price`, `short_description`, `description`, `is_special`, `image`, `related_images`, `related_product`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', NULL, 'Bake Me a Wish! Happy Birthday Rainbow Cake', 'bake-me-a-wish-happy-birthday-rainbow-cake', '0', '66.99', NULL, '<h2 class=\"wb_cptb_title\">Product Details</h2>\r\n<div class=\"wb_cptb_content\">\r\n<ul>\r\n<li>7\" Cake. Serves 6 to 8. Approximately 2 lbs. net weight.</li>\r\n</ul>\r\n<p>Bake Me A Wish! uses only the finest ingredients with &mdash; yes &mdash; creamy frostings, premium chocolate, cane sugars, sweet butter and all the other great things that make their gourmet gifts delicious and indulgent. Certified OK Kosher.</p>\r\n</div>', '<p>A magical delight from the wizards in the Bake Me A Wish! kitchen! Our delicious Rainbow Cake in 5 layers of colorful cake with a fruity flavor and covered with a delicious white-cream frosting and topped with a spectrum of frosting dollops. Each gift includes a greeting card that you can personalize online and arrives in an elegant bakery box. Certified Kof-K Dairy</p>', '0', '20250418232129_6802de794d6cb.webp', NULL, NULL, '0', NULL, '2025-04-18 18:21:29', '2025-10-08 13:34:09'),
(2, 1, '1', '[{\"variation_id\":\"1\",\"price\":\"36.99\",\"image\":\"20250418233153_var_6802e0e92a823.webp\"},{\"variation_id\":\"2\",\"price\":\"56.99\",\"image\":\"20250418233153_var_6802e0e92b34a.webp\"}]', 'Best Birthday Ever! Truffle Cake Pops', 'best-birthday-ever-truffle-cake-pops', '1', NULL, '{\"from\":\"36.99\",\"to\":\"56.99\"}', '<h2 class=\"wb_cptb_title\">Product Details</h2>\r\n<div class=\"wb_cptb_content\">\r\n<ol>\r\n<li>12 ea (18oz) Assorted Truffle Cake Pops\r\n<ul>OR</ul>\r\n</li>\r\n<li>6 ea 9oz) Assorted Truffle Cake Pops</li>\r\n</ol>\r\n</div>', '<p>Make their birthday truly special with this incredible gift! These rich, dark and moist chocolate truffle cakes on a stick are so incredibly decadent, it&rsquo;s no surprise that celebrities love&rsquo;em, too. These trend-forward treats are lovingly hand-made by a small artisan bakery that&rsquo;s been featured on The Today Show and Rachel Ray! The luscious truffle cake centers are covered with delicious chocolate, then hand-decorated to perfection with drizzle, and festive non pareils. Easy to share, these gourmet truffle cake pops are an indescribably delicious, A-list dessert that they&rsquo;re certain to love!</p>', '0', '20250418233153_6802e0e927b6e.webp', NULL, NULL, '0', NULL, '2025-04-18 18:31:53', '2025-10-08 13:33:42'),
(3, 1, '1', NULL, 'Birthday Belgian Chocolate Dipped Cupcakes', 'birthday-belgian-chocolate-dipped-cupcakes', '0', '56.99', NULL, '<ol>\r\n<li>Buttercream Infused Chocolate Cupcakes Dipped in Belgian Dark Chocolate; 1 with Mini Chocolate-Coated Candy Pieces, 1 with Bright Sequin Shape Sprinkles, 2 with Red Tinted Belgian White Chocolate Drizzle</li>\r\n<li>Buttercream Infused Chocolate Cupcakes Dipped in Belgian Milk Chocolate; 1 with Bright Sequin Shape Sprinkles, 1 with Orange Tinted Belgian</li>\r\n<li>Buttercream Infused Yellow Cupcakes Dipped in Belgian Milk Chocolate; 1 with Mini Chocolate-Coated Candy Pieces, 1 with Orange Tinted Belgian White Chocolate Drizzle</li>\r\n<li>Buttercream Infused Yellow Cupcakes Dipped in Belgian White Chocolate; 1 with Mini Chocolate Coated-Candy Pieces, 1 with Bright Sequin Shape Sprinkles, 2 with Blue Tinted Belgian White Chocolate Drizzle</li>\r\n<li>Gift Box measures 10\" x 7\" x 3\"</li>\r\n</ol>', '<p>Get the Birthday Party started with these twelve delicious Buttercream Infused Chocolate and Yellow Cupcakes. &nbsp;They&rsquo;re hand-decorated with Belgian Chocolates, Drizzles and Candy Toppings.</p>', '0', '20250418233511_6802e1af87f4b.webp', NULL, NULL, '1', NULL, '2025-04-18 18:35:11', '2025-04-18 18:35:11'),
(4, 1, '1', NULL, 'Birthday Cake Pops & Cookies', 'birthday-cake-pops-cookies', '0', '41.99', NULL, '<ul>\r\n<li>6 Birthday Cake Pops</li>\r\n<li>2 Buttercream-Frosted Birthday Cake Cookies</li>\r\n<li>2 Buttercream-Frosted Chocolate Cake Cookies</li>\r\n<li>2 Buttercream-Frosted Chocolate Sprinkle Cutout Cookies</li>\r\n<li>Cake Pop Box- 6 &frac34; x 5 x 2</li>\r\n<li>Pops- 4&rdquo;</li>\r\n<li>Box- 7 1/8 x 5 &frac12; x 2 &frac12;</li>\r\n</ul>', '<p>Make birthday wishes come true with a gift full of celebratory sweets. To get the party started, we&rsquo;ve included six chocolate cake pops in an array of bright and cheerful colors. There are also three types of our famous buttercream-frosted cookies in our birthday cake, chocolate cake, and chocolate sprinkle cutout flavors, making this a wonderful gift for whoever&rsquo;s blowing out the candles. Cake pop box measures 6 &frac34; x 5 x 2, cake pops each 4&rdquo; tall. 12 pieces</p>', '0', '20250418233637_6802e205e96bd.webp', NULL, NULL, '1', NULL, '2025-04-18 18:36:37', '2025-04-18 18:36:37'),
(5, 1, '1', NULL, 'Buttercream-Frosted Assorted Cupcakes – 6 cupcakes', 'buttercream-frosted-assorted-cupcakes-6-cupcakes', '0', '41.99', NULL, '<ul>\r\n<li>2 Cheryl&rsquo;s Buttercream-Frosted Vanilla Cupcakes</li>\r\n<li>2 Cheryl&rsquo;s Buttercream-Frosted Chocolate Cupcakes</li>\r\n<li>2 Cheryl&rsquo;s Buttercream-Frosted Celebration Sprinkle Cupcakes</li>\r\n<li>Box- 10 &frac12; x 7 &frac34; x 2 1/8</li>\r\n</ul>', '<p>Sweeten anyone&rsquo;s day by sending them this delicious assortment of buttercream-frosted cupcakes. Inside are a half dozen irresistible treats in three delightful varieties. Each cupcake is generously layered with our famous buttercream frosting and topped with a snack-size cookie. This scrumptious array of goodies also includes our new celebration sprinkle cupcakes, which feature a birthday cake-flavored base and plenty of colorful sprinkles. Individually wrapped, these delights are perfect for sharing. OU-D 6 pieces</p>', '0', '20250418233746_6802e24a5a14d.webp', NULL, NULL, '1', NULL, '2025-04-18 18:37:46', '2025-04-18 18:37:46'),
(6, 1, '1', NULL, 'Buttercream-Frosted Celebration Sprinkles Cupcakes – 12 cupcakes', 'buttercream-frosted-celebration-sprinkles-cupcakes-12-cupcakes', '0', '59.99', NULL, '<ul>\r\n<li>12 Cheryl&rsquo;s Buttercream-Frosted Celebration Sprinkle Cupcakes</li>\r\n<li>Box- 10 &frac12; x 7 &frac34; x 4 &frac14;</li>\r\n</ul>', '<p>Their big day will be a party when you send this wonderful gift of buttercream-frosted cupcakes. Inside are a dozen birthday cake-flavored cupcakes which are each generously layered with buttercream frosting that&rsquo;s covered in sprinkles and topped with a snack-size butter shortbread cookie. They won&rsquo;t be able to resist these celebratory sweets. OU-D 12 pieces</p>', '0', '20250418233904_6802e298c63cc.webp', NULL, NULL, '1', NULL, '2025-04-18 18:39:04', '2025-10-08 13:32:56'),
(7, 1, '1', NULL, 'Buttercream-Frosted Celebration Sprinkles Cupcakes – 6 cupcakes', 'buttercream-frosted-celebration-sprinkles-cupcakes-6-cupcakes', '0', '41.99', NULL, '<ul>\r\n<li>6 Cheryl&rsquo;s Buttercream-Frosted Celebration Sprinkle Cupcakes</li>\r\n<li>Box- 10 &frac12; x 7 &frac34; x 2 1/8</li>\r\n</ul>', '<p>Their big day will be a party when you send this wonderful gift of buttercream-frosted cupcakes. Inside are a half a dozen birthday cake-flavored cupcakes which are each generously layered with buttercream frosting that&rsquo;s covered in sprinkles and topped with a snack-size butter shortbread cookie. They won&rsquo;t be able to resist these celebratory sweets. OU-D 6 pieces</p>', '0', '20250418234117_6802e31d978eb.webp', NULL, NULL, '1', NULL, '2025-04-18 18:41:17', '2025-04-18 18:41:17'),
(8, 1, '1', NULL, 'Cheesecake Party Wheel', 'cheesecake-party-wheel', '0', '61.99', NULL, NULL, '<p>This cheesecake sampler is the perfect way to enjoy four delightful varieties of a classic dessert. Moose Munch&reg; Cheesecake features ribbons of sweet caramel, crunchy nuts, and chocolate drizzle; decadent chocolate is a chocolate lover&rsquo;s dream; New York-style is exceptionally creamy; and luscious strawberry adds a delightfully fruity balance. Send as a gift to celebrate special occasions, or just to share something sweet. And be sure to order one for yourself for entertaining or as a perfect finish to any meal.</p>', '0', '20250418234225_6802e36104338.webp', NULL, NULL, '1', NULL, '2025-04-18 18:42:25', '2025-04-18 18:42:25'),
(9, 1, '1', '[{\"variation_id\":\"3\",\"price\":\"51.99\",\"image\":\"20250419000255_var_6802e82f937de.webp\"},{\"variation_id\":\"4\",\"price\":\"82.99\",\"image\":\"20250419000255_var_6802e82f93d77.webp\"}]', 'Cheryl’s Signature Bakery Sampler', 'cheryls-signature-bakery-sampler', '1', NULL, '{\"from\":\"51.99\",\"to\":\"82.99\"}', '<ul>\r\n<li>6 Buttercream-Frosted Vanilla Cutout Cookies</li>\r\n<li>6 Snack Size Chocolate Chip Cookies</li>\r\n<li>6 Snack Size Sugar Cookies</li>\r\n<li>5 Buttercream-Frosted Triple Chocolate Cookies</li>\r\n<li>4 Classic Chocolate Chip Cookies</li>\r\n<li>4 Oatmeal Raisin Cookies</li>\r\n<li>4 Chocolate Obsession Cookies</li>\r\n<li>4 Snickerdoodle Cookies</li>\r\n<li>3 Lemon Cake Slices</li>\r\n<li>3 Chocolate Cake Slices</li>\r\n<li>2 Vanilla Pound Cake Slices</li>\r\n<li>2 Oatmeal Scotchie Bars</li>\r\n<li>2 Cheryl&rsquo;s Buttercream-Frosted Vanilla Cupcakes</li>\r\n<li>2 Cheryl&rsquo;s Buttercream-Frosted Chocolate Cupcakes</li>\r\n<li>1 Blondie Walnut Bar</li>\r\n<li>1 Fudge Brownie</li>\r\n<li>1 Sugar Strawberry Buttercream Sandwich Cookie</li>\r\n<li>1 Chocolate Chip Buttercream Sandwich Cookie</li>\r\n<li>Box- 18 x 13 &frac34; x 4</li>\r\n</ul>', '<p>Share a sweet sampling of Cheryl&rsquo;s favorites. Inside our signature bow box are a wide array of delicious cookies, indulgent brownies, delectable cake slices, and scrumptious cupcakes in a variety of wonderful flavors. This unique gourmet gift is great for celebrating special occasions or sending to someone special.&nbsp;OU-D</p>', '0', '20250419000255_6802e82f8e752.webp', NULL, NULL, '1', NULL, '2025-04-18 19:02:55', '2025-04-18 19:02:55'),
(10, 1, '1', NULL, 'Chocolate Celebration Cake™', 'chocolate-celebration-cake', '0', '51.99', NULL, '<div class=\"MuiPaper-root MuiCard-root mbp145706 MuiPaper-outlined MuiPaper-rounded\">\r\n<div class=\"mbp145709\" data-component=\"descriptionBlock\">\r\n<div class=\"mbp145710\">\r\n<p>:1029-P-192990</p>\r\n</div>\r\n<div>\r\n<div class=\"mbp145712\">\r\n<p>Make every big moment one to savor. Our light, fluffy cake has a rich, creamy buttercream frosting and comes topped with sprinkles. This fun, festive, party-ready confection is perfect for birthdays, anniversaries, every special celebration. Delivered fresh the very same day from a local bakery in your recipient&rsquo;s area, for a delicious surprise right at their door.</p>\r\n<ul>\r\n<li><strong>Exclusive&nbsp;</strong>three-layered fluffy, rich chocolate cake with buttercream icing and festive chocolate sprinkles around the outside of the cake</li>\r\n<li>6&rdquo;&nbsp;round and 4&rdquo; tall; serves 8-10 people; weighs 4.5 lbs.</li>\r\n<li>Arrives in a white bakery box</li>\r\n<li>Delivered fresh the same day from a local bakery in your recipient&rsquo;s area</li>\r\n<li><strong>Order must be placed by 1pm in your recipient&rsquo;s time zone</strong></li>\r\n<li>Ingredients may vary; please see specific ingredients on box when delivered</li>\r\n<li>May&nbsp;Contain: Milk, Wheat, Soy &amp; Egg. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n<li>Care/storage instructions included</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"mbp145721\">\r\n<p>We have picked some of our favorite reviews from happy customers to highlight. Some customers received loyalty rewards points for providing honest reviews. The displayed reviews are a curated portion of what we receive from customers. All comments from dissatisfied customers are handled directly with the customer to ensure our 100% Smile Guarantee</p>\r\n</div>', '<p>Make every big moment one to savor. Our light, fluffy cake has a rich, creamy buttercream frosting and comes topped with sprinkles. This fun, festive, party-ready confection is perfect for birthdays, anniversaries, every special celebration. Delivered fresh the very same day from a local bakery in your recipient&rsquo;s area, for a delicious surprise right at their door.</p>', '0', '20250419000619_6802e8fb4f1d0.webp', '[\"20250419000657_6802e921e3479.webp\"]', NULL, '1', NULL, '2025-04-18 19:05:39', '2025-04-18 19:07:08'),
(11, 1, '1', NULL, 'Cinnamon Sour Cream Coffee Cake', 'cinnamon-sour-cream-coffee-cake', '0', '31.99', NULL, '<ul>\r\n<li>Cinnamon Sour Cream Coffee Cake (1 lb 14 oz)</li>\r\n<li>Net Weight: 1 lb 12 oz</li>\r\n</ul>', '<p>Add some luxury to breakfast, teatime, and dessert with this perfect melding of sweet and creamy. Baked in small batches, this rich and decadent Cinnamon Sour Cream Coffee Cake is a flavor experience just waiting to be shared. Turn an ordinary breakfast or brunch into the extraordinary!</p>', '0', '20250419001049_6802ea0949f15.webp', NULL, NULL, '1', NULL, '2025-04-18 19:10:49', '2025-04-18 19:10:49'),
(12, 1, '1', NULL, 'Classic Chocolate Chip Cookie Flavor Box', 'classic-chocolate-chip-cookie-flavor-box', '0', '28.99', NULL, '<ul>\r\n<li>12 Classic Chocolate Chip Cookies</li>\r\n<li>Box- 9 &frac12; X 5 &frac12; X 4</li>\r\n</ul>', '<p><strong>Individually Wrapped Cookies &ndash; perfect for sharing!</strong></p>\r\n<p>The Cheryl&rsquo;s chocolate chip cookie is very popular mainstay at Cheryl&rsquo;s! Our soft and chewy chocolate chip cookie is made with creamery butter, fresh eggs, delicious chocolate chips and rich brown sugar. Each is individually wrapped and guaranteed to please any chocolate chip cookie connoisseur! Our chocolate chip cookies are carefully packaged and delivered in a bow gift box.&nbsp;<strong>12 cookies.</strong></p>', '0', '20250419001302_6802ea8ee5e8c.webp', '[\"20250419001302_6802ea8ee626d.webp\",\"20250419001302_6802ea8ee63e4.webp\",\"20250419001302_6802ea8ee6588.webp\"]', NULL, '1', NULL, '2025-04-18 19:13:02', '2025-04-18 19:13:02'),
(13, 1, '1', '[{\"variation_id\":\"5\",\"price\":\"36.99\",\"image\":\"20250419002650_var_6802edcadee9f.webp\"},{\"variation_id\":\"6\",\"price\":\"48.99\",\"image\":\"20250419002650_var_6802edcadf5d4.webp\"},{\"variation_id\":\"7\",\"price\":\"79.99\",\"image\":\"20250419002650_var_6802edcadf7ce.webp\"}]', 'Gourmet Drizzled Strawberries™', 'gourmet-drizzled-strawberries', '1', NULL, '{\"from\":\"36.99\",\"to\":\"79.99\"}', '<div class=\"mbp984\">\r\n<p>:1029-P-192552</p>\r\n</div>\r\n<div>\r\n<div class=\"mbp986\">\r\n<p>You don&rsquo;t need to be a connoisseur to appreciate these gourmet treats. Fresh, juicy strawberries are dipped and drizzled to perfection. It&rsquo;s a decadent gift artfully presented that will add to every celebration.</p>\r\n<p>24-ct. berries include 8 of the following; 12-ct. includes 4 of the following; 6-ct berries includes 2 of the following:</p>\r\n<ul>\r\n<li>Strawberries dipped in white chocolaty confection with milk chocolaty drizzle</li>\r\n<li>Strawberries dipped in milk chocolaty confection with white drizzle</li>\r\n<li>Strawberries dipped in milk chocolaty confection with milk chocolaty drizzle</li>\r\n<li>24-count box serves approx. 4 people; 12-count box serves approx. 2 people; 6-count box serves approx. 1 person; serving size 140 grams</li>\r\n<li>Contains: Milk &amp; Soy. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n<li><strong>May be delivered from a local shop or shipped in a gift box.&nbsp;</strong></li>\r\n</ul>\r\n</div>\r\n</div>', '<p>You don&rsquo;t need to be a connoisseur to appreciate these gourmet treats. Fresh, juicy strawberries are dipped and drizzled to perfection. It&rsquo;s a decadent gift artfully presented that will add to every celebration.</p>', '0', '20250419002650_6802edcadad63.webp', '[\"20250419002650_6802edcadb616.webp\",\"20250419002650_6802edcadbb26.webp\",\"20250419002650_6802edcadbce2.webp\"]', NULL, '1', NULL, '2025-04-18 19:26:50', '2025-04-18 19:26:50'),
(14, 1, '1', '[{\"variation_id\":\"8\",\"price\":\"41.99\",\"image\":\"20250421153944_var_680666c09a4a6.webp\"},{\"variation_id\":\"9\",\"price\":\"61.99\",\"image\":\"20250421153944_var_680666c09a71b.webp\"}]', 'Magical Unicorn Truffle Cake Pops', 'magical-unicorn-truffle-cake-pops', '1', NULL, '{\"from\":\"41.99\",\"to\":\"61.99\"}', '<ul>\r\n<li>12 ea (18oz) Individually Wrapped Truffle Cake Pops\r\n<ul>OR</ul>\r\n</li>\r\n<li>6 ea (9oz) Individually Wrapped Truffle Cake Pops</li>\r\n<li>Gift measures 6.5\"L x 5\"W x 2.5\"H</li>\r\n</ul>', '<p>Send wonderful, magical good wishes with these incredibly delicious and adorable unicorn truffle cake pops! These rich, dark and moist chocolate truffle cakes on a stick are so incredibly decadent, it&rsquo;s no surprise that celebrities love&rsquo;em, too. These trend-forward treats are lovingly hand-made by a small artisan bakery that has been featured on The Today Show and Rachel Ray! The luscious truffle cake centers are covered with delicious chocolate, then hand-decorated to perfection. Easy to share, these gourmet truffle cake pops are an indescribably delicious, A-list dessert that they&rsquo;re certain to love!</p>', '0', '20250421153944_680666c099e9d.webp', NULL, NULL, '1', NULL, '2025-04-21 10:39:44', '2025-04-21 10:39:44'),
(15, 1, '1', NULL, 'Mix & Match Bakery Gift – Pick 12', 'mix-match-bakery-gift-pick-12', '0', '77.99', NULL, NULL, '<p>It&rsquo;s easier than ever to share a custom bakery gift, or to order one for your own pantry. Simply choose from a collection of Wolferman&rsquo;s favorites, including scones, Belgian waffles, loaf cake, English muffin breads, sweet rolls, and three sizes of English muffins. Select which sweet and savory options to include, and we&rsquo;ll wrap it up with an exclusively designed gift band for any occasion. Send and enjoy exceptional baked goods you know will be loved.</p>', '0', '20250421154317_680667958c8f2.webp', '[\"20250421154242_68066772640c8.webp\",\"20250421154242_68066772642b8.webp\",\"20250421154242_6806677264467.webp\",\"20250421154242_68066772639f0.webp\"]', NULL, '1', NULL, '2025-04-21 10:42:42', '2025-04-21 10:43:26'),
(16, 1, '1', NULL, 'Mix & Match Bakery Gift – Pick 4', 'mix-match-bakery-gift-pick-4', '0', '46.99', NULL, NULL, '<p>We make it simple to share a custom bakery gift, or to order one for your own pantry. Simply choose from a collection of Wolferman&rsquo;s favorites including scones, Belgian waffles, loaf cakes, English muffin breads, sweet rolls, and three sizes of English muffins. Select which sweet and savory options to include, and we&rsquo;ll wrap it up with an exclusively designed gift band for any occasion. Send and enjoy exceptional baked goods with ease.</p>', '0', '20250421155558_68066a8e94540.webp', '[\"20250421155214_680669ae5ecda.webp\",\"20250421155214_680669ae5f29b.webp\",\"20250421155214_680669ae5f476.webp\",\"20250421155214_680669ae5f634.webp\"]', NULL, '1', NULL, '2025-04-21 10:49:07', '2025-04-21 10:55:58'),
(17, 1, '1', NULL, 'Pumpkin Cheesecake', 'pumpkin-cheesecake', '0', '41.99', NULL, NULL, '<p>A New York-style cheesecake is a delicious treat to send and to receive. Our Pumpkin Cheesecake is actually two cheesecakes in one. A layer of traditional New York-style cheesecake is topped with a layer of pumpkin pie cheesecake, complete with aromatic spices such as nutmeg, ginger, and cinnamon. The rich, velvety filling sits in a moist, crumbly graham cracker crust. This limited-edition dessert is just right for autumn entertaining.</p>', '0', '20250421155746_68066afa45957.webp', NULL, NULL, '1', NULL, '2025-04-21 10:57:46', '2025-04-21 10:57:46'),
(18, 1, '1', NULL, 'Rainbow Sprinkle Celebration Cake™', 'rainbow-sprinkle-celebration-cake', '0', '51.99', NULL, '<ul>\r\n<li><strong>Exclusive&nbsp;</strong>three-layered confetti speckled cake with vanilla buttercream icing and rainbow-colored confetti sprinkles around the outside of the cake</li>\r\n<li>6&Prime;round and 4&Prime; tall; serves 8-10 people; weighs 4.5 lbs.</li>\r\n<li>Arrives in a white bakery box</li>\r\n<li>Delivered fresh the same day from a local bakery in your recipient&rsquo;s area</li>\r\n<li><strong>Order must be placed by 1pm in your recipient&rsquo;s time zone for same-day delivery</strong></li>\r\n<li>Ingredients may vary; please see specific ingredients on box when delivered</li>\r\n<li>May&nbsp;Contain: Milk, Wheat, Soy &amp; Egg. For additional&nbsp;allergy&nbsp;information,&nbsp;<strong>click here</strong>.</li>\r\n<li>Care/storage instructions included</li>\r\n</ul>', '<p>Every bite a classic. Our fluffy cake is made using real vanilla and decorated with a creamy vanilla buttercream frosting. This fun, festive, party ready confection is perfect for birthdays, anniversaries&mdash;any special celebration. Delivered fresh the very same day from a local bakery in your recipient&rsquo;s area, for a delicious surprise right at their door.&nbsp;</p>', '0', '20250421160128_68066bd85e37e.webp', '[\"20250421160139_68066be37427f.webp\"]', NULL, '1', NULL, '2025-04-21 11:01:28', '2025-04-21 11:01:39'),
(19, 1, '1', '[{\"variation_id\":\"10\",\"price\":\"41.99\",\"image\":\"20250421160706_var_68066d2a170f0.webp\"},{\"variation_id\":\"11\",\"price\":\"71.99\",\"image\":\"20250421160706_var_68066d2a173ef.webp\"},{\"variation_id\":\"12\",\"price\":\"82.99\",\"image\":\"20250421160706_var_68066d2a17616.webp\"}]', 'Signature Bundt Cake Assortment™ with Gourmet Drizzled Strawberries', 'signature-bundt-cake-assortment-with-gourmet-drizzled-strawberries', '1', NULL, '{\"from\":\"41.99\",\"to\":\"82.99\"}', '<div class=\"mbp60778\">\r\n<p>:1029-P-193330</p>\r\n</div>\r\n<div>\r\n<div class=\"mbp60780\">\r\n<p><strong>EXCLUSIVE</strong>&nbsp;Our new cake and berry combo will turn every day into an instant celebration! Start with our mouthwatering bundt cakes in four unique flavors and toppings: rich dark chocolate, classic vanilla, fresh strawberry and zesty lemon. Paired with our decadent Gourmet Drizzled Strawberries<sup>&trade;</sup>, it&rsquo;s a sweet way to share, whatever the moment.</p>\r\n<p><strong>Bundt Cakes:</strong></p>\r\n<ul>\r\n<li>Four individually wrapped bundt cakes</li>\r\n<li>Flavors include: Rich dark chocolate with chocolate icing; vanilla with vanilla icing and colorful confetti sprinkles; strawberry infused with fresh strawberry flavor and topped with vanilla icing &amp; freeze-dried strawberries; zesty lemon with lemon icing</li>\r\n<li>Each cake feeds 1-2 people; entire set feeds 4-8 people</li>\r\n<li>Arrives in gift box</li>\r\n<li>Contains: Milk &amp; Soy. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n</ul>\r\n<p><strong>Berries:</strong></p>\r\n<ul>\r\n<li>6 or 12 Gourmet Drizzled Strawberries<sup>&trade;</sup>: dipped in white chocolaty confection with milk chocolaty drizzle, dipped in milk chocolaty confection with white drizzle, dipped in milk chocolaty confection with milk chocolaty drizzle</li>\r\n<li>6-count box serves approx. 1-2 people; serving size 140 grams</li>\r\n<li>12-count box serves approx. 2-4 people; serving size 140 grams</li>\r\n<li><strong>Shipped in a gift box.&nbsp;</strong><a href=\"https://www.berries.com/delivery\"><strong>See Details</strong></a></li>\r\n<li>Contains: Milk &amp; Soy. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n</ul>\r\n</div>\r\n</div>', '<p>EXCLUSIVE Our new cake and berry combo will turn every day into an instant celebration! Start with our mouthwatering bundt cakes in four unique flavors and toppings: rich dark chocolate, classic vanilla, fresh strawberry and zesty lemon. Paired with our decadent Gourmet Drizzled Strawberries&trade;, it&rsquo;s a sweet way to share, whatever the moment.</p>', '0', '20250421160706_68066d2a1677b.webp', '[\"20250421160808_68066d6833a2c.webp\",\"20250421160808_68066d6833de9.webp\",\"20250421160808_68066d6833f9f.webp\"]', NULL, '1', NULL, '2025-04-21 11:07:06', '2025-04-21 11:08:08'),
(20, 1, '1', NULL, 'Signature Tea Cakes Assortment', 'signature-tea-cakes-assortment', '0', '36.99', NULL, NULL, '<p>Enjoy the satisfying tastes of dense, moist tea cakes bursting with incredible flavor. The chocolate swirl cake blends together decadent chocolate and vanilla cakes, while the lemon vanilla blueberry and apple tea cakes are crafted with real fruit pieces. Finally, the banana pecan loaf cake is topped with a sweet cocoa streusel that perfectly complements the rich cake beneath.</p>', '0', '20250421161001_68066dd9a6383.webp', '[\"20250421161012_68066de4bff18.webp\"]', NULL, '1', NULL, '2025-04-21 11:10:01', '2025-04-21 11:10:12'),
(21, 1, '1', NULL, 'Surprise Explosion Cake Gift Box', 'surprise-explosion-cake-gift-box', '0', '45.99', NULL, '<p>Our favorite mini chocolate bundt cake topped with rainbow sprinkles and chocolate chip cookies then filled with a touch of fudgy frosting is the perfect oven-baked flavor of both worlds. Included with our cake are faux flowers that fall out of the box making for a gorgeous presentation of the mini cake inside. Perfect for all occasions and surprises!</p>', '<p>Sparkling Explosion Gift Box Chocolate Chip Bundt Cake Flying Butterfly Surprise Flower Shower</p>', '0', '20250421161358_68066ec6769c0.webp', '[\"20250421161413_68066ed5275da.webp\",\"20250421161413_68066ed527978.webp\",\"20250421161413_68066ed527b0f.webp\"]', NULL, '1', NULL, '2025-04-21 11:13:58', '2025-04-21 11:14:13'),
(22, 1, '1', NULL, 'Thank You Letters 17pc Chocolate Box', 'thank-you-letters-17pc-chocolate-box', '0', '31.99', NULL, '<p><strong>17 Pc Belgian Chocolate contains the following:</strong></p>\r\n<ul>\r\n<li>2pc. Milk Choc Mousse Truffle</li>\r\n<li>2 pc Dark Choc Salted Caramel Truffle</li>\r\n<li>2 pc Milk Choc Coconut Cr&egrave;me Truffle</li>\r\n<li>2 pc Dark Choc Raspberry Gelate Truffle</li>\r\n<li>2 pc Dark Choc Himalayan Sea Salt Truffle</li>\r\n<li>2 pc Milk Choc Hazelnut Praline Truffle</li>\r\n<li>2 pc White Choc Passionfruit Truffle</li>\r\n<li>2 pc Dark Choc Caramel Cafe Truffle</li>\r\n<li>1 pc Milk Chocolate Square</li>\r\n<li>Net Weight: 7.1 oz. Box.</li>\r\n<li>Dimensions: 6.5&Prime; x 8.03&Prime; x 1.5&Prime;</li>\r\n</ul>', '<p>A sweet thank you is the kindest way to show your gratitude. Imagine the smiles and complete delight when they open an assortment of luscious truffles. Our team has worked innumerable hours with an artisan chocolatier crafting these one-of-a-kind chocolate truffles. Kosher OU-Dairy.</p>', '0', '20250421161623_68066f576f77f.webp', '[\"20250421162027_6806704b3b97a.webp\",\"20250421162027_6806704b3b1e3.webp\",\"20250421162027_6806704b3b52a.webp\",\"20250421162027_6806704b3b6bd.webp\"]', NULL, '1', NULL, '2025-04-21 11:16:23', '2025-04-21 11:20:27'),
(23, 1, '1', '[{\"variation_id\":\"6\",\"price\":\"51.99\",\"image\":\"20250421162944_var_68067278cabf2.webp\"},{\"variation_id\":\"13\",\"price\":\"66.99\",\"image\":\"20250421162944_var_68067278caf62.webp\"},{\"variation_id\":\"14\",\"price\":\"82.20\",\"image\":\"20250421162944_var_68067278cb3f3.webp\"}]', 'Time to Celebrate Birthday Cake™ with Birthday Strawberries', 'time-to-celebrate-birthday-cake-with-birthday-strawberries', '1', NULL, '{\"from\":\"51.99\",\"to\":\"82.20\"}', '<div class=\"mbp30853\">\r\n<p>:1029-P-192935</p>\r\n</div>\r\n<div>\r\n<div class=\"mbp30855\">\r\n<p>Birthdays come just once a year, but it&rsquo;s the perfect opportunity to celebrate the amazing person they are. Our sinfully delicious confetti cake, hand-decorated with vanilla-flavored buttercream icing and confetti sprinkles will bring a smile to everyone&rsquo;s lips. What&rsquo;s more, we&rsquo;ve paired the cake with our Birthday Strawberries! Delivered in a festive gift box.</p>\r\n<p><strong>Cake</strong>:</p>\r\n<ul>\r\n<li>Exclusive three-layered confetti speckled cake with vanilla buttercream icing and confetti sprinkles; 4 inches / weighs 15oz.</li>\r\n<li>Birthday candle included; candle color may vary</li>\r\n<li>Made with the finest ingredients: Real Butter and Non-GMO cane sugar and flour</li>\r\n<li>Cake serves 2-4 people</li>\r\n<li>Contains: Eggs, Milk, Soy &amp; Wheat. For additional&nbsp;allergy&nbsp;information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n</ul>\r\n<p><strong>Berries</strong>:</p>\r\n<ul>\r\n<li>6 or 12 strawberries dipped in milk chocolaty confection with teal &amp; yellow drizzle; dipped in white chocolaty confection with pink &amp; yellow drizzle; dipped in milk chocolaty confection with pastel sprinkles</li>\r\n<li>Sprinkle colors may vary</li>\r\n<li>Contains: Milk &amp; Soy. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n<li><strong>May be delivered from a local shop or shipped in a gift box.&nbsp;</strong><a href=\"https://www.berries.com/delivery\"><strong>See Details</strong></a></li>\r\n<li>Cake &amp; berries serves approximately 4-6 people</li>\r\n</ul>\r\n</div>\r\n</div>', '<p>Birthdays come just once a year, but it&rsquo;s the perfect opportunity to celebrate the amazing person they are. Our sinfully delicious confetti cake, hand-decorated with vanilla-flavored buttercream icing and confetti sprinkles will bring a smile to everyone&rsquo;s lips. What&rsquo;s more, we&rsquo;ve paired the cake with our Birthday Strawberries! Delivered in a festive gift box.</p>', '0', '20250421162944_68067278c91cf.webp', '[\"20250421163031_680672a7a71f2.webp\",\"20250421163031_680672a7a73f3.webp\",\"20250421163031_680672a7a7587.webp\"]', NULL, '1', NULL, '2025-04-21 11:29:44', '2025-04-21 11:30:31'),
(24, 1, '2', '[{\"variation_id\":\"15\",\"price\":\"41.99\",\"image\":\"20250421174251_var_6806839b93460.webp\"},{\"variation_id\":\"16\",\"price\":\"51.99\",\"image\":\"20250421174251_var_6806839b9380f.webp\"},{\"variation_id\":\"17\",\"price\":\"53.99\",\"image\":\"20250421174251_var_6806839b939a9.webp\"},{\"variation_id\":\"19\",\"price\":\"56.99\",\"image\":\"20250421174251_var_6806839b93b34.webp\"},{\"variation_id\":\"18\",\"price\":\"63.99\",\"image\":\"20250421174251_var_6806839b93cfc.webp\"},{\"variation_id\":\"20\",\"price\":\"63.99\",\"image\":\"20250421174251_var_6806839b93e87.webp\"},{\"variation_id\":\"21\",\"price\":\"66.99\",\"image\":\"20250421174251_var_6806839b94027.webp\"},{\"variation_id\":\"22\",\"price\":\"74.99\",\"image\":\"20250421174251_var_6806839b941b9.webp\"}]', 'Assorted Roses & Peruvian Lilies', 'assorted-roses-peruvian-lilies', '1', NULL, '{\"from\":\"41.99\",\"to\":\"74.99\"}', '<div class=\"mbp88431\">\r\n<p>:1001-P-146470</p>\r\n</div>\r\n<div>\r\n<div class=\"mbp88433\">\r\n<p>Help brighten someone&rsquo;s day with our lively bouquet. Filled with roses and Peruvian lilies, this colorful mix of blooms is a wonderful way to reach out and show you care, for the big milestones and &ldquo;just because&rdquo; moments.</p>\r\n<ul>\r\n<li>16-stem bouquet of pink (shades of pink may vary), orange and yellow roses gathered with assorted Peruvian lilies (alstroemeria); bloom color may vary</li>\r\n<li>Double their gift with our large bouquet of 32 stems</li>\r\n<li>Picked fresh on our premier farms around the world, our flowers are cared for every step of the way and shipped fresh to ensure lasting beauty and enjoyment.</li>\r\n</ul>\r\n<p><strong>About Cozee Candle</strong><br />Featuring fresh, curated scents that leave a memorable impression, our Cozee Candle collection is exclusively created by 1-800-Flowers.com. Paired with our beautiful floral bouquets, it&rsquo;s a gift guaranteed to please all the senses.</p>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Classic fluted swirl-design glass vase in pink or clear; measures 7.5&Prime;H (double bouquet only)</li>\r\n<li>Pink or clear hourglass vase with elegant carved fluted detail; measures 8&Prime;H (single bouquet only)</li>\r\n</ul>\r\n<p>Illuminate your space with the sweet scent of vanilla cr&egrave;me from Cozee Candle; soy wax blend candle is hand poured in a pink opaque glass vessel that will burn clean; 18 to 20 hour burn time; wooden lid stamped with gold daisy; 3.5 oz. (available with pink fluted or hourglass vase only)</p>\r\n</div>\r\n</div>', '<div class=\"mbp88429\">About Assorted Roses &amp; Peruvian Lilies</div>\r\n<div class=\"mbp88432\">Help brighten someone&rsquo;s day with our lively bouquet. Filled with roses and Peruvian lilies, this colorful mix of blooms is a wonderful way to reach out and show you care, for the big milestones and &ldquo;just because&rdquo; moments.</div>', '0', '20250421174251_6806839b92c44.webp', '[\"20250421174251_6806839b92566.webp\"]', NULL, '0', NULL, '2025-04-21 12:42:51', '2025-10-08 13:34:45'),
(25, 1, '2', '[{\"variation_id\":\"15\",\"price\":\"41.99\",\"image\":\"20250421180055_var_680687d75dc41.webp\"},{\"variation_id\":\"17\",\"price\":\"53.99\",\"image\":\"20250421180055_var_680687d75df39.webp\"},{\"variation_id\":\"19\",\"price\":\"56.99\",\"image\":\"20250421180055_var_680687d75e0b5.webp\"},{\"variation_id\":\"18\",\"price\":\"63.99\",\"image\":\"20250421180055_var_680687d75e223.webp\"},{\"variation_id\":\"16\",\"price\":\"61.99\",\"image\":\"20250421180055_var_680687d75e665.webp\"},{\"variation_id\":\"20\",\"price\":\"74.99\",\"image\":\"20250421180055_var_680687d75e7fb.webp\"},{\"variation_id\":\"21\",\"price\":\"77.99\",\"image\":\"20250421180055_var_680687d75e984.webp\"},{\"variation_id\":\"22\",\"price\":\"88.99\",\"image\":\"20250421180055_var_680687d75eb35.webp\"}]', 'Cherished Blooms Bouquet', 'cherished-blooms-bouquet', '1', NULL, '{\"from\":\"41.99\",\"to\":\"88.99\"}', '<p>Show someone special just how much you cherish them with our gorgeous gathering of pink and white blooms. It&rsquo;ll express all you have in your heart when words alone aren&rsquo;t enough.</p>\r\n<ul>\r\n<li>Bouquet of pink roses, white carnations, and pink &amp; white Peruvian lilies (alstroemeria)</li>\r\n<li>Double their gift by sending twice the blooms</li>\r\n<li>Picked fresh on our premier farms around the world, our flowers are cared for every step of the way,and shipped fresh to ensure lasting beauty and enjoyment.</li>\r\n</ul>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Charming fluted glass swirl vase in petal pink or clear; measures 7.5&Prime;H (double bouquet only)</li>\r\n<li>Exclusively crafted white ceramic vase with indigo mini floral motif captures antique charm and simplicity; measures 7.8&Prime;H (single bouquet only)</li>\r\n<li>Exclusive elegant pink glass vase designed with graceful contour and delicate fluting; measures 8&Prime;H (single bouquet only)</li>\r\n<li>Classic clear glass hourglass vase with elegant carved fluted detail; measures 9&rdquo;H (single bouquet only)</li>\r\n<li>Illuminate your space with the sweet scent of vanilla cr&egrave;me from Cozee Candle; soy wax blend candle is hand poured in a pink opaque glass vessel that will burn clean; 18 to 20 hour burn time; wooden lid stamped with gold daisy; 3.5 oz. (available with pink fluted or hourglass vase only)</li>\r\n</ul>\r\n<p><strong>About Cozee Candle</strong><br />Featuring fresh, curated scents that leave a memorable impression, our Cozee Candle collection is exclusively created by 1-800-Flowers.com. Paired with our beautiful floral bouquets, it&rsquo;s a gift guaranteed to please all the senses.</p>', '<div class=\"mbp39023\">About Cherished Blooms Bouquet</div>\r\n<div class=\"mbp39026\">Show someone special just how much you cherish them with our gorgeous gathering of pink and white blooms. It&rsquo;ll express all you have in your heart when words alone aren&rsquo;t enough.</div>', '0', '20250421180055_680687d75cc89.webp', '[\"20250421180134_680687fe4fff9.webp\",\"20250421180134_680687fe5067b.webp\"]', NULL, '1', NULL, '2025-04-21 13:00:55', '2025-04-21 13:01:34'),
(26, 1, '2', '[{\"variation_id\":\"23\",\"price\":\"41.99\",\"image\":\"20250421181535_var_68068b47416c1.webp\"},{\"variation_id\":\"24\",\"price\":\"53.99\",\"image\":\"20250421181535_var_68068b47419d5.webp\"},{\"variation_id\":\"25\",\"price\":\"56.99\",\"image\":\"20250421181535_var_68068b4741b64.webp\"},{\"variation_id\":\"26\",\"price\":\"61.99\",\"image\":\"20250421181535_var_68068b4741cec.webp\"},{\"variation_id\":\"27\",\"price\":\"51.99\",\"image\":\"20250421181535_var_68068b4741e5e.webp\"},{\"variation_id\":\"28\",\"price\":\"63.99\",\"image\":\"20250421181535_var_68068b4741fda.webp\"},{\"variation_id\":\"29\",\"price\":\"66.99\",\"image\":\"20250421181535_var_68068b474215c.webp\"},{\"variation_id\":\"30\",\"price\":\"71.99\",\"image\":\"20250421181535_var_68068b4742309.webp\"}]', 'Happy Gerbera Daisies', 'happy-gerbera-daisies', '1', NULL, '{\"from\":\"41.99\",\"to\":\"71.99\"}', '<p>Here&rsquo;s a bright, colorful gift that has cheer written all over it. Our vibrant Gerbera daisies are gathered together into a beautiful bouquet&mdash;your choice of 12 or 24 stems&mdash;to deliver smiles for all of life&rsquo;s special celebrations or everyday moments.</p>\r\n<ul>\r\n<li>Gathering of assorted Gerbera daisies, accented with fresh bear grass; available in 12 or 24 stems</li>\r\n<li>Flowers arrive with protective netting and stem straws</li>\r\n<li>Picked fresh on our premier farms around the world, our flowers are cared for every step of the way and shipped fresh to ensure lasting beauty and enjoyment</li>\r\n</ul>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Hand-crafted galvanized tin in a classic French market style with ring handles; measures 8.25&Prime;H (24 stems only)</li>\r\n<li>Clear glass tapered vase in a sleek design style; measures 9&Prime;H (24 stems only)</li>\r\n<li>Pink or clear hourglass vase with elegant carved fluted detail; measures 8&Prime;H (12 stems only)</li>\r\n<li>Natural wood shadow box sign featuring the sentiment &ldquo;Live life in full bloom&rdquo;; measures 5&Prime;H x 5&Prime;W (available with French market style tin or pink hourglass vase only)</li>\r\n</ul>', '<div class=\"mbp70685\">About Happy Gerbera Daisies</div>\r\n<div class=\"mbp70688\">Here&rsquo;s a bright, colorful gift that has cheer written all over it. Our vibrant Gerbera daisies are gathered together into a beautiful bouquet&mdash;your choice of 12 or 24 stems&mdash;to deliver smiles for all of life&rsquo;s special celebrations or everyday moments.</div>', '0', '20250421181535_68068b4740d39.webp', '[\"20250421181535_68068b47408b9.webp\"]', NULL, '1', NULL, '2025-04-21 13:15:35', '2025-04-21 13:15:35'),
(27, 1, '2', '[{\"variation_id\":\"23\",\"price\":\"41.99\",\"image\":\"20250421183339_var_68068f83406dc.webp\"},{\"variation_id\":\"24\",\"price\":\"53.99\",\"image\":\"20250421183339_var_68068f8340c83.webp\"},{\"variation_id\":\"58\",\"price\":\"59.99\",\"image\":\"20250421183339_var_68068f8340f15.webp\"},{\"variation_id\":\"27\",\"price\":\"61.99\",\"image\":\"20250421183339_var_68068f8341132.webp\"},{\"variation_id\":\"28\",\"price\":\"74.99\",\"image\":\"20250421183339_var_68068f8341322.webp\"},{\"variation_id\":\"31\",\"price\":\"80.99\",\"image\":\"20250421183339_var_68068f83414ad.webp\"},{\"variation_id\":\"32\",\"price\":\"92.99\",\"image\":\"20250421183339_var_68068f8341654.webp\"}]', 'Thank You Assorted Roses', 'thank-you-assorted-roses', '1', NULL, '{\"from\":\"41.99\",\"to\":\"92.99\"}', '<p>Nothing says, &ldquo;Thanks a bunch!&rdquo; like bright, happy blooms. Our assorted roses are paired up with a colorful balloon, creating a great gift to show your gratitude. Choose from 12 or 24 stems.</p>\r\n<ul>\r\n<li>Gathering of 12 or 24 multicolored roses; colors may vary based on availability</li>\r\n<li>Picked fresh on our premier farms around the world, our flowers are cared for every step of the way&nbsp;and shipped fresh to ensure lasting beauty and enjoyment.</li>\r\n<li>&ldquo;Thank You&rdquo; Mylar balloon; air-filled; measures 4&Prime;D</li>\r\n</ul>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Clear fluted glass vase in a classic hourglass shape; measures 9&Prime;H (24 stems only)</li>\r\n<li>Clear hourglass vase with elegant carved fluted detail; measures 8&Prime;H (12 stems only)</li>\r\n<li>C.J. Bear, our exclusive brown plush bear with a red bow; measures 8&rdquo;H; safe for ages 3+</li>\r\n<li>Delicious selection of imported Belgian chocolate truffles arrives in a decorative gift box with &ldquo;Sending You Sweet Smiles&rdquo; sentiment; flavors include dark chocolate caramel with Himalayan sea salt, milk chocolate praline, white chocolate hazelnut, and milk chocolate with toffee; 3.95 oz.; 12 pieces</li>\r\n</ul>\r\n<p><strong>About Lotsa Love<sup>&reg;</sup></strong><br />Lotsa&nbsp;Love&nbsp;is an exclusive plush collection by&nbsp;1-800-Flowers.com, creators of the most&nbsp;lovable plush you have ever hugged! Irresistibly cuddly and made with&nbsp;lotsa&nbsp;love.</p>', '<div class=\"mbp44914\">About Thank You Assorted Roses</div>\r\n<div class=\"mbp44917\">Nothing says, &ldquo;Thanks a bunch!&rdquo; like bright, happy blooms. Our assorted roses are paired up with a colorful balloon, creating a great gift to show your gratitude. Choose from 12 or 24 stems.</div>', '0', '20250421183339_68068f833fe0c.webp', '[\"20250421183615_6806901f1ca3f.webp\",\"20250421183615_6806901f1c820.webp\",\"20250421183615_6806901f1c41a.webp\"]', NULL, '1', NULL, '2025-04-21 13:33:39', '2025-04-21 13:36:15'),
(28, 1, '3', '[{\"variation_id\":\"33\",\"price\":\"44.99\",\"image\":\"20250421200926_var_6806a5f6b9b8b.webp\"},{\"variation_id\":\"34\",\"price\":\"48.99\",\"image\":\"20250421200926_var_6806a5f6b9eb3.webp\"},{\"variation_id\":\"35\",\"price\":\"71.99\",\"image\":\"20250421200926_var_6806a5f6ba27e.webp\"},{\"variation_id\":\"36\",\"price\":\"77.99\",\"image\":\"20250421200926_var_6806a5f6ba45f.webp\"}]', 'Delightful Daisy Treat™', 'delightful-daisy-treat', '1', NULL, '{\"from\":\"44.99\",\"to\":\"77.99\"}', '<div class=\"MuiPaper-root MuiCard-root mbp60756 MuiPaper-outlined MuiPaper-rounded\">\r\n<div class=\"mbp60759\" data-component=\"descriptionBlock\">\r\n<div>\r\n<div class=\"mbp60762\">\r\n<ul>\r\n<li>Fresh fruit arrangement with half-dipped daisy pineapples with grape centers; plain and half-dipped strawberries; cantaloupe and orange wedges; honeydew ball skewers, arranged on a lettuce and kale base</li>\r\n<li>Also available with undipped daisy pineapples</li>\r\n<li>All of our dipped fruit is covered in chocolaty confection</li>\r\n<li>Arrives in a white melamine container with lettuce and kale base; measures 4.5&Prime;H</li>\r\n<li>Fruit is picked at the peak of freshness and delivered fresh to their door</li>\r\n<li>Hand-crafted and designed by local shops</li>\r\n<li>Arrangement measures approximately 9&Prime;H x 6&Prime;W</li>\r\n<li>Serving size: 140 grams; serves approx. 5 people</li>\r\n<li>Contains: Milk &amp; Soy. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n</ul>\r\n<p>Add to your gift:</p>\r\n<ul>\r\n<li>Box of 12 succulent dipped strawberries decorated with white and milk chocolaty swirls</li>\r\n<li>Contains: Milk &amp; Soy. For additional allergy information,&nbsp;<a href=\"https://www.1800flowers.com/customer-service-faq\" aria-label=\"click here\"><strong>click here</strong></a>.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"mbp60771\">\r\n<p>We have picked some of our favorite reviews from happy customers to highlight. Some customers received loyalty rewards points for providing honest reviews. The displayed reviews are a curated portion of what we receive from customers. All comments from dissatisfied customers are handled directly with the customer to ensure our 100% Smile Guarantee</p>\r\n</div>', '<p>You&rsquo;ve never seen daisies quite like this before! With juicy grapes at the centers&mdash;dipped to look their most delicious or au naturel&mdash;our delightful fruit blooms are mixed with succulent strawberries, mouthwatering melon and juicy orange wedges. It&rsquo;s the perfect size for sharing with the someone who makes you smile most!</p>', '0', '20250421200926_6806a5f698c37.webp', '[\"20250421200926_6806a5f69898c.webp\",\"20250421200926_6806a5f698417.webp\"]', NULL, '1', NULL, '2025-04-21 15:09:26', '2025-04-21 15:09:26'),
(29, 1, '3', NULL, 'Entertainer’s Dried Fruit and Nut Tray', 'entertainers-dried-fruit-and-nut-tray', '0', '71.99', NULL, '<ul>\r\n<li>Pears (3.4 oz)</li>\r\n<li>Kiwis (1.6 oz)</li>\r\n<li>Mediterranean apricots (11.5 oz)</li>\r\n<li>Patterson apricot (0.4 oz)</li>\r\n<li>Apple Rings (7.4 oz)</li>\r\n<li>Deglet Noor whole dates (9.1 oz)</li>\r\n<li>Pitted prunes (4.8 oz)</li>\r\n<li>Roasted salted pistachios (3 oz)</li>\r\n<li>Raw almonds (4 oz)</li>\r\n<li>Roasted salted cashews (4 oz)</li>\r\n<li>Fruit and nut medley [cashews, pumpkin seeds, golden raisins, cranberries] (4 oz)</li>\r\n<li>Wooden tray, 18.75 in L X 11.5 in W x 1 in H (47.6 cm x 29.2 cm x 2.5 cm)</li>\r\n<li>Net Weight: 4 lb 8 oz</li>\r\n</ul>', '<p>For the avid entertainer who&rsquo;s always running around, our Entertainer&rsquo;s Dried Fruit Tray is an effortless solution to offer at any type of gathering. Our largest and most impressive dried fruit and nut tray, this gift comes compete with a grand variety of gourmet snacks that everyone will love. Give guests the option to choose from delectable dried fruits like peaches, plums, mangoes, pears, kiwis, and more, along with savory nuts, like pistachios, roasted almonds, and roasted cashews.</p>', '0', '20250421201313_6806a6d9d4edf.webp', NULL, NULL, '1', NULL, '2025-04-21 15:13:13', '2025-04-21 15:13:13'),
(30, 1, '3', '[{\"variation_id\":\"37\",\"price\":\"61.99\",\"image\":\"20250421201827_var_6806a81365825.webp\"},{\"variation_id\":\"38\",\"price\":\"102.99\",\"image\":\"20250421201827_var_6806a81365b01.webp\"}]', 'Perfectly Plated™ Birthday Fruit Platter', 'perfectly-plated-birthday-fruit-platter', '1', NULL, '{\"from\":\"61.99\",\"to\":\"102.99\"}', '<div class=\"MuiPaper-root MuiCard-root mbp57997 MuiPaper-outlined MuiPaper-rounded\">\r\n<div class=\"mbp58000\" data-component=\"descriptionBlock\">\r\n<div>\r\n<div class=\"mbp58003\">\r\n<ul>\r\n<li>Fresh fruit platter with undipped scalloped pineapple slices or scalloped pineapples half dipped in milk chocolaty confection; strawberries dipped in milk chocolaty confection with white chocolaty drizzle; strawberries dipped in milk chocolaty confection &amp; covered in rainbow sprinkles; apple wedges dipped in milk chocolaty confection &amp; drizzled in white chocolaty confection; apple wedges dipped in milk chocolaty confection &amp; covered in rainbow sprinkles; cantaloupe balls</li>\r\n<li>Choose from one or two platters</li>\r\n<li>Available dipped or undipped</li>\r\n<li>All of our dipped fruit is covered in delicious chocolaty confection</li>\r\n<li>Fruit is picked at the peak of freshness and delivered fresh to their door</li>\r\n<li>Hand-crafted and designed by local shops</li>\r\n<li>Each platter serves 10-14; serving size: 140 grams</li>\r\n<li>Contains: Milk &amp; Soy. For additional&nbsp;allergy&nbsp;information,&nbsp;click here.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"mbp58012\">\r\n<p>We have picked some of our favorite reviews from happy customers to highlight. Some customers received loyalty rewards points for providing honest reviews. The displayed reviews are a curated portion of what we receive from customers. All comments from dissatisfied customers are handled directly with the customer to ensure our 100% Smile Guarantee</p>\r\n</div>', '<p>Make their birthday celebration sweeter with our flavorful new fruit platter. A festive selection of juicy pineapple slices, dipped &amp; sprinkled strawberries, crunchy apple wedges and plump melon comes perfectly plated on a round platter, ready to get the party started! Choose one or two platters.</p>', '0', '20250421201827_6806a81361f1a.webp', '[\"20250421201827_6806a813624f7.webp\",\"20250421201827_6806a8136298d.webp\",\"20250421201827_6806a81362b55.webp\",\"20251001234613_68ddbd454685d.webp\"]', NULL, '1', NULL, '2025-04-21 15:18:27', '2025-10-01 18:46:13');
INSERT INTO `products` (`id`, `created_by`, `category_id`, `variations`, `name`, `slug`, `product_type`, `product_price`, `variation_price`, `short_description`, `description`, `is_special`, `image`, `related_images`, `related_product`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(31, 1, '3', NULL, 'Sweet Thanks™', 'sweet-thanks', '0', '82.99', NULL, '<ul>\r\n<li>Fresh fruit arrangement with carved pineapple slices that spell out T-H-A-N-K-S;&rdquo; strawberries dipped in milk chocolaty confection; plain strawberries; honeydew, cantaloupe &amp; orange wedges; grape skewers</li>\r\n<li>Fruit is picked at the peak of freshness</li>\r\n<li>All of our dipped fruit is covered in delicious milk chocolaty confections</li>\r\n<li>Hand-crafted and designed by local shops</li>\r\n<li>Arrangement measures approximately 11.5&Prime;H x 10&Prime;W</li>\r\n<li>Arrives on a reusable red tray with lettuce and kale base; measures 5.5&Prime;D x 2&Prime;H</li>\r\n<li>Serves approx. 8-10 people; serving size 140 grams</li>\r\n<li>Delivered fresh to their door with Same-Day Delivery</li>\r\n<li>Contains: Milk, Soy &amp; Tree Nuts.</li>\r\n</ul>', '<p>Send your thanks in the sweetest way! Our fruit-filled arrangement spells out your appreciation with juicy carved pineapples. Dipped strawberries in chocolate confection, melon, oranges and more add to the mix, for a gift that lets them know just how grateful you are.</p>', '0', '20250421202051_6806a8a37a1dd.webp', '[\"20250421202051_6806a8a3794af.webp\"]', NULL, '1', NULL, '2025-04-21 15:20:51', '2025-10-01 18:31:15'),
(33, 1, '4', NULL, 'Classic Signature Cookie Gift Basket', 'classic-signature-cookie-gift-basket', '0', '56.99', NULL, '<ul>\r\n<li>Assorted cookies (24 pieces):</li>\r\n<li>8 Blackberry Galettes (0.67 oz each)</li>\r\n<li>2 oatmeal raisin (1 oz each)</li>\r\n<li>2 peanut butter (3 oz each)</li>\r\n<li>2 walnut chocolate chunk (3 oz each)</li>\r\n<li>2 macadamia nut chocolate chip (1.1 oz each)</li>\r\n<li>4 double chocolate cherry (1.2 oz each)</li>\r\n<li>2 white chocolate raspberry (1 oz each)</li>\r\n<li>2 Moose Munch&reg; cookies (1 oz each)</li>\r\n<li>Woven fabric rope basket, 11 in L x 6.75 in W x 4 in H (27.9 cm x 17.1 cm x 10.1 cm)</li>\r\n<li>Net Weight: 1 lb 9 oz</li>\r\n</ul>', '<p>Whether as a dessert to top off a meal or as a delightful midday snack, a charming assortment of gourmet cookies is sure to please. Our Classic Signature Cookie Gift Basket presents a wide variety of flavors, ranging from well-loved favorites like chocolate chocolate chunk and apple raisin to the contemporary tastes of sweet and tart white chocolate raspberry and blackberry galettes. No matter the palate, this gift has something everyone will enjoy.</p>', '0', '20250423181420_68092dfc0c2dd.webp', NULL, NULL, '1', NULL, '2025-04-23 13:14:20', '2025-04-23 13:14:20'),
(34, 1, '4', '[{\"variation_id\":\"39\",\"price\":\"102.99\",\"image\":\"20250423181940_var_68092f3ccc82c.webp\"},{\"variation_id\":\"40\",\"price\":\"122.99\",\"image\":\"20250423181940_var_68092f3cd1d43.webp\"},{\"variation_id\":\"41\",\"price\":\"153.99\",\"image\":\"20250423181940_var_68092f3cd1f5c.webp\"}]', 'Distinctive Fruit Basket & Sweets Gift', 'distinctive-fruit-basket-sweets-gift', '1', NULL, '{\"from\":\"102.99\",\"to\":\"153.99\"}', '<p><strong>Grande Basket</strong></p>\r\n<ul>\r\n<li>Seagrass Basket</li>\r\n<li>Occasional Printed Ribbon</li>\r\n<li>2 D&rsquo;Anjou Pears</li>\r\n<li>2 Bosc Pear</li>\r\n<li>2 Red Pears</li>\r\n<li>2 Braeburn Apples</li>\r\n<li>2 Granny Smith Apple</li>\r\n<li>3 Navel Oranges</li>\r\n<li>5 Mandarins</li>\r\n<li>1 Mango</li>\r\n<li>3 oz Butter Toffee Nuts</li>\r\n<li>3 oz. Choc Covered Cherries</li>\r\n<li>Peanut Brittle Box</li>\r\n<li>2 Asst. Jumbo Choc Covered Pretzels</li>\r\n<li>3 oz. Butter Caramel Popcorn</li>\r\n<li>3 oz. Chocolate Chip Cookies</li>\r\n<li>3 Assorted Ghirardelli Chocolate Squares</li>\r\n<li>4 pc. Milk and Dark Chocolate Sea Salt Caramels</li>\r\n<li>Partner&rsquo;s Olive Oil &amp; Sea Salt Crackers</li>\r\n<li>2 Kiwi</li>\r\n<li>4 oz. Northwoods Wisconsin Cheddar Triangle</li>\r\n<li>3 oz. Salt Water Taffy</li>\r\n<li>Summer Sausage</li>\r\n<li>Measures 15.125&Prime;L x 10.9375&Prime;W x 9&Prime;H</li>\r\n<li><strong>Deluxe Basket</strong></li>\r\n<li>Green D&rsquo;Anjou Pears</li>\r\n<li>Green satin ribbon</li>\r\n<li>1 Braeburn Apple</li>\r\n<li>1 Granny Smith Apple</li>\r\n<li>2 Green D&rsquo;Anjou Pears</li>\r\n<li>2 Red D&rsquo;Anjou Pears</li>\r\n<li>1 Navel Orange</li>\r\n<li>3 Mandarins</li>\r\n<li>3 oz. Butter Caramel Popcorn</li>\r\n<li>Partners Olive Oil &amp; Sea Salt Crackers</li>\r\n<li>3 oz. Peanut Brittle</li>\r\n<li>3 oz. Chocolate Cherries</li>\r\n<li>3 Assorted Ghirardelli Squares</li>\r\n<li>2 Jumbo Chocolate Dipped Pretzels</li>\r\n<li>3 oz. Chocolate Chip Cookies</li>\r\n<li>4 pc. Chocolate Sea Salt Caramels</li>\r\n<li>3 oz. Butter Toffee Mixed Nuts</li>\r\n<li>3 oz. Dark Chocolate Almonds</li>\r\n<li>Northwoods Cheddar Cheese</li>\r\n<li>5 oz. Summer Sausage</li>\r\n<li>Measures 15.3&Prime;L x 12.5&Prime;W x 4.75&Prime;H</li>\r\n</ul>\r\n<p><strong>Large Basket</strong></p>\r\n<ul>\r\n<li>Walnut Stained Willow &amp; Rope Basket</li>\r\n<li>Green satin ribbon</li>\r\n<li>Green D&rsquo;anjou Pears</li>\r\n<li>Red D&rsquo;anjou Pears</li>\r\n<li>Navel Orange</li>\r\n<li>Mandarins</li>\r\n<li>Braeburn Apple</li>\r\n<li>Granny Smith Apple</li>\r\n<li>Butter Caramel Corn</li>\r\n<li>Chocolate Cherries</li>\r\n<li>Dark Chocolate Sea Salt Caramels Bag</li>\r\n<li>Assorted Jumbo Chocolate Dipped Pretzels</li>\r\n<li>Butter Toffee Mixed Nuts</li>\r\n<li>Saltwater Taffy</li>\r\n<li>Assorted Ghirardelli Chocolate Squares</li>\r\n<li>Chocolate Chip Cookies</li>\r\n<li>Measures 15.3&Prime;L x 12.5&Prime;W x 4.75&Prime;HShipping Information: Our fruit baskets are packed to order on the day that they are shipped to ensure maximum freshness. To protect the quality of the fruit, we also pack cushioning straw around each fruit piece which requires packing the gift lower in the basket than shown on the web.</li>\r\n</ul>', '<p>Make the next celebration or special occasion amazing with this stunning basket filled with premium quality gourmet fruit, savories, and sweets. This handsome seagrass basket is tied with a delightful satin ribbon and is filled with nine types of fresh fruit, nuts, snacks, chocolate goodies and much more. This meaningful gift really shows how much you care!</p>', '0', '20250423181940_68092f3ccc037.webp', NULL, '[\"40\",\"39\",\"38\",\"37\",\"36\",\"35\"]', '1', NULL, '2025-04-23 13:19:40', '2025-04-23 19:00:59'),
(35, 1, '4', NULL, 'Happy Birthday Sweets Box', 'happy-birthday-sweets-box', '0', '51.99', NULL, '<ul>\r\n<li>\r\n<ul>\r\n<li>Multicolor Confetti Popper Push Up</li>\r\n<li>3 oz. Giant Happy Birthday Chocolate Chip Cookie</li>\r\n<li>6 oz. The Popcorn Factory&reg; Chocolate Popcorn</li>\r\n<li>0.8 oz. Milk Chocolate Covered Pretzel with Celebration Sprinkles</li>\r\n<li>0.78 oz. Chuao&reg; Sprinkle Dreams Chocolate Bar</li>\r\n<li>3 oz. Frosted Cupcake Taffy</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p>Measures 12.5&Prime;L x 8.25&Prime;W x 4.125&Prime;H</p>', '<p>Celebrate their special day with a birthday box filled with specialty chocolates and festive treats. Get the party started with a multicolored push-up confetti popper, and then let the fun really begin as they dig into the treasure trove of sweets. There&rsquo;s delightful Chocolate popcorn from The Popcorn Factory&reg;, a gourmet Chuao&reg; Sprinkle Dreams chocolate bar, milk chocolate-covered pretzels, and a giant Happy Birthday chocolate chip cookie. The frosted cupcake taffy will help set the happiness bar on its highest level.</p>', '0', '20250423182543_680930a724a0c.webp', NULL, NULL, '1', NULL, '2025-04-23 13:25:43', '2025-04-23 13:25:43'),
(36, 1, '4', '[{\"variation_id\":\"42\",\"price\":\"44.99\",\"image\":\"20250423183045_var_680931d5d6c57.webp\"},{\"variation_id\":\"43\",\"price\":\"102.99\",\"image\":\"20250423183045_var_680931d5d6fe5.webp\"}]', 'Lucca & Sons™ Sausage & Cheese Gift Box', 'lucca-sons-sausage-cheese-gift-box', '1', NULL, '{\"from\":\"44.99\",\"to\":\"102.99\"}', '<p><strong>Lucca &amp; Sons&trade; Grande Gift Includes:</strong></p>\r\n<ul>\r\n<li>Smoked Gouda Cheese Spread (3.5 oz)</li>\r\n<li>2 Cheddar Cheese Bar (4 oz each)</li>\r\n<li>Sunderland Estates Artichoke &amp; Piquillo Pepper Bruschetta (4.93 oz)</li>\r\n<li>Sunderland Estates Artichoke Bruschetta (4.93 oz)</li>\r\n<li>Arbequina Fields Whole Green Olives (12 oz)</li>\r\n<li>Lucca &amp; Sons Market&trade; Stone Ground Mustard (4 oz)</li>\r\n<li>Lucca &amp; Sons Market&trade; Garlic Summer Sausage (7 oz)</li>\r\n<li>2 Lucca &amp; Sons Market&trade; Summer Original Sausage (7 oz each)</li>\r\n<li>2 Divina Fig Spread (0.7 oz each)</li>\r\n<li>Valley Lahvosh Original Crackerbread Rounds (0.7 oz)</li>\r\n<li>Lucca &amp; Sons Market&trade; Everything Flatbread Crackers (1.9 oz)</li>\r\n<li>Cheese Knife</li>\r\n<li>Bamboo Wood Cutting Board</li>\r\n<li>Measures 18.0625 in L x 11 in W x 3.75 in H</li>\r\n<li>Net Weight: 8.25 lbs<strong>Lucca &amp; Sons&trade; Deluxe Gift Includes:</strong></li>\r\n<li>Lucca &amp; Sons Market&trade; Garlic Summer Sausage (7 oz)</li>\r\n<li>Lucca &amp; Sons Market&trade; Summer Original Sausage (7 oz)</li>\r\n<li>Cheddar Cheese Bar (4 oz)</li>\r\n<li>Lucca &amp; Sons Market&trade; Stone Ground Mustard (4 oz)</li>\r\n<li>Valley Lahvosh Original Crackerbread Rounds (2 oz)</li>\r\n<li>Measures 14.25 in L x 9.25 in W x 2.75 in H</li>\r\n<li>Net Weight: 2.5 lbs</li>\r\n</ul>', '<p>Flavor combinations are limitless courtesy of this wonderful gourmet assortment of Lucca &amp; Sons Market&trade; summer sausages, cheeses, bruschetta, and crackers. Make appetizing stacks of snacks on savory Valley Lahvosh&reg; Original Crackerbread Rounds and Lucca &amp; Sons Market&trade; Everything Flatbread Crackers. Adding a touch of Sunderland Estates Artichoke or Piquillo Pepper Bruschetta will jazz up any amazing combo of smoked sausages, rich cheeses, and flavorful spreads. The gift set is perfect for picnics as it also includes a 10&rdquo; x 15&rdquo; bamboo cutting board and a 5&rdquo; wood-handled cheese knife.</p>', '0', '20250423183045_680931d5c402c.webp', NULL, NULL, '1', NULL, '2025-04-23 13:30:45', '2025-04-23 13:30:45'),
(37, 1, '4', NULL, 'Snack Box', 'snack-box', '0', '36.99', NULL, '<ul>\r\n<li>Moose Munch&reg; Premium Popcorn &ndash; classic caramel (4 oz)</li>\r\n<li>Hickory-smoked summer sausage (5 oz)</li>\r\n<li>Sharp white cheddar cheese (4 oz)</li>\r\n<li>Mixed nuts [cashews, almonds, walnuts, pecans] (4 oz)</li>\r\n<li>Three-seed crackers (4 oz)</li>\r\n<li>Honey hot mustard (1.2 oz)</li>\r\n<li>Net Weight: 1 lb 6 oz</li>\r\n</ul>', '<p>Satisfy cravings both sweet and savory with this tantalizing mix of delicious snacks. Flavorful, hickory-smoked summer sausage, creamy aged white cheddar cheese, and honey hot mustard are paired with our three-seed crackers. Premium mixed nuts and Classic Caramel Moose Munch&reg; Premium Popcorn round out the assortment, perfect to enjoy anytime as an impromptu light meal or gourmet snack to share.</p>', '0', '20250423183839_680933afc6112.webp', '[\"20250423183839_680933afc5b08.webp\",\"20250423183839_680933afc5d0f.webp\",\"20250423183839_680933afc5f20.webp\",\"20250423183839_680933afc56ab.webp\"]', NULL, '1', NULL, '2025-04-23 13:38:39', '2025-04-23 13:38:39'),
(38, 1, '4', NULL, 'Tower of Sweet Treats', 'tower-of-sweet-treats', '0', '41.99', NULL, '<ul>\r\n<li>Moose Munch&reg; Premium Popcorn &ndash; milk chocolate (6 oz)</li>\r\n<li>Lemon shortbread cookies (4 oz)</li>\r\n<li>Yogurt-covered pretzels (6 oz)</li>\r\n<li>Milk chocolate truffles (4 oz)</li>\r\n<li>Milk chocolate mini mints (2.4 oz)</li>\r\n<li>Net Weight: 1 lb 6 oz</li>\r\n</ul>', '<p>Any occasion is sweeter with a tower of gourmet treats. We fill each beautifully decorated box with delights such as irresistible Moose Munch&reg; Premium Popcorn and velvety milk-chocolate truffles from our candy kitchen. From our bakery comes buttery lemon citrus shortbread cookies. We top it all off with a hand-tied ribbon.</p>', '0', '20250423184641_6809359109488.webp', '[\"20250423184655_6809359fe5254.webp\",\"20250423184655_6809359fe561b.webp\"]', NULL, '1', NULL, '2025-04-23 13:46:41', '2025-04-23 13:46:55'),
(39, 1, '4', NULL, 'Ultimate Premium Gift Basket', 'ultimate-premium-gift-basket', '0', '163.99', NULL, '<ul>\r\n<li>Moose Munch&reg; Premium Popcorn &ndash; milk chocolate (10 oz)</li>\r\n<li>Moose Munch&reg; Premium Popcorn &ndash; dark chocolate (10 oz)</li>\r\n<li>Hickory-smoked summer sausage (5 oz)</li>\r\n<li>Thuringer sausage (5 oz)</li>\r\n<li>Busseto Milano Italia dry salami (6 oz)</li>\r\n<li>Three-seed crackers (4 oz)</li>\r\n<li>Mixed nuts [cashews, almonds, walnuts, pecans] (4 oz)</li>\r\n<li>Pepper and Onion Relish (10 oz)</li>\r\n<li>Sesame sticks (10 oz)</li>\r\n<li>Sweet and Spicy snack mix (10 oz)</li>\r\n<li>Yogurt-covered pretzels (6 oz)</li>\r\n<li>Baklava (5 oz)</li>\r\n<li>Raspberry galettes (5.25 oz)</li>\r\n<li>Lemon shortbread cookies (3.4 oz)</li>\r\n<li>White chocolate raspberry cookie bar (1.4 oz)</li>\r\n<li>German chocolate cookie bar (1.4 oz)</li>\r\n<li>Milk chocolate-covered cherries (3 oz)</li>\r\n<li>Chocolate truffles [white coffee, dark cherry, dark raspberry, milk almond, dark chocolate, milk chocolate] (4 oz)</li>\r\n<li>Imitation leather (pleather) and canvas basket, 17.75 in L x 11.75 in W x 4.8 in H (45 cm x 29.8 cm x 12.1 cm)</li>\r\n<li>Net Weight: 6 lb 7 oz</li>\r\n</ul>', '<p>This substantial gift basket makes an impressive statement. Among the wide array of gourmet sweet and savory treats tucked inside are Moose Munch&reg; Premium Popcorn crafted in our candy kitchen, baklava from our bakery, flavorful sausages and salami, our famous pepper and onion relish, nuts, snack mixes, several varieties of candies, cookies, luxurious truffles, and more.</p>', '0', '20250423184836_68093604782e9.webp', '[\"20250423185004_6809365ca74b5.webp\",\"20250423185004_6809365ca78f5.webp\",\"20250423185004_6809365ca7a78.webp\",\"20250423185004_6809365ca7c06.webp\"]', NULL, '1', NULL, '2025-04-23 13:48:36', '2025-04-23 13:50:04'),
(40, 1, '4', NULL, 'With Many Thanks 3 1/2 Gallon 3 Flavor Popcorn Tin', 'with-many-thanks-3-12-gallon-3-flavor-popcorn-tin', '0', '46.99', NULL, '<ul>\r\n<li>Butter Popcorn &ndash; The popcorn classic with freshly popped kernels and buttery deliciousness.</li>\r\n<li>Cheese Popcorn &ndash; A must for any popcorn fan. When you think of cheese popcorn, this is it!</li>\r\n<li>Caramel Popcorn &ndash; Super crunchy and super delicious, one of our most popular popcorn recipes.</li>\r\n</ul>', '<p>Comes filled with your choice of Butter, Cheese, &amp; Caramel Popcorn or Butter, Cheese &amp; Caramel Popcorn. 2 Gallon 32 Cups 3.5 Gallon 56 Cups 6.5 Gallon 104 Cups</p>', '0', '20250423195347_6809454bbd028.webp', '[\"20250423195406_6809455e41a9d.webp\",\"20250423195406_6809455e41ef9.webp\"]', NULL, '1', NULL, '2025-04-23 14:53:47', '2025-04-23 14:54:06'),
(41, 1, '5', '[{\"variation_id\":\"44\",\"price\":\"41.99\",\"image\":\"20250516182130_var_6827822a0c550.webp\"},{\"variation_id\":\"45\",\"price\":\"51.99\",\"image\":\"20250516182130_var_6827822a0c76d.webp\"},{\"variation_id\":\"46\",\"price\":\"61.99\",\"image\":\"20250516182130_var_6827822a0c875.webp\"},{\"variation_id\":\"47\",\"price\":\"71.99\",\"image\":\"20250516182130_var_6827822a0c9bd.webp\"}]', 'Charming Rose Garden', 'charming-rose-garden', '1', NULL, '{\"from\":\"41.99\",\"to\":\"71.99\"}', '<ul>\r\n<li>Pink and yellow rose plants arrive budding and ready to bloom</li>\r\n<li>Designed in a white picket fence planter with floral-print grosgrain bow</li>\r\n<li>Single planter only includes pink rose plant</li>\r\n<li>Measures overall approximately 8&Prime;-10&Prime;H</li>\r\n<li>Once the blooms expire, you can plant your perennial outdoors; with continued care, it will flourish every year</li>\r\n</ul>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Glass suncatcher with floral design and &ldquo;Live Life in Full Bloom&rdquo; sentiment; metal frame and hanging chain; measures 5&Prime; square; includes suction cup for hanging</li>\r\n</ul>', '<div class=\"mbp48228\">About Charming Rose Garden</div>\r\n<div class=\"mbp48231\">When it comes to roses, two is twice as nice. Our beautiful pair of blooming plants, in pink and yellow is designed in a charming white picket fence planter with a floral-print grosgrain bow. Also available in a single planter with a pink rose, it&rsquo;s perfect for birthdays, anniversaries or simply to celebrate spring. Add to your gift with a keepsake sentiment suncatcher.</div>', '0', '20250516182129_68278229c8495.webp', '[\"20250516183357_682785155c542.webp\",\"20250516183357_682785155c75c.webp\",\"20250516183357_682785155c86d.webp\",\"20250516183357_682785155c97b.webp\",\"20250516183357_682785155ca86.webp\"]', NULL, '1', NULL, '2025-05-16 13:21:30', '2025-05-16 13:33:57'),
(42, 1, '5', '[{\"variation_id\":\"44\",\"price\":\"46.99\",\"image\":\"20250516210430_var_6827a85e214cd.webp\"},{\"variation_id\":\"48\",\"price\":\"58.99\",\"image\":\"20250516210430_var_6827a85e2179e.webp\"},{\"variation_id\":\"49\",\"price\":\"56.99\",\"image\":\"20250516210430_var_6827a85e21911.webp\"},{\"variation_id\":\"50\",\"price\":\"68.99\",\"image\":\"20250516210430_var_6827a85e21a72.webp\"},{\"variation_id\":\"46\",\"price\":\"85.99\",\"image\":\"20250516210430_var_6827a85e21e6a.webp\"},{\"variation_id\":\"51\",\"price\":\"97.99\",\"image\":\"20250516210430_var_6827a85e21fe6.webp\"}]', 'Grand Gardenia™', 'grand-gardenia', '1', NULL, '{\"from\":\"46.99\",\"to\":\"97.99\"}', '<ul>\r\n<li>Fresh gardenia plant arrives budding and ready to bloom with white flower heads</li>\r\n<li>Designed in an antique-inspired, white-washed planter</li>\r\n<li>Large measures overall approximately 14-16&Prime;H</li>\r\n<li>Medium measures overall approximately 12-14&Prime;H</li>\r\n<li>Small measures overall approximately 10-12&Prime;H</li>\r\n<li>Gardenias typically bloom between May and September</li>\r\n</ul>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Yankee Candle<sup>&reg;</sup>&nbsp;white gardenia-scented candle; premium soy-wax blend; burn time: 20-30 hours; 4.3 oz.</li>\r\n</ul>\r\n<p><strong>About Yankee Candle</strong><sup>&reg;</sup><br />From reliving favorite memories to setting a mood, Yankee Candle shares a passion for fragrance. It&rsquo;s what drives them to search the world for fresh inspiration in creating evocative, long-lasting scents that will help make your house feel like home.</p>', '<p>With its graceful, fragrant blooms and glossy green leaves, our gardenia is a favorite among plant lovers. It arrives budding in our antique-inspired planter. Complement your gift by adding our Yankee Candle&reg; in a fresh gardenia scent.</p>', '0', '20250516210429_6827a85d9a031.webp', '[\"20250516210538_6827a8a2ddc00.webp\",\"20250516210538_6827a8a2ddf81.webp\"]', NULL, '1', NULL, '2025-05-16 16:04:30', '2025-05-16 16:05:38'),
(43, 1, '5', '[{\"variation_id\":\"44\",\"price\":\"51.99\",\"image\":\"20250516211321_var_6827aa71c4f53.webp\"},{\"variation_id\":\"49\",\"price\":\"87.99\",\"image\":\"20250516211321_var_6827aa71c5213.webp\"},{\"variation_id\":\"46\",\"price\":\"117.99\",\"image\":\"20250516211321_var_6827aa71c5389.webp\"}]', 'Money Tree', 'money-tree', '1', NULL, '{\"from\":\"51.99\",\"to\":\"117.99\"}', '<ul>\r\n<li>Money Tree bonsai features five to seven plume-like leaves and an expertly braided trunk</li>\r\n<li>Designed in beige and ivory seagrass woven, basket-style planter with sewn-in liner and additional plastic liner to prevents leaks</li>\r\n<li>Large measures overall approximately 40-45&Prime;H</li>\r\n<li>Medium measures overall approximately 28-30&Prime;H</li>\r\n<li>Small measures overall approximately 10-14&Prime;H</li>\r\n</ul>\r\n<p>Also Available:</p>\r\n<ul>\r\n<li>Terra cotta candle holder with bronzed metal lid and tea light candle; sentiment reads, &ldquo;The Best Things in Life are the people we love, the places we&rsquo;ve been, and the memories we&rsquo;ve made along the way&rdquo;</li>\r\n<li>Packaged inside a beautiful gift box; measures 3&Prime;D</li>\r\n</ul>', '<p>Send good luck and prosperity with our popular Money Tree bonsai. Featuring lush, glossy leaves and a unique, braided trunk, this natural beauty is designed in a woven basket-style planter, adding to its charm. A favorite among feng shui enthusiasts, it&rsquo;s as easy to care for as it is to enjoy. Available in three sizes. Adding a neutral-toned candle holder with a sentimental quote and tea light candle makes this gift even more thoughtful.</p>', '0', '20250516211321_6827aa71c3626.webp', '[\"20250516211637_6827ab356a8c8.webp\",\"20250516211637_6827ab356acb2.webp\",\"20250516211637_6827ab356ae02.webp\"]', NULL, '1', NULL, '2025-05-16 16:13:21', '2025-05-16 16:16:37'),
(44, 1, '5', '[{\"variation_id\":\"52\",\"price\":\"38.99\",\"image\":\"20250516212242_var_6827aca21b237.webp\"},{\"variation_id\":\"53\",\"price\":\"48.99\",\"image\":\"20250516212242_var_6827aca21b58d.webp\"},{\"variation_id\":\"54\",\"price\":\"48.99\",\"image\":\"20250516212242_var_6827aca21b75d.webp\"},{\"variation_id\":\"55\",\"price\":\"58.99\",\"image\":\"20250516212242_var_6827aca21b92c.webp\"}]', 'Thank You Rose Plant', 'thank-you-rose-plant', '1', NULL, '{\"from\":\"38.99\",\"to\":\"58.99\"}', '<ul>\r\n<li>Yellow rose plant arrives budding and blooming</li>\r\n<li>Designed in a colorful, round, striped metal planter with metallic gold foil accents</li>\r\n<li>Large measures overall approximately 10-12&Prime;H</li>\r\n<li>Small measures overall approximately 8-10&Prime;H</li>\r\n<li>&ldquo;Thank you&rdquo; pre-inflated balloon; measures 4&Prime;D on 12&Prime;H stick</li>\r\n</ul>\r\n<p>Add to their gift:</p>\r\n<ul>\r\n<li>Mini chocolate chip cookies in pint-sized Mason jar with decorative label</li>\r\n</ul>', '<div class=\"mbp109615\">About Thank You Rose Plant</div>\r\n<div class=\"mbp109618\">Maybe they helped you out when you needed it most. Maybe they did something to make your day a little brighter. Whatever the reason, our sunny yellow rose plant is the perfect gift to show your gratitude. Designed in a colorful striped container, it&rsquo;s paired with a &ldquo;Thank you&rdquo; balloon and available in two sizes. Add our Mason jar full of mini chocolate chip cookies for a sweet surprise.</div>', '0', '20250516212242_6827aca21977b.webp', '[\"20250516212256_6827acb067554.webp\",\"20250516212256_6827acb067723.webp\"]', NULL, '1', NULL, '2025-05-16 16:22:42', '2025-05-16 16:22:56'),
(45, 1, '6', '[{\"variation_id\":\"57\",\"price\":\"31.99\",\"image\":\"20250516213759_var_6827b037bdd6c.webp\"},{\"variation_id\":\"56\",\"price\":\"31.99\",\"image\":\"20250516213759_var_6827b037be089.webp\"}]', 'Bold Style Personalized Writing Journal', 'bold-style-personalized-writing-journal', '1', NULL, '{\"from\":\"31.99\",\"to\":\"31.99\"}', '<ul>\r\n<li>Choose from 2 journal color</li>\r\n<li>Engraved with any name and any line of personalization</li>\r\n</ul>\r\n<ul>\r\n<li>Quality constructed from bi-cast split leather</li>\r\n<li>Journal measures 5 1/4&Prime;W x 8 1/4&Prime;L x 3/4&Prime;H</li>\r\n<li>Includes 80 lined pages and a coordinating ribbon marker</li>\r\n<li><strong>Please note:&nbsp;</strong>Pen is not included</li>\r\n<li>Imported</li>\r\n</ul>', NULL, '0', '20250516213759_6827b037bc561.webp', '[\"20250516214027_6827b0cb509e7.webp\",\"20250516214027_6827b0cb50d68.webp\",\"20250516214027_6827b0cb50f35.webp\",\"20250516214027_6827b0cb510f8.webp\",\"20250516214027_6827b0cb5129c.webp\",\"20250516214027_6827b0cb51435.webp\"]', NULL, '1', NULL, '2025-05-16 16:37:59', '2025-05-16 16:40:27'),
(46, 1, '6', NULL, 'Executive Personalized Acrylic Name Plate', 'executive-personalized-acrylic-name-plate', '0', '30.99', NULL, '<ul>\r\n<li>Printed with choice of color and font</li>\r\n<li>Personalized with two lines of text</li>\r\n</ul>\r\n<ul>\r\n<li>Constructed of 100% acrylic</li>\r\n<li>Freestanding</li>\r\n<li>Measures 9&Prime; W x 2&Prime; H x .75&Prime; D</li>\r\n<li>Wipe clean</li>\r\n<li>Imported</li>\r\n</ul>', NULL, '0', '20250516214216_6827b1386b96b.webp', NULL, NULL, '1', NULL, '2025-05-16 16:42:16', '2025-05-16 16:42:16'),
(47, 1, '6', NULL, 'Personalized Executive Candy Dispenser', 'personalized-executive-candy-dispenser', '0', '51.99', NULL, '<ul>\r\n<li>Personalized their name&nbsp;within any 2-lines of text custom engraved on the glass&nbsp;globe for all to see</li>\r\n</ul>\r\n<ul>\r\n<li>Stands 9&Prime;H x&nbsp;5&Prime;W perfect for plenty of candy or snacks</li>\r\n<li>Constructed of silver nickel&nbsp;plated ABS plastic&nbsp;and glass round globe.</li>\r\n<li>Convenient push button dispenser- does not include a money slot</li>\r\n<li>Candy not included, but&nbsp;<em>holds approx. 30oz of plain chocolate candies</em></li>\r\n<li><em>Not intended for use by children</em></li>\r\n<li>\r\n<div>Minor air bubbles may be apparent&nbsp;and are expected with glass products</div>\r\n</li>\r\n<li>Imported</li>\r\n</ul>', NULL, '0', '20250516214352_6827b1986f6bf.webp', '[\"20250516214442_6827b1cab17a7.webp\",\"20250516214442_6827b1cab1a91.webp\"]', '[\"46\",\"45\"]', '1', NULL, '2025-05-16 16:43:52', '2025-05-16 16:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 'Admin Dashboard', '2022-04-06 14:41:39', '2025-09-04 16:23:00'),
(2, 'Individual', 'web', 'Individuals Dashboard', '2022-04-07 14:06:38', '2025-09-04 16:22:36'),
(5, 'Company', 'web', 'Company Dashboard', '2025-09-04 16:20:01', '2025-09-04 16:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 1),
(9, 2),
(9, 5),
(10, 1),
(10, 2),
(10, 5),
(11, 1),
(11, 2),
(11, 5),
(12, 1),
(12, 2),
(12, 5),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(62, 1),
(62, 5),
(63, 1),
(63, 5),
(64, 1),
(64, 5),
(65, 1),
(65, 5),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(86, 2),
(86, 5),
(87, 1),
(88, 1),
(89, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(213, 5),
(214, 1),
(214, 5),
(215, 1),
(215, 5),
(216, 1),
(216, 5),
(217, 1),
(217, 5),
(218, 1),
(218, 5),
(219, 1),
(219, 5),
(220, 1),
(220, 5),
(221, 1),
(221, 5),
(222, 1),
(222, 5),
(223, 1),
(223, 5),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(236, 5),
(237, 1),
(237, 5),
(238, 1),
(238, 5),
(239, 1),
(240, 1),
(241, 1),
(242, 1),
(243, 1),
(244, 1),
(245, 1),
(246, 1),
(247, 1),
(248, 1),
(249, 1),
(250, 1),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(260, 2),
(260, 5),
(261, 1),
(261, 2),
(261, 5),
(262, 1),
(262, 2),
(262, 5),
(263, 1),
(263, 2),
(263, 5),
(264, 1),
(264, 2),
(264, 5),
(265, 1),
(265, 2),
(265, 5),
(266, 1),
(266, 2),
(266, 5),
(267, 1),
(267, 2),
(268, 1),
(268, 2),
(268, 5),
(269, 1),
(269, 2),
(269, 5),
(270, 1),
(270, 2),
(270, 5),
(271, 1),
(271, 5),
(272, 1),
(272, 5),
(273, 1),
(273, 5),
(274, 1),
(274, 5),
(275, 1),
(275, 5),
(276, 1),
(276, 5),
(277, 1),
(277, 5),
(278, 5),
(279, 5),
(280, 5),
(281, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `customer_id`, `first_name`, `last_name`, `company`, `country`, `street`, `town`, `postcode`, `status`, `created_at`, `updated_at`) VALUES
(1, '71', 'Raja', 'Test', 'Test', 'United Kingdom', 'testing123', 'test123', '2205', '1', '2023-10-16 22:12:28', '2023-10-16 22:12:28'),
(3, '81', 'Tanisha', 'Whitney', 'Yuli', 'Callie', 'Kimberly', 'Wade', 'Chanda', '1', '2025-05-20 14:24:46', '2025-05-20 14:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `ascending_id` bigint(20) NOT NULL DEFAULT 0,
  `sizes` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `created_by`, `ascending_id`, `sizes`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Regular', '1', NULL, '2024-01-29 13:06:29', '2024-01-29 13:06:29'),
(2, 1, 2, 'Family Pack', '1', NULL, '2024-01-29 13:06:29', '2024-01-29 13:06:29'),
(3, 1, 3, '16 Oz', '1', NULL, '2024-01-29 13:06:29', '2024-01-29 13:06:29'),
(4, 1, 4, '32 Oz', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(5, 1, 5, '1 Pc', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(6, 1, 6, '2 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(7, 1, 7, '3 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(8, 1, 8, '4 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(9, 1, 9, '5 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(10, 1, 10, '10 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(11, 1, 11, '15 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(12, 1, 12, '20 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(13, 1, 13, '25 Pcs', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(14, 1, 14, '1/2 Lb', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(15, 1, 15, '1 Lb', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30'),
(16, 1, 16, '2 Lb', '1', NULL, '2024-01-29 13:06:30', '2024-01-29 13:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `state` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `city_id`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'New York', 1, '2022-05-19 12:26:17', '2022-05-19 12:26:17'),
(2, 1, 'Buffalo', 1, '2022-05-19 12:26:17', '2022-05-19 12:26:17'),
(3, 1, 'Rochester', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(4, 1, 'Yonkers', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(5, 1, 'Syracuse', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(6, 1, 'Albany', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(7, 1, 'New Rochelle', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(8, 1, 'Mount Vernon', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(9, 1, 'Schenectady', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(10, 1, 'Utica', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(11, 1, 'White Plains', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(12, 1, 'Hempstead', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(13, 1, 'Troy', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(14, 1, 'Niagara Falls', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(15, 1, 'Binghamton', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(16, 1, 'Freeport', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(17, 1, 'Valley Stream', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(18, 2, 'Los Angeles', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(19, 2, 'San Diego', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(20, 2, 'San Jose', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(21, 2, 'San Francisco', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(22, 2, 'Fresno', 1, '2022-05-19 12:26:18', '2022-05-19 12:26:18'),
(23, 2, 'Sacramento', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(24, 2, 'Long Beach', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(25, 2, 'Oakland', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(26, 2, 'Bakersfield', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(27, 2, 'Anaheim', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(28, 2, 'Santa Ana', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(29, 2, 'Riverside', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(30, 2, 'Stockton', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(31, 2, 'Chula Vista', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(32, 2, 'Irvine', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(33, 2, 'Fremont', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(34, 2, 'San Bernardino', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(35, 2, 'Modesto', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(36, 2, 'Fontana', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(37, 2, 'Oxnard', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(38, 2, 'Moreno Valley', 1, '2022-05-19 12:26:19', '2022-05-19 12:26:19'),
(39, 2, 'Huntington Beach', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(40, 2, 'Glendale', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(41, 2, 'Santa Clarita', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(42, 2, 'Garden Grove', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(43, 2, 'Oceanside', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(44, 2, 'Rancho Cucamonga', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(45, 2, 'Santa Rosa', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(46, 2, 'Ontario', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(47, 2, 'Lancaster', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(48, 2, 'Elk Grove', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(49, 2, 'Corona', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(50, 2, 'Palmdale', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(51, 2, 'Salinas', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(52, 2, 'Pomona', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(53, 2, 'Hayward', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(54, 2, 'Escondido', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(55, 2, 'Torrance', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(56, 2, 'Sunnyvale', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(57, 2, 'Orange', 1, '2022-05-19 12:26:20', '2022-05-19 12:26:20'),
(58, 2, 'Fullerton', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(59, 2, 'Pasadena', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(60, 2, 'Thousand Oaks', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(61, 2, 'Visalia', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(62, 2, 'Simi Valley', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(63, 2, 'Concord', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(64, 2, 'Roseville', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(65, 2, 'Victorville', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(66, 2, 'Santa Clara', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(67, 2, 'Vallejo', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(68, 2, 'Berkeley', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(69, 2, 'El Monte', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(70, 2, 'Downey', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(71, 2, 'Costa Mesa', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(72, 2, 'Inglewood', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(73, 2, 'Carlsbad', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(74, 2, 'San Buenaventura (Ventura)', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(75, 2, 'Fairfield', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(76, 2, 'West Covina', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(77, 2, 'Murrieta', 1, '2022-05-19 12:26:21', '2022-05-19 12:26:21'),
(78, 2, 'Richmond', 1, '2022-05-19 12:26:22', '2022-05-19 12:26:22'),
(79, 2, 'Norwalk', 1, '2022-05-19 12:26:22', '2022-05-19 12:26:22'),
(80, 2, 'Antioch', 1, '2022-05-19 12:26:22', '2022-05-19 12:26:22'),
(81, 2, 'Temecula', 1, '2022-05-19 12:26:22', '2022-05-19 12:26:22'),
(82, 2, 'Burbank', 1, '2022-05-19 12:26:23', '2022-05-19 12:26:23'),
(83, 2, 'Daly City', 1, '2022-05-19 12:26:23', '2022-05-19 12:26:23'),
(84, 2, 'Rialto', 1, '2022-05-19 12:26:23', '2022-05-19 12:26:23'),
(85, 2, 'Santa Maria', 1, '2022-05-19 12:26:23', '2022-05-19 12:26:23'),
(86, 2, 'El Cajon', 1, '2022-05-19 12:26:24', '2022-05-19 12:26:24'),
(87, 2, 'San Mateo', 1, '2022-05-19 12:26:24', '2022-05-19 12:26:24'),
(88, 2, 'Clovis', 1, '2022-05-19 12:26:24', '2022-05-19 12:26:24'),
(89, 2, 'Compton', 1, '2022-05-19 12:26:24', '2022-05-19 12:26:24'),
(90, 2, 'Jurupa Valley', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(91, 2, 'Vista', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(92, 2, 'South Gate', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(93, 2, 'Mission Viejo', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(94, 2, 'Vacaville', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(95, 2, 'Carson', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(96, 2, 'Hesperia', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(97, 2, 'Santa Monica', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(98, 2, 'Westminster', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(99, 2, 'Redding', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(100, 2, 'Santa Barbara', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(101, 2, 'Chico', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(102, 2, 'Newport Beach', 1, '2022-05-19 12:26:25', '2022-05-19 12:26:25'),
(103, 2, 'San Leandro', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(104, 2, 'San Marcos', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(105, 2, 'Whittier', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(106, 2, 'Hawthorne', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(107, 2, 'Citrus Heights', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(108, 2, 'Tracy', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(109, 2, 'Alhambra', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(110, 2, 'Livermore', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(111, 2, 'Buena Park', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(112, 2, 'Menifee', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(113, 2, 'Hemet', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(114, 2, 'Lakewood', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(115, 2, 'Merced', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(116, 2, 'Chino', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(117, 2, 'Indio', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(118, 2, 'Redwood City', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(119, 2, 'Lake Forest', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(120, 2, 'Napa', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(121, 2, 'Tustin', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(122, 2, 'Bellflower', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(123, 2, 'Mountain View', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(124, 2, 'Chino Hills', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(125, 2, 'Baldwin Park', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(126, 2, 'Alameda', 1, '2022-05-19 12:26:26', '2022-05-19 12:26:26'),
(127, 2, 'Upland', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(128, 2, 'San Ramon', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(129, 2, 'Folsom', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(130, 2, 'Pleasanton', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(131, 2, 'Union City', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(132, 2, 'Perris', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(133, 2, 'Manteca', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(134, 2, 'Lynwood', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(135, 2, 'Apple Valley', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(136, 2, 'Redlands', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(137, 2, 'Turlock', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(138, 2, 'Milpitas', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(139, 2, 'Redondo Beach', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(140, 2, 'Rancho Cordova', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(141, 2, 'Yorba Linda', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(142, 2, 'Palo Alto', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(143, 2, 'Davis', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(144, 2, 'Camarillo', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(145, 2, 'Walnut Creek', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(146, 2, 'Pittsburg', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(147, 2, 'South San Francisco', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(148, 2, 'Yuba City', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(149, 2, 'San Clemente', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(150, 2, 'Laguna Niguel', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(151, 2, 'Pico Rivera', 1, '2022-05-19 12:26:27', '2022-05-19 12:26:27'),
(152, 2, 'Montebello', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(153, 2, 'Lodi', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(154, 2, 'Madera', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(155, 2, 'Santa Cruz', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(156, 2, 'La Habra', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(157, 2, 'Encinitas', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(158, 2, 'Monterey Park', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(159, 2, 'Tulare', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(160, 2, 'Cupertino', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(161, 2, 'Gardena', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(162, 2, 'National City', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(163, 2, 'Rocklin', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(164, 2, 'Petaluma', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(165, 2, 'Huntington Park', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(166, 2, 'San Rafael', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(167, 2, 'La Mesa', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(168, 2, 'Arcadia', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(169, 2, 'Fountain Valley', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(170, 2, 'Diamond Bar', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(171, 2, 'Woodland', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(172, 2, 'Santee', 1, '2022-05-19 12:26:28', '2022-05-19 12:26:28'),
(173, 2, 'Lake Elsinore', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(174, 2, 'Porterville', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(175, 2, 'Paramount', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(176, 2, 'Eastvale', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(177, 2, 'Rosemead', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(178, 2, 'Hanford', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(179, 2, 'Highland', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(180, 2, 'Brentwood', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(181, 2, 'Novato', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(182, 2, 'Colton', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(183, 2, 'Cathedral City', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(184, 2, 'Delano', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(185, 2, 'Yucaipa', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(186, 2, 'Watsonville', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(187, 2, 'Placentia', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(188, 2, 'Glendora', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(189, 2, 'Gilroy', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(190, 2, 'Palm Desert', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(191, 2, 'Cerritos', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(192, 2, 'West Sacramento', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(193, 2, 'Aliso Viejo', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(194, 2, 'Poway', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(195, 2, 'La Mirada', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(196, 2, 'Rancho Santa Margarita', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(197, 2, 'Cypress', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(198, 2, 'Dublin', 1, '2022-05-19 12:26:29', '2022-05-19 12:26:29'),
(199, 2, 'Covina', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(200, 2, 'Azusa', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(201, 2, 'Palm Springs', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(202, 2, 'San Luis Obispo', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(203, 2, 'Ceres', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(204, 2, 'San Jacinto', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(205, 2, 'Lincoln', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(206, 2, 'Newark', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(207, 2, 'Lompoc', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(208, 2, 'El Centro', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(209, 2, 'Danville', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(210, 2, 'Bell Gardens', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(211, 2, 'Coachella', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(212, 2, 'Rancho Palos Verdes', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(213, 2, 'San Bruno', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(214, 2, 'Rohnert Park', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(215, 2, 'Brea', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(216, 2, 'La Puente', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(217, 2, 'Campbell', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(218, 2, 'San Gabriel', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(219, 2, 'Beaumont', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(220, 2, 'Morgan Hill', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(221, 2, 'Culver City', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(222, 2, 'Calexico', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(223, 2, 'Stanton', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(224, 2, 'La Quinta', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(225, 2, 'Pacifica', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(226, 2, 'Montclair', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(227, 2, 'Oakley', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(228, 2, 'Monrovia', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(229, 2, 'Los Banos', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(230, 2, 'Martinez', 1, '2022-05-19 12:26:30', '2022-05-19 12:26:30'),
(231, 3, 'Chicago', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(232, 3, 'Aurora', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(233, 3, 'Rockford', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(234, 3, 'Joliet', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(235, 3, 'Naperville', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(236, 3, 'Springfield', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(237, 3, 'Peoria', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(238, 3, 'Elgin', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(239, 3, 'Waukegan', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(240, 3, 'Cicero', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(241, 3, 'Champaign', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(242, 3, 'Bloomington', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(243, 3, 'Arlington Heights', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(244, 3, 'Evanston', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(245, 3, 'Decatur', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(246, 3, 'Schaumburg', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(247, 3, 'Bolingbrook', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(248, 3, 'Palatine', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(249, 3, 'Skokie', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(250, 3, 'Des Plaines', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(251, 3, 'Orland Park', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(252, 3, 'Tinley Park', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(253, 3, 'Oak Lawn', 1, '2022-05-19 12:26:31', '2022-05-19 12:26:31'),
(254, 3, 'Berwyn', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(255, 3, 'Mount Prospect', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(256, 3, 'Normal', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(257, 3, 'Wheaton', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(258, 3, 'Hoffman Estates', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(259, 3, 'Oak Park', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(260, 3, 'Downers Grove', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(261, 3, 'Elmhurst', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(262, 3, 'Glenview', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(263, 3, 'DeKalb', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(264, 3, 'Lombard', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(265, 3, 'Belleville', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(266, 3, 'Moline', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(267, 3, 'Buffalo Grove', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(268, 3, 'Bartlett', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(269, 3, 'Urbana', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(270, 3, 'Quincy', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(271, 3, 'Crystal Lake', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(272, 3, 'Plainfield', 1, '2022-05-19 12:26:32', '2022-05-19 12:26:32'),
(273, 3, 'Streamwood', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(274, 3, 'Carol Stream', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(275, 3, 'Romeoville', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(276, 3, 'Rock Island', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(277, 3, 'Hanover Park', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(278, 3, 'Carpentersville', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(279, 3, 'Wheeling', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(280, 3, 'Park Ridge', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(281, 3, 'Addison', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(282, 3, 'Calumet City', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(283, 4, 'Houston', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(284, 4, 'San Antonio', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(285, 4, 'Dallas', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(286, 4, 'Austin', 1, '2022-05-19 12:26:33', '2022-05-19 12:26:33'),
(287, 4, 'Fort Worth', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(288, 4, 'El Paso', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(289, 4, 'Arlington', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(290, 4, 'Corpus Christi', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(291, 4, 'Plano', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(292, 4, 'Laredo', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(293, 4, 'Lubbock', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(294, 4, 'Garland', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(295, 4, 'Irving', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(296, 4, 'Amarillo', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(297, 4, 'Grand Prairie', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(298, 4, 'Brownsville', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(299, 4, 'Pasadena', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(300, 4, 'McKinney', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(301, 4, 'Mesquite', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(302, 4, 'McAllen', 1, '2022-05-19 12:26:34', '2022-05-19 12:26:34'),
(303, 4, 'Killeen', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(304, 4, 'Frisco', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(305, 4, 'Waco', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(306, 4, 'Carrollton', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(307, 4, 'Denton', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(308, 4, 'Midland', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(309, 4, 'Abilene', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(310, 4, 'Beaumont', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(311, 4, 'Round Rock', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(312, 4, 'Odessa', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(313, 4, 'Wichita Falls', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(314, 4, 'Richardson', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(315, 4, 'Lewisville', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(316, 4, 'Tyler', 1, '2022-05-19 12:26:35', '2022-05-19 12:26:35'),
(317, 4, 'College Station', 1, '2022-05-19 12:26:36', '2022-05-19 12:26:36'),
(318, 4, 'Pearland', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(319, 4, 'San Angelo', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(320, 4, 'Allen', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(321, 4, 'League City', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(322, 4, 'Sugar Land', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(323, 4, 'Longview', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(324, 4, 'Edinburg', 1, '2022-05-19 12:26:38', '2022-05-19 12:26:38'),
(325, 4, 'Mission', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(326, 4, 'Bryan', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(327, 4, 'Baytown', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(328, 4, 'Pharr', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(329, 4, 'Temple', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(330, 4, 'Missouri City', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(331, 4, 'Flower Mound', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(332, 4, 'Harlingen', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(333, 4, 'North Richland Hills', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(334, 4, 'Victoria', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(335, 4, 'Conroe', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(336, 4, 'New Braunfels', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(337, 4, 'Mansfield', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(338, 4, 'Cedar Park', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(339, 4, 'Rowlett', 1, '2022-05-19 12:26:39', '2022-05-19 12:26:39'),
(340, 4, 'Port Arthur', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(341, 4, 'Euless', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(342, 4, 'Georgetown', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(343, 4, 'Pflugerville', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(344, 4, 'DeSoto', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(345, 4, 'San Marcos', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(346, 4, 'Grapevine', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(347, 4, 'Bedford', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(348, 4, 'Galveston', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(349, 4, 'Cedar Hill', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(350, 4, 'Texas City', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(351, 4, 'Wylie', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(352, 4, 'Haltom City', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(353, 4, 'Keller', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(354, 4, 'Coppell', 1, '2022-05-19 12:26:40', '2022-05-19 12:26:40'),
(355, 4, 'Rockwall', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(356, 4, 'Huntsville', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(357, 4, 'Duncanville', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(358, 4, 'Sherman', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(359, 4, 'The Colony', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(360, 4, 'Burleson', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(361, 4, 'Hurst', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(362, 4, 'Lancaster', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(363, 4, 'Texarkana', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(364, 4, 'Friendswood', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(365, 4, 'Weslaco', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(366, 5, 'Philadelphia', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(367, 5, 'Pittsburgh', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(368, 5, 'Allentown', 1, '2022-05-19 12:26:41', '2022-05-19 12:26:41'),
(369, 5, 'Erie', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(370, 5, 'Reading', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(371, 5, 'Scranton', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(372, 5, 'Bethlehem', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(373, 5, 'Lancaster', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(374, 5, 'Harrisburg', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(375, 5, 'Altoona', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(376, 5, 'York', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(377, 5, 'State College', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(378, 5, 'Wilkes-Barre', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(379, 6, 'Phoenix', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(380, 6, 'Tucson', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(381, 6, 'Mesa', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(382, 6, 'Chandler', 1, '2022-05-19 12:26:42', '2022-05-19 12:26:42'),
(383, 6, 'Glendale', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(384, 6, 'Scottsdale', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(385, 6, 'Gilbert', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(386, 6, 'Tempe', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(387, 6, 'Peoria', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(388, 6, 'Surprise', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(389, 6, 'Yuma', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(390, 6, 'Avondale', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(391, 6, 'Goodyear', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(392, 6, 'Flagstaff', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(393, 6, 'Buckeye', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(394, 6, 'Lake Havasu City', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(395, 6, 'Casa Grande', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(396, 6, 'Sierra Vista', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(397, 6, 'Maricopa', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(398, 6, 'Oro Valley', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(399, 6, 'Prescott', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(400, 6, 'Bullhead City', 1, '2022-05-19 12:26:43', '2022-05-19 12:26:43'),
(401, 6, 'Prescott Valley', 1, '2022-05-19 12:26:44', '2022-05-19 12:26:44'),
(402, 6, 'Marana', 1, '2022-05-19 12:26:44', '2022-05-19 12:26:44'),
(403, 6, 'Apache Junction', 1, '2022-05-19 12:26:44', '2022-05-19 12:26:44'),
(404, 7, 'Jacksonville', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(405, 7, 'Miami', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(406, 7, 'Tampa', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(407, 7, 'Orlando', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(408, 7, 'St. Petersburg', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(409, 7, 'Hialeah', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(410, 7, 'Tallahassee', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(411, 7, 'Fort Lauderdale', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(412, 7, 'Port St. Lucie', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(413, 7, 'Cape Coral', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(414, 7, 'Pembroke Pines', 1, '2022-05-19 12:26:45', '2022-05-19 12:26:45'),
(415, 7, 'Hollywood', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(416, 7, 'Miramar', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(417, 7, 'Gainesville', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(418, 7, 'Coral Springs', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(419, 7, 'Miami Gardens', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(420, 7, 'Clearwater', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(421, 7, 'Palm Bay', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(422, 7, 'Pompano Beach', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(423, 7, 'West Palm Beach', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(424, 7, 'Lakeland', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(425, 7, 'Davie', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(426, 7, 'Miami Beach', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(427, 7, 'Sunrise', 1, '2022-05-19 12:26:46', '2022-05-19 12:26:46'),
(428, 7, 'Plantation', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(429, 7, 'Boca Raton', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(430, 7, 'Deltona', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(431, 7, 'Largo', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(432, 7, 'Deerfield Beach', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(433, 7, 'Palm Coast', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(434, 7, 'Melbourne', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(435, 7, 'Boynton Beach', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(436, 7, 'Lauderhill', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(437, 7, 'Weston', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(438, 7, 'Fort Myers', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(439, 7, 'Kissimmee', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(440, 7, 'Homestead', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(441, 7, 'Tamarac', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(442, 7, 'Delray Beach', 1, '2022-05-19 12:26:47', '2022-05-19 12:26:47'),
(443, 7, 'Daytona Beach', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(444, 7, 'North Miami', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(445, 7, 'Wellington', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(446, 7, 'North Port', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(447, 7, 'Jupiter', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(448, 7, 'Ocala', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(449, 7, 'Port Orange', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(450, 7, 'Margate', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(451, 7, 'Coconut Creek', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(452, 7, 'Sanford', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(453, 7, 'Sarasota', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(454, 7, 'Pensacola', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(455, 7, 'Bradenton', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(456, 7, 'Palm Beach Gardens', 1, '2022-05-19 12:26:48', '2022-05-19 12:26:48'),
(457, 7, 'Pinellas Park', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(458, 7, 'Coral Gables', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(459, 7, 'Doral', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(460, 7, 'Bonita Springs', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(461, 7, 'Apopka', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(462, 7, 'Titusville', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(463, 7, 'North Miami Beach', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(464, 7, 'Oakland Park', 1, '2022-05-19 12:26:49', '2022-05-19 12:26:49'),
(465, 7, 'Fort Pierce', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(466, 7, 'North Lauderdale', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(467, 7, 'Cutler Bay', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(468, 7, 'Altamonte Springs', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(469, 7, 'St. Cloud', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(470, 7, 'Greenacres', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(471, 7, 'Ormond Beach', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(472, 7, 'Ocoee', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(473, 7, 'Hallandale Beach', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(474, 7, 'Winter Garden', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(475, 7, 'Aventura', 1, '2022-05-19 12:26:50', '2022-05-19 12:26:50'),
(476, 8, 'Indianapolis', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(477, 8, 'Fort Wayne', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(478, 8, 'Evansville', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(479, 8, 'South Bend', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(480, 8, 'Carmel', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(481, 8, 'Bloomington', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(482, 8, 'Fishers', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(483, 8, 'Hammond', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(484, 8, 'Gary', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(485, 8, 'Muncie', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(486, 8, 'Lafayette', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(487, 8, 'Terre Haute', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(488, 8, 'Kokomo', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(489, 8, 'Anderson', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(490, 8, 'Noblesville', 1, '2022-05-19 12:26:51', '2022-05-19 12:26:51'),
(491, 8, 'Greenwood', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(492, 8, 'Elkhart', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(493, 8, 'Mishawaka', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(494, 8, 'Lawrence', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(495, 8, 'Jeffersonville', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(496, 8, 'Columbus', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(497, 8, 'Portage', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(498, 9, 'Columbus', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(499, 9, 'Cleveland', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(500, 9, 'Cincinnati', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(501, 9, 'Toledo', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(502, 9, 'Akron', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(503, 9, 'Dayton', 1, '2022-05-19 12:26:52', '2022-05-19 12:26:52'),
(504, 9, 'Parma', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(505, 9, 'Canton', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(506, 9, 'Youngstown', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(507, 9, 'Lorain', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(508, 9, 'Hamilton', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(509, 9, 'Springfield', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(510, 9, 'Kettering', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(511, 9, 'Elyria', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(512, 9, 'Lakewood', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(513, 9, 'Cuyahoga Falls', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(514, 9, 'Middletown', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(515, 9, 'Euclid', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(516, 9, 'Newark', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(517, 9, 'Mansfield', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(518, 9, 'Mentor', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(519, 9, 'Beavercreek', 1, '2022-05-19 12:26:53', '2022-05-19 12:26:53'),
(520, 9, 'Cleveland Heights', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(521, 9, 'Strongsville', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(522, 9, 'Dublin', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(523, 9, 'Fairfield', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(524, 9, 'Findlay', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(525, 9, 'Warren', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(526, 9, 'Lancaster', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(527, 9, 'Lima', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(528, 9, 'Huber Heights', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(529, 9, 'Westerville', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(530, 9, 'Marion', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(531, 9, 'Grove City', 1, '2022-05-19 12:26:54', '2022-05-19 12:26:54'),
(532, 10, 'Charlotte', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(533, 10, 'Raleigh', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(534, 10, 'Greensboro', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(535, 10, 'Durham', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(536, 10, 'Winston-Salem', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(537, 10, 'Fayetteville', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(538, 10, 'Cary', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(539, 10, 'Wilmington', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(540, 10, 'High Point', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(541, 10, 'Greenville', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(542, 10, 'Asheville', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(543, 10, 'Concord', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(544, 10, 'Gastonia', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(545, 10, 'Jacksonville', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(546, 10, 'Chapel Hill', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(547, 10, 'Rocky Mount', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(548, 10, 'Burlington', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(549, 10, 'Wilson', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(550, 10, 'Huntersville', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(551, 10, 'Kannapolis', 1, '2022-05-19 12:26:55', '2022-05-19 12:26:55'),
(552, 10, 'Apex', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(553, 10, 'Hickory', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(554, 10, 'Goldsboro', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(555, 11, 'Detroit', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(556, 11, 'Grand Rapids', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(557, 11, 'Warren', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(558, 11, 'Sterling Heights', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(559, 11, 'Ann Arbor', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(560, 11, 'Lansing', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(561, 11, 'Flint', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(562, 11, 'Dearborn', 1, '2022-05-19 12:26:56', '2022-05-19 12:26:56'),
(563, 11, 'Livonia', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(564, 11, 'Westland', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(565, 11, 'Troy', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(566, 11, 'Farmington Hills', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(567, 11, 'Kalamazoo', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(568, 11, 'Wyoming', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(569, 11, 'Southfield', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(570, 11, 'Rochester Hills', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(571, 11, 'Taylor', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(572, 11, 'Pontiac', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(573, 11, 'St. Clair Shores', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(574, 11, 'Royal Oak', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(575, 11, 'Novi', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(576, 11, 'Dearborn Heights', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(577, 11, 'Battle Creek', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(578, 11, 'Saginaw', 1, '2022-05-19 12:26:57', '2022-05-19 12:26:57'),
(579, 11, 'Kentwood', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(580, 11, 'East Lansing', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(581, 11, 'Roseville', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(582, 11, 'Portage', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(583, 11, 'Midland', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(584, 11, 'Lincoln Park', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(585, 11, 'Muskegon', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(586, 12, 'Memphis', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(587, 12, 'Nashville-Davidson', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(588, 12, 'Knoxville', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(589, 12, 'Chattanooga', 1, '2022-05-19 12:26:58', '2022-05-19 12:26:58'),
(590, 12, 'Clarksville', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(591, 12, 'Murfreesboro', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(592, 12, 'Jackson', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(593, 12, 'Franklin', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(594, 12, 'Johnson City', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(595, 12, 'Bartlett', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(596, 12, 'Hendersonville', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(597, 12, 'Kingsport', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(598, 12, 'Collierville', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(599, 12, 'Cleveland', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(600, 12, 'Smyrna', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(601, 12, 'Germantown', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(602, 12, 'Brentwood', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(603, 13, 'Boston', 1, '2022-05-19 12:26:59', '2022-05-19 12:26:59'),
(604, 13, 'Worcester', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(605, 13, 'Springfield', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(606, 13, 'Lowell', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(607, 13, 'Cambridge', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(608, 13, 'New Bedford', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(609, 13, 'Brockton', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(610, 13, 'Quincy', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(611, 13, 'Lynn', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(612, 13, 'Fall River', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(613, 13, 'Newton', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(614, 13, 'Lawrence', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(615, 13, 'Somerville', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(616, 13, 'Waltham', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(617, 13, 'Haverhill', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(618, 13, 'Malden', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(619, 13, 'Medford', 1, '2022-05-19 12:27:00', '2022-05-19 12:27:00'),
(620, 13, 'Taunton', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(621, 13, 'Chicopee', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(622, 13, 'Weymouth Town', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(623, 13, 'Revere', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(624, 13, 'Peabody', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(625, 13, 'Methuen', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(626, 13, 'Barnstable Town', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(627, 13, 'Pittsfield', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(628, 13, 'Attleboro', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(629, 13, 'Everett', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(630, 13, 'Salem', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(631, 13, 'Westfield', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(632, 13, 'Leominster', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(633, 13, 'Fitchburg', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(634, 13, 'Beverly', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(635, 13, 'Holyoke', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(636, 13, 'Marlborough', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(637, 13, 'Woburn', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(638, 13, 'Chelsea', 1, '2022-05-19 12:27:01', '2022-05-19 12:27:01'),
(639, 14, 'Seattle', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(640, 14, 'Spokane', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(641, 14, 'Tacoma', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(642, 14, 'Vancouver', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(643, 14, 'Bellevue', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(644, 14, 'Kent', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(645, 14, 'Everett', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(646, 14, 'Renton', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(647, 14, 'Yakima', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(648, 14, 'Federal Way', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(649, 14, 'Spokane Valley', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(650, 14, 'Bellingham', 1, '2022-05-19 12:27:02', '2022-05-19 12:27:02'),
(651, 14, 'Kennewick', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(652, 14, 'Auburn', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(653, 14, 'Pasco', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(654, 14, 'Marysville', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(655, 14, 'Lakewood', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(656, 14, 'Redmond', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(657, 14, 'Shoreline', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(658, 14, 'Richland', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(659, 14, 'Kirkland', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(660, 14, 'Burien', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(661, 14, 'Sammamish', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(662, 14, 'Olympia', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(663, 14, 'Lacey', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(664, 14, 'Edmonds', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(665, 14, 'Bremerton', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(666, 14, 'Puyallup', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(667, 15, 'Denver', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(668, 15, 'Colorado Springs', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(669, 15, 'Aurora', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(670, 15, 'Fort Collins', 1, '2022-05-19 12:27:03', '2022-05-19 12:27:03'),
(671, 15, 'Lakewood', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(672, 15, 'Thornton', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(673, 15, 'Arvada', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(674, 15, 'Westminster', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(675, 15, 'Pueblo', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(676, 15, 'Centennial', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(677, 15, 'Boulder', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(678, 15, 'Greeley', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(679, 15, 'Longmont', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(680, 15, 'Loveland', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(681, 15, 'Grand Junction', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(682, 15, 'Broomfield', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(683, 15, 'Castle Rock', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(684, 15, 'Commerce City', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(685, 15, 'Parker', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(686, 15, 'Littleton', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(687, 15, 'Northglenn', 1, '2022-05-19 12:27:04', '2022-05-19 12:27:04'),
(688, 16, 'Washington', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(689, 17, 'Baltimore', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(690, 17, 'Frederick', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(691, 17, 'Rockville', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(692, 17, 'Gaithersburg', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(693, 17, 'Bowie', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(694, 17, 'Hagerstown', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(695, 17, 'Annapolis', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(696, 18, 'Louisville/Jefferson County', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(697, 18, 'Lexington-Fayette', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(698, 18, 'Bowling Green', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(699, 18, 'Owensboro', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(700, 18, 'Covington', 1, '2022-05-19 12:27:05', '2022-05-19 12:27:05'),
(701, 19, 'Portland', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(702, 19, 'Eugene', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(703, 19, 'Salem', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(704, 19, 'Gresham', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(705, 19, 'Hillsboro', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(706, 19, 'Beaverton', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(707, 19, 'Bend', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(708, 19, 'Medford', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(709, 19, 'Springfield', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(710, 19, 'Corvallis', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(711, 19, 'Albany', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06');
INSERT INTO `states` (`id`, `city_id`, `state`, `status`, `created_at`, `updated_at`) VALUES
(712, 19, 'Tigard', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(713, 19, 'Lake Oswego', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(714, 19, 'Keizer', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(715, 20, 'Oklahoma City', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(716, 20, 'Tulsa', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(717, 20, 'Norman', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(718, 20, 'Broken Arrow', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(719, 20, 'Lawton', 1, '2022-05-19 12:27:06', '2022-05-19 12:27:06'),
(720, 20, 'Edmond', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(721, 20, 'Moore', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(722, 20, 'Midwest City', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(723, 20, 'Enid', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(724, 20, 'Stillwater', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(725, 20, 'Muskogee', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(726, 21, 'Milwaukee', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(727, 21, 'Madison', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(728, 21, 'Green Bay', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(729, 21, 'Kenosha', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(730, 21, 'Racine', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(731, 21, 'Appleton', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(732, 21, 'Waukesha', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(733, 21, 'Eau Claire', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(734, 21, 'Oshkosh', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(735, 21, 'Janesville', 1, '2022-05-19 12:27:07', '2022-05-19 12:27:07'),
(736, 21, 'West Allis', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(737, 21, 'La Crosse', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(738, 21, 'Sheboygan', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(739, 21, 'Wauwatosa', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(740, 21, 'Fond du Lac', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(741, 21, 'New Berlin', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(742, 21, 'Wausau', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(743, 21, 'Brookfield', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(744, 21, 'Greenfield', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(745, 21, 'Beloit', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(746, 22, 'Las Vegas', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(747, 22, 'Henderson', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(748, 22, 'Reno', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(749, 22, 'North Las Vegas', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(750, 22, 'Sparks', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(751, 22, 'Carson City', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(752, 23, 'Albuquerque', 1, '2022-05-19 12:27:08', '2022-05-19 12:27:08'),
(753, 23, 'Las Cruces', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(754, 23, 'Rio Rancho', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(755, 23, 'Santa Fe', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(756, 23, 'Roswell', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(757, 23, 'Farmington', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(758, 23, 'Clovis', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(759, 24, 'Kansas City', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(760, 24, 'St. Louis', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(761, 24, 'Springfield', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(762, 24, 'Independence', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(763, 24, 'Columbia', 1, '2022-05-19 12:27:09', '2022-05-19 12:27:09'),
(764, 24, 'Lee\'s Summit', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(765, 24, 'O\'Fallon', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(766, 24, 'St. Joseph', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(767, 24, 'St. Charles', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(768, 24, 'St. Peters', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(769, 24, 'Blue Springs', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(770, 24, 'Florissant', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(771, 24, 'Joplin', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(772, 24, 'Chesterfield', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(773, 24, 'Jefferson City', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(774, 24, 'Cape Girardeau', 1, '2022-05-19 12:27:10', '2022-05-19 12:27:10'),
(775, 25, 'Virginia Beach', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(776, 25, 'Norfolk', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(777, 25, 'Chesapeake', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(778, 25, 'Richmond', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(779, 25, 'Newport News', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(780, 25, 'Alexandria', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(781, 25, 'Hampton', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(782, 25, 'Roanoke', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(783, 25, 'Portsmouth', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(784, 25, 'Suffolk', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(785, 25, 'Lynchburg', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(786, 25, 'Harrisonburg', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(787, 25, 'Leesburg', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(788, 25, 'Charlottesville', 1, '2022-05-19 12:27:11', '2022-05-19 12:27:11'),
(789, 25, 'Danville', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(790, 25, 'Blacksburg', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(791, 25, 'Manassas', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(792, 26, 'Atlanta', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(793, 26, 'Columbus', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(794, 26, 'Augusta-Richmond County', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(795, 26, 'Savannah', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(796, 26, 'Athens-Clarke County', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(797, 26, 'Sandy Springs', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(798, 26, 'Roswell', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(799, 26, 'Macon', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(800, 26, 'Johns Creek', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(801, 26, 'Albany', 1, '2022-05-19 12:27:12', '2022-05-19 12:27:12'),
(802, 26, 'Warner Robins', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(803, 26, 'Alpharetta', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(804, 26, 'Marietta', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(805, 26, 'Valdosta', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(806, 26, 'Smyrna', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(807, 26, 'Dunwoody', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(808, 27, 'Omaha', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(809, 27, 'Lincoln', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(810, 27, 'Bellevue', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(811, 27, 'Grand Island', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(812, 28, 'Minneapolis', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(813, 28, 'St. Paul', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(814, 28, 'Rochester', 1, '2022-05-19 12:27:13', '2022-05-19 12:27:13'),
(815, 28, 'Duluth', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(816, 28, 'Bloomington', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(817, 28, 'Brooklyn Park', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(818, 28, 'Plymouth', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(819, 28, 'St. Cloud', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(820, 28, 'Eagan', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(821, 28, 'Woodbury', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(822, 28, 'Maple Grove', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(823, 28, 'Eden Prairie', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(824, 28, 'Coon Rapids', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(825, 28, 'Burnsville', 1, '2022-05-19 12:27:14', '2022-05-19 12:27:14'),
(826, 28, 'Blaine', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(827, 28, 'Lakeville', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(828, 28, 'Minnetonka', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(829, 28, 'Apple Valley', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(830, 28, 'Edina', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(831, 28, 'St. Louis Park', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(832, 28, 'Mankato', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(833, 28, 'Maplewood', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(834, 28, 'Moorhead', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(835, 28, 'Shakopee', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(836, 29, 'Wichita', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(837, 29, 'Overland Park', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(838, 29, 'Kansas City', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(839, 29, 'Olathe', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(840, 29, 'Topeka', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(841, 29, 'Lawrence', 1, '2022-05-19 12:27:15', '2022-05-19 12:27:15'),
(842, 29, 'Shawnee', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(843, 29, 'Manhattan', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(844, 29, 'Lenexa', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(845, 29, 'Salina', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(846, 29, 'Hutchinson', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(847, 30, 'New Orleans', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(848, 30, 'Baton Rouge', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(849, 30, 'Shreveport', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(850, 30, 'Lafayette', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(851, 30, 'Lake Charles', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(852, 30, 'Kenner', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(853, 30, 'Bossier City', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(854, 30, 'Monroe', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(855, 30, 'Alexandria', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(856, 31, 'Honolulu', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(857, 32, 'Anchorage', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(858, 33, 'Newark', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(859, 33, 'Jersey City', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(860, 33, 'Paterson', 1, '2022-05-19 12:27:16', '2022-05-19 12:27:16'),
(861, 33, 'Elizabeth', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(862, 33, 'Clifton', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(863, 33, 'Trenton', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(864, 33, 'Camden', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(865, 33, 'Passaic', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(866, 33, 'Union City', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(867, 33, 'Bayonne', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(868, 33, 'East Orange', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(869, 33, 'Vineland', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(870, 33, 'New Brunswick', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(871, 33, 'Hoboken', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(872, 33, 'Perth Amboy', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(873, 33, 'West New York', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(874, 33, 'Plainfield', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(875, 33, 'Hackensack', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(876, 33, 'Sayreville', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(877, 33, 'Kearny', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(878, 33, 'Linden', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(879, 33, 'Atlantic City', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(880, 34, 'Boise City', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(881, 34, 'Nampa', 1, '2022-05-19 12:27:17', '2022-05-19 12:27:17'),
(882, 34, 'Meridian', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(883, 34, 'Idaho Falls', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(884, 34, 'Pocatello', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(885, 34, 'Caldwell', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(886, 34, 'Coeur d\'Alene', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(887, 34, 'Twin Falls', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(888, 35, 'Birmingham', 1, '2022-05-19 12:27:18', '2022-05-19 12:27:18'),
(889, 35, 'Montgomery', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(890, 35, 'Mobile', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(891, 35, 'Huntsville', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(892, 35, 'Tuscaloosa', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(893, 35, 'Hoover', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(894, 35, 'Dothan', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(895, 35, 'Auburn', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(896, 35, 'Decatur', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(897, 35, 'Madison', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(898, 35, 'Florence', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(899, 35, 'Gadsden', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(900, 36, 'Des Moines', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(901, 36, 'Cedar Rapids', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(902, 36, 'Davenport', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(903, 36, 'Sioux City', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(904, 36, 'Iowa City', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(905, 36, 'Waterloo', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(906, 36, 'Council Bluffs', 1, '2022-05-19 12:27:19', '2022-05-19 12:27:19'),
(907, 36, 'Ames', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(908, 36, 'West Des Moines', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(909, 36, 'Dubuque', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(910, 36, 'Ankeny', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(911, 36, 'Urbandale', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(912, 36, 'Cedar Falls', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(913, 37, 'Little Rock', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(914, 37, 'Fort Smith', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(915, 37, 'Fayetteville', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(916, 37, 'Springdale', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(917, 37, 'Jonesboro', 1, '2022-05-19 12:27:20', '2022-05-19 12:27:20'),
(918, 37, 'North Little Rock', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(919, 37, 'Conway', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(920, 37, 'Rogers', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(921, 37, 'Pine Bluff', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(922, 37, 'Bentonville', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(923, 38, 'Salt Lake City', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(924, 38, 'West Valley City', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(925, 38, 'Provo', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(926, 38, 'West Jordan', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(927, 38, 'Orem', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(928, 38, 'Sandy', 1, '2022-05-19 12:27:21', '2022-05-19 12:27:21'),
(929, 38, 'Ogden', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(930, 38, 'St. George', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(931, 38, 'Layton', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(932, 38, 'Taylorsville', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(933, 38, 'South Jordan', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(934, 38, 'Lehi', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(935, 38, 'Logan', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(936, 38, 'Murray', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(937, 38, 'Draper', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(938, 38, 'Bountiful', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(939, 38, 'Riverton', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(940, 38, 'Roy', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(941, 39, 'Providence', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(942, 39, 'Warwick', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(943, 39, 'Cranston', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(944, 39, 'Pawtucket', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(945, 39, 'East Providence', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(946, 39, 'Woonsocket', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(947, 40, 'Jackson', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(948, 40, 'Gulfport', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(949, 40, 'Southaven', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(950, 40, 'Hattiesburg', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(951, 40, 'Biloxi', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(952, 40, 'Meridian', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(953, 41, 'Sioux Falls', 1, '2022-05-19 12:27:22', '2022-05-19 12:27:22'),
(954, 41, 'Rapid City', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(955, 42, 'Bridgeport', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(956, 42, 'New Haven', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(957, 42, 'Stamford', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(958, 42, 'Hartford', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(959, 42, 'Waterbury', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(960, 42, 'Norwalk', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(961, 42, 'Danbury', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(962, 42, 'New Britain', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(963, 42, 'Meriden', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(964, 42, 'Chicago', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(965, 42, 'West Haven', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(966, 42, 'Milford', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(967, 42, 'Middletown', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(968, 42, 'Norwich', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(969, 42, 'Shelton', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(970, 43, 'Columbia', 1, '2022-05-19 12:27:23', '2022-05-19 12:27:23'),
(971, 43, 'Charleston', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(972, 43, 'North Charleston', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(973, 43, 'Mount Pleasant', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(974, 43, 'Rock Hill', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(975, 43, 'Greenville', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(976, 43, 'Summerville', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(977, 43, 'Sumter', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(978, 43, 'Goose Creek', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(979, 43, 'Hilton Head Island', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(980, 43, 'Florence', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(981, 43, 'Spartanburg', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(982, 44, 'Manchester', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(983, 44, 'Nashua', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(984, 44, 'Concord', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(985, 45, 'Fargo', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(986, 45, 'Bismarck', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(987, 45, 'Grand Forks', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(988, 45, 'Minot', 1, '2022-05-19 12:27:24', '2022-05-19 12:27:24'),
(989, 46, 'Billings', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(990, 46, 'Missoula', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(991, 46, 'Great Falls', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(992, 46, 'Bozeman', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(993, 47, 'Wilmington', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(994, 47, 'Dover', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(995, 48, 'Portland', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(996, 49, 'Cheyenne', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(997, 49, 'Casper', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(998, 50, 'Charleston', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(999, 50, 'Huntington', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25'),
(1000, 51, 'Burlington', 1, '2022-05-19 12:27:25', '2022-05-19 12:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `slug`, `designation`, `rating`, `image`, `video`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PERRY M.', 'perry-m', NULL, '3', '15-04-2025-224134.webp', NULL, '<div>Thanks to NEVER FORGET, our employee engagement increased by 20%, and customer referrals doubled.</div>', 1, '2025-04-15 17:41:34', '2025-04-15 18:41:24'),
(2, 'JESSICA L.', 'jessica-l', NULL, '4', '15-04-2025-224353.webp', NULL, '<div>I highly recommend Neverforgatappreciation.com to anyone looking to faster a culture of gratitude in their workplace</div>', 1, '2025-04-15 17:43:53', '2025-04-15 18:20:42'),
(3, 'ROBERT T.', 'robert-t', NULL, '5', '15-04-2025-224440.webp', NULL, '<div>The team is professional, detail-oriented, and truly committed to providing a top-notch</div>', 1, '2025-04-15 17:44:40', '2025-04-15 18:02:49'),
(9, 'Never Forget', 'never-forget', NULL, '5', NULL, '10-10-2025-205819.mov', '<p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development.</p>', 1, '2025-10-10 15:58:19', '2025-10-10 16:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `ticket_number` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `order_id`, `customer_id`, `product_id`, `ticket_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 68, '2022-07-12 13:25:24', '2022-07-12 13:25:24'),
(2, 1, 1, 2, 57, '2022-07-12 13:25:24', '2022-07-12 13:25:24'),
(3, 1, 1, 2, 20, '2022-07-12 13:25:24', '2022-07-12 13:25:24'),
(4, 2, 1, 8, 70, '2022-07-12 13:27:15', '2022-07-12 13:27:15'),
(5, 3, 65, 2, 48, '2022-07-12 13:29:55', '2022-07-12 13:29:55'),
(6, 4, 65, 2, 86, '2022-07-12 13:45:37', '2022-07-12 13:45:37'),
(7, 5, 66, 2, 129, '2022-07-13 11:41:40', '2022-07-13 11:41:40'),
(8, 5, 66, 2, 16, '2022-07-13 11:41:40', '2022-07-13 11:41:40'),
(9, 5, 66, 2, 87, '2022-07-13 11:41:41', '2022-07-13 11:41:41'),
(10, 5, 66, 2, 103, '2022-07-13 11:41:41', '2022-07-13 11:41:41'),
(11, 6, 66, 2, 27, '2022-07-13 11:53:38', '2022-07-13 11:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `travel_types`
--

CREATE TABLE `travel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_types`
--

INSERT INTO `travel_types` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cruise', NULL, NULL, '1', '2025-10-24 09:51:12', '2025-10-24 09:51:12'),
(2, 'Tour', NULL, NULL, '1', '2025-10-24 09:51:12', '2025-10-24 09:51:12'),
(3, 'CP Exclusive', NULL, NULL, '1', '2025-10-24 09:51:12', '2025-10-24 09:51:12'),
(4, 'All-Inclusive', NULL, NULL, '1', '2025-10-24 09:51:12', '2025-10-24 09:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL COMMENT 'admin,individual , company, app_user',
  `company_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `city_id` int(32) DEFAULT NULL,
  `state_id` int(32) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `account_type`, `company_id`, `name`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `verify_token`, `image`, `about_me`, `date_of_birth`, `gender`, `address`, `designation`, `whatsapp`, `facebook`, `twitter`, `linkedin`, `city_id`, `state_id`, `zip_code`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '3467', 'admin', NULL, 'Admin', NULL, NULL, 'admin@gmail.com', NULL, NULL, '$2y$10$QowHn04SUEIx8Lo.kQahTehd1cmYS2NnLkwDlqRARD7bVtpnNg/mi', NULL, '68277ad873cb3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-22 12:55:32', '2025-05-16 12:50:16'),
(65, '2175', NULL, NULL, 'Thaddeus', NULL, 'Duran', 'lenika@mailinator.com', NULL, NULL, '$2y$10$i5bvhQfAmj9KX1a4M7Vwce7SLqPGA0iGM.dJO78LACQoMJWzG.ztK', NULL, '62cdbd84cb0c0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-07-12 13:29:24', '2022-07-12 13:29:24'),
(66, '8320', NULL, NULL, 'Lysandra', NULL, 'Gibbs', 'lysandragibbs@gmail.com', NULL, NULL, '$2y$10$SboQ6kDvpvJRwCwbvBZy4OGQZAs8H8qoGRuu7BgyUiwAUICPE7ve.', NULL, '62cef59a6af35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-07-13 11:40:58', '2022-07-13 11:40:58'),
(67, '8559', NULL, NULL, 'Giselle', NULL, 'Travis', 'viga@mailinator.com', NULL, NULL, '$2y$10$IunWO.kfhE/Ic9CSOd6Swe/6uiJTGMd4fsr5AdYV5UGS4BFez61Ym', NULL, '63090d812c0b2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-08-26 13:14:25', '2022-08-26 13:15:29'),
(68, '8467', NULL, NULL, 'Kirk', NULL, 'Ward', 'tonik@mailinator.com', NULL, NULL, '$2y$10$CSpQd99MClXYPEv5hRziLePixonLMt.mmCbkGaRWH8LMcjnNtgGb.', NULL, '63cf25f6b579e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-01-23 19:27:34', '2023-01-23 19:27:34'),
(70, '3003', NULL, NULL, 'Gillian', NULL, 'Wright', 'dikakijyf@mailinator.com', NULL, NULL, '$2y$10$zqlGi17iHesNGAeeX8fpXu/VSvg6DlF3RgfbFnoE9LMvWKpTNarJ.', NULL, '6528643928570', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-10-12 16:25:13', '2023-10-12 16:25:13'),
(71, '8912', NULL, NULL, 'tyson', 'Raja', 'beckford', 'tysons@gmail.com', NULL, NULL, '$2y$10$luyAQ0kYMoEHjTBDKaXi2eqo/4cdSwuCTZHmwsu9QLDrENv3yzgO.', NULL, '65286f471b684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-10-12 17:12:23', '2025-09-03 16:43:37'),
(72, '6452', NULL, NULL, 'Tyson', NULL, 'Fury', 'fury@gmail.com', NULL, NULL, '$2y$10$XYMTTECCWN.4DRi2RWWoDuDRzM2Xpb/PJhaYOU5UQRLkZQFPWJDqu', NULL, '652d5de65706f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-10-16 10:59:34', '2024-02-02 15:13:35'),
(73, '1279', NULL, NULL, 'Mike', NULL, 'Jordan', 'jordan@gmail.com', NULL, NULL, '$2y$10$8C4mhGMWSzq90WoZebQbvefr2lzVrYrAjiNoqPpTFmJe8KJpfOGm2', NULL, '653bf54112190', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-10-27 17:37:05', '2024-02-02 15:11:51'),
(74, '5203', NULL, NULL, 'Ali', NULL, 'Aly', 'test@yahoo.com', NULL, NULL, '$2y$10$hSdgC/qXFf2oyjBLq0HBJOFOWg7466GPOacdfdpOuHDgoyje1Z/T2', NULL, '6542d9d7d62b0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-11-01 23:05:59', '2023-11-01 23:05:59'),
(75, '8757', NULL, NULL, 'Jhon', NULL, 'Doe', 'test@test.com', NULL, NULL, '$2y$10$vVf00wK.KNWjwFamLRnzHOT5NBrW7X3JpW8dcZkDcRlbuTwbbLKv6', NULL, '65bbbf693314f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-02-01 10:57:29', '2024-02-01 10:57:29'),
(76, '8401', NULL, NULL, 'Jordan', NULL, 'henry', 'henry12@gmail.com', NULL, NULL, '$2y$10$g5JLpHJ9hsPCKWL4cwJxcONcjUGdyQor/y1jqC30ISd1fIqy51XW6', NULL, '65bd2fde41a91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-02-02 13:09:34', '2024-02-02 15:12:10'),
(77, '4463', NULL, NULL, 'Tyrone', NULL, 'Hardy', 'tyrone@gmail.com', NULL, NULL, '$2y$10$Ee48WWiH94mNHyE4pE/RG.QNaNzpTo7QcOMnVHMswQN4R3ByzoORS', NULL, '65c3e60303ce9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-02-07 15:20:19', '2024-02-07 15:20:19'),
(78, '9796', NULL, NULL, 'Irene', NULL, 'Mills', 'jokawaz@mailinator.com', NULL, NULL, '$2y$10$fNvYcADTeDDtcTklj8TK8elzZyxERhboIiy63ChtHrOW5AOZV0yVS', NULL, '67f695629f71b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-09 10:42:26', '2025-04-09 10:42:26'),
(79, '2707', NULL, NULL, 'Grant', NULL, 'Blanchard', 'qoheq@mailinator.com', NULL, NULL, '$2y$10$9rn7UlZvzORAYOuTNxWfYeuATWxmXDMefppBAEKqh6hPgRkVx5oBO', NULL, '67f714caa9ca1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-09 19:46:04', '2025-04-09 19:46:04'),
(80, '6819', NULL, NULL, 'Nathan', NULL, 'Head', 'fujokoba@mailinator.com', NULL, NULL, '$2y$10$Pw0WMy1L4kymU8LD0Z0/mOo0yw8VsOJmk3StcZB8xoNdw5bvO45Ee', NULL, '680a7bde856c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-04-24 12:58:54', '2025-04-24 12:58:54'),
(82, '2497', 'Individual', NULL, 'Keefe', 'Keefe', 'Nash', 'saco@mailinator.com', '+1 (818) 943-4904', NULL, '$2y$10$fq61O0aHgODPpGvDgm4PCurUtkSn/y5dHkR60k1PBcsbJNfIdlq6K', NULL, '68bb08248c31e', '20250905171412.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-09-05 10:56:20', '2025-09-05 12:14:12'),
(83, '3496', 'Company', NULL, 'Deborah', 'Deborah', 'Delgado', 'qavysetef@mailinator.com', '+1 (462) 974-3661', NULL, '$2y$10$Wh4nuTsaGytkxLmblxA2M.LFugyY0q8Da2m9jvZ4oJrOBId6gTu/C', NULL, '68bb19b070928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-09-05 12:11:12', '2025-09-05 12:11:12'),
(95, '1428', 'Company', NULL, 'Jana', 'Jana', 'Gomez', 'janagomez@gmail.com', '+1 (352) 158-2641', NULL, '$2y$10$zhQ30YMhYDYSH/bvuuYHuOeg7EhbksjgY09/etSmoXNnUBNAzR2ha', NULL, '68e6ac5da1123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-08 13:24:29', '2025-10-08 13:24:29'),
(96, '8265', 'Individual', NULL, 'Zachery', 'Zachery', 'Goff', 'xirydakudo@mailinator.com', '+1 (262) 608-8175', NULL, '$2y$10$10l13lTaDXHEtHLbzIM27ukyx.0oP09k3YVwr2q9pNJ1Kk/AE7Dai', NULL, '68f0666d4f679', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-16 09:28:45', '2025-10-16 09:28:45'),
(97, '5952', 'Company', NULL, 'Grace', 'Grace', 'Mcintosh', 'maguvaby@mailinator.com', '+1 (156) 438-3519', NULL, '$2y$10$ONlKNW9p6yWDPuNmWESio.9Gf8ehbtYVALp6jClVyQ7CRARhpnDnW', NULL, '68f066c6e84da', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-16 09:30:15', '2025-10-16 09:30:15'),
(98, '6550', 'Individual', NULL, 'Herry', 'Herry', 'Potter', 'herry@yopmail.com', '1231231234', NULL, '$2y$10$kspYX.YUyti5DaxD0llWN.s86B7OtZaxRp93jWpjgfPmjp.nmbmIS', NULL, '68f1ca7f3f00c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 10:47:59', '2025-10-17 10:47:59'),
(99, '2684', 'app_user', NULL, NULL, 'Shoshana', 'Mcintyre', 'homokajeji@mailinator.com', '+1 (792) 553-9933', NULL, '$2y$10$j4O95wqV41zyuD6Uzg/fjOh5R.C3Q./xvC0nNxT6SNtyRr148KH7e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 11:37:42', '2025-10-17 11:37:42'),
(100, '9772', 'app_user', NULL, NULL, 'Axel', 'Rivas', 'ropevih@mailinator.com', '+1 (826) 991-4521', NULL, '$2y$10$9UDBqHHdanFvPPj7bVsA9e6deIVjOeQZC0JBPZku.3Ls9EfDOVRwu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 14:48:29', '2025-10-17 14:48:29'),
(101, '5452', 'app_user', NULL, NULL, 'Kirby', 'Ortega', 'gajoqymur@mailinator.com', '+1 (607) 936-9249', NULL, '$2y$10$OgF4xlnapkZP0JTcEKuKg.xLlk6TU4vQGdJ2n.aIK/ck2sFLdEo0y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 14:56:55', '2025-10-17 14:56:55'),
(102, '9226', 'app_user', NULL, NULL, 'Owen', 'Brock', 'liwivesu@mailinator.com', '+1 (728) 688-4032', NULL, '$2y$10$S2QUtT0aK.fhsivsY3RMc./zLLEyDvqQAlWUNxi2HKco7L/ECBnTy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:06:24', '2025-10-17 15:06:24'),
(103, '5628', 'app_user', NULL, NULL, 'Amos', 'Hendricks', 'jeluses@mailinator.com', '+1 (285) 503-4806', NULL, '$2y$10$gQDAnkMi6E0bLDnikU.4v.vWNDq8XOP7L3kUidfFzbyFwQx72ybqG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:10:13', '2025-10-17 15:10:13'),
(104, '3264', 'app_user', NULL, NULL, 'Eaton', 'Giles', 'lajef@mailinator.com', '+1 (716) 492-5706', NULL, '$2y$10$wu7d8W/fmBA.Cm.QSAHbueJ7ZOIZgjSLH5QPfnZH7FRTV9MM8Qimq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:13:45', '2025-10-17 15:13:45'),
(105, '6772', 'app_user', NULL, NULL, 'Richard', 'Woods', 'qecycekoli@mailinator.com', '+1 (884) 485-7176', NULL, '$2y$10$KkD1qygTz4qeZcwPZXjYMeMLmkdyeRK6ZaZGyS2e8SSv2SarHbPb.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:16:12', '2025-10-17 15:16:12'),
(106, '2490', 'app_user', NULL, NULL, 'Inga', 'Snow', 'rydac@mailinator.com', '+1 (814) 965-3016', NULL, '$2y$10$l6OKZl2uB76NnY4Fyr0zr.xNb0cHXR2n8Ls9PQo3JCxUiPzmnzgru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:18:31', '2025-10-17 15:18:31'),
(107, '3379', 'app_user', NULL, NULL, 'Nissim', 'Jacobs', 'natumo@mailinator.com', '+1 (168) 506-1923', NULL, '$2y$10$UwX2jPgskLnp7vJKoUvV4uOSHww7A1z.pWtwFRsRNoObPl89yAivG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:21:18', '2025-10-17 15:21:18'),
(108, '6328', 'app_user', NULL, NULL, 'Hop', 'Knight', 'vyvojivuf@mailinator.com', '+1 (779) 189-2972', NULL, '$2y$10$UKAgkZ2fDtRb12FbO0ILheTPO.lLEVgKfKTZH3NqDrJjmX7Pm0uPC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:24:49', '2025-10-17 15:24:49'),
(109, '5040', 'app_user', NULL, NULL, 'Kadeem', 'Banks', 'pedigedyj@mailinator.com', '+1 (976) 851-9094', NULL, '$2y$10$4Ri9hJfV6ZTIgGYfoXvIK.gersMxYI3Z/B/hcGRvD4tLW32ZvFQfe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:30:14', '2025-10-17 15:30:14'),
(110, '7066', 'app_user', NULL, NULL, 'Brenden', 'Stephenson', 'puhonuny@mailinator.com', '+1 (727) 854-4814', NULL, '$2y$10$.tKx7pD3HZPjlpYEz.j.XOtuDus0ZPgkWJwpCct1uoZ0t3pKioTzG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:49:04', '2025-10-17 15:49:04'),
(111, '2971', 'app_user', NULL, NULL, 'Alden', 'Dudley', 'mija@mailinator.com', '+1 (836) 234-6071', NULL, '$2y$10$ZPEqvIVzsSkQywOVcDidJ.5VVSOQJyjgcl1Pc4nnOZzpzknySE5rO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:52:45', '2025-10-17 15:52:45'),
(112, '4479', 'app_user', NULL, NULL, 'Hilary', 'Hardy', 'buruvyzyp@mailinator.com', '+1 (417) 623-6936', NULL, '$2y$10$vrdMxnOBpbgsvmVpJ002M.R81UqveoDqSuo3.56vNRkUdLtDKFugW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-17 15:57:56', '2025-10-17 15:57:56'),
(113, '8892', 'app_user', NULL, NULL, 'Gavin', 'Bauer', 'lyrogad@mailinator.com', '+1 (995) 739-8246', NULL, '$2y$10$FkKkwzz30Bmh/1SoIvxzxO.UweSzlntVUIU6To5e6MKkmGHxJFBcq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 09:12:19', '2025-10-18 09:12:19'),
(114, '3502', 'app_user', NULL, NULL, 'Solomon', 'Hanson', 'ceve@mailinator.com', '+1 (751) 351-1917', NULL, '$2y$10$xUUHKpXmuP69NKJPhxN2SOQUGVPbxZG2aTC58FXSybxJ4E//ezraG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 09:13:00', '2025-10-18 09:13:00'),
(115, '7868', 'app_user', NULL, NULL, 'Larissa', 'Fulton', 'ropoqypiwy@mailinator.com', '+1 (549) 881-4079', NULL, '$2y$10$GlSMCQcp.Qv.WXFGTjPrdu1zy6bfMREx./rSdOadAYrLs6aozS6h6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 09:14:43', '2025-10-18 09:14:43'),
(116, '2783', 'app_user', NULL, NULL, 'Davis', 'Schultz', 'vojucu@mailinator.com', '+1 (223) 202-5115', NULL, '$2y$10$O5Px7tTirnd.tTtiP9HP.OUGgvq/p634gaBrcLsIumc9fXci0XrPe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 09:15:48', '2025-10-18 09:15:48'),
(117, '1173', 'app_user', NULL, NULL, 'Zahir', 'Terry', 'ryxy@mailinator.com', '+1 (863) 704-4773', NULL, '$2y$10$diXJiMFbGxF9TjdYq8etwuEAThzR53GMkUa00KQDlrRIAztP2scYi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 09:30:31', '2025-10-18 09:30:31'),
(118, '6650', 'app_user', NULL, NULL, 'Zachery', 'York', 'kyfu@mailinator.com', '+1 (938) 171-8305', NULL, '$2y$10$s/nGI96WC4sFZxbbMCY17.BOFW8RDGSamSViyEQD78gwOo0ATr0pe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 09:51:54', '2025-10-18 09:51:54'),
(119, '1812', 'app_user', NULL, NULL, 'Tamekah', 'Baxter', 'gycicyhi@mailinator.com', '+1 (221) 108-9074', NULL, '$2y$10$YACZjcfJZ0d3z.MBffv/8emNo.85oMBYYQoGAhuPrplx.hXoGqAgy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:00:35', '2025-10-18 10:00:35'),
(120, '4895', 'app_user', NULL, NULL, 'Eric', 'Fields', 'tipelet@mailinator.com', '+1 (766) 838-2289', NULL, '$2y$10$OAY7WOxZZybyWhgiBZ0td.TXNyQunH5iKTZzHI/ASdXkb8mSTEKhC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:04:18', '2025-10-18 10:04:18'),
(121, '1283', 'app_user', NULL, NULL, 'Charissa', 'Baxter', 'fuvusar@mailinator.com', '+1 (436) 464-4145', NULL, '$2y$10$j.JfVDhdIc8w3Gv3Hd4t7Oz/n2Wamk5FhQcfsvmoesWskn7dcvYCG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:09:18', '2025-10-18 10:09:18'),
(122, '5413', 'app_user', NULL, NULL, 'Kiayada', 'Crawford', 'dukul@mailinator.com', '+1 (438) 818-4517', NULL, '$2y$10$ELRHjWlLwveOqIPVgTo8N.cFwZ86z0Lip5mWeAXvynS22865TFZL6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:13:16', '2025-10-18 10:13:16'),
(123, '2296', 'app_user', NULL, NULL, 'Mufutau', 'Saunders', 'kudejywec@mailinator.com', '+1 (361) 901-7101', NULL, '$2y$10$FbJWwLMyTgRYRSmRppvvWO4u5QsU9MaubkPvKBO/m40YZOXaibp2m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:15:58', '2025-10-18 10:15:58'),
(124, '9487', 'app_user', NULL, NULL, 'Trevor', 'Ryan', 'hiceku@mailinator.com', '+1 (235) 359-5806', NULL, '$2y$10$PXvHZHILOjOgqIr.gvdCkeLbd1xmTE4OI62d5on16kzn/6hLArhSu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:18:02', '2025-10-18 10:18:02'),
(125, '6879', 'app_user', NULL, NULL, 'Raya', 'Savage', 'forok@mailinator.com', '+1 (167) 665-4581', NULL, '$2y$10$QqaCf8mWduaIE.YDA6ZUI.qNJFXsHcQx4A0eXxe7iAKolptL60ngq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:21:09', '2025-10-18 10:21:09'),
(126, '9014', 'app_user', NULL, NULL, 'Brianna', 'Lawrence', 'vunaga@mailinator.com', '+1 (458) 563-5082', NULL, '$2y$10$IzDuURuZe2G1GG.Oi6flVutYMG5wbUTV0rfvADzZqAV4OiJjiAUCy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-18 10:26:50', '2025-10-18 10:26:50'),
(127, '6321', 'app_user', NULL, NULL, 'Gay', 'Bennett', 'duhanaler@mailinator.com', '+1 (741) 512-7866', NULL, '$2y$10$UgSi8WCwgfFZXgw8GiL7YeWIjclI6jLpX5Q9Fb/GTPl9AAXhPvbM6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 08:55:42', '2025-10-21 08:55:42'),
(128, '9223', 'app_user', NULL, NULL, 'Chaney', 'Myers', 'gesimuvoj@mailinator.com', '+1 (716) 327-8831', NULL, '$2y$10$TqkGT1V1cQk66U6JVUos0OU/V4RcXLi5W15Wx.CJdjSGZgW3wPL5y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 09:11:10', '2025-10-21 09:11:10'),
(129, '7933', 'app_user', NULL, NULL, 'Nissim', 'Campbell', 'qodura@mailinator.com', '+1 (516) 805-6346', NULL, '$2y$10$/bfeIVwVihvse3.RcJIbJeyxTaGcLTrJ79T4gMtYqzGWHNYLaQTDm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 09:17:52', '2025-10-21 09:17:52'),
(130, '8873', 'app_user', NULL, NULL, 'Breanna', 'Jacobs', 'lyna@mailinator.com', '+1 (873) 913-6776', NULL, '$2y$10$/O4L9.gh3ezGqhJzlFHQTuGnsxmJgvVgIRNLo8k13rtrZqkuJS.Au', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 09:38:09', '2025-10-21 09:38:09'),
(131, '7368', 'app_user', NULL, NULL, 'Amber', 'Dyer', 'synysoj@mailinator.com', '+1 (312) 437-3526', NULL, '$2y$10$0Aw8DWiS2JEuSdG/tFBWeOZ2FdiLAlo3VlkoLB0OIgmm/WrcqtJge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 11:41:17', '2025-10-21 11:41:17'),
(132, '9058', 'app_user', NULL, NULL, 'Arden', 'Sloan', 'melokit@mailinator.com', '+1 (644) 905-5269', NULL, '$2y$10$oc1CKH7J3ILKaeqCn0qrFOT3tgUFmNSN9A2icfmN5vqyBG/FbH0V2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 11:46:46', '2025-10-21 11:46:46'),
(133, '5829', 'app_user', NULL, NULL, 'Duncan', 'Mcfadden', 'ficazeni@mailinator.com', '+1 (464) 168-2166', NULL, '$2y$10$vYe.MKzSRmdYiQ93g1TKJelfTPUkmFDj9v33IRWjrIYA6/94NMvuO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 11:49:26', '2025-10-21 11:49:26'),
(134, '3494', 'app_user', NULL, NULL, 'Josephine', 'Mendez', 'production8421@gmail.com', '+1 (178) 486-7893', NULL, '$2y$10$XNgos15P9xm2E75H6WBkWevDh1gt/DHlYmwH/r0J8V7YUCZYcmhNq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2025-10-21 13:45:00', '2025-10-21 13:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_card_designs`
--

CREATE TABLE `user_business_card_designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_card_id` bigint(20) UNSIGNED NOT NULL,
  `design_name` varchar(255) NOT NULL,
  `front_design_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`front_design_data`)),
  `back_design_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`back_design_data`)),
  `preview_image` varchar(255) DEFAULT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `last_modified` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive,1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `created_by`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Best Birthday Ever! Truffle Cake Pops - 6 pack', '1', NULL, '2025-04-17 18:58:41', '2025-04-17 18:58:41'),
(2, 1, 'Best Birthday Ever! Truffle Cake Pops - 12 pack', '1', NULL, '2025-04-17 18:58:56', '2025-04-17 18:58:56'),
(3, 1, 'CHERYLS SIGNATURE BAKERY SAMPLER - MEDIUM', '1', NULL, '2025-04-17 18:59:43', '2025-04-17 18:59:43'),
(4, 1, 'CHERYLS SIGNATURE BAKERY SAMPLER - GRAND', '1', NULL, '2025-04-17 18:59:56', '2025-04-17 18:59:56'),
(5, 1, 'Half Dozen', '1', NULL, '2025-04-17 19:00:54', '2025-04-17 19:00:54'),
(6, 1, 'Full Dozen', '1', NULL, '2025-04-17 19:01:09', '2025-04-17 19:01:09'),
(7, 1, 'Two Dozen', '1', NULL, '2025-04-17 19:01:21', '2025-04-17 19:01:21'),
(8, 1, 'Magical Unicorn Truffle Cake Pops - 6 ct', '1', NULL, '2025-04-17 19:01:56', '2025-04-17 19:01:56'),
(9, 1, 'OptionsMagical Unicorn Truffle Cake Pops - 12ct', '1', NULL, '2025-04-17 19:02:07', '2025-04-17 19:02:07'),
(10, 1, 'Signature Bundt Cake Assortment™', '1', NULL, '2025-04-17 19:02:44', '2025-04-17 19:02:44'),
(11, 1, 'Signature Bundt Cake Assortment™ with 6ct Gourmet Drizzled Strawberries', '1', NULL, '2025-04-17 19:02:59', '2025-04-17 19:02:59'),
(12, 1, 'Signature Bundt Cake Assortment™ with 12ct Gourmet Drizzled Strawberries', '1', NULL, '2025-04-17 19:03:12', '2025-04-17 19:03:12'),
(13, 1, '4\" Cake with 6ct Birthday Strawberries', '1', NULL, '2025-04-17 19:04:16', '2025-04-17 19:04:16'),
(14, 1, '4\" Cake with 12ct Birthday Strawberries', '1', NULL, '2025-04-17 19:04:46', '2025-04-17 19:04:46'),
(15, 1, 'Bouquet Only', '1', NULL, '2025-04-17 19:05:44', '2025-04-17 19:05:44'),
(16, 1, 'Double Bouquet Only', '1', NULL, '2025-04-17 19:06:00', '2025-04-17 19:06:00'),
(17, 1, 'with Clear Vase', '1', NULL, '2025-04-17 19:06:13', '2025-04-17 19:06:13'),
(18, 1, 'with Pink Vase & Candle', '1', NULL, '2025-04-17 19:06:28', '2025-04-17 19:06:28'),
(19, 1, 'with Pink Vase', '1', NULL, '2025-04-17 19:06:42', '2025-04-17 19:06:42'),
(20, 1, 'Double Bouquet with Clear Vase', '1', NULL, '2025-04-17 19:06:55', '2025-04-17 19:06:55'),
(21, 1, 'Double Bouquet with Pink Vase', '1', NULL, '2025-04-17 19:07:06', '2025-04-17 19:07:06'),
(22, 1, 'Double Bouquet with Pink Vase & Candle', '1', NULL, '2025-04-17 19:07:21', '2025-04-17 19:07:21'),
(23, 1, '12 Stems Bouquet Only', '1', NULL, '2025-04-17 19:11:19', '2025-04-17 19:11:19'),
(24, 1, '12 Stems with Clear Vase', '1', NULL, '2025-04-17 19:11:31', '2025-04-17 19:11:31'),
(25, 1, '12 Stems with Pink Vase', '1', NULL, '2025-04-17 19:11:54', '2025-04-17 19:11:54'),
(26, 1, '12 Stems with Pink Vase & Sign', '1', NULL, '2025-04-17 19:12:11', '2025-04-17 19:12:11'),
(27, 1, '24 Stems Bouquet Only', '1', NULL, '2025-04-17 19:12:21', '2025-04-17 19:12:21'),
(28, 1, '24 Stems with Clear Vase', '1', NULL, '2025-04-17 19:12:33', '2025-04-17 19:12:33'),
(29, 1, '24 Stems with French Flower Pail', '1', NULL, '2025-04-17 19:12:45', '2025-04-17 19:12:45'),
(30, 1, '24 Stems with French Flower Pail & Sign', '1', NULL, '2025-04-17 19:13:00', '2025-04-17 19:13:00'),
(31, 1, '24 Stems with Clear Vase & Bear', '1', NULL, '2025-04-17 19:19:31', '2025-04-17 19:20:48'),
(32, 1, '24 Stems with Clear Vase, Bear & Chocolate', '1', NULL, '2025-04-17 19:23:53', '2025-04-17 19:23:53'),
(33, 1, 'Delightful Daisy Treat™', '1', NULL, '2025-04-17 19:25:10', '2025-04-17 19:25:10'),
(34, 1, 'Delightful Daisy Treat™ Dipped', '1', NULL, '2025-04-17 19:25:21', '2025-04-17 19:25:21'),
(35, 1, 'Delightful Daisy Treat™ with 12ct Strawberries', '1', NULL, '2025-04-17 19:25:32', '2025-04-17 19:25:32'),
(36, 1, 'Delightful Daisy Treat™ Dipped with 12ct Strawberries', '1', NULL, '2025-04-17 19:25:43', '2025-04-17 19:25:43'),
(37, 1, 'Single Tray', '1', NULL, '2025-04-17 19:26:32', '2025-04-17 19:26:32'),
(38, 1, 'Double Tray', '1', NULL, '2025-04-17 19:26:44', '2025-04-17 19:26:44'),
(39, 1, 'Distinctive Fruit Basket & Sweets Gift', '1', NULL, '2025-04-17 19:27:49', '2025-04-17 19:27:49'),
(40, 1, 'Distinctive Fruit Basket & Sweets Gift Deluxe', '1', NULL, '2025-04-17 19:28:09', '2025-04-17 19:28:09'),
(41, 1, 'Distinctive Fruit Basket & Sweets Gift Grande', '1', NULL, '2025-04-17 19:28:20', '2025-04-17 19:28:20'),
(42, 1, 'Lucca & Sons™ Deluxe Gift', '1', NULL, '2025-04-17 19:28:54', '2025-04-17 19:28:54'),
(43, 1, 'Lucca & Sons™ Grande Gift', '1', NULL, '2025-04-17 19:29:05', '2025-04-17 19:29:05'),
(44, 1, 'Small', '1', NULL, '2025-04-17 19:29:41', '2025-04-17 19:29:41'),
(45, 1, 'Small with Suncatcher', '1', NULL, '2025-04-17 19:29:57', '2025-04-17 19:29:57'),
(46, 1, 'Large', '1', NULL, '2025-04-17 19:30:08', '2025-04-17 19:30:08'),
(47, 1, 'Large with Suncatcher', '1', NULL, '2025-04-17 19:30:24', '2025-04-17 19:30:24'),
(48, 1, 'Small with Candle', '1', NULL, '2025-04-17 19:30:55', '2025-04-17 19:30:55'),
(49, 1, 'Medium', '1', NULL, '2025-04-17 19:31:07', '2025-04-17 19:31:07'),
(50, 1, 'Medium with Candle', '1', NULL, '2025-04-17 19:31:22', '2025-04-17 19:31:22'),
(51, 1, 'Large with Candle', '1', NULL, '2025-04-17 19:31:33', '2025-04-17 19:31:33'),
(52, 1, 'Small Thank You Rose', '1', NULL, '2025-04-17 19:32:37', '2025-04-17 19:32:37'),
(53, 1, 'Small Thank You Rose with Cookies', '1', NULL, '2025-04-17 19:32:51', '2025-04-17 19:32:51'),
(54, 1, 'Large Thank You Rose', '1', NULL, '2025-04-17 19:33:04', '2025-04-17 19:33:04'),
(55, 1, 'Large Thank You Rose with Cookies', '1', NULL, '2025-04-17 19:33:18', '2025-04-17 19:33:18'),
(56, 1, 'Charcoal Journal', '1', NULL, '2025-04-17 19:34:03', '2025-04-17 19:34:03'),
(57, 1, 'Teal Journal', '1', NULL, '2025-04-17 19:34:16', '2025-04-17 19:34:16'),
(58, 1, '12 Stems with Clear Vase & Bear', '1', NULL, '2025-04-21 13:24:28', '2025-04-21 13:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `created_by`, `title`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'We Make It Personal', 'Every gift, card, and message is tailored to your recipients — no generic boxes or bulk messaging here.', '20250605235145.png', '1', NULL, '2025-06-05 18:51:45', '2025-06-05 18:51:45'),
(2, 1, 'We Save You Time', 'You provide the names and dates — we handle the cards, reminders, packaging, and delivery. Set it and forget it.', '20250605235242.png', '1', NULL, '2025-06-05 18:52:42', '2025-06-05 18:52:42'),
(3, 1, 'We Scale With You', 'Whether you’re a team of 5 or 5,000, our flexible plans and CRM tools grow with your business.', '20250606152947.jpg', '1', NULL, '2025-06-05 18:54:04', '2025-06-06 10:29:47'),
(4, 1, 'We Work With the Best', 'Our exclusive partnerships with brands like 1-800-Flowers, Hallmark, Amazon, Booking.com, and more ensure quality and dependability.', '20250606153210.png', '1', NULL, '2025-06-05 18:56:09', '2025-06-06 10:32:10'),
(5, 1, 'We Help You Stand Out', 'Showing appreciation isn’t just kind — it’s smart. Our clients report higher employee retention, increased referrals, and happier work cultures.', '20250606153324.png', '1', NULL, '2025-06-05 18:59:36', '2025-06-06 10:33:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_cards`
--
ALTER TABLE `business_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_cards_user_id_foreign` (`user_id`),
  ADD KEY `business_cards_template_id_foreign` (`template_id`);

--
-- Indexes for table `business_card_categories`
--
ALTER TABLE `business_card_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_card_elements`
--
ALTER TABLE `business_card_elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_card_elements_template_id_foreign` (`template_id`);

--
-- Indexes for table `business_card_options`
--
ALTER TABLE `business_card_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_card_options_option_type_is_active_index` (`option_type`,`is_active`);

--
-- Indexes for table `business_card_orders`
--
ALTER TABLE `business_card_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_card_orders_order_number_unique` (`order_number`),
  ADD KEY `business_card_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `business_card_templates`
--
ALTER TABLE `business_card_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `career_applications_career_id_foreign` (`career_id`);

--
-- Indexes for table `career_categories`
--
ALTER TABLE `career_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_admin_user_id_foreign` (`admin_user_id`);

--
-- Indexes for table `company_employees`
--
ALTER TABLE `company_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_employees_company_id_email_unique` (`company_id`,`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `occasions_user_id_foreign` (`user_id`),
  ADD KEY `occasions_company_id_foreign` (`company_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_types`
--
ALTER TABLE `travel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_business_card_designs`
--
ALTER TABLE `user_business_card_designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_business_card_designs_user_id_foreign` (`user_id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `business_cards`
--
ALTER TABLE `business_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `business_card_categories`
--
ALTER TABLE `business_card_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_card_elements`
--
ALTER TABLE `business_card_elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `business_card_options`
--
ALTER TABLE `business_card_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_card_orders`
--
ALTER TABLE `business_card_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `business_card_templates`
--
ALTER TABLE `business_card_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `career_applications`
--
ALTER TABLE `career_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `career_categories`
--
ALTER TABLE `career_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_employees`
--
ALTER TABLE `company_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `travel_types`
--
ALTER TABLE `travel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `user_business_card_designs`
--
ALTER TABLE `user_business_card_designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_cards`
--
ALTER TABLE `business_cards`
  ADD CONSTRAINT `business_cards_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `business_card_templates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `business_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `business_card_elements`
--
ALTER TABLE `business_card_elements`
  ADD CONSTRAINT `business_card_elements_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `business_card_templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `business_card_orders`
--
ALTER TABLE `business_card_orders`
  ADD CONSTRAINT `business_card_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD CONSTRAINT `career_applications_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_admin_user_id_foreign` FOREIGN KEY (`admin_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_employees`
--
ALTER TABLE `company_employees`
  ADD CONSTRAINT `company_employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `occasions`
--
ALTER TABLE `occasions`
  ADD CONSTRAINT `occasions_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `occasions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_business_card_designs`
--
ALTER TABLE `user_business_card_designs`
  ADD CONSTRAINT `user_business_card_designs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
