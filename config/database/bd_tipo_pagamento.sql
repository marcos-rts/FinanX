-- Tabela de Tipos de Pagamento
CREATE TABLE
    bd_tipo_pagamento (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(50) NOT NULL, -- Exemplo: "Conta Bancária", "Cartão de Crédito", etc.
        descricao TEXT -- Descrição opcional do tipo
    );