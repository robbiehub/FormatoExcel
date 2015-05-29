# Host: localhost  (Version: 5.5.39)
# Date: 2015-05-27 10:10:00
# Generator: MySQL-Front 5.3  (Build 4.198)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "recibo5"
#

DROP TABLE IF EXISTS `recibo5`;
CREATE TABLE `recibo5` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Recibo ordinario` varchar(50) DEFAULT NULL,
  `Estado actual :` varchar(100) DEFAULT NULL,
  `Lugar y fecha:` varchar(100) DEFAULT NULL,
  `Dependencia` varchar(150) DEFAULT NULL,
  `Cantidad recibida` varchar(150) DEFAULT NULL,
  `Concepto` varchar(300) DEFAULT NULL COMMENT 'En este campo se explica el motivo del gasto de una manera detallada a manera de leyenda.',
  `Solicitante` varchar(255) DEFAULT NULL COMMENT 'Aqui se guarda el nombre del solicitante',
  `Cuentas de Gastos` varchar(255) DEFAULT NULL,
  `Cuenta de ingresos` varchar(255) DEFAULT NULL,
  `Tramite generado` varchar(255) DEFAULT NULL,
  `Folio` varchar(100) DEFAULT NULL,
  `Serie` varchar(100) DEFAULT NULL,
  `Fecha` varchar(50) DEFAULT NULL,
  `Emisor` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Importe` varchar(100) DEFAULT NULL,
  `Moneda` varchar(255) DEFAULT NULL,
  `Tipo de cambio` varchar(100) DEFAULT NULL,
  `Total` varchar(100) DEFAULT NULL,
  `Numero de Etapa` varchar(50) DEFAULT NULL,
  `Nombre de etapa` varchar(150) DEFAULT NULL,
  `Responsables` varchar(100) DEFAULT NULL,
  `Fecha2` varchar(255) DEFAULT NULL,
  `Hora` varchar(50) DEFAULT NULL,
  `Beneficiario` varchar(100) DEFAULT NULL,
  `Numero de empleado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "recibo5"
#

