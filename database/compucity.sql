CREATE DATABASE COMPUCITY;
USE COMPUCITY;

CREATE TABLE USUARIO(
    IDUSUARIO INT(5) PRIMARY KEY AUTO_INCREMENT,
    NOMBRE VARCHAR(20),
    APELLIDO_PU VARCHAR(20),
    APELLIDO_MU VARCHAR(20),
    NUMPEDIDO INT DEFAULT 0,
    NOMBRE_USUARIO VARCHAR(20) UNIQUE,
    ESTADO VARCHAR(20),
    CIUDAD VARCHAR(20),
    COLONIA VARCHAR(30),
    CALLE VARCHAR(30),
    FECHA_NAC DATE,
    TELEFONO VARCHAR(10),
    CONTRASENIA VARCHAR(15),
    CORREO VARCHAR(40) UNIQUE,
    CODIGO_POSTAL VARCHAR(5),
    NUMERO_INT VARCHAR(4),
    NUMERO_EXT VARCHAR(4)
);

 CREATE TABLE CATEGORIA(
	IDCATEGORIA INT(5) PRIMARY KEY,
    NOMBRECAT VARCHAR(30),
    DESCRIPCIONCAT TEXT
 );
  
CREATE TABLE PEDIDO(
    IDPEDIDO INT(5) PRIMARY KEY AUTO_INCREMENT,
    FECHA_CREACION DATE,
    SUBTOTAL FLOAT,
    TOTAL FLOAT,
    IDUSUARIO INT(5),
    FOREIGN KEY(IDUSUARIO) REFERENCES USUARIO(IDUSUARIO)
); 

CREATE TABLE PRODUCTO(
    IDPRODUCTO INT(5) PRIMARY KEY AUTO_INCREMENT,
    IDCATEGORIA INT(5),
    NOMBRE_P VARCHAR(100),
    MARCA VARCHAR(15),
    CANTIDAD_ALMACEN INT(5),
    CARACTERISTICAS VARCHAR(250),
    PRECIO FLOAT,
    DESCRIPCION VARCHAR(250),
    COMENTARIOS_PROD VARCHAR(300),
    CANTVENDIDOS INT,  
    DESCUENTO INT,
    ESTADO VARCHAR(20),
    img1 TEXT,
    img2 TEXT,
    img3 TEXT,
    img4 TEXT,
    FOREIGN KEY(IDCATEGORIA) REFERENCES CATEGORIA(IDCATEGORIA)
);
 
CREATE TABLE DETPEDIDO(
    IDDETALLE INT(5) PRIMARY KEY AUTO_INCREMENT,
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
    NUM_TARJETA VARCHAR(20),
    NIP VARCHAR(5),
    TIPO_T VARCHAR(20),
    IDUSUARIO INT(5),
    FOREIGN KEY(IDUSUARIO) REFERENCES USUARIO(IDUSUARIO)
);

/*Funciones*/
/*Funcion para realizar descuento*/
DELIMITER $$
CREATE FUNCTION DESCUENTO(sub FLOAT,descu INT)
RETURNS FLOAT
BEGIN
DECLARE descuento float;
SET descuento = (descu/100)*sub;
RETURN (sub-descuento);
END $$
/*Funcion para calcular IVA*/
DELIMITER $$
CREATE FUNCTION IVA(SUB FLOAT)
RETURNS FLOAT
BEGIN
RETURN (SUB*1.16);
END $$
/*Funcion para calcular SUBTOTAL*/
DELIMITER $$
CREATE FUNCTION SUBTOTAL(SUB FLOAT)
RETURNS FLOAT
BEGIN
DECLARE SUB FLOAT;
SET SUB = (SELECT SUM(PRECIO) FROM PRODUCTO WHERE IDPRODUCTO = (SELECT IDPRODUCTO FROM DETPEDIDO WHERE IDPEDIDO = (SELECT IDPEDIDO FROM PEDIDO)));
RETURN SUB;
END $$
/*Procedimientos*/
/*Procedimiento creacion usuario*/
DELIMITER $$
CREATE PROCEDURE CREAUSUARIO(IN NOMBRE VARCHAR(20),CONTRASENIA VARCHAR(40),CORREO VARCHAR(30))
BEGIN
INSERT INTO USUARIO(NOMBRE_USUARIO,CONTRASENIA,CORREO) VALUES (NOMBRE,CONTRASENIA,CORREO);
END $$
/*Procedimiento completar datos usuario*/
DELIMITER $$
CREATE PROCEDURE COMPLETADATOS(ID INT(5),
    NOM VARCHAR(20),
    APP VARCHAR(20),
    APM VARCHAR(20),
    EST VARCHAR(20),
    CIU VARCHAR(20),
    COL VARCHAR(30),
    CAL VARCHAR(30),
    FECHA DATE,
    TEL VARCHAR(10),
    CP VARCHAR(5),
    NUMI VARCHAR(4),
    NUME VARCHAR(4))
BEGIN
	UPDATE USUARIO SET NOMBRE = NOM, APELLIDO_PU = APP,APELLIDO_MU = APM, ESTADO = EST,CIUDAD = CIU,COLONIA = COL,CALLE = CAL,
    FECHA_NAC = FECHA,TELEFONO = TEL,CODIGO_POSTAL = CP,NUMERO_INT =NUMI,NUMERO_EXT = NUME  WHERE USUARIO.IDUSUARIO = ID;
END $$
/*Procedimiento inserta Producto*/

DELIMITER $$
CREATE PROCEDURE INSERTAPRODUCTO(
    IDCATEGORIA INT(5),
    NOMBRE_P VARCHAR(100),
    MARCA VARCHAR(15),
    CANTIDAD_ALMACEN INT(5),
    CARACTERISTICAS VARCHAR(250),
    PRECIO FLOAT,
    DESCRIPCION VARCHAR(250),
    img1 TEXT,
    img2 TEXT,
    img3 TEXT,
    img4 TEXT)
BEGIN
	INSERT INTO PRODUCTO(IDCATEGORIA,NOMBRE_P,MARCA,CANTIDAD_ALMACEN,
    CARACTERISTICAS,PRECIO,DESCRIPCION,ESTADO,img1,img2,img3,img4) VALUES (IDCATEGORIA,NOMBRE_P,MARCA,CANTIDAD_ALMACEN,
    CARACTERISTICAS,PRECIO,DESCRIPCION,"Disponible",img1,img2,img3,img4);
END $$
/*Procedimiento inserta categoria*/
DELIMITER $$
CREATE PROCEDURE INSERTACATEGORIA(
	IDCATEGORIA INT(5) ,
    NOMBRECAT VARCHAR(30),
    DESCRIPCIONCAT TEXT(300)
 )
BEGIN
INSERT INTO CATEGORIA VALUES (IDCATEGORIA,NOMBRECAT,DESCRIPCIONCAT);
END $$
/*Procedimiento creacion pedido*/
DELIMITER $$
CREATE PROCEDURE INSERTAPEDIDO(FECHA DATE ,SUBTOTAL FLOAT,TOTAL FLOAT,IDUSUARIO INT(5))
BEGIN
	INSERT INTO PEDIDO VALUES(FECHA,SUBTOTAL,TOTAL,IDUSUARIO);
END $$
/*Procedimiento visualizar los 10 mas vendidos*/
DELIMITER $$
CREATE PROCEDURE MASVENDIDOS()
BEGIN  
    SELECT PRODUCTO.IDPRODUCTO, SUM(PRODUCTO.CANTVENDIDOS) AS TOTALVENDIDOS
	FROM PRODUCTO
	GROUP BY PRODUCTO.IDPRODUCTO
	ORDER BY SUM(PRODUCTO.CANTVENDIDOS) DESC
	LIMIT 0 , 10;
END $$
/*Procedimiento insertar detalle*/
delimiter $$
CREATE PROCEDURE llenado_detalle(
in id1 int(5),
id2 int(5),
id3 int(5),
es varchar(10),
inf varchar (100),
cant int(5),
fec date)
BEGIN
	INSERT INTO detpedido(iddetalle, idpedido, idproducto, estatus, inf_adicional, cantidad_prod, fecha_ent) VALUES (id1, id2, id3, es, inf, cant, fec);
END $$
/*Procedimiento insertar TARJETA*/
DELIMITER $$
CREATE PROCEDURE INSERTATARJETA(
    IDTARJETA INT(10),
    NOMBRE_T VARCHAR(20),
    APELLIDO_PT VARCHAR(20),
    APELLIDO_MT VARCHAR(20),
    NUM_TARJETA VARCHAR(20),
    NIP VARCHAR(5),
    TIPO_T VARCHAR(20),
    IDUSUARIO INT(5)
)
BEGIN
	INSERT INTO TARJETA(IDTARJETA,NOMBRE_T ,APELLIDO_PT,APELLIDO_MT,NUM_TARJETA,NIP,TIPO_T,IDUSUARIO) 
    VALUES (IDTARJETA,NOMBRE_T ,APELLIDO_PT,APELLIDO_MT,NUM_TARJETA,NIP,TIPO_T,IDUSUARIO);
END $$

/*Disparadores*/
/*Disparador actualizar stock despues de compra*/
DELIMITER //
CREATE TRIGGER ACTUALIZA_STOCK BEFORE INSERT ON DETPEDIDO FOR EACH ROW
BEGIN
	UPDATE PRODUCTO SET CANTIDAD_ALMACEN = CANTIDAD_ALMACEN-NEW.CANTIDAD_PROD WHERE IDPRODUCTO=NEW.IDPRODUCTO;
END //
/*Disparador baja logica cuando stock=0*/
DELIMITER //
CREATE TRIGGER STOCKZERO BEFORE UPDATE ON PRODUCTO FOR EACH ROW
BEGIN
	IF(NEW.CANTIDAD_ALMACEN<1) THEN
		 SET NEW.ESTADO = "NO DISPONIBLE";
	END IF;
END //
/*Disparador COMPRA 0 */
DELIMITER //
CREATE TRIGGER PRIMERACOMPRA BEFORE INSERT ON PEDIDO FOR EACH ROW
BEGIN
	DECLARE NP int;
	SET NP = (SELECT NUMPEDIDO FROM USUARIO WHERE IDUSUARIO = NEW.IDUSUARIO);
	IF(!NP) THEN
         SET NEW.TOTAL = (SELECT DESCUENTO((NEW.TOTAL),10));
		END IF;
END //
/*Disparador ACTUALIZA NUMERO DE PEDIDO*/
DELIMITER //
CREATE TRIGGER NUMEROPEDIDO BEFORE INSERT ON pedido FOR EACH ROW
BEGIN
	UPDATE USUARIO SET NUMPEDIDO = NUMPEDIDO+1 WHERE IDUSUARIO = NEW.IDUSUARIO;
END //
drop trigger NUMEROPEDIDO
INSERT INTO PEDIDO(TOTAL,IDUSUARIO) VALUES (100,5)


/*funcion muestre cantidad adquiridos por el cliente*/
DELIMITER //


/*MOSTRAR PEDIDOS REALIZADOS POR EL CLIENTE Y SUS DATOS */
DELIMITER //
 


CALL INSERTACATEGORIA(1,'Tarjeta grafica','Tarjeta grafica');
CALL INSERTACATEGORIA(2,'Procesador','Procesador amd, intel');
CALL INSERTACATEGORIA(3,'Fuente de poder','Fuente de poder');
CALL INSERTACATEGORIA(4,'Motherboard','Tarjeta madre');
CALL INSERTACATEGORIA(5,'Gabinete','torres atx,mini atx, micro atx');
CALL INSERTACATEGORIA(6,'Monitor','monitores y pantallas');
CALL INSERTACATEGORIA(7,'Enfriamiento','ventiladores,disipadores,refrigeracion');
CALL INSERTACATEGORIA(8,'Almacenamiento','hhd,ssd,usb');
CALL INSERTACATEGORIA(9,'Periferico','mouse,audifonos,impresoras,teclados');
CALL INSERTACATEGORIA(10,'Laptop','Equipo portatil');

