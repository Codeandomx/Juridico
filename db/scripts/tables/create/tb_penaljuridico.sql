CREATE TABLE `tb_penaljuridico` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`numero_consecutivo` VARCHAR(15) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`carpeta_investigacion` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`fecha_asignacion` TIMESTAMP NOT NULL,
	`agencia_mp` VARCHAR(15) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`servidor_publico` INT(11) NULL DEFAULT NULL,
	`denunciante` VARCHAR(30) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`delito` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`poligono` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8mb4_unicode_ci',
	`observaciones` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`estado_procesal` INT(11) NOT NULL,
	`activo` TINYINT(1) NOT NULL DEFAULT '1',
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX `tb_penaljuridico_estado_procesal_foreign` (`estado_procesal`),
	CONSTRAINT `tb_penaljuridico_estado_procesal_foreign` FOREIGN KEY (`estado_procesal`) REFERENCES `tb_catestadosprocesales` (`id`)
)