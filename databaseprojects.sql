-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 23 mei 2015 om 14:41
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `databaseprojects`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `eventsdatabase`
--

CREATE TABLE IF NOT EXISTS `eventsdatabase` (
`EventID` int(10) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `EventOrganizer` varchar(20) NOT NULL,
  `OrganizerID` int(11) NOT NULL,
  `StartDate` varchar(10) NOT NULL,
  `EndDate` varchar(10) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `AvailableTickets` int(10) NOT NULL,
  `PrijsPerTicket` int(10) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderdatabase`
--

CREATE TABLE IF NOT EXISTS `orderdatabase` (
`OrderID` int(10) NOT NULL,
  `Lastname` varchar(32) NOT NULL,
  `Firstname` varchar(32) NOT NULL,
  `Registernumber` varchar(15) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Street` varchar(32) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Citycode` int(4) NOT NULL,
  `Phonenumber` int(10) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `PrijsPerTicket` int(10) NOT NULL,
  `AmountTickets` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `orderdatabase`
--

INSERT INTO `orderdatabase` (`OrderID`, `Lastname`, `Firstname`, `Registernumber`, `Email`, `Street`, `City`, `Citycode`, `Phonenumber`, `EventName`, `PrijsPerTicket`, `AmountTickets`) VALUES
(1, 'Carremans', 'Glenn', '2147483647', 'glenn.carremans@gmail.com', 'Fazantenlaan 52', 'Beringen', 3583, 478573777, 'TestEvent', 15, 50),
(2, 'Carremans', 'Glenn', '2147483647', 'glenn.carremans@gmail.com', 'Fazantenlaan 52', 'Beringen', 3583, 478573777, 'TestEvent', 15, 25),
(3, 'Carremans', 'Glenn', '2147483647', 'glenn.carremans@gmail.com', 'Fazantenlaan 52', 'Beringen', 3583, 478573777, 'TestEvent', 15, 5),
(4, 'test', 'organiser', '123456789', 'test@gmail.com', 'TestStreet', 'TestCity', 1111, 123456789, 'TestEvent', 15, 10),
(5, 'test', 'organiser', '123456789', 'glennekes@msn.com', 'TestStreet', 'TestCity', 1111, 123456789, 'TestEvent', 15, 10),
(6, 'Carremans', 'Glenn', '94070437969', 'glenn.carremans@gmail.com', 'Fazantenlaan 52', 'Beringen', 3583, 478573777, 'TestEvent', 15, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` tinyint(4) NOT NULL,
  `AccountType` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` varchar(32) NOT NULL,
  `Lastname` varchar(32) NOT NULL,
  `Registernumber` varchar(15) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Street` varchar(32) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Citycode` int(4) NOT NULL,
  `Phonenumber` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `AccountType`, `Username`, `Password`, `Firstname`, `Lastname`, `Registernumber`, `Email`, `Street`, `City`, `Citycode`, `Phonenumber`) VALUES
(1, '1', 'Admin', '202cb962ac59075b964b07152d234b70', 'admin', 'test', '123456789', 'test@gmail.com', 'TestStreet', 'TestCity', 1111, 123456789),
(23, '2', 'organiser', '202cb962ac59075b964b07152d234b70', 'organiser', 'test', '123456789', 'test@gmail.com', 'TestStreet', 'TestCity', 1111, 123456789),
(22, '3', 'client', '202cb962ac59075b964b07152d234b70', 'client', 'test', '123456789', 'test@gmail.com', 'TestStreet', 'TestCity', 1111, 123456789),
(26, '3', 'test_glenn', '6a2bcdb84b4b9ffd503b2d0ae9b0673a', 'Glenn', 'Carremans', '94070437969', 'glenn.carremans@gmail.com', 'Fazantenlaan 52', 'Beringen', 3583, 478573777);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `eventsdatabase`
--
ALTER TABLE `eventsdatabase`
 ADD PRIMARY KEY (`EventID`);

--
-- Indexen voor tabel `orderdatabase`
--
ALTER TABLE `orderdatabase`
 ADD PRIMARY KEY (`OrderID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `eventsdatabase`
--
ALTER TABLE `eventsdatabase`
MODIFY `EventID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `orderdatabase`
--
ALTER TABLE `orderdatabase`
MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
