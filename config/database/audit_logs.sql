-- Tabela de Logs de Auditoria
CREATE TABLE
    audit_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tabela VARCHAR(100) NOT NULL,
        registro_id INT NOT NULL,
        acao ENUM ('Criado', 'Alterado', 'Excluído') NOT NULL,
        usuario_id INT NOT NULL,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        detalhes TEXT
    );