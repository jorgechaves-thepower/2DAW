SET NAMES utf8mb4;
-- Si ya existía la base de datos, la borramos para empezar limpios
DROP DATABASE IF EXISTS biblioteca;
-- Creamos la base de datos con codificación que admite tildes, ñ y emojis
CREATE DATABASE biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- A partir de aquí, todo se hace dentro de "biblioteca"
USE biblioteca;
-- Tabla de libros
CREATE TABLE libros (
id INT AUTO_INCREMENT PRIMARY KEY, -- número único, MySQL lo pone solo
titulo VARCHAR(150) NOT NULL, -- texto de hasta 150 caracteres, obligatorio
autor VARCHAR(100) NOT NULL,
anio INT NOT NULL, -- año de publicación
genero VARCHAR(30) NOT NULL,
leido TINYINT(1) NOT NULL DEFAULT 0 -- 0 = no leído, 1 = leído
);
-- Libros de ejemplo para no empezar con la tabla vacía
INSERT INTO libros (titulo, autor, anio, genero, leido) VALUES
('Don Quijote de la Mancha', 'Miguel de Cervantes', 1605, 'Clásico', 0),
('Cien años de soledad', 'Gabriel García Márquez', 1967, 'Novela', 1),
('La sombra del viento', 'Carlos Ruiz Zafón', 2001, 'Novela', 1),
('1984', 'George Orwell', 1949, 'Ciencia ficción', 0),
('El nombre del viento', 'Patrick Rothfuss', 2007, 'Fantasía', 1),
('El principito', 'Antoine de Saint-Exupéry', 1943, 'Infantil', 1),
('Clean Code', 'Robert C. Martin', 2008, 'Informática', 0);