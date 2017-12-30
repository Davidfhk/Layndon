-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2017 a las 11:32:10
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `layndon-v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `films`
--

CREATE TABLE `films` (
  `id_film` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `runtime` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `director` varchar(30) NOT NULL,
  `actors` text NOT NULL,
  `language` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `awards` varchar(200) NOT NULL,
  `plot` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `films`
--

INSERT INTO `films` (`id_film`, `title`, `year`, `runtime`, `genre`, `director`, `actors`, `language`, `country`, `awards`, `plot`, `image`, `date`) VALUES
(27, 'Spider Man', 1978, '30 min', 'Action, Adventure, Family', 'N/A', 'Shinji Tôdô, Mitsuo Andô, Yukie Kagawa, Hirofumi Koga', 'Japanese', 'Japan, USA', 'N/A', 'To fight against the evil Iron Cross Army, led by the space emperor Professor Monster, a daredevil motorcyclist transforms into the famous Marvel Superhero, with a racecar and giant ...', 'https://images-na.ssl-images-amazon.com/images/M/MV5BM2EwYzA2YjMtNDdhYi00OTI1LWE2ODUtOWViODk4YjRjNzVmXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SX300.jpg', '25 de Enero'),
(28, 'The Avengers', 2012, '143 min', 'Action, Adventure, Sci-Fi', 'Joss Whedon', 'Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth', 'English, Russian, Hindi', 'USA', 'Nominated for 1 Oscar. Another 38 wins & 79 nominations.', 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTk2NTI1MTU4N15BMl5BanBnXkFtZTcwODg0OTY0Nw@@._V1_SX300.jpg', 'PROXIMAMENTE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
