-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 18 2022 г., 17:06
-- Версия сервера: 10.5.11-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magaz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) NOT NULL,
  `item` bigint(20) NOT NULL,
  `user` bigint(20) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `item`, `user`, `count`, `status`, `created_at`, `updated_at`) VALUES
(24, 6, 1, 2, 0, '2022-01-24 13:32:03', '2022-01-25 08:27:43'),
(25, 5, 1, 2, 1, '2022-01-25 08:27:38', '2022-01-25 08:27:40'),
(26, 6, 21, 1, 1, '2022-01-25 08:38:45', '2022-01-25 08:38:45'),
(27, 6, 24, 1, 1, '2022-01-27 03:41:37', '2022-01-27 03:41:37'),
(28, 5, 24, 1, 1, '2022-01-27 03:41:41', '2022-01-27 03:41:41');

-- --------------------------------------------------------

--
-- Структура таблицы `cats`
--

CREATE TABLE `cats` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cats`
--

INSERT INTO `cats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'Poco', NULL, NULL),
(8, 'Apple', NULL, NULL),
(9, 'Samsung', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cats` bigint(255) NOT NULL,
  `operative` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `desc`, `cats`, `operative`, `system`, `proc`, `display`, `img`, `created_at`, `updated_at`) VALUES
(5, 'Смартфон Xiaomi Poco X3 Pro 8/256Gb, синий', 23990, 'Высокопроизводительный смартфон XIAOMI Poco X3 Pro 8/256Gb отличается стильным дизайном. Он оборудован экраном с матрицей IPS диагональю 6,67 дюйма. Благодаря разрешению 2400x1080 пикселей обеспечивается отображение четкой картинки. Хорошая производительность обеспечивается благодаря процессору Qualcomm Snapdragon 860, ускорителю Adreno 640 и оперативной памяти объемом 8 Гб. Это гарантирует успешную работу нужных приложений. Для хранения информации есть накопитель на 256 Гб.\r\n\r\nНадежный смартфон XIAOMI Poco X3 Pro 8/256Gb укомплектован основной камерой для создания удивительных снимков с глубокой цветопередачей. Фронтальная камера на 20 Мп предусматривает удобное общение по видеосвязи. Преимущество модели заключается в емкой аккумуляторной батарее, заряда которой хватит на продолжительный период автономной работы.', 7, '8 Гб', 'Android 11', 'Qualcomm Snapdragon 860, 2960МГц, 8-ми ядерный', '6.67\", IPS', 'https://img.dxcdn.com/newprdimgs/20210224/51191614151849.jpg', NULL, NULL),
(6, 'Смартфон Apple iPhone 13 128Gb', 74460, 'iPhone 13. Самая совершенная система двух камер на iPhone. Режим «Киноэффект» делает из видео настоящее кино. Супербыстрый чип A15 Bionic. Неутомимый аккумулятор. Прочный корпус. И ещё более яркий дисплей Super Retina XDR.', 8, '8 Гб', 'Phone iOS 15', 'Apple A15 Bionic, 6-ти ядерный', '6.1\", OLED', 'https://news-coffee.com/wp-content/uploads/2020/02/20200214_iPhone.jpeg', NULL, NULL),
(7, 'Смартфон Samsung Galaxy Z Flip3 8/256Gb', 94990, 'Встречайте Galaxy Z Flip3 5G, новый Galaxy Z Flip с защитой от влаги, который помещается в вашем кармане. Оцените его стильный дизайн, цветовую палитру и новые технологии складного смартфона, такие как Flex режим. В Flip3 5G с хранилищем 256 ГБ достаточно места.24, 25. *Внешний вид устройства может отличаться в зависимости от страны. Защищенное пространство для ваших воспоминаний', 9, '8 ГБ', 'Android 11', 'Qualcomm Snapdragon 888, 8-ми ядерный', '6.7\", Dynamic AMOLED 2X', 'https://quke.ru/UserFiles/Landing/products/102757_photos_0.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_01_12_081753_create_cats_table', 1),
(18, '2022_01_12_081836_create_items_table', 1),
(19, '2022_01_13_173802_create_reviews_table', 2),
(20, '2022_01_24_143653_create_zakazs_table', 3),
(21, '2022_01_24_143653_create_zakaz_table', 4),
(22, '2022_01_24_143436_zakaz', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `users_id` bigint(11) NOT NULL,
  `users_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'олег', 'g@mail.ru', NULL, '$2y$10$e2gimrVL1bwZQEVyC/AmVexfrBIEEYufU/tgw6XzyRwhftX6xLCYu', 'SQsn7AYeFVYvmliqIeGnfenvmBWqowIM79CvZN0NBUqa3s9cPNoPqkVH0BK0', 0, '2022-01-17 09:49:31', '2022-01-17 09:49:31'),
