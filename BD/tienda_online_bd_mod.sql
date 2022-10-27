CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1',
  FOREIGN KEY (idcategoria) REFERENCES categoria (idcategoria)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `idrol` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` bit(1) DEFAULT NULL,
  FOREIGN KEY (idrol) REFERENCES rol (idrol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `idusuario` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` bit(1) DEFAULT b'1',
   FOREIGN KEY (idusuario) REFERENCES usuario (idusuario),
   FOREIGN KEY (idpersona) REFERENCES persona (idpersona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `idingreso` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  FOREIGN KEY (idingreso) REFERENCES ingreso (idingreso) ON DELETE CASCADE,
  FOREIGN KEY (idproducto) REFERENCES producto (idproducto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `idusuario` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) DEFAULT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` bit(1) DEFAULT b'1',
  FOREIGN KEY (idusuario) REFERENCES usuario (idusuario),
  FOREIGN KEY (idproducto) REFERENCES producto (idproducto),
  FOREIGN KEY (idpersona) REFERENCES persona (idpersona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL,
  FOREIGN KEY (idventa) REFERENCES venta (idventa) ON DELETE CASCADE,
  FOREIGN KEY (idproducto) REFERENCES producto (idproducto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
