-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2019 at 02:16 AM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u700606897_namo`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `act_codigo` int(11) NOT NULL,
  `act_fecha` date NOT NULL,
  `edi_codigo` int(11) NOT NULL,
  `act_lugar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act_direccion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `asi_codigo` int(11) NOT NULL,
  `act_codigo` int(11) NOT NULL,
  `par_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auspiciante`
--

CREATE TABLE `auspiciante` (
  `aus_codigo` int(11) NOT NULL,
  `aus_nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aus_correo` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aus_telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `car_codigo` int(11) NOT NULL,
  `car_detalle` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`car_codigo`, `car_detalle`) VALUES
(1, 'Lic. Ciencias Informaticas'),
(11, 'Ing. Aeronáutica'),
(12, 'Ing. Ciencias de los Materiales'),
(13, 'Ing. en Energía'),
(14, 'Ing. en Electricidad'),
(15, 'Ing. en Electrónica'),
(16, 'Ing. en Informática'),
(17, 'Ing. en Marketing'),
(18, 'Ing. Sistemas de Producción'),
(19, 'Lic. en Electricidad'),
(20, 'Lic. Ciencias de la Información'),
(31, 'Lic. Gestión de Hospitalidad'),
(32, 'Técnico en Electrónica');

-- --------------------------------------------------------

--
-- Table structure for table `colaborador`
--

