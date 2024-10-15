CREATE TABLE TotalMensal ( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    mes INT NOT NULL, 
    ano INT NOT NULL, 
    saldo DECIMAL(10, 2) NOT NULL, UNIQUE (mes, ano) -- Garante que não haja duplicidade de meses e anos 
);