CALL llenado_detalle (1, 1, 20, 'PENDIENTE', 'Entregar a Ricardo', 1, '2019-07-30');
CALL llenado_detalle (2, 1, 15, 'ENTREGADO', 'Entregar a Ricardo', 1, '2019-07-1');
CALL llenado_detalle (3, 1, 9, 'EN CAMINO', 'Entregar a Ricardo', 1, '2019-07-22');
CALL llenado_detalle (4, 1, 38, 'EN CAMINO', 'Entregar a Ricardo', 4, '2019-7-22');
CALL llenado_detalle (5, 2, 22, 'EN CAMINO', 'Entregar a Lucina', 2, '2019-07-20');
CALL llenado_detalle (6, 2, 50, 'ENTRGADO', 'entregar a Lucian', 1, '2019-07-12');
CALL llenado_detalle (7, 2, 50, 'PENDIENTE', 'Entregar a Lucina', 1, '2019-08-04');
CALL llenado_detalle (8, 2, 48, 'ENTREGADO', 'Entregar a Lucian', 2, '2019-07-04');
CALL llenado_detalle (9, 3, 54, 'EN CAMINO', 'Entregar a Alfonso', 1, '2019-07-21');
CALL llenado_detalle (10, 3, 73, 'PENDIENTE', 'Entregar a Alfonso', 1, '2019-08-10');
CALL llenado_detalle (11, 3, 62, 'PENDIENTE', 'Entregar a Alfonso', 1, '2019-08-10');
CALL llenado_detalle (12, 3, 25, 'EN CAMINO', 'Entregar a Alfonso', 1, '2019-07-21');
CALL llenado_detalle (13, 4, 43, 'PENDIENTE', 'Entregar a Miguel', 2, '2019-08-05');
CALL llenado_detalle (14, 4, 83, 'ENTRGADO', 'Entregar a Miguel', 1, '2019-07-15');
CALL llenado_detalle (15, 4, 92, 'ENTREGADO', 'Entregar a Miguel', 3, '2019-07-15');
CALL llenado_detalle (16, 4, 35, 'PENDIENTE', 'Entregar a Miguel', 1, '2019-08-05');
CALL llenado_detalle (17, 5, 37, 'EN CAMINO', 'Entregar a Roberto', 1, '2019-07-24');
CALL llenado_detalle (18, 5, 28, 'PENDIENTE', 'Entregar a Roberto', 1,'2019-08-02');
CALL llenado_detalle (19, 5, 29, 'EN CAMINO', 'Entregar a Roberto', 1, '2019-07-24');
CALL llenado_detalle (20, 5, 54, 'EN CAMINO', 'Entregar a Roberto', 1,'2019-07-24');
CALL llenado_detalle (21, 6, 6, 'PENDIENTE', 'Entregar a Paulina', 1, '2019-08-04');
CALL llenado_detalle (22, 6, 9, 'PENDIENTE', 'Entregar a Paulina', 2, '2019-08-04');
CALL llenado_detalle (23, 6, 8, 'EN CAMINO', 'Entregar a Paulina', 2, '2019-07-22');
CALL llenado_detalle (24,6,98,'PENDIENTE','Entregar a Paulina',1,'2019-08-04');
CALL llenado_detalle (25,7,83,'EN CAMINO','Entregar a Ariel',1,'2019-07-28');
CALL llenado_detalle (26, 7, 1, 'EN CAMINO', 'Entregar a Ariel', 1, '2019-07-28');
CALL llenado_detalle (27, 7, 3, 'PENDIENTE', 'Entregar a Ariel', 1, '2019-08-08');
CALL llenado_detalle (28, 7, 36, 'ENTREGADO', 'Entregar a Ariel', 1, '2019-06-22');
CALL llenado_detalle (29, 8, 36, 'ENTREGADO', 'Entragar a Michelle', 1, '2019-06-30');
CALL llenado_detalle (30, 8, 89, 'ENTREGADO', 'Entragar a Michelle', 1, '2019-06-30');
CALL llenado_detalle (31, 8, 37, 'ENTREGADO', 'Entragar a Michelle', 1, '2019-06-30');
CALL llenado_detalle (32, 8, 84, 'PENDIENTE', 'Entragar a Michelle', 3, '2019-08-01');
CALL llenado_detalle (33, 9, 9, 'EN CAMINO', 'Entragar a Alberto', 1, '2019-08-01');
CALL llenado_detalle (34, 9, 22, 'EN CAMINO', 'Entragar a Alberto', 1, '2019-08-01');
CALL llenado_detalle (35, 9, 12, 'PENDIENTE', 'Entragar a Alberto', 3, '2019-08-14');
CALL llenado_detalle (36, 9, 18, 'EN CAMINO', 'Entragar a Alberto', 1, '2019-08-01');
CALL llenado_detalle (37, 10, 28, 'ENTREGADO', 'Entrgar a Lorena', 1, '2019-07-10');
CALL llenado_detalle (38, 10, 93, 'PENDIENTE', 'Entrgar a Lorena', 1, '2019-08-06');
CALL llenado_detalle (39, 10, 29, 'ENTREGADO', 'Entrgar a Lorena', 1, '2019-07-10');
CALL llenado_detalle (40, 10, 25, 'EN CAMINO', 'Entrgar a Lorena', 1, '2019-07-20');
CALL llenado_detalle (41, 11, 27, 'EN CAMINO', 'Entregar a Jerson', 2, '2019-07-21');
CALL llenado_detalle (42, 11, 83, 'ENTREGADO', 'Entregar a Jerson', 1, '2019-07-15');
CALL llenado_detalle (43, 11, 5, 'PENDIENTE', 'Entregar a Jerson', 3, '2019-08-07');
CALL llenado_detalle (44, 11, 3, 'PENDIENTE', 'Entregar a Jerson', 3, '2019-08-07');
CALL llenado_detalle (45, 12, 1, 'ENTREGADO', 'Entrgar a Marco', 1, '2019-06-22');
CALL llenado_detalle (46, 12, 33, 'EN CAMINO', 'Entrgar a Marco', 1, '2019-07-20');
CALL llenado_detalle (47, 12, 48, 'EN CAMINO', 'Entrgar a Marco', 1, '2019-07-20');
CALL llenado_detalle (48, 12, 47, 'EN CAMINO', 'Entrgar a Marco', 1, '2019-07-20');
CALL llenado_detalle (49, 13, 50, 'EN CAMINO', 'Entrgar a Ameriaca', 1, '2019-07-22');
CALL llenado_detalle (50, 13, 51, 'EN CAMINO', 'Entrgar a Ameriaca', 1, '2019-07-22');
CALL llenado_detalle (51, 13, 2, 'EN CAMINO', 'Entrgar a Ameriaca', 1, '2019-07-22');
CALL llenado_detalle (52, 13, 4, 'EN CAMINO', 'Entrgar a Ameriaca', 1, '2019-07-22');
CALL llenado_detalle (53, 14, 6, 'PENDIENTE', 'Entragar a Luis', 2, '2019-08-10');
CALL llenado_detalle (54, 14, 59, 'PENDIENTE', 'Entragar a Luis', 1, '2019-08-10');
CALL llenado_detalle (55, 14, 48, 'PENDIENTE', 'Entragar a Luis', 2, '2019-08-10');
CALL llenado_detalle (56, 14, 27, 'PENDIENTE', 'Entragar a Luis', 1, '2019-08-10');
CALL llenado_detalle (57, 15, 36, 'EN CAMINO', 'Entragar a Marisol', 1, '2019-07-21');
CALL llenado_detalle (58, 15, 38, 'EN CAMINO', 'Entragar a Marisol', 1, '2019-07-21');
CALL llenado_detalle (59, 15, 20, 'EN CAMINO', 'Entragar a Marisol', 1, '2019-07-21');
CALL llenado_detalle (60, 15, 3, 'EN CAMINO', 'Entragar a Marisol', 3, '2019-07-21');
CALL llenado_detalle (61, 16, 40, 'ENTREAGADO', 'Entregar a Pablo', 1, '2019-06-03');
CALL llenado_detalle (62, 16, 46, 'ENTREGADO', 'Entregar a Pablo', 1, '2019-06-03');
CALL llenado_detalle (63, 16, 92, 'ENTREGADO', 'Entregar a Pablo', 1, '2019-06-03');
CALL llenado_detalle (64, 16, 46, 'ENTREGADO', 'Entregar a Pablo', 1, '2019-06-03');
CALL llenado_detalle (65, 17, 84, 'PENDIENTE', 'Entregar a Alejandro', 2, '2019-08-15');
CALL llenado_detalle (66, 17, 17, 'PENDIENTE', 'Entregar a Alejandro', 1, '2019-08-15');
CALL llenado_detalle (67, 17, 27, 'PENDIENTE', 'Entregar a Alejandro', 1, '2019-08-15');
CALL llenado_detalle (68, 17, 34, 'PENDIENTE', 'Entregar a Alejandro', 1, '2019-08-15');
CALL llenado_detalle (69, 18, 50, 'ENTREGADO', 'Entregar a Monica', 2, '2019-05-27');
CALL llenado_detalle (70, 18, 82, 'ENTREGADO', 'Entregar a Monica', 2, '2019-05-27');
CALL llenado_detalle (71, 18, 9, 'ENTREGADO', 'Entregar a Monica', 2, '2019-05-27');
CALL llenado_detalle (72, 18, 20, 'ENTREGADO', 'Entregar a Monica', 2, '2019-05-27');
CALL llenado_detalle (73, 19, 19, 'PENDIENTE', 'Entregar a Son', 1, '2019-08-25');
CALL llenado_detalle (74, 19, 32, 'PENDIENTE', 'Entregar a Son', 1, '2019-08-25');
CALL llenado_detalle (75, 19, 63, 'PENDIETE', 'Entregar a Son', 1, '2019-08-25');
CALL llenado_detalle (76, 19, 72, 'PENDIENTE', 'Entregar a Son', 1, '2019-08-25');
CALL llenado_detalle (77, 20, 29, 'EN CAMINO', 'Entregar a Maria', 2, '2019-07-29');
CALL llenado_detalle (78, 20, 35, 'EN CAMINO', 'Entregar a Maria', 1, '2019-07-29');
CALL llenado_detalle (79, 20, 37, 'EN CAMINO', 'Entregar a Maria', 1, '2019-07-29');
CALL llenado_detalle (80, 20, 20, 'EN CAMINO', 'Entregar a Maria', 3, '2019-07-29');
CALL llenado_detalle (81, 21, 64, 'ENTREGADO', 'Entrgar a Daniela', 1, '2019-05-29');
CALL llenado_detalle (82, 21, 19, 'ENTREGADO', 'Entrgar a Daniela', 1, '2019-05-29');
CALL llenado_detalle (83, 21, 16, 'ENTREGADO', 'Entrgar a Daniela', 1, '2019-05-29');
CALL llenado_detalle (84, 21, 27, 'ENTREGADO', 'Entrgar a Daniela', 1, '2019-05-29');
CALL llenado_detalle (85, 22, 34, 'PENDIENTE', 'Etregar a Roger', 2, '2019-09-01');
CALL llenado_detalle (86, 22, 81, 'PENDIENTE', 'Etregar a Roger', 2, '2019-09-01');
CALL llenado_detalle (87, 22, 32, 'PENDIENTE', 'Etregar a Roger', 2, '2019-09-01');
CALL llenado_detalle (88, 22, 73, 'PENDIENTE', 'Etregar a Roger', 2, '2019-09-01');
CALL llenado_detalle (89, 23, 94, 'EN CAMINO', 'Etregar a Pedro', 5, '2019-08-01');
CALL llenado_detalle (90, 23, 19, 'EN CAMINO', 'Etregar a Pedro', 5, '2019-08-01');
CALL llenado_detalle (91, 23, 82, 'EN CAMINO', 'Etregar a Pedro', 5, '2019-08-01');
CALL llenado_detalle (92, 23, 28, 'EN CAMINO', 'Etregar a Pedro', 5, '2019-08-01');
CALL llenado_detalle (93, 24, 19, 'PENDIENTE', 'Etregar a Saul', 1, '2019-09-01');
CALL llenado_detalle (94, 24, 25, 'PENDIENTE', 'Etregar a Saul', 1, '2019-09-01');
CALL llenado_detalle (95, 24, 52, 'PENDIENTE', 'Etregar a Saul', 1, '2019-09-01');
CALL llenado_detalle (96, 24, 56, 'PENDIENTE', 'Etregar a Saul', 1, '2019-09-01');
CALL llenado_detalle (97, 25, 91, 'ENTREGADO', 'Etregar a Manuel', 1, '2019-05-01');
CALL llenado_detalle (98, 25, 26, 'ENTREGADO', 'Etregar a Manuel', 2, '2019-05-01');
CALL llenado_detalle (99, 25, 15, 'ENTREGADO', 'Etregar a Manuel', 3, '2019-05-01');
CALL llenado_detalle (100, 25, 9, 'ENTREGADO', 'Etregar a Manuel', 4, '2019-05-01');
CALL llenado_detalle (101,26,100,'EN CAMINO','Entregar a Carlos',1,'2019-08-01');
CALL llenado_detalle (102,26,19,'EN CAMINO','Entregar a Carlos',1,'2019-08-01');
CALL llenado_detalle (103,26,15,'EN CAMINO','Entregar a Carlos',1,'2019-08-01');
CALL llenado_detalle (104,26,27,'EN CAMINO','Entregar a Carlos',1,'2019-08-01');
CALL llenado_detalle (105,27,26,'PENDIENTE','Entregar a Josefina',2,'2019-08-17');
CALL llenado_detalle (106,27,47,'PENDIENTE','Entregar a Josefina',1,'2019-08-17');
CALL llenado_detalle (107,27,18,'PENDIENTE','Entregar a Josefina',1,'2019-08-17');
CALL llenado_detalle (108,27,9,'PENDIENTE','Entregar a Josefina',1,'2019-08-17');
CALL llenado_detalle (109,28,3,'EN CAMINO','Entregar a Marcos',2,'2019-08-02');
CALL llenado_detalle (110,28,6,'EN CAMINO','Entregar a Marcos',2,'2019-08-02');
CALL llenado_detalle (111,28,7,'EN CAMINO','Entregar a Marcos',2,'2019-08-02');
CALL llenado_detalle (112,28,27,'EN CAMINO','Entregar a Marcos',2,'2019-08-02');
CALL llenado_detalle (113,29,91,'ENTREGADO','Etregar a Mariela',1,'2019-06-05');
CALL llenado_detalle (114,29,61,'ENTREGADO','Etregar a Mariela',1,'2019-06-05');
CALL llenado_detalle (115,29,42,'ENTREGADO','Etregar a Mariela',3,'2019-06-05');
CALL llenado_detalle (116,29,72,'ENTREGADO','Etregar a Mariela',1,'2019-06-05');
CALL llenado_detalle (117,30,35,'EN CAMINO','Entregar a Juan',2,'2019-08-16');
CALL llenado_detalle (118,30,81,'EN CAMINO','Entregar a Juan',3,'2019-08-16');
CALL llenado_detalle (119,30,52,'EN CAMINO','Entregar a Juan',4,'2019-08-16');
CALL llenado_detalle (120,30,73,'EN CAMINO','Entregar a Juan',6,'2019-08-16');
CALL llenado_detalle (121,31,27,'PENDIENTE','Entregar a Manuel',1,'2019-09-09');
CALL llenado_detalle (122,31,36,'PENDIENTE','Entregar a Manuel',1,'2019-09-09');
CALL llenado_detalle (123,31,26,'PENDIENTE','Entregar a Manuel',1,'2019-09-09');
CALL llenado_detalle (124,31,81,'PENDIENTE','Entregar a Manuel',1,'2019-09-09');
CALL llenado_detalle (125,32,93,'ENTREGADO','Entregar a Joselyne',2,'2019-04-30');
CALL llenado_detalle (126,32,27,'ENTREGADO','Entregar a Joselyne',2,'2019-04-30');
CALL llenado_detalle (127,32,15,'ENTREGADO','Entregar a Joselyne',2,'2019-04-30');
CALL llenado_detalle (128,32,92,'ENTREGADO','Entregar a Joselyne',2,'2019-04-30');
CALL llenado_detalle (129,33,100,'EN CAMINO','Entregar a Roberto',1,'2019-07-30');
CALL llenado_detalle (130,33,18,'EN CAMINO','Entregar a Roberto',2,'2019-07-30');
CALL llenado_detalle (131,33,46,'EN CAMINO','Entregar a Roberto',2,'2019-07-30');
CALL llenado_detalle (132,33,35,'EN CAMINO','Entregar a Roberto',1,'2019-07-30');
CALL llenado_detalle (133,34,49,'ENTREGADO','Entregar a Mell',3,'2019-07-01');
CALL llenado_detalle (134,34,18,'ENTREGADO','Entregar a Mell',1,'2019-07-01');
CALL llenado_detalle (135,34,49,'ENTREGADO','Entregar a Mell',1,'2019-07-01');
CALL llenado_detalle (136,34,36,'ENTREGADO','Entregar a Mell',1,'2019-07-01');
CALL llenado_detalle (137,35,11,'EN CAMINO','Entregar a Rosa',1,'2019-07-20');
CALL llenado_detalle (138,35,20,'EN CAMINO','Entregar a Rosa',2,'2019-07-20');
CALL llenado_detalle (139,35,10,'EN CAMINO','Entregar a Rosa',2,'2019-07-20');
CALL llenado_detalle (140,35,41,'EN CAMINO','Entregar a Rosa',2,'2019-07-20');
CALL llenado_detalle (141,36,17,'PENDIENTE','Entregar a Meirsa',1,'2019-10-01');
CALL llenado_detalle (142,36,93,'PENDIENTE','Entregar a Meirsa',1,'2019-10-01');
CALL llenado_detalle (143,36,15,'PENDIENTE','Entregar a Meirsa',1,'2019-10-01');
CALL llenado_detalle (144,36,30,'PENDIENTE','Entregar a Meirsa',1,'2019-10-01');
CALL llenado_detalle (145,37,16,'EN CAMINO','Entregar a Carmen',3,'2019-08-01');
CALL llenado_detalle (146,37,14,'EN CAMINO','Entregar a Carmen',1,'2019-08-01');
CALL llenado_detalle (147,37,13,'EN CAMINO','Entregar a Carmen',2,'2019-08-01');
CALL llenado_detalle (148,37,12,'EN CAMINO','Entregar a Carmen',1,'2019-08-01');
CALL llenado_detalle (149,38,9,'PENDIENTE','Entregar a Jimena',1,'2019-08-19');
CALL llenado_detalle (150,38,3,'PENDIENTE','Entregar a Jimena',1,'2019-08-19');
CALL llenado_detalle (151,38,5,'PENDIENTE','Entregar a Jimena',1,'2019-08-19');
CALL llenado_detalle (152,38,8,'PENDIENTE','Entregar a Jimena',1,'2019-08-19');
CALL llenado_detalle (153,39,15,'ENTREGADO','Entregar a Sergio',2,'2019-06-30');
CALL llenado_detalle (154,39,18,'ENTREGADO','Entregar a Sergio',2,'2019-06-30');
CALL llenado_detalle (155,39,19,'ENTREGADO','Entregar a Sergio',2,'2019-06-30');
CALL llenado_detalle (156,39,75,'ENTREGADO','Entregar a Sergio',2,'2019-06-30');
CALL llenado_detalle (157,40,76,'PENDIENTE','Entregar a Melisa',1,'2019-08-19');
CALL llenado_detalle (158,40,91,'PENDIENTE','Entregar a Melisa',1,'2019-08-19');
CALL llenado_detalle (159,40,16,'PENDIENTE','Entregar a Melisa',1,'2019-08-19');
CALL llenado_detalle (160,40,26,'PENDIENTE','Entregar a Melisa',1,'2019-08-19');
CALL llenado_detalle (161,41,40,'EN CAMINO','Entregar a Fernanda',3,'2019-08-01');
CALL llenado_detalle (162,41,7,'EN CAMINO','Entregar a Fernanda',3,'2019-08-01');
CALL llenado_detalle (163,41,28,'EN CAMINO','Entregar a Fernanda',3,'2019-08-01');
CALL llenado_detalle (164,41,1,'EN CAMINO','Entregar a Fernanda',3,'2019-08-01');
CALL llenado_detalle (165,42,100,'PENDIENTE','Entregar a Karen',1,'2019-08-29');
CALL llenado_detalle (166,42,17,'PENDIENTE','Entregar a Karen',1,'2019-08-29');
CALL llenado_detalle (167,42,20,'PENDIENTE','Entregar a Karen',1,'2019-08-29');
CALL llenado_detalle (168,42,47,'PENDIENTE','Entregar a Karen',1,'2019-08-29');
CALL llenado_detalle (169,43,70,'ENTREGADO','Entregar a Marta',2,'2019-07-01');
CALL llenado_detalle (170,43,97,'ENTREGADO','Entregar a Marta',2,'2019-07-01');
CALL llenado_detalle (171,43,86,'ENTREGADO','Entregar a Marta',2,'2019-07-01');
CALL llenado_detalle (172,43,52,'ENTREGADO','Entregar a Marta',2,'2019-07-01');
CALL llenado_detalle (173,44,5,'PENDIENTE','Entregar a Larisa',1,'2019-09-03');
CALL llenado_detalle (174,44,10,'PENDIENTE','Entregar a Larisa',1,'2019-09-03');
CALL llenado_detalle (175,44,93,'PENDIENTE','Entregar a Larisa',1,'2019-09-03');
CALL llenado_detalle (176,44,91,'PENDIENTE','Entregar a Larisa',1,'2019-09-03');
CALL llenado_detalle (177,45,18,'EN CAMINO','Entregar a Francisco',1,'2019-07-28');
CALL llenado_detalle (178,45,36,'EN CAMINO','Entregar a Francisco',1,'2019-07-28');
CALL llenado_detalle (179,45,19,'EN CAMINO','Entregar a Francisco',1,'2019-07-28');
CALL llenado_detalle (180,45,10,'EN CAMINO','Entregar a Francisco',1,'2019-07-28');
CALL llenado_detalle (181,46,53,'ENTREGADO','Entregar a Natalia',1,'2019-07-02');
CALL llenado_detalle (182,46,93,'ENTREGADO','Entregar a Natalia',3,'2019-07-02');
CALL llenado_detalle (183,46,78,'ENTREGADO','Entregar a Natalia',4,'2019-07-02');
CALL llenado_detalle (184,46,70,'ENTREGADO','Entregar a Natalia',2,'2019-07-02');
CALL llenado_detalle (185,47,39,'PENDIENTE','Entregar a nombregenerico',1,'2019-11-30');
CALL llenado_detalle (186,47,18,'PENDIENTE','Entregar a nombregenerico',1,'2019-11-30');
CALL llenado_detalle (187,47,34,'PENDIENTE','Entregar a nombregenerico',1,'2019-11-30');
CALL llenado_detalle (188,47,25,'PENDIENTE','Entregar a nombregenerico',1,'2019-11-30');
CALL llenado_detalle (189,48,83,'ENTREGADO','Entregar a Delfino',2,'2019-04-04');
CALL llenado_detalle (190,48,35,'ENTREGADO','Entregar a Delfino',2,'2019-04-04');
CALL llenado_detalle (191,48,19,'ENTREGADO','Entregar a Delfino',2,'2019-04-04');
CALL llenado_detalle (192,48,45,'ENTREGADO','Entregar a Delfino',2,'2019-04-04');
CALL llenado_detalle (193,49,91,'EN CAMINO','Entregar a Betzabel',1,'2019-07-21');
CALL llenado_detalle (194,49,9,'EN CAMINO','Entregar a Betzabel',1,'2019-07-21');
CALL llenado_detalle (195,49,1,'EN CAMINO','Entregar a Betzabel',1,'2019-07-21');
CALL llenado_detalle (196,49,36,'EN CAMINO','Entregar a Betzabel',1,'2019-07-21');
CALL llenado_detalle (197,50,19,'ENTREGADO','Etregar a Kesika',2,'2019-02-10');
CALL llenado_detalle (198,50,98,'ENTREGADO','Etregar a Kesika',2,'2019-02-10');
CALL llenado_detalle (199,50,14,'ENTREGADO','Etregar a Kesika',2,'2019-02-10');
CALL llenado_detalle (200,50,27,'ENTREGADO','Etregar a Kesika',2,'2019-02-10');
CALL llenado_detalle (201,51,13,'EN CAMINO','Etregar a Kimberli',1,'2019-07-20');
CALL llenado_detalle (202,51,32,'EN CAMINO','Etregar a Kimberli',1,'2019-07-20');
CALL llenado_detalle (203,51,48,'EN CAMINO','Etregar a Kimberli',1,'2019-07-20');
CALL llenado_detalle (204,51,92,'EN CAMINO','Etregar a Kimberli',1,'2019-07-20');
CALL llenado_detalle (205,52,1,'PENDIENTE','Entregar a Ailyn',2,'2019-08-16');
CALL llenado_detalle (206,52,13,'PENDIENTE','Entregar a Ailyn',2,'2019-08-16');
CALL llenado_detalle (207,52,27,'PENDIENTE','Entregar a Ailyn',2,'2019-08-16');
CALL llenado_detalle (208,52,48,'PENDIENTE','Entregar a Ailyn',2,'2019-08-16');
CALL llenado_detalle (209,53,95,'ENTREGADO','Entregar a Moises',1,'2019-05-26');
CALL llenado_detalle (210,53,71,'ENTREGADO','Entregar a Moises',1,'2019-05-26');
CALL llenado_detalle (211,53,61,'ENTREGADO','Entregar a Moises',1,'2019-05-26');
CALL llenado_detalle (212,53,51,'ENTREGADO','Entregar a Moises',1,'2019-05-26');
CALL llenado_detalle (213,54,42,'PENDIENTE','Entregar a Fernando',6,'2019-09-01');
CALL llenado_detalle (214,54,31,'PENDIENTE','Entregar a Fernando',6,'2019-09-01');
CALL llenado_detalle (215,54,90,'PENDIENTE','Entregar a Fernando',6,'2019-09-01');
CALL llenado_detalle (216,54,98,'PENDIENTE','Entregar a Fernando',6,'2019-09-01');
CALL llenado_detalle (217,55,94,'ENTREGADO','Entrgar a Belen',4,'2019-07-19');
CALL llenado_detalle (218,55,73,'ENTREGADO','Entrgar a Belen',4,'2019-07-19');
CALL llenado_detalle (219,55,81,'ENTREGADO','Entrgar a Belen',4,'2019-07-19');
CALL llenado_detalle (220,55,86,'ENTREGADO','Entrgar a Belen',4,'2019-07-19');
CALL llenado_detalle (221,56,19,'PENDIENTE','Entregar a Rodrigo',1,'2019-08-20');
CALL llenado_detalle (222,56,1,'PENDIENTE','Entregar a Rodrigo',1,'2019-08-20');
CALL llenado_detalle (223,56,9,'PENDIENTE','Entregar a Rodrigo',1,'2019-08-20');
CALL llenado_detalle (224,56,91,'PENDIENTE','Entregar a Rodrigo',1,'2019-08-20');
CALL llenado_detalle (225,57,52,'EN CAMINO','Entregar a Michel',2,'2019-07-22');
CALL llenado_detalle (226,57,51,'EN CAMINO','Entregar a Michel',2,'2019-07-22');
CALL llenado_detalle (227,57,13,'EN CAMINO','Entregar a Michel',2,'2019-07-22');
CALL llenado_detalle (228,57,21,'EN CAMINO','Entregar a Michel',2,'2019-07-22');
CALL llenado_detalle (229,58,1,'PENDIENTE','Entregar a Brayan',1,'2019-08-08');
CALL llenado_detalle (230,58,3,'PENDIENTE','Entregar a Brayan',1,'2019-08-08');
CALL llenado_detalle (231,58,9,'PENDIENTE','Entregar a Brayan',1,'2019-08-08');
CALL llenado_detalle (232,58,2,'PENDIENTE','Entregar a Brayan',1,'2019-08-08');
CALL llenado_detalle (233,59,35,'EN CAMINO','Entregar a Beatris',1,'2019-07-23');
CALL llenado_detalle (234,59,26,'EN CAMINO','Entregar a Beatris',1,'2019-07-23');
CALL llenado_detalle (235,59,71,'EN CAMINO','Entregar a Beatris',1,'2019-07-23');
CALL llenado_detalle (236,59,16,'EN CAMINO','Entregar a Beatris',1,'2019-07-23');
CALL llenado_detalle (237,60,1,'PENDIENTE','Entregar a Monse',1,'2019-09-01');
CALL llenado_detalle (238,60,17,'PENDIENTE','Entregar a Monse',1,'2019-09-01');
CALL llenado_detalle (239,60,38,'PENDIENTE','Entregar a Monse',1,'2019-09-01');
CALL llenado_detalle (240,60,83,'PENDIENTE','Entregar a Monse',1,'2019-09-01');
CALL llenado_detalle (241,61,39,'ENTREGADO','Entregar a Gabriela',1,'2019-06-28');
CALL llenado_detalle (242,61,38,'ENTREGADO','Entregar a Gabriela',1,'2019-06-28');
CALL llenado_detalle (243,61,10,'ENTREGADO','Entregar a Gabriela',1,'2019-06-28');
CALL llenado_detalle (244,61,16,'ENTREGADO','Entregar a Gabriela',1,'2019-06-28');
CALL llenado_detalle (245,62,16,'PENDIENTE','Entregar a Fulano',1,'2019-08-09');
CALL llenado_detalle (246,62,47,'PENDIENTE','Entregar a Fulano',1,'2019-08-09');
CALL llenado_detalle (247,62,27,'PENDIENTE','Entregar a Fulano',1,'2019-08-09');
CALL llenado_detalle (248,62,49,'PENDIENTE','Entregar a Fulano',1,'2019-08-09');
CALL llenado_detalle (249,63,13,'ENTREGADO','Entregar a Mengano',1,'2019-07-18');
CALL llenado_detalle (250,63,38,'ENTREGADO','Entregar a Mengano',1,'2019-07-18');
CALL llenado_detalle (251,63,29,'ENTREGADO','Entregar a Mengano',1,'2019-07-18');
CALL llenado_detalle (252,63,19,'ENTREGADO','Entregar a Mengano',1,'2019-07-18');
CALL llenado_detalle (253,64,20,'PENDIENTE','Entregar a Sotano',1,'2019-08-09');
CALL llenado_detalle (254,64,26,'PENDIENTE','Entregar a Sotano',1,'2019-08-09');
CALL llenado_detalle (255,64,68,'PENDIENTE','Entregar a Sotano',1,'2019-08-09');
CALL llenado_detalle (256,64,69,'PENDIENTE','Entregar a Sotano',1,'2019-08-09');
CALL llenado_detalle (257,65,56,'ENTREGADO','Etregar a Melon',1,'2019-06-06');
CALL llenado_detalle (258,65,28,'ENTREGADO','Etregar a Melon',1,'2019-06-06');
CALL llenado_detalle (259,65,17,'ENTREGADO','Etregar a Melon',1,'2019-06-06');
CALL llenado_detalle (260,65,39,'ENTREGADO','Etregar a Melon',1,'2019-06-06');
CALL llenado_detalle (261,66,68,'EN CAMINO','Entregar a Sandia',1,'2019-07-27');
CALL llenado_detalle (262,66,3,'EN CAMINO','Entregar a Sandia',1,'2019-07-27');
CALL llenado_detalle (263,66,24,'EN CAMINO','Entregar a Sandia',1,'2019-07-27');
CALL llenado_detalle (264,66,29,'EN CAMINO','Entregar a Sandia',1,'2019-07-27');
CALL llenado_detalle (265,67,26,'ENTREGADO','Entregar a Martin',2,'2019-05-30');
CALL llenado_detalle (266,67,10,'ENTREGADO','Entregar a Martin',2,'2019-05-30');
CALL llenado_detalle (267,67,46,'ENTREGADO','Entregar a Martin',2,'2019-05-30');
CALL llenado_detalle (268,67,70,'ENTREGADO','Entregar a Martin',2,'2019-05-30');
CALL llenado_detalle (269,68,85,'PENDIENTE','Entregar a Nayeli',1,'2019-08-20');
CALL llenado_detalle (270,68,90,'PENDIENTE','Entregar a Nayeli',1,'2019-08-20');
CALL llenado_detalle (271,68,21,'PENDIENTE','Entregar a Nayeli',1,'2019-08-20');
CALL llenado_detalle (272,68,12,'PENDIENTE','Entregar a Nayeli',1,'2019-08-20');
CALL llenado_detalle (273,69,34,'ENTREGADO','Entregar a Marea',2,'2019-07-01');
CALL llenado_detalle (274,69,69,'ENTREGADO','Entregar a Marea',2,'2019-07-01');
CALL llenado_detalle (275,69,6,'ENTREGADO','Entregar a Marea',2,'2019-07-01');
CALL llenado_detalle (276,69,7,'ENTREGADO','Entregar a Marea',2,'2019-07-01');
CALL llenado_detalle (277,70,8,'EN CAMINO','Entregar a Eduardo',1,'2019-07-21');
CALL llenado_detalle (278,70,45,'EN CAMINO','Entregar a Eduardo',1,'2019-07-21');
CALL llenado_detalle (279,70,93,'EN CAMINO','Entregar a Eduardo',1,'2019-07-21');
CALL llenado_detalle (280,70,30,'EN CAMINO','Entregar a Eduardo',1,'2019-07-21');
CALL llenado_detalle (281,71,10,'PENDIENTE','Entregar a Graciela',2,'2019-09-01');
CALL llenado_detalle (282,71,99,'PENDIENTE','Entregar a Graciela',2,'2019-09-01');
CALL llenado_detalle (283,71,65,'PENDIENTE','Entregar a Graciela',2,'2019-09-01');
CALL llenado_detalle (284,71,98,'PENDIENTE','Entregar a Graciela',2,'2019-09-01');
CALL llenado_detalle (285,72,40,'EN CAMINO','Entregar a Oswaldo',1,'2019-07-20');
CALL llenado_detalle (286,72,70,'EN CAMINO','Entregar a Oswaldo',1,'2019-07-20');
CALL llenado_detalle (287,72,80,'EN CAMINO','Entregar a Oswaldo',1,'2019-07-20');
CALL llenado_detalle (288,72,43,'EN CAMINO','Entregar a Oswaldo',1,'2019-07-20');
CALL llenado_detalle (289,73,85,'PENDIENTE','Entregar a Trinidad',1,'2019-09-03');
CALL llenado_detalle (290,73,26,'PENDIENTE','Entregar a Trinidad',1,'2019-09-03');
CALL llenado_detalle (291,73,68,'PENDIENTE','Entregar a Trinidad',1,'2019-09-03');
CALL llenado_detalle (292,73,9,'PENDIENTE','Entregar a Trinidad',1,'2019-09-03');
CALL llenado_detalle (293,74,4,'ENTREGADO','Entregar a Antonio',2,'2019-04-17');
CALL llenado_detalle (294,74,34,'ENTREGADO','Entregar a Antonio',2,'2019-04-17');
CALL llenado_detalle (295,74,9,'ENTREGADO','Entregar a Antonio',2,'2019-04-17');
CALL llenado_detalle (296,74,26,'ENTREGADO','Entregar a Antonio',2,'2019-04-17');
CALL llenado_detalle (297,75,68,'PENDIENTE','Entregar a Josue',1,'2019-10-10');
CALL llenado_detalle (298,75,25,'PENDIENTE','Entregar a Josue',1,'2019-10-10');
CALL llenado_detalle (299,75,76,'PENDIENTE','Entregar a Josue',1,'2019-10-10');
CALL llenado_detalle (300,75,98,'PENDIENTE','Entregar a Josue',1,'2019-10-10');
CALL llenado_detalle (301,76,15,'PENDIENTE','Entregar a Trisa',1,'2019-09-01');
CALL llenado_detalle (302,76,46,'PENDIENTE','Entregar a Trisa',1,'2019-09-01');
CALL llenado_detalle (303,76,36,'PENDIENTE','Entregar a Trisa',1,'2019-09-01');
CALL llenado_detalle (304,76,37,'PENDIENTE','Entregar a Trisa',1,'2019-09-01');
CALL llenado_detalle (305,76,58,'PENDIENTE','Entregar a Balto',1,'2019-08-08');
CALL llenado_detalle (306,77,96,'PENDIENTE','Entregar a Balto',1,'2019-08-08');
CALL llenado_detalle (307,77,95,'PENDIENTE','Entregar a Balto',1,'2019-08-08');
CALL llenado_detalle (308,77,48,'PENDIENTE','Entregar a Balto',1,'2019-08-08');
CALL llenado_detalle (309,77,38,'PENDIENTE','Entregar a Alvin',2,'2019-08-16');
CALL llenado_detalle (310,78,74,'PENDIENTE','Entregar a Alvin',2,'2019-08-16');
CALL llenado_detalle (311,78,96,'PENDIENTE','Entregar a Alvin',2,'2019-08-16');
CALL llenado_detalle (312,78,5,'PENDIENTE','Entregar a Alvin',2,'2019-08-16');
CALL llenado_detalle (313,78,84,'ENTREGADO','Entregar a Malasada',2,'2019-05-30');
CALL llenado_detalle (314,79,36,'ENTREGADO','Entregar a Malasada',2,'2019-05-30');
CALL llenado_detalle (315,79,28,'ENTREGADO','Entregar a Malasada',2,'2019-05-30');
CALL llenado_detalle (316,79,29,'ENTREGADO','Entregar a Malasada',2,'2019-05-30');
CALL llenado_detalle (317,79,49,'EN CAMINO','Entregar a Michael',2,'2019-07-22');
CALL llenado_detalle (318,80,9,'EN CAMINO','Entregar a Michael',2,'2019-07-22');
CALL llenado_detalle (319,80,8,'EN CAMINO','Entregar a Michael',2,'2019-07-22');
CALL llenado_detalle (320,80,7,'EN CAMINO','Entregar a Michael',2,'2019-07-22');
CALL llenado_detalle (321,80,6,'ENTREGADO','Entregar a Cortez',1,'2019-07-18');
CALL llenado_detalle (322,81,5,'ENTREGADO','Entregar a Cortez',1,'2019-07-18');
CALL llenado_detalle (323,81,4,'ENTREGADO','Entregar a Cortez',1,'2019-07-18');
CALL llenado_detalle (324,81,3,'ENTREGADO','Entregar a Cortez',1,'2019-07-18');
CALL llenado_detalle (325,81,2,'ENTREGADO','Entrgar a Beronica',4,'2019-07-19');
CALL llenado_detalle (326,82,1,'ENTREGADO','Entrgar a Beronica',4,'2019-07-19');
CALL llenado_detalle (327,82,75,'ENTREGADO','Entrgar a Beronica',4,'2019-07-19');
CALL llenado_detalle (328,82,27,'ENTREGADO','Entrgar a Beronica',4,'2019-07-19');
CALL llenado_detalle (329,82,59,'ENTREGADO','Entregar a Ramses',1,'2019-05-26');
CALL llenado_detalle (330,83,16,'ENTREGADO','Entregar a Ramses',1,'2019-05-26');
CALL llenado_detalle (331,83,100,'ENTREGADO','Entregar a Ramses',1,'2019-05-26');
CALL llenado_detalle (332,83,35,'ENTREGADO','Entregar a Ramses',1,'2019-05-26');
CALL llenado_detalle (333,83,85,'ENTREGADO','Etregar a Kamila',2,'2019-02-10');
CALL llenado_detalle (334,84,29,'ENTREGADO','Etregar a Kamila',2,'2019-02-10');
CALL llenado_detalle (335,84,47,'ENTREGADO','Etregar a Kamila',2,'2019-02-10');
CALL llenado_detalle (336,84,85,'ENTREGADO','Etregar a Kamila',2,'2019-02-10');
CALL llenado_detalle (337,84,46,'ENTREGADO','Entregar a Gabriel',1,'2019-06-28');
CALL llenado_detalle (338,85,36,'ENTREGADO','Entregar a Gabriel',1,'2019-06-28');
CALL llenado_detalle (339,85,37,'ENTREGADO','Entregar a Gabriel',1,'2019-06-28');
CALL llenado_detalle (340,85,28,'EN CAMINO','Entregar a Uriel',1,'2019-07-21');
CALL llenado_detalle (341,85,26,'EN CAMINO','Entregar a Uriel',1,'2019-07-21');
CALL llenado_detalle (342,86,18,'EN CAMINO','Entregar a Uriel',1,'2019-07-21');
CALL llenado_detalle (343,86,30,'EN CAMINO','Entregar a Uriel',1,'2019-07-21');
CALL llenado_detalle (344,86,93,'PENDIENTE','Entregar a Asrael',1,'2019-10-01');
CALL llenado_detalle (345,86,37,'PENDIENTE','Entregar a Asrael',1,'2019-10-01');
CALL llenado_detalle (346,87,17,'PENDIENTE','Entregar a Asrael',1,'2019-10-01');
CALL llenado_detalle (347,87,1,'PENDIENTE','Entregar a Asrael',1,'2019-10-01');
CALL llenado_detalle (348,87,6,'EN CAMINO','Entregar a Armando',1,'2019-07-20');
CALL llenado_detalle (349,87,83,'EN CAMINO','Entregar a Armando',1,'2019-07-20');
CALL llenado_detalle (350,88,82,'EN CAMINO','Entregar a Armando',1,'2019-07-20');
CALL llenado_detalle (351,88,71,'EN CAMINO','Entregar a Armando',1,'2019-07-20');
CALL llenado_detalle (352,88,15,'PENDIENTE','Entregar a Marisa',1,'2019-09-03');
CALL llenado_detalle (353,88,15,'PENDIENTE','Entregar a Marisa',1,'2019-09-03');
CALL llenado_detalle (354,89,94,'PENDIENTE','Entregar a Marisa',1,'2019-09-03');
CALL llenado_detalle (355,89,47,'PENDIENTE','Entregar a Marisa',1,'2019-09-03');
CALL llenado_detalle (356,89,48, 'PENDIENTE', 'Entregar a McQueen', 1, '2019-08-04');
CALL llenado_detalle (357,89,58, 'PENDIENTE', 'Entregar a McQueen', 1, '2019-08-04');
CALL llenado_detalle (358,90,68, 'PENDIENTE', 'Entregar a McQueen', 1, '2019-08-04');
CALL llenado_detalle (359,90,79, 'PENDIENTE', 'Entregar a McQueen', 1, '2019-08-04');
CALL llenado_detalle (360,90,58,'EN CAMINO','Entregar a otrFrancisco',1,'2019-07-28');
CALL llenado_detalle (361,90,53,'EN CAMINO','Entregar a otrFrancisco',1,'2019-07-28');
CALL llenado_detalle (362,91,68,'EN CAMINO','Entregar a otrFrancisco',1,'2019-07-28');
CALL llenado_detalle (363,91,49,'EN CAMINO','Entregar a otrFrancisco',1,'2019-07-28');
CALL llenado_detalle (364,91,48, 'EN CAMINO', 'Entregar a Fermin', 2, '2019-07-29');
CALL llenado_detalle (365,91,38, 'EN CAMINO', 'Entregar a Fermin', 2, '2019-07-29');
CALL llenado_detalle (366,92,28, 'EN CAMINO', 'Entregar a Fermin', 2, '2019-07-29');
CALL llenado_detalle (367,92,18, 'EN CAMINO', 'Entregar a Fermin', 2, '2019-07-29');
CALL llenado_detalle (368,92,4,'PENDIENTE','Entregar a Telesforo',1,'2019-08-09');
CALL llenado_detalle (369,92,37,'PENDIENTE','Entregar a Telesforo',1,'2019-08-09');
CALL llenado_detalle (370,93,36,'PENDIENTE','Entregar a Telesforo',1,'2019-08-09');
CALL llenado_detalle (371,93,59,'PENDIENTE','Entregar a Telesforo',1,'2019-08-09');
CALL llenado_detalle (372,93,19, 'PENDIENTE', 'Entregar a Teofilo', 1, '2019-08-08');
CALL llenado_detalle (373,93,95, 'PENDIENTE', 'Entregar a Teofilo', 1, '2019-08-08');
CALL llenado_detalle (374,94,51, 'PENDIENTE', 'Entregar a Teofilo', 1, '2019-08-08');
CALL llenado_detalle (375,94,46, 'PENDIENTE', 'Entregar a Teofilo', 1, '2019-08-08');
CALL llenado_detalle (376,94,2,'ENTREGADO','Etregar a Sinfilo',1,'2019-06-06');
CALL llenado_detalle (377,94,28,'ENTREGADO','Etregar a Sinfilo',1,'2019-06-06');
CALL llenado_detalle (378,95,59,'ENTREGADO','Etregar a Sinfilo',1,'2019-06-06');
CALL llenado_detalle (379,95,80,'ENTREGADO','Etregar a Sinfilo',1,'2019-06-06');
CALL llenado_detalle (380,95,70,'PENDIENTE','Entregar a Ximena',1,'2019-08-19');
CALL llenado_detalle (381,95,2,'PENDIENTE','Entregar a Ximena',1,'2019-08-19');
CALL llenado_detalle (382,96,60,'PENDIENTE','Entregar a Ximena',1,'2019-08-19');
CALL llenado_detalle (383,96,16,'PENDIENTE','Entregar a Ximena',1,'2019-08-19');
CALL llenado_detalle (384,96,69, 'PENDIENTE', 'Entregar a Cintia', 1, '2019-07-30');
CALL llenado_detalle (385,96,93, 'PENDIENTE', 'Entregar a Cintia', 1, '2019-07-30');
CALL llenado_detalle (386,97,1, 'PENDIENTE', 'Entregar a Cintia', 1, '2019-07-30');
CALL llenado_detalle (387,97,2, 'PENDIENTE', 'Entregar a Cintia', 1, '2019-07-30');
CALL llenado_detalle (388,97,37,'PENDIENTE','Entregar a Emanuel',1,'2019-10-10');
CALL llenado_detalle (389,97,32,'PENDIENTE','Entregar a Emanuel',1,'2019-10-10');
CALL llenado_detalle (390,98,29,'PENDIENTE','Entregar a Emanuel',1,'2019-10-10');
CALL llenado_detalle (391,98,28,'PENDIENTE','Entregar a Emanuel',1,'2019-10-10');
CALL llenado_detalle (392,98,9, 'EN CAMINO', 'Entregar a Enrique', 4, '2019-7-22');
CALL llenado_detalle (393,98,28, 'EN CAMINO', 'Entregar a Enrique', 4, '2019-7-22');
CALL llenado_detalle (394,99,5, 'EN CAMINO', 'Entregar a Enrique', 4, '2019-7-22');
CALL llenado_detalle (395,99,17, 'EN CAMINO', 'Entregar a Enrique', 4, '2019-7-22');
CALL llenado_detalle (396,99,63,'EN CAMINO','Entregar a Diego',1,'2019-07-21');
CALL llenado_detalle (397,99,46,'EN CAMINO','Entregar a Diego',1,'2019-07-21');
CALL llenado_detalle (398,100,37,'EN CAMINO','Entregar a Diego',1,'2019-07-21');
CALL llenado_detalle (399,100,9,'EN CAMINO','Entregar a Diego',1,'2019-07-21');
CALL llenado_detalle (400,100,19,'EN CAMINO','Entregar a Diego',1,'2019-07-21');

