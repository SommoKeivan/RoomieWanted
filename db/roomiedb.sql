-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Created on: Dec 29, 2021 at 14:14
-- Server version: 10.4.22-MariaDB
-- PHP version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roomiedb`
--

-- --------------------------------------------------------

--
-- Structure of the table `chat_message`
--

CREATE TABLE `chat_message` (
  `senderID` int(11) NOT NULL,
  `recipientID` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `chat_message`
--

INSERT INTO `chat_message` (`senderID`, `recipientID`, `text`, `date`) VALUES
(1, 2, 'Hi, nice to meet you!', '2021-12-27 17:45:48'),
(2, 1, 'hi, nice to meet you too!', '2021-12-27 17:47:48'),
(1, 3, 'Hi, nice to meet you!', '2021-12-27 17:53:37'),
(1, 2, 'I\'m looking for a single near the Sede Centrale. What do you think about that?', '2021-12-27 18:01:30'),
(2, 1, 'I prefer the Areas near the Valentino, because I study architecture', '2021-12-27 18:02:30'),
(1, 2, 'ok', '2021-12-28 19:16:32'),
(1, 2, 'I understand', '2021-12-28 19:17:21'),
(1, 2, 'Thanks anyway for writing to me!', '2021-12-28 19:20:42'),
(2, 1, 'u are welcome', '2021-12-28 19:28:18'),
(2, 1, ':)', '2021-12-28 19:28:20'),
(1, 2, 'thanks bro', '2021-12-28 19:29:58');

-- --------------------------------------------------------

--
-- Structure of the table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `phone_code` int(5) NOT NULL,
  `country_code` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump of data for the table `countries`
--

INSERT INTO `countries` (`id`, `phone_code`, `country_code`, `country_name`) VALUES
(1, 93, 'AF', 'Afghanistan'),
(2, 358, 'AX', 'Aland Islands'),
(3, 355, 'AL', 'Albania'),
(4, 213, 'DZ', 'Algeria'),
(5, 1684, 'AS', 'American Samoa'),
(6, 376, 'AD', 'Andorra'),
(7, 244, 'AO', 'Angola'),
(8, 1264, 'AI', 'Anguilla'),
(9, 672, 'AQ', 'Antarctica'),
(10, 1268, 'AG', 'Antigua and Barbuda'),
(11, 54, 'AR', 'Argentina'),
(12, 374, 'AM', 'Armenia'),
(13, 297, 'AW', 'Aruba'),
(14, 61, 'AU', 'Australia'),
(15, 43, 'AT', 'Austria'),
(16, 994, 'AZ', 'Azerbaijan'),
(17, 1242, 'BS', 'Bahamas'),
(18, 973, 'BH', 'Bahrain'),
(19, 880, 'BD', 'Bangladesh'),
(20, 1246, 'BB', 'Barbados'),
(21, 375, 'BY', 'Belarus'),
(22, 32, 'BE', 'Belgium'),
(23, 501, 'BZ', 'Belize'),
(24, 229, 'BJ', 'Benin'),
(25, 1441, 'BM', 'Bermuda'),
(26, 975, 'BT', 'Bhutan'),
(27, 591, 'BO', 'Bolivia'),
(28, 599, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 387, 'BA', 'Bosnia and Herzegovina'),
(30, 267, 'BW', 'Botswana'),
(31, 55, 'BV', 'Bouvet Island'),
(32, 55, 'BR', 'Brazil'),
(33, 246, 'IO', 'British Indian Ocean Territory'),
(34, 673, 'BN', 'Brunei Darussalam'),
(35, 359, 'BG', 'Bulgaria'),
(36, 226, 'BF', 'Burkina Faso'),
(37, 257, 'BI', 'Burundi'),
(38, 855, 'KH', 'Cambodia'),
(39, 237, 'CM', 'Cameroon'),
(40, 1, 'CA', 'Canada'),
(41, 238, 'CV', 'Cape Verde'),
(42, 1345, 'KY', 'Cayman Islands'),
(43, 236, 'CF', 'Central African Republic'),
(44, 235, 'TD', 'Chad'),
(45, 56, 'CL', 'Chile'),
(46, 86, 'CN', 'China'),
(47, 61, 'CX', 'Christmas Island'),
(48, 672, 'CC', 'Cocos (Keeling) Islands'),
(49, 57, 'CO', 'Colombia'),
(50, 269, 'KM', 'Comoros'),
(51, 242, 'CG', 'Congo'),
(52, 242, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 682, 'CK', 'Cook Islands'),
(54, 506, 'CR', 'Costa Rica'),
(55, 225, 'CI', 'Cote D\'Ivoire'),
(56, 385, 'HR', 'Croatia'),
(57, 53, 'CU', 'Cuba'),
(58, 599, 'CW', 'Curacao'),
(59, 357, 'CY', 'Cyprus'),
(60, 420, 'CZ', 'Czech Republic'),
(61, 45, 'DK', 'Denmark'),
(62, 253, 'DJ', 'Djibouti'),
(63, 1767, 'DM', 'Dominica'),
(64, 1809, 'DO', 'Dominican Republic'),
(65, 593, 'EC', 'Ecuador'),
(66, 20, 'EG', 'Egypt'),
(67, 503, 'SV', 'El Salvador'),
(68, 240, 'GQ', 'Equatorial Guinea'),
(69, 291, 'ER', 'Eritrea'),
(70, 372, 'EE', 'Estonia'),
(71, 251, 'ET', 'Ethiopia'),
(72, 500, 'FK', 'Falkland Islands (Malvinas)'),
(73, 298, 'FO', 'Faroe Islands'),
(74, 679, 'FJ', 'Fiji'),
(75, 358, 'FI', 'Finland'),
(76, 33, 'FR', 'France'),
(77, 594, 'GF', 'French Guiana'),
(78, 689, 'PF', 'French Polynesia'),
(79, 262, 'TF', 'French Southern Territories'),
(80, 241, 'GA', 'Gabon'),
(81, 220, 'GM', 'Gambia'),
(82, 995, 'GE', 'Georgia'),
(83, 49, 'DE', 'Germany'),
(84, 233, 'GH', 'Ghana'),
(85, 350, 'GI', 'Gibraltar'),
(86, 30, 'GR', 'Greece'),
(87, 299, 'GL', 'Greenland'),
(88, 1473, 'GD', 'Grenada'),
(89, 590, 'GP', 'Guadeloupe'),
(90, 1671, 'GU', 'Guam'),
(91, 502, 'GT', 'Guatemala'),
(92, 44, 'GG', 'Guernsey'),
(93, 224, 'GN', 'Guinea'),
(94, 245, 'GW', 'Guinea-Bissau'),
(95, 592, 'GY', 'Guyana'),
(96, 509, 'HT', 'Haiti'),
(97, 0, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 39, 'VA', 'Holy See (Vatican City State)'),
(99, 504, 'HN', 'Honduras'),
(100, 852, 'HK', 'Hong Kong'),
(101, 36, 'HU', 'Hungary'),
(102, 354, 'IS', 'Iceland'),
(103, 91, 'IN', 'India'),
(104, 62, 'ID', 'Indonesia'),
(105, 98, 'IR', 'Iran, Islamic Republic of'),
(106, 964, 'IQ', 'Iraq'),
(107, 353, 'IE', 'Ireland'),
(108, 44, 'IM', 'Isle of Man'),
(109, 972, 'IL', 'Israel'),
(110, 39, 'IT', 'Italy'),
(111, 1876, 'JM', 'Jamaica'),
(112, 81, 'JP', 'Japan'),
(113, 44, 'JE', 'Jersey'),
(114, 962, 'JO', 'Jordan'),
(115, 7, 'KZ', 'Kazakhstan'),
(116, 254, 'KE', 'Kenya'),
(117, 686, 'KI', 'Kiribati'),
(118, 850, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 82, 'KR', 'Korea, Republic of'),
(120, 381, 'XK', 'Kosovo'),
(121, 965, 'KW', 'Kuwait'),
(122, 996, 'KG', 'Kyrgyzstan'),
(123, 856, 'LA', 'Lao People\'s Democratic Republic'),
(124, 371, 'LV', 'Latvia'),
(125, 961, 'LB', 'Lebanon'),
(126, 266, 'LS', 'Lesotho'),
(127, 231, 'LR', 'Liberia'),
(128, 218, 'LY', 'Libyan Arab Jamahiriya'),
(129, 423, 'LI', 'Liechtenstein'),
(130, 370, 'LT', 'Lithuania'),
(131, 352, 'LU', 'Luxembourg'),
(132, 853, 'MO', 'Macao'),
(133, 389, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 261, 'MG', 'Madagascar'),
(135, 265, 'MW', 'Malawi'),
(136, 60, 'MY', 'Malaysia'),
(137, 960, 'MV', 'Maldives'),
(138, 223, 'ML', 'Mali'),
(139, 356, 'MT', 'Malta'),
(140, 692, 'MH', 'Marshall Islands'),
(141, 596, 'MQ', 'Martinique'),
(142, 222, 'MR', 'Mauritania'),
(143, 230, 'MU', 'Mauritius'),
(144, 269, 'YT', 'Mayotte'),
(145, 52, 'MX', 'Mexico'),
(146, 691, 'FM', 'Micronesia, Federated States of'),
(147, 373, 'MD', 'Moldova, Republic of'),
(148, 377, 'MC', 'Monaco'),
(149, 976, 'MN', 'Mongolia'),
(150, 382, 'ME', 'Montenegro'),
(151, 1664, 'MS', 'Montserrat'),
(152, 212, 'MA', 'Morocco'),
(153, 258, 'MZ', 'Mozambique'),
(154, 95, 'MM', 'Myanmar'),
(155, 264, 'NA', 'Namibia'),
(156, 674, 'NR', 'Nauru'),
(157, 977, 'NP', 'Nepal'),
(158, 31, 'NL', 'Netherlands'),
(159, 599, 'AN', 'Netherlands Antilles'),
(160, 687, 'NC', 'New Caledonia'),
(161, 64, 'NZ', 'New Zealand'),
(162, 505, 'NI', 'Nicaragua'),
(163, 227, 'NE', 'Niger'),
(164, 234, 'NG', 'Nigeria'),
(165, 683, 'NU', 'Niue'),
(166, 672, 'NF', 'Norfolk Island'),
(167, 1670, 'MP', 'Northern Mariana Islands'),
(168, 47, 'NO', 'Norway'),
(169, 968, 'OM', 'Oman'),
(170, 92, 'PK', 'Pakistan'),
(171, 680, 'PW', 'Palau'),
(172, 970, 'PS', 'Palestinian Territory, Occupied'),
(173, 507, 'PA', 'Panama'),
(174, 675, 'PG', 'Papua New Guinea'),
(175, 595, 'PY', 'Paraguay'),
(176, 51, 'PE', 'Peru'),
(177, 63, 'PH', 'Philippines'),
(178, 64, 'PN', 'Pitcairn'),
(179, 48, 'PL', 'Poland'),
(180, 351, 'PT', 'Portugal'),
(181, 1787, 'PR', 'Puerto Rico'),
(182, 974, 'QA', 'Qatar'),
(183, 262, 'RE', 'Reunion'),
(184, 40, 'RO', 'Romania'),
(185, 70, 'RU', 'Russian Federation'),
(186, 250, 'RW', 'Rwanda'),
(187, 590, 'BL', 'Saint Barthelemy'),
(188, 290, 'SH', 'Saint Helena'),
(189, 1869, 'KN', 'Saint Kitts and Nevis'),
(190, 1758, 'LC', 'Saint Lucia'),
(191, 590, 'MF', 'Saint Martin'),
(192, 508, 'PM', 'Saint Pierre and Miquelon'),
(193, 1784, 'VC', 'Saint Vincent and the Grenadines'),
(194, 684, 'WS', 'Samoa'),
(195, 378, 'SM', 'San Marino'),
(196, 239, 'ST', 'Sao Tome and Principe'),
(197, 966, 'SA', 'Saudi Arabia'),
(198, 221, 'SN', 'Senegal'),
(199, 381, 'RS', 'Serbia'),
(200, 381, 'CS', 'Serbia and Montenegro'),
(201, 248, 'SC', 'Seychelles'),
(202, 232, 'SL', 'Sierra Leone'),
(203, 65, 'SG', 'Singapore'),
(204, 1, 'SX', 'Sint Maarten'),
(205, 421, 'SK', 'Slovakia'),
(206, 386, 'SI', 'Slovenia'),
(207, 677, 'SB', 'Solomon Islands'),
(208, 252, 'SO', 'Somalia'),
(209, 27, 'ZA', 'South Africa'),
(210, 500, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 211, 'SS', 'South Sudan'),
(212, 34, 'ES', 'Spain'),
(213, 94, 'LK', 'Sri Lanka'),
(214, 249, 'SD', 'Sudan'),
(215, 597, 'SR', 'Suriname'),
(216, 47, 'SJ', 'Svalbard and Jan Mayen'),
(217, 268, 'SZ', 'Swaziland'),
(218, 46, 'SE', 'Sweden'),
(219, 41, 'CH', 'Switzerland'),
(220, 963, 'SY', 'Syrian Arab Republic'),
(221, 886, 'TW', 'Taiwan, Province of China'),
(222, 992, 'TJ', 'Tajikistan'),
(223, 255, 'TZ', 'Tanzania, United Republic of'),
(224, 66, 'TH', 'Thailand'),
(225, 670, 'TL', 'Timor-Leste'),
(226, 228, 'TG', 'Togo'),
(227, 690, 'TK', 'Tokelau'),
(228, 676, 'TO', 'Tonga'),
(229, 1868, 'TT', 'Trinidad and Tobago'),
(230, 216, 'TN', 'Tunisia'),
(231, 90, 'TR', 'Turkey'),
(232, 7370, 'TM', 'Turkmenistan'),
(233, 1649, 'TC', 'Turks and Caicos Islands'),
(234, 688, 'TV', 'Tuvalu'),
(235, 256, 'UG', 'Uganda'),
(236, 380, 'UA', 'Ukraine'),
(237, 971, 'AE', 'United Arab Emirates'),
(238, 44, 'GB', 'United Kingdom'),
(239, 1, 'US', 'United States'),
(240, 1, 'UM', 'United States Minor Outlying Islands'),
(241, 598, 'UY', 'Uruguay'),
(242, 998, 'UZ', 'Uzbekistan'),
(243, 678, 'VU', 'Vanuatu'),
(244, 58, 'VE', 'Venezuela'),
(245, 84, 'VN', 'Viet Nam'),
(246, 1284, 'VG', 'Virgin Islands, British'),
(247, 1340, 'VI', 'Virgin Islands, U.s.'),
(248, 681, 'WF', 'Wallis and Futuna'),
(249, 212, 'EH', 'Western Sahara'),
(250, 967, 'YE', 'Yemen'),
(251, 260, 'ZM', 'Zambia'),
(252, 263, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure of the table `languages`
--

CREATE TABLE `languages` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `languages`
--

INSERT INTO `languages` (`ID`, `name`) VALUES
(1, 'English'),
(2, 'Italian'),
(3, 'Chinese'),
(4, 'Spanish'),
(5, 'French'),
(6, 'Hindi'),
(7, 'Arabic'),
(8, 'Japanese'),
(9, 'German'),
(10, 'Portuguese');

-- --------------------------------------------------------

--
-- Structure of the table `neighborhood`
--

CREATE TABLE `neighborhood` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `neighborhood`
--

INSERT INTO `neighborhood` (`ID`, `name`) VALUES
(1, 'Aurora'),
(2, 'Barca'),
(3, 'Barriera di Milano'),
(4, 'Bertolla'),
(5, 'Borgo Po'),
(6, 'Borgo Vittoria'),
(7, 'Campidoglio'),
(8, 'Cavoretto'),
(9, 'Cenisia'),
(10, 'Cit Turin'),
(11, 'Crocetta'),
(12, 'Falchera'),
(13, 'Filadelfia'),
(14, 'Lesna'),
(15, 'Lingotto'),
(16, 'Lucento'),
(17, 'Madonna del Pilone'),
(18, 'Madonna di Campagna'),
(19, 'Mirafiori'),
(20, 'Nizza Millefonti'),
(21, 'Parella'),
(22, 'Pozzo Strada'),
(23, 'Rebaudengo'),
(24, 'Regio Parco'),
(25, 'San Donato'),
(26, 'San Paolo'),
(27, 'San Salvario'),
(28, 'Santa Rita'),
(29, 'Sassi'),
(30, 'Vallette'),
(31, 'Vanchiglia - Vanchiglietta'),
(32, 'Villaretto'),
(33, 'City Center'),
(34, 'Politecnico - Sede Centrale'),
(35, 'Politecnico - Sede Mirafiori'),
(36, 'Politecnico - Sede Lingotto'),
(37, 'Politecnico - Sede Valentino');

-- --------------------------------------------------------

--
-- Structure of the table `review`
--

CREATE TABLE `review` (
  `userID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `review`
