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
        data_transferencia TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);