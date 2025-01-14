-- Tabela de Transferências
CREATE TABLE
    sis_transferencia (
        id INT AUTO_INCREMENT PRIMARY KEY,
        conta_origem_id INT NOT NULL, -- Conta de origem da transferência
        conta_destino_id INT NOT NULL, -- Conta de destino da transferência
        valor DECIMAL(10, 2) NOT NULL, -- Valor da transferência
        descricao TEXT, -- Descrição opcional da transferência
        evento_id INT, -- Evento atrelado à transferência, se houver
        categoria_subcategoria_id INT, -- Subcategoria atrelada à transferência, se houver
        data_transferencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data da transferência
        -- Bloco padrão
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data da Criação
        criado_por INT, -- Usuário que criou
        editado_em TIMESTAMP NULL DEFAULT NULL, -- Data da edição
        editado_por INT, -- Usuário que editou
        excluido_em TIMESTAMP NULL DEFAULT NULL, -- Data da exclusão
        excluido_por INT, -- Usuário que excluiu
        ativado_em TIMESTAMP NULL DEFAULT NULL, -- Data da ativação
        ativado_por INT, -- Usuário que ativou
        inativado_em TIMESTAMP NULL DEFAULT NULL, -- Data da inativação
        inativado_por INT, -- Usuário que inativou
        ativo BOOLEAN DEFAULT 1, -- Status do registro
        excluido BOOLEAN DEFAULT 1, -- Status do registro
        -- Relacionamentos
        FOREIGN KEY (conta_origem_id) REFERENCES bd_conta (id), -- Chave estrangeira para Conta de Origem
        FOREIGN KEY (conta_destino_id) REFERENCES bd_conta (id), -- Chave estrangeira para Conta de Destino
        FOREIGN KEY (evento_id) REFERENCES bd_eventos (id), -- Chave estrangeira para Eventos
        FOREIGN KEY (categoria_subcategoria_id) REFERENCES rlc_categoria_subcategoria (id)  -- Chave estrangeira para Subcategorias
    );