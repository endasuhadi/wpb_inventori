/*
 Navicat Premium Data Transfer

 Source Server         : Kuliah
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : wpb_inventory

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 24/07/2022 15:23:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_barang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_barang` int(11) NULL DEFAULT NULL,
  `satuan` enum('Pcs','Unit','Box') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Pcs',
  `id_operator` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES (5, 'B001', 'Pensil', 2000, 'Unit', NULL, '2022-06-12 12:46:47', '2022-06-12 12:46:47', NULL);
INSERT INTO `tbl_barang` VALUES (6, 'B002', 'Pulpen', 3000, 'Pcs', NULL, '2022-06-12 13:10:20', '2022-06-12 13:10:20', NULL);

-- ----------------------------
-- Table structure for tbl_barang_keluar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang_keluar`;
CREATE TABLE `tbl_barang_keluar`  (
  `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `qty_keluar` int(11) NULL DEFAULT NULL,
  `id_barang` int(11) NULL DEFAULT NULL,
  `id_operator` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_keluar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_barang_keluar
-- ----------------------------
INSERT INTO `tbl_barang_keluar` VALUES (1, 1, 5, 1, '2022-06-12 13:00:22', '2022-06-12 13:00:22', '2022-06-12 13:11:04');
INSERT INTO `tbl_barang_keluar` VALUES (2, 2, 6, 1, '2022-06-12 13:18:26', '2022-06-12 13:18:26', '2022-06-12 13:18:40');

-- ----------------------------
-- Table structure for tbl_barang_masuk
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang_masuk`;
CREATE TABLE `tbl_barang_masuk`  (
  `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `qty_masuk` int(11) NULL DEFAULT NULL,
  `id_barang` int(11) NULL DEFAULT NULL,
  `id_operator` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang_masuk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_operator
-- ----------------------------
DROP TABLE IF EXISTS `tbl_operator`;
CREATE TABLE `tbl_operator`  (
  `id_operator` int(11) NOT NULL AUTO_INCREMENT,
  `nama_operator` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime(0) NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_operator`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_operator
-- ----------------------------
INSERT INTO `tbl_operator` VALUES (2, 'Enda Suhadi', 'enda', '$2y$10$CTLNivgINvq6EFkzFN4Ln.1pkM8Zlquf9l8x7S3V5HrPRi58OkASe', 'enda524744@gmail.com', '2022-06-12 11:55:36', '2022-06-12 11:55:36', '2022-06-12 12:35:34');

-- ----------------------------
-- Table structure for tbl_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penjualan`;
CREATE TABLE `tbl_penjualan`  (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `fid_barang` int(11) NULL DEFAULT NULL,
  `fid_operator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `create_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_penjualan
-- ----------------------------
INSERT INTO `tbl_penjualan` VALUES (1, 6, '2', 5, '2022-07-24 14:18:02');
INSERT INTO `tbl_penjualan` VALUES (2, 5, '2', 1, '2022-07-24 14:33:46');
INSERT INTO `tbl_penjualan` VALUES (3, 5, '2', 4, '2022-07-24 14:34:58');
INSERT INTO `tbl_penjualan` VALUES (4, 6, '2', 8, '2022-07-24 14:39:05');
INSERT INTO `tbl_penjualan` VALUES (5, 5, '2', 2, '2022-07-24 15:00:08');

SET FOREIGN_KEY_CHECKS = 1;
