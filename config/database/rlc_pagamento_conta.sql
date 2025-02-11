-- Relacionamento Pagamento-Conta
CREATE TABLE
    rlc_pagamento_conta (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        conta_id INT NOT NULL,
        tipo_pagamento_id INT NOT NULL,
        usuario_id INT -- Vincular conta e método ao usuário
    );