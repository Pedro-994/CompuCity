CREATE DATABASE COMPUCITY;
USE COMPUCITY;

CREATE TABLE USUARIO(
    IDUSUARIO INT(5) PRIMARY KEY,
    NOMBRE VARCHAR(20),
    APELLIDO_PU VARCHAR(20),
    APELLIDO_MU VARCHAR(20),
    NUMPEDIDO INT,
    NOMBRE_USUARIO VARCHAR(20) UNIQUE,
    ESTADO VARCHAR(15),
    CIUDAD VARCHAR(15),
    COLONIA VARCHAR(20),
    CALLE VARCHAR(20),
    FECHA_NAC DATE,
    TELEFONO VARCHAR(10),
    CONTRASENIA VARCHAR(20),
    CORREO VARCHAR(30) UNIQUE,
    CODIGO_POSTAL VARCHAR(8),
    NUMERO_INT VARCHAR(5),
    NUMERO_EXT VARCHAR(5)
);

 CREATE TABLE CATEGORIA(
	IDCATEGORIA INT(5) PRIMARY KEY,
    NOMBRECAT VARCHAR(30),
    DESCRIPCIONCAT TEXT(300)
 );
  
CREATE TABLE PEDIDO(
    IDPEDIDO INT(5) PRIMARY KEY,
    FECHA_CREACION DATE,
    MONTO_T_PAGO FLOAT(8),
    IDUSUARIO INT(5),
    FOREIGN KEY(IDUSUARIO) REFERENCES USUARIO(IDUSUARIO)
); 

CREATE TABLE PRODUCTO(
    IDPRODUCTO INT(5) PRIMARY KEY,
    IDCATEGORIA INT(5),
    NOMBRE_P VARCHAR(15),
    MARCA VARCHAR(15),
    CANTIDAD_ALMACEN INT(5),
    CARACTERISTICAS VARCHAR(250),
    PRECIO FLOAT(5),
    DESCRIPCION VARCHAR(250),
    COMENTARIOS_PROD VARCHAR(300),
    CANTVENDIDOS INT,  
    DESCUENTO INT,
    img1 TEXT,
    img2 TEXT,
    img3 TEXT,
    img4 TEXT,
    FOREIGN KEY(IDCATEGORIA) REFERENCES CATEGORIA(IDCATEGORIA)
);
 
CREATE TABLE DETPEDIDO(
    IDDETALLE INT(5) PRIMARY KEY,
    IDPEDIDO INT(5),
    IDPRODUCTO INT(5),
    ESTATUS VARCHAR(10),
    INF_ADICIONAL VARCHAR(100),
    CANTIDAD_PROD INT(5),
    FECHA_ENT DATE,
    FOREIGN KEY(IDPEDIDO) REFERENCES PEDIDO(IDPEDIDO),
    FOREIGN KEY(IDPRODUCTO) REFERENCES PRODUCTO(IDPRODUCTO)
);
 
CREATE TABLE TARJETA(
    IDTARJETA INT(10) PRIMARY KEY,
    NOMBRE_T VARCHAR(20),
    APELLIDO_PT VARCHAR(20),
    APELLIDO_MT VARCHAR(20),
    NUM_TARJETA VARCHAR(15),
    NIP VARCHAR(5),
    TIPO_T VARCHAR(10),
    IDUSUARIO INT(5),
    FOREIGN KEY(IDUSUARIO) REFERENCES USUARIO(IDUSUARIO)
)
