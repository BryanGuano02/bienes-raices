/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `propiedades`;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedorId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedorId`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(26, ' actualizado con mvc', '12.00', 'f42cc3f5cd8d56e9655f6eaf05d73ee5.jpg', '[[https://myflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]MyFlixer]]', 1, 2, 3, '2025-03-22', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(27, ' hOLA', '123.00', '08c240a96dea91ce5922e6968d249855.jpg', '[[https://myflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]MyFlixer]]', 1, 2, 3, '2025-03-22', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(28, ' asdf', '21.00', 'c7b42f432ecf5559a82a6cb4917598a1.jpg', 'sdfa[[https://myflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]MyFlixer]]', 1, 2, 3, '2025-03-23', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(29, 'PRopiedad buena', '12.00', 'c5c27c1c6c1fde7e429db39f57503b24.jpg', '[[https://myflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]MyFlixer]]', 1, 2, 3, '2025-03-23', 2);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(31, ' hola con error', '1.00', '41c3abb8fbc89df57997d0ebbd751acf.jpg', '[[https://myflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]yflixerz.to/watch-tv/modern-family-39507.4858297][Modern Family Season 1 Episode 20: Benched Full HD online MyFlixer]]MyFlixer]]', 1, 2, 3, '2025-03-23', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(32, ' Reutilizable actu', '12.00', 'dec5d8c92938078edfa97d05fa0f2093.jpg', '1.Software testing is an art. Most of the testing methods and practices are not very different from 20 years ago. It is nowhere near maturity, although there are many tools and techniques available to use. Good testing also requires a tester’s creativity, experience, and intuition, together with proper techniques.\r\n\r\n2.Testing is more than just debugging. It is not only used to locate errors and correct them. It is also used in validation, verification process, and reliability measurement.\r\n\r\n3.Testing is expensive. Automation is a good way to cut down cost and time. Testing efficiency and effectiveness is the criteria for coverage based testing \r\n\r\n5.Testing may not be the most effective method to improve software quality.', 1, 2, 3, '2025-03-24', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(35, ' Nuevo desde propiedad', '12.00', '1a017fc96e7a50f1837606fa479540ae.jpg', 'local cursors = require(\"vscode-multi-cursor\")\r\n      \r\n      local function keymap(modes, key, action)\r\n        vim.keymap.set(modes, key, action, { silent = true })\r\n      end\r\n\r\n      keymap({\'n\', \'x\'}, \'<c-d>\', cursors.addSelectionToNextFindMatch)\r\n      keymap({\'n\', \'x\'}, \'<cs-d>\', cursors.addSelectionToPreviousFindMatch)\r\n      keymap({\'n\', \'x\'}, \'<cs-l>\', cursors.selectHighlights)', 1, 2, 3, '2025-03-29', 1);
INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedorId`) VALUES
(36, ' Nuevo desde propiedad', '12.00', '1a017fc96e7a50f1837606fa479540ae.jpg', 'local cursors = require(\\vscode-multi-cursor\\\")use App\\Propiedad;\r\nuse App\\Propiedad;\r\nuse App\\Propiedad;\r\nuse App\\Propiedad;\r\nuse App\\Propiedad;\r\n', 1, 2, 3, '2025-03-29', 2);
INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(3, 'test@test.com', '$2y$10$4ir1./gDh/6zrKPbFgzps.ratgGGJRRUnPYCo1vp9wmME.V1ChIiO');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Bryan', 'Lupera', '0123456789');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Karen', 'Perez', '1234567890');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(3, 'Pepe', 'Perez', '1234567890');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(4, 'Luis', 'Perez', '1234567890');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(5, 'Luisa', 'Perez', '1234567890');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(6, 'Lola', 'Perez', '1234567890');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(7, ' Antonio', 'Cáseres', '1234567890');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;