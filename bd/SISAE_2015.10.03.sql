CREATE DATABASE  IF NOT EXISTS `sisae` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sisae`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sisae
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `egre_aso_carreras_ur`
--

DROP TABLE IF EXISTS `egre_aso_carreras_ur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_aso_carreras_ur` (
  `ID_UNIDAD_RESPONSABLE` int(4) NOT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `ID_CARRERA` int(10) NOT NULL,
  PRIMARY KEY (`ID_UNIDAD_RESPONSABLE`,`ID_CARRERA`),
  KEY `FK_CARRE_CARREUR_IDCARRE` (`ID_CARRERA`),
  CONSTRAINT `FK_CARRE_CARREUR_IDCARRE` FOREIGN KEY (`ID_CARRERA`) REFERENCES `egre_cat_carreras` (`ID_CARRERA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de asociacion entre unidad responsable  y carrera';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_aso_carreras_ur`
--

LOCK TABLES `egre_aso_carreras_ur` WRITE;
/*!40000 ALTER TABLE `egre_aso_carreras_ur` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_aso_carreras_ur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_aso_egre_dom_ext`
--

DROP TABLE IF EXISTS `egre_aso_egre_dom_ext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_aso_egre_dom_ext` (
  `ID_DOMICILIO_EXT` int(10) NOT NULL,
  `ID_EGRESADO` int(10) NOT NULL,
  PRIMARY KEY (`ID_DOMICILIO_EXT`,`ID_EGRESADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de asociación entre el egresado y el domicilio en el e';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_aso_egre_dom_ext`
--

LOCK TABLES `egre_aso_egre_dom_ext` WRITE;
/*!40000 ALTER TABLE `egre_aso_egre_dom_ext` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_aso_egre_dom_ext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_aso_egre_domicilios`
--

DROP TABLE IF EXISTS `egre_aso_egre_domicilios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_aso_egre_domicilios` (
  `ID_EGRESADO` int(10) NOT NULL,
  `ID_DOMICILIO` int(10) NOT NULL,
  PRIMARY KEY (`ID_EGRESADO`,`ID_DOMICILIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de asociación entre el egresado y el domicilio';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_aso_egre_domicilios`
--

LOCK TABLES `egre_aso_egre_domicilios` WRITE;
/*!40000 ALTER TABLE `egre_aso_egre_domicilios` DISABLE KEYS */;
INSERT INTO `egre_aso_egre_domicilios` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `egre_aso_egre_domicilios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_aso_hashtags_noticias`
--

