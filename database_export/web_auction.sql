-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2022 at 12:14 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Books', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(2, 'Clothes', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(3, 'Art', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(4, 'Cars', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(5, 'Music', '2022-02-21 16:11:18', '2022-02-21 16:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'City Express', '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(2, 'Post Express', '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(3, 'Daily Express', '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(4, 'Personal', '2022-02-21 16:11:20', '2022-02-21 16:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_item`
--

CREATE TABLE `delivery_item` (
  `id` bigint UNSIGNED NOT NULL,
  `delivery_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_item`
--

INSERT INTO `delivery_item` (`id`, `delivery_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 4, 25, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(2, 1, 25, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(3, 2, 24, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(4, 1, 24, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(5, 3, 23, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(6, 1, 23, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(7, 2, 22, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(8, 4, 22, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(9, 4, 21, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(10, 2, 21, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(11, 2, 20, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(12, 1, 20, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(13, 2, 19, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(14, 3, 19, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(15, 1, 18, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(16, 2, 18, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(17, 3, 17, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(18, 1, 17, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(19, 4, 16, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(20, 3, 16, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(21, 4, 15, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(22, 3, 15, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(23, 2, 13, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(24, 4, 13, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(25, 2, 14, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(26, 4, 14, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(27, 4, 1, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(28, 2, 1, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(29, 4, 12, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(30, 2, 12, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(31, 2, 11, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(32, 3, 11, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(33, 4, 10, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(34, 1, 10, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(35, 2, 9, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(36, 3, 9, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(37, 4, 8, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(38, 1, 8, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(39, 2, 7, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(40, 1, 7, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(41, 1, 6, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(42, 2, 6, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(43, 1, 5, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(44, 3, 5, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(45, 3, 4, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(46, 4, 4, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(47, 4, 3, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(48, 3, 3, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(49, 1, 2, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(50, 4, 2, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(51, 2, 26, '2022-02-21 16:18:38', '2022-02-21 16:18:38'),
(52, 2, 27, '2022-02-21 20:08:01', '2022-02-21 20:08:01'),
(53, 3, 28, '2022-02-21 20:12:50', '2022-02-21 20:12:50'),
(54, 2, 29, '2022-02-21 20:33:55', '2022-02-21 20:33:55'),
(55, 3, 30, '2022-02-21 21:01:11', '2022-02-21 21:01:11'),
(56, 3, 31, '2022-02-22 08:26:55', '2022-02-22 08:26:55'),
(57, 2, 32, '2022-02-22 08:31:54', '2022-02-22 08:31:54');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 'images/S38McR5ritSK4QQEYDtruERpF10qiP4X0l8pMB4n.png', 31, '2022-02-22 08:26:55', '2022-02-22 08:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `buyer_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_price` int NOT NULL,
  `final_price` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `category_id` bigint UNSIGNED NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `buyer_id`, `name`, `description`, `starting_price`, `final_price`, `status`, `category_id`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, 'Repellat', 'Omnis consequatur ea asperiores quia eum aut. Qui accusantium et omnis ex ipsum. Consectetur sunt ut eligendi blanditiis provident quisquam. Fugiat ab voluptas voluptatem recusandae. Omnis ipsa magni aut qui sapiente. Aut ducimus rerum eum quidem. Hic veritatis qui accusantium dolorum ipsa veniam in. Aut est odio laudantium possimus provident id est. Ducimus sit cupiditate in voluptatem et debitis. Repellat repudiandae laboriosam et voluptatibus velit aspernatur ea. Sunt repellendus inventore consectetur eos praesentium. Eos mollitia assumenda assumenda quis voluptatem. Aut laboriosam sunt dicta consectetur ipsa. Similique praesentium sed perferendis. Sunt culpa sed minima qui quia autem. Similique praesentium necessitatibus non voluptate tempore nulla. Velit deleniti incidunt voluptas molestiae. Qui sit beatae pariatur veritatis sit. Dolor soluta sed accusantium qui repellat quo vel ex.', 229701, NULL, 'active', 1, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(2, 7, NULL, 'Molestiae', 'Consequatur nesciunt error accusantium beatae totam. Consequatur officiis dignissimos velit vitae et. Dicta ex ratione amet et consequatur architecto. Provident possimus cupiditate non repellat. Dignissimos autem accusantium voluptas. Sequi dolores minima labore explicabo aspernatur ad quia. Ea laboriosam aut recusandae et. Sunt qui magni magnam laboriosam dolorem iste quia. Libero vel provident qui ducimus omnis. Voluptates nesciunt dolorem odio quia est asperiores id. Mollitia incidunt adipisci quod quia pariatur. Reprehenderit voluptatem omnis velit. Voluptatibus eos accusamus itaque itaque ipsa molestias. Consequatur dolores alias non possimus pariatur. Fuga doloremque maiores cumque modi illum tempora nihil. Inventore temporibus quia aut cum architecto. Aut soluta commodi dolores veniam et occaecati. At molestiae doloribus autem qui enim nisi dolorem. Sed labore inventore soluta sunt.', 293494, NULL, 'active', 1, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(3, 6, NULL, 'Voluptatibus', 'Facilis ipsam ducimus maxime. Dignissimos ut nihil deserunt quae tenetur et. Quis molestiae officiis quo facere impedit laudantium perspiciatis. Voluptatibus alias incidunt maxime sint non consequatur corrupti. Et voluptatem a sint necessitatibus tempore labore sunt. Dicta quibusdam omnis debitis consectetur. Amet deserunt nulla excepturi facere totam. Non iste porro et quasi placeat aut vel. Ut et nisi magnam minima. Id dolorum omnis nostrum incidunt itaque. Hic error facere eveniet illo qui sequi pariatur. Illo cum quasi error eos. Saepe aperiam voluptatem quisquam asperiores in quibusdam laudantium. Debitis dolor dolorem eligendi aut. Fugiat doloribus quo ut eaque. Unde tempora cum unde tempora cupiditate tempore incidunt. Rerum ea ratione repellat. Non omnis qui est ut dolor et sint. Dolores non culpa porro magnam. Quis id non tenetur enim deserunt. Voluptates voluptatem iste explicabo non et in.', 800707, NULL, 'active', 1, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(4, 10, NULL, 'Corporis', 'Debitis rerum omnis veritatis corrupti dolorem. Veniam molestias quo ratione ea autem iusto. Quaerat nulla minima quae qui aspernatur accusamus repellendus fugit. Atque dolorem quas veniam hic officia. Placeat ut voluptatum in necessitatibus laborum tempora. Doloremque nam cumque ex nulla. Deserunt aut labore consequatur fuga enim a et. Et maiores ea dolorum adipisci maxime necessitatibus laborum laboriosam. Perferendis asperiores nulla et saepe. Sed pariatur fugit dolorem necessitatibus deleniti voluptatibus. Libero et veritatis sint officia nam non labore. Laboriosam est sunt adipisci. Velit dignissimos nam nesciunt dolores dolorem asperiores voluptatibus nemo. Qui soluta iure ipsa numquam quia consequatur. Vitae velit tenetur possimus inventore repellendus beatae qui. Ut ad sit voluptatem. Voluptatem consequatur dicta fugit aut temporibus quo.', 576510, NULL, 'active', 1, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(5, 8, 4, 'At', 'Ut autem distinctio non sint est. Illo voluptas voluptas ut fuga quos aut. Dolor dolores accusamus quis et quia sit est. Eum qui provident labore pariatur placeat illo nesciunt ea. Aut sequi pariatur minus nemo sapiente et labore inventore. Labore id quia voluptatem et. Expedita commodi sint et quod repellat sed. Dolorem aperiam modi doloribus nihil impedit. Fugit molestiae et voluptatibus quae architecto officia quam. Et ut sint ab maxime ut in. Ullam sit maiores voluptatem ipsam possimus. Quasi fugit asperiores eaque quis omnis. Mollitia est dolor commodi similique excepturi perferendis asperiores. Aut omnis iste quod atque ea officia dolorem molestiae. Iure rerum aut vero voluptas asperiores cupiditate. Non cumque ipsam dignissimos omnis. Saepe accusamus ipsa culpa aut aut maxime eaque. Qui sit ullam assumenda laboriosam aspernatur illo. Et fuga libero esse saepe. Labore ut ullam et sed corporis. Hic numquam labore quia mollitia est repellat voluptas et.', 240407, 845222, 'sold', 1, '2022-02-21 16:11:18', '2022-02-11 16:11:18', '2022-02-21 20:32:00'),
(6, 1, NULL, 'Corporis', 'Voluptas facere aut voluptas consequatur nisi sed qui. Rerum praesentium cum vero ab voluptatem. Est culpa quo qui omnis. Nisi sapiente recusandae sed totam rem praesentium. Enim ipsa fugiat officia nihil sunt quia. Aut sit nesciunt tempore velit enim. Odio repudiandae voluptatum praesentium omnis. Temporibus quisquam molestiae porro non placeat minus. Id adipisci quia ab dolore illo et quis. Consequatur velit earum qui. Illo sunt aliquid fugit voluptate commodi. Modi nihil dolores ullam quia. Provident voluptatem soluta qui debitis non pariatur. Sed eum vel illo quia. Aut sed consectetur repellat ad explicabo dolorum hic. Assumenda beatae eveniet aliquid mollitia voluptas nihil temporibus. Porro cupiditate ipsum velit aspernatur qui. Eos sint et est quam explicabo molestiae necessitatibus mollitia. A in et sit magnam eum eius et. Corporis nobis consequatur nemo vel id consequatur.', 67812, NULL, 'active', 2, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(7, 9, NULL, 'Quisquam', 'Ad ducimus qui aut. Aliquam praesentium quam odio consectetur sint deserunt labore adipisci. Aut saepe quas eum rerum voluptatem. Culpa voluptates quo odit. Tempore unde possimus nemo aut sint. Possimus sint ex consequatur molestiae eos ex. Velit aliquam molestias quis tenetur quaerat esse. Suscipit unde aspernatur nostrum. Ipsa cum praesentium atque illum et veritatis. Voluptatem odit iusto aliquid voluptates. Non sed omnis ad qui ut doloremque a. Perspiciatis molestias et libero veritatis impedit. Dolorem quis accusantium debitis maxime numquam corporis. Aut necessitatibus veritatis iste inventore voluptatem recusandae hic. Voluptas quis vitae sed error beatae quia nemo cumque. In et temporibus saepe maiores et velit tempora. Quis molestiae iusto quaerat eum incidunt quo commodi vero. Suscipit rerum eos aut officiis nisi. Ut saepe amet quia. Magnam dolorem quisquam hic soluta commodi. Voluptatem nostrum natus porro aut.', 638862, NULL, 'active', 2, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(8, 4, NULL, 'Nihil', 'Placeat eos amet sint voluptatem iure et. Aperiam sed enim eligendi tempora voluptatem voluptates accusantium. Repellat mollitia ipsa impedit. Sit velit nisi est voluptate. Autem nisi quod aut suscipit. Fugit est inventore voluptatum dolores eos alias facilis. Ipsa cupiditate tenetur et odit totam qui. Quam odio quisquam excepturi architecto. Quia similique maiores expedita numquam laboriosam possimus. Ex ipsa sed sed aut natus. Quod necessitatibus optio cupiditate ut necessitatibus ut sint. In consequuntur dolorum inventore ut eaque. Cum repellendus consequuntur quis eligendi doloribus. Ut amet qui saepe laborum. Est explicabo voluptas consequatur ipsum inventore dolores quae. Nihil eligendi rerum perferendis necessitatibus natus itaque aliquid. Et tempore dolores consequuntur sint repudiandae. Beatae maxime dolores dignissimos laborum ab. Ullam porro ut cumque porro vero nostrum.', 790478, NULL, 'active', 2, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(9, 10, 1, 'Maiores', 'Assumenda eum quis facilis. Dignissimos maiores vero exercitationem non est modi ipsum. Similique numquam nisi quia at perferendis odio ea. Placeat possimus sed nobis occaecati. Sequi perspiciatis aut voluptatum repudiandae. Reiciendis et occaecati omnis iusto beatae. Ut sunt possimus quas. Voluptas illo est eligendi molestiae vitae maxime. Eligendi illo sint maiores est eum accusamus natus ut. Occaecati velit corrupti quis est laboriosam aut quia. Eveniet eaque sint consequatur quia est et aliquid. Voluptatem vel nihil corrupti numquam. Quos harum pariatur debitis omnis repellendus. Molestiae incidunt ad laborum velit omnis magnam. Qui aut corrupti dignissimos molestias dolores quibusdam numquam. Enim est tempore unde odit mollitia. Nemo dolores sunt veniam officia laborum ut. Expedita quam voluptatem iusto provident qui. Exercitationem et porro excepturi autem commodi nemo veritatis provident.', 689536, 845663, 'sold', 2, '2022-02-21 16:11:18', '2022-02-11 16:11:18', '2022-02-11 16:11:18'),
(10, 4, NULL, 'Ratione', 'Cumque et quo eveniet ipsa ea. Occaecati qui sit sint ad ducimus doloribus culpa. Necessitatibus voluptas recusandae aliquam est. Et soluta eius eligendi hic et. Nobis voluptatibus officiis ut. Quod id autem cum laudantium. Quisquam enim consequatur quis incidunt veniam. Dolore rerum qui sunt qui autem optio provident. Qui sit et laboriosam dolor reprehenderit dolorem omnis. Provident unde voluptas voluptatibus est. Voluptatem itaque dignissimos ut. Eos ipsum delectus maiores suscipit adipisci maxime. Recusandae vel maiores molestiae aut asperiores et. Quibusdam deserunt veniam sit non recusandae est et. Illum ea eum delectus quia consequuntur veniam. Exercitationem est consequatur dolore tempora. Ratione qui illo qui voluptatem. Maiores culpa aut facere dolorem ut velit. Minima qui exercitationem rerum ipsa.', 658058, NULL, 'active', 2, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(11, 6, 11, 'Sed', 'Id non eligendi nihil nam quia est. Dignissimos fugiat est doloremque. Consequatur amet dolorem minus voluptas voluptatem cum. In nemo ad eos dolor. Laudantium quia quo voluptas et. Ea suscipit nostrum ab dolorum. Culpa id ut enim totam. A aut possimus hic voluptatibus qui ut dolorum velit. Ut nobis ullam ea sed ratione optio. Facilis dolorem suscipit velit a quas. Et rerum rerum atque voluptatem repellendus. Ipsam non quos eligendi repellendus voluptas voluptas. Voluptas ipsa nisi similique minima aut quis assumenda. Et nesciunt omnis quam nobis quis. Debitis dicta dolor provident totam velit pariatur. Laudantium quis quia et quod eligendi quasi doloremque. Qui explicabo qui labore quo. Illo quia possimus qui voluptatem. Aut tempore et dolorem quo. Eaque dignissimos facilis et fugit id. Non qui aut ipsam consequatur beatae. Pariatur reiciendis ullam dignissimos quia incidunt. Corporis dolorum illo ut eum sunt et. Qui quos quis nam quibusdam sint nesciunt.', 956672, 1000000, 'sold', 3, '2022-02-22 10:05:55', '2022-02-12 10:05:55', '2022-02-22 10:06:00'),
(12, 9, NULL, 'Sed', 'Quia doloremque libero cumque eaque qui eum. Pariatur explicabo voluptas deleniti assumenda ex nesciunt. Officia tenetur quisquam molestiae minima corrupti. Est quisquam molestiae molestiae quia molestiae pariatur. Magnam et iusto non ea et beatae et laboriosam. Quidem eum repudiandae id modi. Et ipsam maxime voluptatem et incidunt consequatur odio est. Sapiente hic id odit. Ipsa quasi nobis nemo aut modi quod. Rerum ad ut dignissimos placeat unde aut. Iste ad iure quasi dignissimos quod facilis aut omnis. Architecto voluptas mollitia dolor totam voluptas asperiores hic. Ducimus deserunt sed quo ut et rerum. Dolorem numquam quidem velit ut dicta. Velit est ullam earum consequatur qui. Similique delectus sunt eos magni accusamus ut. Explicabo harum quas aspernatur accusantium. Odit iure delectus qui recusandae officia. Aspernatur autem voluptatem a dolores officia velit vel. Voluptatibus aliquam dicta nihil dolorum necessitatibus fugiat laudantium.', 541340, NULL, 'active', 3, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(13, 3, 6, 'Aliquid', 'Pariatur aliquid omnis non voluptatem laboriosam ut. Et laudantium dolorum similique amet nihil. Eum vitae quibusdam minima. Sed dolor necessitatibus nam minus dolor sunt architecto. Itaque qui atque ipsam hic incidunt sed. Ut ipsa sunt quia enim et quod quaerat. Sed dolores velit et ut quis odio. Eos et quae quo et dignissimos cumque. Maxime voluptatem distinctio veniam quia non sed voluptatibus. Odio deserunt qui omnis et commodi. Qui ea et asperiores aut aut odit. Vero consequatur eos asperiores et sit. Autem odio voluptatum numquam nisi quidem quia. Sit enim cupiditate ullam. Similique nemo et ea distinctio. Praesentium repellat rem iure modi. Accusamus id repellat distinctio. Sequi fugit tenetur itaque commodi quasi voluptatem et. Accusantium velit placeat quidem quod culpa. Consequatur eum quis dolores autem mollitia aut.', 646627, 733303, 'sold', 3, '2022-02-22 08:40:18', '2022-02-12 08:40:18', '2022-02-12 08:40:18'),
(14, 11, NULL, 'Facilis', 'Quibusdam veniam quas sint maiores voluptas. Non impedit enim maxime enim ut. Officiis quod facilis tempora omnis totam maiores sint. Laudantium enim delectus magni et dicta provident vel. Voluptatibus aliquid id dolor facilis quia est repudiandae explicabo. Beatae ducimus asperiores ipsam ut qui qui. Animi molestias sit officia qui vel. Excepturi blanditiis ut aliquam quia consequatur. Dolorem provident deleniti porro esse. Corrupti quaerat autem et nam vel dicta. Molestiae maxime aut amet fugiat nihil similique inventore. Quia eos ut voluptatem numquam excepturi blanditiis. Eius ad impedit laudantium consequatur vitae vitae eius. Velit impedit aut recusandae. Quaerat hic quidem non nobis voluptates. Aut officia earum ab ut nesciunt et nostrum. Possimus distinctio voluptas sunt velit.', 497067, NULL, 'active', 3, '2022-03-03 16:11:18', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(15, 9, 11, 'Temporibus', 'Similique voluptatibus ut aut fugiat. Perferendis iure sed optio consectetur et quis quaerat. Accusamus nihil nisi doloremque. Consectetur quis est necessitatibus aliquid. Placeat a beatae quia voluptatem. Quasi quidem velit perferendis at rerum ducimus. Aperiam qui velit nihil excepturi qui nobis. Eligendi eos quod quo et veniam. Ipsum cum est natus voluptatum. Nemo dolores incidunt vel consequatur. Tempore earum soluta optio quam velit in. Natus nihil qui optio nam ab. Et et nulla sed iusto optio dolores. Iure culpa ipsa maiores. Voluptatem non sint aut sunt. Ea et soluta perferendis. Quod libero et ea cupiditate numquam et. Cumque expedita qui incidunt facere quia nostrum. Laborum optio accusamus laboriosam voluptas totam. Deserunt eum qui perspiciatis vero vero. Officiis natus dolor quia iure. Animi non soluta consequuntur. In labore dicta tempore sed libero voluptatem.', 945925, 1000000000, 'sold', 3, '2022-02-22 08:57:59', '2022-02-12 08:57:59', '2022-02-22 08:58:00'),
(16, 6, NULL, 'Dolorum', 'Eligendi dolores quod soluta in. Consequatur molestiae enim error voluptatem similique voluptatem eius qui. Dolores hic minima dolor fugit delectus veritatis. Cumque qui harum recusandae esse nulla adipisci similique. Est voluptas omnis consectetur qui recusandae blanditiis quasi laudantium. Nemo aut eveniet itaque ut culpa explicabo vel. Laborum ut itaque aut maxime officia et aperiam. Sint aut qui est sunt est omnis a recusandae. Tempore nesciunt aut voluptatum rerum facere reprehenderit nostrum. Ea possimus ut voluptatem iure laborum velit eum. Non optio est totam omnis. Sit et corporis aut eum quo totam dignissimos voluptatibus. Exercitationem voluptas sed et sit quia. Repudiandae rerum veniam est corporis et facere. Quo non culpa aut ipsum. Vel provident dolores at ab ea. Qui consequatur voluptas tempora aut. Ea nulla facilis harum provident unde ex tempora ducimus. Eum sunt officia doloribus ipsam.', 76787, NULL, 'active', 4, '2022-03-03 16:11:19', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(17, 3, 6, 'Amet', 'Aut accusantium voluptatem est et possimus aut. Pariatur sit rerum optio reprehenderit deserunt. Error sed cupiditate cupiditate. Sit assumenda voluptatem fuga magnam. Error est porro dolorum voluptatem aut eveniet nostrum. Voluptas numquam suscipit consequatur commodi incidunt et sed neque. Quasi voluptatem et dolorem deleniti. Enim a aut consectetur eius illum assumenda sed incidunt. Sapiente tempore adipisci maiores. Ab ipsam rerum ut quaerat sit sit consequatur. Officia accusantium velit magni et dolorem quae atque voluptate. Odit assumenda est quisquam tempora. A enim sapiente minus et autem quod. Ipsum et repellat nihil. Corrupti iusto qui quas aut accusamus ut qui. Sunt dolorem illum vel. Consequatur et commodi iste dicta. Eum et dolore et porro. Aut delectus debitis placeat quia eum nihil. Consequatur velit itaque id debitis sit rerum. Temporibus numquam harum rem voluptatem. Repellat et vel occaecati distinctio consequatur non quia. Dolor rerum aut eligendi.', 999273, 999741, 'sold', 4, '2022-02-21 16:11:19', '2022-02-11 16:11:19', '2022-02-21 20:28:00'),
(18, 1, 5, 'Et', 'Aut sit odio explicabo est recusandae. Rerum quod voluptas hic doloribus. Voluptatem id sed veritatis tempore optio itaque dolorem. Autem rem quibusdam sapiente assumenda impedit quo quam voluptates. Rerum numquam vero quas illum. Ex voluptatem dignissimos ab veritatis quae. Deleniti sed corrupti consectetur rerum. Voluptatem aut laborum aut rerum. Non nihil aut sed quibusdam illum. Est perspiciatis nulla odit impedit atque expedita eos. Ut aut tenetur numquam molestias deleniti distinctio. Aut voluptate quia omnis a asperiores tempora qui. Voluptatem est quis repellat consequuntur. Id praesentium quo quis quis. Molestiae omnis voluptatem ut eaque non. Perferendis quam corrupti qui incidunt. Corporis consectetur consequatur omnis ut tempora. Sed ducimus mollitia labore nesciunt occaecati minus corrupti. Beatae fugit maiores repellat. Quam eum nisi in ratione. Alias ea sed velit vel quisquam voluptate quo odit. Voluptatibus nulla est autem rem.', 792180, 929128, 'sold', 4, '2022-02-21 16:11:19', '2022-02-11 16:11:19', '2022-02-21 20:29:00'),
(19, 5, 2, 'Voluptate', 'Facilis et nobis ex consequuntur et voluptatem. Numquam omnis neque et ea voluptatem corrupti. Necessitatibus assumenda dignissimos temporibus quidem aperiam. Laboriosam non et dolorum et. Qui incidunt autem non aut et ut. Quos ut sunt et ut id molestias officia. Alias porro non qui dolorum est vero qui dolor. Nisi molestiae quis beatae a. Et et ullam rerum. Ratione saepe et consequatur est aspernatur. Voluptas praesentium ut rerum iure esse et. Dolorem consequatur voluptas molestiae et. Vel iure veniam voluptatum vitae consectetur itaque nostrum qui. Nemo deleniti nam maiores doloremque voluptatum. Blanditiis est rem beatae omnis magnam et modi. Aut dolorum tempora maxime qui qui in saepe. Quasi et quisquam qui pariatur. Consectetur et et voluptas voluptas. Atque eum animi dolore labore voluptas inventore. Porro odit et sapiente id eos.', 866947, 974645, 'sold', 4, '2022-02-22 08:44:18', '2022-02-12 08:44:18', '2022-02-12 08:44:18'),
(20, 10, NULL, 'Ut', 'Sed molestiae eos rerum et neque recusandae. Optio repellendus suscipit soluta earum consequatur beatae. In magni fugiat facilis omnis illum. Doloribus quam quidem non tempore. Et odio nostrum earum vel possimus enim consequatur. Omnis maxime ab voluptatem debitis sit ut in. Quod dolorum repudiandae velit voluptatem quos delectus. Est ipsum soluta vel iure omnis adipisci dolores. Aspernatur nesciunt ad ut. Quibusdam ex adipisci nulla et sit accusantium dignissimos. Amet ut tempore saepe qui natus voluptatum in. Officiis culpa nihil adipisci impedit soluta. Sunt beatae odit similique asperiores ut cupiditate deserunt. Cupiditate dicta ipsum rerum quasi nihil aliquam rerum. Odit corrupti a ut rerum saepe soluta facere. Saepe eos atque quod. Et non odio quo id. Explicabo nesciunt voluptas aut qui incidunt nulla. Cumque quod quod provident quos omnis. Quasi saepe enim magnam optio est est blanditiis.', 781033, NULL, 'active', 4, '2022-03-03 16:11:19', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(21, 2, NULL, 'Ut', 'Magnam vitae perferendis non itaque fugiat veritatis labore. Ut mollitia accusantium et eos officiis. Dolorum facere est autem cumque. Rerum sit quam odit omnis et nesciunt. Asperiores necessitatibus consectetur culpa mollitia et. Laboriosam eaque rerum hic omnis deleniti quod sapiente. Officiis magni omnis provident dolor accusamus eveniet aut. Commodi occaecati neque nobis enim. Fugit ut voluptatem repellat adipisci est. Ea qui qui delectus repudiandae velit itaque. Ut aliquam ad eaque assumenda. Nemo fugiat numquam doloremque est a reiciendis. Vel omnis voluptas molestiae in doloribus. Ducimus eveniet incidunt sint consequatur nostrum. Provident laudantium ratione quia debitis qui incidunt. Iusto culpa quos atque tempore provident. Ducimus molestiae corrupti placeat sapiente recusandae adipisci nemo molestias. Nam ipsam sunt temporibus nihil omnis.', 151466, NULL, 'active', 5, '2022-03-03 16:11:19', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(22, 2, NULL, 'Vitae', 'Suscipit voluptatem et itaque explicabo. Quis alias nihil iusto nobis veniam non. Deserunt doloribus ut voluptas autem consequatur. Qui nobis dolorum iure quisquam. Repellat dolores repudiandae officiis odit vel. Deserunt et eaque qui rerum optio. Praesentium qui consequatur omnis libero voluptate iusto ut. Et quo molestiae ut facilis. Voluptates corporis blanditiis eaque pariatur iusto mollitia consequatur. Voluptatem reprehenderit quos fugit cupiditate error. Dolorem beatae esse quis praesentium nulla. Vel facilis minima est et. Ad earum sunt soluta voluptatibus est et. Itaque pariatur vitae vero distinctio. Ea inventore illum repudiandae autem aut in. Modi consequatur unde enim perspiciatis alias. Cupiditate dolor voluptas cumque recusandae et eum quibusdam. Quia qui corrupti nam modi molestiae eius eius culpa.', 613914, NULL, 'active', 5, '2022-03-03 16:11:19', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(23, 11, 3, 'Rerum', 'Non maiores sint dolorem sed qui vel quam. Quia quidem a recusandae autem. Rerum nihil quia necessitatibus natus consequatur. Deserunt temporibus mollitia fugiat perferendis enim possimus. Nobis ab ab id dolore eum quam. Non aperiam autem et et in nisi temporibus velit. Voluptatem culpa in omnis eaque qui. Asperiores cum explicabo nihil distinctio non repudiandae tenetur necessitatibus. Quas quis sint consequatur ut ut sed. Rerum nisi ut ex natus earum dicta in. Fuga doloribus porro veritatis ut sapiente recusandae esse. Omnis doloremque quae et suscipit qui. Corporis cum animi sunt est et illo dolores. Nihil et non optio ea. Veritatis atque porro expedita praesentium quae ad. Amet natus eaque exercitationem illum. Provident porro inventore consequatur est perferendis. Tenetur corrupti et eos rerum itaque dolorum provident qui. Ex quia sit quasi dicta sunt ut possimus. Ullam velit voluptas sit voluptate facere rerum delectus itaque.', 905500, 998983, 'sold', 5, '2022-02-21 16:11:19', '2022-02-11 16:11:19', '2022-02-21 16:23:00'),
(24, 2, NULL, 'Corrupti', 'Modi quod rerum vero soluta est similique. Quia optio repudiandae dolore tenetur repellat veritatis dolores. Possimus voluptates eveniet et consequuntur nulla et. Alias repudiandae velit consequatur asperiores. Consequatur cumque ad accusantium omnis. Neque et consequatur rerum culpa. Et corrupti vel enim assumenda voluptatem. Aut quaerat et et placeat. Sed mollitia vel ratione praesentium nesciunt ad vel. Mollitia ut et sed porro sed ex voluptates perferendis. Officiis explicabo cumque laboriosam. Qui distinctio voluptates et sint et. Iste esse fuga illo eaque. Accusamus mollitia temporibus voluptatem. Rerum atque dignissimos quia cum culpa. Omnis pariatur qui ex maiores. Praesentium ratione aut enim ea. Delectus dolorum dolores aperiam accusantium cum ut porro. Unde non sit unde sequi impedit consectetur vero dolorem. Incidunt nulla non et et voluptatibus voluptatum ea. Quo expedita eos nisi explicabo mollitia. Nisi voluptatem officia earum quos quisquam. Ipsa at in in adipisci.', 14757, NULL, 'active', 5, '2022-03-03 16:11:19', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(25, 3, 2, 'Cumque', 'Molestias cupiditate ea ut ut. Minus minima eum dolores est vero aut. Dolorem velit cum deserunt odit. Explicabo non magni natus eaque fuga. Dignissimos repudiandae repellendus tenetur. Velit laborum dolores ut nam atque inventore tempore. Et consequuntur quo quia minus. Veniam deleniti inventore in quod. Inventore consectetur nihil eos libero quo. Dolor deleniti perferendis nulla. Dolor aut delectus ut saepe quo quo fugiat quaerat. Ea error et quia voluptatem iusto possimus aut tempore. Id necessitatibus aut nostrum reprehenderit rerum. Deleniti et natus dolorem aut vero in cupiditate. Quia dicta et rerum praesentium quisquam sunt inventore possimus. Sed laboriosam voluptate corporis consequuntur molestiae at eum. Explicabo et exercitationem itaque occaecati iusto officiis illo. Dicta dolorem deleniti dolorum. Ducimus accusamus et suscipit sit mollitia dolore eius. Sapiente corporis illo quo ipsum.', 356149, 879240, 'sold', 5, '2022-02-21 16:11:18', '2022-02-11 16:11:19', '2022-02-21 20:32:00'),
(26, 11, NULL, 'Test item', 'Test desc', 444, NULL, 'active', 4, '2022-03-03 16:18:38', '2022-02-21 16:18:38', '2022-02-21 16:18:38'),
(27, 12, NULL, 'Round table', 'Molestias cupiditate ea ut ut. Minus minima eum dolores est vero aut. Dolorem velit cum deserunt odit. Explicabo non magni natus eaque fuga. Dignissimos repudiandae repellendus tenetur. Velit laborum dolores ut nam atque inventore tempore. Et consequuntur quo quia minus. Veniam deleniti inventore in quod. Inventore consectetur nihil eos libero quo. Dolor deleniti perferendis nulla. Dolor aut delectus ut saepe quo quo fugiat quaerat. Ea error et quia voluptatem iusto possimus aut tempore. Id necessitatibus aut nostrum reprehenderit rerum. Deleniti et natus dolorem aut vero in cupiditate. Quia dicta et rerum praesentium quisquam sunt inventore possimus. Sed laboriosam voluptate corporis consequuntur molestiae at eum. Explicabo et exercitationem itaque occaecati iusto officiis illo. Dicta dolorem deleniti dolorum. Ducimus accusamus et suscipit sit mollitia dolore eius. Sapiente corporis illo quo ipsum.', 9999, NULL, 'active', 3, '2022-03-03 20:08:01', '2022-02-21 20:08:01', '2022-02-21 20:08:01'),
(28, 12, NULL, 'Test item canceled', 'Molestias cupiditate ea ut ut. Minus minima eum dolores est vero aut. Dolorem velit cum deserunt odit. Explicabo non magni natus eaque fuga. Dignissimos repudiandae repellendus tenetur. Velit laborum dolores ut nam atque inventore tempore. Et consequuntur quo quia minus. Veniam deleniti inventore in quod. Inventore consectetur nihil eos libero quo. Dolor deleniti perferendis nulla. Dolor aut delectus ut saepe quo quo fugiat quaerat. Ea error et quia voluptatem iusto possimus aut tempore. Id necessitatibus aut nostrum reprehenderit rerum. Deleniti et natus dolorem aut vero in cupiditate. Quia dicta et rerum praesentium quisquam sunt inventore possimus. Sed laboriosam voluptate corporis consequuntur molestiae at eum. Explicabo et exercitationem itaque occaecati iusto officiis illo. Dicta dolorem deleniti dolorum. Ducimus accusamus et suscipit sit mollitia dolore eius. Sapiente corporis illo quo ipsum.', 1000000000, NULL, 'canceled', 3, '2022-03-03 20:12:50', '2022-02-21 20:12:50', '2022-02-21 20:13:03'),
(29, 3, NULL, 'Test expired item', 'Test desc', 111222, NULL, 'expired', 3, '2022-02-21 20:33:55', '2022-02-11 20:33:55', '2022-02-21 20:35:00'),
(30, 11, NULL, 'Test search item', 'Test desc', 11, NULL, 'canceled', 1, '2022-03-03 21:01:11', '2022-02-21 21:01:11', '2022-02-22 08:35:23'),
(31, 11, NULL, 'New item', 'Molestias cupiditate ea ut ut. Minus minima eum dolores est vero aut. Dolorem velit cum deserunt odit. Explicabo non magni natus eaque fuga. Dignissimos repudiandae repellendus tenetur. Velit laborum dolores ut nam atque inventore tempore. Et consequuntur quo quia minus. Veniam deleniti inventore in quod. Inventore consectetur nihil eos libero quo. Dolor deleniti perferendis nulla. Dolor aut delectus ut saepe quo quo fugiat quaerat. Ea error et quia voluptatem iusto possimus aut tempore. Id necessitatibus aut nostrum reprehenderit rerum. Deleniti et natus dolorem aut vero in cupiditate. Quia dicta et rerum praesentium quisquam sunt inventore possimus. Sed laboriosam voluptate corporis consequuntur molestiae at eum. Explicabo et exercitationem itaque occaecati iusto officiis illo. Dicta dolorem deleniti dolorum. Ducimus accusamus et suscipit sit mollitia dolore eius. Sapiente corporis illo quo ipsum.', 2500, NULL, 'active', 1, '2022-03-04 08:26:54', '2022-02-22 08:26:54', '2022-02-22 08:26:54'),
(32, 11, NULL, 'Keyboard', 'Molestias cupiditate ea ut ut. Minus minima eum dolores est vero aut. Dolorem velit cum deserunt odit. Explicabo non magni natus eaque fuga. Dignissimos repudiandae repellendus tenetur. Velit laborum dolores ut nam atque inventore tempore. Et consequuntur quo quia minus. Veniam deleniti inventore in quod. Inventore consectetur nihil eos libero quo. Dolor deleniti perferendis nulla. Dolor aut delectus ut saepe quo quo fugiat quaerat. Ea error et quia voluptatem iusto possimus aut tempore. Id necessitatibus aut nostrum reprehenderit rerum. Deleniti et natus dolorem aut vero in cupiditate. Quia dicta et rerum praesentium quisquam sunt inventore possimus. Sed laboriosam voluptate corporis consequuntur molestiae at eum. Explicabo et exercitationem itaque occaecati iusto officiis illo. Dicta dolorem deleniti dolorum. Ducimus accusamus et suscipit sit mollitia dolore eius. Sapiente corporis illo quo ipsum.', 5999, NULL, 'active', 4, '2022-03-04 08:31:54', '2022-02-22 08:31:54', '2022-02-22 08:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `item_payment`
--

CREATE TABLE `item_payment` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_payment`
--

INSERT INTO `item_payment` (`id`, `item_id`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 25, 4, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(2, 24, 2, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(3, 23, 1, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(4, 22, 5, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(5, 21, 1, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(6, 20, 1, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(7, 19, 3, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(8, 18, 4, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(9, 17, 1, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(10, 16, 1, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(11, 15, 4, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(12, 13, 5, '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(13, 14, 2, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(14, 1, 3, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(15, 12, 1, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(16, 11, 2, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(17, 10, 1, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(18, 9, 3, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(19, 8, 1, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(20, 7, 5, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(21, 6, 1, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(22, 5, 4, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(23, 4, 4, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(24, 3, 5, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(25, 2, 2, '2022-02-21 16:11:20', '2022-02-21 16:11:20'),
(26, 27, 2, '2022-02-21 20:08:01', '2022-02-21 20:08:01'),
(27, 31, 4, '2022-02-22 08:26:55', '2022-02-22 08:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `item_user`
--

CREATE TABLE `item_user` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_user`
--

INSERT INTO `item_user` (`id`, `item_id`, `user_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 816151, 'cancel', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(2, 16, 1, 773439, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(3, 24, 1, 164186, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(4, 2, 1, 449465, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(5, 9, 1, 845663, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(6, 17, 2, 999638, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(7, 25, 2, 879240, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(8, 6, 2, 192587, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(9, 19, 2, 974645, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(10, 8, 2, 938262, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(11, 15, 3, 988283, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(12, 16, 3, 677665, 'cancel', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(13, 8, 3, 793232, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(14, 23, 3, 998983, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(15, 4, 3, 656449, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(16, 23, 4, 967136, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(17, 15, 4, 993020, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(18, 5, 4, 845222, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(19, 7, 4, 740013, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(20, 18, 4, 873866, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(21, 18, 5, 929128, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(22, 25, 5, 703686, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(23, 19, 5, 899413, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(24, 1, 5, 475495, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(25, 12, 5, 641189, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(26, 13, 6, 733303, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(27, 2, 6, 398632, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(28, 17, 6, 999741, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(29, 19, 6, 927100, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(30, 20, 6, 991039, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(31, 4, 7, 664329, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(32, 16, 7, 284708, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(33, 22, 7, 681585, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(34, 1, 7, 281937, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(35, 21, 7, 169650, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(36, 15, 8, 958421, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(37, 2, 8, 404602, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(38, 13, 8, 703950, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(39, 23, 8, 946097, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(40, 5, 8, 563270, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(41, 17, 9, 999634, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(42, 12, 9, 779455, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(43, 13, 9, 710356, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(44, 4, 9, 644254, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(45, 22, 9, 876494, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(46, 9, 10, 805182, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(47, 25, 10, 844244, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(48, 20, 10, 900066, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(49, 14, 10, 728627, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(50, 8, 10, 979700, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(51, 23, 11, 932000, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(52, 17, 11, 999392, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(53, 19, 11, 933839, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(54, 25, 11, 815449, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(55, 7, 11, 765960, 'active', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(56, 27, 11, 10000, 'active', '2022-02-21 20:13:31', '2022-02-21 20:13:31'),
(57, 18, 3, 792181, 'active', '2022-02-21 20:26:04', '2022-02-21 20:26:04'),
(58, 24, 11, 123456, 'canceled', '2022-02-21 20:36:42', '2022-02-21 20:36:44'),
(59, 22, 11, 613915, 'canceled', '2022-02-21 20:37:29', '2022-02-21 20:37:40'),
(60, 13, 11, 646628, 'canceled', '2022-02-21 20:38:18', '2022-02-22 08:34:52'),
(61, 31, 3, 2850, 'active', '2022-02-22 08:27:36', '2022-02-22 08:27:36'),
(62, 15, 11, 1000000000, 'active', '2022-02-22 08:50:35', '2022-02-22 08:50:35'),
(63, 11, 11, 1000000, 'active', '2022-02-22 10:04:50', '2022-02-22 10:04:50');

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
(365, '2014_10_12_000000_create_users_table', 1),
(366, '2014_10_12_100000_create_password_resets_table', 1),
(367, '2019_08_19_000000_create_failed_jobs_table', 1),
(368, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(369, '2022_02_18_131440_create_items_table', 1),
(370, '2022_02_18_162902_create_item_user_table', 1),
(371, '2022_02_18_205624_create_images_table', 1),
(372, '2022_02_19_200329_create_deliveries_table', 1),
(373, '2022_02_19_200616_create_delivery_item_table', 1),
(374, '2022_02_19_203759_create_payments_table', 1),
(375, '2022_02_19_203922_create_item_payment_table', 1),
(376, '2022_02_20_102502_create_categories_table', 1),
(377, '2022_02_20_103035_add_category_to_items_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Visa', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(2, 'Discover Card', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(3, 'MasterCard', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(4, 'American Express', '2022-02-21 16:11:19', '2022-02-21 16:11:19'),
(5, 'JCB', '2022-02-21 16:11:19', '2022-02-21 16:11:19');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dorcas', 'Johnson', 'everette62@example.net', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mqE3ZIU6W8DZ6SfEDBnzLERiYr3CK5jYkMoOX11Uvmqba89szEu8X28yMR4h', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(2, 'Heath', 'Bernier', 'bwilliamson@example.com', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HtvxubJYBr', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(3, 'Austyn', 'Bednar', 'heathcote.cordell@example.org', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HZy7ArdFceUAaxfiCmTXAjaACAswGcvHtPTkAncyq6F7a88OYRmQqbJKsWSL', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(4, 'Ora', 'Bechtelar', 'lwalter@example.org', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fdPNqmoRkO', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(5, 'Eileen', 'Carter', 'katlynn52@example.com', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'A2LLlvN9dfuKFNHPai3djgRZM83tM6I3lDzPPAfCs7TsNYF8Iyo0tWriE69s', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(6, 'Lulu', 'Terry', 'maynard55@example.org', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JUUBruFA2L', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(7, 'Reva', 'Orn', 'hilpert.korbin@example.net', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TUSxeJN5qA', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(8, 'Luther', 'Walker', 'ahickle@example.org', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5N5n5pryDWAQdOYaA0uqKaa2ycMJ6hqlX9ZOaG1NIL5ErykL10MzVKmigywQ', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(9, 'Frederik', 'Gislason', 'danika.doyle@example.net', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uYrTVJSXdMeMmLXkTH8Eta8iI8YCmtIN3NzX96kGDFQACWBwieX8ID3xtp6Y', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(10, 'Molly', 'Ledner', 'mcclure.alize@example.net', '2022-02-21 16:11:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ni0ZdopgCO', '2022-02-21 16:11:18', '2022-02-21 16:11:18'),
(11, 'Mirko', 'Dzudzar', 'mirko@test.com', '2022-02-21 16:11:18', '$2y$10$81nGFvGYDLLhEn7Jpx.H9u5mv42cvjjZRlzJRpdEW76vu81oI.4O2', 'yWuzLgthGRw8WVypV13HLAu5RSDEvTu5wsG4yggyPbg3m39BM30nO0JJQFFS', '2022-02-21 16:11:18', '2022-02-21 16:18:17'),
(12, 'Johny', 'Quick', 'johny@test.com', NULL, '$2y$10$6xf3mAPIr1rXuD/s5bEWi.L88I8pvOJLXHgJnvOeHqH9xQSkfCdNG', NULL, '2022-02-21 20:06:01', '2022-02-21 20:07:09'),
(13, 'Boby', 'Duncan', 'boby@test.com', NULL, '$2y$10$3X9RcXAzGRScY6Vk.zBr5OkAcbMVO6pfV8AJu147U.TUqHyd69QSq', NULL, '2022-02-22 08:21:26', '2022-02-22 08:23:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_item`
--
ALTER TABLE `delivery_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_item_delivery_id_foreign` (`delivery_id`),
  ADD KEY `delivery_item_item_id_foreign` (`item_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`),
  ADD KEY `items_buyer_id_foreign` (`buyer_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `item_payment`
--
ALTER TABLE `item_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_payment_item_id_foreign` (`item_id`),
  ADD KEY `item_payment_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `item_user`
--
ALTER TABLE `item_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_user_item_id_foreign` (`item_id`),
  ADD KEY `item_user_user_id_foreign` (`user_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_item`
--
ALTER TABLE `delivery_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `item_payment`
--
ALTER TABLE `item_payment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item_user`
--
ALTER TABLE `item_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_item`
--
ALTER TABLE `delivery_item`
  ADD CONSTRAINT `delivery_item_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`),
  ADD CONSTRAINT `delivery_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `item_payment`
--
ALTER TABLE `item_payment`
  ADD CONSTRAINT `item_payment_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_payment_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `item_user`
--
ALTER TABLE `item_user`
  ADD CONSTRAINT `item_user_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
