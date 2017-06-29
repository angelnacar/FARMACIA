-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2017 a las 14:36:39
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

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
    
		if nom != '' then select* from encargos where (nombre like x) and (servicio = 0);
        elseif apel != '' then select*from encargos where apellidos like y and (servicio = 0);
        elseif produ != '' then select*from encargos where producto like z and (servicio = 0); 
        elseif cnaci != '' then select*from encargos where cn = cnaci and (servicio = 0);
        elseif  fechaHoraIni != '' and fechaHoraFin != '' then select*from encargos where fechaHora >= fechaHoraIni and fechaHora <= fechaHoraFin and (servicio = 0);
        
        END if;
        
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CONSULTA_SERVICIOS` (IN `nom` VARCHAR(20), IN `apel` VARCHAR(40), IN `fecha` DATETIME, IN `ser` TINYINT)  BEGIN
		
        
        
			if nom != '' then select*from encargos where nombre = nom and servicio = ser;
            elseif apel != '' then select*from encargos where apellidos = apel and servicio = ser;
            elseif fecha != '' then select*from encargos where date(fechaHora) = fecha and servicio = ser;
            
            
            end if;
        
		
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRO_ENCARGO` (IN `empleado` VARCHAR(50), IN `nombre` VARCHAR(200), IN `apellidos` VARCHAR(200), IN `telef` VARCHAR(10), IN `producto` VARCHAR(200), IN `cn` VARCHAR(7), IN `unidades` INT, IN `proveedor` VARCHAR(15), `fechaHora` DATETIME, `observaciones` VARCHAR(1000))  BEGIN

	insert into encargos values(null,empleado,nombre,apellidos,telef,producto,cn,unidades,proveedor,0,null,fechaHora,observaciones);
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `REGISTRO_SERVICIO` (`nom` VARCHAR(200), `apel` VARCHAR(200), `tel` VARCHAR(10), `serv` TINYINT, `fecha` DATETIME) RETURNS TINYINT(1) BEGIN
	declare devuelve boolean;
    declare consulta int;
    
		set devuelve = true;
        set consulta = (select count(id) from encargos where servicio > -1 and fechaHora = fecha );
        
			if consulta = 0 then insert into encargos values(null,null,nom,apel,tel,null,null,null,null,serv,default,fecha,'');
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
(1, NULL, 'PEPE', 'GARCIA', '65896896', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-29 13:47:00', ''),
(2, NULL, 'ALBERTO', 'LOPEZ', '6585458', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-30 13:49:00', ''),
(3, 'ANGEL', 'PACO', 'FERNANDEZ GARCIA', '658985899', 'ASPIRINAS', '658569', 2, 'ALLIANCE', NULL, NULL, '2017-06-29 12:04:00', 'PRODUCTO PAGAGO'),
(4, 'ANGEL', 'ALONSO', 'GARCIA GARCIA', '65854587', 'ASPIRNAS', '652878', 4, 'ALLIANCE', 0, NULL, '2017-06-29 12:22:00', 'JDKASLJDASJDKLASJDLKA'),
(5, NULL, 'ISABEL', 'GARCIA FERNANDEZ', '6585458', NULL, NULL, NULL, NULL, 2, 'NO', '2017-07-01 14:24:00', ''),
(6, NULL, 'ESTETICA', 'ESTETICA', '6585458', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-30 14:26:00', ''),
(7, NULL, 'WQW', 'WQ', 'WQ', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-29 14:28:00', ''),
(8, NULL, 'WQW', 'WQ', 'WQ', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-25 14:28:00', ''),
(9, NULL, 'QWQ', 'WQW', 'QWQ', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-29 14:29:00', ''),
(10, NULL, 'PEPE', 'ESTETICA', '', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-29 15:03:00', ''),
(11, NULL, 'PEEP', 'NO SE QUE', '65856568', NULL, NULL, NULL, NULL, 1, 'NO', '2017-07-07 15:05:00', ''),
(12, NULL, 'wq', 'wq', 'q', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-29 15:06:00', ''),
(13, NULL, 'ESTETICA ', 'ESTETICA', 'ESTETICA', NULL, NULL, NULL, NULL, 1, 'NO', '2017-06-29 15:07:00', ''),
(14, 'ANGEL', 'LUCIA', 'LOPEZ MODIFICADO', '6589658', 'FRENADIL', '65289', 4, 'HEFAME', 0, NULL, '2017-06-29 13:15:00', 'PAGADO'),
(15, NULL, 'LUISA', 'GARCIA ESTETICA', '6585658', NULL, NULL, NULL, NULL, 2, 'NO', '2017-07-01 15:33:00', ''),
(16, NULL, 'WQ', 'WQ', '6585896', NULL, NULL, NULL, NULL, 1, 'NO', '2017-07-08 15:36:00', ''),
(17, 'ANGEL', 'cambiado', 'nuevamente cambiado', '', 'cambiado', '6585658', 1, 'HEFAME', 0, NULL, '2017-06-29 13:42:00', 'cambiado'),
(18, NULL, 'LUISA ESTETICA', 'GARCIA', '6585658', NULL, NULL, NULL, NULL, 2, 'NO', '2017-07-01 16:17:00', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
