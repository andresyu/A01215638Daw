IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Materiales')

DROP TABLE Materiales

CREATE TABLE Materiales(
Clave numeric(5) not null,
Descripcion varchar(50),
Costo numeric (8,2),
)

IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Proveedores')

DROP TABLE Proveedores

CREATE TABLE Proveedores(
RFC char(13) not null,
RazonSocial varchar(50)
)

IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Proyectos')

DROP TABLE Proyectos

CREATE TABLE Proyectos(
Numero numeric(5) not null,
Denominacion varchar(50)
)


IF EXISTS(SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Entregan')

DROP TABLE Entregan


CREATE TABLE Entregan(
Clave numeric(5) not null,
RFC char(13) not null,
Numero numeric(5) not null,
Fecha DateTime not null,
Cantidad numeric(8,2)
)

BULK INSERT a1215638.a1215638.[Materiales]
   FROM 'e:\wwwroot\a1215638\materiales.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

BULK INSERT a1215638.a1215638.[Proyectos]
   FROM 'e:\wwwroot\a1215638\proyectos.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

BULK INSERT a1215638.a1215638.[Proveedores]
   FROM 'e:\wwwroot\a1215638\proveedores.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

SET DATEFORMAT dmy -- especificar formato de la fecha

BULK INSERT a1215638.a1215638.[Entregan]
   FROM 'e:\wwwroot\a1215638\entregan.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

--Ejercicio 2

INSERT INTO Materiales values(1000, 'xxx', 1000)
Delete from Materiales where Clave = 1000 and Costo = 1000
ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

 sp_helpconstraint Materiales
 sp_helpconstraint Proveedores
 sp_helpconstraint Proyectos
 sp_helpconstraint Entregan

ALTER TABLE Proveedores
ADD CONSTRAINT llaveProveedores
PRIMARY KEY (RFC)

ALTER TABLE Proyectos
ADD CONSTRAINT llaveProyectos
PRIMARY KEY (Numero)

ALTER TABLE Entregan
ADD CONSTRAINT llaveEntregan
PRIMARY KEY (Clave, RFC, Numero, Fecha)


--ejercicio 3
SELECT * FROM Materiales
SELECT * FROM Proveedores
SELECT * FROM Proyectos
SELECT * FROM Entregan


INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0)
Delete from Entregan where Clave = 0

ALTER TABLE entregan add constraint cfentreganclave
  foreign key (Clave) references materiales(Clave)

ALTER TABLE entregan add constraint cfentreganclave
  foreign key (RFC) references materiales(RFC);

ALTER TABLE entregan add constraint cfentreganclave
  foreign key (Numero) references materiales(Numero)

 sp_helpconstraint Materiales
 sp_helpconstraint Proveedores
 sp_helpconstraint Proyectos
 sp_helpconstraint Entregan

--Ejercicio 4
INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0)

SELECT * FROM Entregan
Delete FROM Entregan
WHERE RFC='AAAA800101' AND Cantidad='0'

ALTER TABLE Entregan
ADD CONSTRAINT cantidad
CHECK (cantidad > 0)

 sp_helpconstraint Materiales
 sp_helpconstraint Proveedores
 sp_helpconstraint Proyectos
 sp_helpconstraint Entregan
