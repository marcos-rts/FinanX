-- Tabela de Categorias
CREATE TABLE
    bd_categoria (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT
    );