CALL CREAUSUARIO ('Prissie', 'IwqIYlEiRW', 'pwatkins0@skype.com');
CALL CREAUSUARIO ('Pearle', 'w08FmzbbL', 'pjones1@smh.com.au');
CALL CREAUSUARIO ('Garnet', '61kXRR', 'gebanks2@nifty.com');
CALL CREAUSUARIO ('Hastie', '2Y9sB1mo90S', 'hbranche3@state.tx.us');
CALL CREAUSUARIO ('Monro', 'im2Zw8', 'mkellet4@ftc.gov');
CALL CREAUSUARIO ('Uta', 'lfdlh1qEnC', 'ubulford5@ameblo.jp');
CALL CREAUSUARIO ('Norby', 'R0ZcVUSqm', 'nbeynke6@sfgate.com');
CALL CREAUSUARIO ('Brig', 'rexq3QNQ1NlU', 'bpering7@bloglines.com');
CALL CREAUSUARIO ('Silvia', 'cZd20NUNOz', 'sbidder8@wp.com');
CALL CREAUSUARIO ('Kele', 'NebLGsM8B', 'kseine9@columbia.edu');
CALL CREAUSUARIO ('Lizette', '5GBoYClkkW', 'lpaynea@topsy.com');
CALL CREAUSUARIO ('Norbert', 'oAA2nFJY', 'ngutmanb@zimbio.com');
CALL CREAUSUARIO ('Aubrie', 'xZ4kYc0Fy', 'ajennoc@csmonitor.com');
CALL CREAUSUARIO ('Nikola', 'iE01w4fLY', 'ndomesdayd@uol.com.br');
CALL CREAUSUARIO ('Bent', '1LXGc80k', 'beverse@intel.com');
CALL CREAUSUARIO ('Davidson', 'MD0tOCkvZx', 'dgiacobillof@jiathis.com');
CALL CREAUSUARIO ('Farlee', '1gg4LI', 'fakidg@dion.ne.jp');
CALL CREAUSUARIO ('Aldon', '3MDbKxb282BX', 'awebbenh@chicagotribune.com');
CALL CREAUSUARIO ('Felicity', '1TvDdkjALQ', 'fkenvini@naver.com');
CALL CREAUSUARIO ('Lauraine', 'da3HUbaJeA', 'ldrewsonj@prnewswire.com');
CALL CREAUSUARIO ('Brigitte', 'BDiO5b', 'bfairbrassk@slate.com');
CALL CREAUSUARIO ('Vaughn', 'Z09ZxNH4HG7', 'vsussamsl@yahoo.co.jp');
CALL CREAUSUARIO ('Jenica', 'c1BT9zqXNykB', 'jrosenfarbm@psu.edu');
CALL CREAUSUARIO ('Merlina', 'lrxAYGYlzWA5', 'mmephann@addthis.com');
CALL CREAUSUARIO ('Jane', 'N6LFGnMnbsZ', 'jstainingo@myspace.com');
CALL CREAUSUARIO ('Tommie', 'Cr5Ve4MzMr', 'tbugdenp@vkontakte.ru');
CALL CREAUSUARIO ('Melisande', 'bd8qn9T', 'mprebbleq@github.io');
CALL CREAUSUARIO ('Web', 'Qe3PzY8Kt2l', 'whakerr@tmall.com');
CALL CREAUSUARIO ('Teriann', 'tVPorzg5g', 'tbumpasss@paginegialle.it');
CALL CREAUSUARIO ('Collin', 'TPT0WIPyiFw', 'cfarrat@instagram.com');
CALL CREAUSUARIO ('Nadia', 'QYV6KP', 'nkubaseku@auda.org.au');
CALL CREAUSUARIO ('Sam', 'ckU8EoCmTNX', 'spalekv@aol.com');
CALL CREAUSUARIO ('Anallise', 'MQFXbm', 'alilleew@ebay.com');
CALL CREAUSUARIO ('Charita', 'aQYeBac8', 'ccaddenx@europa.eu');
CALL CREAUSUARIO ('Jonie', 'RC42xjzqwQ9', 'jcutsforthy@gizmodo.com');
CALL CREAUSUARIO ('Karee', '71LZrYZp6Mpr', 'kgibbesonz@newyorker.com');
CALL CREAUSUARIO ('Ulrike', 'Ns3crEW', 'utunnock10@4shared.com');
CALL CREAUSUARIO ('Jarrid', '1dG75pWcL', 'jhoogendorp11@xrea.com');
CALL CREAUSUARIO ('Waneta', '0593FtP', 'whoward12@nps.gov');
CALL CREAUSUARIO ('Devland', 'gKa2BakaGd', 'dbark13@mediafire.com');
CALL CREAUSUARIO ('Stanley', '5inUNh', 'sgilbert14@bizjournals.com');
CALL CREAUSUARIO ('Hermine', 'hD5Tr1Sfz', 'hsafell15@vistaprint.com');
CALL CREAUSUARIO ('Diane-marie', 'Otwi2fBVm', 'djakoubec16@shop-pro.jp');
CALL CREAUSUARIO ('Dale', '8HrhpE7SvB', 'dmcvitie17@unicef.org');
CALL CREAUSUARIO ('Carilyn', 'vHE7jH', 'cmathou18@chronoengine.com');
CALL CREAUSUARIO ('Brittney', 'YyyNk5', 'bkryzhov19@cam.ac.uk');
CALL CREAUSUARIO ('Margarette', 'bH3Sgv', 'mdetloff1a@squarespace.com');
CALL CREAUSUARIO ('Pauli', 'V42tBU2kUixX', 'pbranscombe1b@webeden.co.uk');
CALL CREAUSUARIO ('Adey', 'xHBOtMu7', 'apavis1c@amazon.de');
CALL CREAUSUARIO ('Cathrin', '2jikJPigjI', 'cibanez1d@ebay.com');
CALL CREAUSUARIO ('Happy', '5x1ljDGgKv5L', 'hgero1e@ucoz.com');
CALL CREAUSUARIO ('Moyna', 'WkvC1p4', 'measterby1f@admin.ch');
CALL CREAUSUARIO ('Ericha', 'ccudZ9OsmAs', 'eglas1g@theglobeandmail.com');
CALL CREAUSUARIO ('Kristofer', 'tt6d0KL8GCN', 'kcully1h@photobucket.com');
CALL CREAUSUARIO ('Cesaro', 'MwVZvkMQH3', 'cclash1i@yandex.ru');
CALL CREAUSUARIO ('Abagail', 'gMhC3gVB', 'agrabeham1j@ustream.tv');
CALL CREAUSUARIO ('Noel', 'SbOt1Ua4P5G7', 'ndudleston1k@msu.edu');
CALL CREAUSUARIO ('Clementina', 'bGXE5JCU9b', 'cwheeler1l@ocn.ne.jp');
CALL CREAUSUARIO ('Marleen', '6Q3tpswT2NcW', 'mmumberson1m@wufoo.com');
CALL CREAUSUARIO ('Kristos', 'dl1brCeI5zZ', 'ktye1n@google.pl');
CALL CREAUSUARIO ('Abner', 'Z0uCiHP7q', 'ajereatt1o@upenn.edu');
CALL CREAUSUARIO ('Rick', 'QAmqbQDyLc', 'rwigginton1p@wikispaces.com');
CALL CREAUSUARIO ('Hugues', 'iTm9qwOa', 'hnornable1q@seattletimes.com');
CALL CREAUSUARIO ('Barr', 'geRODcJ', 'bletcher1r@exblog.jp');
CALL CREAUSUARIO ('Rubetta', '4vEdknRO', 'rdegowe1s@gnu.org');
CALL CREAUSUARIO ('Nomi', 'zjr6yE', 'nyitzhakov1t@freewebs.com');
CALL CREAUSUARIO ('Gregoire', 't9HP9uNg9vwS', 'greihm1u@blinklist.com');
CALL CREAUSUARIO ('Chen', 'FFwqjuAEadY', 'cmccutcheon1v@unc.edu');
CALL CREAUSUARIO ('Daisie', 'u5MBNIjVzq', 'dcescoti1w@etsy.com');
CALL CREAUSUARIO ('Rayna', '1uTTZv', 'rschroeder1x@state.gov');
CALL CREAUSUARIO ('Ulla', '9Ogb78JdvUO', 'upetricek1y@ask.com');
CALL CREAUSUARIO ('Tory', 'CG8VzM7xBpp', 'tyouhill1z@phoca.cz');
CALL CREAUSUARIO ('Dimitri', 'TxcVA0Ra1', 'drace20@noaa.gov');
CALL CREAUSUARIO ('Lindy', 'XH54qwy6Y', 'lgoalley21@zimbio.com');
CALL CREAUSUARIO ('Nicholle', 'e5tv9Tt8i', 'ncoye22@huffingtonpost.com');
CALL CREAUSUARIO ('Elfrieda', '1DmZBSY', 'ebenck23@oaic.gov.au');
CALL CREAUSUARIO ('Butch', 'lLRJe6Zt2', 'bcotterrill24@toplist.cz');
CALL CREAUSUARIO ('Donavon', '01EVq2O', 'dmarjanovic25@list-manage.com');
CALL CREAUSUARIO ('Cordi', 'VbZhcBTrvCH', 'carnoldi26@angelfire.com');
CALL CREAUSUARIO ('Nicolle', 'IklrNw1i', 'nwollard27@wikia.com');
CALL CREAUSUARIO ('Sanders', '9G2zoJRi', 'sbalfe28@globo.com');
CALL CREAUSUARIO ('Rasia', 'LLUAAA5GOwFa', 'rsonschein29@blinklist.com');
CALL CREAUSUARIO ('Feodor', 'NVIvs2TRygME', 'ffernando2a@tamu.edu');
CALL CREAUSUARIO ('Seamus', 'zsbYhJOc', 'speacher2b@simplemachines.org');
CALL CREAUSUARIO ('Averyl', '6sxnjEpo0mY', 'ahub2c@theatlantic.com');
CALL CREAUSUARIO ('Madella', 'raGvlog', 'mchung2d@wunderground.com');
CALL CREAUSUARIO ('Emmy', 'tQKglkz0ROWm', 'ekoubu2e@wisc.edu');
CALL CREAUSUARIO ('Shirley', 'jDbLg46', 'suff2f@pen.io');
CALL CREAUSUARIO ('Basia', 'UH5QmrnBI', 'bborit2g@uol.com.br');
CALL CREAUSUARIO ('Jakie', 'ihinDUY', 'jatcherley2h@biglobe.ne.jp');
CALL CREAUSUARIO ('Junina', '4RP6OPBS6T', 'jkennefick2i@baidu.com');
CALL CREAUSUARIO ('Annabell', 'GBGtQErG6', 'abarabich2j@themeforest.net');
CALL CREAUSUARIO ('Julissa', 'ZFISQEyPfy', 'jbrusby2k@biblegateway.com');
CALL CREAUSUARIO ('Leann', 'Y46Awv', 'ldradey2l@aboutads.info');
CALL CREAUSUARIO ('Consuela', 'GqozZcxp', 'cschrei2m@drupal.org');
CALL CREAUSUARIO ('Anny', 'nJKO566', 'aalexander2n@umn.edu');
CALL CREAUSUARIO ('Annabelle', 'vKG2T2j0Yvq', 'apickavant2o@addtoany.com');
CALL CREAUSUARIO ('Katheryn', 'PEKuK2q', 'kkordt2p@apple.com');
CALL CREAUSUARIO ('Sean', 'E85to85r', 'srodriguez2q@japanpost.jp');
CALL CREAUSUARIO ('Sergei', '2l4DwK5', 'sleaming2r@cbc.ca');

