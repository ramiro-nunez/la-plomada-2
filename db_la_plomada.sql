-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         12.2.2-MariaDB - MariaDB Server
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_la_plomada
CREATE DATABASE IF NOT EXISTS `db_la_plomada` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `db_la_plomada`;

-- Volcando estructura para tabla db_la_plomada.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.cache: ~6 rows (aproximadamente)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laplomada-cache-compra@gmail.com|127.0.0.1', 'i:2;', 1781624653),
	('laplomada-cache-compra@gmail.com|127.0.0.1:timer', 'i:1781624653;', 1781624653),
	('laplomada-cache-comprador@gmail.com|127.0.0.1', 'i:2;', 1781623343),
	('laplomada-cache-comprador@gmail.com|127.0.0.1:timer', 'i:1781623343;', 1781623343),
	('laplomada-cache-compras@gmail.com|127.0.0.1', 'i:2;', 1781640377),
	('laplomada-cache-compras@gmail.com|127.0.0.1:timer', 'i:1781640377;', 1781640377);

-- Volcando estructura para tabla db_la_plomada.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_la_plomada.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carritos_user_id_foreign` (`user_id`),
  CONSTRAINT `carritos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.carritos: ~3 rows (aproximadamente)
INSERT INTO `carritos` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 2, '2026-06-16 00:48:49', '2026-06-16 00:48:49'),
	(2, 6, '2026-06-16 17:00:29', '2026-06-16 17:00:29'),
	(4, 9, '2026-06-18 00:57:08', '2026-06-18 00:57:08');

-- Volcando estructura para tabla db_la_plomada.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.categorias: ~4 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nombre`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Plomadovich', NULL, '2026-06-16 00:28:43', '2026-06-17 05:33:15'),
	(2, 'Anzuelos', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(3, 'Reeles', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(4, 'Cañas de Pesca', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44');

-- Volcando estructura para tabla db_la_plomada.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `direccion_id` bigint(20) unsigned DEFAULT NULL,
  `metodo_pago` varchar(255) NOT NULL,
  `retiro_sucursal` tinyint(1) NOT NULL DEFAULT 0,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_user_id_foreign` (`user_id`),
  CONSTRAINT `compras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.compras: ~24 rows (aproximadamente)
INSERT INTO `compras` (`id`, `user_id`, `direccion_id`, `metodo_pago`, `retiro_sucursal`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 2, NULL, 'efectivo', 1, 11763.77, 'enviado', '2026-05-06 08:24:11', '2026-06-16 16:52:46'),
	(2, 2, NULL, 'efectivo', 1, 5562.32, 'pagado', '2026-05-01 02:14:27', '2026-06-16 00:28:44'),
	(3, 2, NULL, 'transferencia', 1, 4591.90, 'enviado', '2026-04-21 09:29:45', '2026-06-16 00:28:44'),
	(4, 2, 1, 'efectivo', 0, 15770.58, 'pagado', '2026-05-13 07:04:28', '2026-06-16 00:28:44'),
	(5, 2, NULL, 'transferencia', 1, 4768.08, 'pagado', '2026-05-24 02:13:40', '2026-06-16 00:28:44'),
	(6, 3, 2, 'efectivo', 0, 12250.04, 'enviado', '2026-05-01 07:20:56', '2026-06-16 00:28:44'),
	(7, 3, NULL, 'efectivo', 1, 19451.86, 'enviado', '2026-06-13 13:12:56', '2026-06-16 00:28:44'),
	(8, 4, 3, 'transferencia', 0, 2781.16, 'pendiente', '2026-06-08 13:16:54', '2026-06-16 00:28:44'),
	(9, 4, 3, 'transferencia', 0, 10650.04, 'enviado', '2026-05-30 07:59:15', '2026-06-16 00:28:44'),
	(10, 5, 4, 'mercado_pago', 0, 19353.52, 'pendiente', '2026-05-25 07:25:04', '2026-06-16 00:28:44'),
	(11, 5, 4, 'transferencia', 0, 15314.64, 'enviado', '2026-05-04 07:25:48', '2026-06-16 00:28:44'),
	(12, 2, NULL, 'efectivo', 1, 9951.04, 'pendiente', '2026-06-16 00:49:04', '2026-06-16 00:49:04'),
	(13, 2, NULL, 'transferencia', 1, 3561.78, 'pendiente', '2026-06-16 01:00:05', '2026-06-16 01:00:05'),
	(14, 2, NULL, 'mercado_pago', 1, 14926.56, 'pendiente', '2026-06-16 01:38:10', '2026-06-16 01:38:10'),
	(15, 2, NULL, 'transferencia', 1, 1851.14, 'pendiente', '2026-06-16 02:57:33', '2026-06-16 02:57:33'),
	(16, 2, NULL, 'efectivo', 1, 9463.28, 'pendiente', '2026-06-16 03:30:59', '2026-06-16 03:30:59'),
	(17, 6, NULL, 'mercado_pago', 1, 3192.05, 'pendiente', '2026-06-16 18:26:22', '2026-06-16 18:26:22'),
	(18, 2, NULL, 'transferencia', 1, 1981.16, 'pendiente', '2026-06-16 23:04:02', '2026-06-16 23:04:02'),
	(19, 6, NULL, 'mercado_pago', 1, 3287.76, 'enviado', '2026-06-17 14:09:34', '2026-06-17 14:12:46'),
	(21, 2, NULL, 'efectivo', 1, 115071.60, 'pendiente', '2026-06-17 18:38:18', '2026-06-17 18:38:18'),
	(22, 9, NULL, 'efectivo', 1, 40765.50, 'pendiente', '2026-06-18 00:57:21', '2026-06-18 00:57:21'),
	(23, 6, NULL, 'efectivo', 1, 40765.50, 'pendiente', '2026-06-18 00:58:16', '2026-06-18 00:58:16'),
	(24, 6, NULL, 'efectivo', 1, 23000.00, 'pagado', '2026-06-18 01:26:13', '2026-06-18 01:27:03'),
	(25, 6, 5, 'mercado_pago', 0, 9000.00, 'pendiente', '2026-06-18 01:35:00', '2026-06-18 01:35:00');

-- Volcando estructura para tabla db_la_plomada.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.contactos: ~4 rows (aproximadamente)
INSERT INTO `contactos` (`id`, `nombre`, `apellido`, `email`, `telefono`, `asunto`, `mensaje`, `created_at`, `updated_at`) VALUES
	(1, 'antonio', 'quintana', 'notengo@gmail', '3794395882', 'Seguimiento de pedido', 'asdfasdasdfadffad', '2026-06-16 16:56:38', '2026-06-16 16:56:38'),
	(2, 'juan', 'pedro', 'adfa@afsd', '123123', 'Seguimiento de pedido', 'ASASDFASDFA', '2026-06-16 18:42:15', '2026-06-16 18:42:15'),
	(3, 'ricardo', 'quintana', 'quintanarijoan@gmail.com', '3794395882', 'Seguimiento de pedido', 'asfasdfasdfsdafdsads', '2026-06-16 22:15:18', '2026-06-16 22:15:18'),
	(4, 'antonio', 'quintana', 'quintanarijoan@gmail.com', '3794395882', 'Consulta sobre productos', '¿cuando me va a llegar mi pedido? ¿Ramiro miraste el trello?', '2026-06-17 00:08:29', '2026-06-17 00:08:29');

-- Volcando estructura para tabla db_la_plomada.detalle_carritos
CREATE TABLE IF NOT EXISTS `detalle_carritos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carrito_id` bigint(20) unsigned NOT NULL,
  `var_productos_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_carritos_carrito_id_foreign` (`carrito_id`),
  KEY `detalle_carritos_var_productos_id_foreign` (`var_productos_id`),
  CONSTRAINT `detalle_carritos_carrito_id_foreign` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_carritos_var_productos_id_foreign` FOREIGN KEY (`var_productos_id`) REFERENCES `var_productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.detalle_carritos: ~1 rows (aproximadamente)
INSERT INTO `detalle_carritos` (`id`, `carrito_id`, `var_productos_id`, `cantidad`, `created_at`, `updated_at`) VALUES
	(22, 2, 44, 4, '2026-06-18 02:49:09', '2026-06-18 02:49:09');

-- Volcando estructura para tabla db_la_plomada.detalle_compras
CREATE TABLE IF NOT EXISTS `detalle_compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) unsigned NOT NULL,
  `var_productos_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_compras_compra_id_foreign` (`compra_id`),
  KEY `detalle_compras_var_productos_id_foreign` (`var_productos_id`),
  CONSTRAINT `detalle_compras_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_compras_var_productos_id_foreign` FOREIGN KEY (`var_productos_id`) REFERENCES `var_productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.detalle_compras: ~35 rows (aproximadamente)
INSERT INTO `detalle_compras` (`id`, `compra_id`, `var_productos_id`, `cantidad`, `precio_unitario`, `created_at`, `updated_at`) VALUES
	(1, 1, 11, 3, 2567.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(2, 1, 26, 2, 2030.62, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(3, 2, 18, 2, 2781.16, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(4, 3, 19, 2, 2295.95, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(5, 4, 40, 3, 1984.04, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(6, 4, 41, 3, 2384.04, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(7, 4, 2, 1, 2666.34, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(8, 5, 41, 1, 2384.04, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(9, 5, 41, 1, 2384.04, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(10, 6, 5, 4, 3062.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(11, 7, 29, 2, 3600.91, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(12, 7, 5, 4, 3062.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(13, 8, 18, 1, 2781.16, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(14, 9, 4, 4, 2662.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(15, 10, 4, 3, 2662.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(16, 10, 10, 4, 2167.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(17, 10, 20, 1, 2695.95, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(18, 11, 27, 3, 2430.62, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(19, 11, 11, 2, 2567.51, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(20, 11, 23, 1, 2887.76, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(21, 12, 22, 4, 2487.76, '2026-06-16 00:49:04', '2026-06-16 00:49:04'),
	(22, 13, 33, 2, 1780.89, '2026-06-16 01:00:05', '2026-06-16 01:00:05'),
	(23, 14, 22, 6, 2487.76, '2026-06-16 01:38:10', '2026-06-16 01:38:10'),
	(24, 15, 37, 1, 1851.14, '2026-06-16 02:57:33', '2026-06-16 02:57:33'),
	(25, 16, 23, 1, 2887.76, '2026-06-16 03:30:59', '2026-06-16 03:30:59'),
	(26, 16, 24, 2, 3287.76, '2026-06-16 03:30:59', '2026-06-16 03:30:59'),
	(27, 17, 36, 1, 3192.05, '2026-06-16 18:26:22', '2026-06-16 18:26:22'),
	(28, 18, 16, 1, 1981.16, '2026-06-16 23:04:02', '2026-06-16 23:04:02'),
	(29, 19, 24, 1, 3287.76, '2026-06-17 14:09:34', '2026-06-17 14:09:34'),
	(31, 21, 24, 35, 3287.76, '2026-06-17 18:38:18', '2026-06-17 18:38:18'),
	(32, 22, 25, 25, 1630.62, '2026-06-18 00:57:21', '2026-06-18 00:57:21'),
	(33, 23, 25, 25, 1630.62, '2026-06-18 00:58:16', '2026-06-18 00:58:16'),
	(34, 24, 43, 1, 5000.00, '2026-06-18 01:26:13', '2026-06-18 01:26:13'),
	(35, 24, 44, 3, 6000.00, '2026-06-18 01:26:13', '2026-06-18 01:26:13'),
	(36, 25, 44, 1, 9000.00, '2026-06-18 01:35:00', '2026-06-18 01:35:00');

-- Volcando estructura para tabla db_la_plomada.direcciones
CREATE TABLE IF NOT EXISTS `direcciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `altura` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `direcciones_user_id_foreign` (`user_id`),
  CONSTRAINT `direcciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.direcciones: ~5 rows (aproximadamente)
INSERT INTO `direcciones` (`id`, `user_id`, `provincia`, `ciudad`, `codigo_postal`, `calle`, `altura`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Corrientes', 'Corrientes Capital', '3400', 'Av. Centenario', '1420', '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(2, 3, 'Corrientes', 'Paso de los Libres', '3230', 'Colon', '450', '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(3, 4, 'Corrientes', 'Paso de los Libres', '3230', 'Colon', '450', '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(4, 5, 'Corrientes', 'Paso de los Libres', '3230', 'Colon', '450', '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(5, 6, 'corrientes', 'empedrado', '3418', 'rioja', '2000', '2026-06-18 01:35:00', '2026-06-18 01:35:00');

-- Volcando estructura para tabla db_la_plomada.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_la_plomada.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_la_plomada.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_la_plomada.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.migrations: ~13 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_05_31_140113_create_categorias_table', 1),
	(5, '2026_05_31_140114_create_productos_table', 1),
	(6, '2026_05_31_140115_create_var_productos_table', 1),
	(7, '2026_06_03_191344_add_soft_deletes_to_users_table', 1),
	(8, '2026_06_04_004848_create_contactos_table', 1),
	(9, '2026_06_09_223248_create_carritos_table', 1),
	(10, '2026_06_09_223441_create_detalle_carritos_table', 1),
	(11, '2026_06_09_223505_create_compras_table', 1),
	(12, '2026_06_09_223515_create_detalle_compras_table', 1),
	(13, '2026_06_15_154434_create_direccions_table', 1);

-- Volcando estructura para tabla db_la_plomada.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_la_plomada.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_categoria` bigint(20) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.productos: ~14 rows (aproximadamente)
INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Plomadas pesadas', NULL, '2026-06-16 00:28:43', '2026-06-17 06:01:28'),
	(2, 1, 'Plomadas nulla', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(3, 1, 'Plomadas quas', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(4, 2, 'Anzuelos eius', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(5, 2, 'Anzuelos vel', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(6, 2, 'Anzuelos culpa', '2026-06-17 06:47:05', '2026-06-16 00:28:43', '2026-06-17 06:47:05'),
	(7, 3, 'Reeles molestias', NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(8, 3, 'Reeles ut', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(9, 3, 'Reeles id', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(10, 3, 'Reeles minima', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(11, 4, 'Cañas de Pesca rem', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(12, 4, 'Cañas de Pesca et', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(13, 4, 'Cañas de Pesca harum', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(14, 4, 'Cañas de Pesca magnam', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44');

-- Volcando estructura para tabla db_la_plomada.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.sessions: ~4 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('8jf1SYpzCtM9MjxIMGNjJXJnQdGXO7aev3ptIvSA', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJTQ0NUaWNwRXFXNmlqa3FNUnVoV3hZaW84akIxNUlNQ2FJd1NRRXlnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xhLXBsb21hZGEtMi50ZXN0XC9zdG9yYWdlIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1781740162),
	('aJv82voKP662MKpXPLeCF7OdagGo4rHa0sLB1FJ9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJQZW9qME43MzdrRmZGY2ZoUlpwQWpCZGxYOFdiOEpYMVZoSmVZQ2V6IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbGEtcGxvbWFkYS0yLnRlc3RcL3BhbmVsLWNvbnRyb2wiLCJyb3V0ZSI6bnVsbH0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==', 1782603743),
	('j8KYTw8d0HtKH74lZM1z1oSEAoJlGzh2mDzBSuM6', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJWU0lLWDdVV1VISG96aXhyQWtlYUxBc0t2TGp4UmJTRFVtZGlVYVhFIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbGEtcGxvbWFkYS0yLnRlc3RcL2NhcnJpdG8iLCJyb3V0ZSI6ImNhcnJpdG8udmVyIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo2fQ==', 1781740171),
	('TzSgEcCiHpcYSPYF802VOe6gKf6EndPHBjvtEaI4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.27.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJtdjhUN2NwRThLSGpMSTAwN2luTjJSbVZMSWx5Y1NnQkZoTG0zR29LIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xhLXBsb21hZGEtMi50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1782603265);

-- Volcando estructura para tabla db_la_plomada.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL DEFAULT 'cliente',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.users: ~8 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `apellido`, `email`, `email_verified_at`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Test User', 'Perez', 'test@example.com', '2026-06-16 00:28:43', '$2y$12$0GZWCuH2JRYU7fGzo6lMru8DxHyYe88Z7OSWMuyj3daJT6g4RyqVO', 'cliente', 'tkGTGWhY9Y', '2026-06-16 00:28:43', '2026-06-16 00:28:43', NULL),
	(2, 'Antonio', 'García', 'antonio@gmail.com', NULL, '$2y$12$hcHW6K9m8Ds46/O9WqlqC.sl6IpibV5X9Jb0aG3dr2O4Lny8x08t2', 'admin', NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44', NULL),
	(3, 'Ana Schaefer', 'Keeling', 'francesco67@example.com', '2026-06-16 00:28:44', '$2y$12$0GZWCuH2JRYU7fGzo6lMru8DxHyYe88Z7OSWMuyj3daJT6g4RyqVO', 'cliente', 'T14pfuaj7T', '2026-06-16 00:28:44', '2026-06-16 00:28:44', NULL),
	(4, 'Kian Hintz MD', 'Labadie', 'ettie.botsford@example.org', '2026-06-16 00:28:44', '$2y$12$0GZWCuH2JRYU7fGzo6lMru8DxHyYe88Z7OSWMuyj3daJT6g4RyqVO', 'cliente', 'gURhscT5zB', '2026-06-16 00:28:44', '2026-06-16 00:28:44', NULL),
	(5, 'Prof. Jerad Spencer PhD', 'Schultz', 'hazle.rowe@example.org', '2026-06-16 00:28:44', '$2y$12$0GZWCuH2JRYU7fGzo6lMru8DxHyYe88Z7OSWMuyj3daJT6g4RyqVO', 'cliente', 'NPx4PSNJ9b', '2026-06-16 00:28:44', '2026-06-16 00:28:44', NULL),
	(6, 'comprador', 'compulsivo', 'comprar@gmail.com', NULL, '$2y$12$WZgBxwRK8N/mQUQV8j9ZH.AofRG2tyNhRnM66e33VcyYY4IyMPBWe', 'cliente', NULL, '2026-06-16 17:00:08', '2026-06-16 17:00:08', NULL),
	(8, 'antonio', 'quintana', 'quintanarijoan@gmail.com', NULL, '$2y$12$YAkzlRMr3bmdku3xqWXrEeP4GzIwSoEA8Qv5kXvJXY9iGIlgDxSFq', 'cliente', NULL, '2026-06-17 18:29:40', '2026-06-17 18:29:40', NULL),
	(9, 'comprador2', '2', 'comprar2@gmail.com', NULL, '$2y$12$NuRDY1YR9ZiB0MZSn02kc.ZfP4MxjMqyEgsLEdkyHo0cnOzZi0Qfi', 'cliente', NULL, '2026-06-18 00:55:49', '2026-06-18 00:55:49', NULL);

-- Volcando estructura para tabla db_la_plomada.var_productos
CREATE TABLE IF NOT EXISTS `var_productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `var_productos_id_producto_foreign` (`id_producto`),
  CONSTRAINT `var_productos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla db_la_plomada.var_productos: ~44 rows (aproximadamente)
INSERT INTO `var_productos` (`id`, `id_producto`, `descripcion`, `precio`, `stock`, `url_img`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Chico', 2266.34, 33, 'productos/QKqp3sG5UlnslWlsCISPrj4flXHnhVOHikPo3Nvl.jpg', NULL, '2026-06-16 00:28:43', '2026-06-16 22:33:33'),
	(2, 1, 'Mediano', 2666.34, 28, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(3, 1, 'Grande', 3066.34, 19, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(4, 2, 'Chico', 2662.51, 27, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(5, 2, 'Mediano', 3062.51, 39, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(6, 2, 'Grande', 3462.51, 28, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(7, 3, 'Chico', 2120.50, 24, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(8, 3, 'Mediano', 2520.50, 15, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(9, 3, 'Grande', 2920.50, 25, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(10, 4, 'Chico', 2167.51, 23, 'productos/MzFqqQOATgxXpszFuiEJB5lnFwa3CRpyuwirocG9.jpg', NULL, '2026-06-16 00:28:43', '2026-06-16 23:00:47'),
	(11, 4, 'Mediano', 2567.51, 42, 'productos/5QIb04xlASEblPncCT6XzSbQYYSUIif3DdNsnvGn.jpg', NULL, '2026-06-16 00:28:43', '2026-06-16 23:00:31'),
	(12, 4, 'Grande', 2967.51, 32, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(13, 5, 'Chico', 4006.07, 48, 'productos/LsSLVFUjpJJLfiySVcJgPvLbcZnEcQWGb2gyNs1U.jpg', NULL, '2026-06-16 00:28:43', '2026-06-16 23:01:25'),
	(14, 5, 'Mediano', 4406.07, 47, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(15, 5, 'Grande', 4806.07, 34, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(16, 6, 'Chico', 1981.16, 21, 'productos/Yri6kB9uzfmA2PlFSb49UDtie7RVP5y2kPXOI3bY.jpg', NULL, '2026-06-16 00:28:43', '2026-06-16 23:04:02'),
	(17, 6, 'Mediano', 2381.16, 56, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(18, 6, 'Grande', 2781.16, 58, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(19, 7, 'Chico', 2295.95, 28, NULL, NULL, '2026-06-16 00:28:43', '2026-06-16 00:28:43'),
	(20, 7, 'Mediano', 2695.95, 29, 'productos/5krge3Cl7IiMHCl2UcltYj3oYt14jJdHOcUSzgxq.jpg', NULL, '2026-06-16 00:28:44', '2026-06-16 23:00:06'),
	(21, 7, 'Grande', 3095.95, 60, 'productos/djF4mS54irk06eL7s89J9QLkb3ULAMj1b34vN3dq.jpg', NULL, '2026-06-16 00:28:44', '2026-06-16 22:59:13'),
	(22, 8, 'Chico', 2487.76, 0, 'productos/fiIZbkEU6DDSeVoy3lGcN3oYK79LdRghv0tJKoA1.jpg', NULL, '2026-06-16 00:28:44', '2026-06-16 22:59:46'),
	(23, 8, 'Mediano', 2887.76, 34, NULL, '2026-06-16 19:30:53', '2026-06-16 00:28:44', '2026-06-16 19:30:53'),
	(24, 8, 'Grande', 3287.76, 30, NULL, NULL, '2026-06-16 00:28:44', '2026-06-17 18:38:18'),
	(25, 9, 'Chico', 1630.62, 30, NULL, '2026-06-18 02:41:49', '2026-06-16 00:28:44', '2026-06-18 02:41:49'),
	(26, 9, 'Mediano', 2030.62, 38, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(27, 9, 'Grande', 2430.62, 57, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(28, 10, 'Chico', 3200.91, 40, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(29, 10, 'Mediano', 3600.91, 52, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(30, 10, 'Grande', 4000.91, 45, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(31, 11, 'Chico', 980.89, 32, 'productos/3ATHoHY9w60tVU1N1JHUrmgL69GwcjFYQznhnmhi.jpg', NULL, '2026-06-16 00:28:44', '2026-06-16 23:01:46'),
	(32, 11, 'Mediano', 1380.89, 20, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(33, 11, 'Grande', 1780.89, 8, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 01:00:05'),
	(34, 12, 'Chico', 2392.05, 11, 'productos/9dprZjLziCRoBqXhiwVu1WidNMWBPZwcPnFmbJO4.jpg', '2026-06-18 02:13:41', '2026-06-16 00:28:44', '2026-06-18 02:13:41'),
	(35, 12, 'Mediano', 2792.05, 47, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(36, 12, 'Grande', 3192.05, 9, NULL, '2026-06-16 19:29:45', '2026-06-16 00:28:44', '2026-06-16 19:29:45'),
	(37, 13, 'Chico', 1851.14, 35, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 02:57:33'),
	(38, 13, 'Mediano', 2251.14, 45, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(39, 13, 'Grande', 2651.14, 28, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(40, 14, 'Chico', 1984.04, 23, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(41, 14, 'Mediano', 2384.04, 18, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(42, 14, 'Grande', 2784.04, 10, NULL, NULL, '2026-06-16 00:28:44', '2026-06-16 00:28:44'),
	(43, 8, 'manija derecha', 5000.00, 0, 'productos/XpnjqUXFCOp0y2Ct7V5bLgg1AlVotU5bs1ycuCDU.jpg', NULL, '2026-06-18 01:23:43', '2026-06-18 01:26:13'),
	(44, 8, 'manija izquierda', 9000.00, 3, 'productos/PoatOLsFltO0fsyzMdd6WeBCUZrCSb6VyCFPSzjh.jpg', NULL, '2026-06-18 01:24:12', '2026-06-18 02:49:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
