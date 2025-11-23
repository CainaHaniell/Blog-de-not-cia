-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/08/2025 às 06:07
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog_noticias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) UNSIGNED NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `fonte` varchar(100) NOT NULL,
  `caminho_imagem` varchar(255) NOT NULL,
  `data_publicacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `categoria`, `titulo`, `subtitulo`, `conteudo`, `fonte`, `caminho_imagem`, `data_publicacao`) VALUES
(1, 'emprego', 'oiiiiiiiiii', 'iiiiiiiiiii', 'iiiiiiiiiiiiiiiiiii', 'iiiiiiiiiii', 'uploads/68a3f535c96ac_Captura de tela 2025-07-26 165149.png', '2025-08-19 00:53:25'),
(2, 'emprego', 'oiiiiiiiiii', 'iiiiiiiiiii', 'iiiiiiiiiiiiiiiiiii', 'iiiiiiiiiii', 'uploads/68a3f53a0999a_Captura de tela 2025-07-26 165149.png', '2025-08-19 00:53:30'),
(3, 'emprego', 'Bolsonaro e outros réus têm até esta quarta para apresentar alegações finais no julgamento da trama golpista', 'Bolsonaro e outros réus têm até esta quarta para apresentar alegações', 'Bolsonaro e outros réus têm até esta quarta para apresentar alegações finais no julgamento da trama golpista\r\n\r\nBolsonaro e outros réus têm até esta quarta para apresentar alegações finais no julgamento da trama golpista\r\n\r\nBolsonaro e outros réus têm até esta quarta para apresentar alegações finais no julgamento da trama golpista\r\nBolsonaro e outros réus têm até esta quarta para apresentar alegações finais no julgamento da trama golpista\r\nBolsonaro e outros réus têm até esta quarta para apresentar alegações finais no julgamento da trama golpista\r\n', 'G1', 'uploads/68a3f5ba31d3c_Captura de tela 2025-08-11 221412.png', '2025-08-19 00:55:38'),
(4, 'concurso', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, ', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Blog do Elvis', 'uploads/68a3f610d71a0_Captura de tela 2025-08-12 183726.png', '2025-08-19 00:57:04'),
(5, 'politica', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'G1 brasil', 'uploads/68a3f6297d7a1_Captura de tela 2025-08-11 110945.png', '2025-08-19 00:57:29'),
(6, 'brasil', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Brasil Floresta', 'uploads/68a3f648b8e28_Captura de tela 2025-08-11 213112.png', '2025-08-19 00:58:00'),
(7, 'brasil', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Relatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados\r\n\r\nRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliadosRelatório de direitos humanos do governo Trump não poupa críticas a opositores, mas \'pega leve\' com aliados', 'Floresta em Destaque ', 'uploads/68a3f67d4379f_Fundo-verde.png', '2025-08-19 00:58:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
