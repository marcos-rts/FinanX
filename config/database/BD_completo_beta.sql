SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Banco de dados: `finanx_beta`
--
CREATE DATABASE IF NOT EXISTS `finanx_beta` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `finanx_beta`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome da categoria',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mes`
--

CREATE TABLE IF NOT EXISTS `mes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL COMMENT 'Nome do mes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `totalmensal`
--

CREATE TABLE IF NOT EXISTS `totalmensal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mes` (`mes`,`ano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transacao`
--

CREATE TABLE IF NOT EXISTS `transacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(10,2) NOT NULL,
  `tipo` enum('Despesa','Receita') NOT NULL,
  `ano` int(11) NOT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `mes_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategoria_id` (`subcategoria_id`),
  KEY `mes_id` (`mes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `transacao`
--
ALTER TABLE `transacao`
  ADD CONSTRAINT `transacao_ibfk_1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `transacao_ibfk_2` FOREIGN KEY (`mes_id`) REFERENCES `mes` (`id`);
COMMIT;
