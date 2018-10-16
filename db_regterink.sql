-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 okt 2018 om 14:33
-- Serverversie: 10.1.35-MariaDB
-- PHP-versie: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_regterink`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `careforschemas`
--

CREATE TABLE `careforschemas` (
  `id` int(11) UNSIGNED NOT NULL,
  `iddoctor` int(11) DEFAULT NULL,
  `idkid` int(11) NOT NULL,
  `idowner` int(11) NOT NULL,
  `schema` blob,
  `dt_start` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `dt_review` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `extra` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `idcommenton` int(11) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `votes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `day2dayinformation`
--

CREATE TABLE `day2dayinformation` (
  `id` int(11) UNSIGNED NOT NULL,
  `idowner` int(11) DEFAULT NULL,
  `date` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `description` varchar(256) DEFAULT '',
  `action` varchar(256) NOT NULL DEFAULT '',
  `idkid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `date_event` date DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `eventname` varchar(128) NOT NULL DEFAULT '',
  `pictures` varchar(256) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profiles_doctors`
--

CREATE TABLE `profiles_doctors` (
  `id` int(11) NOT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `proficiency` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profiles_kids`
--

CREATE TABLE `profiles_kids` (
  `id` int(11) NOT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `reason` varchar(1024) DEFAULT NULL,
  `idcareforschema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profiles_owners`
--

CREATE TABLE `profiles_owners` (
  `id` int(11) NOT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '2000-01-31' COMMENT 'YYYY-MM-DD',
  `picture` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(128) NOT NULL DEFAULT '',
  `lname` varchar(256) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL DEFAULT '',
  `mobile` varchar(20) DEFAULT '+31 (0) 6 ',
  `password` varchar(256) NOT NULL,
  `role` varchar(128) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `mobile`, `password`, `role`, `active`) VALUES
(76, 'Aaron', 'Weggemans', 'aaron@14cd.nl', '0687985865', '$2y$10$Q1lwLOykRWZO/ZmBiishWeW7xqt6KOEO/b.LwifQaDPgJAVCraNm2', 'Administrator', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `careforschemas`
--
ALTER TABLE `careforschemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `day2dayinformation`
--
ALTER TABLE `day2dayinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `profiles_doctors`
--
ALTER TABLE `profiles_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `profiles_kids`
--
ALTER TABLE `profiles_kids`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `profiles_owners`
--
ALTER TABLE `profiles_owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `careforschemas`
--
ALTER TABLE `careforschemas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `day2dayinformation`
--
ALTER TABLE `day2dayinformation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
