-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2022 às 18:33
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_v0068`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_artigo`
--

CREATE TABLE `t_artigo` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `subcat` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `estado` int(11) NOT NULL,
  `foto1` varchar(50) NOT NULL,
  `foto2` varchar(50) NOT NULL,
  `foto3` varchar(50) NOT NULL,
  `vendido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_artigo`
--

INSERT INTO `t_artigo` (`id`, `id_user`, `cat`, `subcat`, `titulo`, `descricao`, `preco`, `estado`, `foto1`, `foto2`, `foto3`, `vendido`) VALUES
(1, 1, 1, 1, 'artigo1', 'descricao 1', 1, 1, '1.png', '', '', 0),
(2, 1, 2, 2, 'artigo2', 'descricao 2', 1, 1, '2.png', '', '', 0),
(3, 1, 3, 8, 'artigo 3', 'descricao 3', 2, 1, '3.png', '', '', 0),
(4, 1, 3, 8, 'artigo 4', 'descricao 4', 12, 1, '4.png', '', '', 0),
(5, 6, 1, 1, 'artigo 5', 'descricao 5', 453, 1, '3.png', '', '', 0),
(6, 6, 1, 6, 'artigo 6', 'descricao 6', 435234, 1, '1.png', '', '', 0),
(7, 6, 1, 6, 'Titulo1', 'Descricao 12', 123, 4, '3.png', '', '', 0),
(8, 6, 1, 1, 'asd1', '345234', 234, 1, '3.png', '', '', 0),
(9, 6, 1, 6, 'zxc1', '3456', 5463, 1, '3.png', '', '', 0),
(10, 6, 1, 1, 'zxc2', 'ertwertt', 345, 1, '4.png', '', '', 0),
(11, 6, 1, 1, 'asd1', 'tryert', 2, 1, '2.png', '', '', 0),
(12, 6, 3, 4, 'qwe1', 'y5t5g3', 2, 3, '2.png', '', '', 0),
(13, 6, 3, 5, 'qwe2', 'gw545g545', 435, 1, '1.png', '2.png', '', 0),
(14, 6, 1, 6, 'qwe3', 'erfg245r4rf4', 43, 1, '1.png', '3.png', '', 6),
(15, 6, 1, 0, 'asd3', '2345r4ff24f', 44, 1, 'add.png', 'Cancel.png', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_art_comen`
--

CREATE TABLE `t_art_comen` (
  `id` int(11) NOT NULL,
  `id_artigo` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `avaliacao` varchar(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `publico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_art_comen`
--

INSERT INTO `t_art_comen` (`id`, `id_artigo`, `comentario`, `avaliacao`, `data`, `id_user`, `publico`) VALUES
(1, 4, 'wer', '2', '06:53:13pm', '8', 0),
(2, 3, '34523', '3', '06:47:39pm', '8', 1),
(3, 3, '43', '3', '06:53:13pm', '6', 0),
(4, 4, '464', '3', '06:53:40pm', '6', 0),
(5, 4, 'tyutr', '6', '07:10:47pm', '6', 1),
(6, 15, '3452345', '4', '2022-05-16 15:45:44pm', '6', 0),
(7, 15, 'está bom ', '3', '2022-05-16 15:50:05pm', '6', 0),
(8, 14, 'tertwertwe', '4', '2022-05-16 16:15:24pm', '6', 0),
(9, 14, 'os colelids', '2', '2022-05-16 16:16:43pm', '6', 0),
(10, 14, 'e cabritos tem', '2', '2022-05-16 16:17:54pm', '6', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_art_comen_v`
--

CREATE TABLE `t_art_comen_v` (
  `id` int(11) NOT NULL,
  `id_comen` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_art_comen_v`
--

INSERT INTO `t_art_comen_v` (`id`, `id_comen`, `resposta`, `data`) VALUES
(1, 6, '234r324r', '2022-05-16 16:06:25pm'),
(2, 7, 'correcto tb gosto de coentros', '2022-05-16 16:06:52pm'),
(3, 8, 'gosto muito', '2022-05-16 16:18:45pm'),
(4, 9, 'e rebites', '2022-05-16 16:19:08pm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_categorias`
--

CREATE TABLE `t_categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_categorias`
--

INSERT INTO `t_categorias` (`id`, `categoria`) VALUES
(1, 'Senhora'),
(2, 'Senhor'),
(3, 'Miudagem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_subcat`
--

CREATE TABLE `t_subcat` (
  `id` int(11) NOT NULL,
  `subcategoria` varchar(30) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_subcat`
--

INSERT INTO `t_subcat` (`id`, `subcategoria`, `categoria`) VALUES
(1, 'Atoalhados', 1),
(2, 'Tratores com frezas', 2),
(3, 'Tratores com reboque', 2),
(4, 'Carrinhos de rolamentos', 3),
(5, 'Brinquedos em lata', 3),
(6, 'Maquinas de tricutar', 1),
(7, 'Reboques de agua residuais', 2),
(8, 'Caixas para grilos', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `apagado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `t_user`
--

INSERT INTO `t_user` (`id`, `nick`, `nome`, `email`, `data_nasc`, `pass`, `foto`, `apagado`) VALUES
(6, 'sergio', 'sergio', 'sergiosilva1040775@gmail.com', '2022-04-26', '$2y$10$O2lgQK6R.6iBjB72l8dQHOmwQHFMQ23Nil5j0CNUiG1k83C9zfjue', 'IMG_20190901_163208.jpg', 0),
(8, 'miguel', 'miguel', 'sergiosilva1040775@gmail.com', '2023-06-06', '$2y$10$38lj2A55BGtTNjGBSEXeM.nSZbj2.B.V3hgavXJrh9p./h/hzaJ5O', 'IMG_20190901_163045.jpg', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `t_artigo`
--
ALTER TABLE `t_artigo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `t_art_comen`
--
ALTER TABLE `t_art_comen`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `t_art_comen_v`
--
ALTER TABLE `t_art_comen_v`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `t_subcat`
--
ALTER TABLE `t_subcat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `t_artigo`
--
ALTER TABLE `t_artigo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `t_art_comen`
--
ALTER TABLE `t_art_comen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `t_art_comen_v`
--
ALTER TABLE `t_art_comen_v`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `t_subcat`
--
ALTER TABLE `t_subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
