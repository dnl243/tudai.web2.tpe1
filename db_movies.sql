-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 15:59:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_movies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `ig_genre` int(11) NOT NULL,
  `main_genre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`ig_genre`, `main_genre`) VALUES
(12, 'aventura'),
(14, 'fantasia'),
(16, 'animación'),
(27, 'terror'),
(28, 'acción'),
(35, 'comedia'),
(53, 'suspenso'),
(80, 'crimen'),
(878, 'ciencia fición'),
(10751, 'familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `release_date` date NOT NULL,
  `overview` text NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movie`
--

INSERT INTO `movie` (`id_movie`, `title`, `release_date`, `overview`, `id_genre`, `id_company`) VALUES
(365177, 'Borderlands', '2024-08-07', 'Borderlands se desarrolla en el planeta Pandora. Atraídas por las aparentemente vastos yacimientos minerales, muchas naves colonizadores de la Dahl Corporation (una de las muchas diversas megacorporaciones que aparentemente controlan y gobiernan planetas enteros) viajan al planeta para construir asentamientos. Las operaciones de minería son llevadas a cabo por una cantidad enorme de convictos llevados al planeta por la propia corporación.\r\n', 28, 2),
(519182, 'Mi villano favorito 4', '2024-06-20', 'Gru, Lucy y las niñas -Margo, Edith y Agnes- dan la bienvenida a un nuevo miembro en la familia: Gru Junior, que parece llegar con el propósito de ser un suplicio para su padre. Gru tendrá que enfrentarse en esta ocasión a su nueva némesis Maxime Le Mal y su sofisticada y malévola novia Valentina, lo que obligará a la familia a tener que darse a la fuga.\r\n', 16, 4),
(533535, 'Deadpool & Wolverine', '2024-07-24', 'Un Wade Wilson apático se esfuerza en la vida civil. Sus días como el mercenario moralmente flexible Deadpool quedaron atrás. Cuando su mundo natal se enfrenta a una amenaza existencial, Wade debe, a regañadientes, volver a la acción junto a un reacio Wolverine.\r\n', 28, 1),
(573435, 'Bad Boys: Hasta la muerte', '2024-06-05', 'Tras escuchar falsas acusaciones sobre su excapitán y mentor Mike y Marcus deciden investigar el asunto incluso volverse los más buscados de ser necesarios.', 28, 3),
(646097, 'Rebel Ridge', '2024-08-27', 'Un exmarine debe enfrentarse a la corrupción en un pequeño pueblo cuando la policía le confisca injustamente la bolsa con el dinero para pagar la fianza de su primo.\r\n', 80, 5),
(917496, 'Beetlejuice Beetlejuice', '2024-09-04', 'Después de una tragedia familiar, tres generaciones de la familia Deetz regresan a su hogar en Winter River. La vida de Lydia, que aún sigue atormentada por Beetlejuice, da un vuelco cuando su hija adolescente, Astrid, abre accidentalmente el portal al más allá.\r\n', 35, 6),
(1022789, 'IntensaMente 2', '2024-06-11', 'Riley, ahora adolescente, enfrenta una reforma en la Central de sus emociones. Alegría, Tristeza, Ira, Miedo y Asco deben adaptarse a la llegada de nuevas emociones: Ansiedad, Vergüenza, Envidia y Ennui.', 16, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `production_company`
--

CREATE TABLE `production_company` (
  `id_company` int(11) NOT NULL,
  `main_company` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `production_company`
--

INSERT INTO `production_company` (`id_company`, `main_company`) VALUES
(1, 'Marvel Studios'),
(2, 'Lionsgate'),
(3, 'Sony Pictures Releasing'),
(4, 'Universal Pictures'),
(5, 'Netflix'),
(6, 'Warner Bros. Pictures'),
(7, 'Pixar Animation Studios');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ig_genre`),
  ADD KEY `ig_genre` (`ig_genre`);

--
-- Indices de la tabla `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`),
  ADD KEY `id_genre` (`id_genre`,`id_company`),
  ADD KEY `id_company` (`id_company`);

--
-- Indices de la tabla `production_company`
--
ALTER TABLE `production_company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `id_company` (`id_company`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `production_company`
--
ALTER TABLE `production_company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `production_company` (`id_company`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`ig_genre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
