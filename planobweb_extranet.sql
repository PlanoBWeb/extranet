-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 10, 2016 as 03:38 PM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `planobweb_extranet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacao`
--

CREATE TABLE `anotacao` (
  `id` int(11) NOT NULL auto_increment,
  `idcliente` tinyint(4) NOT NULL,
  `idtipo` tinyint(4) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `anotacao`
--

INSERT INTO `anotacao` (`id`, `idcliente`, `idtipo`, `titulo`, `descricao`) VALUES
(1, 5, 1, 'Anotação Teste ', 'Descrição Anotação Teste '),
(2, 5, 1, 'Anotação Teste 2', 'Descrição Anotação Teste 2'),
(3, 10, 2, 'Teste Gravar Anotacao', 'Teste Gravar Anotacao desc'),
(4, 10, 1, 'Teste Grava Anotacao 2', 'Teste Desc anotacao 2'),
(7, 10, 16, 'Teste Insert Id', 'desc'),
(9, 10, 17, 'Teste Jose ygor', 'Teste Desc'),
(10, 10, 18, 'Titulo Teste Jose ygor 2', 'desc'),
(11, 10, 19, 'Teste Igual', 'desc '),
(12, 10, 0, 'Teste Igual', 'desc '),
(13, 10, 0, 'Titulo Teste Jose ygor 3', 'desc'),
(14, 10, 0, 'Titulo Teste Jose ygor 3', 'desc'),
(15, 10, 20, 'Teste imagem', 'sadsad'),
(16, 10, 0, 'Teste Sem nada', 'Desc'),
(17, 10, 2, 'Teste Sem nada', 'Desc'),
(18, 10, 0, 'Teste Sem nada', 'Desc'),
(19, 10, 2, 'Teste Sem nada', 'Desc'),
(20, 10, 2, 'Teste Sem nada', 'Desc'),
(21, 5, 21, 'Acentos São Çaão', 'Acentos São Çaão'),
(22, 10, 18, 'Testeeee', 'Desc'),
(23, 11, 0, 'Teste Tipo José ygor', 'Descrição'),
(24, 11, 29, 'Jose ygor', 'Descrição '),
(25, 11, 0, 'teste ygor', 'testee'),
(26, 11, 0, 'Testee 99', 'Desc'),
(27, 11, 34, 'Testee 94', 'desc'),
(28, 5, 20, 'Teste 100', 'desc'),
(29, 5, 0, 'Testee 90', 'desc'),
(30, 5, 38, 'Testee 902', 'desc'),
(31, 11, 29, 'Teste Ja existe', 'desc'),
(32, 11, 39, 'Teste 903', 'desc'),
(33, 12, 40, 'Teste Ultimo ', 'Desc'),
(34, 11, 30, 'teste tipo bendito', 'desc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL auto_increment,
  `status` set('CLI','PROS','LEAD') NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `razao` varchar(250) NOT NULL,
  `site` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `mapa` varchar(500) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cep` text NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `dddtel` varchar(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `servicos` set('HM','PI','LP','LV') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `status`, `empresa`, `razao`, `site`, `cnpj`, `mapa`, `endereco`, `complemento`, `cep`, `bairro`, `cidade`, `estado`, `dddtel`, `telefone`, `servicos`) VALUES
(5, 'CLI', 'PlanobWebeeee', '', 'www.ok.com', '000.111.3333455', '', 'rua loefgreen', 'Shopping', '0', 'Santa cruz', 'São Paulo', 'sp', '022', '45198759', 'PI'),
(10, '', 'fsdfsd', '', 'dfssd', 'df435435', '', 'sdfsdf', 'ddfsdf', '0', 'sddsfsd', 'sfgvn', 'cv', '423', '32234545', 'LP'),
(11, 'PROS', 'Empresa José Ygor', '', 'http://www.planobweb.com.br', '000.111.335555', '', 'rua loefgreen', 'Shopping', '0', 'Santa cruz', 'São Paulo', 'sp', '011', '2222255', 'LP'),
(12, '', 'Testeeee ', '', 'http://www.planobweb.com.br', '000.111.333', '', 'teste', '', '0', 'Santa cruz', 'maua', 'Pi', '011', '3432434234', 'HM'),
(13, '', 'Plano', '', 'http://www.planobweb.com.br', '000.111.33302', '', 'teste', 'Shopping', '0', ';sac;sak', 'maua', 'Pi', '023', '23231231', 'HM'),
(14, '', 'Testee ''', '', 'http://www.planobweb.com.br', '51605156415', '', 'rua loefgreen', '', '0', 'falchi', 'teste', 'sp', '011', '54654156165', 'HM'),
(15, '', 'teste - sdds '' sdlsad', '', 'http://dsasda', '2344323434', '', 'rf', 'dfddf', '0', 'fsdf', 'sdf', 'sd', '033', '234443', 'HM'),
(16, 'LEAD', 'testee TIPO', '', 'www.teste.com.br', '', '', 'testeee ', 'wedd', '0', 'DF', 'maua', 'Pi', '011', '45198759', 'HM'),
(17, 'PROS', 'José ygor cep razao edita', 'José ygor cep & razao edita', 'www.teste.com.br', '', '', 'Falchi', '', '09350-250', 'falchi', 'maua', 'sp', '011', '45198759', 'LP'),
(18, 'CLI', 'Jose Ygor casa', 'José ygor cep & razao', 'http://www.teste.com.br', '506504', 'https://goo.gl/maps/sM4ZhaFZGRs', 'rua mário', '', '09350250', 'falchi', 'mauá', 'sp', '011', '988643325', 'LV');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL auto_increment,
  `idcliente` tinyint(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `emailPessoal` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `aniversario` date NOT NULL,
  `dddtel` varchar(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dddcel` varchar(3) NOT NULL,
  `celular` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `idcliente`, `nome`, `cargo`, `email`, `emailPessoal`, `skype`, `aniversario`, `dddtel`, `telefone`, `dddcel`, `celular`) VALUES
(11, 10, 'Contato F30', '', 'joseygor@planobweb.com.br', '', '', '0000-00-00', '021', '45198759', '011', '98989898'),
(13, 11, 'teste', '', 'joseygor@planobweb.com.br', '', '', '0000-00-00', '0', '', '0', ''),
(14, 11, 'Teste ', '', 'joseygor@planobweb.com.br', '', '', '0000-00-00', '011', '451987591', '011', '988643325'),
(15, 13, 'teste 2', '', 'joseygor@planobweb.com.br', '', '', '0000-00-00', '011', '451987590', '011', '988643325'),
(16, 11, 'testee', '', 'joseygor@planobweb.com.br', '', '', '0000-00-00', '011', '45198759', '011', '988643325'),
(17, 13, 'teste2', '', 'joseygorsk8@hotmail.com', '', '', '0000-00-00', '011', '45198759', '011', '988643325'),
(19, 11, 'José ygor21', 'Dono da p toda 2', 'joseygor@planobweb.com.br2', 'joseygor_sk8@hotmail.com2', 'JoseYgor.planob2', '0000-00-00', '011', '4519-8759', '011', '9886-43325'),
(32, 5, 'wewewewewewe 2', 'wewe 2', 'joseygor_sk8@hotmail.com', 'joseygor_sk8@hotmail.com', 'JoseYgor.planob', '2016-02-11', '011', '2323-2332', '023', '2323-2323'),
(33, 5, 'wewewewewe 3', 'wewewe', 'joseygor_sk8@hotmail.com', 'joseygor_sk8@hotmail.com2', 'JoseYgor.planob', '2016-02-24', '011', '1212-1212', '012', '1232-3233');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_fornecedor`
--

CREATE TABLE `contato_fornecedor` (
  `id` int(11) NOT NULL auto_increment,
  `idfornecedor` tinyint(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dddtel` varchar(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dddcel` varchar(3) NOT NULL,
  `celular` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `contato_fornecedor`
--

INSERT INTO `contato_fornecedor` (`id`, `idfornecedor`, `nome`, `email`, `dddtel`, `telefone`, `dddcel`, `celular`) VALUES
(13, 13, 'Teste Exclui ultimo', 'joseygor@planobweb.com.br', '011', '000000', '025', '6534c'),
(15, 5, 'Teste30', 'joseygor@planobweb.com.br', '324', '23324', '234', '32324342'),
(18, 14, 'eresradas', 'joseygor_sk8@hotmail.com', '021', '231231212', '022', '213213213');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL auto_increment,
  `fornecedor` varchar(100) NOT NULL,
  `site` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `dddtel` varchar(3) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `servicos` set('HM','PI','LP') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `fornecedor`, `site`, `cnpj`, `endereco`, `complemento`, `cep`, `bairro`, `cidade`, `estado`, `dddtel`, `telefone`, `servicos`) VALUES
(5, 'PlanobWebeeee- fornecedor', 'www.ok.com', '000.111.3333455', 'rua loefgreen', 'Shopping', '', 'Santa cruz', 'São Paulo', 'sp', '022', '45198759', 'PI'),
(13, 'Teste ultimo Fornecedor', 'http://www.planobweb.com.br', '000.111.333', 'rua loefgreen', 'l;lksdclsa', '', 'Santa cruz', 'São Paulo', 'sp', '321', '223121', 'LP'),
(14, 'Fornecedor José Ygor', 'www.planobweb.com.br', '09.154.545/1944-19', 'rua loefgreen', 'Shopping', '09350-250', 'Santa cruz', 'maua', 'ds', '043', '44445555', 'PI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL auto_increment,
  `idusuario` tinyint(4) NOT NULL,
  `idcliente` tinyint(4) NOT NULL,
  `tipo` set('HA','HS','HG','HP') NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idcliente` (`idcliente`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `idusuario`, `idcliente`, `tipo`, `titulo`, `descricao`, `data`) VALUES
(1, 0, 5, '', 'Teste Edita', 'desc', '2015-09-16'),
(3, 1, 11, 'HA', 'Historico 2', 'Desc teste historico', '2015-09-15'),
(10, 0, 5, '', 'Testeeeee', 'desc ', '2015-09-29'),
(13, 0, 5, '', 'dsdas', 'sdasda', '2015-09-30'),
(14, 0, 5, '', 'sdfsd', 'dfsfds', '2015-09-24'),
(15, 1, 10, '', 'Teste', 'Desc ', '2015-09-15'),
(16, 1, 11, 'HP', 'Teste Ygor', 'desc teste', '2015-10-01'),
(17, 1, 11, 'HS', 'Teste User', 'DescTeste User', '2016-02-05'),
(19, 1, 11, 'HG', 'teste ultimo ', 'desc teste ultimo ', '2016-02-12'),
(20, 1, 5, 'HS', 'Teste PLANOBWEBBB', 'DESC Teste PLANOBWEBBB', '2016-02-24'),
(21, 1, 11, 'HS', 'testeee ', 'fdfsdfdsfs', '2016-02-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL auto_increment,
  `idcliente` tinyint(4) NOT NULL,
  `idusuario` tinyint(4) NOT NULL,
  `tarefa_lembrete` set('TAR','LEM') NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `descricao` text NOT NULL,
  `lembrar` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `idcliente`, `idusuario`, `tarefa_lembrete`, `titulo`, `data_inicio`, `data_fim`, `descricao`, `lembrar`) VALUES
(1, 5, 1, 'TAR', 'Teste Tarefa Altera2', '2015-09-11', '2015-09-12', 'Descrição Teste Tarefa ID', 0),
(7, 5, 1, 'LEM', 'Anotação Teste ', '0000-00-00', '0000-00-00', '', 0),
(8, 5, 8, 'TAR', 'Teste', '0000-00-00', '0000-00-00', '', 0),
(9, 10, 1, 'TAR', 'Teste ID', '2015-09-12', '2015-09-15', 'teste', 0),
(12, 0, 1, 'TAR', 'Teste Sem cliente', '2015-09-24', '2015-09-25', 'Desc', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_anotacao`
--

CREATE TABLE `tipo_anotacao` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `tipo_anotacao`
--

INSERT INTO `tipo_anotacao` (`id`, `nome`) VALUES
(1, 'Teste 1 anotacao'),
(2, 'Teste 2 anotacao'),
(3, 'Teste 1 anotacao'),
(16, 'Teste Tipo Insert'),
(17, 'Teste Jose ygor'),
(18, 'Teste Jose ygor 2 '),
(19, 'Teste Jose ygor 2'),
(20, 'Teste Jose ygor 20'),
(21, 'Testeeee'),
(29, 'Tipo José Ygor 2'),
(30, 'Testee Tipo 99'),
(31, 'Testee Tipo 98'),
(32, 'Testee Tipo 96'),
(33, 'Testee Tipo 95'),
(34, 'Testee Tipo 94'),
(35, 'Testee Tipo 90'),
(36, 'Testee Tipo 901'),
(37, 'Testee Tipo 9011'),
(38, 'Testee Tipo 902'),
(39, 'Teste tipo 903'),
(40, 'Teste Tipo Ultimo ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` set('A','M','F','D') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `perfil`) VALUES
(1, 'Brunno Cardoso ção', 'a@a.com.br', '698dc19d489c4e4db73e28a713eab07b', 'A'),
(3, 'João da Silva 2', 'j@a.com.br', 'senha', 'F'),
(4, 'Des nome2', 'd@a.com.br', 'senha', 'D'),
(5, 'Jose ygor', 'joseygor@planobweb.com.br', '698dc19d489c4e4db73e28a713eab07b', 'A'),
(7, 'iPhone', 'b@a.com.br', 'e8d95a51f3af4a3b134bf6bb680a213a', 'A'),
(8, 'jose ', 'joseygor2@planobweb.com.br', '698dc19d489c4e4db73e28a713eab07b', 'A'),
(9, 'teste', 'asd@asd.com.br', 'e8d95a51f3af4a3b134bf6bb680a213a', 'A');
