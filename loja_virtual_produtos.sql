-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: loja_virtual
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_nome` varchar(100) NOT NULL,
  `prod_valor` decimal(10,2) NOT NULL,
  `prod_estoque` int NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Mouse Gamer',150.00,20),(2,'Teclado Mecânico',250.00,15),(3,'Monitor 24\"',800.00,10),(4,'Mouse Gamer RGB',180.00,40),(5,'Teclado Mecânico Switch Blue',320.00,25),(6,'Monitor 27\" 144Hz',1500.00,12),(7,'Headset Surround 7.1',450.00,18),(8,'Cadeira Gamer Ergonômica',1350.00,10),(9,'Notebook i5 12ª Geração',4200.00,15),(10,'Notebook i7 13ª Geração',6200.00,8),(11,'Placa de Vídeo RTX 3060',2400.00,6),(12,'Placa de Vídeo RTX 4070 Ti',5800.00,3),(13,'Placa de Vídeo RTX 4090',12500.00,2),(14,'HD Externo 1TB',350.00,30),(15,'HD Externo 4TB',750.00,20),(16,'SSD SATA 480GB',280.00,25),(17,'SSD NVMe 1TB',650.00,18),(18,'Fonte 650W 80 Plus Bronze',420.00,15),(19,'Fonte 850W Modular Gold',720.00,10),(20,'Gabinete ATX Vidro Temperado',480.00,12),(21,'Roteador Wi-Fi 6',680.00,14),(22,'Roteador Mesh 3 Unidades',1200.00,8),(23,'Webcam Full HD 1080p',220.00,20),(24,'Microfone Condensador USB',520.00,10),(25,'Controle Xbox Series X',380.00,15),(26,'Controle DualSense PS5',420.00,12),(27,'Console PlayStation 5',4600.00,5),(28,'Console Xbox Series X',4300.00,6),(29,'Nintendo Switch OLED',2800.00,7),(30,'Smartphone Android 5G',2900.00,20),(31,'iPhone 15 Pro Max',9800.00,6),(32,'Tablet 11 Polegadas',1800.00,12),(33,'Impressora Multifuncional Wi-Fi',850.00,9),(34,'Kindle Paperwhite',650.00,15),(35,'Caixa de Som Bluetooth JBL',480.00,20),(36,'Caixa de Som Alexa Echo Dot',350.00,25),(37,'Relógio Smartwatch',900.00,18),(38,'Câmera de Segurança Wi-Fi',400.00,14),(39,'Drone 4K',3200.00,5),(40,'Carregador Portátil 20.000mAh',280.00,30),(41,'Carregador Turbo USB-C',120.00,40),(42,'Cabo HDMI 2.1 2m',80.00,50),(43,'Cabo USB-C 1m',50.00,60),(44,'Hub USB 3.0 4 Portas',150.00,25),(45,'Adaptador Bluetooth USB',90.00,35),(46,'Placa Mãe B550',950.00,10),(47,'Placa Mãe Z690',1800.00,6),(48,'Memória RAM 8GB DDR4',220.00,25),(49,'Memória RAM 16GB DDR4',420.00,20),(50,'Memória RAM 32GB DDR5',980.00,8),(51,'Cooler CPU Air Tower',280.00,15),(52,'Water Cooler 240mm',650.00,10),(53,'Volante Gamer Logitech G29',2200.00,4),(54,'Óculos VR Meta Quest 3',3500.00,3);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-02 19:46:56
