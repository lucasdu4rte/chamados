-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2017 às 05:11
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(11) NOT NULL,
  `id_responsavel` int(11) DEFAULT NULL,
  `id_solicitante` int(11) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `ramal` varchar(8) DEFAULT NULL,
  `data_inc` date DEFAULT NULL,
  `data_alt` date DEFAULT NULL,
  `data_prazo` date DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `observacao` varchar(400) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_priori` int(11) NOT NULL COMMENT 'Prioridade do chamado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`id`, `id_responsavel`, `id_solicitante`, `telefone`, `ramal`, `data_inc`, `data_alt`, `data_prazo`, `descricao`, `observacao`, `id_status`, `id_tipo`, `id_priori`) VALUES
(2, 1, 1, '19499911', '2131', '2017-06-01', NULL, '2017-06-05', 'iasudihuahsd', 'asduahsiudauhsd', 1, 1, 1),
(3, 2, 1, NULL, NULL, '2017-05-31', NULL, '2017-06-12', 'Skype nÃ£o conecta', 'Skype nÃ£o conecta, mas internet estÃ¡ normal...', 1, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`id`, `descricao`) VALUES
(1, 'TI'),
(2, 'Compras'),
(3, 'Financeiro'),
(4, 'Recursos Humanos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data_nasc` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(40) NOT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `ramal` varchar(50) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT 's',
  `cargo` varchar(250) NOT NULL,
  `id_nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `data_nasc`, `email`, `senha`, `telefone`, `celular`, `ramal`, `id_departamento`, `status`, `cargo`, `id_nivel`) VALUES
(1, 'Lucas', '11/12/1995', 'lucas@email.com', 'asdauisdui', '19 33778032', 'asdaushduahsd', '8033', 1, 's', 'analista', 1),
(2, 'Daniel', '28/11/1995', 'daniel@email.com', '', '19 33778032', NULL, '8034', 1, 's', '', 1),
(3, 'FuncioTeste', '11/12/1995', 'FuncioTeste@gmail.com', '', '(19) 3333333', '(19) 99999-9999', '3333', 1, 's', '', 1),
(4, 'Hiago', '11/12/1995', 'hia@gmailc.om', '123456', '99 9999 999922', '99999999999', '2999', 2, 's', 'Auxiliar', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `data_inc` date NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_chamado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `descricao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `descricao`) VALUES
(1, 'admin'),
(4, 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridade`
--

CREATE TABLE `prioridade` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `tempo_limite` int(3) DEFAULT NULL COMMENT 'Tempo limite (dias)'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prioridade`
--

INSERT INTO `prioridade` (`id`, `descricao`, `tempo_limite`) VALUES
(1, 'Normal', 0),
(2, 'Urgente', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_chamado`
--

CREATE TABLE `status_chamado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_chamado`
--

INSERT INTO `status_chamado` (`id`, `descricao`) VALUES
(1, 'Aberto'),
(2, 'Em atendimento'),
(3, 'Pendente'),
(4, 'ConcluÃ­do'),
(5, 'Resolvido'),
(6, 'Encerrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `descricao`) VALUES
(1, 'Hardware'),
(2, 'Software'),
(3, 'Rede'),
(4, 'Impressora'),
(5, 'Internet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_status_chamado` (`id_status`),
  ADD KEY `fk_id_tipo` (`id_tipo`),
  ADD KEY `fk_id_solicitante` (`id_solicitante`),
  ADD KEY `fk_id_responsavel` (`id_responsavel`),
  ADD KEY `fk_id_priori` (`id_priori`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_departamento` (`id_departamento`),
  ADD KEY `id_nivel` (`id_nivel`),
  ADD KEY `id_nivel_2` (`id_nivel`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_chamado` (`id_chamado`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prioridade`
--
ALTER TABLE `prioridade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_chamado`
--
ALTER TABLE `status_chamado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prioridade`
--
ALTER TABLE `prioridade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_chamado`
--
ALTER TABLE `status_chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chamado`
--
ALTER TABLE `chamado`
  ADD CONSTRAINT `fk_id_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_id_solicitante` FOREIGN KEY (`id_solicitante`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `fk_id_status_chamado` FOREIGN KEY (`id_status`) REFERENCES `status_chamado` (`id`),
  ADD CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
