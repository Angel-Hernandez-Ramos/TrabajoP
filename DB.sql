/*Creacion de base de datos*/
DROP DATABASE IF EXISTS prospectos;
CREATE DATABASE prospectos;

USE prospectos;

DROP TABLE IF EXISTS prospecto;
CREATE TABLE prospecto(
    id_prospecto INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    p_apellido VARCHAR(30) NOT NULL,
    s_apellido VARCHAR(30) NOT NULL,
    calle VARCHAR(30) NOT NULL,
    numero INT(10) NOT NULL,
    colonia VARCHAR(30) NOT NULL,
    c_p INT(6) NOT NULL,
    telefono BIGINT(10) NOT NULL,
    RFC VARCHAR(13) NOT NULL,
    docs LONGBLOB,
    status INT(1) NOT NULL
);


/*Datos de prueba*/

INSERT INTO prospecto(nombre,p_apellido,s_apellido,calle,numero,colonia,c_p,telefono,RFC,docs,status) VALUES('Angel','Hernandez','Ramos','San Pablo',2228,'Santa Lucia',72499,2228399154,'QUMA470929F37','',0);

INSERT INTO prospecto(nombre,p_apellido,s_apellido,calle,numero,colonia,c_p,telefono,RFC,docs,status) VALUES('Angel','Hernandez','Ramos','San Pablo',2228,'Santa Lucia',72499,2228399154,'QUMA470929F37','',0);

INSERT INTO prospecto(nombre,p_apellido,s_apellido,calle,numero,colonia,c_p,telefono,RFC,docs,status) VALUES('Angel','Hernandez','Ramos','San Pablo',2228,'Santa Lucia',72499,2228399154,'QUMA470929F37','',0);


