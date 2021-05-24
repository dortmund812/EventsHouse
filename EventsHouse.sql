-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para events_house
CREATE DATABASE IF NOT EXISTS `events_house` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `events_house`;

-- Volcando estructura para tabla events_house.alerta
CREATE TABLE IF NOT EXISTS `alerta` (
  `id_alerta` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_alerta`),
  KEY `estado` (`estado`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `alerta_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `estado_alerta` FOREIGN KEY (`estado`) REFERENCES `estado_alerta` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.alerta: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `alerta` DISABLE KEYS */;
INSERT IGNORE INTO `alerta` (`id_alerta`, `titulo`, `mensaje`, `usuario`, `estado`) VALUES
	(1, 'Nueva alerta', 'lorem ipsum', 1, 2);
/*!40000 ALTER TABLE `alerta` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.asignacion_empleados
CREATE TABLE IF NOT EXISTS `asignacion_empleados` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacion` int(11) NOT NULL,
  `trabajador` int(11) NOT NULL,
  `estado_asignacion` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_asignacion`),
  KEY `cotizacion` (`cotizacion`),
  KEY `trabajador` (`trabajador`),
  KEY `estado_asignacion` (`estado_asignacion`),
  CONSTRAINT `asig_cotizacion` FOREIGN KEY (`cotizacion`) REFERENCES `cotizacion` (`id_cotizacion`),
  CONSTRAINT `asig_trabajador` FOREIGN KEY (`trabajador`) REFERENCES `trabajador` (`id_trabajador`),
  CONSTRAINT `estado_asignacion_empleado` FOREIGN KEY (`estado_asignacion`) REFERENCES `estado_asignacion_empleado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.asignacion_empleados: ~173 rows (aproximadamente)
/*!40000 ALTER TABLE `asignacion_empleados` DISABLE KEYS */;
INSERT IGNORE INTO `asignacion_empleados` (`id_asignacion`, `cotizacion`, `trabajador`, `estado_asignacion`) VALUES
	(3, 25, 16, 1),
	(8, 2, 29, 1),
	(9, 2, 41, 1),
	(11, 2, 16, 1),
	(15, 2, 40, 1),
	(24, 5, 16, 1),
	(25, 5, 29, 1),
	(26, 5, 28, 1),
	(27, 5, 49, 1),
	(28, 5, 51, 1),
	(29, 5, 50, 1),
	(30, 5, 34, 1),
	(31, 5, 33, 1),
	(32, 5, 19, 1),
	(33, 5, 31, 1),
	(34, 5, 18, 1),
	(36, 7, 16, 1),
	(41, 29, 16, 1),
	(42, 29, 40, 1),
	(43, 29, 29, 1),
	(44, 29, 4, 1),
	(45, 29, 37, 1),
	(46, 29, 42, 1),
	(47, 29, 14, 1),
	(48, 29, 49, 1),
	(49, 29, 53, 1),
	(50, 29, 35, 1),
	(51, 29, 5, 1),
	(52, 29, 51, 1),
	(53, 29, 9, 1),
	(54, 29, 25, 1),
	(55, 29, 34, 1),
	(56, 29, 18, 1),
	(57, 29, 19, 1),
	(58, 29, 31, 1),
	(59, 29, 38, 1),
	(61, 31, 41, 1),
	(62, 31, 37, 1),
	(63, 31, 42, 1),
	(64, 31, 36, 1),
	(65, 31, 53, 1),
	(66, 31, 27, 1),
	(67, 31, 50, 1),
	(68, 31, 18, 1),
	(69, 31, 19, 1),
	(70, 31, 38, 1),
	(71, 32, 16, 1),
	(72, 32, 4, 1),
	(73, 32, 29, 1),
	(74, 32, 6, 1),
	(75, 32, 42, 1),
	(76, 32, 36, 1),
	(77, 32, 52, 1),
	(78, 32, 28, 1),
	(79, 32, 49, 1),
	(80, 32, 53, 1),
	(81, 32, 51, 1),
	(82, 32, 27, 1),
	(83, 32, 50, 1),
	(84, 32, 9, 1),
	(85, 32, 25, 1),
	(86, 32, 34, 1),
	(87, 32, 18, 1),
	(88, 32, 33, 1),
	(89, 32, 19, 1),
	(90, 32, 31, 1),
	(92, 41, 16, 1),
	(93, 41, 6, 1),
	(94, 41, 28, 1),
	(95, 41, 49, 1),
	(96, 41, 51, 1),
	(97, 41, 27, 1),
	(104, 43, 4, 1),
	(105, 43, 29, 1),
	(106, 43, 53, 1),
	(107, 43, 35, 1),
	(108, 43, 42, 1),
	(109, 43, 36, 1),
	(110, 43, 52, 1),
	(111, 43, 33, 1),
	(112, 43, 19, 1),
	(113, 43, 18, 1),
	(114, 44, 29, 1),
	(115, 44, 41, 1),
	(116, 44, 28, 1),
	(117, 44, 13, 1),
	(118, 44, 49, 1),
	(119, 44, 51, 1),
	(120, 44, 27, 1),
	(121, 44, 50, 1),
	(122, 44, 18, 1),
	(123, 44, 33, 1),
	(124, 45, 14, 1),
	(125, 45, 36, 1),
	(126, 45, 35, 1),
	(127, 45, 5, 1),
	(128, 45, 27, 1),
	(132, 7, 6, 1),
	(133, 7, 37, 1),
	(134, 7, 5, 1),
	(135, 7, 51, 1),
	(136, 7, 18, 1),
	(137, 7, 33, 1),
	(138, 46, 6, 1),
	(139, 46, 13, 1),
	(140, 46, 5, 1),
	(141, 42, 6, 1),
	(142, 42, 29, 1),
	(143, 42, 41, 1),
	(144, 42, 28, 1),
	(145, 42, 49, 1),
	(146, 42, 13, 1),
	(147, 42, 14, 1),
	(148, 42, 42, 1),
	(149, 42, 36, 1),
	(150, 38, 35, 1),
	(151, 47, 16, 1),
	(152, 47, 40, 1),
	(153, 47, 6, 1),
	(154, 47, 14, 1),
	(155, 47, 42, 1),
	(156, 47, 36, 1),
	(157, 48, 16, 1),
	(158, 48, 37, 1),
	(159, 48, 42, 1),
	(160, 48, 36, 1),
	(161, 48, 52, 1),
	(162, 48, 51, 1),
	(163, 48, 54, 1),
	(164, 49, 29, 1),
	(165, 49, 41, 1),
	(166, 49, 35, 1),
	(167, 49, 53, 1),
	(168, 49, 34, 1),
	(169, 50, 29, 1),
	(170, 50, 41, 1),
	(171, 50, 42, 1),
	(172, 50, 36, 1),
	(173, 50, 52, 1),
	(174, 50, 51, 1),
	(175, 50, 34, 1),
	(176, 50, 50, 1),
	(177, 50, 19, 1),
	(178, 7, 58, 1),
	(179, 52, 16, 1),
	(180, 52, 29, 1),
	(181, 52, 41, 1),
	(182, 52, 42, 1),
	(183, 52, 36, 1),
	(184, 52, 52, 1),
	(185, 7, 42, 1),
	(186, 53, 29, 1),
	(187, 53, 41, 1),
	(188, 53, 37, 1),
	(189, 53, 42, 1),
	(190, 53, 36, 1),
	(191, 53, 52, 1),
	(192, 53, 54, 1),
	(194, 54, 4, 1),
	(195, 54, 29, 1),
	(196, 54, 37, 1),
	(197, 54, 42, 1),
	(198, 54, 36, 1),
	(199, 54, 52, 1),
	(200, 55, 16, 1),
	(201, 55, 6, 1),
	(202, 55, 42, 1),
	(203, 55, 36, 1),
	(204, 55, 52, 1),
	(205, 55, 54, 1),
	(206, 55, 50, 1),
	(207, 9, 42, 1),
	(208, 9, 35, 1);
/*!40000 ALTER TABLE `asignacion_empleados` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.aspirante
CREATE TABLE IF NOT EXISTS `aspirante` (
  `id_aspirante` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_aspirante` timestamp NOT NULL DEFAULT current_timestamp(),
  `hoja_vida` varchar(100) NOT NULL,
  `usuario` int(11) NOT NULL,
  `rol_aspirante` int(11) NOT NULL,
  `estado_aspirante` int(11) NOT NULL DEFAULT 3,
  PRIMARY KEY (`id_aspirante`),
  UNIQUE KEY `usuario_unico` (`usuario`),
  KEY `rol_postulado` (`rol_aspirante`),
  KEY `estado_postulado` (`estado_aspirante`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `estado_postulado` FOREIGN KEY (`estado_aspirante`) REFERENCES `estado_aspirante` (`id_estado_aspirante`),
  CONSTRAINT `rol_postulado` FOREIGN KEY (`rol_aspirante`) REFERENCES `rol_trabajador` (`id_rol`),
  CONSTRAINT `usuario_postulado` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.aspirante: ~49 rows (aproximadamente)
/*!40000 ALTER TABLE `aspirante` DISABLE KEYS */;
INSERT IGNORE INTO `aspirante` (`id_aspirante`, `fecha_aspirante`, `hoja_vida`, `usuario`, `rol_aspirante`, `estado_aspirante`) VALUES
	(1, '2019-08-08 20:21:20', 'Hoja de vida - Agencia Publica de Empleo.pdf', 43, 3, 1),
	(3, '2019-08-08 20:45:56', 'Hoja de vida - Agencia Publica de Empleo.pdf', 68, 9, 1),
	(4, '2019-08-08 20:46:14', 'Hoja de vida - Agencia Publica de Empleo.pdf', 47, 10, 1),
	(6, '2019-08-08 20:48:12', 'Hoja de vida - Agencia Publica de Empleo.pdf', 64, 3, 1),
	(7, '2019-08-10 00:06:12', 'Hoja de vida - Agencia Publica de Empleo.pdf', 73, 2, 1),
	(8, '2019-08-10 00:07:39', 'Hoja de vida - Agencia Publica de Empleo.pdf', 32, 7, 1),
	(9, '2019-08-10 18:30:31', 'Hoja de vida - Agencia Publica de Empleo.pdf', 50, 5, 1),
	(10, '2019-08-10 18:36:09', 'Hoja de vida - Agencia Publica de Empleo.pdf', 48, 4, 1),
	(12, '2019-08-10 18:37:54', 'Hoja de vida - Agencia Publica de Empleo.pdf', 67, 1, 1),
	(14, '2019-08-10 18:39:53', 'Hoja de vida - Agencia Publica de Empleo.pdf', 71, 10, 1),
	(16, '2019-08-10 18:58:51', 'Hoja de vida - Agencia Publica de Empleo.pdf', 6, 11, 1),
	(18, '2019-08-10 21:35:13', 'Hoja de vida - Agencia Publica de Empleo.pdf', 34, 6, 1),
	(19, '2019-08-10 21:38:20', 'Hoja de vida - Agencia Publica de Empleo.pdf', 10, 8, 1),
	(20, '2019-08-10 21:38:34', 'Hoja de vida - Agencia Publica de Empleo.pdf', 28, 2, 1),
	(21, '2019-08-10 21:38:50', 'Hoja de vida - Agencia Publica de Empleo.pdf', 19, 5, 1),
	(22, '2019-08-10 22:16:50', 'Hoja de vida - Agencia Publica de Empleo.pdf', 58, 8, 2),
	(23, '2019-08-10 22:17:11', 'Hoja de vida - Agencia Publica de Empleo.pdf', 22, 9, 1),
	(24, '2019-08-10 22:17:32', 'Hoja de vida - Agencia Publica de Empleo.pdf', 13, 10, 1),
	(25, '2019-08-10 22:17:50', 'Hoja de vida - Agencia Publica de Empleo.pdf', 40, 12, 1),
	(26, '2019-08-10 22:18:05', 'Hoja de vida - Agencia Publica de Empleo.pdf', 24, 2, 1),
	(27, '2019-08-10 22:18:20', 'Hoja de vida - Agencia Publica de Empleo.pdf', 37, 3, 1),
	(28, '2019-08-10 22:22:03', 'Hoja de vida - Agencia Publica de Empleo.pdf', 14, 1, 1),
	(30, '2019-08-10 22:28:40', 'Hoja de vida - Agencia Publica de Empleo.pdf', 15, 4, 1),
	(31, '2019-08-10 22:40:32', 'Hoja de vida - Agencia Publica de Empleo.pdf', 8, 12, 1),
	(33, '2019-08-10 22:50:59', 'Hoja de vida - Agencia Publica de Empleo.pdf', 5, 12, 1),
	(34, '2019-08-10 22:53:47', 'Hoja de vida - Agencia Publica de Empleo.pdf', 12, 6, 1),
	(35, '2019-08-10 23:01:48', 'Hoja de vida - Agencia Publica de Empleo.pdf', 33, 4, 1),
	(37, '2019-08-14 21:54:59', 'Hoja de vida - Agencia Publica de Empleo.pdf', 27, 5, 1),
	(38, '2019-08-17 13:16:42', 'Hoja de vida - Agencia Publica de Empleo.pdf', 81, 8, 1),
	(40, '2019-08-17 13:17:24', 'Hoja de vida - Agencia Publica de Empleo.pdf', 83, 7, 1),
	(41, '2019-08-20 10:21:40', 'Hoja de vida - Agencia Publica de Empleo.pdf', 89, 7, 1),
	(42, '2019-08-20 13:27:14', 'TerceraPrueba (9).pdf', 90, 9, 3),
	(43, '2019-08-20 13:42:37', 'SegundaPrueba (10).pdf', 91, 10, 1),
	(45, '2019-08-20 14:01:58', 'SegundaPrueba (10).pdf', 93, 4, 1),
	(46, '2019-08-20 14:12:43', 'TerceraPrueba (9).pdf', 94, 10, 2),
	(47, '2019-08-20 14:13:28', 'PrimeraPrueba (8).pdf', 95, 6, 3),
	(48, '2019-08-20 14:14:51', 'SegundaPrueba (10).pdf', 96, 10, 3),
	(49, '2019-08-20 14:18:27', 'SegundaPrueba (10).pdf', 97, 10, 3),
	(50, '2019-08-20 15:56:13', 'CJSF-B-Ejercicio-CicloVida-JSF.pdf', 98, 9, 3),
	(52, '2019-08-20 16:00:19', 'CJSF-B-Ejercicio-01-ManagedBeansEnJSF.pdf', 100, 3, 3),
	(53, '2019-08-28 14:27:01', 'TerceraPrueba (9).pdf', 111, 6, 1),
	(54, '2019-09-09 15:53:16', 'CJSF-B-Ejercicio-03-JSFyCDI.pdf', 114, 3, 3),
	(55, '2019-09-17 16:00:19', 'ganancias-mensuales.pdf', 119, 4, 3),
	(56, '2019-09-17 16:03:59', 'daily-sessions-at-wwwhig.pdf', 120, 4, 3),
	(57, '2019-09-18 09:58:07', 'ganancias-mensuales.pdf', 121, 4, 3),
	(58, '2019-09-18 15:42:21', 'empleados-por-cargo.pdf', 134, 4, 1),
	(59, '2019-09-18 16:07:13', 'carta_citacion.pdf', 135, 8, 2),
	(60, '2019-10-23 15:11:01', 'reporteProyectos (1).pdf', 150, 7, 3),
	(62, '2019-10-23 15:13:18', 'reporteProyectos (1).pdf', 152, 7, 3);
/*!40000 ALTER TABLE `aspirante` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.banquete
CREATE TABLE IF NOT EXISTS `banquete` (
  `id_banquete` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `entrada` varchar(50) NOT NULL,
  `plato_principal` varchar(50) NOT NULL,
  `ensalda` varchar(50) NOT NULL,
  `principio` varchar(50) NOT NULL,
  `acompañamiento` varchar(50) NOT NULL,
  `postre` varchar(50) NOT NULL,
  `bebidas` varchar(50) NOT NULL,
  `costo` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_banquete`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.banquete: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `banquete` DISABLE KEYS */;
INSERT IGNORE INTO `banquete` (`id_banquete`, `nombre`, `entrada`, `plato_principal`, `ensalda`, `principio`, `acompañamiento`, `postre`, `bebidas`, `costo`, `imagen`) VALUES
	(1, 'Hora del pernil', 'Crema de alcachofas', 'Jamón ibérico', 'Ensalada de manzana y jamón de pavo', 'Soufflé de queso emmental con jamón ibérico', 'Jamón ibéricos', 'Mil hoja de chocolate con crema de dulce de lecha', 'Coctel mimosa', 18000, 'pizza-3007395_1920.jpg'),
	(2, 'Happy brown con champiñones', 'Crema de papa criolla y perla de aguacate', 'Champiñones con salsa de cerveza', 'Ensalada cesar', 'Sin principio...', 'Pasta alfredo con champiñones', 'Jugo natural al gusto', 'Brownie de chocolate', 17000, 'pancakes-2020863_1920.jpg'),
	(3, 'Especialización apanada', 'Dedos mozarella apanado con salsa napolitana', 'Pollo apanado', 'Ensalada de mozarela, kiwi, tomate y aceitunas', 'Nuggets de pollo', 'Papa al horno rellena', 'Brownie de chocolate', 'Jugo natural al gusto', 17000, 'Plato-principal-o-fuerte-2.0.jpg'),
	(4, 'Sorpresa', 'Ceviche de palmitos', 'Macarrones con atún y tomate', 'Ensalada primavera', 'Verdura', 'Pasta carbonera', 'Macarones', 'Michelada', 18000, 'Plato-principal-o-fuerte-2.1.jpg'),
	(5, 'Estilo marino', 'Quiche de espinaca y ricotta', 'Arroz marinero', 'Ensalada de palmitos', 'Camarones', 'Papa hasselbach', 'Helado de cajeta', 'Jugo natural al gusto', 19000, 'Plato-principal-o-fuerte-2.jpg'),
	(6, 'Plato estilo verde', 'Canasticas de plátano rellenas', 'Habas verdes', 'Ensalada de lechuga, aguacate y naranja', 'Habichuela', 'Arroz con erveja y maíz', 'Bavoris de limón', 'Jugo natural al gusto', 17000, 'close-up-1854245_1920.jpg'),
	(7, 'Tipo ternera con jamón y queso', 'Cerdo a la Sri-Lanka', 'Rollo de carne relleno con jamón y queso', 'Ensalada campera', 'Sin principio...', 'Pastel de papa con jamón y queso', 'Helado de yogurt y limón', 'Jugo natural al gusto o Michelada', 18000, 'terneraytocino.jpg'),
	(8, 'Plato estilo rojo', 'Cerdo rojo asado a la barbacoa con salsa dulce', 'Sin plato principal...', 'Ensalada de quinoa con espárragos y fresas', 'Huevo frito', 'Arroz con jamón', 'Cheescake de frutos rojos', 'Jugo natural al gusto', 16000, 'asparagus-2169305_1920.jpg'),
	(9, 'Plato antigüedad griega', 'Yemistá', 'Mousakás', 'Ensalada griega', 'Huevo frito', 'Sin acompañamientos...', 'Postre de chocolate de leche', 'Jugo natural al gusto', 20000, 'Entradas-frias-o-calientes_0.4.jpg'),
	(10, 'Estilo frances', 'Crepe de estilo francés con salsa de chocolate', 'Bouillabaise', 'Ensalada de corazones de lechuga', 'Sin principio...', 'Cazuela de tomates y puerros', 'Bavoris de limón', 'Jugo natural al gusto', 22000, 'food-3021300_1920.jpg');
/*!40000 ALTER TABLE `banquete` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.cotizacion
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_cotizacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `costo_cotizacion` bigint(20) NOT NULL,
  `estado_evento` int(11) NOT NULL DEFAULT 2,
  `solicitud_id_solicitud` int(11) NOT NULL,
  PRIMARY KEY (`id_cotizacion`),
  UNIQUE KEY `solicitud_id_solicitud_unico` (`solicitud_id_solicitud`),
  KEY `estado_evento` (`estado_evento`),
  KEY `solicitud_id_solicitud` (`solicitud_id_solicitud`),
  CONSTRAINT `estado_evento` FOREIGN KEY (`estado_evento`) REFERENCES `estado_evento` (`id_estado_evento`),
  CONSTRAINT `solicitud_id_solicitud` FOREIGN KEY (`solicitud_id_solicitud`) REFERENCES `solicitud` (`id_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.cotizacion: ~47 rows (aproximadamente)
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT IGNORE INTO `cotizacion` (`id_cotizacion`, `fecha_cotizacion`, `costo_cotizacion`, `estado_evento`, `solicitud_id_solicitud`) VALUES
	(2, '2019-08-04 20:34:11', 2000000, 5, 11),
	(5, '2019-08-04 22:44:22', 3000000, 5, 9),
	(7, '2019-08-04 22:58:31', 12540000, 1, 10),
	(9, '2019-08-12 20:36:09', 50000, 1, 14),
	(10, '2019-08-12 22:52:58', 400000, 3, 29),
	(14, '2019-08-12 23:00:14', 4000000, 3, 6),
	(15, '2019-08-12 23:02:03', 1000000, 3, 25),
	(16, '2019-08-12 23:10:44', 40000000, 3, 20),
	(17, '2019-08-13 22:26:20', 20000000, 3, 36),
	(18, '2019-08-14 23:45:17', 80000000, 3, 34),
	(19, '2019-08-16 17:48:05', 3000000, 2, 37),
	(20, '2019-08-18 14:57:09', 89000000, 2, 46),
	(21, '2019-08-20 13:32:24', 57357357, 2, 45),
	(22, '2019-09-02 14:39:39', 3000000, 2, 12),
	(23, '2019-09-02 15:43:44', 22230000, 2, 66),
	(24, '2019-09-02 15:43:52', 4219000, 2, 65),
	(25, '2019-09-02 15:43:57', 2793000, 2, 64),
	(26, '2019-09-02 15:44:28', 21810000, 1, 63),
	(27, '2019-09-02 15:55:24', 5510000, 5, 67),
	(28, '2019-09-02 17:54:14', 2472000, 2, 69),
	(29, '2019-09-07 21:50:34', 10680000, 1, 71),
	(30, '2019-09-09 14:27:23', 11880000, 2, 72),
	(31, '2019-09-09 17:29:23', 78500000, 1, 73),
	(32, '2019-09-09 21:44:38', 16810000, 1, 74),
	(33, '2019-09-10 10:05:14', 78500000, 2, 75),
	(34, '2019-09-10 10:08:36', 79000000, 2, 76),
	(35, '2019-09-10 10:11:32', 15500000, 2, 77),
	(36, '2019-09-10 10:14:50', 64500000, 2, 78),
	(37, '2019-09-10 10:17:00', 78430000, 2, 79),
	(38, '2019-09-10 10:19:43', 71500000, 2, 80),
	(39, '2019-09-10 10:22:16', 75000000, 2, 81),
	(40, '2019-09-10 10:24:43', 78360000, 2, 82),
	(41, '2019-09-10 17:18:13', 88900000, 1, 85),
	(42, '2019-09-10 17:26:02', 114140000, 1, 86),
	(43, '2019-09-10 17:29:38', 87320000, 3, 87),
	(44, '2019-09-10 19:58:06', 82700000, 3, 88),
	(45, '2019-09-12 13:02:01', 22800000, 3, 89),
	(46, '2019-09-16 11:45:57', 13340000, 3, 90),
	(47, '2019-09-16 15:51:52', 31650000, 3, 91),
	(48, '2019-09-18 17:12:32', 27600000, 3, 92),
	(49, '2019-09-18 17:23:47', 6373100, 3, 93),
	(50, '2019-09-18 19:58:13', 32423000, 3, 94),
	(51, '2019-09-18 20:17:12', 0, 3, 44),
	(52, '2019-09-20 18:09:36', 12082600, 1, 98),
	(53, '2019-09-22 16:00:43', 60292150, 6, 108),
	(54, '2019-09-22 16:22:48', 12425100, 6, 109),
	(55, '2019-09-23 10:42:34', 30350600, 6, 110);
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_alerta
CREATE TABLE IF NOT EXISTS `estado_alerta` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.estado_alerta: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_alerta` DISABLE KEYS */;
INSERT IGNORE INTO `estado_alerta` (`id_estado`, `estado`) VALUES
	(1, 'Enviado'),
	(2, 'Leído'),
	(3, '0');
/*!40000 ALTER TABLE `estado_alerta` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_asignacion_empleado
CREATE TABLE IF NOT EXISTS `estado_asignacion_empleado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.estado_asignacion_empleado: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_asignacion_empleado` DISABLE KEYS */;
INSERT IGNORE INTO `estado_asignacion_empleado` (`id_estado`, `estado`) VALUES
	(1, 'En espera'),
	(2, 'En proceso'),
	(3, 'Terminado'),
	(4, '0');
/*!40000 ALTER TABLE `estado_asignacion_empleado` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_aspirante
CREATE TABLE IF NOT EXISTS `estado_aspirante` (
  `id_estado_aspirante` int(11) NOT NULL AUTO_INCREMENT,
  `estado_aspirante` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_aspirante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.estado_aspirante: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_aspirante` DISABLE KEYS */;
INSERT IGNORE INTO `estado_aspirante` (`id_estado_aspirante`, `estado_aspirante`) VALUES
	(1, 'Aprobado'),
	(2, 'Rechazado'),
	(3, 'En espera'),
	(4, '0');
/*!40000 ALTER TABLE `estado_aspirante` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_evento
CREATE TABLE IF NOT EXISTS `estado_evento` (
  `id_estado_evento` int(11) NOT NULL AUTO_INCREMENT,
  `estado_evento` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.estado_evento: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_evento` DISABLE KEYS */;
INSERT IGNORE INTO `estado_evento` (`id_estado_evento`, `estado_evento`) VALUES
	(1, 'Aprobado'),
	(2, 'En Proceso'),
	(3, 'Pre-Aprobado'),
	(4, 'Finalizado'),
	(5, 'Cancelado'),
	(6, 'Confirmado'),
	(7, '0');
/*!40000 ALTER TABLE `estado_evento` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_lugar
CREATE TABLE IF NOT EXISTS `estado_lugar` (
  `id_estado_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `estado_lugar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.estado_lugar: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_lugar` DISABLE KEYS */;
INSERT IGNORE INTO `estado_lugar` (`id_estado_lugar`, `estado_lugar`) VALUES
	(1, 'Disponible'),
	(2, 'Ocupado'),
	(3, '0');
/*!40000 ALTER TABLE `estado_lugar` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_notificacion
CREATE TABLE IF NOT EXISTS `estado_notificacion` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.estado_notificacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_notificacion` DISABLE KEYS */;
INSERT IGNORE INTO `estado_notificacion` (`id_estado`, `estado`) VALUES
	(1, 'Enviado'),
	(2, 'Leído'),
	(3, 'Respondido'),
	(4, '0');
/*!40000 ALTER TABLE `estado_notificacion` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_solicitud
CREATE TABLE IF NOT EXISTS `estado_solicitud` (
  `id_estado_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `estado_solicitud` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.estado_solicitud: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_solicitud` DISABLE KEYS */;
INSERT IGNORE INTO `estado_solicitud` (`id_estado_solicitud`, `estado_solicitud`) VALUES
	(1, 'Aprobada'),
	(2, 'Rechazada'),
	(3, 'En espera'),
	(4, 'Pre-Aprobada'),
	(5, '0');
/*!40000 ALTER TABLE `estado_solicitud` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_trabajador
CREATE TABLE IF NOT EXISTS `estado_trabajador` (
  `id_estado_trabajador` int(11) NOT NULL AUTO_INCREMENT,
  `estado_trabajador` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado_trabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.estado_trabajador: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_trabajador` DISABLE KEYS */;
INSERT IGNORE INTO `estado_trabajador` (`id_estado_trabajador`, `estado_trabajador`) VALUES
	(1, 'Activo'),
	(2, 'Ocupado'),
	(3, 'Deshabilitado');
/*!40000 ALTER TABLE `estado_trabajador` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.estado_usuario
CREATE TABLE IF NOT EXISTS `estado_usuario` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.estado_usuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `estado_usuario` DISABLE KEYS */;
INSERT IGNORE INTO `estado_usuario` (`id_estado`, `estado`) VALUES
	(1, 'Habilitado'),
	(2, 'Deshabilitado'),
	(3, 'Bloqueado'),
	(4, '0');
/*!40000 ALTER TABLE `estado_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_evento` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `imagen_card` varchar(200) NOT NULL,
  `extracto` text NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.evento: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT IGNORE INTO `evento` (`id_evento`, `tipo_evento`, `imagen`, `imagen_card`, `extracto`, `costo`) VALUES
	(1, 'Matrimonio', 'Matrimonio.jpg', 'Imagen1.jpg', 'Cuando Dios bendice tu matrimonio, se crea una herramienta historica de amor que nunca tiene final.', 1000000),
	(2, '15 Años', 'quince.jpg', 'Imagen2.jpg', 'Comienza una nueva etapa. Donde se deja la niñez y comienza una bella mujer ¿Celebralo? ¡A lo grande!.', 700000),
	(3, 'Cumpleaños', 'birthday.jpg', 'Imagen3.jpg', 'Un buen cumpleaños da como resultado a una persona feliz, por esta razón debe ser especial y a lo grande, ¡A celebrar!.', 230000),
	(4, 'Bautizo', 'christening-4037405_1920.jpg', 'Imagen4.jpg', 'La vida es bella en todo momento, pero tener a un hijo es una bendición que merece ser festejada, con su bautizo.', 240000),
	(5, 'Grados', 'grados.jpg', 'Imagen5.jpg', 'Los compañeros existen de a montones, pero la graduación es solo una y por esta razón debe ser especial tu graduación.', 420000),
	(6, 'Estudiantes', 'guys-878870_1920.jpg', 'Imagen6.jpg', 'En la vida los amigos son una parte importante del como somos, un pequeño evento para demostrar nuestra amistad valdrá la pena.', 200000),
	(7, 'Sociales', 'adult-3368246_1920.jpg', 'Imagen7.jpg', 'Existen varias formas de demostrar afecto hacia tu equipo de trabajo, pero un pequeño evento los dejaría mas que contentos.', 230000),
	(8, 'Especiales', 'artist-3480274_1920.jpg', 'Imagen8.jpg', '¿Pequeño? No señor. ¡Grande! Así es la dinámica de las fiestas especiales, todo perfecto o nada, ¡EventsHouse te colabora!.', 500000),
	(9, 'Otros', 'otros.jpg', 'Imagen9.jpg', '¿Tienes en mente otros eventos? Claro, hay mas opciones en las que puedes hacerlo realidad. ¿Reuniones, Aniversarios? lo que desees te ayudamos.', 300000);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.implemento
CREATE TABLE IF NOT EXISTS `implemento` (
  `id_implemento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo_implemento` int(11) NOT NULL,
  PRIMARY KEY (`id_implemento`),
  KEY `tipo_implemento` (`tipo_implemento`),
  CONSTRAINT `tipo_implemento` FOREIGN KEY (`tipo_implemento`) REFERENCES `tipo_implemento` (`id_tipo_implemento`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.implemento: ~35 rows (aproximadamente)
/*!40000 ALTER TABLE `implemento` DISABLE KEYS */;
INSERT IGNORE INTO `implemento` (`id_implemento`, `nombre`, `cantidad`, `costo`, `fecha_registro`, `tipo_implemento`) VALUES
	(1, 'Mantel', 100, 500, '2019-08-05 00:55:58', 12),
	(2, 'Copa de agua', 2000, 2000, '2019-08-05 01:04:59', 3),
	(3, 'Micrófono', 30, 4000, '2019-08-30 14:09:08', 6),
	(4, 'Carpa Grande', 30, 10000, '2019-08-30 14:10:23', 20),
	(5, 'Luces Láser', 2000, 1500, '2019-08-30 14:11:05', 11),
	(6, 'Vela Grande', 40, 12000, '2019-08-30 14:11:27', 10),
	(7, 'Mesa Mediana', 100, 15000, '2019-08-30 14:12:21', 1),
	(8, 'Copa Vidrio', 100, 500, '2019-08-30 14:13:58', 3),
	(9, 'Copa de Vino', 2000, 1500, '2019-08-30 14:14:24', 19),
	(10, 'Silla Mediana', 2000, 2000, '2019-08-30 14:15:09', 2),
	(11, 'Copa de Agua', 2000, 1500, '2019-08-30 14:15:41', 3),
	(12, 'Mantel Azul', 2000, 800, '2019-08-30 14:23:54', 12),
	(13, 'Mesa Elegante', 2000, 5000, '2019-08-30 14:29:14', 1),
	(14, 'Mega Parlante', 2000, 3000, '2019-08-30 14:29:50', 8),
	(15, 'Copa de Vino', 2000, 1500, '2019-08-30 16:20:29', 3),
	(16, 'Mantel Rosado', 2000, 800, '2019-08-30 21:08:13', 12),
	(17, 'Mantel Blanco', 2000, 900, '2019-08-30 21:10:02', 12),
	(18, 'Mantel Dorado', 2000, 800, '2019-08-30 21:11:15', 12),
	(19, 'Mantel Plateado', 2000, 800, '2019-08-30 21:12:27', 12),
	(20, 'Mantel Morado', 2000, 800, '2019-08-30 21:16:09', 19),
	(21, 'Vaso de Agua', 2000, 100, '2019-08-30 21:17:02', 4),
	(22, 'Vaso de Whiskey', 2000, 1200, '2019-08-30 21:18:41', 4),
	(23, 'Plato Redondo', 2000, 800, '2019-08-30 21:19:44', 5),
	(24, 'Plato de Postre', 2000, 800, '2019-08-30 21:20:44', 14),
	(25, 'Plato Ancho', 2000, 1500, '2019-08-30 21:21:47', 6),
	(26, 'Silla de Madera', 2000, 1000, '2019-08-30 21:23:58', 2),
	(27, 'Mega Carpa', 2000, 10000, '2019-08-30 21:25:17', 20),
	(28, 'Velas', 2000, 200, '2019-08-30 21:25:42', 10),
	(29, 'Servilletas Extra Absorbentes', 2000, 100, '2019-08-30 21:26:32', 13),
	(30, 'Mesa de Plástico', 2000, 5000, '2019-08-30 21:27:12', 1),
	(31, 'Mesa de Roble', 90, 3000, '2019-09-12 22:38:17', 17),
	(32, 'Silla Acero', 89, 400, '2019-09-13 12:50:32', 2),
	(33, 'Micrófono Inalámbrico', 450, 350, '2019-09-13 13:32:45', 6),
	(34, 'Pasarela', 150, 2500, '2019-10-23 15:18:14', 19),
	(35, 'Pasamanos', 150, 2500, '2019-10-23 15:19:37', 19);
/*!40000 ALTER TABLE `implemento` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.ingreso
CREATE TABLE IF NOT EXISTS `ingreso` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(100) NOT NULL,
  `servidor` varchar(100) NOT NULL,
  `navegador` varchar(300) NOT NULL,
  `puerto_remoto` varchar(100) NOT NULL,
  `puerto_servidor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `ingreso_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.ingreso: ~76 rows (aproximadamente)
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
INSERT IGNORE INTO `ingreso` (`id_ingreso`, `usuario`, `fecha`, `ip`, `servidor`, `navegador`, `puerto_remoto`, `puerto_servidor`) VALUES
	(1, 1, '2019-09-29 13:22:41', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '53791', '80'),
	(2, 6, '2019-09-29 13:23:22', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '53916', '80'),
	(3, 3, '2019-09-29 13:23:50', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '53980', '80'),
	(4, 126, '2019-09-29 13:49:36', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '54077', '80'),
	(5, 2, '2019-10-01 22:58:56', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '57966', '80'),
	(6, 1, '2019-10-02 14:23:10', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '58985', '80'),
	(7, 126, '2019-10-02 14:44:19', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '59299', '80'),
	(8, 126, '2019-10-02 14:47:10', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '59382', '80'),
	(9, 1, '2019-10-02 14:50:49', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '59416', '80'),
	(10, 6, '2019-10-02 15:44:51', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '60210', '80'),
	(11, 1, '2019-10-02 15:54:19', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '61403', '80'),
	(12, 6, '2019-10-02 15:54:55', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '61485', '80'),
	(13, 4, '2019-10-02 16:01:48', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '62366', '80'),
	(14, 2, '2019-10-02 16:10:07', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '63428', '80'),
	(15, 3, '2019-10-02 16:18:19', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '64533', '80'),
	(16, 1, '2019-10-02 16:30:50', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '49645', '80'),
	(17, 6, '2019-10-02 17:51:56', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '59605', '80'),
	(18, 4, '2019-10-02 18:30:33', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '64530', '80'),
	(19, 4, '2019-10-02 18:44:54', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '49987', '80'),
	(20, 2, '2019-10-02 18:46:19', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '50160', '80'),
	(21, 3, '2019-10-02 19:19:01', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '54556', '80'),
	(22, 1, '2019-10-02 19:43:49', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '57935', '80'),
	(23, 1, '2019-10-02 22:18:18', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '64444', '80'),
	(24, 1, '2019-10-14 17:25:06', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '56305', '80'),
	(25, 1, '2019-10-14 17:25:56', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '56401', '80'),
	(26, 126, '2019-10-14 17:40:03', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '58073', '80'),
	(27, 4, '2019-10-14 17:43:43', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '58523', '80'),
	(28, 2, '2019-10-14 17:46:48', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '58964', '80'),
	(29, 3, '2019-10-14 17:52:41', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '59867', '80'),
	(30, 1, '2019-10-14 18:10:54', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '61480', '80'),
	(31, 2, '2019-10-14 18:29:11', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '62790', '80'),
	(32, 126, '2019-10-14 18:29:30', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '62829', '80'),
	(33, 4, '2019-10-14 18:29:47', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '62855', '80'),
	(34, 1, '2019-10-14 18:30:08', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '62869', '80'),
	(35, 3, '2019-10-14 18:33:14', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '62918', '80'),
	(36, 1, '2019-10-14 18:51:23', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '65007', '80'),
	(37, 1, '2019-10-14 18:58:54', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '50056', '80'),
	(38, 1, '2019-10-14 18:59:12', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '50056', '80'),
	(39, 3, '2019-10-18 20:40:54', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '51379', '80'),
	(40, 126, '2019-10-18 20:58:05', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '53657', '80'),
	(41, 2, '2019-10-23 15:13:58', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '50693', '80'),
	(42, 5, '2019-10-23 15:42:31', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '52901', '80'),
	(43, 1, '2019-10-23 15:43:41', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '53036', '80'),
	(44, 1, '2019-10-23 16:17:51', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '52171', '80'),
	(45, 1, '2019-10-24 13:04:12', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '50062', '80'),
	(46, 3, '2019-10-24 13:12:16', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '51568', '80'),
	(47, 126, '2019-10-24 13:13:52', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '51860', '80'),
	(48, 1, '2019-10-24 13:34:16', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '56106', '80'),
	(49, 1, '2019-10-24 14:08:48', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '51463', '80'),
	(50, 1, '2019-10-31 12:57:42', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '50569', '80'),
	(51, 3, '2019-10-31 13:02:30', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '51087', '80'),
	(52, 1, '2019-10-31 13:07:56', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '51179', '80'),
	(53, 3, '2019-10-31 13:37:29', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '54306', '80'),
	(54, 2, '2019-10-31 13:39:48', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '54641', '80'),
	(55, 4, '2019-10-31 14:09:09', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '58304', '80'),
	(56, 126, '2019-10-31 14:09:32', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '58343', '80'),
	(57, 126, '2019-10-31 14:16:00', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '58627', '80'),
	(58, 1, '2019-10-31 14:23:43', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '58904', '80'),
	(59, 126, '2019-10-31 14:41:54', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '61156', '80'),
	(60, 4, '2019-10-31 14:43:02', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '61197', '80'),
	(61, 2, '2019-10-31 14:44:00', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '61227', '80'),
	(62, 3, '2019-10-31 14:45:40', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '61363', '80'),
	(63, 1, '2019-10-31 18:04:52', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', '61510', '80'),
	(64, 1, '2019-11-05 11:22:58', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '50626', '80'),
	(65, 126, '2019-11-06 13:55:26', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '54477', '80'),
	(66, 1, '2019-11-06 13:56:11', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '54569', '80'),
	(67, 1, '2019-11-07 11:03:10', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '49839', '80'),
	(68, 2, '2019-11-07 12:43:37', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52259', '80'),
	(69, 2, '2019-11-07 12:43:37', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52261', '80'),
	(70, 2, '2019-11-07 12:44:29', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52291', '80'),
	(71, 2, '2019-11-07 12:46:16', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52331', '80'),
	(72, 1, '2019-11-07 12:51:15', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52403', '80'),
	(73, 4, '2019-11-07 12:51:27', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52403', '80'),
	(74, 3, '2019-11-07 12:51:42', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52447', '80'),
	(75, 2, '2019-11-07 12:52:04', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52476', '80'),
	(76, 2, '2019-11-07 12:52:33', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', '52540', '80'),
	(77, 1, '2019-12-04 23:08:31', '::1', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Mobile Safari/537.36', '49912', '80'),
	(78, 1, '2019-12-06 13:34:00', '::1', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Mobile Safari/537.36', '50942', '80'),
	(79, 1, '2019-12-18 10:26:32', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '49814', '80'),
	(80, 1, '2019-12-18 14:04:10', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', '50014', '80'),
	(81, 1, '2020-02-14 20:26:04', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36', '53585', '80'),
	(82, 1, '2020-02-14 20:27:07', '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.106 Safari/537.36', '53609', '80');
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.lugar
CREATE TABLE IF NOT EXISTS `lugar` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imagen` varchar(100) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT 'lorem',
  `costo` int(11) NOT NULL DEFAULT 800000,
  `tipo_lugar` int(11) NOT NULL,
  `estado_lugar` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_lugar`),
  UNIQUE KEY `direccion` (`direccion`),
  KEY `tipo_lugar` (`tipo_lugar`),
  KEY `estado_lugar` (`estado_lugar`),
  CONSTRAINT `estado_lugar` FOREIGN KEY (`estado_lugar`) REFERENCES `estado_lugar` (`id_estado_lugar`),
  CONSTRAINT `tipo_lugar` FOREIGN KEY (`tipo_lugar`) REFERENCES `tipo_lugar` (`id_tipo_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.lugar: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
INSERT IGNORE INTO `lugar` (`id_lugar`, `nombre`, `imagen`, `direccion`, `descripcion`, `costo`, `tipo_lugar`, `estado_lugar`) VALUES
	(1, 'Teusaquillo Plaza', 'eventos-1280x655.jpg', 'Cll 34 #15-24', 'Teusaquillo plaza permite espacios desde el Salón, pista de baile, parqueadero, cocina para el uso del banquete, entre otros, existe un espacio para darle uso desde 40 hasta 220 personas.', 7000000, 1, 1),
	(3, 'Centro de Convenciones Millenium', 'Parcela-70.-Eeventos-Privados-1.jpg', 'Cra 69 #98 A- 11 Piso 704', 'Este centro de convenciones cuenta con tres tipos de salones, diamante, millenium y cumbres con medida entre 550 mt2 – 400 px en auditorio, 260 mt2 - 180 px en auditorio y 200 mt2 – 130 px en auditori', 5000000, 1, 1),
	(4, 'Club los Pisingos', 'Salon-de-eventos.jpg', 'Av. Boyacá #34-53 Sur', 'Las instalaciones del club permite celebrar todo tipo de eventos, matrimonios, 15 años, graduaciones, cumpleaños, contando con dos grandes y elegantes salones con la capacidad suficientes para los inv', 6500000, 1, 1),
	(6, 'Bahía Centro de Convenciones', 'salon2.jpg', 'Km 4.5 vía la calera – Bogotá.', 'Cuenta con una capacidad desde 10 hasta 1300 personas, contamos con espacios únicos entre la montaña, jardines, cascadas de agua y una espectacular vista, para eventos matrimoniales existe la capilla,', 6000000, 1, 1),
	(7, 'Parque de los Novios', 'parque_novios_zonabogotadc.jpg', 'Calle 63 # 45-10', 'Cuenta con una superficie de 23 hectáreas y es uno de los recintos más lúdicos reconocidos por los bogotanos, su atractivo lago, esta habitado por patos y peces donde los visitantes pueden navegar en ', 1205600, 2, 1),
	(8, 'Parque Nacional', 'getlstd-property-photo.jpg', 'Calle 35 #3-50', 'Cuenta con 65 hectáreas, contando con escenarios como pista de hockey, pista de patinaje, canchas de diversos deportes, plazoletas, asaderos, casetas, entre otros.', 1360000, 2, 1),
	(9, 'Parque Metropolitano Simón Bolívar', '8205644.jpg', 'Calle 63 y 53 entre carreras 48 y 68', 'Este parque de la ciudad de Bogotá cuenta con 113 hectáreas y es protagonista de muestras acuáticas, tres zonas infantiles, plaza de eventos entre 37 mil mt2, ciclo paseo natural, zonas verdes, entre ', 8000000, 2, 1),
	(10, 'Parque de la Independencia', 'entrega_la_victoria_2-451.png', 'Calle 26 carrera 5 hasta Cra 7 #26-07', 'Este parque cuenta con una plazoleta con graderías, bibliotecas diseñadas para albergar libros, niños, jóvenes y adultos, quiosco de luz, entre otros servicios.', 2400000, 2, 1),
	(17, 'Parque Metropolitano Zona Franca', 'waters-3366444_1920.jpg', 'Calle 13 C – Cra 106', 'Este escenario cuenta con extensas zonas verdes con una medida de 243.325 metros cuadrados, con la posibilidad de un lago rodeado por flora y fauna con la posibilidad de observar las aves exóticas que', 4000000, 2, 1),
	(19, 'Royal Center', 'rockombia-qosta04.jpg', 'Cra 13 # 66-80', 'Este escenario cuenta con una capacidad máxima de 4.500 personas, siendo el teatro mas grande que se encuentra en la capital, con facilidad de baños, palcos especiales, salón de reuniones, silletería,', 15000000, 3, 1),
	(20, 'Astor Plaza', 'foto-1.1.jpg', 'Calle 67 #11 - 58', 'El escenario del Astor plaza cuenta con una capacidad para 1.100 personas divididas en tres zonas: platea (449), luneta (340) y balcón (311), abriendo sus puertas para diferentes tipos de espectáculos', 14000000, 3, 1),
	(23, 'Andrés Carne de Res', 'andres-dc-fiesta.jpg', 'Calle 3 # 11 a – 56 Chía', 'Este escenario se basa en un restaurante gigante, con una decoración muy particular y recargada, existen miles de platos y opciones para ordenar y el ambiente… una locura total, además de que los niño', 4000000, 3, 1),
	(25, 'Gaira Café', 'gaira-cafe-contenido-2.jpg', 'Carretera 13 # 96-11', 'Este restaurante es de tipo “Acuatic Sport Café” es decir, temático playero el cual le rinde culto a la bahía que le da su nombre y a los deportes practicados, con una amplia variedad de platillos.', 4000000, 3, 1),
	(27, 'Bar el Bembe', 'bar-el-bembe-facebook-1.jpg', 'Calle 27B #6-73', 'Un rincón de Cuba en el centro de Bogotá, El Bembé es tan colorido y alegre como la Habana, contiene un menú de cocina y cócteles que mezclan sabores de la tierra de la música, guaracha y revolución, ', 3000000, 3, 1),
	(28, 'Bar el Fabuloso', 'el-fabuloso-facebook-1.jpg', 'Av Cl 85 # 14-05 Piso 07', 'Este bar ofrece experiencias únicas, para pasarlo con tus amigos y/o familiares, en este bar podrás encontrar todo tipo de música, teniendo la oportunidad de disfrutar las bebidas y poder disfrutar de', 3000000, 3, 1),
	(29, 'Discoteca Octava', 'octava.jpg', 'Carrera 8 # 63-41', 'Esta discoteca es un avión en el que suena las mejores canciones de música electrónica, cuenta con dos pisos de baile y una terraza amoblada con el objetivo de recibir a los fanáticos de la rumba, ofr', 2500000, 3, 1),
	(30, 'Bar-discoteca la Caci', 'bar-discoteca-la-caci-k-13.jpg', 'Av. calle 116 #19-40', 'En este lugar se reúne lo mejor del caribe colombiano, en el cual ofrece una amplia carta de licores nacionales e importados, contando con los mejores colores musicales nacionales e internacionales má', 2500000, 3, 1),
	(31, 'Casa San Sebastián', 'eventos-1280x655.jpg', 'Carrera 24 # 17 – 59 Sur', 'La casa de san Sebastián permite un numero de invitados desde 40 – 100 invitados, con espacios como el mismo salón, pista de baile, parqueadero, capilla, cocina, terraza, entre otras zonas.', 3500000, 4, 1),
	(32, 'Salón Marttino ', 'Parcela-70.-Eeventos-Privados-1.jpg', 'Carrera 77 A – 63F-31', 'Este maravilloso salón permite el ingreso desde 50 a 300 invitados, con espacios acogedores como el salón, pista de baile, parqueadero, siendo un lugar indicado para la celebración de eventos sociales', 3000000, 4, 1),
	(33, 'Terraza Bodas Elite Group', 'Salon-de-eventos.jpg', 'Av. Esperanza # 44 a -21', 'Este lugar ofrece una amplia zona de lugares que van desde el Salón, pista de baile, parqueadero privado, capilla, cocina para el uso del banquete y una hermosa y magnifica terraza. Permite el ingreso', 3500000, 4, 1),
	(35, 'Casa Berrio', 'salon2.jpg', 'Av. Calle 32 # 15-66', 'Este hermoso lugar esta privilegiada debido a su amplitud de ingreso de invitados que van desde 30 hasta 500, con espacios muy acogedores que son el salón, pista de baile, parqueadero, terraza, jardín', 4000000, 4, 1),
	(36, 'Salón de Eventos Faraón', 'salon.jpg', 'Avenida calle 100 # 61 - 48', 'El salón de eventos faraón cuenta con un gran espacio para el ingreso de los invitados el cual tiene una apertura desde 50 a 1500 invitados, con unos espacios muy bellos como el salón, pista de baile,', 4000000, 4, 1),
	(37, 'Común y Silvestre', '5897c01b2c7ab.jpeg', 'Cll 247 #8 - 14', 'La hacienda ofrece una capilla de cristal, zonas verdes, parqueadero privado, salón de eventos para la gran noche, chalet para novias, entre otros magníficos servicios. ', 8000000, 5, 1),
	(38, 'Casa Hacienda de Fagua', 'hacienda2.jpg', 'Unnamed Rd, Cajicá, Cundinamarca.', 'Esta hermosa haciendo se encuentra ubicada a tan solo 45 minutos de Bogotá, en medio de una tranquila vereda de Cajicá. Este hermoso lugar cuenta con jardines, patios y salones y además de una hermosa', 10000000, 5, 1),
	(39, 'Hacienda Campestre Bogotá Luxury', 'fachada_g.jpg', 'Cra. 13a #109 64 ', 'Este hermoso lugar cuenta con el mejor espacio para que puedas celebrar tu boda en un escenario y ambiente único, permitiendo una capacidad para 600 invitados.', 10000000, 5, 1),
	(40, 'Hacienda Remanso del Río', 'hacienda-venecia.jpg', 'Madrid, Cundinamarca.', 'Este hermoso lugar cuenta con una sede cubierta con la capacidad para poder atender a 200 invitados en un área construida de 450 mts. Lugares como tarima, terrazas, jardines, lagos, planta eléctrica y', 11000000, 5, 1);
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.notificacion
CREATE TABLE IF NOT EXISTS `notificacion` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(50) NOT NULL,
  `mensaje` varchar(250) NOT NULL,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_notificacion`),
  KEY `emisor` (`emisor`),
  KEY `destinatario` (`receptor`),
  KEY `estado` (`estado`),
  CONSTRAINT `emison_notificacion` FOREIGN KEY (`emisor`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `estado_notificacion` FOREIGN KEY (`estado`) REFERENCES `estado_notificacion` (`id_estado`),
  CONSTRAINT `receptor_notificacion` FOREIGN KEY (`receptor`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.notificacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `costo_total` int(11) NOT NULL,
  `implemento` int(11) NOT NULL,
  `cotizacion` int(11) NOT NULL,
  `tipo_producto` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_producto`),
  KEY `id_implemento` (`implemento`),
  KEY `asignar_implemento` (`cotizacion`),
  KEY `tipo_producto` (`tipo_producto`),
  CONSTRAINT `id_implemento` FOREIGN KEY (`implemento`) REFERENCES `implemento` (`id_implemento`),
  CONSTRAINT `stock` FOREIGN KEY (`cotizacion`) REFERENCES `cotizacion` (`id_cotizacion`),
  CONSTRAINT `tipo_producto` FOREIGN KEY (`tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.producto: ~143 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT IGNORE INTO `producto` (`id_producto`, `cantidad`, `costo_total`, `implemento`, `cotizacion`, `tipo_producto`) VALUES
	(1, 10, 500000, 1, 2, 3),
	(2, 80, 1000000, 22, 2, 3),
	(4, 400, 180000, 7, 5, 3),
	(5, 90, 400000, 7, 5, 3),
	(9, 22, 4400000, 27, 5, 3),
	(10, 50, 500000, 4, 5, 3),
	(11, 10, 5000, 1, 5, 3),
	(14, 7, 3500, 8, 2, 3),
	(23, 20, 200000, 4, 15, 2),
	(34, 3, 6000, 10, 2, 3),
	(35, 5, 2500, 1, 2, 3),
	(36, 3, 12000, 3, 2, 3),
	(37, 2, 20000, 4, 2, 3),
	(38, 5, 60000, 6, 2, 3),
	(39, 10, 8000, 16, 2, 3),
	(40, 5, 500, 21, 2, 3),
	(42, 11, 165000, 7, 26, 3),
	(43, 6, 12000, 10, 26, 3),
	(44, 9, 900, 29, 26, 3),
	(45, 5, 6000, 22, 26, 3),
	(46, 4, 8000, 10, 26, 3),
	(47, 11, 132000, 6, 26, 3),
	(49, 12, 6000, 8, 25, 2),
	(50, 4, 800000, 30, 25, 2),
	(51, 6, 9000, 15, 25, 2),
	(52, 2, 3000, 11, 25, 2),
	(53, 11, 16500, 25, 25, 1),
	(54, 5, 500, 21, 25, 1),
	(56, 12, 180000, 7, 27, 3),
	(57, 40, 80000, 10, 27, 3),
	(58, 3, 12000, 3, 27, 3),
	(59, 5, 60000, 6, 27, 3),
	(60, 21, 31500, 5, 27, 3),
	(61, 5, 50000, 4, 27, 3),
	(62, 6, 24000, 3, 27, 3),
	(64, 7, 10500, 15, 28, 2),
	(65, 6, 7200, 22, 28, 2),
	(66, 2, 1600, 23, 28, 2),
	(67, 6, 4800, 23, 28, 2),
	(69, 4, 8000, 2, 24, 2),
	(70, 2, 400000, 30, 24, 2),
	(71, 5, 10000, 2, 24, 2),
	(72, 2, 4000, 2, 24, 2),
	(73, 5, 7500, 11, 23, 1),
	(74, 1, 200000, 13, 23, 1),
	(75, 4, 2000, 8, 23, 2),
	(76, 6, 9000, 15, 23, 2),
	(77, 4, 3200, 23, 23, 2),
	(79, 8, 16000, 2, 29, 3),
	(80, 40, 4000, 21, 29, 3),
	(81, 33, 6600, 28, 29, 3),
	(82, 10, 50000, 30, 29, 3),
	(83, 5, 6000, 22, 29, 3),
	(84, 12, 144000, 6, 29, 3),
	(86, 10, 100000, 27, 29, 3),
	(87, 8, 32000, 3, 29, 3),
	(88, 30, 30000, 26, 29, 3),
	(91, 1234, 18510000, 7, 31, 3),
	(92, 4, 8000, 10, 23, 2),
	(93, 3, 1500, 8, 23, 2),
	(94, 3, 4500, 11, 23, 2),
	(95, 3, 300, 21, 32, 3),
	(96, 1, 1500, 11, 32, 3),
	(97, 3, 300, 21, 32, 3),
	(98, 1, 800, 23, 32, 3),
	(99, 3, 9000, 14, 32, 3),
	(100, 6, 600, 21, 32, 3),
	(101, 3, 15000, 30, 33, 2),
	(102, 3, 3000, 26, 34, 2),
	(103, 4, 4000, 26, 35, 2),
	(104, 6, 3000, 8, 36, 2),
	(106, 6, 3000, 8, 38, 2),
	(107, 8, 16000, 2, 39, 2),
	(111, 1000, 5000000, 13, 41, 3),
	(112, 8, 12000, 11, 42, 3),
	(113, 20, 30000, 11, 42, 3),
	(114, 300, 1500000, 13, 42, 3),
	(115, 123, 147600, 22, 42, 3),
	(116, 56, 672000, 6, 42, 3),
	(117, 90, 18000, 28, 42, 3),
	(119, 1000, 10000000, 4, 43, 3),
	(121, 8000, 80000000, 4, 44, 3),
	(126, 4, 20000, 13, 37, 2),
	(127, 5, 75000, 7, 37, 2),
	(128, 9, 27000, 14, 37, 2),
	(129, 9, 4500, 8, 37, 2),
	(130, 40, 60000, 5, 37, 2),
	(131, 100, 1000000, 27, 37, 2),
	(132, 1000, 10000000, 27, 37, 2),
	(133, 1000, 10000000, 27, 37, 2),
	(134, 40, 60000, 15, 37, 2),
	(135, 100, 1000000, 27, 37, 2),
	(136, 100, 1000000, 27, 37, 2),
	(137, 20, 200000, 27, 37, 2),
	(138, 5, 50000, 27, 37, 2),
	(139, 2, 30000, 7, 37, 2),
	(140, 1, 2000, 10, 37, 2),
	(141, 1, 1200, 22, 37, 2),
	(142, 35, 175000, 30, 45, 3),
	(143, 100, 50000, 8, 45, 3),
	(144, 2, 30000, 7, 46, 3),
	(146, 100, 10000, 21, 46, 3),
	(147, 4, 6000, 25, 46, 3),
	(148, 60, 48000, 24, 46, 3),
	(149, 123, 12300, 29, 46, 3),
	(150, 60, 6000, 21, 46, 3),
	(151, 12, 9600, 16, 46, 3),
	(152, 10, 20000, 2, 47, 3),
	(153, 50, 75000, 15, 47, 3),
	(154, 123, 98400, 23, 47, 3),
	(155, 20, 30000, 11, 48, 3),
	(156, 40, 20000, 8, 48, 3),
	(157, 3, 6000, 10, 48, 3),
	(158, 80, 120000, 11, 49, 3),
	(159, 15, 7500, 8, 49, 3),
	(160, 40, 60000, 25, 49, 3),
	(161, 40, 400000, 4, 49, 3),
	(162, 50, 750000, 7, 49, 3),
	(163, 30, 45000, 9, 50, 3),
	(164, 40, 600000, 7, 50, 3),
	(165, 80, 800000, 4, 50, 3),
	(166, 9, 90000, 27, 50, 3),
	(167, 80, 800000, 27, 50, 3),
	(168, 5, 10000, 2, 52, 3),
	(169, 8, 9600, 22, 52, 3),
	(170, 45, 36000, 23, 52, 3),
	(171, 78, 312000, 3, 52, 3),
	(172, 78, 62400, 18, 53, 3),
	(173, 5, 1750, 33, 53, 3),
	(174, 123, 369000, 31, 53, 3),
	(175, 231, 693000, 31, 53, 3),
	(176, 23, 46000, 10, 53, 3),
	(177, 23, 46000, 10, 54, 3),
	(178, 34, 51000, 11, 54, 3),
	(179, 23, 2300, 21, 54, 3),
	(180, 78, 62400, 23, 54, 3),
	(181, 67, 13400, 28, 54, 3),
	(182, 12, 6000, 8, 55, 3),
	(183, 12, 9600, 23, 55, 3),
	(184, 45, 225000, 30, 55, 3),
	(185, 10, 40000, 3, 55, 3),
	(186, 4, 8000, 10, 50, 3),
	(187, 20, 2000, 21, 38, 2);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.recordatorios
CREATE TABLE IF NOT EXISTS `recordatorios` (
  `id_recordatorio` int(11) NOT NULL AUTO_INCREMENT,
  `dato` varchar(3) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id_recordatorio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.recordatorios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `recordatorios` DISABLE KEYS */;
INSERT IGNORE INTO `recordatorios` (`id_recordatorio`, `dato`, `valor`) VALUES
	(1, 'No', 0),
	(2, 'Si', 4000);
/*!40000 ALTER TABLE `recordatorios` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.rol_ingreso
CREATE TABLE IF NOT EXISTS `rol_ingreso` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_ingreso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.rol_ingreso: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `rol_ingreso` DISABLE KEYS */;
INSERT IGNORE INTO `rol_ingreso` (`id_rol`, `rol_ingreso`) VALUES
	(1, 'Cliente'),
	(2, 'Empleado'),
	(3, 'Administrador'),
	(4, 'Secretaria'),
	(5, 'Jefe bodega'),
	(6, 'Aspirante');
/*!40000 ALTER TABLE `rol_ingreso` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.rol_trabajador
CREATE TABLE IF NOT EXISTS `rol_trabajador` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_trabajador` varchar(100) NOT NULL,
  `honorarios` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.rol_trabajador: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `rol_trabajador` DISABLE KEYS */;
INSERT IGNORE INTO `rol_trabajador` (`id_rol`, `rol_trabajador`, `honorarios`) VALUES
	(1, 'Acomodador', 15000),
	(2, 'Aseo', 25000),
	(3, 'Seguridad', 20000),
	(4, 'Logística', 15000),
	(5, 'Mesero', 20000),
	(6, 'Recreador', 30000),
	(7, 'Electrónicos', 20000),
	(8, 'DJ', 50000),
	(9, 'Bartender', 50000),
	(10, 'Locutor', 30000),
	(11, 'Cocinero', 100000),
	(12, 'Camarógrafo', 30000);
/*!40000 ALTER TABLE `rol_trabajador` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.ruta
CREATE TABLE IF NOT EXISTS `ruta` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.ruta: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT IGNORE INTO `ruta` (`id_ruta`, `ruta`) VALUES
	(1, 'salon_de_eventos/'),
	(2, 'parques/'),
	(3, 'discotecas/'),
	(4, 'salones_comunales/'),
	(5, 'haciendas/');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.solicitud
CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(100) NOT NULL,
  `anfitrion` varchar(50) NOT NULL,
  `formalidad_evento` varchar(20) NOT NULL DEFAULT 'Formal',
  `recordatorios` int(11) NOT NULL DEFAULT 1,
  `comentarios` varchar(250) NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `costo_minimo` int(11) NOT NULL,
  `costo_maximo` int(11) NOT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_evento` date NOT NULL DEFAULT '0000-00-00',
  `banquete` int(11) NOT NULL DEFAULT 1,
  `lugar` int(11) NOT NULL,
  `tematica` int(11) NOT NULL,
  `evento_id_evento` int(11) NOT NULL,
  `estado_solicitud` int(11) NOT NULL DEFAULT 3,
  `usuario_solicitud` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `lugar` (`lugar`),
  KEY `tematica` (`tematica`),
  KEY `usuario_solicitud` (`usuario_solicitud`),
  KEY `estado_solicitud` (`estado_solicitud`),
  KEY `evento_id_evento` (`evento_id_evento`),
  KEY `banquete` (`banquete`),
  KEY `recordatorios` (`recordatorios`),
  CONSTRAINT `banquete` FOREIGN KEY (`banquete`) REFERENCES `banquete` (`id_banquete`),
  CONSTRAINT `estado_solicitud` FOREIGN KEY (`estado_solicitud`) REFERENCES `estado_solicitud` (`id_estado_solicitud`),
  CONSTRAINT `evento_id_evento` FOREIGN KEY (`evento_id_evento`) REFERENCES `evento` (`id_evento`),
  CONSTRAINT `lugar` FOREIGN KEY (`lugar`) REFERENCES `lugar` (`id_lugar`),
  CONSTRAINT `recordatorios` FOREIGN KEY (`recordatorios`) REFERENCES `recordatorios` (`id_recordatorio`),
  CONSTRAINT `tematica` FOREIGN KEY (`tematica`) REFERENCES `tematica` (`id_tematica`),
  CONSTRAINT `usuario_solicitud` FOREIGN KEY (`usuario_solicitud`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.solicitud: ~47 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
INSERT IGNORE INTO `solicitud` (`id_solicitud`, `nombre_evento`, `anfitrion`, `formalidad_evento`, `recordatorios`, `comentarios`, `cantidad_personas`, `costo_minimo`, `costo_maximo`, `fecha_solicitud`, `fecha_evento`, `banquete`, `lugar`, `tematica`, `evento_id_evento`, `estado_solicitud`, `usuario_solicitud`) VALUES
	(6, 'Bienvenidos a mi evento', 'yo', 'Formal', 1, '', 22, 0, 0, '2019-08-04 18:06:24', '0000-00-00', 1, 23, 2, 8, 1, 1),
	(9, 'Fiesta al parque', 'Stefany', 'Formal', 1, '', 142, 0, 0, '2019-08-04 18:47:02', '2019-08-23', 1, 38, 4, 1, 1, 6),
	(10, 'Concierto', 'Brayan', 'Formal', 1, '', 657, 0, 0, '2019-08-04 18:53:37', '2019-08-22', 1, 27, 6, 1, 1, 6),
	(11, 'Full Neón', 'Valentina', 'Formal', 1, '', 682, 1240000, 3000000, '2019-08-04 19:15:40', '2019-08-22', 1, 25, 2, 1, 1, 1),
	(12, 'Momento Pirata', 'Sara', 'Formal', 1, '', 134, 0, 0, '2019-08-05 12:52:26', '2019-08-22', 1, 25, 1, 1, 1, 1),
	(14, 'Vamos que vamos', 'Camila', 'Formal', 1, '', 1234567, 0, 0, '2019-08-05 13:06:13', '2019-08-17', 1, 3, 1, 1, 1, 5),
	(20, 'Fiesta al parque', 'Camilo', 'Formal', 1, '', 1324, 0, 0, '2019-08-05 15:47:09', '2019-08-23', 1, 1, 1, 1, 1, 5),
	(25, 'Concierto 2.0', 'Sheinar', 'Formal', 1, '', 453, 0, 0, '2019-08-07 16:40:40', '2019-08-13', 1, 9, 4, 2, 1, 1),
	(29, 'Hora electrónica', 'Erika', 'Formal', 1, '', 467, 0, 0, '2019-08-07 17:58:16', '2019-08-21', 1, 39, 5, 5, 4, 6),
	(34, 'Día de locos', 'David', 'Formal', 1, '', 2000, 0, 0, '2019-08-08 12:25:43', '2019-08-28', 1, 23, 2, 5, 1, 68),
	(36, 'Noche buena', 'Amador', 'Formal', 1, '', 800, 0, 0, '2019-08-09 19:59:12', '2019-08-29', 1, 29, 2, 8, 1, 73),
	(37, 'Noche mala', 'Jefferson', 'Formal', 1, '', 120, 0, 0, '2019-08-16 17:27:48', '2019-08-28', 1, 39, 4, 2, 1, 75),
	(44, 'Noche loca', 'Gibson', 'Formal', 1, '', 789, 0, 0, '2019-08-17 13:10:20', '0000-00-00', 1, 1, 4, 6, 2, 76),
	(45, '15 Años de Stefany', 'Gilberto', 'Formal', 1, '', 574, 0, 0, '2019-08-17 13:13:08', '0000-00-00', 1, 1, 2, 2, 1, 81),
	(46, '15 Años de Carla', 'Karen', 'Formal', 1, '', 1000, 0, 0, '2019-08-17 14:56:34', '2019-08-27', 1, 7, 6, 5, 1, 87),
	(63, '18 de Carlos', 'Luisa', 'Informal', 2, '', 190, 21810000, 28353000, '2019-08-27 23:05:41', '2019-08-27', 4, 30, 4, 9, 1, 3),
	(64, 'Cumpleaños del Pollo', 'Ivan', 'Informal', 2, '', 13, 2793000, 3630900, '2019-08-27 23:17:23', '2019-08-27', 7, 10, 3, 5, 1, 3),
	(65, 'Full Party', 'Azael', 'Informal', 2, '', 21, 4219000, 5484700, '2019-08-27 23:18:05', '2019-08-27', 10, 30, 4, 8, 1, 3),
	(66, 'Día de ADSI', 'Jorge', 'Formal', 2, '', 200, 22230000, 28899000, '2019-08-30 14:32:52', '2019-08-30', 4, 30, 3, 3, 1, 3),
	(67, 'Reunión de los Garzón', 'Andres Garzón', 'Informal', 2, '', 40, 5510000, 7163000, '2019-09-02 15:54:39', '2019-09-09', 7, 25, 4, 7, 1, 2),
	(69, 'Día de las velitas', 'Jerimel', 'Informal', 2, '', 12, 2472000, 3213600, '2019-09-02 17:46:33', '2019-09-09', 3, 9, 2, 2, 1, 112),
	(71, 'Día de la familia', 'Franco', 'Informal', 2, '', 80, 10680000, 13884000, '2019-09-07 21:49:06', '2019-09-14', 9, 23, 6, 1, 1, 7),
	(72, 'Matrimonio Mampira y Lorein', 'Brayan', 'Sin Especificar', 1, '', 120, 11880000, 15444000, '2019-09-09 14:18:44', '2019-09-28', 2, 33, 6, 2, 1, 113),
	(73, 'Reencuentro 1694150A', 'Nicolas', 'Formal', 2, '', 1000, 78500000, 102050000, '2019-09-09 17:28:14', '2019-09-16', 5, 37, 6, 8, 1, 115),
	(74, 'Reencuentro PROM 18', 'Valentina', 'Formal', 1, '', 120, 16810000, 21853000, '2019-09-09 21:44:07', '2019-09-16', 10, 33, 3, 7, 1, 115),
	(75, 'Fiesta pagana', 'Katherine', 'Formal', 2, '', 1000, 78500000, 102050000, '2019-09-10 10:04:37', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(76, 'En honor a Michael Jackson', 'Mafe', 'Formal', 2, '', 1000, 79000000, 102700000, '2019-09-10 10:08:13', '2019-09-17', 5, 37, 6, 1, 1, 115),
	(77, 'Cumpleaños de Alba', 'Andrea', 'Formal', 2, '', 100, 15500000, 20150000, '2019-09-10 10:11:12', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(78, 'Bautizo Don Ancizar', 'Nicol', 'Formal', 2, '', 800, 64500000, 83850000, '2019-09-10 10:14:22', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(79, 'Reunión familia Ferreira', 'Paula', 'Formal', 2, '', 999, 78430000, 101959000, '2019-09-10 10:16:37', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(80, 'Cumpleaños de Ivancito', 'Paola', 'Formal', 2, '', 900, 71500000, 92950000, '2019-09-10 10:19:21', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(81, 'Protesta Familiar', 'Sofia', 'Formal', 2, '', 950, 75000000, 97500000, '2019-09-10 10:21:51', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(82, 'Año nuevo', 'Diana', 'Formal', 2, '', 998, 78360000, 101868000, '2019-09-10 10:24:10', '2019-09-17', 5, 37, 6, 8, 1, 115),
	(85, 'Feliz Navidad', 'Marcela', 'Sin Especificar', 2, '', 900, 88900000, 115570000, '2019-09-10 17:17:09', '2019-10-23', 2, 19, 2, 1, 1, 1),
	(86, 'Hallowen Party', 'Laura', 'Formal', 2, '', 900, 114140000, 148382000, '2019-09-10 17:25:33', '2019-10-29', 3, 20, 4, 4, 1, 1),
	(87, 'Momento único', 'Yesica', 'Formal', 2, '', 900, 87320000, 113516000, '2019-09-10 17:29:18', '2019-12-18', 3, 20, 2, 5, 1, 1),
	(88, 'Navidad de los Garzón', 'ipsum', 'Formal', 2, '', 900, 82700000, 107510000, '2019-09-10 19:57:24', '2019-11-23', 10, 20, 1, 9, 1, 115),
	(89, 'Farrón', 'Azael', 'Sin Especificar', 2, '', 100, 22800000, 29640000, '2019-09-12 12:59:33', '2019-12-15', 5, 40, 4, 8, 1, 116),
	(90, 'Nuevo evento ', 'Events House', 'Formal', 2, '', 120, 13340000, 17342000, '2019-09-16 11:34:39', '2019-11-22', 7, 29, 2, 1, 1, 6),
	(91, 'Fiesta, fiesta', 'Carlos García', 'Informal', 2, '', 150, 31650000, 41145000, '2019-09-16 15:50:46', '2019-09-30', 10, 20, 3, 2, 1, 118),
	(92, 'Mi boda Perfecta', 'Mampira el sucio', 'Formal', 2, '', 300, 27600000, 35880000, '2019-09-18 16:51:34', '2019-12-16', 4, 20, 12, 1, 1, 130),
	(93, 'Hello, It\'s Me', 'Mampi La super sucia', 'Formal', 2, '', 120, 5035600, 6546280, '2019-09-18 17:23:15', '2019-09-25', 2, 7, 4, 3, 1, 130),
	(94, 'Farron Total', 'David Garcia', 'Informal', 2, '', 320, 30080000, 39104000, '2019-09-18 19:53:56', '2019-11-15', 9, 19, 12, 1, 1, 125),
	(98, 'Años 80', 'Martinez', 'Formal', 2, '', 50, 11715000, 15229500, '2019-09-20 18:08:19', '2019-10-18', 6, 39, 3, 3, 1, 141),
	(108, 'Neón Full', 'Carlos García', 'Informal', 2, '', 950, 59120000, 76856000, '2019-09-22 15:58:05', '2019-09-30', 10, 19, 12, 5, 1, 126),
	(109, 'Superheroes', 'carlos', 'Formal', 1, '', 250, 12250000, 15925000, '2019-09-22 16:21:48', '2019-09-30', 10, 23, 4, 8, 1, 126),
	(110, 'Fiesta, fiesta', 'Carlos García', 'Informal', 1, '', 950, 30070000, 39091000, '2019-09-23 10:41:25', '2019-10-03', 10, 23, 6, 5, 1, 126);
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.tematica
CREATE TABLE IF NOT EXISTS `tematica` (
  `id_tematica` int(11) NOT NULL AUTO_INCREMENT,
  `tematica` varchar(100) NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`id_tematica`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.tematica: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `tematica` DISABLE KEYS */;
INSERT IGNORE INTO `tematica` (`id_tematica`, `tematica`, `costo`) VALUES
	(1, 'Clásica', 4700),
	(2, 'Retro', 6000),
	(3, 'Historia', 8700),
	(4, 'Superheroes o Series', 9000),
	(5, 'Naturales', 5000),
	(6, 'Romántica', 5000),
	(7, 'Pirata', 12000),
	(12, 'Neón', 20000),
	(24, 'Rústica', 20000),
	(27, 'Años 80', 20000),
	(30, 'Otros', 20000);
/*!40000 ALTER TABLE `tematica` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.tipo_implemento
CREATE TABLE IF NOT EXISTS `tipo_implemento` (
  `id_tipo_implemento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_implemento` varchar(100) NOT NULL,
  `cantidad_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_implemento`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.tipo_implemento: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_implemento` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_implemento` (`id_tipo_implemento`, `tipo_implemento`, `cantidad_persona`) VALUES
	(1, 'Mesa 8 Puestos', 8),
	(2, 'Silla', 1),
	(3, 'Copa', 1),
	(4, 'Vaso', 1),
	(5, 'Plato Grande', 1),
	(6, 'Micrófono', 1),
	(8, 'Parlante', 50),
	(10, 'Velas', 1),
	(11, 'Luces', 15),
	(12, 'Mantel', 1),
	(13, 'Servilletas', 3),
	(14, 'Plato Pequeño', 1),
	(15, 'Barra de Cocteles', 1),
	(16, 'Mesa para Cofre', 1),
	(17, 'Mesa 10 Puestos', 10),
	(18, 'Consola', 1),
	(19, 'Máquina', 1),
	(20, 'Carpa', 1);
/*!40000 ALTER TABLE `tipo_implemento` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.tipo_lugar
CREATE TABLE IF NOT EXISTS `tipo_lugar` (
  `id_tipo_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_lugar` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.tipo_lugar: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_lugar` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_lugar` (`id_tipo_lugar`, `tipo_lugar`, `ruta`) VALUES
	(1, 'Salón de Eventos', 'salon_de_eventos/'),
	(2, 'Parque', 'parques/'),
	(3, 'Discoteca', 'discotecas/'),
	(4, 'Salón Comunal', 'salones_comunales/'),
	(5, 'Hacienda', 'haciendas/');
/*!40000 ALTER TABLE `tipo_lugar` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla events_house.tipo_producto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_producto` (`id_tipo_producto`, `tipo`) VALUES
	(1, 'Default'),
	(2, 'Agregado'),
	(3, 'Aprobado');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.trabajador
CREATE TABLE IF NOT EXISTS `trabajador` (
  `id_trabajador` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_contrato` timestamp NOT NULL DEFAULT current_timestamp(),
  `aspirante` int(11) NOT NULL,
  `estado_trabajador` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_trabajador`),
  UNIQUE KEY `aspirante_unico` (`aspirante`),
  KEY `estado_id_estado` (`estado_trabajador`),
  KEY `aspirante` (`aspirante`),
  CONSTRAINT `aspirante_trabajador` FOREIGN KEY (`aspirante`) REFERENCES `aspirante` (`id_aspirante`),
  CONSTRAINT `estado_trabajador` FOREIGN KEY (`estado_trabajador`) REFERENCES `estado_trabajador` (`id_estado_trabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.trabajador: ~34 rows (aproximadamente)
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT IGNORE INTO `trabajador` (`id_trabajador`, `fecha_contrato`, `aspirante`, `estado_trabajador`) VALUES
	(1, '2019-08-08 20:44:12', 1, 1),
	(3, '2019-08-08 23:02:08', 4, 1),
	(4, '2019-08-10 00:06:42', 7, 1),
	(5, '2019-08-10 00:07:55', 8, 1),
	(6, '2019-08-10 18:03:30', 6, 1),
	(9, '2019-08-10 18:16:22', 3, 1),
	(13, '2019-08-10 18:35:38', 9, 1),
	(14, '2019-08-10 18:36:39', 10, 1),
	(16, '2019-08-10 18:38:07', 12, 1),
	(18, '2019-08-10 18:56:34', 14, 1),
	(19, '2019-08-10 19:00:15', 16, 1),
	(25, '2019-08-10 21:35:33', 18, 1),
	(27, '2019-08-10 21:39:10', 19, 1),
	(28, '2019-08-10 21:42:53', 21, 1),
	(29, '2019-08-10 21:54:48', 20, 1),
	(31, '2019-08-10 22:18:41', 25, 1),
	(33, '2019-08-10 22:19:54', 24, 1),
	(34, '2019-08-10 22:33:30', 23, 1),
	(35, '2019-08-10 23:02:40', 34, 1),
	(36, '2019-08-10 23:05:21', 35, 1),
	(37, '2019-08-11 01:29:37', 27, 1),
	(38, '2019-08-11 15:56:26', 31, 1),
	(40, '2019-08-11 18:22:20', 28, 1),
	(41, '2019-08-11 18:26:58', 26, 1),
	(42, '2019-08-12 12:40:47', 30, 1),
	(48, '2019-08-14 21:17:33', 33, 1),
	(49, '2019-08-14 22:06:58', 37, 1),
	(50, '2019-08-18 20:50:38', 38, 1),
	(51, '2019-08-18 20:51:06', 40, 1),
	(52, '2019-08-28 13:44:34', 45, 1),
	(53, '2019-08-28 14:27:28', 53, 1),
	(54, '2019-09-16 15:56:48', 41, 1),
	(55, '2019-09-17 16:37:06', 43, 1),
	(58, '2019-09-18 16:00:34', 58, 1);
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;

-- Volcando estructura para tabla events_house.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(100) NOT NULL DEFAULT 'imagen-sin-especificar.png',
  `ruta` varchar(100) NOT NULL DEFAULT 'usuarios/',
  `rol_ingreso` int(11) NOT NULL DEFAULT 1,
  `estado_usuario` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `telefono` (`telefono`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `rol_ingreso` (`rol_ingreso`),
  KEY `estado_usuario` (`estado_usuario`),
  CONSTRAINT `estado_usuario` FOREIGN KEY (`estado_usuario`) REFERENCES `estado_usuario` (`id_estado`),
  CONSTRAINT `rol_ingreso` FOREIGN KEY (`rol_ingreso`) REFERENCES `rol_ingreso` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla events_house.usuario: ~106 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `telefono`, `cedula`, `fecha_registro`, `foto`, `ruta`, `rol_ingreso`, `estado_usuario`) VALUES
	(1, 'Carlos David', 'Garcia Lopez', 'admin@gmail.com', 'c8d84d9c6f7d9c4b60bbe3a1ef2c8897a9621d210fda63d393e00b1265ecf87f1e7aac6c2df6f5d5df0e46b03980a2ecbaeb9b2275e46273597472b64dd7ad9c', 3142315004, 1000853916, '2019-07-30 20:05:05', 'pablo_escobar_gaviria_2_0.jpg', 'usuarios/', 3, 1),
	(2, 'Jefferson David', 'Martinez', 'jefebodega@gmail.com', '91d9aedc47c178d6d7a422eb8cd5346b6537c45ce54e00a7f513584a44ad7abc4fe4c584e70847b6853892837d04a8f1ced1a8e5866bdda34280d721b7acf6dc', 3046302822, 1000853917, '2019-07-30 20:08:55', 'Pepe_el_Pollo.jpg', 'usuarios/', 5, 1),
	(3, 'Estiven Fernando', 'Mampira Aldana', 'secretaria@gmail.com', '1dc0e7e1745b7653ed54d43be48c920cfc11a2a549e5324743f6a507532be429927e51aacb4004395952f7657675d791d94554bbf0e7313783a7efc0fa85a79d', 3508895677, 1000853918, '2019-07-30 20:11:54', 'food-3021300_1920.jpg', 'usuarios/', 4, 1),
	(4, 'Jorge Andres', 'Garzon Paez', 'empleado@gmail.com', 'c8d0f1f453ee011b79b2c3a561c5239638658aea734ad889ec878ac3d317e3be2d9f150a2ab1b0fef09983c9fe85d0c8fb61c5506675372113890a7995139bf7', 3214490926, 1000853919, '2019-07-30 20:13:23', 'persona4.jpg', 'usuarios/', 2, 1),
	(5, 'Marlly', 'Ballona', 'marlly@gmail.com', '958ff05f730a0f4c416289d96bbc48abc37a41638524f6895f1f25d5798f532e4a4ecbe2fdfb4b486f4206b3571839903afb328c4a2fe2e2a332dec81145bef3', 1234567, 1234567, '2019-07-30 22:16:48', 'persona6.jpg', 'usuarios/', 2, 1),
	(6, 'Yiseth', 'Real', 'yisethreal@gmail.com', '958ff05f730a0f4c416289d96bbc48abc37a41638524f6895f1f25d5798f532e4a4ecbe2fdfb4b486f4206b3571839903afb328c4a2fe2e2a332dec81145bef3', 3245761212, 1937538, '2019-07-30 22:26:45', 'nbbnb.jpg', 'usuarios/', 1, 1),
	(7, 'Laura', 'Villareal', 'lauravilla@gmail.com', '958ff05f730a0f4c416289d96bbc48abc37a41638524f6895f1f25d5798f532e4a4ecbe2fdfb4b486f4206b3571839903afb328c4a2fe2e2a332dec81145bef3', 987654321, 987654321, '2019-07-30 22:28:53', 'persona5.jpg', 'usuarios/', 1, 1),
	(8, 'Liseth', 'Arevalo', 'lisethareva@gmail.com', '958ff05f730a0f4c416289d96bbc48abc37a41638524f6895f1f25d5798f532e4a4ecbe2fdfb4b486f4206b3571839903afb328c4a2fe2e2a332dec81145bef3', 867845298, 45287236, '2019-07-30 22:48:01', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(9, 'Camilo', 'Vallesteros', 'camilovalles@gmail.com', '958ff05f730a0f4c416289d96bbc48abc37a41638524f6895f1f25d5798f532e4a4ecbe2fdfb4b486f4206b3571839903afb328c4a2fe2e2a332dec81145bef3', 3546245672, 2147483647, '2019-07-31 12:06:30', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(10, 'Marcela', 'Pinto', 'marcelapint@gmail.com', 'b56c3bfc283b76f0a9cbe6337944fbd8492cde40a2b4ad6f3c232db765ce5643d679f9971c4c91dda1aa525d721cce351bd00de165da30276933c901e35bdebb', 12352462, 4635732, '2019-07-31 14:21:53', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(11, 'Stefany', 'Castiblanco', 'Stefanycasti@gmail.com', 'a0e1dbb61819b7115d14379246b8d7f9c4d45a06caa52e042cf0aa3c99d77601c5eb5e3f3df8372f175dede4d8faa464b27726438f074d7fdbacc7fcd6458d91', 68463563, 5473685, '2019-07-31 14:23:45', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(12, 'Katherine', 'Arias', 'katherineari@gmail.com', '434dad6058e1c2d82c40d0afcbb357021240c0c54dd10efec35ce24e0f98219b9854400b7d88619158282e8dc480fc4e318786a153d25e03720e79cb83be9533', 463768356, 53625743, '2019-07-31 14:26:44', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(13, 'Karol', 'Rodriguez', 'karolrodriguez@gmail.com', '115923e9fafaccc5bf6dab2489c89805c72792e7c2e5fc90536104707a9d12053b0254605ac5d1f4387bc62181acbd3df8ee8e0718e532cfd231b895ef1812d6', 489562489, 948728957, '2019-07-31 14:29:48', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(14, 'Karen', 'Bayer', 'karenbayer@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 463567547, 354345342, '2019-07-31 14:33:11', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(15, 'Sofia', 'Gomez', 'sofiagomez@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 464685854, 325324532, '2019-07-31 14:33:50', 'Error505-EH.png', 'usuarios/', 2, 1),
	(19, 'Paula', 'Caranton', 'paulacaran@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 46546746, 43525264, '2019-07-31 14:41:49', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(22, 'Valentina', 'Gutierrez', 'valentinaguti@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 57463443123, 353563424, '2019-07-31 14:46:12', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(24, 'Luisa', 'Bulla', 'luisabulla@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 235254353, 32456443, '2019-07-31 14:47:38', 'computer-1331579_960_720.png', 'usuarios/', 2, 1),
	(27, 'Erika', 'Torres', 'erikator@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 65746546, 4542542, '2019-07-31 14:51:13', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(28, 'Valentina', 'Castaño', 'valentinacasta@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 57323562, 572467423, '2019-07-31 17:12:40', 'computer-1331579_960_720.png', 'usuarios/', 2, 1),
	(30, 'Daniela ', 'Triana', 'danielatriana@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 847456456, 26683534, '2019-07-31 17:48:28', 'sea-2755908_1920.jpg', 'usuarios/', 1, 1),
	(32, 'Ana', 'Triana', 'anatriana@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 46246, 2343141, '2019-07-31 18:11:05', 'background-2277_1920.jpg', 'usuarios/', 1, 1),
	(33, 'Valentina', 'Garzón', 'valentinagar@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 4632563526325, 232, '2019-07-31 18:13:21', 'cookies-4053771_1920.jpg', 'usuarios/', 1, 1),
	(34, 'Paula', 'Zamora', 'paulazamo@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 6425442542, 422354326, '2019-07-31 18:15:17', 'nectarine-1074997_1920.jpg', 'usuarios/', 1, 1),
	(37, 'Marcela', 'Arango', 'marcelaaran@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 4635, 32542, '2019-08-01 10:19:25', 'bread-3035491_1920.jpg', 'usuarios/', 1, 1),
	(38, 'Erika', 'Pacheco', 'erikapache@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 53643, 325425, '2019-08-01 10:20:12', 'background-2277_1920.jpg', 'usuarios/', 1, 1),
	(39, 'Jefferson Fernando', 'Martinez Mampira', 'jeffersonmampira@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 764746, 4264524, '2019-08-01 13:03:45', 'Entradas-frias-o-calientes_0.3.jpg', 'usuarios/', 1, 1),
	(40, 'Nicole', 'Arias', 'nicoleari@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 3508895690, 10000000, '2019-08-01 13:44:11', 'Error505-EH.png', 'usuarios/', 1, 1),
	(41, 'Laura', 'Arias', 'lauraari@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 46224, 46246, '2019-08-01 17:25:44', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(42, 'Nicol', 'Serrano', 'nicolserrano@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 13451351, 46242341, '2019-08-03 16:07:08', 'puertaderecha.jpg', 'usuarios/', 1, 1),
	(43, 'Geraldine', 'Perez', 'geraldine@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895674, 1000853915, '2019-08-06 20:30:53', 'nectarine-1074997_1920.jpg', 'usuarios/', 1, 1),
	(47, 'Samantha', 'Rodriguez', 'samantha@gmail.com', 'asd', 12345, 67890, '2019-08-07 13:34:09', 'bread-3035491_1920.jpg', 'usuarios/', 1, 1),
	(48, 'David', 'Garcia', 'davidgar@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 1234567891, 46357312, '2019-08-07 13:37:09', 'computer-1331579_960_720.png', 'usuarios/', 2, 1),
	(50, 'Paola', 'Rey', 'paolarey@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 1234567892, 56357312, '2019-08-07 13:41:48', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(58, 'Rosalba', 'Hernandez', 'rosalbahernan@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 123123, 123123, '2019-08-07 14:10:29', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(63, 'Karen', 'Páez', 'karenpaez@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 41231423, 14231423, '2019-08-07 14:19:02', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(64, 'Camilo', 'Pedrozo', 'camilopedro@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 7643453, 653832, '2019-08-07 14:37:09', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(67, 'Juan', 'Pedrozo', 'juanpedro@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 51942734, 83546357, '2019-08-07 14:42:50', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(68, 'Alba', 'Perez', 'albaperez@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 3567842872, 32456789, '2019-08-08 12:24:52', 'Malteadas.jpg', 'usuarios/', 1, 1),
	(71, 'Mampira', 'Aldana', 'mampi@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 3546353546, 424624621, '2019-08-08 12:34:57', 'la-paloma-blanca-es-el-símbolo-de-una-paz-haces-luminosos-110194776.jpg', 'usuarios/', 1, 1),
	(73, 'Oscar', 'Amador', 'oscaramaamafe@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 12345679, 123456789, '2019-08-09 19:57:41', 'persona8.jpg', 'usuarios/', 1, 1),
	(74, 'Monica', 'Profe', 'monicaprofe@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 9375681265, 83548765, '2019-08-16 17:20:16', '', 'usuarios/', 1, 1),
	(75, 'Monica', 'Ariza', 'monica@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8365297581, 8593675297, '2019-08-16 17:21:30', 'persona5.jpg', 'usuarios/', 1, 1),
	(76, 'Gilberto', 'SantaRosa', 'gilberto@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 3133246789, 1234567890, '2019-08-17 12:18:02', 'd3fa2a7587f8025223f230b9b8f59c5d784877ee.jpg', 'usuarios/', 1, 1),
	(77, 'maluma', 'rodriguez', 'maluma@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 6547824567, 9890987654, '2019-08-17 12:19:43', 'Maluma_-_Espaço_das_Américas_(37591053894).jpg', 'usuarios/', 1, 1),
	(78, 'Vico', 'CCCC', 'vico@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 6572346712, 675849012, '2019-08-17 12:20:52', 'vico_c.jpg', 'usuarios/', 1, 1),
	(79, 'La Rosalia', 'Jimenez', 'rosalia@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 5436789012, 5467381920, '2019-08-17 12:21:52', 'rosalia4-1170x600.jpg', 'usuarios/', 1, 1),
	(80, 'Escobar', 'Gavirira', 'escobar@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7658901234, 12343564789, '2019-08-17 12:23:52', 'pablo_escobar_gaviria_2_0.jpg', 'usuarios/', 1, 1),
	(81, 'Avicci', 'Vicci', 'avicci@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7869482349, 4567281940, '2019-08-17 12:25:33', 'avic_0.jpg', 'usuarios/', 1, 1),
	(82, 'Diomedez', 'Diaz', 'diomedez@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7684591234, 65748291209, '2019-08-17 12:26:26', 'c3b77cdff8b152466447e4573c45613b06fbcf1b.jpg', 'usuarios/', 1, 1),
	(83, 'Katherine', 'Garzón', 'katherine@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 5678492012, 7685930238, '2019-08-17 12:27:10', 'gettyimages-1062721328-e1562864191645.jpg', 'usuarios/', 1, 1),
	(84, 'Michael', 'Jackson', 'michael@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7689502371, 876859301, '2019-08-17 12:28:29', 'Michael-Jackson-pop-1024x768.jpg', 'usuarios/', 1, 1),
	(85, 'Catalina', 'Cruz', 'catalina@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7685930212, 876593012, '2019-08-17 12:29:12', 'nbbnb.jpg', 'usuarios/', 1, 1),
	(86, 'Sergio', 'Gamboa', 'sergiogamboa@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7658931728, 1234768950, '2019-08-17 12:29:54', 'Pasabordo.jpg', 'usuarios/', 1, 1),
	(87, 'Felipe', 'Rodriguez', 'feliperodriguez@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 6278487656, 4567893267, '2019-08-17 14:44:24', 'descarga.jpg', 'usuarios/', 1, 1),
	(88, 'Toño', 'Páez', 'toñopaez@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1234567810, 3462846279, '2019-08-20 10:09:04', 'persona1.jpg', 'usuario/', 1, 1),
	(89, 'Alex', 'Garzón', 'alexgarzon@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1234567811, 3462846272, '2019-08-20 10:21:40', 'persona3.jpg', 'usuario/', 6, 1),
	(90, 'Camilo', 'Granados', 'camilogranados@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895611, 354626421, '2019-08-20 13:27:14', 'Herramientas-descifrado-ransomwares.jpg', 'usuarios/', 6, 1),
	(91, 'Sergio', 'Gil', 'sergiogil@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895612, 873659426, '2019-08-20 13:42:37', 'criptografia.jpg', 'usuarios/', 6, 1),
	(93, 'Sebastian', 'Amador', 'sebastianamad@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895614, 356187356189, '2019-08-20 14:01:58', 'd3fa2a7587f8025223f230b9b8f59c5d784877ee.jpg', 'usuarios/', 6, 1),
	(94, 'Felipe', 'Cruz', 'felipecruz@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895615, 351614781, '2019-08-20 14:12:43', 'nbbnb.jpg', 'usuarios/', 6, 1),
	(95, 'Jhon', 'Valencia', 'jhonvalencia@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895616, 5357126457, '2019-08-20 14:13:28', 'Michael-Jackson-pop-1024x768.jpg', 'usuarios/', 6, 1),
	(96, 'Juan Carlos', 'López', 'juanca@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895617, 35613785618, '2019-08-20 14:14:51', '450_1000.jpg', 'usuarios/', 6, 1),
	(97, 'Sheinar', 'Chacon', 'sheinar@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895618, 35163871, '2019-08-20 14:18:27', '450_1000.jpg', 'usuarios/', 6, 1),
	(98, 'Daniela', 'Calderon', 'danielacalde@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895620, 3517651838, '2019-08-20 15:56:13', 'WhatsApp Image 2019-07-04 at 9.33.52 PM (1).jpeg', 'usuarios/', 6, 1),
	(100, 'Camila', 'Villalobos', 'camilavillalobos@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895622, 561475193812, '2019-08-20 16:00:19', 'tattoEdit.jpg', 'usuarios/', 6, 1),
	(101, 'Laura', 'Quintero', 'lauraquintero@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895623, 6428963171, '2019-08-20 16:09:47', '', 'usuarios/', 1, 1),
	(102, 'Laura', 'Osorio', 'lauraosorio@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895624, 3561735618, '2019-08-20 16:14:46', '', 'usuarios/', 1, 1),
	(103, 'Kimberly', 'Loaiza', 'kimberly@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895625, 35768134, '2019-08-20 16:16:25', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(104, 'Tatiana', 'Monroy', 'tatianamonroy@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508895626, 35693457647, '2019-08-20 16:17:21', 'earth-2254769_1920.jpg', 'usuarios/', 1, 1),
	(105, 'Andres', 'Páez', 'andrespaez@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8546371648, 469731581, '2019-08-27 00:07:25', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(106, 'Edward', 'Jimenez', 'edwardjimen@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8563937561, 356189356, '2019-08-27 00:13:44', 'pablo_escobar_gaviria_2_0.jpg', 'usuarios/', 1, 1),
	(107, 'Fernanda', 'Gil', 'fernandogil@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 9485760376, 385193561, '2019-08-27 00:19:14', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(108, 'Oscar', 'Buitrago', 'oscarbuitrago@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7453264891, 64896738943, '2019-08-27 08:34:43', 'vico_c.jpg', 'usuarios/', 1, 1),
	(109, 'Jefferson', 'David', 'jeffersonmartinez982@gmail.com', '1b410f24a4839d34cdc107907ba5f4885579ec2578bd06d7dbad5593e4d97440eb559dc0529e25bb6c16ad9db5031d91ae7ca40a4862bb68a82187f8aaa454b7', 3058113089, 1192802111, '2019-08-27 12:47:49', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(110, 'Juan David', 'Mancipe', 'juanmancipe@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8459845128, 4875189571, '2019-08-27 18:56:53', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(111, 'Gabriela', 'Acosta', 'gabriela@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8461294751, 356489562879, '2019-08-28 14:27:01', '73.png', 'usuarios/', 6, 1),
	(112, 'Jorge', 'Garzon', 'jorgegarz@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3875482924, 48574298752, '2019-09-02 17:46:29', '73.png', 'usuarios/', 1, 1),
	(113, 'Alexander', 'Herrera', 'alexanher@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 7463826, 1192802112, '2019-09-09 13:41:49', 'Pepe_el_Pollo.jpg', 'usuarios/', 1, 1),
	(114, 'Johan', 'Colmenares', 'johancolm@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8475623, 54985742895, '2019-09-09 15:53:16', '73.png', 'usuarios/', 6, 1),
	(115, 'Nelson', 'Rodriguez', 'nhrodrigueza@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3202262626, 80160034, '2019-09-09 17:28:08', 'c3b77cdff8b152466447e4573c45613b06fbcf1b.jpg', 'usuarios/', 1, 1),
	(116, 'Azael', 'Rodriguez', 'azaelra0328@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3876557481, 875426274, '2019-09-12 12:59:30', 'Pepe_el_Pollo.jpg', 'usuarios/', 1, 1),
	(117, 'Jose Luis', 'Aguilar', 'joseluisaguilar@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8547657492, 8754298752, '2019-09-16 10:37:19', 'Pepe_el_Pollo.jpg', 'usuarios/', 1, 1),
	(118, 'Stefany', 'Ferrerira', 'stefany@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 3044803987, 78695827, '2019-09-16 15:50:42', 'Pepe_el_Pollo.jpg', 'usuarios/', 1, 1),
	(119, 'Diego', 'Gonzales', 'diegogonza@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508893620, 867687138, '2019-09-17 16:00:19', 'ilustracion-bandera-espana_53876-18168.jpg', 'usuarios/', 6, 1),
	(120, 'David', 'Franco', 'davidfranco@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3508890000, 276528746, '2019-09-17 16:03:59', 'eventos-solicitados-en-2.png', 'usuarios/', 6, 1),
	(121, 'Ivan', 'Lugo', 'ivancito@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 5746746747, 6356363563, '2019-09-18 09:58:07', 'eventos-solicitados-en-2.png', 'usuarios/', 6, 1),
	(125, 'Felipe', 'Barrera', 'felipebar@gmail.com', 'c8d84d9c6f7d9c4b60bbe3a1ef2c8897a9621d210fda63d393e00b1265ecf87f1e7aac6c2df6f5d5df0e46b03980a2ecbaeb9b2275e46273597472b64dd7ad9c', 9876758487, 387516934715, '2019-09-18 14:29:35', 'Pepe_el_Pollo.jpg', 'usuarios/', 1, 1),
	(126, 'Juan', 'Zapata', 'juanzapata@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3894138587, 3895138947, '2019-09-18 14:34:10', 'octava.jpg', 'usuarios/', 1, 1),
	(130, 'Sara', 'Gomez', 'saragomez@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 9878767656, 3852945629, '2019-09-18 14:36:13', 'mampi2.jpg', 'usuarios/', 1, 1),
	(132, 'Nicolas', 'Ruiz', 'nicolasruiz@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8767656545, 513687561, '2019-09-18 14:46:43', 'Pepe_el_Pollo.jpg', 'usuarios/', 1, 1),
	(133, 'Mariana', 'Giraldo', 'marianagir@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3108125899, 8945298629, '2019-09-18 14:50:49', 'IMG_7224.jpg', 'usuarios/', 1, 1),
	(134, 'Jefferson David', 'Martinez', 'estivenmampira32@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 9878767356, 3456248768, '2019-09-18 15:42:21', 'Pepe_el_Pollo.jpg', 'usuarios/', 2, 1),
	(135, 'Juan David', 'Mancipe', 'juandavidmancipegarcia@hotmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8789823453, 47569127462, '2019-09-18 16:07:13', 'empleados-por-cargo.png', 'usuarios/', 6, 1),
	(136, 'Estiven Fernando', 'Mampira Aldana', 'estivenmampiraaldana@gmail.com', 'b56c3bfc283b76f0a9cbe6337944fbd8492cde40a2b4ad6f3c232db765ce5643d679f9971c4c91dda1aa525d721cce351bd00de165da30276933c901e35bdebb', 3214703970, 1024587504, '2019-09-20 11:30:45', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(137, 'Gibson Javier', 'Martinez Fajardo', 'gibsonmartinez37@gmail.com', '3148f32b884c5499fde1c194d96641a663c08cb3427ebc82c1e3c9d63c3fb9a0141f93a7b3d8e94608c70463cf3e695c17c19d494fc97095f46f40b69ad01264', 3106181574, 1000571944, '2019-09-20 17:53:23', 'mampi2.jpg', 'usuarios/', 1, 1),
	(141, 'Monica', 'Mendoza', 'mbmendoza6@misena.edu.co', 'd4da894c01a36e6971114353ea41263d9126e4759447e1dadb52b840d83adb741ec3daf35253ac282eb4987ec240ef2b932d0ad93ca77c30f6b5f0c189c348c3', 5555555555, 84296452, '2019-09-20 18:05:37', 'persona6.jpg', 'usuarios/', 1, 1),
	(142, 'Jeffer', 'Martinez', 'jeffermart@live.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8475623245, 8345612763418, '2019-09-21 11:10:42', 'vico_c.jpg', 'usuarios/', 1, 1),
	(143, 'Valentina', 'Zaque', 'valentinazaq@hotmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 8877665544, 3859613891, '2019-09-21 11:21:58', 'avic_0.jpg', 'usuarios/', 1, 1),
	(144, 'Maria', 'Parra', 'mariaparra@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3151514133, 14514251341, '2019-09-24 12:28:24', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(145, 'Gibson', 'Martínez', 'gibsonmar@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 4562452422, 2546231542, '2019-09-24 12:30:30', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(146, 'Alex', 'Triviño', 'alextrivi@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3512345425, 2454232314, '2019-09-24 12:44:02', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(148, 'Brayan', 'Calderon', 'brayancal@hotmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 9878767898, 34752864287628, '2019-10-02 14:56:13', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(149, 'Jorge ', 'Garzón', 'jorgegarzon@misena.edu.co', 'c6836f42a1294399ecebe9c5677b8c1800ded9ac6bf686a863caf74ebb569eb6066970a6acc87b19a8eefb70af0b88f6b6443e6d7bd584834d953fc484d634bf', 3133875201, 12389054783, '2019-10-23 14:54:52', 'computer-1331579_960_720.png', 'usuarios/', 1, 1),
	(150, 'Juan', 'Gómez', 'juangomez@misena.edu.co', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3347381289, 768592037, '2019-10-23 15:11:00', 'nbbnb.jpg', 'usuarios/', 6, 1),
	(152, 'Gilberto', 'Rodriguez', 'gilbertorod@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 3347381298, 768592074, '2019-10-23 15:13:18', 'nbbnb.jpg', 'usuarios/', 6, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para disparador events_house.cotizacion_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `cotizacion_after_insert` AFTER INSERT ON `cotizacion` FOR EACH ROW BEGIN
	UPDATE solicitud SET estado_solicitud = 1 WHERE id_solicitud = NEW.solicitud_id_solicitud;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador events_house.trabajador_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trabajador_after_insert` AFTER INSERT ON `trabajador` FOR EACH ROW BEGIN
	UPDATE aspirante SET estado_aspirante = 1 WHERE id_aspirante = NEW.aspirante;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