CALL COMPLETADATOS(1, 'Skip', 'Walburn', 'Bramsen', 'Kentucky', 'Louisville', 'Mesta', 'Glacier Hill', '2018-10-15', '5027833452', 4300, 90, 30);
CALL COMPLETADATOS(2, 'Quillan', 'Kernar', 'Tedridge', 'Oklahoma', 'Tulsa', 'Holmberg', 'Northland', '2018-10-23', '9185507926', 3346, 28, 69);
CALL COMPLETADATOS(3, 'Aldwin', 'Bizzey', 'Cruce', 'Texas', 'El Paso', 'Sullivan', 'Graedel', '2018-12-07', '9151528926', 3603, 37, 59);
CALL COMPLETADATOS(4, 'Nye', 'Lente', 'Yakovlev', 'California', 'San Diego', 'La Follette', 'Spohn', '2019-06-06', '6191092784', 5772, 82, 43);
CALL COMPLETADATOS(5, 'Nannette', 'Visick', 'Pooly', 'Minnesota', 'Minneapolis', 'Stuart', '5th', '2018-11-17', '6121977134', 7485, 77, 51);
CALL COMPLETADATOS(6, 'Boycie', 'Capelow', 'Greiswood', 'Illinois', 'Springfield', 'Spohn', 'Superior', '2019-03-28', '2177321393', 5804, 21, 11);
CALL COMPLETADATOS(7, 'Englebert', 'Scolts', 'Voff', 'Idaho', 'Boise', 'Schiller', 'Moose', '2019-01-22', '2089299642', 8032, 40, 83);
CALL COMPLETADATOS(8, 'Berkley', 'Simes', 'Boutwell', 'Nevada', 'Las Vegas', 'Clove', 'Lerdahl', '2019-02-19', '7027422608', 6575, 98, 53);
CALL COMPLETADATOS(9, 'Sholom', 'Nafziger', 'Spottiswood', 'New York', 'New York City', 'Eggendart', 'Dahle', '2018-08-25', '2121351395', 6554, 40, 43);
CALL COMPLETADATOS(10, 'Forrest', 'Loy', 'Coplestone', 'Michigan', 'Farmington', 'Carey', 'Brown', '2019-01-17', '2481280631', 8046, 21, 6);
CALL COMPLETADATOS(11, 'Rebekah', 'Gracewood', 'Baldree', 'California', 'San Diego', 'Gina', '1st', '2019-05-11', '6191895025', 3202, 18, 47);
CALL COMPLETADATOS(12, 'Veradis', 'Schafer', 'Niesegen', 'Mississippi', 'Columbus', 'West', 'Thompson', '2019-07-19', '6624224122', 5960, 85, 56);
CALL COMPLETADATOS(13, 'Eal', 'Whitington', 'Cady', 'Texas', 'El Paso', 'Gale', 'Clyde Gallagher', '2018-09-13', '9159495638', 8949, 24, 12);
CALL COMPLETADATOS(14, 'Dru', 'Arnholz', 'Bartomieu', 'District of Columbia', 'Washington', 'American', 'Milwaukee', '2019-03-19', '2021426798', 8152, 57, 65);
CALL COMPLETADATOS(15, 'Misty', 'todor', 'Fruchon', 'Florida', 'Tallahassee', 'Donald', 'Lawn', '2018-10-26', '8509360449', 3261, 37, 82);
CALL COMPLETADATOS(16, 'Gill', 'Creus', 'Marney', 'Oregon', 'Portland', '4th', 'Magdeline', '2018-09-14', '5031738065', 7102, 8, 93);
CALL COMPLETADATOS(17, 'Nariko', 'Hebden', 'Shird', 'California', 'San Diego', 'Mayer', 'Lyons', '2019-06-22', '6195553131', 4680, 74, 30);
CALL COMPLETADATOS(18, 'Derby', 'Matusson', 'Mitchelson', 'Texas', 'Austin', 'Ohio', 'Swallow', '2018-11-02', '5124346175', 3253, 53, 50);
CALL COMPLETADATOS(19, 'Audrey', 'Tales', 'Blinde', 'California', 'Pasadena', 'Novick', 'Crowley', '2019-05-17', '6268484199', 6462, 92, 26);
CALL COMPLETADATOS(20, 'Chip', 'Aviss', 'Mallia', 'Ohio', 'Dayton', 'Pearson', 'Eastwood', '2019-06-18', '9377485636', 3580, 22, 91);
CALL COMPLETADATOS(21, 'Odell', 'Hindhaugh', 'Roelvink', 'California', 'South Lake Tahoe', 'Roxbury', 'Continental', '2018-08-09', '5309647597', 8923, 59, 11);
CALL COMPLETADATOS(22, 'Ginelle', 'Mellsop', 'Tyrone', 'California', 'San Jose', 'Manufacturers', 'Sauthoff', '2019-01-16', '4086583955', 7280, 93, 37);
CALL COMPLETADATOS(23, 'Hestia', 'Canfield', 'Duckels', 'Florida', 'Sarasota', 'Graceland', 'Ilene', '2019-06-12', '9413833232', 8611, 47, 86);
CALL COMPLETADATOS(24, 'Giraud', 'Kopmann', 'Lotze', 'Texas', 'Houston', 'Garrison', 'Lotheville', '2018-09-06', '2815806079', 5286, 88, 35);
CALL COMPLETADATOS(25, 'Perri', 'Stolz', 'Swanbourne', 'District of Columbia', 'Washington', 'Sutherland', 'Crescent Oaks', '2018-08-07', '2028838489', 4761, 82, 74);
CALL COMPLETADATOS(26, 'Felicia', 'Edgin', 'Luis', 'Indiana', 'Indianapolis', 'Bunker Hill', 'Commercial', '2018-08-02', '7659251087', 7881, 44, 79);
CALL COMPLETADATOS(27, 'Dorri', 'Caffrey', 'Jannasch', 'Nebraska', 'Lincoln', 'Warrior', 'Fairfield', '2018-07-28', '4023810304', 5753, 45, 10);
CALL COMPLETADATOS(28, 'Carley', 'Sewart', 'Zecchi', 'Colorado', 'Pueblo', 'Bonner', 'Superior', '2018-08-04', '7198363907', 4427, 36, 28);
CALL COMPLETADATOS(29, 'Rayner', 'Shafier', 'McHarry', 'Tennessee', 'Memphis', 'Birchwood', 'Iowa', '2019-05-25', '9017762256', 4767, 9, 7);
CALL COMPLETADATOS(30, 'Kala', 'Frise', 'Paolone', 'California', 'San Francisco', 'Muir', 'Delladonna', '2019-04-20', '4157578559', 6377, 60, 60);
CALL COMPLETADATOS(31, 'Gilda', 'Ludye', 'Bentame', 'Washington', 'Vancouver', 'Sommers', 'Schmedeman', '2019-04-04', '3605683230', 4248, 56, 91);
CALL COMPLETADATOS(32, 'Finn', 'Draco', 'McGeraghty', 'Virginia', 'Chesapeake', 'Waywood', 'Heath', '2019-05-21', '7572381729', 8921, 98, 19);
CALL COMPLETADATOS(33, 'Kamillah', 'Longwood', 'Halson', 'Minnesota', 'Saint Paul', '7th', 'Melrose', '2018-10-23', '6123481898', 5100, 94, 37);
CALL COMPLETADATOS(34, 'Leesa', 'Tute', 'Joust', 'Virginia', 'Springfield', 'Garrison', 'Hanover', '2019-05-13', '5717283284', 7066, 19, 32);
CALL COMPLETADATOS(35, 'Giffy', 'Bim', 'Applebee', 'Florida', 'Fort Lauderdale', 'Swallow', 'Kropf', '2018-09-25', '9547203473', 6924, 42, 86);
CALL COMPLETADATOS(36, 'Darrick', 'Reder', 'Frape', 'Oregon', 'Portland', 'Hansons', 'Fuller', '2018-11-11', '5031828275', 5874, 19, 72);
CALL COMPLETADATOS(37, 'Ari', 'Aleixo', 'Husher', 'New York', 'Albany', 'Ronald Regan', 'Duke', '2019-07-07', '5189492473', 3897, 83, 73);
CALL COMPLETADATOS(38, 'Karon', 'Elphinstone', 'Waplinton', 'California', 'San Jose', 'Carberry', 'Hanover', '2019-06-06', '4089728983', 7446, 88, 41);
CALL COMPLETADATOS(39, 'Gabriel', 'Borrowman', 'Cursons', 'Connecticut', 'New Haven', 'Arrowood', 'West', '2018-07-23', '2035985040', 7567, 80, 71);
CALL COMPLETADATOS(40, 'Alphonse', 'Tripony', 'Tummons', 'New York', 'Albany', 'Sullivan', 'Stone Corner', '2019-01-17', '5186545536', 4251, 96, 52);
CALL COMPLETADATOS(41, 'Janna', 'Graine', 'Warbeys', 'Illinois', 'Rockford', 'Pond', 'Cardinal', '2019-03-08', '8156784135', 7502, 5, 93);
CALL COMPLETADATOS(42, 'Kristoffer', 'Lattka', 'Setterthwait', 'Massachusetts', 'Boston', 'School', 'Westridge', '2018-12-07', '6172215261', 8760, 29, 45);
CALL COMPLETADATOS(43, 'Davy', 'Schops', 'Yong', 'Mississippi', 'Jackson', 'Sommers', 'Hanson', '2018-08-06', '6011102652', 8542, 7, 53);
CALL COMPLETADATOS(44, 'Talia', 'Timlett', 'Pache', 'Georgia', 'Atlanta', 'Ludington', '6th', '2018-10-18', '4042766689', 3532, 3, 67);
CALL COMPLETADATOS(45, 'Marlo', 'Ivan', 'Harce', 'Texas', 'Dallas', 'Norway Maple', 'Evergreen', '2019-02-18', '2148742977', 7346, 25, 94);
CALL COMPLETADATOS(46, 'Hurleigh', 'Kyngdon', 'Mardling', 'Michigan', 'Flint', 'Rieder', 'Manufacturers', '2018-09-11', '8106777316', 6362, 32, 72);
CALL COMPLETADATOS(47, 'Viki', 'Stayte', 'Mylan', 'Alabama', 'Montgomery', 'Kingsford', 'Sullivan', '2018-08-25', '3344011808', 8330, 15, 20);
CALL COMPLETADATOS(48, 'Caryl', 'Lammerding', 'Bonsey', 'Texas', 'Amarillo', 'Harper', 'Paget', '2019-04-09', '8068216557', 7585, 6, 98);
CALL COMPLETADATOS(49, 'Catlee', 'Terrett', 'Nehls', 'North Carolina', 'Gastonia', 'Express', 'Carpenter', '2018-11-03', '7047915388', 3628, 39, 74);
CALL COMPLETADATOS(50, 'Chester', 'Stannett', 'De Bernardis', 'Alabama', 'Montgomery', 'Merrick', 'Lakeland', '2019-05-23', '3346166421', 6565, 47, 61);
CALL COMPLETADATOS(51, 'Roberto', 'Keune', 'Frazer', 'New York', 'Brooklyn', 'Corscot', 'Becker', '2019-03-08', '7189623945', 4562, 32, 17);
CALL COMPLETADATOS(52, 'Grier', 'Martynikhin', 'Fright', 'Florida', 'Lake Worth', 'Paget', 'Monterey', '2018-11-16', '5619577457', 7302, 87, 39);
CALL COMPLETADATOS(53, 'Hillie', 'Cureton', 'Chetham', 'Texas', 'Longview', 'Pearson', 'Karstens', '2019-02-08', '9033370281', 3551, 20, 46);
CALL COMPLETADATOS(54, 'Jaine', 'Sutehall', 'Toor', 'Virginia', 'Richmond', 'Northridge', 'Michigan', '2019-04-06', '8045342246', 6432, 12, 39);
CALL COMPLETADATOS(55, 'Ruthie', 'Cracie', 'Woonton', 'Kansas', 'Shawnee Mission', 'Corry', 'Beilfuss', '2019-01-21', '9136732981', 3602, 26, 73);
CALL COMPLETADATOS(56, 'Colet', 'Ludron', 'Sellar', 'Florida', 'Tampa', 'Carioca', 'Hanover', '2019-07-07', '8135262440', 4056, 23, 26);
CALL COMPLETADATOS(57, 'Cissy', 'Tourle', 'Keward', 'Nevada', 'Sparks', 'Fordem', 'Laurel', '2018-08-14', '7754060521', 5811, 52, 84);
CALL COMPLETADATOS(58, 'Odelinda', 'Wormald', 'Burchett', 'South Dakota', 'Sioux Falls', 'Sycamore', 'Lakewood Gardens', '2018-12-10', '6052746197', 6217, 42, 42);
CALL COMPLETADATOS(59, 'Kelcie', 'Tomini', 'Gencke', 'Texas', 'Houston', 'Miller', 'Graceland', '2018-09-03', '8328392590', 5785, 11, 83);
CALL COMPLETADATOS(60, 'Jacquenette', 'Chilver', 'Fazan', 'California', 'Sacramento', 'Toban', 'Monument', '2019-03-06', '9163535598', 7438, 93, 89);
CALL COMPLETADATOS(61, 'Putnem', 'Ferrone', 'Peppard', 'Nevada', 'Las Vegas', 'Ridgeway', 'Delladonna', '2019-05-12', '7023142088', 5675, 91, 14);
CALL COMPLETADATOS(62, 'Venus', 'McGreay', 'Farens', 'Indiana', 'Anderson', 'Valley Edge', 'Fulton', '2018-11-15', '7651959203', 5330, 29, 82);
CALL COMPLETADATOS(63, 'Amalle', 'Hacker', 'Feyer', 'Florida', 'Pensacola', 'Anderson', 'Melrose', '2018-10-27', '8507975087', 7887, 19, 34);
CALL COMPLETADATOS(64, 'Suki', 'Beedell', 'Hauxley', 'New York', 'Syracuse', 'Debra', 'Canary', '2019-05-23', '3155266806', 4252, 10, 27);
CALL COMPLETADATOS(65, 'Charley', 'M''Quhan', 'Grahl', 'New York', 'New York City', 'Luster', 'Tomscot', '2018-07-22', '6461597363', 8549, 46, 46);
CALL COMPLETADATOS(66, 'Chaunce', 'Nys', 'Ebbrell', 'Washington', 'Spokane', 'Stang', 'Victoria', '2018-11-03', '5091701244', 8299, 80, 75);
CALL COMPLETADATOS(67, 'Britt', 'Matis', 'Thayre', 'Florida', 'Orlando', 'Gale', 'Mockingbird', '2019-05-15', '9543849354', 8958, 52, 99);
CALL COMPLETADATOS(68, 'Giacobo', 'Straniero', 'Maddock', 'Iowa', 'Davenport', 'Nelson', 'Algoma', '2018-10-24', '5633513037', 5051, 19, 6);
CALL COMPLETADATOS(69, 'Candis', 'Treffry', 'Sweetzer', 'Georgia', 'Atlanta', 'Packers', 'Forest', '2019-06-07', '6781928535', 6188, 71, 28);
CALL COMPLETADATOS(70, 'Garvey', 'Ryall', 'Lewing', 'Texas', 'San Antonio', 'Maywood', 'Brickson Park', '2018-09-21', '2107578738', 5428, 70, 91);
CALL COMPLETADATOS(71, 'Hatty', 'Heathcoat', 'Ausher', 'Ohio', 'Columbus', 'Blackbird', 'Lillian', '2019-05-26', '6141625110', 7424, 61, 38);
CALL COMPLETADATOS(72, 'Krispin', 'Wheaton', 'Moehle', 'Texas', 'Huntsville', 'Clove', 'Mallard', '2018-12-26', '9361388778', 4119, 46, 2);
CALL COMPLETADATOS(73, 'Caresa', 'Ganders', 'Box', 'California', 'San Diego', 'Killdeer', 'Scott', '2019-04-23', '6191700431', 5531, 51, 79);
CALL COMPLETADATOS(74, 'Michell', 'Carbert', 'Cooney', 'California', 'San Francisco', 'North', 'Dixon', '2018-10-03', '4153800397', 3867, 83, 84);
CALL COMPLETADATOS(75, 'Rodina', 'Archer', 'Domelow', 'New York', 'Rochester', 'Ridgeview', 'Westport', '2018-12-02', '5858926575', 5803, 95, 58);
CALL COMPLETADATOS(76, 'Desiri', 'Casaccio', 'Le Fleming', 'Florida', 'Panama City', 'Carpenter', 'Surrey', '2019-01-02', '8502878762', 7466, 71, 11);
CALL COMPLETADATOS(77, 'Quincy', 'Armfirld', 'Housego', 'Massachusetts', 'Boston', 'Pleasure', 'Bayside', '2019-05-27', '6177711391', 3090, 79, 37);
CALL COMPLETADATOS(78, 'Robin', 'Illing', 'MacPaden', 'Connecticut', 'Stamford', 'Carioca', 'Miller', '2019-07-19', '2037124424', 7896, 85, 45);
CALL COMPLETADATOS(79, 'Poul', 'Jearum', 'Braz', 'Colorado', 'Denver', 'Jay', 'Talmadge', '2019-03-13', '3034337102', 8578, 96, 52);
CALL COMPLETADATOS(80, 'Bert', 'Breeder', 'Bianco', 'Alabama', 'Birmingham', 'Clemons', 'Maywood', '2019-02-02', '2055532897', 4902, 55, 8);
CALL COMPLETADATOS(81, 'Isidoro', 'Rosekilly', 'Auger', 'Nebraska', 'Omaha', 'Banding', 'Derek', '2019-03-05', '7127469182', 4712, 53, 84);
CALL COMPLETADATOS(82, 'Allistir', 'Lilloe', 'Brodnecke', 'Connecticut', 'New Haven', 'Butterfield', 'Londonderry', '2019-02-11', '2033627716', 7302, 25, 2);
CALL COMPLETADATOS(83, 'Trumaine', 'Nemchinov', 'Grinnov', 'North Carolina', 'Charlotte', 'Kinsman', 'Pawling', '2019-07-08', '7041172394', 4604, 91, 65);
CALL COMPLETADATOS(84, 'Mercie', 'Pedwell', 'Hannah', 'California', 'San Francisco', 'Quincy', 'Clyde Gallagher', '2019-04-07', '4151428274', 3733, 36, 1);
CALL COMPLETADATOS(85, 'Ann-marie', 'Montrose', 'Linder', 'Texas', 'Dallas', 'Shopko', 'Oak', '2018-12-25', '2148938910', 8071, 99, 20);
CALL COMPLETADATOS(86, 'Hanan', 'Robathon', 'Doers', 'Florida', 'Miami', 'Carey', 'Riverside', '2018-12-31', '7868118193', 4087, 85, 38);
CALL COMPLETADATOS(87, 'Boyce', 'Vamplew', 'Stookes', 'South Carolina', 'Charleston', 'Forest Dale', 'Eagan', '2018-12-26', '8436686562', 4803, 4, 45);
CALL COMPLETADATOS(88, 'Heindrick', 'Sills', 'Frontczak', 'Massachusetts', 'Boston', 'Golf', 'Forest Dale', '2019-06-19', '6175357987', 7503, 10, 99);
CALL COMPLETADATOS(89, 'Goddard', 'Doddemeede', 'Stickles', 'California', 'Sacramento', 'Arizona', 'North', '2019-05-31', '9168682719', 4750, 37, 20);
CALL COMPLETADATOS(90, 'Ora', 'Fouldes', 'Rieflin', 'Louisiana', 'Lafayette', 'Burrows', 'Mayer', '2018-09-09', '3375588792', 3329, 5, 92);
CALL COMPLETADATOS(91, 'Silvie', 'Andrea', 'Killingbeck', 'Delaware', 'Newark', 'Grim', 'Park Meadow', '2019-03-03', '3022797735', 7142, 19, 100);
CALL COMPLETADATOS(92, 'Letta', 'Wildey', 'Crusham', 'Florida', 'Fort Lauderdale', 'Brickson Park', 'Cody', '2018-08-07', '7549023325', 6595, 27, 38);
CALL COMPLETADATOS(93, 'Patrice', 'Dickson', 'Hassen', 'Oklahoma', 'Oklahoma City', 'Amoth', 'Clyde Gallagher', '2019-03-22', '4054596183', 3301, 38, 30);
CALL COMPLETADATOS(94, 'Lenee', 'Spalding', 'Conkling', 'Texas', 'Denton', 'Evergreen', 'Tennessee', '2019-06-23', '9406096564', 5238, 41, 27);
CALL COMPLETADATOS(95, 'Christy', 'Wagge', 'Sowersby', 'Ohio', 'Cincinnati', 'Hazelcrest', 'Beilfuss', '2018-10-04', '5139156534', 6030, 65, 6);
CALL COMPLETADATOS(96, 'Timmie', 'Sleeman', 'Talkington', 'Minnesota', 'Young America', 'Harbort', 'Main', '2019-03-07', '9527317539', 7343, 92, 50);
CALL COMPLETADATOS(97, 'Marjorie', 'Alfonso', 'Poad', 'Indiana', 'South Bend', 'Di Loreto', 'Springview', '2019-06-03', '5746933082', 8388, 4, 13);
CALL COMPLETADATOS(98, 'Sula', 'Triplet', 'Juarez', 'Indiana', 'Fort Wayne', 'Monument', 'Kinsman', '2018-11-14', '2602190377', 4032, 18, 29);
CALL COMPLETADATOS(99, 'Lorine', 'Kydd', 'Hoolaghan', 'Florida', 'Port Saint Lucie', 'Monterey', 'Acker', '2019-03-19', '7724668452', 6492, 14, 47);
CALL COMPLETADATOS(100, 'Ingeborg', 'Jermyn', 'Moultrie', 'Indiana', 'Fort Wayne', 'Cambridge', 'Gale', '2018-11-20', '2606611659', 4844, 95, 45); 

