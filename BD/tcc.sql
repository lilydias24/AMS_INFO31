-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Dez-2023 às 22:37
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `matricula` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `num_responsavel` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ID_turma` int NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `ID_turma` (`ID_turma`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `email`, `num_responsavel`, `foto`, `ID_turma`) VALUES
('2023000001', 'Ana Exemplo Souza', 'ana.exemplo@exemplo.com', '(55) 9-0000-0001', NULL, 11),
('2023000002', 'Bruno Exemplo Lima', 'bruno.exemplo@exemplo.com', '(55) 9-0000-0002', NULL, 11),
('2023000003', 'Carla Exemplo Rocha', 'carla.exemplo@exemplo.com', '(55) 9-0000-0003', NULL, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma`
--

DROP TABLE IF EXISTS `cronograma`;
CREATE TABLE IF NOT EXISTS `cronograma` (
  `ID_cronos` int NOT NULL AUTO_INCREMENT,
  `dia_semana` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `hr_entrada` time NOT NULL,
  `hr_saida` time NOT NULL,
  `ID_turma` int NOT NULL,
  PRIMARY KEY (`ID_cronos`),
  KEY `ID_turma` (`ID_turma`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cronograma`
--

INSERT INTO `cronograma` (`ID_cronos`, `dia_semana`, `hr_entrada`, `hr_saida`, `ID_turma`) VALUES
(31, 'Mon', '08:00:00', '12:25:00', 11),
(32, 'Tue', '08:00:00', '17:10:00', 11),
(33, 'Wed', '08:00:00', '12:25:00', 11),
(34, 'Thu', '13:30:00', '17:10:00', 11),
(35, 'Fri', '08:00:00', '11:35:00', 11),
(76, 'Mon', '08:00:00', '12:25:00', 8),
(77, 'Tue', '08:00:00', '17:10:00', 8),
(78, 'Wed', '08:00:00', '11:35:00', 8),
(79, 'Thu', '08:00:00', '17:10:00', 8),
(80, 'Fri', '13:30:00', '17:10:00', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `ID_historico` int NOT NULL AUTO_INCREMENT,
  `data_hr` datetime NOT NULL,
  `matricula` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_historico`),
  KEY `matricula` (`matricula`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`ID_historico`, `data_hr`, `matricula`, `motivo`) VALUES
(42, '2023-10-13 20:44:13', '2023000003', NULL),
(43, '2023-10-10 20:45:53', '2023000003', NULL),
(44, '2023-10-13 20:53:04', '2023000003', NULL),
(45, '2023-10-13 21:52:11', '2023000003', NULL),
(46, '2023-10-13 21:53:08', '2023000003', NULL),
(47, '2023-10-13 21:53:42', '2023000003', NULL),
(48, '2023-10-13 22:37:11', '2023000003', NULL),
(49, '2023-10-13 22:43:09', '2023000003', NULL),
(61, '2023-10-28 18:41:32', '2023000003', 'Projeto'),
(62, '2023-10-28 18:40:35', '2023000003', 'Aula Cancelada'),
(99, '2023-11-16 21:12:36', '2023000003', NULL),
(100, '2023-11-24 22:07:02', '2023000003', 'Chovendo'),
(101, '2023-11-26 04:25:21', '2023000003', NULL),
(102, '2023-11-29 08:44:58', '2023000003', 'Chovendo'),
(104, '2023-12-01 17:23:56', '2023000001', NULL),
(105, '2023-12-01 17:24:45', '2023000001', 'Prof Faltou');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informa`
--

DROP TABLE IF EXISTS `informa`;
CREATE TABLE IF NOT EXISTS `informa` (
  `ID_historico` int NOT NULL,
  `ID_status` int NOT NULL,
  KEY `ID_historico` (`ID_historico`,`ID_status`) USING BTREE,
  KEY `ID_status` (`ID_status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `informa`
--

INSERT INTO `informa` (`ID_historico`, `ID_status`) VALUES
(42, 8),
(43, 8),
(44, 4),
(45, 4),
(46, 8),
(47, 8),
(48, 6),
(49, 6),
(61, 12),
(62, 10),
(99, 10),
(100, 6),
(101, 6),
(102, 10),
(104, 6),
(105, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `ID_status` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_status`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`ID_status`, `descricao`) VALUES
(4, 'Entrada em Atraso'),
(6, 'Presente'),
(8, 'Ausente'),
(10, 'Saída Autorizada'),
(12, 'Entrada Autorizada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `ID_turma` int NOT NULL AUTO_INCREMENT,
  `nome_turma` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`ID_turma`, `nome_turma`) VALUES
(8, 'INF21'),
(11, 'INF31'),
(14, 'ADM12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nivel` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CPF` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nivel`, `CPF`, `email`, `senha`) VALUES
('admin', '00000000001', 'admin@exemplo.com', '$2y$10$.Yd7nY73kgAAR9OTITARieXFnowr7XbPOraTr2b.yP2TlqEBCnyie'),
('operador', '00000000002', 'operador@exemplo.com', '$2y$10$oZYH0lnihyJJAU7IsFnXKOLLmrBG5gprnjyQt7EXKK0P5FdwYWY8a');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_turma` FOREIGN KEY (`ID_turma`) REFERENCES `turma` (`ID_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cronograma`
--
ALTER TABLE `cronograma`
  ADD CONSTRAINT `cronos_turma` FOREIGN KEY (`ID_turma`) REFERENCES `turma` (`ID_turma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `fk_matricula` FOREIGN KEY (`matricula`) REFERENCES `aluno` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `informa`
--
ALTER TABLE `informa`
  ADD CONSTRAINT `fk_historico` FOREIGN KEY (`ID_historico`) REFERENCES `historico` (`ID_historico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`ID_status`) REFERENCES `status` (`ID_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
