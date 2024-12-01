CREATE DATABASE IF NOT EXISTS `finanx` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `finanx`;

-- Tabela de Usuários
CREATE TABLE bd_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    senha_hash VARCHAR(255) NOT NULL,
    tipo ENUM('Admin', 'Comum') DEFAULT 'Comum',
    ativo BOOLEAN DEFAULT TRUE
);

-- Tabela de Configurações dos Usuários
-- CREATE TABLE bd_usuario_config (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     usuario_id INT NOT NULL,
--     notificacoes_ativas BOOLEAN DEFAULT TRUE,
--     tema ENUM('Claro', 'Escuro') DEFAULT 'Claro',
--     idioma VARCHAR(10) DEFAULT 'pt-BR',
--     FOREIGN KEY (usuario_id) REFERENCES bd_usuario(id) ON DELETE CASCADE
-- );

-- Tabela de Categorias
CREATE TABLE bd_categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de Subcategorias
CREATE TABLE bd_subcategoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de Tipos de Transações
CREATE TABLE bd_tipo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de Contas
CREATE TABLE bd_conta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de Tipos de Pagamento
CREATE TABLE bd_tipo_pagamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL, -- Exemplo: "Conta Bancária", "Cartão de Crédito", etc.
    descricao TEXT             -- Descrição opcional do tipo
);

-- Tabela de Métodos de Pagamento
CREATE TABLE bd_metodo_pagamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,  -- Nome do método, ex.: "Nubank", "PicPay"
    tipo_id INT NOT NULL,        -- Referência para bd_tipo_pagamento
    descricao TEXT,              -- Informações adicionais sobre o método
    FOREIGN KEY (tipo_id) REFERENCES bd_tipo_pagamento(id) ON DELETE CASCADE
);


-- Relacionamento Categoria-Subcategoria
CREATE TABLE rlc_categoria_subcategoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT NOT NULL,
    subcategoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES bd_categoria(id),
    FOREIGN KEY (subcategoria_id) REFERENCES bd_subcategoria(id)
);

-- Relacionamento Pagamento-Conta
CREATE TABLE rlc_pagamento_conta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conta_id INT NOT NULL,
    metodo_pagamento_id INT NOT NULL,
    usuario_id INT, -- Vincular conta e método ao usuário
    FOREIGN KEY (conta_id) REFERENCES bd_conta(id),
    FOREIGN KEY (metodo_pagamento_id) REFERENCES bd_metodo_pagamento(id),
    FOREIGN KEY (usuario_id) REFERENCES bd_usuario(id) ON DELETE CASCADE
);

-- Tabela de Eventos
CREATE TABLE bd_eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_inicio DATE,
    data_fim DATE
);

-- Tabela de Transações
CREATE TABLE sis_transacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10, 2) NOT NULL,
    mes INT NOT NULL,
    ano INT NOT NULL,
    tipo_id INT NOT NULL,
    categoria_subcategoria_id INT NOT NULL,
    pagamento_conta_id INT,
    usuario_id INT NOT NULL,
    evento_id INT, -- Opcional: Vincular transação a um evento
    status ENUM('Pendente', 'Concluída', 'Cancelada') DEFAULT 'Concluída',
    FOREIGN KEY (tipo_id) REFERENCES bd_tipo(id),
    FOREIGN KEY (categoria_subcategoria_id) REFERENCES rlc_categoria_subcategoria(id),
    FOREIGN KEY (pagamento_conta_id) REFERENCES rlc_pagamento_conta(id),
    FOREIGN KEY (usuario_id) REFERENCES bd_usuario(id),
    FOREIGN KEY (evento_id) REFERENCES bd_eventos(id)
);

-- Tabela de Logs de Auditoria
CREATE TABLE audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tabela VARCHAR(100) NOT NULL,
    registro_id INT NOT NULL,
    acao ENUM('Criado', 'Alterado', 'Excluído') NOT NULL,
    usuario_id INT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    detalhes TEXT,
    FOREIGN KEY (usuario_id) REFERENCES bd_usuario(id)
);

-- Tabela de Notificações
CREATE TABLE bd_notificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transacao_id INT NOT NULL,
    mensagem VARCHAR(255),
    data_lembrete DATE,
    enviada BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (transacao_id) REFERENCES sis_transacao(id)
);
