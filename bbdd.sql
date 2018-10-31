CREATE DATABASE IF NOT EXISTS reserva_recursos;

CREATE TABLE IF NOT EXISTS `tbl_recurso`(
	`id_recurso` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
	`nombre_recurso` VARCHAR(30) NOT NULL COMMENT 'Nombre del recurso',
	`id_tiporecurso` INT(10) NULL COMMENT 'FK del IDTIPORECURSO',
	`reservado` TINYINT(1) DEFAULT 0 COMMENT 'Se indica si el recurso esta reservado',
	PRIMARY KEY (`id_recurso`),
	UNIQUE KEY (`id_recurso`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de recursos';

CREATE TABLE IF NOT EXISTS `tbl_tiporecurso`(
	`id_tiporecurso` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
	`nombre_tiporecurso` VARCHAR(30) NOT NULL COMMENT 'Nombre del tipo del recurso',
	PRIMARY KEY (`id_tiporecurso`),
	UNIQUE KEY (`id_tiporecurso`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los tipos de recursos';

CREATE TABLE IF NOT EXISTS `tbl_empleados`(
	`id_empleado` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
	`nombre_empleado` VARCHAR(30) NOT NULL COMMENT 'Nombre del empleado',
	`apellidos_empleado` VARCHAR(60) NOT NULL COMMENT 'Apellidos del empleado',
	`DNI_empleado` VARCHAR(10) NOT NULL COMMENT 'DNI del empleado',
	`nusuario_empleado` VARCHAR(20) NOT NULL COMMENT 'Nombre de usuario del empleado',
	`contrasenya_empleado` VARCHAR(50) NOT NULL COMMENT 'Contraseña de acceso del empleado',
	`numtel_empleado` CHAR(9) NOT NULL COMMENT 'Numero de telefono del empleado',
	PRIMARY KEY (`id_empleado`),
	UNIQUE KEY (`id_empleado`),
	UNIQUE KEY (`DNI_empleado`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los empleados';

CREATE TABLE IF NOT EXISTS `tbl_reserva`(
	`id_reserva` INT(100) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
	`id_empleado` INT(10) NULL COMMENT 'FK del empleado que hace la reserva',
	`id_recurso` INT(10) NULL COMMENT 'FK del recurso que se reserva',
	`horainicio_reserva` TIME(0) NULL COMMENT 'Fecha y hora a la que se realiza la reserva',
	`horasalida_reserva` TIME(0) NULL COMMENT 'Hora a la que se realiza la devolución de la reserva',
	`dia_reserva` DATE(0) NULL COMMENT 'Fecha de la reserva',
	PRIMARY KEY (`id_reserva`),
	UNIQUE KEY (`id_reserva`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de las reservas que se realizan';

ALTER TABLE `tbl_recurso` ADD CONSTRAINT `FK_id_tiporecurso` FOREIGN KEY (`id_tiporecurso`)
REFERENCES `tbl_tiporecurso` (`id_tiporecurso`);

ALTER TABLE `tbl_reserva` ADD CONSTRAINT `FK_id_empleado` FOREIGN KEY (`id_empleado`)
REFERENCES `tbl_empleados` (`id_empleado`);

ALTER TABLE `tbl_reserva` ADD CONSTRAINT `FK_id_recurso` FOREIGN KEY (`id_recurso`)
REFERENCES `tbl_recurso` (`id_recurso`);

INSERT INTO `tbl_tiporecurso` (`nombre_tiporecurso`) VALUES
	('Sala'),
	('Dispositivos portatiles'),
	('Despachos'),
	('Talleres');

INSERT INTO `tbl_recurso` (`nombre_recurso`, `id_tiporecurso`) VALUES
	('Sala Polivalente 1',1),
	('Sala Polivalente 2',1),
	('Sala Polivalente 3',1),
	('Sala Polivalente 4',1),
	('Sala de reuniones',1),
	('Sala Informatica 1',1),
	('Sala Informatica 2',1),
	('Taller de Cocina',4),
	('Despacho Entrevistas 1',3),
	('Despacho Entrevistas 2',3),
	('Salón de actos 1',1),
	('Salón de actos 2',1),
	('Proyector 1',2),
	('Proyector 2',2),
	('Portatil 1',2),
	('Portatil 2',2),
	('Portatil 3',2),
	('Movil 1',2),
	('Movil 2',2);

INSERT INTO `tbl_empleados` (`nombre_empleado`,`apellidos_empleado`,`DNI_empleado`,`nusuario_empleado`,`contrasenya_empleado`,`numtel_empleado`) VALUES
	('Gemma','Marín Ordoñez','38376144T','gmarin','1234','626331772'),
	('Laura','Lara Almazán','56565454L','llara','1234','656515212'),
	('Jordi','Martínez Moya','12487963J','jmartinez','1234','679640650'),
	('Carlos','Dueñas Marín','23125478M','cdueñas','1234','678996332');
		
