# Host: localhost  (Version: 5.6.16)
# Date: 2015-05-29 13:46:14
# Generator: MySQL-Front 5.3  (Build 4.205)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "cuenta_gastos"
#

DROP TABLE IF EXISTS `cuenta_gastos`;
CREATE TABLE `cuenta_gastos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CuentaDeGastos` varchar(50) DEFAULT NULL,
  `CuentaDeIngresos` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cuenta_gastos"
#


#
# Structure for table "documentos_comprobatorios"
#

DROP TABLE IF EXISTS `documentos_comprobatorios`;
CREATE TABLE `documentos_comprobatorios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Folio` varchar(25) DEFAULT NULL,
  `Serie` varchar(25) DEFAULT NULL,
  `Fecha` varchar(20) DEFAULT NULL,
  `Emisor` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Importe` float DEFAULT NULL,
  `Moneda` varchar(15) DEFAULT NULL,
  `TC` int(11) DEFAULT NULL,
  `Total` float DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "documentos_comprobatorios"
#

INSERT INTO `documentos_comprobatorios` VALUES (1,'4A278AE32AD6','','42041','ESTACION DE SERVICIO 1642, S.A. DE C.V. [3610]','CONSUMO DE GASOLINA',150,'Pesos',1,150);

#
# Structure for table "flujo_tramite"
#

DROP TABLE IF EXISTS `flujo_tramite`;
CREATE TABLE `flujo_tramite` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NumEtapa` int(11) DEFAULT NULL,
  `Nombre_Etapa` varchar(25) DEFAULT NULL,
  `Responsable` varchar(75) DEFAULT NULL,
  `Fecha` varchar(20) DEFAULT NULL,
  `Hora` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "flujo_tramite"
#

INSERT INTO `flujo_tramite` VALUES (1,1114,'11100 - DIV. DE CS. EXACT','MONTESINOS CISNEROS*ROSA MARIA','42045','0.39450231');

#
# Structure for table "recibo_por_comprobar"
#

DROP TABLE IF EXISTS `recibo_por_comprobar`;
CREATE TABLE `recibo_por_comprobar` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Recibo` varchar(25) DEFAULT NULL,
  `EstadoActual` varchar(75) DEFAULT NULL,
  `LugarFecha` varchar(75) DEFAULT NULL,
  `Dependencia` varchar(75) DEFAULT NULL,
  `CantidadRecibida` float DEFAULT NULL,
  `Concepto` varchar(75) DEFAULT NULL,
  `Solicitante` varchar(75) DEFAULT NULL,
  `PeriodoGastos` varchar(30) DEFAULT NULL,
  `TramiteGenerado` varchar(75) DEFAULT NULL,
  `Beneficiario` varchar(75) DEFAULT NULL,
  `Proveedor` varchar(20) DEFAULT NULL,
  `Responsable` varchar(75) DEFAULT NULL,
  `NumEmpleado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "recibo_por_comprobar"
#


#
# Structure for table "recibos"
#

DROP TABLE IF EXISTS `recibos`;
CREATE TABLE `recibos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ReciboOrdinario` varchar(25) DEFAULT NULL,
  `EstadoActual` varchar(75) DEFAULT NULL,
  `LugarFecha` varchar(75) DEFAULT NULL,
  `Dependencia` varchar(75) DEFAULT NULL,
  `CantidadRecibida` float DEFAULT NULL,
  `Concepto` varchar(75) DEFAULT NULL,
  `Solicitante` varchar(75) DEFAULT NULL,
  `TramiteGenerado` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "recibos"
#

INSERT INTO `recibos` VALUES (1,'2015-001704-315101-05',' Trámite Listo para Afectación','Hermosillo Sonora a 11 de Febrero del 2015',' 315101 DIRECCIÓN DE LA DIVISIÓN DE CS. EXACTAS Y NATURALE',150,' REMBOLSO DE GASTOS CONSUMO GASOLINA',' [33127] ISLAS HOPKINS*DULCE MARIA',' 09 de Febrero del 2015 por ISLAS HOPKINS*DULCE MARIA, ID Tramite: 540376');
