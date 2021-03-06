-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2016 a las 14:59:09
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `preguntados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Deportes'),
(2, 'Historia'),
(3, 'Espectaculos'),
(4, 'Arte'),
(6, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

DROP TABLE IF EXISTS `intereses`;
CREATE TABLE IF NOT EXISTS `intereses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `nombre`) VALUES
(2, 'historia'),
(3, 'arte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

DROP TABLE IF EXISTS `partidas`;
CREATE TABLE IF NOT EXISTS `partidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario1` int(11) NOT NULL,
  `usuario2` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas_categorias`
--

DROP TABLE IF EXISTS `partidas_categorias`;
CREATE TABLE IF NOT EXISTS `partidas_categorias` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas_preguntas`
--

DROP TABLE IF EXISTS `partidas_preguntas`;
CREATE TABLE IF NOT EXISTS `partidas_preguntas` (
  `id` int(11) NOT NULL,
  `idPartida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `sexo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `email`, `fecha_nacimiento`, `password`, `sexo`) VALUES
(1, 'Florencia', 'Yabra', 'calanity@hotmail.com', '1950-01-01', '123456.', 2),
(2, 'Tamara', 'Loyber', 'tamiloy98@gmail.com', '1998-08-06', '123456.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_intereses`
--

DROP TABLE IF EXISTS `personas_intereses`;
CREATE TABLE IF NOT EXISTS `personas_intereses` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsuario` int(11) NOT NULL,
  `IdInteres` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas_intereses`
--

INSERT INTO `personas_intereses` (`Id`, `IdUsuario`, `IdInteres`) VALUES
(1, 6, 2),
(2, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `nombre`, `idcategoria`) VALUES
(1, '¿Como me llamo?', 1),
(6, '¿De que color era el caballo blanco de San Martin?', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpregunta` int(11) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `correcta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `idpregunta`, `respuesta`, `correcta`) VALUES
(16, 6, 'fdgdfg', 2),
(19, 1, 'Florencia', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
