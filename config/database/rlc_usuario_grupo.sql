CREATE TABLE rlc_usuario_grupo (
    usuario_id INT, -- Relaciona com a tabela de usuários
    grupo_id INT, -- Relaciona com a tabela de grupos
    PRIMARY KEY (usuario_id, grupo_id) -- Define a chave primária composta
);
