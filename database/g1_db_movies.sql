-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 12:55:03
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
-- Base de datos: `g1_db_movies`
--
CREATE DATABASE IF NOT EXISTS `g1_db_movies` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g1_db_movies`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `main_genre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id_genre`, `main_genre`) VALUES
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
  `poster_path` varchar(70) NOT NULL,
  `release_date` date NOT NULL,
  `overview` text NOT NULL,
  `company` varchar(45) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movie`
--

INSERT INTO `movie` (`id_movie`, `title`, `poster_path`, `release_date`, `overview`, `company`, `id_genre`) VALUES
(365177, 'Borderlands', '/jtEZi4eZxDjxcDIeMbkQ8HmvRs1.jpg', '2024-08-07', 'Borderlands se desarrolla en el planeta Pandora. Atraídas por las aparentemente vastos yacimientos minerales, muchas naves colonizadores de la Dahl Corporation (una de las muchas diversas megacorporaciones que aparentemente controlan y gobiernan planetas enteros) viajan al planeta para construir asentamientos. Las operaciones de minería son llevadas a cabo por una cantidad enorme de convictos llevados al planeta por la propia corporación.\r\n', 'Lionsgate', 28),
(519182, 'Mi villano favorito 4', '/kqph8UWNOoYgTjYnkAx8dRlLLCq.jpg', '2024-06-20', 'Gru, Lucy y las niñas -Margo, Edith y Agnes- dan la bienvenida a un nuevo miembro en la familia: Gru Junior, que parece llegar con el propósito de ser un suplicio para su padre. Gru tendrá que enfrentarse en esta ocasión a su nueva némesis Maxime Le Mal y su sofisticada y malévola novia Valentina, lo que obligará a la familia a tener que darse a la fuga.\r\n', 'Universal Pictures', 16),
(533535, 'Deadpool y Wolverine', '/9TFSqghEHrlBMRR63yTx80Orxva.jpg', '2024-07-24', 'Un Wade Wilson apático se esfuerza en la vida civil. Sus días como el mercenario moralmente flexible Deadpool quedaron atrás. Cuando su mundo natal se enfrenta a una amenaza existencial, Wade debe, a regañadientes, volver a la acción junto a un reacio Wolverine.\r\n', 'Marvel Studios', 28),
(573435, 'Bad Boys: Hasta la muerte', '/zp0Y7Nsl4UnWiwX4LxXQXgDfXSz.jpg', '2024-06-05', 'Tras escuchar falsas acusaciones sobre su excapitán y mentor Mike y Marcus deciden investigar el asunto incluso volverse los más buscados de ser necesarios.', 'Sony Pictures Releasing', 28),
(646097, 'Rebel Ridge', '/ymTgBQ8rCouE27oHpAUfgKEgRAj.jpg', '2024-08-27', 'Un exmarine debe enfrentarse a la corrupción en un pequeño pueblo cuando la policía le confisca injustamente la bolsa con el dinero para pagar la fianza de su primo.\r\n', 'Netflix', 80),
(889737, 'Joker: Folie à Deux', '/tMMYwxrPwVPrxz3DqXs8DnVIOx0.jpg', '2024-10-01', 'Secuela de Joker (2019), de nuevo con Phoenix como Arthur Fleck, y que muestra su relación con el personaje de Harley Quinn, interpretado por Lady Gaga.', 'Warner Bros Pictures', 80),
(917496, 'Beetlejuice Beetlejuice', '/kWJw7dCWHcfMLr0irTHAPIKrJ4I.jpg', '2024-09-04', 'Después de una tragedia familiar, tres generaciones de la familia Deetz regresan a su hogar en Winter River. La vida de Lydia, que aún sigue atormentada por Beetlejuice, da un vuelco cuando su hija adolescente, Astrid, abre accidentalmente el portal al más allá.\r\n', 'Warner Bros. Pictures', 35),
(1022789, 'IntensaMente 2', '/aQnbNiadeGzGSjWLaXyeNxpAUIx.jpg', '2024-06-11', 'Riley, ahora adolescente, enfrenta una reforma en la Central de sus emociones. Alegría, Tristeza, Ira, Miedo y Asco deben adaptarse a la llegada de nuevas emociones: Ansiedad, Vergüenza, Envidia y Ennui.', 'Pixar Animation Studios', 16),
(1184918, 'Robot salvaje', '/sDoXpaKZmrzCSJH63zZvQQ9A7VK.jpg', '2024-09-12', 'Una robot (la unidad ROZZUM 7134 o «Roz») ha naufragado en una isla deshabitada y deberá aprender a adaptarse al duro entorno, forjando poco a poco relaciones con la fauna local y convirtiéndose en madre adoptiva de una cría de ganso huérfana.', 'DreamWorks Animation', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(1, 'web@admin.com', '$2y$10$Uj5WOFyr72G9qCrI7naeQeOtXEd6PkopGEP6sc3.t4ZPP8JFr5dqa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indices de la tabla `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
