-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jul 2018 pada 13.49
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_efish`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `api_log_name` varchar(255) DEFAULT NULL,
  `api_log_description` varchar(255) DEFAULT NULL,
  `api_log_error_code` varchar(255) DEFAULT NULL,
  `api_log_param` text,
  `api_log_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `api_logs`
--

INSERT INTO `api_logs` (`id`, `api_log_name`, `api_log_description`, `api_log_error_code`, `api_log_param`, `api_log_created_at`) VALUES
(1, 'VALIDATE_LOGIN', 'Username not found!', '404', '{"username":null,"password":"da39a3ee5e6b4b0d3255bfef95601890afd80709"}', '2017-10-04 04:25:30'),
(2, 'VALIDATE_LOGIN', 'Username not found!', '404', '{"username":null,"password":"da39a3ee5e6b4b0d3255bfef95601890afd80709"}', '2017-10-04 04:25:30'),
(3, 'VALIDATE_LOGIN', 'Missing required parameter username!', '404', '{"username":null,"password":"da39a3ee5e6b4b0d3255bfef95601890afd80709"}', '2017-10-04 04:25:30'),
(4, 'VALIDATE_LOGIN', 'Missing required parameter username!', '404', '{"username":null,"password":"da39a3ee5e6b4b0d3255bfef95601890afd80709"}', '2017-10-04 04:25:30'),
(5, 'REGISTER', 'Missing required parameter identity_number!', '404', '{"username":"budismartcloud","password":"07Budi07","identity_number":null,"address":null,"phone_number":null,"name":null,"email":null}', '2017-10-04 04:26:48'),
(6, 'REGISTER', 'Registration failed!', '403', '{"username":"natsu","password":"123456","identity_number":"2110151001","address":"Magnolia","phone_number":"0000000000000","name":"Natsu Dragnell","email":"natsu_dragnel@gmail.com"}', '2017-10-04 04:28:06'),
(7, 'REGISTER', 'Missing required parameter name!', '404', '{"username":"Rafif","password":"123","identity_number":"07842","address":"Gdhdhd","phone_number":"087575","name":null,"email":"Rafif@yahi.com"}', '2017-10-11 02:52:01'),
(8, 'REGISTER', 'Missing required parameter password!', '404', '{"username":"Rafifditya","password":null,"identity_number":"Rafif@hao.com","address":"123","phone_number":"07575","name":"Hornd","email":"087547"}', '2017-10-11 03:08:27'),
(9, 'REGISTER', 'Missing required parameter password!', '404', '{"username":"Rafif","password":null,"identity_number":"Rafif@hon.com","address":"123","phone_number":"0457","name":"Gdgskx","email":"07872"}', '2017-10-11 03:09:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `city_provinces_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_provinces_id`) VALUES
(2, 'Surabaya', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `couriers`
--

CREATE TABLE `couriers` (
  `id` int(11) NOT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `courier_identity_number` varchar(255) DEFAULT NULL,
  `courier_address` varchar(255) DEFAULT NULL,
  `courier_phone_number` varchar(12) DEFAULT NULL,
  `courier_user_name` varchar(255) DEFAULT NULL,
  `courier_password` varchar(255) DEFAULT NULL,
  `courier_picture` varchar(255) DEFAULT NULL,
  `courier_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courier_assignments`
--

CREATE TABLE `courier_assignments` (
  `id` int(11) NOT NULL,
  `courier_assignment_created_at` timestamp NULL DEFAULT NULL,
  `courier_assignment_modified_at` timestamp NULL DEFAULT NULL,
  `courier_assignment_is_received` int(11) DEFAULT NULL,
  `courier_assignment_couriers_id` int(11) NOT NULL,
  `courier_assignment_orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fishes`
--

CREATE TABLE `fishes` (
  `id` int(11) NOT NULL,
  `fish_name` varchar(255) DEFAULT NULL,
  `fish_fish_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fishes`
--

INSERT INTO `fishes` (`id`, `fish_name`, `fish_fish_categories_id`) VALUES
(1, 'Ikan Lele', 3),
(3, 'Ikan Bandeng', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fish_categories`
--

CREATE TABLE `fish_categories` (
  `id` int(11) NOT NULL,
  `fish_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fish_categories`
--

INSERT INTO `fish_categories` (`id`, `fish_category_name`) VALUES
(1, 'Air Laut'),
(2, 'Air Payau'),
(3, 'Air Tawar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fish_items`
--

CREATE TABLE `fish_items` (
  `id` int(11) NOT NULL,
  `fish_item_name` varchar(255) DEFAULT NULL,
  `fish_item_fishes_id` int(11) NOT NULL,
  `fish_item_fish_size_categories_id` int(11) NOT NULL,
  `fish_item_weight` float DEFAULT NULL,
  `fish_item_quantity` int(11) DEFAULT NULL,
  `fish_item_specific_price` int(11) DEFAULT NULL,
  `fish_item_normal_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fish_items`
--

INSERT INTO `fish_items` (`id`, `fish_item_name`, `fish_item_fishes_id`, `fish_item_fish_size_categories_id`, `fish_item_weight`, `fish_item_quantity`, `fish_item_specific_price`, `fish_item_normal_price`) VALUES
(1, 'Bandeng Super', 3, 3, 8, 3, 10000, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fish_size_categories`
--

CREATE TABLE `fish_size_categories` (
  `id` int(11) NOT NULL,
  `fish_size_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `fish_size_categories`
--

INSERT INTO `fish_size_categories` (`id`, `fish_size_category_name`) VALUES
(1, 'Kecil'),
(2, 'Sedang'),
(3, 'Besar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `link_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_is_parent` tinyint(1) NOT NULL DEFAULT '0',
  `link_parent_id` int(11) NOT NULL DEFAULT '0',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `links`
--

INSERT INTO `links` (`id`, `link_position`, `link_is_parent`, `link_parent_id`, `link_name`, `link_url`) VALUES
(1, 'footer', 1, 0, 'Tentang EEFISH', 'http://localhost/client/efish/about'),
(2, 'footer', 1, 0, 'Jenis Pelayanan', 'http://localhost/client/efish/harga-sewa-layanan'),
(4, 'sidebar', 1, 0, 'Tentang EEFISH', 'http://localhost/client/efish/about'),
(5, 'sidebar', 1, 0, 'Harga Sewa Layanan', 'http://localhost/client/efish/harga-sewa-layanan'),
(6, 'sidebar', 0, 5, 'Harga Benih Ikan', 'http://localhost/client/efish/harga-benih-ikan'),
(7, 'sidebar', 0, 5, 'Penyewaan Aula', 'http://localhost/client/efish/penyewaan-aula'),
(8, 'sidebar', 0, 5, 'Perpustakaan', 'http://localhost/client/efish/perpustakaan'),
(9, 'sidebar', 0, 5, 'Penyewaan Laboratorium', 'http://localhost/client/efish/penyewaan-laboratorium'),
(10, 'sidebar', 1, 0, 'Pelatihan', 'http://localhost/client/efish/pelatihan'),
(11, 'footer', 1, 0, 'Harga Benih & Komoditi', 'http://localhost/client/efish/harga-benih-ikan'),
(12, 'footer', 1, 0, 'Ruang Pertemuan', 'http://localhost/client/efish/penyewaan-aula'),
(13, 'footer', 1, 0, 'Pelatihan', 'http://localhost/client/efish/pelatihan'),
(14, 'sidebar', 0, 5, 'Penginapan', 'http://localhost/client/efish/penginapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_systems`
--

CREATE TABLE `message_systems` (
  `id` int(11) NOT NULL,
  `message_system_code` varchar(255) DEFAULT NULL,
  `message_system_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `message_systems`
--

INSERT INTO `message_systems` (`id`, `message_system_code`, `message_system_description`) VALUES
(1, '302', 'Found'),
(2, '303', 'See Other'),
(3, '304', 'Not Modified'),
(4, '307', 'Temporary Redirect'),
(5, '308', 'Resume Incomplete'),
(6, '400', 'Bad Request'),
(7, '401', 'Unauthorized'),
(8, '403', 'Forbidden'),
(9, '404', 'Not Found'),
(10, '405', 'Method Not Allowed'),
(11, '409', 'Conflict'),
(12, '410', 'Gone'),
(13, '411', 'Length Required'),
(14, '412', 'Precondition Failed'),
(15, '413', 'Payload Too Large'),
(16, '416', 'Requested Range Not Satisfiable'),
(17, '429', 'Too Many Requests'),
(18, '500', 'Internal Server Error'),
(19, '502', 'Bad Gateway'),
(20, '503', 'Service Unavailable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_07_10_012429_pages', 1),
(5, '2018_07_09_225439_links', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_users_id` int(11) NOT NULL,
  `order_periods_id` int(11) NOT NULL,
  `order_order_kinds_id` int(11) NOT NULL,
  `order_created_at` timestamp NULL DEFAULT NULL,
  `order_modified_at` timestamp NULL DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `order_shipping_cost` int(11) DEFAULT NULL,
  `order_order_status_id` int(11) NOT NULL,
  `order_user_feedback` int(11) DEFAULT NULL,
  `order_payment_types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_item_quantity` int(11) DEFAULT NULL,
  `fish_items_id` int(11) NOT NULL,
  `orde_item_orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item_logs`
--

CREATE TABLE `order_item_logs` (
  `id` int(11) NOT NULL,
  `order_item_log_created_at` timestamp NULL DEFAULT NULL,
  `order_item_log_orders_id` int(11) NOT NULL,
  `order_item_log_order_item_quantity` int(11) DEFAULT NULL,
  `order_item_log_fish_items_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_kinds`
--

CREATE TABLE `order_kinds` (
  `id` int(11) NOT NULL,
  `order_kind_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status_name` varchar(255) DEFAULT NULL,
  `order_status_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `title`, `link`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Tentang EEFISH', 'about', '<h3>Tentang EEFISH</h3>\n    <p>Penetapan pelayanan UPT PBL Situbondo berdasarkan UU No 25 tahun 2009 tercakap komponen proses layanan dan pengelolaan</p>\n    <h5>Prinsip</h5>\n    <p>Didalam mengembangkan usahanya, UPT Pengembangan Budidaya Laut mempunyai prinsip:\n        <ul style="color: #000">\n            <li>Sederhana</li>\n            <li>Partisipatif</li>\n            <li>Akuntabel</li>\n            <li>Berkelanjutan</li>\n            <li>Berkeadilan</li>\n        </ul>\n    </p>\n    <h5>Jenis Layanan</h5>\n    <p>Berdasarkan SOP (Standart Operasional Prosedure) layanan kami meliputi:\n        <ul style="color: #000">\n            <li>Magang</li>\n            <li>Pelatihan</li>\n            <li>Praktek kerja lapangan</li>\n            <li>Penelitian</li>\n            <li>Pendampingan teknologi</li>\n            <li>Pemasaran telur/benih</li>\n        </ul>\n    </p>\n    <h5>Jenis Benih Ikan</h5>\n    <p> Macam-macam jenis benih ikan yang kami jual sebagai berikut:\n        <ul style="color: #000">\n            <li>Kerapu macan</li>\n            <li>Kerapu tikus</li>\n            <li>Kerapu cantang</li>\n            <li>Kerapu cantik</li>\n            <li>Kakap putih</li>\n            <li>Udang vaname</li>\n            <li>Rajungan</li>\n            <li>Rumput laut</li>\n        </ul>\n    </p>\n    <h5>Ikan Laut Siap Konsumsi</h5>\n    <p> Macam-macam jenis ikan laut siap konsumsi yang pasarkan sebagai berikut:\n        <ul style="color: #000">\n            <li>Kerapu macan</li>\n            <li>Kerapu cantang</li>\n            <li>Kerapu cantik</li>\n            <li>Udang vaname</li>\n        </ul>\n    </p>\n    <h5>Laboratorium</h5>\n    <p> Laboratorium kami dilengkapi dengan bebagai teknologi sehingga sangat efektif dan efisien untuk melakukan pengujian air, benih, obat, dan lain sebagainya.\n        Adapun yang bisa diuji dilaboratorium kami meliputi:\n        <ul style="color: #000">\n            <li>Uji kualitas air : DO,PH, Suhu , Salinitas, nitrat, nitrit, amoniak, sulfit</li>\n            <li>Penghitungan Plankton ( Chlorella,rotifer,sketonema </li>\n        </ul>\n    </p>', NULL, '2018-07-09 21:25:59'),
(4, 'Harga Sewa Layanan', 'harga-sewa-layanan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>Harga Sewa Layanan</h5>\r\n</body>\r\n</html>', '2018-07-10 01:46:08', '2018-07-10 01:46:08'),
(5, 'Harga Benih Ikan', 'harga-benih-ikan', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<h3>Harga Benih Ikan</h3>\n<p>Harga dibawah ini merupakan harga benih ikan menurut jenis komoditasnya</p>\n<h5>1. Telur kerapu cantang</h5>\n<table class="table table-responsive table-bordered">\n<thead>\n<tr>\n<th rowspan="2">No</th>\n<th rowspan="2">Nama Komoditas</th>\n<th rowspan="2">Ketersediaan Jumlah (butir)</th>\n<th rowspan="2">Harga Perbutir (Rp)</th>\n<th colspan="2">Keterangan</th>\n</tr>\n<tr>\n<th>Ada</th>\n<th>Tidak</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td>1</td>\n<td>Telur kerapu cantang</td>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>2. Benih kerapu cantang</h5>\n<table class="table table-responsive table-bordered">\n<thead>\n<tr>\n<th rowspan="2">No</th>\n<th rowspan="2">Nama Komoditas</th>\n<th rowspan="2">Ketersediaan Size (cm)</th>\n<th rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th rowspan="2">Harga Perekor (Rp)</th>\n<th colspan="2">Keterangan</th>\n</tr>\n<tr>\n<th>Ada</th>\n<th>Tidak</th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<td rowspan="2">1</td>\n<td rowspan="2">Kerapu cantang</td>\n<td>2,5 - 3,0</td>\n<td>&nbsp;</td>\n<td>3200/ekr</td>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n<tr>\n<td>Gelondongan (&gt;4 - 10)</td>\n<td>&nbsp;</td>\n<td>1000/ekr</td>\n<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>3. Benih kerapu cantik</h5>\n<table class="table table-responsive table-bordered" style="height: 236px;">\n<thead>\n<tr style="height: 50px;">\n<th style="height: 100px; width: 35px;" rowspan="2">No</th>\n<th style="height: 100px; width: 91px;" rowspan="2">Nama Komoditas</th>\n<th style="height: 100px; width: 115px;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="height: 100px; width: 133px;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="height: 100px; width: 98px;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="height: 50px; width: 92px;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 50px;">\n<th style="height: 50px; width: 41px;">Ada</th>\n<th style="height: 50px; width: 51px;">Tidak</th>\n</tr>\n</thead>\n<tbody>\n<tr style="height: 68px;">\n<td style="height: 68px; width: 35px;" rowspan="2">1</td>\n<td style="height: 68px; width: 91px;" rowspan="2">Kerapu cantang</td>\n<td style="height: 68px; width: 115px;">2,5 - 3,0</td>\n<td style="height: 68px; width: 133px;">&nbsp;</td>\n<td style="height: 68px; width: 98px;">2200/ekr</td>\n<td style="height: 68px; width: 41px;">&nbsp;</td>\n<td style="height: 68px; width: 51px;">&nbsp;</td>\n</tr>\n<tr style="height: 68px;">\n<td style="height: 68px; width: 115px;">Gelondongan (&gt;4 - 10)</td>\n<td style="height: 68px; width: 133px;">&nbsp;</td>\n<td style="height: 68px; width: 98px;">750/cm</td>\n<td style="height: 68px; width: 41px;">&nbsp;</td>\n<td style="height: 68px; width: 51px;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>4.&nbsp;Benih kerapu macan</h5>\n<table style="border-collapse: collapse; width: 100%; height: 195px;" border="1">\n<tbody>\n<tr style="height: 48px;">\n<th style="width: 14.2857%; height: 97px; text-align: center; vertical-align: middle;" rowspan="2">No&nbsp;</th>\n<th style="width: 14.2857%; height: 97px; text-align: center; vertical-align: middle;" rowspan="2">Nama Komoditas</th>\n<th style="width: 14.2857%; height: 97px; text-align: center; vertical-align: middle;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="width: 13.9324%; height: 97px; text-align: center; vertical-align: middle;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="width: 14.639%; height: 97px; text-align: center; vertical-align: middle;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="width: 28.5714%; text-align: center; height: 48px; vertical-align: middle;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 49px;">\n<th style="width: 14.2857%; height: 49px; text-align: center; vertical-align: middle;">Ada</th>\n<th style="width: 14.2857%; height: 49px; text-align: center; vertical-align: middle;">Tidak</th>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px; text-align: center;" rowspan="2">1</td>\n<td style="width: 14.2857%; height: 49px;" rowspan="2">Kerapu macan</td>\n<td style="width: 14.2857%; height: 49px;">2,5 - 3,0</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">2100/ekr</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px;">Gelondongan (&gt;4 - 10)</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">600/ekr</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>5. Benih Kerapu TIkus</h5>\n<table style="border-collapse: collapse; width: 100%;" border="1">\n<tbody>\n<tr style="height: 48px;">\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">No&nbsp;</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Nama Komoditas</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="width: 13.9324%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="width: 14.639%; height: 97px; text-align: center;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="width: 28.5714%; text-align: center; height: 48px;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 49px;">\n<th style="width: 14.2857%; height: 49px; text-align: center;">Ada</th>\n<th style="width: 14.2857%; height: 49px; text-align: center;">Tidak</th>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px; text-align: center;" rowspan="2">1</td>\n<td style="width: 14.2857%; height: 49px;" rowspan="2">Benih Kerapu Tikus</td>\n<td style="width: 14.2857%; height: 49px;">2,5 - 3,0</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">3000/ekr</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px;">Gelondongan (&gt;4 - 10)</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">1000/cm</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>6. Benih Kakap Putih</h5>\n<table style="border-collapse: collapse; width: 100%; height: 244px;" border="1">\n<tbody>\n<tr style="height: 48px;">\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">No&nbsp;</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Nama Komoditas</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="width: 13.9324%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="width: 14.639%; height: 97px; text-align: center;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="width: 28.5714%; text-align: center; height: 48px;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 49px;">\n<th style="width: 14.2857%; height: 49px; text-align: center;">Ada</th>\n<th style="width: 14.2857%; height: 49px; text-align: center;">Tidak</th>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px; text-align: center;" rowspan="4">1</td>\n<td style="width: 14.2857%; height: 49px;" rowspan="4">Benih Kakap Putih</td>\n<td style="width: 14.2857%; height: 49px;">3,0</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">2500/ekr</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%;">\nGelondongan (&gt;7 - 10)\n</td>\n<td style="width: 13.9324%;">&nbsp;</td>\n<td style="width: 14.639%;">650/cm</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n<tr>\n<td style="width: 14.2857%;">\n1 ons\n</td>\n<td style="width: 13.9324%;">&nbsp;</td>\n<td style="width: 14.639%;">6500/ons</td>\n<td style="width: 14.2857%;">&nbsp;</td>\n<td style="width: 14.2857%;">&nbsp;</td>\n</tr>\n<tr>\n<td style="width: 14.2857%;">\n500gr\n</td>\n<td style="width: 13.9324%;">&nbsp;</td>\n<td style="width: 14.639%;">65000/kg</td>\n<td style="width: 14.2857%;">&nbsp;</td>\n<td style="width: 14.2857%;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5 style="color: #626262;">7. Rajungan</h5>\n<table style="border-collapse: collapse; width: 100%; height: 195px;" border="1">\n<tbody>\n<tr style="height: 48px;">\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">No&nbsp;</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Nama Komoditas</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="width: 13.9324%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="width: 14.639%; height: 97px; text-align: center;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="width: 28.5714%; text-align: center; height: 48px;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 49px;">\n<th style="width: 14.2857%; height: 49px; text-align: center;">Ada</th>\n<th style="width: 14.2857%; height: 49px; text-align: center;">Tidak</th>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px; text-align: center;" rowspan="2">1</td>\n<td style="width: 14.2857%; height: 49px;" rowspan="2">Rajungan</td>\n<td style="width: 14.2857%; height: 49px;">2 - 3</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">2500/ekr</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px;">Gelondongan 200</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">10rb/kg</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>8. Udang vaname</h5>\n<table style="width: 100%; border-collapse: collapse; height: 195px;" border="1">\n<tbody>\n<tr style="height: 48px;">\n<th style="width: 14.2857%; height: 97px; vertical-align: middle; text-align: center;" rowspan="2">No&nbsp;</th>\n<th style="width: 14.2857%; height: 97px; vertical-align: middle; text-align: center;" rowspan="2">Nama Komoditas</th>\n<th style="width: 14.2857%; height: 97px; vertical-align: middle; text-align: center;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="width: 13.9324%; height: 97px; vertical-align: middle; text-align: center;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="width: 14.639%; height: 97px; vertical-align: middle; text-align: center;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="width: 28.5714%; height: 48px; vertical-align: middle; text-align: center;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 49px;">\n<th style="width: 14.2857%; height: 49px; vertical-align: middle; text-align: center;">Ada</th>\n<th style="width: 14.2857%; height: 49px; vertical-align: middle; text-align: center;">Tidak</th>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px; text-align: center;" rowspan="2">1</td>\n<td style="width: 14.2857%; height: 98px;" rowspan="2">Udang vaname</td>\n<td style="width: 14.2857%; height: 49px;">Benur PL5</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">10/ekr</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px;">Konsumsi 100</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">55rb/kg</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<h5>9. Rumput Laut</h5>\n<table style="border-collapse: collapse; width: 99.5789%; height: 146px;" border="1">\n<tbody>\n<tr style="height: 48px;">\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">No&nbsp;</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Nama Komoditas</th>\n<th style="width: 14.2857%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Size (cm)</th>\n<th style="width: 13.9324%; height: 97px; text-align: center;" rowspan="2">Ketersediaan Jumlah (ekor)</th>\n<th style="width: 14.639%; height: 97px; text-align: center;" rowspan="2">Harga Perekor (Rp)</th>\n<th style="width: 28.5714%; text-align: center; height: 48px;" colspan="2">Keterangan</th>\n</tr>\n<tr style="height: 49px;">\n<th style="width: 14.2857%; height: 49px; text-align: center;">Ada</th>\n<th style="width: 14.2857%; height: 49px; text-align: center;">Tidak</th>\n</tr>\n<tr style="height: 49px;">\n<td style="width: 14.2857%; height: 49px; text-align: center;">1</td>\n<td style="width: 14.2857%; height: 49px;">Rula</td>\n<td style="width: 14.2857%; height: 49px;">Basah</td>\n<td style="width: 13.9324%; height: 49px;">&nbsp;</td>\n<td style="width: 14.639%; height: 49px;">1000/kg</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n<td style="width: 14.2857%; height: 49px;">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>', '2018-07-10 01:46:24', '2018-07-10 03:10:58'),
(6, 'Penyewaan Aula', 'penyewaan-aula', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>Penyewaan Aula</h5>\r\n<p>Untuk meningkatkan pelayanan kepada konsumen, kami juga menyediakan penyewaan Aula (ruang pertemuan) untuk berbagai acara. Berikut ini harga yang kami tawarkan.</p>\r\n<p><strong>Luas 24,960 m2</strong></p>\r\n<table style="border-collapse: collapse; width: 100%;" border="1">\r\n<tbody>\r\n<tr>\r\n<th style="width: 20%; text-align: center; vertical-align: middle;">No</th>\r\n<th style="width: 20%; text-align: center; vertical-align: middle;">Peruntukan</th>\r\n<th style="width: 20%; text-align: center; vertical-align: middle;">Kapasitas</th>\r\n<th style="width: 20%; text-align: center; vertical-align: middle;">Fasilitas</th>\r\n<th style="width: 20%; text-align: center; vertical-align: middle;">Disewakan Perhari (Rp)</th>\r\n</tr>\r\n<tr>\r\n<td style="width: 20%; text-align: center;">1</td>\r\n<td style="width: 20%;">Pelatihan</td>\r\n<td style="width: 20%; text-align: center;">30-50&nbsp;</td>\r\n<td style="width: 20%;">Backdrop (panggung)&nbsp;</td>\r\n<td style="width: 20%;">I.OOO.OOO</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 20%; text-align: center;">2</td>\r\n<td style="width: 20%;">Resepsi / pertemuan</td>\r\n<td style="width: 20%; text-align: center;">70-80&nbsp;</td>\r\n<td style="width: 20%;">Mej a/kursi AC Mic wairless dan sound s stem</td>\r\n<td style="width: 20%;">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 20%; text-align: center;">3</td>\r\n<td style="width: 20%;">Dll (kondisional)&nbsp;</td>\r\n<td style="width: 20%;">&nbsp;</td>\r\n<td style="width: 20%;">&nbsp;</td>\r\n<td style="width: 20%;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '2018-07-10 01:46:41', '2018-07-10 04:00:50'),
(7, 'Perpustakaan', 'perpustakaan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>Perpustakaan</h5>\r\n<table style="border-collapse: collapse; width: 100%; height: 575px;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<td style="width: 25%; height: 67px;">No</td>\r\n<td style="width: 25%; height: 67px;">Lingkup buku/materi</td>\r\n<td style="width: 25%; height: 67px;">Fasilitas</td>\r\n<td style="width: 25%; height: 67px;">Keterangan</td>\r\n</tr>\r\n<tr style="height: 67px;">\r\n<td style="width: 25%; text-align: center; height: 67px;">1</td>\r\n<td style="width: 25%; height: 67px;">Umum ( 11mu Dasar )</td>\r\n<td style="width: 25%; height: 508px;" rowspan="10">\r\n<ul>\r\n<li>Rak buku</li>\r\n<li><span style="font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;">Ruang baca</span></li>\r\n<li>Meja, kursi</li>\r\n<li>AC</li>\r\n<li>Petugas</li>\r\n</ul>\r\n</td>\r\n<td style="width: 25%; height: 508px;" rowspan="10">\r\n<ul>\r\n<li>Tidak ada pungutan/tarif</li>\r\n<li>Peminjaman / Pengembalian buku sesuai aturan yang berlaku</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">2</td>\r\n<td style="width: 25%; height: 49px;">Undang &mdash; undang</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">3</td>\r\n<td style="width: 25%; height: 49px;">Budidaya</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">4</td>\r\n<td style="width: 25%; height: 49px;">Laporan PKL</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">5</td>\r\n<td style="width: 25%; height: 49px;">Skripsi</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">6</td>\r\n<td style="width: 25%; height: 49px;">Proposal</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">7</td>\r\n<td style="width: 25%; height: 49px;">Laporan Tahunan perikananjatim</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">8</td>\r\n<td style="width: 25%; height: 49px;">Laporan kinerj a</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">9</td>\r\n<td style="width: 25%; height: 49px;">Majalah / buletin</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 25%; text-align: center; height: 49px;">10</td>\r\n<td style="width: 25%; height: 49px;">Lain lain (brosur,leaflet,Juknis,Jukers)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '2018-07-10 01:46:58', '2018-07-10 04:12:24'),
(8, 'Penyewaan Laboratorium', 'penyewaan-laboratorium', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>Penyewaan Laboratorium</h5>\r\n<table style="border-collapse: collapse; width: 96.5306%; height: 771px;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<th style="width: 20%; height: 67px; text-align: center;">No</th>\r\n<th style="width: 20%; height: 67px; text-align: center;">Parameter Uji</th>\r\n<th style="width: 20%; height: 67px; text-align: center;" colspan="3">Tarif</th>\r\n</tr>\r\n<tr style="height: 67px;">\r\n<th style="width: 20%; height: 67px; text-align: center;">&nbsp;</th>\r\n<th style="width: 20%; height: 67px; text-align: center;">&nbsp;</th>\r\n<th style="width: 20%; height: 67px; text-align: center;">Tarif Persample</th>\r\n<th style="width: 20%; height: 67px; text-align: center;">Test kit</th>\r\n<th style="width: 20%; height: 67px; text-align: center;">Spektro</th>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 441px; text-align: center;" rowspan="9">1</td>\r\n<td style="width: 20%; height: 49px;"><strong>Kualitas Air</strong></td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">D O</td>\r\n<td style="width: 20%; height: 49px; text-align: center;">10.000</td>\r\n<td style="width: 20%; height: 49px; text-align: center;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px; text-align: center;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">P H</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">10.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Suhu</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">5.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Salinitas</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">10.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Nitrat</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">40.000</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Nitrit</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">40.000</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Amoniak</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">40.000</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Sulfit</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; text-align: center; height: 49px;">40.000</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; text-align: center; height: 49px;" rowspan="4">2</td>\r\n<td style="width: 20%; height: 49px;"><strong>Plankton</strong></td>\r\n<td style="width: 20%; text-align: center; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Chlorella<strong><br /></strong></td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">Rotifer<strong><br /></strong></td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 20%; height: 49px;">sketonema<strong><br /></strong></td>\r\n<td style="width: 20%; text-align: center; height: 49px;">25.000</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n<td style="width: 20%; height: 49px;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</body>\r\n</html>', '2018-07-10 01:47:16', '2018-07-10 04:18:59'),
(9, 'Pelatihan', 'pelatihan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>Pelatihan Di UPT PNL Situbondo</h5>\r\n<p><strong>Tujuan</strong>:</p>\r\n<ul>\r\n<li>Guna meningkatkan kualitas SDM</li>\r\n<li>Profesionalisme dan ahli teknis pembenihan/ budidaya komoditas laut</li>\r\n<li>Sosialisasi ke pembudidaya T</li>\r\n<li>ranformasi İPTEK</li>\r\n</ul>\r\n<p><strong>Sasaran</strong> : Pembudidaya/ Pembenih komoditas laut</p>\r\n<p><strong>Jenis pelatihan meliputi :</strong></p>\r\n<ul>\r\n<li>Pembenihan kerapu</li>\r\n<li>Budidaya kerapu</li>\r\n<li>Pembenihan rumput laut</li>\r\n<li>Pembenihan rajungan</li>\r\n<li>Pembenihan vaname</li>\r\n<li>Budidaya lobster di KJA&nbsp;</li>\r\n</ul>\r\n<p><strong>Substansi Materi/ bahan ajar</strong></p>\r\n<p><strong>1. Pembenihan ikan kerapu :&nbsp;</strong></p>\r\n<ul>\r\n<li>Sarana dan prasarana pembenihan</li>\r\n<li>pengelolaan pakan alami</li>\r\n<li>teknik pembenihan kerapu</li>\r\n<li>hama dan penyakit dalam pembenihan</li>\r\n<li>panen dan pemasaran</li>\r\n</ul>\r\n<p><strong>2.&nbsp;Budidaya ikan kerapu :</strong></p>\r\n<ul>\r\n<li>&nbsp;Sarana dan prasarana budidaya</li>\r\n<li>pengelolaan pakan pada budidaya</li>\r\n<li>&nbsp;teknik budidaya kerapu</li>\r\n<li>&nbsp;hama dan penyakit dalam budidaya</li>\r\n<li>panen dan pemasaran</li>\r\n</ul>\r\n<p><strong>3. Pembenihan rajungan</strong></p>\r\n<ul>\r\n<li>Sarana dan prasarana pembenihan&nbsp;</li>\r\n<li>pengelolaan pakan alami</li>\r\n<li>teknik pembenihan rajungan</li>\r\n<li>pengelolaan kualitas air</li>\r\n<li>&nbsp;panen dan pemasaran</li>\r\n</ul>\r\n<p><strong>4.&nbsp;Budidaya rumput laut</strong></p>\r\n<ul>\r\n<li>Pemilihan lokasi budidaya</li>\r\n<li>sarana dan prasarana budidaya</li>\r\n<li>teknik budidaya rula</li>\r\n<li>hama dan penyakit pada budidaya</li>\r\n<li>panen dan pemasaran</li>\r\n</ul>\r\n<p><strong>5.&nbsp;Budidaya lobster</strong></p>\r\n<ul>\r\n<li>Sarana dan prasarana budidaya lobster</li>\r\n<li>pengelolaan pakan pada budidaya</li>\r\n<li>teknik pembenihan lobster</li>\r\n<li>hama dan penyakit dalam budidaya</li>\r\n<li>&nbsp;panen dan pemasaran</li>\r\n</ul>\r\n<p><strong>6.&nbsp;Budidaya udang vaname</strong></p>\r\n<ul>\r\n<li>Sarana dan prasarana pembenihan</li>\r\n<li>&nbsp;pengelolaan pakan alami</li>\r\n<li>teknik pembenihan udang vaname</li>\r\n<li>&nbsp;hama dan penyakit dalam pembenihan</li>\r\n<li>&nbsp;panen dan pemasaran</li>\r\n</ul>\r\n</body>\r\n</html>', '2018-07-10 01:47:34', '2018-07-10 04:28:07'),
(10, 'Penginapan', 'penginapan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h5>Penginapan&nbsp;</h5>\r\n<ol>\r\n<li><strong>Guess House</strong>\r\n<table style="border-collapse: collapse; width: 100%; height: 312px;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<th style="width: 18.75%; height: 67px; text-align: center;">Kamar</th>\r\n<th style="width: 31.25%; height: 67px; text-align: center;">Jumlah Bed (Unit)</th>\r\n<th style="width: 25%; height: 67px; text-align: center;">Fasilitas</th>\r\n<th style="width: 25%; height: 67px; text-align: center;">Tarif/hari</th>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.75%; height: 49px; text-align: center;">I</td>\r\n<td style="width: 31.25%; height: 49px; text-align: center;">(2x1,8) M</td>\r\n<td style="width: 25%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh&amp;Air Mineral</li>\r\n<li>Sandal</li>\r\n</ul>\r\n</td>\r\n<td style="width: 25%; height: 49px; text-align: center;">400.000,-</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.75%; height: 49px; text-align: center;">II</td>\r\n<td style="width: 31.25%; height: 49px; text-align: center;">(2x1,8) dan (2x1,20) M</td>\r\n<td style="width: 25%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh &amp; Air Mineral</li>\r\n<li>Sandal</li>\r\n</ul>\r\n</td>\r\n<td style="width: 25%; height: 49px; text-align: center;">400.000,-</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.75%; height: 49px; text-align: center;">III</td>\r\n<td style="width: 31.25%; height: 49px; text-align: center;">(2x1,8) M</td>\r\n<td style="width: 25%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh &amp; Air Mineral</li>\r\n<li>Sandal</li>\r\n</ul>\r\n</td>\r\n<td style="width: 25%; height: 49px; text-align: center;">400.000,-</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</li>\r\n<li><strong>Villa (View Laut)</strong>\r\n<table style="border-collapse: collapse; width: 99.8929%; height: 263px;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<th style="width: 18.3036%; height: 67px; text-align: center;">Kamar</th>\r\n<th style="width: 31.6964%; height: 67px; text-align: center;">Jumlah Bed (Unit)</th>\r\n<th style="width: 12.5%; height: 67px; text-align: center;">Fasilitas</th>\r\n<th style="width: 12.5%; text-align: center; height: 67px;">Lantai</th>\r\n<th style="width: 14.2792%; height: 67px; text-align: center;">Tarif/hari</th>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.3036%; height: 49px; text-align: center;">I</td>\r\n<td style="width: 31.6964%; height: 49px; text-align: center;">(2x180) M</td>\r\n<td style="width: 12.5%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh&amp;Air Mineral</li>\r\n<li>Sandal</li>\r\n</ul>\r\n</td>\r\n<td style="width: 12.5%; height: 49px;">Atas</td>\r\n<td style="width: 14.2792%; height: 49px; text-align: center;">500.000,-</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.3036%; height: 49px; text-align: center;">II</td>\r\n<td style="width: 31.6964%; height: 49px; text-align: center;">(2x1,20) M</td>\r\n<td style="width: 12.5%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh &amp; Air Mineral</li>\r\n<li>Sandal</li>\r\n</ul>\r\n</td>\r\n<td style="width: 12.5%; height: 49px;">Bawah</td>\r\n<td style="width: 14.2792%; height: 49px; text-align: center;">500.000,-</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</li>\r\n<li><strong>Asrama</strong>\r\n<table style="border-collapse: collapse; width: 100%;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<th style="width: 18.3036%; height: 67px; text-align: center;">Kamar</th>\r\n<th style="width: 31.6964%; height: 67px; text-align: center;">Jumlah Bed (Unit)</th>\r\n<th style="width: 12.5%; height: 67px; text-align: center;">Fasilitas</th>\r\n<th style="width: 12.5%; text-align: center; height: 67px;">Lantai</th>\r\n<th style="width: 14.2792%; height: 67px; text-align: center;">Tarif/hari</th>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.3036%; height: 49px; text-align: center;">I</td>\r\n<td style="width: 31.6964%; height: 49px; text-align: center;">4 (2x1,2) M</td>\r\n<td style="width: 12.5%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh&amp;Air Mineral</li>\r\n</ul>\r\n</td>\r\n<td style="width: 12.5%; height: 49px;">Atas</td>\r\n<td style="width: 14.2792%; height: 49px; text-align: center;">500.000,-</td>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 18.3036%; height: 49px; text-align: center;">II</td>\r\n<td style="width: 31.6964%; height: 49px; text-align: center;">6 (2x1,2) M</td>\r\n<td style="width: 12.5%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/Teh &amp; Air Mineral</li>\r\n</ul>\r\n</td>\r\n<td style="width: 12.5%; height: 49px;">Atas</td>\r\n<td style="width: 14.2792%; height: 49px; text-align: center;">500.000,-</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 100%;">&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</li>\r\n<li><strong>Ruang Karaoke</strong>\r\n<table style="border-collapse: collapse; width: 100.444%; height: 256px;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<th style="width: 45.2465%; height: 67px; text-align: center;">Ukuran Ruangan</th>\r\n<th style="width: 2.71003%; height: 67px; text-align: center;">Fasilitas</th>\r\n<th style="width: 12.5%; text-align: center; height: 67px;">Keterangan</th>\r\n<th style="width: 107.687%; height: 67px; text-align: center;">Tarif/hari</th>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 45.2465%; height: 49px; text-align: center;">3,5x4x2,70 M</td>\r\n<td style="width: 2.71003%; height: 49px;">\r\n<ul>\r\n<li>Perlengkapan karaoke</li>\r\n<li>Sofa, Meja dan Kursi</li>\r\n<li>AC</li>\r\n</ul>\r\n</td>\r\n<td style="width: 12.5%; height: 49px;">Bebas Rokok (Lantai Il)</td>\r\n<td style="width: 107.687%; height: 49px; text-align: center;">50.000,-/ Jam</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</li>\r\n<li><strong>Mess</strong>\r\n<table style="border-collapse: collapse; width: 99.7855%;" border="1">\r\n<tbody>\r\n<tr style="height: 67px;">\r\n<th style="width: 10.3009%; text-align: center;">Kamar</th>\r\n<th style="width: 34.9455%; height: 67px; text-align: center;">Jumlah Bed(Unit)</th>\r\n<th style="width: 2.71003%; height: 67px; text-align: center;">Fasilitas</th>\r\n<th style="width: 12.5%; text-align: center; height: 67px;">Lantai</th>\r\n<th style="width: 2.1645%; height: 67px; text-align: center;">Tarif/hari</th>\r\n</tr>\r\n<tr style="height: 49px;">\r\n<td style="width: 10.3009%; text-align: center;">6</td>\r\n<td style="width: 34.9455%; height: 49px; text-align: center;">\r\n<p>(2x1,6) M</p>\r\n<p><span style="font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit;">(2x1,2) M</span></p>\r\n</td>\r\n<td style="width: 2.71003%; height: 49px;">\r\n<ul>\r\n<li>Dapur</li>\r\n<li>Perlengkapan Mandi</li>\r\n<li>AC dan TV</li>\r\n<li>Kopi/teh&amp;Air Mineral</li>\r\n<li>Sandal</li>\r\n</ul>\r\n</td>\r\n<td style="width: 12.5%; height: 49px;">Atas</td>\r\n<td style="width: 2.1645%; height: 49px; text-align: center;">500.000,-</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</li>\r\n</ol>\r\n</body>\r\n</html>', '2018-07-10 04:39:09', '2018-07-10 04:47:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `payment_type_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periods`
--

CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `period_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `periods`
--

INSERT INTO `periods` (`id`, `period_name`) VALUES
(1, '2016'),
(2, '2017'),
(3, '2018'),
(4, '2019'),
(5, '2020'),
(6, '2021'),
(7, '2022'),
(8, '2023'),
(9, '2024'),
(10, '2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`) VALUES
(1, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_identity_number` varchar(100) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_post_code` int(11) DEFAULT NULL,
  `user_picture` varchar(255) DEFAULT NULL,
  `user_cities_id` int(11) NOT NULL,
  `user_phone_number` varchar(12) DEFAULT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_password`, `user_identity_number`, `user_address`, `user_post_code`, `user_picture`, `user_cities_id`, `user_phone_number`, `user_full_name`, `user_email`, `user_last_login`) VALUES
(2, 'budismartcloud', 'c39be055d393b9c9fd30083dc5629f0eb93f0ff5', '2110151005', 'Jl. Klampis Jaya no. 82 Surabaya', 62115, '20171003021344-IMG-20170925-WA0010.jpg', 2, '085233020036', 'Budi Santoso', 'budisantoso@smartcloud.id', '2017-10-03 21:07:33'),
(4, 'antonio', 'cb7a271bd7b86e491f9a631b6141d68595db382b', '12345678', 'Surabaya', 62115, '20171003020845-pho_05091502072014338.JPG', 2, '123456789', 'Antonio Conte', 'antonio@gmail.com', '2017-10-04 02:47:23'),
(5, 'natsu', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2110151001', 'Magnolia', NULL, NULL, 2, '000000000000', 'Natsu Dragnell', 'natsu_dragnel@gmail.com', '2017-10-10 20:07:14'),
(6, 'Rafifditya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '075754', 'Gfjdjd', NULL, NULL, 2, '08757', 'Rafif aditya', 'Rafif@gmail.com', '2017-10-11 03:12:06'),
(7, 'Astuti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '08572548', 'Gebang', 8576, NULL, 2, '078754', 'Seria reni', 'Astuti@googlemail.com', '2017-10-10 20:37:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cities_provinces_idx` (`city_provinces_id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_assignments`
--
ALTER TABLE `courier_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courier_assignments_couriers1_idx` (`courier_assignment_couriers_id`),
  ADD KEY `fk_courier_assignments_orders1_idx` (`courier_assignment_orders_id`);

--
-- Indexes for table `fishes`
--
ALTER TABLE `fishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fishes_fish_categories1_idx` (`fish_fish_categories_id`);

--
-- Indexes for table `fish_categories`
--
ALTER TABLE `fish_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish_items`
--
ALTER TABLE `fish_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fish_items_fishes1_idx` (`fish_item_fishes_id`),
  ADD KEY `fk_fish_items_fish_size_categories1_idx` (`fish_item_fish_size_categories_id`);

--
-- Indexes for table `fish_size_categories`
--
ALTER TABLE `fish_size_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_systems`
--
ALTER TABLE `message_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users1_idx` (`order_users_id`),
  ADD KEY `fk_orders_periods1_idx` (`order_periods_id`),
  ADD KEY `fk_orders_order_kinds1_idx` (`order_order_kinds_id`),
  ADD KEY `fk_orders_order_status1_idx` (`order_order_status_id`),
  ADD KEY `fk_orders_payment_types1_idx` (`order_payment_types_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_items_fish_items1_idx` (`fish_items_id`),
  ADD KEY `fk_order_items_orders1_idx` (`orde_item_orders_id`);

--
-- Indexes for table `order_item_logs`
--
ALTER TABLE `order_item_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_item_logs_orders1_idx` (`order_item_log_orders_id`);

--
-- Indexes for table `order_kinds`
--
ALTER TABLE `order_kinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_cities1_idx` (`user_cities_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courier_assignments`
--
ALTER TABLE `courier_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fishes`
--
ALTER TABLE `fishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fish_categories`
--
ALTER TABLE `fish_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fish_items`
--
ALTER TABLE `fish_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fish_size_categories`
--
ALTER TABLE `fish_size_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `message_systems`
--
ALTER TABLE `message_systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item_logs`
--
ALTER TABLE `order_item_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_kinds`
--
ALTER TABLE `order_kinds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_cities_provinces` FOREIGN KEY (`city_provinces_id`) REFERENCES `provinces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `courier_assignments`
--
ALTER TABLE `courier_assignments`
  ADD CONSTRAINT `fk_courier_assignments_couriers1` FOREIGN KEY (`courier_assignment_couriers_id`) REFERENCES `couriers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_courier_assignments_orders1` FOREIGN KEY (`courier_assignment_orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `fishes`
--
ALTER TABLE `fishes`
  ADD CONSTRAINT `fk_fishes_fish_categories1` FOREIGN KEY (`fish_fish_categories_id`) REFERENCES `fish_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `fish_items`
--
ALTER TABLE `fish_items`
  ADD CONSTRAINT `fk_fish_items_fish_size_categories1` FOREIGN KEY (`fish_item_fish_size_categories_id`) REFERENCES `fish_size_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fish_items_fishes1` FOREIGN KEY (`fish_item_fishes_id`) REFERENCES `fishes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_order_kinds1` FOREIGN KEY (`order_order_kinds_id`) REFERENCES `order_kinds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_order_status1` FOREIGN KEY (`order_order_status_id`) REFERENCES `order_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_payment_types1` FOREIGN KEY (`order_payment_types_id`) REFERENCES `payment_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_periods1` FOREIGN KEY (`order_periods_id`) REFERENCES `periods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_users1` FOREIGN KEY (`order_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_fish_items1` FOREIGN KEY (`fish_items_id`) REFERENCES `fish_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`orde_item_orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `order_item_logs`
--
ALTER TABLE `order_item_logs`
  ADD CONSTRAINT `fk_order_item_logs_orders1` FOREIGN KEY (`order_item_log_orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_cities1` FOREIGN KEY (`user_cities_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
