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
  `editado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atenciones_user_id_foreign` (`user_id`),
  KEY `atenciones_paciente_id_foreign` (`paciente_id`),
  CONSTRAINT `atenciones_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `atenciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO atenciones VALUES("1","5","5","Blanqueamiento","Blanqueamietno",NULL,"2500.00","2500.00","2021-05-04","13:10:00",NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:47:51","2021-05-04 13:47:51");
INSERT INTO atenciones VALUES("2","7","11","Tratamiento de caries en 14",NULL,"Tratamiento de caries en 32","1500.00","1000.00","2021-05-04","13:20:00","2021-05-10","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 13:54:25","2021-05-04 13:54:26");
INSERT INTO atenciones VALUES("3","4","10",NULL,"Endodoncia - Apertura en 30","Endodoncia - Cierre en 30","4600.00","4000.00","2021-05-04","13:40:00","2021-05-11","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 13:57:29","2021-05-04 14:06:48");
INSERT INTO atenciones VALUES("4","5","14","Tratamiento de flúor","Tratamiento de flúor",NULL,"1000.00","1000.00","2021-05-04","14:00:00",NULL,"LauraBenedetti",NULL,NULL,NULL,"2021-05-04 14:02:21","2021-05-04 14:02:21");
INSERT INTO atenciones VALUES("5","5","3","tratamiento placas","tratamiento placas",NULL,"1500.00","0.00","2021-05-04","13:30:00",NULL,"LauraBenedetti",NULL,"LauraBenedetti","2021-05-04 14:05:51","2021-05-04 14:05:32","2021-05-04 14:05:51");
INSERT INTO atenciones VALUES("6","4","10","Inicio tratamiento ortodoncia","Inicio tratamiento ortodoncia","Ajuste","10000.00","10000.00","2021-05-04","14:10:00","2021-06-04","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 14:21:22","2021-05-04 14:21:23");
INSERT INTO atenciones VALUES("7","5","4","Carilla de porcelana en 17",NULL,NULL,"5000.00","2500.00","2021-05-04","14:15:00",NULL,"LauraBenedetti",NULL,NULL,NULL,"2021-05-04 14:26:52","2021-05-04 14:26:52");
INSERT INTO atenciones VALUES("8","4","1","Implante en 12 - Primera etapa",NULL,"Implante en 12 - Segunda etapa","6000.00","4000.00","2021-05-04","15:30:00","2021-05-13","Admin",NULL,NULL,NULL,"2021-05-04 16:08:55","2021-05-04 16:08:55");





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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO compra_insumos VALUES("1","5","2","2021-05-04","2","300.00","LauraBenedetti",NULL,NULL,"2021-05-04 15:36:58","2021-05-04 15:36:58");
INSERT INTO compra_insumos VALUES("2","7","3","2021-05-04","3","450.00","LauraBenedetti",NULL,NULL,"2021-05-04 15:38:48","2021-05-04 15:38:48");
INSERT INTO compra_insumos VALUES("3","5","4","2021-05-04","10","80.00","LauraBenedetti",NULL,NULL,"2021-05-04 15:40:03","2021-05-04 15:40:03");
INSERT INTO compra_insumos VALUES("4","7","1","2021-05-04","3","220.00","LauraBenedetti",NULL,NULL,"2021-05-04 15:46:23","2021-05-04 15:46:23");
INSERT INTO compra_insumos VALUES("5","4","1","2021-05-04","1","250.00","LauraBenedetti",NULL,NULL,"2021-05-04 15:46:32","2021-05-04 15:46:32");





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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO insumos VALUES("1","Algodón","Estrella","75","g","4","5","Clásico","LauraBenedetti","LauraBenedetti",NULL,NULL,"2021-05-04 14:44:11","2021-05-04 15:46:32");
INSERT INTO insumos VALUES("2","Yeso en polvo","Krauf","1","kg","2","2","Celeste","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 14:46:25","2021-05-04 15:36:58");
INSERT INTO insumos VALUES("3","Guantes Latex","Clover","100","unidad","3","2","Descartables Blancos","LauraBenedetti","LauraBenedetti",NULL,NULL,"2021-05-04 14:48:17","2021-05-04 15:38:48");
INSERT INTO insumos VALUES("4","Alcohol","Bialcohol","500","ml","6","4","70º","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 14:49:34","2021-05-04 15:40:52");
INSERT INTO insumos VALUES("5","Jeringa","Nipro","50","unidad","0","1","6 ml","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 15:35:42","2021-05-04 15:35:42");
INSERT INTO insumos VALUES("6","Lavandina","Ayudín","1","l","0","3","Multisuperficies","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 15:50:24","2021-05-04 15:50:24");





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

INSERT INTO ortodoncias VALUES("1","10","Funcionalidad","Mordida Cruzada","Reacomodamiento mandibular","Brackets","Ortodoncia metálica","40000.00","10000.00","2000.00","LauraBenedetti",NULL,NULL,NULL,"2021-05-04 14:18:39","2021-05-04 14:18:39");





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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pacientes VALUES("1","ESTELA","SÁNCHEZ","34300013","ANDRÉS PAZOS 371 P.B.","4218173","esanchez@gmail.com","1989-04-15","Abogada","Soltero","F",NULL,"Hipertensión",NULL,"Admin",NULL,NULL,NULL,"2021-01-04 12:44:28","2021-01-04 12:44:28");
INSERT INTO pacientes VALUES("2","MARIA LUJAN","BAROLI","28987453","Salta 974","154256512","lujanm34@hotmail.com","1952-10-14","Jubilada","Casado","F","OSDE",NULL,NULL,"Admin",NULL,NULL,NULL,"2021-01-04 12:47:20","2021-01-04 12:47:20");
INSERT INTO pacientes VALUES("3","RAÚL","MASOLA","29205981","LIBERTAD 58 2 PISO A","4219108","msola_raul84@hotmail.com","1975-11-10","Albañil","Divorciado","M",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-01-04 12:50:43","2021-01-04 12:50:43");
INSERT INTO pacientes VALUES("4","SEBASTIAN ALEJANDRO","PACHECO","14710400","25 DE MAYO 628","03434680544","alejandrosebastian2@hotmail.com","1962-02-10","Arquitecto","Casado","M","Swiss Medical","Alergia a la penicilina",NULL,"Admin","Admin",NULL,NULL,"2021-01-04 12:52:29","2021-01-04 13:08:19");
INSERT INTO pacientes VALUES("5","MONICA MARTA","IBARRA","25655900","CATAMARCA 567","155225439","marta983843@hotmail.com","1969-05-24","Secretaria","Casado","F",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-02-04 13:00:05","2021-02-04 13:00:05");
INSERT INTO pacientes VALUES("6","GUSTAVO","MINIGUTTI","38455984","MIGUEL DAVID 2964","156119266","gminigutti34@gmail.com","1993-03-14","Estudiante","Soltero","M",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-02-04 13:02:30","2021-02-04 13:02:30");
INSERT INTO pacientes VALUES("7","LILIANA MARCELA","ZAMBONI","15987322","ENRIQUE CARBÓ 638","0343 154401323","zamboni_vivi3@gmail.com","1962-12-06","Empleada municipal","Casado","F","Iosper","Hipertensión arterial",NULL,"Admin","Admin",NULL,NULL,"2021-03-04 13:04:17","2021-03-04 13:19:38");
INSERT INTO pacientes VALUES("8","OSVALDO","ULRICH","30569800","AV. ALMAFUERTE 1866","3434594969","osvaldoulrich@hotmail.com","1982-04-03","Policia","Casado","M",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-03-04 13:06:08","2021-03-04 13:06:08");
INSERT INTO pacientes VALUES("9","OSVALDO","ULRICH","30564544","AV. ALMAFUERTE 1866","3434594969","osvaldoulrich@hotmail.com","1982-04-03","Policia","Casado","M",NULL,NULL,NULL,"Admin","Admin",NULL,NULL,"2021-04-04 13:06:22","2021-04-04 13:06:35");
INSERT INTO pacientes VALUES("10","RUBEN OMAR","RODRIGUEZ","25789699","BOULEVARD MORENO 163","343422046","rubenomar38743@hotmail.com","1981-11-25","Empleado","Casado","M",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:08:02","2021-05-04 13:08:02");
INSERT INTO pacientes VALUES("11","LEONARDO","QUIROGA","40123500","DIAMANTE 204","3434987711","leonard.32@gmail.com","2007-08-29","Estudiante","Soltero","M",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:09:53","2021-05-04 13:09:53");
INSERT INTO pacientes VALUES("12","MARIA SOLEDAD","RENIERO","42987506","GALÁN 1664","4222387","marisoledad986@hotmail.com","2008-09-12","Estudiante","Soltero","F",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:11:18","2021-05-04 13:11:18");
INSERT INTO pacientes VALUES("13","AGUSTINA","TEPSICH","32100235","PASCUAL PALMA 516","3434594887","atepsich@gmail.com","1987-03-14","Secretaria","Soltero","F","Iosper",NULL,NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:12:32","2021-05-04 13:12:32");
INSERT INTO pacientes VALUES("14","FRANCISCO","SOSA","35987600","ROSARIO DEL TALA 595 - 2 C","343423358","fsosa_65@hotmail.com","1990-06-20","Estudiante","Casado","M",NULL,NULL,NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:14:31","2021-05-04 13:14:31");
INSERT INTO pacientes VALUES("15","ENRIQUE","RUIZ","15897601","AV. RAMIREZ 4496","343424204","enriqueruiz@hotmail.com","1965-12-10","Contador","Divorciado","M","Swiss Medical",NULL,NULL,"Admin",NULL,NULL,NULL,"2021-05-04 13:16:04","2021-05-04 13:16:04");





CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `atencion_id` bigint(20) unsigned NOT NULL,
  `monto` double(8,2) NOT NULL,
  `cubierto_obra_social` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pagos_atencion_id_foreign` (`atencion_id`),
  CONSTRAINT `pagos_atencion_id_foreign` FOREIGN KEY (`atencion_id`) REFERENCES `atenciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO pagos VALUES("1","1","2500.00","0","2021-05-04","Servicio actual","Admin",NULL,NULL,"2021-05-04 13:47:51","2021-05-04 13:47:51");
INSERT INTO pagos VALUES("2","2","1000.00","0","2021-05-04","Servicio actual","LauraBenedetti",NULL,NULL,"2021-05-04 13:54:25","2021-05-04 13:54:25");
INSERT INTO pagos VALUES("3","3","3000.00","0","2021-05-04","Servicio actual","LauraBenedetti",NULL,NULL,"2021-05-04 13:57:30","2021-05-04 13:57:30");
INSERT INTO pagos VALUES("4","3","1000.00","0","2021-05-04","Parte del monto adeudado","LauraBenedetti",NULL,NULL,"2021-05-04 13:58:15","2021-05-04 13:58:15");
INSERT INTO pagos VALUES("5","4","1000.00","1","2021-05-04","Servicio actual","LauraBenedetti",NULL,NULL,"2021-05-04 14:02:21","2021-05-04 14:02:21");
INSERT INTO pagos VALUES("6","6","10000.00","0","2021-05-04","Inicio tratamiento ortodoncia","LauraBenedetti",NULL,NULL,"2021-05-04 14:21:22","2021-05-04 14:21:22");
INSERT INTO pagos VALUES("7","7","2500.00","0","2021-05-04","Servicio actual","LauraBenedetti",NULL,NULL,"2021-05-04 14:26:52","2021-05-04 14:26:52");
INSERT INTO pagos VALUES("8","8","4000.00","0","2021-05-04","Implante - Primera etapa","Admin",NULL,NULL,"2021-05-04 16:08:55","2021-05-04 16:08:55");





CREATE TABLE `reduccion_stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `insumo_id` bigint(20) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reduccion_stock_insumo_id_foreign` (`insumo_id`),
  CONSTRAINT `reduccion_stock_insumo_id_foreign` FOREIGN KEY (`insumo_id`) REFERENCES `insumos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO reduccion_stock VALUES("1","4","2021-05-04 15:40:51","4","LauraBenedetti",NULL,"2021-05-04 15:40:51","2021-05-04 15:40:51");





CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` bigint(20) unsigned NOT NULL,
  `odontologo` tinyint(1) NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentarios` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `creado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eliminado_por` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`),
  UNIQUE KEY `users_dni_unique` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES("3","Admin","$2y$10$fChGURz/lM6TvjdQiPMIO.0XXml.fG.OFP7eS0kV4ywcR4DT35qWG","Administrador","Sistema","21123657","0","Mendoza 800","1975-03-25","admin@haenggi.com","343-456020",NULL,"1","SISTEMA","Admin",NULL,NULL,NULL,"2021-02-10 22:06:32","2021-05-02 13:31:46");
INSERT INTO users VALUES("4","JoseRodriguez","$2y$10$vME1RxhZwCZdmL3mHlxYFeDQBd.UZt9FDvo4VB9.p54AY5QzU9kg.","Jose","Rodriguez","28845667","1","Córdoba 340","1978-03-15","joserodriguez10@hotmail.com","34347899874",NULL,"2","Admin","Admin",NULL,NULL,NULL,"2021-02-14 23:15:12","2021-05-04 13:42:21");
INSERT INTO users VALUES("5","DaianaSchonfeld","$2y$10$0nxy7qN6kcg7tJEF5TFhXOKgO8RvDV9gE0H00/C.QiuN88s7Pz1Uy","Daiana","Schonfeld","32399956","1","Ayacucho 736, Edificio 4, departamento 7, Paraná Entre Ríos","1983-01-20","DaiSchonfeld.3498@gmail.com","343-4659987",NULL,"2","Admin","Admin",NULL,NULL,NULL,"2021-02-14 23:20:33","2021-05-04 11:33:21");
INSERT INTO users VALUES("6","MartínHernández","$2y$10$MZ.SUDOpITs0bmvfa8OqNuiwwVjskgBriEf/b5.J2kAwJExUi0ib.","Martín","Hernández","31254698","0","Cochrane 893","1984-04-10","Martin.h.10@hotmail.com","0343154897744",NULL,"2","Admin","Admin","Admin",NULL,"2021-05-02 13:36:41","2021-02-15 11:38:04","2021-05-02 13:36:41");
INSERT INTO users VALUES("7","MiguelGutierrez","$2y$10$8fOwS4ctoePi/V/X50psB.AfbVwE4vr76KAl9MwFaCCUXxc9iMU6C","Miguel","Gutierrez","29546325","1","Yrigoyen 834","1979-04-18","Miguel.gutierrez@hotmail.com","154465879",NULL,"2","Admin","Admin",NULL,NULL,NULL,"2021-04-01 16:46:59","2021-05-04 12:32:52");
INSERT INTO users VALUES("8","LauraBenedetti","$2y$10$8ZhPPFQn2gT/iwjU7gPWwOtqT0vInqSHdS4.Aom0ftua.BJl2K6wC","Laura","Benedetti","35700988","0","Luis Palma 9833","1990-05-14","Laura34@gmail.com","0343456987",NULL,NULL,"Admin","Admin",NULL,NULL,NULL,"2021-04-02 18:56:33","2021-05-04 13:49:19");