CALL INSERTATARJETA(1, 'Roderick', 'Fawdrey', 'Loding', '5010122541263926', 442, 'mastercard', 1);
CALL INSERTATARJETA(2, 'Berenice', 'Stukings', 'Mann', '6767637500569729161', 186, 'solo', 2);
CALL INSERTATARJETA(3, 'Syd', 'Sodor', 'Northey', '3530353950958989', 177, 'jcb', 3);
CALL INSERTATARJETA(4, 'Gib', 'Newart', 'Loseby', '5100148528236461', 534, 'mastercard', 4);
CALL INSERTATARJETA(5, 'Hillery', 'Eccleston', 'Hardwidge', '3577683554078113', 794, 'jcb', 5);
CALL INSERTATARJETA(6, 'Barnebas', 'Mullaney', 'Gawthrope', '5602232833069191072', 424, 'china-unionpay', 6);
CALL INSERTATARJETA(7, 'Ynez', 'Bentje', 'Kiljan', '4405724098993932', 811, 'visa-electron', 7);
CALL INSERTATARJETA(8, 'Fonz', 'Huscroft', 'Rogers', '5513439933808734', 382, 'diners-club-us-ca', 8);
CALL INSERTATARJETA(9, 'Irwinn', 'Weatherall', 'McCully', '374622073898180', 403, 'americanexpress', 9);
CALL INSERTATARJETA(10, 'Ali', 'Litton', 'Sconce', '374288253502248', 398, 'americanexpress', 10);
CALL INSERTATARJETA(11, 'Gloriane', 'Lasseter', 'Todari', '3535533262503152', 156, 'jcb', 11);
CALL INSERTATARJETA(12, 'Nicko', 'Froude', 'Gowdie', '3561455060137982', 353, 'jcb', 12);
CALL INSERTATARJETA(13, 'Carlynn', 'Losseljong', 'Busek', '3554590731271221', 506, 'jcb', 13);
CALL INSERTATARJETA(14, 'Frannie', 'Iglesias', 'Philcott', '633434047008253150', 561, 'solo', 14);
CALL INSERTATARJETA(15, 'Ennis', 'Suttie', 'Joddins', '4905660888856738', 892, 'switch', 15);
CALL INSERTATARJETA(16, 'Angelina', 'Croke', 'Wheatman', '3589388156470645', 100, 'jcb', 16);
CALL INSERTATARJETA(17, 'Mindy', 'Saltrese', 'Pitrollo', '3560157006214427', 322, 'jcb', 17);
CALL INSERTATARJETA(18, 'Ariella', 'Pentelo', 'Geekin', '6759601656415405577', 334, 'maestro', 18);
CALL INSERTATARJETA(19, 'Katrinka', 'Baus', 'McAvin', '3572376451070508', 296, 'jcb', 19);
CALL INSERTATARJETA(20, 'Veradis', 'Collocott', 'Gerrets', '201555008824195', 731, 'diners-club-enroute', 20);
CALL INSERTATARJETA(21, 'Revkah', 'Neicho', 'Boothebie', '3566414033665038', 515, 'jcb', 21);
CALL INSERTATARJETA(22, 'Monty', 'Nulty', 'Tousy', '337941854586988', 794, 'americanexpress', 22);
CALL INSERTATARJETA(23, 'Adeline', 'Alphege', 'McEntegart', '3584832141301469', 116, 'jcb', 23);
CALL INSERTATARJETA(24, 'Lorne', 'Lates', 'De Laci', '3545372700215055', 434, 'jcb', 24);
CALL INSERTATARJETA(25, 'Lyndell', 'McAughtrie', 'Capstake', '5290293550946239', 897, 'mastercard', 25);
CALL INSERTATARJETA(26, 'Alicia', 'Camoys', 'MacGaffey', '6380017313804768', 992, 'instapayment', 26);
CALL INSERTATARJETA(27, 'Zeke', 'Erricker', 'Swoffer', '5430917231438569', 238, 'mastercard', 27);
CALL INSERTATARJETA(28, 'Kacie', 'Casham', 'Franzotto', '3544668017838799', 897, 'jcb', 28);
CALL INSERTATARJETA(29, 'Dniren', 'Gascoigne', 'Rumsey', '3560270900991030', 394, 'jcb', 29);
CALL INSERTATARJETA(30, 'Brod', 'Izzett', 'Benninck', '201911737565643', 284, 'diners-club-enroute', 30);
CALL INSERTATARJETA(31, 'Meta', 'Atyea', 'McKinstry', '3534527152954187', 692, 'jcb', 31);
CALL INSERTATARJETA(32, 'Ron', 'Bernardot', 'Streight', '3534506138502559', 498, 'jcb', 32);
CALL INSERTATARJETA(33, 'Frederigo', 'Shillitto', 'Sherrocks', '30431430134347', 116, 'diners-clube', 33);
CALL INSERTATARJETA(34, 'Blake', 'Salvadore', 'Vasenkov', '3534869137351646', 292, 'jcb', 34);
CALL INSERTATARJETA(35, 'Cesar', 'Simonds', 'Garvey', '5018707635034741427', 602, 'maestro', 35);
CALL INSERTATARJETA(36, 'Twila', 'Beagin', 'Quarrington', '5893603520338157119', 336, 'maestro', 36);
CALL INSERTATARJETA(37, 'Shoshanna', 'Cello', 'Sizeland', '3535977487538206', 285, 'jcb', 37);
CALL INSERTATARJETA(38, 'Celestine', 'Rowland', 'Alekhov', '3567675812045316', 909, 'jcb', 38);
CALL INSERTATARJETA(39, 'Yasmeen', 'Plumstead', 'Willgoose', '5018142633686769740', 912, 'maestro', 39);
CALL INSERTATARJETA(40, 'Heinrik', 'Pounsett', 'Maffini', '5018431855151821', 691, 'maestro', 40);
CALL INSERTATARJETA(41, 'Starla', 'Senechell', 'Claypool', '6762886079796293175', 808, 'maestro', 41);
CALL INSERTATARJETA(42, 'Dwain', 'Goodwill', 'Dubarry', '4041376434023', 765, 'visa', 42);
CALL INSERTATARJETA(43, 'Nealy', 'Phillimore', 'Trustram', '560222261984699028', 632, 'china-unionpay', 43);
CALL INSERTATARJETA(44, 'Minny', 'Quainton', 'Tille', '5100132667242647', 949, 'mastercard', 44);
CALL INSERTATARJETA(45, 'Victor', 'Brunker', 'Larive', '5100130715043892', 836, 'mastercard', 45);
CALL INSERTATARJETA(46, 'Carmella', 'Ordelt', 'MacPaden', '3563032371848389', 827, 'jcb', 46);
CALL INSERTATARJETA(47, 'Shayne', 'Lillford', 'Kunzler', '3562748447220961', 761, 'jcb', 47);
CALL INSERTATARJETA(48, 'Carny', 'Bovingdon', 'Pigeram', '5020824512222280', 933, 'maestro', 48);
CALL INSERTATARJETA(49, 'Magdalena', 'Rosenhaupt', 'Mosedale', '30402918762701', 347, 'diners-club-carte', 49);
CALL INSERTATARJETA(50, 'Lisetta', 'Trimby', 'Minto', '374283720166883', 980, 'americanexpress', 50);
CALL INSERTATARJETA(51, 'Tiertza', 'Emms', 'Louys', '5524196034257743', 217, 'diners-club-us-ca', 51);
CALL INSERTATARJETA(52, 'Kerr', 'Whatford', 'Escolme', '3583721457347094', 209, 'jcb', 52);
CALL INSERTATARJETA(53, 'Lizette', 'Cabrara', 'Stuckow', '374622692714776', 589, 'americanexpress', 53);
CALL INSERTATARJETA(54, 'Nananne', 'Gilbertson', 'Hulkes', '5010127841125733', 225, 'mastercard', 54);
CALL INSERTATARJETA(55, 'Eugine', 'Cotterel', 'Mullett', '3562202035545314', 180, 'jcb', 55);
CALL INSERTATARJETA(56, 'Read', 'MacCafferky', 'MacNelly', '3543351283918956', 146, 'jcb', 56);
CALL INSERTATARJETA(57, 'Kellen', 'Potebury', 'Joyes', '348574994147432', 505, 'americanexpress', 57);
CALL INSERTATARJETA(58, 'Joelie', 'Legon', 'Fallens', '4917735225007793', 493, 'visa-electron', 58);
CALL INSERTATARJETA(59, 'Bertram', 'Teague', 'Alliker', '3548613844745557', 746, 'jcb', 59);
CALL INSERTATARJETA(60, 'Faith', 'Layborn', 'Bohler', '6763129335673001833', 155, 'maestro', 60);
CALL INSERTATARJETA(61, 'Bobby', 'Hainning', 'McKim', '3575708682103905', 241, 'jcb', 61);
CALL INSERTATARJETA(62, 'Juan', 'Hadland', 'Vanichkin', '3579998316909498', 613, 'jcb', 62);
CALL INSERTATARJETA(63, 'Elsa', 'O''Heyne', 'Matten', '201654288217434', 556, 'diners-club-enroute', 63);
CALL INSERTATARJETA(64, 'Emmalynne', 'Strood', 'Cosstick', '3570669245007113', 689, 'jcb', 64);
CALL INSERTATARJETA(65, 'Sari', 'Ulrik', 'Mirams', '5108754191183765', 844, 'mastercard', 65);
CALL INSERTATARJETA(66, 'Paule', 'Kaminski', 'Blain', '201508584168750', 925, 'diners-club-enroute', 66);
CALL INSERTATARJETA(67, 'Jordana', 'Rouf', 'Gumme', '36057412720011', 396, 'club-international', 67);
CALL INSERTATARJETA(68, 'Briant', 'Wakeman', 'Kitteman', '36676300063299', 320, 'club-international', 68);
CALL INSERTATARJETA(69, 'Westleigh', 'Cattini', 'Swain', '3562693678298510', 255, 'jcb', 69);
CALL INSERTATARJETA(70, 'Amalee', 'Grose', 'Moakler', '3578408932724470', 779, 'jcb', 70);
CALL INSERTATARJETA(71, 'Glennie', 'Kyberd', 'Mattea', '5595126368375559', 291, 'diners-club-us-ca', 71);
CALL INSERTATARJETA(72, 'Sascha', 'Treleven', 'Guiet', '4026959296721607', 653, 'visa-electron', 72);
CALL INSERTATARJETA(73, 'Rosabel', 'Briance', 'Althrop', '3583474236430142', 863, 'jcb', 73);
CALL INSERTATARJETA(74, 'Ermentrude', 'Mansfield', 'Mealing', '5893491395573502377', 597, 'maestro', 74);
CALL INSERTATARJETA(75, 'Benjamen', 'Rix', 'Train', '3530378050954059', 687, 'jcb', 75);
CALL INSERTATARJETA(76, 'Pansie', 'Honeywood', 'Greguol', '3582713869552271', 822, 'jcb', 76);
CALL INSERTATARJETA(77, 'Hildegaard', 'Seivwright', 'Dougal', '3535677665687607', 128, 'jcb', 77);
CALL INSERTATARJETA(78, 'Celia', 'Pollard', 'Simner', '501859811363143271', 923, 'maestro', 78);
CALL INSERTATARJETA(79, 'Benoite', 'Birchenhead', 'Scamel', '6304117996746014', 951, 'maestro', 79);
CALL INSERTATARJETA(80, 'Valeda', 'Carbine', 'Waller-Bridge', '3532459194937339', 847, 'jcb', 80);
CALL INSERTATARJETA(81, 'Nealon', 'Markushkin', 'Zimmermanns', '3569483875348232', 300, 'jcb', 81);
CALL INSERTATARJETA(82, 'Terri-jo', 'Biernacki', 'Cullum', '3528206216514448', 719, 'jcb', 82);
CALL INSERTATARJETA(83, 'Valry', 'Kupker', 'Fasset', '30281426275210', 520, 'club-carte-blanche', 83);
CALL INSERTATARJETA(84, 'Aubert', 'Dohmer', 'Laurenzi', '5452803414946953', 380, 'mastercard', 84);
CALL INSERTATARJETA(85, 'Lisette', 'Pollitt', 'Rance', '4026474639598639', 898, 'visa-electron', 85);
CALL INSERTATARJETA(86, 'Bathsheba', 'Casone', 'Condy', '3565971965734430', 125, 'jcb', 86);
CALL INSERTATARJETA(87, 'Coletta', 'Blasl', 'Gantzer', '5002353247344203', 307, 'mastercard', 87);
CALL INSERTATARJETA(88, 'Dallon', 'Palphreyman', 'Browne', '67592267374898748', 266, 'maestro', 88);
CALL INSERTATARJETA(89, 'Beverly', 'Lempenny', 'Querrard', '3552812758537405', 974, 'jcb', 89);
CALL INSERTATARJETA(90, 'Arni', 'Errett', 'Ferrieroi', '337941165727206', 874, 'americanexpress', 90);
CALL INSERTATARJETA(91, 'Aretha', 'Claus', 'Boich', '6304998289805561', 173, 'maestro', 91);
CALL INSERTATARJETA(92, 'Lira', 'Simmens', 'Yeaman', '30488909382781', 947, 'club-carte-blanche', 92);
CALL INSERTATARJETA(93, 'Ora', 'Deeman', 'Grishagin', '676271732706177877', 143, 'maestro', 93);
CALL INSERTATARJETA(94, 'Paquito', 'Stansbie', 'Droghan', '63041432459667170', 159, 'laser', 94);
CALL INSERTATARJETA(95, 'Myrtle', 'Tinton', 'Albrook', '490328594343478764', 516, 'switch', 95);
CALL INSERTATARJETA(96, 'Udall', 'Lightollers', 'Avrashin', '5108758923499225', 411, 'mastercard', 96);
CALL INSERTATARJETA(97, 'Bail', 'Iglesiaz', 'Biesinger', '6304023031342453303', 935, 'maestro', 97);
CALL INSERTATARJETA(98, 'Ginger', 'Rollingson', 'Woodwing', '3564453949739083', 230, 'jcb', 98);
CALL INSERTATARJETA(99, 'Miltie', 'Ledford', 'Gallety', '3559058197567206', 997, 'jcb', 99);
CALL INSERTATARJETA(100, 'Wolfgang', 'Banville', 'Chadbourne', '4175006777692375', 936, 'visa-electron', 100);


