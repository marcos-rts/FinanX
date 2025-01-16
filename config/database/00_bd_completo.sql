CREATE DATABASE IF NOT EXISTS `finanx` DEFAULT CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE `finanx`;

-- Tabela de Logs de Auditoria
CREATE TABLE
    audit_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tabela VARCHAR(100) NOT NULL,
        registro_id INT NOT NULL,
        acao ENUM ('Criado', 'Alterado', 'Excluído') NOT NULL,
        usuario_id INT NOT NULL,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        detalhes TEXT
    );

-- Tabela de Notificações
CREATE TABLE
    audit_notificacoes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        transacao_id INT NOT NULL,
        mensagem VARCHAR(255),
        data_lembrete DATE,
        enviada BOOLEAN DEFAULT FALSE
    );

-- Tabela de Categorias
CREATE TABLE
    bd_categoria (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT
    );

-- Tabela de Contas
CREATE TABLE
    bd_conta (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        valor DECIMAL(10, 2) NOT NULL,
        descricao TEXT
    );

-- Tabela de Eventos
CREATE TABLE
    bd_eventos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT,
        data_inicio DATE,
        data_fim DATE
    );

CREATE TABLE
    bd_grupo (
        id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único do grupo
        nome VARCHAR(100) NOT NULL, -- Nome do grupo
        descricao TEXT, -- Descrição detalhada do grupo
        tipo ENUM ('Usuários', 'Permissões', 'Categorias', 'Outros') NOT NULL -- Tipo de grupo
    );

-- Tabela de Subcategorias
CREATE TABLE
    bd_subcategoria (
        id INT AUTO_INCREMENT PRIMARY KEY,
        categoria_id INT NOT NULL, -- Chave estrangeira para Categoria
        nome VARCHAR(100) NOT NULL,
        descricao TEXT
    );

-- Tabela de Tipos de Pagamento
CREATE TABLE
    bd_tipo_pagamento (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(50) NOT NULL, -- Exemplo: "Conta Bancária", "Cartão de Crédito", etc.
        descricao TEXT -- Descrição opcional do tipo
    );

-- Tabela de Tipos de Transações
CREATE TABLE
    bd_tipo (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT
    );

-- Tabela de Usuários
CREATE TABLE
    bd_usuario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE NOT NULL,
        senha_hash VARCHAR(255) NOT NULL,
        tipo ENUM ('Admin', 'Comum') DEFAULT 'Comum'
    );

-- Relacionamento Pagamento-Conta
CREATE TABLE
    rlc_pagamento_conta (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        conta_id INT NOT NULL,
        tipo_pagamento_id INT NOT NULL,
        usuario_id INT -- Vincular conta e método ao usuário
    );

CREATE TABLE
    rlc_usuario_grupo (
        usuario_id INT, -- Relaciona com a tabela de usuários
        grupo_id INT, -- Relaciona com a tabela de grupos
        PRIMARY KEY (usuario_id, grupo_id) -- Define a chave primária composta
    );

-- Tabela de Transações
CREATE TABLE
    sis_transacao (
        id INT AUTO_INCREMENT PRIMARY KEY,
        valor DECIMAL(10, 2) NOT NULL,
        tipo_id INT NOT NULL,
        subcategoria_id INT NOT NULL,
        pagamento_conta_id INT NOT NULL,
        conta_id INT,
        usuario_id INT NOT NULL,
        evento_id INT, -- Opcional: Vincular transação a um evento
        status ENUM ('Pendente', 'Concluída', 'Cancelada') DEFAULT 'Concluída',
        data_transferencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data da transferência
    );

-- Tabela de Transferências
CREATE TABLE
    sis_transferencia (
        id INT AUTO_INCREMENT PRIMARY KEY,
        conta_origem_id INT NOT NULL, -- Conta de origem da transferência
        conta_destino_id INT NOT NULL, -- Conta de destino da transferência
        valor DECIMAL(10, 2) NOT NULL, -- Valor da transferência
        descricao TEXT, -- Descrição opcional da transferência
        evento_id INT, -- Evento atrelado à transferência, se houver
        subcategoria_id INT, -- Subcategoria atrelada à transferência, se houver
        data_transferencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data da transferência
    );

-- RELACIONAMENTOS
ALTER TABLE audit_logs ADD FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id);

ALTER TABLE audit_notificacoes ADD FOREIGN KEY (transacao_id) REFERENCES sis_transacao (id);

ALTER TABLE bd_subcategoria ADD FOREIGN KEY (categoria_id) REFERENCES bd_categoria (id);

ALTER TABLE rlc_pagamento_conta ADD FOREIGN KEY (conta_id) REFERENCES bd_conta (id),
ADD FOREIGN KEY (tipo_pagamento_id) REFERENCES bd_tipo_pagamento (id),
ADD FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id);

ALTER TABLE rlc_usuario_grupo ADD FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id),
ADD FOREIGN KEY (grupo_id) REFERENCES bd_grupo (id);

ALTER TABLE sis_transacao ADD FOREIGN KEY (tipo_id) REFERENCES bd_tipo (id),
ADD FOREIGN KEY (subcategoria_id) REFERENCES bd_subcategoria (id),
ADD FOREIGN KEY (pagamento_conta_id) REFERENCES rlc_pagamento_conta (id),
ADD FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id),
ADD FOREIGN KEY (evento_id) REFERENCES bd_eventos (id),
ADD FOREIGN KEY (conta_id) REFERENCES bd_conta (id);

ALTER TABLE sis_transferencia ADD FOREIGN KEY (conta_origem_id) REFERENCES bd_conta (id), -- Chave estrangeira para Conta de Origem
ADD FOREIGN KEY (conta_destino_id) REFERENCES bd_conta (id), -- Chave estrangeira para Conta de Destino
ADD FOREIGN KEY (evento_id) REFERENCES bd_eventos (id), -- Chave estrangeira para Eventos
ADD FOREIGN KEY (subcategoria_id) REFERENCES bd_subcategoria (id);

-- Chave estrangeira para Subcategorias
-- Inserir usuário admin geral
INSERT INTO
    bd_usuario (nome, email, senha_hash, tipo)
VALUES
    (
        'Admin Geral',
        'admin@finanx.com',
        'senha',
        -- SHA2 ('senha_admin_segura', 256),
        'Admin'
        -- TRUE,
        -- 1
    );

INSERT INTO
    bd_tipo (nome, descricao)
VALUES
    (
        'Receita', 
        'Entrada de recursos financeiros'),
    (
        'Despesa', 
        'Saída de recursos financeiros'),
    (
        'Transferencia',
        'Movimentação de recursos entre contas'
    );