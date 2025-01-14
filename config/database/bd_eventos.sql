-- Tabela de Eventos
CREATE TABLE
    bd_eventos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT,
        data_inicio DATE,
        data_fim DATE,
        -- Bloco padrão 
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data da Criação
        criado_por INT, -- Usuario que criou
        editado_em TIMESTAMP NULL DEFAULT NULL, -- Data da edição
        editado_por INT, -- Usuario que editou
        excluido_em TIMESTAMP NULL DEFAULT NULL, -- Data da exclusão
        excluido_por INT, -- Usuario que excluiu
        ativado_em TIMESTAMP NULL DEFAULT NULL, -- Data da ativação
        ativado_por INT, -- Usuario que ativou
        inativado_em TIMESTAMP NULL DEFAULT NULL, -- Data da inativação
        inativado_por INT, -- Usuario que inativou
        ativo BOOLEAN DEFAULT 1, -- Status do registro
        excluido BOOLEAN DEFAULT 1 -- Status do registro
    );