CREATE TABLE Transacao ( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    -- descricao VARCHAR(255), 
    valor DECIMAL(10, 2) NOT NULL, 
    -- data DATE NOT NULL, 
    tipo ENUM('Despesa', 'Receita') NOT NULL, 
    -- mes INT NOT NULL, -- Mês da transação (1 a 12) 
    ano INT NOT NULL, -- Ano da transação 
    subcategoria_id INT, FOREIGN KEY (subcategoria_id) REFERENCES Subcategoria(id) ,
    mes_id INT, FOREIGN KEY (mes_id) REFERENCES Mes(id)
);