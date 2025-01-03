-- Tabela de Notificações
CREATE TABLE
    bd_notificacoes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        transacao_id INT NOT NULL,
        mensagem VARCHAR(255),
        data_lembrete DATE,
        enviada BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (transacao_id) REFERENCES sis_transacao (id),
        -- Bloco padrão 
        criado_em TIMESTAMP, -- Data da Criação
        criado_por INT, -- Usuario que criou
        editado_em TIMESTAMP, -- Data da edição
        editado_por INT, -- Usuario que editou
        excluido_em TIMESTAMP, -- Data da exclusão
        excluido_por INT, -- Usuario que excluiu
        ativado_em TIMESTAMP, -- Data da ativação
        ativado_por INT, -- Usuario que ativou
        inativado_em TIMESTAMP, -- Data da inativação
        inativado_por INT, -- Usuario que inativou
        ativo BOOLEAN DEFAULT 1 -- Status do registro
        excluido BOOLEAN DEFAULT 1 -- Status do registro
    );