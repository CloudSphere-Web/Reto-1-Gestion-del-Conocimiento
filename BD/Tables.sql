CREATE TABLE `Usuarios` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `email` VARCHAR(255) UNIQUE NOT NULL,
  `contraseña` VARCHAR(255) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `puesto` VARCHAR(100),
  `email_contacto` VARCHAR(255),
  `puntaje` INT DEFAULT 0,
  `foto_perfil` VARCHAR(255)
);

CREATE TABLE `Categorias` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` TEXT
);

CREATE TABLE `Preguntas` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `fecha_publicacion` DATE NOT NULL,
  `hora_publicacion` TIME NOT NULL,
  `likes` INT DEFAULT 0,
  `favoritos` INT DEFAULT 0,
  `usuario_id` INT,
  `categoria_id` INT,
  `archivo_id` INT
);

CREATE TABLE `Respuestas` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `contenido` TEXT NOT NULL,
  `fecha_publicacion` DATE NOT NULL,
  `hora_publicacion` TIME NOT NULL,
  `likes` INT DEFAULT 0,
  `favoritos` INT DEFAULT 0,
  `pregunta_id` INT,
  `usuario_id` INT,
  `archivo_id` INT,
  `respuesta_padre_id` INT
);

CREATE TABLE `Archivos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `ruta_archivo` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(50)
);

CREATE TABLE `Favoritos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` INT,
  `pregunta_id` INT,
  `respuesta_id` INT
);

CREATE TABLE `Notificaciones` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` INT,
  `tipo` VARCHAR(50) NOT NULL,
  `mensaje` TEXT NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `visto` BOOLEAN DEFAULT false
);

CREATE TABLE `Likes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` INT,
  `pregunta_id` INT,
  `respuesta_id` INT,
  `fecha` DATE NOT NULL
);

CREATE TABLE `Puntuaciones` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` INT,
  `puntos` INT,
  `fecha` DATE
);

CREATE TABLE `PuntosActividad` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `actividad` VARCHAR(50),
  `puntos` INT
);

ALTER TABLE `Preguntas` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`);

ALTER TABLE `Preguntas` ADD FOREIGN KEY (`categoria_id`) REFERENCES `Categorias` (`id`);

ALTER TABLE `Preguntas` ADD FOREIGN KEY (`archivo_id`) REFERENCES `Archivos` (`id`);

ALTER TABLE `Respuestas` ADD FOREIGN KEY (`pregunta_id`) REFERENCES `Preguntas` (`id`);

ALTER TABLE `Respuestas` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`);

ALTER TABLE `Respuestas` ADD FOREIGN KEY (`archivo_id`) REFERENCES `Archivos` (`id`);

ALTER TABLE `Respuestas` ADD FOREIGN KEY (`respuesta_padre_id`) REFERENCES `Respuestas` (`id`) ON DELETE CASCADE;

ALTER TABLE `Favoritos` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`);

ALTER TABLE `Favoritos` ADD FOREIGN KEY (`pregunta_id`) REFERENCES `Preguntas` (`id`);

ALTER TABLE `Favoritos` ADD FOREIGN KEY (`respuesta_id`) REFERENCES `Respuestas` (`id`);

ALTER TABLE `Notificaciones` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`);

ALTER TABLE `Likes` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`);

ALTER TABLE `Likes` ADD FOREIGN KEY (`pregunta_id`) REFERENCES `Preguntas` (`id`);

ALTER TABLE `Likes` ADD FOREIGN KEY (`respuesta_id`) REFERENCES `Respuestas` (`id`);

ALTER TABLE `Puntuaciones` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`);
