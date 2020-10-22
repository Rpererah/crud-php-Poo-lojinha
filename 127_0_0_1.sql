-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Out-2020 às 21:59
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formulario`
--
CREATE DATABASE IF NOT EXISTS `formulario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `formulario`;
--
-- Banco de dados: `lojinha`
--
CREATE DATABASE IF NOT EXISTS `lojinha` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lojinha`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_produto` (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `preco` float(5,2) NOT NULL,
  `precoColetivo` float(5,2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `quantidadeColetivo` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `preco`, `precoColetivo`, `foto`, `quantidadeColetivo`) VALUES
(6, 'ype', 11.00, 9.40, NULL, 0),
(7, 'camiseta', 11.00, 10.00, NULL, 7),
(8, 'blusa', 7.00, 5.00, NULL, 2),
(9, 'ype', 10.50, 11.00, NULL, 10),
(10, 'suco', 1.00, 0.50, NULL, 10),
(11, 'camiseta B', 29.90, 28.00, '', 10),
(12, 'camiseta B', 29.90, 28.00, '', 10),
(13, 'Ype', 10.50, 9.40, '', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `adm_usuario` char(1) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `adm_usuario`, `nome`, `email`, `senha`, `foto`) VALUES
(4, NULL, 'ype', 'teste@tes.com', '12345678', ''),
(3, NULL, 'Rafael Pereira de Oliveira', 'Rpererah@gmail.com', '123456', ''),
(5, NULL, 'Rafael Pereira de Oliveira', 'Rpererah123@gmail.com', '76529d269aa3c928e70ab05acf3f24a0', 'Mega_man_4500x3000.jpg'),
(6, NULL, 'testinho', 'teste@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Grand_Theft_Auto_GTA_5_Vector_Graphics_Games_2520x1417.jpg'),
(7, NULL, 'figurinha', 'fig@gmail.com', '25d55ad283aa400af464c76d713c07ad', ''),
(8, NULL, 'simples', 'simples@gmail.com', '25d55ad283aa400af464c76d713c07ad', ''),
(9, NULL, 'aprendi', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(10, NULL, 'cdf', 'cdf@gmail.com', '0117c830058d9adffb859f1b167d4acc', '');
--
-- Banco de dados: `rifa`
--
CREATE DATABASE IF NOT EXISTS `rifa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rifa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `t24497_rifa`
--

DROP TABLE IF EXISTS `t24497_rifa`;
CREATE TABLE IF NOT EXISTS `t24497_rifa` (
  `id_rifa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_rifa` varchar(255) DEFAULT NULL,
  `foto_rifa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rifa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t24497_rifa`
--

INSERT INTO `t24497_rifa` (`id_rifa`, `nome_rifa`, `foto_rifa`) VALUES
(1, 'rifa da lente', 'https://images.pexels.com/photos/5425971/pexels-photo-5425971.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'),
(2, 'rifa da lente', 'google.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t24497_sorteio`
--

DROP TABLE IF EXISTS `t24497_sorteio`;
CREATE TABLE IF NOT EXISTS `t24497_sorteio` (
  `id_usuario` varchar(36) DEFAULT NULL,
  `id_rifa` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_rifa` (`id_rifa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `t24497_usuario`
--

DROP TABLE IF EXISTS `t24497_usuario`;
CREATE TABLE IF NOT EXISTS `t24497_usuario` (
  `id_usuario` varchar(36) NOT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `email_usuario` varchar(255) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `adm_usuario` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t24497_usuario`
--

INSERT INTO `t24497_usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `adm_usuario`) VALUES
('4efae369-aee3-4a52-b8ab-8a713c12e4d2', 'felipe@gmail.com', '1111111111111111', 'felipe', 0),
('dbd885d3-dc28-47d3-919b-cfe917d60760', 'undefined', 'undefined', 'undefined', 0),
('4f6edd3c-9e8d-4260-b1b2-32bb2b0d7be1', 'rafa', '1', 'rafa', 0),
('a62b385b-3d94-43d3-94bd-d3dda18e0862', 'rafa', '1234', 'rafa', 0),
('b0aa9a20-8b55-4ab5-8526-fcff8adce70b', 'rpererah@gmail.com', '212896', 'rafael pereira', 0),
('5f99af33-b841-4777-ac5c-e54301b0f25f', 'rafael pereira', 'rpererah@gmail.com', '212896', 0);
--
-- Banco de dados: `t24497_rifa`
--
CREATE DATABASE IF NOT EXISTS `t24497_rifa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `t24497_rifa`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
