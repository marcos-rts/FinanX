-- Tabela de Notificações
CREATE TABLE bd_notificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transacao_id INT NOT NULL,
    mensagem VARCHAR(255),
    data_lembrete DATE,
    enviada BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (transacao_id) REFERENCES sis_transacao(id)
);