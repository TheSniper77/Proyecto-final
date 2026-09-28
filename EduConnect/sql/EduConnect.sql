
CREATE TABLE rol (
    id_rol INT PRIMARY KEY AUTO_INCREMENT,
    nombre_rol VARCHAR(50) NOT NULL
);


CREATE TABLE calendario (
    id_calendario INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha DATE
);


CREATE TABLE usuario (
    ci VARCHAR(20) PRIMARY KEY,
    id_rol INT NOT NULL,
    id_calendario INT UNIQUE NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,

    FOREIGN KEY (id_rol) REFERENCES rol(id_rol),
    FOREIGN KEY (id_calendario) REFERENCES calendario(id_calendario)
);


CREATE TABLE evento (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    id_calendario INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fecha DATETIME NOT NULL,
    fecha_fin DATETIME,

    FOREIGN KEY (id_calendario) REFERENCES calendario(id_calendario)
);


CREATE TABLE apunte (
    id_apunte INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fecha_creacion DATETIME NOT NULL,
    fecha_actualizacion DATETIME,
    visibilidad VARCHAR(20),
    contenido TEXT,

    FOREIGN KEY (id_usuario) REFERENCES usuario(ci)
);


CREATE TABLE archivo (
    id_archivo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    fecha_apertura DATETIME,
    fecha_subida DATETIME,
    fecha_edicion DATETIME,
    tipo_archivo VARCHAR(50)
);

CREATE TABLE administra (
    ci VARCHAR(20),
    id_archivo INT,

    PRIMARY KEY (ci, id_archivo),

    FOREIGN KEY (ci) REFERENCES usuario(ci),
    FOREIGN KEY (id_archivo) REFERENCES archivo(id_archivo)
);