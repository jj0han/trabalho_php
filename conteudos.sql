-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2022 às 15:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `conteudos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_conteudos`
--

CREATE TABLE `tb_conteudos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `diretor` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `URLimagem` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_conteudos`
--

INSERT INTO `tb_conteudos` (`codigo`, `titulo`, `descricao`, `diretor`, `data`, `URLimagem`, `categoria`) VALUES
(1, 'The Witcher', 'foda', 'Alguém aí', '2019-12-03', 'https://br.web.img3.acsta.net/pictures/19/11/29/17/57/5161763.jpg', 'Ação'),
(3, 'Star Trek', 'viajem no espaço blablabla', 'Spok da Silva', '1970-06-18', 'http://4.bp.blogspot.com/--fcJNB1K9SE/Vliy0y1cw1I/AAAAAAAADTI/_IwvgpoHY9Y/s1600/1.jpg', 'Ficção Científica'),
(4, 'The Boys', 'Super Pessoas malvadas', 'Amazon dos Santos', '2022-12-08', 'https://s2.glbimg.com/e-Onx3L8q79OktYj3sUx4WrRIDM=/e.glbimg.com/og/ed/f/original/2020/08/04/butcher-_clean.jpg', 'Ação');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_conteudos`
--
ALTER TABLE `tb_conteudos`
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_conteudos`
--
ALTER TABLE `tb_conteudos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