DROP TABLE IF EXISTS `egre_aso_hashtags_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_aso_hashtags_noticias` (
  `ID_HASHTAG` int(10) NOT NULL,
  `ID_NOTICIA` int(10) NOT NULL,
  PRIMARY KEY (`ID_HASHTAG`,`ID_NOTICIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de asociación entre los hashtags y las noticias';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_aso_hashtags_noticias`
--

LOCK TABLES `egre_aso_hashtags_noticias` WRITE;
/*!40000 ALTER TABLE `egre_aso_hashtags_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_aso_hashtags_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_aso_hashtags_public`
--

DROP TABLE IF EXISTS `egre_aso_hashtags_public`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_aso_hashtags_public` (
  `ID_HASHTAG` int(10) DEFAULT NULL,
  `ID_PUBLICACION` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de asociación entre los hashtags y las publicaciones';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_aso_hashtags_public`
--

LOCK TABLES `egre_aso_hashtags_public` WRITE;
/*!40000 ALTER TABLE `egre_aso_hashtags_public` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_aso_hashtags_public` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_asociaciones`
--

DROP TABLE IF EXISTS `egre_asociaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_asociaciones` (
  `ID_ASOCIACION` int(10) NOT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `NOMBRE_ASOCIACION` varchar(150) DEFAULT NULL,
  `FECHA_AFILIACION` date DEFAULT NULL,
  `SIGLAS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ASOCIACION`),
  KEY `FK_EGRE_ASOC_IDEGRE` (`ID_EGRESADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de las asociaciones a las que pertenece el egresado\n                                      -';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_asociaciones`
--

LOCK TABLES `egre_asociaciones` WRITE;
/*!40000 ALTER TABLE `egre_asociaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_asociaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_bitacora`
--

DROP TABLE IF EXISTS `egre_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_bitacora` (
  `ID_BITACORA` int(10) NOT NULL,
  `ID_MOV_BITACORA` int(10) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `OBSERVACIONES` varchar(250) DEFAULT NULL,
  `IP` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_BITACORA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de la bitácora del sistema\n\nFECHA: fecha d';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_bitacora`
--

LOCK TABLES `egre_bitacora` WRITE;
/*!40000 ALTER TABLE `egre_bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_bitacora_validaciones`
--

DROP TABLE IF EXISTS `egre_bitacora_validaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_bitacora_validaciones` (
  `ID_BITACORA_VALIDACION` int(10) NOT NULL,
  `ID_DATOS_ACAD_IPN` int(10) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  PRIMARY KEY (`ID_BITACORA_VALIDACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla Bitácora de validaciones de datos académicos del egres';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_bitacora_validaciones`
--

LOCK TABLES `egre_bitacora_validaciones` WRITE;
/*!40000 ALTER TABLE `egre_bitacora_validaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_bitacora_validaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_capacitaciones`
--

DROP TABLE IF EXISTS `egre_capacitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_capacitaciones` (
  `ID_CAPACITACION` int(10) NOT NULL,
  `ID_TIPO_CAPACITACION` int(10) DEFAULT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `NOMBRE_CURSO` varchar(100) DEFAULT NULL,
  `INSTITUCION` varchar(100) DEFAULT NULL,
  `HORAS` int(5) DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  PRIMARY KEY (`ID_CAPACITACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de las capacitaciones tomadas por el egresado\n\n                                        ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_capacitaciones`
--

LOCK TABLES `egre_capacitaciones` WRITE;
/*!40000 ALTER TABLE `egre_capacitaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_capacitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_carreras`
--

DROP TABLE IF EXISTS `egre_cat_carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_carreras` (
  `ID_CARRERA` int(10) NOT NULL,
  `ID_OFERTA_EDUCATIVA` int(2) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `ID_NIVEL_EDUCATIVO` int(2) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `CARRERA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CARRERA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de carreras de los egresados del ipn\n\nC';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_carreras`
--

LOCK TABLES `egre_cat_carreras` WRITE;
/*!40000 ALTER TABLE `egre_cat_carreras` DISABLE KEYS */;
INSERT INTO `egre_cat_carreras` VALUES (1,1,1,'Sistemas Computacionales'),(2,2,2,'Comunicaciones');
/*!40000 ALTER TABLE `egre_cat_carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_estatus_egre`
--

DROP TABLE IF EXISTS `egre_cat_estatus_egre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_estatus_egre` (
  `ID_ESTATUS_EGRE` int(10) NOT NULL,
  `ESTATUS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTATUS_EGRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de estatus del egresado\n\nESTATUS: Descr';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_estatus_egre`
--

LOCK TABLES `egre_cat_estatus_egre` WRITE;
/*!40000 ALTER TABLE `egre_cat_estatus_egre` DISABLE KEYS */;
INSERT INTO `egre_cat_estatus_egre` VALUES (1,'Titulado'),(2,'Pasante'),(3,'Egresado');
/*!40000 ALTER TABLE `egre_cat_estatus_egre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_formas_titulacion`
--

DROP TABLE IF EXISTS `egre_cat_formas_titulacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_formas_titulacion` (
  `ID_FORMA_TITULACION` int(10) NOT NULL,
  `FORMA_TITULACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_FORMA_TITULACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de formas de titulación de los egresados\n\n                                               -&';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_formas_titulacion`
--

LOCK TABLES `egre_cat_formas_titulacion` WRITE;
/*!40000 ALTER TABLE `egre_cat_formas_titulacion` DISABLE KEYS */;
INSERT INTO `egre_cat_formas_titulacion` VALUES (1,'Tesis'),(2,'Examen'),(3,'Tesina'),(4,'TT'),(5,'Excelencia académica');
/*!40000 ALTER TABLE `egre_cat_formas_titulacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_medios_contacto`
--

DROP TABLE IF EXISTS `egre_cat_medios_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_medios_contacto` (
  `ID_MEDIO_CONTACTO` int(10) NOT NULL,
  `MEDIO_CONTACTO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_MEDIO_CONTACTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de medios de contacto del egresado';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_medios_contacto`
--

LOCK TABLES `egre_cat_medios_contacto` WRITE;
/*!40000 ALTER TABLE `egre_cat_medios_contacto` DISABLE KEYS */;
INSERT INTO `egre_cat_medios_contacto` VALUES (1,'Correo electrónico'),(2,'Teléfono fijo'),(3,'Teléfono móvil');
/*!40000 ALTER TABLE `egre_cat_medios_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_motivos_interrupcion`
--

DROP TABLE IF EXISTS `egre_cat_motivos_interrupcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_motivos_interrupcion` (
  `ID_MOTIVO_INTERRUPCION` int(10) NOT NULL,
  `MOTIVO_INTERRUPCION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_MOTIVO_INTERRUPCION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de motivos de interrupción de la carrera\n\n                                                  -&';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_motivos_interrupcion`
--

LOCK TABLES `egre_cat_motivos_interrupcion` WRITE;
/*!40000 ALTER TABLE `egre_cat_motivos_interrupcion` DISABLE KEYS */;
INSERT INTO `egre_cat_motivos_interrupcion` VALUES (1,'Familiares'),(2,'Económicos'),(3,'Salud'),(4,'Ninguno'),(5,'Otros');
/*!40000 ALTER TABLE `egre_cat_motivos_interrupcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_motivos_notitulacion`
--

DROP TABLE IF EXISTS `egre_cat_motivos_notitulacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_motivos_notitulacion` (
  `ID_MOTIVO_NOTITULACION` int(10) NOT NULL,
  `MOTIVO_NOTITULACION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_MOTIVO_NOTITULACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de motivos de no titulación del egresado\n\n                                                  -&';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_motivos_notitulacion`
--

LOCK TABLES `egre_cat_motivos_notitulacion` WRITE;
/*!40000 ALTER TABLE `egre_cat_motivos_notitulacion` DISABLE KEYS */;
INSERT INTO `egre_cat_motivos_notitulacion` VALUES (1,'Si me titulé'),(2,'No me titulé');
/*!40000 ALTER TABLE `egre_cat_motivos_notitulacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_movs_bitacora`
--

DROP TABLE IF EXISTS `egre_cat_movs_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_movs_bitacora` (
  `ID_MOV_BITACORA` int(10) NOT NULL,
  `MOVIMIENTO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_MOV_BITACORA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de movimientos de la bitácora\n\nMOVIMIEN';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_movs_bitacora`
--

LOCK TABLES `egre_cat_movs_bitacora` WRITE;
/*!40000 ALTER TABLE `egre_cat_movs_bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_cat_movs_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_roles`
--

DROP TABLE IF EXISTS `egre_cat_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_roles` (
  `ID_ROL` int(10) NOT NULL,
  `ROL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de roles en el sistema\n\nROL: Descripció';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_roles`
--

LOCK TABLES `egre_cat_roles` WRITE;
/*!40000 ALTER TABLE `egre_cat_roles` DISABLE KEYS */;
INSERT INTO `egre_cat_roles` VALUES (1,'Egresado'),(2,'Escuela'),(3,'Administrador'),(4,'Red virtual');
/*!40000 ALTER TABLE `egre_cat_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_cat_tipo_capacitaciones`
--

DROP TABLE IF EXISTS `egre_cat_tipo_capacitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_cat_tipo_capacitaciones` (
  `ID_TIPO_CAPACITACION` int(10) NOT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_CAPACITACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Catálogo de tipo de capacitaciones del egresado';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_cat_tipo_capacitaciones`
--

LOCK TABLES `egre_cat_tipo_capacitaciones` WRITE;
/*!40000 ALTER TABLE `egre_cat_tipo_capacitaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_cat_tipo_capacitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_contactos_egresados`
--

DROP TABLE IF EXISTS `egre_contactos_egresados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_contactos_egresados` (
  `ID_CONTACTO_EGRESADO` int(10) NOT NULL,
  `ID_MEDIO_CONTACTO` int(10) DEFAULT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CONTACTO_EGRESADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de medios de contacto del egresado;\n\nDESCR';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_contactos_egresados`
--

LOCK TABLES `egre_contactos_egresados` WRITE;
/*!40000 ALTER TABLE `egre_contactos_egresados` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_contactos_egresados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_datos_acads_externos`
--

DROP TABLE IF EXISTS `egre_datos_acads_externos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_datos_acads_externos` (
  `ID_DATO_ACAD_EXTERNO` int(10) NOT NULL,
  `ESCUELA` int(10) DEFAULT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `CARRERA` varchar(100) DEFAULT NULL,
  `ANIO_INGRESO` date DEFAULT NULL,
  `ANIO_EGRESO` date DEFAULT NULL,
  `PROMEDIO` float DEFAULT NULL,
  `NIVEL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_DATO_ACAD_EXTERNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de los datos académicos externos al IPN\n\nE';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_datos_acads_externos`
--

LOCK TABLES `egre_datos_acads_externos` WRITE;
/*!40000 ALTER TABLE `egre_datos_acads_externos` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_datos_acads_externos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_datos_acads_ipn`
--

DROP TABLE IF EXISTS `egre_datos_acads_ipn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_datos_acads_ipn` (
  `ID_DATO_ACAD_IPN` int(10) NOT NULL AUTO_INCREMENT,
  `ID_MOTIVO_INTERRUPCION` int(10) DEFAULT NULL,
  `ID_ESTATUS_EGRE` int(10) DEFAULT NULL,
  `ID_MOTIVO_NOTITULACION` int(10) DEFAULT NULL,
  `ID_FORMA_TITULACION` int(10) DEFAULT NULL,
  `ID_CARRERA` int(10) DEFAULT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `ID_UNIDAD_RESPONSABLE` int(4) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `ANIO_INGRESO` date DEFAULT NULL,
  `ANIO_EGRESO` date DEFAULT NULL,
  `BOLETA` varchar(12) DEFAULT NULL,
  `PROMEDIO` float DEFAULT NULL,
  `VALIDADO_ECU` int(1) DEFAULT NULL,
  `FECHA_REGISTRO` date DEFAULT NULL,
  PRIMARY KEY (`ID_DATO_ACAD_IPN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Tabla de los datos académicos del IPN\n\nANIO_INGR';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_datos_acads_ipn`
--

LOCK TABLES `egre_datos_acads_ipn` WRITE;
/*!40000 ALTER TABLE `egre_datos_acads_ipn` DISABLE KEYS */;
INSERT INTO `egre_datos_acads_ipn` VALUES (1,1,1,1,1,1,1,1,'0000-00-00','0000-00-00','97090771',7.96,NULL,'0000-00-00'),(2,1,1,1,1,1,2,1,'1996-01-01','2000-01-01','97090771',7.96,NULL,'0000-00-00');
/*!40000 ALTER TABLE `egre_datos_acads_ipn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_domicilios`
--

DROP TABLE IF EXISTS `egre_domicilios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_domicilios` (
  `ID_DOMICILIO` int(10) NOT NULL AUTO_INCREMENT,
  `ID_ASENTAMIENTO` int(10) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `CALLE` varchar(100) DEFAULT NULL,
  `NUM_EXT` int(5) DEFAULT NULL,
  `NUM_INT` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID_DOMICILIO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Tabla del domicilio del egresado\n\nCALLE: Calle d';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_domicilios`
--

LOCK TABLES `egre_domicilios` WRITE;
/*!40000 ALTER TABLE `egre_domicilios` DISABLE KEYS */;
INSERT INTO `egre_domicilios` VALUES (1,1,'1',1,1),(2,1,'1',1,1);
/*!40000 ALTER TABLE `egre_domicilios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_domicilios_extranjeros`
--

DROP TABLE IF EXISTS `egre_domicilios_extranjeros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_domicilios_extranjeros` (
  `ID_DOMICILIO_EXT` int(10) NOT NULL AUTO_INCREMENT,
  `ID_PAIS` int(4) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `DOMICILIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_DOMICILIO_EXT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla del domicilio en el extranjero del egresado en caso de';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_domicilios_extranjeros`
--

LOCK TABLES `egre_domicilios_extranjeros` WRITE;
/*!40000 ALTER TABLE `egre_domicilios_extranjeros` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_domicilios_extranjeros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_egresados`
--

DROP TABLE IF EXISTS `egre_egresados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_egresados` (
  `ID_EGRESADO` int(10) NOT NULL AUTO_INCREMENT,
  `AP_PATERNO` varchar(50) DEFAULT NULL,
  `AP_MATERNO` varchar(50) DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `ID_GENERO` int(2) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `ID_ESTADO_CIVIL` int(1) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `ID_GENTILICIO` int(6) DEFAULT NULL COMMENT 'Identificador unico, sin significado de negocio.',
  `RESIDE_MEXICO` int(1) DEFAULT NULL,
  `ID_ESTADO_NAC` int(2) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL,
  `FECHA_REGISTRO` date DEFAULT NULL,
  PRIMARY KEY (`ID_EGRESADO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Tabla de los datos personales del egresado\n\nAP_P';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_egresados`
--

LOCK TABLES `egre_egresados` WRITE;
/*!40000 ALTER TABLE `egre_egresados` DISABLE KEYS */;
INSERT INTO `egre_egresados` VALUES (1,'Toledo','Alvarado','Jorge Israel','TOAJ810913HDF',1,1,2,1,1,2,'0000-00-00'),(2,'Toledo','Alvarado','Jorge Israel','TOAJ810913HDF',1,1,2,1,1,3,'0000-00-00');
/*!40000 ALTER TABLE `egre_egresados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_etiquetados`
--

DROP TABLE IF EXISTS `egre_etiquetados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_etiquetados` (
  `ID_PUBLICACION` int(10) DEFAULT NULL,
  `ID_EGRESADO_ETIQ` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de los egresados etiquetados en las publicaciones';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_etiquetados`
--

LOCK TABLES `egre_etiquetados` WRITE;
/*!40000 ALTER TABLE `egre_etiquetados` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_etiquetados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_exp_laborales`
--

DROP TABLE IF EXISTS `egre_exp_laborales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_exp_laborales` (
  `ID_EXP_LABORAL` int(10) NOT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `NOMBRE_EMPRESA` varchar(150) DEFAULT NULL,
  `URL_EMPRESA` varchar(200) DEFAULT NULL,
  `PUESTO` varchar(100) DEFAULT NULL,
  `FECHA_INGRESO` date DEFAULT NULL,
  `FECHA_EGRESO` date DEFAULT NULL,
  `RESPONSABILIDADES` varchar(300) DEFAULT NULL,
  `JEFE_INMEDIATO` varchar(100) DEFAULT NULL,
  `TEL_REFERENCIA` varchar(50) DEFAULT NULL,
  `CORREO_REFERENCIA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_EXP_LABORAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de la experiencia profesional del egresado\n\n                                       -&#';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_exp_laborales`
--

LOCK TABLES `egre_exp_laborales` WRITE;
/*!40000 ALTER TABLE `egre_exp_laborales` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_exp_laborales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_habilidades`
--

DROP TABLE IF EXISTS `egre_habilidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_habilidades` (
  `ID_HABILIDAD` int(10) NOT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `HABILIDAD` varchar(100) DEFAULT NULL,
  `NIVEL` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_HABILIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de las habilidades del egresado\n\nHABILIDAD';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_habilidades`
--

LOCK TABLES `egre_habilidades` WRITE;
/*!40000 ALTER TABLE `egre_habilidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_habilidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_hashtags`
--

DROP TABLE IF EXISTS `egre_hashtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_hashtags` (
  `ID_HASHTAG` int(10) NOT NULL,
  `HASHTAG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_HASHTAG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de los hashtags realizados en las publicaciones y noti';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_hashtags`
--

LOCK TABLES `egre_hashtags` WRITE;
/*!40000 ALTER TABLE `egre_hashtags` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_hashtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_idiomas_egresados`
--

DROP TABLE IF EXISTS `egre_idiomas_egresados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_idiomas_egresados` (
  `ID_IDIOMA_EGRESADO` int(10) NOT NULL,
  `ID_IDIOMA` int(3) DEFAULT NULL COMMENT 'PK de la tabla, consecutivo numerico, sin significado de negocio.',
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `PORCENTAJE` int(3) DEFAULT NULL,
  `INSTITUCION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_IDIOMA_EGRESADO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de los idiomas que domina el egresado\n\nPOR';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_idiomas_egresados`
--

LOCK TABLES `egre_idiomas_egresados` WRITE;
/*!40000 ALTER TABLE `egre_idiomas_egresados` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_idiomas_egresados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_noticias`
--

DROP TABLE IF EXISTS `egre_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_noticias` (
  `ID_NOTICIA` int(10) NOT NULL,
  `ID_RESPONSABLE_UR` int(10) DEFAULT NULL,
  `NOTICIA` varchar(140) DEFAULT NULL,
  `IMAGEN` varchar(250) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `VISIBILIDAD` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_NOTICIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de las noticias publicadas por las unidades responsabl';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_noticias`
--

LOCK TABLES `egre_noticias` WRITE;
/*!40000 ALTER TABLE `egre_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_publicaciones`
--

DROP TABLE IF EXISTS `egre_publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_publicaciones` (
  `ID_PUBLICACION` int(10) NOT NULL,
  `ID_EGRESADO` int(10) DEFAULT NULL,
  `PUBLICACION` varchar(140) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  PRIMARY KEY (`ID_PUBLICACION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de las publicaciones realizadas por los egresados\n                                       -&#';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_publicaciones`
--

LOCK TABLES `egre_publicaciones` WRITE;
/*!40000 ALTER TABLE `egre_publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_responsables_ur`
--

DROP TABLE IF EXISTS `egre_responsables_ur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_responsables_ur` (
  `ID_RESPONSABLE_UR` int(10) NOT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `EXTENSION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_RESPONSABLE_UR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de los responsables de las UR''s\n\nNOMBRE: ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_responsables_ur`
--

LOCK TABLES `egre_responsables_ur` WRITE;
/*!40000 ALTER TABLE `egre_responsables_ur` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_responsables_ur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_seguidores`
--

DROP TABLE IF EXISTS `egre_seguidores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_seguidores` (
  `ID_EGRE_SEGUIDOR` int(10) DEFAULT NULL,
  `ID_EGRE_SEGUIDO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de los egresados seguidos por egresados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_seguidores`
--

LOCK TABLES `egre_seguidores` WRITE;
/*!40000 ALTER TABLE `egre_seguidores` DISABLE KEYS */;
/*!40000 ALTER TABLE `egre_seguidores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `egre_usuarios`
--

DROP TABLE IF EXISTS `egre_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `egre_usuarios` (
  `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT,
  `ID_ROL` int(10) DEFAULT NULL,
  `USUARIO` varchar(30) DEFAULT NULL,
  `CONTRASENIA` varchar(32) DEFAULT NULL,
  `FOTO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Tabla de usuarios del sistema\n\nUSUARIO: nombre d';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `egre_usuarios`
--

LOCK TABLES `egre_usuarios` WRITE;
/*!40000 ALTER TABLE `egre_usuarios` DISABLE KEYS */;
INSERT INTO `egre_usuarios` VALUES (1,1,'asd@dominio.com','12345',''),(2,1,'asd@dominio.com','12345',''),(3,1,'asd@dominio.com','12345','');
/*!40000 ALTER TABLE `egre_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-03 21:49:56
