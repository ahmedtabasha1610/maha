-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 11:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `younes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `title`, `start_date`, `end_date`, `start_time`, `end_time`, `created_at`, `updated_at`, `status`) VALUES
(84, 24, NULL, '2022-12-08 00:00:00', '2022-12-09 00:00:00', '00:06:00', '01:06:00', '2022-12-16 04:06:54', '2022-12-16 10:24:01', 1),
(85, 24, NULL, '2022-12-13 00:00:00', '2022-12-14 00:00:00', '00:06:00', '02:07:00', '2022-12-16 04:07:03', '2022-12-16 04:07:03', 0),
(86, 24, NULL, '2022-12-07 00:00:00', '2022-12-08 00:00:00', '11:07:00', '00:07:00', '2022-12-16 04:07:12', '2022-12-16 04:07:12', 0),
(87, 24, NULL, '2022-12-07 00:00:00', '2022-12-08 00:00:00', '11:07:00', '00:07:00', '2022-12-16 04:07:21', '2022-12-16 10:53:47', 1),
(88, 24, NULL, '2023-01-03 00:00:00', '2023-01-04 00:00:00', '17:22:00', '18:22:00', '2023-01-20 12:22:50', '2023-01-20 12:22:50', 0),
(89, 24, NULL, '2023-01-03 00:00:00', '2023-01-04 00:00:00', '18:22:00', '18:22:00', '2023-01-20 12:23:01', '2023-01-20 12:27:48', 1),
(90, 24, NULL, '2023-01-12 00:00:00', '2023-01-13 00:00:00', '18:23:00', '19:23:00', '2023-01-20 12:23:14', '2023-01-20 12:23:14', 0),
(91, 24, NULL, '2023-01-12 00:00:00', '2023-01-13 00:00:00', '17:23:00', '19:23:00', '2023-01-20 12:23:24', '2023-01-20 12:23:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `created_at`, `updated_at`) VALUES
(4, 'مدونات عامة', '2022-10-27 05:39:25', '2022-10-27 05:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twiter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footernote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desginby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `websitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconwebsite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconwebsiteen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `phone`, `title`, `description`, `email`, `address`, `facebook`, `instagram`, `whatsapp`, `twiter`, `footernote`, `desginby`, `websitename`, `iconwebsite`, `iconwebsiteen`, `created_at`, `updated_at`) VALUES
(1, '5586486', 'dashdashdashdash', 'dash dash', 'bbb@gmail.com', 'palestine-gaza', NULL, NULL, NULL, NULL, 'dash', 'Esteshari', 'dash', '1cuyDx0uFjX78BgSJyJjQ2TLgFED2NpAYo7GOLZB.jpg', 'C:\\xampp\\tmp\\phpD86A.tmp', NULL, '2022-12-29 12:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titlear` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bodyar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `image`, `body`, `created_at`, `updated_at`, `titlear`, `bodyar`) VALUES
(6, 'من نحن', '0MPkvScmvDlKfqyOEe9KNjDT54b36QPQJaVpmjWK.jpg', '<p>jhdjjshd</p>', '2023-01-20 12:03:58', '2023-01-20 12:03:58', 'about yuus', '<p>hshghgdhgh</p>');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso3`, `iso`, `nicename`, `numcode`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'أفغنستان', 'AFG', 'AF', 'Afghanistan', '4', 93, NULL, NULL),
(2, 'ألبانيا', 'ALB', 'AL', 'Albania', '8', 355, NULL, NULL),
(3, 'الجزائر', 'DZA', 'DZ', 'Algeria', '12', 213, NULL, NULL),
(4, 'ساموا الأمريكية', 'ASM', 'AS', 'American Samoa', '16', 1684, NULL, NULL),
(5, 'أندورا', 'AND', 'AD', 'Andorra', '20', 376, NULL, NULL),
(6, 'أنغولا', 'AGO', 'AO', 'Angola', '24', 244, NULL, NULL),
(7, 'أنغيلا', 'AIA', 'AI', 'Anguilla', '660', 1264, NULL, NULL),
(8, 'أنتاركتيكا', NULL, 'AQ', 'Antarctica', NULL, 0, NULL, NULL),
(9, 'أنتيغوا وبربودا', 'ATG', 'AG', 'Antigua and Barbuda', '28', 1268, NULL, NULL),
(10, 'الأرجنتين', 'ARG', 'AR', 'Argentina', '32', 54, NULL, NULL),
(11, 'أرمينيا', 'ARM', 'AM', 'Armenia', '51', 374, NULL, NULL),
(12, 'أروبا', 'ABW', 'AW', 'Aruba', '533', 297, NULL, NULL),
(13, 'أستراليا', 'AUS', 'AU', 'Australia', '36', 61, NULL, NULL),
(14, 'النمسا', 'AUT', 'AT', 'Austria', '40', 43, NULL, NULL),
(15, 'أذربيجان', 'AZE', 'AZ', 'Azerbaijan', '31', 994, NULL, NULL),
(16, 'البهاما', 'BHS', 'BS', 'Bahamas', '44', 1242, NULL, NULL),
(17, 'البحرين', 'BHR', 'BH', 'Bahrain', '48', 973, NULL, NULL),
(18, 'بنغلاديش', 'BGD', 'BD', 'Bangladesh', '50', 880, NULL, NULL),
(19, 'بربادوس', 'BRB', 'BB', 'Barbados', '52', 1246, NULL, NULL),
(20, 'بيلاروسيا', 'BLR', 'BY', 'Belarus', '112', 375, NULL, NULL),
(21, 'بلجيكا', 'BEL', 'BE', 'Belgium', '56', 32, NULL, NULL),
(22, 'بيليز', 'BLZ', 'BZ', 'Belize', '84', 501, NULL, NULL),
(23, 'بنين', 'BEN', 'BJ', 'Benin', '204', 229, NULL, NULL),
(24, 'برمودا', 'BMU', 'BM', 'Bermuda', '60', 1441, NULL, NULL),
(25, 'بوتان', 'BTN', 'BT', 'Bhutan', '64', 975, NULL, NULL),
(26, 'بوليفيا', 'BOL', 'BO', 'Bolivia', '68', 591, NULL, NULL),
(27, 'البوسنة والهرسك', 'BIH', 'BA', 'Bosnia and Herzegovina', '70', 387, NULL, NULL),
(28, 'بوتسوانا', 'BWA', 'BW', 'Botswana', '72', 267, NULL, NULL),
(29, 'جزيرة بوفيت', NULL, 'BV', 'Bouvet Island', NULL, 0, NULL, NULL),
(30, 'البرازيل', 'BRA', 'BR', 'Brazil', '76', 55, NULL, NULL),
(31, 'إقليم المحيط البريطاني الهندي', NULL, 'IO', 'British Indian Ocean Territory', NULL, 246, NULL, NULL),
(32, 'بروناي دار السلام', 'BRN', 'BN', 'Brunei Darussalam', '96', 673, NULL, NULL),
(33, 'بلغاريا', 'BGR', 'BG', 'Bulgaria', '100', 359, NULL, NULL),
(34, 'بوركينا فاسو', 'BFA', 'BF', 'Burkina Faso', '854', 226, NULL, NULL),
(35, 'بوروندي', 'BDI', 'BI', 'Burundi', '108', 257, NULL, NULL),
(36, 'كمبوديا', 'KHM', 'KH', 'Cambodia', '116', 855, NULL, NULL),
(37, 'الكاميرون', 'CMR', 'CM', 'Cameroon', '120', 237, NULL, NULL),
(38, 'كندا', 'CAN', 'CA', 'Canada', '124', 1, NULL, NULL),
(39, 'كيب فيردي', 'CPV', 'CV', 'Cape Verde', '132', 238, NULL, NULL),
(40, 'جزر كايمان', 'CYM', 'KY', 'Cayman Islands', '136', 1345, NULL, NULL),
(41, 'جمهورية افريقيا الوسطى', 'CAF', 'CF', 'Central African Republic', '140', 236, NULL, NULL),
(42, 'تشاد', 'TCD', 'TD', 'Chad', '148', 235, NULL, NULL),
(43, 'شيلي', 'CHL', 'CL', 'Chile', '152', 56, NULL, NULL),
(44, 'الصين', 'CHN', 'CN', 'China', '156', 86, NULL, NULL),
(45, 'جزيرة الكريسماس', NULL, 'CX', 'Christmas Island', NULL, 61, NULL, NULL),
(46, 'جزر كوكوس (كيلينغ)', NULL, 'CC', 'Cocos (Keeling) Islands', NULL, 672, NULL, NULL),
(47, 'كولومبيا', 'COL', 'CO', 'Colombia', '170', 57, NULL, NULL),
(48, 'جزر القمر', 'COM', 'KM', 'Comoros', '174', 269, NULL, NULL),
(49, 'الكونغو', 'COG', 'CG', 'Congo', '178', 242, NULL, NULL),
(50, 'جمهورية الكونغو الديمقراطية', 'COD', 'CD', 'Congo, the Democratic Republic of the', '180', 242, NULL, NULL),
(51, 'جزر كوك', 'COK', 'CK', 'Cook Islands', '184', 682, NULL, NULL),
(52, 'كوستاريكا', 'CRI', 'CR', 'Costa Rica', '188', 506, NULL, NULL),
(53, 'ساحل العاج', 'CIV', 'CI', 'Cote D\'Ivoire', '384', 225, NULL, NULL),
(54, 'كرواتيا', 'HRV', 'HR', 'Croatia', '191', 385, NULL, NULL),
(55, 'كوبا', 'CUB', 'CU', 'Cuba', '192', 53, NULL, NULL),
(56, 'قبرص', 'CYP', 'CY', 'Cyprus', '196', 357, NULL, NULL),
(57, 'الجمهورية التشيكية', 'CZE', 'CZ', 'Czech Republic', '203', 420, NULL, NULL),
(58, 'الدنمارك', 'DNK', 'DK', 'Denmark', '208', 45, NULL, NULL),
(59, 'جيبوتي', 'DJI', 'DJ', 'Djibouti', '262', 253, NULL, NULL),
(60, 'دومينيكا', 'DMA', 'DM', 'Dominica', '212', 1767, NULL, NULL),
(61, 'جمهورية الدومنيكان', 'DOM', 'DO', 'Dominican Republic', '214', 1809, NULL, NULL),
(62, 'الاكوادور', 'ECU', 'EC', 'Ecuador', '218', 593, NULL, NULL),
(63, 'مصر', 'EGY', 'EG', 'Egypt', '818', 20, NULL, NULL),
(64, 'السلفادور', 'SLV', 'SV', 'El Salvador', '222', 503, NULL, NULL),
(65, 'غينيا الإستوائية', 'GNQ', 'GQ', 'Equatorial Guinea', '226', 240, NULL, NULL),
(66, 'إريتريا', 'ERI', 'ER', 'Eritrea', '232', 291, NULL, NULL),
(67, 'إستونيا', 'EST', 'EE', 'Estonia', '233', 372, NULL, NULL),
(68, 'أثيوبيا', 'ETH', 'ET', 'Ethiopia', '231', 251, NULL, NULL),
(69, 'جزر فوكلاند', 'FLK', 'FK', 'Falkland Islands (Malvinas)', '238', 500, NULL, NULL),
(70, 'جزر فاروس', 'FRO', 'FO', 'Faroe Islands', '234', 298, NULL, NULL),
(71, 'فيجي ', 'FJI', 'FJ', 'Fiji', '242', 679, NULL, NULL),
(72, 'فنلندا', 'FIN', 'FI', 'Finland', '246', 358, NULL, NULL),
(73, 'فرنسا', 'FRA', 'FR', 'France', '250', 33, NULL, NULL),
(74, 'غيانا الفرنسية', 'GUF', 'GF', 'French Guiana', '254', 594, NULL, NULL),
(75, 'بولينيزيا الفرنسية', 'PYF', 'PF', 'French Polynesia', '258', 689, NULL, NULL),
(76, 'المناطق الجنوبية لفرنسا', NULL, 'TF', 'French Southern Territories', NULL, 0, NULL, NULL),
(77, 'جابون', 'GAB', 'GA', 'Gabon', '266', 241, NULL, NULL),
(78, 'غامبيا', 'GMB', 'GM', 'Gambia', '270', 220, NULL, NULL),
(79, 'جورجيا', 'GEO', 'GE', 'Georgia', '268', 995, NULL, NULL),
(80, 'ألمانيا', 'DEU', 'DE', 'Germany', '276', 49, NULL, NULL),
(81, 'غانا', 'GHA', 'GH', 'Ghana', '288', 233, NULL, NULL),
(82, 'جبل طارق', 'GIB', 'GI', 'Gibraltar', '292', 350, NULL, NULL),
(83, 'اليونان', 'GRC', 'GR', 'Greece', '300', 30, NULL, NULL),
(84, 'الأرض الخضراء', 'GRL', 'GL', 'Greenland', '304', 299, NULL, NULL),
(85, 'غرينادا', 'GRD', 'GD', 'Grenada', '308', 1473, NULL, NULL),
(86, 'غوادلوب', 'GLP', 'GP', 'Guadeloupe', '312', 590, NULL, NULL),
(87, 'غوام', 'GUM', 'GU', 'Guam', '316', 1671, NULL, NULL),
(88, 'جواتيمالا', 'GTM', 'GT', 'Guatemala', '320', 502, NULL, NULL),
(89, 'غينيا', 'GIN', 'GN', 'Guinea', '324', 224, NULL, NULL),
(90, 'غينيا بيساو', 'GNB', 'GW', 'Guinea-Bissau', '624', 245, NULL, NULL),
(91, 'غويانا', 'GUY', 'GY', 'Guyana', '328', 592, NULL, NULL),
(92, 'هايتي', 'HTI', 'HT', 'Haiti', '332', 509, NULL, NULL),
(93, 'قلب الجزيرة وجزر ماكدونالز', NULL, 'HM', 'Heard Island and Mcdonald Islands', NULL, 0, NULL, NULL),
(94, 'الفاتيكان', 'VAT', 'VA', 'Holy See (Vatican City State)', '336', 39, NULL, NULL),
(95, 'هندوراس', 'HND', 'HN', 'Honduras', '340', 504, NULL, NULL),
(97, 'هنغاريا', 'HUN', 'HU', 'Hungary', '348', 36, NULL, NULL),
(98, 'أيسلندا', 'ISL', 'IS', 'Iceland', '352', 354, NULL, NULL),
(99, 'الهند', 'IND', 'IN', 'India', '356', 91, NULL, NULL),
(100, 'إندونيسيا', 'IDN', 'ID', 'Indonesia', '360', 62, NULL, NULL),
(101, 'إيران, ISLAMIC REPUBLIC OF', 'IRN', 'IR', 'Iran, Islamic Republic of', '364', 98, NULL, NULL),
(102, 'العراق', 'IRQ', 'IQ', 'Iraq', '368', 964, NULL, NULL),
(103, 'إيرلندا', 'IRL', 'IE', 'Ireland', '372', 353, NULL, NULL),
(105, 'إيطاليا', 'ITA', 'IT', 'Italy', '380', 39, NULL, NULL),
(106, 'جامايكا', 'JAM', 'JM', 'Jamaica', '388', 1876, NULL, NULL),
(107, 'اليابان', 'JPN', 'JP', 'Japan', '392', 81, NULL, NULL),
(108, 'الأردن', 'JOR', 'JO', 'Jordan', '400', 962, NULL, NULL),
(109, 'كازاخستان', 'KAZ', 'KZ', 'Kazakhstan', '398', 7, NULL, NULL),
(110, 'كينيا', 'KEN', 'KE', 'Kenya', '404', 254, NULL, NULL),
(111, 'كيريباتي', 'KIR', 'KI', 'Kiribati', '296', 686, NULL, NULL),
(112, 'كوريا، الجمهورية الشعبية الديمقراطية', 'PRK', 'KP', 'Korea, Democratic People\'s Republic of', '408', 850, NULL, NULL),
(113, 'جمهورية كوريا', 'KOR', 'KR', 'Korea, Republic of', '410', 82, NULL, NULL),
(114, 'الكويت', 'KWT', 'KW', 'Kuwait', '414', 965, NULL, NULL),
(115, 'قرغيزستان', 'KGZ', 'KG', 'Kyrgyzstan', '417', 996, NULL, NULL),
(116, 'جمهورية لاو الديمقراطية الشعبية', 'LAO', 'LA', 'Lao People\'s Democratic Republic', '418', 856, NULL, NULL),
(117, 'لاتفيا', 'LVA', 'LV', 'Latvia', '428', 371, NULL, NULL),
(118, 'لبنان', 'LBN', 'LB', 'Lebanon', '422', 961, NULL, NULL),
(119, 'ليسوتو', 'LSO', 'LS', 'Lesotho', '426', 266, NULL, NULL),
(120, 'ليبيريا', 'LBR', 'LR', 'Liberia', '430', 231, NULL, NULL),
(121, 'الجماهيرية العربية الليبية', 'LBY', 'LY', 'Libyan Arab Jamahiriya', '434', 218, NULL, NULL),
(122, 'ليختنشتاين', 'LIE', 'LI', 'Liechtenstein', '438', 423, NULL, NULL),
(123, 'ليثوانيا', 'LTU', 'LT', 'Lithuania', '440', 370, NULL, NULL),
(124, 'لوكسمبورغ', 'LUX', 'LU', 'Luxembourg', '442', 352, NULL, NULL),
(125, 'ماكاو', 'MAC', 'MO', 'Macao', '446', 853, NULL, NULL),
(126, 'مقدونيا ، جمهورية يوغسلاف السابقة', 'MKD', 'MK', 'Macedonia, the Former Yugoslav Republic of', '807', 389, NULL, NULL),
(127, 'مدغشقر', 'MDG', 'MG', 'Madagascar', '450', 261, NULL, NULL),
(128, 'ملاوي', 'MWI', 'MW', 'Malawi', '454', 265, NULL, NULL),
(129, 'ماليزيا', 'MYS', 'MY', 'Malaysia', '458', 60, NULL, NULL),
(130, 'جزر المالديف', 'MDV', 'MV', 'Maldives', '462', 960, NULL, NULL),
(131, 'مالي', 'MLI', 'ML', 'Mali', '466', 223, NULL, NULL),
(132, 'مالطا', 'MLT', 'MT', 'Malta', '470', 356, NULL, NULL),
(133, 'جزر مارشال', 'MHL', 'MH', 'Marshall Islands', '584', 692, NULL, NULL),
(134, 'مارتينيك', 'MTQ', 'MQ', 'Martinique', '474', 596, NULL, NULL),
(135, 'موريتانيا', 'MRT', 'MR', 'Mauritania', '478', 222, NULL, NULL),
(136, 'موريشيوس', 'MUS', 'MU', 'Mauritius', '480', 230, NULL, NULL),
(137, 'مايوت', NULL, 'YT', 'Mayotte', NULL, 269, NULL, NULL),
(138, 'المكسيك', 'MEX', 'MX', 'Mexico', '484', 52, NULL, NULL),
(139, 'ميكرونيسيا ', 'FSM', 'FM', 'Micronesia, Federated States of', '583', 691, NULL, NULL),
(140, 'جمهورية مولدوفا', 'MDA', 'MD', 'Moldova, Republic of', '498', 373, NULL, NULL),
(141, 'موناكو', 'MCO', 'MC', 'Monaco', '492', 377, NULL, NULL),
(142, 'منغوليا', 'MNG', 'MN', 'Mongolia', '496', 976, NULL, NULL),
(143, 'مونتسيرات', 'MSR', 'MS', 'Montserrat', '500', 1664, NULL, NULL),
(144, 'المغرب', 'MAR', 'MA', 'Morocco', '504', 212, NULL, NULL),
(145, 'موزامبيق', 'MOZ', 'MZ', 'Mozambique', '508', 258, NULL, NULL),
(146, 'ميانمار', 'MMR', 'MM', 'Myanmar', '104', 95, NULL, NULL),
(147, 'ناميبيا', 'NAM', 'NA', 'Namibia', '516', 264, NULL, NULL),
(148, 'ناورو', 'NRU', 'NR', 'Nauru', '520', 674, NULL, NULL),
(149, 'النيبال', 'NPL', 'NP', 'Nepal', '524', 977, NULL, NULL),
(150, 'هولندا', 'NLD', 'NL', 'Netherlands', '528', 31, NULL, NULL),
(151, 'جزر الأنتيل الهولندية', 'ANT', 'AN', 'Netherlands Antilles', '530', 599, NULL, NULL),
(152, 'كاليدونيا الجديدة', 'NCL', 'NC', 'New Caledonia', '540', 687, NULL, NULL),
(153, 'نيوزيلاندا', 'NZL', 'NZ', 'New Zealand', '554', 64, NULL, NULL),
(154, 'نيكاراغوا', 'NIC', 'NI', 'Nicaragua', '558', 505, NULL, NULL),
(155, 'النيجر', 'NER', 'NE', 'Niger', '562', 227, NULL, NULL),
(156, 'نيجيريا', 'NGA', 'NG', 'Nigeria', '566', 234, NULL, NULL),
(157, 'نيوي', 'NIU', 'NU', 'Niue', '570', 683, NULL, NULL),
(158, 'جزيرة نورفولك', 'NFK', 'NF', 'Norfolk Island', '574', 672, NULL, NULL),
(159, 'جزر ماريانا الشمالية', 'MNP', 'MP', 'Northern Mariana Islands', '580', 1670, NULL, NULL),
(160, 'النرويج', 'NOR', 'NO', 'Norway', '578', 47, NULL, NULL),
(161, 'عمان', 'OMN', 'OM', 'Oman', '512', 968, NULL, NULL),
(162, 'باكستان', 'PAK', 'PK', 'Pakistan', '586', 92, NULL, NULL),
(163, 'بالاو', 'PLW', 'PW', 'Palau', '585', 680, NULL, NULL),
(164, 'فلسطين', NULL, 'PS', 'Palestine', NULL, 970, NULL, NULL),
(165, 'بنما', 'PAN', 'PA', 'Panama', '591', 507, NULL, NULL),
(166, 'بابوا غينيا الجديدة', 'PNG', 'PG', 'Papua New Guinea', '598', 675, NULL, NULL),
(167, 'باراغواي', 'PRY', 'PY', 'Paraguay', '600', 595, NULL, NULL),
(168, 'بيرو', 'PER', 'PE', 'Peru', '604', 51, NULL, NULL),
(169, 'فيلبيني', 'PHL', 'PH', 'Philippines', '608', 63, NULL, NULL),
(170, 'بيتكيرن', 'PCN', 'PN', 'Pitcairn', '612', 0, NULL, NULL),
(171, 'بولندا', 'POL', 'PL', 'Poland', '616', 48, NULL, NULL),
(172, 'البرتغال', 'PRT', 'PT', 'Portugal', '620', 351, NULL, NULL),
(173, 'بورتوريكو', 'PRI', 'PR', 'Puerto Rico', '630', 1787, NULL, NULL),
(174, 'قطر', 'QAT', 'QA', 'Qatar', '634', 974, NULL, NULL),
(175, 'ريونيون', 'REU', 'RE', 'Reunion', '638', 262, NULL, NULL),
(176, 'رومانيا', 'ROM', 'RO', 'Romania', '642', 40, NULL, NULL),
(177, 'روسيا', 'RUS', 'RU', 'Russian Federation', '643', 70, NULL, NULL),
(178, 'رواندا', 'RWA', 'RW', 'Rwanda', '646', 250, NULL, NULL),
(179, 'سانت هيلينا', 'SHN', 'SH', 'Saint Helena', '654', 290, NULL, NULL),
(180, 'سانت كيتس ونيفيس', 'KNA', 'KN', 'Saint Kitts and Nevis', '659', 1869, NULL, NULL),
(181, 'سانت لوسيا', 'LCA', 'LC', 'Saint Lucia', '662', 1758, NULL, NULL),
(182, 'سانت بيير وميكلون', 'SPM', 'PM', 'Saint Pierre and Miquelon', '666', 508, NULL, NULL),
(183, 'سانت فنسنت وجزر غرينادين', 'VCT', 'VC', 'Saint Vincent and the Grenadines', '670', 1784, NULL, NULL),
(184, 'ساموا', 'WSM', 'WS', 'Samoa', '882', 684, NULL, NULL),
(185, 'سان مارينو', 'SMR', 'SM', 'San Marino', '674', 378, NULL, NULL),
(186, 'ساو تومي وبرينسيبي', 'STP', 'ST', 'Sao Tome and Principe', '678', 239, NULL, NULL),
(187, 'المملكة العربية السعودية', 'SAU', 'SA', 'Saudi Arabia', '682', 966, NULL, NULL),
(188, 'السنغال', 'SEN', 'SN', 'Senegal', '686', 221, NULL, NULL),
(190, 'سيشل', 'SYC', 'SC', 'Seychelles', '690', 248, NULL, NULL),
(191, 'سيراليون', 'SLE', 'SL', 'Sierra Leone', '694', 232, NULL, NULL),
(192, 'سنغافورة', 'SGP', 'SG', 'Singapore', '702', 65, NULL, NULL),
(193, 'سلوفاكيا', 'SVK', 'SK', 'Slovakia', '703', 421, NULL, NULL),
(194, 'سلوفينيا', 'SVN', 'SI', 'Slovenia', '705', 386, NULL, NULL),
(195, 'جزر سليمان', 'SLB', 'SB', 'Solomon Islands', '90', 677, NULL, NULL),
(196, 'الصومال', 'SOM', 'SO', 'Somalia', '706', 252, NULL, NULL),
(197, 'جنوب أفريقيا', 'ZAF', 'ZA', 'South Africa', '710', 27, NULL, NULL),
(198, 'جورجيا الجنوبية وجزر ساندويتش الجنوبية', NULL, 'GS', 'South Georgia and the South Sandwich Islands', NULL, 0, NULL, NULL),
(199, 'إسبانيا', 'ESP', 'ES', 'Spain', '724', 34, NULL, NULL),
(200, 'سيريلانكا', 'LKA', 'LK', 'Sri Lanka', '144', 94, NULL, NULL),
(201, 'السودان', 'SDN', 'SD', 'Sudan', '736', 249, NULL, NULL),
(202, 'سورينام', 'SUR', 'SR', 'Suriname', '740', 597, NULL, NULL),
(203, 'سفالبارد ويان ماين', 'SJM', 'SJ', 'Svalbard and Jan Mayen', '744', 47, NULL, NULL),
(204, 'سوازيلاند', 'SWZ', 'SZ', 'Swaziland', '748', 268, NULL, NULL),
(205, 'السويد', 'SWE', 'SE', 'Sweden', '752', 46, NULL, NULL),
(206, 'سويسرا', 'CHE', 'CH', 'Switzerland', '756', 41, NULL, NULL),
(207, 'سوريا', 'SYR', 'SY', 'Syrian Arab Republic', '760', 963, NULL, NULL),
(208, 'تايوان', 'TWN', 'TW', 'Taiwan, Province of China', '158', 886, NULL, NULL),
(209, 'طاجيكستان', 'TJK', 'TJ', 'Tajikistan', '762', 992, NULL, NULL),
(210, 'جمهورية تنزانيا المتحدة', 'TZA', 'TZ', 'Tanzania, United Republic of', '834', 255, NULL, NULL),
(211, 'تايلاند', 'THA', 'TH', 'Thailand', '764', 66, NULL, NULL),
(212, 'تيمور ليستي', NULL, 'TL', 'Timor-Leste', NULL, 670, NULL, NULL),
(213, 'توجو', 'TGO', 'TG', 'Togo', '768', 228, NULL, NULL),
(214, 'توكيلاو', 'TKL', 'TK', 'Tokelau', '772', 690, NULL, NULL),
(215, 'تونغا', 'TON', 'TO', 'Tonga', '776', 676, NULL, NULL),
(216, 'ترينيداد وتوباغو', 'TTO', 'TT', 'Trinidad and Tobago', '780', 1868, NULL, NULL),
(217, 'تونس', 'TUN', 'TN', 'Tunisia', '788', 216, NULL, NULL),
(218, 'تركيا', 'TUR', 'TR', 'Turkey', '792', 90, NULL, NULL),
(219, 'تركمانستان', 'TKM', 'TM', 'Turkmenistan', '795', 7370, NULL, NULL),
(220, 'جزر تركس وكايكوس', 'TCA', 'TC', 'Turks and Caicos Islands', '796', 1649, NULL, NULL),
(221, 'توفالو', 'TUV', 'TV', 'Tuvalu', '798', 688, NULL, NULL),
(222, 'أوغندا', 'UGA', 'UG', 'Uganda', '800', 256, NULL, NULL),
(223, 'أوكرانيا', 'UKR', 'UA', 'Ukraine', '804', 380, NULL, NULL),
(224, 'الإمارات العربية المتحدة', 'ARE', 'AE', 'United Arab Emirates', '784', 971, NULL, NULL),
(225, 'المملكة المتحدة', 'GBR', 'GB', 'United Kingdom', '826', 44, NULL, NULL),
(226, 'الولايات المتحدة الأمريكية', 'USA', 'US', 'United States', '840', 1, NULL, NULL),
(227, 'جزر الولايات المتحدة البعيدة الصغرى', NULL, 'UM', 'United States Minor Outlying Islands', NULL, 1, NULL, NULL),
(228, 'أوروغواي', 'URY', 'UY', 'Uruguay', '858', 598, NULL, NULL),
(229, 'أوزبيكستان', 'UZB', 'UZ', 'Uzbekistan', '860', 998, NULL, NULL),
(230, 'فانواتو', 'VUT', 'VU', 'Vanuatu', '548', 678, NULL, NULL),
(231, 'فنزويلا', 'VEN', 'VE', 'Venezuela', '862', 58, NULL, NULL),
(232, 'فيتنام', 'VNM', 'VN', 'Viet Nam', '704', 84, NULL, NULL),
(233, 'جزر فيرجن البريطانية', 'VGB', 'VG', 'Virgin Islands, British', '92', 1284, NULL, NULL),
(234, 'جزر فيرجن ، الولايات المتحدة', 'VIR', 'VI', 'Virgin Islands, U.s.', '850', 1340, NULL, NULL),
(235, 'واليس وفوتونا', 'WLF', 'WF', 'Wallis and Futuna', '876', 681, NULL, NULL),
(236, 'الصحراء الغربية', 'ESH', 'EH', 'Western Sahara', '732', 212, NULL, NULL),
(237, 'اليمن', 'YEM', 'YE', 'Yemen', '887', 967, NULL, NULL),
(238, 'زامبيا', 'ZMB', 'ZM', 'Zambia', '894', 260, NULL, NULL),
(239, 'زمب ـ ابوي', 'ZWE', 'ZW', 'Zimbabwe', '716', 263, NULL, NULL),
(240, 'صربيا', 'SRB', 'RS', 'Serbia', '688', 381, NULL, NULL),
(241, 'منطقة آسيا والمحيط الهادئ', '0', 'AP', 'Asia / Pacific Region', '0', 0, NULL, NULL),
(242, 'مونتينيغرو', 'MNE', 'ME', 'Montenegro', '499', 382, NULL, NULL),
(243, 'جزر آلاند', 'ALA', 'AX', 'Aland Islands', '248', 358, NULL, NULL),
(245, 'كوراساو', 'CUW', 'CW', 'Curacao', '531', 599, NULL, NULL),
(246, 'جيرنسي', 'GGY', 'GG', 'Guernsey', '831', 44, NULL, NULL),
(247, 'جزيرة آيل أوف مان', 'IMN', 'IM', 'Isle of Man', '833', 44, NULL, NULL),
(248, 'جيرسي', 'JEY', 'JE', 'Jersey', '832', 44, NULL, NULL),
(249, 'كوسوفو', '---', 'XK', 'Kosovo', '0', 381, NULL, NULL),
(250, 'سانت بارتيليمي', 'BLM', 'BL', 'Saint Barthelemy', '652', 590, NULL, NULL),
(252, 'سينت مارتن', 'SXM', 'SX', 'Sint Maarten', '534', 1, NULL, NULL),
(253, 'جنوب السودان', 'SSD', 'SS', 'South Sudan', '728', 211, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `en_name_lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name_lang`, `created_at`, `updated_at`, `en_name_lang`) VALUES
(2, 'اللغة الانجليزية', '2022-10-27 05:40:59', '2022-12-13 12:38:03', 'English'),
(5, 'اللغة العربية', '2022-12-13 12:37:21', '2022-12-13 12:37:21', 'Arabic');

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
(15, '2022_04_21_164103_create_categories_table', 1),
(16, '2022_09_22_110649_create_services_table', 2),
(17, '2022_10_18_194000_create_languages_table', 3),
(18, '2022_10_18_194011_create_countries_table', 4),
(19, '2014_10_12_000000_create_users_table', 5),
(20, '2014_10_12_100000_create_password_resets_table', 5),
(21, '2019_08_19_000000_create_failed_jobs_table', 5),
(22, '2020_10_09_135640_create_permission_tables', 5),
(23, '2020_10_09_135732_create_products_table', 5),
(24, '2021_08_12_014733_create_posts_table', 5),
(25, '2022_04_21_091957_create_configurations_table', 5),
(26, '2022_04_21_114021_create_contents_table', 5),
(27, '2022_10_07_143925_create_notifications_table', 5),
(28, '2022_10_07_144046_create_orders_table', 5),
(29, '2022_10_20_152953_add_paid_to_users_table', 6),
(30, '2022_10_25_092848_add_p3_to_users_table', 7),
(31, '2022_10_25_161249_add_p4_to_users_table', 8),
(32, '2022_01_08_093054_create_bookings_table', 9),
(33, '2022_10_27_182203_add_p6_to_bookings_table', 10),
(47, '2022_11_11_073040_add_amount_to_users_table', 11),
(48, '2022_11_13_180737_create_purchases_table', 11),
(49, '2022_11_15_130637_add_p6_to_users_table', 11),
(50, '2022_11_22_104221_add_p77_to_purchases_table', 11),
(52, '2022_11_27_075213_add_c11_to_purchases_table', 12),
(53, '2022_11_28_091441_add_emailpay_to_users_table', 13),
(54, '2022_12_04_074014_add_titlear_to_contents_table', 14),
(55, '2022_12_13_152844_add_ar_name_lang_to_languages_table', 14),
(56, '2022_12_13_153945_add_entitle_to_services_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 17),
(4, 'App\\Models\\User', 25),
(4, 'App\\Models\\User', 27);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('69c90f68-00c4-4032-a19f-684f2961974b', 'App\\Notifications\\advisorbookingNotification', 'App\\Models\\User', 24, '{\"greeting\":\" esteshari.com \\u0627\\u0634\\u0639\\u0627\\u0631 \\u062a\\u0646\\u0628\\u064a\\u0647 \\u0628\\u0648\\u0635\\u0648\\u0644 \\u062d\\u062c\\u0632 \\u0645\\u062f\\u0641\\u0648\\u0639\",\"body\":\"Alert notification of the arrival of a paid reservation esteshari.com.\",\"actionText\":\"View My Site\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\",\"username\":\"UserName:ali\",\"price\":\"Price:10USD\",\"details\":\"Reservation details2022-12-08 00:00:00to2022-12-09 00:00:00\"}', '2023-01-20 12:24:29', '2022-12-16 04:53:27', '2023-01-20 12:24:29'),
('bb9e47fc-1b81-4a90-a47e-d50f2cefa634', 'App\\Notifications\\advisorbookingNotification', 'App\\Models\\User', 24, '{\"greeting\":\" \\u0627\\u0634\\u0639\\u0627\\u0631 \\u062a\\u0646\\u0628\\u064a\\u0647 \\u0628\\u0648\\u0635\\u0648\\u0644 \\u062d\\u062c\\u0632 \\u0645\\u062f\\u0641\\u0648\\u0639\",\"body\":\"Alert notification of the arrival of a paid reservation \",\"actionText\":\"View My Site\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\",\"username\":\"UserName:ali\",\"price\":\"Price:10USD\",\"details\":\"Reservation details2023-01-03 00:00:00to2023-01-04 00:00:00\"}', '2024-06-06 07:51:49', '2023-01-20 12:27:11', '2024-06-06 07:51:49'),
('bc97f1e4-19b7-42cc-a91b-6addc63ebe37', 'App\\Notifications\\advisorbookingNotification', 'App\\Models\\User', 24, '{\"greeting\":\" \\u0627\\u0634\\u0639\\u0627\\u0631 \\u062a\\u0646\\u0628\\u064a\\u0647 \\u0628\\u0648\\u0635\\u0648\\u0644 \\u062d\\u062c\\u0632 \\u0645\\u062f\\u0641\\u0648\\u0639\",\"body\":\"Alert notification of the arrival of a paid reservation \",\"actionText\":\"View My Site\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\",\"username\":\"UserName:ali\",\"price\":\"Price:10USD\",\"details\":\"Reservation details2022-12-07 00:00:00to2022-12-08 00:00:00\"}', '2023-01-20 12:24:29', '2022-12-16 10:49:32', '2023-01-20 12:24:29'),
('d24dee08-6c20-42bd-b583-35540fe6efa9', 'App\\Notifications\\agreeanddisagreebookingNotification', 'App\\Models\\User', 3, '{\"title\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u062d\\u062c\\u0632:Odio recusandae Pra\",\"status\":\":\\u0627\\u0644\\u062d\\u0627\\u0644\\u0629ok\",\"date\":\":\\u0627\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e2022-11-04 00:00:00to2022-11-05 00:00:00\",\"time\":\":\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u062a15:32:00to10:24:00\",\"advisor_name\":\":\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0634\\u0627\\u0631ali yousf\",\"advisor_id\":4,\"purchase_id\":3}', NULL, '2022-11-28 06:26:59', '2022-11-28 06:26:59'),
('df7fcf0e-63a6-4bd4-a982-b23bb3b05ae6', 'App\\Notifications\\dashNotifaction', 'App\\Models\\User', 24, '{\"title\":\"test image\",\"body\":\"\\u062a\\u0646\\u0628\\u064a\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0633\\u0624\\u0648\\u0644adminX\",\"decription\":\"ghgfhgf\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/notifiy\\/send\\/details\\/24\",\"order_id\":26}', '2023-01-20 12:24:29', '2022-12-29 12:54:19', '2023-01-20 12:24:29'),
('e0c2ffc5-cf20-49f6-952a-9523b790cee7', 'App\\Notifications\\advisorbookingNotification', 'App\\Models\\User', 24, '{\"greeting\":\" \\u0627\\u0634\\u0639\\u0627\\u0631 \\u062a\\u0646\\u0628\\u064a\\u0647 \\u0628\\u0648\\u0635\\u0648\\u0644 \\u062d\\u062c\\u0632 \\u0645\\u062f\\u0641\\u0648\\u0639\",\"body\":\"Alert notification of the arrival of a paid reservation \",\"actionText\":\"View My Site\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\",\"username\":\"UserName:ali\",\"price\":\"Price:10USD\",\"details\":\"Reservation details2022-12-08 00:00:00to2022-12-09 00:00:00\"}', '2023-01-20 12:24:29', '2022-12-16 10:22:49', '2023-01-20 12:24:29'),
('e4be232d-895e-4774-b0ef-6ff557ca46d6', 'App\\Notifications\\dashNotifaction', 'App\\Models\\User', 24, '{\"title\":\"\\u062a\\u064a\\u0633\\u062a\",\"body\":\"\\u062a\\u0646\\u0628\\u064a\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0633\\u0624\\u0648\\u0644adminX\",\"decription\":\"\\u062a\\u064a\\u0633\\u062a\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/notifiy\\/send\\/details\\/24\",\"order_id\":25}', '2022-12-16 06:43:29', '2022-12-16 06:04:35', '2022-12-16 06:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(25, 24, 'تيست', 'تيست', '2022-12-16 06:04:19', '2022-12-16 06:04:19'),
(26, 24, 'test image', 'ghgfhgf', '2022-12-29 12:54:16', '2022-12-29 12:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$zN6SzMfnzyi9xpFLpQ3xWu0OF6lv0A7s32.Ab211iTLk3xEqbig4i', '2022-10-25 08:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-09-14 06:23:05', '2022-09-14 06:23:05'),
(2, 'role-create', 'web', '2022-09-14 06:23:05', '2022-09-14 06:23:05'),
(3, 'role-edit', 'web', '2022-09-14 06:23:05', '2022-09-14 06:23:05'),
(4, 'role-delete', 'web', '2022-09-14 06:23:05', '2022-09-14 06:23:05'),
(5, 'post-list', 'web', '2022-09-14 06:23:05', '2022-09-14 10:07:39'),
(6, 'post-create', 'web', '2022-09-14 06:23:05', '2022-09-14 10:07:50'),
(7, 'post-edit', 'web', '2022-09-14 06:23:05', '2022-09-14 10:08:00'),
(8, 'post-delete', 'web', '2022-09-14 06:23:05', '2022-09-14 10:07:25'),
(9, 'permission-list', 'web', NULL, NULL),
(10, 'permission-create', 'web', NULL, NULL),
(11, 'permission-edit', 'web', NULL, NULL),
(12, 'permission-delete', 'web', NULL, NULL),
(13, 'user-list', 'web', '2022-09-14 07:49:25', '2022-09-14 07:49:25'),
(14, 'user-create', 'web', '2022-09-14 07:49:43', '2022-09-14 07:49:43'),
(15, 'user-edit', 'web', '2022-09-14 07:49:55', '2022-09-14 07:49:55'),
(16, 'user-delete', 'web', '2022-09-14 07:50:06', '2022-09-14 07:50:06'),
(17, 'Category-list', 'web', '2022-09-14 10:13:22', '2022-09-14 10:13:22'),
(18, 'Category-create', 'web', '2022-09-14 10:13:45', '2022-09-14 10:13:45'),
(19, 'Category-edit', 'web', '2022-09-14 10:13:58', '2022-09-14 10:13:58'),
(20, 'Category-delete', 'web', '2022-09-14 10:14:10', '2022-09-14 10:14:10'),
(21, 'configuration-list', 'web', '2022-09-22 00:47:24', '2022-09-22 00:47:24'),
(22, 'configuration-create', 'web', '2022-09-22 00:47:38', '2022-09-22 00:47:38'),
(23, 'configuration-edit', 'web', '2022-09-22 00:47:51', '2022-09-22 00:47:51'),
(24, 'configuration-delete', 'web', '2022-09-22 00:48:04', '2022-09-22 00:48:04'),
(25, 'content-list', 'web', '2022-09-22 02:34:12', '2022-09-22 02:34:12'),
(26, 'content-create', 'web', '2022-09-22 02:34:26', '2022-09-22 02:34:26'),
(27, 'content-edit', 'web', '2022-09-22 02:34:42', '2022-09-22 02:34:42'),
(28, 'content-delete', 'web', '2022-09-22 02:34:54', '2022-09-22 02:34:54'),
(29, 'Services-list', 'web', '2022-09-22 05:12:25', '2022-09-22 05:12:25'),
(30, 'Services-create', 'web', '2022-09-22 05:12:33', '2022-09-22 05:12:33'),
(31, 'Services-edit', 'web', '2022-09-22 05:12:42', '2022-09-22 05:12:42'),
(32, 'Services-delete', 'web', '2022-09-22 05:12:50', '2022-09-22 05:12:50'),
(33, 'all-users', 'web', '2022-10-04 01:35:27', '2022-10-04 01:35:27'),
(34, 'all-advisors', 'web', '2022-10-04 01:35:42', '2022-10-04 01:35:42'),
(35, 'Notification', 'web', '2022-10-07 08:29:36', '2022-10-07 08:29:36'),
(36, 'language-list', 'web', '2022-10-20 08:18:47', '2022-10-20 08:18:47'),
(37, 'language-create', 'web', '2022-10-20 08:18:58', '2022-10-20 08:18:58'),
(38, 'language-edit', 'web', '2022-10-20 08:19:12', '2022-10-20 08:19:12'),
(39, 'language-delete', 'web', '2022-10-20 08:19:25', '2022-10-20 08:19:25'),
(40, 'booking-delete', 'web', '2022-11-22 06:17:37', '2022-11-22 06:17:37'),
(41, 'booking-list', 'web', '2022-11-22 06:17:48', '2022-11-22 06:17:48'),
(42, 'booking-edit', 'web', '2022-11-22 06:27:19', '2022-11-22 06:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `advisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `transaction_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pedding','waiting','completed','refunded','ok','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pedding',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `disacount` double(8,2) DEFAULT NULL,
  `residual` double(8,2) DEFAULT NULL,
  `day` int(11) NOT NULL DEFAULT 30,
  `register_status_day` timestamp NULL DEFAULT NULL,
  `delivery_time` timestamp NULL DEFAULT NULL,
  `confirm` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historypay` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `advisor_id`, `booking_id`, `order_id`, `transaction_id`, `payment_method`, `total_amount`, `currency`, `status`, `deleted_at`, `created_at`, `updated_at`, `disacount`, `residual`, `day`, `register_status_day`, `delivery_time`, `confirm`, `image`, `note`, `historypay`) VALUES
