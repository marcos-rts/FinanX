-- Tabela de Tipos de Pagamento
CREATE TABLE
    bd_tipo_pagamento (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(50) NOT NULL, -- Exemplo: "Conta Bancária", "Cartão de Crédito", etc.
        descricao TEXT -- Descrição opcional do tipo
    );

-- Tabela de Métodos de Pagamento
CREATE TABLE
    bd_metodo_pagamento (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL, -- Nome do método, ex.: "Nubank", "PicPay"
        tipo_id INT NOT NULL, -- Referência para bd_tipo_pagamento
        descricao TEXT, -- Informações adicionais sobre o método
        FOREIGN KEY (tipo_id) REFERENCES bd_tipo_pagamento (id) ON DELETE CASCADE,
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