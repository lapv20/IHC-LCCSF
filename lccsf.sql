-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-03-2015 a las 17:15:52
-- Versión del servidor: 5.6.22-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lccsf`
--
CREATE DATABASE IF NOT EXISTS `lccsf` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lccsf`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `idactividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(80) NOT NULL,
  PRIMARY KEY (`idactividad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idactividad`, `nombre_actividad`) VALUES
(1, 'Generar orden servicio'),
(2, 'Anular orden servicio'),
(4, 'Modificar orden servicio'),
(5, 'Agregar paciente'),
(6, 'Modificar paciente'),
(7, 'Eliminar Paciente'),
(8, 'Agregar empleado'),
(9, 'Modificar empleado'),
(10, 'Eliminar empleado'),
(11, 'Actualizar afiliados');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `convenio_paciente`
--

INSERT INTO `convenio_paciente` (`idconvenio`, `idpaciente`, `idempresa`) VALUES
(1, 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombre_empresa`, `tipo_convenio`, `telefono`, `rif`, `direccion`) VALUES
(1, 'Laboratorio', 'Ninguno', '02418571086', 'J123456', 'Clinica Guerra Mendez'),
(2, 'Empresas Polar', 'Convenio Empresarial', '02414567891', 'J234578', 'Zona Industrial'),
(3, 'Colegio de Abogados', 'Convenio Afiliados', '024156789162', 'J45522819', 'Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `idhistorial` int(11) NOT NULL AUTO_INCREMENT,
  `idactividad` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  PRIMARY KEY (`idhistorial`),
  KEY `idactividad` (`idactividad`),
  KEY `nombre_usuario` (`nombre_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idhistorial`, `idactividad`, `nombre_usuario`, `fecha`) VALUES
(15, 5, 'edy1192', '2014-11-12'),
(16, 6, 'edy1192', '2014-11-12'),
(18, 1, 'edy1192', '2014-11-12'),
(19, 1, 'edy1192', '2014-11-12'),
(20, 1, 'edy1192', '2014-11-12'),
(21, 1, 'edy1192', '2014-11-12'),
(22, 1, 'edy1192', '2014-11-12'),
(23, 7, 'edy1192', '2014-11-12'),
(24, 1, 'edy1192', '2014-11-12'),
(25, 1, 'edy1192', '2014-11-12'),
(26, 1, 'edy1192', '2014-11-12'),
(27, 5, 'edy1192', '2014-11-12'),
(28, 1, 'edy1192', '2014-11-12'),
(29, 1, 'edy1192', '2014-11-12'),
(30, 1, 'edy1192', '2014-11-12'),
(31, 2, 'edy1192', '2014-11-12'),
(32, 5, 'edy1192', '2014-11-13'),
(33, 1, 'edy1192', '2014-11-13'),
(34, 4, 'edy1192', '2014-11-13'),
(35, 7, 'edy1192', '2014-11-13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`idsucursal`, `nombre_laboratorio`, `rif`, `direccion`, `telefono`) VALUES
(1, 'Centro Medico-Dr. Rafael Guerra Mendez', 'J-12345', 'Calle Rondon c/c 5 de Julio', '(0241)857.39.01-856.12.00-856.12.16'),
(2, 'I.E.Q. Los Mangos', 'J-123456', 'Vía Guataparo, Planta Baja de la Torre de Consultorios. Local 3 (frente a los ascensores). Valencia - Venezuela.', '(0241)823.20.89'),
(3, 'Centro Comercial Siglo XXI', 'J324577', 'UAMI, La Viña, Valencia', '(0241) 617.8367 (0241) 821.4458 (0241) 824.6910'),
(4, 'C.C. Unicentro Las Marias', 'J78529359', 'Local 2, calle Arvelo, diagonal a la plaza Bolívar. Tocuyito', '(0241) 416.68.95'),
(5, 'C.C. Comercial Cristal', 'J263828', 'Av. Paseo Cabriales. Urb. Las Quintas ', '(0241) 200.07.63'),
(6, 'C.C. San Diego. (Fin de Siglo)', 'J62863', 'locales 1-16 / 1-17', '(0241) 872.74.33 - 872.74.99');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `ordenservicio`
--

INSERT INTO `ordenservicio` (`idordenservicio`, `numero_orden`, `hora_estimada`, `estatus`, `cedula_paciente`, `idempresa`, `idsucursal`, `idperfil`) VALUES
(4, '14-1', '07:59:52', 'Anulado', 'V21479441', 1, 2, 2),
(8, '14-1', '17:06:29', 'Anulado', 'V17707200', 1, 2, 1),
(10, '14-2', '18:18:19', 'Anulado', 'V17707200', 1, 6, 4),
(12, '14-3', '18:24:52', 'Anulada', 'V18166738', 1, 3, 3),
(13, '14-4', '18:25:34', 'Procesado', 'V22224952', 1, 6, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `cedula`, `nombres`, `apellidos`, `fecha_nac`, `genero`, `telefono`) VALUES
(2, 'V22224952', 'Karilin  Rousel', 'Fuentes', '1992-10-14', 'F', '02418910073 02418912661'),
(3, 'V21479441', 'Edilianny Del Valle', 'Sanchez Ibarra', '1992-11-11', 'F', '02418912761 04124524507'),
(4, 'V4031613', 'Edilia De Jesus', 'Sanchez Ibarra', '1954-02-12', 'F', '04163490436 02418912661'),
(7, 'V17707200', 'Jessica Del Valle', 'Fajardo ', '1987-01-29', 'F', '04165980502 '),
(8, 'V18166738', 'Katrina Rousali', 'Fuentes Bordones', '1987-10-03', 'F', '04125090033 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idperfil`, `nombre_perfil`) VALUES
(1, 'General'),
(2, 'Lipidico'),
(3, 'Pre-Operatorio'),
(4, 'Diabetico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipo_usuario` varchar(40) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipousuario`, `nombretipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Persona Contacto Empresa'),
(4, 'Persona Contacto Afiliados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(25) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `tipo_usuario` (`tipo_usuario`),
  KEY `idempresa` (`idempresa`),
  KEY `nombre_usuario` (`nombre_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre_usuario`, `clave`, `nombres`, `apellidos`, `idempresa`, `tipo_usuario`, `correo`, `telefono`) VALUES
(1, 'edy1192', '1234', 'edilianny ', 'sanchez', 1, 2, 'edy@gmail.com', '02418912661'),
(2, 'allin1', '1234', 'allinson', 'mota', 1, 1, 'allin@gmail.com', '04141234567'),
(3, 'lapv1992', 'lapv1992', 'Luis', 'Perez', 1, 3, 'lapv1992@gmail.com', '04144415939');

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
