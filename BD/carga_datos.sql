-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 13-11-2024 a las 08:25:47
-- Versión del servidor: 11.5.2-MariaDB-ubu2404
-- Versión de PHP: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo5_2425`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(5, 'Modelos', 'Categoría para preguntas relacionadas con modelos de aviones.'),
(6, 'Motorizacion', 'Categoría para preguntas relacionadas con cualquier cosa relacionada a los motores.'),
(7, 'Sistema', 'Categoría para preguntas relacionadas con los sistemas y equipos informáticos de los aviones.'),
(8, 'Especificaciones', 'Categoría para preguntas relacionadas con las distintas especificaciones de los distintos aviones. '),
(9, 'Componentes', 'Categoría para preguntas relacionadas con un componente en concreto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `user`, `message`, `timestamp`) VALUES
(21, 8, 'aaa', '2024-11-07 12:03:29'),
(22, 20, 'aaaa', '2024-11-07 12:03:35'),
(23, 8, 'hola', '2024-11-07 12:06:44'),
(24, 8, 'hola', '2024-11-07 12:06:53'),
(25, 20, 'zahir', '2024-11-07 12:09:19'),
(26, 8, 'ibai', '2024-11-07 12:09:31'),
(27, 20, 'hola', '2024-11-07 12:11:48'),
(28, 8, 'hola', '2024-11-07 12:11:53'),
(29, 8, 'hola', '2024-11-07 12:18:47'),
(30, 8, 'za', '2024-11-07 12:24:02'),
(31, 20, 'zazaza', '2024-11-07 12:23:39'),
(32, 20, 'zazazaza', '2024-11-07 12:23:52'),
(33, 20, 'hola', '2024-11-07 12:26:21'),
(34, 8, 'za', '2024-11-07 12:26:37'),
(35, 20, 'que tal', '2024-11-07 12:26:41'),
(36, 8, 'ibai tonto', '2024-11-07 12:26:50'),
(37, 20, 'si es', '2024-11-07 12:26:53'),
(38, 20, '<p></p>', '2024-11-07 12:32:16'),
(39, 20, '<p', '2024-11-07 12:32:46'),
(40, 20, '<p>Hola</p>', '2024-11-07 12:32:59'),
(41, 20, '<p>Hola</p>', '2024-11-07 12:32:59'),
(42, 8, 'no', '2024-11-07 12:39:02'),
(43, 8, 'Peru en Acenso (La Recolocación )', '2024-11-07 12:39:57'),
(44, 20, 'Desde móvil ', '2024-11-07 12:41:29'),
(45, 20, 'hola?', '2024-11-07 14:08:00'),
(46, 16, 'buenas tardes', '2024-11-07 14:08:23'),
(47, 16, 'buenas tardes', '2024-11-07 14:08:29'),
(48, 16, 'buenas tardes', '2024-11-07 14:08:32'),
(49, 16, 'buenas tardes', '2024-11-07 14:08:32'),
(50, 20, 'vamoooos', '2024-11-07 14:08:32'),
(51, 20, 'vamoooos', '2024-11-07 14:08:38'),
(52, 20, 'vamoooos', '2024-11-07 14:08:38'),
(53, 20, 'vamoooos', '2024-11-07 14:08:39'),
(54, 16, 'hola', '2024-11-07 14:08:46'),
(55, 20, 'ostia que mal va chaval', '2024-11-07 14:08:56'),
(56, 16, 'ya e', '2024-11-07 14:09:13'),
(57, 20, 'te llega esto sin recargar?', '2024-11-07 14:09:20'),
(58, 16, 'sisi eso si', '2024-11-07 14:09:36'),
(59, 20, 'oleeee funcionar funciona', '2024-11-07 14:09:49'),
(60, 16, 'jajsj vamosss', '2024-11-07 14:10:05'),
(61, 16, 'ahora tarda menos', '2024-11-07 14:10:19'),
(62, 20, 'menos mal, va  aratos', '2024-11-07 14:10:42'),
(63, 20, 'el chat funciona, otra cosa es el server que es mas lento que un caracol JAJAJAA', '2024-11-07 14:11:13'),
(64, 16, 'entonces delocos', '2024-11-07 14:27:10'),
(65, 8, 'za', '2024-11-08 08:31:21'),
(66, 20, 'Hola', '2024-11-08 08:39:25'),
(74, 8, 'hola', '2024-11-13 08:25:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `pregunta_id` int(11) DEFAULT NULL,
  `respuesta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `usuario_id`, `pregunta_id`, `respuesta_id`) VALUES
