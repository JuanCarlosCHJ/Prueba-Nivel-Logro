CREATE DATABASE IF NOT EXISTS db_municipio;
USE db_municipio;

CREATE TABLE IF NOT EXISTS denuncias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    ubicacion VARCHAR(255) NOT NULL,
    ciudadano VARCHAR(100) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    fecha DATE NOT NULL,
    estado ENUM('Pendiente', 'En proceso', 'Resuelto') DEFAULT 'Pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

