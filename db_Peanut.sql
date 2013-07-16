create database dbProyecto2;
CREATE TABLE `tProveedor`(
	`idProveedor` INT AUTO_INCREMENT,
	`descProveedor` VARCHAR(140) NOT NULL,
	`descripcionCorta` VARCHAR(70) NOT NULL,
	`email` VARCHAR(70),
	`password` VARCHAR(70) NOT NULL,
	PRIMARY KEY(`idProveedor`)
);
CREATE TABLE `tProducto`(
	`idProducto` INT AUTO_INCREMENT,
	`idProveedor` INT NOT NULL,
	`idSKU` VARCHAR(150) NOT NULL,
	`descProducto` VARCHAR(70) NOT NULL,
	PRIMARY KEY(`idProducto`)
);
CREATE TABLE `tEstado`(
	`idEstado` INT NOT NULL,
	`descEstado` VARCHAR(70),
	PRIMARY KEY (`idEstado`)
);
CREATE TABLE `tMovimiento`(
	`idMovimiento` INT AUTO_INCREMENT,
	`numInterno` INT NOT NULL,
	`numFacturaPro` INT NOT NULL,
	`numFacturaComercial` INT NOT NULL,
	`fechaMovimiento` DATETIME NOT NULL,
	`tipoDeMovimiento` CHAR NOT NULL,
	`numPedimento` NUMERIC(6) NOT NULL,
	`notas` VARCHAR(350),
	`createdBy` INT NOT NULL,
	`createdDate` DATETIME NOT NULL,
	`updatedBy` INT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY (`idMovimiento`)
);
CREATE TABLE `tSalidaTemp`(
	`idSalidaTemp` INT AUTO_INCREMENT,
	`idProducto` INT NOT NULL,
	`cantidad` NUMERIC(6) NOT NULL,
	PRIMARY KEY (`idSalidaTemp`)
);
CREATE TABLE `tEntradas`(
	`idEntrada` INT AUTO_INCREMENT,
	`idMovimiento` INT NOT NULL,
	`idProducto` INT NOT NULL,
	`idEstado` INT NOT NULL,
	`idUbicacionAlmacen` VARCHAR(10) NOT NULL,
	`loteProducto` VARCHAR(150) NOT NULL,
	`serieProducto` VARCHAR(150) NOT NULL,
	`fechaLote` DATETIME,
	`cantidad` INT NOT NULL,
	`unidad` NUMERIC(6) NOT NULL,
	PRIMARY KEY (`idEntrada`)
);
CREATE TABLE `tSalidas`(
	`idSalida` INT AUTO_INCREMENT,
	`idMovimiento` INT NOT NULL,
	`idProducto` INT NOT NULL,
	`idEstado` INT NOT NULL,
	`idUbicacionAlmacen` VARCHAR(10) NOT NULL,
	`loteProducto` VARCHAR(150) NOT NULL,
	`serieProducto` VARCHAR(150) NOT NULL,
	`fechaLote` DATETIME,
	`cantidad` INT NOT NULL,
	`unidad` NUMERIC(6) NOT NULL,
	PRIMARY KEY (`idSalida`)
);
CREATE TABLE `tConversiones`(
	`idConversion` INT AUTO_INCREMENT,
	`idProducto` INT NOT NULL,
	`cantidad` INT NOT NULL,
	`unidad` VARCHAR(40) NOT NULL,
	`cantidadEquivalente` INT NOT NULL,
	`unidadEquivalente` VARCHAR(40) NOT NULL,
	PRIMARY KEY (`idConversion`)
);
CREATE TABLE `tUbicacionAlmacen`(
	`idUbicacion` INT AUTO_INCREMENT,
	`idUbicacionAlmacen` VARCHAR(10),
	`almacen` VARCHAR(2) NOT NULL,
	`modulo` VARCHAR(2) NOT NULL,
	`nivel` VARCHAR(2) NOT NULL,
	`posicion` VARCHAR(2) NOT NULL,
	`ultimoCheck` DATETIME NOT NULL,
	`fechaCheck` DATETIME NOT NULL,
	PRIMARY KEY (`idUbicacion`)
);
CREATE TABLE `tBitacoraCorreo`(
	`idBitacoraCorreo` INT AUTO_INCREMENT,
	`idMovimiento` INT NOT NULL,
	`remitente` VARCHAR(70) NOT NULL,
	`destinatario` VARCHAR(70) NOT NULL,
	`fechaEnvio` DATETIME NOT NULL,
	PRIMARY KEY (`idBitacoraCorreo`)
);
CREATE TABLE `tAjustesCorreo`(
	`usuario` VARCHAR(70) NOT NULL,
	`password` VARCHAR(140) NOT NULL,
	`smtp` VARCHAR(70) NOT NULL,
	`puerto` VARCHAR(4) NOT NULL
);
CREATE TABLE `tMovimientoReferencia`(
	`idSalida` INT NOT NULL,
	`idEntrada` INT NOT NULL
);
CREATE TABLE `tUsuario`(
	`idUsuario` INT AUTO_INCREMENT,
	`idPerfil` INT NULL,
	`cveUsuario` VARCHAR(90) NOT NULL,
	`email` VARCHAR(90) NOT NULL,
	`estatus` INT NOT NULL,
	`createdBy` INT NOT NULL,
	`createdDate` DATETIME NOT NULL,
	`updatedBy` INT NULL,
	`updatedDate` DATETIME NULL,
	PRIMARY KEY (`idUsuario`)
);
CREATE TABLE `tPerfil`(
	`idPerfil` INT AUTO_INCREMENT NOT NULL,
	`cvePerfil` VARCHAR(120) NOT NULL,
	`descPerfil` VARCHAR(155) NULL,
	`lectura` INT NOT NULL,
	`escritura` INT NOT NULL,
	`modificacion` INT NOT NULL,
	`createdBy` INT NOT NULL,
	`createdDate` DATETIME NOT NULL,
	PRIMARY KEY (`idPerfil`)
);
CREATE TABLE `tUbicacion`(
	`idUbicacion` INT NOT NULL,
	`idEntrada` INT NOT NULL,
	`createdBy` INT NOT NULL,
	`createdDate` DATETIME NOT NULL,
	`updatedBy` INT NULL,
	`updatedDate` DATETIME NULL,
	CONSTRAINT pk_UbicacionId PRIMARY KEY (`idUbicacion`,`idEntrada`),
	CONSTRAINT fk_tUbicacion_tUbicacionAlmacen FOREIGN KEY (`idUbicacion`) REFERENCES tUbicacionAlmacen(`idUbicacion`)
);

CREATE VIEW `vInventarioReal` AS
SELECT
	`pro`.`idProducto` AS `idProducto`, 
	`pro`.`idSKU` AS `idSKU`,
	(SUM(`e`.`cantidad`) - SUM(`s`.`cantidad`)) AS `cantidadReal`
FROM `tProducto` AS `pro` 
INNER JOIN `tEntradas` AS `e` ON `pro`.`idProducto` = `e`.`idProducto`
INNER JOIN `tSalidas` AS `s` ON `pro`.`idProducto` = `s`.`idProducto`
GROUP BY `pro`.`idProducto`,`pro`.`idSKU`;