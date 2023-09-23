-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Set-2023 às 17:53
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
  `foto` blob,
  `ID_turma` int NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `ID_turma` (`ID_turma`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `email`, `num_responsavel`, `foto`, `ID_turma`) VALUES
('2021319363', 'Emilly Nascimento Dias', 'emilly.2021319363@aluno.iffar.edu.br', '(55) 9-9233-6928', 0x4172726179, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cronograma`
--

INSERT INTO `cronograma` (`ID_cronos`, `dia_semana`, `hr_entrada`, `hr_saida`, `ID_turma`) VALUES
(31, 'Mon', '12:36:00', '12:38:00', 11),
(32, 'Tue', '17:35:00', '17:39:00', 11),
(33, 'Wed', '14:39:00', '14:40:00', 11),
(34, 'Thu', '13:35:00', '16:39:00', 11),
(35, 'Fri', '16:35:00', '18:35:00', 11),
(65, 'Mon', '21:42:00', '22:42:00', 9),
(66, 'Tue', '22:42:00', '01:42:00', 9),
(67, 'Wed', '23:42:00', '01:42:00', 9),
(68, 'Thu', '00:42:00', '02:42:00', 9),
(69, 'Fri', '16:42:00', '20:42:00', 9),
(71, 'Mon', '08:00:00', '17:10:00', 11),
(72, 'Tue', '07:45:00', '17:05:00', 11),
(73, 'Wed', '08:00:00', '12:25:00', 11),
(74, 'Thu', '07:50:00', '17:30:00', 11),
(75, 'Fri', '08:00:00', '11:35:00', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `ID_historico` int NOT NULL AUTO_INCREMENT,
  `data_hr` datetime NOT NULL,
  `matricula` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_historico`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informa`
--

DROP TABLE IF EXISTS `informa`;
CREATE TABLE IF NOT EXISTS `informa` (
  `ID_historico` int NOT NULL,
  `ID_status` int NOT NULL,
  UNIQUE KEY `ID_historico` (`ID_historico`,`ID_status`),
  KEY `ID_status` (`ID_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `ID_status` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`ID_status`, `descricao`) VALUES
(4, 'Entrada em Atraso'),
(6, 'Presente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `ID_turma` int NOT NULL AUTO_INCREMENT,
  `descricao` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`ID_turma`, `descricao`) VALUES
(8, 'INF21'),
(9, 'ADM22'),
(11, 'INF31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nivel` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CPF` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nivel`, `CPF`, `email`, `senha`) VALUES
('operador', '03739838086', 'rubianascimento0509@gmail.com', '050505'),
('admin', '06410040016', 'emillydias2408@gmail.com', '1224');

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
