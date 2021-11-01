-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2021 às 00:31
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bbs_livros`
--

DROP TABLE IF EXISTS `bbs_livros`;
CREATE TABLE IF NOT EXISTS `bbs_livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem_livro` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipo` int NOT NULL,
  `id_prateleira` int NOT NULL,
  `id_sit_livro` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_prateleira` (`id_prateleira`),
  KEY `id_sit_livro` (`id_sit_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bbs_livros`
--

INSERT INTO `bbs_livros` (`id`, `nome_livro`, `autor`, `descricao`, `imagem_livro`, `id_tipo`, `id_prateleira`, `id_sit_livro`, `created`, `modified`) VALUES
(1, 'Nome Do Livro1', 'Autor do Livro1', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 1, 1, 1, '2021-10-31 18:01:54', NULL),
(2, 'Nome Do Livro2', 'Autor do Livro2', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 1, 1, 1, '2021-10-31 18:01:54', NULL),
(3, 'Nome Do Livro3', 'Autor do Livro3', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 1, 1, 1, '2021-10-31 18:01:54', NULL),
(4, 'Nome Do Livro4', 'Autor do Livro4', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 2, 1, 1, '2021-10-31 18:01:54', NULL),
(5, 'Nome Do Livro5', 'Autor do Livro5', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 2, 1, 1, '2021-10-31 18:01:54', NULL),
(6, 'Nome Do Livro6', 'Autor do Livro6', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 2, 1, 1, '2021-10-31 18:01:54', NULL),
(7, 'Nome Do Livro7', 'Autor do Livro7', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 3, 1, 1, '2021-10-31 18:01:54', NULL),
(8, 'Nome Do Livro8', 'Autor do Livro8', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 3, 1, 1, '2021-10-31 18:01:54', NULL),
(9, 'Nome Do Livro9', 'Autor do Livro9', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 3, 1, 1, '2021-10-31 18:01:54', NULL),
(10, 'Nome Do Livro10', 'Autor do Livro10', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 4, 2, 1, '2021-10-31 18:01:54', NULL),
(11, 'Nome Do Livro11', 'Autor do Livro11', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 4, 2, 1, '2021-10-31 18:01:54', NULL),
(12, 'Nome Do Livro12', 'Autor do Livro12', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 4, 2, 1, '2021-10-31 18:01:54', NULL),
(13, 'Nome Do Livro13', 'Autor do Livro13', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 5, 2, 1, '2021-10-31 18:01:54', NULL),
(14, 'Nome Do Livro14', 'Autor do Livro14', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 5, 2, 1, '2021-10-31 18:01:54', NULL),
(15, 'Nome Do Livro15', 'Autor do Livro15', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 5, 2, 1, '2021-10-31 18:01:54', NULL),
(16, 'Nome Do Livro16', 'Autor do Livro16', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 6, 2, 1, '2021-10-31 18:01:54', NULL),
(17, 'Nome Do Livro17', 'Autor do Livro17', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 6, 2, 1, '2021-10-31 18:01:54', NULL),
(18, 'Nome Do Livro18', 'Autor do Livro18', 'Um breve resumo sobre o livro que traga interesse para o leitor', NULL, 6, 2, 1, '2021-10-31 18:01:54', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bbs_prateleiras`
--

DROP TABLE IF EXISTS `bbs_prateleiras`;
CREATE TABLE IF NOT EXISTS `bbs_prateleiras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_prateleira` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sit_prateleira` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sit_prateleira` (`id_sit_prateleira`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bbs_prateleiras`
--

INSERT INTO `bbs_prateleiras` (`id`, `nome_prateleira`, `id_sit_prateleira`, `created`, `modified`) VALUES
(1, 'Prateleira 1', 1, '2021-10-31 18:00:44', NULL),
(2, 'Prateleira 2', 1, '2021-10-31 18:00:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bbs_sit_livros`
--

DROP TABLE IF EXISTS `bbs_sit_livros`;
CREATE TABLE IF NOT EXISTS `bbs_sit_livros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bbs_sit_livros`
--

INSERT INTO `bbs_sit_livros` (`id`, `nome_situacao`, `created`, `modified`) VALUES
(1, 'Disponível', '2021-10-31 16:10:48', NULL),
(2, 'Indisponível', '2021-10-31 16:10:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bbs_sit_prateleiras`
--

DROP TABLE IF EXISTS `bbs_sit_prateleiras`;
CREATE TABLE IF NOT EXISTS `bbs_sit_prateleiras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bbs_sit_prateleiras`
--

INSERT INTO `bbs_sit_prateleiras` (`id`, `nome_situacao`, `created`, `modified`) VALUES
(1, 'Ativa', '2021-10-31 17:57:48', NULL),
(2, 'Inativa', '2021-10-31 17:57:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bbs_sit_tipos`
--

DROP TABLE IF EXISTS `bbs_sit_tipos`;
CREATE TABLE IF NOT EXISTS `bbs_sit_tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bbs_sit_tipos`
--

INSERT INTO `bbs_sit_tipos` (`id`, `nome_situacao`, `created`, `modified`) VALUES
(1, 'Ativo', '2021-10-31 17:56:41', '0000-00-00 00:00:00'),
(2, 'Inativo', '2021-10-31 17:56:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bbs_tipos`
--

DROP TABLE IF EXISTS `bbs_tipos`;
CREATE TABLE IF NOT EXISTS `bbs_tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prateleira` int NOT NULL,
  `id_sit_tipo` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prateleira` (`id_prateleira`),
  KEY `id_sit_tipo` (`id_sit_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bbs_tipos`
--

INSERT INTO `bbs_tipos` (`id`, `nome_tipo`, `id_prateleira`, `id_sit_tipo`, `created`, `modified`) VALUES
(1, 'Aventura', 1, 1, '2021-10-31 17:58:37', NULL),
(2, 'Ação', 1, 1, '2021-10-31 17:58:37', NULL),
(3, 'Ficção', 1, 1, '2021-10-31 17:59:35', NULL),
(4, 'Romance', 2, 1, '2021-10-31 17:59:35', NULL),
(5, 'Comédia', 2, 1, '2021-10-31 17:59:35', NULL),
(6, 'Biografia', 2, 1, '2021-10-31 17:59:35', NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bbs_livros`
--
ALTER TABLE `bbs_livros`
  ADD CONSTRAINT `bbs_livros_ibfk_1` FOREIGN KEY (`id_prateleira`) REFERENCES `bbs_prateleiras` (`id`),
  ADD CONSTRAINT `bbs_livros_ibfk_2` FOREIGN KEY (`id_sit_livro`) REFERENCES `bbs_sit_livros` (`id`),
  ADD CONSTRAINT `bbs_livros_ibfk_3` FOREIGN KEY (`id_tipo`) REFERENCES `bbs_tipos` (`id`);

--
-- Limitadores para a tabela `bbs_prateleiras`
--
ALTER TABLE `bbs_prateleiras`
  ADD CONSTRAINT `bbs_prateleiras_ibfk_1` FOREIGN KEY (`id_sit_prateleira`) REFERENCES `bbs_sit_prateleiras` (`id`);

--
-- Limitadores para a tabela `bbs_tipos`
--
ALTER TABLE `bbs_tipos`
  ADD CONSTRAINT `bbs_tipos_ibfk_1` FOREIGN KEY (`id_prateleira`) REFERENCES `bbs_prateleiras` (`id`),
  ADD CONSTRAINT `bbs_tipos_ibfk_2` FOREIGN KEY (`id_sit_tipo`) REFERENCES `bbs_sit_tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
