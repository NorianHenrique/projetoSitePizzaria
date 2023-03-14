-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Mar-2023 às 15:31
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pizarria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.clientes`
--

CREATE TABLE `tb_admin.clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero_rua` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cpf_cnpj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.clientes`
--

INSERT INTO `tb_admin.clientes` (`id`, `nome`, `bairro`, `rua`, `numero_rua`, `tipo`, `cpf_cnpj`) VALUES
(1, 'Norian Henrique', 'Jardim Celina', 'Rua Lavínia Pereira de Souza', '150', 'fisico', 13565);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.pizzas`
--

CREATE TABLE `tb_admin.pizzas` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.pizzas`
--

INSERT INTO `tb_admin.pizzas` (`id`, `categoria_id`, `nome`, `descricao`, `preco`, `imagem`, `slug`, `order_id`) VALUES
(1, 2, 'Pizza Chocolate Branco', 'Chocolate branco com morando com borda.', '52.00', '640e2ad43ee38.jpg', 'pizza-chocolate-branco', 1),
(2, 3, 'Pizza de Calabresa ', 'Calabresa com borda ', '50.00', '640e2e51532af.jpg', 'pizza-de-calabresa-', 2),
(3, 2, 'Pizza Quatro-Queijo', 'Pizza com quatro-queijo.', '45.00', '640e2e94e9791.jpg', 'pizza-quatro-queijo', 3),
(4, 2, 'Pizza de Brigadeiro ', 'Pizza com brigadeiro com chocolate.', '55.00', '640e2ed075012.jpg', 'pizza-de-brigadeiro-', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'Norian Henrique', 'Maximumcoop45', '6286cce4a3867.png', 'Norian Henrique', 2),
(2, 'Norian', 'admin', '627affbcb0b1a.jpg', 'Norian', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, 0, '2022-01-05'),
(2, 0, '2022-01-12'),
(3, 0, '2022-01-12'),
(4, 0, '2022-01-14'),
(5, 0, '2022-01-19'),
(6, 0, '2022-01-20'),
(7, 0, '2022-01-20'),
(8, 1270, '2022-01-20'),
(9, 0, '2022-01-21'),
(10, 0, '2022-01-23'),
(11, 0, '2022-01-27'),
(12, 0, '2022-02-10'),
(13, 0, '2022-02-22'),
(14, 0, '2022-02-22'),
(15, 0, '2022-02-27'),
(16, 0, '2022-03-01'),
(17, 0, '2022-03-10'),
(18, 0, '2022-03-11'),
(19, 1270, '2022-03-17'),
(20, 0, '2022-03-21'),
(21, 1270, '2022-03-28'),
(22, 0, '2022-03-28'),
(23, 0, '2022-03-29'),
(24, 0, '2022-04-04'),
(25, 0, '2022-04-11'),
(26, 0, '2022-04-20'),
(27, 0, '2022-04-20'),
(28, 0, '2022-04-20'),
(29, 0, '2022-04-20'),
(30, 1270, '2022-04-24'),
(31, 0, '2022-04-28'),
(32, 0, '2022-05-05'),
(33, 0, '2022-05-12'),
(34, 0, '2022-05-22'),
(35, 0, '2022-06-02'),
(36, 0, '2022-06-09'),
(37, 0, '2022-06-11'),
(38, 0, '2022-06-13'),
(39, 0, '2022-06-19'),
(40, 0, '2022-07-01'),
(41, 0, '2022-07-13'),
(42, 0, '2022-07-14'),
(43, 1270, '2022-07-23'),
(44, 0, '2022-07-30'),
(45, 0, '2022-08-06'),
(46, 0, '2022-08-08'),
(47, 0, '2022-08-09'),
(48, 0, '2023-03-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.categoria`
--

CREATE TABLE `tb_site.categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.categoria`
--

INSERT INTO `tb_site.categoria` (`id`, `nome`, `slug`, `order_id`) VALUES
(2, 'Pizza Doce ', 'pizza-doce-', 2),
(3, 'Pizza Salgada ', 'pizza-salgada-', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL,
  `icone4` varchar(255) NOT NULL,
  `descricao4` text NOT NULL,
  `icone5` varchar(255) NOT NULL,
  `descricao5` text NOT NULL,
  `icone6` varchar(255) NOT NULL,
  `descricao6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`, `icone4`, `descricao4`, `icone5`, `descricao5`, `icone6`, `descricao6`) VALUES
('Pizzaria - Site Online', 'fa-solid fa-utensils', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-pizza-slice', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-user-plus', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-house', 'Lorem ipsum dolor sit amet, consectetur adipiscing..', 'fa-solid fa-fire', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-star', 'Lorem ipsum dolor sit amet, consectetur adipiscing...'),
('Pizzaria - Site Online', 'fa-solid fa-utensils', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-pizza-slice', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-user-plus', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-house', 'Lorem ipsum dolor sit amet, consectetur adipiscing..', 'fa-solid fa-fire', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-star', 'Lorem ipsum dolor sit amet, consectetur adipiscing...'),
('Pizzaria - Site Online', 'fa-solid fa-utensils', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-pizza-slice', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-user-plus', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-house', 'Lorem ipsum dolor sit amet, consectetur adipiscing..', 'fa-solid fa-fire', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-star', 'Lorem ipsum dolor sit amet, consectetur adipiscing...'),
('Pizzaria - Site Online', 'fa-solid fa-utensils', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-pizza-slice', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-user-plus', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-house', 'Lorem ipsum dolor sit amet, consectetur adipiscing..', 'fa-solid fa-fire', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-star', 'Lorem ipsum dolor sit amet, consectetur adipiscing...'),
('Pizzaria - Site Online', 'fa-solid fa-utensils', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-pizza-slice', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-user-plus', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-house', 'Lorem ipsum dolor sit amet, consectetur adipiscing..', 'fa-solid fa-fire', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'fa-solid fa-star', 'Lorem ipsum dolor sit amet, consectetur adipiscing...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `foto`, `order_id`) VALUES
(1, 'Norian Henrique', 'Meu Depoimento para a Pizzaria 1', '640e32fe7fb24.jpg', 1),
(2, 'Guilherme C Grillo', 'Depoimento 2', '640e33197e2e7.jpg', 2),
(3, 'Danki Code', 'Meu depoimento 3', '640e33344291d.png', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.pizzas`
--
ALTER TABLE `tb_admin.pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.categoria`
--
ALTER TABLE `tb_site.categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT de tabela `tb_admin.pizzas`
--
ALTER TABLE `tb_admin.pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tb_site.categoria`
--
ALTER TABLE `tb_site.categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
