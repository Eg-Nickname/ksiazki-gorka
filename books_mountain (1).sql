-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2022, 21:22
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `books_mountain`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sample_books`
--

CREATE TABLE `sample_books` (
  `book_ID` int(11) NOT NULL,
  `book_name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `ISBN` text COLLATE utf8mb4_polish_ci NOT NULL,
  `picture` text COLLATE utf8mb4_polish_ci NOT NULL,
  `picturexl` text COLLATE utf8mb4_polish_ci NOT NULL,
  `publishing_house` text COLLATE utf8mb4_polish_ci NOT NULL,
  `authors` text COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'Opracowanie zbiorowe',
  `category` text COLLATE utf8mb4_polish_ci NOT NULL,
  `part` int(11) NOT NULL,
  `scope` text COLLATE utf8mb4_polish_ci NOT NULL,
  `release_date` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `sample_books`
--

INSERT INTO `sample_books` (`book_ID`, `book_name`, `ISBN`, `picture`, `picturexl`, `publishing_house`, `authors`, `category`, `part`, `scope`, `release_date`) VALUES
(1, 'Matematyka na czasie', '9346-4356-36-34', 'images/matm3podr.png', 'images/matm3podrxl.png', 'WSiP', 'Opracowanie zbiorowe', 'matematyka', 1, 'podstawowy', 2020),
(2, 'Matematyka na czasie 2', '9346-4356-36-341', 'images/matm3podr.png', 'images/matm3podrxl.png', 'WSiP', 'Opracowanie zbiorowe', 'matematyka', 2, 'rozszerzony', 2020),
(3, 'Poznać przeszłość Wodza Hitlera', '325-3424-32421', 'images/historia3pp.png', '', 'Wsip', 'Opracowanie zbiorowe', 'historia', 1, 'podstawowy', 0),
(4, 'Koniec niewolnictwa upadek białej rasy', '325-3424-32421', 'images/historia3pp.png', '', 'Wsip', 'Opracowanie zbiorowe', 'historia', 2, 'rozszerzony', 0),
(5, 'Matematyka na czasie 3', '9346-4356-36-341', 'images/matm3podr.png', 'images/matm3podrxl.png', 'WSiP', 'Opracowanie zbiorowe', 'matematyka', 3, 'rozszerzony', 2020);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `name`, `surname`) VALUES
(1, 'johny', 'jasiektojo@gmail.com', '202cb962ac59075b964b07152d234b70', 'Jan', 'Lenart'),
(2, 'johny1', 'jasiek1tojo@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Jan', 'Lenart'),
(3, 'pozłoto', 'adam.malysz@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Adam', 'Malysz'),
(4, '2s', '12@df.pl', '25f9e794323b453885f5181f1b624d0b', 'Siema', 'Si'),
(5, '2s3', '132@df.pl', '25f9e794323b453885f5181f1b624d0b', 'Siema', 'Si');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_offers`
--

CREATE TABLE `users_offers` (
  `offer_id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `photo1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `photo2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `status` text NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users_offers`
--

INSERT INTO `users_offers` (`offer_id`, `seller`, `customer`, `price`, `photo1`, `photo2`, `status`, `book_id`) VALUES
(1, 1, 4, 16, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 1),
(2, 1, 4, 16, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(3, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'reserved', 2),
(4, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(5, 1, 4, 13, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(6, 1, 0, 16, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 1),
(7, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(8, 1, 4, 14, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(9, 1, 4, 15, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(10, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(11, 1, 4, 13, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(12, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(13, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(14, 1, 4, 13, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(15, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(16, 1, 4, 14, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(17, 1, 4, 15, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(18, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(19, 1, 4, 13, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(20, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(21, 1, 4, 13, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(22, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(23, 1, 4, 14, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(24, 1, 4, 15, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(25, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2),
(26, 1, 4, 13, 'images/matm3podr.png', 'images/historia3pp.png', 'available', 2),
(27, 1, 4, 13, 'images/matm3podr.png', 'images/matm3podr.png', 'available', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sample_books`
--
ALTER TABLE `sample_books`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeksy dla tabeli `users_offers`
--
ALTER TABLE `users_offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `sample_books`
--
ALTER TABLE `sample_books`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users_offers`
--
ALTER TABLE `users_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
