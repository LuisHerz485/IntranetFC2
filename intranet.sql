SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-05:00";

CREATE TABLE tipousuario(
	idtipousuario int primary key auto_increment,
	nombre varchar(45) not null,
	descripcion varchar(45) not null,
	fechaCreada timestamp NOT NULL,
	estado int not null
);

INSERT INTO `tipousuario`(`idtipousuario`, `nombre`, `descripcion`, `estado`) VALUES (1, 'Administrador', 'Con priviliegios de gestionar todo el sistema', 1);

CREATE TABLE departamento(
	iddepartamento int primary key auto_increment,
	nombre varchar(45) not null,
	descripcion varchar(45) not null,
	fechaCreada timestamp NOT NULL ,
	estado int not null
);

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Administracion', 'Area de Administracion', 1),
(2, 'Comunicaciones', 'Area de Comunicaciones', 1),
(3, 'Contabilidad', 'Area de contabilidad', 1),
(4, 'Diseno y Marketing', 'Area de Diseno y Marketing', 1),
(5, 'Laboral', 'Area Laboral', 1),
(6, 'Psicologia', 'Area de Psicologia', 1),
(7, 'Sistemas', 'Area de Sistemas', 1),
(8, 'Tributaria', 'Area Tributaria', 1),
(9, 'Gerencia', 'Gerencia', 1);


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
	fechacreado timestamp NOT NULL,
	codigopersona varchar(20) not null,
	idmensaje int,
	CONSTRAINT fk_user_dep FOREIGN KEY (iddepartamento) REFERENCES departamento(iddepartamento),
	CONSTRAINT fk_user_tus FOREIGN KEY (idtipousuario) REFERENCES tipousuario(idtipousuario)
);


CREATE TABLE asistencia(
	idasistencia int primary key auto_increment,
	idusuario int,
	fechahora timestamp NOT NULL,
	tipo varchar(45) not null,
	estado int not null,
	detalle varchar(100) not null,
	CONSTRAINT fk_as_us FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)
); 

CREATE TABLE cliente(
	idcliente int primary key auto_increment,
	ruc varchar(12) not null,
	razonsocial varchar(100) not null,
	logincliente varchar(45) not null,
	contrasenacliente varchar(64) not null,
	estado tinyint not null,
	fechacreado timestamp not null,
	tipocliente varchar(14) not null,
	iddrive varchar(100) not null,
	imagen varchar(50) not null
);

CREATE TABLE representante(
	idrepresentante int primary key auto_increment,
	detalleCargo varchar(50) not null,
	nombreCompleto varchar(100) not null
);

CREATE TABLE agenda(
	idcliente int,
	idrepresentante int,
	telefono1 varchar(15) not null,
	telefono2 varchar(15) not null,
	correo1 varchar(45) not null,
	correo2 varchar(45) not null,
	CONSTRAINT fk_age_cli FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	CONSTRAINT fk_age_rep FOREIGN KEY (idrepresentante) REFERENCES representante(idrepresentante),
	CONSTRAINT pk_agenda PRIMARY KEY (idcliente,idrepresentante)
);

CREATE TABLE tipoarchivo(
	idtipoarchivo int primary key auto_increment,
	descripcion varchar(40) not null
);

CREATE TABLE archivo(
	idarchivo int primary key auto_increment,
	idcliente int not null,
	idtipoarchivo int not null,
	nombre varchar(100) not null,
	ruta varchar(100) not null,
	extension varchar(100) not null,
	fechacreado timestamp NOT NULL,
	CONSTRAINT fk_arc_cli FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	CONSTRAINT fk_arc_tar FOREIGN KEY (idtipoarchivo) REFERENCES tipoarchivo(idtipoarchivo)
);



/*
/*=============tabla usuario========================
CREATE TABLE auditoria_usuario(
	idregistro int primary key auto_increment,
	idusuario int not null,
	o_nomusuario varchar(100) not null,
	n_nomusuario varchar(100) not null,
	fecha datetime not null,
	accion varchar(100) not null
);
/*
DROP TRIGGER IF EXISTS `INGRESAR_USUARIO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_USUARIO`;
DROP TRIGGER IF EXISTS `ELIMINAR_USUARIO`;
*/

