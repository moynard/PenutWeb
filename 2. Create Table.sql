ALTER TABLE  `tusuario` ADD UNIQUE (
`email`
)
ALTER TABLE  `tusuario` CHANGE  `cveUsuario`  `passwordU` VARCHAR( 90 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL