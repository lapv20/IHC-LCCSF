-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2015 a las 00:16:27
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

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
`idactividad` int(11) NOT NULL,
  `nombre_actividad` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
`idconvenio` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenio_paciente`
--

INSERT INTO `convenio_paciente` (`idconvenio`, `idpaciente`, `idempresa`) VALUES
(1, 2, 2),
(2, 9, 1),
(3, 10, 3),
(4, 11, 3),
(5, 12, 3),
(6, 13, 2),
(8, 15, 1),
(9, 16, 3),
(12, 19, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
`idempresa` int(11) NOT NULL,
  `nombre_empresa` varchar(80) NOT NULL,
  `tipo_convenio` varchar(30) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `rif` varchar(60) NOT NULL,
  `direccion` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombre_empresa`, `tipo_convenio`, `telefono`, `rif`, `direccion`) VALUES
(1, 'Laboratorio', 'Ninguno', '02418571086', 'J 12345 6', 'Clinica Guerra Mendez'),
(2, 'Empresas Polar', 'Convenio Empresarial', '02414567891', 'J 23457 8', 'Zona Industrial'),
(3, 'Colegio de Abogados', 'Convenio Afiliados', '024156789162', 'J 4552281 9', 'Valencia'),
(4, 'Academia Americana', 'Convenio Afiliados', '02411112233', 'E 20472048 8', 'Avenida Bolivar Norte, Torre Exterior Piso 5, Oficina 3'),
(5, 'Venezolana de Pinturas', 'Convenio Empresarial', '02418719561', 'J 1689075 2', 'Zona industrial, Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
`idhistorial` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

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
(35, 7, 'edy1192', '2014-11-13'),
(36, 1, 'edy1192', '2015-04-29'),
(37, 1, 'edy1192', '2015-04-29'),
(38, 1, 'edy1192', '2015-04-29'),
(39, 1, 'edy1192', '2015-04-29'),
(40, 6, 'edy1192', '2015-04-30'),
(41, 5, 'lapv1992', '2015-04-30'),
(42, 8, 'lapv1992', '2015-04-30'),
(43, 5, 'lapv1992', '2015-04-30'),
(44, 8, 'lapv1992', '2015-04-30'),
(45, 5, 'lapv1992', '2015-04-30'),
(46, 8, 'lapv1992', '2015-04-30'),
(47, 6, 'lapv1992', '2015-04-30'),
(48, 1, 'lapv1992', '2015-04-30'),
(49, 4, 'lapv1992', '2015-04-30'),
(50, 4, 'lapv1992', '2015-04-30'),
(51, 9, 'lapv1992', '2015-04-30'),
(52, 5, 'sapv1993', '2015-04-30'),
(53, 11, 'sapv1993', '2015-04-30'),
(54, 5, 'sapv1993', '2015-04-30'),
(55, 11, 'sapv1993', '2015-04-30'),
(56, 5, 'sapv1993', '2015-04-30'),
(57, 11, 'sapv1993', '2015-04-30'),
(58, 5, 'lapv1992', '2015-04-30'),
(59, 8, 'lapv1992', '2015-04-30'),
(60, 1, 'lapv1992', '2015-04-30'),
(61, 5, 'edy1192', '2015-04-30'),
(62, 8, 'edy1192', '2015-04-30'),
(63, 5, 'edy1192', '2015-04-30'),
(64, 8, 'edy1192', '2015-04-30'),
(65, 11, 'sapv1993', '2015-05-01'),
(66, 11, 'sapv1993', '2015-05-01'),
(67, 11, 'sapv1993', '2015-05-01'),
(68, 11, 'sapv1993', '2015-05-01'),
(69, 11, 'sapv1993', '2015-05-01'),
(70, 11, 'sapv1993', '2015-05-01'),
(71, 1, 'edy1192', '2015-05-01'),
(72, 5, 'lapv1992', '2015-05-01'),
(73, 8, 'lapv1992', '2015-05-01'),
(74, 1, 'lapv1992', '2015-05-01'),
(75, 7, 'edy1192', '2015-05-03'),
(76, 7, 'edy1192', '2015-05-03'),
(77, 4, 'edy1192', '2015-05-03'),
(78, 4, 'edy1192', '2015-05-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
`idsucursal` int(11) NOT NULL,
  `nombre_laboratorio` varchar(80) NOT NULL,
  `rif` varchar(60) NOT NULL,
  `direccion` varchar(400) NOT NULL,
  `telefono` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorios`
--

INSERT INTO `laboratorios` (`idsucursal`, `nombre_laboratorio`, `rif`, `direccion`, `telefono`) VALUES
(1, 'Centro Medico-Dr. Rafael Guerra Mendez', 'J 1234 5', 'Calle Rondon c/c 5 de Julio', '(0241)857.39.01-856.12.00-856.12.16'),
(2, 'I.E.Q. Los Mangos', 'J 12345 6', 'Vía Guataparo, Planta Baja de la Torre de Consultorios. Local 3 (frente a los ascensores). Valencia - Venezuela.', '(0241)823.20.89'),
(3, 'Centro Comercial Siglo XXI', 'J 32457 7', 'UAMI, La Viña, Valencia', '(0241) 617.8367 (0241) 821.4458 (0241) 824.6910'),
(4, 'C.C. Unicentro Las Marias', 'J 7852935 9', 'Local 2, calle Arvelo, diagonal a la plaza Bolívar. Tocuyito', '(0241) 416.68.95'),
(5, 'C.C. Comercial Cristal', 'J 26382 8', 'Av. Paseo Cabriales. Urb. Las Quintas ', '(0241) 200.07.63'),
(6, 'C.C. San Diego. (Fin de Siglo)', 'J 6286 3', 'locales 1-16 / 1-17', '(0241) 872.74.33 - 872.74.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenservicio`
--

CREATE TABLE IF NOT EXISTS `ordenservicio` (
`idordenservicio` int(11) NOT NULL,
  `numero_orden` varchar(60) NOT NULL,
  `hora_estimada` time NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `cedula_paciente` varchar(30) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordenservicio`
--

INSERT INTO `ordenservicio` (`idordenservicio`, `numero_orden`, `hora_estimada`, `estatus`, `cedula_paciente`, `idempresa`, `idsucursal`, `idperfil`) VALUES
(13, '14-4', '18:25:34', 'Anulado', 'V22224952', 1, 6, 4),
(18, '15-8', '02:48:08', 'Pendiente', 'V19919468', 1, 6, 3),
(19, '15-9', '23:47:24', 'Pendiente', 'V8521738', 2, 6, 2),
(20, '15-10', '08:11:44', 'Procesado', 'V123456789\r\n', 1, 2, 3),
(21, '15-10', '20:16:24', 'Realizado', 'V14189666', 2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
`idpaciente` int(11) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` char(1) NOT NULL,
  `telefono` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `cedula`, `nombres`, `apellidos`, `fecha_nac`, `genero`, `telefono`) VALUES
(2, 'V22224952', 'Karilin  Rousel', 'Fuentes', '1992-10-14', 'F', '02418910073 02418912661'),
(9, 'V19919468', 'Luis Alberto', 'Perez Vera', '1992-03-20', 'M', ' 04144415939 02418479997'),
(10, 'V20699411\r\n', 'Ivonne Alexandra\r\n', 'Ortega Lovera\r\n', '1993-10-28', 'F', '123456 1234564\r\n'),
(11, 'V123456789\r\n', 'Priscilla\r\n', 'Lahm\r\n', '1990-02-12', 'F', '23435234'),
(12, 'V55555555\r\n', 'Eduardo\r\n', 'Carvallo\r\n', '1993-03-20', 'M', '04144415939'),
(13, 'V8521738', 'Maritza ', 'Sanchez ', '1957-02-16', 'F', '04165931138 '),
(15, 'E9548123', 'Sergio ', 'Rodriguez ', '1985-04-12', 'M', '04165931138 '),
(16, 'V21443181', 'Argenis', 'GarcÃ­a', '2034-06-01', 'M', '4127849712 454548'),
(19, 'V14189666', 'Edixon ', 'Sanchez ', '1987-09-14', 'M', '04141178877 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
`idperfil` int(11) NOT NULL,
  `nombre_perfil` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
`idtipousuario` int(11) NOT NULL,
  `nombretipo_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
`idusuario` int(11) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `telefono` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre_usuario`, `clave`, `nombres`, `apellidos`, `idempresa`, `tipo_usuario`, `correo`, `telefono`) VALUES
(1, 'edy1192', '1234', 'Edilianny ', 'Sanchez Ibarra', 1, 2, 'edy@gmail.com', '02418912661'),
(2, 'allin1', '1234', 'Allinson Alberto', 'Mota Gomez', 1, 1, 'allin@gmail.com', '04141234567'),
(3, 'lapv1992', 'lapv1992', 'Luis', 'Perez', 2, 3, 'lapv1992@gmail.com', '04144415939'),
(4, 'sapv1993', '2743', 'Maria', 'Vera', 3, 4, 'mveradesalas@gmail.com', '02418479997'),
(7, 'sapv1994', '3017', 'Ana', 'Paula', 1, 2, 'ana.paula@icloud.com', '02418479997'),
(8, 'kari1', '1234', 'Karilin', 'Fuentes', 4, 4, 'karilin@gmail.com', '04128809523');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
 ADD PRIMARY KEY (`idactividad`);

--
-- Indices de la tabla `convenio_paciente`
--
ALTER TABLE `convenio_paciente`
 ADD PRIMARY KEY (`idconvenio`), ADD KEY `idpaciente` (`idpaciente`,`idempresa`), ADD KEY `idempresa` (`idempresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`idempresa`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
 ADD PRIMARY KEY (`idhistorial`), ADD KEY `idactividad` (`idactividad`), ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
 ADD PRIMARY KEY (`idsucursal`);

--
-- Indices de la tabla `ordenservicio`
--
ALTER TABLE `ordenservicio`
 ADD PRIMARY KEY (`idordenservicio`), ADD KEY `idempresa` (`idempresa`,`idsucursal`,`idperfil`,`cedula_paciente`), ADD KEY `cedula_paciente` (`cedula_paciente`), ADD KEY `idempresa_2` (`idempresa`), ADD KEY `idsucursal` (`idsucursal`), ADD KEY `idperfil` (`idperfil`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`idpaciente`), ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
 ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
 ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`), ADD KEY `tipo_usuario` (`tipo_usuario`), ADD KEY `idempresa` (`idempresa`), ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `convenio_paciente`
--
ALTER TABLE `convenio_paciente`
MODIFY `idconvenio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
MODIFY `idhistorial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
MODIFY `idsucursal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ordenservicio`
--
ALTER TABLE `ordenservicio`
MODIFY `idordenservicio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
