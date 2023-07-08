-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2023 a las 06:09:37
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
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  `contenidoComentario` longtext NOT NULL,
  `fechaComentario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentario`, `idPublicacion`, `contenidoComentario`, `fechaComentario`, `idUser`) VALUES
(7, 10, 'bonitas papas', '2023-07-07 00:51:47', 2),
(8, 10, 'Papas, me gustan las papas', '2023-07-07 01:01:29', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `idlike` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`idlike`, `idPublicacion`, `idUser`) VALUES
(19, 10, 2),
(20, 10, 1),
(21, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensaje` int(11) NOT NULL,
  `usuarios_idusuario` int(11) NOT NULL,
  `usuarioMando` int(11) NOT NULL,
  `contenido` longtext NOT NULL,
  `fechaMensaje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idnotificacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tipoNotificaion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `Carrer` varchar(50) DEFAULT NULL,
  `Salary` float DEFAULT NULL,
  `Major` varchar(50) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `PaisActual` varchar(30) NOT NULL,
  `nombreCompleto` varchar(100) NOT NULL,
  `fotoPerfil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `Carrer`, `Salary`, `Major`, `idUsuario`, `PaisActual`, `nombreCompleto`, `fotoPerfil`) VALUES
(1, 'Ingeniro', 1500.56, 'TICS', 1, 'Ecuador', 'Santiago Alexander Ajala Ramos', 'img/imagenesPefil/zebra_bw.png'),
(2, 'Ingeniro', 1500.56, 'TICS', 2, 'Dinamarca', 'AJALA RAMOS SANTIAGO ALEXANDER', 'img/imagenesPefil/IMG-20221113-WA0078.jpg'),
(3, 'Ingeniro', 300.58, 'Biologia', 3, 'Inglaterra', 'Angelita Ramos Chachalo', 'img/imagenesPefil/IMG_20221028_091754.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idPerfil` int(11) NOT NULL,
  `nombrePrivilegio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idPerfil`, `nombrePrivilegio`) VALUES
(1, 'Manager'),
(2, 'Estudent'),
(3, 'Public'),
(4, 'Professor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `idpublicacion` int(11) NOT NULL,
  `idUserPublico` int(11) NOT NULL,
  `contenidoPublicacion` longtext NOT NULL,
  `fechaPublicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fotoPublicacion` varchar(255) NOT NULL,
  `num_likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`idpublicacion`, `idUserPublico`, `contenidoPublicacion`, `fechaPublicacion`, `fotoPublicacion`, `num_likes`) VALUES
(10, 1, 'hola dale like y comenta', '2023-07-07 01:01:19', 'img/imagenesPublicaciones/potato_2.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposnotificaciones`
--

CREATE TABLE `tiposnotificaciones` (
  `idtiposNotificaciones` int(11) NOT NULL,
  `nombreTipo` varchar(60) NOT NULL,
  `mensajeNotificacion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `idPrivilegio` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `BrithDay` date NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idPrivilegio`, `correo`, `BrithDay`, `usuario`, `contrasena`, `fecha_registro`) VALUES
(1, 2, 'santiagoajala95@gmail.com', '0000-00-00', 'A0204', '$2y$10$cu8YDJhtG24Q6b9e.SAQiOXxamnmQI.kkerO8OmcQb5ar0bFn682y', '2023-07-04 05:13:04'),
(2, 2, 'santiago.ajala@yachaytech.edu.ec', '0000-00-00', 'santiago123', '$2y$10$XM09.HilkmmRGUfkM2Ps..eXSP3G4YqZv87fDAjLycJF9EyoFbYg2', '2023-07-04 13:41:41'),
(3, 2, 'ramos1961@gmail.com', '0000-00-00', 'Angelita123', '$2y$10$OAKcHWk42St1NJYO7b7KSeKLVZkcDDmCY.pQvVQOhOtfgueDjNCUi', '2023-07-07 01:00:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `comentarioPublicacion_idx` (`idPublicacion`),
  ADD KEY `fkey_iduser` (`idUser`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idlike`),
  ADD KEY `publiLikes_idx` (`idPublicacion`),
  ADD KEY `fk_iduser` (`idUser`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensaje`),
  ADD KEY `fk_mensajes_usuarios1_idx` (`usuarios_idusuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `usuarioNotificacion_idx` (`idUsuario`),
  ADD KEY `fk_notificaciones_tiposNotificaciones1_idx` (`tipoNotificaion`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`),
  ADD KEY `perfilUser_idx` (`idUsuario`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`idpublicacion`),
  ADD KEY `publicacioesUser_idx` (`idUserPublico`);

--
-- Indices de la tabla `tiposnotificaciones`
--
ALTER TABLE `tiposnotificaciones`
  ADD PRIMARY KEY (`idtiposNotificaciones`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `priviUser_idx` (`idPrivilegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `idpublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tiposnotificaciones`
--
ALTER TABLE `tiposnotificaciones`
  MODIFY `idtiposNotificaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarioPublicacion` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idpublicacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkey_iduser` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `publiLikes` FOREIGN KEY (`idPublicacion`) REFERENCES `publicaciones` (`idpublicacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_mensajes_usuarios1` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_notificaciones_tiposNotificaciones1` FOREIGN KEY (`tipoNotificaion`) REFERENCES `tiposnotificaciones` (`idtiposNotificaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarioNotificacion` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfilUser` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicacioesUser` FOREIGN KEY (`idUserPublico`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `priviUser` FOREIGN KEY (`idPrivilegio`) REFERENCES `privilegios` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
