-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 12:39:15
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

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `REGISTRO_SERVICIO` (`nom` VARCHAR(200), `apel` VARCHAR(200), `tel` VARCHAR(10), `serv` TINYINT, `fecha` DATETIME, `observa` VARCHAR(200)) RETURNS TINYINT(1) BEGIN
	declare devuelve boolean;
    declare consulta int;
    
		set devuelve = true;
        set consulta = (select count(id) from encargos where servicio > -1 and fechaHora = fecha );
        
			if consulta = 0 then insert into encargos values(null,null,nom,apel,tel,null,null,null,null,serv,default,fecha,observa);
            elseif consulta > 0  then set devuelve = false;
            end if;
RETURN devuelve;
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
(3, 'angel', 'pepe', 'mola', '699889999', 'aspirinas', '689568', 2, 'ALLIANCE', NULL, NULL, '2017-06-15 12:18:00', 'guachi megaluli'),
(4, NULL, 'prueba', 'prueba', '6548589', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-15 11:50:00', 'PROBANDO'),
(5, NULL, 'prueba', 'prueba', '6548589', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-15 11:55:00', 'PROBANDO'),
(6, NULL, 'prueba', 'prueba', '6548589', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-15 11:58:00', 'PROBANDO'),
(7, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '0000-00-00 00:00:00', '0'),
(8, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '0000-00-00 00:00:00', '0'),
(9, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '0000-00-00 00:00:00', '0'),
(10, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '0000-00-00 00:00:00', '0'),
(11, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '2017-06-15 12:30:00', 'PROBANDO'),
(12, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '2017-06-15 12:30:00', 'PROBANDO'),
(13, 'ANGEL', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'PRUEBA', 1, 'PRUEBA', NULL, NULL, '2017-06-15 12:30:00', 'PROBANDO'),
(14, 'ANGEL', 'dadas', 'asdasd', 'dasdas', 'dsada', 'das', 1, 'HEFAME', NULL, NULL, '2017-06-16 12:28:00', 'dasdasd'),
(15, 'ANGEL', 'PACO', 'GARCIA GARCIA', '652589', 'ASPIRINAS C', '569658', 2, 'ALLIANCE', NULL, NULL, '2017-06-16 12:34:00', 'ESTO ES UNA PRUEBA');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
