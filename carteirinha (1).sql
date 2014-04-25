-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 25-Abr-2014 às 21:14
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `carteirinha`
--
CREATE DATABASE IF NOT EXISTS `carteirinha` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `carteirinha`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_error`
--

CREATE TABLE IF NOT EXISTS `crt_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_error` varchar(15) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `crt_error`
--

INSERT INTO `crt_error` (`id`, `cod_error`, `descricao`) VALUES
(1, 'L001', 'Não é permitida a inclusão de Universitário sem a emissão de plástico.'),
(2, 'L002', 'Número do CPF inválido ou não informado para vínculo 0, 2, 3, 4.'),
(3, 'L003', 'Código da Matrícula não informado.'),
(4, 'L004', 'Reemissão de cartão não solicitada no banco.'),
(5, 'L005', 'Solicitação de inclusão para universitário existente.'),
(6, 'L006', 'Solicitação de alteração para universitário inexistente.'),
(7, 'L007', 'Solicitação de cancelamento para universitário inexistente.'),
(8, 'L008', 'Inclusão de universitário duplicada na mesma remessa ou mesmo dia.'),
(9, 'L009', 'Reemissão de cartão vinculado à conta corrente, duplicada na mesma remessa ou no mesmo dia.'),
(10, 'L010', 'Em processamento financeiro dentro do Banco. Aguardar próximo dia útil para efetuar a operação.'),
(11, 'D002', 'Função do movimento diferente de ''I'', ''A'' ou ''C''.'),
(12, 'D003', 'Tipo de emissão diferente de ''N'' ou ''E''.'),
(13, 'D004', 'Tipo de embossamento inválido (diferente de A, B ou C) ou não informado.'),
(14, 'D005', 'Nome do universitário não informado.'),
(15, 'D008', 'Data de nascimento inválida ou não informada.'),
(16, 'D009', 'Código da nacionalidade inválida ou não informada.'),
(17, 'D010', 'Código do sexo diferente de ''M'' e ''F''.'),
(18, 'D012', 'Logradouro não informado.'),
(19, 'D013', 'Número do logradouro não informado.'),
(20, 'D014', 'Bairro do logradouro não informado.'),
(21, 'D015', 'Município do logradouro não informado.'),
(22, 'D016', 'U.F. do logradouro não informada.'),
(23, 'D017', 'CEP do logradouro inválido ou não informado.'),
(24, 'D018', 'País não informado.'),
(25, 'D019', 'Tipo do vínculo com a IES inválido ou não informado.'),
(26, 'D020', 'Código de barras inválido ou não informado.'),
(27, 'D023', 'Solicitação negada, não existe recepção da foto.'),
(28, 'D025', 'Número do CNPJ inválido ou não informado no CHIP01.'),
(29, 'D026', 'Código da filial inválido ou não informado no CHIP01.'),
(30, 'D027', 'Código de barras inválido ou não informado no CHIP01.'),
(31, 'D028', 'Código da matrícula inválido ou não informado no CHIP01.'),
(32, 'D029', 'Nome do universitário inválido ou não informado no CHIP01.'),
(33, 'D031', 'Nome do universitário com caracteres inválidos.'),
(34, 'D032', 'Campos alfanuméricos obrigatórios com caracteres inválidos.'),
(35, 'D033', 'Parâmetros administrativos não cadastrados para este CNPJ/ Filial/ Vínculo/ Tipo Cartão'),
(36, 'D034', 'Código de estação dos parâmetros administrativos difere do cadastrado no Home Banking');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_erro_retorno`
--

CREATE TABLE IF NOT EXISTS `crt_erro_retorno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(15) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cod_barra` varchar(14) NOT NULL,
  `n_seg_remessa` int(11) NOT NULL,
  `cod_error` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_historico`
--

CREATE TABLE IF NOT EXISTS `crt_historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_seg_remessa` int(11) NOT NULL,
  `total_enviado` int(11) NOT NULL,
  `total_validos` int(11) NOT NULL,
  `total_error` int(11) NOT NULL,
  `data_envio` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_options`
--

CREATE TABLE IF NOT EXISTS `crt_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) NOT NULL,
  `optiion_value` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_remessa`
--

CREATE TABLE IF NOT EXISTS `crt_remessa` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `data_exp_rg` varchar(8) DEFAULT NULL,
  `org_exp_rg` varchar(6) NOT NULL,
  `uf_exp_rg` varchar(2) NOT NULL,
  `data_nasc` varchar(8) NOT NULL,
  `nascionalidade` varchar(1) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `est_civil` varchar(1) NOT NULL,
  `tipo_telefone` varchar(1) NOT NULL,
  `n_ddd` varchar(4) NOT NULL,
  `n_telefone` varchar(8) NOT NULL,
  `n_ramal` varchar(5) NOT NULL,
  `n_celular` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `n_logradouro` varchar(6) NOT NULL,
  `comp_log` varchar(15) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `cod_barras` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_status`
--

CREATE TABLE IF NOT EXISTS `crt_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(15) NOT NULL,
  `nome` text NOT NULL,
  `situacao_cart` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(0, 'admin', '202cb962ac5', ''),
(0, 'maru', '202cb962ac59075b964b07152d234b70', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
