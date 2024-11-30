-- Tabela de Transações
CREATE TABLE sis_transacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10, 2) NOT NULL,
    mes INT NOT NULL,
    ano INT NOT NULL,
    tipo_id INT NOT NULL,
    categoria_subcategoria_id INT NOT NULL,
    pagamento_conta_id INT NOT NULL,
    usuario_id INT NOT NULL,
    evento_id INT, -- Opcional: Vincular transação a um evento
    status ENUM('Pendente', 'Concluída', 'Cancelada') DEFAULT 'Concluída',
    FOREIGN KEY (tipo_id) REFERENCES bd_tipo(id),
    FOREIGN KEY (categoria_subcategoria_id) REFERENCES rlc_categoria_subcategoria(id),
    FOREIGN KEY (pagamento_conta_id) REFERENCES rlc_pagamento_conta(id),
    FOREIGN KEY (usuario_id) REFERENCES bd_usuario(id),
    FOREIGN KEY (evento_id) REFERENCES bd_eventos(id)
);