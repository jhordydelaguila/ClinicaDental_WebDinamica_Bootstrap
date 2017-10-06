-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2016 a las 23:33:37
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicaanuncio`
--

CREATE TABLE `clinicaanuncio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clinicaanuncio`
--

INSERT INTO `clinicaanuncio` (`id`, `titulo`, `contenido`, `estado`) VALUES
(1, 'Visión', 'Otorgar salud y estética bucal a precios accesibles con los más altos estándares de calidad, tecnología y servicio a través de constante innovación y capacitación. ', ''),
(2, 'Misión', 'Otorgar salud y estética bucal a precios accesibles con los más altos estándares de calidad, tecnología y servicio a través de constante innovación y capacitación. ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicainicio`
--

CREATE TABLE `clinicainicio` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contenido` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagenmediana` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clinicainicio`
--

INSERT INTO `clinicainicio` (`id`, `imagen`, `titulo`, `contenido`, `imagenmediana`) VALUES
(1, 'portada2.jpg', '¿Quienes Somos?', 'Siente la libetad de sonreir, ten una apariencia bucal agradable y libre, no te averguences de sonreir y muestra tu mejor SONRISA. Tenemos mas de 5 años de experiencia en el mundo de la odontología para otorgarte lo mejor con respecto a tu salud bucal.Brindandole a usted comonidad, un buen servicio personal y bucal, para que pueda sentirse comoda con su sonrisa y mostrar una sonrisa explendidad y ser el punto de atención con sus relaciones sociales.', 'clinica3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica_instalaciones`
--

CREATE TABLE `clinica_instalaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clinica_instalaciones`
--

INSERT INTO `clinica_instalaciones` (`id`, `nombre`, `imagen`) VALUES
(1, '', '1.jpg'),
(2, '', '2.jpg'),
(3, '', '3.jpg'),
(4, '', '4.jpg'),
(5, '', '5.jpg'),
(6, '', '6.jpg'),
(7, '', '7.jpg'),
(8, '', '8.jpg'),
(9, '', '9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactoinfo`
--

CREATE TABLE `contactoinfo` (
  `id` int(11) NOT NULL,
  `comentario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horario` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contactoinfo`
--

INSERT INTO `contactoinfo` (`id`, `comentario`, `lugar`, `telefono`, `email`, `horario`, `mensaje`) VALUES
(1, 'Contactamos a nosotros y te responderemos en menos de 24 horas.', 'Calle Sucre con Pacasmayo - Salaverry ', '#944635663', 'gean1011@hotmail.com', 'Lunes - Sabado ( 9:00 am - 1:00 pm y 4:00 pm - 9:00 pm ) ', 'TE PODEMOS ATENDER, DOMINGO Y FERIADOS PREVIA CITA. Envianos un mensaje o contactame por el numero 956182522');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_mensaje`
--

CREATE TABLE `contacto_mensaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto_mensaje`
--

INSERT INTO `contacto_mensaje` (`id`, `nombre`, `telefono`, `email`, `mensaje`, `fecha`) VALUES
(5, 'jhordy', '123456789', 'jhordy@gmail.com', 'Esto sigue siendo una prueba', '2016-07-12'),
(6, 'jhordy', '123456789', 'jhordy@gmail.com', 'Sigue siendo una prueba', '2016-07-12'),
(7, 'jhordy', '123456789', 'jhordy@gmail.com', 'Sape', '2016-07-12'),
(8, 'jhordy', '123456789', 'jhordy@gmail.com', 'Sape', '2016-07-12'),
(10, 'jhordy', '123456789', 'jhordy@gmail.com', 'prueba', '2016-07-12'),
(11, 'jhordy', '987654321', 'jhordy@gmail.com', 'Esto es una prueba', '2016-07-12'),
(12, 'jhordy', '987654321', 'jhordy@gmail.com', 'Esto es una prueba', '2016-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE `opcion` (
  `nOpcionCodigo` int(11) NOT NULL,
  `cOpcionDescripcion` varchar(50) NOT NULL,
  `cOpcionRecurso` varchar(100) NOT NULL,
  `nApCodigo` int(11) NOT NULL,
  `nOpcionEstado` int(11) NOT NULL,
  `nOpcionDependencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`nOpcionCodigo`, `cOpcionDescripcion`, `cOpcionRecurso`, `nApCodigo`, `nOpcionEstado`, `nOpcionDependencia`) VALUES
(1, 'Mantenimiento', '#', 2, 1, 0),
(2, 'Personas', 'verPersona(''persona.php'')', 2, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_generales`
--

CREATE TABLE `opciones_generales` (
  `nOpcionGeneralCodigo` int(11) NOT NULL,
  `cOpcionGeneralCodigo` varchar(100) NOT NULL,
  `cOpcionGeneralRecurso` varchar(100) NOT NULL,
  `nApCodigo` int(11) NOT NULL,
  `nPCodigo` int(11) NOT NULL,
  `nOpcionGeneralDependencia` int(11) NOT NULL,
  `nOpcionGeneralEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `nOperacionCodigo` int(11) NOT NULL,
  `cOperacionDescripcion` varchar(100) NOT NULL,
  `nOperacionEstado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`nOperacionCodigo`, `cOperacionDescripcion`, `nOperacionEstado`) VALUES
(14, 'Cerrar Sesion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `PersonaCodigo` int(11) NOT NULL,
  `PersonaApellido` varchar(100) NOT NULL,
  `PersonaNombre` varchar(100) NOT NULL,
  `PersonaNacimiento` date NOT NULL,
  `PersonaEmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PersonaEstado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`PersonaCodigo`, `PersonaApellido`, `PersonaNombre`, `PersonaNacimiento`, `PersonaEmail`, `PersonaEstado`) VALUES
(8, 'del aguila', 'jhordy', '0000-00-00', 'jhordy@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_opcion`
--

CREATE TABLE `persona_opcion` (
  `nPersonaCodigo` int(11) NOT NULL,
  `nOpcionCodigo` int(11) NOT NULL,
  `nPersonaOpcionEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_opcion`
--

INSERT INTO `persona_opcion` (`nPersonaCodigo`, `nOpcionCodigo`, `nPersonaOpcionEstado`) VALUES
(1, 1, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `principal`
--

INSERT INTO `principal` (`id`, `titulo`, `subtitulo`, `contenido`) VALUES
(1, 'Clinica Dental Sonrisas', '!Siente la Libertad de Sonreír!', 'Somos una clínica dental, especialista en tratamientos dentales, hacemos lo imposible posible, para poder darte un trabajo de calidad y satisfacción con respecto a tu sonrisa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_anuncios`
--

CREATE TABLE `principal_anuncios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `principal_anuncios`
--

INSERT INTO `principal_anuncios` (`id`, `titulo`, `imagen`, `estado`) VALUES
(5, 'Experiencia', 'atencion1.jpg', '1'),
(6, 'Ambiente Agradable', 'atencion2.jpg', '1'),
(7, 'Facilidad de Pago', 'atencion3.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_marco`
--

CREATE TABLE `principal_marco` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` longtext COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `principal_marco`
--

INSERT INTO `principal_marco` (`id`, `titulo`, `imagen`, `contenido`, `estado`) VALUES
(1, 'Compromiso con tu sonrisa', 'clinica1.jpg', 'Tu sonrisa y salud bocal es lo mas importante para nosotros por eso ponemos a disposicion las mejores herramientas para tu salud y los mejores tratamientos que tus dientes necesiten.', '1'),
(2, 'Clinica Sonrisas', 'clinica2.jpg', 'Alguna duda, encuentra soluciones a los problemas dentales que te preocupan o cualquier problema relativo a tu salud dental.', '1'),
(4, 'Nuevo', 'portada2.jpg', 'ESto es una prueba', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_slider`
--

CREATE TABLE `principal_slider` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `principal_slider`
--

INSERT INTO `principal_slider` (`id`, `titulo`, `imagen`, `estado`) VALUES
(27, 'Portada 1', 'portada1.jpg', '1'),
(28, 'Portada 2', 'portada2.jpg', '1'),
(29, 'Portada 3', 'portada3.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resetpass`
--

CREATE TABLE `resetpass` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `imagen`, `titulo`, `contenido`, `estado`) VALUES
(1, 'tratamiento1.jpg', 'Blanqueamiento Dental', 'El blanqueamiento dental es un tratamiento dental estético que logra reducir el color original de los dientes, dejando los dientes más blancos y brillantes.', '1'),
(2, 'tratamiento2.jpg', 'Rehabilitación Oral', 'La rehabilitación oral se encargada de la restauración es decir devuelve la función estética y armonía oral mediante prótesis dentales de perdidas de dientes.', '1'),
(3, 'tratamiento3.jpg', 'Endodoncias', 'La endodoncia es la solución inmediata y definitiva ante las molestias dolorosas provocadas por la afectación del nervio, tratamiendo inmediato.', '1'),
(4, 'tratamiento4.jpg', 'Curaciones con resina', 'Los empastes compuestos de resina están hechos de compuestos de cerámica y plástico. Ya que las resinas imitan la apariencia de los dientes naturales.', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientoanuncio`
--

CREATE TABLE `tratamientoanuncio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamientoanuncio`
--

INSERT INTO `tratamientoanuncio` (`id`, `titulo`, `contenido`, `estado`) VALUES
(1, 'Ten la mejor sonrisa', 'Contamos con los mejores tratamientos para ti y toda tu familia, para que tengas una mejor sonrisa.', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `PersonaCodigo` int(11) NOT NULL,
  `UsuarioCodigo` varchar(20) NOT NULL,
  `UsuarioClave` varchar(255) NOT NULL,
  `UsuarioEstado` int(11) NOT NULL DEFAULT '1',
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`PersonaCodigo`, `UsuarioCodigo`, `UsuarioClave`, `UsuarioEstado`, `hora`) VALUES
(8, 'jdelaguilaq', '$2y$10$fpl11Sru3YQygyXUohI52OvExub1iUYwmsxO2bYvr902I.KePA8NO', 1, '12:09:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clinicaanuncio`
--
ALTER TABLE `clinicaanuncio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clinicainicio`
--
ALTER TABLE `clinicainicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clinica_instalaciones`
--
ALTER TABLE `clinica_instalaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactoinfo`
--
ALTER TABLE `contactoinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto_mensaje`
--
ALTER TABLE `contacto_mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD PRIMARY KEY (`nOpcionCodigo`);

--
-- Indices de la tabla `opciones_generales`
--
ALTER TABLE `opciones_generales`
  ADD PRIMARY KEY (`nOpcionGeneralCodigo`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`nOperacionCodigo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`PersonaCodigo`);

--
-- Indices de la tabla `persona_opcion`
--
ALTER TABLE `persona_opcion`
  ADD PRIMARY KEY (`nPersonaCodigo`,`nOpcionCodigo`),
  ADD KEY `nOpcionCodigo` (`nOpcionCodigo`);

--
-- Indices de la tabla `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `principal_anuncios`
--
ALTER TABLE `principal_anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `principal_marco`
--
ALTER TABLE `principal_marco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `principal_slider`
--
ALTER TABLE `principal_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resetpass`
--
ALTER TABLE `resetpass`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientoanuncio`
--
ALTER TABLE `tratamientoanuncio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`PersonaCodigo`),
  ADD UNIQUE KEY `cPerUsuarioCodigo` (`UsuarioCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clinicaanuncio`
--
ALTER TABLE `clinicaanuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clinicainicio`
--
ALTER TABLE `clinicainicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clinica_instalaciones`
--
ALTER TABLE `clinica_instalaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `contactoinfo`
--
ALTER TABLE `contactoinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contacto_mensaje`
--
ALTER TABLE `contacto_mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `opcion`
--
ALTER TABLE `opcion`
  MODIFY `nOpcionCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `opciones_generales`
--
ALTER TABLE `opciones_generales`
  MODIFY `nOpcionGeneralCodigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `nOperacionCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `PersonaCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `principal_anuncios`
--
ALTER TABLE `principal_anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `principal_marco`
--
ALTER TABLE `principal_marco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `principal_slider`
--
ALTER TABLE `principal_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `resetpass`
--
ALTER TABLE `resetpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tratamientoanuncio`
--
ALTER TABLE `tratamientoanuncio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
