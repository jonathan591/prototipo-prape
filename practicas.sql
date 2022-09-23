-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla practicas.tb_asignacion
CREATE TABLE IF NOT EXISTS `tb_asignacion` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_docentes` int(11) DEFAULT NULL,
  `id_estudiantes` int(11) DEFAULT NULL,
  `id_jornada2` int(11) DEFAULT NULL,
  `id_carreras` int(11) DEFAULT NULL,
  `lugar_asignacion` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_asignacion`),
  KEY `FK_tb_asignacion_tb_estudiantes` (`id_estudiantes`),
  KEY `FK_tb_asignacion_tb_docentes` (`id_docentes`),
  KEY `FK_tb_asignacion_tb_jornada2` (`id_jornada2`),
  CONSTRAINT `FK_tb_asignacion_tb_docentes` FOREIGN KEY (`id_docentes`) REFERENCES `tb_docentes` (`id_docentes`),
  CONSTRAINT `FK_tb_asignacion_tb_estudiantes` FOREIGN KEY (`id_estudiantes`) REFERENCES `tb_estudiantes` (`id_estudiantes`),
  CONSTRAINT `FK_tb_asignacion_tb_jornada2` FOREIGN KEY (`id_jornada2`) REFERENCES `tb_jornada2` (`id_jornada2`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_asignacion: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_asignacion` DISABLE KEYS */;
INSERT INTO `tb_asignacion` (`id_asignacion`, `id_docentes`, `id_estudiantes`, `id_jornada2`, `id_carreras`, `lugar_asignacion`, `fecha_registro`, `estado`) VALUES
	(3, 5, 1, 2, 2, 'marijto', '2022-03-18', 1),
	(4, 1, 1, 1, 1, 'saqwsas', '2022-03-03', 1),
	(5, 5, 2, 2, 2, 'ddfdssdf', '2022-03-17', 1),
	(6, 6, 1, 1, 2, 'kuasgiugusia', '2022-03-18', 1),
	(7, 6, 2, 2, 1, 'wjknkqnka', '2022-03-26', 1),
	(8, 1, 1, 2, 1, 'weewww', '2022-04-13', 1),
	(9, 5, 4, 2, 2, 'dauel', '2022-04-22', 1),
	(10, 6, 4, 2, 2, 'kim 31 via a daule', '2022-04-23', 1),
	(11, 1, 1, 1, 1, 'saassda', '2022-04-15', 1);
/*!40000 ALTER TABLE `tb_asignacion` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_carreras
CREATE TABLE IF NOT EXISTS `tb_carreras` (
  `id_carreras` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_carreras`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_carreras: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_carreras` DISABLE KEYS */;
INSERT INTO `tb_carreras` (`id_carreras`, `descripcion`, `estado`) VALUES
	(1, 'TDS', 1),
	(2, 'TEMEC', 1),
	(3, 'TSA', 1),
	(4, 'TSC', 1);
/*!40000 ALTER TABLE `tb_carreras` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_cursos
CREATE TABLE IF NOT EXISTS `tb_cursos` (
  `id_cursos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_cursos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_cursos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_cursos` DISABLE KEYS */;
INSERT INTO `tb_cursos` (`id_cursos`, `descripcion`, `estado`) VALUES
	(1, 'cuarto', 1),
	(2, 'quinto', 1);
/*!40000 ALTER TABLE `tb_cursos` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_docentes
CREATE TABLE IF NOT EXISTS `tb_docentes` (
  `id_docentes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellidos` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT '1',
  PRIMARY KEY (`id_docentes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_docentes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_docentes` DISABLE KEYS */;
INSERT INTO `tb_docentes` (`id_docentes`, `nombre_apellidos`, `celular`, `correo`, `fecha_registro`, `estado`) VALUES
	(1, 'jose sanchez', '0987654', 'sanchez@gmail.com', '2022-03-12', '1'),
	(5, 'jamith maiy pacheco ', '233233', 'jonathan@gmai.co', '2022-04-02', '0'),
	(6, 'jonathan aristides cedeÃ±o lopez', '2332332', 'marcaso@gmail.com', '2022-03-19', '1');
/*!40000 ALTER TABLE `tb_docentes` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_estudiantes
CREATE TABLE IF NOT EXISTS `tb_estudiantes` (
  `id_estudiantes` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_apellidos` varchar(50) DEFAULT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `id_carreras` int(11) DEFAULT NULL,
  `id_cursos` int(11) DEFAULT NULL,
  `id_paralelos` int(11) DEFAULT NULL,
  `id_jornadas` int(11) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_estudiantes`),
  KEY `FK_tb_estudiantes_tb_carreras` (`id_carreras`),
  KEY `FK_tb_estudiantes_tb_cursos` (`id_cursos`),
  KEY `FK_tb_estudiantes_tb_paralelos` (`id_paralelos`),
  KEY `FK_tb_estudiantes_tb_jornadas` (`id_jornadas`),
  CONSTRAINT `FK_tb_estudiantes_tb_carreras` FOREIGN KEY (`id_carreras`) REFERENCES `tb_carreras` (`id_carreras`),
  CONSTRAINT `FK_tb_estudiantes_tb_cursos` FOREIGN KEY (`id_cursos`) REFERENCES `tb_cursos` (`id_cursos`),
  CONSTRAINT `FK_tb_estudiantes_tb_jornadas` FOREIGN KEY (`id_jornadas`) REFERENCES `tb_jornadas` (`id_jornadas`),
  CONSTRAINT `FK_tb_estudiantes_tb_paralelos` FOREIGN KEY (`id_paralelos`) REFERENCES `tb_paralelos` (`id_paralelos`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_estudiantes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_estudiantes` DISABLE KEYS */;
INSERT INTO `tb_estudiantes` (`id_estudiantes`, `nombres_apellidos`, `cedula`, `telefono`, `correo`, `id_carreras`, `id_cursos`, `id_paralelos`, `id_jornadas`, `direccion`, `fecha_registro`, `estado`) VALUES
	(1, 'Kristhel Rossemary Abad Vera', '0923456786', '0923456785', 'carlasanchez@gmail.com', 4, 1, 1, 2, 'santa lucia', '2022-03-15', 1),
	(2, 'maria leon', '0923456789', '0923567865', 'marialeon12@gmail.com', 1, 2, 1, 3, 'palestina', '2022-03-15', 1),
	(3, 'jonathan aristides cedeÃ±o lopez', '09876', '22112122', 'jonathan@gmai.com', 1, 2, 2, 2, 'kim 31 via a daule', '2022-03-30', 0),
	(4, 'jamith narcisa pacheco pacheco', '098763727', '082198222', 'jonathan@gmai.com', 1, 1, 1, 1, 'kim 31 via a daule', '2022-03-30', 0),
	(5, 'martin salazar jose jose ', '0923833322', '0987654321', 'marcaso@gmail.com', 1, 1, 1, 1, 'kim 31 via a daule', '2022-03-15', 1),
	(6, 'jaciento alexander cedeÃ±o lopez', '0239089032', '0928379738', 'jacientocdeÃ±o2029@gmail.com', 1, 2, 1, 1, 'villa fuerte lagos del norte', '2022-04-13', 0),
	(7, 'fdgsdfgfggf', '34324244', '324234324', 'jonathan@gmai.com', 2, 1, 2, 1, 'wewew', '2022-04-13', 1),
	(8, 'jejejbwehw', '44343344', '3434343', 'marcaso@gmail.com', 2, 1, 1, 3, 'snbdhbhjbshbdhjs', '2022-04-13', 1);
/*!40000 ALTER TABLE `tb_estudiantes` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_jornada2
CREATE TABLE IF NOT EXISTS `tb_jornada2` (
  `id_jornada2` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_jornada2`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_jornada2: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_jornada2` DISABLE KEYS */;
INSERT INTO `tb_jornada2` (`id_jornada2`, `descripcion`, `estado`) VALUES
	(1, 'matutina', 1),
	(2, 'vespertina', 1);
/*!40000 ALTER TABLE `tb_jornada2` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_jornadas
CREATE TABLE IF NOT EXISTS `tb_jornadas` (
  `id_jornadas` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(45) DEFAULT '1',
  PRIMARY KEY (`id_jornadas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_jornadas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_jornadas` DISABLE KEYS */;
INSERT INTO `tb_jornadas` (`id_jornadas`, `descripcion`, `estado`) VALUES
	(1, 'matutina', '1'),
	(2, 'vespertina', '1'),
	(3, 'nocturna', '1');
/*!40000 ALTER TABLE `tb_jornadas` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_paralelos
CREATE TABLE IF NOT EXISTS `tb_paralelos` (
  `id_paralelos` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_paralelos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_paralelos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_paralelos` DISABLE KEYS */;
INSERT INTO `tb_paralelos` (`id_paralelos`, `descripcion`, `estado`) VALUES
	(1, 'A', 1),
	(2, 'B', 1);
/*!40000 ALTER TABLE `tb_paralelos` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_tipo_usuario
CREATE TABLE IF NOT EXISTS `tb_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_tipo_usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_usuario` DISABLE KEYS */;
INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `descripcion`, `estado`) VALUES
	(1, 'Admin', 1),
	(2, 'Docente', 1),
	(3, 'Estudiante', 1);
/*!40000 ALTER TABLE `tb_tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla practicas.tb_usuario
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT '1',
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  KEY `FK_tb_usuario_tb_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `FK_tb_usuario_tb_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla practicas.tb_usuario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`, `nombre`, `correo`, `clave`, `fecha`, `id_tipo_usuario`, `estado`) VALUES
	(1, 'admin', 'jonathan@gmai.com', '21232f297a57a5a743894a0e4a801fc3', '2022-03-02', 1, 1),
	(2, 'jose', 'jonathan@gmai.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-03-02', 3, 0),
	(3, 'jonathan', 'jonathan@gmai.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-03-02', 2, 1),
	(4, 'martin', 'jacientolopez2029@gmail.com', 'fed36e342220b0f5f80ccf0f1da20a24', '2022-04-10', 3, 1),
	(5, 'marcti ', 'jonathan@gmai.com', '43cca4b3de2097b9558efefd0ecc3588', '2022-04-14', 3, 1),
	(6, 'martin', 'jonathan@gmai.com', '43cca4b3de2097b9558efefd0ecc3588', '2022-04-14', 2, 1);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
