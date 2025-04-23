
-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: servidor-dam-daw    Database: melodia03
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'Marta García','41.387018333726,2.1731756572721','marta.jpg','Cantante de pop acústico. Me encanta conectar con el público a través de mi voz.','+34612345678'),(3,'Lucía Rodríguez','41.395177696132,2.1611395853825','lucia.jpg','Vocalista de jazz y soul. Mi música transmite emociones y busca conectar con el oyente.','+34698765432'),(4,'Carla Cayero','41.383200000000,2.180200000000','carla.jpg','Música callejera y compositora indie. Me gusta expresar mis emociones a través de mis canciones.','+34712349876'),(5,'Elena Martínez','41.382500000000,2.173400000000','elena.jpg','Violinista y cantante clásica. A través del violín y mi voz, intento transmitir la belleza de la música clásica.','+34623456789'),(6,'Isabel Torres','41.391244000000,2.157575000000','isabel.jpg','Pianista y cantante de flamenco y jazz. Me apasiona fusionar diferentes géneros.','+34687654321'),(7,'Rubén Domínguez','41.374500000000,2.163300000000','ruben.jpg','Guitarrista de blues y rock. Me gusta tocar con sentimiento, explorando cada acorde.','+34634567891'),(8,'Fernando Herrera','41.383200000000,2.164000000000','fernando.jpg','Cantante de trova y música latinoamericana. Mi música cuenta historias personales.','+34645678912'),(9,'Luis Gómez','41.405000000000,2.157500000000','luis.jpg','Músico de world music. Fusiono sonidos de todo el mundo para crear algo único.','+34656789123'),(10,'Andrés Muñoz','41.379900000000,2.177400000000','andres.jpg','Cantautor de música alternativa y folk. Mi estilo refleja mis experiencias y sentimientos.','+34667891234'),(11,'Sergio Vidal','41.375606000000,2.161305000000','sergio.jpg','Saxofonista de jazz. La improvisación me permite explorar nuevos caminos musicales.','+34678912345'),(12,'El Paraigua','Carrer de la Plata 7, 08003 Barcelona, Catalunya, España','elparaigua.jpg','Bar de cócteles con música en vivo en un ambiente vintage.','+34933107357'),(13,'Harlem Jazz Club','Carrer de Comtessa de Sobradiel 8, 08002 Barcelona, Catalunya, España','harlem.jpg','Club de jazz con actuaciones en vivo y ambiente íntimo.','+34933102211'),(14,'Luz de Gas','Carrer de Muntaner 246, 08021 Barcelona, Catalunya, España','luzdegas.jpg','Mítico club con conciertos en directo y sesiones de DJ.','+34932097811'),(15,'Sidecar Factory Club','Plaça Reial 7, 08002 Barcelona, Catalunya, España','sidecar.jpg','Club con música en vivo y sesiones de rock y electrónica.','+34933173722'),(16,'Cafè de l’Òpera','La Rambla 74, 08002 Barcelona, Catalunya, España','cafedelaopera.jpg','Histórica cafetería con música clásica y tertulias artísticas.','+34933173844'),(17,'Marula Café','Carrer dels Escudellers 49, 08002 Barcelona, Catalunya, España','marula.jpg','Club nocturno con sesiones de funk, soul y música en vivo.','+34933173055'),(18,'Bobby’s Free','Pau Claris 85, 08010 Barcelona, Catalunya, España','bobbysfree.jpg','Speakeasy con excelentes cócteles y actuaciones en vivo.','+34931023657'),(19,'Big Bang Bar','Carrer d’En Botella 7, 08001 Barcelona, Catalunya, España','bigbang.jpg','Bar de música en vivo con noches de jam sessions.','+34931448592'),(20,'JazzSí Club','Carrer de Requesens 2, 08001 Barcelona, Catalunya, España','jazzsi.jpg','Pequeño club de jazz y flamenco con conciertos diarios.','+34931448712'),(21,'Almo2bar','Carrer de Bruniquer 59, 08024 Barcelona, Catalunya, España','almo2bar.jpg','Sala de conciertos con eventos en vivo y música alternativa.','+34931621792'),(36,'Nombre del Cliente','41.3847, 2.1769','url-imagen.jpg','Descripción del cliente','123456789'),(39,NULL,'41.3847, 2.1769',NULL,NULL,NULL),(40,NULL,'41.3847, 2.1769',NULL,NULL,NULL),(47,NULL,'2.31,3.14',NULL,NULL,NULL),(48,NULL,'41.374492227601,2.1642121477812',NULL,NULL,NULL),(49,NULL,'41.402701320452,2.1386304406191',NULL,NULL,NULL),(50,NULL,'41.395102815043,2.1185427913719',NULL,NULL,NULL),(51,NULL,'41.390762740669,2.1928696297398',NULL,NULL,NULL),(57,NULL,'41.369182661899,2.1650732933521',NULL,NULL,NULL),(58,NULL,'41.374698366599,2.1485884205884',NULL,NULL,NULL),(59,NULL,'41.375084873986,2.1355400330432',NULL,NULL,NULL),(60,NULL,'41.386936652011,2.1769171567068',NULL,NULL,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrato` (
  `id_usuario` int NOT NULL,
  `id_evento` int NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_evento`),
  KEY `fk_contrato_evento` (`id_evento`),
  CONSTRAINT `fk_contrato_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`),
  CONSTRAINT `fk_contrato_musico` FOREIGN KEY (`id_usuario`) REFERENCES `musico` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id_evento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `fk_evento_local` (`id_usuario`),
  CONSTRAINT `fk_evento_local` FOREIGN KEY (`id_usuario`) REFERENCES `local` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `id_genero` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'rock'),(2,'pop'),(3,'jazz'),(4,'blues'),(5,'reggae'),(6,'rap'),(7,'indie'),(8,'flamenco'),(9,'electronica'),(10,'clasica'),(11,'salsa'),(12,'cumbia');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrumento`
--

DROP TABLE IF EXISTS `instrumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instrumento` (
  `id_instrumento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_instrumento`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrumento`
