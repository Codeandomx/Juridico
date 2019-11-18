CREATE TABLE `tb_transparencia` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`Folio` VARCHAR(50) NULL DEFAULT NULL,
	`Expediente` VARCHAR(25) NULL DEFAULT NULL,
	`Solicitante` VARCHAR(50) NULL DEFAULT NULL,
	`Recepcion` DATETIME NULL DEFAULT NULL,
	`Informacion` VARCHAR(50) NULL DEFAULT NULL,
	`Derivado` VARCHAR(50) NULL DEFAULT NULL,
	`Canalizacion` VARCHAR(50) NULL DEFAULT NULL,
	`Respuesta` VARCHAR(100) NULL DEFAULT NULL,
	`Envio_UT` VARCHAR(50) NULL DEFAULT NULL,
	`Fecha` DATETIME NULL DEFAULT NULL,
	`idObservacion` INT(11) NULL DEFAULT NULL,
	`activo` BIT(1) NULL DEFAULT b'1',
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `idObservación` (`idObservacion`),
	CONSTRAINT `FK_tb_transparencia_tb_catobservaciones` FOREIGN KEY (`idObservacion`) REFERENCES `tb_catobservaciones` (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB