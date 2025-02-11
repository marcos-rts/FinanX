-- Tabela de Subcategorias
CREATE TABLE
    bd_subcategoria (
        id INT AUTO_INCREMENT PRIMARY KEY,
        categoria_id INT NOT NULL, -- Chave estrangeira para Categoria
        nome VARCHAR(100) NOT NULL,
        descricao TEXT

    );