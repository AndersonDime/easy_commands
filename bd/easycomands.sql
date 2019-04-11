-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/04/2019 às 03:09
-- Versão do servidor: 5.7.11-log
-- Versão do PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `easycomands`
--

-- -----------------------------------------------------
-- Schema easycomands
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `easycomands` DEFAULT CHARACTER SET utf8 ;
USE `easycomands` ;
-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(3) NOT NULL,
  `nome_categoria` varchar(10) NOT NULL,
  `setores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome_categoria`, `setores_id`) VALUES
(1, 'Bebidas', 1),
(2, 'Comida', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` tinyint(3) NOT NULL,
  `mesa` int(10) NOT NULL,
  `data` date NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos_has_produtos`
--

CREATE TABLE `pedidos_has_produtos` (
  `pedidos_id` tinyint(3) NOT NULL,
  `produtos_id` tinyint(3) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` tinyint(3) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `categoria_produtos_id` tinyint(3) NOT NULL,
  `preco` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria_produtos_id`, `preco`) VALUES
(1, 'coca', 1, '3.50'),
(2, 'cebola', 2, '1.50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `setores`
--

CREATE TABLE `setores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `setores`
--

INSERT INTO `setores` (`id`, `nome`) VALUES
(1, 'Copa'),
(2, 'Cozinha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `nivel_de_permissao` int(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `setores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nivel_de_permissao`, `senha`, `email`, `setores_id`) VALUES
(1, 'victor', 1, '012345', 'victor@victor.com', 2);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_produtos_setores1_idx` (`setores_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos_has_produtos`
--
ALTER TABLE `pedidos_has_produtos`
  ADD PRIMARY KEY (`pedidos_id`,`produtos_id`),
  ADD KEY `fk_pedidos_has_produtos_produtos1_idx` (`produtos_id`),
  ADD KEY `fk_pedidos_has_produtos_pedidos1_idx` (`pedidos_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_categoria_produtos_idx` (`categoria_produtos_id`);

--
-- Índices de tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionarios_setores1_idx` (`setores_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categoria_produtos_setores1` FOREIGN KEY (`setores_id`) REFERENCES `setores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedidos_has_produtos`
--
ALTER TABLE `pedidos_has_produtos`
  ADD CONSTRAINT `fk_pedidos_has_produtos_pedidos1` FOREIGN KEY (`pedidos_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_has_produtos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categoria_produtos` FOREIGN KEY (`categoria_produtos_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_funcionarios_setores1` FOREIGN KEY (`setores_id`) REFERENCES `setores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
