/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
   /*!40101 SET NAMES utf8 */;
   /*!50503 SET NAMES utf8mb4 */;
   /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
   /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

DROP DATABASE IF EXISTS `odonto`;
CREATE DATABASE IF NOT EXISTS `odonto`;
USE `odonto`;


CREATE TABLE `atenciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `paciente_id` bigint(20) unsigned NOT NULL,
  `arcada_superior` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arcada_inferior` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operacion_prevista` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importe` double(8,2) NOT NULL,
  `pago` double(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `proximo_turno` date DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atenciones_user_id_foreign` (`user_id`),
  KEY `atenciones_paciente_id_foreign` (`paciente_id`),
  CONSTRAINT `atenciones_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `atenciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO atenciones VALUES("1","4","3","aaa1","aaa2","aaa3","2000.00","1500.00","2020-08-06","10:00:00","2020-08-13","Admin",NULL,NULL,"2020-08-06 20:17:40","2020-08-06 20:33:04");
INSERT INTO atenciones VALUES("2","5","3","bbb1","bbb2","bbb3","500.00","500.00","2020-08-06","11:00:00",NULL,"Admin",NULL,NULL,"2020-08-06 20:18:14","2020-08-06 20:18:14");
INSERT INTO atenciones VALUES("3","4","1","ccca","cccb","cccc","4000.00","4000.00","2020-08-06","09:00:00",NULL,"Admin",NULL,NULL,"2020-08-06 20:19:06","2020-08-06 20:19:06");





CREATE TABLE `compra_insumos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `insumo_id` bigint(20) unsigned NOT NULL,
  `fecha_compra` date NOT NULL,
  `cantidad_adquirida` int(10) unsigned NOT NULL,
  `precio_compra` double(8,2) unsigned NOT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_insumos_insumo_id_foreign` (`insumo_id`),
  KEY `compra_insumos_user_id_foreign` (`user_id`),
  CONSTRAINT `compra_insumos_insumo_id_foreign` FOREIGN KEY (`insumo_id`) REFERENCES `insumos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compra_insumos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO compra_insumos VALUES("1","5","1","2020-08-06","20","150.00","Admin",NULL,NULL,"2020-08-06 20:50:26","2020-08-06 20:50:26");





CREATE TABLE `insumos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido_cantidad` int(10) unsigned NOT NULL,
  `contenido_unidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(10) unsigned NOT NULL,
  `stock_bajo` int(10) unsigned NOT NULL,
  `detalles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO insumos VALUES("1","Algodon","pepito","300","g","20","2",NULL,"Admin",NULL,NULL,NULL,"2020-04-06 13:42:41","2020-08-06 20:50:26");
INSERT INTO insumos VALUES("2","Guantes","guantesin","50","piezas","0","2","color azul","Admin","Admin",NULL,NULL,"2020-04-06 13:43:38","2020-04-06 13:54:49");
INSERT INTO insumos VALUES("3","Pinza","Stilson","1","unidad","0","0",NULL,"Admin",NULL,NULL,NULL,"2020-04-06 13:45:24","2020-04-06 13:45:24");





CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES("1","2014_10_12_000000_create_users_table","1");
INSERT INTO migrations VALUES("2","2019_08_31_000943_create_pacientes_table","1");
INSERT INTO migrations VALUES("3","2019_09_03_225941_create_insumos_table","1");
INSERT INTO migrations VALUES("4","2020_02_15_122339_create_ortodoncias_table","1");
INSERT INTO migrations VALUES("5","2020_02_15_182502_create_compra_insumos_table","1");
INSERT INTO migrations VALUES("6","2020_02_26_192249_create_atenciones_table","1");
INSERT INTO migrations VALUES("7","2020_05_27_200843_create_pagos_table","1");
INSERT INTO migrations VALUES("8","2020_08_06_213110_create_reduccion_stock_table","1");





CREATE TABLE `ortodoncias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `paciente_id` bigint(20) NOT NULL,
  `motivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnostico` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objetivos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_tratamiento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aparatologia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presupuesto` double(8,2) NOT NULL,
  `inicial` double(8,2) NOT NULL,
  `cuota` double(8,2) NOT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO ortodoncias VALUES("1","1","Enderezar Algo","Medio","Enderezar todo","Ortodoncia","Brackets metálicos","40000.00","15000.00","1800.00","Admin",NULL,NULL,NULL,"2020-05-15 19:23:27","2020-05-15 19:23:27");





CREATE TABLE `pacientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` bigint(20) unsigned NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `ocupacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_civil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cobertura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentarios` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pacientes_dni_unique` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pacientes VALUES("1","Natalia","Henz","49874563",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"Admin","Admin",NULL,NULL,"2020-04-12 15:18:13","2020-04-12 17:11:19");
INSERT INTO pacientes VALUES("2","Daniel","Rodríguez","13987456",NULL,NULL,NULL,"1990-08-12",NULL,NULL,NULL,NULL,NULL,NULL,"Admin","Admin",NULL,NULL,"2020-04-12 15:18:37","2020-08-13 10:20:04");
INSERT INTO pacientes VALUES("3","Francisco","Smith","302145365",NULL,NULL,NULL,"1985-08-12",NULL,NULL,NULL,NULL,NULL,NULL,"Admin","Admin",NULL,NULL,"2020-04-12 15:20:03","2020-08-13 11:00:49");





CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `atencion_id` bigint(20) unsigned NOT NULL,
  `monto` double(8,2) NOT NULL,
  `cubierto_obra_social` tinyint(1) NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pagos_atencion_id_foreign` (`atencion_id`),
  CONSTRAINT `pagos_atencion_id_foreign` FOREIGN KEY (`atencion_id`) REFERENCES `atenciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pagos VALUES("1","1","1000.00","0","Atención","Admin",NULL,NULL,"2020-08-06 20:17:40","2020-08-06 20:17:40");
INSERT INTO pagos VALUES("2","2","500.00","0","Atención2","Admin",NULL,NULL,"2020-08-06 20:18:14","2020-08-06 20:18:14");
INSERT INTO pagos VALUES("3","3","4000.00","0","Servicio","Admin",NULL,NULL,"2020-08-06 20:19:06","2020-08-06 20:19:06");
INSERT INTO pagos VALUES("6","1","100.00","0",NULL,"Admin","Admin","2020-08-06 20:31:18","2020-08-06 20:28:03","2020-08-06 20:31:18");
INSERT INTO pagos VALUES("7","1","200.00","0",NULL,"Admin",NULL,NULL,"2020-08-06 20:28:30","2020-08-06 20:28:30");





CREATE TABLE `reduccion_stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insumo_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reduccion_stock_insumo_id_foreign` (`insumo_id`),
  CONSTRAINT `reduccion_stock_insumo_id_foreign` FOREIGN KEY (`insumo_id`) REFERENCES `insumos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `odontologo` tinyint(1) NOT NULL,
  `dni` bigint(20) unsigned NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentarios` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`),
  UNIQUE KEY `users_dni_unique` (`dni`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("3","Admin","$2y$10$fChGURz/lM6TvjdQiPMIO.0XXml.fG.OFP7eS0kV4ywcR4DT35qWG","Administrador","Sistema","1","20123654",NULL,NULL,NULL,NULL,NULL,"1",NULL,NULL,"2020-02-14 22:06:32","2020-02-14 22:06:32");
INSERT INTO users VALUES("4","Usuario2","$2y$10$YscxImMGrlgW40KnhtnPcuj0Bliw05tiXAhQO2IIRkAnAs3mIoxhK","José","Rodriguez","1","12345666","Paraná 20","1978-03-15","joserodriguez10@hotmail.com","34347899874",NULL,"2",NULL,NULL,"2020-02-14 23:15:12","2020-04-01 20:43:27");
INSERT INTO users VALUES("5","Usuario3","$2y$10$0nxy7qN6kcg7tJEF5TFhXOKgO8RvDV9gE0H00/C.QiuN88s7Pz1Uy","Daiana","Schoenfeld","1","323999564","Ayacucho 43","1983-01-20","schonf@gmail.com","343-154659987",NULL,"3",NULL,NULL,"2020-02-14 23:20:33","2020-04-01 16:45:19");
INSERT INTO users VALUES("6","Empleado4","$2y$10$MZ.SUDOpITs0bmvfa8OqNuiwwVjskgBriEf/b5.J2kAwJExUi0ib.","Alejandro","Godoy","0","31254698",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"2020-02-15 12:13:44","2020-02-15 11:38:04","2020-02-15 12:13:44");
INSERT INTO users VALUES("7","Usuario4","$2y$10$8fOwS4ctoePi/V/X50psB.AfbVwE4vr76KAl9MwFaCCUXxc9iMU6C","Miguel","Gutierrez","0","29546325","Yrigoyen 834","1979-04-18","Miguel.gutierrez@hotmail.com","154465879",NULL,"2",NULL,NULL,"2020-04-01 16:46:59","2020-04-01 16:46:59");