(55, 20, 86, NULL),
(57, 8, 111, NULL),
(58, 8, 110, NULL),
(59, 8, 108, NULL),
(60, 8, 104, NULL),
(61, 8, NULL, 104),
(62, 8, 103, NULL),
(63, 15, 112, NULL),
(64, 15, NULL, 123),
(65, 15, 111, NULL),
(66, 15, NULL, 120),
(67, 15, NULL, 118),
(68, 15, NULL, 116),
(69, 15, NULL, 113),
(70, 17, NULL, 122),
(71, 17, 111, NULL),
(72, 17, 108, NULL),
(73, 17, NULL, 117),
(74, 17, 107, NULL),
(75, 16, 112, NULL),
(76, 16, NULL, 120),
(78, 8, 112, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `pregunta_id` int(11) DEFAULT NULL,
  `respuesta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `usuario_id`, `pregunta_id`, `respuesta_id`) VALUES
(57, 20, 86, NULL),
(58, 20, NULL, 66),
(64, 20, NULL, 109),
(68, 20, 105, NULL),
(74, 8, 110, NULL),
(75, 8, 108, NULL),
(76, 8, 107, NULL),
(77, 15, 112, NULL),
(78, 15, 111, NULL),
(79, 15, 110, NULL),
(80, 15, 108, NULL),
(81, 15, NULL, 116),
(82, 15, 107, NULL),
(83, 15, NULL, 114),
(84, 17, 112, NULL),
(85, 17, NULL, 123),
(86, 17, 108, NULL),
(87, 17, 107, NULL),
(88, 17, NULL, 115),
(89, 16, 112, NULL),
(90, 16, NULL, 122),
(91, 16, 111, NULL),
(92, 20, NULL, 122),
(108, 20, 112, NULL),
(111, 8, 112, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `autor_id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `visto` tinyint(1) DEFAULT 0,
  `pregunta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `usuario_id`, `autor_id`, `tipo`, `mensaje`, `fecha`, `hora`, `visto`, `pregunta_id`) VALUES
(23, 15, 6, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-05', '21:35:51', 1, 64),
(28, 15, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '08:43:28', 0, 69),
(29, 15, 10, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '10:29:47', 0, 69),
(30, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '10:43:11', 0, 69),
(31, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '10:57:59', 0, 69),
(32, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '10:58:18', 0, 69),
(33, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '11:34:24', 0, 69),
(34, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-06', '11:35:09', 0, 69),
(42, 15, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-08', '09:00:57', 0, 69),
(43, 15, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-08', '09:00:58', 0, 69),
(44, 15, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-08', '12:03:20', 0, 64),
(45, 15, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-08', '12:03:53', 0, 64),
(46, 15, 17, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-08', '12:04:02', 0, 64),
(47, 20, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '08:24:06', 1, 84),
(48, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '08:24:14', 0, 84),
(49, 8, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:13:38', 0, 86),
(50, 8, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:15:01', 0, 86),
(51, 8, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:16:19', 0, 86),
(52, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '09:16:33', 0, 86),
(53, 8, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:17:54', 0, 86),
(54, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:41:48', 0, 88),
(55, 15, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:42:15', 0, 88),
(56, 15, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:42:16', 0, 88),
(57, 17, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:44:56', 0, 89),
(58, 15, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '09:45:25', 0, 88),
(59, 15, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '09:45:38', 0, 88),
(60, 17, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:46:15', 0, 89),
(61, 16, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:47:57', 0, 90),
(62, 16, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:48:34', 0, 90),
(63, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:49:42', 0, 91),
(64, 8, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:51:39', 0, 92),
(65, 8, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:53:12', 0, 92),
(66, 16, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:56:34', 0, 93),
(67, 16, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '09:56:58', 0, 93),
(68, 17, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:00:52', 0, 94),
(69, 17, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:01:29', 0, 94),
(70, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:02:31', 0, 95),
(71, 20, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:03:00', 0, 95),
(72, 8, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:05:16', 0, 96),
(73, 8, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:05:33', 0, 96),
(74, 8, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:06:43', 0, 96),
(75, 8, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:06:44', 0, 96),
(76, 16, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:08:06', 0, 97),
(77, 16, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:08:33', 0, 97),
(78, 17, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:11:02', 0, 98),
(79, 17, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:13:01', 0, 98),
(80, 20, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:14:40', 0, 99),
(81, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:14:55', 0, 99),
(82, 8, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:17:44', 0, 100),
(83, 8, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:18:06', 0, 100),
(84, 8, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:18:33', 0, 100),
(85, 16, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:20:47', 0, 101),
(86, 16, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:21:41', 0, 101),
(87, 16, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:21:58', 0, 101),
(88, 20, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:30:47', 0, 102),
(89, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:33:01', 0, 102),
(90, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:37:39', 0, 103),
(91, 15, 16, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:37:55', 0, 103),
(92, 15, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:38:16', 0, 103),
(93, 17, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:39:28', 0, 104),
(94, 17, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:39:43', 0, 104),
(95, 17, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:41:01', 0, 104),
(96, 8, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:42:43', 0, 105),
(97, 8, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:42:57', 0, 105),
(98, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:01', 0, 105),
(99, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:04', 0, 105),
(100, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:05', 0, 105),
(101, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:06', 0, 105),
(102, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:08', 0, 105),
(103, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:26', 0, 105),
(104, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:43:28', 0, 105),
(105, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:17', 0, 105),
(106, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:18', 0, 105),
(107, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:19', 0, 105),
(108, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:20', 0, 105),
(109, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:22', 0, 105),
(110, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:22', 0, 105),
(111, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:24', 0, 105),
(112, 8, 20, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '10:44:25', 0, 105),
(113, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:45:03', 0, 106),
(114, 20, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '10:45:22', 0, 106),
(115, 16, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:45:33', 0, 107),
(116, 16, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:47:16', 0, 107),
(117, 16, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:48:18', 0, 107),
(118, 17, 15, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:52:25', 0, 108),
(119, 17, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:52:58', 0, 108),
(120, 15, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:57:36', 0, 110),
(121, 15, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:58:18', 0, 110),
(122, 8, 20, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '12:59:54', 0, 111),
(123, 8, 17, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:01:22', 0, 111),
(124, 8, 17, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:01:26', 0, 111),
(125, 8, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '13:01:32', 0, 111),
(126, 20, 17, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '13:02:57', 0, 112),
(127, 20, 8, 'respuesta', 'Tu pregunta ha recibido una nueva respuesta de ', '2024-11-11', '13:04:26', 0, 112),
(128, 20, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:09:23', 0, 112),
(129, 15, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:09:36', 0, 110),
(130, 17, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:09:44', 0, 108),
(131, 16, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:09:50', 0, 107),
(132, 20, 15, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:10:24', 0, 112),
(133, 8, 15, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:10:41', 0, 111),
(134, 17, 15, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:11:05', 0, 108),
(135, 16, 15, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:11:20', 0, 107),
(136, 20, 17, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:12:25', 0, 112),
(137, 16, 17, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:13:11', 0, 107),
(138, 20, 16, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:14:01', 0, 112),
(139, 8, 16, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-11', '13:14:15', 0, 111),
(140, 20, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-13', '08:24:09', 0, 112),
(141, 20, 8, 'like', 'Tu pregunta ha recibido un nuevo like de ', '2024-11-13', '08:24:10', 0, 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `hora_publicacion` time NOT NULL,
  `likes` int(11) DEFAULT 0,
  `favoritos` int(11) DEFAULT 0,
  `usuario_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `titulo`, `descripcion`, `fecha_publicacion`, `hora_publicacion`, `likes`, `favoritos`, `usuario_id`, `categoria_id`, `archivo`) VALUES
