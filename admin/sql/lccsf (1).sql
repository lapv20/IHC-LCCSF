-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2014 a las 22:46:39
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lccsf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `idactividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(80) NOT NULL,
  PRIMARY KEY (`idactividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_paciente`
--

CREATE TABLE IF NOT EXISTS `convenio_paciente` (
  `idconvenio` int(11) NOT NULL AUTO_INCREMENT,
  `idpaciente` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  PRIMARY KEY (`idconvenio`),
  KEY `idpaciente` (`idpaciente`,`idempresa`),
  KEY `idempresa` (`idempresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(80) NOT NULL,
  `tipo_convenio` varchar(30) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `rif` varchar(60) NOT NULL,
  `direccion` varchar(400) NOT NULL,
  PRIMARY KEY (`idempresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombre_empresa`, `tipo_convenio`, `telefono`, `rif`, `direccion`) VALUES
(1, 'PDVSA', 'empresa convenio', '0000000000000', 'jjajajaja', 'el palito'),
(2, 'UC', 'empresa convenio', '98989890', 'jaajaja', 'naguanagua'),
(3, 'rueda caucho', 'empresa convenio', '0000000000', 'dasdsadsad', 'la belisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `idhistorial` int(11) NOT NULL AUTO_INCREMENT,
  `idactividad` int(11) NOT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idhistorial`),
  UNIQUE KEY `idactividad` (`idactividad`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
  `idsucursal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_laboratorio` varchar(80) NOT NULL,
  `rif` varchar(60) NOT NULL,
  `direccion` varchar(400) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenservicio`
--

CREATE TABLE IF NOT EXISTS `ordenservicio` (
  `idordenservicio` int(11) NOT NULL AUTO_INCREMENT,
  `numero_orden` varchar(60) NOT NULL,
  `hora_estimada` time NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `cedula_paciente` varchar(30) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL,
  PRIMARY KEY (`idordenservicio`),
  KEY `idempresa` (`idempresa`,`idsucursal`,`idperfil`,`cedula_paciente`),
  KEY `cedula_paciente` (`cedula_paciente`),
  KEY `idempresa_2` (`idempresa`),
  KEY `idsucursal` (`idsucursal`),
  KEY `idperfil` (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `idpaciente` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(30) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` char(1) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  PRIMARY KEY (`idpaciente`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `cedula`, `nombres`, `apellidos`, `fecha_nac`, `genero`, `telefono`) VALUES
(2, 'V22224952', 'Karilin  Rousel', 'Fuentes Bordones', '1992-10-14', 'F', '02418910073 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipo_usuario` varchar(40) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipousuario`, `nombretipo_usuario`) VALUES
(1, 'administrador'),
(2, 'secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre_usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  PRIMARY KEY (`nombre_usuario`),
  UNIQUE KEY `idempresa` (`idempresa`),
  KEY `tipo_usuario` (`tipo_usuario`),
  KEY `tipo_usuario_2` (`tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `clave`, `nombres`, `apellidos`, `idempresa`, `tipo_usuario`, `correo`, `telefono`) VALUES
('s1', '1234', 'Allinson Alberto', 'Mota', 1, 1, 'allinsonmota@gmail.com', '0000000000000'),
('s2', '14511', 'mario jose', 'villegas', 2, 2, 'allinsonmota@gmail.com', '98989890');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `convenio_paciente`
--
ALTER TABLE `convenio_paciente`
  ADD CONSTRAINT `convenio_paciente_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `convenio_paciente_ibfk_2` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`idactividad`) REFERENCES `actividades` (`idactividad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenservicio`
--
ALTER TABLE `ordenservicio`
  ADD CONSTRAINT `ordenservicio_ibfk_1` FOREIGN KEY (`cedula_paciente`) REFERENCES `paciente` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_2` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_3` FOREIGN KEY (`idsucursal`) REFERENCES `laboratorios` (`idsucursal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenservicio_ibfk_4` FOREIGN KEY (`idperfil`) REFERENCES `perfiles` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`idtipousuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
