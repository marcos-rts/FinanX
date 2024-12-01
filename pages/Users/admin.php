<?php
require_once '../../config/Classes/Banco.php';
require_once '../../config/log/log.php';
include '../../includes/header.php'

?>
    <div class="container mt-5">
        <!-- Título Principal -->
        <div class="text-center mb-4">
            <h1 class="h3">Configurações do Sistema</h1>
            <p class="text-muted">Área de administração e configurações avançadas.</p>
        </div>

        <!-- Opções de Configuração -->
        <div class="row g-4">
            <!-- Gerenciamento de Usuários -->
            <div class="col-md-6">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Usuários</h5>
                        <p class="card-text text-muted">Gerencie usuários e permissões do sistema.</p>
                        <div class="d-flex justify-content-between">
                            <a href="listar_usuarios.html" class="btn btn-outline-secondary btn-sm">Listar Usuários</a>
                            <a href="config/new_user.php" class="btn btn-outline-primary btn-sm">Criar Usuário</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gerenciamento de Categorias -->
            <div class="col-md-6">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <p class="card-text text-muted">Adicione ou edite categorias e subcategorias.</p>
                        <div class="d-flex justify-content-between">
                            <a href="listagem_categorias.html" class="btn btn-outline-secondary btn-sm">Gerenciar Categorias</a>
                            <a href="listagem_subcategorias.html" class="btn btn-outline-primary btn-sm">Gerenciar Subcategorias</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Configurações de Banco de Dados -->
            <div class="col-md-6">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Banco de Dados</h5>
                        <p class="card-text text-muted">Ajuste as configurações do banco de dados.</p>
                        <a href="config/banco_dados.php" class="btn btn-outline-secondary btn-sm w-100">Configurar</a>
                    </div>
                </div>
            </div>

            <!-- Logs e Auditorias -->
            <div class="col-md-6">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Logs e Auditoria</h5>
                        <p class="card-text text-muted">Acompanhe as ações realizadas no sistema.</p>
                        <a href="logs_auditoria.html" class="btn btn-outline-secondary btn-sm w-100">Visualizar Logs</a>
                    </div>
                </div>
            </div>

            <!-- Configurações do Sistema -->
            <div class="col-md-6">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Sistema</h5>
                        <p class="card-text text-muted">Defina parâmetros gerais e ajustes do sistema.</p>
                        <a href="configuracoes_sistema.html" class="btn btn-outline-secondary btn-sm w-100">Configurações Gerais</a>
                    </div>
                </div>
            </div>

            <!-- Relatórios e Estatísticas -->
            <div class="col-md-6">
                <div class="card border-light shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Relatórios</h5>
                        <p class="card-text text-muted">Visualize relatórios e estatísticas.</p>
                        <a href="relatorios.html" class="btn btn-outline-secondary btn-sm w-100">Visualizar Relatórios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include '../../includes/footer.php'
?>
