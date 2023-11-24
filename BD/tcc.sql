-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Nov-2023 às 05:51
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
('2021319363', 'Emilly Nascimento Dias', 'emilly.2021319363@aluno.iffar.edu.br', '(55) 9-9233-6928', '2023.10.16-18.55.jpg', 11);

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
(33, 'Wed', '14:39:00', '12:25:00', 11),
(34, 'Thu', '13:35:00', '16:39:00', 11),
(35, 'Fri', '08:00:00', '12:25:00', 11),
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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`ID_historico`, `data_hr`, `matricula`, `motivo`) VALUES
(42, '2023-10-13 20:44:13', '2021319363', NULL),
(43, '2023-10-10 20:45:53', '2021319363', NULL),
(44, '2023-10-13 20:53:04', '2021319363', NULL),
(45, '2023-10-13 21:52:11', '2021319363', NULL),
(46, '2023-10-13 21:53:08', '2021319363', NULL),
(47, '2023-10-13 21:53:42', '2021319363', NULL),
(48, '2023-10-13 22:37:11', '2021319363', NULL),
(49, '2023-10-13 22:43:09', '2021319363', NULL),
(61, '2023-10-28 18:41:32', '2021319363', 'Projeto'),
(62, '2023-10-28 18:40:35', '2021319363', 'Aula Cancelada'),
(99, '2023-11-16 21:12:36', '2021319363', NULL);

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
(99, 10);

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
('operador', '03739838086', 'rubianascimento0509@gmail.com', '$2y$10$KuoeNLCUesd8OrwYJlITb.3lImlRxI0WZ/.NoRbybiQKVeNr8IGDy'),
('admin', '06410040016', 'emilly.2021319363@aluno.iffar.edu.br', '$2y$10$AWu04zUtKgHUdfs3BvrIOe7btNGnk5CFJKH5Z2Qtgq4fR/3zQg1F.');

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
