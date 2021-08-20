-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 May 2021, 11:37:10
-- Sunucu sürümü: 5.7.17
-- PHP Sürümü: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `portfolyo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(200) NOT NULL,
  `banner_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_image`) VALUES
(1, '8.000 TL', 'f1.jpg'),
(2, '10.000 TL', 'f2.JPG'),
(3, '5.000 TL', 'f3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `menu_id` int(11) NOT NULL,
  `menu_yazi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `menu_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `menu_parentid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`menu_id`, `menu_yazi`, `menu_link`, `menu_parentid`) VALUES
(1, 'ANASAYFA', '', 1),
(2, 'HAKKIMDA', '', 2),
(3, 'GALERİ', '', 3),
(4, 'İLETİŞİM', '', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urunAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `urunGoruntu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunFiyat` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urunAd`, `urunGoruntu`, `urunFiyat`) VALUES
(3, 'Oppo Find x2', '/images/b_oppo-find-x2-7.png', '10699.99'),
(4, 'HTC One M7', '/images/b_htc-one-1.png', '2899.99'),
(5, 'Samsung Galaxy s21', '/images/samsung.jpg', '14699.99'),
(6, 'Iphone 12 Pro Max', '/images/iphone-12-pro-family-hero.jpg', '17699.99');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