/*
DELIMITER $$
CREATE TRIGGER INGRESAR_USUARIO AFTER INSERT ON usuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_usuario(idusuario,o_nomusuario,fecha,accion) 
	VALUES(new.idusuario,new.nombre,NOW(),"usuario registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_USUARIO BEFORE UPDATE ON usuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_usuario(idusuario,o_nomusuario,n_nomusuario,fecha,accion)
	VALUES(OLD.idusuario,OLD.nombre,NEW.nombre,NOW(),"usuario actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_USUARIO AFTER DELETE ON usuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_usuario(idusuario,o_nomusuario,fecha,accion)
	VALUES(OLD.idusuario,OLD.nombre,NOW(),"usuario eliminado");
END$$
DELIMITER ;

*/
/*=================== Tabla Cliente=====================
CREATE TABLE auditoria_cliente(
	idregistro int primary key auto_increment,
	idcliente int not null,
	o_ruc varchar(15) not null,
	n_ruc varchar(15) not null,
	fecha datetime not null,
	accion varchar(100) not null
);
/*
DROP TRIGGER IF EXISTS `INGRESAR_CLIENTE`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_CLIENTE`;
DROP TRIGGER IF EXISTS `ELIMINAR_CLIENTE`;
*/

/*
DELIMITER $$
CREATE TRIGGER INGRESAR_CLIENTE AFTER INSERT ON cliente 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_cliente(idcliente,o_ruc,fecha,accion) 
	VALUES(new.idcliente,new.ruc,NOW(),"cliente registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_CLIENTE BEFORE UPDATE ON cliente 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_cliente(idcliente,o_ruc,n_ruc,fecha,accion)
	VALUES(OLD.idcliente,OLD.ruc,NEW.ruc,NOW(),"cliente actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_CLIENTE AFTER DELETE ON cliente 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_cliente(idcliente,o_ruc,fecha,accion)
	VALUES(OLD.idcliente,OLD.ruc,NOW(),"cliente eliminado");
END$$
DELIMITER ;

/*=========================tabla agenda=======================
CREATE TABLE auditoria_agenda(
	idregistro int primary key auto_increment,
	idcliente int not null,
	idrepresentante int not null,
	o_telefono1 varchar(15) not null,
	n_telefono1 varchar(15) not null,
	fecha datetime not null,
	accion varchar(100) not null
);

DROP TRIGGER IF EXISTS `INGRESAR_AGENDA`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_AGENDA`;
DROP TRIGGER IF EXISTS `ELIMINAR_AGENDA`;

DELIMITER $$
CREATE TRIGGER INGRESAR_AGENDA AFTER INSERT ON agenda
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_agenda(idcliente,idrepresentante,o_telefono1,fecha,accion) 
	VALUES(new.idcliente,new.idrepresentante,new.telefono1,NOW(),"agenda registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_AGENDA BEFORE UPDATE ON agenda 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_agenda(idcliente,idrepresentante,o_telefono1,n_telefono1,fecha,accion)
	VALUES(OLD.idcliente,OLD.idrepresentante,OLD.telefono1,NEW.telefono1,NOW(),"agenda actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_AGENDA AFTER DELETE ON agenda 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_agenda(o_idcliente,o_idrepresentante,o_telefono1,fecha,accion)
	VALUES(OLD.idcliente,OLD.idrepresentante,OLD.telefono1,NOW(),"agenda eliminado");
END$$
DELIMITER ;
========================tabla asistencia===============================
CREATE TABLE auditoria_asistencia(
	idregistro int primary key auto_increment,
	idasistencia int not null,
	idusuario int not null,
	o_fechahora datetime not null,
	n_fechahora datetime not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_ASISTENCIA`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_ASISTENCIA`;
DROP TRIGGER IF EXISTS `ELIMINAR_ASISTENCIA`;

DELIMITER $$
CREATE TRIGGER INGRESAR_ASISTENCIA AFTER INSERT ON asistencia
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_asistencia(idasistencia,idusuario,fechaaccion,accion) 
	VALUES(new.idasistencia,new.idusuario,NOW(),"asistencia registrada");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_ASISTENCIA BEFORE UPDATE ON asistencia 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_asistencia(idasistencia,idusuario,o_fechahora,n_fechahora,fechaaccion,accion)
	VALUES(OLD.idasistencia,OLD.idusuario,OLD.fechahora,NEW.fechahora,NOW(),"asistencia actualizada");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_ASISTENCIA AFTER DELETE ON asistencia 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_asistencia(idasistencia,idusuario,fechaaccion,accion)
	VALUES(OLD.idasistencia,OLD.idusuario,NOW(),"asistencia eliminada");
END$$
DELIMITER ;
========================tabla tipousuario===============================
CREATE TABLE auditoria_tipousuario(
	idregistro int primary key auto_increment,
	idtipousuario int not null,
	o_nombre varchar(100) not null,
	n_nombre varchar(100) not null,
	o_descripcion varchar(100)not null,
	n_descripcion varchar(100)not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_TIPOUSUARIO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_TIPOUSUARIO`;
DROP TRIGGER IF EXISTS `ELIMINAR_TIPOUSUARIO`;

DELIMITER $$
CREATE TRIGGER INGRESAR_TIPOUSUARIO AFTER INSERT ON tipousuario
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_tipousuario(idtipousuario,o_nombre,o_descripcion,fechaaccion,accion) 
	VALUES(new.idtipousuario,new.nombre,new.descripcion,NOW(),"tipo_usuario registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_TIPOUSUARIO BEFORE UPDATE ON tipousuario
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_tipousuario(idtipousuario,o_nombre,o_descripcion,n_nombre,n_descripcion,fechaaccion,accion)
	VALUES(OLD.idtipousuario,OLD.nombre,OLD.descripcion,NEW.nombre,NEW.descripcion,NOW(),"tipo_usuario actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_TIPOUSUARIO AFTER DELETE ON tipousuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_tipousuario(idtipousuario,o_nombre,o_descripcion,fechaaccion,accion)
	VALUES(OLD.idtipousuario,OLD.nombre,OLD.descripcion,NOW(),"tipo_usuario eliminado");
END$$
DELIMITER ;
========================tabla departamento==============================
CREATE TABLE auditoria_departamento(
	idregistro int primary key auto_increment,
	iddepartamento int not null,
	o_nombre varchar(100) not null,
	n_nombre varchar(100) not null,
	o_descripcion varchar(100)not null,
	n_descripcion varchar(100)not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_DEPARTAMENTO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_DEPARTAMENTO`;
DROP TRIGGER IF EXISTS `ELIMINAR_DEPARTAMENTO`;

DELIMITER $$
CREATE TRIGGER INGRESAR_DEPARTAMENTO AFTER INSERT ON departamento
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_departamento(iddepartamento,o_nombre,o_descripcion,fechaaccion,accion) 
	VALUES(new.iddepartamento,new.nombre,new.descripcion,NOW(),"departamento registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_DEPARTAMENTO BEFORE UPDATE ON departamento
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_departamento(iddepartamento,o_nombre,o_descripcion,n_nombre,n_descripcion,fechaaccion,accion)
	VALUES(OLD.iddepartamento,OLD.nombre,OLD.descripcion,NEW.nombre,NEW.descripcion,NOW(),"departamento actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_DEPARTAMENTO AFTER DELETE ON departamento 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_departamento(iddepartamento,o_nombre,o_descripcion,fechaaccion,accion)
	VALUES(OLD.iddepartamento,OLD.nombre,OLD.descripcion,NOW(),"departamento eliminado");
END$$
DELIMITER ;
========================tabla representante============================
CREATE TABLE auditoria_representante(
	idregistro int primary key auto_increment,
	idrepresentante int not null,
	o_detalle varchar(100) not null,
	n_detalle varchar(100) not null,
	o_nombre varchar(100)not null,
	n_nombre varchar(100)not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_REPRESENTANTE`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_REPRESENTANTE`;
DROP TRIGGER IF EXISTS `ELIMINAR_REPRESENTANTE`;

DELIMITER $$
CREATE TRIGGER INGRESAR_REPRESENTANTE AFTER INSERT ON representante
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_representante(idrepresentante,o_detalle,o_nombre,fechaaccion,accion) 
	VALUES(new.idrepresentante,new.detalleCargo,new.nombreCompleto,NOW(),"representante registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_REPRESENTANTE BEFORE UPDATE ON representante
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_representante(idrepresentante,o_detalle,o_nombre,n_detalle,n_nombre,fechaaccion,accion)
	VALUES(OLD.idrepresentante,OLD.detalleCargo,OLD.nombreCompleto,NEW.detalleCargo,NEW.nombreCompleto,NOW(),"representante actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_REPRESENTANTE AFTER DELETE ON representante 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_representante(idrepresentante,o_detalle,o_nombre,fechaaccion,accion)
	VALUES(OLD.idrepresentante,OLD.detalleCargo,OLD.nombreCompleto,NOW(),"representante eliminado");
END$$
DELIMITER ;
*/

