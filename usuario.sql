-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para usuario
DROP DATABASE IF EXISTS `usuario`;
CREATE DATABASE IF NOT EXISTS `usuario` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `usuario`;

-- Copiando estrutura para tabela usuario.cadastro
DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `elo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nome` (`nick`) USING BTREE,
  UNIQUE KEY `email` (`email`),
  KEY `FK_cadastro_elo` (`elo`),
  CONSTRAINT `FK_cadastro_elo` FOREIGN KEY (`elo`) REFERENCES `elo` (`Id_elo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela usuario.cadastro: ~4 rows (aproximadamente)
INSERT INTO `cadastro` (`id_usuario`, `nick`, `email`, `senha`, `elo`) VALUES
	(39, 'GutterRJ', 'gutter@hotmail.com', '202cb962ac59075b964b07152d234b70', 6),
	(40, 'dilçim', 'adilson@gmail.com', '202cb962ac59075b964b07152d234b70', 9),
	(41, 'johns2', 'john@gmail.com', '202cb962ac59075b964b07152d234b70', 10),
	(42, 'gui33', 'gui@hotmail.com', '202cb962ac59075b964b07152d234b70', 9);

-- Copiando estrutura para tabela usuario.elo
DROP TABLE IF EXISTS `elo`;
CREATE TABLE IF NOT EXISTS `elo` (
  `Id_elo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_elo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='tabelinha dos elos';

-- Copiando dados para a tabela usuario.elo: ~5 rows (aproximadamente)
INSERT INTO `elo` (`Id_elo`, `nome`) VALUES
	(6, 'Bronze'),
	(7, 'Prata'),
	(8, 'Ouro'),
	(9, 'Platina'),
	(10, 'Diamante');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
