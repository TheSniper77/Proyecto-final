Create database if not exists EduConnect;
use EduConnect;

create table if not exists usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table if not exists rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50) NOT NULL
);

create table if not exists calendario (
    id_calendario INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha DATE
);

create table if not exists evento (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_calendario INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha DATETIME NOT NULL,
    fecha_fin DATETIME,
    FOREIGN KEY (id_calendario) REFERENCES calendario(id_calendario)
);

create table if not exists administra(
    id_usuario VARCHAR(100) NOT NULL,
    id_archivo INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (id_archivo) REFERENCES archivo(id_archivo)
);

create table if not exists archivo (
    id_archivo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_archivo VARCHAR(255) NOT NULL,
    ruta_archivo VARCHAR(255) NOT NULL,
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

