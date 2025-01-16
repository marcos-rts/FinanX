CREATE TABLE
    bd_grupo (
        id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único do grupo
        nome VARCHAR(100) NOT NULL, -- Nome do grupo
        descricao TEXT, -- Descrição detalhada do grupo
        tipo ENUM ('Usuários', 'Permissões', 'Categorias', 'Outros') NOT NULL -- Tipo de grupo
    );
