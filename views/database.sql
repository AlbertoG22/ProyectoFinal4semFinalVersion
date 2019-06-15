CREATE DATABASE IF NOT EXISTS sistema_cobranza;

USE sistema_cobranza;

CREATE TABLE IF NOT EXISTS propietario(
    idPropietario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(50) NOT NULL,
    Password VARCHAR(15) NOT NULL,
    Correo VARCHAR(30) NOT NULL,
    Telefono INT(10) NOT NULL
);
CREATE TABLE IF NOT EXISTS deudor(
    idDeudor INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Telefono VARCHAR(13) NOT NULL,
    Correo VARCHAR(30) NOT NULL,
    Password VARCHAR(15) NOT NULL,
    Deuda_Total DECIMAL(19,4) 
);
CREATE TABLE IF NOT EXISTS deudas(
    idDeudas INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idDeudor int(11) NOT NULL,
    FOREIGN KEY (idDeudor) REFERENCES deudor(idDeudor),
    Fecha DATETIME NOT NULL,
    Concepto VARCHAR(80) NOT NULL,
    Monto DECIMAL(19,4) NOT NULL
);
CREATE TABLE IF NOT EXISTS pagos(
    idPagos INT(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idDeudas int(50) not null,
    idDeudor int(50) not null,
    FOREIGN KEY (idDeudor) REFERENCES deudor(idDeudor),
    Fecha DATETIME NOT NULL,
    Monto DECIMAL(19,4) NOT NULL,
    FOREIGN KEY (idDeudas) REFERENCES deudas(idDeudas)
);

--Trigger para ir actualizando (sumando) la Deuda Total
DELIMITER && 
CREATE TRIGGER ActualizarMonto AFTER INSERT ON deudas FOR EACH ROW
BEGIN 
    UPDATE deudor SET deudor.Deuda_total = deudor.Deuda_total + NEW.Monto WHERE deudor.idDeudor = NEW.idDeudor;

END &&
DELIMITER ;

--Trigger para ir actualizando (restando) la Deuda Total
DELIMITER && 
CREATE TRIGGER RestarMontos AFTER INSERT ON pagos FOR EACH ROW
BEGIN 
    UPDATE deudor SET deudor.Deuda_total = deudor.Deuda_total - NEW.Monto WHERE deudor.idDeudor = NEW.idDeudor;

END &&
DELIMITER ;