-- Tabela de Usuários
CREATE TABLE bd_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    senha_hash VARCHAR(255) NOT NULL,
    tipo ENUM('Admin', 'Comum') DEFAULT 'Comum',
    ativo BOOLEAN DEFAULT TRUE
);

-- Tabela de Configurações dos Usuários
-- CREATE TABLE bd_usuario_config (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     usuario_id INT NOT NULL,
--     notificacoes_ativas BOOLEAN DEFAULT TRUE,
--     tema ENUM('Claro', 'Escuro') DEFAULT 'Claro',
--     idioma VARCHAR(10) DEFAULT 'pt-BR',
--     FOREIGN KEY (usuario_id) REFERENCES bd_usuario(id) ON DELETE CASCADE
-- );