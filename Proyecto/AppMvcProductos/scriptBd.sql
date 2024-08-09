DROP DATABASE IF EXISTS `pruebaTienda`;
CREATE DATABASE IF NOT EXISTS `pruebaTienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pruebaTienda`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
);

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL
);

CREATE TABLE `productos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idMarca` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `vrUnitarioVenta` float NOT NULL,
  `vrUnitarioCompra` float NOT NULL,
  `urlimagen` varchar(500) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
);

ALTER TABLE `productos`
  ADD KEY `fk_productos_marcas1_idx` (`idMarca`),
  ADD KEY `fk_productos_categorias1_idx` (`idCategoria`);

ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_marcas1` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;