(86, 'Procedimientos especiales para el Boeing 787', 'Al realizar el mantenimiento del Boeing 787, he notado que los procedimientos parecen diferentes a otros modelos. ¿Qué aspectos específicos debo tener en cuenta?', '2024-11-11', '09:13:12', 1, 1, 8, 5, './uploads/a.jpeg'),
(88, 'Problema recurrente en cabina del A320', 'En el Airbus A320 que opero, noto un fallo recurrente en los controles de cabina. ¿Cómo lo reporto correctamente?', '2024-11-11', '09:41:24', 0, 0, 15, 5, ''),
(89, 'Vibraciones en motores GE90', 'Hemos notado una vibración inusual en los motores GE90. ¿Cuál podría ser la causa?', '2024-11-11', '09:44:32', 0, 0, 17, 6, './uploads/b.jpg'),
(90, 'Desconexión del piloto automático en A320', 'El piloto automático en el A320 se desconecta sin razón aparente. ¿Cómo proceder?', '2024-11-11', '09:47:36', 0, 0, 16, 7, './uploads/c.jpeg'),
(91, 'Límite de peso en la bodega del Embraer 190', 'Necesito confirmar el límite de peso de la bodega en el Embraer 190.', '2024-11-11', '09:49:30', 0, 0, 20, 8, ''),
(92, 'Mantenimiento de luces de aterrizaje en A320', '¿Qué aspectos debemos revisar en las luces de aterrizaje del A320?', '2024-11-11', '09:51:17', 0, 0, 8, 9, './uploads/d.jpg'),
(93, 'Operación de Trent 700 en clima extremo', 'Durante el verano, los motores Trent 700 tienden a calentarse. ¿Qué medidas podemos tomar?', '2024-11-11', '09:55:51', 0, 0, 16, 6, ''),
(94, 'Inspección del sistema de oxígeno de emergencia en el B787', '¿Qué pasos seguimos para revisar el sistema de oxígeno de emergencia en el Boeing 787?', '2024-11-11', '10:00:15', 0, 0, 17, 9, './uploads/e.jpg'),
(95, 'Asientos adicionales en el Boeing 737-800', '¿Cuántos asientos adicionales puedo agregar en una configuración de alta densidad en el 737-800?', '2024-11-11', '10:02:16', 0, 0, 20, 8, ''),
(96, 'Alerta en el sistema de presurización', 'Aparece una alerta de presurización en vuelo. ¿Qué debemos hacer en esta situación?', '2024-11-11', '10:04:53', 0, 0, 8, 7, ''),
(97, 'Elección entre A330 y A350 para rutas de alta demanda', 'Necesitamos definir el modelo adecuado para rutas de alta ocupación. ¿Es mejor el A330 o el A350?', '2024-11-11', '10:07:16', 0, 0, 16, 5, ''),
(98, 'Acciones preventivas para reducir desgaste de motores', 'Buscamos maneras de reducir el desgaste de motores en nuestras operaciones diarias. ¿Algún consejo?', '2024-11-11', '10:10:03', 0, 0, 17, 6, ''),
(99, 'Seguridad en el Boeing 747-8 en rutas largas', 'Para vuelos de larga duración con el 747-8, ¿qué consideraciones de seguridad debemos tomar en cuenta?', '2024-11-11', '10:14:30', 0, 0, 20, 5, ''),
(100, 'Exceso de peso en A320 antes del despegue', 'Encontramos un sobrepeso en un A320 antes del despegue. ¿Cuál es el procedimiento?', '2024-11-11', '10:17:23', 0, 0, 8, 8, ''),
(101, 'Capacidad de carga en el A330 para vuelos largos', '¿Cuál es la capacidad de la bodega del A330 en vuelos de larga distancia?', '2024-11-11', '10:19:44', 0, 0, 16, 8, './uploads/g.jpg'),
(102, 'Pérdida de potencia durante el despegue', 'Tuvimos una pérdida de potencia durante el despegue en un vuelo reciente. ¿Cuál es el procedimiento a seguir?', '2024-11-11', '10:30:26', 0, 0, 20, 6, ''),
(103, 'Desgaste prematuro en frenos del tren de aterrizaje', 'Notamos desgaste rápido en los frenos del tren de aterrizaje. ¿Qué debemos hacer?', '2024-11-11', '10:37:15', 0, 1, 15, 9, './uploads/h.jpg'),
(104, 'Problemas de conectividad en el entretenimiento a bordo', 'El sistema de entretenimiento del Boeing 737 pierde conexión con frecuencia. ¿Qué podría estar fallando?', '2024-11-11', '10:39:13', 0, 1, 17, 7, ''),
(105, 'Pérdida de presión en el sistema hidráulico', 'Detectamos una pérdida de presión en el sistema hidráulico durante el vuelo. ¿Cómo actuamos?', '2024-11-11', '10:42:09', 1, 0, 8, 7, ''),
(106, 'Revisión de alas después de aterrizaje en vientos fuertes', 'Tras un aterrizaje con viento fuerte, ¿qué componentes del ala debemos revisar?', '2024-11-11', '10:44:47', 0, 0, 20, 9, ''),
(107, 'Mantenimiento preventivo en los sistemas de climatización del A350', 'Hemos tenido problemas de sobrecalentamiento en la cabina en vuelos largos. ¿Hay medidas preventivas que podamos tomar para evitar que el sistema falle durante el vuelo? ', '2024-11-11', '12:43:13', 3, 1, 16, 9, './uploads/Climatizacion.pdf'),
(108, '¿Es posible reducir el peso en carga para vuelos más largos en el B787?', 'Planeamos operar rutas largas con el B787 y necesitamos optimizar la carga. ¿Qué configuraciones considerar para reducir peso sin comprometer la operación? ', '2024-11-11', '12:50:03', 3, 2, 17, 8, './uploads/capacidad de Bodega.pdf'),
(110, 'Fallo en el sistema de frenos automáticos durante el aterrizaje', 'En el último vuelo, el sistema de frenos automáticos falló justo al aterrizar, y tuve que usar los frenos manualmente. ¿Por qué puede suceder esto y cómo evitarlo? ', '2024-11-11', '12:56:38', 2, 1, 15, 7, './uploads/k.jpg'),
(111, 'Ajuste de mezcla de combustible en motores PW1000G en altitudes elevadas', 'He notado que el motor PW1000G, en condiciones de alta altitud, tiende a consumir más combustible de lo esperado. ¿Es normal o es posible ajustar la mezcla para optimizar el consumo? ', '2024-11-11', '12:58:53', 2, 3, 8, 6, './uploads/ARCHIVO COMPARATIVOS DE AVIONES A320 Y A321NEO.pdf'),
(112, 'Diferencias de manejo entre el A321neo y el A320 estándar', 'Recientemente hemos incorporado el A321neo a nuestra flota y, aunque es similar al A320, noto que responde diferente en ciertas maniobras. ¿Alguien más ha experimentado estas diferencias? ¿Hay ajustes específicos a tener en cuenta? ', '2024-11-11', '13:00:29', 5, 3, 20, 5, './uploads/ARCHIVO COMPARATIVOS DE AVIONES A320 Y A321NEO.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `hora_publicacion` time NOT NULL,
  `likes` int(11) DEFAULT 0,
  `favoritos` int(11) DEFAULT 0,
  `pregunta_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `respuesta_padre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `contenido`, `fecha_publicacion`, `hora_publicacion`, `likes`, `favoritos`, `pregunta_id`, `usuario_id`, `archivo`, `respuesta_padre_id`) VALUES
