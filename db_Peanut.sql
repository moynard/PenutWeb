create table tProveedor(
	idProveedor int auto_increment,
	proveedor varchar(140) not null,
	email varchar(70),
	nombreCorto varchar(70) not null,
	contraseña varchar(70) not null,
	Primary key(idPro)
);
create table tSKU(
	idSKUInt int auto_increment,
	idSKU varchar(150) not null,
	nomProducto varchar(70) not null,
	idProveedor int not null,
	primary key(idSKUInt)
);
create table tEstado(
	idEstado int,
	estado varchar(70),
	primary key (idEstado)
);
create table tRegMovimientos(
	idMovimiento int auto_increment,
	numInterno int not null,
	numProveedor int not null,
	numComercial int not null,
	fecha datetime not null,
	tipoDeMovimiento char not null,
	numPedimento numeric(6) not null,
	notas varchar(350),
	createBy varchar(150) not null,
	createDate datetime not null,
	updateBy varchar(150) not null,
	updateDate datetime not null,
	primary key (idMovimiento)
);
create table tSalidaTemp(
	idSalidaTemp int auto_increment,
	idSKUInt int not null,
	cantidad numeric(6) not null,
	primary key (idSalidaTemp)
);
create table tEntradas(
	idEntrada int auto_increment,
	idMovimiento int not null,
	idSKUInt int not null,
	lote varchar(150) not null,
	idEstado int not null,
	serie varchar(150) not null,
	fechaLote datetime,
	cantidad int not null,
	unidad numeric(6) not null,
	idUbicacionAlmacen varchar(10) not null,
	primary key (idEntrada)
);
create table tSalidas(
	idSalida int auto_increment,
	idMovimiento int not null,
	idSKUInt int not null,
	lote varchar(150) not null,
	idEstado int not null,
	serie varchar(150) not null,
	fechaLote datetime,
	cantidad int not null,
	unidad numeric(6) not null,
	idUbicacionAlmacen varchar(10) not null,
	primary key (idSalida)
);
create table tConverciones (
	idConvercion int auto_increment,
	idSKUInt int not null,
	cantidad int not null,
	unidad varchar(40) not null,
	cantidadEquivalente int not null,
	equivaleUnidad varchar(40) not null,
	primary key (idConvercion)
);
create table tUbicacionesAlmacen(
	idUbicacionAlmacen varchar(10),
	almacen varchar(70),
	modulo varchar(3),
	nivel int not null,
	posicion int not null,
	ultimoCheck datetime not null,
	fechaCheck datetime not null,
	primary key (idUbicacionAlmacen)
);
create table tBitacoraCorreo(
	idBitacoraCorreo int auto_increment,
	idMovimiento int not null,
	remitente varchar(70) not null,
	destinatario varchar(70) not null,
	fechaEnvio datetime not null,
	primary key (idBitacoraCorreo)
);
create table tAjustesCorreo(
	usuario varchar(70) not null,
	contraseña varchar(90) not null,
	smtp varchar(70) not null,
	puerto int not null
);
create table tReferenciaReg(
	idSalida int not null,
	idEntrada int not null
);
create table tUsuarios(
	idUsuarios int auto_increment,
	usuario varchar(90) not null,
	email varchar(90) not null,
	fecha datetime not null,
	primary key (idUsuarios)
);
create table tPerfiles(
	idPerfil int,
	lectura int not null,
	escritura int not null,
	modificacion int not null,
	primary key (idPerfil)
);
create table tUbicaciones(
	idUbicaciones int auto_increment,
	idUbicacionesAlmacen varchar(10) not null,
	idEntrada int not null,
	createBy varchar(150) not null,
	createDate datetime not null,
	updateBy varchar(150) not null,
	updateDate datetime not null,
	primary key (idUbicaciones)
);

create view vRegFisicoReal as select sk.idSKUInt, sk.idSKU, (sum(e.cantidad)-sum(s.cantidad)) from tSKU as sk 
inner join tEntradas as e on sk.idSKUInt = e.idSKUInt
inner join tSalidas as s on sk.idSKUInt = s.idSKUInt