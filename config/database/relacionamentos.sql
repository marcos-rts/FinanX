-- Relacionamento Categoria-Subcategoria
CREATE TABLE
    rlc_categoria_subcategoria (
        id INT AUTO_INCREMENT PRIMARY KEY,
        categoria_id INT NOT NULL,
        subcategoria_id INT NOT NULL,
        FOREIGN KEY (categoria_id) REFERENCES bd_categoria (id),
        FOREIGN KEY (subcategoria_id) REFERENCES bd_subcategoria (id),
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

-- Relacionamento Pagamento-Conta
CREATE TABLE
    rlc_pagamento_conta (
        id INT AUTO_INCREMENT PRIMARY KEY,
        conta_id INT NOT NULL,
        metodo_pagamento_id INT NOT NULL,
        usuario_id INT, -- Vincular conta e método ao usuário
        FOREIGN KEY (conta_id) REFERENCES bd_conta (id),
        FOREIGN KEY (metodo_pagamento_id) REFERENCES bd_metodo_pagamento (id),
        FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id) ON DELETE CASCADE,
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