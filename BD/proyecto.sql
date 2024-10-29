-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 12:21:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `ruta_archivo` varchar(255) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `pregunta_id` int(11) DEFAULT NULL,
  `respuesta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `pregunta_id` int(11) DEFAULT NULL,
  `respuesta_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `visto` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `archivo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `titulo`, `descripcion`, `fecha_publicacion`, `hora_publicacion`, `likes`, `favoritos`, `usuario_id`, `categoria_id`, `archivo_id`) VALUES
(1, 'gergr', 'ergger', '0000-00-00', '00:00:00', 0, 0, NULL, NULL, NULL),
(3, 'gergr', 'ergger', '0000-00-00', '00:00:00', 0, 0, NULL, NULL, NULL),
(4, 'gergr', 'ergger', '0000-00-00', '00:00:00', 0, 0, NULL, NULL, NULL),
(5, 'gergr', 'ergger', '0000-00-00', '00:00:00', 0, 0, NULL, NULL, NULL),
(6, 'gergr', 'ergger', '0000-00-00', '00:00:00', 0, 0, NULL, NULL, NULL),
(7, 'gergr', 'ergger', '0000-00-00', '00:00:00', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntosactividad`
--

CREATE TABLE `puntosactividad` (
  `id` int(11) NOT NULL,
  `actividad` varchar(50) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `archivo_id` int(11) DEFAULT NULL,
  `respuesta_padre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'adrian@adrian.es', 'adrian1234', 'adrian', 'lopez', 'head developer', NULL, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `archivo_id` (`archivo_id`);

--
-- Indices de la tabla `puntosactividad`
--
ALTER TABLE `puntosactividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta_id` (`pregunta_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `archivo_id` (`archivo_id`),
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
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `puntosactividad`
--
ALTER TABLE `puntosactividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `favoritos_ibfk_3` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `preguntas_ibfk_3` FOREIGN KEY (`archivo_id`) REFERENCES `archivos` (`id`);

--
-- Filtros para la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `puntuaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`archivo_id`) REFERENCES `archivos` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_4` FOREIGN KEY (`respuesta_padre_id`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
