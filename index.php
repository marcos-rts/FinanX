<?php
include 'includes/header.php';
include 'config/Classes/Banco.php';

?>
<!-- Container Principal -->
<div class="container-fluid p-4">
    <!-- Cabeçalho -->
    <div class="mb-4">
        <h1 class="h3 text-center">Painel Inicial</h1>
        <p class="text-muted text-center">Bem-vindo! Aqui estão as principais informações do sistema.</p>
    </div>

    <!-- Resumo de Informações -->
    <div class="row mb-4">
        <!-- Total de Transações -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Transações</h5>
                    <p class="h3 text-primary">
                        <!-- 250 -->
                        <?php
                        $sql = "select count(*) from sis_transacao";
                        $resultado = Banco::query($sql);
                        echo $resultado[0]['count(*)'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Total de Eventos -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Eventos</h5>
                    <p class="h3 text-success">
                        <!-- 12 -->
                        <?php
                        $sql = "select count(*) from bd_eventos";
                        $resultado = Banco::query($sql);
                        echo $resultado[0]['count(*)'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Total de Tipos de Pagamento -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tipos de Pagamento</h5>
                    <p class="h3 text-warning">
                        <!-- 6 -->
                        <?php
                        $sql = "select count(*) from bd_tipo_pagamento";
                        $resultado = Banco::query($sql);
                        echo $resultado[0]['count(*)'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- Notificações Ativas -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Notificações</h5>
                    <p class="h3 text-danger">
                        <!-- 3 -->
                        <?php
                        $sql = "select count(*) from audit_notificacoes";
                        $resultado = Banco::query($sql);
                        echo $resultado[0]['count(*)'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Área de Notificações -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Notificações Recentes</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">📌 Atualização de sistema disponível. <span class="badge bg-warning text-dark float-end">Prioridade</span></li>
                        <li class="list-group-item">📌 Evento "Festa de Aniversário" está próximo. <span class="badge bg-primary float-end">Informativo</span></li>
                        <li class="list-group-item">📌 Pagamento pendente para "Conta de Luz". <span class="badge bg-danger float-end">Urgente</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Dicas e Lembretes -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <?php
                    /**
                     * TODO Vincular com o telegram para adicionar novas notificações e receber lembretes (tipo um plugin de telegram) 
                     */
                    ?>
                    <h5 class="mb-0">Lembretes</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>🔔 Revise suas metas financeiras do mês.</li>
                        <li>🔔 Atualize as categorias de despesas.</li>
                        <li>🔔 Agende uma auditoria para os eventos.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Área de Detalhes Amplos -->
    <div class="row">
        <!-- Últimas Atividades -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Últimas Atividades</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">✅ Transação "Compra no Mercado" foi concluída.</li>
                        <li class="list-group-item">✅ Evento "Reunião Corporativa" foi criado.</li>
                        <li class="list-group-item">⏳ Pagamento para "Netflix" está pendente.</li>
                        <li class="list-group-item">✅ Novo tipo de pagamento "Pix" adicionado.</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Status do Sistema -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <?php
                    /**
                     * TODO Vincular com o telegram para monitorar o status do sistema
                     */
                    ?>
                    <h5 class="mb-0">Status do Sistema</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>🟢 Sistema operacional: <span class="text-success">Ativo</span></li>
                        <li>🟢 Conexão com o banco de dados: <span class="text-success">Estável</span></li>
                        <li>🔵 Última sincronização: <span class="text-muted">10 min atrás</span></li>
                        <li>🟠 Atualizações pendentes: <span class="text-warning">1</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer class="text-center py-3 border-top">
    <p class="mb-0 text-muted">&copy; 2024 Sistema de Gestão</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include 'includes/footer.php'
?>