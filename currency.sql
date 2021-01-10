-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 10-01-2021 a las 20:27:55
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `currency`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `code` int(11) NOT NULL,
  `acronym` varchar(5) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`code`, `acronym`, `name`, `updated_at`, `created_at`) VALUES
(1, 'AED', 'United Arab Emirates Dirham', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(2, 'AFN', 'Afghan Afghani', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(3, 'ALL', 'Albanian Lek', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(4, 'AMD', 'Armenian Dram', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(5, 'ANG', 'Netherlands Antillean Guilder', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(6, 'AOA', 'Angolan Kwanza', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(7, 'ARS', 'Argentine Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(8, 'AUD', 'Australian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(9, 'AWG', 'Aruban Florin', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(10, 'AZN', 'Azerbaijani Manat', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(11, 'BAM', 'Bosnia & Herzegovina Convertible Mark', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(12, 'BBD', 'Barbadian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(13, 'BDT', 'Bangladeshi Taka', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(14, 'BGN', 'Bulgarian Lev', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(15, 'BHD', 'Bahraini Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(16, 'BIF', 'Burundian Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(17, 'BMD', 'Bermudian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(18, 'BND', 'Brunei Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(19, 'BOB', 'Bolivian Boliviano', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(20, 'BRL', 'Brazilian Real', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(21, 'BSD', 'Bahamian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(22, 'BTN', 'Bhutanese Ngultrum', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(23, 'BWP', 'Botswana Pula', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(24, 'BYN', 'Belarus Ruble', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(25, 'BZD', 'Belize Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(26, 'CAD', 'Canadian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(27, 'CDF', 'Congolese Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(28, 'CHF', 'Swiss Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(29, 'CLP', 'Chilean Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(30, 'CNY', 'Chinese Yuan', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(31, 'COP', 'Colombian Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(32, 'CRC', 'Costa Rican Colon', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(33, 'CUC', 'Cuban Convertible Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(34, 'CVE', 'Cape Verdean Escudo', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(35, 'CZK', 'Czech Republic Koruna', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(36, 'DJF', 'Djiboutian Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(37, 'DKK', 'Danish Krone', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(38, 'DOP', 'Dominican Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(39, 'DZD', 'Algerian Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(40, 'EGP', 'Egyptian Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(41, 'ERN', 'Eritrean Nakfa', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(42, 'ETB', 'Ethiopian Birr', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(43, 'EUR', 'Euro', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(44, 'FJD', 'Fiji Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(45, 'GBP', 'British Pound Sterling', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(46, 'GEL', 'Georgian Lari', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(47, 'GHS', 'Ghanaian Cedi', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(48, 'GIP', 'Gibraltar Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(49, 'GMD', 'Gambian Dalasi', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(50, 'GNF', 'Guinea Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(51, 'GTQ', 'Guatemalan Quetzal', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(52, 'GYD', 'Guyanaese Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(53, 'HKD', 'Hong Kong Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(54, 'HNL', 'Honduran Lempira', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(55, 'HRK', 'Croatian Kuna', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(56, 'HTG', 'Haiti Gourde', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(57, 'HUF', 'Hungarian Forint', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(58, 'IDR', 'Indonesian Rupiah', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(59, 'ILS', 'Israeli Shekel', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(60, 'INR', 'Indian Rupee', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(61, 'IQD', 'Iraqi Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(62, 'IRR', 'Iranian Rial', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(63, 'ISK', 'Icelandic Krona', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(64, 'JMD', 'Jamaican Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(65, 'JOD', 'Jordanian Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(66, 'JPY', 'Japanese Yen', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(67, 'KES', 'Kenyan Shilling', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(68, 'KGS', 'Kyrgystani Som', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(69, 'KHR', 'Cambodian Riel', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(70, 'KMF', 'Comorian Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(71, 'KPW', 'North Korean Won', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(72, 'KRW', 'South Korean Won', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(73, 'KWD', 'Kuwaiti Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(74, 'KYD', 'Cayman Islands Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(75, 'KZT', 'Kazakhstan Tenge', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(76, 'LAK', 'Laotian Kip', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(77, 'LBP', 'Lebanese Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(78, 'LKR', 'Sri Lankan Rupee', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(79, 'LRD', 'Liberian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(80, 'LSL', 'Lesotho Loti', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(81, 'LYD', 'Libyan Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(82, 'MAD', 'Moroccan Dirham', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(83, 'MDL', 'Moldovan Leu', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(84, 'MGA', 'Malagasy Ariary', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(85, 'MKD', 'Macedonian Denar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(86, 'MMK', 'Myanma Kyat', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(87, 'MNT', 'Mongolian Tugrik', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(88, 'MOP', 'Macau Pataca', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(89, 'MRO', 'Mauritanian Ouguiya', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(90, 'MUR', 'Mauritian Rupee', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(91, 'MVR', 'Maldivian Rufiyaa', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(92, 'MWK', 'Malawi Kwacha', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(93, 'MXN', 'Mexican Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(94, 'MYR', 'Malaysian Ringgit', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(95, 'MZN', 'Mozambican Metical', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(96, 'NAD', 'Namibian Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(97, 'NGN', 'Nigerian Naira', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(98, 'NIO', 'Nicaragua Cordoba', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(99, 'NOK', 'Norwegian Krone', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(100, 'NPR', 'Nepalese Rupee', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(101, 'NZD', 'New Zealand Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(102, 'OMR', 'Omani Rial', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(103, 'PAB', 'Panamanian Balboa', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(104, 'PEN', 'Peruvian Nuevo Sol', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(105, 'PGK', 'Papua New Guinean Kina', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(106, 'PHP', 'Philippine Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(107, 'PKR', 'Pakistani Rupee', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(108, 'PLN', 'Polish Zloty', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(109, 'PYG', 'Paraguayan Guarani', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(110, 'QAR', 'Qatari Riyal', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(111, 'RON', 'Romanian Leu', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(112, 'RSD', 'Serbian Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(113, 'RUB', 'Russian Ruble', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(114, 'RWF', 'Rwanda Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(115, 'SAR', 'Saudi Riyal', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(116, 'SBD', 'Solomon Islands Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(117, 'SCR', 'Seychellois Rupee', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(118, 'SDG', 'Sudanese Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(119, 'SEK', 'Swedish Krona', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(120, 'SGD', 'Singapore Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(121, 'SHP', 'Saint Helena Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(122, 'SLL', 'Sierra Leonean Leone', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(123, 'SOS', 'Somali Shilling', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(124, 'SRD', 'Surinamese Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(125, 'SSP', 'South Sudanese Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(126, 'STD', 'Sao Tome and Principe Dobra', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(127, 'SYP', 'Syrian Pound', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(128, 'SZL', 'Swazi Lilangeni', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(129, 'THB', 'Thai Baht', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(130, 'TJS', 'Tajikistan Somoni', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(131, 'TMT', 'Turkmenistani Manat', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(132, 'TND', 'Tunisian Dinar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(133, 'TOP', 'Tonga Paanga', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(134, 'TRY', 'Turkish Lira', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(135, 'TTD', 'Trinidad and Tobago Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(136, 'TWD', 'New Taiwan Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(137, 'TZS', 'Tanzanian Shilling', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(138, 'UAH', 'Ukrainian Hryvnia', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(139, 'UGX', 'Ugandan Shilling', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(140, 'USD', 'United States Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(141, 'UYU', 'Uruguayan Peso', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(142, 'UZS', 'Uzbekistan Som', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(143, 'VEF', 'Venezuelan Bolivar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(144, 'VND', 'Vietnamese Dong', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(145, 'VUV', 'Vanuatu Vatu', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(146, 'WST', 'Samoan Tala', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(147, 'XAF', 'Central African CFA franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(148, 'XCD', 'East Caribbean Dollar', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(149, 'XOF', 'West African CFA franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(150, 'XPF', 'CFP Franc', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(151, 'YER', 'Yemeni Rial', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(152, 'ZAR', 'South African Rand', '2021-01-10 00:35:29', '2021-01-10 00:35:29'),
(153, 'ZMW', 'Zambian Kwacha', '2021-01-10 00:35:29', '2021-01-10 00:35:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `code` int(11) NOT NULL,
  `type_transaction` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(300) CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaction`
--

INSERT INTO `transaction` (`code`, `type_transaction`, `user`, `description`, `updated_at`, `created_at`) VALUES
(11, 5, 6, 'The user has been logged in from the ip: 172.28.0.1', '2021-01-10 17:38:21', '2021-01-10 17:38:21'),
(12, 5, 6, 'The user has been logged in from the ip: 172.28.0.1', '2021-01-10 17:38:41', '2021-01-10 17:38:41'),
(13, 4, 6, 'The user has changed his default currency from the ip: 172.28.0.1', '2021-01-10 17:40:51', '2021-01-10 17:40:51'),
(14, 1, 6, 'The user has deposited 5272500  from the ip: 172.28.0.1', '2021-01-10 17:41:10', '2021-01-10 17:41:10'),
(15, 2, 6, 'The user has deposited 3535843  from the ip: 172.28.0.1', '2021-01-10 17:41:43', '2021-01-10 17:41:43'),
(16, 3, 6, 'The user has requested his balance from the ip: 172.28.0.1', '2021-01-10 17:41:51', '2021-01-10 17:41:51'),
(17, 4, 6, 'The user has changed his default currency from the ip: 172.28.0.1', '2021-01-10 17:42:09', '2021-01-10 17:42:09'),
(18, 3, 6, 'The user has requested his balance from the ip: 172.28.0.1', '2021-01-10 17:42:13', '2021-01-10 17:42:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_transaction`
--

CREATE TABLE `type_transaction` (
  `code` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type_transaction`
--

INSERT INTO `type_transaction` (`code`, `name`, `description`) VALUES
(1, 'Deposit', 'Deposit of an amount of money into their account.'),
(2, 'Withdraw', 'Withdrawal an amount of money, whenever the account have enough money.'),
(3, 'Balance', 'Show current account balance.'),
(4, 'Modify', 'Modify data of the account.'),
(5, 'Login', 'The user has been login.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `code` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `default_currency` int(11) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`code`, `name`, `email`, `password`, `default_currency`, `balance`, `updated_at`, `created_at`) VALUES
(6, 'Juan Camilo', 'juankhzp14@gmail.com', '0aa0b6b3207f0b3839381db1962574a2', 140, 486.265, '2021-01-10 17:42:09', '2021-01-10 17:38:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_type_transaction` (`type_transaction`),
  ADD KEY `fk_user_trasnsaction` (`user`);

--
-- Indices de la tabla `type_transaction`
--
ALTER TABLE `type_transaction`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `currency`
--
ALTER TABLE `currency`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `type_transaction`
--
ALTER TABLE `type_transaction`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_type_transaction` FOREIGN KEY (`type_transaction`) REFERENCES `type_transaction` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_trasnsaction` FOREIGN KEY (`user`) REFERENCES `user` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