(5, 'Илья', 'dim@g.com', NULL, '$2y$10$h0KWmr4TLqpUC7mlE4rMa.Nl4cRugtOppt9z4Wg0O1xWnQpTBvQGa', NULL, 0, '2022-01-17 10:48:31', '2022-01-17 10:48:31'),
(14, 'олег', 'capitan@gmail.com', NULL, '$2y$10$zixgS/8NSG78EmifMOJKDeHRXgCVd1GSfJ5HxT1zxQo51O5MA.20G', 'gEfRIZcVjrhBP666GlOfvi5hVA8ipKlBumvil4AOOA9bhaGYjWOP0mQSNRF3', 0, '2022-01-17 10:53:07', '2022-01-17 10:53:07'),
(18, 'димооон', 'dimoooon@mail.ru', NULL, '$2y$10$dhRxcp5HQIf5mnWiYuCaPe6R/Qsd0Dry6uobMpzrQWW2iH4G1CDqW', NULL, 0, '2022-01-17 12:31:55', '2022-01-17 12:31:55'),
(21, 'reg', 'reg@gmail.com', NULL, '$2y$10$iyqT2IaKrPPhBc0u6CkX2edWc4pzx5urqwlyZGfUfP8FUyuvfJiFO', 'cHrfPiXKOQ2jmyoUemO8JFwohx4hhSoGQg0TuYKcosxrLzEnZr11sBJg3EiM', 0, '2022-01-19 10:52:36', '2022-01-19 10:52:36'),
(23, '123', '123@gmail.com', NULL, '$2y$10$AW5H7EWnQ6MqwVWI37G9A.zZ7RzWc3AKavUUUU4WKGvFlXWzo6AJC', 'MHcBMygXJW7HsLq5OUaLhTPYfARarnUsAIFXIbCOpscr7L9aab8flHL0w15z', 0, '2022-01-21 07:13:30', '2022-01-21 07:13:30'),
(24, 'олег', 'germ4n.budantsev@yandex.ru', NULL, '$2y$10$AOxwz6aNGVOfHs8u58d6PufqObSkSA1DQHzmuaGrbU/Cv/uAqN5a.', 'XjldkCUczolS8ovLRfysZL2XPwmHMjaBmOcq6XQmlEFje9pDJn3V5v6SjGLQ', 0, '2022-01-27 03:39:27', '2022-01-27 03:39:27'),
(25, 'illl', 'illl@gg', NULL, '$2y$10$KisppjDUW.0Xq0pW0ZePAOVV8KNDaOiVux/6Wn1dqqAPYjiw5cyRC', NULL, 0, '2022-04-18 06:12:39', '2022-04-18 06:12:39');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazs`
--

CREATE TABLE `zakazs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery` bit(1) NOT NULL,
  `sum` varchar(550) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat` int(11) DEFAULT NULL,
  `com` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Принят','В пути','Доставлен','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `spare` int(11) DEFAULT NULL,
  `user_surname` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `zakazs`
