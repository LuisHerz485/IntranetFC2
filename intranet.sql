SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-05:00";
------------------------------------------------------------------------------

CREATE TABLE `asistencia` (
	`idasistencia` int(11) NOT NULL,
  	`codigo_persona` varchar(20) COLLATE utf8_bin NOT NULL,
  	`fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  	`tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  	`fecha` date NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-------------------------------------------------------------------------------

CREATE TABLE `departamento` (
	 `iddepartamento` int(11) NOT NULL,
  	`nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  	`descripcion` varchar(45) COLLATE utf8_bin NOT NULL,
  	`fechacreada` datetime NOT NULL,
  	`idusuario` varchar(45) COLLATE utf8_bin NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `descripcion`, `fechacreada`, `idusuario`) VALUES
(1, 'Administracion', 'Area de Administracion', '2021-02-26 00:00:00', '1'),
(2, 'Comunicaciones', 'Area de Comunicaciones', '2021-02-26 00:00:00', '1'),
(3, 'Contabilidad', 'Area de contabilidad', '2021-02-26 00:00:00', '1'),
(4, 'Diseno y Marketing', 'Area de Diseno y Marketing', '2021-02-26 00:00:00', '1'),
(5, 'Laboral', 'Area Laboral', '2021-02-26 00:00:00', '1'),
(6, 'Psicologia', 'Area de Psicologia', '2021-02-26 00:00:00', '1'),
(7, 'Sistemas', 'Area de Sistemas', '2021-02-26 00:00:00', '1'),
(8, 'Tributaria', 'Area Tributaria', '2021-02-26 00:00:00', '1'),
(9, 'Gerencia', 'Gerencia', '2021-02-26 00:00:00', '1');

------------------------------------------------------------------------------------

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_bin NOT NULL,
  `fechacreada` datetime NOT NULL,
  `idusuario` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO `tipousuario` (`idtipousuario`, `nombre`, `descripcion`, `fechacreada`, `idusuario`) VALUES
(1, 'Administrador', 'Con priviliegios de gestionar todo el sistema', '2020-01-18 00:00:00', '1');

------------------------------------------------------------------------------------

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `login` varchar(45) COLLATE utf8_bin NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(50) COLLATE utf8_bin NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fechacreado` datetime NOT NULL,
  `usuariocreado` varchar(45) COLLATE utf8_bin NOT NULL,
  `codigo_persona` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `idmensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
----- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellidos`, `login`, `iddepartamento`, `idtipousuario`, `email`, `password`, `imagen`, `estado`, `fechacreado`, `usuariocreado`, `codigo_persona`, `idmensaje`) VALUES
(1, 'admin', 'Luis Alberto Junior Hernandez Albia', 'admin', 1, 1, 'luis.hernandez.albia@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'default.jpg', 1, '2020-01-18 00:00:00', 'admin', '444', 1);


----ALTER TABLE------
ALTER TABLE `asistencia`
	ADD PRIMARY KEY (`idasistencia`);


ALTER TABLE `departamento`
	ADD PRIMARY KEY (`iddepartamento`);

ALTER TABLE `tipousuario`
	ADD PRIMARY KEY (`idtipousuario`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `codigo_persona` (`codigo_persona`),
  ADD KEY `fk_departamento` (`iddepartamento`),
  ADD KEY `fk_tiposusario` (`idtipousuario`);


ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`);
COMMIT;


ALTER TABLE `asistencia`
  MODIFY `idasistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;