CALL INSERTAPRODUCTO (4,'ATX GA-Z270-Gaming 3','Gigabyte', 11,'CARACTERISTICAS',2579.00,'DESCRIPCION','CP-GIGABYTE-GA-Z270-GAMING3-1.jpg','CP-GIGABYTE-GA-Z270-GAMING3-2.jpg','CP-GIGABYTE-GA-Z270-GAMING3-3.jpg','CP-GIGABYTE-GA-Z270-GAMING3-4.jpg');
CALL INSERTAPRODUCTO (4,'ATX GA-B250-FinTech, S-1151','Gigabyte', 11,'CARACTERISTICAS',1229.00,'DESCRIPCION','CP-GIGABYTE-GA-B250-FINTECH-2.jpg','CP-GIGABYTE-GA-B250-FINTECH-1.jpg','CP-GIGABYTE-GA-B250-FINTECH-3.jpg','CP-GIGABYTE-GA-B250-FINTECH-4.jpg');
CALL INSERTAPRODUCTO (6,'G2590PX LED 24.5in','AOC', 84,'CARACTERISTICAS',4349.00,'DESCRIPCION','CP-AOC-G2590PX-1.jpg','CP-AOC-G2590PX-2.jpg','CP-AOC-G2590PX-3.webp','CP-AOC-G2590PX-4.webp');
CALL INSERTAPRODUCTO (9,'KB-502, Alámbrico','Vorago', 2,'CARACTERISTICAS',251.00,'DESCRIPCION','CP-VORAGO-KB-502-1.jpg','CP-VORAGO-KB-502-2.png','CP-VORAGO-KB-502-3.jpg','CP-VORAGO-KB-502-4.png');
CALL INSERTAPRODUCTO (8,'ssd UV500','Kingston ', 42,'CARACTERISTICAS',1189,'DESCRIPCION','CP-KINGSTON-SUV500MS480G-1.jpg','CP-KINGSTON-SUV500MS480G-2.jpg','CP-KINGSTON-SUV500MS480G-1.jpg','CP-KINGSTON-SUV500MS480G-3.jpg');
CALL INSERTAPRODUCTO (2,'Core i9-9900K','INTEL',89,'CARACTERISTICAS',9949,'DESCRIPCION','CP-INTEL-BX80684I99900K-1.jpg','CP-INTEL-BX80684I99900K-2.jpg','CP-INTEL-BX80684I99900K-1.jpg','CP-INTEL-BX80684I99900K-3.jpg');
CALL INSERTAPRODUCTO (9,'Legion GX30K04088 LED Rojo','Lenovo', 29,'CARACTERISTICAS',1079,'DESCRIPCION','CP-LENOVO-GX30K04088-1.jpg','CP-LENOVO-GX30K04088-2.jpg','CP-LENOVO-GX30K04088-3.jpg','CP-LENOVO-GX30K04088-4.webp');
CALL INSERTAPRODUCTO (4,'micro ATX B450M ','Gigabyte', 19,'CARACTERISTICAS',1489.00,'DESCRIPCION','CP-GIGABYTE-B450MDS3H-1.jpg','CP-GIGABYTE-B450MDS3H-2.jpg','CP-GIGABYTE-B450MDS3H-3.jpg','CP-GIGABYTE-B450MDS3H-4.jpg');
CALL INSERTAPRODUCTO (2,'Ryzen 5 1600','AMD', 86,'CARACTERISTICAS',3129.00,'DESCRIPCION','CP-AMD-YD1600BBAEBOX-1.webp','CP-AMD-YD1600BBAEBOX-2.webp','CP-AMD-YD1600BBAEBOX-3.jpg','CP-AMD-YD1600BBAEBOX-4.jpg');
CALL INSERTAPRODUCTO (8,'GP-GSTFS31240GNTD, 240GB','Gigabyte', 49,'CARACTERISTICAS',629,'DESCRIPCION','CP-GIGABYTE-GP-GSTFS31240GNTD-1.jpg','CP-GIGABYTE-GP-GSTFS31240GNTD-2.jpg','CP-GIGABYTE-GP-GSTFS31240GNTD-3.jpg','CP-GIGABYTE-GP-GSTFS31240GNTD-4.jpg');
CALL INSERTAPRODUCTO (6,'HP 27es LED 27in','HP', 29,'CARACTERISTICAS',3319.00,'DESCRIPCION','CP-HP-T3M86AA-1.webp','CP-HP-T3M86AA-2.webp','CP-HP-T3M86AA-3.webp','CP-HP-T3M86AA-4.webp');
CALL INSERTAPRODUCTO (8,'MU III PH6 120GB','Lite-ON', 8,'CARACTERISTICAS',529,'DESCRIPCION','CP-LITE-ON-PH6-CE120-M06-1.jpg','CP-LITE-ON-PH6-CE120-M06-2.jpg','CP-LITE-ON-PH6-CE120-M06-3.jpg','CP-LITE-ON-PH6-CE120-M06-4.jpg');
CALL INSERTAPRODUCTO (9,'Tt eSports POSEIDON Z Forged','Thermaltake', 70,'CARACTERISTICAS',2149,'DESCRIPCION','CP-THERMALTAKE-KB-BAZ-KLBLUS-01-1.jpg','CP-THERMALTAKE-KB-BAZ-KLBLUS-01-2.jpg','CP-THERMALTAKE-KB-BAZ-KLBLUS-01-3.jpg','CP-THERMALTAKE-KB-BAZ-KLBLUS-01-4.jpg');
CALL INSERTAPRODUCTO (1,'GIGABYTE NVIDIA 1050','GIGABITE',22,'CARACTERISTICAS',3000.99,'DESCRIPCION','CP-GIGABYTE-GV-N1050D5-3GD-1.png','CP-GIGABYTE-GV-N1050D5-3GD-2.jpg','CP-GIGABYTE-GV-N1050D5-3GD-3.jpg','CP-GIGABYTE-GV-N1050D5-3GD-4.jpg');
CALL INSERTAPRODUCTO (1,'AMD Radeon RX 550','Sapphire',23,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-SAPPHIRE-11268-03-20G-1.png','CP-SAPPHIRE-11268-03-20G-3.jpg','CP-SAPPHIRE-11268-03-20G-4.jpg','CP-SAPPHIRE-11268-03-20G-5.jpg');
CALL INSERTAPRODUCTO (5,'Aero-300 FAW con Ventana','Aerocool',36,'CARACTERISTICAS',649.00,'DESCRIPCION','CP-AEROCOOL-4713105951745-1.jpg','CP-AEROCOOL-4713105951745-2.jpg','CP-AEROCOOL-4713105951745-3.webp','CP-AEROCOOL-4713105951745-4.jpg');
CALL INSERTAPRODUCTO (5,'Obsidian 500D Premium con Ventana','Corsair ', 98,'CARACTERISTICAS',2209.00,'DESCRIPCION','CP-CORSAIR-CC-9011116-WW-1.jpg','CP-CORSAIR-CC-9011116-WW-2.webp','CP-CORSAIR-CC-9011116-WW-6.webp','CP-CORSAIR-CC-9011116-WW-10.webp');
CALL INSERTAPRODUCTO (8,'A400 240GB','Kingston', 68,'CARACTERISTICAS',569,'DESCRIPCION','CP-KINGSTON-SA400S37240G-1.jpg','CP-KINGSTON-SA400S37240G-2.jpg','CP-KINGSTON-SA400S37240G-3.jpg','CP-KINGSTON-SA400S37240G-4.jpg');
CALL INSERTAPRODUCTO (1,'NVIDIA GeForce RTX 2070 ','GIGABYTE', 26,'CARACTERISTICAS',11479.00,'DESCRIPCION','CP-GIGABYTE-GV-N2070GAMINGOC-8GC-1.jpg','CP-GIGABYTE-GV-N2070GAMINGOC-8GC-2.jpg','CP-GIGABYTE-GV-N2070GAMINGOC-8GC-3.jpg','CP-GIGABYTE-GV-N2070GAMINGOC-8GC-4.jpg');
CALL INSERTAPRODUCTO (1,'NVIDIA Quadro RTX 4000','PNY',14,'CARACTERISTICAS',19899,'DESCRIPCION','CP-PNY-VCQRTX4000-PB-1.jpg','CP-PNY-VCQRTX4000-PB-2.webp','CP-PNY-VCQRTX4000-PB-3.webp','CP-PNY-VCQRTX4000-PB-4.webp');
CALL INSERTAPRODUCTO (1,'NVIDIA GeForce GTX 1650 GAMING X 4G','MSI',20,'CARACTERISTICAS', 3629.00,'DESCRIPCION','CP-MSI-912-V380-003-1.webp','CP-MSI-912-V380-003-2.jpg','CP-MSI-912-V380-003-3.jpg','CP-MSI-912-V380-003-5.jpg');
CALL INSERTAPRODUCTO (4,'ATX B350GT5','Biostar',11,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-BIOSTAR-B350GT5-2.jpg','CP-BIOSTAR-B350GT5-1.jpg','CP-BIOSTAR-B350GT5-3.jpg','CP-BIOSTAR-B350GT5-4.jpg');
CALL INSERTAPRODUCTO (4,'ATX B250 MINING EXPERT','ASUS',72,'CARACTERISTICAS',1899.00,'DESCRIPCION','CP-ASUS-90MB0VY0-M0AAY0-1.jpg','CP-ASUS-90MB0VY0-M0AAY0-2.jpg','CP-ASUS-90MB0VY0-M0AAY0-3.jpg','CP-ASUS-90MB0VY0-M0AAY0-4.jpg');
CALL INSERTAPRODUCTO (7,'Liqmax II 240 Enfriamiento para CPU','Enermax', 78,'CARACTERISTICAS',1969,'DESCRIPCION','CP-ENERMAX-ELC-LMR240-BS-1.jpg','CP-ENERMAX-ELC-LMR240-BS-2.jpg','CP-ENERMAX-ELC-LMR240-BS-3.jpg','CP-ENERMAX-ELC-LMR240-BS-4.jpg');
CALL INSERTAPRODUCTO (3,'ES-05004','Acteck',56,'CARACTERISTICAS',659,'DESCRIPCION','CP-ACTECK-ES-05004-1.jpg','CP-ACTECK-ES-05004-2.jpg','CP-ACTECK-ES-05004-3.jpg','CP-ACTECK-ES-05004-4.jpg');
CALL INSERTAPRODUCTO (6,'LC43J890DKLXZX LED 43.4in','Samsung', 17,'CARACTERISTICAS',10759,'DESCRIPCION','CP-SAMSUNG-LC43J890DKLXZX-1.jpg','CP-SAMSUNG-LC43J890DKLXZX-2.webp','CP-SAMSUNG-LC43J890DKLXZX-3.jpg','CP-SAMSUNG-LC43J890DKLXZX-4.jpg');
CALL INSERTAPRODUCTO (7,'RayStorm Ion EX120 Refrigeracion Liquida para CPU','XSPC', 10,'CARACTERISTICAS',3269,'DESCRIPCION','CP-XSPC-5060175588296-1.jpg','CP-XSPC-5060175588296-2.jpg','CP-XSPC-5060175588296-3.jpg','CP-XSPC-5060175588296-4.jpg');
CALL INSERTAPRODUCTO (8,'SSDNow UV400 120GB','Kingston', 4,'CARACTERISTICAS',849,'DESCRIPCION','CP-KINGSTON-SUV400S37120G-1.jpg','CP-KINGSTON-SUV400S37120G-3.jpg','CP-KINGSTON-SUV400S37120G-4.jpg','CP-KINGSTON-SUV400S37120G-5.jpg');
CALL INSERTAPRODUCTO (3,'MasterWatt Lite 600 80 PLUS','Cooler Master',15,'CARACTERISTICAS',1119.00,'DESCRIPCION','CP-COOLERMASTER-MPX-6001-ACAAW-1.jpg','CP-COOLERMASTER-MPX-6001-ACAAW-2.jpg','CP-COOLERMASTER-MPX-6001-ACAAW-3.jpg','CP-COOLERMASTER-MPX-6001-ACAAW-4.jpg');
CALL INSERTAPRODUCTO (9,' G603, RF Inalámbrico Bluetooth','Logitech', 8,'CARACTERISTICAS',749.00,'DESCRIPCION','CP-LOGITECH-910-005100-1.jpg','CP-LOGITECH-910-005100-2.jpg','CP-LOGITECH-910-005100-3.webp','CP-LOGITECH-910-005100-.jpg');
CALL INSERTAPRODUCTO (4,'micro ATX MB PRIME A320M-K,','ASUS',17,'CARACTERISTICAS',1069.00,'DESCRIPCION','CP-ASUS-90MB0TV0-M0AAY0-1.jpg','CP-ASUS-90MB0TV0-M0AAY0-2.jpg','CP-ASUS-90MB0TV0-M0AAY0-3.jpg','CP-ASUS-90MB0TV0-M0AAY0-4.jpg');
CALL INSERTAPRODUCTO (3,'VS450 80 PLUS White','Corsair',19,'CARACTERISTICAS',919.00,'DESCRIPCION','CP-CORSAIR-CP-9020170-NA-1.jpg','CP-CORSAIR-CP-9020170-NA-2.jpg','CP-CORSAIR-CP-9020170-NA-3.WEBP','CP-CORSAIR-CP-9020170-NA-4.jpg');
CALL INSERTAPRODUCTO (8,'860 EVO 250GB','Samsung ', 50,'CARACTERISTICAS',1739,'DESCRIPCION','CP-SAMSUNG-MZ-N6E250BW-1.jpg','CP-SAMSUNG-MZ-N6E250BW-2.jpg','CP-SAMSUNG-MZ-N6E250BW-3.jpg','CP-SAMSUNG-MZ-N6E250BW-7.jpg');
CALL INSERTAPRODUCTO (4,'microATX GA-A320M-S2H','Gigabyte',15,'CARACTERISTICAS',1079.00,'DESCRIPCION','CP-GIGABYTE-GA-A320M-S2H-1.jpg','CP-GIGABYTE-GA-A320M-S2H-2.jpg','CP-GIGABYTE-GA-A320M-S2H-3.jpg','CP-GIGABYTE-GA-A320M-S2H-4.jpg');
CALL INSERTAPRODUCTO (3,'Gigabyte PB500 80 PLUS Bronze','GIGABYTE',28,'CARACTERISTICAS',1169.00,'DESCRIPCION','CP-GIGABYTE-PB500-1.jpg','CP-GIGABYTE-PB500-2.jpg','CP-GIGABYTE-PB500-3.jpg','CP-GIGABYTE-PB500-4.jpg');
CALL INSERTAPRODUCTO (6,'e2270Swn LED 21.5','AOC', 40,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-AOC-E2270SWN-1.jpg','CP-AOC-E2270SWN-2.jpg','CP-AOC-E2270SWN-3.jpg','CP-AOC-E2270SWN-4.jpg');
CALL INSERTAPRODUCTO (1,'AMD Radeon RX 570','GIGABYTE', 57,'CARACTERISTICAS',3489,'DESCRIPCION','CP-GIGABYTE-GV-RX570GAMING-8GD-1.jpg','CP-GIGABYTE-GV-RX570GAMING-8GD-2.jpg','CP-GIGABYTE-GV-RX570GAMING-8GD-3.jpg','CP-GIGABYTE-GV-RX570GAMING-8GD-4.jpg');
CALL INSERTAPRODUCTO (2,'Ryzen 3 2200G','AMD', 19,'CARACTERISTICAS',1729.00,'DESCRIPCION','CP-AMD-YD2200C5FBBOX-1.webp','CP-AMD-YD2200C5FBBOX-2.webp','CP-AMD-YD2200C5FBBOX-1.webp','CP-AMD-YD2200C5FBBOX-3.jpg');
CALL INSERTAPRODUCTO (2,'Ryzen 5 2400G','AMD',53,'CARACTERISTICAS',2549.00,'DESCRIPCION','CP-AMD-YD2400C5FBBOX-1.webp','CP-AMD-YD2400C5FBBOX-2.webp','CP-AMD-YD2400C5FBBOX-3.webp','CP-AMD-YD2400C5FBBOX-4.jpg');
CALL INSERTAPRODUCTO (7,'Water 3.0 Performer C Enfriamiento Líquido para CPU','Thermaltake ', 50,'CARACTERISTICAS',1099,'DESCRIPCION','CP-THERMALTAKE-CLW0222-B-1.webp','CP-THERMALTAKE-CLW0222-B-2.webp','CP-THERMALTAKE-CLW0222-B-3.jpg','CP-THERMALTAKE-CLW0222-B-4.jpg');
CALL INSERTAPRODUCTO (1,'NVIDIA GeForce RTX 2060 Rog Strix','ASUS',84,'CARACTERISTICAS',8829.00,'DESCRIPCION','CP-ASUS-90YV0CI0-M0NA00-1.jpg','CP-ASUS-90YV0CI0-M0NA00-2.jpg','CP-ASUS-90YV0CI0-M0NA00-3.jpg','CP-ASUS-90YV0CI0-M0NA00-4.jpg');
CALL INSERTAPRODUCTO (7,' MasterLiquid ML240L RGB','Cooler Master', 86,'CARACTERISTICAS',1409,'DESCRIPCION','CP-COOLERMASTER-MLW-D24M-A20PC-R1-1.jpg','CP-COOLERMASTER-MLW-D24M-A20PC-R1-2.jpg','CP-COOLERMASTER-MLW-D24M-A20PC-R1-3.jpg','CP-COOLERMASTER-MLW-D24M-A20PC-R1-4.jpg');
CALL INSERTAPRODUCTO (4,'microATX B360M DS3H','GIGABYTE', 12,'CARACTERISTICAS',1539.00,'DESCRIPCION','CP-GIGABYTE-B360MDS3H-1.jpg','CP-GIGABYTE-B360MDS3H-2.jpg','CP-GIGABYTE-B360MDS3H-3.jpg','CP-GIGABYTE-B360MDS3H-4.jpg');
CALL INSERTAPRODUCTO (2,'Core i5-8400','INTEL', 28,'CARACTERISTICAS',3979.00,'DESCRIPCION','CP-INTEL-BX80684I58400-1.jpg','CP-INTEL-BX80684I58400-2.jpg','CP-INTEL-BX80684I58400-3.webp','CP-INTEL-BX80684I58400-4.jpg');
CALL INSERTAPRODUCTO (2, 'Ryzen 7 2700X','AMD',18,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-AMD-YD270XBGAFBOX-1.jpg','CP-AMD-YD270XBGAFBOX-2.jpg','CP-AMD-YD270XBGAFBOX-3.jpg','CP-AMD-YD270XBGAFBOX-2.jpg');
CALL INSERTAPRODUCTO (7,' Kraken X62','NZXT', 44,'CARACTERISTICAS',2639.00,'DESCRIPCION','CP-NZXT-RL-KRX62-02-1.webp','CP-NZXT-RL-KRX62-02-2.jpg','CP-NZXT-RL-KRX62-02-3.jpg','CP-NZXT-RL-KRX62-02-4.jpg');
CALL INSERTAPRODUCTO (3,'DQ550ST 80 PLUS Gold','DeepCool ',26,'CARACTERISTICAS',1789.00,'DESCRIPCION','CP-DEEPCOOL-DP-GD-DQ550ST-1.jpg','CP-DEEPCOOL-DP-GD-DQ550ST-2.jpg','CP-DEEPCOOL-DP-GD-DQ550ST-3.jpg','CP-DEEPCOOL-DP-GD-DQ550ST-4.jpg');
CALL INSERTAPRODUCTO (3,'100-W1-0500-KR 80 PLUS','EVGA',14,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-EVGA-100-W1-0500-KR-1.jpg','CP-EVGA-100-W1-0500-KR-2.jpg','CP-EVGA-100-W1-0500-KR-3.jpg','CP-EVGA-100-W1-0500-KR-4.webp');
CALL INSERTAPRODUCTO (1,'AMD Radeon RX 570','ASUS', 97,'CARACTERISTICAS',5799.00,'DESCRIPCION','CP-ASUS-90YV0AJ0-M0NA00-1.jpg','CP-ASUS-90YV0AJ0-M0NA00-2.jpg','CP-ASUS-90YV0AJ0-M0NA00-3.jpg','CP-ASUS-90YV0AJ0-M0NA00-4.jpg');
CALL INSERTAPRODUCTO (8,'SX8200 Pro 512GB','adata XPG', 88,'CARACTERISTICAS',1519.00,'DESCRIPCION','CP-ADATA-ASX8200PNP-512GT-C-1.jpg','CP-ADATA-ASX8200PNP-512GT-C-2.jpg','CP-ADATA-ASX8200PNP-512GT-C-1.jpg','CP-ADATA-ASX8200PNP-512GT-C-3.jpg');
CALL INSERTAPRODUCTO (4,'micro ATX TUF B450M-PLUS GAMING','ASUS', 51,'CARACTERISTICAS',2079.00,'DESCRIPCION','CP-ASUS-90MB0YQ0-M0AAY0-1.webp','CP-ASUS-90MB0YQ0-M0AAY0-2.webp','CP-ASUS-90MB0YQ0-M0AAY0-3.webp','CP-ASUS-90MB0YQ0-M0AAY0-2.webp');
CALL INSERTAPRODUCTO (1,'NVIDIA GeForce RTX 2060','ZOTAC',80,'CARACTERISTICAS',8159.00,'DESCRIPCION','CP-ZOTAC-ZT-T20600F-10M-1.jpg','CP-ZOTAC-ZT-T20600F-10M-2.webp','CP-ZOTAC-ZT-T20600F-10M-3.webp','CP-ZOTAC-ZT-T20600F-10M-4.webp');
CALL INSERTAPRODUCTO (3,'450 BT 80 PLUS Bronze','EVGA',12,'CARACTERISTICAS',1039.00,'DESCRIPCION','CP-EVGA-100-BT-0450-K1-1.jpg','CP-EVGA-100-BT-0450-K1-2.jpg','CP-EVGA-100-BT-0450-K1-3.webp','CP-EVGA-100-BT-0450-K1-4.jpg');
CALL INSERTAPRODUCTO (4,'X470 ULTRA GAMING','AORUS ',3,'CARACTERISTICAS',3199.00,'DESCRIPCION','CP-AORUS-X470AORUSULTRAGAMING-1.jpg','CP-AORUS-X470AORUSULTRAGAMING-2.jpg','CP-AORUS-X470AORUSULTRAGAMING-3.jpg','CP-AORUS-X470AORUSULTRAGAMING-4.jpg');
CALL INSERTAPRODUCTO (8,'Ultimate SU650 240GB','Adata', 5,'CARACTERISTICAS',595.00,'DESCRIPCION','CP-ADATA-ASU650SS-240GT-R-1.webp','CP-ADATA-ASU650SS-240GT-R-2.jpg','CP-ADATA-ASU650SS-240GT-R-3.jpg','CP-ADATA-ASU650SS-240GT-R-4.jpg');
CALL INSERTAPRODUCTO (2,'Core i3-8100','INTEL',52,'CARACTERISTICAS',2889.00,'DESCRIPCION','CP-INTEL-BX80684I38100-2.jpg','CP-INTEL-BX80684I38100-1.jpg','CP-INTEL-BX80684I38100-3.jpg','CP-INTEL-BX80684I38100-4.jpg');
CALL INSERTAPRODUCTO (5,'CSG500 con Ventana','Game Factor',67,'CARACTERISTICAS',659.00,'DESCRIPCION','CP-GAMEFACTOR-CSG500-WT-1.webp','CP-GAMEFACTOR-CSG500-WT-2.webp','CP-GAMEFACTOR-CSG500-WT-3.webp','CP-GAMEFACTOR-CSG500-WT-4.webp');
CALL INSERTAPRODUCTO (6,'24MP59G-P LED 23.8in','LG', 24,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-LG-24MP59G-P-1.webp','CP-LG-24MP59G-P-2.webp','CP-LG-24MP59G-P-3.webp','CP-LG-24MP59G-P-4.webp');
CALL INSERTAPRODUCTO (4,'micro ATX B450 AORUS M (rev. 1.0)','AORUS', 8,'CARACTERISTICAS',1979,'DESCRIPCION','CP-GIGABYTE-B450AORUSM-1.jpg','CP-GIGABYTE-B450AORUSM-2.jpg','CP-GIGABYTE-B450AORUSM-3.jpg','CP-GIGABYTE-B450AORUSM-4.jpg');
CALL INSERTAPRODUCTO (5,'Cylon con Ventana RGB, Midi-Tower','Aerocool', 54,'CARACTERISTICAS',779.00,'DESCRIPCION','CP-AEROCOOL-CYLONW-1.webp','CP-AEROCOOL-CYLONW-2.webp','CP-AEROCOOL-CYLONW-3.webp','CP-AEROCOOL-CYLONW-4.webp');
CALL INSERTAPRODUCTO (4,'microATX A320M-HDV','ASRock',19,'CARACTERISTICAS',1049,'DESCRIPCION','CP-ASROCK-A320M-HDV-1.jpg','CP-ASROCK-A320M-HDV-2.jpg','CP-ASROCK-A320M-HDV-3.jpg','CP-ASROCK-A320M-HDV-4.jpg');
CALL INSERTAPRODUCTO (2,'Core i7-8700','INTEL',15,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-INTEL-BX80684I78700-1.jpg','CP-INTEL-BX80684I78700-2.jpg','CP-INTEL-BX80684I78700-3.jpg','CP-INTEL-BX80684I78700-4.jpg');
CALL INSERTAPRODUCTO (8,'A400 480GB','Kingston ', 98,'CARACTERISTICAS',1029,'DESCRIPCION','CP-KINGSTON-SA400S37480G-1.jpg','CP-KINGSTON-SA400S37480G-2.jpg','CP-KINGSTON-SA400S37480G-5.webp','CP-KINGSTON-SA400S37480G-6.webp');
CALL INSERTAPRODUCTO (5,'CSG501 con Ventana RGB','Game Factor', 97,'CARACTERISTICAS',899.00,'DESCRIPCION','CP-GAMEFACTOR-CSG501-1.jpg','CP-GAMEFACTOR-CSG501-.jpg','CP-GAMEFACTOR-CSG501-3.webp','CP-GAMEFACTOR-CSG501-4.webp');
CALL INSERTAPRODUCTO (3,'Revolution Xt II 80 PLUS Gold','Enermax',6,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-ENERMAX-ERX650AWT-1.jpg','CP-ENERMAX-ERX650AWT-2.jpg','CP-ENERMAX-ERX650AWT-3.jpg','CP-ENERMAX-ERX650AWT-4.jpg');
CALL INSERTAPRODUCTO (7,'MasterLiquid ML120L RGB ','Cooler Master', 50,'CARACTERISTICAS',1189.00,'DESCRIPCION','CP-COOLERMASTER-MLW-D12M-A20PC-R1-1.jpg','CP-COOLERMASTER-MLW-D12M-A20PC-R1-2.jpg','CP-COOLERMASTER-MLW-D12M-A20PC-R1-3.webp','CP-COOLERMASTER-MLW-D12M-A20PC-R1-4.jpg');
CALL INSERTAPRODUCTO (1,'NVIDIA GeForce GTX 1660 Ti ','GIGABYTE',8,'CARACTERISTICAS',6559.00,'DESCRIPCION','CP-GIGABYTE-GV-N166TOC-6GD-1.jpg','CP-GIGABYTE-GV-N166TOC-6GD-2.jpg','CP-GIGABYTE-GV-N166TOC-6GD-3.jpg','CP-GIGABYTE-GV-N166TOC-6GD-4.webp');
CALL INSERTAPRODUCTO (4,'ATX B450 AORUS ELITE','AORUS',14,'CARACTERISTICAS',2219.00,'DESCRIPCION','CP-GIGABYTE-B450AORUSELITE-1.jpg','CP-GIGABYTE-B450AORUSELITE-2.jpg','CP-GIGABYTE-B450AORUSELITE-3.jpg','CP-GIGABYTE-B450AORUSELITE-4.jpg');
CALL INSERTAPRODUCTO (1,'GeForce GTX 1060 ROG STRIX ','ASUS', 23,'CARACTERISTICAS',5029.00,'DESCRIPCION','CP-ASUS-90YV09Q3-M0NA00-1.jpg','CP-ASUS-90YV09Q3-M0NA00-2.jpg','CP-ASUS-90YV09Q3-M0NA00-3.jpg','CP-ASUS-90YV09Q3-M0NA00-4.jpg');
CALL INSERTAPRODUCTO (5,'MasterBox MB500 con Ventana RGB','masterbox', 54,'CARACTERISTICAS',1309.00,'DESCRIPCION','CP-COOLERMASTER-MCB-B500D-KGNN-S00-1.jpg','CP-COOLERMASTER-MCB-B500D-KGNN-S00-2.jpg','CP-COOLERMASTER-MCB-B500D-KGNN-S00-3.webp','CP-COOLERMASTER-MCB-B500D-KGNN-S00-4.jpg');
CALL INSERTAPRODUCTO (5,'Obsidian 500D con Ventana RGB','Corsair', 7,'CARACTERISTICAS',4759.00,'DESCRIPCION','CP-CORSAIR-CC-9011139-WW-1.webp','CP-CORSAIR-CC-9011139-WW-4.webp','CP-CORSAIR-CC-9011139-WW-8.webp','CP-CORSAIR-CC-9011139-WW-9.jpg');
CALL INSERTAPRODUCTO (9,'MOG500','Game Factor', 31,'CARACTERISTICAS',413.00,'DESCRIPCION','CP-GAMEFACTOR-MOG500-1.webp','CP-GAMEFACTOR-MOG500-2.webp','CP-GAMEFACTOR-MOG500-3.webp','CP-GAMEFACTOR-MOG500-4.webp');
CALL INSERTAPRODUCTO (9,'Óptico G502 Hero RGB, Alámbrico','Logitech', 72,'CARACTERISTICAS',869.00,'DESCRIPCION','CP-LOGITECH-910-005470-1.jpg','CP-LOGITECH-910-005470-2.webp','CP-LOGITECH-910-005470-3.webp','CP-LOGITECH-910-005470-4.webp');
CALL INSERTAPRODUCTO (1,'NVIDIA GeForce GTX 1660 Ti Ventus XS OC','MSI',64,'CARACTERISTICAS',6289.00,'DESCRIPCION','CP-MSI-GTX1660TIVENTUSXS6GOC-1.jpg','CP-MSI-GTX1660TIVENTUSXS6GOC-2.jpg','CP-MSI-GTX1660TIVENTUSXS6GOC-3.jpg','CP-MSI-GTX1660TIVENTUSXS6GOC-4.jpg');
CALL INSERTAPRODUCTO (1,'AMD Radeon RX 590 Nitro+ 50th','Sapphire ',22,'CARACTERISTICAS',4759.00,'DESCRIPCION','CP-SAPPHIRE-11289-07-20G-10.webp','CP-SAPPHIRE-11289-07-20G-1.webp','CP-SAPPHIRE-11289-07-20G-2.webp','CP-SAPPHIRE-11289-07-20G-3.webp');
CALL INSERTAPRODUCTO (5,'Cosmos C700P con Ventana LED RGB','Cooler Master ', 38,'CARACTERISTICAS',6339.00,'DESCRIPCION','CP-COOLERMASTER-MCC-C700P-MG5N-S00-1.webp','CP-COOLERMASTER-MCC-C700P-MG5N-S00-2.jpg','CP-COOLERMASTER-MCC-C700P-MG5N-S00-3.webp','CP-COOLERMASTER-MCC-C700P-MG5N-S00-4.webp');
CALL INSERTAPRODUCTO (3,'MasterWatt 550 80 PLUS Bronze','Cooler Master',5,'CARACTERISTICAS',1189.00,'DESCRIPCION','CP-COOLERMASTER-MPX-5501-AMAAB-US-1.jpg','CP-COOLERMASTER-MPX-5501-AMAAB-US-2.jpg','CP-COOLERMASTER-MPX-5501-AMAAB-US-3.jpg','CP-COOLERMASTER-MPX-5501-AMAAB-US-4.jpg');
CALL INSERTAPRODUCTO (1, 'AMD Radeon RX 550 Pulse','Sapphire',92,'CARACTERISTICAS',2339.00,'DESCRIPCION','CP-SAPPHIRE-11268-01-20G-1.jpg','CP-SAPPHIRE-11268-01-20G-4.jpg','CP-SAPPHIRE-11268-01-20G-5.jpg','CP-SAPPHIRE-11268-01-20G-6.jpg');
CALL INSERTAPRODUCTO (5,'H700 Nuka-Cola con Ventana, Midi-Tower','NZXT', 56,'CARACTERISTICAS',4819.00,'DESCRIPCION','CP-NZXT-CA-H700B-NC-1.webp','CP-NZXT-CA-H700B-NC-2.jpg','CP-NZXT-CA-H700B-NC-3.jpg','CP-NZXT-CA-H700B-NC-4.jpg');
CALL INSERTAPRODUCTO (5,'Gemini X con Ventana, Dual Tower','Cougar', 46,'CARACTERISTICAS',12639.00,'DESCRIPCION','CP-COUGAR-105LMT0001-00-1.jpg','CP-COUGAR-105LMT0001-00-2.jpg','CP-COUGAR-105LMT0001-00-3.jpg','CP-COUGAR-105LMT0001-00-10.jpg');
CALL INSERTAPRODUCTO (4,'micro ATX H310M H, S-1151','Gigabyte',11,'CARACTERISTICAS',1239.00,'DESCRIPCION','CP-GIGABYTE-H310MH-1.jpg','CP-GIGABYTE-H310MH-2.jpg','CP-GIGABYTE-H310MH-3.jpg','CP-GIGABYTE-H310MH-4.jpg');
CALL INSERTAPRODUCTO (9,'Surpassion ST, Alámbrico','Cougar', 32,'CARACTERISTICAS',749.00,'DESCRIPCION','CP-COUGAR-3MSSTWOB0001-1.jpg','CP-COUGAR-3MSSTWOB0001-2.jpg','CP-COUGAR-3MSSTWOB0001-3.jpg','CP-COUGAR-3MSSTWOB0001-4.jpg');
CALL INSERTAPRODUCTO (1,'AMD Radeon VII Gaming','ASRock',5,'CARACTERISTICAS',2479.00,'DESCRIPCION','CP-ASROCK-PGXRVII16G-1.webp','CP-ASROCK-PGXRVII16G-2.jpg','CP-ASROCK-PGXRVII16G-3.jpg','CP-ASROCK-PGXRVII16G-4.jpg');

/*Bitacoras*/
/*Producto*/
CREATE TABLE BITACORA_PRODUCTO(
idbp int primary key auto_increment,
idproducto int,
fecha timestamp default CURRENT_TIMESTAMP,
ejecutor varchar(25),
actividad_realizada varchar(255),
informacion_actual varchar(250),
informacion_anterior varchar(250)
);

DELIMITER //
CREATE TRIGGER bitacoraproducto AFTER INSERT ON producto FOR EACH ROW
BEGIN
	INSERT INTO bitacora_producto(idproducto,ejecutor,actividad_realizada,informacion_actual) values(new.idproducto,current_user,"Se inserto nuevo producto",
    concat("Informacion actual: ",new.idcategoria," ",new.nombre_p," ",new.marca,
			" ",new.CANTIDAD_ALMACEN," ",new.CARACTERISTICAS," ",new.precio," ",new.descripcion," ",
			new.img1," ",new.img2," ",new.img3," ",new.img4));
END //

DELIMITER //
CREATE TRIGGER bitacoraproductoDel after DELETE ON producto FOR EACH ROW
BEGIN 
	INSERT INTO bitacora_producto(idproducto,ejecutor,actividad_realizada,informacion_anterior) values(old.idproducto,current_user,"Se elimino un producto",
    concat("Informacion anterior: ",old.idcategoria," ",old.nombre_p," ",old.marca,
			" ",old.CANTIDAD_ALMACEN," ",old.CARACTERISTICAS," ",old.precio," ",old.descripcion," ",
			old.img1," ",old.img2," ",old.img3," ",old.img4));
END //
DELIMITER //
CREATE TRIGGER bitacoraproductoUP after UPDATE ON producto FOR EACH ROW
BEGIN
	INSERT INTO bitacora_producto(idproducto,ejecutor,actividad_realizada,informacion_actual,informacion_anterior) values(new.idproducto,current_user,"Se actualizo producto",
    concat("Informacion actual: ",new.idcategoria," ",new.nombre_p," ",new.marca,
			" ",new.CANTIDAD_ALMACEN," ",new.CARACTERISTICAS," ",new.precio," ",new.descripcion," ",
			new.img1," ",new.img2," ",new.img3," ",new.img4),concat("Informacion anterior: ",old.idcategoria," ",old.nombre_p," ",old.marca,
			" ",old.CANTIDAD_ALMACEN," ",old.CARACTERISTICAS," ",old.precio," ",old.descripcion," ",
			old.img1," ",old.img2," ",old.img3," ",old.img4));
END //

CREATE TABLE BITACORA_PEDIDO(
idbp int primary key auto_increment,
idpedido int,
fecha timestamp default CURRENT_TIMESTAMP,
ejecutor varchar(25),
actividad_realizada varchar(255),
informacion_actual varchar(250),
informacion_anterior varchar(250)
);
DELIMITER //
CREATE TRIGGER bitacorapedidoINS AFTER INSERT ON pedido FOR EACH ROW
BEGIN
	INSERT INTO bitacora_pedido(idpedido,ejecutor,actividad_realizada,informacion_actual) values(new.idpedido,current_user,"Se Inserto pedido",
    concat("Informacion actual: ",new.SUBTOTAL," ",new.TOTAL," ",new.IDUSUARIO));
END //

DELIMITER //
CREATE TRIGGER bitacorapedidoDEL AFTER DELETE ON pedido FOR EACH ROW
BEGIN
	INSERT INTO bitacora_pedido(idpedido,ejecutor,actividad_realizada,informacion_anterior) values(old.idpedido,current_user,"Se elimino pedido",
    concat("Informacion anterior: ",old.SUBTOTAL," ",old.TOTAL," ",old.IDUSUARIO));
END //

DELIMITER //
CREATE TRIGGER bitacorapedidoUP AFTER UPDATE ON pedido FOR EACH ROW
BEGIN
	INSERT INTO bitacora_pedido(idpedido,ejecutor,actividad_realizada,informacion_actual,informacion_anterior) values(new.idpedido,current_user,"Se actualizo pedido",
    concat("Informacion actual: ",new.SUBTOTAL," ",new.TOTAL," ",new.IDUSUARIO),concat("Informacion anterior: ",old.SUBTOTAL," ",old.TOTAL," ",old.IDUSUARIO));
END //
CREATE TABLE BITACORA_USUARIO(
idbp int primary key auto_increment,
idusuario int,
fecha timestamp default CURRENT_TIMESTAMP,
ejecutor varchar(25),
actividad_realizada varchar(255),
informacion_actual varchar(250),
informacion_anterior varchar(250)
);

DELIMITER //
CREATE TRIGGER bitacorausuarioINS AFTER INSERT ON usuario FOR EACH ROW
BEGIN
	INSERT INTO bitacora_usuario(idusuario,ejecutor,actividad_realizada,informacion_actual) values(new.idusuario,current_user,"Se Inserto usuario",
    concat("Informacion actual: ",new.NOMBRE," ",new.APELLIDO_PU," ",new.APELLIDO_MU,
    " ",new.NUMPEDIDO," ",new.NOMBRE_USUARIO," ",new.ESTADO," ",new.CIUDAD," ",new.COLONIA," ",new.calle," "
    ,new.FECHA_NAC," ",new.TELEFONO," ",new.CONTRASENIA," ",new.CORREO," ",new.CODIGO_POSTAL," ",new.NUMERO_INT," ",new.NUMERO_ext));
END //

DELIMITER //
CREATE TRIGGER bitacorausuarioDEL AFTER DELETE ON usuario FOR EACH ROW
BEGIN
	INSERT INTO bitacora_usuario(idusuario,ejecutor,actividad_realizada,informacion_anterior) values(old.idusuario,current_user,"Se elimino usuario",
    concat("Informacion anterior: ",old.NOMBRE," ",old.APELLIDO_PU," ",old.APELLIDO_MU,
    " ",old.NUMPEDIDO," ",old.NOMBRE_USUARIO," ",old.ESTADO," ",old.CIUDAD," ",old.COLONIA," ",old.calle," "
    ,old.FECHA_NAC," ",old.TELEFONO," ",old.CONTRASENIA," ",old.CORREO," ",old.CODIGO_POSTAL," ",old.NUMERO_INT," ",old.NUMERO_ext));
END //
DELIMITER //
CREATE TRIGGER bitacorausuarioUP AFTER update ON usuario FOR EACH ROW
BEGIN
	INSERT INTO bitacora_usuario(idusuario,ejecutor,actividad_realizada,informacion_actual,informacion_anterior) values(new.idusuario,current_user,"Se actualizo usuario",
    concat("Informacion actual: ",new.NOMBRE," ",new.APELLIDO_PU," ",new.APELLIDO_MU,
    " ",new.NUMPEDIDO," ",new.NOMBRE_USUARIO," ",new.ESTADO," ",new.CIUDAD," ",new.COLONIA," ",new.calle," "
    ,new.FECHA_NAC," ",new.TELEFONO," ",new.CONTRASENIA," ",new.CORREO," ",new.CODIGO_POSTAL," ",new.NUMERO_INT," ",new.NUMERO_ext),concat("Informacion anterior: ",old.NOMBRE," ",old.APELLIDO_PU," ",old.APELLIDO_MU,
    " ",old.NUMPEDIDO," ",old.NOMBRE_USUARIO," ",old.ESTADO," ",old.CIUDAD," ",old.COLONIA," ",old.calle," "
    ,old.FECHA_NAC," ",old.TELEFONO," ",old.CONTRASENIA," ",old.CORREO," ",old.CODIGO_POSTAL," ",old.NUMERO_INT," ",old.NUMERO_ext));
END //