-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 02:04 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rezultati`
--

-- --------------------------------------------------------

--
-- Table structure for table `duel`
--

CREATE TABLE `duel` (
  `id` int(11) NOT NULL,
  `FK_Team1` int(11) NOT NULL,
  `FK_Team2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duel`
--

INSERT INTO `duel` (`id`, `FK_Team1`, `FK_Team2`) VALUES
(5, 3, 4),
(6, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `esport`
--

CREATE TABLE `esport` (
  `id` int(11) NOT NULL,
  `Ime_Esporta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `esport`
--

INSERT INTO `esport` (`id`, `Ime_Esporta`) VALUES
(1, 'League Of Legends'),
(2, 'Dota 2'),
(3, 'CSGO');

-- --------------------------------------------------------

--
-- Table structure for table `igraci`
--

CREATE TABLE `igraci` (
  `id` int(11) NOT NULL,
  `FK_Team` int(11) DEFAULT NULL,
  `FK_Mjesto` int(11) DEFAULT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `Game_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igraci`
--

INSERT INTO `igraci` (`id`, `FK_Team`, `FK_Mjesto`, `Ime`, `Prezime`, `Game_tag`) VALUES
(6, 3, 10, 'Finn', 'Andersen', 'karrigan'),
(8, 3, 13, 'Nikola', 'Kovac', 'NiKo'),
(9, 4, 14, 'Freddy', 'Johansson', 'KRIMZ'),
(10, 4, 14, 'Jesper', 'Wecksell', 'JW'),
(11, 4, 14, 'Robin', 'Ronnquist', 'flusha'),
(12, 5, 10, 'Nicolai', 'Reedtz', 'dev1ce'),
(13, 5, 10, 'Peter', 'Rothmann', 'dupreeh'),
(14, 5, 10, 'Andreas', 'Højsleth', 'Xyp9x'),
(15, 7, 14, 'Simon', 'Eliasson', 'twist'),
(16, 7, 14, 'Joakim', 'Gidetun', 'disco doplan'),
(17, 7, 14, 'Fredrik', 'Buo', 'freddieb'),
(18, 8, 1, 'Tyler', 'Latham', 'Skadoodle'),
(19, 8, 1, 'Timothy', 'Ta', 'automatic'),
(20, 8, 1, 'Will', 'Wierzba', 'RUSH'),
(28, 21, NULL, 'Josip', 'Nikolic', 'MoonPie'),
(30, 21, NULL, 'Goran', 'Kavelj', 'Kaveljo'),
(31, 23, NULL, 'ime', 'prezime', 'tag');

-- --------------------------------------------------------

--
-- Table structure for table `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `FK_Team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mecevi`
--

CREATE TABLE `mecevi` (
  `id` int(11) NOT NULL,
  `FK_Duel` int(11) NOT NULL,
  `rezultat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mecevi`
--

INSERT INTO `mecevi` (`id`, `FK_Duel`, `rezultat`) VALUES
(3, 5, '3-1'),
(4, 6, '2-3');

-- --------------------------------------------------------

--
-- Table structure for table `mjesto`
--

CREATE TABLE `mjesto` (
  `id` int(11) NOT NULL,
  `Drzava` varchar(50) NOT NULL,
  `Grad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mjesto`
--

INSERT INTO `mjesto` (`id`, `Drzava`, `Grad`) VALUES
(1, 'USA ', 'California'),
(10, 'Denmark', 'Kopenhagen'),
(11, 'Norway', 'Oslo'),
(13, 'Bosnia and Herzegovina', 'Tuzla'),
(14, 'Sweden', 'Stockholm'),
(15, 'Bosnia and Herzegovina', 'Mostar');

-- --------------------------------------------------------

--
-- Table structure for table `timovi`
--

CREATE TABLE `timovi` (
  `id` int(11) NOT NULL,
  `FK_Esport` int(11) DEFAULT NULL,
  `FK_Mjesto` int(11) DEFAULT NULL,
  `tim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timovi`
--

INSERT INTO `timovi` (`id`, `FK_Esport`, `FK_Mjesto`, `tim`) VALUES
(3, 3, 1, 'Faze (CSGO)'),
(4, 3, 11, 'Fnatic (CSGO)'),
(5, 3, 10, 'Astralis (CSGO)'),
(7, 3, 14, 'GODSENT (CSGO)'),
(8, 3, 1, 'Cloud9 (CSGO)'),
(21, NULL, NULL, 'OrtGang'),
(22, NULL, NULL, 'user'),
(23, NULL, NULL, 'team');

-- --------------------------------------------------------

--
-- Table structure for table `turnir`
--

CREATE TABLE `turnir` (
  `id` int(11) NOT NULL,
  `FK_Esport` int(11) NOT NULL,
  `FK_Mjesto` int(11) NOT NULL,
  `FK_Lista` int(11) NOT NULL,
  `Ime_turnira` varchar(70) NOT NULL,
  `Fond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duel`
--
ALTER TABLE `duel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Team` (`FK_Team1`),
  ADD KEY `FK_Team2` (`FK_Team2`);

--
-- Indexes for table `esport`
--
ALTER TABLE `esport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `igraci`
--
ALTER TABLE `igraci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Game_tag` (`Game_tag`),
  ADD KEY `FK_Team` (`FK_Team`),
  ADD KEY `FK_Mjesto` (`FK_Mjesto`);

--
-- Indexes for table `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Team` (`FK_Team`);

--
-- Indexes for table `mecevi`
--
ALTER TABLE `mecevi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Duel` (`FK_Duel`);

--
-- Indexes for table `mjesto`
--
ALTER TABLE `mjesto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timovi`
--
ALTER TABLE `timovi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tim` (`tim`),
  ADD KEY `FK_Esport` (`FK_Esport`),
  ADD KEY `FK_Mjesto` (`FK_Mjesto`);

--
-- Indexes for table `turnir`
--
ALTER TABLE `turnir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Esport` (`FK_Esport`),
  ADD KEY `FK_Mjesto` (`FK_Mjesto`),
  ADD KEY `FK_Lista` (`FK_Lista`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duel`
--
ALTER TABLE `duel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `esport`
--
ALTER TABLE `esport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `igraci`
--
ALTER TABLE `igraci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lista`
--
ALTER TABLE `lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mecevi`
--
ALTER TABLE `mecevi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mjesto`
--
ALTER TABLE `mjesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `timovi`
--
ALTER TABLE `timovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `turnir`
--
ALTER TABLE `turnir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duel`
--
ALTER TABLE `duel`
  ADD CONSTRAINT `duel_ibfk_1` FOREIGN KEY (`FK_Team1`) REFERENCES `timovi` (`id`),
  ADD CONSTRAINT `duel_ibfk_2` FOREIGN KEY (`FK_Team2`) REFERENCES `timovi` (`id`);

--
-- Constraints for table `igraci`
--
ALTER TABLE `igraci`
  ADD CONSTRAINT `igraci_ibfk_1` FOREIGN KEY (`FK_Team`) REFERENCES `timovi` (`id`),
  ADD CONSTRAINT `igraci_ibfk_2` FOREIGN KEY (`FK_Mjesto`) REFERENCES `mjesto` (`id`);

--
-- Constraints for table `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`FK_Team`) REFERENCES `timovi` (`id`);

--
-- Constraints for table `mecevi`
--
ALTER TABLE `mecevi`
  ADD CONSTRAINT `mecevi_ibfk_1` FOREIGN KEY (`FK_Duel`) REFERENCES `duel` (`id`);

--
-- Constraints for table `timovi`
--
ALTER TABLE `timovi`
  ADD CONSTRAINT `timovi_ibfk_1` FOREIGN KEY (`FK_Mjesto`) REFERENCES `mjesto` (`id`),
  ADD CONSTRAINT `timovi_ibfk_2` FOREIGN KEY (`FK_Esport`) REFERENCES `esport` (`id`);

--
-- Constraints for table `turnir`
--
ALTER TABLE `turnir`
  ADD CONSTRAINT `turnir_ibfk_1` FOREIGN KEY (`FK_Esport`) REFERENCES `esport` (`id`),
  ADD CONSTRAINT `turnir_ibfk_2` FOREIGN KEY (`FK_Mjesto`) REFERENCES `mjesto` (`id`),
  ADD CONSTRAINT `turnir_ibfk_3` FOREIGN KEY (`FK_Lista`) REFERENCES `lista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
