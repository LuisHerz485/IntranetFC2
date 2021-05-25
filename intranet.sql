SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-05:00";

CREATE TABLE tipousuario(
	idtipousuario int primary key auto_increment,
	nombre varchar(45) not null,
	descripcion varchar(45) not null,
	fechaCreada timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	estado int not null
);

INSERT INTO `tipousuario`(`idtipousuario`, `nombre`, `descripcion`, `fechaCreada`) VALUES (1, 'Administrador', 'Con priviliegios de gestionar todo el sistema', '2020-01-18 00:00:00');

CREATE TABLE departamento(
	iddepartamento int primary key auto_increment,
	nombre varchar(45) not null,
	descripcion varchar(45) not null,
	fechaCreada timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `descripcion`, `fechacreada`) VALUES
(1, 'Administracion', 'Area de Administracion', '2021-02-26 00:00:00'),
(2, 'Comunicaciones', 'Area de Comunicaciones', '2021-02-26 00:00:00'),
(3, 'Contabilidad', 'Area de contabilidad', '2021-02-26 00:00:00'),
(4, 'Diseno y Marketing', 'Area de Diseno y Marketing', '2021-02-26 00:00:00'),
(5, 'Laboral', 'Area Laboral', '2021-02-26 00:00:00'),
(6, 'Psicologia', 'Area de Psicologia', '2021-02-26 00:00:00'),
(7, 'Sistemas', 'Area de Sistemas', '2021-02-26 00:00:00'),
(8, 'Tributaria', 'Area Tributaria', '2021-02-26 00:00:00'),
(9, 'Gerencia', 'Gerencia', '2021-02-26 00:00:00');


CREATE TABLE usuario(
	idusuario int auto_increment primary key,
	iddepartamento int not null,
	idtipousuario int not null,
	nombre varchar(45) not null,
	apellidos varchar(45) not null,
	login varchar(45) not null,
	email varchar(45) not null,
	password1 varchar(64) not null,
	imagen varchar(45) not null,
	estado tinyint not null,
	fechacreado timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	codigopersona varchar(20) not null,
	idmensaje int,
	CONSTRAINT fk_user_dep FOREIGN KEY (iddepartamento) REFERENCES departamento(iddepartamento),
	CONSTRAINT fk_user_tus FOREIGN KEY (idtipousuario) REFERENCES tipousuario(idtipousuario)
);


CREATE TABLE asistencia(
	idasistencia int primary key auto_increment,
	idusuario int,
	fechahora timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
	tipo varchar(45) not null,
	fecha date not null,
	CONSTRAINT fk_as_us FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)
);


/*
CREATE TABLE auditoria(
	idregistro int primary key auto_increment,
	idusuario varchar(50) not null,
	nomusuario varchar(100) not null,
	fecha datetime not null,
	accion varchar(100) not null
);

DROP TRIGGER IF EXISTS `INSERTAR_USUARIO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_USUARIO`;
DROP TRIGGER IF EXISTS `ELIMINAR_USUARIO`;

CREATE TRIGGER `INSERTAR_USUARIO` AFTER INSERT ON `usuario` FOR EACH ROW 
INSERT INTO auditoria (idusuario,nomusuario,fecha,accion)
VALUES(NEW.idusuario,NEW.nombre,NOW(),"Ingreso nuevo usuario");


CREATE TRIGGER `ACTUALIZAR_USUARIO` AFTER UPDATE ON `usuario` 
FOR EACH ROW 
BEGIN
UPDATE 

END



CREATE TRIGGER `ELIMINAR_USUARIO` AFTER DELETE ON `usuario` 
FOR EACH ROW 
BEGIN
DELETE 

END

*/

