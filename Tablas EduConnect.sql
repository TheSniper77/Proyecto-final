CREATE TABLE `usuario` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100),
  `email` varchar(100) UNIQUE NOT NULL,
  `usuario` varchar(50) UNIQUE NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_registro` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `ultimo_login` timestamp
);

CREATE TABLE `rol` (
  `id_rol` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `nombre` enum('admin','usuario') NOT NULL
);

CREATE TABLE `calendario` (
  `id_calendario` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `titulo` varchar(100),
  `descripcion` text,
  `fecha` date,
  `hora` time
);

CREATE TABLE `evento` (
  `id_evento` int PRIMARY KEY AUTO_INCREMENT,
  `id_calendario` int NOT NULL,
  `nombre` varchar(100),
  `fecha` date,
  `hora` time
);

CREATE TABLE `archivo` (
  `id_archivo` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `nombre_archivo` varchar(150),
  `ruta` varchar(255),
  `fecha_subida` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `apunte` (
  `id_apunte` int PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `titulo` varchar(150),
  `contenido` text,
  `fecha_creacion` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `fecha_modificacion` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

ALTER TABLE `calendario` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `rol` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `evento` ADD FOREIGN KEY (`id_calendario`) REFERENCES `calendario` (`id_calendario`);

ALTER TABLE `archivo` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `apunte` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