CREATE TABLE `colaborador` (
  `col_codigo` int(11) NOT NULL,
  `col_aporteDetalle` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `col_aporteMonetario` int(11) DEFAULT NULL,
  `edi_codigo` int(11) NOT NULL,
  `aus_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edicion`
--

CREATE TABLE `edicion` (
  `edi_codigo` int(11) NOT NULL,
  `edi_detalle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edicion`
--

INSERT INTO `edicion` (`edi_codigo`, `edi_detalle`) VALUES
(1, 'Primera Edición'),
(2, 'Segunda Edición'),
(3, 'Tercera Edición'),
(4, 'Cuarta Edición'),
(5, 'Quinta Edición');

-- --------------------------------------------------------

--
-- Table structure for table `participante`
--

CREATE TABLE `participante` (
  `par_codigo` int(11) NOT NULL,
  `per_codigo` int(11) NOT NULL,
  `edi_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participante`
--

INSERT INTO `participante` (`par_codigo`, `per_codigo`, `edi_codigo`) VALUES
(30, 43, 5),
(31, 44, 5),
(32, 45, 5),
(33, 46, 5),
(34, 47, 5),
(35, 48, 5),
(36, 49, 5),
(37, 50, 5),
(41, 54, 5),
(44, 57, 5),
(46, 59, 5),
(47, 60, 5),
(49, 62, 5),
(50, 63, 5),
(52, 65, 5),
(53, 66, 5),
(55, 68, 5),
(56, 69, 5),
(57, 70, 5),
(58, 71, 5),
(59, 72, 5),
(60, 73, 5),
(62, 75, 5),
(63, 76, 5),
(64, 77, 5),
(65, 78, 5),
(66, 79, 5),
(67, 80, 5),
(68, 81, 5),
(69, 82, 5),
(70, 83, 5),
(71, 84, 5),
(72, 85, 5),
(73, 86, 5),
(74, 87, 5),
(75, 88, 5),
(76, 89, 5),
(77, 90, 5),
(78, 91, 5),
(79, 92, 5),
(80, 93, 5),
(81, 94, 5),
(82, 95, 5),
(83, 96, 5),
(84, 97, 5),
(85, 98, 5),
(86, 99, 5),
(87, 100, 5),
(88, 101, 5),
(89, 102, 5),
(90, 103, 5),
(91, 104, 5),
(92, 105, 5),
(93, 106, 5),
(94, 107, 5),
(95, 108, 5),
(96, 109, 5),
(97, 110, 5),
(98, 111, 5),
(99, 112, 5),
(100, 113, 5),
(101, 114, 5),
(102, 115, 5),
(103, 116, 5),
(104, 117, 5),
(105, 118, 5),
(106, 119, 5),
(107, 120, 5),
(108, 121, 5),
(109, 122, 5),
(110, 123, 5),
(111, 124, 5),
(112, 125, 5),
(113, 126, 5),
(114, 127, 5),
(115, 128, 5),
(116, 129, 5),
(117, 130, 5),
(118, 131, 5),
(119, 132, 5),
(120, 133, 5),
(121, 134, 5),
(122, 135, 5),
(123, 136, 5),
(124, 137, 5),
(125, 138, 5),
(126, 139, 5),
(127, 140, 5),
(128, 141, 5),
(129, 142, 5),
(130, 143, 5),
(131, 144, 5),
(132, 145, 5),
(133, 146, 5),
(134, 147, 5),
(135, 148, 5),
(136, 149, 5),
(137, 150, 5),
(138, 151, 5),
(139, 152, 5),
(140, 153, 5),
(141, 154, 5),
(142, 155, 5),
(143, 156, 5),
(144, 157, 5),
(145, 158, 5),
(146, 159, 5),
(147, 160, 5),
(148, 161, 5),
(149, 162, 5),
(150, 163, 5),
(151, 164, 5),
(152, 165, 5),
(153, 166, 5);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `per_codigo` int(11) NOT NULL,
  `per_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_ci` int(11) DEFAULT NULL,
  `per_password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_correo` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_fecha_nac` date DEFAULT NULL,
  `sex_codigo` int(11) NOT NULL,
  `tp_codigo` int(11) NOT NULL,
  `car_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`per_codigo`, `per_nombre`, `per_apellido`, `per_ci`, `per_password`, `per_correo`, `per_fecha_nac`, `sex_codigo`, `tp_codigo`, `car_codigo`) VALUES
(43, 'Eduardo David', 'Gomez Cardenas', 4659580, '0000', 'eduardocardenas97@gmail.com', '2000-03-18', 1, 3, 1),
(44, 'Giannina Arami ', 'Iriarte Argaña', 5294121, '0000', 'gianniarami@hotmail.com', '1999-02-27', 2, 3, 1),
(45, 'Rita', 'Cantero', 449844, '0000', '', '1951-01-01', 2, 2, NULL),
(46, 'Emilia ', 'Torres', 428978, '0000', '', '1950-01-01', 2, 2, NULL),
(47, 'Pascuala ', 'Gomez', 284350, '0000', '', '1945-01-01', 2, 2, NULL),
(48, 'Ladislada', 'Candia', 1684277, '0000', '', '1941-01-01', 2, 2, NULL),
(49, 'Mirian', 'Colman', 432805, '0000', '', '1952-01-01', 2, 2, NULL),
(50, 'Mirtha', 'Moreno', 424043, '0000', '', '1954-01-01', 2, 2, NULL),
(54, 'Felipe ', 'Olmedo', 406240, '0000', '', '1950-01-01', 1, 2, NULL),
(57, 'Luz', 'Rales', 846807, '0000', '', '1951-01-01', 2, 2, NULL),
(59, 'Juana', 'Garay', 735385, '0000', '', '1939-01-01', 2, 2, NULL),
(60, 'María ', 'Ibañez', 263191, '0000', '', '1945-01-01', 2, 2, NULL),
(62, 'José Francisco', 'Gamarra', 245502, '0000', '', '1938-11-11', 1, 2, NULL),
(63, 'Nilda', 'Rodriguez', 293836, '0000', '', '1957-01-01', 2, 2, NULL),
(65, 'Zulma', 'Silva', 733299, '0000', '', '1954-01-01', 2, 2, NULL),
(66, 'Rosa', 'Olmedo de Gamarra', 370597, '0000', '', '1943-11-11', 2, 2, NULL),
(68, 'Efigenia', 'Yergros', 188613, '0000', '', '1939-01-01', 2, 2, NULL),
(69, 'Soltero', 'Ferreira Torres', 283795, '0000', '', '1946-11-11', 1, 2, NULL),
(70, 'Graciela', 'Acosta', 640769, '0000', '', '1951-01-01', 2, 2, NULL),
(71, 'Justina', 'Gomez', 501811, '0000', '', '1952-01-01', 2, 2, NULL),
(72, 'Petrona', 'Vázquez', 1104655, '0000', '', '1962-01-01', 2, 2, NULL),
(73, 'Nilo', 'Ruiz', 264346, '0000', '', '1943-01-01', 1, 2, NULL),
(75, 'Amanda', 'Rolon', 231805, '0000', '', '1942-01-02', 2, 2, NULL),
(76, 'Haydee', 'Cantero', 680702, '0000', '', '1950-01-20', 2, 2, NULL),
(77, 'Pablo', 'Moura', 1214602, '0000', '', '1944-02-02', 1, 2, NULL),
(78, 'Yolanda ', 'Oviedo', 1605507, '0000', '', '1956-01-10', 2, 2, NULL),
(79, 'Regina', 'Paredes', 396032, '0000', '', '1949-01-05', 2, 2, NULL),
(80, 'Cecilio', 'Benitez', 334875, '0000', '', '1944-10-06', 2, 2, NULL),
(81, 'Augusta', 'Valiente Vargas', 520807, '0000', '', '1957-11-11', 2, 2, NULL),
(82, 'Elpidia', 'Orue', 868721, '0000', '', '1960-05-05', 2, 2, NULL),
(83, 'Juan Enrique', 'Martínez Martín', 690447, '0000', '', '1949-11-11', 1, 2, NULL),
(84, 'María Cristina', 'Mena de Monzón', 423088, '0000', '', '1953-11-11', 2, 2, NULL),
(85, 'Laureana', 'Gauto', 398338, '0000', '', '1950-05-11', 2, 2, NULL),
(86, 'Juan Manuel', 'Monzón', 1384643, '0000', '', '1949-11-11', 1, 2, NULL),
(87, 'Celia Ramona', 'Ortega', 2700299, '0000', '', '1961-11-11', 2, 2, NULL),
(88, 'Teodora', 'Garay', 1049569, '0000', '', '1949-11-11', 2, 2, NULL),
(89, 'Ladislao', 'Gimenez', 631887, '0000', '', '1950-11-11', 1, 2, NULL),
(90, 'Luciana', 'Cabrera', 404246, '0000', '', '1949-05-05', 2, 2, NULL),
(91, 'Carlos', 'Ramirez', 213598, '0000', '', '1947-05-05', 1, 2, NULL),
(92, 'Maura Estela', 'Resquín', 427609, '0000', '', '1953-11-11', 2, 2, NULL),
(93, 'Justa', 'Santacruz', 371384, '0000', '', '1949-11-11', 2, 2, NULL),
(94, 'Olga Aurelia', 'Parodi Aquino', 365550, '0000', '', '1949-11-11', 2, 2, NULL),
(95, 'Arsenio', 'Soler Galeano', 1072113, '0000', '', '1949-11-11', 1, 2, NULL),
(96, 'Juana Bautista', 'Caceres Vda de Gomez', 231068, '0000', '', '1943-11-11', 2, 2, NULL),
(97, 'Petrona', 'Florentin', 738278, '0000', '', '1956-11-11', 2, 2, NULL),
(98, 'Benigna', 'Balbuena de Ramirez', 384527, '0000', '', '1950-11-11', 2, 2, NULL),
(99, 'Ceferino', 'Ramirez Escobar', 394390, '0000', '', '1946-11-11', 1, 2, NULL),
(100, 'Rosa Isabel', 'Acosta Añasco', 322568, '0000', '', '1946-05-05', 2, 2, NULL),
(101, 'Valencia de Jesus', 'Almada Barreto', 326978, '0000', '', '1946-11-11', 2, 2, NULL),
(102, 'Teodosia Elvira', 'Lopez de Medina', 299966, '0000', '', '1946-11-11', 2, 2, NULL),
(103, 'Fulgencio', 'Escobar ', 903474, '0000', '', '1941-11-11', 1, 2, NULL),
(104, 'Cesar Aurelio', 'Alvarez Caceres', 231227, '0000', '', '1942-11-11', 1, 2, NULL),
(105, 'Lidia', 'Penayo Martinez', 308812, '0000', '', '1946-11-11', 2, 2, NULL),
(106, 'Oliver Isaías', 'Medina Recalde', 4662525, '0000', 'olomedina00@gmail.com', '2000-04-12', 1, 1, 1),
(107, 'Petrona', 'Bordón', 1361811, '0000', '', '1940-11-11', 2, 2, NULL),
(108, 'Francisca', 'Aquino de Vega', 270426, '0000', '', '1941-11-11', 2, 2, NULL),
(109, 'Ilda Zeneida', 'Perdomo', 234054, '0000', '', '1944-11-11', 2, 2, NULL),
(110, 'Alida', 'Brizuela', 427096, '0000', '', '1945-11-11', 2, 2, NULL),
(111, 'Julio', 'Montorfano', 346905, '0000', '', '1952-11-11', 1, 2, NULL),
(112, 'Gill', 'Escurra', 1972322, '0000', '', '1942-11-11', 1, 2, NULL),
(113, 'Benita', 'Patiño', 191660, '0000', '', '1935-11-11', 2, 2, NULL),
(114, 'Claudia ', 'Morales', 497550, '0000', '', '1949-11-11', 2, 2, NULL),
(115, 'Hilda', 'Almada', 509189, '0000', '', '1948-11-11', 2, 2, NULL),
(116, 'Ma. Estela', 'Jara', 231250, '0000', '', '1942-11-11', 2, 2, NULL),
(117, 'Domiciana', 'Brizuela', 504755, '0000', '', '1949-11-11', 2, 2, NULL),
(118, 'Amada', 'Cabrera', 617146, '0000', '', '1941-11-11', 2, 2, NULL),
(119, 'Maria', 'Recalde', 1190140, '0000', '', '1959-11-11', 2, 2, NULL),
(120, 'Fredeslinda', 'Monges', 2512279, '0000', '', '1941-11-11', 2, 2, NULL),
(121, 'Ma. Asuncion', 'Rojas', 752918, '0000', '', '1949-11-11', 2, 2, NULL),
(122, 'Eliodora', 'Mendoza', 773528, '0000', '', '1948-11-11', 2, 2, NULL),
(123, 'Sofia', 'Ojeda', 385788, '0000', '', '1954-11-11', 2, 2, NULL),
(124, 'Juana', 'Pereira', 355559, '0000', '', '1952-11-11', 2, 2, NULL),
(125, 'Matilde', 'Morena', 494150, '0000', '', '1944-11-11', 2, 2, NULL),
(126, 'Silvia', 'Gamba', 798771, '0000', '', '1948-11-11', 2, 2, NULL),
(127, 'Edy', 'Arrua', 328139, '0000', '', '1947-11-11', 1, 2, NULL),
(128, 'Gilda', 'Nuñez', 668578, '0000', '', '1955-11-11', 2, 2, NULL),
(129, 'Calixto', 'Duré', 815557, '0000', '', '1950-11-11', 1, 2, NULL),
(130, 'Olga', 'Caceres', 810194, '0000', '', '1955-11-11', 2, 2, NULL),
(131, 'Iris', 'Nass', 974245, '0000', '', '1953-11-11', 2, 2, NULL),
(132, 'Teresa', 'Paredes', 328094, '0000', '', '1940-11-11', 2, 2, NULL),
(133, 'Celina', 'Magni', 238692, '0000', '', '1938-11-11', 2, 2, NULL),
(134, 'Ma. Selena', 'Zarate', 683390, '0000', '', '1952-11-11', 2, 2, NULL),
(135, 'Constancia', 'Valenzuela', 1522653, '0000', '', '1965-11-11', 2, 2, NULL),
(136, 'Agustina', 'Caballero', 846593, '0000', '', '1955-11-11', 2, 2, NULL),
(137, 'Felicita', 'Caballero', 732258, '0000', '', '1957-11-11', 2, 2, NULL),
(138, 'Nestor', 'Segovia', 124418, '0000', '', '1931-11-11', 1, 2, NULL),
(139, 'Miguela', 'Dante', 520389, '0000', '', '1951-11-11', 2, 2, NULL),
(140, 'Elpidio', 'Gaona', 298292, '0000', '', '1943-11-11', 1, 2, NULL),
(141, 'Carlos', 'Careaga', 444991, '0000', '', '1942-11-11', 1, 2, NULL),
(142, 'Leonarda', 'Chavez', 364528, '0000', '', '1941-11-11', 2, 2, NULL),
(143, 'Lina', 'Viñuales', 369457, '0000', '', '1949-11-11', 2, 2, NULL),
(144, 'Amelia', 'Torres', 273740, '0000', '', '1941-11-11', 2, 2, NULL),
(145, 'Mirta', 'Cañete', 425537, '0000', '', '1960-11-11', 2, 2, NULL),
(146, 'Ramona', 'Florentin', 2114165, '0000', '', '1958-11-11', 2, 2, NULL),
(147, 'Rosa', 'Alcaraz', 341253, '0000', '', '1945-11-11', 2, 2, NULL),
(148, 'Osvalda', 'Ortigoza', 300481, '0000', '', '1945-11-11', 2, 2, NULL),
(149, 'Ester', 'Alliende', 534803, '0000', '', '1952-11-11', 2, 2, NULL),
(150, 'Mirtha', 'Paredes', 381524, '0000', '', '1953-11-11', 2, 2, NULL),
(151, 'Florinda', 'Brizuela', 2105684, '0000', '', '1947-11-11', 2, 2, NULL),
(152, 'Hilda', ' Alvarenga', 316260, '0000', '', '1953-11-11', 2, 2, NULL),
(153, 'Beatriz', 'Mareco', 749434, '0000', '', '1952-11-11', 2, 2, NULL),
(154, 'Juana', 'Vazquez', 942910, '0000', '', '1953-11-11', 2, 2, NULL),
(155, 'Rosa', 'Estigarribia', 204496, '0000', '', '1940-11-11', 2, 2, NULL),
(156, 'Estela', ' Velazquez', 596713, '0000', '', '1955-11-11', 2, 2, NULL),
(157, 'Ana', 'Pereira', 955521, '0000', '', '1960-11-11', 2, 2, NULL),
(158, 'Brigida', 'Estigarribia', 336554, '0000', '', '1942-11-11', 2, 2, NULL),
(159, 'Nidia', 'Lopez', 417183, '0000', '', '1944-11-11', 2, 2, NULL),
(160, 'Lucila', 'Ortiz', 361503, '0000', '', '1949-11-11', 2, 2, NULL),
(161, 'Idalina', 'Villalba', 637774, '0000', '', '1954-11-11', 2, 2, NULL),
(162, 'Hermogenes', 'Mendoza', 452628, '0000', '', '1951-11-11', 1, 2, NULL),
(163, 'Jovina', 'Meza', 625998, '0000', '', '1952-11-11', 2, 2, NULL),
(164, 'Silvia', 'Flores', 922285, '0000', '', '1966-11-11', 2, 2, NULL),
(165, 'Francisca', 'Gonzalez', 499391, '0000', '', '1949-11-11', 2, 2, NULL),
(166, 'Irma', 'Soto', 486241, '0000', '', '1948-11-11', 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sexo`
--

CREATE TABLE `sexo` (
  `sex_codigo` int(11) NOT NULL,
  `sex_detalle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sexo`
--

INSERT INTO `sexo` (`sex_codigo`, `sex_detalle`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `tip_persona`
--

CREATE TABLE `tip_persona` (
  `tp_codigo` int(11) NOT NULL,
  `tp_detalle` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tip_persona`
--

INSERT INTO `tip_persona` (`tp_codigo`, `tp_detalle`) VALUES
(1, 'Voluntario'),
(2, 'Participante'),
(3, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`act_codigo`),
  ADD KEY `edicion_actividad_fk` (`edi_codigo`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`asi_codigo`),
  ADD KEY `actividad_asistencia_fk` (`act_codigo`),
  ADD KEY `participante_asistencia_fk` (`par_codigo`);

--
-- Indexes for table `auspiciante`
--
ALTER TABLE `auspiciante`
  ADD PRIMARY KEY (`aus_codigo`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`car_codigo`);

--
-- Indexes for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`col_codigo`),
  ADD KEY `auspiciante_colaborador_fk` (`aus_codigo`),
  ADD KEY `edicion_colaborador_fk` (`edi_codigo`);

--
-- Indexes for table `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`edi_codigo`);

--
-- Indexes for table `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`par_codigo`),
  ADD KEY `edicion_participante_fk` (`edi_codigo`),
  ADD KEY `persona_participante_fk` (`per_codigo`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_codigo`),
  ADD KEY `carrera_persona_fk` (`car_codigo`),
  ADD KEY `tip_persona_persona_fk` (`tp_codigo`),
  ADD KEY `sexo_persona_fk` (`sex_codigo`);

--
-- Indexes for table `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`sex_codigo`);

--
-- Indexes for table `tip_persona`
--
ALTER TABLE `tip_persona`
  ADD PRIMARY KEY (`tp_codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `act_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `asi_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auspiciante`
--
ALTER TABLE `auspiciante`
  MODIFY `aus_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `car_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `col_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edicion`
--
ALTER TABLE `edicion`
  MODIFY `edi_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participante`
--
ALTER TABLE `participante`
  MODIFY `par_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `per_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `sexo`
--
ALTER TABLE `sexo`
  MODIFY `sex_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tip_persona`
--
ALTER TABLE `tip_persona`
  MODIFY `tp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `edicion_actividad_fk` FOREIGN KEY (`edi_codigo`) REFERENCES `edicion` (`edi_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `actividad_asistencia_fk` FOREIGN KEY (`act_codigo`) REFERENCES `actividad` (`act_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participante_asistencia_fk` FOREIGN KEY (`par_codigo`) REFERENCES `participante` (`par_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `auspiciante_colaborador_fk` FOREIGN KEY (`aus_codigo`) REFERENCES `auspiciante` (`aus_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `edicion_colaborador_fk` FOREIGN KEY (`edi_codigo`) REFERENCES `edicion` (`edi_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `edicion_participante_fk` FOREIGN KEY (`edi_codigo`) REFERENCES `edicion` (`edi_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `persona_participante_fk` FOREIGN KEY (`per_codigo`) REFERENCES `persona` (`per_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `carrera_persona_fk` FOREIGN KEY (`car_codigo`) REFERENCES `carrera` (`car_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sexo_persona_fk` FOREIGN KEY (`sex_codigo`) REFERENCES `sexo` (`sex_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tip_persona_persona_fk` FOREIGN KEY (`tp_codigo`) REFERENCES `tip_persona` (`tp_codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
