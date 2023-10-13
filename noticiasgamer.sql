-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 23:00:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticiasgamer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `noticia_id` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`noticia_id`, `comentario`, `fecha`) VALUES
(1, 'Hola', '2023-09-29 05:56:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `destacada` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `imagen`, `descripcion`, `destacada`) VALUES
(1, 'VALORAN NO ACEPTA A JUGADORA', 'https://cl.buscafs.com/www.levelup.com/public/uploads/images/815055/815055.jpg', 'La jugadora profesional de VALORANT Melanie “meL” Capone ha sido rechazada de las pruebas de equipo para el VCT por jugadores masculinos que no querían “jugar con una mujer”. La jugadora ha querido también hablar sobre lo ocurrido.', b'1'),
(3, 'Oferta en el mando de Xbox oficial Carbon Black con un 25% de descuento', 'https://glaubenskins.com/wp-content/uploads/2018/11/FIBRA-DE-CARBONO-CONTROL-XBOX.-300x300.jpg', 'Consigue esta oferta en el mando de Xbox oficial de color negro y asegurate un mando de calidad y fiabilidad de la mano de Microsoft. Porque pocas cosas hay más fiables que un recambio original del propio fabricante, al menos en la mayor parte de las ocasiones. Por ello, no hemos querido dejar pasar esta oferta del mando de Xbox oficial Carbon Black para que renueves tu viejo mando o amplíes tu colección.', b'1'),
(4, 'Capcom no está interesada en formar parte de Xbox o de ninguna otra empresa: “rechazaría elegantemente\" cualquier oferta', 'https://i.blogs.es/b048d7/capcom/1200_800.jpeg', 'Dadas las múltiples fusiones entre empresas, incluyendo una de las más significativas en la historia de los videojuegos, la posible adquisición de Activision Blizzard por Microsoft, ha habido especulaciones sobre posibles compras de estudios. En respuesta a esto, Capcom ha declarado que no está en venta y que \"prefiere un crecimiento orgánico\".\n\nEsta información proviene de una entrevista realizada por Bloomberg, en la que se le preguntó al director de operaciones de la compañía creadora de \'Resident Evil\', Haruhito Tsujimoto, cuál sería su posición en el escenario en el que otra compañía quisiera comprar Capcom.Como resultado de esto y en vista de los documentos filtrados de Microsoft que mencionan planes de adquisición de otros estudios como SEGA y Square Enix, se le preguntó a Capcom qué ocurriría si una empresa como la mencionada creadora de Xbox se acercara para ofrecer una compra. A esto, Tsujimoto respondió que \"rechazaría amablemente la oferta, ya que cree que sería mejor si fuéramos socios en igualdad de condiciones\".\n\nUna situación similar ocurrió con SEGA cuando la compañía creadora de Windows tenía planes de adquirirla, o al menos eso intentaba el jefe de Xbox, Phil Spencer, según correos electrónicos que salieron a la luz durante el juicio entre la FTC y Microsoft. En respuesta a esto, en declaraciones a Bloomberg, la compañía creadora de \'Sonic\' comentó que \"no están dispuestos a entablar conversaciones de adquisición\".\n\nNo obstante, el estudio japonés destaca que mantienen \"una estrecha relación\" con la creadora de Xbox, y títulos como \'Halo Wars 2\' y \'Age of Empires 4\' han sido el resultado de la colaboración entre SEGA y el estudio Creative Assembly. Trabajando en estrecha colaboración con Microsoft, lograron desarrollar estas entregas que fueron muy bien recibidas por la comunidad.Aunque estas adquisiciones no se concretarán, existe la posibilidad de que la de Activision Blizzard termine siendo parte de Microsoft, ya que en las noticias más recientes relacionadas con esta fusión, la compañía creadora de Windows obtuvo una aprobación provisional por parte de los reguladores del Reino Unido.', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
