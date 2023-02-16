-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 15, 2023 at 11:37 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prvi_domaci_iteh`
--

-- --------------------------------------------------------

--
-- Table structure for table `kuvar`
--

CREATE TABLE `kuvar` (
  `id_kuvar` int(11) NOT NULL,
  `ime_kuvar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime_kuvar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `grad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specijalnost` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kuvar`
--

INSERT INTO `kuvar` (`id_kuvar`, `ime_kuvar`, `prezime_kuvar`, `datum_rodjenja`, `grad`, `specijalnost`) VALUES
(1, 'Jelena', 'Delić', '2000-07-17', 'Beograd', 'italijanska kuhinja'),
(2, 'Isidora', 'Rodić', '2001-01-27', 'Beograd', 'salate'),
(3, 'Marija', 'Milić', '2000-05-06', 'Prijedor', 'bifteci'),
(4, 'Ksenija', 'Pejčić', '1999-11-01', 'Prijepolje', 'jela od piletine');

-- --------------------------------------------------------

--
-- Table structure for table `obrok`
--

CREATE TABLE `obrok` (
  `redni_broj` int(11) NOT NULL,
  `naziv_obroka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` double NOT NULL,
  `sastojci` text COLLATE utf8_unicode_ci NOT NULL,
  `id_kuvar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `obrok`
--

INSERT INTO `obrok` (`redni_broj`, `naziv_obroka`, `cena`, `sastojci`, `id_kuvar`) VALUES
(1, 'Cezar salata', 780, 'piletina, pančeta, tost, iceberg, dresing, parmezan, salata', 2),
(2, 'Pasta Carbonara', 675, 'pančeta, neutralna pavlaka, parmezan, jaje, beli luk, origano', 1),
(3, 'Pizza Capricciosa 32cm', 770, 'pelat, mocarela, šunka, pečurke, origano', 1),
(4, 'Pileći štapići u susamu', 780, 'pohovana piletina, susam, pomfrit, tartar sos', 4),
(5, 'Biftek', 1700, 'biftek, grilovano povrće, sos po želji', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kuvar`
--
ALTER TABLE `kuvar`
  ADD PRIMARY KEY (`id_kuvar`);

--
-- Indexes for table `obrok`
--
ALTER TABLE `obrok`
  ADD PRIMARY KEY (`redni_broj`),
  ADD KEY `fk_kuvar` (`id_kuvar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuvar`
--
ALTER TABLE `kuvar`
  MODIFY `id_kuvar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obrok`
--
ALTER TABLE `obrok`
  MODIFY `redni_broj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obrok`
--
ALTER TABLE `obrok`
  ADD CONSTRAINT `obrok_ibfk_1` FOREIGN KEY (`id_kuvar`) REFERENCES `kuvar` (`id_kuvar`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
