-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2017, 16:27
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `my_books`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `title` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `author` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `type` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
