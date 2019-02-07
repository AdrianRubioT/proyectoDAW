-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2019 at 04:18 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freeGames`
--

-- --------------------------------------------------------

--
-- Table structure for table `dejanMensages`
--

CREATE TABLE `dejanMensages` (
  `ID_men` int(20) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `ID_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `Correo` varchar(20) NOT NULL,
  `ID_juego` int(11) NOT NULL,
  `EsFav` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `juegos`
--

CREATE TABLE `juegos` (
  `ID_juego` int(11) NOT NULL,
  `Ruta` varchar(30) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensages`
--

CREATE TABLE `mensages` (
  `ID_men` int(20) NOT NULL,
  `Texto` varchar(1000) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ID_respuesta` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `ID_juego` int(11) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `Puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Correo` varchar(20) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dejanMensages`
--
ALTER TABLE `dejanMensages`
  ADD KEY `mensages` (`ID_men`),
  ADD KEY `usuarios` (`Correo`),
  ADD KEY `juegos` (`ID_juego`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD KEY `juegos` (`ID_juego`),
  ADD KEY `usuarios` (`Correo`);

--
-- Indexes for table `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`ID_juego`);

--
-- Indexes for table `mensages`
--
ALTER TABLE `mensages`
  ADD PRIMARY KEY (`ID_men`),
  ADD UNIQUE KEY `ID_respuesta` (`ID_respuesta`);

--
-- Indexes for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD UNIQUE KEY `juegos` (`ID_juego`),
  ADD KEY `usuarios` (`Correo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juegos`
--
ALTER TABLE `juegos`
  MODIFY `ID_juego` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mensages`
--
ALTER TABLE `mensages`
  MODIFY `ID_men` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dejanMensages`
--
ALTER TABLE `dejanMensages`
  ADD CONSTRAINT `dejanMensages_ibfk_1` FOREIGN KEY (`ID_men`) REFERENCES `mensages` (`ID_men`),
  ADD CONSTRAINT `dejanMensages_ibfk_2` FOREIGN KEY (`Correo`) REFERENCES `usuarios` (`Correo`),
  ADD CONSTRAINT `dejanMensages_ibfk_3` FOREIGN KEY (`ID_juego`) REFERENCES `juegos` (`ID_juego`);

--
-- Constraints for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`Correo`) REFERENCES `usuarios` (`Correo`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`ID_juego`) REFERENCES `juegos` (`ID_juego`);

--
-- Constraints for table `mensages`
--
ALTER TABLE `mensages`
  ADD CONSTRAINT `mensages_ibfk_1` FOREIGN KEY (`ID_respuesta`) REFERENCES `mensages` (`ID_men`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `puntuaciones_ibfk_1` FOREIGN KEY (`ID_juego`) REFERENCES `juegos` (`ID_juego`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntuaciones_ibfk_2` FOREIGN KEY (`Correo`) REFERENCES `usuarios` (`Correo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