(8, 25, 24, 84, '5000', 'PAYID-MOOCH3I9VS68790K29316124', 'paypal', '10', 'USD', 'pedding', NULL, '2022-12-16 04:53:16', '2022-12-16 06:05:07', 0.00, 0.00, 30, NULL, NULL, 'no', NULL, NULL, NULL),
(9, 25, 24, 84, '5001', 'PAYID-MOOGGFA9Y102706FW3694729', 'paypal', '10', 'USD', 'waiting', NULL, '2022-12-16 10:22:40', '2022-12-16 10:24:01', NULL, NULL, 30, NULL, NULL, 'no', NULL, NULL, NULL),
(10, 25, 24, 87, '5002', 'PAYID-MOOGSTY50A728167X6712316', 'paypal', '10', 'USD', 'waiting', NULL, '2022-12-16 10:49:10', '2022-12-16 10:53:47', NULL, NULL, 30, NULL, NULL, 'no', NULL, NULL, NULL),
(11, 25, 24, 89, '5003', 'PAYID-MPFKJQQ1YG28943W13213349', 'paypal', '10', 'USD', 'waiting', NULL, '2023-01-20 12:27:07', '2023-01-20 12:27:48', NULL, NULL, 30, NULL, NULL, 'no', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-09-14 06:23:56', '2022-09-14 06:23:56'),
(2, 'bloger', 'web', '2022-09-14 07:58:01', '2022-09-14 07:58:01'),
(3, 'Employee', 'web', '2022-10-02 11:14:23', '2022-12-16 05:59:11'),
(4, 'User', 'web', '2022-10-02 11:14:40', '2022-10-02 11:14:40');

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
(1, 1),
(1, 4),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(32, 3),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `body`, `created_at`, `updated_at`, `entitle`) VALUES
(8, 'السباكة', 'QjkNWYA28tqpBPgMeXtWwrHlmHoFevkDlwia6Sb5.jpg', '<div class=\"text-center text-md-left pt-5\">\r\n<h4 class=\"font-weight-bold arrow-before-text d-inline-block mb-4\" style=\"text-align: right;\">التعريف بخدمة السباكة</h4>\r\n<div class=\"service-details__content\" style=\"text-align: right;\">\r\n<p>يقوم السبّاك من تطبيق بيتك بسباكة المنزل على قدر عالٍ من المسؤولية والكفاءة. حيث أن مهام السباكة من العمليات المعقدة التي تتطلب من صاحب المنزل أو المنشأة طلب خدمة السباكة لضمان القيام بها بكفاءة عالية، وهي متمثلة في كل من تركيب وصيانة السباكة في كل من تصليح الحنفيات وصيانة حمامات المنزل ومجاري الصرف الصحي وتأسيس السباكة وتركيب خلاط مياه المنزل وتركيب شاور الحمام. كما أن يقوم السبّاك بتقديم النصائح لصاحب المنزل أو المنشأة حول كيفية التصرف حال حدوث أي مشكلة متعلقة في دورات المياه والمطابخ مستقبلًا.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"singleServicesPage__sub-services pt-5 text-center text-md-left\">\r\n<h4 class=\"font-weight-bold arrow-before-text d-inline-block mb-4\" style=\"text-align: right;\">تشمل الخدمة</h4>\r\n<div class=\"row text-left\">\r\n<div class=\"col-md-12 my-2 pl-3 pl-md-0\" style=\"text-align: right;\">&nbsp;<a class=\"text-decoration-none font-weight-bold text-dark\" href=\"https://www.b8ak.com/sub-service/%d8%aa%d8%b1%d9%83%d9%8a%d8%a8-%d8%b4%d8%a7%d9%88%d8%b1-%d8%a7%d9%84%d8%ad%d9%85%d8%a7%d9%85/\">تركيب شاور الحمام</a>\r\n<p class=\"mt-3 mb-4\">يحتاج تركيب شاور الحمام الكثير من الدقة والخبرة لدى السبّاك، وهنا تكمن أهمية طلب خدمة السباكة من تطبيق بيتك. حيث لم يكن صاحب المنزل على دراية كاملة بكيفية تركيب كل من شاور حمام أو شطاف ماء، فتتميز خدمة تركيب شاور الحمام من تطبيق بيتك بأنها: ضمان على الخدمات المقدمة من&hellip;</p>\r\n</div>\r\n<div class=\"col-md-12 my-2 pl-3 pl-md-0\" style=\"text-align: right;\"><a class=\"text-decoration-none font-weight-bold text-dark\" href=\"https://www.b8ak.com/sub-service/%d8%b5%d9%8a%d8%a7%d9%86%d8%a9-%d8%ad%d9%85%d8%a7%d9%85%d8%a7%d8%aa/\">صيانة حمامات</a>\r\n<p class=\"mt-3 mb-4\" style=\"text-align: right;\">يقوم صاحب المنزل بطلب خدمة السباكة التي تتضمن صيانة حمامات المنزل، أي صيانة كرسي الحمام وتركيب شطاف وإصلاح مروش وتأسيس سباكة جديدة للحمام. للحصول على الخدمة، قم بتحميل تطبيق بيتك وتواصل مع مزوِّدي الخدمات المعتمدين لدينا.</p>\r\n</div>\r\n</div>\r\n</div>', '2022-12-16 03:31:26', '2022-12-16 03:31:26', 'test'),
(9, 'عاملات نظافة بالساعة', 'okCjnm9Xicrf19b7Nfi3RWdIaVMLyu9KGPCXXZgH.jpg', '<h4 class=\"font-weight-bold arrow-before-text d-inline-block mb-4\" style=\"text-align: right;\">التعريف بخدمة عاملات نظافة بالساعة</h4>\r\n<div class=\"service-details__content\" style=\"text-align: right;\"><strong>عاملات نظافة نسائية مدربة تساعدك بالقيام بأعمال البيت بأفضل طريقة.</strong>&nbsp;نعلم تمامًا سيدتي أن مهام المنزل من أكثر المهام الشاقة عليكِ، وأنك تحتاجين المساعدة التي تثقين أن نتائجها ستكون مُرضية لكِ، خاصة إن كان الأمر متعلقًا بمهام التنظيف. ولهذا السبب تحرصين على إيجاد عاملات نظافة بالساعة تقوم بأداء المهام المنزلية المتعلقة بنظافة المنزل بمهارة عالية، سواء كانت نظافة غرف النوم أو الحمامات أو المطبخ أو غيرها.&nbsp;وقد تحتاج ربّات البيوت أحيانًا إلى الاستعانة بعاملات منزلية بنظام الساعة بحيث تقوم ربة البيت بطلب الخدمة من تطبيق بيتك بحيث تكون عدد الساعات عمل عاملات النظافة لدينا ٤ ساعات في اليوم الواحد، وكذلك الأمر في حال رغبة السيدات الحصول على عاملات منزلية في الشهر، بحيث يتم عمل جدول لزيارات العاملة المنزلية خلال الشهر على أن يتم إنجاز المهام المطلوبة بشأن تنظيف البيت في ساعات تصل أقصاها إلى ٤ ساعات في اليوم.&nbsp;ومن هنا، يتطلب التعريف بالخدمة تحديد المهام التي تتضمنها خدمة عاملات نظافة بالساعة، وتتضمن تلك المهام في التالي:\r\n<ul>\r\n<li style=\"text-align: right;\">تنظيف غرف النوم: تقوم عاملات نظافة بالساعة بتنظيف أرضيّات غرف النوم والأثاث الموجود فيها وكذلك تبديل شراشف السرائر في الغرف حسب ما توفره لها ربة البيت وتعقيمها وتعطيرها بحيث تضفي على أفراد البيت الشعور بالانتعاش.</li>\r\n<li style=\"text-align: right;\">تنظيف غرف المعيشة: تقوم عاملات نظافة بالساعة بتنظيف كل ما تحتويه غرف المعيشة من أثاث وأبواب وأرضيات وأسطح الطاولات وذلك من خلال إزالة الغبار عليها بواسطة المكنسة الكهربائية أو قطع من القماش الناشف، وبعد ذلك باستخدام المنظِّفات والمعقِّمات المتاحة تقوم بتنظيف غرفة المعيشة بالكامل.</li>\r\n<li style=\"text-align: right;\">تنظيف حمامات البيت: تحرص عاملة النظافة لدينا على تنظيف حمام البيت في حال تم طلب&nbsp; ذلك منها، ويكون التنظيف باستخدام أدوات ووسائل التنظيف التي تلائم حاجة الحمام، وكذلك استعمال مواد التنظيف التي لا تسبب أزمة صحية أو مضاعفات على أفراد البيت، مثل: حساسية الأنف والربو وغيرها.</li>\r\n<li style=\"text-align: right;\">تنظيف المطبخ: تعمل عاملات نظافة بالساعة على تنظيف كافة أدوات المطبخ والأجهزة الكهربائية كالثلاجة والميكرويف من الداخل والخارج، بالإضافة إلى تنظيف الأطباق والخزائن وأبوابها والرفوف من الداخل وذلك باستعمال أدوات التنظيف الفعَّالة.</li>\r\n</ul>\r\n</div>', '2022-12-16 03:38:04', '2022-12-16 03:38:04', 'test'),
(10, 'النظافة', 'fCwI1A2va9QYMrSZArfPE6lLAqwjSuXLElm8drhN.jpg', '<p style=\"text-align: right;\"><strong>كيفية قيام عامل النظافة من تطبيق بيتك بالقيام بخدمات تنظيف المنازل</strong></p>\r\n<p style=\"text-align: right;\">- &nbsp;&nbsp;تهتم عامل النظافة لدينا بتنظيف المنازل باستعمال أدوات التنظيف التي يحضرها معه وتكون مواد مصاحبة للبيئة ومناسبة للتنظيف البيتي المتاحة ليتم تنظيف وتلميع السيراميك مثلًا أو تنظيف الأثاث وغيرها.</p>\r\n<p style=\"text-align: right;\">- &nbsp;&nbsp;يعتني عامل النظافة بتنظيف وتلميع السيراميك على أكمل وجه، حيث يتم تحديد المساحة المراد تنظيفها باستخدام كافة مواد التنظيف التي تعطي نتائج مُرضية والأدوات التي تساعد على إتمام خدمات التنظيف على أكمل وجه.</p>\r\n<p style=\"text-align: right;\">- &nbsp;&nbsp;ينصح عامل النظافة لدينا أصحاب البيوت حول أكثر منتجات التنظيف التي لها تأثير قوي في تنظيف وتلميع السيراميك في المنزل، وذلك للحفاظ على السيراميك بأفضل شكل لمدة أطول.</p>\r\n<p style=\"text-align: right;\">- &nbsp;&nbsp;يقوم عامل النظافة بتنظيف الاثاث بالبخار وذلك لأن هذه الطريقة من أكثر الطرق أمنًا على الأثاث، وكذلك لها نتائج إيجابية على الأثاث حيث تختفي البقع الموجودة عليه بحيث لا تترك آثارًا.</p>\r\n<p style=\"text-align: right;\">- &nbsp;&nbsp;يتنوع الأثاث الذي يقوم عامل النظافة بتنظيفه من ستائر وكنب وغيرها بحيث يتم إتمام مهام التنظيف وفق ما يُرضي صاحب المنزل.</p>', '2022-12-16 03:40:57', '2022-12-16 03:40:57', 'test'),
(11, 'مكافحة الحشرات', 's26xSwlXYKE8KLrIbc84hB6brGpFaWZOx3EZTnRn.jpg', '<ul>\r\n<li style=\"text-align: right;\">من أحد وسائل المحافظة على البيت من الحشرات هي المحافظة على نظافة الأرضيات والأسطح من الأوساخ أو الحلويات لكي لا يتم تجمع النمل أو أي نوع من الحشرات، بالإضافة إلى وضع شبك العازل للحشرات للنوافذ.&nbsp;</li>\r\n<li style=\"text-align: right;\">منع دخول الحشرات للمنازل وذلك من خلال اغلاق كل من النوافذ والأبواب، أما عندما يتم تهوية المنزل فلا بد من فتح النوافذ ذات السلك الرفيع لأنها تمنع دخول الحشرات للمنزل. لذا، في حال عدم وجود النوافذ المصنَّعة في المنزل، يُفضَّل تركيب هذا النوع من النوافذ لأنها أحد الوسائل التي من شأنها أن تعمل على تهوية المنزل مع الحفاظ على المنزل من دخول الحشرات المزعجة لداخل المنزل.</li>\r\n<li style=\"text-align: right;\">تهوية المنزل يوميًا لحماية المنزل من البعوض&nbsp; وهي أحد الحشرات الضارة للمفروشات وكذلك غيرها من الحشرات التي تضر أثاث المنزل.</li>\r\n</ul>', '2022-12-16 03:41:59', '2022-12-16 03:41:59', 'test'),
(12, 'نجارة و تركيب أثاث', 'hg8dr4QqgKNIc55CThEEu3YaiBURdDNac2Nf7d1i.jpg', '<p style=\"text-align: right;\"><strong>تفاصيل أكثر عن خدمة نجارة وتركيب أثاث:</strong></p>\r\n<p style=\"text-align: right;\">نجارة وتركيب أثاث من الخدمات التي تحتاج دقة عالية أثناء قيام فني نجارة أو عامل تركيب ستائر القيام بها وذلك لأن تركيب مرايا أو حتى تركيب اثاث المنزل أو المنشأة ليست من المهام السهلة، فهي تحتاج أدوات ومعدّات خاصة لا يتم إتمام تركيب اثاث ايكيا إلا باستعمالها بواسطة فني تركيب أثاث على قدرٍ عالٍ من المسؤولية. يقوم الفني لدينا بالقيام بالآتي:</p>\r\n<ol>\r\n<li style=\"text-align: right;\">يقوم عامل تركيب ستائر من تطبيق بيتك بكافة المهام المتعلقة بتركيب ستائر البيت أو المنشأة باحترافية عالية دون حدوث أي ضرر أو تلف للستائر للحصول على أفضل خدمة ممكنة.</li>\r\n<li style=\"text-align: right;\">يقوم عامل تركيب ستائر لدينا بتركيب وفك الستائر بكافة أنواعها بشكل دقيق باستخدام الأساليب والتقنيات الحديثة من أجل ضمان تقديم خدمة تركيب الستائر بشكل ممتاز.</li>\r\n<li style=\"text-align: right;\">يعمل فني نجارة متمرِّس من تطبيق بيتك بتركيب اثاث المنزل كالمكاتب والخزانات في المكان المناسب بالاستعانة بجميع أدوات الفك والتركيب اللازمة لتقديم أعلى جودة في العمل وإرضاء صاحب البيت أو المنزل من كفاءته في تركيب الأثاث على نحو احترافي عالٍ.</li>\r\n<li style=\"text-align: right;\">يقوم فني تركيب مرايا بتركيب المرايا في المكان المراد في المنزل أو المنشأة بحرص شديد بحيث لا يحدث أي خدوش في المرايا وتركيبها على نحو سليم باستخدام الأدوات اللازمة لذلك.</li>\r\n<li style=\"text-align: right;\">&nbsp;&nbsp;يقوم فني نجارة لدينا بتركيب الأبواب الخشبية الجديدة وكذلك فك الأبواب الخشبية القديمة في المنزل أو المكان المطلوب.</li>\r\n<li style=\"text-align: right;\">&nbsp;&nbsp;يقدم فني النجارة النصيحة لصاحب المنزل أو المنشأة حول ماهية الأبواب الخشبية الأكثر ملائمةً للمكان المراد تركيبه، وكذلك الفرق بين أنواع الأبواب الخشبية، وبالتالي معرفة المالك بمميزات نوع معين من الأبواب الخشبية عن غيره من الأبواب.</li>\r\n</ol>', '2022-12-16 03:43:02', '2022-12-16 03:43:02', 'test'),
(13, 'التكييف', 'wxX6dLddnJEk1C3xzH4J3iXWqWPI2uXQPUfzvaRZ.jpg', '<h4 style=\"text-align: right;\"><strong>ميزات طلب خدمة التكييف من تطبيق بيتك</strong></h4>\r\n<p style=\"text-align: right;\">يقوم فني التكييف بتصليح مكيف سبليت حسب خبرته في مجال التكييف لعدة سنوات، حيث يكتشف أسباب عطل المكيف وبالتالي تحديد كيفية تصليح المكيف وذلك باستخدام كافة الأدوات التي بدورها لها أهمية كبيرة في تصليح مكيف سبليت على أكمل وجه. من هنا يمكن القول بأن هناك العديد من المميزات التي تميز فني تكييف لتصليح مكيف سبليت أو صيانة مكيفات أخرى أو تنظيف المكيفات لدينا في&nbsp;<a href=\"https://www.b8ak.com/\">تطبيق بيتك</a>، وتتمثل تلك المميزات في الآتي:</p>\r\n<p style=\"text-align: right;\">- &nbsp; إن فني التكييف في تطبيق بيتك لديه خبرة واسعة في تصليح مكيف سبليت أو صيانة مكيفات مختلفة بشكل عام، وتصليح مكيف سبليت بشكل خاص.</p>\r\n<p style=\"text-align: right;\">- &nbsp; يستخدم فني التكييف لدينا الأدوات المناسبة والحديثة من أجل فك وتركيب مكيفات السبليت بحرص وعناية شديدة، وبالتالي ضمان أن كل قطعة من قطع المكيف سواء الوحدة الداخلية أو الوحدة الخارجية لا يصيبهم أي تلف أو خدش أثناء فك وتركيب المكيفات.</p>\r\n<p style=\"text-align: right;\">- &nbsp; يتبع عامل التكييف من تطبيق بيتك الطريقة المبتكرة في تنظيف المكيف من الخارج وكذلك من جهة الأسلاك في الداخل.</p>\r\n<p style=\"text-align: right;\">- &nbsp; يقوم عامل التكييف بتعقيم أجزاء المكيف بعد الانتهاء من تنظيف المكيف جيدًا.</p>\r\n<p style=\"text-align: right;\">- &nbsp; إن فني التكييف لدينا وكذلك العامل الذي يقوم بتنظيف المكيف على علم واسع بمكونات مكيف سبليت وأجزائه المتمثلة في وحدتين، هما: الوحدة الداخلية وهي الوحدة المسؤولة عن التبريد حيث أنها تحتوي على ملف تبريد وكذلك مروحة وقد تتضمن أيضًا السخان الكهربائي، و الوحدة الخارجية وهي الوحدة المسؤولة عن التكثيف والتي تحتوي على المكثف الهوائي والضاغط والمروحة.- &nbsp; يحدد فني التكييف إن كان السبب في عدم جودة المكيف في العمل هو نقص غاز الفريون، فيقوم بتعبئة غاز الفريون في المكيف من أجل عودة المكيف إلى الحالة الطبيعية في خروج الهواء وتهوية المكان، وبالتالي تلاشي حدوث أي عطل سببه نقص الغاز الذي يتطلب منك الاستعانة بفني تصليح مكيف فيما بعد.</p>', '2022-12-16 03:44:13', '2022-12-16 03:44:13', 'test'),
(14, 'الكهرباء', '05KHBLZ2EnVekrU2Qfku93be7lRn1KBlFIvpuF1O.jpg', '<h4 class=\"font-weight-bold arrow-before-text d-inline-block mb-4\" style=\"text-align: right;\">تشمل الخدمة</h4>\r\n<div class=\"row text-left\">\r\n<div class=\"col-md-12 my-2 pl-3 pl-md-0\" style=\"text-align: right;\">&nbsp;<a class=\"text-decoration-none font-weight-bold text-dark\" href=\"https://www.b8ak.com/sub-service/%d8%a3%d9%84%d9%88%d8%a7%d8%ad-%d8%aa%d8%a3%d8%b3%d9%8a%d8%b3-%d8%a7%d9%84%d9%83%d9%87%d8%b1%d8%a8%d8%a7%d8%a1-%d8%a7%d9%84%d8%b9%d8%af%d8%a7%d8%af/\">ألواح تأسيس الكهرباء (العداد)</a>\r\n<p class=\"mt-3 mb-4\">يقوم فنّي الكهرباء بتقديم خدمة ألواح توزيع الكهرباء (عدادات). وذلك من خلال تركيب أو فحص ألواح توزيع الكهرباء (عدادات) سواء كانت ألواح الطاقة الشمسية أو البطاريات، أو صيانة ألواح وقواطع توزيع الكهرباء.</p>\r\n<div class=\"text-right p-3\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-md-12 my-2 pl-3 pl-md-0\" style=\"text-align: right;\"><a class=\"text-decoration-none font-weight-bold text-dark\" href=\"https://www.b8ak.com/sub-service/%d8%a7%d9%84%d8%a3%d8%b3%d9%84%d8%a7%d9%83-%d8%a7%d9%84%d9%83%d9%87%d8%b1%d8%a8%d8%a7%d8%a6%d9%8a%d8%a9/\">الأسلاك الكهربائية</a>\r\n<p class=\"mt-3 mb-4\">لا شك أن المهام المتعلقة بالأسلاك الكهربائية تتطلب من صاحب المنزل أو المنشأة الحرص الشديد أثناء القيام بها. وهنا تجدر الأهمية إلى ضرورة طلب الخدمة من مختص ولا سيما من مهندس كهربائي أو فنّي كهربائي. يقوم الفني بخدمة تمديد الأسلاك الكهربائية الجديدة أو صيانتها حسب معاينة مزوِّد الخدمة للعمل. كما&hellip;</p>\r\n<div class=\"text-right p-3\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-md-12 my-2 pl-3 pl-md-0\" style=\"text-align: right;\">\r\n<p class=\"mt-3 mb-4\">يتم تركيب ثريات المنزل حسب ما يتناسب مع ديكور المنزل أو المكان المطلوب تركيب الثريات السقف فيه. ويتم تركيب ثريات المنزل من خلال الاستعانة بفني كهرباء على خبرة عالية بتركيب الثريات بعد طلب خدمة الكهرباء من تطبيق بيتك. قم بطلب خدمة الكهرباء والحصول عليها من مزوِّدي الخدمات لدينا من خلال&hellip;</p>\r\n<div class=\"text-right p-3\"><a class=\"text-decoration-none font-weight-bold text-dark\" href=\"https://www.b8ak.com/sub-service/%d8%a7%d9%84%d8%ab%d8%b1%d9%8a%d8%a7%d8%aa-%d8%a7%d9%84%d9%86%d8%ac%d9%81/\">تركيب ثريات</a></div>\r\n</div>\r\n<div class=\"col-md-12 my-2 pl-3 pl-md-0\" style=\"text-align: right;\"><a class=\"text-decoration-none font-weight-bold text-dark\" href=\"https://www.b8ak.com/sub-service/%d8%aa%d8%a3%d8%b3%d9%8a%d8%b3-%d9%83%d9%87%d8%b1%d8%a8%d8%a7%d8%a1/\">تأسيس الكهرباء</a>\r\n<p class=\"mt-3 mb-4\">يتم تأسيس كهرباء المنازل من خلال طلب خدمة الكهرباء عبر&nbsp; تطبيق بيتك والاستعانة بفني كهرباء ذو خبرة عالية بخدمات كهرباء المنزل، وتتضمن هذه الخدمة التالي: - تأسيس كهرباء جديدة للغرف أو تجديد التأسيس الحالي وقت الحاجة. - تمديد الأسلاك الكهرباء حسب التوزيع المناسب لتصميم الغرف والمساحات والتي يصممها المهندس الكهربائي&hellip;</p>\r\n</div>\r\n</div>', '2022-12-16 03:46:59', '2022-12-16 03:46:59', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `degree` enum('bachelor','masters','phd') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `duration` time NOT NULL DEFAULT '00:45:00',
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailpay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `service_id`, `language_id`, `name`, `lastname`, `specialization`, `status`, `phone2`, `phone`, `description`, `email`, `avater`, `address`, `files`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `degree`, `provider`, `provider_id`, `access_token`, `facebook_id`, `amount`, `duration`, `whatsapp`, `facebook`, `link`, `emailpay`) VALUES
(1, 1, NULL, NULL, 'adminX', NULL, NULL, 1, NULL, NULL, NULL, 'admin@gmail.com', 'jtxmyNGGs09wAlMyNOgpHt0enZSqpAzfXI6C0GWq.png', NULL, NULL, '0000-00-00 00:00:00', '$2y$10$7t5.ukK3iIaEBbO/BfjlpOEuoL4rR8KeMnMyUqrXeDRZ/RUH4M/j2', 'x6bP5c0Vh871KRSOQzCZJvzQFvoL2ckZc4Rcw59ecZiqEiHbv8cxIzww88sb', '2022-10-20 07:57:02', '2022-12-16 06:09:46', NULL, NULL, NULL, NULL, NULL, 150.00, '00:45:00', NULL, NULL, NULL, NULL),
(24, 1, 8, 5, 'yousf', 'trt', 'دبلوم سباكة', 1, 'English', '584865', 'نبذة تعريفيةhhhjhh', 'yousf@gmail.com', '8KtS4MlCIcGHrKofnWZ847QOHhMMG4r9gOUBJoOY.png', 'GAZ', NULL, '2022-12-16 07:05:45', '$2y$10$7t5.ukK3iIaEBbO/BfjlpOEuoL4rR8KeMnMyUqrXeDRZ/RUH4M/j2', NULL, '2022-12-16 04:04:15', '2023-01-20 12:22:01', NULL, NULL, NULL, NULL, NULL, 10.00, '00:45:00', NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, 'ali', NULL, NULL, 1, NULL, NULL, NULL, 'ali@gmail.com', NULL, NULL, NULL, '2022-12-16 07:52:12', '$2y$10$SNjj9JThceHJvJ8eowK1RuNye/R5PY4OC.9GAWQ8laMqrJI/OUHlC', NULL, '2022-12-16 04:08:18', '2022-12-16 06:04:58', NULL, NULL, NULL, NULL, NULL, NULL, '00:45:00', NULL, NULL, NULL, NULL),
(28, 3, 14, 2, 'mona', 'ali', 'كهربائي', 1, 'عربي', NULL, 'نبذة عن', 'mona@gmail.com', 'zT7y9fxDqZu9RluGzDKMaMOGuboNsTGE63thKFz6.png', 'اااا', NULL, NULL, '$2y$10$JFkJKOD12CkycH7RanBFMOhvGy8VafXKbFb37OO8zSjAbVJ.KpTqq', NULL, '2023-01-20 12:41:51', '2023-01-20 12:47:16', NULL, NULL, NULL, NULL, NULL, 50.00, '00:45:00', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_advisor_id_foreign` (`advisor_id`),
  ADD KEY `purchases_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_emailpay_unique` (`emailpay`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_service_id_foreign` (`service_id`),
  ADD KEY `users_language_id_foreign` (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_advisor_id_foreign` FOREIGN KEY (`advisor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `purchases_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