--

LOCK TABLES `instrumento` WRITE;
/*!40000 ALTER TABLE `instrumento` DISABLE KEYS */;
INSERT INTO `instrumento` VALUES (1,'cantante'),(2,'guitarra'),(3,'bajo'),(4,'bateria'),(5,'piano'),(6,'saxofon'),(7,'trompeta'),(8,'violin'),(9,'flauta'),(10,'clarinete'),(11,'acordeon'),(12,'ukelele'),(13,'armonica'),(14,'arpa'),(15,'cajon'),(16,'castanuelas');
/*!40000 ALTER TABLE `instrumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `local` (
  `id_usuario` int NOT NULL,
  `horario` varchar(255) DEFAULT NULL,
  `es_accesible` tinyint(1) DEFAULT NULL,
  `id_tipo_local` int DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_local_tipo_local` (`id_tipo_local`),
  CONSTRAINT `fk_local_cliente` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`),
  CONSTRAINT `fk_local_tipo_local` FOREIGN KEY (`id_tipo_local`) REFERENCES `tipo_local` (`id_tipo_local`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (12,'Lunes a Viernes: 18:00 - 02:00, Sábado: 20:00 - 03:00',1,1),(13,'Lunes a Domingo: 20:00 - 03:00',1,4),(14,'Lunes a Domingo: 19:00 - 05:00',1,3),(15,'Lunes a Domingo: 22:00 - 06:00',1,4),(16,'Lunes a Domingo: 08:00 - 23:00',1,3),(17,'Lunes a Sábado: 21:00 - 04:00',1,4),(18,'Martes a Domingo: 19:00 - 02:00',0,1),(19,'Lunes a Domingo: 21:00 - 04:00',1,1),(20,'Lunes a Domingo: 20:00 - 03:00',1,4),(21,'Miércoles a Domingo: 20:00 - 04:00',1,3),(58,NULL,NULL,NULL),(60,NULL,NULL,NULL);
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensaje` (
  `id_mensaje` int NOT NULL AUTO_INCREMENT,
  `id_usuario_musico` int DEFAULT NULL,
  `id_usuario_local` int DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `id_emisor` int NOT NULL,
  `id_receptor` int NOT NULL,
  `es_leido` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `fk_mensaje_local` (`id_usuario_local`),
  KEY `fk_mensaje_musico` (`id_usuario_musico`),
  CONSTRAINT `fk_mensaje_local` FOREIGN KEY (`id_usuario_local`) REFERENCES `local` (`id_usuario`),
  CONSTRAINT `fk_mensaje_musico` FOREIGN KEY (`id_usuario_musico`) REFERENCES `musico` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
INSERT INTO `mensaje` VALUES (1,2,12,'Hola, he visto tu evento publicado y me interesa participar.','2025-04-22 10:00:00',2,12,0),(2,2,12,'Hola Marta, he estado viendo tu perfil y tienes unos vídeos muy buenos. Creo que encajarías perfectamente en el ambiente que buscamos.','2025-04-22 10:05:00',12,2,0),(3,3,13,'Hola, me interesa tocar en vuestro club de jazz, ¿tenéis huecos?','2025-04-22 10:20:00',3,13,0),(4,3,13,'Hola Lucía, acabo de revisar tu perfil y tus audios nos han encantado. Podrías aportar mucho a nuestras noches de jazz.','2025-04-22 10:25:00',13,3,0),(5,4,14,'¡Buenas! ¿Aceptáis música indie en vuestros eventos?','2025-04-22 10:50:00',4,14,0),(6,4,14,'Hola Carla, he visto tu perfil y me ha gustado mucho tu estilo. Tus vídeos tienen muy buena energía, justo lo que buscamos.','2025-04-22 10:55:00',14,4,0),(7,5,17,'Buenas tardes, ¿hacéis hueco para música clásica en Marula?','2025-04-22 11:10:00',5,17,0),(8,5,17,'Hola Elena, tu perfil tiene una calidad excelente. Hemos escuchado tus piezas y nos encantaría verte en directo.','2025-04-22 11:15:00',17,5,0),(9,6,20,'Hola, me gustaría participar en vuestros eventos de flamenco.','2025-04-22 11:20:00',6,20,0),(10,6,20,'Hola Isabel, nos ha gustado mucho lo que hemos visto en tu perfil. Tu fusión flamenca tiene mucho potencial para nuestros ciclos.','2025-04-22 11:25:00',20,6,0),(11,7,15,'Hola me ha gustado mucho vuestro perfil, ¿por casualidad tenéis eventos de rock donde pueda participar?','2025-04-22 11:40:00',7,15,0),(12,7,15,'Hola Rubén, tus vídeos tienen una gran presencia escénica. Creemos que puedes encajar muy bien en nuestro próximo cartel.','2025-04-22 11:45:00',15,7,0),(13,8,21,'Buenas, ¿puedo presentar mis canciones en Almo2bar?','2025-04-22 12:10:00',8,21,0),(14,8,21,'Hola Fernando, he escuchado varios de tus temas y me han sorprendido gratamente. Tienes un estilo muy auténtico.','2025-04-22 12:15:00',21,8,0),(15,11,13,'Hola, soy saxofonista de jazz. ¿Aceptáis instrumentales?','2025-04-22 13:00:00',11,13,0),(16,11,13,'Hola Sergio, tu perfil habla por sí solo. Muy buen nivel en tus improvisaciones, ¡nos encantaría contar contigo!','2025-04-22 13:05:00',13,11,0),(17,9,16,'Hola, he visto que organizáis música clásica y de autor. ¿Estaríais interesados en una propuesta de world music?','2025-04-22 14:00:00',9,16,0),(18,9,16,'Hola Luis, tu estilo es muy original. Hemos visto tus vídeos y aportas una mezcla de culturas muy interesante. ¡Nos encantaría tenerte aquí!','2025-04-22 14:05:00',16,9,0),(19,9,18,'¡Buenas! Me gustaría presentarme para tocar en alguna de vuestras noches en vivo.','2025-04-22 14:20:00',9,18,0),(20,9,18,'Hola Luis, justo vimos tu perfil ayer. Tus audios tienen mucha personalidad, y creemos que podrías encajar muy bien con nuestro público.','2025-04-22 14:25:00',18,9,0),(21,9,19,'Hola, ¿aceptáis propuestas de músicos de world music para vuestras jam sessions?','2025-04-22 14:40:00',9,19,0),(22,9,19,'Hola Luis, escuchamos varios de tus temas y nos encantaron. Sería genial verte improvisando en una de nuestras sesiones.','2025-04-22 14:45:00',19,9,0),(23,10,16,'Hola, soy cantautor de folk y música alternativa. ¿Encajaría en vuestro espacio?','2025-04-22 15:00:00',10,16,0),(24,10,16,'Hola Andrés, tu perfil nos ha parecido muy auténtico. Tus letras y estilo tienen mucha sensibilidad. Estarías muy bien en una de nuestras veladas íntimas.','2025-04-22 15:05:00',16,10,0),(25,10,18,'¡Buenas! ¿Buscáis cantautores para próximos eventos?','2025-04-22 15:20:00',10,18,0),(26,10,18,'Hola Andrés, hemos visto tus vídeos y tu propuesta nos parece muy fresca. Podrías funcionar muy bien en una noche de acústicos.','2025-04-22 15:25:00',18,10,0),(27,10,19,'Hola, ¿estáis abiertos a propuestas de folk alternativo?','2025-04-22 15:40:00',10,19,0),(28,10,19,'Hola Andrés, hemos escuchado tus canciones y nos ha gustado mucho tu rollo. ¿Te gustaría participar en una jam especial?','2025-04-22 15:45:00',19,10,0);
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multimedia` (
  `id_multimedia` int NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_tipo_multimedia` int DEFAULT NULL,
  PRIMARY KEY (`id_multimedia`),
  KEY `fk_multimedia_cliente` (`id_usuario`),
  KEY `fk_multimedia_tipo_multimedia` (`id_tipo_multimedia`),
  CONSTRAINT `fk_multimedia_cliente` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`),
  CONSTRAINT `fk_multimedia_tipo_multimedia` FOREIGN KEY (`id_tipo_multimedia`) REFERENCES `tipo_multimedia` (`id_tipo_multimedia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musico`
--

DROP TABLE IF EXISTS `musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `musico` (
  `id_usuario` int NOT NULL,
  `nombre_artistico` varchar(100) DEFAULT NULL,
  `edad` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_musico_cliente` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musico`
--

LOCK TABLES `musico` WRITE;
/*!40000 ALTER TABLE `musico` DISABLE KEYS */;
INSERT INTO `musico` VALUES (2,'Marta G',27),(3,'Lucía Soul',30),(4,'Carla Indie',25),(5,'Elena Strings',32),(6,'Isabel Jazz',28),(7,'Rubén Blues',35),(8,'Fernando Trova',40),(9,'Luis Groove',29),(10,'Andrés Folk',33),(11,'Sergio Sax',31),(57,NULL,NULL),(59,NULL,NULL);
/*!40000 ALTER TABLE `musico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musico_genero`
--

DROP TABLE IF EXISTS `musico_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `musico_genero` (
  `id_genero` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_genero`,`id_usuario`),
  KEY `fk_musico_genero_musico` (`id_usuario`),
  CONSTRAINT `fk_musico_genero_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  CONSTRAINT `fk_musico_genero_musico` FOREIGN KEY (`id_usuario`) REFERENCES `musico` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musico_genero`
--

LOCK TABLES `musico_genero` WRITE;
/*!40000 ALTER TABLE `musico_genero` DISABLE KEYS */;
INSERT INTO `musico_genero` VALUES (2,2),(3,3),(3,4),(10,5),(8,6),(4,7),(9,8),(5,9),(7,10),(3,11);
/*!40000 ALTER TABLE `musico_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musico_instrumento`
--

DROP TABLE IF EXISTS `musico_instrumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `musico_instrumento` (
  `id_instrumento` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_instrumento`,`id_usuario`),
  KEY `fk_musico_instrumento_musico` (`id_usuario`),
  CONSTRAINT `fk_musico_instrumento_instrumento` FOREIGN KEY (`id_instrumento`) REFERENCES `instrumento` (`id_instrumento`),
  CONSTRAINT `fk_musico_instrumento_musico` FOREIGN KEY (`id_usuario`) REFERENCES `musico` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musico_instrumento`
--

LOCK TABLES `musico_instrumento` WRITE;
/*!40000 ALTER TABLE `musico_instrumento` DISABLE KEYS */;
INSERT INTO `musico_instrumento` VALUES (1,2),(1,3),(1,4),(8,5),(5,6),(2,7),(1,8),(1,9),(1,10),(6,11);
/*!40000 ALTER TABLE `musico_instrumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_local`
--

DROP TABLE IF EXISTS `tipo_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_local` (
  `id_tipo_local` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_local`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_local`
--

LOCK TABLES `tipo_local` WRITE;
/*!40000 ALTER TABLE `tipo_local` DISABLE KEYS */;
INSERT INTO `tipo_local` VALUES (1,'bar'),(2,'restaurante'),(3,'cafeteria'),(4,'pub');
/*!40000 ALTER TABLE `tipo_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_multimedia`
--

DROP TABLE IF EXISTS `tipo_multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_multimedia` (
  `id_tipo_multimedia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_multimedia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_multimedia`
--

LOCK TABLES `tipo_multimedia` WRITE;
/*!40000 ALTER TABLE `tipo_multimedia` DISABLE KEYS */;
INSERT INTO `tipo_multimedia` VALUES (1,'foto'),(2,'video'),(3,'audio');
/*!40000 ALTER TABLE `tipo_multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'admin'),(2,'musico'),(3,'local');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `contrasenya` varchar(250) NOT NULL,
  `id_tipo_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `uk_correo` (`correo`),
  KEY `fk_usuario_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `fk_usuario_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin@gmail.com','1234',1),(2,'martagarcia@gmail.com','$2y$10$4G71ZH9zj7JFGgWlonn4Cu552y9pGw3cq6aDPJoaulurqlWY7jDA.',2),(3,'luciarodriguez@gmail.com','$2y$10$ramffkLeCJ.Bnt5uv/c4sOjphiftgY1/D/EJ3c656vpuMamTUGvsa',2),(4,'carlacayero@gmail.com','$2y$10$1WlB1P5f9t0BULyjQnc3OecmryhfGa9n3gy5wdASTklEcHT2cJWJ.',2),(5,'elenamartinez@gmail.com','$2y$10$lsRpGc563fDqQQ3ntus/d.If0Lw97fIiUSzd5FkXcxwVFwupUNTli',2),(6,'isabeltorres@gmail.com','$2y$10$n5MxnLk2rTK5OFH86Cr8UeIsvg2gK8cIETAsA5ftWu46w3dKs2dAu',2),(7,'rubendominguez@gmail.com','$2y$10$WefsJQMTZfNN1gD60/60Bu75poIoFk2ufT3qIBy/J.QjApnW4Jrre',2),(8,'fernandoherrera@gmail.com','$2y$10$uDOH6ZT026XbirlSSKixMuJ.UiFBxa2SDzKDACjycba/s2derBslS',2),(9,'luisgomez@gmail.com','$2y$10$wbOjzNumL0C4giH4PzsMme29aoQpZIDx0/ZPYTj0cVbyXEi9ucRUW',2),(10,'andresmunoz@gmail.com','$2y$10$SYx6FqBvesb0L4Ky3CcfO..uNQ8cjNKF..Ls6o9bojWtYSJEM0v0y',2),(11,'sergiovidal@gmail.com','$2y$10$wY8e2ByBcUS/cEnGdOT1TuWEYe7R2Njs8f3Cdmn5a8GnzrRGjZJ8.',2),(12,'elparaigua@gmail.com','$2y$10$tvEAONpXyAjxTgP4bdEQK.uMMwsalTkkMvWmcoa7sS.xXmVHZGb.C',3),(13,'harlemjazzclub@gmail.com','$2y$10$O0Yml8sdDahjwUyIrRx/V.in6Y4JhNZJHIXiqIl310is2lQzaPLlS',3),(14,'luzdegas@gmail.com','$2y$10$kQorIApV2BgEACuWqYVkQeztcJD6BT64YNWipVjWUW9IVBXj.is4G',3),(15,'sidecarfactoryclub@gmail.com','$2y$10$RUXQFeaaZDNxL13RvaoD0eUjcYxW0.BnYR61Jlq2ixsVzksq.V2OC',3),(16,'cafedelopera@gmail.com','$2y$10$5.6AR1nqsoQty98Z2tFE7O1MlSmyi6VHyDLehdAONO5F36zNDPbzu',3),(17,'marulacafe@gmail.com','$2y$10$q6J0vmkYUTVm91USY1Y4Lewf2kfsjHHlhK7SHK2KV0D2mn2C8ZpJm',3),(18,'bobbysfree@gmail.com','$2y$10$Gf1M4mzSkHT/5Q/QIzb.cuXRkZki6pB26FBv8g.QBCyPVHjvH0lOa',3),(19,'bigbangbar@gmail.com','$2y$10$xm5kUCvbaEXqKUNr69E.q.3WmRitUmD.WSpvCps0ILKkXu0DNqijG',3),(20,'jazzsiclub@gmail.com','$2y$10$iUNv4fvh8ScMsXzgRUKTaun4bYWc8cD9.QegWoM/R.o/aLuQr8wxO',3),(21,'almo2bar@gmail.com','$2y$10$IIolVnBC4ONCyDYM63n8EuDDTwhP/z6lfeQvVLelhNs3LpJBhGrfW',3),(36,'pablo@mail.com','$2y$10$DGhnKeZdCgJ69L9/dw7Z8.8cM3ap1/62YsqH8yJYmtVGjEglCevf.',3),(37,'flor@mail.com','$2y$10$Faxm9We8ExPcUdf/aFaFHeSc8oQuJ.cG7BA0C67slKWrcTKI5to0q',3),(38,'magda@mail.com','$2y$10$00kgWfDCK5uDUInoOTU0ueNPqOTjnyRyYZgKp4FIxis88yUDk5b5K',3),(39,'lala@mail.com','$2y$10$m0M/T4LyufIr.m190ftjGuf0xldH3XVDtiv9f4kE4z4COwSbgOEy6',3),(40,'florencia@mail.com','$2y$10$XMaNIUjqdUU6CXhmO7nkpeQADbSkAaeNlxGHkbF4mFjYBxYaXImye',3),(41,'gerardo@mail.com','$2y$10$mMFw3uCat9.bFRkirpTQq.c.ZKPXgUyY0uYVDmCrptACZprTS7Dpa',3),(42,'gema@mailcom','$2y$10$SMRZtXbw9P1xQJDyrcw4muLdfrxVMobVEBUITh6gz0ZJMlDaBZcQS',3),(43,'ana@mail.com','$2y$10$TXsAqQ53KD.oKZS4GpXrRO4C3X/DPn7vy6gKE40AubznMBHloLlKW',3),(44,'jose@mail.com','$2y$10$zBdYP/NFz11H7QmPKGtwF.4J2oHMufmWWfpnl5xQ1SWU3ZPFmlcn6',3),(45,'pepe@mail.com','$2y$10$6uyA8tTSLwp/fFZQMvvv/.FRwzRnu/ygAQ.5eozTbcGDOMBSFUjDC',3),(46,'sol@mail.com','$2y$10$NYaXksOoFaV3Su6Ba59ByuHsZobI0Bf6lOtffOAybFuZ.RCyc8BS2',3),(47,'firulais@mail.com','$2y$10$gr/RiYs62PPyL4yhNthH7.iyrOBne6aQgIUKjpVCtXo7UgzMoqy7S',3),(48,'hastaloshuevos@pepe.com','$2y$10$oJfpbSBpYoJ1STakoCFswuIlgs8UbcOQm6UitgGfdfdDgfrrYWrr.',3),(49,'lila@mail.com','$2y$10$pbnKvZLY2zbkSK/nhI/Hie6xvlX.hduhVGL.G5b12H2uXABoISEpO',3),(50,'trish@mail.com','$2y$10$nV5Jx30hLjGvxo8BZKcdwOA2KLg/euKxB9zIC/UO/OjWQZGqaCKmS',3),(51,'favia@mail.com','$2y$10$ckhXXdWgx08bgbx/NHE7IOyyayykYqAWaPesR8452HuZ6bNEreyWy',3),(52,'gemmagarcia@gmail.com','$2y$10$dOD4tSwkSvp4rXqKCU7jTu0HJh7NCko1GGfp1LPMyn4OOIc8KugE6',2),(54,'anagarcia@gmail.com','$2y$10$UYnH3Bo1Qqxj0ag47kZTcuPpt2q1E5sTC6l0OFkL.aLtvudGT1b8O',2),(55,'pepitagarcia@gmail.com','$2y$10$MbrdBUSR/N1lrfymUlG.TuxM6.Tivf/HLMLsoEPxmiCAANTyU7/6e',2),(56,'Musicoprueba@mail.com','$2y$10$Qp3xB276E.C3K8oNW0sM6O2MvdC1fy.hJIWWpKsZHb8FeprHGw6X2',3),(57,'musico1prueba@mail.com','$2y$10$TrdatgsXtfNNkCd8baW7b.rijJxp3mA0s53Hw.dNVfGpWr/Hw4ZCi',2),(58,'localprueba@mail.com','$2y$10$0U49U8rUZnRJFJIZ5rHtWOXDqg8C7jqnJyp9oMlDm94LiRvOHwQ0S',3),(59,'musicoprueba11@mail.com','$2y$10$79iIxNWa58PtyxMp.IZqBux7xv12Ckfv07kqITq0JZqx7qz96Kd0C',2),(60,'bar@gmail.com','$2y$10$QmOXXgRzCG4bPclYkJbkD.qib5n39RegFG4yUjnXmIbcTkdMcIhpq',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-22 18:54:52
