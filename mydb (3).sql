-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2023 às 07:21
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `infracao`
--

CREATE TABLE `infracao` (
  `idinfracao` int(11) NOT NULL,
  `nomeinfr` varchar(45) NOT NULL,
  `custo` float NOT NULL,
  `data` date NOT NULL,
  `placa` varchar(45) NOT NULL,
  `AnoCar` float NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Marca_idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `infracao`
--

INSERT INTO `infracao` (`idinfracao`, `nomeinfr`, `custo`, `data`, `placa`, `AnoCar`, `Usuario_idUsuario`, `Marca_idMarca`) VALUES
(1, 'batida', 200, '2023-05-07', 'dqeq', 2001, 9, 1),
(2, 'eduardo', 2231, '2023-05-16', '3123', 132213, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `NomeMarca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idMarca`, `NomeMarca`) VALUES
(1, 'fiat');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `idModelo` int(11) NOT NULL,
  `NomeModelo` varchar(45) NOT NULL,
  `Marca_idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`idModelo`, `NomeModelo`, `Marca_idMarca`) VALUES
(1, 'uno', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `Cpf` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `cargo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nome`, `Email`, `Senha`, `Cpf`, `telefone`, `cargo`) VALUES
(9, '', 'eduardoferrari1001@gmail.com', '123', '123', '123', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `infracao`
--
ALTER TABLE `infracao`
  ADD PRIMARY KEY (`idinfracao`,`Marca_idMarca`),
  ADD KEY `fk_Infracao_Usuario_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Infracao_Marca1_idx` (`Marca_idMarca`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`idModelo`),
  ADD KEY `fk_Modelo_Marca1_idx` (`Marca_idMarca`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `infracao`
--
ALTER TABLE `infracao`
  MODIFY `idinfracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `infracao`
--
ALTER TABLE `infracao`
  ADD CONSTRAINT `fk_Infracao_Marca1` FOREIGN KEY (`Marca_idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Infracao_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `fk_Modelo_Marca1` FOREIGN KEY (`Marca_idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
