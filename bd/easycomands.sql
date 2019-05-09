-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2019 às 01:03
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easycomands`
--
CREATE DATABASE IF NOT EXISTS `easycomands` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `easycomands`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(3) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `setores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `setores_id`) VALUES
(1, 'rodizio', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(3) NOT NULL,
  `numero` int(3) NOT NULL,
  `preferencia` bit(1) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `numero`, `preferencia`, `status`) VALUES
(2, 1, b'0', 0),
(3, 2, b'0', 1),
(5, 4, b'0', 3),
(8, 8, b'0', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` tinyint(3) NOT NULL,
  `mesa` tinyint(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `mesa`, `data`, `hora`) VALUES
(1, 1, '2019-04-24', '20:02:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_has_produtos`
--

CREATE TABLE `pedidos_has_produtos` (
  `pedidos_id` tinyint(3) NOT NULL,
  `produtos_id` tinyint(3) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` tinyint(3) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `categoria_produtos_id` tinyint(3) NOT NULL,
  `preco` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria_produtos_id`, `preco`) VALUES
(1, 'Pizza doce', 1, 30),
(2, 'Copa', 1, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `nome`) VALUES
(1, 'cozinha'),
(2, 'Copa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nivel_de_permissao`, `senha`, `email`, `setores_id`) VALUES
(1, 'Joao', 1, '123456', 'joao@email.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_produtos_setores1_idx` (`setores_id`);

--
-- Indexes for table `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_mesa_idx` (`mesa`),
  ADD KEY `fk_pedidos_mesa_idx` (`mesa`);

--
-- Indexes for table `pedidos_has_produtos`
--
ALTER TABLE `pedidos_has_produtos`
  ADD PRIMARY KEY (`pedidos_id`,`produtos_id`),
  ADD KEY `fk_pedidos_has_produtos_produtos1_idx` (`produtos_id`),
  ADD KEY `fk_pedidos_has_produtos_pedidos1_idx` (`pedidos_id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_categoria_produtos_idx` (`categoria_produtos_id`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionarios_setores1_idx` (`setores_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categoria_produtos_setores1` FOREIGN KEY (`setores_id`) REFERENCES `setores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_mesa_id` FOREIGN KEY (`mesa`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos_has_produtos`
--
ALTER TABLE `pedidos_has_produtos`
  ADD CONSTRAINT `fk_pedidos_has_produtos_pedidos1` FOREIGN KEY (`pedidos_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_has_produtos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categoria_produtos` FOREIGN KEY (`categoria_produtos_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_funcionarios_setores1` FOREIGN KEY (`setores_id`) REFERENCES `setores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