--

INSERT INTO `review` (`userID`, `senderID`, `text`, `score`, `date`) VALUES
(3, 1, 'She is a nice guy, clean and quiet.\nI lived with her for 4 months.', 5, '2021-12-29'),
(3, 2, 'I met Laura here on RoomieWanted.\r\nI have not lived with her, but thanks to her app a beautiful friendship was born', 5, '2021-12-28');

-- --------------------------------------------------------

--
-- Structure of the table `tag`
--

CREATE TABLE `tag` (
  `ID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `tag`
--

INSERT INTO `tag` (`ID`, `name`) VALUES
(1, 'single room'),
(2, 'double room'),
(3, 'only girls'),
(4, 'only boys'),
(5, 'clean'),
(6, 'friendly'),
(7, 'sporty'),
(8, 'musician'),
(9, 'polite'),
(10, 'party animal'),
(11, 'no-alcool'),
(12, 'no-drugs'),
(13, 'compatriots'),
(14, 'traveler'),
(15, 'Erasmus');

-- --------------------------------------------------------

--
-- Structure of the table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `countryID` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `field_of_study` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `name`, `surname`, `birthday`, `gender`, `telephone`, `email`, `countryID`, `location`, `state`, `profile_pic`, `field_of_study`) VALUES
(1, 'keivan', 'password', 'Keivan', 'Ameri', '1998-09-16', 'Male', '3282586878', 'amerikeivan@gmail.com', 110, 'Fano', 'looking', 'keivan_propic.jpg', 'computer engineering'),
(2, 'mario', 'password', 'Mario', 'Rossi', '2001-12-01', 'Male', '3282586879', 'mariorossi@gmail.com', 110, 'Turin', 'looking', 'mario_propic.jpg', 'architecture'),
(3, 'laura', 'password', 'Laura', 'Biondi', '1998-09-30', 'Female', '3282586866', 'laurabiondi@gmail.com', 110, 'Turin', 'looking', 'laura_propic.jpg', 'cinema engineering'),
(4, 'mark', 'password', 'Mark', 'Schmidt', '1998-10-16', 'Male', '3284576819', 'markschmidt@gmail.com', 83, 'Berlin', 'looking', 'mark_propic.jpg', 'computer engineering'),
(5, 'meizhang', 'password', 'Mei', 'Zhang', '2001-02-06', 'Female', '3392516823', 'meizhang@gmail.com', 46, 'Beijing', 'looking', 'mei_propic.jpg', 'electronic engineering');

-- --------------------------------------------------------

--
-- Structure of the table `user_language`
--

CREATE TABLE `user_language` (
  `userID` int(11) NOT NULL,
  `languageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `user_language`
--

INSERT INTO `user_language` (`userID`, `languageID`) VALUES
(1, 2),
(1, 1),
(2, 2),
(2, 1),
(2, 4),
(2, 2),
(2, 1),
(3, 1),
(3, 2),
(3, 5),
(4, 9),
(4, 7),
(4, 1),
(5, 3),
(5, 1);

-- --------------------------------------------------------

--
-- Structure of the table `user_liked`
--

CREATE TABLE `user_liked` (
  `userID` int(11) NOT NULL,
  `liked_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `user_liked`
--

INSERT INTO `user_liked` (`userID`, `liked_userID`) VALUES
(2, 1),
(3, 2),
(1, 3),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure of the table `user_neighborhood`
--

CREATE TABLE `user_neighborhood` (
  `userID` int(11) NOT NULL,
  `neighborhoodID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `user_neighborhood`
--

INSERT INTO `user_neighborhood` (`userID`, `neighborhoodID`) VALUES
(1, 34),
(1, 11),
(1, 9),
(2, 33),
(2, 37),
(2, 27),
(3, 34),
(3, 33),
(3, 9),
(4, 34),
(4, 11),
(4, 9),
(5, 11),
(5, 9);

-- --------------------------------------------------------

--
-- Structure of the table `user_pic`
--

CREATE TABLE `user_pic` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `user_pic`
--

INSERT INTO `user_pic` (`userID`, `name`, `date`) VALUES
(1, '01.png', '2021-11-24'),
(1, '02.png', '2021-12-01'),
(1, '03.png', '2021-12-02'),
(1, '04.png', '2021-12-04'),
(1, '05.png', '2021-12-06'),
(2, '06.png', '2021-12-01'),
(2, '07.png', '2021-12-02'),
(2, '08.png', '2021-12-07'),
(3, '09.png', '2021-12-01'),
(3, '10.png', '2021-12-02'),
(3, '11.png', '2021-12-07'),
(3, '12.png', '2021-12-09'),
(4, '13.png', '2021-12-28'),
(4, '14.png', '2021-12-29'),
(5, '15.png', '2021-12-29');

-- --------------------------------------------------------

--
-- Structure of the table `user_tag`
--

CREATE TABLE `user_tag` (
  `userID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump of data for the table `user_tag`
--

INSERT INTO `user_tag` (`userID`, `tagID`) VALUES
(1, 1),
(1, 5),
(1, 6),
(1, 9),
(1, 14),
(2, 2),
(2, 7),
(2, 10),
(2, 15),
(3, 1),
(3, 3),
(3, 5),
(3, 6),
(3, 9),
(3, 8),
(3, 12),
(4, 1),
(4, 4),
(4, 5),
(4, 6),
(5, 2),
(5, 3),
(5, 8),
(5, 9);

--
-- Indexes for downloaded tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `ID` (`userID`),
  ADD KEY `userId` (`userID`);

--
-- AUTO_INCREMENT for downloaded tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
