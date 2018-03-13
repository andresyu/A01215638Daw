-- Parte 1
SET DATEFORMAT dmy
SELECT
  m.Clave,
  sum(e.Cantidad)                                              AS "Total:",
  sum(e.Cantidad * m.Costo * (1 + (PorcentajeImpuesto / 100))) AS "Importe Total:"
FROM Entregan e, Materiales m
WHERE e.Clave = m.Clave
      AND e.Fecha BETWEEN '01/01/1997' AND '31/12/1997'
GROUP BY m.Clave

SELECT
  p.RazonSocial,
  count(e.RFC)                                                 AS "Entregas:",
  sum(e.Cantidad * m.Costo * (1 + (PorcentajeImpuesto / 100))) AS "Importe Total:"
FROM Proveedores p, Entregan e, Materiales m
WHERE p.RFC = e.RFC AND e.Clave = m.Clave
GROUP BY RazonSocial

SELECT
  m.Clave,
  m.Descripcion,
  SUM(e.Cantidad)                                              AS "Total:",
  MIN(e.cantidad)                                              AS "Menor Cantidad:",
  MAX(e.cantidad)                                              AS "Mayor Cantidad:",
  SUM(e.Cantidad * m.Costo * (1 + (PorcentajeImpuesto / 100))) AS "Importe Total:"
FROM Materiales m, Entregan e
WHERE m.Clave = e.Clave
GROUP BY m.CLave, m.Descripcion
HAVING AVG(e.Cantidad) > 400

SELECT
  p.RazonSocial,
  AVG(e.Cantidad) AS "Cantidad Promedio",
  m.Clave,
  m.Descripcion
FROM Proveedores p, Entregan e, Materiales m
WHERE e.Clave = m.Clave AND e.RFC = p.RFC
GROUP BY p.RazonSocial, m.Clave, m.Descripcion
HAVING AVG(e.Cantidad) > 500

SELECT
  p.RazonSocial,
  AVG(e.Cantidad) AS "Cantidad Promedio",
  m.Clave,
  m.Descripcion
FROM Proveedores p, Entregan e, Materiales m
WHERE e.Clave = m.Clave AND e.RFC = p.RFC
GROUP BY p.RazonSocial, m.Clave, m.Descripcion
HAVING AVG(e.Cantidad) < 370 OR AVG(e.Cantidad) > 450
ORDER BY AVG(e.Cantidad)

-- Parte 2
INSERT INTO Materiales VALUES (1480, 'tuercas', 400, 2.88)
INSERT INTO Materiales VALUES (1450, 'cuadernos', 200, 2.88)
INSERT INTO Materiales VALUES (1460, 'plumas', 300, 2.88)
INSERT INTO Materiales VALUES (1440, 'hojas', 100, 2.88)
INSERT INTO Materiales VALUES (1470, 'tablas', 400, 2.88)

-- Parte 3
SELECT
  m.Clave,
  m.Descripcion
FROM Materiales m
WHERE m.Clave NOT IN
      (SELECT e.Clave
       FROM Entregan e)

SELECT
  p.RazonSocial,
  p.RFC
FROM Proveedores p, Entregan e
WHERE p.RFC = e.RFC
      AND e.Numero IN (SELECT p.Numero
                       FROM Proyectos p
                       WHERE p.Denominacion = 'Vamos Mexico' OR p.Denominacion = 'Queretaro Limpio')
GROUP BY p.RazonSocial, p.RFC

SELECT m.Descripcion
FROM Materiales m
WHERE M.Clave NOT IN (SELECT e.Clave
                      FROM Entregan e
                      WHERE e.Numero IN (SELECT p.Numero
                                         FROM Proyectos p
                                         WHERE p.Denominacion = 'CIT Yucatan'))

SELECT
  p.RazonSocial,
  AVG(e.Cantidad) AS "Cantidad Promedio"
FROM Proveedores p, Entregan e, Materiales m
WHERE e.Clave = m.Clave
      AND e.RFC = p.RFC
GROUP BY p.RazonSocial
HAVING AVG(e.Cantidad) > (SELECT AVG(e.Cantidad)
                          FROM Entregan e
                          WHERE e.RFC = 'AAAA800101')

SELECT
  p.RFC,
  p.RazonSocial
FROM Proveedores p, Entregan e, Proyectos pr
WHERE e.RFC = p.RFC AND e.Numero = pr.Numero
      AND pr.Denominacion = 'Infonavit Durango'
      AND (SELECT SUM(e.Cantidad)
           FROM Entregan e, Proyectos p
           WHERE e.Numero = p.Numero
                 AND e.Fecha BETWEEN '01/01/2001' AND '31/12/2001') < (SELECT SUM(e.Cantidad)
                                                                       FROM Entregan e, Proyectos p
                                                                       WHERE e.Numero = p.Numero
                                                                             AND
                                                                             e.Fecha BETWEEN '01/01/2000' AND '31/12/2000')