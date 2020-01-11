DROP TABLE IF EXISTS `tb_reprecursoshumanos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_reprecursoshumanos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queja` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_recepcion` datetime NOT NULL,
  `abogados` int(11) NOT NULL,
  `estado_procesal` int(11) NOT NULL,
  `asunto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `derecho_violado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tb_reprecursoshumanos_estado_procesal_foreign` (`estado_procesal`),
  CONSTRAINT `tb_reprecursoshumanos_estado_procesal_foreign` FOREIGN KEY (`estado_procesal`) REFERENCES `tb_catestadosprocesales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_reprecursoshumanos`
--

LOCK TABLES `tb_reprecursoshumanos` WRITE;
/*!40000 ALTER TABLE `tb_reprecursoshumanos` DISABLE KEYS */;
INSERT INTO `tb_reprecursoshumanos` VALUES (1,'test','1970-01-01 00:00:00',9417,1,'test','test',1,'2019-09-02 17:45:33','2019-09-02 17:45:33');
/*!40000 ALTER TABLE `tb_reprecursoshumanos` ENABLE KEYS */;
UNLOCK TABLES;