--

INSERT INTO `zakazs` (`id`, `delivery`, `sum`, `payment`, `city`, `street`, `house`, `flat`, `com`, `status`, `user_id`, `user_name`, `phone`, `spare`, `user_surname`, `date`, `created_at`, `updated_at`) VALUES
(20, b'1', '196  900', 'Наличными', 'Уфа', 'Киекбаева', '11', 12, 'Доставьте пожалуйста посылку ближе к 9 утра', 'Принят', 1, 'Илья', 32543, 2332234, 'Буданцев', '2022-01-27', '2022-01-25 08:36:32', '2022-01-25 08:36:32'),
(22, b'1', '74  460', 'Банковской картой онлайн', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 21, 'Михаил', 32543, 12344, 'Зубенко', '2022-01-27', '2022-01-25 08:45:16', '2022-01-25 08:45:16'),
(23, b'1', '74  460', 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 4234, 'михаил', '2022-01-29', '2022-01-25 09:27:17', '2022-01-25 09:27:17'),
(24, b'1', '74  460', 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 432, 'dsg', '2022-01-28', '2022-01-25 09:32:16', '2022-01-25 09:32:16'),
(25, b'1', '74  460', 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'sdgd', 324, 3543, 'dfgd', '2022-01-28', '2022-01-25 10:47:36', '2022-01-25 10:47:36'),
(26, b'1', '74  460', 'PayPal', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'sdf', 32543, 3554, 'dfgdg', '2022-02-05', '2022-01-25 10:58:55', '2022-01-25 10:58:55'),
(27, b'1', '74  460', 'PayPal', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 24345, 'михаил', '2022-01-27', '2022-01-25 12:48:51', '2022-01-25 12:48:51'),
(28, b'1', '74  460', 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 325345, 'михаил', '2022-01-27', '2022-01-25 12:49:04', '2022-01-25 12:49:04'),
(29, b'1', '74  460', 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 2345345, 'олегов', '2022-01-28', '2022-01-25 12:50:20', '2022-01-25 12:50:20'),
(30, b'1', '74  460', 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 43242, 'олегов', '2022-01-27', '2022-01-25 13:06:25', '2022-01-25 13:06:25'),
(31, b'1', '74  460', 'PayPal', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 32543, 2144, 'олегов', '2022-01-29', '2022-01-25 13:07:21', '2022-01-25 13:07:21'),
(32, b'1', '74  460', 'PayPal', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 23443, 354355, 'олегов', '2022-01-28', '2022-01-25 13:08:28', '2022-01-25 13:08:28'),
(33, b'1', NULL, 'PayPal', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 23443, 354355, 'олегов', '2022-01-28', '2022-01-25 13:16:59', '2022-01-25 13:16:59'),
(34, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:15', '2022-01-25 13:17:15'),
(35, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:25', '2022-01-25 13:17:25'),
(36, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:26', '2022-01-25 13:17:26'),
(37, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:27', '2022-01-25 13:17:27'),
(38, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:37', '2022-01-25 13:17:37'),
(39, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:38', '2022-01-25 13:17:38'),
(40, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:45', '2022-01-25 13:17:45'),
(41, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:45', '2022-01-25 13:17:45'),
(42, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:17:48', '2022-01-25 13:17:48'),
(43, b'1', NULL, 'Банковской картой онлайн', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, '4546', 34645, 54656, '56564', '2022-01-27', '2022-01-25 13:24:44', '2022-01-25 13:24:44'),
(44, b'1', '74  460', 'PayPal', NULL, NULL, NULL, NULL, NULL, 'Принят', 21, 'Зубенко', 24234, 23553, 'михаил', '2022-01-27', '2022-01-25 13:27:00', '2022-01-25 13:27:00'),
(45, b'0', '74  460', 'Банковской картой онлайн', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 21, 'Илья', 32543, 2414, 'Буданцев', '2022-01-28', '2022-01-25 22:29:42', '2022-01-25 22:29:42'),
(46, b'0', '74  460', 'QR', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 21, 'reg', 32543, 214234, 'Зубенко', '2022-01-28', '2022-01-25 22:31:24', '2022-01-25 22:31:24'),
(47, b'1', '74  460', 'Банковской картой онлайн', 'dfgdfh', 'hfdh', '13', 12, 'dfgdhfhfgh', 'Принят', 21, 'олег', 32543, 21443234, 'олегов', '2022-01-27', '2022-01-25 22:32:22', '2022-01-25 22:32:22'),
(48, b'0', '98  450', 'Банковской картой онлайн', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 24, 'Илья', 32543, 35346, 'олегов', '2022-01-29', '2022-01-27 09:47:07', '2022-01-27 09:47:07'),
(49, b'0', '98  450', 'Банковской картой онлайн', 'Уфа', 'ул. Кирова', '65', NULL, NULL, 'Принят', 24, 'Илья', 32543, 24235, 'Брежнев', '2022-01-29', '2022-01-27 09:47:40', '2022-01-27 09:47:40'),
(50, b'0', '98  450', 'Банковской картой онлайн', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 24, 'Зубенко', 32543, 35345, 'михаил', '2022-01-29', '2022-01-27 09:49:32', '2022-01-27 09:49:32'),
(51, b'0', '98  450', 'Банковской картой онлайн', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 24, 'Зубенко', 32543, 35345, 'михаил', '2022-01-29', '2022-01-27 09:50:07', '2022-01-27 09:50:07'),
(52, b'0', '98  450', 'QR', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 24, 'Зубенко', 24235, 54657, 'михаил', '2022-01-31', '2022-01-30 08:40:14', '2022-01-30 08:40:14'),
(53, b'0', '98  450', 'PayPal', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 24, 'Зубенко', 325354, 564765, 'михаил', '2022-01-31', '2022-01-30 08:45:27', '2022-01-30 08:45:27'),
(54, b'0', '98  450', 'PayPal', 'Уфа', 'ул. Генерала Горбатова', '11', NULL, NULL, 'Принят', 24, 'Зубенко', 325354, 564765, 'михаил', '2022-01-31', '2022-01-30 09:03:09', '2022-01-30 09:03:09'),
(55, b'0', '98  450', 'PayPal', 'Уфа', 'ул. Кирова', '65', NULL, NULL, 'Принят', 24, 'олег', 4356547, 457567, 'тиньков', '2022-02-01', '2022-01-30 09:09:19', '2022-01-30 09:09:19'),
(56, b'0', '98  450', 'PayPal', 'Уфа', 'ул. Кирова', '65', NULL, NULL, 'Принят', 24, 'олег', 4356547, 457567, 'тиньков', '2022-02-01', '2022-01-30 09:33:02', '2022-01-30 09:33:02'),
(57, b'0', '98  450', 'PayPal', 'Уфа', 'ул. Кирова', '65', NULL, NULL, 'Принят', 24, 'олег', 4356547, 457567, 'тиньков', '2022-02-01', '2022-01-30 09:38:12', '2022-01-30 09:38:12'),
(58, b'0', '98  450', 'PayPal', 'Уфа', 'ул. Кирова', '65', NULL, NULL, 'Принят', 24, 'олег', 4356547, 457567, 'тиньков', '2022-02-01', '2022-01-30 09:38:42', '2022-01-30 09:38:42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items` (`item`,`user`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cats` (`cats`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `name` (`name`);

--
-- Индексы таблицы `zakazs`
--
ALTER TABLE `zakazs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `cats`
--
ALTER TABLE `cats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `zakazs`
--
ALTER TABLE `zakazs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`cats`) REFERENCES `cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zakazs`
--
ALTER TABLE `zakazs`
  ADD CONSTRAINT `zakazs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
