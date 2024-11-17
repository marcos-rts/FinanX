CREATE TABLE Subcategoria ( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    nome VARCHAR(255) NOT NULL, 
    categoria_id INT, FOREIGN KEY (categoria_id) REFERENCES Categoria(id) 
);