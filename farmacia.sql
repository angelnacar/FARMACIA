-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2017 a las 13:22:45
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CONSULTA_PRODUCTOS` (IN `nom` VARCHAR(200), IN `apel` VARCHAR(200), IN `produ` VARCHAR(200), IN `cnaci` VARCHAR(7), IN `fechaHoraIni` DATETIME, IN `fechaHoraFin` DATETIME)  BEGIN
	
    declare x varchar(20);
    declare y varchar(20);
    declare z varchar(20);
    
    set x = CONCAT("%",nom,"%"); /*PARA PODER UTILIZAR LIKE EN PROCEDIMIENTOS*/
    set y = CONCAT("%",apel,"%");
    set z = CONCAT("%",produ,"%");
    
		if nom != '' then select* from encargos where nombre like x;
        elseif apel != '' then select*from encargos where apellidos like y;
        elseif produ != '' then select*from encargos where producto like z;
        elseif cnaci != '' then select*from encargos where cn = cnaci;
        elseif  fechaHoraIni != '' and fechaHoraFin != '' then select*from encargos where fechaHora >= fechaHoraIni and fechaHora <= fechaHoraFin;
        
        END if;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRO_ENCARGO` (IN `empleado` VARCHAR(50), IN `nombre` VARCHAR(200), IN `apellidos` VARCHAR(200), IN `telef` VARCHAR(10), IN `producto` VARCHAR(200), IN `cn` VARCHAR(7), IN `unidades` INT, IN `proveedor` VARCHAR(15), `fechaHora` DATETIME, `observaciones` VARCHAR(1000))  BEGIN

	insert into encargos values(null,empleado,nombre,apellidos,telef,producto,cn,unidades,proveedor,null,null,fechaHora,observaciones);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargos`
--

CREATE TABLE `encargos` (
  `id` int(11) NOT NULL,
  `empleado` varchar(50) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `telef` varchar(10) DEFAULT NULL,
  `producto` varchar(200) DEFAULT NULL,
  `cn` varchar(7) DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `proveedor` varchar(15) DEFAULT NULL,
  `servicio` tinyint(1) DEFAULT NULL,
  `confirmado` varchar(2) DEFAULT 'NO',
  `fechaHora` datetime DEFAULT NULL,
  `observaciones` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encargos`
--

INSERT INTO `encargos` (`id`, `empleado`, `nombre`, `apellidos`, `telef`, `producto`, `cn`, `unidades`, `proveedor`, `servicio`, `confirmado`, `fechaHora`, `observaciones`) VALUES
(1, 'pepe', 'luis', 'garcia', '650258745', 'frenadol', '650258', 1, 'HEFAME', 2, 'NO', '2017-06-15 11:51:00', 'guchi piruli'),
(2, 'angel', 'pepe', 'mola', '699889999', 'aspirinas', '689568', 2, 'ALLIANCE', NULL, NULL, '2017-06-15 12:18:00', 'guachi megaluli'),
(3, 'angel', 'pepe', 'mola', '699889999', 'aspirinas', '689568', 2, 'ALLIANCE', NULL, NULL, '2017-06-15 12:18:00', 'guachi megaluli');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encargos`
--
ALTER TABLE `encargos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encargos`
--
ALTER TABLE `encargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