(64, 'El Boeing 787 usa más materiales compuestos y tiene sistemas eléctricos avanzados. Revisa las conexiones eléctricas y realiza inspecciones de materiales compuestos.', '2024-11-11', '09:13:38', 0, 0, 86, 15, '', NULL),
(65, 'Los materiales compuestos del 787 requieren técnicas de inspección específicas, así que revisa los manuales de mantenimiento antes de proceder.', '2024-11-11', '09:15:01', 0, 0, 86, 17, '', NULL),
(66, 'El sistema eléctrico es más complejo en este modelo, por lo que se recomienda verificar la capacitación del personal para trabajar en el 787.', '2024-11-11', '09:16:18', 1, 0, 86, 16, '', NULL),
(67, 'Ten en cuenta que el Boeing 787 utiliza un sistema de refrigeración específico para sus componentes eléctricos; asegúrate de revisar los conductos y filtros de aire en cada inspección.', '2024-11-11', '09:17:53', 0, 0, 86, 20, '', NULL),
(68, 'Usa el sistema de mantenimiento de la aerolínea. Incluye detalles del fallo y su frecuencia para facilitar el diagnóstico.', '2024-11-11', '09:41:47', 0, 0, 88, 8, '', NULL),
(69, 'Podría ser un fallo de actualización en el sistema de cabina, por lo que un reinicio completo podría solucionar el problema.', '2024-11-11', '09:42:15', 0, 0, 88, 17, '', NULL),
(70, 'Describe el problema en el formulario de reporte de fallos y consulta los boletines de mantenimiento que se han emitido para el A320.', '2024-11-11', '09:42:16', 0, 0, 88, 20, '', NULL),
(71, 'Las vibraciones pueden deberse a desequilibrio en las palas o desgaste en los cojinetes. Revisa ambos elementos.', '2024-11-11', '09:44:55', 0, 0, 89, 8, '', NULL),
(72, 'Verifica que todos los sensores estén bien calibrados; una medición incorrecta podría dar lecturas anormales de vibración.', '2024-11-11', '09:46:14', 0, 0, 89, 20, '', NULL),
(73, 'Este tipo de fallos puede ser indicativo de un problema en los sensores de altitud; consulta a mantenimiento.', '2024-11-11', '09:47:56', 0, 0, 90, 17, '', NULL),
(74, 'Revisa la configuración de las rutas predefinidas en el sistema de navegación, ya que un error en la carga de datos podría desconectar el piloto automático.', '2024-11-11', '09:48:33', 0, 0, 90, 20, '', NULL),
(75, 'El límite es aproximadamente 5000 kg. Consulta el manual para confirmar según las condiciones del vuelo.', '2024-11-11', '09:49:41', 0, 0, 91, 8, '', NULL),
(76, 'Revisa conexiones, integridad de cables y reemplaza bombillas desgastadas.', '2024-11-11', '09:51:38', 0, 0, 92, 16, '', NULL),
(77, 'Inspecciona las juntas de goma y las conexiones metálicas para evitar que la humedad o el polvo interfieran con el contacto eléctrico.', '2024-11-11', '09:53:11', 0, 0, 92, 20, './uploads/Imagen de WhatsApp 2024-11-11 a las 09.52.26_565dc973.jpg', NULL),
(78, 'Realiza una inspección adicional del sistema de refrigeración para evitar recalentamientos en el Trent 700.', '2024-11-11', '09:56:34', 0, 0, 93, 17, '', NULL),
(79, 'Realiza una limpieza de los filtros de aire regularmente en condiciones extremas para evitar acumulación de polvo o residuos.', '2024-11-11', '09:56:57', 0, 0, 93, 8, '', NULL),
(80, 'Asegúrate de que los tanques de oxígeno estén a la presión indicada y que no haya fugas en las conexiones.', '2024-11-11', '10:00:51', 0, 0, 94, 15, '', NULL),
(81, 'Verifica presión, máscaras y tubos, y asegúrate de que el sistema de liberación funcione.', '2024-11-11', '10:01:29', 0, 0, 94, 20, '', NULL),
(82, 'La configuración de alta densidad requiere aprobación de seguridad adicional; asegúrate de cumplir con la normativa.', '2024-11-11', '10:02:30', 0, 0, 95, 8, '', NULL),
(83, 'Consulta los requisitos de salidas de emergencia adicionales, ya que el aumento de asientos puede requerir modificaciones en la disposición de las puertas.', '2024-11-11', '10:03:00', 0, 0, 95, 16, '', NULL),
(84, 'Informa al equipo de mantenimiento para una revisión de válvulas y sensores de presión, ya que podrían requerir ajuste.', '2024-11-11', '10:05:16', 0, 0, 96, 17, '', NULL),
(85, 'Asegúrate de revisar las válvulas de descarga y el sistema de ventilación de la cabina, ya que un bloqueo podría causar un mal funcionamiento.', '2024-11-11', '10:05:32', 0, 0, 96, 15, '', NULL),
(86, 'Ajusta la altitud si es necesario y reporta para revisión de válvulas y sensores.', '2024-11-11', '10:06:43', 0, 0, 96, 16, '', NULL),
(87, 'Ajusta la altitud si es necesario y reporta para revisión de válvulas y sensores.', '2024-11-11', '10:06:43', 0, 0, 96, 16, '', NULL),
(88, 'El A350 es más eficiente en combustible y puede llevar más pasajeros en ciertas configuraciones ya que considera los costos y demanda.', '2024-11-11', '10:08:05', 0, 0, 97, 8, '', NULL),
(89, 'El A330 sigue siendo confiable y tiene menor costo de mantenimiento, pero el A350 podría ofrecer un mayor ahorro a largo plazo.', '2024-11-11', '10:08:32', 0, 0, 97, 20, '', NULL),
(91, 'Mantén niveles adecuados de aceite, limpia las partes externas regularmente y evita el uso innecesario de empuje máximo.', '2024-11-11', '10:11:01', 0, 0, 98, 16, '', NULL),
(92, 'Realiza ajustes regulares en la alineación de las palas y el eje, ya que un desequilibrio puede acelerar el desgaste.', '2024-11-11', '10:13:00', 0, 0, 98, 20, '', NULL),
(93, 'Revisa los sistemas de oxígeno y presurización. También monitorea el consumo de combustible y actualiza a la última versión del boletín de seguridad.', '2024-11-11', '10:14:40', 0, 0, 99, 16, '', NULL),
(94, 'Verifica también la configuración de los sistemas de iluminación de emergencia, ya que un vuelo largo podría requerir ajustes en el consumo de energía para estos sistemas.', '2024-11-11', '10:14:54', 0, 0, 99, 8, '', NULL),
(95, 'Redistribuir el peso o reducir carga puede resolver el problema sin retrasar el vuelo.', '2024-11-11', '10:17:44', 0, 0, 100, 17, '', NULL),
(96, 'Asegúrate de documentar el evento en el registro de vuelo, ya que el exceso de peso debe ser reportado para análisis futuros de rendimiento.', '2024-11-11', '10:18:06', 0, 0, 100, 15, '', NULL),
(97, 'Redistribuye o reduce la carga; baja combustible si es necesario y ajusta el plan de vuelo.', '2024-11-11', '10:18:32', 0, 0, 100, 16, '', NULL),
(98, 'Consulta el manual de carga para ver las restricciones específicas y evitar sobrepeso en vuelos largos.', '2024-11-11', '10:20:46', 0, 0, 101, 8, '', NULL),
(99, 'Asegúrate de verificar el índice de carga máxima autorizada (MLI) para la bodega del A330, ya que puede variar según el tipo de carga.', '2024-11-11', '10:21:40', 0, 0, 101, 20, '', NULL),
(100, 'Alrededor de 4,500 pies cúbicos. Asegúrate de distribuir la carga adecuadamente.', '2024-11-11', '10:21:57', 0, 0, 101, 17, '', NULL),
(101, 'Comprueba los niveles de combustible y los sistemas de inyección, ya que un flujo bajo de combustible podría causar esta pérdida.', '2024-11-11', '10:30:47', 0, 0, 102, 17, '', NULL),
(102, 'Abortar el despegue es seguro si se detecta a tiempo luego notifica a control y planifica una revisión exhaustiva del motor.', '2024-11-11', '10:33:00', 0, 0, 102, 8, '', NULL),
(103, 'Un desgaste rápido puede indicar problemas en los sistemas hidráulicos, por lo que es necesario hacer una revisión completa.', '2024-11-11', '10:37:38', 0, 0, 103, 8, '', NULL),
(104, 'Asegúrate de revisar los amortiguadores del tren de aterrizaje, ya que un mal funcionamiento puede sobrecargar los frenos.', '2024-11-11', '10:37:54', 0, 1, 103, 16, '', NULL),
(105, 'Reporta y programa una inspección de frenos y sistema hidráulico.', '2024-11-11', '10:38:15', 0, 0, 103, 17, '', NULL),
(106, 'Prueba reiniciando el sistema de entretenimiento para restablecer las conexiones; si falla, verifica los puntos de acceso.', '2024-11-11', '10:39:27', 0, 0, 104, 8, '', NULL),
(107, 'Verifica el ancho de banda asignado para cada dispositivo y realiza una actualización del firmware de los routers a bordo.', '2024-11-11', '10:39:43', 0, 0, 104, 15, '', NULL),
(108, 'Si el problema persiste, intenta realizar una actualización del software del sistema.', '2024-11-11', '10:41:01', 0, 0, 104, 20, '', NULL),
(109, 'Utiliza el sistema redundante para continuar el vuelo y reporta para una revisión de posibles fugas.', '2024-11-11', '10:42:43', 1, 0, 105, 15, '', NULL),
(110, 'Asegúrate de que los tubos y conexiones de alta presión no tengan microfisuras, ya que estas pueden ser difíciles de detectar a simple vista', '2024-11-11', '10:42:56', 0, 0, 105, 17, '', NULL),
(111, 'Inspecciona los sensores de control, ya que pueden verse afectados tras un aterrizaje complicado.', '2024-11-11', '10:45:02', 0, 0, 106, 8, '', NULL),
(112, 'Inspecciona los actuadores de las superficies móviles del ala, ya que el viento fuerte puede desgastar estos mecanismos.', '2024-11-11', '10:45:21', 0, 0, 106, 17, '', NULL),
(113, 'Asegúrate de que el sistema de refrigeración esté libre de obstrucciones y revisa los filtros de aire regularmente. Aquí tienes una imagen de los componentes clave para inspección.', '2024-11-11', '12:45:32', 0, 1, 107, 8, './uploads/f.jpg', NULL),
(114, 'Verifica los sensores de temperatura y presión del sistema; un sensor defectuoso puede hacer que el sistema trabaje en exceso.', '2024-11-11', '12:47:15', 1, 0, 107, 20, './uploads/guia de revision .pdf', NULL),
(115, 'Inspecciona las válvulas de regulación de aire, que pueden desgastarse y afectar el rendimiento en vuelos largos', '2024-11-11', '12:48:17', 1, 0, 107, 17, '', NULL),
(116, 'Revisa la carga de agua potable y ajusta la cantidad según las necesidades de cada ruta. ', '2024-11-11', '12:52:24', 1, 1, 108, 15, './uploads/zz.jpg', NULL),
(117, 'Consulta el índice de carga máxima autorizada (MLI) para la bodega del B787, ya que puede variar según el tipo de carga. ', '2024-11-11', '12:52:58', 0, 1, 108, 20, './uploads/capacidad de Bodega.pdf', NULL),
(118, 'Es posible que un sensor de velocidad de la rueda haya fallado; si el sistema no detecta la velocidad adecuada, no activará los frenos automáticos. ', '2024-11-11', '12:57:36', 0, 1, 110, 20, './uploads/4.jpg', NULL),
(119, 'Verifica también el sistema hidráulico, ya que una presión baja puede desactivar automáticamente los frenos. ', '2024-11-11', '12:58:17', 0, 0, 110, 8, '', NULL),
(120, 'La mezcla de combustible se adapta automáticamente a la altitud, pero en el PW1000G a veces es útil reducir ligeramente el régimen de empuje en fases de crucero. ', '2024-11-11', '12:59:54', 0, 2, 111, 20, './uploads/za.png', NULL),
(121, 'Revisa la calibración del sistema FADEC, que gestiona la relación aire-combustible; una actualización de software podría ayudar. ', '2024-11-11', '13:01:31', 0, 0, 111, 17, '', NULL),
(122, 'Sí, el A321neo tiene un fuselaje más largo, lo que afecta la maniobrabilidad, especialmente en despegues y aterrizajes. Considera un ángulo de ascenso más suave. ', '2024-11-11', '13:02:57', 2, 1, 112, 17, './uploads/zzzz.jpg', NULL),
(123, 'El A321neo también cuenta con motores más potentes; revisa el régimen de potencia en fases críticas del vuelo para reducir el consumo. ', '2024-11-11', '13:04:25', 1, 1, 112, 8, './uploads/Hoja de datos.xls', NULL),
(127, 'hola', '2024-11-12', '10:01:50', 0, 0, 112, 20, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `email_contacto` varchar(255) DEFAULT NULL,
  `puntaje` int(11) DEFAULT 0,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contrasenna`, `nombre`, `apellidos`, `puesto`, `email_contacto`, `puntaje`, `foto_perfil`) VALUES
(8, 'zahir@zahir.es', '$2y$10$WGt.zAcffX2KyGoFhQmZ7e60h4GjfOVSj1dquGU.zTSP0D2Tc6Jvy', 'Zahir', 'Allonso', 'Supervisor de Operaciones', 'zahir@zahir.es', 0, './uploads/hombre-peruano-en-vestido-tradicional-42268732.webp'),
(15, 'testing@test.es', '$2y$10$NkXQTgovJQ299t9m5cjcEu6/2mYHrYgw.ONqqhVqu3nKUKcU1sQ66', 'Ibai', 'Saenz de Buruaga', 'Mecanico', 'testing@test.es', 0, './uploads/lamine-yamal-joven-futbolista-records-que-escucha-karol_98.png'),
(16, 'paula@test.es', '$2y$10$R2NYE/sECMPFycYRIgVzCOlqbgKQVSoOxr2LbLyQmYtI5V7CyzIwK', 'Paula', 'Test', 'Técnica Eléctrico', 'paula@test.es', 0, './uploads/La_Promesa_de_Naruto.png'),
(17, 'oskar@oskar.es', '$2y$10$xt7y7rPJJyid3PvbYa6d1Obfbt4kt4Nl4a2cagFlpmdB0YqnPxqLu', 'Oskar', 'Perez', 'Ingenio Tecnico', 'oskar@oskar.es', 0, './uploads/_5a40808f-1e90-42cd-9d59-77d500afa5bd.jpeg'),
(20, 'adrian@admin.es', '$2y$10$1PUOau/58cCNbTl5/.r3fOvqurO4Ukpbf0f3B5ULcoxGIluLP7I5i', 'Adrian', 'Lopez', 'Admin', 'adrian@contacto.es', 0, './uploads/Gbu1Zq3W4Aw3qd5.jpeg'),
(21, 'usuario@test.es', '$2y$10$vkUAilseljiWlnXu7q4PBeF1/5BbFyhwaEvPzMRz.EfrD2hByHOdq', 'Usuario', 'Test', 'Piloto', 'usuarioTest@contacto.es', 0, './uploads/board-361516_640.jpg'),
(22, 'admin@test.es', '$2y$10$M29fukIH/3qcEMeRIxJ3GOOWwfFggW.YooE2Tvb5S8hJXUpHssHzy', 'Admin', 'Test', 'Admin', 'adminTest@contacto.es', 0, './uploads/global-admin-icon-color-outline-vector.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_fk` (`user`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `pregunta_id` (`pregunta_id`),
  ADD KEY `respuesta_id` (`respuesta_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `pregunta_id` (`pregunta_id`),
  ADD KEY `respuesta_id` (`respuesta_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `archivo_id` (`archivo`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta_id` (`pregunta_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `archivo_id` (`archivo`),
  ADD KEY `respuesta_padre_id` (`respuesta_padre_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`user`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_3` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_4` FOREIGN KEY (`respuesta_padre_id`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
