-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2024 a las 01:47:02
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
-- Base de datos: `seleccion-clases`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `idAula` varchar(200) NOT NULL,
  `idPabellon` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `capacidadAula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idAula`, `idPabellon`, `nombre`, `capacidadAula`) VALUES
('A001', 'A', 'INFORM�TICA', NULL),
('A002', 'A', '', NULL),
('A003', 'A', 'ADMINISTRATIVO', NULL),
('A004', 'A', 'ADMINISTRATIVO', NULL),
('A005', 'A', '', NULL),
('A006', 'A', '', NULL),
('A007', 'A', 'LAB IDIOMAS', NULL),
('A101', 'A', 'PLUMIER', NULL),
('A102', 'A', 'AUDIOVISUALES', NULL),
('A103', 'A', '', NULL),
('A104', 'A', '', NULL),
('A105', 'A', 'COMPENSATORIA', NULL),
('A106', 'A', 'LOGOPEDA', NULL),
('A107', 'A', 'PT', NULL),
('A108', 'A', 'PT', NULL),
('A201', 'A', '', NULL),
('A202', 'A', 'LAB. BIOLOG�A', NULL),
('A203', 'A', '', NULL),
('A204', 'A', 'LAB. F�SICA', NULL),
('A205', 'A', '', NULL),
('A206', 'A', '', NULL),
('A207', 'A', '', NULL),
('A208', 'A', '', NULL),
('A209', 'A', '', NULL),
('A210', 'A', '', NULL),
('A211', 'A', '', NULL),
('A212', 'A', '', NULL),
('B001', 'B', 'GIMNASIO', NULL),
('B002', 'B', 'SAL�N DE ACTOS', NULL),
('BIBLIOTECA', 'A', '', NULL),
('C001', 'C', 'TECNOLOG�A 1', NULL),
('C002', 'C', 'TECNOLOG�A 2', NULL),
('C003', 'C', 'DIBUJO', NULL),
('CONSERJERIA', 'A', '', NULL),
('D001', 'D', 'INFORM�TICA', NULL),
('D002', 'D', 'INFORM�TICA', NULL),
('D003', 'D', 'INFORM�TICA', NULL),
('D004', 'D', 'IND. ALIMENTARIAS', NULL),
('D005', 'D', 'M�SICA', NULL),
('D101', 'D', '', NULL),
('D102', 'D', '', NULL),
('D103', 'D', '', NULL),
('D104', 'D', 'FPB ORDENADORES', NULL),
('D105', 'D', '', NULL),
('D106', 'D', '', NULL),
('D107', 'D', '', NULL),
('D108', 'D', '', NULL),
('DEP1', 'A', 'RMI', NULL),
('DEP10', 'D', 'INFORM�TICA', NULL),
('DEP11', 'D', 'M�SICA', NULL),
('DEP12', 'C', 'TECNOLOG�A', NULL),
('DEP2', 'A', 'LENGUA', NULL),
('DEP3', 'A', ' FILOSOF�A', NULL),
('DEP5', 'A', 'BIOLOG�A, F�SICA Y QU�MICA', NULL),
('DEP6', 'A', 'ADMINISTRATIVO', NULL),
('DEP7', 'A', 'GEOGRAF�A', NULL),
('DEP8', 'D', 'INGL�S', NULL),
('DEP9', 'D', 'MATEM�TICAS', NULL),
('DIRECCION', 'A', '', NULL),
('JEFATURA DE ESTUDIOS', 'A', '', NULL),
('OFICINA', 'A', '', NULL),
('ORIENTACION', 'A', '', NULL),
('PEDAGOGIA TERAPEUTICA', 'A', '', NULL),
('SALA PROFESORES', 'A', '', NULL),
('SECRETARIA', 'A', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipamiento`
--

CREATE TABLE `equipamiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `numSerie` varchar(200) NOT NULL,
  `idAula` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espera`
--

CREATE TABLE `espera` (
  `id-profesor` int(11) NOT NULL,
  `id-aula` varchar(200) NOT NULL DEFAULT '',
  `id-hora` int(11) NOT NULL,
  `id-dia` int(11) NOT NULL,
  `id-mes` int(11) NOT NULL,
  `n-espera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `nombreCompleto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `alias`, `nombreCompleto`) VALUES
(1, 'DAW', 'Desarrollo web multimedia'),
(2, 'DAM', 'Desarrollo multiplataforma de aplicaciones'),
(3, 'IB', 'Igiene bucodental'),
(4, 'DAW', 'Hola'),
(5, 'ASD', 'awdawda'),
(6, 'AWDAWDAS', '12312awdaw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE `ocupacion` (
  `idAula` varchar(200) NOT NULL,
  `idHora` int(11) NOT NULL,
  `idDia` int(11) NOT NULL,
  `idMes` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `okupacion`
--

CREATE TABLE `okupacion` (
  `idAula` varchar(200) NOT NULL,
  `hora` int(11) NOT NULL,
  `lunes` tinyint(4) NOT NULL,
  `martes` tinyint(4) NOT NULL,
  `miercoles` tinyint(4) NOT NULL,
  `jueves` tinyint(4) NOT NULL,
  `viernes` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `okupacion`
--

INSERT INTO `okupacion` (`idAula`, `hora`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`) VALUES
('A001', 1, 1, 1, 1, 1, 1),
('A001', 2, 1, 1, 1, 1, 1),
('A001', 3, 1, 1, 1, 1, 1),
('A001', 4, 1, 1, 1, 1, 1),
('A001', 5, 1, 1, 1, 1, 1),
('A001', 6, 1, 1, 1, 1, 1),
('A002', 1, 1, 1, 1, 1, 1),
('A002', 2, 1, 1, 1, 1, 1),
('A002', 3, 1, 1, 1, 1, 1),
('A002', 4, 1, 1, 1, 1, 1),
('A002', 5, 1, 1, 1, 1, 1),
('A002', 6, 1, 1, 1, 1, 1),
('A003 ', 1, 0, 0, 1, 1, 1),
('A003 ', 2, 0, 0, 1, 1, 1),
('A003', 3, 1, 1, 0, 1, 1),
('A003', 4, 1, 0, 0, 0, 0),
('A003', 5, 1, 1, 0, 0, 0),
('A003', 6, 1, 1, 0, 0, 0),
('A004 ', 1, 0, 1, 0, 0, 0),
('A004 ', 2, 0, 0, 0, 0, 1),
('A004', 3, 0, 0, 1, 1, 1),
('A004', 4, 0, 0, 0, 0, 1),
('A004', 5, 1, 1, 1, 0, 0),
('A004', 6, 0, 0, 1, 0, 0),
('A005', 1, 1, 1, 1, 1, 1),
('A005', 2, 1, 1, 1, 1, 0),
('A005', 3, 1, 1, 1, 1, 1),
('A005', 4, 1, 1, 1, 1, 1),
('A005', 5, 1, 1, 0, 1, 1),
('A005', 6, 1, 1, 1, 1, 1),
('A006', 1, 1, 0, 1, 1, 1),
('A006', 2, 1, 1, 1, 1, 1),
('A006', 3, 1, 1, 1, 0, 1),
('A006', 4, 1, 1, 1, 1, 1),
('A006', 5, 1, 1, 1, 1, 1),
('A006', 6, 1, 1, 1, 1, 1),
('A101', 1, 0, 0, 0, 0, 0),
('A101', 2, 1, 0, 1, 0, 0),
('A101', 3, 0, 1, 1, 1, 1),
('A101', 4, 1, 0, 1, 0, 0),
('A101', 5, 1, 0, 1, 1, 1),
('A101', 6, 0, 1, 0, 0, 1),
('A102', 1, 0, 0, 0, 1, 0),
('A102', 2, 0, 1, 0, 0, 1),
('A102', 3, 1, 0, 0, 0, 1),
('A102', 4, 0, 1, 1, 0, 0),
('A102', 5, 0, 1, 1, 0, 0),
('A102', 6, 0, 0, 0, 1, 0),
('A103', 1, 0, 1, 1, 1, 1),
('A103', 2, 1, 1, 0, 1, 1),
('A103', 3, 1, 1, 1, 0, 1),
('A103', 4, 1, 1, 1, 1, 1),
('A103', 5, 1, 1, 1, 1, 0),
('A103', 6, 0, 1, 1, 1, 1),
('A104 ', 1, 1, 1, 1, 1, 1),
('A104 ', 2, 1, 1, 0, 1, 1),
('A104 ', 3, 1, 1, 1, 0, 1),
('A104 ', 4, 1, 1, 0, 1, 0),
('A104 ', 5, 0, 0, 1, 1, 1),
('A104 ', 6, 1, 1, 1, 1, 1),
('A201', 1, 1, 1, 1, 1, 1),
('A201', 2, 1, 0, 1, 1, 1),
('A201', 3, 1, 1, 1, 1, 1),
('A201', 4, 1, 1, 1, 1, 1),
('A201', 5, 0, 1, 1, 1, 1),
('A201', 6, 1, 0, 0, 1, 1),
('A203', 1, 1, 1, 1, 0, 1),
('A203', 2, 1, 0, 1, 1, 0),
('A203', 3, 1, 1, 1, 1, 0),
('A203', 4, 1, 0, 0, 1, 1),
('A203', 5, 0, 1, 1, 1, 1),
('A203', 6, 0, 1, 0, 1, 1),
('A204', 1, 1, 0, 0, 0, 0),
('A204', 2, 1, 0, 0, 0, 0),
('A204', 3, 0, 0, 0, 0, 0),
('A204', 4, 0, 0, 0, 0, 0),
('A204', 5, 0, 0, 1, 0, 0),
('A204', 6, 0, 0, 1, 0, 0),
('A205', 1, 1, 1, 1, 0, 0),
('A205', 2, 1, 0, 1, 1, 1),
('A205', 3, 0, 1, 1, 1, 1),
('A205', 4, 1, 1, 0, 1, 1),
('A205', 5, 1, 1, 1, 1, 1),
('A205', 6, 0, 0, 0, 0, 1),
('A206', 1, 1, 1, 1, 0, 1),
('A206', 2, 1, 1, 1, 1, 1),
('A206', 3, 1, 1, 1, 1, 1),
('A206', 4, 1, 1, 0, 1, 0),
('A206', 5, 1, 0, 1, 1, 1),
('A206', 6, 1, 1, 1, 1, 1),
('A207 ', 1, 1, 1, 1, 1, 1),
('A207 ', 2, 1, 1, 1, 1, 1),
('A207 ', 3, 1, 1, 1, 1, 1),
('A207 ', 4, 1, 1, 1, 1, 0),
('A207 ', 5, 0, 1, 1, 0, 0),
('A207 ', 6, 0, 1, 1, 1, 1),
('A208', 1, 0, 1, 1, 1, 1),
('A208', 2, 0, 1, 1, 1, 1),
('A208', 3, 1, 0, 1, 0, 0),
('A208', 4, 1, 0, 1, 1, 1),
('A208', 5, 1, 0, 1, 1, 1),
('A208', 6, 1, 1, 0, 0, 1),
('A209', 1, 1, 1, 1, 1, 1),
('A209', 2, 1, 1, 1, 1, 0),
('A209', 3, 1, 1, 1, 0, 0),
('A209', 4, 1, 1, 1, 1, 1),
('A209', 5, 1, 0, 0, 1, 1),
('A209', 6, 1, 1, 1, 1, 1),
('A210', 1, 1, 1, 1, 1, 1),
('A210', 2, 1, 0, 0, 1, 0),
('A210', 3, 0, 1, 1, 1, 1),
('A210', 4, 1, 0, 1, 1, 1),
('A210', 5, 1, 1, 1, 0, 1),
('A210', 6, 1, 1, 1, 1, 1),
('A211', 1, 0, 0, 1, 1, 1),
('A211', 2, 1, 1, 1, 1, 0),
('A211', 3, 1, 0, 0, 1, 1),
('A211', 4, 1, 0, 1, 0, 1),
('A211', 5, 1, 1, 1, 1, 1),
('A211', 6, 1, 1, 1, 1, 1),
('A212', 1, 1, 0, 1, 1, 1),
('A212', 2, 1, 1, 1, 0, 1),
('A212', 3, 1, 1, 0, 1, 1),
('A212', 4, 1, 1, 1, 1, 0),
('A212', 5, 1, 1, 1, 1, 1),
('A212', 6, 1, 1, 0, 1, 1),
('B001', 1, 0, 0, 0, 0, 0),
('B001', 2, 0, 0, 0, 0, 1),
('B001', 3, 0, 0, 0, 0, 0),
('B001', 4, 0, 0, 0, 1, 0),
('B001', 5, 0, 0, 0, 0, 1),
('B001', 6, 0, 1, 0, 0, 0),
('C001', 1, 1, 0, 0, 0, 1),
('C001', 2, 1, 1, 1, 0, 1),
('C001', 3, 1, 1, 0, 0, 0),
('C001', 4, 0, 1, 1, 0, 0),
('C001', 5, 1, 0, 0, 0, 0),
('C001', 6, 1, 1, 0, 0, 1),
('C002', 1, 1, 1, 0, 1, 1),
('C002', 2, 0, 0, 1, 0, 0),
('C002', 3, 0, 0, 1, 1, 0),
('C002', 4, 0, 1, 1, 1, 1),
('C002', 5, 0, 1, 0, 0, 1),
('C002', 6, 0, 0, 0, 0, 0),
('C003', 1, 1, 1, 0, 1, 0),
('C003', 2, 1, 1, 1, 0, 0),
('C003', 3, 0, 0, 1, 0, 1),
('C003', 4, 0, 1, 1, 1, 1),
('C003', 5, 1, 0, 0, 1, 0),
('C003', 6, 1, 0, 0, 1, 1),
('D001', 1, 1, 1, 1, 0, 1),
('D001', 2, 1, 1, 1, 0, 1),
('D001', 3, 1, 0, 1, 1, 1),
('D001', 4, 1, 1, 1, 1, 1),
('D001', 5, 1, 1, 1, 1, 1),
('D001', 6, 1, 1, 1, 1, 1),
('D002', 1, 1, 1, 0, 1, 0),
('D002', 2, 1, 1, 1, 1, 0),
('D002', 3, 1, 1, 1, 1, 1),
('D002', 4, 0, 1, 1, 1, 1),
('D002', 5, 1, 0, 1, 1, 0),
('D002', 6, 1, 0, 1, 0, 0),
('D003', 1, 1, 1, 1, 1, 1),
('D003', 2, 1, 0, 1, 1, 1),
('D003', 3, 0, 1, 1, 1, 1),
('D003', 4, 1, 1, 1, 1, 1),
('D003', 5, 1, 1, 0, 1, 1),
('D003', 6, 1, 1, 1, 1, 1),
('D004', 1, 1, 1, 1, 1, 1),
('D004', 2, 0, 1, 1, 1, 1),
('D004', 3, 1, 0, 1, 1, 1),
('D004', 4, 0, 1, 1, 0, 1),
('D004', 5, 1, 1, 0, 1, 1),
('D004', 6, 1, 1, 0, 1, 0),
('D005 ', 1, 1, 0, 0, 1, 0),
('D005 ', 2, 0, 1, 0, 0, 1),
('D005 ', 3, 1, 0, 0, 1, 1),
('D005 ', 4, 0, 1, 0, 0, 1),
('D005 ', 5, 1, 1, 1, 0, 0),
('D005 ', 6, 1, 0, 1, 1, 0),
('D101', 1, 1, 1, 1, 1, 1),
('D101', 2, 1, 1, 1, 1, 1),
('D101', 3, 1, 1, 1, 1, 1),
('D101', 4, 1, 0, 0, 1, 0),
('D101', 5, 0, 1, 0, 1, 1),
('D101', 6, 0, 1, 1, 1, 1),
('D102', 1, 0, 0, 0, 0, 0),
('D102', 2, 0, 0, 0, 0, 1),
('D102', 3, 0, 0, 0, 0, 1),
('D102', 4, 0, 1, 1, 0, 0),
('D102', 5, 1, 0, 1, 0, 0),
('D102', 6, 1, 0, 1, 0, 1),
('D103', 1, 1, 1, 0, 1, 1),
('D103', 2, 1, 1, 0, 1, 0),
('D103', 3, 0, 1, 1, 0, 0),
('D103', 4, 1, 1, 1, 1, 1),
('D103', 5, 0, 0, 1, 1, 1),
('D103', 6, 0, 0, 1, 1, 1),
('D104', 1, 1, 0, 1, 1, 0),
('D104', 2, 1, 0, 1, 1, 1),
('D104', 3, 0, 0, 1, 1, 1),
('D104', 4, 0, 1, 0, 0, 0),
('D104', 5, 1, 1, 0, 1, 0),
('D104', 6, 1, 1, 0, 1, 0),
('D105', 1, 1, 0, 1, 0, 0),
('D105', 2, 1, 0, 0, 0, 1),
('D105', 3, 1, 1, 1, 1, 0),
('D105', 4, 1, 1, 0, 1, 1),
('D105', 5, 1, 1, 1, 0, 0),
('D105', 6, 1, 0, 1, 0, 1),
('D106', 1, 1, 1, 1, 1, 1),
('D106', 2, 0, 0, 1, 1, 1),
('D106', 3, 1, 1, 0, 1, 1),
('D106', 4, 1, 1, 1, 1, 1),
('D106', 5, 0, 1, 1, 1, 1),
('D106', 6, 1, 1, 1, 1, 1),
('D107', 1, 1, 1, 1, 1, 1),
('D107', 2, 1, 1, 1, 1, 1),
('D107', 3, 1, 1, 1, 1, 1),
('D107', 4, 1, 1, 1, 1, 1),
('D107', 5, 0, 1, 1, 1, 1),
('D107', 6, 1, 1, 1, 1, 1),
('D108', 1, 0, 0, 0, 0, 0),
('D108', 2, 0, 1, 0, 1, 1),
('D108', 3, 1, 0, 1, 1, 0),
('D108', 4, 0, 0, 1, 0, 1),
('D108', 5, 1, 1, 1, 0, 1),
('D108', 6, 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pabellon`
--

CREATE TABLE `pabellon` (
  `idPabellon` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pabellon`
--

INSERT INTO `pabellon` (`idPabellon`, `nombre`) VALUES
('A', 'Pabellon A'),
('B', 'Pabellon B'),
('C', 'Pabellon C'),
('D', 'Pabellon D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nre` int(11) NOT NULL,
  `passworld` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nre`, `passworld`, `nombre`, `apellidos`, `admin`) VALUES
(112, '$2y$10$QMy9fIxB7d/wotysN7mSIeI6DD.40sBJf04CsgnfCiwTS04LzUks.', 'adaw', 'jkl', 0),
(1216345, '$2y$10$QN9etNcyCBW0mlIgNjO7hOTJuYKUEUsiUEzBYZ8oc1E3NeW1X3A5S', 'Franshesca', 'Josean Nesteres Villegas', 0),
(1231231, '$2y$10$ULesk3kcLL1/5IMSJyc5wO1zi.OjQCbUzILC71IPhVXq91xA1XJOe', 'test', 'test', 0),
(1666391, '$2y$10$ULesk3kcLL1/5IMSJyc5wO1zi.OjQCbUzILC71IPhVXq91xA1XJOe', 'Jose Manuel', 'Garcia Sanchez', 1),
(1666392, '$2y$10$zcQPprimyrHjgz94CRnwH.wQLyD0X9FuTxdFGwDBA.hjbyBVVD/.q', 'test2', 'test2', 0),
(4165567, '$2y$10$ULesk3kcLL1/5IMSJyc5wO1zi.OjQCbUzILC71IPhVXq91xA1XJOe', 'Junior Fabricio', 'Chipantashi Garzon', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`idAula`),
  ADD KEY `fk_aula_pabellon` (`idPabellon`);

--
-- Indices de la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aula-equipamiento` (`idAula`);

--
-- Indices de la tabla `espera`
--
ALTER TABLE `espera`
  ADD PRIMARY KEY (`id-aula`,`id-hora`,`id-dia`,`id-mes`),
  ADD KEY `fk_usuario_espera` (`id-profesor`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD PRIMARY KEY (`idAula`,`idHora`,`idDia`,`idMes`),
  ADD KEY `fk_grupo_ocupacion` (`idGrupo`),
  ADD KEY `fk_ocupacion-profesor` (`idProfesor`);

--
-- Indices de la tabla `okupacion`
--
ALTER TABLE `okupacion`
  ADD PRIMARY KEY (`idAula`,`hora`);

--
-- Indices de la tabla `pabellon`
--
ALTER TABLE `pabellon`
  ADD PRIMARY KEY (`idPabellon`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `fk_aula_pabellon` FOREIGN KEY (`idPabellon`) REFERENCES `pabellon` (`idPabellon`);

--
-- Filtros para la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  ADD CONSTRAINT `fk_aula-equipamiento` FOREIGN KEY (`idAula`) REFERENCES `aula` (`idAula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `espera`
--
ALTER TABLE `espera`
  ADD CONSTRAINT `fk_aula-usuario` FOREIGN KEY (`id-aula`) REFERENCES `aula` (`idAula`),
  ADD CONSTRAINT `fk_espera-usuario` FOREIGN KEY (`id-profesor`) REFERENCES `usuario` (`nre`);

--
-- Filtros para la tabla `ocupacion`
--
ALTER TABLE `ocupacion`
  ADD CONSTRAINT `fk_grupo_ocupacion` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ocupacion-profesor` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`nre`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_opcupacion-aula` FOREIGN KEY (`idAula`) REFERENCES `aula` (`idAula`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
