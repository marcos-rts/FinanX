-- RELACIONAMENTOS
ALTER TABLE audit_logs FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id);

ALTER TABLE audit_notificacoes FOREIGN KEY (transacao_id) REFERENCES sis_transacao (id);

ALTER TABLE bd_subcategoria FOREIGN KEY (categoria_id) REFERENCES bd_categoria (id);

ALTER TABLE rlc_pagamento_conta FOREIGN KEY (conta_id) REFERENCES bd_conta (id),
FOREIGN KEY (tipo_pagamento_id) REFERENCES bd_tipo_pagamento (id),
FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id);

ALTER TABLE rlc_usuario_grupo FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id),
FOREIGN KEY (grupo_id) REFERENCES bd_grupo (id);

ALTER TABLE sis_transacao FOREIGN KEY (tipo_id) REFERENCES bd_tipo (id),
FOREIGN KEY (subcategoria_id) REFERENCES bd_subcategoria (id),
FOREIGN KEY (pagamento_conta_id) REFERENCES rlc_pagamento_conta (id),
FOREIGN KEY (usuario_id) REFERENCES bd_usuario (id),
FOREIGN KEY (evento_id) REFERENCES bd_eventos (id),
FOREIGN KEY (conta_id) REFERENCES bd_conta (id);

ALTER TABLE sis_transferencia FOREIGN KEY (conta_origem_id) REFERENCES bd_conta (id), -- Chave estrangeira para Conta de Origem
FOREIGN KEY (conta_destino_id) REFERENCES bd_conta (id), -- Chave estrangeira para Conta de Destino
FOREIGN KEY (evento_id) REFERENCES bd_eventos (id), -- Chave estrangeira para Eventos
FOREIGN KEY (subcategoria_id) REFERENCES bd_subcategoria (id);