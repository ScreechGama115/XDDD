-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 12:08:49
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tapatiojobs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE IF NOT EXISTS `business` (
`id_count` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `telefono1` int(20) NOT NULL,
  `telefono2` int(20) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `muro` varchar(200) NOT NULL,
  `name_admin` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ubicacion` text NOT NULL,
  `servicio` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id_count`, `name`, `password`, `username`, `type`, `telefono1`, `telefono2`, `avatar`, `muro`, `name_admin`, `email`, `ubicacion`, `servicio`, `descripcion`, `fecha`) VALUES
(1, 'Jeliscocate', '$2y$10$DhvT1qUsojyoREehbDa8IuO1M/r3lymP7tFVBok1R4jogYdDaMVwK', 'JoseZepeda', 1, 32180593, 85775423, '../Photos/JoseZepeda.jpg', '../Walls/Jeliscocate.jpg', 'Juan Carlos Zepeda  ', 'jeliscocate@yahoo.com', 'ddsgfdsf', 'dsfdsfdsf', 'sdfdsfsf', '2020-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`id` int(11) NOT NULL,
  `id_count` int(11) NOT NULL,
  `texto` text NOT NULL,
  `sala` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `id_count`, `texto`, `sala`, `type`, `fecha`) VALUES
(1, 1, 'Hola mundo', 1, 1, '2020-11-10'),
(2, 1, 'sdfgh', 1, 0, '2020-11-10'),
(3, 1, 'hrllooo', 1, 0, '2020-11-10'),
(4, 1, 'sdfghj.', 1, 0, '2020-11-11'),
(5, 1, 'Bienvenidos al cielo amigos :v', 1, 0, '2020-11-11'),
(6, 1, 'Hola amigo :3', 1, 0, '2020-11-11'),
(7, 1, 'hola broh :3', 1, 0, '2020-11-11'),
(8, 1, 'sdfgm', 1, 1, '2020-11-11'),
(9, 1, 'gdsbgsdb', 1, 1, '2020-11-11'),
(10, 1, 'sdgsdgsdg', 1, 0, '2020-11-11'),
(11, 1, 'xbbfsdbd', 1, 2, '2020-11-11'),
(12, 1, 'Que tal?', 1, 2, '2020-11-11'),
(13, 1, 'lol', 1, 2, '2020-11-11'),
(14, 1, 'OMG', 1, 2, '2020-11-11'),
(15, 1, 'hjhgy', 1, 2, '2020-11-11'),
(16, 1, 'hjhuhuy', 1, 2, '2020-11-11'),
(17, 1, 'Lololololo', 1, 2, '2020-11-11'),
(18, 1, 'barco', 1, 2, '2020-11-11'),
(19, 1, 'barco', 1, 2, '2020-11-11'),
(20, 1, ' cxcxcxcx', 1, 2, '2020-11-11'),
(21, 1, 'Lop', 1, 2, '2020-11-11'),
(22, 1, 'lkjhgfdf\r\n', 1, 2, '2020-11-11'),
(23, 1, 'lol\r\n', 1, 2, '2020-11-11'),
(24, 1, 'locochon', 1, 2, '2020-11-11'),
(25, 2, 'Wow, veo que hay muchos mensajes aqui, jeje', 1, 2, '2020-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `nombre`, `descripcion`, `foto`, `categoria`, `fecha`) VALUES
(1, 'Bienvenida', 'Bienvenido', 'Photo_room/Bienvenida.jpg', 'General', '2020-11-10'),
(2, 'GameZone', 'Chat para creadores de videojuegos', 'Photo_room/GameZone.jpg', 'Juegos', '2020-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`id_count` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `type` int(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type`
--

INSERT INTO `type` (`id_count`, `name`, `id`, `username`, `type`, `fecha`) VALUES
(2, 'Jeliscocate', 1, 'JoseZepeda', 1, '2020-11-10'),
(3, '', 1, 'AntonioIzaguirre', 2, '2020-11-10'),
(4, '', 0, 'Fernando02', 2, '2020-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_count` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `edad` int(2) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `muro` varchar(200) NOT NULL,
  `ubicacion` text NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono1` int(20) NOT NULL,
  `telefono2` int(20) NOT NULL,
  `experiencia` text NOT NULL,
  `habilidades` text NOT NULL,
  `software` text NOT NULL,
  `debilidades` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_count`, `name`, `password`, `username`, `type`, `edad`, `avatar`, `muro`, `ubicacion`, `carrera`, `email`, `telefono1`, `telefono2`, `experiencia`, `habilidades`, `software`, `debilidades`, `descripcion`, `fecha`) VALUES
(1, 'Saul Antonio Izaguirre', '$2y$10$uunGeiRLiXoK.jg7ur4uxu/rpiAoyXCx683tlGhLcg1THViY7C.k6', 'AntonioIzaguirre', 2, 18, '../Photos/AntonioIzaguirre.jpg', '../Walls/AntonioIzaguirre.jpg', 'Sz', 'Universitario, estudiante de la Ingenieria en Sistemas', 'antonioizaguirre077@gmail.com', 32180593, 0, 'fdbdfbfd', 'bdfbdfb', 'sbdfbdf', 'fbdfbdfbdf', 'bdfbdfb', '2020-11-10'),
(2, 'Fernando Alvarado', '$2y$10$lTfs.N337nLIpeF9FuD8S.5C8O8eSbpXBUZC8JYYF7kdJVwESs6Ni', 'Fernando02', 0, 22, '../Photos/Fernando02.jpg', '../Walls/Fernando02.jpg', 'Barrio La Isla', 'Universitario de la carrera de Marketing', 'fernandoalvarado@gmail.com', 32180593, 85775423, 'He trabajado en &quot;El palacio de los niÃ±os&quot; por 5 aÃ±os, me despidieron por recorte de personal', 'Ingles\r\nJapones\r\nEficiencia y eficacia\r\nProgramador', 'Offimatica\r\nAdobe Illustrator\r\nAdobe Photoshop\r\nCorel Draw\r\n', 'Bajo rendimiento bajo presion', 'Una persona que le gusta superarse a si misma', '2020-11-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
 ADD PRIMARY KEY (`id_count`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`id_count`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_count`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
MODIFY `id_count` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
MODIFY `id_count` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id_count` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
