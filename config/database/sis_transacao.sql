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
        data_transferencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );