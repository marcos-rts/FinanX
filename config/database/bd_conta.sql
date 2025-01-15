-- Tabela de Contas
CREATE TABLE
    bd_conta (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        valor DECIMAL(10, 2) NOT NULL,
        descricao TEXT
    );